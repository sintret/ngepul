<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mleave extends CI_Model
{

    public $table = 'leave';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('a.*, b.company_name');
         $this->db->from('leave a');
         $this->db->join('entity b', 'a.entityId = b.id');
         $this->db->where('a.id', $id);
        return $this->db->get($this->table)->row();
        
//        $this->db->where($this->id, $id);
//        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
//        $this->db->like('id', $q);
//	$this->db->or_like('entityId', $q);
//	$this->db->or_like('leaveCode', $q);
//	$this->db->or_like('leaveName', $q);
//	$this->db->or_like('leaveChargesType', $q);
//	$this->db->or_like('leaveDeleted', $q);
	$this->db->from($this->table);
        $this->db->where('leaveDeleted', 0);
        return $this->db->count_all_results();
    }
    
     function get_limit_data($limit, $start = 0, $q = NULL) {
	$this->db->select('a.*,b.company_name');
        $this->db->join('entity b', 'a.entityId = b.id');
        $this->db->order_by('updateDate', 'DESC');
	$this->db->limit($limit, $start);
        return $this->db->get("leave a")->result();
    }
    
        function get_limit_data2($limit, $start = 0, $q = NULL) {
         $this->db->select('a.*, b.company_name')
         ->from('leave a')
         ->join('entity b', 'a.entityId = b.id')
         ->where('a.leaveDeleted', 0)
         ->order_by('a.id', 'DESC');
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    // get data with limit and search
    function get_limit_data9($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('entityId', $q);
	$this->db->or_like('leaveCode', $q);
	$this->db->or_like('leaveName', $q);
	$this->db->or_like('leaveChargesType', $q);
	$this->db->or_like('leaveDeleted', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

