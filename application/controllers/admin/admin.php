<?php
/**
* 管理类
*/
class Admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		//加载model
		$this->load->model('admin/admin_model');
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->check_login())
		{
			echo '登陆成功后的首页';
			$this->load->view('admin/logout');
		}
		else
		{
			$this->login();
		}
	}
	public function check_login()
	{
		if (isset($_SESSION['username']))
		{
			return true;
		}
		else
		{
			$this->form_validation->set_rules('username','用户名','required|max_length[16]');
			$this->form_validation->set_rules('password','密码','required|max_length[16]');
			if ($this->form_validation->run() === FALSE)
			{

			}
			else
			{
				$data = $this->admin_model->getOne($_POST['username']);
				$password = md5($_POST['password']);
				$password = substr($password,0,strlen($password)-2);
				if ($data['passwd'] === $password)
				{
					echo '验证通过！';
					$_SESSION['username'] = $_POST['username'];
				}
				else
				{
					echo '验证失败！';
				}
			}
		}
	}
	public function login()
	{
		$this->load->view('admin/login');
	}
	public function logout()
	{
		session_destroy();
		$this->index();
	}
}
?>