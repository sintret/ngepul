<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Province extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mprovince', 'Mcountry'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'province/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'province/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'province/';
            $config['first_url'] = base_url() . 'province/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mprovince->total_rows($q);
        $province = $this->Mprovince->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'province_data' => $province,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('province/province_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mprovince->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'provinceCode' => $row->provinceCode,
		'provinceName' => $row->provinceName,
		'countryCode' => $row->countryCode,
		'countryName' => $row->countryName,
		'provinceDeleted' => $row->provinceDeleted,
	    );
             $this->template->caplet('province/province_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('province'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('province/create_action'),
	    'id' => set_value('id'),
            'countrys' => $this->Mcountry->get_all(),
	    'provinceCode' => set_value('provinceCode'),
	    'provinceName' => set_value('provinceName'),
	    'countryCode' => set_value('countryCode'),
	    'provinceDeleted' => set_value('provinceDeleted'),
	);
         $this->template->caplet('province/province_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'provinceCode' => $this->input->post('provinceCode',TRUE),
		'provinceName' => $this->input->post('provinceName',TRUE),
		'countryCode' => $this->input->post('countryCode',TRUE),
	    );

            $this->Mprovince->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('province'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mprovince->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('province/update_action'),
		'id' => set_value('id', $row->id),   
                'countrys' => $this->Mcountry->get_all(),
		'provinceCode' => set_value('provinceCode', $row->provinceCode),
		'provinceName' => set_value('provinceName', $row->provinceName),
		'countryCode' => set_value('countryCode', $row->countryCode),
		'provinceDeleted' => set_value('provinceDeleted', $row->provinceDeleted),
	    );
             $this->template->caplet('province/province_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('province'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'provinceCode' => $this->input->post('provinceCode',TRUE),
		'provinceName' => $this->input->post('provinceName',TRUE),
		'countryCode' => $this->input->post('countryCode',TRUE),
		//'provinceDeleted' => $this->input->post('provinceDeleted',TRUE),
	    );

            $this->Mprovince->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('province'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mprovince->get_by_id($id);

        if ($row) {
            $this->Mprovince->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('province'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('province'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('provinceName', 'provincename', 'trim|required');
	$this->form_validation->set_rules('countryCode', 'countrycode', 'trim|required');
	$this->form_validation->set_rules('provinceDeleted', 'provincedeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

