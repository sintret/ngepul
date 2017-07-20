<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Site extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('Musers'));
        /*
          if($this->session->userdata('username')){
          redirect('dashboard');
          }
         */
    }

    public function index() {
        $this->login();
    }

    public function login() {
        $this->load->view('site/login');
    }

    public function logout() {
        $this->session->unset_userdata('username');
        redirect('site');
    }

    public function authlog() {
        //echo "<pre>"; print_r($_POST); exit(0);

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Username dan password harus diisi');
            redirect('site');
        } else {
            $cek = $this->Musers->cek($username, md5($password));

            sleep(1);
            if ($cek) {
                $return_arr["status"] = 1;
                $dlogin = $cek[0];
                $dlogin['status'] = 1;
                $dlogin['logged_in'] = TRUE;
                //echo "<pre>"; print_r($dlogin); exit(0);
                
                $this->session->set_userdata($dlogin);
                redirect(site_url().'dashboard');
            } else {
                //login failed				
                $return_arr["status"] = 0;
                $this->session->set_flashdata('message', 'Username atau password salah');
                redirect('site');
            }
           // echo json_encode($return_arr);
        }
       // exit();
    }

    public function authlog2() {
        //echo "<pre>"; print_r($_POST); exit(0);

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Username dan password harus diisi');
            redirect('site');
        } else {
            $cek = $this->Musers->cek($username, md5($password));

            sleep(1);
            if ($cek) {
                foreach ($cek as $datalogin) {
                    $return_arr["status"] = 1;
                    $username = $datalogin['username'];
                    $password = $datalogin['password'];
                }
                $dlogin = array(
                    'username' => $username,
                    'password' => $password,
                    'logged_in' => TRUE
                );
                $dlogin = $cek[0];
                $dlogin['logged_in'] = TRUE;
                echo "<pre>";
                print_r($dlogin);
                exit(0);
                $this->session->set_userdata($dlogin);
                //redirect(site_url().'dashboard');
            } else {
                //login failed				
                $return_arr["status"] = 0;
                $this->session->set_flashdata('message', 'Username atau password salah');
                // redirect('site');
            }
            echo json_encode($return_arr);
        }
        exit();
    }

    public function actlogin() {
        //print_r($_POST); exit(0);

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', 'Username dan password harus diisi');
            redirect('site');
        } else {
            $cek = $this->Musers->cek($username, md5($password));
            if ($cek) {
                //login berhasil, buat session
                //$this->session->set_userdata('username',$username);
                //redirect('dashboard');
                foreach ($cekdata as $datalogin) {
                    $username = $datalogin['username'];
                    $password = $datalogin['password'];
                }
                $dlogin = array(
                    'username' => $username,
                    'password' => $password,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($dlogin);
                redirect(site_url() . 'dashboard');
            } else {
                //login gagal
                $this->session->set_flashdata('message', 'Username atau password salah');
                redirect('site');
            }
        }
    }

}
