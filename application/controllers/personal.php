<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mpersonal','Musers','Mreimbursement','Mengagement_detail','Mtimesheet'));
        $this->load->library(array('form_validation','template'));
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
    }

    public function index()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplet('personal/index', $data);
    }

    public function change_password()
    {       

        $data = array(
            'title' => 'test',
        );
        $this->template->caplettable('personal/change_password', $data);
    }
    
    public function change_password_add() {
    //  echo "<pre>"; print_r($_POST); //exit(0);
        $idUser = $this->session->userdata('id');
        $oldPassword        = $this->input->post('oldPassword', TRUE);
        $newPassword        = $this->input->post('newPassword', TRUE);
        $retypeNewPassword  = $this->input->post('retypeNewPassword', TRUE);
      $cekOldPass =  $this->Musers->cek_old_password($oldPassword, $idUser); 
   //   echo "<pre>"; print_r($cekOldPass);exit(0);
        if ($cekOldPass == 0){
            // old password not match
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong> The Old password not match with Database, please retype again..</span>
		</div>');
            redirect("personal/change_password");
            exit(0);
        } 
        if($newPassword != $retypeNewPassword){
            //new passwor not match
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong> new password not match, please retype again..</span>
		</div>');
            redirect("personal/change_password");
            exit(0);
        } else {
            
            $data = array(
                            'password' => md5($newPassword),
                          );
            $inserting = $this->Musers->update_password($data,$idUser);            
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong> Your new password has been updated..</span>
		</div>');
            redirect("personal/change_password");
        }
        $data['title'] = 'change password';

    }
    
     public function myreimbursement()
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
        $config['total_rows'] = $this->Mreimbursement->mytotal_rows($q);
        $reimbursement = $this->Mreimbursement->get_mylimit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'reimbursement_data' => $reimbursement,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->caplettable('reimbursement/mylist/reimbursement_list', $data);
    }
    
    public function my_task() {
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
        $userId = $this->session->userdata('id');
        $userLevelId = $this->session->userdata('userlevelId');
        $idEmployee = $this->session->userdata('employeeId');
        
   
        $config['total_rows'] = $this->Mengagement_detail->total_byuser($q,$idEmployee);
        
        $engagement = $this->Mengagement_detail->get_mytask($config['per_page'], $start, $q, $idEmployee,$userLevelId);
    
        //echo "<pre>"; print_r($engagement); exit(0);
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
     
          
            $this->template->caplettable('personal/my_task', $data);
     
    }
   

}
