<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/19/2022
 * Time: 9:59 AM
 */

class create_login_model extends CI_Model
{

    public function getUserRoles()
    {
        $this->db->select('*');
        $this->db->from('user_role');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getEmpData($EmpNo)
    {
        //select e.middlename,e.lastname,br.name as branch,dg.name as desig from employee e
        //join job_history jh on e.id = jh.employee_id
        //join branch br on jh.branch_id= br.id
        //join designation_history dh on e.id = dh.employee_id
        //join designation dg on dh.designation_id = dg.id
        //where e.id = 1007
        //order by jh.tranfer_date desc, dh.from_date desc
        //limit 1;

        $this->db->select('e.middlename,e.lastname,br.name as branch,dg.name as desig');
        $this->db->from('employee e');
        $this->db->where('e.id', $EmpNo);
        $this->db->join('job_history jh', 'e.id = jh.employee_id', 'inner');
        $this->db->join('branch br', 'jh.branch_id= br.id', 'inner');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id', 'inner');
        $this->db->join('designation dg', 'dh.designation_id = dg.id', 'inner');
        $this->db->order_by('jh.tranfer_date', 'DESC');
        $this->db->order_by('dh.from_date', 'DESC');
        //$this->db->order_by('jh.tranfer_date DESC, dh.from_date DESC');
        $this->db->limit('1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getUserRoleVal($empNo, $role)
    {
        $this->db->select('id');
        $this->db->from('system_user');
        $this->db->where(array('employee_id1' => $empNo, 'user_role_id' => $role));

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;

    }

    public function getUserNameVal($username)
    {
        $this->db->select('id');
        $this->db->from('system_user');
        $this->db->where('user_name', $username);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;

    }

    public function getDatatoLogin($EmpNo)
    {

        $this->db->select('e.lastname,c.id as serviceid, jh.branch_id as office');
        $this->db->from('employee e');
        $this->db->where('e.id', $EmpNo);
        $this->db->join('designation_history dh', 'e.id = dh.employee_id', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('catogary c', 'd.catagory_id = c.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id', 'inner');
        $this->db->order_by('dh.from_date', 'DESC');
        $this->db->order_by('jh.tranfer_date', 'DESC');
        $this->db->limit('1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }
}