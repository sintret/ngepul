<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Department extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mdepartment');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'department/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'department/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'department/';
            $config['first_url'] = base_url() . 'department/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mdepartment->total_rows($q);
        $department = $this->Mdepartment->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'department_data' => $department,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('department/department_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mdepartment->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'departmentCode' => $row->departmentCode,
		'departmentName' => $row->departmentName,
		'deleted' => $row->deleted,
	    );
               $this->template->caplet('department/department_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('department/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'departmentCode' => set_value('departmentCode'),
	    'departmentName' => set_value('departmentName'),
	    'deleted' => set_value('deleted'),
	);
           $this->template->caplet('department/department_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => 1,
		'departmentCode' => $this->input->post('departmentCode',TRUE),
		'departmentName' => $this->input->post('departmentName',TRUE),
		'deleted' => 0,
	    );

            $this->Mdepartment->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('department'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mdepartment->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('department/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'departmentCode' => set_value('departmentCode', $row->departmentCode),
		'departmentName' => set_value('departmentName', $row->departmentName),
		'deleted' => set_value('deleted', $row->deleted),
	    );
            $this->template->caplet('department/department_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
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
		'departmentCode' => $this->input->post('departmentCode',TRUE),
		'departmentName' => $this->input->post('departmentName',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
	    );

            $this->Mdepartment->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('department'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mdepartment->get_by_id($id);

        if ($row) {
            $this->Mdepartment->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('department'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('department'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('departmentCode', 'departmentcode', 'trim|required');
	$this->form_validation->set_rules('departmentName', 'departmentname', 'trim|required');
	$this->form_validation->set_rules('deleted', 'deleted', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "department.xls";
        $judul = "department";
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
	xlsWriteLabel($tablehead, $kolomhead++, "DepartmentCode");
	xlsWriteLabel($tablehead, $kolomhead++, "DepartmentName");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");

	foreach ($this->Mdepartment->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->departmentCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->departmentName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->deleted);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=department.doc");

        $data = array(
            'department_data' => $this->Mdepartment->get_all(),
            'start' => 0
        );
        
        $this->load->view('department/department_doc',$data);
    }

}

/* End of file Department.php */
/* Location: ./application/controllers/Department.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-26 04:12:23 */
/* http://harviacode.com */