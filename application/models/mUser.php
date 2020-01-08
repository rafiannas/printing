<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mUser extends CI_Model
{
    public function getOrder($id_c)
    {
        $qq = " SELECT * FROM orderan, isi_order, ukuran_kertas, customer
        WHERE customer.id_customer = orderan.id_customer
        AND orderan.status_order = 'BELUM BAYAR'
        AND orderan.id_order = isi_order.id_order
        AND isi_order.id_ukuran_kertas = ukuran_kertas.id AND orderan.id_customer = $id_c
        ";
        $data = $this->db->query($qq)->result_array();
        return $data;
    }

    public function cekOrder($id_c)
    {
        $q = "SELECT * 
        FROM orderan 
        WHERE id_customer = $id_c 
        AND status_order = 'BELUM BAYAR'
        ";
        $data = $this->db->query($q)->row_array();
        return $data;
    }

    public function getKertas($id)

    {
        $qk = "SELECT * FROM ukuran_kertas 
        WHERE id_tipe = $id
        ";
        $data = $this->db->query($qk);

        return $data->result_array();
    }

    public function getCheckout($id_cus)
    {
        $q = "SELECT * 
        FROM orderan, customer 
        WHERE orderan.status_order = 'BELUM BAYAR' 
        AND customer.id_customer = orderan.id_customer 
        AND orderan.id_customer = $id_cus ";

        $data = $this->db->query($q)->row_array();
        return $data;
    }

    public function getDetailOrder($id)
    {
        $q = "SELECT * FROM orderan, isi_order,ukuran_kertas
        WHERE orderan.id_order = isi_order.id_order
        AND orderan.id_order = $id
        AND isi_order.id_ukuran_kertas = ukuran_kertas.id
        
        ";
        $data = $this->db->query($q)->result_array();
        return $data;
    }
    public function forOrder($id)
    {
        $q = "SELECT * FROM orderan, status_order 
        WHERE orderan.id_order = $id 
        AND orderan.status_order = status_order.id
        ";

        $data = $this->db->query($q)->row_array();
        return $data;
    }
}
