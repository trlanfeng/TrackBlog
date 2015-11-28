<?php

/**
 * 文章管理
 */
class Article extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //加载model
        $this->load->model('article_model');
    }

    public function index()
    {
        $this->show_list();
    }

    public function show_one($id)
    {
        $data = $this->article_model->getOne($id);
        $this->load->view('admin/header');
        $this->load->view('admin/article_one',$data);
        $this->load->view('admin/footer');
    }

    public function show_list()
    {
        $filter = array();
        $data['articleList'] = $this->article_model->getList($filter,15,0,"id DESC");
        $this->load->view('admin/header');
        $this->load->view('admin/article_list',$data);
        $this->load->view('admin/footer');
    }

    public function add()
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