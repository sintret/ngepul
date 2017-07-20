<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Position_group extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mposition_group');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'position_group/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'position_group/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'position_group/';
            $config['first_url'] = base_url() . 'position_group/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mposition_group->total_rows($q);
        $position_group = $this->Mposition_group->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'position_group_data' => $position_group,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('position_group/position_group_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mposition_group->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'groupName' => $row->groupName,
		'description' => $row->description,
		'deleted' => $row->deleted,
	    );
            $this->template->caplet('position_group/position_group_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_group'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('position_group/create_action'),
	    'id' => set_value('id'),
	    'groupName' => set_value('groupName'),
	    'description' => set_value('description'),
	    'deleted' => set_value('deleted'),
	);
       $this->template->caplet('position_group/position_group_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'groupName' => $this->input->post('groupName',TRUE),
		'description' => $this->input->post('description',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Mposition_group->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('position_group'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mposition_group->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('position_group/update_action'),
		'id' => set_value('id', $row->id),
		'groupName' => set_value('groupName', $row->groupName),
		'description' => set_value('description', $row->description),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->template->caplet('position_group/position_group_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_group'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'groupName' => $this->input->post('groupName',TRUE),
		'description' => $this->input->post('description',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Mposition_group->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('position_group'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mposition_group->get_by_id($id);

        if ($row) {
            $this->Mposition_group->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('position_group'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position_group'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('groupName', 'groupname', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Position_group.php */
/* Location: ./application/controllers/Position_group.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-01 10:55:07 */
/* http://harviacode.com */