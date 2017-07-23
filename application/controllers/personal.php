<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mbank');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('personal/index', $data);
    }

    public function change_password()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('personal/change_password', $data);
    }
   

}
