<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Multipleupload_model');
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/index.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function profil()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/profil.php', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function editProfil()
    {
        $data['title'] = 'Sunting Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client_header', $data);
            $this->load->view('client/edit_profil.php', $data);
            $this->load->view('templates/client_footer');
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
            redirect('client/profil');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'Password Baru', 'required|trim|min_length[8]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Konfirmasi Password Baru', 'required|trim|min_length[8]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('templates/admin_sidebar', $data);
            $this->load->view('templates/admin_topbar', $data);
            $this->load->view('manager/changepassword', $data);
            $this->load->view('templates/admin_footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password sekarang salah!
                </div>');
                redirect('manager/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan yang sebelumnya! 
                    </div>');
                    redirect('manager/changepassword');
                } else {
                    //password sudah benar
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password berhasil diubah
                    </div>');
                    redirect('manager');
                }
            }
        }
    }

    public function cetakCustom()
    {
        $data['title'] = 'Cetak Custom';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['box'] = $this->db->get('jenis_box')->result_array();

        $this->form_validation->set_rules('projek_pesanan', 'Nama Jenis Box', 'required|trim');
        $this->form_validation->set_rules('jenis_box', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('spesifikasi', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('jumlah_pesanan', 'Keterangan', 'required|trim');
        $this->form_validation->set_rules('alamat_pengiriman', 'Keterangan', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/client_header', $data);
            $this->load->view('client/cetak_custom.php', $data);
            $this->load->view('templates/client_footer', $data);
        } else {
            $projek_pesanan = $this->input->post('projek_pesanan');
            $jenis_box = $this->input->post('jenis_box');
            $spesifikasi = $this->input->post('spesifikasi');
            $jumlah_pesanan = $this->input->post('jumlah_pesanan');
            $alamat_pengiriman = $this->input->post('alamat_pengiriman');

            // cek kalo ada gambar yg diupload
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/drawing_client/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('projek_pesanan', $projek_pesanan);
            $this->db->set('jenis_box', $jenis_box);
            $this->db->set('spesifikasi', $spesifikasi);
            $this->db->set('jumlah_pesanan', $jumlah_pesanan);
            $this->db->set('alamat_pengiriman', $alamat_pengiriman);
            $this->db->insert('pesanan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Pesanan berhasil dibuat
            </div>');
            redirect('client/cetakCustom');
        }
    }

    public function multipleupload()
    {
        $data['title'] = 'Multiple upload';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
        $this->load->view('client/multipleupload_view', $data);
        $this->load->view('templates/client_footer', $data);
    }

    public function newtemplate()
    {
        $data['title'] = 'New Template';

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/client_header', $data);
    }
}
