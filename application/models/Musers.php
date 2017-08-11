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
    
   public function get_byemployee($employeeId){
        $this->db->where('employeeId',$employeeId);
        $query = $this->db->get("users");
       // return 
        return $query->row();
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
    function getUser($employeeId) {
        $query = $this->db->get_where('users', array('employeeId' => $employeeId));
        return $query->row();
    }
    public function hapus($kode){
        $this->db->where("id",$kode);
        $this->db->delete("users");
    }
    public function cek_old_password($oldPassword, $id){
        $old = md5($oldPassword);    
        $this->db->where('id',$id);
        $this->db->where('password',$old);
        $query = $this->db->get('users');
        $res = $query->result();
        if($res){
            return 1;
        }else{
            //$this->form_validation->set_message('passwordCheck', 'Invalid current password, please try again');
            return 0;
        }
     // return $query->result();
    }
    
     function update_password($data,$userId){
       $this->db->where('id', $userId);
       $this->db->update("users", $data);   
       $lastInsert_id = $this->db->insert_id();
       //return TRUE;
       //return $lastInsert_id;
    }
}
?>