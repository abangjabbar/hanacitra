<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model
{
	public function getProduk($table_name)
	{
		$select = $this->db->get($table_name);
		return $select->result_array();
	}

	public function getProdukCart($table_name,$id)
	{
		$this->db->where('id_produk', $id);
		$ambilData  = $this->db->get($table_name);
		return $ambilData->row();
	}
}