<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class HargaSubkualitas extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model("hargasubkualitas_model");
    }
 
    public function index(){
        $data = $this->hargasubkualitas_model->GetHargaSubkualitas();
        $this->load->view("admin/tabel_harga_subkualitas", array('data'=> $data));
    }

    public function add_data(){
        $this->load->view('admin/tambah_harga_subkualitas');
    }

    public function do_insert(){
        $id_harga_subkualitas = $_POST['id_harga_subkualitas'];
        $harga = $_POST['harga'];
        $id_subkualitas = $_POST['id_subkualitas'];
        $data_insert = array(
            'id_harga_subkualitas' => $id_harga_subkualitas,
            'harga' => $harga,
            'id_subkualitas' => $id_subkualitas
        );
        $spn =$this->hargasubkualitas_model->InsertData('harga_subkualitas',$data_insert);
        if ($spn>=1) {
            redirect('HargaSubkualitas/index');
        }
    }

    public function edit_data($id_harga_subkualitas){
        $hrg = $this->hargasubkualitas_model->GetHargaSubkualitas("where id_harga_subkualitas = '$id_harga_subkualitas'");
        $data = array(
            "id_harga_subkualitas" => $hrg[0]['id_harga_subkualitas'],
            "harga" => $hrg[0]['harga'],
            "id_subkualitas" => $hrg[0]['id_subkualitas']
        );
        $this->load->view('edit_harga_subkualitas', $data);
    }
 
    public function do_update(){
        $id_harga_subkualitas = $_POST['id_harga_subkualitas'];
        $harga = $_POST['harga'];
        $id_subkualitas = $_POST['id_subkualitas'];
        $data_update = array(
            'harga'=> $harga,
            'id_subkualitas'=> $id_subkualitas
        );
        $where = array($id_harga_subkualitas);
        $spn = $this->hargasubkualitas_model->UpdateData('harga_subkualitas',$where);
        if ($spn>=1){
            redirect('HargaSubkualitas/index');
        }
    }

    public function do_delete($id_harga_subkualitas){
        $where = array('id_harga_subkualitas' => $id_harga_subkualitas);
        $spn = $this->hargasubkualitas_model->DeleteData('harga_subkualitas',$where);
        if ($spn>=1){
            redirect('HargaSubkualitas/index');
        }
    }
}