<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subkualitas_model extends CI_Model
{
    public function fetch_kualitas()
    {
        $this->db->order_by('kualitas_nama', 'ASC');
        $query = $this->db->get('kualitas');
        return $query->result();
    }

    public function fetch_subkualitas($id_kualitas)
    {
        $this->db->where('id_kualitas', $id_kualitas);
        $this->db->order_by('subkualitas_nama', 'ASC');
        $query = $this->db->get('subkualitas');
        $output = '<option value="">Pilih Subkualitas</option>';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->id_subkualitas.'">'.$row->subkualitas_nama.'</option>';
        }
        return $output;
    }

    public function fetch_harga_subkualitas($id_subkualitas)
    {
        $this->db->where('id_subkualitas', $id_subkualitas);
        $this->db->order_by('harga', 'ASC');
        $query = $this->db->get('harga_subkualitas');
        $output = '';
        foreach($query->result() as $row)
        {
            $output .= '<option value="'.$row->harga.'">'.$row->harga.'</option>';
        }
        return $output;
    }

}