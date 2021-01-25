<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Hargasubkualitas_model extends CI_Model
{
	public function GetHargaSubkualitas($where=""){
        $data = $this->db->query('select * from harga_subkualitas '.$where);
        return $data->result_array();
    }

    public function InsertData($tableName,$data){
        $spn = $this->db->insert($tableName,$data);
        return $spn;
    }

    public function UpdateData($tableName,$data,$where){
        $spn = $this->db->update($tableName,$data,$where);
        return $spn; 
    }

    public function DeleteData($tableName,$where){
        $spn = $this->db->delete($tableNama,$where);
        return $spn;
    }

}