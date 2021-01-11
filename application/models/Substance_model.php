<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Substance_model extends CI_Model
{
	private $_table = "substances";

    public $id_substance;
	public $kualitas;
	public $subkualitas;
	public $harga_subkualitas;
	public $stok_substance;

	public function rules()
	{
		return [
			['field' => 'stok_substance',
			'label' => 'Deskripsi',
			'rules' => 'required']
			];
	}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, ["id_substance" => $id])->row();
	}
 	
	public function save()
	{
		$post = $this->input->post();
		$this->id_substance = uniqid();
		$this->kualitas = $post["kualitas"];
		$this->subkualitas = $post["subkualitas"];
		$this->harga_subkualitas = $post["harga_subkualitas"];
		$this->stok_substance = $post["stok_substance"];
		return $this->db->insert($this->_table, $this);
	}
	
    function get_kualitas(){
        $this->db->select('id_substance,kualitas_nama,subkualitas_nama,harga_subkualitas,stok_substance');
        $this->db->from('substances');
        $this->db->join('kualitas','kualitas = id_kualitas','left');
		$this->db->join('subkualitas','subkualitas = id_subkualitas','left');
        $query = $this->db->get();
        return $query;
	}
	
	public function update()
    {
        $post = $this->input->post();
		$this->id_substance = $post["id"];
		$this->kualitas = $post["kualitas"];
        $this->subkualitas = $post["subkualitas"];
        $this->harga_subkualitas = $post["harga_subkualitas"];
        $this->stok_substance = $post["stok_substance"];
        return $this->db->update($this->_table, $this, array('id_substance' => $post['id']));
    }

}