<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mCustomer');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $id_cus = $data['user']['id_customer'];

        $data['order'] = $this->mCustomer->getHistory($id_cus);

        $this->load->view('template/header', $data);
        $this->load->view('customer/profile', $data);
        $this->load->view('template/footer');
    }
}
