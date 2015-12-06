<?php
/**
 * 首页
 */
class Index extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //加载model
        $this->load->model('article_model');
        $this->load->model('category_model');
    }
    public function index()
    {
        $filter = array();
        $data['catlist'] = $this->category_model->getList($filter, 0, 0, 'orders ASC');
        $data['cat'] = 0;
        $data['contentType'] = "index";
        $this->load->view("templates/header",$data);
        $this->load->view("templates/index",$data);
        $this->load->view("templates/footer");
    }
}
?>