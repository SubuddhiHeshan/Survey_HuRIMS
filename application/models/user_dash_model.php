<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/13/2022
 * Time: 12:12 PM
 */

class user_dash_model extends CI_Model
{

    public function getCounterData($empId, $year)
    {
        $this->db->select('casual,vacation,laps');
        $this->db->from('annual_leave');
        $this->db->where(array('employee_id' => $empId, 'year' => $year));

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getActCount($username)
    {
        $this->db->select('count(*) as countAct');
        $this->db->from('log_details');
        $this->db->where('user', $username);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getEBPassStatus($empId)
    {
        $this->db->select('id,exam_pass_date');
        $this->db->from('eb_exams');
        $this->db->where('employee_id', $empId);
        $this->db->where("type_of_exams like '%eb%'");
        $this->db->order_by('id', 'ASC');
        $this->db->limit(1);

        $query = $this->db->get();

        $result = $query->row();


        return ($query->num_rows() == 1) ? $result : false;
    }

    public function getAnnualIncreStatus($empId)
    {
        $this->db->select('a.year,a.granted_date,a.increment_status,i.name');
        $this->db->from('annual_increment a');
        $this->db->where('employee_id', $empId);
        $this->db->join('increment_status i', 'a.increment_status = i.id', 'inner');
        $this->db->order_by('a.granted_date', 'DESC');
        $this->db->limit(1);

        $query = $this->db->get();

        $result = $query->row();


        return ($query->num_rows() == 1) ? $result : false;

    }


}