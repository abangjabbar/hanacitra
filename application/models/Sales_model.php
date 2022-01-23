<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sales_model extends CI_Model
{
    function get_barang($orderId)
    {
        $query = $this->db->select('barang.*,harga_barang.id as harga_barang_id,harga_barang.harga_item,harga_barang.total_harga,kualitas.kualitas_nama,subkualitas.subkualitas_nama')->from('barang')
            ->join('harga_barang', 'barang.id = harga_barang.barang_id', 'LEFT')
            ->join('kualitas', 'barang.kualitas = kualitas.id_kualitas', 'LEFT')
            ->join('subkualitas', 'barang.subkualitas = subkualitas.id_subkualitas', 'LEFT')
            ->where('barang.order_id', $orderId);
        return $query->get()->result();
    }

    function get_order($orderId)
    {
        $query  = $this->db->select('order.*,harga_order.id as harga_order_id,harga_order.grand_total,harga_order.ppn,harga_order.diskon')
            ->from('order')
            ->join('harga_order', 'order.id = harga_order.order_id', 'LEFT')
            ->where('order.id', $orderId);
        return $query->get()->result()[0];
    }

    function getOrderList()
    {
        $query = $this->db->select('order.*,harga_order.grand_total')->from('order')
            ->join('harga_order', 'order.id = harga_order.order_id', 'LEFT')
            ->order_by('id', 'desc');
        return $query->get()->result();
    }

    function update_harga($input, $user)
    {
        $data = [
            "ppn" => $input->post('ppn'),
            "diskon" => $input->post('diskon'),
            "grand_total" => $input->post('grand_total'),
            "id" => $input->post('id'),
            "order_id" => $input->post('order_id'),
        ];

        //save harga order
        if ($input->post('id') == NULL) {
            $this->db->insert('harga_order', $data);
        } else {
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('harga_order', $data);
        }

        //save  order
        $data = [
            "status" => "Order Berhasil, Menunggu Bukti Pembayaran"
        ];
        $this->db->where('id', $input->post('order_id'));
        $this->db->update('order', $data);

        //save harga barang
        $listBarang = json_decode($input->post('listBarang'), true);
        $allData = [];
        foreach ($listBarang as $barang) {
            $data = [
                "id" => $barang['harga_barang_id'],
                "harga_item" => $barang['harga_item'],
                "total_harga" => $barang['total_harga'],
                "barang_id" => $barang['id']
            ];
            array_push($allData, $data);
        }

        if ($listBarang[0]['harga_barang_id'] == NULL) {
            $this->db->insert_batch('harga_barang', $allData);
        } else {
            $this->db->update_batch('harga_barang', $allData, 'id');
        }

        $this->set_notifikasi($input->post('order_id'), $user);
    }

    public function saveAlasan($input, $user)
    {
        $this->db->trans_start();
        $data =
            [
                "order_id" => $input->post('order_id'),
                "alasan" => $input->post('alasan')
            ];
        $this->db->insert('alasan', $data);

        //save  status
        $data = [
            "status" => "Menunggu Submit Revisi"
        ];
        $this->db->where('id', $input->post('order_id'));
        $this->db->update('order', $data);

        $this->set_notifikasi($input->post('order_id'), $user);

        $this->db->trans_complete();
    }

    public function set_notifikasi($orderId, $user)
    {
        $notifikasi = array(
            'order_id' => $orderId,
            'executor' => $user['id'],
            'recipient_role_id' => 6,
        );
        $this->db->insert('notifikasi', $notifikasi);
    }

    public function get_history($orderId)
    {
        $query  = $this->db->select('alasan.*')
            ->from('alasan')
            ->where('alasan.order_id', $orderId)
            ->order_by('id', 'desc');
        return $query->get()->result();
    }

    public function get_id_order($orderId)
    {
        return  $this->db->get_where('order', ['id' => $orderId])->row_array();
    }

    public function getDataImage($order_id)
    {
        return $this->db->get_where('po_image', ['order_id' => $order_id])->result_array();
    }

    public function submit_order($user)
    {
        $this->db->trans_start();
        $data = [
            "status" => "Pembayaran Terkonfirmasi",
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('order', $data);

        $notifikasiClient = array(
            'order_id' => $this->input->post('id'),
            'executor' =>  $user['id'],
            'recipient_role_id' =>  6,
        );

        $notifikasiProduksi = array(
            'order_id' => $this->input->post('id'),
            'executor' =>  $user['id'],
            'recipient_role_id' =>  3,
        );

        $notifikasiBatch = [$notifikasiClient, $notifikasiProduksi];

        $this->db->insert_batch('notifikasi', $notifikasiBatch);

        $this->db->trans_complete();
    }
}
