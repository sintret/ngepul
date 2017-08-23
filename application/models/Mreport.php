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
   
    function get_employee_timesheet($id, $startDate, $endDate) {
        $this->db->select('a.*,b.name as engagementName, CONCAT(d.firstName," ",d.lastName) as fullname');
        $this->db->join('engagement b', 'a.engagementId = b.id');
        $this->db->join('employee d', 'a.employeeId = d.id');
        $this->db->order_by('updateDate', 'DESC');
        $this->db->where('a.employeeId', $id);
         $this->db->where('a.date >=', $startDate);
        $this->db->where('a.date <=', $endDate);
        $this->db->order_by('a.date', 'DESC');

        return $this->db->get("timesheet a")->result();
    }
    
    function get_employee_reimbursement($id, $startDate, $endDate) {
	$this->db->select('a.*,b.name as engagementName, c.expenseName, CONCAT(d.firstName," ",d.lastName) as fullname, CONCAT(e.firstName," ",e.lastName) fromName');
        $this->db->join('engagement b', 'a.engagementId = b.id');
        $this->db->join('expense c', 'a.expenseId = c.id');
        $this->db->join('employee d', 'a.approvalId = d.id');
        $this->db->join('employee e', 'a.employeeId = e.id');
        $this->db->where('a.employeeId', $id);
         $this->db->where('a.expenseDate >=', $startDate);
        $this->db->where('a.expenseDate <=', $endDate);
        $this->db->order_by('updateDate', 'DESC');
        return $this->db->get("reimbursement a")->result();
    }
    
     function get_employee_non_charge($id, $startDate, $endDate) {
          $this->db->select('a.*,CONCAT(b.firstName," ",b.lastName) as fullname, c.leaveCode,c.leaveName');          
            $this->db->join('employee b', 'a.employeeId = b.id');     
            $this->db->join('leave c', 'a.leaveId = c.id');
            $this->db->where('a.employeeId', $id);
            $this->db->where('a.date >=', $startDate);
            $this->db->where('a.date <=', $endDate);
            $this->db->order_by('a.updateDate', 'DESC');
        return $this->db->get("non_chargeable a")->result();
    }

    

}
