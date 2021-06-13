<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');
date_default_timezone_set('Asia/Jakarta');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model("ModelTransaksi");
        $this->load->model("ModelUser");
    }

    public function index()
    {
        $id_user = $this->session->userdata('id');
        $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $data['user'] = $user['nama'];

        $dtb = $this->ModelTransaksi->getTemp($id_user);

        if ($dtb < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert massege
            alert-danger"role="alert">Tidak Ada Merch dikeranjang</div>');
            redirect(base_url());
        } else {
            $data['temp'] = $this->ModelTransaksi->getTemp($id_user);
            $data['tempList'] = $this->ModelTransaksi->getTempList($id_user);
        }
        $data['judul'] = "Data Transaksi";

        $this->load->view('templates/templates-user/header', $data);
        $this->load->view('transaksi/data-transaksi', $data);
        $this->load->view('templates/templates-user/modal');
        $this->load->view('templates/templates-user/footer');
    }

    public function tambahOrder()
    {
        $qty = $this->input->post('qty', true);
        $product_id = $this->input->post('product_id', true);
        print_r('tai', $qty);
        $d = $this->db->query("Select * from product where product_id='$product_id'")->row();

        $isi = [
            'product_id' => $product_id,
            'name' => $d->name,
            'id_user' => $this->session->userdata('id'),
            'email_user' => $this->session->userdata('email'),
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'image' => $d->image,
            'qty' => $qty,
            'price' => $d->price,
            'description' => $d->description,
        ];

        $userid = $this->session->userdata('id');

        $datatransaksi = $this->db->query("select * from temp where id_user='$userid' and product_id ='$product_id'")->num_rows();
        if ($datatransaksi > 0) {
            $this->session->set_flashdata('pesan', '<div class="alert alertdanger alertmessage" role="alert">Masih Ada jenis merch yang sama ada dikeranjang.</div>');
            redirect(base_url());
        }

        $this->ModelTransaksi->insertData('temp', $isi);

        $this->session->set_flashdata('pesan', '<div class="alert alertsuccess alertmessage" role="alert">Merch berhasil ditambahkan ke keranjang </div>');
        redirect(base_url() . 'home');
    }

    public function hapusOrder()
    {
        $product_id = $this->uri->segment(3);
        $id_user = $this->session->userdata('id');

        $this->ModelTransaksi->deleteData(['product_id' => $product_id], 'temp');
        $kosong = $this->db->query("select*from temp where id_user='$id_user'")->num_rows();

        if ($kosong < 1) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-danger" role="alert">Tidak Ada Item dikeranjang</div>');
            redirect(base_url());
        } else {
            redirect(base_url() . 'order');
        }
    }

    public function orderSelesai($where)
    {
        $transaksi = $this->db->query("SELECT * FROM temp WHERE id_user = $where")->result_array();

        $orderArray = array();
        $index = 0;
        foreach ($transaksi as $data_order) {
            $add_data = array(
                'product_id' => $data_order['product_id'],
                'price' => $data_order['price'],
                'user_id' => $data_order['id_user'],
                'tgl_transaksi' => $data_order['tgl_transaksi'],
                'qty' => $data_order['qty'],
                'total_price' => $data_order['price']*$data_order['qty'],
                'description' => $data_order['description'],
            );
            array_push($orderArray, $add_data);
            $index++;
        }
        $this->ModelTransaksi->insertOrder($orderArray);
        $this->ModelTransaksi->kosongkanOrder('temp',$where);

        $this->session->set_flashdata('pesan', '<div class="alert alert-massege alert-success" role="alert">Order Selesai, Pesanan akan segera diproses</div>');
        redirect(base_url());
    }
}
