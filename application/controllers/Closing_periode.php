<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Closing_periode extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mclosing_periode');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'closing_periode/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'closing_periode/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'closing_periode/';
            $config['first_url'] = base_url() . 'closing_periode/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mclosing_periode->total_rows($q);
        $closing_periode = $this->Mclosing_periode->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'closing_periode_data' => $closing_periode,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('closing_periode/closing_periode_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mclosing_periode->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'closingPeriode' => $row->closingPeriode,
		'closingInfo' => $row->closingInfo,
	    );
            $this->template->caplet('closing_periode/closing_periode_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('closing_periode'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('closing_periode/create_action'),
	    'id' => set_value('id'),
	    'closingPeriode' => set_value('closingPeriode'),
	    'closingInfo' => set_value('closingInfo'),
	);
        $this->template->caplet('closing_periode/closing_periode_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'closingPeriode' => $this->input->post('closingPeriode',TRUE),
		'closingInfo' => $this->input->post('closingInfo',TRUE),
	    );

            $this->Mclosing_periode->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('closing_periode'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mclosing_periode->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('closing_periode/update_action'),
		'id' => set_value('id', $row->id),
		'closingPeriode' => set_value('closingPeriode', $row->closingPeriode),
		'closingInfo' => set_value('closingInfo', $row->closingInfo),
	    );
             $this->template->caplet('closing_periode/closing_periode_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('closing_periode'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'closingPeriode' => $this->input->post('closingPeriode',TRUE),
		'closingInfo' => $this->input->post('closingInfo',TRUE),
	    );

            $this->Mclosing_periode->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('closing_periode'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mclosing_periode->get_by_id($id);

        if ($row) {
            $this->Mclosing_periode->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('closing_periode'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('closing_periode'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('closingPeriode', 'closingperiode', 'trim|required');
	$this->form_validation->set_rules('closingInfo', 'closinginfo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Closing_periode.php */
/* Location: ./application/controllers/Closing_periode.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-02 15:24:52 */
/* http://harviacode.com */