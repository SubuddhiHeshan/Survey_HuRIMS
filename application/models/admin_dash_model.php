<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 8:03 PM
 */

class admin_dash_model extends CI_Model
{
    public function getTotEmp()
    {
        $this->db->select('count(*) as countEmp');
        $this->db->from('employee');
        $this->db->where('emp_status', 1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getTotBranch()
    {
        $this->db->select('count(*) as countBranch');
        $this->db->from('branch');
        $this->db->where("status = '1' and name not like 'select%'");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getTotDesignations()
    {
        $this->db->select('count(*) as countDesig');
        $this->db->from('designation');
        $this->db->where("status = '1' and id !='0'");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getTotSysUsers()
    {
        $this->db->select('count(*) as countSysusers');
        $this->db->from('system_user');
        $this->db->where('userStatus', 1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getYear1Data($year1)
    {
        $this->db->select('count(*) as yr1count');
        $this->db->from('employee');
        $this->db->where('year(date_Stamp)', $year1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getYear2Data($year2)
    {
        $this->db->select('count(*) as yr2count');
        $this->db->from('employee');
        $this->db->where('year(date_Stamp)', $year2);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getYear3Data($year3)
    {
        $this->db->select('count(*) as yr3count');
        $this->db->from('employee');
        $this->db->where('year(date_Stamp)', $year3);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getYear4Data($year4)
    {
        $this->db->select('count(*) as yr4count');
        $this->db->from('employee');
        $this->db->where('year(date_Stamp)', $year4);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getYear5Data($year5)
    {
        $this->db->select('count(*) as yr5count');
        $this->db->from('employee');
        $this->db->where('year(date_Stamp)', $year5);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getMsoPer()
    {
//        select (select count(*) from employee e join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id and designation_history.designation_id=58) where e.emp_status=1)/
//        (select count(*) from employee where emp_status=1) * 100 as msoTot;

        $this->db->select("(select count(*) from employee e join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id and designation_history.designation_id=58) where e.emp_status=1)/
        (select count(*) from employee where emp_status=1) * 100 as msoTot");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDoPer()
    {
        $this->db->select("(select count(*) from employee e join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id and designation_history.designation_id=62) where e.emp_status=1)/
        (select count(*) from employee where emp_status=1) * 100 as doTot");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getSurvPer()
    {
        $this->db->select("(select count(*) from employee e join designation_history dh on e.id = dh.employee_id and dh.id = (select max(id) from designation_history where designation_history.employee_id = e.id and designation_history.designation_id=7) where e.emp_status=1)/
        (select count(*) from employee where emp_status=1) * 100 as survTot");

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getlastRegEmp()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.date_Stamp,d.name');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->where('e.emp_status = 1');
        $this->db->order_by('e.id', 'DESC');
        $this->db->limit('5');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getRecentRetired()
    {
//        select e.id,e.middlename,e.lastname,
//        jh.tranfer_date
//        from employee e
//        join job_history jh on e.id=jh.employee_id
//        where jh.branch_id=100000
//        order by jh.tranfer_date desc
//        limit 5;

        $this->db->select('e.id,e.lastname,jh.tranfer_date');
        $this->db->from('employee e');
        $this->db->join('job_history jh', 'e.id=jh.employee_id', 'inner');
        $this->db->where('jh.branch_id=100000');
        $this->db->order_by('jh.tranfer_date', 'DESC');
        $this->db->limit('4');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

}