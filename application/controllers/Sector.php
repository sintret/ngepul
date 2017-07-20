<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sector extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Msector','Mindustry'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sector/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sector/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sector/';
            $config['first_url'] = base_url() . 'sector/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Msector->total_rows($q);
        $sector = $this->Msector->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sector_data' => $sector,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('sector/sector_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Msector->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'industryId' => $row->industryId,
		'industryName' => $row->industryName,
		'sectorCode' => $row->sectorCode,
		'sectorName' => $row->sectorName,
		'sectorDescription' => $row->sectorDescription,
		'updateDate' => $row->updateDate,
	    );
            $this->template->caplet('sector/sector_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sector'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('sector/create_action'),
	    'id' => set_value('id'),
            'industrys' => $this->Mindustry->get_all(),
	    'industryId' => set_value('industryId'),
	    'sectorCode' => set_value('sectorCode'),
	    'sectorName' => set_value('sectorName'),
	    'sectorDescription' => set_value('sectorDescription'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->template->caplet('sector/sector_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'industryId' => $this->input->post('industryId',TRUE),
		'sectorName' => $this->input->post('sectorName',TRUE),
		'sectorDescription' => $this->input->post('sectorDescription',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Msector->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('sector'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Msector->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sector/update_action'),
		'id' => set_value('id', $row->id),
		'industrys' => $this->Mindustry->get_all(),
		'industryId' => set_value('industryId', $row->industryId),
		'sectorCode' => set_value('sectorCode', $row->sectorCode),
		'sectorName' => set_value('sectorName', $row->sectorName),
		'sectorDescription' => set_value('sectorDescription', $row->sectorDescription),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
            $this->template->caplet('sector/sector_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sector'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'industryId' => $this->input->post('industryId',TRUE),
		'sectorName' => $this->input->post('sectorName',TRUE),
		'sectorDescription' => $this->input->post('sectorDescription',TRUE),
		'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Msector->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('sector'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Msector->get_by_id($id);

        if ($row) {
            $this->Msector->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sector'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sector'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('industryId', 'industryid', 'trim|required');
	$this->form_validation->set_rules('sectorName', 'sectorname', 'trim|required');
	$this->form_validation->set_rules('sectorDescription', 'sectordescription', 'trim|required');
	$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Sector.php */
/* Location: ./application/controllers/Sector.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-02 15:23:49 */
/* http://harviacode.com */