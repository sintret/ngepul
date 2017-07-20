<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Servicetitle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mservicetitle', 'Mentity', 'Mservice'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'servicetitle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'servicetitle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'servicetitle/';
            $config['first_url'] = base_url() . 'servicetitle/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mservicetitle->total_rows($q);
        $servicetitle = $this->Mservicetitle->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'servicetitle_data' => $servicetitle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('servicetitle/servicetitle_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mservicetitle->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'company_name' => $row->company_name,
		'serviceTitleCode' => $row->serviceTitleCode,
		'serviceTitleName' => $row->serviceTitleName,
		'serviceId' => $row->serviceId,
		'serviceName' => $row->serviceName,
		'serviceTitleDescription' => $row->serviceTitleDescription,
		'serviceTitleDeleted' => $row->serviceTitleDeleted,
	    );
            $this->template->caplet('servicetitle/servicetitle_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('servicetitle'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('servicetitle/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
                'entitys' => $this->Mentity->get_all(),
                'services' => $this->Mservice->get_all(),
	    'serviceTitleCode' => set_value('serviceTitleCode'),
	    'serviceTitleName' => set_value('serviceTitleName'),
	    'serviceId' => set_value('serviceId'),
	    'serviceTitleDescription' => set_value('serviceTitleDescription'),
	    'serviceTitleDeleted' => set_value('serviceTitleDeleted'),
	);
        $this->template->caplet('servicetitle/servicetitle_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'serviceTitleName' => $this->input->post('serviceTitleName',TRUE),
		'serviceId' => $this->input->post('serviceId',TRUE),
		'serviceTitleDescription' => $this->input->post('serviceTitleDescription',TRUE),
		//'serviceTitleDeleted' => $this->input->post('serviceTitleDeleted',TRUE),
	    );

            $this->Mservicetitle->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('servicetitle'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mservicetitle->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('servicetitle/update_action'),
		'id' => set_value('id', $row->id),
                'entitys' => $this->Mentity->get_all(),
                'services' => $this->Mservice->get_all(),
		'entityId' => set_value('entityId', $row->entityId),
		'serviceTitleCode' => set_value('serviceTitleCode', $row->serviceTitleCode),
		'serviceTitleName' => set_value('serviceTitleName', $row->serviceTitleName),
		'serviceId' => set_value('serviceId', $row->serviceId),
		'serviceTitleDescription' => set_value('serviceTitleDescription', $row->serviceTitleDescription),
		//'serviceTitleDeleted' => set_value('serviceTitleDeleted', $row->serviceTitleDeleted),
	    );
            $this->template->caplet('servicetitle/servicetitle_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('servicetitle'));
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
		'serviceTitleName' => $this->input->post('serviceTitleName',TRUE),
		'serviceId' => $this->input->post('serviceId',TRUE),
		'serviceTitleDescription' => $this->input->post('serviceTitleDescription',TRUE),
		'serviceTitleDeleted' => $this->input->post('serviceTitleDeleted',TRUE),
	    );

            $this->Mservicetitle->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('servicetitle'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mservicetitle->get_by_id($id);

        if ($row) {
            $this->Mservicetitle->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('servicetitle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('servicetitle'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('serviceTitleName', 'servicetitlename', 'trim|required');
	$this->form_validation->set_rules('serviceId', 'serviceid', 'trim|required');
	$this->form_validation->set_rules('serviceTitleDescription', 'servicetitledescription', 'trim|required');
	$this->form_validation->set_rules('serviceTitleDeleted', 'servicetitledeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Servicetitle.php */
/* Location: ./application/controllers/Servicetitle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-26 19:20:18 */
/* http://harviacode.com */