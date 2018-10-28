<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mclient_contact extends CI_Model
{

    public $table = 'client_contact';
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
    
    function get_detail_data($id) {
        $this->db->select('a.*,b.clientName');
        $this->db->join('client b', 'a.clientId = b.id', 'left');
	$this->db->where("a.id", $id);
        return $this->db->get('client_contact a')->row();
    }
    
    function get_by_clientid($id)
    {
        $this->db->where('clientId', $id);
        return $this->db->get($this->table)->result();
    }
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('clientId', $q);
	$this->db->or_like('salutationId', $q);
	$this->db->or_like('contactName', $q);
	$this->db->or_like('position', $q);
	$this->db->or_like('handphone', $q);
	$this->db->or_like('emailAddress', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('clientId', $q);
	$this->db->or_like('salutationId', $q);
	$this->db->or_like('contactName', $q);
	$this->db->or_like('position', $q);
	$this->db->or_like('handphone', $q);
	$this->db->or_like('emailAddress', $q);
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
    
    function delete_by_client($id)
    {
        $this->db->where("clientId", $id);
        $this->db->delete($this->table);
    }
    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Mclient_contact.php */
/* Location: ./application/models/Mclient_contact.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-07-03 04:54:53 */
/* http://harviacode.com */