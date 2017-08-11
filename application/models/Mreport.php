<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mreport extends CI_Model
{

    public $table = 'sector';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
    
    function get_employee_by($id)
    {
        $this->db->select('CONCAT(firstName,"",lastName)as fullName');
        $this->db->where('id', $id);
        return $this->db->get('employee')->row();
        //return $this->db->get('sector a')->row();
    }
    
     function get_reimburse($startDate, $endDate)
    {
        $this->db->select('a.*,b.name as engagementName, b.code, CONCAT(c.firstName," ",c.lastName)as fullName,d.expenseName');
        $this->db->join('engagement b', 'a.engagementId = b.id', 'left');
        $this->db->join('employee c', 'a.employeeId = c.id', 'left');
        $this->db->join('expense d', 'a.expenseId = d.id', 'left');
        $this->db->where('a.expenseDate >=', $startDate);
        $this->db->where('a.expenseDate <=', $endDate);
        return $this->db->get('reimbursement a')->result();
        //return $this->db->get('sector a')->row();
    }
    
       function get_noncahargeable($startDate, $endDate)
    {
        $this->db->select('a.*,CONCAT(d.firstName," ",d.lastName) as fullname, e.leaveCode,e.leaveName');
        $this->db->join('employee d', 'a.employeeId = d.id');
        $this->db->join('leave e', 'a.leaveId = e.id');
         $this->db->where('a.date >=', $startDate);
        $this->db->where('a.date <=', $endDate);
        $this->db->order_by('updateDate', 'DESC');
	   return $this->db->get("non_chargeable a")->result();
        //return $this->db->get('sector a')->row();
    }

    // get data by id
    function get_reimburse2($id)
    {
        $this->db->select('a.*,b.industryName');
        $this->db->join('industry b', 'a.industryId = b.id', 'left');
        $this->db->where('a.id', $id);
        return $this->db->get('sector a')->row();
    }
    

}
