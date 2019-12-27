<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    // public function __construct()
    // {
    //     cek_login();
    // }

    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Pass', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('user/login');
            $this->load->view('template/footer');
        } else {
            $em = $this->input->post('email');
            $pass = $this->input->post('password');

            $cek = $this->db->get_where('customer', ['email' => $em])->row_array();
            if ($cek) {
                if ($pass == $cek['password']) {
                    $data = [
                        'email' => $cek['email']
                    ];
                    $this->session->set_userdata($data);

                    redirect('customer');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('user/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tidak ada Akun</div>');
                redirect('user/login');
            }
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[customer.email]', [
            'is_unique' => 'Email sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('user/registration');
            $this->load->view('template/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => ($this->input->post('password')),
                'no_hp' => htmlspecialchars($this->input->post('phone', true)),
                'alamat' => htmlspecialchars($this->input->post('address', true)),
                'role' => 2
            ];
            $this->db->insert('customer', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registration Successful !</div>');
            redirect('user/login');
        }
    }

    public function order()
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $data['kertas'] = $this->db->get('ukuran_kertas')->result_array();

        $this->form_validation->set_rules('kertas', 'Kertas', 'required|trim');
        $this->form_validation->set_rules('qty', 'Qty', 'required|trim');
        #$this->form_validation->set_rules('file', 'File', 'required|trim');
        $id_c = $data['user']['id_customer'];

        $qq = " SELECT * FROM orderan, isi_order, ukuran_kertas, customer
        WHERE customer.id_customer = orderan.id_customer
        AND orderan.status_order = 'BELUM BAYAR'
        AND orderan.id_order = isi_order.id_order
        AND isi_order.id_ukuran_kertas = ukuran_kertas.id AND orderan.id_customer = 4
        ";
        $data['order'] = $this->db->query($qq)->result_array();

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('user/order');
            $this->load->view('template/footer');
        } else {

            $q = "SELECT * 
            FROM orderan 
            WHERE id_customer = $id_c 
            AND status_order = 'BELUM BAYAR'
            ";

            $cek = $this->db->query($q)->row_array();
            $uk = $this->input->post('kertas');
            $full_uk = $this->db->get_where('ukuran_kertas', ['kertas' => $uk])->row_array();

            if (!$cek) {
                $data_order = [
                    'id_customer' => $id_c,
                    'tgl_order' => date('d-m-Y'),
                    'jumlah_order' => 1, #sementara
                    'status_order' => 'BELUM BAYAR'
                ];
                $this->db->insert('orderan', $data_order);


                $q2 = "SELECT * 
                FROM orderan 
                WHERE id_customer = $id_c
                AND status_order = 'BELUM BAYAR' 
                ";

                $cek2 = $this->db->query($q2)->row_array();

                $upload = $_FILES['file']['name'];

                if ($upload) {
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size']     = '1024';
                    // $config['max_width'] 	= '1024';
                    // $config['max_height'] 	= '768';
                    $config['upload_path'] = './assets/data_print/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {


                        $new_file = $this->upload->data('file_name');
                        $this->db->set('file', $new_file);
                    }
                  #  $this->db->update('isi_order');
                }

                $data_isi_order = [
                    'id_order' => $cek2['id_order'],
                    'id_ukuran_kertas' => $uk,
                    'jumlah' =>  $this->input->post('qty'),

                ];
                $this->db->insert('isi_order', $data_isi_order);
            } else {

                $upload = $_FILES['file']['name'];

                if ($upload) {
                    $config['allowed_types'] = 'jpg|png';
                    $config['max_size']     = '1024';
                    // $config['max_width'] 	= '1024';
                    // $config['max_height'] 	= '768';
                    $config['upload_path'] = './assets/data_print/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('file')) {


                        $new_file = $this->upload->data('file_name');
                        $this->db->set('file', $new_file);
                    }
                   # $this->db->update('isi_order');
                }

                $data_isi_order = [
                    'id_order' => $cek['id_order'],
                    'id_ukuran_kertas' => $uk,
                    'jumlah' =>  $this->input->post('qty'),

                ];
                $this->db->insert('isi_order', $data_isi_order);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Daftar</div>');
            redirect('user/order');
        }
    }
}
