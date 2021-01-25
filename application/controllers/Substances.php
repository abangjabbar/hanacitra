<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Substances extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("substance_model");
        $this->load->model("subkualitas_model");
        $this->load->library('form_validation');
    }
 
    public function index(){
        $data["substances"] = $this->substance_model->get_kualitas();
        $this->load->view("admin/tabel_stok_substance", $data);
    }
 
    public function fetch_subkualitas()
    {
        if ($this->input->post('id_kualitas'))
        {
            echo $this->subkualitas_model->fetch_subkualitas($this->input->post('id_kualitas'));
        }
    }

    public function fetch_harga_subkualitas()
    {
        if ($this->input->post('id_subkualitas'))
        {
            echo $this->subkualitas_model->fetch_harga_subkualitas($this->input->post('id_subkualitas'));
        }
    }

    public function addStokSubstance()
	{
		$substance = $this->substance_model;
        $data["kualitas"] = $this->subkualitas_model->fetch_kualitas();
		$validation = $this->form_validation;
		$validation->set_rules($substance->rules());

		if ($validation->run()) {
            $substance->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view('admin/tambah_stok_substance', $data);
    }

    public function editSubstance($id = null)
    {
        if (!isset($id)) redirect('admin/tabel_stok_substance');
       
        $substance = $this->substance_model;
        $data["kualitas"] = $this->subkualitas_model->fetch_kualitas();
        $validation = $this->form_validation;
        $validation->set_rules($substance->rules());

        if ($validation->run()) {
            $substance->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["substance"] = $substance->getById($id);
        if (!$data["substance"]) show_404();
        
        $this->load->view("admin/edit_stok_substance", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->substance_model->delete($id)) {
            redirect(site_url('substances'));
        }
    }

 
}