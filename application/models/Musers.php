<?php
class musers extends CI_Model {

    var $tabel = 'users'; //variabel tabel

    function __construct() {
        parent::__construct();
    }
    
    public function cek($username,$password){
        $this->db->where("username",$username);
        //$this->db->where("email",$username);
        $this->db->where("password",$password);
		$query = $this->db->get($this->tabel);
		if($query->num_rows()>0)
		{			
			return $query->result_array();
		}
    }
    
    public function semua(){
        return $this->db->get("users");
    }
    
    public function cekKode($kode){
        $this->db->where("user",$kode);
        return $this->db->get("users");
    }
    
    public function cekId($kode){
        $this->db->where("id",$kode);
        return $this->db->get("users");
    }
    
    public function update($id,$info){
        $this->db->where("id",$id);
        $this->db->update("users",$info);
    }
    
    public function simpan($info){
        $this->db->insert("users",$info);
    }
    
    public function hapus($kode){
        $this->db->where("id",$kode);
        $this->db->delete("users");
    }
}
?>