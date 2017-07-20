<?php
class Users extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        //$this->load->model('m_petugas');
        $this->load->library(array('form_validation','template'));
        
        if(!$this->session->userdata('username')){
            redirect('site');
        }
    }
    
    function index(){
		  $this->view();
    }
	function view(){
        $data['title']="internfeed";
        
        $this->template->caplet('users/index',$data);
    }
    
   
}