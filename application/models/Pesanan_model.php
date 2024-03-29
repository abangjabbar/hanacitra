<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan_model extends CI_Model
{
    public function detail_harga($id)
    {
        $this->db->select('*');
        $this->db->from('transaksi');
        $this->db->join('pesanan', 'pesanan.id = transaksi.id_pesanan', 'left');
        $this->db->where('pesanan.id', $id);
        return $this->db->get()->result();
    }

    public function get_id_transaksi($barangId)
    {
        return  $this->db->get_where('transaksi', ['barang_id' => $barangId])->row_array();
    }

    public function proses_edit_harga()
    {
        $barangId =  $this->input->post('barang_id');
        $data = [
            "harga_item" => $this->input->post('harga_item'),
            "total_harga" => $this->input->post('total_harga'),
            "ppn" => $this->input->post('ppn'),
            "diskon" => $this->input->post('diskon'),
            "grand_total" => $this->input->post('grand_total'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('transaksi', $data);

        $this->db->set('status', "Menunggu Bukti Pembayaran");
        $this->db->where('id', $barangId);
        $this->db->update('order');
    }

    function get_kualitas($isSales, $userID = NULL)
    {
        $query = $this->db->select('*')->from('pesanan')
            ->join('kualitas', 'pesanan.kualitas = kualitas.id_kualitas', 'LEFT')
            ->join('subkualitas', 'pesanan.subkualitas = subkualitas.id_subkualitas', 'LEFT')
            ->join('user', 'pesanan.user_id = user.id', 'LEFT')
            ->join('transaksi', 'transaksi.id = pesanan.id', 'LEFT');
        if ($isSales == FALSE) {
            $query->where('user_id', $userID);
        }
        return $query->get()->result();
    }

    public function getDataImage($orderId)
    {
        return $this->db->get_where('multiple_image', ['group_image' => $orderId])->result_array();
    }

    function detail_pesanan($orderId)
    {
        $query = $this->db->select('*')->from('pesanan')
            ->join('kualitas', 'pesanan.kualitas = kualitas.id_kualitas', 'LEFT')
            ->join('subkualitas', 'pesanan.subkualitas = subkualitas.id_subkualitas', 'LEFT')
            ->join('transaksi', 'transaksi.id = pesanan.id', 'LEFT')
            ->join('user', 'pesanan.user_id = user.id', 'LEFT')
            ->join('multiple_image', 'multiple_image.barang_id = barang.id', 'LEFT')
            ->where('pesanan.id', $orderId);
        return $query->get()->result();
    }
}
