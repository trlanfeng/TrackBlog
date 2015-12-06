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
        $this->load->model('category_model');
        $this->load->model('article_model');
    }
    public function index($page = 1)
    {
        $data['cat'] = 0;
        $data['uppage'] = $page - 1;
        if ($data['uppage'] <= 0)
        {
            $data['uppage'] = 1;
        }
        $data['downpage'] = $page + 1;
        $filter = array();
        $catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
        $data['catlist'] = $catList;
        $articleList= $this->article_model->getList($filter,10,($page - 1) * 10,"id DESC");
        foreach ($articleList as $article) {
            $article['datetime'] = date('Y-m-d' ,$article['times']);
            $article['catname'] = $this->getCatnameById($article['cat']);
            $article['tagarray'] = array();
            $tagarray = explode(',', $article['tags']);
            foreach ($tagarray as $tag) {
                $tagOne['name'] = $tag;
                $tagOne['url'] = '/tag/'.$tag;
                $article['tagarray'][] = $tagOne;
            }
            $data['articleList'][] = $article;
        }
        $data['contentType'] = "index";
        $this->load->view('templates/header',$data);
        $this->load->view('templates/index',$data);
        $this->load->view('templates/footer');
    }
    public function getCatnameById($id)
    {
        $cat = $this->category_model->getOne($id);
        return $cat['name'];
    }
}
?>