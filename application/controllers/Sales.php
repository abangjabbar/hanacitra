<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Multipleupload_model');
        $this->load->model('Pesanan_model');
        $this->load->model('Order_model');
        $this->load->model('Barang_model');
        $this->load->model('Sales_model');
    }

    public function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/index.php', $data);
        $this->load->view('templates/admin_footer');
    }

    public function edit()
    {
        $data['title'] = 'Sunting Profil';
        $data['user'] = $this->session->userdata('user');

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('sales/edit.php', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek kalo ada gambar yg diupload
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Profil anda sudah diperbarui
            </div>');
            redirect('sales');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->session->userdata('user');

        $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('sales/changepassword', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password sekarang salah!
                </div>');
                redirect('sales/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan yang sebelumnya! 
                    </div>');
                    redirect('sales/changepassword');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah
                    </div>');
                    redirect('sales');
                }
            }
        }
    }

    public function daftarOrder()
    {
        $data['title'] = 'Daftar Transaksi Barang';
        $data['user'] = $this->session->userdata('user');

        $data['transaksi'] = $this->Sales_model->getOrderList();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/order_list', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function order($orderId)
    {
        $data['title'] = 'Order';
        $data['user'] = $this->session->userdata('user');

        $data['barang'] = $this->Sales_model->get_barang($orderId);
        $data['order'] = $this->Sales_model->get_order($orderId);
        $data['history'] = $this->Sales_model->get_history($orderId);

        $isEditEnabled = false;

        if ($data['order']->status == "Menunggu Konfirmasi Admin") {
            $isEditEnabled = true;
        }
        $data['isEditEnabled'] = $isEditEnabled;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/order', $data);
        $this->load->view('templates/admin_footer');
    }

    public function updateHarga()
    {
        $this->Sales_model->update_harga($this->input);
    }

    public function saveAlasan()
    {
        $this->Sales_model->saveAlasan($this->input);
    }

    public function detailImagePesanan($id)
    {
        $data['title'] = 'Detail Drawing';
        $data['user'] = $this->session->userdata('user');

        $data['drawing'] = $this->Multipleupload_model->detail_image($id);
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/detail_image', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function editHarga($barangId)
    {
        $data['title'] = 'Detail Harga Transaksi';
        $data['user'] = $this->session->userdata('user');
        $data['harga'] = $this->Pesanan_model->get_id_transaksi($barangId);
        $data['transaksi'] = $this->db->get('transaksi')->result_array();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/edit_harga', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function proses_edit_harga()
    {
        $this->Pesanan_model->proses_edit_harga();
        redirect('sales/daftarPesanan');
    }
}
