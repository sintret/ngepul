<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Mengagement', 'Mengagement_detail', 'Mentity', 'Mclient', 'Mservicetitle', 'Memployee', 'Mclosing_periode'));
        $this->load->library(array('form_validation', 'template'));

        if (!$this->session->userdata('username')) {
            redirect('site');
        }
    }

    function index() {

        $todolist = $this->Mengagement_detail->todolist($this->session->userdata('id'));
        $closed = $this->Mengagement_detail->closed($this->session->userdata('id'));

        $data = [];
        $data['title'] = "Home";
        $data['todolists'] = $todolist;
        $data['closeds'] = $closed;

        $this->template->caplet('dashboard/index', $data);
    }

}
