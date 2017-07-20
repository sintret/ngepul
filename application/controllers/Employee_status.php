<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Memployee_status');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employee_status/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employee_status/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employee_status/';
            $config['first_url'] = base_url() . 'employee_status/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Memployee_status->total_rows($q);
        $employee_status = $this->Memployee_status->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'employee_status_data' => $employee_status,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('employee_status/employee_status_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Memployee_status->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'employeeStatus' => $row->employeeStatus,
		'statusInfo' => $row->statusInfo,
		'employeeStatusColors' => $row->employeeStatusColors,
	    );
            $this->template->caplet('employee_status/employee_status_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_status'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee_status/create_action'),
	    'id' => set_value('id'),
	    'employeeStatus' => set_value('employeeStatus'),
	    'statusInfo' => set_value('statusInfo'),
	    'employeeStatusColors' => set_value('employeeStatusColors'),
	);
       $this->template->caplet('employee_status/employee_status_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'employeeStatus' => $this->input->post('employeeStatus',TRUE),
		'statusInfo' => $this->input->post('statusInfo',TRUE),
		//'employeeStatusColors' => $this->input->post('employeeStatusColors',TRUE),
	    );

            $this->Memployee_status->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee_status'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Memployee_status->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee_status/update_action'),
		'id' => set_value('id', $row->id),
		'employeeStatus' => set_value('employeeStatus', $row->employeeStatus),
		'statusInfo' => set_value('employeeStatus', $row->statusInfo),
		'employeeStatusColors' => set_value('employeeStatusColors', $row->employeeStatusColors),
	    );
            $this->template->caplet('employee_status/employee_status_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_status'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'employeeStatus' => $this->input->post('employeeStatus',TRUE),
		'statusInfo' => $this->input->post('statusInfo',TRUE),
		//'employeeStatusColors' => $this->input->post('employeeStatusColors',TRUE),
	    );

            $this->Memployee_status->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee_status'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Memployee_status->get_by_id($id);

        if ($row) {
            $this->Memployee_status->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('employee_status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee_status'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('employeeStatus', 'employeestatus', 'trim|required');
	$this->form_validation->set_rules('employeeStatusColors', 'employeestatuscolors', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Employee_status.php */
/* Location: ./application/controllers/Employee_status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-01 18:24:16 */
/* http://harviacode.com */