<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
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

        //mengupdate stok dan dibooking pada tabel product
        $detail = $this->db->query("SELECT*FROM transaksi,transaksi_detail WHERE DAY(curdate()) < DAY(batas_ambil
) AND transaksi.id_transaksi=transaksi_detail.id_transaksi")->result_array();
        foreach ($detail as $key)
        {
            $id_product = $key['id_product'];
            $batas = $key['tgl_transaksi'];
            $tglawal = date_create($batas);
            $tglskrg = date_create();
            $beda = date_diff($tglawal, $tglskrg);
            if ($beda->days > 2)
            {
                $this->db->query("UPDATE product SET stok=stok+1, dibooking=dibooking-1 WHERE id='$id_product'");
            }
        }
        //menghapus otomatis data booking yang sudah lewat dari 2 hari
        $transaksi = $this->ModelTransaksi->getData('transaksi');
        if (!empty($transaksi))
        {
            foreach ($transaksi as $transaksi)
            {
                $id_booking = $transaksi->id_booking;
                $tglbooking = $transaksi->tgl_booking;
                $tglawal = date_create($tglbooking);
                $tglskrg = date_create();
                $beda = date_diff($tglawal, $tglskrg);
                if ($beda->days > 2) {
                    $this->db->query("DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
                    $this->db->query("DELETE FROM transaksi_detail WHERE id_transaksi='$id_transaksi'");
                }
            }
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
