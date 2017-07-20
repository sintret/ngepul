<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Timereportdetail extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mtimereportdetail');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'timereportdetail/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'timereportdetail/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'timereportdetail/';
            $config['first_url'] = base_url() . 'timereportdetail/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mtimereportdetail->total_rows($q);
        $timereportdetail = $this->Mtimereportdetail->get_limit_data($config['per_page'], $start, $q);        
        $timereportdetail = $this->Mtimereportdetail->getData($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'timereportdetail_data' => $timereportdetail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('timereportdetail/timereportdetail_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mtimereportdetail->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'Code' => $row->Code,
		'employeeId' => $row->employeeId,
		'periodeDate' => $row->periodeDate,
		'engagementId' => $row->engagementId,
		'approvalBy' => $row->approvalBy,
		'approvalStatus' => $row->approvalStatus,
		'description' => $row->description,
		'dateWork1' => $row->dateWork1,
		'dateWork2' => $row->dateWork2,
		'dateWork3' => $row->dateWork3,
		'dateWork4' => $row->dateWork4,
		'dateWork5' => $row->dateWork5,
		'dateWork6' => $row->dateWork6,
		'dateWork7' => $row->dateWork7,
		'dateWork8' => $row->dateWork8,
		'dateWork9' => $row->dateWork9,
		'dateWork10' => $row->dateWork10,
		'dateWork11' => $row->dateWork11,
		'dateWork12' => $row->dateWork12,
		'dateWork13' => $row->dateWork13,
		'dateWork14' => $row->dateWork14,
		'dateWork15' => $row->dateWork15,
		'dateWork16' => $row->dateWork16,
		'dateWork17' => $row->dateWork17,
		'dateWork18' => $row->dateWork18,
		'dateWork19' => $row->dateWork19,
		'dateWork20' => $row->dateWork20,
		'dateWork21' => $row->dateWork21,
		'DateWork22' => $row->DateWork22,
		'dateWork23' => $row->dateWork23,
		'dateWork24' => $row->dateWork24,
		'dateWork25' => $row->dateWork25,
		'dateWork26' => $row->dateWork26,
		'dateWork27' => $row->dateWork27,
		'dateWork28' => $row->dateWork28,
		'dateWork29' => $row->dateWork29,
		'dateWork30' => $row->dateWork30,
		'dateWork31' => $row->dateWork31,
		'version' => $row->version,
	    );
             $this->template->caplet('timereportdetail/timereportdetail_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timereportdetail'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('timereportdetail/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'Code' => set_value('Code'),
	    'employeeId' => set_value('employeeId'),
	    'periodeDate' => set_value('periodeDate'),
	    'engagementId' => set_value('engagementId'),
	    'approvalBy' => set_value('approvalBy'),
	    'approvalStatus' => set_value('approvalStatus'),
	    'description' => set_value('description'),
	    'dateWork1' => set_value('dateWork1'),
	    'dateWork2' => set_value('dateWork2'),
	    'dateWork3' => set_value('dateWork3'),
	    'dateWork4' => set_value('dateWork4'),
	    'dateWork5' => set_value('dateWork5'),
	    'dateWork6' => set_value('dateWork6'),
	    'dateWork7' => set_value('dateWork7'),
	    'dateWork8' => set_value('dateWork8'),
	    'dateWork9' => set_value('dateWork9'),
	    'dateWork10' => set_value('dateWork10'),
	    'dateWork11' => set_value('dateWork11'),
	    'dateWork12' => set_value('dateWork12'),
	    'dateWork13' => set_value('dateWork13'),
	    'dateWork14' => set_value('dateWork14'),
	    'dateWork15' => set_value('dateWork15'),
	    'dateWork16' => set_value('dateWork16'),
	    'dateWork17' => set_value('dateWork17'),
	    'dateWork18' => set_value('dateWork18'),
	    'dateWork19' => set_value('dateWork19'),
	    'dateWork20' => set_value('dateWork20'),
	    'dateWork21' => set_value('dateWork21'),
	    'DateWork22' => set_value('DateWork22'),
	    'dateWork23' => set_value('dateWork23'),
	    'dateWork24' => set_value('dateWork24'),
	    'dateWork25' => set_value('dateWork25'),
	    'dateWork26' => set_value('dateWork26'),
	    'dateWork27' => set_value('dateWork27'),
	    'dateWork28' => set_value('dateWork28'),
	    'dateWork29' => set_value('dateWork29'),
	    'dateWork30' => set_value('dateWork30'),
	    'dateWork31' => set_value('dateWork31'),
	    'version' => set_value('version'),
	);
         $this->template->caplet('timereportdetail/timereportdetail_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'Code' => $this->input->post('Code',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'periodeDate' => $this->input->post('periodeDate',TRUE),
		'engagementId' => $this->input->post('engagementId',TRUE),
		'approvalBy' => $this->input->post('approvalBy',TRUE),
		'approvalStatus' => $this->input->post('approvalStatus',TRUE),
		'description' => $this->input->post('description',TRUE),
		'dateWork1' => $this->input->post('dateWork1',TRUE),
		'dateWork2' => $this->input->post('dateWork2',TRUE),
		'dateWork3' => $this->input->post('dateWork3',TRUE),
		'dateWork4' => $this->input->post('dateWork4',TRUE),
		'dateWork5' => $this->input->post('dateWork5',TRUE),
		'dateWork6' => $this->input->post('dateWork6',TRUE),
		'dateWork7' => $this->input->post('dateWork7',TRUE),
		'dateWork8' => $this->input->post('dateWork8',TRUE),
		'dateWork9' => $this->input->post('dateWork9',TRUE),
		'dateWork10' => $this->input->post('dateWork10',TRUE),
		'dateWork11' => $this->input->post('dateWork11',TRUE),
		'dateWork12' => $this->input->post('dateWork12',TRUE),
		'dateWork13' => $this->input->post('dateWork13',TRUE),
		'dateWork14' => $this->input->post('dateWork14',TRUE),
		'dateWork15' => $this->input->post('dateWork15',TRUE),
		'dateWork16' => $this->input->post('dateWork16',TRUE),
		'dateWork17' => $this->input->post('dateWork17',TRUE),
		'dateWork18' => $this->input->post('dateWork18',TRUE),
		'dateWork19' => $this->input->post('dateWork19',TRUE),
		'dateWork20' => $this->input->post('dateWork20',TRUE),
		'dateWork21' => $this->input->post('dateWork21',TRUE),
		'DateWork22' => $this->input->post('DateWork22',TRUE),
		'dateWork23' => $this->input->post('dateWork23',TRUE),
		'dateWork24' => $this->input->post('dateWork24',TRUE),
		'dateWork25' => $this->input->post('dateWork25',TRUE),
		'dateWork26' => $this->input->post('dateWork26',TRUE),
		'dateWork27' => $this->input->post('dateWork27',TRUE),
		'dateWork28' => $this->input->post('dateWork28',TRUE),
		'dateWork29' => $this->input->post('dateWork29',TRUE),
		'dateWork30' => $this->input->post('dateWork30',TRUE),
		'dateWork31' => $this->input->post('dateWork31',TRUE),
		'version' => $this->input->post('version',TRUE),
	    );

            $this->Mtimereportdetail->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('timereportdetail'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Mtimereportdetail->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('timereportdetail/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'Code' => set_value('Code', $row->Code),
		'employeeId' => set_value('employeeId', $row->employeeId),
		'periodeDate' => set_value('periodeDate', $row->periodeDate),
		'engagementId' => set_value('engagementId', $row->engagementId),
		'approvalBy' => set_value('approvalBy', $row->approvalBy),
		'approvalStatus' => set_value('approvalStatus', $row->approvalStatus),
		'description' => set_value('description', $row->description),
		'dateWork1' => set_value('dateWork1', $row->dateWork1),
		'dateWork2' => set_value('dateWork2', $row->dateWork2),
		'dateWork3' => set_value('dateWork3', $row->dateWork3),
		'dateWork4' => set_value('dateWork4', $row->dateWork4),
		'dateWork5' => set_value('dateWork5', $row->dateWork5),
		'dateWork6' => set_value('dateWork6', $row->dateWork6),
		'dateWork7' => set_value('dateWork7', $row->dateWork7),
		'dateWork8' => set_value('dateWork8', $row->dateWork8),
		'dateWork9' => set_value('dateWork9', $row->dateWork9),
		'dateWork10' => set_value('dateWork10', $row->dateWork10),
		'dateWork11' => set_value('dateWork11', $row->dateWork11),
		'dateWork12' => set_value('dateWork12', $row->dateWork12),
		'dateWork13' => set_value('dateWork13', $row->dateWork13),
		'dateWork14' => set_value('dateWork14', $row->dateWork14),
		'dateWork15' => set_value('dateWork15', $row->dateWork15),
		'dateWork16' => set_value('dateWork16', $row->dateWork16),
		'dateWork17' => set_value('dateWork17', $row->dateWork17),
		'dateWork18' => set_value('dateWork18', $row->dateWork18),
		'dateWork19' => set_value('dateWork19', $row->dateWork19),
		'dateWork20' => set_value('dateWork20', $row->dateWork20),
		'dateWork21' => set_value('dateWork21', $row->dateWork21),
		'DateWork22' => set_value('DateWork22', $row->DateWork22),
		'dateWork23' => set_value('dateWork23', $row->dateWork23),
		'dateWork24' => set_value('dateWork24', $row->dateWork24),
		'dateWork25' => set_value('dateWork25', $row->dateWork25),
		'dateWork26' => set_value('dateWork26', $row->dateWork26),
		'dateWork27' => set_value('dateWork27', $row->dateWork27),
		'dateWork28' => set_value('dateWork28', $row->dateWork28),
		'dateWork29' => set_value('dateWork29', $row->dateWork29),
		'dateWork30' => set_value('dateWork30', $row->dateWork30),
		'dateWork31' => set_value('dateWork31', $row->dateWork31),
		'version' => set_value('version', $row->version),
	    );
            $this->load->view('timereportdetail/timereportdetail_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timereportdetail'));
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
		'Code' => $this->input->post('Code',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'periodeDate' => $this->input->post('periodeDate',TRUE),
		'engagementId' => $this->input->post('engagementId',TRUE),
		'approvalBy' => $this->input->post('approvalBy',TRUE),
		'approvalStatus' => $this->input->post('approvalStatus',TRUE),
		'description' => $this->input->post('description',TRUE),
		'dateWork1' => $this->input->post('dateWork1',TRUE),
		'dateWork2' => $this->input->post('dateWork2',TRUE),
		'dateWork3' => $this->input->post('dateWork3',TRUE),
		'dateWork4' => $this->input->post('dateWork4',TRUE),
		'dateWork5' => $this->input->post('dateWork5',TRUE),
		'dateWork6' => $this->input->post('dateWork6',TRUE),
		'dateWork7' => $this->input->post('dateWork7',TRUE),
		'dateWork8' => $this->input->post('dateWork8',TRUE),
		'dateWork9' => $this->input->post('dateWork9',TRUE),
		'dateWork10' => $this->input->post('dateWork10',TRUE),
		'dateWork11' => $this->input->post('dateWork11',TRUE),
		'dateWork12' => $this->input->post('dateWork12',TRUE),
		'dateWork13' => $this->input->post('dateWork13',TRUE),
		'dateWork14' => $this->input->post('dateWork14',TRUE),
		'dateWork15' => $this->input->post('dateWork15',TRUE),
		'dateWork16' => $this->input->post('dateWork16',TRUE),
		'dateWork17' => $this->input->post('dateWork17',TRUE),
		'dateWork18' => $this->input->post('dateWork18',TRUE),
		'dateWork19' => $this->input->post('dateWork19',TRUE),
		'dateWork20' => $this->input->post('dateWork20',TRUE),
		'dateWork21' => $this->input->post('dateWork21',TRUE),
		'DateWork22' => $this->input->post('DateWork22',TRUE),
		'dateWork23' => $this->input->post('dateWork23',TRUE),
		'dateWork24' => $this->input->post('dateWork24',TRUE),
		'dateWork25' => $this->input->post('dateWork25',TRUE),
		'dateWork26' => $this->input->post('dateWork26',TRUE),
		'dateWork27' => $this->input->post('dateWork27',TRUE),
		'dateWork28' => $this->input->post('dateWork28',TRUE),
		'dateWork29' => $this->input->post('dateWork29',TRUE),
		'dateWork30' => $this->input->post('dateWork30',TRUE),
		'dateWork31' => $this->input->post('dateWork31',TRUE),
		'version' => $this->input->post('version',TRUE),
	    );

            $this->Mtimereportdetail->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('timereportdetail'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mtimereportdetail->get_by_id($id);

        if ($row) {
            $this->Mtimereportdetail->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('timereportdetail'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('timereportdetail'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('Code', 'code', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('periodeDate', 'periodedate', 'trim|required');
	$this->form_validation->set_rules('engagementId', 'engagementid', 'trim|required');
	$this->form_validation->set_rules('approvalBy', 'approvalby', 'trim|required');
	$this->form_validation->set_rules('approvalStatus', 'approvalstatus', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('dateWork1', 'datework1', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork2', 'datework2', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork3', 'datework3', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork4', 'datework4', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork5', 'datework5', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork6', 'datework6', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork7', 'datework7', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork8', 'datework8', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork9', 'datework9', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork10', 'datework10', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork11', 'datework11', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork12', 'datework12', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork13', 'datework13', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork14', 'datework14', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork15', 'datework15', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork16', 'datework16', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork17', 'datework17', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork18', 'datework18', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork19', 'datework19', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork20', 'datework20', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork21', 'datework21', 'trim|required|numeric');
	$this->form_validation->set_rules('DateWork22', 'datework22', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork23', 'datework23', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork24', 'datework24', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork25', 'datework25', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork26', 'datework26', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork27', 'datework27', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork28', 'datework28', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork29', 'datework29', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork30', 'datework30', 'trim|required|numeric');
	$this->form_validation->set_rules('dateWork31', 'datework31', 'trim|required|numeric');
	$this->form_validation->set_rules('version', 'version', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "timereportdetail.xls";
        $judul = "timereportdetail";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Code");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeId");
	xlsWriteLabel($tablehead, $kolomhead++, "PeriodeDate");
	xlsWriteLabel($tablehead, $kolomhead++, "EngagementId");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalBy");
	xlsWriteLabel($tablehead, $kolomhead++, "ApprovalStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "Description");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork1");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork2");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork3");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork4");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork5");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork6");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork7");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork8");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork9");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork10");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork11");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork12");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork13");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork14");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork15");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork16");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork17");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork18");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork19");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork20");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork21");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork22");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork23");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork24");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork25");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork26");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork27");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork28");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork29");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork30");
	xlsWriteLabel($tablehead, $kolomhead++, "DateWork31");
	xlsWriteLabel($tablehead, $kolomhead++, "Version");

	foreach ($this->Mtimereportdetail->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Code);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->periodeDate);
	    xlsWriteNumber($tablebody, $kolombody++, $data->engagementId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->approvalBy);
	    xlsWriteLabel($tablebody, $kolombody++, $data->approvalStatus);
	    xlsWriteLabel($tablebody, $kolombody++, $data->description);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork1);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork2);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork3);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork4);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork5);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork6);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork7);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork8);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork9);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork10);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork11);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork12);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork13);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork14);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork15);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork16);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork17);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork18);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork19);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork20);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork21);
	    xlsWriteNumber($tablebody, $kolombody++, $data->DateWork22);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork23);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork24);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork25);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork26);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork27);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork28);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork29);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork30);
	    xlsWriteNumber($tablebody, $kolombody++, $data->dateWork31);
	    xlsWriteNumber($tablebody, $kolombody++, $data->version);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=timereportdetail.doc");

        $data = array(
            'timereportdetail_data' => $this->Mtimereportdetail->get_all(),
            'start' => 0
        );
        
        $this->load->view('timereportdetail/timereportdetail_doc',$data);
    }

}

/* End of file Timereportdetail.php */
/* Location: ./application/controllers/Timereportdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-03 18:09:24 */
/* http://harviacode.com */