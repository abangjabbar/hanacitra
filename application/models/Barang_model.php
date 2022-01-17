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

    public function hapus_barang($barangId)
    {
        $this->db->where('id', $barangId);
        $this->db->delete('barang');

        $this->db->where('barang_id', $barangId);
        $this->db->delete('multiple_image');
    }

    public function getDataImage($group)
    {
        return $this->db->get_where('multiple_image', ['barang_id' => $group])->result_array();
    }

    public function detail_image()
    {
        $query  = $this->db->select('multiple_image.*')
            ->from('multiple_image')
            ->where('barang_id', $this->input->post('id'));
        return $query->get()->result();
    }
}
