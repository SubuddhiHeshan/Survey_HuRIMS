<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 11/24/2022
 * Time: 10:49 AM
 */

class officer_surv_dash_model extends CI_Model
{

    public function getSurveyCounter()
    {
        $this->db->select('count(*) as surveyCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=7 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSSCounter()
    {
        $this->db->select('count(*) as ssCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=6 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSnrSSCounter()
    {
        $this->db->select('count(*) as snrSSCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=5 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDsgPsgCounter()
    {
        $this->db->select('count(*) as dsgPsgCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=4 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSurvSgoCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=1 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78))as survSgoTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSurvProvCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=3 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) as survProvTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSurvDistCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=4 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) as survDistTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSurvDivCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=5 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) as survDivTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSurvIsmCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=2 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) as survIsmTotCount");

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
        where e.emp_status=1 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) t where age>=55 and eStatus=1 order by age desc limit 5");

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
        where e.emp_status=1 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)) t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }
}