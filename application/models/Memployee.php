<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Memployee extends CI_Model
{

    public $table = 'employee';
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
        $this->db->where('deleted',0);
        return $this->db->get($this->table)->result();
    }
    
     function get_dropdown()
    {
         $this->db->select('id, firstName, lastName, costRate, (select positionName from position where position.Id = employee.positionId limit 1) as positionName, (select userlevelId from users where employeeId = employee.id limit 1) as userlevelId');
            $this->db->from('employee');           
            $this->db->where('deleted',0);
            $this->db->order_by('firstName','ASC'); 
            $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
       // return $this->db->get($this->table)->result();
    }
    
     function get_dropdown2()
    {
         $this->db->select('id, firstName, lastName, costRate, (select userlevelId from users where employeeId = employee.id limit 1) as userlevelId');
            $this->db->from('employee');           
            $this->db->where('deleted',0);
            $this->db->order_by('firstName','ASC'); 
            $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
       // return $this->db->get($this->table)->result();
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
	
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    
    function getData($limit, $start = 0, $q = NULL) {
       // $this->db->order_by($this->id, $this->order);
        //$this->db->like('id', $q);
	$this->db->limit($limit, $start);
        

         $this->db->select('a.*,b.employeeStatus,b.employeeStatusColors,c.positionName');
            $this->db->from('employee a'); 
            $this->db->join('employee_status b', 'b.id = a.employeeStatusId', 'left');
            $this->db->join('position c', 'c.id = a.positionId', 'left');
            //$this->db->join('employee c2', 'c2.id=a.managerId', 'left');             
            $this->db->order_by('a.updateDate','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    
    public function dropdown_level($level)
    {
        //$level = 4;
         $this->db->select('a.*,b.positionName,b.positionGroup,c.groupName');
            $this->db->from('employee a');      
            $this->db->join('position b', 'a.positionId = b.id', 'left');
            $this->db->join('position_group c', 'b.positionGroup = c.id', 'left');
            $this->db->where("b.positionGroup", $level);     
           // $this->db->where("a.active", 1);            
            $this->db->group_by('a.id'); 
            $this->db->order_by('a.firstName','DESC');   
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    
    public function dropdown_partner()
    {
         $this->db->select('a.username,a.userlevelId,CONCAT(b.firstName,b.lastName) as fullname, b.costRate');
            $this->db->from('users a');      
            $this->db->join('employee b', 'a.employeeId = b.id', 'left');
            $this->db->where("a.userlevelId", 3);     
            $this->db->where("a.active", 1);            
            $this->db->order_by('username','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    
     public function dropdown_manager()
    {
         $this->db->select('a.username,a.userlevelId,CONCAT(b.firstName,b.lastName) as fullname, b.costRate');
            $this->db->from('users a');      
            $this->db->join('employee b', 'a.employeeId = b.id', 'left');
            $this->db->where("a.userlevelId", 4);     
            $this->db->where("a.active", 1);            
            $this->db->order_by('username','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    
     public function dropdown_hrd()
    {
         $this->db->select('a.username,a.userlevelId,CONCAT(b.firstName,b.lastName) as fullname, b.costRate');
            $this->db->from('users a');      
            $this->db->join('employee b', 'a.employeeId = b.id', 'left');
            $this->db->where("a.userlevelId", 5);     
            $this->db->where("a.active", 1);            
            $this->db->order_by('username','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    public function dropdown_staff()
    {
         $this->db->select('a.username,a.userlevelId,CONCAT(b.firstName,b.lastName) as fullname, b.costRate');
            $this->db->from('users a');      
            $this->db->join('employee b', 'a.employeeId = b.id', 'left');
            $this->db->where("a.userlevelId", 6);     
            $this->db->where("a.active", 1);            
            $this->db->order_by('username','DESC'); 
            
        $query = $this->db->get();
        if ($query->num_rows() > 0) 
            {
                 return $query->result();
            }
    }
    
    public function getDropDown()
    {
         $this->db->select('id,firstname,lastname');
            $this->db->from('employee');      
             $this->db->where("deleted", 0);            
            $this->db->order_by('firstName','DESC'); 
            
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

/* End of file Memployee.php */
/* Location: ./application/models/Memployee.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-21 20:29:03 */
/* http://harviacode.com */