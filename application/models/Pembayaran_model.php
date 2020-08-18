<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
	private $_table = "pembayaran";

	public $id_pembayaran;
	public $id_order;
	public $no_po;
	public $jumlah;
	public $harga_satuan;
	public $harga_total;
	public $ppn;
	public $bukti_pebayaran = "default.jpg";
	public $tgl_pembayaran;
	public $surat_po = "default.jpg";
	public $status_pembayaran;

	public function rules()
	{
		return [
			['field' => 'no_po',
			'label' => 'Nomor PO',
			'rules' => 'required'],

			['field' => 'Jumlah',
			'label' => 'Harga Total',
			'rules' => 'required'],

			['field' => 'harga_satuan',
			'label' => 'Harga Satuan',
			'rules' => 'required'],

			['field' => 'harga_total',
			'label' => 'Harga Total',
			'rules' => 'required'],

			['field' => 'ppn',
			'label' => 'PPN',
			'rules' => 'required'],

			['field]' => 'bukti_pebayaran',
			'label' => 'Bukti Pembayaran',
			'rules' => 'required'],

			['field' => 'tgl_pembayaran',
			'label' => 'Tanggal Pembayaran',
			'rules' => 'required'],

			['field' => 'surat_po',
			'label' => 'Surat PO',
			'rules' => 'required'],

			['field' => 'status_pembayaran',
			'label' => 'Status Pembayaran',
			'rules' => 'required']
			];
		}

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)

	{
		return $this->db->get_where($this->_table, ["id_pembayaran" => $id])->row();
	}

    public function getJoin()
  {
      $this->db->select('pembayaran.*, orders.id_order AS id_ordr, orders.nomor_po');
      $this->db->from('pembayaran');
      $this->db->join('orders', 'pembayaran.id_ordr = orders.id_order');
      $query = $this->db->get();
      return $query->result();
  } 
 	
	public function save()
	{
		$post = $this->input->post();
		$this->id_pembayaran = uniqid();
		$this->nomor_po = $post["nomor_po"];
		$this->jumlah = $post["jumlah"];
		$this->harga_satuan = $post["harga_satuan"];
		$this->harga_total = $post["harga_total"];
		$this->ppn = $post["ppn"];
		$this->bukti_pebayaran = $this->_uploadImage();
		$this->tgl_pembayaran = $post["tgl_pembayaran"];
		$this->surat_po = $this->_uploadImage();
		$this->status_pembayaran = $post["status_pembayaran"];
		return $this->db->insert($this->_table, $this);
	}

	public function update()
	{
		$this->id_pembayaran = $post["id"];
		$this->harga_satuan = $post["harga_satuan"];
		$this->harga_total = $post["harga_total"];
		$this->ppn = $post["ppn"];

		if (!empty($_FILES["image"]["name"])) {
		    $this->image = $this->_uploadImage();
		} else {
		    $this->image = $post["old_image"];
		}

		$this->tgl_pembayaran =$post["tgl_pembayaran"];

		if (!empty($_FILES["image"]["name"])) {
		    $this->image = $this->_uploadImage();
		} else {
		    $this->image = $post["old_image"];
		}
		$this->status_pembayaran = $post["status_pembayaran"];
		return $this->db->update($this->_table, $this, array('id_pembayaran' => $post['id']));
	}

	public function delete()
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

}