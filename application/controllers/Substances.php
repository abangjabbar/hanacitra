<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Substances extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("substance_model");
		$this->load->library('form_validation');
	}

	public function index()
	{  
		$data["substances"] = $this->substance_model->getAll();
		$this->load->view("admin/substance_admin", $data);
	}

    public function substanceCust()
    {  
        $data["substances"] = $this->substance_model->getAll();
        $this->load->view("customer/substance_cust", $data);
    }

    public function addSubstance()
    {
        $substance = $this->substance_model;
        $validation = $this->form_validation;
        $validation->set_rules($substance->rules());

        if ($validation->run()) {
            $substance->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/input_substance");
    }

	public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/substance_admin');
       
        $substance = $this->substance_model;
        $validation = $this->form_validation;
        $validation->set_rules($substance->rules());

        if ($validation->run()) {
            $substance->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["substance"] = $substance->getById($id);
        if (!$data["substance"]) show_404();
        
        $this->load->view("admin/edit_substance", $data);
    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->order_model->delete($id)) {
            redirect(site_url('hanacitra'));
        }
    }

    public function substanceManager()
    {  
        $data["substances"] = $this->substance_model->getAll();
        $this->load->view("manager/substance_manager", $data);
    }

    public function jenisBahan()
    {  
        $data["substances"] = $this->substance_model->getAll();
        $this->load->view("jenis_bahan", $data);
    }

    public function jenisBahanCust()
    {  
        $data["substances"] = $this->substance_model->getAll();
        $this->load->view("customer/jenis_bahan_cust", $data);
    }

}