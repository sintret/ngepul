<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mclient extends CI_Model
{

    public $table = 'client';
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
    
    function get_all_listed()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get('listed')->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    public function getDropDown()
    {
         $this->db->select('id,clientName');
            $this->db->from('client');      
             $this->db->where("clientDeleted", 0);            
            $this->db->order_by('clientName','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    // get total rows
    function total_rows($q = NULL) {
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    
    
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('a.*,b.company_name');
        $this->db->join('entity b', 'a.entityId = b.id', 'left');
        $this->db->order_by('a.updateDate', 'DESC');        
	$this->db->limit($limit, $start);
        return $this->db->get('client a')->result();
    }
    
    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    function getData($limit, $start = 0, $q = NULL) {
       // $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->limit($limit, $start);
        
        $this->db->select('*');
            $this->db->from('client'); 
            $this->db->order_by('clientName','ASC'); 
            $this->db->where('clientDeleted', '0');

            
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
    public function add_import($data_user){
       
        $this->db->insert($this->table, $data_user);
        
   }

}
