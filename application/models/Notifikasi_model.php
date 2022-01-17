<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi_model extends CI_Model
{
    public function query_notif($user)
    {
        $array = array('order.user_id' => $user['id'], 'notifikasi.recipient_role_id' => 6);
        $query  = $this->db->select('notifikasi.id, notifikasi.order_id, order.order_nomor, order.status')
            ->from('notifikasi')
            ->join('order', 'order.id = notifikasi.order_id', 'INNER')
            ->where($array);
        return $query->get()->result();
    }

    public function query_notif_sales()
    {
        $query  = $this->db->select('notifikasi.id, notifikasi.order_id, order.order_nomor, order.status')
            ->from('notifikasi')
            ->join('order', 'order.id = notifikasi.order_id', 'INNER')
            ->where('notifikasi.recipient_role_id',  4);
        return $query->get()->result();
    }

    public function hapus_notif($orderId)
    {
        $notifikasi = array(
            'order_id' => $orderId,
            'recipient_role_id' =>  6,
        );
        $this->db->where($notifikasi);
        $this->db->delete('notifikasi');
    }

    public function hapus_notif_sales($orderId)
    {
        $notifikasi = array(
            'order_id' => $orderId,
            'recipient_role_id' =>  4,
        );
        $this->db->where($notifikasi);
        $this->db->delete('notifikasi');
    }
}
