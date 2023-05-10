<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/27/2022
 * Time: 8:02 PM
 */

class register_model extends CI_Model
{
    public function getDistricts()
    {

        $this->db->select('id,name');
        $this->db->from('district');
        $this->db->where("name not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getHgEduLvl()
    {
        $this->db->select('id,level');
        $this->db->from('highestedulevel');
        $this->db->where("level not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getBranch()
    {
        $this->db->select('id,name');
        $this->db->from('branch');
        $this->db->where("status = '1' and name not like 'select%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getDesignation()
    {
        $this->db->select('id,name');
        $this->db->from('designation');
        $this->db->where('status', 1);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getGrades()
    {
        $this->db->select('id,name');
        $this->db->from('grade');
        $this->db->where("name not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getSalCodes()
    {
        $this->db->select('id,name');
        $this->db->from('salary_code');
        $this->db->where("status ='1' and name not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getAppointmentTypes()
    {
        $this->db->select('id,name,is_working');
        $this->db->from('status');
        $this->db->where("is_working !='2' and name not like '--%'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getServices()
    {
        $this->db->select('id,name');
        $this->db->from('catogary');
        $this->db->where("id != '0'");

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }


    public function getNicValidateRespo($nic)
    {
        $this->db->select('nic');
        $this->db->from('employee');
        $this->db->where('nic', $nic);

        $query = $this->db->get();

        return ($query->num_rows() >= 1) ? true : false;
    }


    public function getNewEmpNo()
    {
        $this->db->select_max('id');
        $this->db->from('employee');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;
    }

    public function setnewEmployee($newEmpNo, $createBy, $createDate, $title, $lname, $initls, $intleng, $gender, $nic,
                                   $dob, $add1, $add2, $add3, $district, $curadd, $mobileNum, $resdNum, $email, $mStatus, $eduQlfy, $apptNo, $apptDate,
                                   $pmentDate, $wnop, $desig, $salCode, $grade, $assgOfz, $rptDate, $apptType)
    {
        $this->db->trans_start();

        $newEmpVals = array('id' => $newEmpNo, 'lastname' => $lname, 'middlename' => $initls, 'initialname' => $intleng, 'dob' => $dob,
            'privateaddress' => $add1, 'privateaddress2' => $add2, 'privateaddress3' => $add3, 'present_address' => $curadd, 'nic' => $nic,
            'mobile' => $mobileNum, 'residentdistric_id' => $district, 'civil_status_id' => $mStatus, 'title_id' => $title, 'tel' => $resdNum,
            'eduLevel_id' => $eduQlfy, 'email' => $email, 'gender_id' => $gender, 'date_Stamp' => $createDate, 'wop_no' => $wnop, 'emp_status' => '1',
            'user' => $createBy, 'permanent_date' => $pmentDate, 'appointment_date' => $apptDate, 'id_midname' => $initls, 'id_lastname' => $lname,
            'appoinment_lett_no' => $apptNo);

        $this->db->insert('employee', $newEmpVals);

        $newEmpDesgVals = array('employee_id' => $newEmpNo, 'designation_id' => $desig, 'salary_code_id' => $salCode, 'from_date' => $rptDate, 'grade_id' => $grade,
            'date_stamp' => $createDate, 'user' => $createBy);

        $this->db->insert('designation_history', $newEmpDesgVals);

        $newEmpBranchVals = array('employee_id' => $newEmpNo, 'branch_id' => $assgOfz, 'status_id' => $apptType, 'tranfer_date' => $rptDate, 'date_stamp' => $createDate,
            'user' => $createBy);

        $this->db->insert('job_history', $newEmpBranchVals);

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {

            $this->db->trans_rollback();

            return false;


        } else {

            $this->db->trans_commit();

            return true;
        }

    }

    public function setSpouseDetails($newEmpNo, $sName, $sOccu, $chldQty)
    {
        $values = array('noofchildren' => $chldQty, 'spousname' => $sName, 'spousoccupation' => $sOccu, 'employee_id' => $newEmpNo);

        $this->db->insert('dependent', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setUserIDImage($newEmpNo, $IdCopyName)
    {
        $this->db->set('id_copy', $IdCopyName);
        $this->db->where('id', $newEmpNo);
        $this->db->update('employee');

        return ($this->db->affected_rows() == 1) ? true : false;
    }


}