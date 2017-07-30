<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entity extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Mentity');
        $this->load->library(array('form_validation','template'));
        if(!$this->session->userdata('username')){
            redirect('site');
        }
    }

    public function index()
    {
        $entity = $this->Mentity->get_all();

        $data = array(
            'entity_data' => $entity
        );

        $this->template->caplet('entity/entity_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Mentity->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'company_name' => $row->company_name,
		'address' => $row->address,
		'phone' => $row->phone,
		'fax' => $row->fax,
		'logo' => $row->logo,
	    );
            $this->template->caplet('entity/entity_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entity'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('entity/create_action'),
	    'id' => set_value('id'),
	    'company_name' => set_value('company_name'),
	    'address' => set_value('address'),
	    'phone' => set_value('phone'),
	    'fax' => set_value('fax'),
	    'logo' => set_value('logo'),
	);
         $this->template->caplet('entity/entity_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->create();
//        } else {
        
          $data['title'] = 'create gudang';
          $currentYear = date('dmyHis');
          $currentDate = date("Y-m-d H:i:s");
          
           $this->load->library('upload');
     
        $nmfile = "file_".$this->session->userdata('id')."_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/entity'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size'] = '4048'; 
        $config['max_width'] = '2288'; 
        $config['max_height'] = '2968'; 
        $new_name = "file_".$this->session->userdata('id')."-".$currentYear."_". time() .strtolower(str_replace(' ', '_', preg_replace('/[,]/', '', md5(date('YmdHis')).$_FILES["logo"]['name'])));
        $config['file_name'] = $new_name; 
        $this->upload->initialize($config);
        
        if($_FILES['logo']['name'])
        {
            if ($this->upload->do_upload('logo'))
            {
              echo "sukses: ";
            }else{
                echo "gagal: ";
            }
        }
        
        
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'fax' => $this->input->post('fax',TRUE),
		//'logo' => $new_name,
	    );
            
             if ($_FILES['logo']['name'] != ''){
                $data["logo"] = $new_name;
               // unlink("./assets/uploads/entity/".$oldPicture);
            }  
            
            $this->Mentity->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('entity'));
//        }
    }
    
    public function update($id) 
    {
        $row = $this->Mentity->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('entity/update_action'),
		'id' => set_value('id', $row->id),
		'company_name' => set_value('company_name', $row->company_name),
		'address' => set_value('address', $row->address),
		'phone' => set_value('phone', $row->phone),
		'fax' => set_value('fax', $row->fax),
		'logo' => set_value('logo', $row->logo),
	    );
            $this->template->caplet('entity/entity_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entity'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

//        if ($this->form_validation->run() == FALSE) {
//            $this->update($this->input->post('id', TRUE));
//        } else {
        
        $data['title'] = 'create gudang';
          $currentYear = date('dmyHis');
          $currentDate = date("Y-m-d H:i:s");
          
           $this->load->library('upload');
     
        $nmfile = "file_".$this->session->userdata('id')."_" . time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/uploads/entity'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
        $config['max_size'] = '4048'; 
        $config['max_width'] = '2288'; 
        $config['max_height'] = '2968'; 
        $new_name = "file_".$this->session->userdata('id')."-".$currentYear."_". time() .strtolower(str_replace(' ', '_', preg_replace('/[,]/', '', md5(date('YmdHis')).$_FILES["logo"]['name'])));
        $config['file_name'] = $new_name; 
        $this->upload->initialize($config);
        
        if($_FILES['logo']['name'])
        {
            if ($this->upload->do_upload('logo'))
            {
              echo "sukses: ";
            }else{
                echo "gagal: ";
            }
        }
        
            $data = array(
		'company_name' => $this->input->post('company_name',TRUE),
		'address' => $this->input->post('address',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'fax' => $this->input->post('fax',TRUE),
		//'logo' => $this->input->post('logo',TRUE),
	    );
            
             if ($_FILES['logo']['name'] != ''){
                $data["logo"] = $new_name;
                unlink("./assets/uploads/entity/".$oldPicture);
            }  

            $this->Mentity->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('entity'));
//        }
    }
    
    public function delete($id) 
    {
        $row = $this->Mentity->get_by_id($id);

        if ($row) {
            $this->Mentity->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('entity'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('entity'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('company_name', 'company name', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required|numeric');
	$this->form_validation->set_rules('fax', 'fax', 'trim|required|numeric');
	$this->form_validation->set_rules('logo', 'logo', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Entity.php */
/* Location: ./application/controllers/Entity.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-16 23:38:07 */
/* http://harviacode.com */