<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Mpersonal', 'Musers','Mengagement'));
        $this->load->library(array('form_validation', 'template'));
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
        }

        $this->template->caplet('report/report', $data);
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
        $this->template->caplet('report/employee', $data);
    }

}
