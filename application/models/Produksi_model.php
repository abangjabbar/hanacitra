<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
    function get_barang($orderId)
    {
        $query = $this->db->select('barang.*,harga_barang.id as harga_barang_id,harga_barang.harga_item,harga_barang.total_harga,kualitas.kualitas_nama,subkualitas.subkualitas_nama')->from('barang')
            ->join('harga_barang', 'barang.id = harga_barang.barang_id', 'LEFT')
            ->join('kualitas', 'barang.kualitas = kualitas.id_kualitas', 'LEFT')
            ->join('subkualitas', 'barang.subkualitas = subkualitas.id_subkualitas', 'LEFT')
            ->where('barang.order_id', $orderId);
        return $query->get()->result();
    }

    function get_order($orderId)
    {
        $query  = $this->db->select('order.*,harga_order.id as harga_order_id,harga_order.grand_total,harga_order.ppn,harga_order.diskon')
            ->from('order')
            ->join('harga_order', 'order.id = harga_order.order_id', 'LEFT')
            ->where('order.id', $orderId);
        return $query->get()->result()[0];
    }

    function getOrderList()
    {
        $status = array("Pembayaran Terkonfirmasi", "Order Sedang Diproses", "Order Sedang Dalam Pengiriman", "Order Selesai");
        $query = $this->db->select('order.*,harga_order.grand_total')->from('order')
            ->join('harga_order', 'order.id = harga_order.order_id', 'LEFT')
            ->where_in('order.status', $status)
            ->order_by('id', 'desc');
        return $query->get()->result();
    }

    public function set_notifikasi($orderId, $user)
    {
        $notifikasi = array(
            'order_id' => $orderId,
            'executor' => $user['id'],
            'recipient_role_id' => 6,
        );
        $this->db->insert('notifikasi', $notifikasi);
    }

    public function get_history($orderId)
    {
        $query  = $this->db->select('alasan.*')
            ->from('alasan')
            ->where('alasan.order_id', $orderId)
            ->order_by('id', 'desc');
        return $query->get()->result();
    }

    public function get_id_order($orderId)
    {
        return  $this->db->get_where('order', ['id' => $orderId])->row_array();
    }

    public function getDataImage($order_id)
    {
        return $this->db->get_where('po_image', ['order_id' => $order_id])->result_array();
    }

    public function konfirmasi_order($user)
    {
        $this->db->trans_start();
        $data = [
            "status" => $this->input->post('status')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('order', $data);

        $notifikasiClient = array(
            'order_id' => $this->input->post('id'),
            'executor' =>  $user['id'],
            'recipient_role_id' =>  6,
            'status' => $data['status']
        );

        $this->db->insert('notifikasi', $notifikasiClient);

        $this->db->trans_complete();
    }
}
