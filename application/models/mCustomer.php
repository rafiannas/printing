<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mCustomer extends CI_Model
{
    public function getHistory($id_cus)
    {

        $q = "SELECT * FROM orderan, status_order
        WHERE id_customer = $id_cus
        AND orderan.status_order = status_order.id
        ";
        $data = $this->db->query($q)->result_array();
        return $data;
    }
}
