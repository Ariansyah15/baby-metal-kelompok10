<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProduct extends CI_Model
{
    private $_table = "product";

    public $product_id;
    public $name;
    public $price;
    public $image = "default.jpg";
    public $description;
    public $satuan_id;

    public function getAll()
    {
        $this->db->select('product.product_id, product.name, product.price, product.image, product.description, satuan.nama_satuan', FALSE);
        $this->db->join('satuan','product.satuan_id = satuan.satuan_id', 'left');
        $query = $this->db->get('product')->result();
        return $query;
    }

    public function getSatuan($where = null)
    {
        return $this->db->get_where('satuan', $where);
    }
    
    public function getById($id)
    {
        $this->db->select('product.product_id, product.name, product.price, product.image, product.description, product.satuan_id, satuan.nama_satuan', FALSE);
        $this->db->where('product_id', $id);
        $this->db->join('satuan','product.satuan_id = satuan.satuan_id', 'left');
        $query = $this->db->get('product')->row();
        return $query;
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post["name"];
		$this->price = $post["price"];
		$this->image = $this->_uploadImage();
        $this->description = $post["description"];
        $this->satuan_id = $post["satuan"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
		$this->price = $post["price"];
		$this->satuan_id = $post["satuan"];
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->description = $post["description"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './assets/img/product/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = 'img' . time();
		$config['overwrite']			= true;
		$config['max_size']             = 1024; // 1MB
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."assets/img/product/$filename.*"));
		}
	}

    public function totalProduct()
    {
        $this->db->select('COUNT(product_id) as product_id', FALSE);
        $query = $this->db->get('product');
        return $query;
    }
}
