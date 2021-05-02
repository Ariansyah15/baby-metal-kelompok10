<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTransaksi extends CI_Model
{
    private $_table = "transaksi";

    public $transaksi_id;
    public $product_id;
    public $price;
    public $satuan_id;
    public $address;
    public $description;
    public $user_id;
    public $tgl_transaksi;
    public $qty;
    public $total_price;

    public function getAll()
    {
        if($this->session->userdata('role_id') == 1) {
            $this->db->select('transaksi.transaksi_id, transaksi.product_id, transaksi.price, transaksi.satuan_id, transaksi.qty, transaksi.total_price, transaksi.user_id, transaksi.tgl_transaksi, transaksi.address, transaksi.description, product.name, product.price, satuan.nama_satuan, user.nama, user.id', FALSE);
            $this->db->join('product','transaksi.product_id = product.product_id', 'left');
            $this->db->join('satuan','transaksi.satuan_id = satuan.satuan_id', 'left');
            $this->db->join('user','transaksi.user_id = user.id', 'left');
        } else {
            $this->db->select('transaksi.transaksi_id, transaksi.product_id, transaksi.price, transaksi.satuan_id, transaksi.qty, transaksi.total_price, transaksi.user_id, transaksi.tgl_transaksi, transaksi.address, transaksi.description, product.name, product.price, satuan.nama_satuan, user.nama, user.id', FALSE);
            $this->db->join('product','transaksi.product_id = product.product_id', 'left');
            $this->db->join('satuan','transaksi.satuan_id = satuan.satuan_id', 'left');
            $this->db->join('user','transaksi.user_id = user.id', 'left');
            $this->db->where('transaksi.user_id', $this->session->userdata('id'));
        }
        $query = $this->db->get('transaksi')->result();
        return $query;
    }

    public function getById($id)
    {
        $this->db->select('transaksi.transaksi_id, transaksi.product_id, transaksi.price, transaksi.satuan_id, transaksi.qty, transaksi.total_price, transaksi.user_id, transaksi.tgl_transaksi, transaksi.address, transaksi.description, product.name, product.price, satuan.nama_satuan, user.nama', FALSE);
        $this->db->join('product','transaksi.product_id = product.product_id', 'left');
        $this->db->join('satuan','transaksi.satuan_id = satuan.satuan_id', 'left');
        $this->db->join('user','transaksi.user_id = user.id', 'left');
        $this->db->where('transaksi.transaksi_id', $id);
        $query = $this->db->get('transaksi')->row();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = $post["product_id"];
        $this->price = $post["price"];
		$this->satuan_id = $post["satuan_id"];
		$this->address = $post["address"];
        $this->description = $post["description"];
        $this->user_id = $post["user_id"];
        $this->tgl_transaksi = $post["tgl_transaksi"];
        $this->qty = $post["qty"];
        $this->total_price = $post["total_price"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->transaksi_id = $post["id"];
        $this->product_id = $post["product_id"];
        $this->price = $post["price"];
		$this->satuan_id = $post["satuan_id"];
		$this->address = $post["address"];
        $this->description = $post["description"];
        $this->user_id = $post["user_id"];
        $this->tgl_transaksi = $post["tgl_transaksi"];
        $this->qty = $post["qty"];
        $this->total_price = $post["total_price"];
        $this->db->update($this->_table, $this, array('transaksi_id' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("transaksi_id" => $id));
	}
	
    function get_product($product_id)
    {
        $this->db->select('product.price, product.satuan_id, satuan.nama_satuan', FALSE);
        $this->db->from('product');
        $this->db->where('product_id', $product_id);
        $this->db->join('satuan','product.satuan_id = satuan.satuan_id', 'left');
        $this->db->order_by('product_id', 'ASC');
        $query = $this->db->get();
        return $query;
    }

    public function totalTransaksi()
    {
        $this->db->select('COUNT(transaksi_id) as transaksi_id', FALSE);
        $query = $this->db->get('transaksi');
        return $query;
    }
}
