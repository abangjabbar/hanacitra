<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pengiriman_model extends CI_Model
{
	private $_table = "pengiriman";
	public $id_pengiriman;
	public $id_order;
	public $tanggal;
	public $alamat;

	public function rules()
	{
		return [

			['field' => 'tanggal',
			'label' => 'Tanggal Pengirman',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required']
			];
		}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		$this->db->join('orders', 'orders.order_id = pengiriman.order_id');
		return $this->db->get_where($this->_table, ["id_pengiriman" => $id])->row();
	}

	public function getJoin()
  {
      $this->db->select('orders.*, pengiriman.id_pengiriman AS id_order, pengiriman.id_order');
      $this->db->from('orders');
      $this->db->join('pengiriman', 'orders.id_order = pengiriman.id_order');
      $query = $this->db->get();
      return $query->result();
  }	

 	
	public function save()
	{
		$post = $this->input->post();
		$this->id_pengiriman = $post["id_order"];
		$this->id_order = $post["id_order"];
		$this->tanggal = $post["tanggal"];
		$this->alamat = $post["alamat"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$this->id_pengiriman = $post["id"];
		$this->id_order = $post["id_order"];
		$this->tgl_pengiriman = $post["tgl_pengiriman"];
		$this->alamat = $post["alamat"];
		$this->status_pengiriman = $post["status_pengiriman"];
		return $this->db->update($this->_table, $this, array('id_pengiriman' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_pengiriman" => $id));
	}

}