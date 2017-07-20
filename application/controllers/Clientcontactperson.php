<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Clientcontactperson extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Clientcontactperson_model');
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'clientcontactperson/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'clientcontactperson/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'clientcontactperson/';
            $config['first_url'] = base_url() . 'clientcontactperson/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Clientcontactperson_model->total_rows($q);
        $clientcontactperson = $this->Clientcontactperson_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'clientcontactperson_data' => $clientcontactperson,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('clientcontactperson_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Clientcontactperson_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'clientId' => $row->clientId,
		'clientCode' => $row->clientCode,
		'contactName' => $row->contactName,
		'salutation' => $row->salutation,
		'position' => $row->position,
		'handphone' => $row->handphone,
		'emailAddress' => $row->emailAddress,
	    );
            $this->load->view('clientcontactperson_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clientcontactperson'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('clientcontactperson/create_action'),
	    'id' => set_value('id'),
	    'entityId' => set_value('entityId'),
	    'clientId' => set_value('clientId'),
	    'clientCode' => set_value('clientCode'),
	    'contactName' => set_value('contactName'),
	    'salutation' => set_value('salutation'),
	    'position' => set_value('position'),
	    'handphone' => set_value('handphone'),
	    'emailAddress' => set_value('emailAddress'),
	);
        $this->load->view('clientcontactperson_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'clientId' => $this->input->post('clientId',TRUE),
		'clientCode' => $this->input->post('clientCode',TRUE),
		'contactName' => $this->input->post('contactName',TRUE),
		'salutation' => $this->input->post('salutation',TRUE),
		'position' => $this->input->post('position',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'emailAddress' => $this->input->post('emailAddress',TRUE),
	    );

            $this->Clientcontactperson_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('clientcontactperson'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Clientcontactperson_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('clientcontactperson/update_action'),
		'id' => set_value('id', $row->id),
		'entityId' => set_value('entityId', $row->entityId),
		'clientId' => set_value('clientId', $row->clientId),
		'clientCode' => set_value('clientCode', $row->clientCode),
		'contactName' => set_value('contactName', $row->contactName),
		'salutation' => set_value('salutation', $row->salutation),
		'position' => set_value('position', $row->position),
		'handphone' => set_value('handphone', $row->handphone),
		'emailAddress' => set_value('emailAddress', $row->emailAddress),
	    );
            $this->load->view('clientcontactperson_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clientcontactperson'));
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
		'clientId' => $this->input->post('clientId',TRUE),
		'clientCode' => $this->input->post('clientCode',TRUE),
		'contactName' => $this->input->post('contactName',TRUE),
		'salutation' => $this->input->post('salutation',TRUE),
		'position' => $this->input->post('position',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'emailAddress' => $this->input->post('emailAddress',TRUE),
	    );

            $this->Clientcontactperson_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('clientcontactperson'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Clientcontactperson_model->get_by_id($id);

        if ($row) {
            $this->Clientcontactperson_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('clientcontactperson'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('clientcontactperson'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('clientId', 'clientid', 'trim|required');
	$this->form_validation->set_rules('clientCode', 'clientcode', 'trim|required');
	$this->form_validation->set_rules('contactName', 'contactname', 'trim|required');
	$this->form_validation->set_rules('salutation', 'salutation', 'trim|required');
	$this->form_validation->set_rules('position', 'position', 'trim|required');
	$this->form_validation->set_rules('handphone', 'handphone', 'trim|required');
	$this->form_validation->set_rules('emailAddress', 'emailaddress', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "clientcontactperson.xls";
        $judul = "clientcontactperson";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ClientId");
	xlsWriteLabel($tablehead, $kolomhead++, "ClientCode");
	xlsWriteLabel($tablehead, $kolomhead++, "ContactName");
	xlsWriteLabel($tablehead, $kolomhead++, "Salutation");
	xlsWriteLabel($tablehead, $kolomhead++, "Position");
	xlsWriteLabel($tablehead, $kolomhead++, "Handphone");
	xlsWriteLabel($tablehead, $kolomhead++, "EmailAddress");

	foreach ($this->Clientcontactperson_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->clientId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->clientCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->contactName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->salutation);
	    xlsWriteLabel($tablebody, $kolombody++, $data->position);
	    xlsWriteLabel($tablebody, $kolombody++, $data->handphone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->emailAddress);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=clientcontactperson.doc");

        $data = array(
            'clientcontactperson_data' => $this->Clientcontactperson_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('clientcontactperson_doc',$data);
    }

}

/* End of file Clientcontactperson.php */
/* Location: ./application/controllers/Clientcontactperson.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-26 11:41:07 */
/* http://harviacode.com */