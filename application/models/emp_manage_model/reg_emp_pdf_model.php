<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 10/8/2022
 * Time: 4:10 PM
 */

class reg_emp_pdf_model extends CI_Model
{

    public function getPdfData($empID)
    {
//        select e . title_id,e . lastname,e . middlename, dg . name,g . name
//        from employee e
//        join designation_history dgh on e . id = dgh . employee_id
//        join designation dg on dgh . designation_id = dg . id
//        join grade g on dgh . grade_id = g . id
//        where e . id = 12361
//        order by dgh . from_date desc
//        limit 1;

        $this->db->select('e.title_id,e.lastname,e.middlename,dg.name as desName,g.name as grade');
        $this->db->from('employee e');
        $this->db->where('e.id', $empID);
        $this->db->join('designation_history dgh', 'e.id = dgh.employee_id', 'inner');
        $this->db->join('designation dg', 'dgh.designation_id = dg.id', 'inner');
        $this->db->join('grade g', 'dgh.grade_id = g.id', 'inner');
        $this->db->order_by('dgh.from_date', 'DESC');
        $this->db->limit('1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }
}