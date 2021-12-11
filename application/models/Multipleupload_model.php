<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Multipleupload_model extends CI_Model
{
    public function cekData()
    {
        $this->db->limit(1);
        $this->db->order_by('group_image', 'DESC');
        return $this->db->get('multiple_image')->row_array();
    }

    public function upload($insert, $data)
    {
        $this->db->insert_batch('multiple_image', $insert);
        $this->db->set('main_image', 1);
        $this->db->where('image', $data);
        $this->db->update('multiple_image');
        return $this->db->affected_rows();
    }

    public function getDataGroup()
    {
        $this->db->where('main_image', 1);
        $this->db->group_by('group_image');
        return $this->db->get('multiple_image')->result_array();
    }

    public function getDataImage($group)
    {
        return $this->db->get_where('multiple_image', ['group_image' => $group])->result_array();
    }

    public function detail_image($id)
    {
        $this->db->select('*');
        $this->db->from('multiple_image');
        $this->db->join('pesanan', 'pesanan.id = multiple_image.id_pesanan', 'left');
        $this->db->where('pesanan.id', $id);
        return $this->db->get()->result();
    }
}
