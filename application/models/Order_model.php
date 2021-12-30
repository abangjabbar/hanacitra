<?php defined('BASEPATH') or exit('No direct script access allowed');

class Order_model extends CI_Model
{
	public function proses_edit_order($input)
	{
		$data = [
			"tgl_pengiriman" => $input->post('tgl_pengiriman'),
			"alamat_pengiriman" => $input->post('alamat_pengiriman'),
		];
		$this->db->where('id', $input->post('orderId'));
		$this->db->update('order', $data);
	}

	function getOrderList($isSales, $userID = NULL)
	{
		$query = $this->db->select('*')->from('order')
			->join('user', 'order.user_id = user.id', 'LEFT')
			->join('transaksi', 'transaksi.id = order.id', 'LEFT');
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
}
