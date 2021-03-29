<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('ModelUser');
        $this->load->model('ModelProduct');
        $this->load->model("ModelTransaksi");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['total_anggota'] = $this->ModelUser->totalAnggota()->row();
        $data['total_product'] = $this->ModelProduct->totalProduct()->row();
        $data['total_transaksi'] = $this->ModelTransaksi->totalTransaksi()->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
