<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reimbursement extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mreimbursement','Mexpense','Memployee','Musers','Mengagement','Mnotification'));
        $this->load->library(array('form_validation','template'));
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'reimbursement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'reimbursement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'reimbursement/';
            $config['first_url'] = base_url() . 'reimbursement/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mreimbursement->total_rows($q);
        $reimbursement = $this->Mreimbursement->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reimbursement_data' => $reimbursement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        
          
       
        
       $this->template->caplet('reimbursement/reimbursement_list', $data);
    }
    
     
   

    public function read($id) 
    {
        $row = $this->Mreimbursement->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'engagementId' => $row->engagementId,
		'employeeId' => $row->employeeId,
		'periodDate' => $row->periodDate,
		'approvalId' => $row->approvalId,
		'expenseId' => $row->expenseId,
		'expenseAmount' => $row->expenseAmount,
		'expenseDate' => $row->expenseDate,
		'expenseDesc' => $row->expenseDesc,
		'approvalStatusId' => $row->approvalStatusId,
		'approvalBy' => $row->approvalBy,
		'approvalDate' => $row->approvalDate,
		'approvalDesc' => $row->approvalDesc,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
       
             $this->template->caplet('reimbursement/reimbursement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reimbursement'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('reimbursement/create_action'),
	    'id' => set_value('id'),
	    'engagements' =>  $this->Mengagement->get_all(),
	    'expenses' =>  $this->Mexpense->get_all(),
	    'employees' =>  $this->Memployee->get_all(),
	    'engagementId' => set_value('engagementId'),
		'employeeId' => set_value('employeeId'),
	    'periodDate' => set_value('periodDate'),
	    'approvalId' => set_value('approvalId'),
	    'expenseId' => set_value('expenseId'),
	    'expenseAmount' => set_value('expenseAmount'),
	    'expenseDate' => set_value('expenseDate'),
	    'expenseDesc' => set_value('expenseDesc'),
	    'approvalStatusId' => set_value('approvalStatusId'),
	    'approvalBy' => set_value('approvalBy'),
	    'approvalDate' => set_value('approvalDate'),
	    'approvalDesc' => set_value('approvalDesc'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
         $this->template->caplet('reimbursement/reimbursement_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'engagementId' => $this->input->post('engagementId',TRUE),
		'employeeId' =>  $this->input->post('employeeId',TRUE),
		'periodDate' => date('Y-m-d', strtotime(strtr($this->input->post('periodDate',TRUE), '/', '-'))),
		'approvalId' => $this->input->post('approvalId',TRUE),
		'expenseId' => $this->input->post('expenseId',TRUE),
		'expenseAmount' => $this->input->post('expenseAmount',TRUE),
		'expenseDate' => date('Y-m-d', strtotime(strtr($this->input->post('expenseDate',TRUE), '/', '-'))),
		'expenseDesc' => $this->input->post('expenseDesc',TRUE),
		'approvalStatusId' => 1, // pending
	//	'approvalStatusId' => $this->input->post('approvalStatusId',TRUE),
	//	'approvalBy' => $this->input->post('approvalBy',TRUE),
	//	'approvalDate' =>  date('Y-m-d', strtotime(strtr($this->input->post('approvalDate',TRUE), '/', '-')) ),
	//	'approvalDesc' => $this->input->post('approvalDesc',TRUE),
		'userCreate' => $this->session->userdata('id'),
		'createDate' => date('Y-m-d H:i:s'),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

       // echo "<pre>"; print_r($data); exit(0);
            $this->Mreimbursement->insert($data);
			$lastId = $this->db->insert_id();

			Mnotification::notification(3,'test','description',base_url().'reimbursement/read/'. $lastId);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('reimbursement'));
          //  redirect(site_url('personal/my_reimbursement'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mreimbursement->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('reimbursement/update_action'),
		'id' => set_value('id', $row->id),  
        'engagements' =>  $this->Mengagement->get_all(),
        'employeeId' =>  set_value('employeeId', $row->employeeId),
	    'expenses' =>  $this->Mexpense->get_all(),
	    'employees' =>  $this->Memployee->get_all(),
		'engagementId' => set_value('engagementId', $row->engagementId),
		'periodDate' => set_value('periodDate', $row->periodDate),
		'approvalId' => set_value('approvalId', $row->approvalId),
		'expenseId' => set_value('expenseId', $row->expenseId),
		'expenseAmount' => set_value('expenseAmount', $row->expenseAmount),
		'expenseDate' => set_value('expenseDate', $row->expenseDate),
		'expenseDesc' => set_value('expenseDesc', $row->expenseDesc),
		'approvalStatusId' => set_value('approvalStatusId', $row->approvalStatusId),
		'approvalBy' => set_value('approvalBy', $row->approvalBy),
		'approvalDate' => set_value('approvalDate', $row->approvalDate),
		'approvalDesc' => set_value('approvalDesc', $row->approvalDesc),
		'userCreate' => set_value('userCreate', $row->userCreate),
		'createDate' => set_value('createDate', $row->createDate),
		'userUpdate' => set_value('userUpdate', $row->userUpdate),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
             $this->template->caplet('reimbursement/reimbursement_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reimbursement'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'engagementId' => $this->input->post('engagementId',TRUE),
        'employeeId' => $this->input->post('employeeId',TRUE),
		'periodDate' => date('Y-m-d', strtotime(strtr($this->input->post('periodDate',TRUE), '/', '-')) ),
		'approvalId' => $this->input->post('approvalId',TRUE),
		'expenseId' => $this->input->post('expenseId',TRUE),
		'expenseAmount' => $this->input->post('expenseAmount',TRUE),
		'expenseDate' => date('Y-m-d', strtotime(strtr($this->input->post('expenseDate',TRUE), '/', '-')) ),
		'expenseDesc' => $this->input->post('expenseDesc',TRUE),
		'approvalStatusId' => 1,
		//'approvalStatusId' => $this->input->post('approvalStatusId',TRUE),
		//'approvalBy' => $this->input->post('approvalBy',TRUE),
		//'approvalDate' => date('Y-m-d', strtotime(strtr($this->input->post('approvalDate',TRUE), '/', '-')) ),
		//'approvalDesc' => $this->input->post('approvalDesc',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//s'createDate' => $this->input->post('createDate',TRUE),
		'userUpdate' => $this->session->userdata('id'),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mreimbursement->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('personal/myreimbursement'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mreimbursement->get_by_id($id);

        if ($row) {
            $this->Mreimbursement->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('reimbursement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('reimbursement'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('engagementId', 'engagementid', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeId', 'trim|required');
	$this->form_validation->set_rules('periodDate', 'perioddate', 'trim|required');
	$this->form_validation->set_rules('approvalId', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('expenseId', 'expenseid', 'trim|required');
	$this->form_validation->set_rules('expenseAmount', 'expenseamount', 'trim|required|numeric');
	$this->form_validation->set_rules('expenseDate', 'expensedate', 'trim|required');
	$this->form_validation->set_rules('expenseDesc', 'expensedesc', 'trim|required');
	//$this->form_validation->set_rules('approvalStatusId', 'approvalstatusid', 'trim|required');
	//$this->form_validation->set_rules('approvalBy', 'approvalby', 'trim|required');
	//$this->form_validation->set_rules('approvalDate', 'approvaldate', 'trim|required');
	//$this->form_validation->set_rules('approvalDesc', 'approvaldesc', 'trim|required');
	//$this->form_validation->set_rules('userCreate', 'usercreate', 'trim|required');
	//$this->form_validation->set_rules('createDate', 'createdate', 'trim|required');
	//$this->form_validation->set_rules('userUpdate', 'userupdate', 'trim|required');
	//$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
      public function _rules_approval() 
    {
	$this->form_validation->set_rules('engagementId', 'engagementid', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeId', 'trim|required');
	$this->form_validation->set_rules('periodDate', 'perioddate', 'trim|required');
	$this->form_validation->set_rules('approvalId', 'approvalid', 'trim|required');
	$this->form_validation->set_rules('expenseId', 'expenseid', 'trim|required');
	$this->form_validation->set_rules('expenseAmount', 'expenseamount', 'trim|required|numeric');
	$this->form_validation->set_rules('expenseDate', 'expensedate', 'trim|required');
	$this->form_validation->set_rules('expenseDesc', 'expensedesc', 'trim|required');
	$this->form_validation->set_rules('approvalStatusId', 'approvalstatusid', 'trim|required');
	$this->form_validation->set_rules('approvalBy', 'approvalby', 'trim|required');
	//$this->form_validation->set_rules('approvalDate', 'approvaldate', 'trim|required');
	//$this->form_validation->set_rules('approvalDesc', 'approvaldesc', 'trim|required');
	//$this->form_validation->set_rules('userCreate', 'usercreate', 'trim|required');
	//$this->form_validation->set_rules('createDate', 'createdate', 'trim|required');
	//$this->form_validation->set_rules('userUpdate', 'userupdate', 'trim|required');
	//$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "reimbursement.xls";
        $judul = "reimbursement";
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
	xlsWriteLabel($tablehead, $kolomhead++, "EngagementId");
	xlsWriteLabel($tablehead, $kolomhead++, "PeriodDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalId");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseId");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseAmount");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ExpenseDesc");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatusId");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalBy");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalDate");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalDesc");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Mreimbursement->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->engagementId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periodDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->approvalId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->expenseId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->expenseAmount);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expenseDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->expenseDesc);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approvalStatusId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->approvalBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approvalDate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approvalDesc);
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
        header("Content-Disposition: attachment;Filename=reimbursement.doc");

        $data = array(
            'reimbursement_data' => $this->Mreimbursement->get_all(),
            'start' => 0
        );
        
        $this->load->view('reimbursement/reimbursement_doc',$data);
    }

}

