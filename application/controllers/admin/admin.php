<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    function __construct() {
        $this->load->library('session');
        if ($this->session->userdata("is_login") != "true"){
            // TODO 跳转登陆页面
        }
    }
    
    public function index() {
        
    }
    
}
