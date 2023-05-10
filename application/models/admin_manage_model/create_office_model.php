<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/10/2022
 * Time: 9:27 PM
 */

class create_office_model extends CI_Model
{

    public function getOffice()
    {
        $this->db->select('id,name,status,createDate');
        $this->db->from('office');
        $this->db->where("name not like 'select%'");
        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function setOffice($office, $status, $createBy, $createDate)
    {
        $values = array('name' => $office, 'status' => $status, 'Stores_Status' => 1, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('office', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setOfzStatus($id, $upstatus)
    {
        $this->db->set('status', $upstatus);
        $this->db->where('id', $id);
        $this->db->update('office');

        return ($this->db->affected_rows() == 1) ? true : false;
    }
}