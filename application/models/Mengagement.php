<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mengagement extends CI_Model {

    public $table = 'engagement';
    public $id = 'id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
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
        $this->db->or_like('entityId', $q);
        $this->db->or_like('code', $q);
        $this->db->or_like('engagementDate', $q);
        $this->db->or_like('clientId', $q);
        $this->db->or_like('serviceTitleId', $q);
        $this->db->or_like('yearService', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('partnerId', $q);
        $this->db->or_like('managerId', $q);
        $this->db->or_like('seniorId', $q);
        $this->db->or_like('complexity', $q);
        $this->db->or_like('risk', $q);
        $this->db->or_like('agreedFees', $q);
        $this->db->or_like('agreedExpenses', $q);
        $this->db->or_like('estimatedCost', $q);
        $this->db->or_like('signingPartnerId', $q);
        $this->db->or_like('engagementPartnerId', $q);
        $this->db->or_like('asset', $q);
        $this->db->or_like('rl', $q);
        $this->db->or_like('reportNo', $q);
        $this->db->or_like('reportDate', $q);
        $this->db->or_like('opinion', $q);
        $this->db->or_like('jobFromEmployeeId', $q);
        $this->db->or_like('finishStatusId', $q);
        $this->db->or_like('finishDate', $q);
        $this->db->or_like('finishApproveBy', $q);
        $this->db->or_like('closing', $q);
        $this->db->or_like('closingDate', $q);
        $this->db->or_like('deleted', $q);
        $this->db->or_like('inputby', $q);
        $this->db->or_like('version', $q);
        $this->db->or_like('userCreate', $q);
        $this->db->or_like('createDate', $q);
        $this->db->or_like('userUpdate', $q);
        $this->db->or_like('updateDate', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('entityId', $q);
        $this->db->or_like('code', $q);
        $this->db->or_like('engagementDate', $q);
        $this->db->or_like('clientId', $q);
        $this->db->or_like('serviceTitleId', $q);
        $this->db->or_like('yearService', $q);
        $this->db->or_like('description', $q);
        $this->db->or_like('partnerId', $q);
        $this->db->or_like('managerId', $q);
        $this->db->or_like('seniorId', $q);
        $this->db->or_like('complexity', $q);
        $this->db->or_like('risk', $q);
        $this->db->or_like('agreedFees', $q);
        $this->db->or_like('agreedExpenses', $q);
        $this->db->or_like('estimatedCost', $q);
        $this->db->or_like('signingPartnerId', $q);
        $this->db->or_like('engagementPartnerId', $q);
        $this->db->or_like('asset', $q);
        $this->db->or_like('rl', $q);
        $this->db->or_like('reportNo', $q);
        $this->db->or_like('reportDate', $q);
        $this->db->or_like('opinion', $q);
        $this->db->or_like('jobFromEmployeeId', $q);
        $this->db->or_like('finishStatusId', $q);
        $this->db->or_like('finishDate', $q);
        $this->db->or_like('finishApproveBy', $q);
        $this->db->or_like('closing', $q);
        $this->db->or_like('closingDate', $q);
        $this->db->or_like('deleted', $q);
        $this->db->or_like('inputby', $q);
        $this->db->or_like('version', $q);
        $this->db->or_like('userCreate', $q);
        $this->db->or_like('createDate', $q);
        $this->db->or_like('userUpdate', $q);
        $this->db->or_like('updateDate', $q);
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

        $this->db->select('a.*,b.clientName,c1.firstName as partner, c2.firstName as manager,c3.firstName as senior');
        $this->db->from('engagement a');
        $this->db->join('client b', 'b.id = a.clientId', 'left');
        $this->db->join('employee c1', 'c1.id = a.partnerId', 'left');
        $this->db->join('employee c2', 'c2.id=a.managerId', 'left');
        $this->db->join('employee c3', 'c3.id=a.seniorId', 'left');
        //$this->db->where('c.album_id',$id);
        $this->db->order_by('a.engagementDate', 'DESC');

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        }
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

    function report($startDate, $endDate) {
        $between1 = '( a.startDate BETWEEN "' . $startDate . '" AND "' . $endDate . '")';
        $between2 = '(a.endDate BETWEEN "' . $startDate . '" AND "' . $endDate . '")';

        $sql = 'SELECT  DISTINCT a.*, b.serviceTitleName as serviceTitle, c.serviceName, '
                . '(select sum(budgetHour) from engagementdetail where engagementId=a.id ) as budgetHour, '
                . '(select sum(expenseAmount) from reimbursement where engagementId=a.id and expenseDate BETWEEN "' . $startDate . '" AND "' . $endDate . '") as current, '
                . '(select clientName from client where id=a.clientId limit 1) as clientName, '
                . '(select firstName from employee where id=partnerId limit 1) as partnerName, '
                . '(select firstName from employee where id=seniorId limit 1) as seniorName, '
                . '(select firstName from employee where id=managerId limit 1) as managerName '
                . ' FROM engagement a '
                . 'LEFT JOIN servicetitle b ON a.serviceTitleId = b.id  '
                . 'LEFT JOIN service c ON c.id=b.serviceId  '
                . 'WHERE ' . $between1 . ' OR ' . $between2;

        //echo $sql;exit(0);
        $query = $this->db->query($sql);
        return $query->result();
    }

}
