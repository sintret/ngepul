<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mnotification extends CI_Model {

    const DEFAULT_URL = 'https://ptsonline-213b4.firebaseio.com';
    const DEFAULT_TOKEN = NULL;

    public $table = 'notification';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }
    
    public static function notification($id, $title, $message,$url=NULL)
    {
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $path = 'notification/' . $id;

        $array = [
            'id' => $id,
            'title' => $title,
            'message' => $message,
            'url' => $url,
            'time' => time()
        ];

        $firebase->push($path, $array);

        self::notificationDelete($id);
    }
        
    public static function notification2($id, $title, $message)
    {
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $path = 'notification/' . $id;

        $array = [
            'id' => $id,
            'title' => $title,
            'message' => $message,
            'time' => time()
        ];

        $firebase->push($path, $array);

        self::notificationDelete($id);
    }
    
    public static function notificationDelete($id)
    {
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $path = 'notification/' . $id;
        $firebase->delete($path);
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
     function get_by_user($id) {
        $this->db->where($this->id, $id);
        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->get($this->table)->row();
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
        $this->db->update($this->table);
    }
    
    function mark_read($id, $data) {
       $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('userId', $q);
	$this->db->or_like('title', $q);
	$this->db->or_like('message', $q);
	$this->db->or_like('url', $q);
	$this->db->or_like('read', $q);
	$this->db->or_like('createdBy', $q);
	$this->db->or_like('updatedAt', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }
    function total_rows_by($q = NULL) {
	$this->db->from($this->table);
        $this->db->where('userId', $this->session->userdata('id'));
        return $this->db->count_all_results();
    }
    function get_limit_data($limit, $start = 0, $q = NULL) {
       // $this->db->order_by($this->id, $this->order);
         $this->db->order_by('updatedAt', $this->order);
        $this->db->where('userId', $this->session->userdata('id'));
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

}
