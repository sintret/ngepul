<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Client extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mclient','Mclosing_periode','Msector','Mcity','Mprovince','Mcountry','Mbpkm','Mclient_contact'));
        $this->load->library(array('form_validation','template'));
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'client/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'client/';
            $config['first_url'] = base_url() . 'client/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mclient->total_rows($q);
        $client = $this->Mclient->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'client_data' => $client,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplet('client/client_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Client_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'clientCode' => $row->clientCode,
		'clientName' => $row->clientName,
		'clientStatus' => $row->clientStatus,
		'sectorId' => $row->sectorId,
		'subSector' => $row->subSector,
		'fsPeriode' => $row->fsPeriode,
		'address' => $row->address,
		'cityId' => $row->cityId,
		'provinceId' => $row->provinceId,
		'countryId' => $row->countryId,
		'mainPostalCode' => $row->mainPostalCode,
		'mainPOBox' => $row->mainPOBox,
		'mainPhone' => $row->mainPhone,
		'mainFax' => $row->mainFax,
		'billingAddress' => $row->billingAddress,
		'billingCityId' => $row->billingCityId,
		'billingPostalCode' => $row->billingPostalCode,
		'billingPOBox' => $row->billingPOBox,
		'billingCountryId' => $row->billingCountryId,
		'billingCPName' => $row->billingCPName,
		'billingCPSalutation' => $row->billingCPSalutation,
		'billingCPPosition' => $row->billingCPPosition,
		'billingCPPhone' => $row->billingCPPhone,
		'billingCPFax' => $row->billingCPFax,
		'billingCPHandphone' => $row->billingCPHandphone,
		'billingCPEmail' => $row->billingCPEmail,
		'npwpName' => $row->npwpName,
		'npwpAddress' => $row->npwpAddress,
		'npwp' => $row->npwp,
		'ppn' => $row->ppn,
		'bpkmId' => $row->bpkmId,
		'listedId' => $row->listedId,
		//'listedType' => $row->listedType,
		'stockExchange' => $row->stockExchange,
		'parentCompany' => $row->parentCompany,
		'parentCountry' => $row->parentCountry,
		'prevAuditor' => $row->prevAuditor,
		'foreignShareholders' => $row->foreignShareholders,
		'multinational' => $row->multinational,
		'clientDeleted' => $row->clientDeleted,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
             $this->template->caplet('client_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('client/create_action'),
	    'id' => set_value('id'),
            'periodes' =>  $this->Mclosing_periode->get_all(),
		'sectors' =>  $this->Msector->get_all(),
		'countrys' =>  $this->Mcountry->get_all(),
		'citys' =>  $this->Mcity->get_all(),
		'provinces' =>  $this->Mprovince->get_all(),
		'lsBpkm' =>  $this->Mbpkm->get_all(),
		'listeds' =>  $this->Mclient->get_all_listed(),
		//'mainContacts' =>  $this->Mclient_contact->get_by_clientid($id),
	    'entityId' => set_value('entityId'),
	    'clientCode' => set_value('clientCode'),
	    'clientName' => set_value('clientName'),
	    'clientStatus' => set_value('clientStatus'),
	    'sectorId' => set_value('sectorId'),
	    'subSector' => set_value('subSector'),
	    'fsPeriode' => set_value('fsPeriode'),
	    'address' => set_value('address'),
	    'cityId' => set_value('cityId'),
	    'provinceId' => set_value('provinceId'),
	    'countryId' => set_value('countryId'),
	    'mainPostalCode' => set_value('mainPostalCode'),
	    'mainPOBox' => set_value('mainPOBox'),
	    'mainPhone' => set_value('mainPhone'),
	    'mainFax' => set_value('mainFax'),
	    'billingAddress' => set_value('billingAddress'),
	    'billingCityId' => set_value('billingCityId'),
	    'billingPostalCode' => set_value('billingPostalCode'),
	    'billingPOBox' => set_value('billingPOBox'),
	    'billingCountryId' => set_value('billingCountryId'),
	    'billingCPName' => set_value('billingCPName'),
	    'billingCPSalutation' => set_value('billingCPSalutation'),
	    'billingCPPosition' => set_value('billingCPPosition'),
	    'billingCPPhone' => set_value('billingCPPhone'),
	    'billingCPFax' => set_value('billingCPFax'),
	    'billingCPHandphone' => set_value('billingCPHandphone'),
	    'billingCPEmail' => set_value('billingCPEmail'),
	    'npwpName' => set_value('npwpName'),
	    'npwpAddress' => set_value('npwpAddress'),
	    'npwp' => set_value('npwp'),
	    'ppn' => set_value('ppn'),
	    'bpkmId' => set_value('bpkmId'),
	    'listedId' => set_value('listedId'),
	    //'listedType' => set_value('listedType'),
	    'stockExchange' => set_value('stockExchange'),
	    'parentCompany' => set_value('parentCompany'),
	    'parentCountry' => set_value('parentCountry'),
	    'prevAuditor' => set_value('prevAuditor'),
	    'foreignShareholders' => set_value('foreignShareholders'),
	    'multinational' => set_value('multinational'),
	    'clientDeleted' => set_value('clientDeleted'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
        $this->template->caplet('client/client_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
            $data = array(
		'entityId' => 1,
		'clientCode' => $this->input->post('clientCode',TRUE),
		'clientName' => $this->input->post('clientName',TRUE),
		'clientStatus' => $this->input->post('clientStatus',TRUE),
		'sectorId' => $this->input->post('sectorId',TRUE),
		'subSector' => $this->input->post('subSector',TRUE),
		'fsPeriode' => $this->input->post('fsPeriode',TRUE),
		'address' => $this->input->post('address',TRUE),
		'cityId' => $this->input->post('cityId',TRUE),
		'provinceId' => $this->input->post('provinceId',TRUE),
		'countryId' => $this->input->post('countryId',TRUE),
		'mainPostalCode' => $this->input->post('mainPostalCode',TRUE),
		'mainPOBox' => $this->input->post('mainPOBox',TRUE),
		'mainPhone' => $this->input->post('mainPhone',TRUE),
		'mainFax' => $this->input->post('mainFax',TRUE),
		'billingAddress' => $this->input->post('billingAddress',TRUE),
		'billingCityId' => $this->input->post('billingCityId',TRUE),
		'billingPostalCode' => $this->input->post('billingPostalCode',TRUE),
		'billingPOBox' => $this->input->post('billingPOBox',TRUE),
		'billingCountryId' => $this->input->post('billingCountryId',TRUE),
		'billingCPName' => $this->input->post('billingCPName',TRUE),
		'billingCPSalutation' => $this->input->post('billingCPSalutation',TRUE),
		'billingCPPosition' => $this->input->post('billingCPPosition',TRUE),
		'billingCPPhone' => $this->input->post('billingCPPhone',TRUE),
		'billingCPFax' => $this->input->post('billingCPFax',TRUE),
		'billingCPHandphone' => $this->input->post('billingCPHandphone',TRUE),
		'billingCPEmail' => $this->input->post('billingCPEmail',TRUE),
		'npwpName' => $this->input->post('npwpName',TRUE),
		'npwpAddress' => $this->input->post('npwpAddress',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'ppn' => $this->input->post('ppn',TRUE),
		'bpkmId' => $this->input->post('bpkmId',TRUE),
		'listedId' => $this->input->post('listedId',TRUE),
		//'listedType' => $this->input->post('listedType',TRUE),
		'stockExchange' => $this->input->post('stockExchange',TRUE),
		'parentCompany' => $this->input->post('parentCompany',TRUE),
		'parentCountry' => $this->input->post('parentCountry',TRUE),
		'prevAuditor' => $this->input->post('prevAuditor',TRUE),
		'foreignShareholders' => $this->input->post('foreignShareholders',TRUE),
		'multinational' => $this->input->post('multinational',TRUE),
		//'clientDeleted' => $this->input->post('clientDeleted',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//'createDate' => $this->input->post('createDate',TRUE),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );

            $this->Mclient->insert($data);
            
            $count_detail =count($_POST['main']['salutationId']);
            for($i=0;$i<$count_detail;$i++)
            {
                if($_POST['main']['salutationId'][$i]){
                    if($i == 0){
                     $this->Mclient_contact->delete_by_client($id);   
                    }
                    
                    $dataMain = array(
                                        'clientId' => $id,
                                        'salutationId' => $_POST['main']['salutationId'][$i],
                                        'contactName' => $_POST['main']['contactName'][$i],
                                        'position' => $_POST['main']['position'][$i],
                                        'handphone' => $_POST['main']['handphone'][$i],
                                        'emailAddress' => $_POST['main']['emailAddress'][$i],
                                    );
                    //$this->Mclient_contact->delete_by_client($id);
                    $this->Mclient_contact->insert($dataMain);
                }
            }
            
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('client'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mclient->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('client/update_action'),
		'id' => set_value('id', $row->id),
		'periodes' =>  $this->Mclosing_periode->get_all(),
		'sectors' =>  $this->Msector->get_all(),
		'countrys' =>  $this->Mcountry->get_all(),
		'citys' =>  $this->Mcity->get_all(),
		'provinces' =>  $this->Mprovince->get_all(),
		'lsBpkm' =>  $this->Mbpkm->get_all(),
		'listeds' =>  $this->Mclient->get_all_listed(),
		'mainContacts' =>  $this->Mclient_contact->get_by_clientid($id),
		'entityId' => set_value('entityId', $row->entityId),
		'clientCode' => set_value('clientCode', $row->clientCode),
		'clientName' => set_value('clientName', $row->clientName),
		'clientStatus' => set_value('clientStatus', $row->clientStatus),
		'sectorId' => set_value('sectorId', $row->sectorId),
		'subSector' => set_value('subSector', $row->subSector),
		'fsPeriode' => set_value('fsPeriode', $row->fsPeriode),
		'address' => set_value('address', $row->address),
		'cityId' => set_value('cityId', $row->cityId),
		'provinceId' => set_value('provinceId', $row->provinceId),
		'countryId' => set_value('countryId', $row->countryId),
		'mainPostalCode' => set_value('mainPostalCode', $row->mainPostalCode),
		'mainPOBox' => set_value('mainPOBox', $row->mainPOBox),
		'mainPhone' => set_value('mainPhone', $row->mainPhone),
		'mainFax' => set_value('mainFax', $row->mainFax),
		'billingAddress' => set_value('billingAddress', $row->billingAddress),
		'billingCityId' => set_value('billingCityId', $row->billingCityId),
		'billingPostalCode' => set_value('billingPostalCode', $row->billingPostalCode),
		'billingPOBox' => set_value('billingPOBox', $row->billingPOBox),
		'billingCountryId' => set_value('billingCountryId', $row->billingCountryId),
		'billingCPName' => set_value('billingCPName', $row->billingCPName),
		'billingCPSalutation' => set_value('billingCPSalutation', $row->billingCPSalutation),
		'billingCPPosition' => set_value('billingCPPosition', $row->billingCPPosition),
		'billingCPPhone' => set_value('billingCPPhone', $row->billingCPPhone),
		'billingCPFax' => set_value('billingCPFax', $row->billingCPFax),
		'billingCPHandphone' => set_value('billingCPHandphone', $row->billingCPHandphone),
		'billingCPEmail' => set_value('billingCPEmail', $row->billingCPEmail),
		'npwpName' => set_value('npwpName', $row->npwpName),
		'npwpAddress' => set_value('npwpAddress', $row->npwpAddress),
		'npwp' => set_value('npwp', $row->npwp),
		'ppn' => set_value('ppn', $row->ppn),
		'bpkmId' => set_value('bpkmId', $row->bpkmId),
		'listedId' => set_value('listedId', $row->listedId),
		//'listedType' => set_value('listedType', $row->listedType),
		'stockExchange' => set_value('stockExchange', $row->stockExchange),
		'parentCompany' => set_value('parentCompany', $row->parentCompany),
		'parentCountry' => set_value('parentCountry', $row->parentCountry),
		'prevAuditor' => set_value('prevAuditor', $row->prevAuditor),
		'foreignShareholders' => set_value('foreignShareholders', $row->foreignShareholders),
		'multinational' => set_value('multinational', $row->multinational),
		'clientDeleted' => set_value('clientDeleted', $row->clientDeleted),
		'userCreate' => set_value('userCreate', $row->userCreate),
		'createDate' => set_value('createDate', $row->createDate),
		'userUpdate' => set_value('userUpdate', $row->userUpdate),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
             $this->template->caplet('client/client_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        //echo "<pre>"; print_r($_POST['main']); exit(0);

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
        $id = $this->input->post('id', TRUE);
            $data = array(
		'entityId' => 1,
		'clientCode' => $this->input->post('clientCode',TRUE),
		'clientName' => $this->input->post('clientName',TRUE),
		'clientStatus' => $this->input->post('clientStatus',TRUE),
		'sectorId' => $this->input->post('sectorId',TRUE),
		'subSector' => $this->input->post('subSector',TRUE),
		'fsPeriode' => $this->input->post('fsPeriode',TRUE),
		'address' => $this->input->post('address',TRUE),
		'cityId' => $this->input->post('cityId',TRUE),
		'provinceId' => $this->input->post('provinceId',TRUE),
		'countryId' => $this->input->post('countryId',TRUE),
		'mainPostalCode' => $this->input->post('mainPostalCode',TRUE),
		'mainPOBox' => $this->input->post('mainPOBox',TRUE),
		'mainPhone' => $this->input->post('mainPhone',TRUE),
		'mainFax' => $this->input->post('mainFax',TRUE),
		'billingAddress' => $this->input->post('billingAddress',TRUE),
		'billingCityId' => $this->input->post('billingCityId',TRUE),
		'billingPostalCode' => $this->input->post('billingPostalCode',TRUE),
		'billingPOBox' => $this->input->post('billingPOBox',TRUE),
		'billingCountryId' => $this->input->post('billingCountryId',TRUE),
		'billingCPName' => $this->input->post('billingCPName',TRUE),
		'billingCPSalutation' => $this->input->post('billingCPSalutation',TRUE),
		'billingCPPosition' => $this->input->post('billingCPPosition',TRUE),
		'billingCPPhone' => $this->input->post('billingCPPhone',TRUE),
		'billingCPFax' => $this->input->post('billingCPFax',TRUE),
		'billingCPHandphone' => $this->input->post('billingCPHandphone',TRUE),
		'billingCPEmail' => $this->input->post('billingCPEmail',TRUE),
		'npwpName' => $this->input->post('npwpName',TRUE),
		'npwpAddress' => $this->input->post('npwpAddress',TRUE),
		'npwp' => $this->input->post('npwp',TRUE),
		'ppn' => $this->input->post('ppn',TRUE),
		'bpkmId' => $this->input->post('bpkmId',TRUE),
		'listedId' => $this->input->post('listedId',TRUE),
		//'listedType' => $this->input->post('listedType',TRUE),
		'stockExchange' => $this->input->post('stockExchange',TRUE),
		'parentCompany' => $this->input->post('parentCompany',TRUE),
		'parentCountry' => $this->input->post('parentCountry',TRUE),
		'prevAuditor' => $this->input->post('prevAuditor',TRUE),
		'foreignShareholders' => $this->input->post('foreignShareholders',TRUE),
		'multinational' => $this->input->post('multinational',TRUE),
		//'clientDeleted' => $this->input->post('clientDeleted',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//'createDate' => $this->input->post('createDate',TRUE),
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );
            
            $this->Mclient->update($id, $data);
            //$mainBill = $this->input->post('main['room'',TRUE);
            $count_detail =count($_POST['main']['salutationId']);
            for($i=0;$i<$count_detail;$i++)
            {
                if($_POST['main']['salutationId'][$i]){
                    if($i == 0){
                     $this->Mclient_contact->delete_by_client($id);   
                    }
                    
                    $dataMain = array(
                                        'clientId' => $id,
                                        'salutationId' => $_POST['main']['salutationId'][$i],
                                        'contactName' => $_POST['main']['contactName'][$i],
                                        'position' => $_POST['main']['position'][$i],
                                        'handphone' => $_POST['main']['handphone'][$i],
                                        'emailAddress' => $_POST['main']['emailAddress'][$i],
                                    );
                    //$this->Mclient_contact->delete_by_client($id);
                    $this->Mclient_contact->insert($dataMain);
                }
            }
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('client'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mclient->get_by_id($id);

        if ($row) {
            $this->Mclient->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('client'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('client'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('clientCode', 'clientcode', 'trim|required');
	$this->form_validation->set_rules('clientName', 'clientname', 'trim|required');
	$this->form_validation->set_rules('clientStatus', 'clientstatus', 'trim|required');
	$this->form_validation->set_rules('sectorId', 'sectorid', 'trim|required');
	$this->form_validation->set_rules('subSector', 'subsector', 'trim|required');
	$this->form_validation->set_rules('fsPeriode', 'fsperiode', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('cityId', 'cityid', 'trim|required');
	$this->form_validation->set_rules('provinceId', 'provinceid', 'trim|required');
	$this->form_validation->set_rules('countryId', 'countryId', 'trim|required');
	$this->form_validation->set_rules('mainPostalCode', 'mainpostalcode', 'trim|required');
	$this->form_validation->set_rules('mainPOBox', 'mainpobox', 'trim|required');
	$this->form_validation->set_rules('mainPhone', 'mainphone', 'trim|required');
	$this->form_validation->set_rules('mainFax', 'mainfax', 'trim|required');
	$this->form_validation->set_rules('billingAddress', 'billingaddress', 'trim|required');
	$this->form_validation->set_rules('billingCityId', 'billingcityid', 'trim|required');
	$this->form_validation->set_rules('billingPostalCode', 'billingpostalcode', 'trim|required');
	$this->form_validation->set_rules('billingPOBox', 'billingpobox', 'trim|required');
	$this->form_validation->set_rules('billingCountryId', 'billingCountryId', 'trim|required');
	$this->form_validation->set_rules('billingCPName', 'billingcpname', 'trim|required');
	$this->form_validation->set_rules('billingCPSalutation', 'billingcpsalutation', 'trim|required');
	$this->form_validation->set_rules('billingCPPosition', 'billingcpposition', 'trim|required');
	$this->form_validation->set_rules('billingCPPhone', 'billingcpphone', 'trim|required');
	$this->form_validation->set_rules('billingCPFax', 'billingcpfax', 'trim|required');
	$this->form_validation->set_rules('billingCPHandphone', 'billingcphandphone', 'trim|required');
	$this->form_validation->set_rules('billingCPEmail', 'billingcpemail', 'trim|required');
	$this->form_validation->set_rules('npwpName', 'npwpname', 'trim|required');
	$this->form_validation->set_rules('npwpAddress', 'npwpaddress', 'trim|required');
	$this->form_validation->set_rules('npwp', 'npwp', 'trim|required');
	$this->form_validation->set_rules('ppn', 'ppn', 'trim|required|numeric');
	$this->form_validation->set_rules('bpkmId', 'bpkmid', 'trim|required');
	$this->form_validation->set_rules('listedId', 'listedId', 'trim|required');
	//$this->form_validation->set_rules('listedType', 'listedtype', 'trim|required');
	$this->form_validation->set_rules('stockExchange', 'stockexchange', 'trim|required');
	$this->form_validation->set_rules('parentCompany', 'parentcompany', 'trim|required');
	$this->form_validation->set_rules('parentCountry', 'parentcountry', 'trim|required');
	$this->form_validation->set_rules('prevAuditor', 'prevauditor', 'trim|required');
	$this->form_validation->set_rules('foreignShareholders', 'foreignshareholders', 'trim|required');
	$this->form_validation->set_rules('multinational', 'multinational', 'trim|required');
	$this->form_validation->set_rules('clientDeleted', 'clientdeleted', 'trim|required');
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
        $namaFile = "client.xls";
        $judul = "client";
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
	xlsWriteLabel($tablehead, $kolomhead++, "ClientCode");
	xlsWriteLabel($tablehead, $kolomhead++, "ClientName");
	xlsWriteLabel($tablehead, $kolomhead++, "ClientStatus");
	xlsWriteLabel($tablehead, $kolomhead++, "SectorId");
	xlsWriteLabel($tablehead, $kolomhead++, "SubSector");
	xlsWriteLabel($tablehead, $kolomhead++, "FsPeriode");
	xlsWriteLabel($tablehead, $kolomhead++, "Address");
	xlsWriteLabel($tablehead, $kolomhead++, "CityId");
	xlsWriteLabel($tablehead, $kolomhead++, "ProvinceId");
	xlsWriteLabel($tablehead, $kolomhead++, "countryId");
	xlsWriteLabel($tablehead, $kolomhead++, "MainPostalCode");
	xlsWriteLabel($tablehead, $kolomhead++, "MainPOBox");
	xlsWriteLabel($tablehead, $kolomhead++, "MainPhone");
	xlsWriteLabel($tablehead, $kolomhead++, "MainFax");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCityId");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingPostalCode");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingPOBox");
	xlsWriteLabel($tablehead, $kolomhead++, "billingCountryId");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPName");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPSalutation");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPPosition");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPPhone");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPFax");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPHandphone");
	xlsWriteLabel($tablehead, $kolomhead++, "BillingCPEmail");
	xlsWriteLabel($tablehead, $kolomhead++, "NpwpName");
	xlsWriteLabel($tablehead, $kolomhead++, "NpwpAddress");
	xlsWriteLabel($tablehead, $kolomhead++, "Npwp");
	xlsWriteLabel($tablehead, $kolomhead++, "Ppn");
	xlsWriteLabel($tablehead, $kolomhead++, "BpkmId");
	xlsWriteLabel($tablehead, $kolomhead++, "listedId");
	//xlsWriteLabel($tablehead, $kolomhead++, "ListedType");
	xlsWriteLabel($tablehead, $kolomhead++, "StockExchange");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentCompany");
	xlsWriteLabel($tablehead, $kolomhead++, "ParentCountry");
	xlsWriteLabel($tablehead, $kolomhead++, "PrevAuditor");
	xlsWriteLabel($tablehead, $kolomhead++, "ForeignShareholders");
	xlsWriteLabel($tablehead, $kolomhead++, "Multinational");
	xlsWriteLabel($tablehead, $kolomhead++, "ClientDeleted");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Client_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->clientCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->clientName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->clientStatus);
	    xlsWriteNumber($tablebody, $kolombody++, $data->sectorId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->subSector);
	    xlsWriteLabel($tablebody, $kolombody++, $data->fsPeriode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->address);
	    xlsWriteNumber($tablebody, $kolombody++, $data->cityId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->provinceId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mainProvince);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mainPostalCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mainPOBox);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mainPhone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->mainFax);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingAddress);
	    xlsWriteNumber($tablebody, $kolombody++, $data->billingCityId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingPostalCode);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingPOBox);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCountryId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPName);
	    xlsWriteNumber($tablebody, $kolombody++, $data->billingCPSalutation);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPPosition);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPPhone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPFax);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPHandphone);
	    xlsWriteLabel($tablebody, $kolombody++, $data->billingCPEmail);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwpName);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwpAddress);
	    xlsWriteLabel($tablebody, $kolombody++, $data->npwp);
	    xlsWriteNumber($tablebody, $kolombody++, $data->ppn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->bpkmId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->listedId);
	    //xlsWriteNumber($tablebody, $kolombody++, $data->listedType);
	    xlsWriteLabel($tablebody, $kolombody++, $data->stockExchange);
	    xlsWriteLabel($tablebody, $kolombody++, $data->parentCompany);
	    xlsWriteLabel($tablebody, $kolombody++, $data->parentCountry);
	    xlsWriteLabel($tablebody, $kolombody++, $data->prevAuditor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->foreignShareholders);
	    xlsWriteLabel($tablebody, $kolombody++, $data->multinational);
	    xlsWriteLabel($tablebody, $kolombody++, $data->clientDeleted);
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
        header("Content-Disposition: attachment;Filename=client.doc");

        $data = array(
            'client_data' => $this->Client_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('client_doc',$data);
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
                                                'entityId'=>1, 
                                                'clientCode'=>$arr_data[$i]['C'], 
                                                'clientName'=>trim($arr_data[$i]['D']),
                                                'clientStatus'=>$arr_data[$i]['E'],
                                                'sectorId'=>$arr_data[$i]['F'] , 
                                                'subSector'=>$arr_data[$i]['G'],
                                                'fsPeriode'=>$arr_data[$i]['H'],
                                                'address'=>$arr_data[$i]['I'],
                                                'cityId'=>$arr_data[$i]['J'],
                                                'provinceId'=>$arr_data[$i]['K'],
                                                'mainProvince'=>$arr_data[$i]['L'],
                                                'mainPostalCode'=>$arr_data[$i]['M'],
                                                'mainPOBox'=>$arr_data[$i]['N'],
                                                'mainPhone'=>$arr_data[$i]['O'],
                                                'mainFax'=>$arr_data[$i]['P'],
                                                'billingAddress'=> $arr_data[$i]['Q'], 
                                                'billingCityId'=>$arr_data[$i]['R'],
                                                'billingPostalCode'=>$arr_data[$i]['S'],
                                                'billingPOBox'=>$arr_data[$i]['T'],
                                                'billingCountryId'=>$arr_data[$i]['U'],
                                                'billingCPName'=>$arr_data[$i]['V'],
                                                'billingCPSalutation'=>$arr_data[$i]['W'],
                                                'billingCPPosition'=>$arr_data[$i]['X'],
                                                'billingCPPhone'=>$arr_data[$i]['Y'],
                                                'billingCPFax'=>$arr_data[$i]['Z'],
                                                'billingCPHandphone'=>$arr_data[$i]['AA'],
                                                'billingCPEmail'=>$arr_data[$i]['AB'], 
                                                'npwpName'=>$arr_data[$i]['AC'],
                                                'npwpAddress'=>$arr_data[$i]['AD'],
                                                'npwp'=>$arr_data[$i]['AE'],
                                                'ppn'=>$arr_data[$i]['AF'],
                                                'bpkmId'=>$arr_data[$i]['AG'],
                                                'listedId'=>$arr_data[$i]['AH'],
                                               // 'listedType'=>$arr_data[$i]['AI'],
                                                'stockExchange'=>$arr_data[$i]['AJ'],
                                                'parentCompany'=>$arr_data[$i]['AK'],
                                                'prevAuditor'=>$arr_data[$i]['AL'],
                                                'foreignShareholders'=>$arr_data[$i]['AM'],
                                                'multinational'=>$arr_data[$i]['N'],
                                                'clientDeleted'=>0,
                                                'userCreate'=>1,
                                                'createDate'=>date('Y-m-d H:i:s'),
                                                'userUpdate'=>1,
                                                'userUpdate'=>date('Y-m-d H:i:s')
                                    );
			  $this->Mclient->add_import($data_user);
                }
                redirect('client');
            echo "<pre>"; print_r($arr_data);     
	exit(0);           
       
     }
    

}

