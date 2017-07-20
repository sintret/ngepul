<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mtimereportdetail extends CI_Model
{

    public $table = 'timereportdetail';
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
	$this->db->or_like('Code', $q);
	$this->db->or_like('employeeId', $q);
	$this->db->or_like('periodeDate', $q);
	$this->db->or_like('engagementId', $q);
	$this->db->or_like('approvalBy', $q);
	$this->db->or_like('approvalStatus', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('dateWork1', $q);
	$this->db->or_like('dateWork2', $q);
	$this->db->or_like('dateWork3', $q);
	$this->db->or_like('dateWork4', $q);
	$this->db->or_like('dateWork5', $q);
	$this->db->or_like('dateWork6', $q);
	$this->db->or_like('dateWork7', $q);
	$this->db->or_like('dateWork8', $q);
	$this->db->or_like('dateWork9', $q);
	$this->db->or_like('dateWork10', $q);
	$this->db->or_like('dateWork11', $q);
	$this->db->or_like('dateWork12', $q);
	$this->db->or_like('dateWork13', $q);
	$this->db->or_like('dateWork14', $q);
	$this->db->or_like('dateWork15', $q);
	$this->db->or_like('dateWork16', $q);
	$this->db->or_like('dateWork17', $q);
	$this->db->or_like('dateWork18', $q);
	$this->db->or_like('dateWork19', $q);
	$this->db->or_like('dateWork20', $q);
	$this->db->or_like('dateWork21', $q);
	$this->db->or_like('DateWork22', $q);
	$this->db->or_like('dateWork23', $q);
	$this->db->or_like('dateWork24', $q);
	$this->db->or_like('dateWork25', $q);
	$this->db->or_like('dateWork26', $q);
	$this->db->or_like('dateWork27', $q);
	$this->db->or_like('dateWork28', $q);
	$this->db->or_like('dateWork29', $q);
	$this->db->or_like('dateWork30', $q);
	$this->db->or_like('dateWork31', $q);
	$this->db->or_like('version', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('entityId', $q);
	$this->db->or_like('Code', $q);
	$this->db->or_like('employeeId', $q);
	$this->db->or_like('periodeDate', $q);
	$this->db->or_like('engagementId', $q);
	$this->db->or_like('approvalBy', $q);
	$this->db->or_like('approvalStatus', $q);
	$this->db->or_like('description', $q);
	$this->db->or_like('dateWork1', $q);
	$this->db->or_like('dateWork2', $q);
	$this->db->or_like('dateWork3', $q);
	$this->db->or_like('dateWork4', $q);
	$this->db->or_like('dateWork5', $q);
	$this->db->or_like('dateWork6', $q);
	$this->db->or_like('dateWork7', $q);
	$this->db->or_like('dateWork8', $q);
	$this->db->or_like('dateWork9', $q);
	$this->db->or_like('dateWork10', $q);
	$this->db->or_like('dateWork11', $q);
	$this->db->or_like('dateWork12', $q);
	$this->db->or_like('dateWork13', $q);
	$this->db->or_like('dateWork14', $q);
	$this->db->or_like('dateWork15', $q);
	$this->db->or_like('dateWork16', $q);
	$this->db->or_like('dateWork17', $q);
	$this->db->or_like('dateWork18', $q);
	$this->db->or_like('dateWork19', $q);
	$this->db->or_like('dateWork20', $q);
	$this->db->or_like('dateWork21', $q);
	$this->db->or_like('DateWork22', $q);
	$this->db->or_like('dateWork23', $q);
	$this->db->or_like('dateWork24', $q);
	$this->db->or_like('dateWork25', $q);
	$this->db->or_like('dateWork26', $q);
	$this->db->or_like('dateWork27', $q);
	$this->db->or_like('dateWork28', $q);
	$this->db->or_like('dateWork29', $q);
	$this->db->or_like('dateWork30', $q);
	$this->db->or_like('dateWork31', $q);
	$this->db->or_like('version', $q);
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
        
        $this->db->select('a.*,b.firstName,b.lastName,c.code as engagementCode');
            $this->db->from('timereportdetail a'); 
            $this->db->join('employee b', 'b.id = a.employeeId', 'left');
            $this->db->join('engagement c', 'c.id=a.engagementId', 'left');
            //$this->db->join('employee d1', 'd1.id=a.seniorId', 'left');
            //$this->db->where('c.album_id',$id);
            $this->db->order_by('a.periodeDate','DESC'); 
        
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

/* End of file Mtimereportdetail.php */
/* Location: ./application/models/Mtimereportdetail.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-01-03 18:09:24 */
/* http://harviacode.com */