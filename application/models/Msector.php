<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Msector extends CI_Model
{

    public $table = 'sector';
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
        $this->db->select('a.*,b.industryName');
        $this->db->join('industry b', 'a.industryId = b.id', 'left');
        $this->db->where('a.id', $id);
        return $this->db->get('sector a')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('industryId', $q);
	$this->db->or_like('sectorName', $q);
	$this->db->or_like('sectorDescription', $q);
	$this->db->or_like('updateDate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
//        $this->db->order_by($this->id, $this->order);
//	$this->db->limit($limit, $start);
//        return $this->db->get($this->table)->result();
        
         $this->db->select('a.*,b.industryName,');
            $this->db->from('sector a'); 
            $this->db->join('industry b', 'a.industryId = b.id', 'left');
           // $this->db->join('position c', 'c.id = a.positionId', 'left');
            //$this->db->join('employee c2', 'c2.id=a.managerId', 'left');             
            $this->db->order_by('a.updateDate','DESC'); 
            $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
        
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
