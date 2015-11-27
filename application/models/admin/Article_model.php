<?php
class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getOne($id)
    {
        $query = $this->db->get_where('cms_admin',array('id'=>$id));
        return $query->row_array();
    }
    public function getList()
    {
        $query = $this->db->get('cms_cms');
        return $query->result();
    }
    public function add()//
    {

    }
    public function edit()
    {

    }
    public function delete()
    {

    }
}
?>