<?php
class Dashboard extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        //$this->load->model('m_petugas');
        $this->load->library(array('form_validation','template'));
        
//        if(!$this->session->userdata('username')){
//            redirect('site');
//        }
    }
    
    function index(){
        $data['title']="Home";
        
        $this->template->caplet('dashboard/index',$data);
    }
    
   
}