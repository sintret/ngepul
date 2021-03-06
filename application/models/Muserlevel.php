<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Muserlevel extends CI_Model
{

    public $table = 'userlevel';
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
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('userlevel_name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('deleted', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    
    public function cek($username,$password){
        $this->db->where("email",$username);
        //$this->db->where("email",$username);
        $this->db->where("password",$password);
		$query = $this->db->get($this->tabel);
		if($query->num_rows()>0)
		{			
			return $query->result_array();
		}
    }
    
    
    
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('userlevel_name', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('deleted', $q);
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

/* End of file Muserlevel.php */
/* Location: ./application/models/Muserlevel.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-06-19 20:52:46 */
/* http://harviacode.com */