<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');
class Pinjam extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		cek_user();
	}
	public function index()
	{

	}
	public function daftarTransaksi()
	{
		$data['judul'] = "Daftar Transaksi";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->db->query("select*from transaksi")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/daftar-transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function transaksiDetail()
    {
        $id_transaksi = $this->uri->segment(3);
        $data['judul'] = "Transaksi Detail";
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['agt_transaksi'] = $this->db->query("select*from transaksi b, user u where b.id_user=u.id and b.id_transaksi='$id_transaksi'")->result_array();
        $data['detail'] = $this->db->query("select id_product,judul_product,pengarang,penerbit,tahun_terbit from transaksi_detail d, product b where d.id_product=b.id and d.id_transaksi='$id_transaksi'")->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('booking/transaksi-detail', $data);
        $this->load->view('templates/footer');
    }

    public function pinjamAct()
    {
    	$id_transaksi = $this->uri->segment(3);
    	$lama = $this->input->post('lama', TRUE);
    	$transaksi = $this->db->query("SELECT*FROM transaksi WHERE id_transaksi='$id_transaksi'")->row();
    	$tglsekarang = date('Y-m-d');
    	$no_order = $this->ModelTransaksi->kodeOtomatis('order', 'no_order');
    	$datatransaksi = [
    		'no_order' => $no_order,
    		'id_transaksi' => $id_transaksi,
    		'tgl_order' => $tglsekarang,
    		'id_user' => $transaksi->id_user,
    		'tgl_kembali' => date('Y-md', strtotime('+' . $lama . ' days', strtotime($tglsekarang))),
    		'tgl_pengembalian' => '0000-00-00',
    		'status' => 'Order',
    		'total_denda' => 0
    	];
    	$this->ModelOrder->simpanOrder($datatransaksi);
    	$this->ModelOrder->simpanDetail($id_transaksi, $no_transaksi);
    	$denda = $this->input->post('denda', TRUE);
    	$this->db->query("update detail_order set denda='$denda'");
    	//hapus Data transaksi yang produknya diambil
    	$this->ModelOrder->deleteData('transaksi', ['id_transaksi' => $id_transaksi]);
    	$this->ModelOrder->deleteData('transaksi_detail', ['id_transaksi' => $id_transaksi]);
    	//$this->db->query("DELETE FROM transaksi WHERE id_transaksi='$id_transaksi'");
    	//update dibayar dan diorder pada tabel product saat product yang diorder diambil
    	$this->db->query("UPDATE prodeuct, detail_order SET product.diorder=product.diorder+1, product.ditransaksi=product.ditransaksi-1 WHERE product.id=detail_order.id_transaksi");
    	$this->session->set_flashdata('pesan', '<div class="alert alertmessage alert-success" role="alert">Data Transaksi Berhasil Disimpan</div>');
    	redirect(base_url() . 'order');
    }

    public function index()
    {
    	$data['judul'] = "Data Order";
    	$data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
    	$data['order'] = $this->ModelOrder->joinData();
    	$this->load->view('templates/header', $data);
    	$this->load->view('templates/sidebar', $data);
    	$this->load->view('templates/topbar', $data);
    	$this->load->view('pinjam/data-order', $data);
    	$this->load->view('templates/footer');
    }