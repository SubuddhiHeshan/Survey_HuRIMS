<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/20/2022
 * Time: 12:12 PM
 */

class find_emp_info_model extends CI_Model
{

    public function getEmpCheckName($EmpNo)
    {
        $this->db->select('e.middlename,e.lastname');
        $this->db->from('employee e');
        $this->db->where('e.id', $EmpNo);
        $this->db->limit('1');
        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }


}