<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mreimbursement extends CI_Model
{

    public $table = 'reimbursement';
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
	$this->db->or_like('engagementId', $q);
	$this->db->or_like('periodDate', $q);
	$this->db->or_like('approvalId', $q);
	$this->db->or_like('expenseId', $q);
	$this->db->or_like('expenseAmount', $q);
	$this->db->or_like('expenseDate', $q);
	$this->db->or_like('expenseDesc', $q);
	$this->db->or_like('approvalStatusId', $q);
	$this->db->or_like('approvalBy', $q);
	$this->db->or_like('approvalDate', $q);
	$this->db->or_like('approvalDesc', $q);
	$this->db->or_like('userCreate', $q);
	$this->db->or_like('createDate', $q);
	$this->db->or_like('userUpdate', $q);
	$this->db->or_like('updateDate', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data2($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
	    $this->db->limit($limit, $start);
        
        return $this->db->get($this->table)->result();
    }
    
    function get_limit_data($limit, $start = 0, $q = NULL) {
	$this->db->select('a.*,b.name as engagementName, c.expenseName, CONCAT(d.firstName," ",d.lastName) as fullname');
        $this->db->join('engagement b', 'a.engagementId = b.id');
        $this->db->join('expense c', 'a.expenseId = c.id');
        $this->db->join('employee d', 'a.approvalId = d.id');
        $this->db->order_by('updateDate', 'DESC');
	$this->db->limit($limit, $start);
        return $this->db->get("reimbursement a")->result();
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

/* End of file Mreimbursement.php */
/* Location: ./application/models/Mreimbursement.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-25 19:59:59 */
/* http://harviacode.com */