<?php
public function cetak_laporan_product()
{
	$data['product'] = $this->ModelProduct->getProduct()->result_array();
	$data['kategori'] = $this->ModelProduct->getKategori()->result_array();

	$this->load->view('product/laporan_print_product',$data);
}