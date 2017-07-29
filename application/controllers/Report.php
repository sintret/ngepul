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
    public function report()
    {       
        $data = array(
            'title' => 'report',
            'button' => 'SEARCH',
            'action' => site_url('report/find'),
	    'id' => set_value('id'),
	);
        $this->template->caplet('report/report', $data);
    }
    
    public function find()
    {       
        $reportTypeId = $this->input->post('reportTypeId',TRUE);
        $startDate = date('Y-m-d', strtotime(strtr($this->input->post('startDate',TRUE), '/', '-')));
        $endDate = date('Y-m-d', strtotime(strtr($this->input->post('endDate',TRUE), '/', '-')));
        $data = array(
            'title' => 'report find',
            'button' => 'SEARCH',
            'reportTypeId' => $reportTypeId,  
            'startDate' => $startDate,        
            'endDate' => $endDate,           
            'action' => site_url('report/find'),
	    'id' => set_value('id'),
	);
        echo "<pre>"; print_r($data); exit(0);
        $this->template->caplet('report/report', $data);
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
