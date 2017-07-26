<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timesheet extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mtimesheet','Mengagement','Memployee'));
        $this->load->library(array('form_validation','template'));
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'timesheet/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'timesheet/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'timesheet/';
            $config['first_url'] = base_url() . 'timesheet/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mtimesheet->total_rows($q);
        $timesheet = $this->Mtimesheet->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'timesheet_data' => $timesheet,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('timesheet/timesheet_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mtimesheet->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'engagementId' => $row->engagementId,
		'employeeId' => $row->employeeId,
		'date' => $row->date,
		'hour' => $row->hour,
		'description' => $row->description,
		'updateDate' => $row->updateDate,
	    );
          $this->template->caplet('timesheet/timesheet_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timesheet'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('timesheet/create_action'),
	    'engagements' =>  $this->Mengagement->get_all(),
	    'employees' =>  $this->Memployee->get_all(),
	    'id' => set_value('id'),
	    'engagementId' => set_value('engagementId'),
	    'employeeId' => set_value('employeeId'),
	    'date' => set_value('date'),
	    'hour' => set_value('hour'),
	    'description' => set_value('description'),
	    'updateDate' => set_value('updateDate'),
	);
      $this->template->caplet('timesheet/timesheet_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'engagementId' => $this->input->post('engagementId',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'date' => date('Y-m-d', strtotime(strtr($this->input->post('date',TRUE), '/', '-'))),
		'hour' => $this->input->post('hour',TRUE),
		'description' => $this->input->post('description',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mtimesheet->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('timesheet'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mtimesheet->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('timesheet/update_action'),
	    'engagements' =>  $this->Mengagement->get_all(),
	    'employees' =>  $this->Memployee->get_all(),
		'id' => set_value('id', $row->id),
		'engagementId' => set_value('engagementId', $row->engagementId),
		'employeeId' => set_value('employeeId', $row->employeeId),
		'date' => set_value('date', $row->date),
		'hour' => set_value('hour', $row->hour),
		'description' => set_value('description', $row->description),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
           $this->template->caplet('timesheet/timesheet_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timesheet'));
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
		'date' => date('Y-m-d', strtotime(strtr($this->input->post('date',TRUE), '/', '-'))),
		'hour' => $this->input->post('hour',TRUE),
		'description' => $this->input->post('description',TRUE),
		'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mtimesheet->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('timesheet'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mtimesheet->get_by_id($id);

        if ($row) {
            $this->Mtimesheet->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('timesheet'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timesheet'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('engagementId', 'engagementid', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('date', 'date', 'trim|required');
	$this->form_validation->set_rules('hour', 'hour', 'trim|required|numeric');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	//$this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "timesheet.xls";
        $judul = "timesheet";
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
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeId");
	xlsWriteLabel($tablehead, $kolomhead++, "Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Hour");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Mtimesheet->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->engagementId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->date);
	    xlsWriteNumber($tablebody, $kolombody++, $data->hour);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
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
        header("Content-Disposition: attachment;Filename=timesheet.doc");

        $data = array(
            'timesheet_data' => $this->Mtimesheet->get_all(),
            'start' => 0
        );
        
        $this->load->view('timesheet/timesheet_doc',$data);
    }

}
