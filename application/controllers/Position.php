<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Position extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mposition','Mposition_group'));
        $this->load->library(array('form_validation','template'));
        $this->load->helper(array('form','url','rupiah_helper'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'position/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'position/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'position/';
            $config['first_url'] = base_url() . 'position/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mposition->total_rows($q);
        $position = $this->Mposition->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'position_data' => $position,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('position/position_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mposition->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'company_name' => $row->company_name,
		'positionCode' => $row->positionCode,
		'positionName' => $row->positionName,
		'positionBillingRate' => $row->positionBillingRate,
		'positionGroup' => $row->positionGroup,
		'positionMaxJob' => $row->positionMaxJob,
		'groupName' => $row->groupName,
		'positionDeleted' => $row->positionDeleted,
	    );
            $this->template->caplet('position/position_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('position/create_action'),
	    'id' => set_value('id'),
            'qpositionGroup' => $this->Mposition_group->get_all(),
	    'entityId' => set_value('entityId'),
	    'positionCode' => set_value('positionCode'),
	    'positionName' => set_value('positionName'),
	    'positionBillingRate' => set_value('positionBillingRate'),
	    'positionGroup' => set_value('positionGroup'),
	    'positionMaxJob' => set_value('positionMaxJob'),
	    'positionDeleted' => set_value('positionDeleted'),
	);
        $this->template->caplet('position/position_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => 1,
		'positionCode' => $this->input->post('positionCode',TRUE),
		'positionName' => $this->input->post('positionName',TRUE),
		'positionBillingRate' => $this->input->post('positionBillingRate',TRUE),
		'positionGroup' => $this->input->post('positionGroup',TRUE),
		'positionMaxJob' => $this->input->post('positionMaxJob',TRUE),
		'positionDeleted' => 0,
	    );

            $this->Mposition->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('position'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mposition->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('position/update_action'),
		'id' => set_value('id', $row->id),
		'qpositionGroup' => $this->Mposition_group->get_all(),
		'entityId' => set_value('entityId', $row->entityId),
		'positionCode' => set_value('positionCode', $row->positionCode),
		'positionName' => set_value('positionName', $row->positionName),
		'positionBillingRate' => set_value('positionBillingRate', $row->positionBillingRate),
		'positionGroup' => set_value('positionGroup', $row->positionGroup),
                'positionMaxJob' => set_value('positionMaxJob', $row->positionMaxJob),
		'positionDeleted' => set_value('positionDeleted', $row->positionDeleted),
	    );
            $this->template->caplet('position/position_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
       // echo "<pre>"; print_r($_POST); exit(0);
       
            $data = array(
		//'entityId' => $this->input->post('entityId',TRUE),
		'positionCode' => $this->input->post('positionCode',TRUE),
		'positionName' => $this->input->post('positionName',TRUE),
		'positionBillingRate' => $this->input->post('positionBillingRate',TRUE),
		'positionGroup' => $this->input->post('positionGroup',TRUE),
		'positionMaxJob' => $this->input->post('positionMaxJob',TRUE),
		//'positionDeleted' => $this->input->post('positionDeleted',TRUE),
	    );

            $this->Mposition->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('position'));
    
    }
    
    public function delete($id) 
    {
        $row = $this->Mposition->get_by_id($id);

        if ($row) {
            $this->Mposition->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('position'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('position'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('positionCode', 'positioncode', 'trim|required');
	$this->form_validation->set_rules('positionName', 'positionname', 'trim|required');
	$this->form_validation->set_rules('positionBillingRate', 'positionbillingrate', 'trim|required|numeric');
	$this->form_validation->set_rules('positionGroup', 'positiongroup', 'trim|required');
	$this->form_validation->set_rules('positionDeleted', 'positiondeleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "position.xls";
        $judul = "position";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "EntityId");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionCode");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionName");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionBillingRate");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionGroup");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionDeleted");

	foreach ($this->Mposition->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->positionCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->positionName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->positionBillingRate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->positionGroup);
	    xlsWriteLabel($tablebody, $kolombody++, $data->positionDeleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=position.doc");

        $data = array(
            'position_data' => $this->Mposition->get_all(),
            'start' => 0
        );
        
        $this->load->view('position/position_doc',$data);
    }

}

/* End of file Position.php */
/* Location: ./application/controllers/Position.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-25 21:17:35 */
/* http://harviacode.com */