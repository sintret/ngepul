<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtimesheet extends CI_Model {

    public $table = 'timesheet';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function checkIn($date, $engagementId, $employeeId) {
        $where = [
            'date' => $date,
            'engagementId' => $engagementId,
            'employeeId' => $employeeId
        ];
        $this->db->where($where);
        return $this->db->get($this->table)->row();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
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

}
