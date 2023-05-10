<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 11/23/2022
 * Time: 2:59 PM
 */

class officer_dept_dash_model extends CI_Model
{

    public function getSnrMtoCounter()
    {
        $this->db->select('count(*) as snrMtoCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=11 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getMtoCounter()
    {
        $this->db->select('count(*) as mtoCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=12 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getPtotCounter()
    {
        $this->db->select('count(*) as ptoCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=16 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDeptAsstCounter()
    {
        $this->db->select('count(*) as deptAsstCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=47 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDeptSgoCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=1 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,
43,44,45,46,47,48,76))as deptSgoTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDeptProvCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=3 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,
43,44,45,46,47,48,76))as deptProvTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDeptDistCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=4 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,
43,44,45,46,47,48,76))as deptDistTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }


    public function getDeptDivCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=5 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,
43,44,45,46,47,48,76))as deptDivTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }


    public function getDeptIsmCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=2 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,
43,44,45,46,47,48,76))as deptIsmTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getEmpturn55($checkDate)
    {
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where e.emp_status=1 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,76))t where age>=55 and eStatus=1 order by age desc limit 5");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getEmpturn55TotCount($checkDate)
    {
        $this->db->select("count(*) as retireTot from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where e.emp_status=1 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,76)) t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

}