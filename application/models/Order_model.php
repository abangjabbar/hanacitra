<?php defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
	function getOrder($orderId)
	{
		$query = $this->db->select('*')->from('order')
			->where('order.id', $orderId);
		return $query->get()->result();
	}

	public function proses_edit_order($input)
	{
		$data = [
			"tgl_pengiriman" => $input->post('tgl_pengiriman'),
			"alamat_pengiriman" => $input->post('alamat_pengiriman'),
		];
		$this->db->where('id', $input->post('orderId'));
		$this->db->update('order', $data);
	}

	public function submit_order($user)
	{

		$this->db->trans_start();

		$data = [
			"status" => "Menunggu Konfirmasi Admin",
		];
		$this->db->where('id', $this->input->post('id'));
		$this->db->update('order', $data);

		$notifikasi = array(
			'order_id' => $this->input->post('id'),
			'executor' =>  $user['id'],
			'recipient_role_id' =>  4,
		);
		$this->db->insert('notifikasi', $notifikasi);

		$this->db->trans_complete();
	}

	function getOrderList($isSales, $userID = NULL)
	{
		$query = $this->db->select('*')->from('order')
			->order_by('id', 'desc');
		if ($isSales == FALSE) {
			$query->where('user_id', $userID);
		}
		return $query->get()->result();
	}

	public function nomor_order()
	{
		$this->db->select('RIGHT(order.order_nomor,2) as order_nomor', FALSE);
		$this->db->order_by('order_nomor', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('order');  //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//cek kode jika telah tersedia    
			$data = $query->row();
			$kode = intval($data->order_nomor) + 1;
		} else {
			$kode = 1;  //cek jika kode belum terdapat pada table
		}
		$tgl = date('dmY');
		$batas = str_pad($kode, 5, "0", STR_PAD_LEFT);
		$kodetampil = "HCB" . $tgl . $batas;  //format kode
		return $kodetampil;
	}

	public function cekData()
	{
		$this->db->limit(1);
		$this->db->order_by('group_image', 'DESC');
		return $this->db->get('po_image')->row_array();
	}

	public function upload($insert, $data)
	{
		$this->db->insert_batch('po_image', $insert);
		$this->db->set('main_image', 1);
		$this->db->where('image', $data);
		$this->db->update('po_image');
		return $this->db->affected_rows();
	}
}
