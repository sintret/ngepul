<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Industry extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mindustry');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'industry/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'industry/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'industry/';
            $config['first_url'] = base_url() . 'industry/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mindustry->total_rows($q);
        $industry = $this->Mindustry->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'industry_data' => $industry,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('industry/industry_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mindustry->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'industryCode' => $row->industryCode,
		'industryName' => $row->industryName,
		'industryDescription' => $row->industryDescription,
		'deleted' => $row->deleted,
		'updateDate' => $row->updateDate,
	    );
            $this->template->caplet('industry/industry_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('industry'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('industry/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'industryCode' => set_value('industryCode'),
	    'industryName' => set_value('industryName'),
	    'industryDescription' => set_value('industryDescription'),
	    'deleted' => set_value('deleted'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->template->caplet('industry/industry_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => 1,
		'industryName' => $this->input->post('industryName',TRUE),
		'industryDescription' => $this->input->post('industryDescription',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mindustry->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('industry'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mindustry->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('industry/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'industryCode' => set_value('industryCode', $row->industryCode),
		'industryName' => set_value('industryName', $row->industryName),
		'industryDescription' => set_value('industryDescription', $row->industryDescription),
		'deleted' => set_value('deleted', $row->deleted),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
            $this->template->caplet('industry/industry_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('industry'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		//'entityId' => $this->input->post('entityId',TRUE),
		'industryName' => $this->input->post('industryName',TRUE),
		'industryDescription' => $this->input->post('industryDescription',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mindustry->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('industry'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mindustry->get_by_id($id);

        if ($row) {
            $this->Mindustry->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('industry'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('industry'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('industryName', 'industryname', 'trim|required');
	$this->form_validation->set_rules('industryDescription', 'industrydescription', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');
	$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Industry.php */
/* Location: ./application/controllers/Industry.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-02 15:23:57 */
/* http://harviacode.com */