<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 11:14 AM
 */

class create_salcode_model extends CI_Model
{

    public function getSalcodes()
    {
        $this->db->select('id,name,status,createDate');
        $this->db->from('salary_code');
        $this->db->where("name not Like '--Select--%'");
        $this->db->order_by('status', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setSalcodeStatus($id, $upstatus)
    {
        $this->db->set('status', $upstatus);
        $this->db->where('id', $id);
        $this->db->update('salary_code');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function getSalcodeVal($salaryCode)
    {
        $this->db->select('id');
        $this->db->from('salary_code');
        $this->db->where('name', $salaryCode);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;


    }

    public function setSalarycode($salUp, $status, $createBy, $createDate)
    {
        $values = array('name' => $salUp, 'status' => $status, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('salary_code', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }
}