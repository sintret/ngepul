<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdepartment extends CI_Model
{

    public $table = 'department';
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
	$this->db->where('deleted', 0);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
	$this->db->where('deleted', 0);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        
	$this->db->where('deleted', 0);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);       
	$this->db->where('deleted', 0);
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
       // $this->db->where($this->id, $id);
       // $this->db->delete($this->table);
        $this->db->where($this->id, $id);
          $data = array(
                'deleted' => 1
            );
         $this->db->update($this->table, $data);
        //$this->db->delete($this->table);
    }

}

/* End of file Mdepartment.php */
/* Location: ./application/models/Mdepartment.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-26 04:12:23 */
/* http://harviacode.com */