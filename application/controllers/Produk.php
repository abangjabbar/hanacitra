<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}

	public function index()
	{
		$this->data['dataProduk'] = $this->produk_model->getProduk('produk');
		$this->load->view('customer/produk_cart', $this->data);
	}

	public function add($id)
	{
		$ambilData = $this->produk_model->getProdukCart('produk', $id);
		$data = array('id' => $ambilData->id_produk,
					'qty' => 1,
					'price' => $ambilData->harga_produk,
					'name' => $ambilData->nama_produk);
		$this->cart->insert($data);
		$this->load->view('customer/keranjang_belanja');
	}

	public function show()
	{
		$lihatKeranjang = $this->cart->contents();
		echo '<pre>';
		print_r($lihatKeranjang);
	}

	public function hapus($rowid)
	{
		$this->cart->update(array('rowid' => $rowid, 'qty' => 0));
		$this->load->view('customer/keranjang_belanja');
	}

	public function update()
	{
		$i = 1;
		foreach ($this->cart->contents() as $produk){
			$this->cart->update(array('rowid' => $produk['rowid'], 'qty' => $_POST['qty'.$i]));
			$i++;

		}
		$this->load->view('customer/keranjang_belanja');
	}

}