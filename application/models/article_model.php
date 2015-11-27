<?php
class Article_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function getOne($id)
    {
        $query = $this->db->get_where('cms_cms',array('id'=>$id));
        return $query->row_array();
    }
    public function getList($filter = array(),$limit = 0,$offset = 0,$order ="")
    {
        $this->db->order_by($order);
        $query = $this->db->get_where('cms_cms',$filter,$limit,$offset);
        return $query->result_array();
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