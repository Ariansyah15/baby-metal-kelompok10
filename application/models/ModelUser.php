<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getAnggota($where = null)
    {
        $this->db->select('user.nama, user.email, user.image, user.is_active, user.role_id, role.role', FALSE);
        $this->db->where_in('user.email', $where);
        $this->db->join('role','user.role_id = role.role_id', 'left');
        $query = $this->db->get('user');
        return $query;
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }
    
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }

    public function totalAnggota()
    {
        $this->db->select('COUNT(id) as id', FALSE);
        $query = $this->db->get('user');
        return $query;
    }
}
