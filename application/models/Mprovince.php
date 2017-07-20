<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mprovince extends CI_Model
{

    public $table = 'province';
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
         $this->db->select('a.*, b.countryName');
         $this->db->from('province a');
         $this->db->join('country b', 'a.countryCode = b.id');
         $this->db->where('a.id', $id);
        return $this->db->get($this->table)->row();
        
//        $this->db->where($this->id, $id);
//        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('provinceName', $q);
	$this->db->or_like('countryCode', $q);
	$this->db->or_like('provinceDeleted', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    function get_limit_data($limit, $start = 0, $q = NULL){
        $this->db->select('a.*, b.countryName')
         ->from('province a')
         ->join('country b', 'a.countryCode = b.id');
	$this->db->limit($limit, $start);
       // $result = $this->db->get();
        return $this->db->get($this->table)->result();
    }
    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('provinceName', $q);
	$this->db->or_like('countryCode', $q);
	$this->db->or_like('provinceDeleted', $q);
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

