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
    
    public static function notification($id, $title, $message)
    {
        $firebase = new \Firebase\FirebaseLib(self::DEFAULT_URL, self::DEFAULT_TOKEN);
        $path = 'notification/' . $id;

        $array = [
            'id' => $id,
            'title' => $title,
            'message' => $message,
            'time' => time()
        ];

        $firebase->set($path, $array);

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
