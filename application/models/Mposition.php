<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mposition extends CI_Model
{

    public $table = 'position';
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
        $this->db->where('positionDeleted', 0);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('a.*, b.company_name,c.groupName');
        $this->db->from('position a');
        $this->db->join('entity b', 'a.entityId = b.id');
        $this->db->join('position_group c', 'a.positionGroup = c.id');
        $this->db->where('a.id', $id);
        return $this->db->get($this->table)->row();
//        $this->db->where($this->id, $id);
//        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        
	$this->db->from($this->table);        
        $this->db->where('positionDeleted',0);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('a.*,b.groupName');
        $this->db->order_by("a.id", "DESC");        
        $this->db->join('position_group b', 'a.positionGroup = b.id');
	$this->db->limit($limit, $start);
        $this->db->where('a.positionDeleted', 0);
	$this->db->order_by('a.updateDate', 'DESC');
        $query = $this->db->get("position a");
        return $query->result();
        
    }
    
    function allresidential($num, $offset){        
        $this->db->select('a.*,b.rate');
        $this->db->order_by("a.residentialName", "ASC");        
        $this->db->join('rate b', 'a.rateId = b.id');
        $query = $this->db->get("residential a",$num, $offset);
        return $query->result();
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
          $data = array(
                'positionDeleted' => 1
            );
         $this->db->update($this->table, $data);
        //$this->db->delete($this->table);
    }

}

/* End of file Mposition.php */
/* Location: ./application/models/Mposition.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-01-25 21:17:35 */
/* http://harviacode.com */