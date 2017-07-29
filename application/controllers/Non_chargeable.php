<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Non_chargeable extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mnon_chargeable','Memployee','Mleave'));
        $this->load->library(array('form_validation','template'));
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'non_chargeable/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'non_chargeable/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'non_chargeable/';
            $config['first_url'] = base_url() . 'non_chargeable/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mnon_chargeable->total_rows($q);
        $non_chargeable = $this->Mnon_chargeable->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'non_chargeable_data' => $non_chargeable,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('non_chargeable/non_chargeable_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mnon_chargeable->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
	    'employees' =>  $this->Memployee->get_all(),
	    'leaves' =>  $this->Mleave->get_all(),
		'periode' => $row->periode,
		'employeeId' => $row->employeeId,
		'leaveId' => $row->leaveId,
		'nonChargeDesc' => $row->nonChargeDesc,
		'date' => $row->date,
		'hour' => $row->hour,
		'time' => $row->time,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
            $this->load->view('non_chargeable/non_chargeable_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('non_chargeable'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('non_chargeable/create_action'),
	    'employees' =>  $this->Memployee->get_all(),
	    'leaves' =>  $this->Mleave->get_all(),
	    'id' => set_value('id'),
	    'periode' => set_value('periode'),
	    'employeeId' => set_value('employeeId'),
	    'leaveId' => set_value('leaveId'),
	    'nonChargeDesc' => set_value('nonChargeDesc'),
	    'date' => set_value('date'),
	    'hour' => set_value('hour'),
	    'time' => set_value('time'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->template->caplet('non_chargeable/non_chargeable_form', $data);
    }
    
    public function create_action() 
    {
       // echo "<pre>"; print_r($_POST);exit(0);
       $this->_rules();

      if ($this->form_validation->run() == FALSE) {
           $this->create();
        } else {
            $data = array(
		'periode' =>  date('Y-m-d', strtotime(strtr($this->input->post('periode',TRUE), '/', '-'))),
		'employeeId' =>$this->input->post('employeeId',TRUE),
		'leaveId' => $this->input->post('leaveId',TRUE),
		'nonChargeDesc' => $this->input->post('nonChargeDesc',TRUE),
		'date' => date('Y-m-d', strtotime(strtr($this->input->post('date',TRUE), '/', '-'))),
		'hour' => $this->input->post('hour',TRUE),
		//'time' => $this->input->post('time',TRUE),
		'userCreate' => $this->session->userdata('id'),
		'createDate' => date('Y-m-d H:i:s'),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mnon_chargeable->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('non_chargeable'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mnon_chargeable->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('non_chargeable/update_action'),
	    'employees' =>  $this->Memployee->get_all(),
	    'leaves' =>  $this->Mleave->get_all(),
		'id' => set_value('id', $row->id),
		'periode' => set_value('periode', $row->periode),
		'employeeId' => set_value('employeeId', $row->employeeId),
		'leaveId' => set_value('leaveId', $row->leaveId),
		'nonChargeDesc' => set_value('nonChargeDesc', $row->nonChargeDesc),
		'date' => set_value('date', $row->date),
		'hour' => set_value('date', $row->hour),
		'time' => set_value('time', $row->time),
	//	'userCreate' => set_value('userCreate', $row->userCreate),
	//	'createDate' => set_value('createDate', $row->createDate),
	//	'userUpdate' => set_value('userUpdate', $row->userUpdate),
	//	'updateDate' => set_value('updateDate', $row->updateDate),
	    );
             $this->template->caplet('non_chargeable/non_chargeable_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('non_chargeable'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'periode' => date('Y-m-d', strtotime(strtr($this->input->post('periode',TRUE), '/', '-'))),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'leaveId' => $this->input->post('leaveId',TRUE),
		'nonChargeDesc' => $this->input->post('nonChargeDesc',TRUE),
		'date' => date('Y-m-d', strtotime(strtr($this->input->post('date',TRUE), '/', '-'))),
		'hour' => $this->input->post('hour',TRUE),
	//	'time' => $this->input->post('time',TRUE),
	//	'userCreate' => $this->input->post('userCreate',TRUE),
	//	'createDate' => $this->input->post('createDate',TRUE),
		'userUpdate' => $this->session->userdata('id'),
	//	'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mnon_chargeable->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('non_chargeable'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mnon_chargeable->get_by_id($id);

        if ($row) {
            $this->Mnon_chargeable->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('non_chargeable'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('non_chargeable'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('periode', 'periode', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('leaveId', 'leaveid', 'trim|required');
	$this->form_validation->set_rules('nonChargeDesc', 'nonchargedesc', 'trim|required');
	$this->form_validation->set_rules('hour', 'hour', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
//	$this->form_validation->set_rules('time', 'time', 'trim|required');
//	$this->form_validation->set_rules('userCreate', 'usercreate', 'trim|required');
//	$this->form_validation->set_rules('createDate', 'createdate', 'trim|required');
//	$this->form_validation->set_rules('userUpdate', 'userupdate', 'trim|required');
//	$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "non_chargeable.xls";
        $judul = "non_chargeable";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Periode");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeId");
	xlsWriteLabel($tablehead, $kolomhead++, "LeaveId");
	xlsWriteLabel($tablehead, $kolomhead++, "NonChargeDesc");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Time");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Mnon_chargeable->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periode);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->leaveId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nonChargeDesc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->time);
	    xlsWriteNumber($tablebody, $kolombody++, $data->userCreate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->createDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->userUpdate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updateDate);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=non_chargeable.doc");

        $data = array(
            'non_chargeable_data' => $this->Mnon_chargeable->get_all(),
            'start' => 0
        );
        
        $this->load->view('non_chargeable/non_chargeable_doc',$data);
    }

}

/* End of file Non_chargeable.php */
/* Location: ./application/controllers/Non_chargeable.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-29 12:09:57 */
/* http://harviacode.com */