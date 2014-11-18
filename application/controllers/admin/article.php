<?php

class Article extends Admin {
    function __construct() {
        parent::__construct();
    }
    function index() {
        
    }
    function manage() {
        $this->load->view("admin/article_manage");
    }
    function add() {
        
    }
    function edit() {
        
    }
    function delete() {
        
    }
}
