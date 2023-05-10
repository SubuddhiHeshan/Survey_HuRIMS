<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/30/2022
 * Time: 4:28 PM
 */

class officer_sfa_dash_model extends CI_Model
{

    public function getSfaSpecialCounter()
    {
        $this->db->select('count(*) as sfaSpCount');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->where('dh.designation_id=61 and e.emp_status=1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfa1Counter()
    {
        $this->db->select('count(*) as sfa1Count');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->where('dh.designation_id=64 and e.emp_status=1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfa2Counter()
    {
        $this->db->select('count(*) as sfa2Count');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->where('dh.designation_id=65 and e.emp_status=1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfa3Counter()
    {
        $this->db->select('count(*) as sfa3Count');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->where('dh.designation_id=66 and e.emp_status=1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfaSgoCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=1 and dh.designation_id in (61,64,65,66,77))as sfaSgoTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfaProvCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=3 and dh.designation_id in (61,64,65,66,77)) as sfaProvTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfaDistCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=4 and dh.designation_id in (61,64,65,66,77)) as sfaDistTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfaDivCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=5 and dh.designation_id in (61,64,65,66,77)) as sfaDivTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getSfaIsmCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where e.emp_status=1 and o.id=2 and dh.designation_id in (61,64,65,66,77)) as sfaIsmTotCount");

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
        where e.emp_status=1 and dh.designation_id in (61,64,65,66,77)) t where age>=55 and eStatus=1 order by age desc limit 5");

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
        where e.emp_status=1 and dh.designation_id in (61,64,65,66,77)) t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

}