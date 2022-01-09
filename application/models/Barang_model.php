<?php defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
    function getBarang($orderId)
    {
        $query = $this->db->select('*')->from('barang')
            ->join('kualitas', 'barang.kualitas = kualitas.id_kualitas', 'LEFT')
            ->join('subkualitas', 'barang.subkualitas = subkualitas.id_subkualitas', 'LEFT')
            ->where('barang.order_id', $orderId);
        return $query->get()->result();
    }

    public function get_id_barang($barangId)
    {
        return  $this->db->get_where('barang', ['id' => $barangId])->row_array();
    }
}
