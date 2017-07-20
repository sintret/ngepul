<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Degree extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdegree');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'degree/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'degree/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'degree/';
            $config['first_url'] = base_url() . 'degree/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mdegree->total_rows($q);
        $degree = $this->Mdegree->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'degree_data' => $degree,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('degree/degree_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mdegree->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'degreeName' => $row->degreeName,
		'degreeInfo' => $row->degreeInfo,
	    );
           $this->template->caplet('degree/degree_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('degree/create_action'),
	    'id' => set_value('id'),
	    'degreeName' => set_value('degreeName'),
	    'degreeInfo' => set_value('degreeInfo'),
	);
       $this->template->caplet('degree/degree_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'degreeName' => $this->input->post('degreeName',TRUE),
		'degreeInfo' => $this->input->post('degreeInfo',TRUE),
	    );

            $this->Mdegree->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('degree'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mdegree->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('degree/update_action'),
		'id' => set_value('id', $row->id),
		'degreeName' => set_value('degreeName', $row->degreeName),
		'degreeInfo' => set_value('degreeName', $row->degreeInfo),
	    );
            $this->template->caplet('degree/degree_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'degreeName' => $this->input->post('degreeName',TRUE),
		'degreeInfo' => $this->input->post('degreeInfo',TRUE),
	    );

            $this->Mdegree->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('degree'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mdegree->get_by_id($id);

        if ($row) {
            $this->Mdegree->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('degree'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('degree'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('degreeName', 'degreename', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
