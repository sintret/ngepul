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

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
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
                //print_r($engagement); exit(0);
                //echo 'employeeId '.$v['employeeId'].' engagementId '.$v['engagementId']; exit(0);
                $title = "Engagement News";
                $message = $engagement->name.' description: '.$engagement->description;
                //print_r($user); exit(0);
                //echo $user->id;exit(0);
                if ($user)
                    Mnotification::notification($user->id, $title, $message);
                // insert to notification sql
                $dataNotification = [
                    'userId' => $user->id,
                    'title' => $title,
                    'message' => $message,
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
            $this->db->select('a.*, (select clientName from client where id=b.clientId) as clientName, (select firstName from employee where id = b.seniorId) as senior,(select firstName from employee where id = b.partnerId) as partner,(select firstName from employee where id = b.managerId) as manager ');
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
            $this->db->select('a.*, (select clientName from client where id=b.clientId) as clientName, (select firstName from employee where id = b.seniorId) as senior,(select firstName from employee where id = b.partnerId) as partner,(select firstName from employee where id = b.managerId) as manager ');
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

}
