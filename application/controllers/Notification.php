<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Notification extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mnotification');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'notification/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'notification/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'notification/';
            $config['first_url'] = base_url() . 'notification/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mnotification->total_rows_by($q);
        $notification = $this->Mnotification->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'notification_data' => $notification,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplettable('notification/notification_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mnotification->get_by_user($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'userId' => $row->userId,
		'title' => $row->title,
		'message' => $row->message,
		'url' => $row->url,
		'read' => $row->read,
		'createdBy' => $row->createdBy,
		'updatedAt' => $row->updatedAt,
	    );
             $this->template->caplet('notification/notification_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notification'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('notification/create_action'),
	    'id' => set_value('id'),
	    'userId' => set_value('userId'),
	    'title' => set_value('title'),
	    'message' => set_value('message'),
	    'url' => set_value('url'),
	    'read' => set_value('read'),
	    'createdBy' => set_value('createdBy'),
	    'updatedAt' => set_value('updatedAt'),
	);
        $this->template->caplet('notification/notification_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'userId' => $this->input->post('userId',TRUE),
		'title' => $this->input->post('title',TRUE),
		'message' => $this->input->post('message',TRUE),
		'url' => $this->input->post('url',TRUE),
		'read' => $this->input->post('read',TRUE),
		'createdBy' => $this->input->post('createdBy',TRUE),
		'updatedAt' => $this->input->post('updatedAt',TRUE),
	    );

            $this->Mnotification->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('notification'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mnotification->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('notification/update_action'),
		'id' => set_value('id', $row->id),
		'userId' => set_value('userId', $row->userId),
		'title' => set_value('title', $row->title),
		'message' => set_value('message', $row->message),
		'url' => set_value('url', $row->url),
		'read' => set_value('read', $row->read),
		'createdBy' => set_value('createdBy', $row->createdBy),
		'updatedAt' => set_value('updatedAt', $row->updatedAt),
	    );
            $this->template->caplet('notification/notification_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notification'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'userId' => $this->input->post('userId',TRUE),
		'title' => $this->input->post('title',TRUE),
		'message' => $this->input->post('message',TRUE),
		'url' => $this->input->post('url',TRUE),
		'read' => $this->input->post('read',TRUE),
		'createdBy' => $this->input->post('createdBy',TRUE),
		'updatedAt' => $this->input->post('updatedAt',TRUE),
	    );

            $this->Mnotification->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('notification'));
        }
    }
    
    public function mark_read($id) 
    {
        $row = $this->Mnotification->get_by_id($id);

        if ($row) {
            $data = array(
		'read' => 1,
	    );

            $this->Mnotification->mark_read($id, $data);
            redirect(site_url('notification'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notification'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mnotification->get_by_id($id);

        if ($row) {
            $this->Mnotification->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('notification'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('notification'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('userId', 'userid', 'trim|required');
	$this->form_validation->set_rules('title', 'title', 'trim|required');
	$this->form_validation->set_rules('message', 'message', 'trim|required');
	$this->form_validation->set_rules('url', 'url', 'trim|required');
	$this->form_validation->set_rules('read', 'read', 'trim|required');
	$this->form_validation->set_rules('createdBy', 'createdby', 'trim|required');
	$this->form_validation->set_rules('updatedAt', 'updatedat', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

