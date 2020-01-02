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
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header', $data);
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function login()
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('password', 'Pass', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('user/login');
            $this->load->view('template/footer');
        } else {
            $em = $this->input->post('email');
            $pass = $this->input->post('password');

            $cek = $this->db->get_where('customer', ['email' => $em])->row_array();
            if ($cek) {
                if ($pass == $cek['password']) {
                    $data = [
                        'id_customer' => $cek['id_customer'],
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
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
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
                'nama' => htmlspecialchars($this->input->post('nama', true)),
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
        $cek_user = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        if (!$cek_user) {
            echo " <script>
				alert('Daftar / Masuk Terlebih dahulu');
				document.location.href = 'login'
			</script>
		";
        }


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
        AND isi_order.id_ukuran_kertas = ukuran_kertas.id AND orderan.id_customer = $id_c
        ";
        $data['order'] = $this->db->query($qq)->result_array();

        if ($this->form_validation->run() == false) {

            $this->load->view('template/header', $data);
            $this->load->view('user/order', $data);
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
                    'tgl_order' => date("Y-m-d"),
                    'jumlah_order' => 0, #sementara
                    'status_order' => 'BELUM BAYAR',
                    'jumlah_order ' => 0,
                    'total_harga' => 0
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
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|xlsx';
                    $config['max_size']     = '5120';
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
                $qqty = $this->input->post('qty');
                $data_isi_order = [
                    'id_order' => $cek2['id_order'],
                    'id_ukuran_kertas' => $uk,
                    'jumlah' => $qqty,

                ];
                $this->db->insert('isi_order', $data_isi_order);

                $update = $cek2['jumlah_order'] + 1;

                $this->db->set('jumlah_order', $update);
                $this->db->where('id_order', $cek2['id_order']);
                $this->db->update('orderan');
            } else {

                $upload = $_FILES['file']['name'];

                if ($upload) {
                    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|xlsx';
                    $config['max_size']     = '5120';
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

                $update = $cek['jumlah_order'] + 1;

                $this->db->set('jumlah_order', $update);
                $this->db->where('id_order', $cek['id_order']);
                $this->db->update('orderan');
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Daftar</div>');
            redirect('user/order');
        }
    }

    public function kertas($id)
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $qk = "SELECT * FROM ukuran_kertas 
        WHERE id_tipe = $id
        ";

        $data['kertas'] = $this->db->query($qk)->result_array();
        $this->load->view('template/header', $data);
        $this->load->view('user/kertas', $data);
        $this->load->view('template/footer');
    }

    public function kontak()
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('template/header', $data);
        $this->load->view('user/kontak', $data);
        $this->load->view('template/footer');
    }
    public function plus($id)
    {
        $isi_order = $this->db->query("SELECT * FROM isi_order WHERE id_isi_order = $id")->row_array();
        $id_k = $isi_order['id_ukuran_kertas'];
        $barang = $this->db->query("SELECT * FROM ukuran_kertas WHERE id = $id_k")->row_array();

        $data = [
            'jumlah' => $jmh = $isi_order['jumlah'] + 1
            # $hrg = $id_k['harga'] * $jmh;
        ];

        $this->db->where('id_isi_order', $id);
        $this->db->update('isi_order', $data);
        redirect('user/order');
    }

    public function minus($id)
    {

        $isi_order = $this->db->query("SELECT * FROM isi_order WHERE id_isi_order = $id")->row_array();

        if ($isi_order['jumlah'] == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Barang dibeli minimal 1!</div>');
            redirect('user/order');
        }

        $id_k = $isi_order['id_ukuran_kertas'];
        $barang = $this->db->query("SELECT * FROM ukuran_kertas WHERE id = $id_k")->row_array();

        $data = [
            'jumlah' => $jmh = $isi_order['jumlah'] - 1
            # $hrg = $id_k['harga'] * $jmh;
        ];

        $this->db->where('id_isi_order', $id);
        $this->db->update('isi_order', $data);
        redirect('user/order');
    }
    public function hapus($id)
    {
        $this->db->where('id_isi_order', $id);
        $this->db->delete('isi_order');
        //------------------------------------------
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        $id_cus = $data['user']['id_customer'];

        $data['order'] = $this->db->get_where('orderan', ['id_customer' => $id_cus])->row_array();
        $id_ord = $data['order']['id_order'];
        $jmh_ord =  $data['order']['jumlah_order'] - 1;


        $this->db->set('jumlah_order', $jmh_ord);
        $this->db->where('id_order', $id_ord);
        $this->db->update('orderan');
        //---------------------------------------

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus list order</div>');
        redirect('user/order');
    }

    public function s_checkout($total)
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        $id_cus = $data['user']['id_customer'];

        $data['order'] = $this->db->get_where('orderan', ['id_customer' => $id_cus])->row_array();
        $id_ord =  $data['order']['id_order'];


        $this->db->set('total_harga', $total);
        $this->db->where('id_order', $id_ord);
        $this->db->update('orderan');

        redirect('user/checkout');
    }


    public function checkout()
    {
        $data['user'] = $this->db->get_where('customer', ['email' => $this->session->userdata('email')])->row_array();
        $id_cus = $data['user']['id_customer'];

        $q = "SELECT * 
        FROM orderan, customer 
        WHERE orderan.status_order = 'BELUM BAYAR' 
        AND customer.id_customer = orderan.id_customer 
        AND orderan.id_customer = $id_cus ";



        $data['order'] = $this->db->query($q)->row_array();
        $id_ord = $data['order']['id_order'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('number', 'Number', 'required|trim');

        #$this->form_validation->set_rules('file', 'File', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('user/checkout', $data);
            $this->load->view('template/footer');
        } else {

            $name = $this->input->post('nama');
            $email = $this->input->post('alamat');
            $email = $this->input->post('number');

            $upload = $_FILES['file']['name'];

            if ($upload) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '2048';
                // $config['max_width'] 	= '1024';
                // $config['max_height'] 	= '768';
                $config['upload_path'] = './assets/img/bukti_booking/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {


                    $new_file = $this->upload->data('file_name');
                    $this->db->set('bukti_booking', $new_file);
                }
            }
            $this->db->set('status_order', 'BAYAR DP');
            $this->db->where('id_order', $id_ord);
            $this->db->update('orderan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil masukin Bukti</div>');
            redirect('customer');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');

        echo " <script>
        alert('Berhasil Keluar');
        document.location.href = 'index'
    </script>
";
    }

    public function selesai()
    {
        $this->load->view('template/header');
        $this->load->view('user/selesai');
        $this->load->view('template/footer');
    }
}
