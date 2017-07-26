<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mpersonal','Musers'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('report/index', $data);
    }

    public function engagement()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('report/engagement', $data);
    }
    
     public function employee()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('report/employee', $data);
    }
  
   

}
