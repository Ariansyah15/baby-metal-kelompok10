<?php
defined('BASEPATH') or exit('No Direct script access allowed');
class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	public function laporan_product()
	{
		$data['judul'] = 'Laporan Data Product';
		$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
		$data['product'] = $this->ModelProduct->getProduct()->result_array();
		$data['kategori'] = $this->ModelProduct->getKategori()->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('product/laporan_product', $data);
		$this->load->view('templates/footer');
	}
}