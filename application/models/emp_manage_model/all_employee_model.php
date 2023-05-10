<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 9/6/2022
 * Time: 2:58 PM
 */

class all_employee_model extends CI_Model
{
    public function getAllEmployees()
    {

//        SELECT e.id,e.lastname,e.middlename,e.nic,
//        u.user_name,u.createDate,u.userStatus, u.lockStatus,
//        ur.name
//        FROM employee e
//        join system_user u on e.id =  u.employee_id1
//        join user_role ur on u.user_role_id = ur.id
//        where e.emp_status = 1;

        $this->db->select('e.id,e.lastname,e.middlename,e.nic,u.user_name,u.createDate,u.userStatus, u.lockStatus,ur.name');
        $this->db->from('employee e');
//        $this->db->where('emp_status',1);
        $this->db->join('system_user u', 'e.id =  u.employee_id1', 'inner');
        $this->db->join('user_role ur', 'u.user_role_id = ur.id', 'inner');
        $this->db->limit('10');


        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getCombineAllEmpsToEdit()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.nic,e.date_Stamp,e.emp_status,d.name,b.id as brId,b.name as brName');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->where('e.emp_status=1 and dh.designation_id in (26,27,28,49,50,51,52,53,54,55,56,57,58,59,60,62,69,71,72,73)');
        $this->db->order_by('dh.from_date', 'DESC');
//        $this->db->limit('10');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDeptAllEmpsToEdit()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.nic,e.date_Stamp,e.emp_status,d.name,b.id as brId,b.name as brName');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->where('e.emp_status=1 and dh.designation_id in (8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,29,30,33,34,35,36,37,38,39,40,41,42,43,44,45,47,48,76)');
        $this->db->order_by('dh.from_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getSurvAllEmpsToEdit()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.nic,e.date_Stamp,e.emp_status,d.name,b.id as brId,b.name as brName');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->where('e.emp_status=1 and dh.designation_id in (1,2,3,4,5,6,7,67,68,74,75,78)');
        $this->db->order_by('dh.from_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getSfaAllEmpsToEdit()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.nic,e.date_Stamp,e.emp_status,d.name,b.id as brId,b.name as brName');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->where('e.emp_status=1 and dh.designation_id in (61,64,65,66,77)');
        $this->db->order_by('dh.from_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getAllEmployeesToEdit()
    {
        $this->db->select('e.id,e.lastname,e.middlename,e.nic,e.date_Stamp,e.emp_status,d.name,b.id as brId,b.name as brName');
        $this->db->from('employee e');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->where('emp_status', 1);
        $this->db->order_by('dh.from_date', 'DESC');
//        $this->db->limit('10');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function setLockStatus($username, $upstatus)
    {
        $this->db->set('lockStatus', $upstatus);
        $this->db->where('user_name', $username);
        $this->db->update('system_user');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function setEmployeeStatus($empNo, $upstatus)
    {

        $this->db->trans_start();

        $this->db->query("UPDATE system_user SET userStatus= '$upstatus'WHERE employee_id1='$empNo'");
        $this->db->query("UPDATE employee SET emp_status= '$upstatus'WHERE id='$empNo'");

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {

            $this->db->trans_rollback();

            return false;
        } else {

            $this->db->trans_commit();

            return true;

        }


    }

    public function setExamDetails($empId, $exType, $exName, $expassDate, $exobtDate)
    {

        $values = array('employee_id' => $empId, 'type_of_exams' => $exType, 'exam' => $exName, 'exam_pass_date' => $expassDate, 'obtained_date' => $exobtDate);

        $this->db->insert('eb_exams', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setCommendationDetails($empId, $reason, $letterrNo, $letterDate, $isuedBy, $remarks)
    {
        $values = array('employee_id' => $empId, 'purpose_for_commendation' => $reason, 'letter_no' => $letterrNo, 'letter_date' => $letterDate, 'issued_by' => $isuedBy,
            'remarks' => $remarks);

        $this->db->insert('commendation', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getLeaveYearVal($empId, $year)
    {
        $this->db->select('id');
        $this->db->from('annual_leave');
        $this->db->where(array('employee_id' => $empId, 'year' => $year));

        $query = $this->db->get();

        return ($query->num_rows() >= 1) ? true : false;

    }

    public function setLeaveDetails($empId, $year, $casualLeave, $vacc, $laps, $yLaps, $halfpay, $nopay, $other, $matFull, $matHalf, $matNoPay, $nopayForeign, $sick, $accident,
                                    $study, $lieu, $duty, $remark, $createBy, $createDate)
    {

        $values = array('employee_id' => $empId, 'year' => $year, 'casual' => $casualLeave, 'vacation' => $vacc, 'laps' => $laps, 'year_of_laps' => $yLaps,
            'maternity_full' => $matFull, 'maternity_half' => $matHalf, 'maternity_no' => $matNoPay, 'nopay' => $nopay, 'halfpay' => $halfpay, 'other_leave' => $other,
            'remarks' => $remark, 'sick' => $sick, 'lieu_leave' => $lieu, 'accident' => $accident, 'duty' => $duty, 'study' => $study, 'date_stamp' => $createDate, 'no_pay_foreign' => $nopayForeign,
            'user' => $createBy);

        $this->db->insert('annual_leave', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getIncrementYearVal($empId, $incyear)
    {
        $this->db->select('id');
        $this->db->from('annual_increment');
        $this->db->where(array('employee_id' => $empId, 'year' => $incyear));

        $query = $this->db->get();

        return ($query->num_rows() >= 1) ? true : false;

    }

    public function setIncrementDetails($empId, $Incrementyear, $IncreStatus, $IncreDate, $Period, $createBy, $createDate)
    {

        $values = array('employee_id' => $empId, 'increment_status' => $IncreStatus, 'year' => $Incrementyear, 'granted_date' => $IncreDate,
            'period' => $Period, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('annual_increment', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setClearanceDetails($empId, $baranchId, $ClearPeriod, $Status, $CertifNo, $IssuedDate, $IssuedBy, $createBy, $createDate)
    {

        $values = array('status_id' => $Status, 'clearance_date' => $IssuedDate, 'certificate_no' => $CertifNo, 'employee_id' => $empId,
            'year' => $ClearPeriod, 'branch_id' => $baranchId, 'issued_by' => $IssuedBy, 'createBy' => $createBy, 'createDate' => $createDate);

        $this->db->insert('clearance_certificate', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getEditEmpData($empNo)
    {


        $this->db->select('e.lastname, e.middlename,e.initialname,e.name_sinhala,e.name_tamil,e.dob,e.privateaddress,e.privateaddress2,e.privateaddress3,
                            e.present_address,e.nic,e.mobile,e.tel,e.email,e.wop_no,e.permanent_date, e.appointment_date,e.appoinment_lett_no,e.residentdistric_id,
                            e.title_id,e.gender_id,e.eduLevel_id,e.increment_date');
        $this->db->from('employee e');
        $this->db->where('id', $empNo);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;
    }

    public function getEditEmpDesigData($empNo)
    {
        $this->db->select('designation_id,salary_code_id,grade_id from designation_history 
        where employee_id="' . $empNo . '" and from_date = (select max(from_date) from designation_history where employee_id="' . $empNo . '")');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function setUpEmployee($empId, $title, $lname, $initls, $intleng, $intlSin, $intlTam, $gender, $nic, $dob, $add1,
                                  $add2, $add3, $district, $curadd, $mobileNum, $resdNum, $email, $eduQlfy, $apptNo, $apptDate, $pmentDate, $wnop,
                                  $updateBy, $updateDate)
    {

        $this->db->set(array('title_id' => $title, 'lastname' => $lname, 'middlename' => $initls, 'initialname' => $intleng, 'name_sinhala' => $intlSin,
            'name_tamil' => $intlTam, 'gender_id' => $gender, 'nic' => $nic, 'dob' => $dob, 'privateaddress' => $add1, 'privateaddress2' => $add2, 'privateaddress3' => $add3,
            'residentdistric_id' => $district, 'present_address' => $curadd, 'mobile' => $mobileNum, 'tel' => $resdNum, 'email' => $email, 'eduLevel_id' => $eduQlfy,
            'appoinment_lett_no' => $apptNo, 'appointment_date' => $apptDate, 'permanent_date' => $pmentDate, 'wop_no' => $wnop, 'updateBy' => $updateBy,
            'updateDate' => $updateDate));

        $this->db->where('id', $empId);
        $this->db->update('employee');

        return ($this->db->affected_rows() == 1) ? true : false;


    }

    public function setUserProfileImage($empId, $ImageName)
    {
        $this->db->set('image_id', $ImageName);
        $this->db->where('id', $empId);
        $this->db->update('employee');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function setUpIncreDate($empId, $upIncreDate)
    {
        $this->db->set('increment_date', $upIncreDate);
        $this->db->where('id', $empId);
        $this->db->update('employee');
        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setDesignation($empId, $desig, $grade, $salcode, $promtDate, $upIncreDate, $remark, $updateBy, $updateDate)
    {
        $this->db->trans_start();

        $values = array('employee_id' => $empId, 'designation_id' => $desig, 'salary_code_id' => $salcode, 'from_date' => $promtDate, 'grade_id' => $grade,
            'date_stamp' => $updateDate, 'user' => $updateBy, 'remarks' => $remark);

        $this->db->insert('designation_history', $values);
//        $this->db->query("INSERT INTO designation_history (id,employee_id,designation_id,salary_code_id,from_date,grade_id,date_stamp,verify,user,remarks) VALUES ('$id,$empId,$desig,$salcode,$promtDate,$grade,$updateDate,$verify,$updateBy,$remark')");
        $this->db->query("UPDATE employee SET increment_date= '$upIncreDate'WHERE id='$empId'");

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {

            $this->db->trans_rollback();

            return false;
        } else {

            $this->db->trans_commit();

            return true;

        }

    }

    public function getBrClearVal($empId, $branchId)
    {
        $this->db->select('id');
        $this->db->from('clearance_certificate');
        $this->db->where(array('employee_id' => $empId, 'branch_id' => $branchId));

        $query = $this->db->get();

        return ($query->num_rows() >= 1) ? true : false;

    }

    public function setUpdateAssgOfz($empId, $upReasonId, $assgOfz, $tranfDate, $remark, $createBy, $createDate, $is_working)
    {

        $this->db->trans_start();

        $values = array('employee_id' => $empId, 'branch_id' => $assgOfz, 'status_id' => $upReasonId, 'tranfer_date' => $tranfDate, 'date_stamp' => $createDate,
            'user' => $createBy, 'remarks' => $remark);
        $this->db->insert('job_history', $values);
        $this->db->query("UPDATE employee SET emp_status= '$is_working'WHERE id='$empId'");
        $this->db->query("UPDATE system_user SET userStatus= '$is_working'WHERE employee_id1='$empId'");
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {

            $this->db->trans_rollback();

            return false;
        } else {

            $this->db->trans_commit();

            return true;

        }

    }

}