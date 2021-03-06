<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mentity extends CI_Model {

    public $table = 'entity';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    function dropdown($id = null) {
        $array = '';
        $results = $this->get_all();
        if ($results)
            foreach ($results as $result) {
            $selected = $id==$result->id?'selected':'';
                $array .= '<option value="' . $result->id . '" '.$selected.' >' . $result->company_name . '</optionn>';
            }

        return $array;
    }

    // get all
    function get_all() {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id) {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('company_name', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('fax', $q);
        $this->db->or_like('logo', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('company_name', $q);
        $this->db->or_like('address', $q);
        $this->db->or_like('phone', $q);
        $this->db->or_like('fax', $q);
        $this->db->or_like('logo', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data) {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id) {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Mentity.php */
/* Location: ./application/models/Mentity.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-03-16 23:38:07 */
/* http://harviacode.com */