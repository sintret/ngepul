<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mengagement_detail extends CI_Model {

    private $ci;
    public $table = 'engagementdetail';
    public $id = 'id';
    public $order = 'DESC';
    public $helper;

    function __construct() {
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->model('Mnotification');
        $this->ci->load->model('Mengagement');
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
    
   function get_mytask($limit, $start = 0, $q = NULL,$idEmployee, $userLevelId) {
       
       $this->db->select('a1.*,b.clientName,c1.firstName as partner, c2.firstName as manager,c3.firstName as senior');
        $this->db->from('engagementdetail a');
        $this->db->join('engagement a1', 'a.engagementId= a1.id', 'left');
        $this->db->join('client b', 'b.id = a1.clientId', 'left');
        $this->db->join('employee c1', 'c1.id = a1.partnerId', 'left');
        $this->db->join('employee c2', 'c2.id=a1.managerId', 'left');
        $this->db->join('employee c3', 'c3.id=a1.seniorId', 'left');
        
        $this->db->where('a.employeeId',$idEmployee);
        $this->db->where('a1.finishStatusId',0);
        $this->db->order_by('a1.engagementDate', 'DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
       
       // $this->db->where($this->id, $id);
       // return $this->db->get("engagementdetail")->row();
        
        
        
    }
    
    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function total_byuser($q = NULL) {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    function get_my_engagement($id) {
        $this->db->where('employeeId', $id);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    function insertNotification($data) {
        $this->db->insert('notification', $data);
    }

    function replaceAll($engagementId, $array = []) {

        $this->deleteAll($engagementId);
        $count = count($array['employeeId']);
        $data = [];

        if ($count) {
            for ($i = 0; $i < $count; $i++) {
                $data[] = [
                    'engagementId' => $engagementId,
                    'employeeId' => $array['employeeId'][$i],
                    'budgetHour' => self::cleanFormat($array['budgetHour'][$i]),
                    'billingRate' => self::cleanFormat($array['subTotal'][$i]),
                    'costrate' => self::cleanFormat($array['costRate'][$i])
                ];
            }
        }
        if ($data)
            foreach ($data as $v) {
                $this->insert($v);
                //push to firebase
                $user = $this->getUser($v['employeeId']);
                $engagement = $this->getEngagement($v['engagementId']);
                $urlNotif = base_url().'engagement/notify/'. $id;
                //print_r($engagement); exit(0);
                //echo 'employeeId '.$v['employeeId'].' engagementId '.$v['engagementId']; exit(0);
                $title = "Engagement News";
                $message = $engagement->name . ' description: ' . $engagement->description;
                //print_r($user); exit(0);
                //echo $user->id;exit(0);
                if ($user)
                    Mnotification::notification($user->id, $title, $message);
                // insert to notification sql
                $dataNotification = [
                    'userId' => $user->id,
                    'title' => $title,
                    'message' => $message,
                    'url' => $urlNotif,
                ];
                $this->insertNotification($dataNotification);
            }
    }

    function getUser($employeeId) {
        $query = $this->db->get_where('users', array('employeeId' => $employeeId));
        return $query->row();
    }

    function getEmployeeId($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    function getEngagement($engagementId) {
        $query = $this->db->get_where('engagement', array('id' => $engagementId));
        return $query->row();
    }

    function details($engagementId) {
        $query = $this->db->get_where($this->table, array('engagementId' => $engagementId));
        return $query->result();
    }

    function deleteAll($engagementId) {
        $this->db->delete($this->table, array('engagementId' => $engagementId));
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    static function cleanFormat($str) {
        $array = ['"', "'", ",", "."];
        return str_replace($array, "", $str);
    }

    function todolist($userId) {
        $user = $this->getEmployeeId($userId);
        $employeeId = $user->employeeId;

        if ($employeeId) {
            $this->db->select('a.*,b.name as name, b.startDate as startDate,b.endDate as endDate, (select clientName from client where id=b.clientId limit 1) as clientName, (select firstName from employee where id = b.seniorId limit 1) as senior,(select firstName from employee where id = b.partnerId limit 1) as partner,(select firstName from employee where id = b.managerId limit 1) as manager ');
            $this->db->from('engagementdetail a');
            $this->db->where('a.employeeId = "' . $user->employeeId . '"  and b.closing=0');
            $this->db->join('engagement b', 'b.id = a.engagementId', 'left');
            $this->db->order_by('b.endDate', 'DESC');

            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
    }

    function closed($userId) {
        $user = $this->getEmployeeId($userId);
        $employeeId = $user->employeeId;

        if ($employeeId) {
            $this->db->select('a.*,b.name as name, b.startDate as startDate,b.endDate as endDate, (select clientName from client where id=b.clientId limit 1) as clientName, (select firstName from employee where id = b.seniorId limit 1) as senior,(select firstName from employee where id = b.partnerId limit 1) as partner,(select firstName from employee where id = b.managerId limit 1) as manager ');
            $this->db->from('engagementdetail a');
            $this->db->where('a.employeeId = "' . $user->employeeId . '"  and b.closing=1');
            $this->db->join('engagement b', 'b.id = a.engagementId', 'left');
            $this->db->limit(20);
            $this->db->order_by('b.endDate', 'DESC');

            $query = $this->db->get();

            if ($query->num_rows() > 0) {
                return $query->result();
            }
        }
    }

    function timesheet($month, $year, $index, $employeeId) {
        $date = $year . '-' . $month . '-11';
        $t = date("t", strtotime($date));
        $array = [];
        $dates = [];

        if ($index == 1) {
            $time1 = 11;
            $time2 = 25;
            $startDate = $year . '-' . $month . '-11';
            $endDate = $year . '-' . $month . '-25';
            for ($i = 11; $i <= 25; $i++) {
                $array[] = $i;
                $dates[] = $year . '-' . $month . '-' . $i;
            }
        } else {
            $time1 = 26;
            $time2 = 10;
            $startDate = $year . '-' . $month . '-26';
            $endDateb = $year . '-' . $month . '-10';
            $endDate = date("Y-m-d", strtotime("+1 month", strtotime($endDateb)));
            $m = date("m", strtotime("+1 month", strtotime($endDateb)));
            for ($i = 26; $i <= $t; $i++) {
                $array[] = $i;
                $dates[] = $year . '-' . $month . '-' . $i;
            }
            for ($i = 1; $i <= 10; $i++) {
                $array[] = $i < 10 ? '0' . $i : $i;
                $dates[] = $year . '-' . $m . '-' . $i;
            }
        }
        $between1 = '( b.startDate BETWEEN "' . $startDate . '" AND "' . $endDate . '" AND a.`employeeId` = "' . $employeeId . '")';
        $between2 = '(b.endDate BETWEEN "' . $startDate . '" AND "' . $endDate . '" AND a.`employeeId` = "' . $employeeId . '")';
        $between3 = '(date BETWEEN "' . $startDate . '" AND "' . $endDate . '")';

        $sql = 'SELECT  DISTINCT b.id, b.startDate,b.endDate, a.budgetHour, b.name,b.description FROM engagementdetail a INNER JOIN engagement b WHERE ' . $between1 . ' OR ' . $between2 . ' group by b.id';
        //echo $sql;exit(0);
        $query = $this->db->query($sql);
        $result = $query->result();

        $ids = [];
        $totals = [];
        if ($result) {
            foreach ($result as $res) {
                $totals[$res->id] = 0;
                $sql = 'SELECT * FROM timesheet WHERE (`date` BETWEEN "' . $startDate . '" AND "' . $endDate . '" AND engagementId = "' . $res->id . '")';
                //echo $sql;exit(0);
                $qr = $this->db->query($sql);
                $rs = $qr->result();
                if ($rs) {
                    foreach ($rs as $r) {
                        $ids[$res->id][$r->date]['hour'] = $r->hour;
                        $ids[$res->id][$r->date]['description'] = $r->description;
                        $totals[$res->id] += $r->hour;
                    }
                } else {
                    $ids[$res->id] = NULL;
                }
            }
        }


        return [
            'results' => $result,
            'ids' => $ids,
            'time1' => $time1,
            'time2' => $time2,
            'ym' => $year . '-' . $month . '-',
            'array' => $array,
            'dates' => $dates,
            'totals' => $totals
        ];
    }

    function pushToFirebase($engagementId, $message) {
        $where = ['engagementId' => $engagementId];
        $this->db->where($where);
        $this->db->from($this->table);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $results = $query->result();
            if ($results)
                foreach ($results as $result) {
                    $title = 'Engagement - Timesheets News';
                    $user = $this->getUser($result->employeeId);

                    Mnotification::notification($user->id, $title, $message, 'http://128.199.241.0/new-pts');

                    $data = [
                        'userId' => $user->id,
                        'title' => $title,
                        'message' => $message,
                        'createdBy' => $this->session->userdata("id")
                    ];

                    $this->db->insert('notification', $data);
                }
        }
    }

    function rate($engagementId, $employeeId) {
        $r = null;
        $where = [
            'engagementId' => $engagementId,
            'employeeId' => $employeeId,
        ];

        $this->db->where($where);
        $this->db->from($this->table);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $r = $query->row();
        }

        return $r;
    }

}
