<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mcity', 'Mprovince'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'city/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'city/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'city/';
            $config['first_url'] = base_url() . 'city/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mcity->total_rows($q);
        $city = $this->Mcity->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'city_data' => $city,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('city/city_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mcity->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'cityCode' => $row->cityCode,
		'cityName' => $row->cityName,
		'provinceName' => $row->provinceName,
		'cityProvinceId' => $row->cityProvinceId,
		'cityDeleted' => $row->cityDeleted,
	    );
            $this->template->caplet('city/city_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('city/create_action'),
	    'id' => set_value('id'),
             'provinces' => $this->Mprovince->get_all(),
	    'cityCode' => set_value('cityCode'),
	    'cityName' => set_value('cityName'),
	    'cityProvinceId' => set_value('cityProvinceId'),
	    'cityDeleted' => set_value('cityDeleted'),
	);
        $this->template->caplet('city/city_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'cityName' => $this->input->post('cityName',TRUE),
		'cityProvinceId' => $this->input->post('cityProvinceId',TRUE),
		//'cityDeleted' => $this->input->post('cityDeleted',TRUE),
	    );

            $this->Mcity->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('city'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mcity->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('city/update_action'),
		'id' => set_value('id', $row->id),
                'provinces' => $this->Mprovince->get_all(),
		'cityCode' => set_value('cityCode', $row->cityCode),
		'cityName' => set_value('cityName', $row->cityName),
		'cityProvinceId' => set_value('cityProvinceId', $row->cityProvinceId),
		'cityDeleted' => set_value('cityDeleted', $row->cityDeleted),
	    );
            $this->template->caplet('city/city_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'cityName' => $this->input->post('cityName',TRUE),
		'cityProvinceId' => $this->input->post('cityProvinceId',TRUE),
		'cityDeleted' => $this->input->post('cityDeleted',TRUE),
	    );

            $this->Mcity->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('city'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mcity->get_by_id($id);

        if ($row) {
            $this->Mcity->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('city'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('city'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('cityName', 'cityname', 'trim|required');
	$this->form_validation->set_rules('cityProvinceId', 'cityprovinceid', 'trim|required');
	$this->form_validation->set_rules('cityDeleted', 'citydeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

