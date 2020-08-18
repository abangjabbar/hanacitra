<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hanacitra extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{  
		$this->load->view("beranda");
	}

    public function tentangkami()
    {  
        $this->load->view("tentangkami");
    }

    public function jenisBentuk()
    {  
        $this->load->view("jenis_bentuk");
    }

    public function berandaCust()
    {  
        $this->load->view("customer/beranda_cust");
    }

    public function jenisBentukCust()
    {  
        $this->load->view("customer/jenis_bentuk_cust");
    }

    public function tentangkamiCust()
    {  
        $this->load->view("customer/tentangkami_cust");
    }
    
}
