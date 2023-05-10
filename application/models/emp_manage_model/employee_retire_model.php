<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/19/2022
 * Time: 11:42 AM
 */

class employee_retire_model extends CI_Model
{

    public function getCombEmpRetireAll($checkDate)
    {
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where dh.designation_id in (26,27,28,49,50,51,52,53,54,55,56,57,58,59,60,62,69,71,72,73))t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDeptEmpRetireAll($checkDate)
    {
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,76))t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getSurvEmpRetireAll($checkDate)
    {
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78))t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getSfaEmpRetireAll($checkDate)
    {
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where dh.designation_id in (61,64,65,66,77))t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }
}