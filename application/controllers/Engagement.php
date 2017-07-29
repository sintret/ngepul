<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Engagement extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Mengagement', 'Mengagement_detail', 'Mentity', 'Mclient', 'Mservicetitle', 'Memployee', 'Mclosing_periode'));
        //$this->load->model('Mclient');
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
        $this->load->library(array('form_validation', 'template'));
    }

    public function index() {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'engagement/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'engagement/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'engagement/';
            $config['first_url'] = base_url() . 'engagement/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mengagement->total_rows($q);
        $engagement = $this->Mengagement->getData($config['per_page'], $start, $q);
        //$client = $this->Mclient->get_all();

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'engagement_data' => $engagement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('engagement/engagement_list', $data);
    }

    public function read($id) {
        $row = $this->Mengagement->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'entityId' => $row->entityId,
                'code' => $row->code,
                'engagementDate' => $row->engagementDate,
                'clientId' => $row->clientId,
                'serviceTitleId' => $row->serviceTitleId,
                'yearService' => $row->yearService,
                'description' => $row->description,
                'partnerId' => $row->partnerId,
                'managerId' => $row->managerId,
                'seniorId' => $row->seniorId,
                'complexity' => $row->complexity,
                'risk' => $row->risk,
                'agreedFees' => $row->agreedFees,
                'agreedExpenses' => $row->agreedExpenses,
                'estimatedCost' => $row->estimatedCost,
                'signingPartnerId' => $row->signingPartnerId,
                'engagementPartnerId' => $row->engagementPartnerId,
                'asset' => $row->asset,
                'rl' => $row->rl,
                'reportNo' => $row->reportNo,
                'reportDate' => $row->reportDate,
                'opinion' => $row->opinion,
                'jobFromEmployeeId' => $row->jobFromEmployeeId,
                'finishStatusId' => $row->finishStatusId,
                'finishDate' => $row->finishDate,
                'finishApproveBy' => $row->finishApproveBy,
                'closing' => $row->closing,
                'closingDate' => $row->closingDate,
                'deleted' => $row->deleted,
                'inputby' => $row->inputby,
                'version' => $row->version,
                'userCreate' => $row->userCreate,
                'createDate' => $row->createDate,
                'userUpdate' => $row->userUpdate,
                'updateDate' => $row->updateDate,
            );
            $this->template->caplet('engagement/engagement_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('engagement'));
        }
    }

    public function ajax_employee() {
        $employees = $this->Memployee->get_dropdown();
        $counter = $_POST['counter'];
        $data = array(
            'employees' => $employees,
            'counter' => $counter,
        );
        $this->load->view('ajax/ajax_engagement', $data);
    }

    public function create() {
        $entities = $this->Mentity->get_all();
        $clients = $this->Mclient->get_all();
        $serviceTitles = $this->Mservicetitle->get_all();
        $employees = $this->Memployee->get_dropdown();
        $closingPeriodes = $this->Mclosing_periode->get_all();
        //echo "<pre>"; print_r($employees); exit(0);

        $data = array(
            'details' => null,
            'button' => 'Create',
            'entities' => $entities,
            'clients' => $clients,
            'serviceTitles' => $serviceTitles,
            'employees' => $employees,
            'closingPeriodes' => $closingPeriodes,
            'lockStatusId' => set_value('lockStatusId'),
            'action' => site_url('engagement/create_action'),
            'id' => set_value('id'),
            'entityId' => set_value('entityId'),
            'name' => set_value('name'),
            'code' => set_value('code'),
            'engagementDate' => set_value('engagementDate'),
            'clientId' => set_value('clientId'),
            'serviceTitleId' => set_value('serviceTitleId'),
            'yearService' => set_value('yearService'),
            'description' => set_value('description'),
            'partnerId' => set_value('partnerId'),
            'managerId' => set_value('managerId'),
            'seniorId' => set_value('seniorId'),
            'complexity' => set_value('complexity'),
            'risk' => set_value('risk'),
            'agreedFees' => set_value('agreedFees'),
            'agreedExpenses' => set_value('agreedExpenses'),
            'estimatedCost' => set_value('estimatedCost'),
            'signingPartnerId' => set_value('signingPartnerId'),
            'engagementPartnerId' => set_value('engagementPartnerId'),
            'asset' => set_value('asset'),
            'rl' => set_value('rl'),
            'reportNo' => set_value('reportNo'),
            'reportDate' => set_value('reportDate'),
            'opinion' => set_value('opinion'),
            'jobFromEmployeeId' => set_value('jobFromEmployeeId'),
            'finishStatusId' => set_value('finishStatusId'),
            'finishDate' => set_value('finishDate'),
            'finishApproveBy' => set_value('finishApproveBy'),
            'closing' => set_value('closing'),
            'closingDate' => set_value('closingDate'),
            'deleted' => set_value('deleted'),
            'inputby' => set_value('inputby'),
            'version' => set_value('version'),
            'userCreate' => set_value('userCreate'),
            'createDate' => set_value('createDate'),
            'userUpdate' => set_value('userUpdate'),
            'updateDate' => set_value('updateDate'),
            'startDate' => set_value('startDate'),
            'endDate' => set_value('endDate'),
        );
        $this->template->caplet('engagement/engagement_form', $data);
    }

    public function create_action() {
     //echo "<pre>"; print_r($_POST); exit(0);
        ///$this->_rules();
        $this->load->helper('rupiah_helper');

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
        $data = array(
            'entityId' => $this->input->post('entityId', TRUE),
            //'code' => $this->input->post('code', TRUE),
            'code' => 'ENG/'.rand(10,1000000).'/'.$this->input->post('clientId', TRUE).'/'.date('m').'/'.date('Y'),
            'engagementDate' => date("Y-m-d", strtotime(strtr($this->input->post('engagementDate', TRUE), '/', '-') )),
            'clientId' => $this->input->post('clientId', TRUE),
            'serviceTitleId' => $this->input->post('serviceTitleId', TRUE),
            'yearService' => $this->input->post('yearService', TRUE),
            'description' => $this->input->post('description', TRUE),
            'partnerId' => $this->input->post('partnerId', TRUE),
            'managerId' => $this->input->post('managerId', TRUE),
            'seniorId' => $this->input->post('seniorId', TRUE),
            'complexity' => $this->input->post('complexity', TRUE),
            'risk' => $this->input->post('risk', TRUE),
            'agreedFees' => cleanFormat($this->input->post('agreedFees', TRUE)),
            'agreedExpenses' => cleanFormat($this->input->post('agreedExpenses', TRUE)),
            'estimatedCost' => cleanFormat($this->input->post('estimatedCost', TRUE)),
            'signingPartnerId' => $this->input->post('signingPartnerId', TRUE),
            'engagementPartnerId' => $this->input->post('engagementPartnerId', TRUE),
            'asset' => $this->input->post('asset', TRUE),
            'rl' => $this->input->post('rl', TRUE),
            'reportNo' => $this->input->post('reportNo', TRUE),
            'reportDate' => date("Y-m-d", strtotime(strtr($this->input->post('reportDate', TRUE), '/', '-'))),
            'opinion' => $this->input->post('opinion', TRUE),
            'jobFromEmployeeId' => $this->input->post('jobFromEmployeeId', TRUE),
            'finishStatusId' => $this->input->post('finishStatusId', TRUE),
            'finishDate' => date("Y-m-d", strtotime($this->input->post('finishDate', TRUE))),
            'finishApproveBy' => $this->input->post('finishApproveBy', TRUE),
            'closing' => $this->input->post('closing', TRUE),
            'closingDate' => date("Y-m-d", strtotime(strtr($this->input->post('closingDate', TRUE), '/', '-') )),
            //'deleted' => $this->input->post('deleted', TRUE),
            'inputby' => $this->session->userdata('id'),
            'version' => $this->input->post('version', TRUE),
            'userCreate' => $this->session->userdata('id'),
            'createDate' => date("Y-m-d H:i:s"),
            //'userUpdate' => $this->input->post('userUpdate', TRUE),
            //'updateDate' => $this->input->post('updateDate', TRUE),
            'startDate' => date('Y-m-d', strtotime(strtr($this->input->post('startDate', TRUE), '/', '-') )),
            'endDate' => date('Y-m-d', strtotime(strtr($this->input->post('endDate', TRUE), '/', '-') )),
            'closing' => 0,
            'name' => $this->input->post('name', TRUE),
        );
//echo "<pre>"; print_r($data); exit(0);
        $this->Mengagement->insert($data);
        $engagementId = $this->db->insert_id();
        $details = $this->input->post('detail', TRUE);
        $this->Mengagement_detail->replaceAll($engagementId, $details);
        $this->session->set_flashdata('message', 'Create Record Success');
        redirect(site_url('engagement'));
        //}
    }

    public function update($id) {
        $row = $this->Mengagement->get_by_id($id);
        //$entities = $this->Mentity->dropdown($row->entityId);
         $serviceTitles = $this->Mservicetitle->get_all();
        if ($row) {
            $data = array(                
                'details' => $this->Mengagement_detail->details($id),
                'employees' => $this->Memployee->get_dropdown(),
                'entities' => $this->Mentity->get_all(),
                'clients' => $this->Mclient->get_all(),
                'serviceTitles' => $serviceTitles,
                'lockStatusId' => set_value('lockStatusId', $row->lockStatusId),
                'button' => 'Update',
                'action' => site_url('engagement/update_action'),
                'id' => set_value('id', $row->id),
                'entityId' => set_value('entityId', $row->entityId),
                'code' => set_value('code', $row->code),
                'engagementDate' => set_value('engagementDate', $row->engagementDate),
                'clientId' => set_value('clientId', $row->clientId),
                'serviceTitleId' => set_value('serviceTitleId', $row->serviceTitleId),
                'yearService' => set_value('yearService', $row->yearService),
                'description' => set_value('description', $row->description),
                'partnerId' => set_value('partnerId', $row->partnerId),
                'managerId' => set_value('managerId', $row->managerId),
                'seniorId' => set_value('seniorId', $row->seniorId),
                'complexity' => set_value('complexity', $row->complexity),
                'risk' => set_value('risk', $row->risk),
                'agreedFees' => set_value('agreedFees', $row->agreedFees),
                'agreedExpenses' => set_value('agreedExpenses', $row->agreedExpenses),
                'estimatedCost' => set_value('estimatedCost', $row->estimatedCost),
                'signingPartnerId' => set_value('signingPartnerId', $row->signingPartnerId),
                'engagementPartnerId' => set_value('engagementPartnerId', $row->engagementPartnerId),
                'asset' => set_value('asset', $row->asset),
                'rl' => set_value('rl', $row->rl),
                'reportNo' => set_value('reportNo', $row->reportNo),
                'reportDate' => set_value('reportDate', $row->reportDate),
                'opinion' => set_value('opinion', $row->opinion),
                'jobFromEmployeeId' => set_value('jobFromEmployeeId', $row->jobFromEmployeeId),
                'finishStatusId' => set_value('finishStatusId', $row->finishStatusId),
                'finishDate' => set_value('finishDate', $row->finishDate),
                'finishApproveBy' => set_value('finishApproveBy', $row->finishApproveBy),
                'closing' => set_value('closing', $row->closing),
                'closingDate' => set_value('closingDate', $row->closingDate),
                'deleted' => set_value('deleted', $row->deleted),
                'inputby' => set_value('inputby', $row->inputby),
                'version' => set_value('version', $row->version),
                'userCreate' => set_value('userCreate', $row->userCreate),
                'createDate' => set_value('createDate', $row->createDate),
                'userUpdate' => set_value('userUpdate', $row->userUpdate),
                'updateDate' => set_value('updateDate', $row->updateDate),
                'startDate' => set_value('startDate', $row->startDate),
                'endDate' => set_value('endDate', $row->endDate),
                'name' => set_value('name', $row->name),
            );
            $this->template->caplet('engagement/engagement_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('engagement'));
        }
    }

    public function update_action() {

        //  echo "<pre>"; print_r($_POST); exit(0);
        $this->_rules();
        $this->load->helper('rupiah_helper');



        $data = array(
            'entityId' => $this->input->post('entityId', TRUE),
           // 'code' => $this->input->post('code', TRUE),
            'engagementDate' => date('Y-m-d', strtotime(strtr($this->input->post('engagementDate', TRUE), '/', '-') )),
            'clientId' => $this->input->post('clientId', TRUE),
            'serviceTitleId' => $this->input->post('serviceTitleId', TRUE),
            'yearService' => $this->input->post('yearService', TRUE),
            'description' => $this->input->post('description', TRUE),
            'partnerId' => $this->input->post('partnerId', TRUE),
            'managerId' => $this->input->post('managerId', TRUE),
            'seniorId' => $this->input->post('seniorId', TRUE),
            'complexity' => $this->input->post('complexity', TRUE),
            'risk' => $this->input->post('risk', TRUE),
            'agreedFees' => cleanFormat($this->input->post('agreedFees', TRUE)),
            'agreedExpenses' => cleanFormat($this->input->post('agreedExpenses', TRUE)),
            'estimatedCost' => cleanFormat($this->input->post('estimatedCost', TRUE)),
            'signingPartnerId' => $this->input->post('signingPartnerId', TRUE),
            'engagementPartnerId' => $this->input->post('engagementPartnerId', TRUE),
            'asset' => $this->input->post('asset', TRUE),
            'rl' => $this->input->post('rl', TRUE),
            'reportNo' => $this->input->post('reportNo', TRUE),
            'reportDate' => date('Y-m-d', strtotime(strtr($this->input->post('reportDate', TRUE), '/', '-') )),
            'opinion' => $this->input->post('opinion', TRUE),
            'jobFromEmployeeId' => $this->input->post('jobFromEmployeeId', TRUE),
            'finishStatusId' => $this->input->post('finishStatusId', TRUE),
            'finishDate' => date('Y-m-d', strtotime(strtr($this->input->post('finishDate', TRUE), '/', '-') )),
            'finishApproveBy' => $this->input->post('finishApproveBy', TRUE),
            'closing' => $this->input->post('closing', TRUE),
            'closingDate' => date('Y-m-d', strtotime(strtr($this->input->post('closingDate', TRUE), '/', '-'))),
          //  'deleted' => $this->input->post('deleted', TRUE),
            //'inputby' => $this->input->post('inputby', TRUE),
            'version' => $this->input->post('version', TRUE),
           // 'userCreate' => $this->input->post('userCreate', TRUE),
           // 'createDate' => $this->input->post('createDate', TRUE),
            'userUpdate' => $this->session->userdata('id'),
           // 'updateDate' => date('Y-m-d', strtotime($this->input->post('updateDate', TRUE))),
            'startDate' => date('Y-m-d', strtotime(strtr($this->input->post('startDate', TRUE), '/', '-') )),
            'endDate' => date('Y-m-d', strtotime(strtr($this->input->post('endDate', TRUE), '/', '-') )),
            'name' => $this->input->post('name', TRUE),
        );

        $this->Mengagement->update($this->input->post('id', TRUE), $data);

        $details = $this->input->post('detail', TRUE);
        $this->Mengagement_detail->replaceAll($this->input->post('id', TRUE), $details);
        $this->session->set_flashdata('message', 'Update Record Success');
        redirect(site_url('engagement'));
    }

    public function delete($id) {
        $row = $this->Mengagement->get_by_id($id);

        if ($row) {
            $this->Mengagement->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('engagement'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('engagement'));
        }
    }

    public function _rules() {
        $this->form_validation->set_rules('entityId', 'Entity', 'trim|required');
        $this->form_validation->set_rules('code', 'code', 'trim|required');
        $this->form_validation->set_rules('engagementDate', 'Engagement Date', 'trim|required');
        $this->form_validation->set_rules('clientId', 'Client', 'trim|required');
        //$this->form_validation->set_rules('serviceTitleId', 'servicetitleid', 'trim|required');
        $this->form_validation->set_rules('yearService', 'yearservice', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        $this->form_validation->set_rules('partnerId', 'Partner', 'trim|required');
        $this->form_validation->set_rules('managerId', 'Manager', 'trim|required');
        //$this->form_validation->set_rules('seniorId', 'Senior', 'trim|required');
        $this->form_validation->set_rules('complexity', 'complexity', 'trim|required');
        $this->form_validation->set_rules('risk', 'risk', 'trim|required');
        $this->form_validation->set_rules('agreedFees', 'agreedfees', 'trim|required');
        $this->form_validation->set_rules('agreedExpenses', 'agreedexpenses', 'trim|required');
        $this->form_validation->set_rules('estimatedCost', 'estimatedcost', 'trim|required');
        $this->form_validation->set_rules('signingPartnerId', 'signingpartnerid', 'trim|required');
        $this->form_validation->set_rules('engagementPartnerId', 'engagementpartnerid', 'trim|required');
        $this->form_validation->set_rules('asset', 'asset', 'trim|required|numeric');
        $this->form_validation->set_rules('rl', 'rl', 'trim|required|numeric');
        $this->form_validation->set_rules('reportNo', 'reportno', 'trim|required');
        $this->form_validation->set_rules('reportDate', 'reportdate', 'trim|required');
        $this->form_validation->set_rules('opinion', 'opinion', 'trim|required');
        $this->form_validation->set_rules('jobFromEmployeeId', 'jobfromemployeeid', 'trim|required');
        $this->form_validation->set_rules('finishStatusId', 'finishstatusid', 'trim|required');
        $this->form_validation->set_rules('finishDate', 'finishdate', 'trim|required');
        $this->form_validation->set_rules('finishApproveBy', 'finishapproveby', 'trim|required');
        $this->form_validation->set_rules('closing', 'closing', 'trim|required');
        $this->form_validation->set_rules('closingDate', 'closingdate', 'trim|required');
        $this->form_validation->set_rules('deleted', 'deleted', 'trim|required');
        $this->form_validation->set_rules('inputby', 'inputby', 'trim|required');
        $this->form_validation->set_rules('version', 'version', 'trim|required');
        $this->form_validation->set_rules('userCreate', 'usercreate', 'trim|required');
        $this->form_validation->set_rules('createDate', 'createdate', 'trim|required');
        $this->form_validation->set_rules('userUpdate', 'userupdate', 'trim|required');
        $this->form_validation->set_rules('updateDate', 'updatedate', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel() {
        $this->load->helper('exportexcel');
        $namaFile = "engagement.xls";
        $judul = "engagement";
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
        xlsWriteLabel($tablehead, $kolomhead++, "EngagementDate");
        xlsWriteLabel($tablehead, $kolomhead++, "ClientId");
        xlsWriteLabel($tablehead, $kolomhead++, "ServiceTitleId");
        xlsWriteLabel($tablehead, $kolomhead++, "YearService");
        xlsWriteLabel($tablehead, $kolomhead++, "Description");
        xlsWriteLabel($tablehead, $kolomhead++, "PartnerId");
        xlsWriteLabel($tablehead, $kolomhead++, "ManagerId");
        xlsWriteLabel($tablehead, $kolomhead++, "SeniorId");
        xlsWriteLabel($tablehead, $kolomhead++, "Complexity");
        xlsWriteLabel($tablehead, $kolomhead++, "Risk");
        xlsWriteLabel($tablehead, $kolomhead++, "AgreedFees");
        xlsWriteLabel($tablehead, $kolomhead++, "AgreedExpenses");
        xlsWriteLabel($tablehead, $kolomhead++, "EstimatedCost");
        xlsWriteLabel($tablehead, $kolomhead++, "SigningPartnerId");
        xlsWriteLabel($tablehead, $kolomhead++, "EngagementPartnerId");
        xlsWriteLabel($tablehead, $kolomhead++, "Asset");
        xlsWriteLabel($tablehead, $kolomhead++, "Rl");
        xlsWriteLabel($tablehead, $kolomhead++, "ReportNo");
        xlsWriteLabel($tablehead, $kolomhead++, "ReportDate");
        xlsWriteLabel($tablehead, $kolomhead++, "Opinion");
        xlsWriteLabel($tablehead, $kolomhead++, "JobFromEmployeeId");
        xlsWriteLabel($tablehead, $kolomhead++, "FinishStatusId");
        xlsWriteLabel($tablehead, $kolomhead++, "FinishDate");
        xlsWriteLabel($tablehead, $kolomhead++, "FinishApproveBy");
        xlsWriteLabel($tablehead, $kolomhead++, "Closing");
        xlsWriteLabel($tablehead, $kolomhead++, "ClosingDate");
        xlsWriteLabel($tablehead, $kolomhead++, "Deleted");
        xlsWriteLabel($tablehead, $kolomhead++, "Inputby");
        xlsWriteLabel($tablehead, $kolomhead++, "Version");
        xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
        xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
        xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
        xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

        foreach ($this->Mengagement->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
            xlsWriteLabel($tablebody, $kolombody++, $data->code);
            xlsWriteLabel($tablebody, $kolombody++, $data->engagementDate);
            xlsWriteNumber($tablebody, $kolombody++, $data->clientId);
            xlsWriteNumber($tablebody, $kolombody++, $data->serviceTitleId);
            xlsWriteLabel($tablebody, $kolombody++, $data->yearService);
            xlsWriteLabel($tablebody, $kolombody++, $data->description);
            xlsWriteNumber($tablebody, $kolombody++, $data->partnerId);
            xlsWriteNumber($tablebody, $kolombody++, $data->managerId);
            xlsWriteNumber($tablebody, $kolombody++, $data->seniorId);
            xlsWriteLabel($tablebody, $kolombody++, $data->complexity);
            xlsWriteLabel($tablebody, $kolombody++, $data->risk);
            xlsWriteNumber($tablebody, $kolombody++, $data->agreedFees);
            xlsWriteNumber($tablebody, $kolombody++, $data->agreedExpenses);
            xlsWriteNumber($tablebody, $kolombody++, $data->estimatedCost);
            xlsWriteNumber($tablebody, $kolombody++, $data->signingPartnerId);
            xlsWriteNumber($tablebody, $kolombody++, $data->engagementPartnerId);
            xlsWriteNumber($tablebody, $kolombody++, $data->asset);
            xlsWriteNumber($tablebody, $kolombody++, $data->rl);
            xlsWriteLabel($tablebody, $kolombody++, $data->reportNo);
            xlsWriteLabel($tablebody, $kolombody++, $data->reportDate);
            xlsWriteLabel($tablebody, $kolombody++, $data->opinion);
            xlsWriteNumber($tablebody, $kolombody++, $data->jobFromEmployeeId);
            xlsWriteLabel($tablebody, $kolombody++, $data->finishStatusId);
            xlsWriteLabel($tablebody, $kolombody++, $data->finishDate);
            xlsWriteNumber($tablebody, $kolombody++, $data->finishApproveBy);
            xlsWriteLabel($tablebody, $kolombody++, $data->closing);
            xlsWriteLabel($tablebody, $kolombody++, $data->closingDate);
            xlsWriteLabel($tablebody, $kolombody++, $data->deleted);
            xlsWriteLabel($tablebody, $kolombody++, $data->inputby);
            xlsWriteNumber($tablebody, $kolombody++, $data->version);
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

    public function word() {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=engagement.doc");

        $data = array(
            'engagement_data' => $this->Mengagement->get_all(),
            'start' => 0
        );

        $this->load->view('engagement/engagement_doc', $data);
    }

}

/* End of file Engagement.php */
/* Location: ./application/controllers/Engagement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-03 17:06:57 */
/* http://harviacode.com */