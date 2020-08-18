<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("pengiriman_model");
		$this->load->library('form_validation');
	}

	public function index()
	{  
		$data["pengiriman"] = $this->pengiriman_model->getJoin();
		$this->load->view("admin/pengiriman_admin", $data);
	}

	public function addPengiriman()
	{
		$pengiriman = $this->pengiriman_model;
		$validation = $this->form_validation;
		$validation->set_rules($pengiriman->rules());

		if ($validation->run()) {
            $pengiriman->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/input_pengiriman");
	}



    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pengiriman_model->delete($id)) {
            redirect(site_url('pengiriman'));
        }
    }
    
}