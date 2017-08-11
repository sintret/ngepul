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
        $m = empty($_POST['month']) ? date("m") : $_POST['month'];
        $m = (int) $m;

        if ($m < 10) {
            $month = '0' . $m;
        } else {
            $month = $m;
        }

        $year = empty($_POST['year']) ? date("Y") : $_POST['year'];
        $index = empty($_POST['index']) ? 1 : $_POST['index'];
        $results = $this->Mengagement_detail->timesheet($month, $year, $index, $this->session->userdata('employeeId'));
        $data = array(
            'results' => $results,
        );
        $this->load->view('ajax/ajax_timesheet', $data);
    }

    public function ajax_timesheet_post() {
        $engagementId = (int) $_POST['engagementId'];
        $hour = $_POST['hour'];
        $description = $_POST['description'];

        if (empty($hour) || empty($description)) {
            $array = [
                'value' => '',
                'total' => '',
                'error' => 'Hour and Description can not be empty!'
            ];

            echo json_encode($array);
            exit(0);
        }
        $date = $_POST['date'];
        $employeeId = $this->session->userdata('employeeId');

        $rat = $this->Mengagement_detail->rate($engagementId, $employeeId);
        $rate = empty($rat->costrate) ? 0 : $rat->costrate;
        $sum = $this->Mtimesheet->sum($engagementId, $employeeId);
        $sum = empty($sum) ? 0 : $sum;

        $tData = $this->Mtimesheet->getData($engagementId, $employeeId, $date);
        $tHour = empty($tData->hour) ? 0 : $tData->hour;

        $budgetHour = $rat->budgetHour;

        $sumHour = $sum + $hour - $tHour;

        if ($sumHour > $budgetHour) {
            $array = [
                'value' => '',
                'total' => '',
                'error' => 'Budget Hour ' . $budgetHour . ' maximum reach!'
            ];

           // echo json_encode($array);
            //exit(0);
        }


        $amount = $hour * $rate;
        $data = [
            'engagementId' => $engagementId,
            'hour' => $hour,
            'description' => $description,
            'date' => $date,
            'employeeId' => $employeeId,
            'amount' => $amount
        ];
        $this->Mtimesheet->insert($data);
        //push to firebase
        $message = 'input ' . $hour . ' hour description : ' . $description . ' by ' . $this->session->userdata('username');
        $this->Mengagement_detail->pushToFirebase($engagementId, $message);


        $r = $this->Mtimesheet->total($date, $employeeId);
        $array = [
            'value' => $hour,
            'total' => $r->total,
            'error' => ''
        ];

        echo json_encode($array);
    }

}
