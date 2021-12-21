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
}
