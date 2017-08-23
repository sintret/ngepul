<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Mreport','Memployee','Mpersonal', 'Musers','Mengagement','Mreimbursement','Mnon_chargeable'));
        $this->load->library(array('form_validation', 'template'));  
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index() {

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('report/index', $data);
    }

    public function report() {
        $data = array(
            'title' => 'report',
            'button' => 'SEARCH',
            'action' => site_url('report/find'),
            'id' => set_value('id'),
        );
        $this->template->caplet('report/report', $data);
    }

    public function find() {
        $type = $this->input->post('type', TRUE);
        $startDate = date('Y-m-d', strtotime(strtr($this->input->post('startDate', TRUE), '/', '-')));
        $endDate = date('Y-m-d', strtotime(strtr($this->input->post('endDate', TRUE), '/', '-')));
        $data = array(
            'title' => 'report find',
            'button' => 'SEARCH',
            'reportTypeId' => $type,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'action' => site_url('report/find'),
            'id' => set_value('id'),
        );
        //echo "<pre>"; print_r($data); exit(0);

        if ($type == 1) {
            $this->engagement($data);
             $this->template->caplet('report/report', $data);
        } else  if ($type == 2){
             $this->employee($data);
        } else  if ($type == 3){
             $this->reimbursement($data);
            
        } else  if ($type == 4){
             $this->non_charge($data);
        } else {
            
        $this->template->caplet('report/report', $data);
        }

    }

    public function engagement($data) {

        $this->load->library('Excelfile');

        $template = 'assets/report/engagement-report.xlsx';
        //$objReader = PHPExcel_IOFactory::createReader('Excel2007');
        //$objPHPExcel = $objReader->load(Yii::getAlias($template));
        $objPHPExcel=PHPExcel_IOFactory::load($template);
        $results = $this->Mengagement->report($data['startDate'],$data['endDate']);


        $this->load->view('report/engagement.php', [
            'data' => $data,
            'results'=>$results,
            'objPHPExcel' => $objPHPExcel
        ]);
    }

    public function employee() {

        $data = array(
            'title' => 'test',
        );
         $data = array(
            'title' => 'report employee',
            'employees' => $this->Memployee->get_dropdown(),
            'button' => 'SEARCH',
            'action' => site_url('report/employee_find'),
            'id' => set_value('id'),
        );
        $this->template->caplet('report/employee', $data);
    }
    
    public function employee_find() {

        $typeId = $this->input->post('typeId', TRUE);
        $employeeId = $this->input->post('employeeId', TRUE);
        $startDate = date('Y-m-d', strtotime(strtr($this->input->post('startDate', TRUE), '/', '-')));
        $endDate = date('Y-m-d', strtotime(strtr($this->input->post('endDate', TRUE), '/', '-')));
        $data = array(
            'title' => 'report find',
            'button' => 'SEARCH',
            'employees' => $this->Memployee->get_dropdown(),
            'employeeId' => $employeeId,
            'reportTypeId' => $typeId,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'action' => site_url('report/employee_find'),
            'id' => set_value('id'),
        );
        $this->template->caplet('report/employee', $data);
    }
    
    public function reimbursement($data) {
     //  echo "<pre>"; print_r($data); exit(0);
        $results = $this->Mreport->get_reimburse($data['startDate'],$data['endDate']);
       //echo "<pre>"; print_r($results); exit(0);
        $data2 = array(
            'results' =>  $results,
             'title' => 'report find',
            'button' => 'SEARCH',
            'reportTypeId' => $data['reportTypeId'],
            'startDate' => $data['startDate'],
            'endDate' => $data['endDate'],
            'action' => site_url('report/find'),
            'id' => set_value('id'),
        );
        $this->template->caplet('report/reimburse', $data2);
    }
    
    
    public function non_charge($data) {
    $results = $this->Mreport->get_noncahargeable($data['startDate'],$data['endDate']);
  //echo "<pre>"; print_r($results); exit(0);
     $data2 = array(
           'results' =>  $results,
             'title' => 'report find',
            'button' => 'SEARCH',
            'reportTypeId' => $data['reportTypeId'],
            'startDate' => $data['startDate'],
            'endDate' => $data['endDate'],
            'action' => site_url('report/find'),
            'id' => set_value('id'),
        );
       // $this->template->caplet('report/reimburse', $data2);
        $this->template->caplet('report/non_charge', $data2);
    }

}
