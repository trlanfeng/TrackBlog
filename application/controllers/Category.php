<?php

/**
 * 栏目管理
 */
class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //加载model
        $this->load->model('category_model');
        $this->load->model('article_model');
    }

    public function index($id)
    {
        $this->showlist($id);
    }

    public function showlist($id, $page = 1)
    {
        $data = $this->category_model->getOne($id);
        $filter = array();
        $catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
        $data['cat'] = $data['id'];
        $data['catlist'] = $catList;
        $data['cat'] = $id;
        $data['uppage'] = $page - 1;
        if ($data['uppage'] <= 0)
        {
            $data['uppage'] = 1;
        }
        $data['downpage'] = $page + 1;
        $filter = array(
            "cat" => $id
        );
        $data['articleList'] = $this->article_model->getList($filter, 10, ($data['uppage'] - 1) * 10, "orders ASC");
        $data['catname'] = $this->getCatnameById($id);
        $data['contentType'] = "category";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/category', $data);
        $this->load->view('templates/footer');
    }

    public function getCatnameById($id)
    {
        $cat = $this->category_model->getOne($id);
        return $cat['name'];
    }
}

?>