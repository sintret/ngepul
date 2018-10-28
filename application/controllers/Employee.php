<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Memployee','Memployee_status','Mposition','Mdepartment','Mreligion','Mdegree','Mbank'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'employee/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'employee/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'employee/';
            $config['first_url'] = base_url() . 'employee/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Memployee->total_rows($q);
        //$employee = $this->Memployee->get_limit_data($config['per_page'], $start, $q);
        $employee = $this->Memployee->getData($config['per_page'], $start, $q);
        
        $dropDown = $this->Memployee->dropdown_level(1);
      //echo "<pre>"; print_r($dropDown); exit(0);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'employee_data' => $employee,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->capletfull('employee/employee_list', $data);
    }

    public function read($id) 
    {
      
        $row = $this->Memployee->get_by_id($id);
       // echo "<pre>"; print_r($row); exit(0);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'employee_code' => $row->employee_code,
		'employeeStatusId' => $row->employeeStatusId,
		'firstName' => $row->firstName,
		'lastName' => $row->lastName,
		'sex' => $row->sex,
		'religionId' => $row->religionId,
		'positionId' => $row->positionId,
		'departmentId' => $row->departmentId,
		'phone' => $row->phone,
		'handphone' => $row->handphone,
		'email1' => $row->email1,
		'email2' => $row->email2,
		'address' => $row->address,
		'birthday' => $row->birthday,
		'costRate' => $row->costRate,
		'school' => $row->school,
		'degree' => $row->degree,
		'sertificateNo' => $row->sertificateNo,
		'accountant' => $row->accountantStatusId,
		'regAccountantNo' => $row->regAccountantNo,
		'CPA' => $row->cpaStatusId,
		'CPANo' => $row->cpaNo,
		'entry' => $row->entry,
		'resign' => $row->resign,
		'resignDate' => $row->resignDate,
		'functionType' => $row->functionType,
		'bankId' => $row->bankId,
		'accNo' => $row->accNo,
		'accName' => $row->accName,
		'bankBranch' => $row->bankBranch,
		'deleted' => $row->deleted,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
            $this->template->caplet('employee/employee_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('employee/create_action'),
	    'id' => set_value('id'),
		'statuses' => $this->Memployee_status->get_all(),
		'positions' => $this->Mposition->get_all(),
		'departments' => $this->Mdepartment->get_all(),
		'religions' => $this->Mreligion->get_all(),
		'degrees' => $this->Mdegree->get_all(),
		'banks' => $this->Mbank->get_all(),
	    'entityId' => set_value('entityId'),
	    'employee_code' => set_value('employee_code'),
	    'employeeStatusId' => set_value('employeeStatusId'),
	    'firstName' => set_value('firstName'),
	    'lastName' => set_value('lastName'),
	    'sex' => set_value('sex'),
	    'religionId' => set_value('religionId'),
	    'positionId' => set_value('positionId'),
	    'departmentId' => set_value('departmentId'),
	    'phone' => set_value('phone'),
	    'handphone' => set_value('handphone'),
	    'email1' => set_value('email1'),
	    'email2' => set_value('email2'),
	    'address' => set_value('address'),
	    'birthday' => set_value('birthday'),
	    'costRate' => set_value('costRate'),
	    'school' => set_value('school'),
	    'degree' => set_value('degree'),
	    'sertificateNo' => set_value('sertificateNo'),
	    'accountantStatusId' => set_value('accountantStatusId'),
	    'regAccountantNo' => set_value('regAccountantNo'),
	    'cpaStatusId' => set_value('cpaStatusId'),
	    'cpaNo' => set_value('cpaNo'),
	    'entry' => set_value('entry'),
	    'resign' => set_value('resign'),
	    'resignDate' => set_value('resignDate'),
	    'functionType' => set_value('functionType'),
	    'bankId' => set_value('bankId'),
	    'accNo' => set_value('accNo'),
	    'accName' => set_value('accName'),
	    'bankBranch' => set_value('bankBranch'),
	    'deleted' => set_value('deleted'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->template->caplet('employee/employee_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

       // echo "<pre>"; print_r($_POST); exit(0);
        
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'employee_code' => $this->input->post('employee_code',TRUE),
		'employeeStatusId' => $this->input->post('employeeStatusId',TRUE),
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'religionId' => $this->input->post('religionId',TRUE),
		'positionId' => $this->input->post('positionId',TRUE),
		'departmentId' => $this->input->post('departmentId',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'email1' => $this->input->post('email1',TRUE),
		'email2' => $this->input->post('email2',TRUE),
		'address' => $this->input->post('address',TRUE),
		'birthday' => date('Y-m-d', strtotime($this->input->post('birthday',TRUE) )),
		'costRate' => $this->input->post('costRate',TRUE),
		'school' => $this->input->post('school',TRUE),
		'degree' => $this->input->post('degree',TRUE),
		'sertificateNo' => $this->input->post('sertificateNo',TRUE),
		'accountantStatusId' => $this->input->post('accountantStatusId',TRUE) == '' ? 0 : 1,
		'regAccountantNo' => $this->input->post('regAccountantNo',TRUE),
		'cpaStatusId' => $this->input->post('cpaStatusId',TRUE) == '' ? 0 : 1,
		'cpaNo' => $this->input->post('cpaNo',TRUE),
		'entry' => date('Y-m-d', strtotime($this->input->post('entry',TRUE))),
		'resign' => $this->input->post('resign',TRUE) == '' ? 0 : 1,
		'resignDate' => date('Y-m-d', strtotime($this->input->post('resignDate',TRUE))),
		'functionType' => $this->input->post('functionType',TRUE),
		'bankId' => $this->input->post('bankId',TRUE),
		'accNo' => $this->input->post('accNo',TRUE),
		'accName' => $this->input->post('accName',TRUE),
		'bankBranch' => $this->input->post('bankBranch',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//'createDate' => $this->input->post('createDate',TRUE),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Memployee->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('employee'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Memployee->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('employee/update_action'),
		'id' => set_value('id', $row->id),
		'statuses' => $this->Memployee_status->get_all(),
		'positions' => $this->Mposition->get_all(),
		'departments' => $this->Mdepartment->get_all(),
		'religions' => $this->Mreligion->get_all(),
		'degrees' => $this->Mdegree->get_all(),
		'banks' => $this->Mbank->get_all(),
		//'employeeStatuses' => $this->Mposition->get_all($id),
		'entityId' => set_value('entityId', $row->entityId),
		'employee_code' => set_value('employee_code', $row->employee_code),
		'employeeStatusId' => set_value('employeeStatusId', $row->employeeStatusId),
		'firstName' => set_value('firstName', $row->firstName),
		'lastName' => set_value('lastName', $row->lastName),
		'sex' => set_value('sex', $row->sex),
		'religionId' => set_value('religionId', $row->religionId),
		'positionId' => set_value('positionId', $row->positionId),
		'departmentId' => set_value('departmentId', $row->departmentId),
		'phone' => set_value('phone', $row->phone),
		'handphone' => set_value('handphone', $row->handphone),
		'email1' => set_value('email1', $row->email1),
		'email2' => set_value('email2', $row->email2),
		'address' => set_value('address', $row->address),
		'birthday' => set_value('birthday', $row->birthday),
		'costRate' => set_value('costRate', $row->costRate),
		'school' => set_value('school', $row->school),
		'degree' => set_value('degree', $row->degree),
		'sertificateNo' => set_value('sertificateNo', $row->sertificateNo),
		'accountantStatusId' => set_value('accountantStatusId', $row->accountantStatusId),
		'regAccountantNo' => set_value('regAccountantNo', $row->regAccountantNo),
		'cpaStatusId' => set_value('cpaStatusId', $row->cpaStatusId),
		'cpaNo' => set_value('cpaNo', $row->cpaNo),
		'entry' => set_value('entry', $row->entry),
		'resign' => set_value('resign', $row->resign),
		'resignDate' => set_value('resignDate', $row->resignDate),
		'functionType' => set_value('functionType', $row->functionType),
		'bankId' => set_value('bankId', $row->bankId),
		'accNo' => set_value('accNo', $row->accNo),
		'accName' => set_value('accName', $row->accName),
		'bankBranch' => set_value('bankBranch', $row->bankBranch),
		'deleted' => set_value('deleted', $row->deleted),
		'userCreate' => set_value('userCreate', $row->userCreate),
		'createDate' => set_value('createDate', $row->createDate),
		'userUpdate' => set_value('userUpdate', $row->userUpdate),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
            $this->template->caplet('employee/employee_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('employee'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        //echo "<pre>"; print_r($_POST); exit(0);

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'employee_code' => $this->input->post('employee_code',TRUE),
		'employeeStatusId' => $this->input->post('employeeStatusId',TRUE),
		'firstName' => $this->input->post('firstName',TRUE),
		'lastName' => $this->input->post('lastName',TRUE),
		'sex' => $this->input->post('sex',TRUE),
		'religionId' => $this->input->post('religionId',TRUE),
		'positionId' => $this->input->post('positionId',TRUE),
		'departmentId' => $this->input->post('departmentId',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'email1' => $this->input->post('email1',TRUE),
		'email2' => $this->input->post('email2',TRUE),
		'address' => $this->input->post('address',TRUE),
		'birthday' => date('Y-m-d',strtotime($this->input->post('birthday',TRUE) )),
		'costRate' => $this->input->post('costRate',TRUE),
		'school' => $this->input->post('school',TRUE),
		'degree' => $this->input->post('degree',TRUE),
		'sertificateNo' => $this->input->post('sertificateNo',TRUE),
		'accountantStatusId' => $this->input->post('accountantStatusId',TRUE),
		'regAccountantNo' => $this->input->post('regAccountantNo',TRUE),
		'cpaStatusId' => $this->input->post('cpaStatusId',TRUE),
		'cpaNo' => $this->input->post('cpaNo',TRUE),
		'entry' => date('Y-m-d', strtotime($this->input->post('entry',TRUE) )),
		'resign' => $this->input->post('resign',TRUE),
		'resignDate' => date('Y-m-d',strtotime($this->input->post('resignDate',TRUE) )),
		'functionType' => $this->input->post('functionType',TRUE),
		'bankId' => $this->input->post('bankId',TRUE),
		'accNo' => $this->input->post('accNo',TRUE),
		'accName' => $this->input->post('accName',TRUE),
		'bankBranch' => $this->input->post('bankBranch',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//'createDate' => $this->input->post('createDate',TRUE),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Memployee->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('employee'));
//        }
    }
    
    public function delete($id) 
    {
        $page =  $this->uri->segment(5);
        $row = $this->Memployee->get_by_id($id);

        if ($row) {
//            $this->Memployee->delete($id);
            $data['deleted'] = 1;
            $this->Mbpkm->update($id, $data);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(base_url('employee/?start='.$page));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(base_url('employee/?start='.$page));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('employee_code', 'employee code', 'trim|required');
	$this->form_validation->set_rules('employeeStatusId', 'employeestatusid', 'trim|required');
	$this->form_validation->set_rules('firstName', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastName', 'lastname', 'trim|required');
	$this->form_validation->set_rules('sex', 'sex', 'trim|required');
	$this->form_validation->set_rules('religionId', 'religionid', 'trim|required');
	$this->form_validation->set_rules('positionId', 'positionid', 'trim|required');
	$this->form_validation->set_rules('departmentId', 'departmentid', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('handphone', 'handphone', 'trim|required');
	$this->form_validation->set_rules('email1', 'email1', 'trim|required');
	$this->form_validation->set_rules('email2', 'email2', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('birthday', 'birthday', 'trim|required');
	$this->form_validation->set_rules('costRate', 'costrate', 'trim|required|numeric');
	$this->form_validation->set_rules('school', 'school', 'trim|required');
	$this->form_validation->set_rules('degree', 'degree', 'trim|required');
	$this->form_validation->set_rules('sertificateNo', 'sertificateno', 'trim|required');
	$this->form_validation->set_rules('accountant', 'accountant', 'trim|required');
	$this->form_validation->set_rules('regAccountantNo', 'regaccountantno', 'trim|required');
	$this->form_validation->set_rules('CPA', 'cpa', 'trim|required');
	$this->form_validation->set_rules('CPANo', 'cpano', 'trim|required');
	$this->form_validation->set_rules('entry', 'entry', 'trim|required');
	$this->form_validation->set_rules('resign', 'resign', 'trim|required');
	$this->form_validation->set_rules('resignDate', 'resigndate', 'trim|required');
	$this->form_validation->set_rules('functionType', 'functiontype', 'trim|required');
	$this->form_validation->set_rules('bankId', 'bankid', 'trim|required');
	$this->form_validation->set_rules('accNo', 'accno', 'trim|required');
	$this->form_validation->set_rules('accName', 'accname', 'trim|required');
	$this->form_validation->set_rules('bankBranch', 'bankbranch', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');
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
        $namaFile = "employee.xls";
        $judul = "employee";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Employee Code");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeStatusId");
	xlsWriteLabel($tablehead, $kolomhead++, "FirstName");
	xlsWriteLabel($tablehead, $kolomhead++, "LastName");
	xlsWriteLabel($tablehead, $kolomhead++, "Sex");
	xlsWriteLabel($tablehead, $kolomhead++, "ReligionId");
	xlsWriteLabel($tablehead, $kolomhead++, "PositionId");
	xlsWriteLabel($tablehead, $kolomhead++, "DepartmentId");
	xlsWriteLabel($tablehead, $kolomhead++, "Phone");
	xlsWriteLabel($tablehead, $kolomhead++, "Handphone");
	xlsWriteLabel($tablehead, $kolomhead++, "Email1");
	xlsWriteLabel($tablehead, $kolomhead++, "Email2");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "Birthday");
	xlsWriteLabel($tablehead, $kolomhead++, "CostRate");
	xlsWriteLabel($tablehead, $kolomhead++, "School");
	xlsWriteLabel($tablehead, $kolomhead++, "Degree");
	xlsWriteLabel($tablehead, $kolomhead++, "SertificateNo");
	xlsWriteLabel($tablehead, $kolomhead++, "Accountant");
	xlsWriteLabel($tablehead, $kolomhead++, "RegAccountantNo");
	xlsWriteLabel($tablehead, $kolomhead++, "CPA");
	xlsWriteLabel($tablehead, $kolomhead++, "CPANo");
	xlsWriteLabel($tablehead, $kolomhead++, "Entry");
	xlsWriteLabel($tablehead, $kolomhead++, "Resign");
	xlsWriteLabel($tablehead, $kolomhead++, "ResignDate");
	xlsWriteLabel($tablehead, $kolomhead++, "FunctionType");
	xlsWriteLabel($tablehead, $kolomhead++, "BankId");
	xlsWriteLabel($tablehead, $kolomhead++, "AccNo");
	xlsWriteLabel($tablehead, $kolomhead++, "AccName");
	xlsWriteLabel($tablehead, $kolomhead++, "BankBranch");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Memployee->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->employee_code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeStatusId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->firstName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->lastName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sex);
	    xlsWriteNumber($tablebody, $kolombody++, $data->religionId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->positionId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->departmentId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->phone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->handphone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email1);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email2);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteLabel($tablebody, $kolombody++, $data->birthday);
	    xlsWriteNumber($tablebody, $kolombody++, $data->costRate);
	    xlsWriteLabel($tablebody, $kolombody++, $data->school);
	    xlsWriteNumber($tablebody, $kolombody++, $data->degree);
	    xlsWriteLabel($tablebody, $kolombody++, $data->sertificateNo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->accountant);
	    xlsWriteLabel($tablebody, $kolombody++, $data->regAccountantNo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CPA);
	    xlsWriteLabel($tablebody, $kolombody++, $data->CPANo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->entry);
	    xlsWriteLabel($tablebody, $kolombody++, $data->resign);
	    xlsWriteLabel($tablebody, $kolombody++, $data->resignDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->functionType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bankId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->accNo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->accName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bankBranch);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deleted);
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
        header("Content-Disposition: attachment;Filename=employee.doc");

        $data = array(
            'employee_data' => $this->Memployee->get_all(),
            'start' => 0
        );
        
        $this->load->view('employee/employee_doc',$data);
    }
    
     public function import_excel()	{  
         
         $this->load->library('Excelfile');
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = 'uploads/excell/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
           $new_name = strtolower(str_replace(' ', '_', preg_replace('/[,]/', '', md5(date('YmdHis')).$_FILES["file"]['name'])));
         $configUpload['file_name'] = $new_name;
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('file');	
         $upload_data = $this->upload->data(); 
                 $file_name = $upload_data['file_name']; 
		 $extension = $upload_data['file_ext']; 
                 
        $obj=PHPExcel_IOFactory::load('uploads/excell/'.$file_name);
		$cell=$obj->getActiveSheet()->getCellCollection();
		foreach($cell as $cl){
			$column=$obj->getActiveSheet()->getCell($cl)->getColumn();
			$row=$obj->getActiveSheet()->getCell($cl)->getRow();
			$data_value=$obj->getActiveSheet()->getCell($cl)->getValue();
			if($row==1){
				$header[$row][$column]=$data_value;
			}else{
				$arr_data[$row][$column]=$data_value;
			}
		}
       
                $data['header']=$header;
		$data['values']=$arr_data;
                $totalRows = count($arr_data)+1;
                for($i=2;$i<=$totalRows;$i++)
                {
                   $data_user=array(
                                                'entityId'=>$arr_data[$i]['B'], 
                                                'employee_code'=>trim($arr_data[$i]['C']),
                                                'employeeStatusId'=>$arr_data[$i]['D'],
                                                'firstName'=>$arr_data[$i]['E'] , 
                                                'lastName'=>$arr_data[$i]['F'],
                                                'sex'=>$arr_data[$i]['G'],
                                                'religionId'=>$arr_data[$i]['H'],
                                                'positionId'=>$arr_data[$i]['I'],
                                                'departmentId'=>$arr_data[$i]['J'],
                                                'phone'=>$arr_data[$i]['K'],
                                                'handphone'=>$arr_data[$i]['L'],
                                                'email1'=>$arr_data[$i]['M'],
                                                'email2'=>$arr_data[$i]['N'],
                                                'address'=>$arr_data[$i]['0'],
                                                'birthday'=> date('Y-m-d', strtotime($arr_data[$i]['P']) ), //DATE
                                                'costRate'=>$arr_data[$i]['Q'],
                                                'school'=>$arr_data[$i]['R'],
                                                'degree'=>$arr_data[$i]['S'],
                                                'sertificateNo'=>$arr_data[$i]['T'],
                                                'accountant'=>$arr_data[$i]['U'],
                                                'regAccountantNo'=>$arr_data[$i]['V'],
                                                'CPA'=>$arr_data[$i]['W'],
                                                'CPANo'=>$arr_data[$i]['X'],
                                                'entry'=>$arr_data[$i]['Y'],
                                                'resign'=>$arr_data[$i]['Z'],
                                                'resignDate'=>date('Y-m-d', strtotime($arr_data[$i]['AA']) ), //DATA
                                                'functionType'=>$arr_data[$i]['AB'],
                                                'bankId'=>$arr_data[$i]['AC'],
                                                'accNo'=>$arr_data[$i]['AD'],
                                                'accName'=>$arr_data[$i]['AE'],
                                                'bankBranch'=>$arr_data[$i]['AF'],
                                                'npwp'=>$arr_data[$i]['AG'],
                                                'noRek'=>$arr_data[$i]['AH'],
                                                'noKtp'=>$arr_data[$i]['AI'],
                                                'martialStatus'=>$arr_data[$i]['AJ'],
                                                'jmlTanggungan'=>$arr_data[$i]['AK'],
                                                'deleted'=>0,
                                                'userCreate'=>1,
                                                'createDate'=>date('Y-m-d H:i:s'),
                                                'userUpdate'=>1
                                    );
			  $this->Memployee->add_import($data_user);
                }
                redirect('employee');
            echo "<pre>"; print_r($arr_data);     
	exit(0);           
       
     }
    
    public function import_excel2()	{  
//Path of files were you want to upload on localhost (C:/xampp/htdocs/ProjectName/uploads/excel/)	 
         $configUpload['upload_path'] = FCPATH.'uploads/excel/';
         $configUpload['allowed_types'] = 'xls|xlsx|csv';
         $configUpload['max_size'] = '5000';
         $this->load->library('upload', $configUpload);
         $this->upload->do_upload('userfile');	
         $upload_data = $this->upload->data(); 
         $file_name = $upload_data['file_name']; 
		 $extension=$upload_data['file_ext']; 
		
//$objReader =PHPExcel_IOFactory::createReader('Excel5');     //For excel 2003 
 //$objReader= PHPExcel_IOFactory::createReader('Excel2007');	// For excel 2007 
 $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');	  
          //Set to read only
          $objReader->setReadDataOnly(true); 		  
        //Load excel file
		 $objPHPExcel=$objReader->load(FCPATH.'uploads/excel/'.$file_name);		 
         $totalrows=$objPHPExcel->setActiveSheetIndex(0)->getHighestRow();   //Count Numbe of rows avalable in excel      	 
         $objWorksheet=$objPHPExcel->setActiveSheetIndex(0);                
          //loop from first data untill last data
          for($i=2;$i<=$totalrows;$i++)
          {
                $FirstName= $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();			
                $LastName= $objWorksheet->getCellByColumnAndRow(6,$i)->getValue(); //Excel Column 1
                $Email= $objWorksheet->getCellByColumnAndRow(13,$i)->getValue(); //Excel Column 2
		$Mobile=$objWorksheet->getCellByColumnAndRow(11,$i)->getValue(); //Excel Column 3
		$Address=$objWorksheet->getCellByColumnAndRow(15,$i)->getValue(); //Excel Column 4
                            $data_user=array(
                                                'entityId'=>$FirstName, 
                                                'lastName'=>$LastName ,
                                                'email1'=>$Email ,
                                                'Mobile'=>$Mobile , 
                                                'address'=>$Address);
			  $this->Memployee->add_import($data_user);
              			  
          }
             unlink('././uploads/excel/'.$file_name); //File Deleted After uploading in database .			 
             redirect(base_url() . "put link were you want to redirect");
	           
       
     }
     
     
     public function upload_test(){
       
         $this->load->library('Excelfile');
		$file="./uploads/Book1.xlsx";
		$obj=PHPExcel_IOFactory::load($file);
		$cell=$obj->getActiveSheet()->getCellCollection();
		foreach($cell as $cl){
			$column=$obj->getActiveSheet()->getCell($cl)->getColumn();
			$row=$obj->getActiveSheet()->getCell($cl)->getRow();
			$data_value=$obj->getActiveSheet()->getCell($cl)->getValue();
			if($row==1){
				$header[$row][$column]=$data_value;
			}else{
				$arr_data[$row][$column]=$data_value;
			}
		}
		$data['header']=$header;
		$data['values']=$arr_data;
                $totalRows = count($arr_data)+1;
                for($i=2;$i<=$totalRows;$i++)
                {
                   $sl =  $arr_data[$i]['A'];
                   $dlno =  $arr_data[$i]['B'];
                   $dlno =  $arr_data[$i]['B'];
                   $mobilno =  $arr_data[$i]['C'];
                   $valid =  $arr_data[$i]['D'];
                   $action =  $arr_data[$i]['E'];
                   echo "<pre>"; print_r($sl);
                }
                
		echo "<pre>"; print_r($arr_data); //exit(0);
	//	$this->load->view('welcome_message',$data);
         
    }

}
