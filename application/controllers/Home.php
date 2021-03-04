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
}
