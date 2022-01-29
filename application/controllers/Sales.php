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
        $this->load->model('Notifikasi_model');
        $this->load->helper('tgl_indo');
        $this->load->library('pagination');
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
                    $this->db->where('email', $this->session->userdata('user')['email']);
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
        $data['title'] = "Daftar Order";
        $data['user'] = $this->session->userdata('user');

        if ($this->input->post('updateFilter') == true) {
            $filter = array(
                'name' => $this->input->post('name'),
                'order_nomor' => $this->input->post('order_nomor'),
                'company_name' => $this->input->post('company_name'),
                'status' => $this->input->post('status')
            );
            $this->session->set_userdata('filter', $filter);
        }
        if ($this->session->userdata('filter') != null) {
            $data['filter'] = $this->session->userdata('filter');
        } else {
            $filter = array(
                'name' => null,
                'order_nomor' => null,
                'company_name' => null,
                'status' => ''
            );
            $data['filter'] = $filter;
        }
        //konfigurasi pagination
        $config['base_url'] = base_url('sales/daftarOrder'); //site url
        $config['total_rows'] = $this->Sales_model->countall($this->session->userdata('filter')); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['transaksi'] = $this->Sales_model->getOrderList($config["per_page"], $data['page'], $this->session->userdata('filter'));

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/order_list', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function order($orderId)
    {
        $data['title'] = 'Detail Order';
        $data['user'] = $this->session->userdata('user');

        $data['barang'] = $this->Sales_model->get_barang($orderId);
        $data['order'] = $this->Sales_model->get_order($orderId);
        $data['history'] = $this->Sales_model->get_history($orderId);
        $data['images'] = $this->Sales_model->getDataImage($orderId);

        $isEditEnabled = false;

        if ($data['order']->status == "Menunggu Konfirmasi Admin") {
            $isEditEnabled = true;
        }
        $data['isEditEnabled'] = $isEditEnabled;

        $isKonfirmasiPembayaran = false;

        if (
            $data['order']->status == "Menunggu Konfirmasi Pembayaran Dari Admin" | $data['order']->status == "Pembayaran Terkonfirmasi"
            | $data['order']->status == "Order Sedang Diproses" | $data['order']->status == "Order DIkirim"
            | $data['order']->status == "Order Selesai"
        ) {
            $isKonfirmasiPembayaran = true;
        }
        $data['isKonfirmasiPembayaran'] = $isKonfirmasiPembayaran;

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/order', $data);
        $this->load->view('templates/admin_footer');
    }

    public function updateHarga()
    {
        $data['user'] = $this->session->userdata('user');

        $this->Sales_model->update_harga($this->input, $data['user']);
    }

    public function saveAlasan()
    {
        $data['user'] = $this->session->userdata('user');

        $this->Sales_model->saveAlasan($this->input, $data['user']);
    }

    public function detailDesain($barangId)
    {
        $data['title'] = 'Detail Harga Transaksi';
        $data['user'] = $this->session->userdata('user');

        $data['barang'] = $this->Barang_model->get_id_barang($barangId);
        $data['images'] = $this->Barang_model->getDataImage($barangId);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('sales/detail_desain', $data);
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

    public function queryNotif()
    {

        echo json_encode($this->Notifikasi_model->query_notif_sales());
    }

    public function deleteNotif()
    {
        $orderId = $this->input->post('id');

        $this->Notifikasi_model->hapus_notif_sales($orderId);
    }

    public function submitOrder()
    {
        $data['user'] = $this->session->userdata('user');

        $this->Sales_model->submit_order($data['user']);
    }
}
