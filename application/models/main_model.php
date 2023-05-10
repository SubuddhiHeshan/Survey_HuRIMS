<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/6/2022
 * Time: 1:16 PM
 */

class main_model extends CI_Model
{

    //Creating variables for tabel
    private $tbusr = 'system_user';
    private $tbjobh = 'job_history';
    private $tbbr = 'branch';

    //SQL query for authenticate user credentials
    public function getLogUsrData($username, $password)
    {
        $ectPwd = md5($password);

        //select system_user . id,system_user . user_name,system_user . employee_id1,system_user . name,system_user . service_id,system_user . user_role_id,system_user.userStatus,system_user.lockStatus,
        //job_history . branch_id,
        //branch.name
        //from system_user
        //join job_history on system_user . employee_id1 = job_history . employee_id
        //join branch on job_history.branch_id = branch.id
        //where system_user . user_name = 12361 and system_user . pass_word = md5('123')
        //group by job_history . tranfer_date
        //order by job_history . tranfer_date desc limit 1;

        $this->db->select('system_user.id,system_user.user_name,system_user.employee_id1,system_user.name,system_user.service_id,system_user.user_role_id,system_user.userStatus,system_user.lockStatus,
        job_history.branch_id,branch.name as brname');
        $this->db->from($this->tbusr);
        $this->db->where(array('user_name' => $username, 'pass_word' => $ectPwd));
        $this->db->join($this->tbjobh, $this->tbusr . '.employee_id1' . '=' . $this->tbjobh . '.employee_id', 'inner');
        $this->db->join($this->tbbr, $this->tbjobh . '.branch_id' . '=' . $this->tbbr . '.id', 'inner');
        $this->db->order_by($this->tbjobh . '.tranfer_date', 'DESC');
        $this->db->limit('1');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->row();

        //Check Data exsist if return data object
        return ($query->num_rows() == 1) ? $result : false;


    }

    //Query for hit loged user logs
    public function setLogDetails($user, $systemUId, $logDate, $action, $priority)
    {

        $values = array('user' => $user, 'date_time' => $logDate, 'system_user_id' => $systemUId, 'user_action' => $action, 'level' => $priority);

        $this->db->insert('log_details', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }

    public function setnewUSerLogin($userName, $newPwd, $newEmpNo, $lname, $serviceType, $userRole, $assgOfz, $userStatus, $lockStatus, $createDate, $createby)
    {
        $values = array('user_name' => $userName, 'pass_word' => $newPwd, 'employee_id1' => $newEmpNo, 'name' => $lname, 'service_id' => $serviceType, 'user_role_id' => $userRole,
            'province_id' => $assgOfz, 'userStatus' => $userStatus, 'lockStatus' => $lockStatus, 'createDate' => $createDate, 'createBy' => $createby);

        $this->db->insert('system_user', $values);

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function getOfficerHeaderData($SerType)
    {
        $this->db->select('jr.jobId,jr.employee_id,jr.reqDate,e.middlename,e.lastname');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->where(array('jr.assignRole' => $SerType, 'jr.officerRead' => 1));
        $this->db->order_by('jr.reqDate', 'DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getOfficerHeadCount($SerType)
    {
        $this->db->select('count(*) as unread');
        $this->db->from('job_request');
        $this->db->where(array('assignRole' => $SerType, 'officerRead' => 1));

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getAdminHeadData()
    {
        $this->db->select('jr.jobId,jr.employee_id,jr.reqDate,e.middlename,e.lastname');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->where('jr.officerRead', 1);
        $this->db->order_by('jr.reqDate', 'DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getAdminHeadCount()
    {
        $this->db->select('count(*) as unread');
        $this->db->from('job_request');
        $this->db->where('officerRead', 1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getUserHeadData($empNo, $username)
    {
        $this->db->select('jr.jobId,jr.updateDate, e.middlename,e.lastname,e.id');
        $this->db->from('job_request jr');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee e', 'su.employee_id1 = e.id', 'inner');
        $this->db->where(array('jr.employee_id' => $empNo, 'jr.reqBy' => $username, 'jr.userRead' => 1));
        $this->db->order_by('jr.updateDate', 'DESC');
        $this->db->limit(5);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getUserHeadCount($empNo, $username)
    {
        $this->db->select('count(*) as unread');
        $this->db->from('job_request');
        $this->db->where(array('employee_id' => $empNo, 'reqBy' => $username, 'userRead' => 1));

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }


}