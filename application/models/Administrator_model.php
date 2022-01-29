<?php defined('BASEPATH') or exit('No direct script access allowed');

class Administrator_model extends CI_Model
{
    function get_akun()
    {
        $query = $this->db->select('*')->from('user')
            ->order_by('id', 'desc');
        return $query->get()->result();
    }

    public function get_id_akun($userId)
    {
        return  $this->db->get_where('user', ['id' => $userId])->row_array();
    }

    public function hapus_akun($userId)
    {
        $this->db->where('id', $userId);
        $this->db->delete('user');
    }
}
