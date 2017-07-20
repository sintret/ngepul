<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userlevel extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Muserlevel');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'userlevel/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'userlevel/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'userlevel/';
            $config['first_url'] = base_url() . 'userlevel/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Muserlevel->total_rows($q);
        $userlevel = $this->Muserlevel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'userlevel_data' => $userlevel,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('userlevel/userlevel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Muserlevel->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'userlevel_name' => $row->userlevel_name,
		'description' => $row->description,
		'deleted' => $row->deleted,
	    );
             $this->template->caplet('userlevel/userlevel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('userlevel/create_action'),
	    'id' => set_value('id'),
	    'userlevel_name' => set_value('userlevel_name'),
	    'description' => set_value('description'),
	    'deleted' => set_value('deleted'),
	);
         $this->template->caplet('userlevel/userlevel_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'userlevel_name' => $this->input->post('userlevel_name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Muserlevel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userlevel'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Muserlevel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('userlevel/update_action'),
		'id' => set_value('id', $row->id),
		'userlevel_name' => set_value('userlevel_name', $row->userlevel_name),
		'description' => set_value('description', $row->description),
		'deleted' => set_value('deleted', $row->deleted),
	    );
             $this->template->caplet('userlevel/userlevel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'userlevel_name' => $this->input->post('userlevel_name',TRUE),
		'description' => $this->input->post('description',TRUE),
		'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Muserlevel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userlevel'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Muserlevel->get_by_id($id);

        if ($row) {
            $this->Muserlevel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('userlevel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userlevel'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('userlevel_name', 'userlevel name', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Userlevel.php */
/* Location: ./application/controllers/Userlevel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-19 20:52:46 */
/* http://harviacode.com */