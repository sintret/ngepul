<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mservice', 'Mentity'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'service/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'service/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'service/';
            $config['first_url'] = base_url() . 'service/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mservice->total_rows($q);
        $service = $this->Mservice->get_limit_data($config['per_page'], 0, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'service_data' => $service,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('service/service_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mservice->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'company_name' => $row->company_name,
		'serviceCode' => $row->serviceCode,
		'serviceName' => $row->serviceName,
		'serviceDescription' => $row->serviceDescription,
		'serviceDeleted' => $row->serviceDeleted,
	    );
            $this->template->caplet('service/service_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('service/create_action'),
	    'id' => set_value('id'),
            'entitys' => $this->Mentity->get_all(),
	    'entityId' => set_value('entityId'),
	    'serviceCode' => set_value('serviceCode'),
	    'serviceName' => set_value('serviceName'),
	    'serviceDescription' => set_value('serviceDescription'),
	    'serviceDeleted' => set_value('serviceDeleted'),
	);
         $this->template->caplet('service/service_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'serviceCode' => $this->input->post('serviceCode',TRUE),
		'serviceName' => $this->input->post('serviceName',TRUE),
		'serviceDescription' => $this->input->post('serviceDescription',TRUE),
		//'serviceDeleted' => $this->input->post('serviceDeleted',TRUE),
	    );

            $this->Mservice->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('service'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mservice->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('service/update_action'),
		'id' => set_value('id', $row->id),
                'entitys' => $this->Mentity->get_all(),
		'entityId' => set_value('entityId', $row->entityId),
		'serviceCode' => set_value('serviceCode', $row->serviceCode),
		'serviceName' => set_value('serviceName', $row->serviceName),
		'serviceDescription' => set_value('serviceDescription', $row->serviceDescription),
		'serviceDeleted' => set_value('serviceDeleted', $row->serviceDeleted),
	    );
             $this->template->caplet('service/service_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'serviceCode' => $this->input->post('serviceCode',TRUE),
		'serviceName' => $this->input->post('serviceName',TRUE),
		'serviceDescription' => $this->input->post('serviceDescription',TRUE),
		'serviceDeleted' => $this->input->post('serviceDeleted',TRUE),
	    );

            $this->Mservice->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('service'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mservice->get_by_id($id);

        if ($row) {
            $this->Mservice->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('service'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('service'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('serviceCode', 'servicecode', 'trim|required');
	$this->form_validation->set_rules('serviceName', 'servicename', 'trim|required');
	$this->form_validation->set_rules('serviceDescription', 'servicedescription', 'trim|required');
	$this->form_validation->set_rules('serviceDeleted', 'servicedeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

