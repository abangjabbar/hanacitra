<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Substance_model extends CI_Model
{
	private $_table = "substances";

	public $id_substance;
	public $jenis;
	public $bf;
	public $cf;
	public $cbf;

	public function rules()
	{
		return [
			['field' => 'jenis',
			'label' => 'Jenis',
			'rules' => 'required'],

			['field' => 'bf',
			'label' => 'BF',
			'rules' => 'required'],

			['field' => 'cf',
			'label' => 'CF',
			'rules' => 'required'],

			['field]' => 'cbf',
			'label' => 'CBF',
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
		$this->jenis = $post["jenis"];
		$this->bf = $post["bf"];
		$this->cf = $post["cf"];
		$this->cbf = $post["cbf"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$post = $this->input->post();
		$this->id_substance = $post["id"];
		$this->jenis = $post["jenis"];
		$this->bf = $post["bf"];
		$this->cf = $post["cf"];
		$this->cbf = $post["cbf"];
		return $this->db->update($this->_table, $this, array('id_substance' => $post['id']));
	}

	public function delete()
	{
		return $this->db->delete($this->_table, array("id_substance" => $id));
	}

	function tampil_data()
    {  
        $query = $this->db->get('substances');
        return $query;
    }


}