<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 11/9/2022
 * Time: 3:09 PM
 */

class create_desig_model extends CI_Model
{

    public function getDesignations()
    {
        $this->db->select('d.id,d.name, d.desi_name_sin,d.approved_carder,d.salare_code,d.status,s.name as salName');
        $this->db->from('designation d');
//        $this->db->where('d.status', 1);
        $this->db->join('salary_code s', 'd.salare_code= s.id', 'inner');
        $this->db->order_by('d.id', 'DESC');
//        $this->db->limit(10);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function setDesignation($dEng, $dSin, $dTam, $service, $salcode, $apprdcarder, $status, $createBy, $createDate)
    {

        $values = array('name' => $dEng, 'desi_name_sin' => $dSin, 'desi_name_tml' => $dTam, 'approved_carder' => $apprdcarder,
            'salare_code' => $salcode, 'catagory_id' => $service, 'status' => $status, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('designation', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setDesigStatus($id, $upstatus)
    {
        $this->db->set('status', $upstatus);
        $this->db->where('id', $id);
        $this->db->update('designation');

        return ($this->db->affected_rows() == 1) ? true : false;

    }

}