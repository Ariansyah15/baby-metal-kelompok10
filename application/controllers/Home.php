<?php
class Home extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model("ModelProduct");
        $this->load->model("ModelUser");
        $this->load->model("ModelTransaksi");
    }
    public function index() {
        $data = [ 'judul' => "Toko BabyMetal", 'merch' => $this->ModelProduct->getAll(), ];
        //jika sudah login dan jika belum login
        if ($this->session->userdata('email')) {
            $user = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
            
            $data['user'] = $user['nama'];
            $temp = $this->ModelTransaksi->getTemp($user['id']);
            $data['temp'] = $temp;
            
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('merch/daftarmerch', $data);
            $this->load->view('templates/templates-user/modal', $data);
            $this->load->view('templates/templates-user/footer', $data);
        } else {
            $data['user'] = 'Pengunjung';
            $this->load->view('templates/templates-user/header', $data);
            $this->load->view('merch/daftarmerch', $data);   
            $this->load->view('templates/templates-user/modal', $data);
            $this->load->view('templates/templates-user/footer', $data);
        }
    }
}