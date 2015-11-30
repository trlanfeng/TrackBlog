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
        $this->load->model('category_model');
    }

    public function index()
    {
        $this->show_list();
    }

    public function show_list($category = 0, $page = 1)
    {
        $filter = array();
        $catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
        $data['catlist'] = $catList;
        $eachpage = 15;
        $data['catname'] = '所有栏目';
        if ($category != 0) {
            $cat = $this->category_model->getOne($category);
            $data['catname'] = $cat['name'];
            $filter = array(
                'cat' => $category
            );
        }
        $articleList = $this->article_model->getList($filter, $eachpage, ($page - 1) * $eachpage, "id DESC");
        for ($i = 0; $i < count($articleList); $i++) {
            $articleList[$i]['catname'] = $this->getCatnameById($articleList[$i]['cat']);
            $articleList[$i]['datatime'] = date('Y-m-d', $articleList[$i]['times']);
        }
        $data['articleList'] = $articleList;
        $this->load->view('admin/header');
        $this->load->view('admin/article_list', $data);
        $this->load->view('admin/footer');
    }

    public function add()
    {
        if (isset($_POST['submit'])) {
            $this->article_model->add($_POST);
        } else {
            $filter = array();
            $catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
            $data['catlist'] = $catList;
            $this->load->view('admin/header');
            $this->load->view('admin/article_add',$data);
            $this->load->view('admin/footer');
        }
    }

    public function edit($id)
    {
        if (isset($_POST['submit'])) {
            $this->article_model->edit($id, $_POST);
        } else {
            $data = $this->article_model->getOne($id);
            $filter = array();
            $catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
            $data['catlist'] = $catList;
            $this->load->view('admin/header');
            $this->load->view('admin/article_edit', $data);
            $this->load->view('admin/footer');
        }
    }

    public function delete($id)
    {
        $this->article_model->delete($id);
    }

    public function getCatnameById($id)
    {
        $cat = $this->category_model->getOne($id);
        return $cat['name'];
    }
}

?>