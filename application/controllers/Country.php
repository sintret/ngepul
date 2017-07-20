<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcountry');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'country/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'country/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'country/';
            $config['first_url'] = base_url() . 'country/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mcountry->total_rows($q);
        $country = $this->Mcountry->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'country_data' => $country,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('country/country_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mcountry->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'CountryCode' => $row->CountryCode,
		'CountryName' => $row->CountryName,
		'CountryDeleted' => $row->CountryDeleted,
	    );
            $this->template->caplet('country/country_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('country/create_action'),
	    'id' => set_value('id'),
	    'CountryCode' => set_value('CountryCode'),
	    'CountryName' => set_value('CountryName'),
	    'CountryDeleted' => set_value('CountryDeleted'),
	);
         $this->template->caplet('country/country_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'CountryCode' => $this->input->post('CountryCode',TRUE),
		'CountryName' => $this->input->post('CountryName',TRUE),
		//'CountryDeleted' => $this->input->post('CountryDeleted',TRUE),
	    );

            $this->Mcountry->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('country'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mcountry->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('country/update_action'),
		'id' => set_value('id', $row->id),
		'CountryCode' => set_value('CountryCode', $row->CountryCode),
		'CountryName' => set_value('CountryName', $row->CountryName),
		'CountryDeleted' => set_value('CountryDeleted', $row->CountryDeleted),
	    );
            $this->template->caplet('country/country_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'CountryCode' => $this->input->post('CountryCode',TRUE),
		'CountryName' => $this->input->post('CountryName',TRUE),
		//'CountryDeleted' => $this->input->post('CountryDeleted',TRUE),
	    );

            $this->Mcountry->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('country'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mcountry->get_by_id($id);

        if ($row) {
            $this->Mcountry->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('country'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('country'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('CountryCode', 'countrycode', 'trim|required');
	$this->form_validation->set_rules('CountryName', 'countryname', 'trim|required');
	$this->form_validation->set_rules('CountryDeleted', 'countrydeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Country.php */
/* Location: ./application/controllers/Country.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-26 18:57:59 */
/* http://harviacode.com */