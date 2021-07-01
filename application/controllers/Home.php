<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Beranda';

        $this->load->view('templates/home_header', $data);
        $this->load->view('beranda.php');
        $this->load->view('templates/home_footer', $data);
    }

    public function berandaLama()
    {
        $data['title'] = 'Beranda Lama';

        $this->load->view('templates/homee_header', $data);
        $this->load->view('berandaa.php');
        $this->load->view('templates/homee_footer', $data);
    }

    public function jenisBentuk()
    {
        $data['title'] = 'Produk Kami';

        $this->load->view('templates/homee_header', $data);
        $this->load->view('jenis_bentuk.php');
        $this->load->view('templates/homee_footer', $data);
    }

    public function tentangKami()
    {
        $data['title'] = 'Tentang Kami';

        $this->load->view('templates/homee_header', $data);
        $this->load->view('tentangkami.php');
        $this->load->view('templates/homee_footer', $data);
    }

    public function jenisProduk()
    {
        $data['title'] = 'Produk Kami';

        $this->load->view('templates/homee_header', $data);
        $this->load->view('jenis_box.php');
        $this->load->view('templates/homee_footer', $data);
    }
    public function jenisBox()
    {

        $data['box'] = $this->db->get('jenis_box')->result_array();

        $data['title'] = 'Pesan Sekarang!';

        $this->load->view('templates/homee_header', $data);
        $this->load->view('jenis_box.php');
        $this->load->view('templates/homee_footer', $data);
    }
}
