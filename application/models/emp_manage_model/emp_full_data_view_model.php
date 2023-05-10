<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/19/2022
 * Time: 12:41 PM
 */
class emp_full_data_view_model extends CI_Model
{
    public function getEmpData($EmpNO)
    {


        $this->db->select('e.id,e.lastname, e.middlename,e.initialname,e.name_sinhala,e.name_tamil,e.dob,e.privateaddress,e.privateaddress2,e.privateaddress3,
                            e.present_address,e.nic,e.mobile,e.tel,e.email,e.wop_no,e.permanent_date, e.appointment_date,e.increment_date,e.appoinment_lett_no,e.image_id,
                            d.name as disname,c.name as cstatus, t.name as title,g.name as gender, h.level, dg.name as desig, b.name as branchname');
        $this->db->from('employee e');
        $this->db->where(array('e.id' => $EmpNO));
        $this->db->join('district d', 'e.residentdistric_id = d.id', 'inner');
        $this->db->join('civil_status c', 'civil_status c on e.civil_status_id = c.id', 'inner');
        $this->db->join('title t', 'e.title_id = t.id', 'inner');
        $this->db->join('gender g', 'e.gender_id = g.id', 'inner');
        $this->db->join('highestedulevel h', 'e.eduLevel_id = h.id', 'inner');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation dg', 'dh.designation_id = dg.id', 'inner');
        $this->db->join('job_history jh', 'e.id = jh.employee_id and jh.tranfer_date = (select max(tranfer_date) from job_history where job_history.employee_id = e.id)', 'inner');
        $this->db->join('branch b', 'jh.branch_id= b.id', 'inner');
        $this->db->limit('1');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getSpouseDetails($EmpNO)
    {
        $this->db->select('spousname,spousoccupation,children_study_school,noofchildren');
        $this->db->from('dependent');
        $this->db->where('employee_id', $EmpNO);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getIncrementDetails($EmpNO)
    {
        $this->db->select('i.year,i.granted_date,s.name');
        $this->db->from('annual_increment i');
        $this->db->join('increment_status s', 'i.increment_status = s.id', 'inner');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('i.granted_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getClearanceDetails($EmpNO)
    {
        $this->db->select('c.status_id,c.clearance_date,c.certificate_no,c.year,c.issued_by,b.name');
        $this->db->from('clearance_certificate c');
        $this->db->join('branch b', 'c.branch_id= b.id', 'inner');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('clearance_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getJobhistDetails($EmpNO)
    {
        $this->db->select('j.tranfer_date,j.remarks,b.name as brname,s.name as status');
        $this->db->from('job_history j');
        $this->db->join('branch b', 'j.branch_id= b.id', 'inner');
        $this->db->join('status s', 'j.status_id= s.id', 'inner');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('tranfer_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getDesighistDetails($EmpNO)
    {
        $this->db->select('dh.from_date, d.name as designame, s.name as salname');
        $this->db->from('designation_history dh');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('salary_code s', 'dh.salary_code_id = s.id', 'inner');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('from_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getAnnualLeaveDetails($EmpNO)
    {
        $this->db->select('year,casual,vacation,laps,year_of_laps,maternity_full,maternity_half,maternity_no,nopay,halfpay,other_leave,sick,lieu_leave,
        accident,duty,study,no_pay_foreign');
        $this->db->from('annual_leave');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('year', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getCommendDetails($EmpNO)
    {
        $this->db->select('purpose_for_commendation,letter_no,letter_date,issued_by,remarks');
        $this->db->from('commendation');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('letter_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function getEbDetails($EmpNO)
    {
        $this->db->select('type_of_exams,exam,exam_pass_date,obtained_date');
        $this->db->from('eb_exams');
        $this->db->where('employee_id', $EmpNO);
        $this->db->order_by('obtained_date', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getTrainningDetails($EmpNO)
    {
        $this->db->select('q.year,q.institute,q.profession_qulification,q.from_date,q.to_date,q.duaration,q.name_of_sholarship,q.registeration,
                    q.airticket,q.subsistence,q.incidentalexpences,q.tutionfee,q.warmclothallowance,f.name as field,c.name as country');
        $this->db->from('professionalqualification q');
        $this->db->join('field_of_study f', 'q.field_of_study = f.id', 'inner');
        $this->db->join('country c', 'q.country_id = c.id', 'inner');
        $this->db->where('q.employee_id', $EmpNO);
        $this->db->order_by('q.year', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDesciplineActDetails($EmpNO)
    {
        $this->db->select('dr.reference_no, dr.date_of_action,dr.action_taken,ds.name as dsaction');
        $this->db->from('descipline_reactions dr');
        $this->db->join('desciplinary_action_status ds', 'dr.desciplinary_action_status = ds.id', 'inner');
        $this->db->where('dr.employee_id', $EmpNO);
        $this->db->order_by('dr.date_of_action', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}
