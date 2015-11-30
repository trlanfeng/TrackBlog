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
		if (isset($_POST['submit'])) {
			$this->category_model->add( $_POST);
		} else {
			$filter = array();
			$catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
			$data['catlist'] = $catList;
			$this->load->view('admin/header');
			$this->load->view('admin/category_add',$data);
			$this->load->view('admin/footer');
		}
	}
	public function edit($id)
	{
		if (isset($_POST['submit'])) {
			$this->category_model->edit($id, $_POST);
		} else {
			$data = $this->category_model->getOne($id);
			$filter = array();
			$catList = $this->category_model->getList($filter, 0, 0, 'orders ASC');
			$data['catlist'] = $catList;
			$this->load->view('admin/header');
			$this->load->view('admin/category_edit', $data);
			$this->load->view('admin/footer');
		}
	}
	public function delete($id)
	{
		$this->category_model->delete($id);
	}
}
?>