<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Expensereimbursementdetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mexpensereimbursementdetail');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'expensereimbursementdetail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'expensereimbursementdetail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'expensereimbursementdetail/';
            $config['first_url'] = base_url() . 'expensereimbursementdetail/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mexpensereimbursementdetail->total_rows($q);
        $expensereimbursementdetail = $this->Mexpensereimbursementdetail->getData($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'expensereimbursementdetail_data' => $expensereimbursementdetail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('expensereimbursementdetail/expensereimbursementdetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mexpensereimbursementdetail->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'expenseId' => $row->expenseId,
		'engagementId' => $row->engagementId,
		'employeeId' => $row->employeeId,
		'periodeDate' => $row->periodeDate,
		'expenseDate' => $row->expenseDate,
		'amount' => $row->amount,
		'description' => $row->description,
		'approvalBy' => $row->approvalBy,
		'approvalStatus' => $row->approvalStatus,
		'billed' => $row->billed,
		'billedDate' => $row->billedDate,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
            $this->load->view('expensereimbursementdetail/expensereimbursementdetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expensereimbursementdetail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('expensereimbursementdetail/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'expenseId' => set_value('expenseId'),
	    'engagementId' => set_value('engagementId'),
	    'employeeId' => set_value('employeeId'),
	    'periodeDate' => set_value('periodeDate'),
	    'expenseDate' => set_value('expenseDate'),
	    'amount' => set_value('amount'),
	    'description' => set_value('description'),
	    'approvalBy' => set_value('approvalBy'),
	    'approvalStatus' => set_value('approvalStatus'),
	    'billed' => set_value('billed'),
	    'billedDate' => set_value('billedDate'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->load->view('expensereimbursementdetail/expensereimbursementdetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'expenseId' => $this->input->post('expenseId',TRUE),
		'engagementId' => $this->input->post('engagementId',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'periodeDate' => $this->input->post('periodeDate',TRUE),
		'expenseDate' => $this->input->post('expenseDate',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'description' => $this->input->post('description',TRUE),
		'approvalBy' => $this->input->post('approvalBy',TRUE),
		'approvalStatus' => $this->input->post('approvalStatus',TRUE),
		'billed' => $this->input->post('billed',TRUE),
		'billedDate' => $this->input->post('billedDate',TRUE),
		'userCreate' => $this->input->post('userCreate',TRUE),
		'createDate' => $this->input->post('createDate',TRUE),
		'userUpdate' => $this->input->post('userUpdate',TRUE),
		'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mexpensereimbursementdetail->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('expensereimbursementdetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mexpensereimbursementdetail->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('expensereimbursementdetail/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'expenseId' => set_value('expenseId', $row->expenseId),
		'engagementId' => set_value('engagementId', $row->engagementId),
		'employeeId' => set_value('employeeId', $row->employeeId),
		'periodeDate' => set_value('periodeDate', $row->periodeDate),
		'expenseDate' => set_value('expenseDate', $row->expenseDate),
		'amount' => set_value('amount', $row->amount),
		'description' => set_value('description', $row->description),
		'approvalBy' => set_value('approvalBy', $row->approvalBy),
		'approvalStatus' => set_value('approvalStatus', $row->approvalStatus),
		'billed' => set_value('billed', $row->billed),
		'billedDate' => set_value('billedDate', $row->billedDate),
		'userCreate' => set_value('userCreate', $row->userCreate),
		'createDate' => set_value('createDate', $row->createDate),
		'userUpdate' => set_value('userUpdate', $row->userUpdate),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
            $this->load->view('expensereimbursementdetail/expensereimbursementdetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expensereimbursementdetail'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'expenseId' => $this->input->post('expenseId',TRUE),
		'engagementId' => $this->input->post('engagementId',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'periodeDate' => $this->input->post('periodeDate',TRUE),
		'expenseDate' => $this->input->post('expenseDate',TRUE),
		'amount' => $this->input->post('amount',TRUE),
		'description' => $this->input->post('description',TRUE),
		'approvalBy' => $this->input->post('approvalBy',TRUE),
		'approvalStatus' => $this->input->post('approvalStatus',TRUE),
		'billed' => $this->input->post('billed',TRUE),
		'billedDate' => $this->input->post('billedDate',TRUE),
		'userCreate' => $this->input->post('userCreate',TRUE),
		'createDate' => $this->input->post('createDate',TRUE),
		'userUpdate' => $this->input->post('userUpdate',TRUE),
		'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mexpensereimbursementdetail->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('expensereimbursementdetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mexpensereimbursementdetail->get_by_id($id);

        if ($row) {
            $this->Mexpensereimbursementdetail->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('expensereimbursementdetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('expensereimbursementdetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('expenseId', 'expenseid', 'trim|required');
	$this->form_validation->set_rules('engagementId', 'engagementid', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('periodeDate', 'periodedate', 'trim|required');
	$this->form_validation->set_rules('expenseDate', 'expensedate', 'trim|required');
	$this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('approvalBy', 'approvalby', 'trim|required');
	$this->form_validation->set_rules('approvalStatus', 'approvalstatus', 'trim|required');
	$this->form_validation->set_rules('billed', 'billed', 'trim|required');
	$this->form_validation->set_rules('billedDate', 'billeddate', 'trim|required');
	$this->form_validation->set_rules('userCreate', 'usercreate', 'trim|required');
	$this->form_validation->set_rules('createDate', 'createdate', 'trim|required');
	$this->form_validation->set_rules('userUpdate', 'userupdate', 'trim|required');
	$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "expensereimbursementdetail.xls";
        $judul = "expensereimbursementdetail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseId");
	xlsWriteLabel($tablehead, $kolomhead++, "EngagementId");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeId");
	xlsWriteLabel($tablehead, $kolomhead++, "PeriodeDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseDate");
	xlsWriteLabel($tablehead, $kolomhead++, "Amount");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalBy");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "Billed");
	xlsWriteLabel($tablehead, $kolomhead++, "BilledDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Mexpensereimbursementdetail->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->expenseId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->engagementId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periodeDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expenseDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->amount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteNumber($tablebody, $kolombody++, $data->approvalBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approvalStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billed);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billedDate);
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
        header("Content-Disposition: attachment;Filename=expensereimbursementdetail.doc");

        $data = array(
            'expensereimbursementdetail_data' => $this->Mexpensereimbursementdetail->get_all(),
            'start' => 0
        );
        
        $this->load->view('expensereimbursementdetail/expensereimbursementdetail_doc',$data);
    }

}

/* End of file Expensereimbursementdetail.php */
/* Location: ./application/controllers/Expensereimbursementdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-03 18:13:24 */
/* http://harviacode.com */