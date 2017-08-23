<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expense extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mexpense');
        $this->load->library(array('form_validation','template'));        
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'expense/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'expense/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'expense/';
            $config['first_url'] = base_url() . 'expense/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mexpense->total_rows($q);
        $expense = $this->Mexpense->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'expense_data' => $expense,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('expense/expense_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mexpense->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'expenseCode' => $row->expenseCode,
		'expenseName' => $row->expenseName,
		'expenseCost' => $row->expenseCost,
		'expenseDeleted' => $row->expenseDeleted,
	    );
           $this->template->caplet('expense/expense_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('expense/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'expenseCode' => set_value('expenseCode'),
	    'expenseName' => set_value('expenseName'),
	    'expenseCost' => set_value('expenseCost'),
	    'fixStatusId' => set_value('fixStatusId'),
	    'expenseDeleted' => set_value('expenseDeleted'),
	);
        $this->template->caplet('expense/expense_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'entityId' => 1,
		'expenseCode' => $this->input->post('expenseCode',TRUE),
		'expenseName' => $this->input->post('expenseName',TRUE),
		'expenseCost' => $this->input->post('expenseCost',TRUE),
		'fixStatusId' => $this->input->post('fixStatusId',TRUE),
		//'expenseDeleted' => $this->input->post('expenseDeleted',TRUE),
	    );

            $this->Mexpense->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expense'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mexpense->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('expense/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'expenseCode' => set_value('expenseCode', $row->expenseCode),
		'expenseName' => set_value('expenseName', $row->expenseName),
		'expenseCost' => set_value('expenseCost', $row->expenseCost),
		'fixStatusId' => set_value('fixStatusId', $row->fixStatusId),
		'expenseDeleted' => set_value('expenseDeleted', $row->expenseDeleted),
	    );
            $this->template->caplet('expense/expense_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'entityId' => 1,
		'expenseCode' => $this->input->post('expenseCode',TRUE),
		'expenseName' => $this->input->post('expenseName',TRUE),
		'expenseCost' => $this->input->post('expenseCost',TRUE),
		'fixStatusId' => $this->input->post('fixStatusId',TRUE),
		//'expenseDeleted' => $this->input->post('expenseDeleted',TRUE),
	    );

            $this->Mexpense->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expense'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mexpense->get_by_id($id);

        if ($row) {
            $this->Mexpense->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expense'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expense'));
        }
    }

    public function _rules() 
    {
	//$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('expenseCode', 'expensecode', 'trim|required');
	$this->form_validation->set_rules('expenseName', 'expensename', 'trim|required');
	$this->form_validation->set_rules('expenseCost', 'expensecost', 'trim|required|numeric');
	//$this->form_validation->set_rules('expenseDeleted', 'expensedeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

