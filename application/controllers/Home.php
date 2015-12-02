<?php
/**
 * 首页
 */
class Home extends TB_Controller
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
        $data['category_data'] = $this->category_model->getList(array(),0,0,"id DESC, orders DESC");
        $data['article_data'] = $this->article_model->getList(array(),10,0,"id DESC, orders DESC");
        $this->load->view("header",$data);
        $this->load->view("home",$data);
        $this->load->view("footer");
    }
}
?>