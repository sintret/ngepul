<?php
class Access extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->model(array('Muserlevel','Maccess'));
        $this->load->library(array('form_validation','template'));
        
        if(!$this->session->userdata('username')){
            redirect('site');
        }
    }
    
    static function controllers()
    { 
            return [
                    'entity',
                    'client',
                    'employee',
                    'service',
                    'global',
                    'employee',
                    'user',
                    'engagement'
                   ];
            
    }
        static function methods()
    { 
            return [
                'create',
                'update',
                'view',
                'delete',
                'excel',
                'word',
                ];
            
    }

    
    function index(){
      //  $data['title']="Access";
      //  $data['userlevels']= $this->Muserlevel->get_all();
        $data = array(
            'title' => 'Access',
            'action' => site_url('access/create'),
	    'userlevels' => $this->Muserlevel->get_all(),
	    'access' => $this->Muserlevel->get_all(),
            'controllers' => self::controllers(),
            'methods' => self::methods(),
	);
        $this->template->caplet('access/access_role',$data);
    }
    
    
    function create(){
    // echo "<pre>"; print_r($_POST); exit(0);
     foreach($_POST as $key => $val){
         $controllersVal  = $key;
         $methodsVal[]  = $val;
         foreach($methodsVal as $keyMethods => $valMethod){
             
         }
         echo "<pre>"; print_r($methodsVal); 
   
     }
     exit(0);
     $userlevelId = $this->input->post('userlevelId',TRUE);
     $controller   = $this->input->post('userlevelId',TRUE);
     $method   = $this->input->post('userlevelId',TRUE);
     
     $data['title']="Access";
        $this->template->caplet('access/access_role',$data);
    }
    
   
}