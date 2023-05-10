<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/11/2022
 * Time: 7:05 PM
 */

class create_branch_model extends CI_Model
{
    public function getBranches()
    {

        $this->db->select('b.id,b.name as brName,b.status,b.address1,b.address2,b.address3,b.telephone_no,b.fax_no,b.email');
        $this->db->from('branch b');
        $this->db->where('b.id !=0');
        $this->db->order_by('b.status', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getOffices()
    {
        $this->db->select('id,name');
        $this->db->from('office');
        $this->db->where("status = '1' and name not like 'select%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDistricts()
    {
        $this->db->select('id,name');
        $this->db->from('district');
        $this->db->where("name not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function setBranchStatus($id, $upstatus)
    {
        $this->db->set('status', $upstatus);
        $this->db->where('id', $id);
        $this->db->update('branch');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function getBranIdVal($branchID)
    {
        $this->db->select('id');
        $this->db->from('branch');
        $this->db->where('id', $branchID);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;

    }

    public function setBranch($brCode, $ofzId, $distId, $provId, $brName, $orderId, $add1, $add2, $add3,
                              $tele, $fax, $mail, $status, $createBy, $createDate)
    {
        $values = array('id' => $brCode, 'name' => $brName, 'office_id' => $ofzId, 'province_id' => $provId, 'district_id' => $distId,
            'status' => $status, 'order_id' => $orderId, 'address1' => $add1, 'address2' => $add2, 'address3' => $add3, 'telephone_no' => $tele,
            'fax_no' => $fax, 'email' => $mail, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('branch', $values);

        return ($this->db->affected_rows() == 1) ? true : false;
    }
}