<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelProduct");
        $this->load->model("ModelUser");
        $this->load->model("ModelTransaksi");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'List Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["transaksi"] = $this->ModelTransaksi->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("transaksi/list", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Buat Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["product"] = $this->ModelProduct->getAll();
        
        $this->form_validation->set_rules('product_id', 'Product id', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("transaksi/new_form");
            $this->load->view('templates/footer');
        } else {
            $transaksi = $this->ModelTransaksi;
            $transaksi->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('transaksi');
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('transaksi');

        $transaksi = $this->ModelTransaksi;
        $data["transaksi"] = $transaksi->getById($id);
        $data['judul'] = 'Edit Product';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["product"] = $this->ModelProduct->getAll();
        
        $this->form_validation->set_rules('product_id', 'Product id', 'trim|required');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');
        $this->form_validation->set_rules('qty', 'Qty', 'trim|required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("transaksi/edit_form", $data);
            $this->load->view('templates/footer');
        } else {
            $transaksi->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('transaksi');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ModelTransaksi->delete($id)) {
            redirect(site_url('transaksi'));
        }
    }

    function get_product()
    {
        $product_id = $this->input->post('id', TRUE);
        $data = $this->ModelTransaksi->get_product($product_id)->result();
        echo json_encode($data);
    }

    public function printer()
    {
        $data["transaksi"] = $this->ModelTransaksi->getAll();

        $this->load->view('transaksi/print_transaksi', $data);
    }
    
    public function export_excel()
    {
        $data = array('transaksi' => $this->ModelTransaksi->getAll());

        $this->load->view('transaksi/export_excel_transaksi', $data);
    }
}
