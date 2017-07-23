<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personal extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Mpersonal','Musers'));
        $this->load->library(array('form_validation','template'));
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
        $this->template->caplet('personal/change_password', $data);
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
   

}
