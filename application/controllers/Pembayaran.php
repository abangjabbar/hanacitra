<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("pembayaran_model");
		$this->load->library('form_validation');
	}

	public function index()
	{  
		$data["dataPembayaran"] = $this->pembayaran_model->getJoin();
		$this->load->view("admin/pembayaran_admin", $data);
	}

    public function pembayaranManager()
    {  
        $data["pembayarans"] = $this->pembayaran_model->getAll();
        $this->load->view("manager/pembayaran_manager", $data);
    }
}