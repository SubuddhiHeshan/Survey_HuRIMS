<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 11/16/2022
 * Time: 11:48 AM
 */

class officer_com_dash_model extends CI_Model
{
    public function getMsoCounter()
    {
        $this->db->select('count(*) as msoCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=58 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDoCounter()
    {
        $this->db->select('count(*) as doCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=62 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getKKSCounter()
    {
        $this->db->select('count(*) as kksCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=60 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getDriverCounter()
    {
        $this->db->select('count(*) as driverCount');
        $this->db->from('employee e');
        $this->db->where('dh.designation_id=59 and e.emp_status=1');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getCombSgoCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=26 and e.emp_status=1 and o.id=1) + 
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=27 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=28 and e.emp_status=1 and o.id=1) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=49 and e.emp_status=1 and o.id=1) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=50 and e.emp_status=1 and o.id=1) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=51 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=52 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=53 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=54 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=55 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=56 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=57 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=58 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=59 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=60 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=62 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=69 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=71 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=72 and e.emp_status=1 and o.id=1)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=73 and e.emp_status=1 and o.id=1) as ComSgoTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getCombProvCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=26 and e.emp_status=1 and o.id=3) + 
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=27 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=28 and e.emp_status=1 and o.id=3) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=49 and e.emp_status=1 and o.id=3) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=50 and e.emp_status=1 and o.id=3) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=51 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=52 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=53 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=54 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=55 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=56 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=57 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=58 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=59 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=60 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=62 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=69 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=71 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=72 and e.emp_status=1 and o.id=3)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=73 and e.emp_status=1 and o.id=3) as ComProvTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getCombDistCount()
    {
        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=26 and e.emp_status=1 and o.id=4) + 
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=27 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=28 and e.emp_status=1 and o.id=4) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=49 and e.emp_status=1 and o.id=4) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=50 and e.emp_status=1 and o.id=4) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=51 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=52 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=53 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=54 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=55 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=56 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=57 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=58 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=59 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=60 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=62 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=69 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=71 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=72 and e.emp_status=1 and o.id=4)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=73 and e.emp_status=1 and o.id=4) as ComDistTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getCombDivCount()
    {

        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=26 and e.emp_status=1 and o.id=5) + 
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=27 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=28 and e.emp_status=1 and o.id=5) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=49 and e.emp_status=1 and o.id=5) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=50 and e.emp_status=1 and o.id=5) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=51 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=52 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=53 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=54 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=55 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=56 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=57 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=58 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=59 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=60 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=62 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=69 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=71 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=72 and e.emp_status=1 and o.id=5)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=73 and e.emp_status=1 and o.id=5) as ComDivTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getCombIsmCount()
    {

        $this->db->select("(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=26 and e.emp_status=1 and o.id=2) + 
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=27 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=28 and e.emp_status=1 and o.id=2) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=49 and e.emp_status=1 and o.id=2) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=50 and e.emp_status=1 and o.id=2) +
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=51 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=52 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=53 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=54 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=55 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=56 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=57 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=58 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=59 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=60 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=62 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=69 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=71 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=72 and e.emp_status=1 and o.id=2)+
(select count(*) 
from employee e
join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
join branch b on jh.branch_id= b.id
join office o on b.office_id = o.id
where dh.designation_id=73 and e.emp_status=1 and o.id=2) as ComIsmTotCount");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getEmpturn55($checkDate)
    {
//        select t.* from (
//        select e.id,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('2023-12-20', e.dob)), '%Y') + 0 AS age
//        FROM employee e
//        inner join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id)
//        inner join designation d on dh.designation_id = d.id
//        join job_history jh on e.id = jh.employee_id and jh.id = (select max(id) from job_history where job_history.employee_id = e.id)
//        join branch b on jh.branch_id= b.id
//        where e.emp_status=1 and dh.designation_id=58 or dh.designation_id=62 or dh.designation_id=60 or
//        dh.designation_id=59 or dh.designation_id=55 or dh.designation_id=56 or dh.designation_id=72 or dh.designation_id=69 or
//        dh.designation_id=73 or dh.designation_id=71) t where age>=55 order by age desc limit 10;
//
        $this->db->select("t.* from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where e.emp_status=1 and dh.designation_id in (26,27,28,49,50,51,52,53,54,55,56,57,58,59,60,62,69,71,72,73))t where age>=55 and eStatus=1 order by age desc limit 5");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getEmpturn55TotCount($checkDate)
    {
//        select t.* from (
//        select e.id,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('2023-12-20', e.dob)), '%Y') + 0 AS age
//        FROM employee e
//        inner join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id)
//        inner join designation d on dh.designation_id = d.id
//        join job_history jh on e.id = jh.employee_id and jh.id = (select max(id) from job_history where job_history.employee_id = e.id)
//        join branch b on jh.branch_id= b.id
//        where e.emp_status=1 and dh.designation_id=58 or dh.designation_id=62 or dh.designation_id=60 or
//        dh.designation_id=59 or dh.designation_id=55 or dh.designation_id=56 or dh.designation_id=72 or dh.designation_id=69 or
//        dh.designation_id=73 or dh.designation_id=71) t where age>=55 order by age desc limit 10;
//
        $this->db->select("count(*) as retireTot from (
        select e.id,emp_status as eStatus,e.lastname,e.middlename,e.dob,d.name as designame,b.name as brname, DATE_FORMAT(FROM_DAYS(DATEDIFF('" . $checkDate . "', e.dob)), '%Y') + 0 AS age
        FROM employee e
        inner join designation_history dh on e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)
        inner join designation d on dh.designation_id = d.id
        join job_history jh on e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)
        join branch b on jh.branch_id= b.id
        where e.emp_status=1 and dh.designation_id in (26,27,28,49,50,51,52,53,54,55,56,57,58,59,60,62,69,71,72,73))t where age>=55 and eStatus=1 order by age desc");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

}