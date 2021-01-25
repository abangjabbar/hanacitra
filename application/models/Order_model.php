<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model
{
	private $_table = "orders";

	public $id_order;
	public $nomor_po;
	public $jenis;	
	public $jumlah;
	public $alamat;
	public $tanggal;
	public $image = "default.jpg";
	public $spesifikasi;
	public $dimensi;
	public $kualitas;
	public $subkualitas;
	public $harga_subkualitas;
	public $deskripsi;

	public function rules()
	{
		return [
			['field' => 'nomor_po',
			'label' => 'nomor_po',
			'rules' => 'required'],

			['field' => 'jenis',
			'label' => 'Jenis',
			'rules' => 'required'],

			['field' => 'jumlah',
			'label' => 'Jumlah',
			'rules' => 'required'],

			['field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'],

			['field' => 'spesifikasi',
			'label' => 'Spesifikasi',
			'rules' => 'required'],

			['field' => 'dimensi',
			'label' => 'Dimensi',
			'rules' => 'required'],
			
			['field' => 'deskripsi',
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
		return $this->db->get_where($this->_table, ["id_order" => $id])->row();
	}
 	
	public function save()
	{
		$post = $this->input->post();
		$this->id_order = uniqid();
		$this->nomor_po = $post["nomor_po"];
		$this->jenis = $post["jenis"];
		$this->jumlah = $post["jumlah"];
		$this->alamat = $post["alamat"];
		$this->tanggal = $post["tanggal"];
		$this->image = $this->_uploadImage();
		$this->spesifikasi = $post["spesifikasi"];
		$this->dimensi = $post["dimensi"];
		$this->kualitas = $post["kualitas"];
		$this->subkualitas = $post["subkualitas"];
		$this->harga_subkualitas = $post["harga_subkualitas"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->insert($this->_table, $this);
	}

	function get_kualitas(){
        $this->db->select('nomor_po,jenis,jumlah,alamat,tanggal,image,spesifikasi,dimensi,kualitas_nama,subkualitas_nama,harga_subkualitas,deskripsi');
        $this->db->from('orders');
        $this->db->join('kualitas','kualitas = id_kualitas','left');
		$this->db->join('subkualitas','subkualitas = id_subkualitas','left');
        $query = $this->db->get();
        return $query;
    }


	public function update()
	{
		$post = $this->input->post();
		$this->id_order = $post["id"];
		$this->nomor_po = $post["nomor_po"];
		$this->jenis = $post["jenis"];
		$this->jumlah = $post["jumlah"];
		$this->alamat = $post["alamat"];
		$this->tanggal = $post["tanggal"];

		if (!empty($_FILES["image"]["name"])) {
		    $this->image = $this->_uploadImage();
		} else {
		    $this->image = $post["old_image"];
		}

		$this->spesifikasi =$post["spesifikasi"];
		$this->dimensi = $post["dimensi"];
		$this->substances = $post["substances"];
		$this->deskripsi = $post["deskripsi"];
		return $this->db->update($this->_table, $this, array('id_order' => $post['id']));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array("id_order" => $id));
	}

    private function _uploadImage()
    {
        $config['upload_path']          = './upload/order/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $this->id_order;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            return $this->upload->data("file_name");
        }
        
        return "default.jpg";
    }

    function tampilData()
    {  
        $query = $this->db->get('orders');
        return $query;
    }


}