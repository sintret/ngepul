<?php

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('Mtimesheet', 'Mengagement', 'Mengagement_detail', 'Mentity', 'Mclient', 'Mservicetitle', 'Memployee', 'Mclosing_periode'));
        $this->load->library(array('form_validation', 'template'));
        $this->load->helper(array('form', 'url', 'rupiah_helper'));
        if (!$this->session->userdata('username')) {
            redirect('site');
        }
    }

    function index() {
        $todolist = $this->Mengagement_detail->todolist($this->session->userdata('id'));
        $closed = $this->Mengagement_detail->closed($this->session->userdata('id'));

        $month = empty($_POST['month']) ? date("m") : $_POST['month'];
        $year = empty($_POST['year']) ? date("Y") : $_POST['year'];
        $index = empty($_POST['index']) ? 1 : $_POST['index'];
        $results = $this->Mengagement_detail->timesheet($month, $year, $index, $this->session->userdata('employeeId'));


        $data = [];
        $data['title'] = "Home";
        $data['todolists'] = $todolist;
        $data['closeds'] = $closed;
        $data['results'] = $results;
        ///$data['rupiah'] = $this->load->rupiah_helper;

        $this->template->caplet('dashboard/index', $data);
    }

    public function ajax_timesheet() {
        $month = empty($_POST['month']) ? date("m") : $_POST['month'];
        $year = empty($_POST['year']) ? date("Y") : $_POST['year'];
        $index = empty($_POST['index']) ? 1 : $_POST['index'];
        $results = $this->Mengagement_detail->timesheet($month, $year, $index, $this->session->userdata('employeeId'));
        $data = array(
            'results' => $results,
        );
        $this->load->view('ajax/ajax_timesheet', $data);
    }

    public function ajax_timesheet_post() {
        $engagementId = (int)$_POST['engagementId'];
        $hour = $_POST['hour'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $employeeId = $this->session->userdata('employeeId');
        $data = [
            'engagementId' => $engagementId,
            'hour' => $hour,
            'description' => $description,
            'date' => $date,
            'employeeId' => $employeeId
        ];
        $this->Mtimesheet->insert($data);
        //push to firebase
        $message = 'input ' . $hour . ' hour description : ' . $description . ' by ' . $this->session->userdata('username');
        $this->Mengagement_detail->pushToFirebase($engagementId, $message);


        $r = $this->Mtimesheet->total($date, $employeeId);
        $array = [
            'value' => $hour,
            'total' => $r->total
        ];

        echo json_encode($array);
    }

}
