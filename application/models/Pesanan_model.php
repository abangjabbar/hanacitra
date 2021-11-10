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

    public function get_id_transaksi($id)
    {
        return  $this->db->get_where('transaksi', ['id' => $id])->row_array();
    }

    public function proses_edit_harga()
    {
        $data = [
            "harga_item" => $this->input->post('harga_item'),
            "total_harga" => $this->input->post('total_harga'),
            "ppn" => $this->input->post('ppn'),
            "diskon" => $this->input->post('diskon'),
            "grand_total" => $this->input->post('grand_total')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('transaksi', $data);
    }
}