<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ModelProduct");
        $this->load->model("ModelUser");
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Data Product';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["products"] = $this->ModelProduct->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view("product/list", $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Tambah Product';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["satuan"] = $this->ModelProduct->getSatuan()->result();
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("product/new_form");
            $this->load->view('templates/footer');
        } else {
            $product = $this->ModelProduct;
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('product');
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('product');

        $product = $this->ModelProduct;
        $data["product"] = $product->getById($id);
        $data['judul'] = 'Edit Product';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data["satuan"] = $this->ModelProduct->getSatuan()->result();
        
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view("product/edit_form", $data);
            $this->load->view('templates/footer');
        } else {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect('product');
        }
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->ModelProduct->delete($id)) {
            redirect(site_url('product'));
        }
    }
}
