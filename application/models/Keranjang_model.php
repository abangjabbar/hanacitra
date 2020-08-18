<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang_model extends CI_Model
{
	private $_table = "keranjang";

	public $id_keranjang;
	public $id;
	public $qty;
	public $price;
	public $name;
	public $rowid;
	public $subtotal;


	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_keranjang" => $id])->row();
	}
 	
	public function save()
	{
		$post = $this->input->post();
		$this->id_pembayaran = uniqid();
		$this->id = $post["id"];
		$this->qty = $post["qty"];
		$this->price = $post["name"];
		$this->rowid = $post["rowid"];
		$this->subtotal = $post["subtotal"];
		return $this->db->insert($this->_table, $this);
	}


}