<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kualitas_model extends CI_Model
{
	public function get_kualitas()
	{
		$this->db->from('kualitas');
		$query = $this->db->get();

		return $query;
	}

	public function get_subkualitas($id_kualitas)
	{
		$this->db->from('subkualitas');
		$this->db->where('subkualitas_kualitas_id', $id_kualitas);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_harga_subkualitas($id_subkualitas)
	{
		$this->db->from('harga_subkualitas');
		$this->db->where('subkualitas_id', $id_subkualitas);
		$query = $this->db->get();
		return $query->result();
	}

}