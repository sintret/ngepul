<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        $this->load->model(array('m_buku','m_anggota','m_petugas'));
        if($this->session->userdata('username')){
            redirect('dashboard');
        }
    }
    
    public function index(){
        $this->load->view('web/index');
    }
    
    public function cari_buku(){
        $cari=$this->input->post('cari');
        $data['hasil']=$this->m_buku->cari($cari)->result();
        $data['title']="Pencarian Buku";
        $this->load->view('web/cari_buku',$data);
    }
    
    public function anggota(){
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->semua()->result();
        $this->load->view('web/anggota',$data);
    }
    
    public function cari_anggota(){
        $cari=$this->input->post('cari');
        $data['title']="Data Anggota";
        $data['anggota']=$this->m_anggota->cari($cari)->result();
        $this->load->view('web/anggota',$data);
    }
    
    public function login(){
        $this->load->view('web/login');
    }
    
    public function proses(){
		//print_r($_POST); exit(0);
		
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('message','Username dan password harus diisi');
            redirect('web');
        }else{
            $cek=$this->m_petugas->cek($username,md5($password));
            if($cek){
                //login berhasil, buat session
                //$this->session->set_userdata('username',$username);
                //redirect('dashboard');
				foreach($cekdata as $datalogin)
				{
					$username = $datalogin['username'];
					$password = $datalogin['password'];
				}
				$dlogin = array(
								'username' =>$username,
								'password' => $password,
								'logged_in' => TRUE
								);
				$this->session->set_userdata($dlogin);
				redirect(site_url().'dashboard');
                
            }else{
                //login gagal
                $this->session->set_flashdata('message','Username atau password salah');
                redirect('web');
            }
        }
    }
}