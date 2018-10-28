<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userslist extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('Muserslist','Musers','Muserlevel','Memployee','Mentity'));
        $this->load->library(array('form_validation','template'));
    }
    
      public function index8()
    {	
	$q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
		
        $userslist = $this->Muserslist->get_all_tbl();

        $data = array(
            'userslist_data' => $userslist
        );

        $this->template->caplet('userslist/users_list', $data);
    }

    
    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        //echo "<pre>"; print_r($start); exit(0);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'userslist/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'userslist/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'userslist/';
            $config['first_url'] = base_url() . 'userslist/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Muserslist->total_rows($q);
        $userslist = $this->Muserslist->get_limit_data($config['per_page'], $start, $q);
        //echo "<pre>"; print_r($userslist); exit(0);
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'userslist_data' => $userslist,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        
        $this->template->capletfull('userslist/users_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Muserslist->get_by_id($id);
        $contact = $this->Muserslist->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'entityId' => $row->entityId,
		'userlevels' => $this->Muserlevel->get_all(),
		'employees' => $this->Memployee->get_all(),
		'userlevelId' => $row->userlevelId,
		'avatar' => $row->avatar,
		'employeeId' => $row->employeeId,
		'username' => $row->username,
		'email' => $row->email,
		'password' => $row->password,
		'active' => $row->active,
		'deleted' => $row->deleted,
		'userCreate' => $row->userCreate,
		'createDate' => $row->createDate,
		'userUpdate' => $row->userUpdate,
		'updateDate' => $row->updateDate,
	    );
            $this->template->caplet('userslist/users_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userslist'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('userslist/create_action'),
            'userlevels' => $this->Muserlevel->get_all(),
            'employees' => $this->Memployee->get_all(),
            'entities' => $this->Mentity->get_all(),
	    'id' => set_value('id'),
	    'pageId' => set_value('pageId'),
	    'entityId' => set_value('entityId'),
	    'userlevelId' => set_value('userlevelId'),
	    'avatar' => set_value('avatar'),
	    'employeeId' => set_value('employeeId'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'active' => set_value('active'),
	    'deleted' => set_value('deleted'),
	    'userCreate' => set_value('userCreate'),
	    'createDate' => set_value('createDate'),
	    'userUpdate' => set_value('userUpdate'),
	    'updateDate' => set_value('updateDate'),
	);
         $this->template->caplettable('userslist/users_form', $data);
    }
    
    public function create_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
	
		//echo "<pre>"; print_r($this->input->post()); exit(0);  
        $pageId = $this->input->post('pageId',TRUE);
        
        $this->load->library('upload');
            $data['title'] = 'create gudang';
            $currentYear = date('dmyHis');
            $currentDate = date("Y-m-d H:i:s");
        $nmfile = "file_".$this->session->userdata('id')."_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/employee'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size'] = '4048'; 
        $config['max_width'] = '2288'; 
        $config['max_height'] = '1968'; 
        $new_name = "file_".$this->session->userdata('id')."-".$currentYear."_". time() .strtolower(str_replace(' ', '_', preg_replace('/[,]/', '', md5(date('YmdHis')).$_FILES["avatar"]['name'])));
        $config['file_name'] = $new_name; 
        $this->upload->initialize($config);
        
        if($_FILES['avatar']['name'])
        {
            if ($this->upload->do_upload('avatar'))
            {
              echo "sukses: ";
            }else{
                echo "gagal: ";
            }
        }
        
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'userlevelId' => $this->input->post('userlevelId',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'active' => $this->input->post('active',TRUE),
		'deleted' => 0,
		'userCreate' => 1,
		'createDate' => date('Y-m-d H:i:s'),
		//'avatar' => $new_name,
		//'userUpdate' => $this->input->post('userUpdate',TRUE),
		//'updateDate' => $this->input->post('updateDate',TRUE),
	    );
             if ($_FILES['avatar']['name'] != ''){
                $data["avatar"] = $new_name;
                //$oldAvatar = $this->input->post('entityId',TRUE);
                //unlink("./assets/uploads/employee/".$oldAvatar);
            }     
            $this->Muserslist->insert($data);
             $this->session->set_flashdata('message', '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <span><strong>Notice: </strong> Userlist has been updated..</span>
                                </div>');
            //$this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('userslist/?start='.$pageId));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Muserslist->get_by_id($id);

        if ($row) {
            $data = array( 
                'button' => 'Update',
                'action' => site_url('userslist/update_action'),
		'id' => set_value('id', $row->id),
                'userlevels' => $this->Muserlevel->get_all(),
                'employees' => $this->Memployee->get_all(),
                'entities' => $this->Mentity->get_all(),
		'entityId' => set_value('entityId', $row->entityId),
		'userlevelId' => set_value('userlevelId', $row->userlevelId),
		'avatar' => set_value('avatar', $row->avatar),
		'employeeId' => set_value('employeeId', $row->employeeId),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'active' => set_value('active', $row->active),
		'deleted' => set_value('deleted', $row->deleted),
		'userCreate' => set_value('userCreate', $row->userCreate),
		'createDate' => set_value('createDate', $row->createDate),
		'userUpdate' => set_value('userUpdate', $row->userUpdate),
		'updateDate' => set_value('updateDate', $row->updateDate),
	    );
             $this->template->caplettable('userslist/users_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('userslist'));
        }
    }
    
    public function update_action() 
    {
//        $this->_rules();
//
//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
         $this->load->library('Upload');
         
         $data['title'] = 'create gudang';
          $currentYear = date('dmyHis');
          $currentDate = date("Y-m-d H:i:s");
        
          $nmfile = "file_".$this->session->userdata('id')."_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/employee'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size'] = '4048'; 
        $config['max_width'] = '2288'; 
        $config['max_height'] = '1968'; 
        $new_name = "file_".$this->session->userdata('id')."-".$currentYear."_". time() .strtolower(str_replace(' ', '_', preg_replace('/[,]/', '', md5(date('YmdHis')).$_FILES["avatar"]['name'])));
        $config['file_name'] = $new_name; 
        $this->upload->initialize($config);
        
        if($_FILES['avatar']['name'])
        {
            if ($this->upload->do_upload('avatar'))
            {
              echo "sukses: ";
            }else{
                echo "gagal: ";
            }
        }
          $pageId = $this->input->post('pageId',TRUE);
          
            $data = array(
		'entityId' => $this->input->post('entityId',TRUE),
		'userlevelId' => $this->input->post('userlevelId',TRUE),
		//'avatar' => $this->input->post('avatar',TRUE),
		'employeeId' => $this->input->post('employeeId',TRUE),
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		//'password' => $this->input->post('password',TRUE),
		'active' => $this->input->post('active',TRUE),
		//'deleted' => $this->input->post('deleted',TRUE),
		//'userCreate' => $this->input->post('userCreate',TRUE),
		//'createDate' => $this->input->post('createDate',TRUE),
		'userUpdate' => 1,
		'updateDate' => date('Y-m-d H:i:s'),
	    );

             if ($_FILES['avatar']['name'] != ''){
                $data["avatar"] = $new_name;
                $oldAvatar = $this->input->post('entityId',TRUE);
                unlink("./assets/uploads/employee/".$oldAvatar);
            }  
            
            $updated = $this->Muserslist->update($this->input->post('id', TRUE), $data);
           
                $this->session->set_flashdata('message', '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <span><strong>Notice: </strong> Userlist has been updated..</span>
                                </div>');
           
             
           
            
            //$this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('userslist?start='.$pageId));
//        }
    }
    
    public function delete($id) 
    {
        $page =  $this->uri->segment(5);
        //echo "<pre>"; print_r($page); exit(0);
        $row = $this->Muserslist->get_by_id($id);
        
        if ($row) {
            
           // $this->Muserslist->delete($id);
            $data['deleted'] = 1;
            $this->Muserslist->update($id, $data);
            
             $this->session->set_flashdata('message', '<div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <span><strong>Notice: </strong> Userlist has been deleted..</span>
                                </div>');
            redirect(site_url('userslist/?start='.$page));
        } else {
            $row = $this->Muserslist->get_by_id($id);
           $this->session->set_flashdata('message', '<div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <span><strong>Notice: </strong> record not found..</span>
                                </div>');
            redirect(site_url('userslist/?start='.$page));
        } 
    }
      public function reset() 
    {
         $employee =$this->Memployee->get_all();
        $data = array(
            'employee' => $employee,
        );

        $this->template->caplet('userslist/reset', $data);
  
       
    }
    public function reset_password_do() {
    //echo "<pre>"; print_r($_POST); exit(0);
        $employeeId        = $this->input->post('employeeId', TRUE);
        $newPassword        = $this->input->post('newPassword', TRUE);
        $retypeNewPassword  = $this->input->post('retypeNewPassword', TRUE);
   
  
        if($newPassword != $retypeNewPassword){
            //new passwor not match
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong> new password not match, please retype again..</span>
		</div>');
            redirect("userslist/reset/error");
            exit(0);
        } else {
            
            $data = array(
                            'password' => md5($newPassword),
                          );
            $inserting = $this->Musers->update_employee_pass($data,$employeeId);            
            $this->session->set_flashdata('eroor_set', '<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<span><strong>Notice: </strong>new password has been updated..</span>
		</div>');
            redirect("userslist/reset/success");
        }
        $data['title'] = 'reset password';

    }

    public function _rules() 
    {
	$this->form_validation->set_rules('entityId', 'entityid', 'trim|required');
	$this->form_validation->set_rules('userlevelId', 'userlevelid', 'trim|required');
	$this->form_validation->set_rules('avatar', 'avatar', 'trim|required');
	$this->form_validation->set_rules('employeeId', 'employeeid', 'trim|required');
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('active', 'active', 'trim|required');
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
        $namaFile = "users.xls";
        $judul = "users";
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
	xlsWriteLabel($tablehead, $kolomhead++, "UserlevelId");
	xlsWriteLabel($tablehead, $kolomhead++, "Avatar");
	xlsWriteLabel($tablehead, $kolomhead++, "EmployeeId");
	xlsWriteLabel($tablehead, $kolomhead++, "Username");
	xlsWriteLabel($tablehead, $kolomhead++, "Email");
	xlsWriteLabel($tablehead, $kolomhead++, "Password");
	xlsWriteLabel($tablehead, $kolomhead++, "Active");
	xlsWriteLabel($tablehead, $kolomhead++, "Deleted");
	xlsWriteLabel($tablehead, $kolomhead++, "UserCreate");
	xlsWriteLabel($tablehead, $kolomhead++, "CreateDate");
	xlsWriteLabel($tablehead, $kolomhead++, "UserUpdate");
	xlsWriteLabel($tablehead, $kolomhead++, "UpdateDate");

	foreach ($this->Muserslist->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->entityId);
	    xlsWriteNumber($tablebody, $kolombody++, $data->userlevelId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->avatar);
	    xlsWriteNumber($tablebody, $kolombody++, $data->employeeId);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
	    xlsWriteLabel($tablebody, $kolombody++, $data->active);
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
        header("Content-Disposition: attachment;Filename=users.doc");

        $data = array(
            'users_data' => $this->Muserslist->get_all(),
            'start' => 0
        );
        
        $this->load->view('userslist/users_doc',$data);
    }

}

/* End of file Userslist.php */
/* Location: ./application/controllers/Userslist.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-26 20:45:47 */
/* http://harviacode.com */