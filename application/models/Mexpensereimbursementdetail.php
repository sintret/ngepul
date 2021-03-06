<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mexpensereimbursementdetail extends CI_Model
{

    public $table = 'expensereimbursementdetail';
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
	$this->db->or_like('entityId', $q);
	$this->db->or_like('expenseId', $q);
	$this->db->or_like('engagementId', $q);
	$this->db->or_like('employeeId', $q);
	$this->db->or_like('periodeDate', $q);
	$this->db->or_like('expenseDate', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('approvalBy', $q);
	$this->db->or_like('approvalStatus', $q);
	$this->db->or_like('billed', $q);
	$this->db->or_like('billedDate', $q);
	$this->db->or_like('userCreate', $q);
	$this->db->or_like('createDate', $q);
	$this->db->or_like('userUpdate', $q);
	$this->db->or_like('updateDate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('entityId', $q);
	$this->db->or_like('expenseId', $q);
	$this->db->or_like('engagementId', $q);
	$this->db->or_like('employeeId', $q);
	$this->db->or_like('periodeDate', $q);
	$this->db->or_like('expenseDate', $q);
	$this->db->or_like('amount', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('approvalBy', $q);
	$this->db->or_like('approvalStatus', $q);
	$this->db->or_like('billed', $q);
	$this->db->or_like('billedDate', $q);
	$this->db->or_like('userCreate', $q);
	$this->db->or_like('createDate', $q);
	$this->db->or_like('userUpdate', $q);
	$this->db->or_like('updateDate', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    
    function getData($limit, $start = 0, $q = NULL) {
        //$this->db->order_by($this->id, $this->order);
	$this->db->limit($limit, $start);
        
        //$query = $this->db->get($this->table);
//        $this->db->select('*');
//        $this->db->from('engagement');
//        $this->db->join('client', 'client.id = engagement.clientId');
        
        $this->db->select('a.*,b.code,c1.expenseName,c2.firstName,c2.lastName');
            $this->db->from('expensereimbursementdetail a'); 
            $this->db->join('engagement b', 'b.id = a.engagementId', 'left');
            $this->db->join('expense c1', 'c1.id = a.expenseId', 'left');
            $this->db->join('employee c2', 'c2.id=a.employeeId', 'left');
            //$this->db->join('employee c3', 'c3.id=a.seniorId', 'left');
            //$this->db->where('c.album_id',$id);
            $this->db->order_by('a.expenseDate','DESC'); 
        
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

/* End of file Mexpensereimbursementdetail.php */
/* Location: ./application/models/Mexpensereimbursementdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-03 18:13:24 */
/* http://harviacode.com */