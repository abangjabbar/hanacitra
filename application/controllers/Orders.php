<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("order_model");
        $this->load->model("substance_model");
        $this->load->model("subkualitas_model");
		$this->load->library('form_validation');
	}

	public function index()
	{  
		$data["orders"] = $this->order_model->getAll();
		$this->load->view("customer/order_cust", $data);
	}

    public function orderAdmin()
    {  
        $data["orders"] = $this->order_model->getAll();
        $this->load->view("admin/order_admin", $data);
    }

    public function orderManager()
    {  
        $data["orders"] = $this->order_model->getAll();
        $this->load->view("manager/order_manager", $data);
    }

	public function addNewOrderCust()
	{
		$order = $this->order_model;
        $data["kualitas"] = $this->subkualitas_model->fetch_kualitas();
		$validation = $this->form_validation;
		$validation->set_rules($order->rules());

		if ($validation->run()) {
            $order->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }else{
			ECHO 'GAGAL';
		}

        $this->load->view('customer/new_input_cust', $data);
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

    public function editOrderAdmin($id = null)
    {
        if (!isset($id)) redirect('admin/order_admin');
       
        $order = $this->order_model;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {
            $order->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["order"] = $order->getById($id);
        if (!$data["order"]) show_404();
        
        $this->load->view("admin/edit_order_admin", $data);
    }

	public function edit($id = null)
    {
        if (!isset($id)) redirect('customer/order_cust');
       
        $order = $this->order_model;
        $validation = $this->form_validation;
        $validation->set_rules($order->rules());

        if ($validation->run()) {
            $order->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["order"] = $order->getById($id);
        if (!$data["order"]) show_404();
        
        $this->load->view("customer/edit_order_cust", $data);
    }


    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->order_model->delete($id)) {
            redirect(site_url('orders/orderAdmin'));
        }
    }
  

}