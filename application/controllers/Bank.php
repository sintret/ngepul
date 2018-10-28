<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bank extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mbank');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'bank/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'bank/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'bank/';
            $config['first_url'] = base_url() . 'bank/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mbank->total_rows($q);
        $bank = $this->Mbank->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'bank_data' => $bank,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->capletfull('bank/bank_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mbank->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'BankCode' => $row->BankCode,
		'BankName' => $row->BankName,
		'AccountNumber' => $row->AccountNumber,
		'Description' => $row->Description,
		'BankDeleted' => $row->BankDeleted,
	    );
             $this->template->caplet('bank/bank_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('bank/create_action'),
	    'id' => set_value('id'),
	    'BankCode' => set_value('BankCode'),
	    'BankName' => set_value('BankName'),
	    'AccountNumber' => set_value('AccountNumber'),
	    'Description' => set_value('Description'),
	    'BankDeleted' => set_value('BankDeleted'),
	);
        $this->template->caplet('bank/bank_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'BankCode' => $this->input->post('BankCode',TRUE),
		'BankName' => $this->input->post('BankName',TRUE),
		'AccountNumber' => $this->input->post('AccountNumber',TRUE),
		'Description' => $this->input->post('Description',TRUE),
		//'BankDeleted' => $this->input->post('BankDeleted',TRUE),
	    );

            $this->Mbank->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('bank'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mbank->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('bank/update_action'),
		'id' => set_value('id', $row->id),
		'BankCode' => set_value('BankCode', $row->BankCode),
		'BankName' => set_value('BankName', $row->BankName),
		'AccountNumber' => set_value('AccountNumber', $row->AccountNumber),
		'Description' => set_value('Description', $row->Description),
		//'BankDeleted' => set_value('BankDeleted', $row->BankDeleted),
	    );
            $this->template->caplet('bank/bank_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('bank'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'BankCode' => $this->input->post('BankCode',TRUE),
		'BankName' => $this->input->post('BankName',TRUE),
		'AccountNumber' => $this->input->post('AccountNumber',TRUE),
		'Description' => $this->input->post('Description',TRUE),
		//'BankDeleted' => $this->input->post('BankDeleted',TRUE),
	    );

            $this->Mbank->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('bank'));
//        }
    }
    
    public function delete($id) 
    {
        $page =  $this->uri->segment(5);
        $row = $this->Mbank->get_by_id($id);

        if ($row) {
           // $this->Mbank->delete($id);
            $data['BankDeleted'] = 1;
            $this->Mbank->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('bank/?start='.$page));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('bank/?start='.$page));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('BankName', 'bankname', 'trim|required');
	$this->form_validation->set_rules('BankDeleted', 'bankdeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Bank.php */
/* Location: ./application/controllers/Bank.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-26 18:55:12 */
/* http://harviacode.com */