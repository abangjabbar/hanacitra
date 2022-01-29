<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Administrator_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->session->userdata('user');

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('administrator/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function manajemenAkun()
    {
        $data['title'] = 'Manajemen Akun';
        $data['user'] = $this->session->userdata('user');
        $data['akun'] = $this->Administrator_model->get_akun();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('administrator/manajemen_akun', $data);
        $this->load->view('templates/admin_footer');
    }

    public function editAkun($userId)
    {
        $data['title'] = 'Edit Akun';
        $data['user'] = $this->session->userdata('user');
        $data['akun'] = $this->Administrator_model->get_id_akun($userId);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/admin_sidebar', $data);
        $this->load->view('templates/admin_topbar', $data);
        $this->load->view('administrator/edit_akun', $data);
        $this->load->view('templates/admin_footer');
    }

    public function proses_edit_akun()
    {
        $data = array(
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil diubah');</script>";
        }
        echo "<script>window.location='" . site_url('administrator/manajemenAkun') . "';</script>";
    }

    public function hapusAkun()
    {
        $userId = $this->input->post('id');
        $this->Administrator_model->hapus_akun($userId);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data berhasil dihapus');</script>";
        }
        echo "<script>window.location='" . site_url('administrator/manajemenAkun') . "';</script>";
    }
}
