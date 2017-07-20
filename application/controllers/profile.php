<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('musers'));
        $this->load->library(array('form_validation','template'));
	/*	
        if($this->session->userdata('username')){
            redirect('dashboard');
        }
	*/	
    }
    
    public function index(){
        $this->view();
    }
    
        
    public function view(){
       $this->template->capletFile('profile/index');
    }
    
}