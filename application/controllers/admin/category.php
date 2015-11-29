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
	}
	public function index()
	{
		$this->show_list();
	}
	public function show_one($id)
	{
		$data = $this->category_model->getOne($id);
		$this->load->view('admin/header');
		$this->load->view('admin/category_one',$data);
		$this->load->view('admin/footer');
	}

	public function show_list()
	{
		$filter = array();
		$data['articleList'] = $this->category_model->getList($filter,15,0,"orders ASC");
		$this->load->view('admin/header');
		$this->load->view('admin/category_list',$data);
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