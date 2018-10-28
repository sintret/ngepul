<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Leave extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mleave','Mentity'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'leave/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'leave/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'leave/';
            $config['first_url'] = base_url() . 'leave/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mleave->total_rows($q);
        $leave = $this->Mleave->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'leave_data' => $leave,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->capletfull('leave/leave_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mleave->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'company_name' => $row->company_name,
		'leaveCode' => $row->leaveCode,
		'leaveName' => $row->leaveName,
		'leaveChargesType' => $row->leaveChargesType,
		'leaveDeleted' => $row->leaveDeleted,
	    );
            $this->template->caplet('leave/leave_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('leave/create_action'),
	    'id' => set_value('id'),
            'entitys' => $this->Mentity->get_all(),
	    'entityId' => set_value('entityId'),
	    'leaveCode' => set_value('leaveCode'),
	    'leaveName' => set_value('leaveName'),
	    'leaveChargesType' => set_value('leaveChargesType'),
	    'leaveDeleted' => set_value('leaveDeleted'),
	);
        $this->template->caplet('leave/leave_form', $data);
    }
    
    public function create_action() 
    {
      //  $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'leaveCode' => $this->input->post('leaveCode',TRUE),
		'leaveName' => $this->input->post('leaveName',TRUE),
		'leaveChargesType' => $this->input->post('leaveChargesType',TRUE),
		//'leaveDeleted' => $this->input->post('leaveDeleted',TRUE),
	    );

            $this->Mleave->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('leave'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mleave->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('leave/update_action'),
		'id' => set_value('id', $row->id),
                'entitys' => $this->Mentity->get_all(),
		'entityId' => set_value('entityId', $row->entityId),
		'leaveCode' => set_value('leaveCode', $row->leaveCode),
		'leaveName' => set_value('leaveName', $row->leaveName),
		'leaveChargesType' => set_value('leaveChargesType', $row->leaveChargesType),
		'leaveDeleted' => set_value('leaveDeleted', $row->leaveDeleted),
	    );
            $this->template->caplet('leave/leave_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave'));
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
		'leaveCode' => $this->input->post('leaveCode',TRUE),
		'leaveName' => $this->input->post('leaveName',TRUE),
		'leaveChargesType' => $this->input->post('leaveChargesType',TRUE),
		//'leaveDeleted' => $this->input->post('leaveDeleted',TRUE),
	    );

            $this->Mleave->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(base_url('leave/?start='.$page));
//        }
    }
    
    public function delete($id) 
    {
        $page =  $this->uri->segment(5);
        $row = $this->Mleave->get_by_id($id);

        if ($row) {
            $data['leaveDeleted'] = 1;
            $this->Mleave->update($id, $data);
            //$this->Mleave->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('leave'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('leave'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('leaveCode', 'leavecode', 'trim|required');
	$this->form_validation->set_rules('leaveName', 'leavename', 'trim|required');
	$this->form_validation->set_rules('leaveChargesType', 'leavechargestype', 'trim|required');
	$this->form_validation->set_rules('leaveDeleted', 'leavedeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Leave.php */
/* Location: ./application/controllers/Leave.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-29 18:17:32 */
/* http://harviacode.com */