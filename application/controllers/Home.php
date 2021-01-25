<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Home extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("substance_model");
        $this->load->library('form_validation');
    }
 
    public function index(){
        $data["substances"] = $this->substance_model->get_kualitas();
        $this->load->view("customer/jenis_bahan_cust", $data);
    }
    
    public function jenisBahan(){
        $data["substances"] = $this->substance_model->get_kualitas();
        $this->load->view("customer/jenis_bahan_cust", $data);
    }

}