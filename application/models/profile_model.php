<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/11/2022
 * Time: 8:29 PM
 */

class profile_model extends CI_Model
{


    //Query to get logges user Main data
    public function getLoguserData($EmpNO, $roleID)
    {
//        select e.lastname, e.middlename,e.initialname,e.name_sinhala,e.name_tamil,e.dob,e.privateaddress,e.privateaddress2,e.privateaddress3,
//        e.present_address,e.nic,e.mobile,e.tel,e.email,e.wop_no,e.permanent_date, e.appointment_date,e.increment_date,e.appoinment_lett_no,
//        d.name,c.name, t.name,g.name, h.level,dg.name,ur.name
//        from employee e
//        join district d on e.residentdistric_id = d.id
//        join civil_status c on e.civil_status_id = c.id
//        join title t on e.title_id = t.id
//        join gender g on e.gender_id = g.id
//        join highestedulevel h on e.eduLevel_id = h.id
//        join designation_history dh on e.id = dh.employee_id
//        join designation dg on dh.designation_id = dg.id
//        join system_user su on e.id = su.employee_id1
//        join user_role ur on su.user_role_id = ur.id
//        where e.id = 12361 and su.user_role_id = 2
//        order by dh.from_date desc limit 1;


        $this->db->select('e.lastname, e.middlename,e.initialname,e.name_sinhala,e.name_tamil,e.dob,e.privateaddress,e.privateaddress2,e.privateaddress3,
                            e.present_address,e.nic,e.mobile,e.tel,e.email,e.wop_no,e.permanent_date, e.appointment_date,e.increment_date,e.appoinment_lett_no,e.image_id,
                            d.name as disname,c.name as cstatus, t.name as title,g.name as gender, h.level, dg.name as desig, ur.name as urole');
        $this->db->from('employee e');
        $this->db->where(array('e.id' => $EmpNO, 'su.user_role_id' => $roleID));
        $this->db->join('district d', 'e.residentdistric_id = d.id', 'inner');
        $this->db->join('civil_status c', 'civil_status c on e.civil_status_id = c.id', 'inner');
        $this->db->join('title t', 'e.title_id = t.id', 'inner');
        $this->db->join('gender g', 'e.gender_id = g.id', 'inner');
        $this->db->join('highestedulevel h', 'e.eduLevel_id = h.id', 'inner');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id', 'inner');
        $this->db->join('designation dg', 'dh.designation_id = dg.id', 'inner');
        $this->db->join('system_user su', 'e.id = su.employee_id1', 'inner');
        $this->db->join('user_role ur', 'su.user_role_id = ur.id', 'inner');
        $this->db->order_by('dh.from_date', 'DESC');
        $this->db->limit('1');

//        $this->db->select($this->temp . '.lastname,' . $this->temp . '.middlename,' . $this->temp . '.initialname,' . $this->temp . '.name_sinhala,'
//            . $this->temp . '.name_tamil,' . $this->temp . '.dob,' . $this->temp . '.privateaddress,' . $this->temp . '.privateaddress2,' . $this->temp . '.privateaddress3,'
//            . $this->temp . '.present_address,' . $this->temp . '.nic,' . $this->temp . '.mobile,' . $this->temp . '.tel,' . $this->temp . '.email,'
//            . $this->temp . '.wop_no,' . $this->temp . '.permanent_date,' . $this->temp . '.appointment_date,' . $this->temp . '.increment_date,'
//            . $this->tdis . '.name,'
//            . $this->tcs . '.name,'
//            . $this->ttl . '.name,'
//            . $this->tgen . '.name,'
//            . $this->hedu . '.level');
//        $this->db->from($this->temp);
//        $this->db->where($this->temp . '.id', $EmpNO);
//        $this->db->join($this->tdis, $this->temp . '.residentdistric_id' . '=' . $this->tdis . '.id', 'inner');
//        $this->db->join($this->tcs, $this->temp . '.civil_status_id' . '=' . $this->tcs . '.id', 'inner');
//        $this->db->join($this->ttl, $this->temp . '.title_id' . '=' . $this->ttl . '.id', 'inner');
//        $this->db->join($this->tgen, $this->temp . '.gender_id' . '=' . $this->tgen . '.id', 'inner');
//        $this->db->join($this->hedu, $this->temp . '.eduLevel_id' . '=' . $this->hedu . '.id', 'inner');


        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getLogUserAcctDtls($empNO)
    {

//        select system_user.user_name,system_user.lockStatus, system_user.createDate, user_role.name, log_details.user_action, log_details.date_time
//from system_user
//join user_role on system_user.user_role_id = user_role.id
//join log_details on system_user.user_name = log_details.user and log_details.id = (select max(id) from log_details where log_details.user = system_user.user_name)
//where system_user.employee_id1 = 12361
//order by log_details.date_time desc;

        $this->db->select('system_user.user_name,system_user.lockStatus, system_user.createDate, 
        user_role.name, log_details.user_action, log_details.date_time, log_details.level');
        $this->db->from('system_user');
        $this->db->where('system_user.employee_id1', $empNO);
        $this->db->join('user_role', 'system_user.user_role_id = user_role.id', 'inner');
        $this->db->join('log_details', 'system_user.user_name = log_details.user and log_details.id = (select max(id) from log_details where log_details.user = system_user.user_name)', 'inner');
        $this->db->order_by('log_details.date_time', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function seteditProfileData($update, $upby, $intlname, $empno, $intlEng, $lname, $intlSin, $intltamil, $mob, $tel, $mail, $add1, $add2, $add3, $curadd)
    {
        $values = array('lastname' => $lname, 'middlename' => $intlEng, 'initialname' => $intlname, 'name_sinhala' => $intlSin, 'name_tamil' => $intltamil, 'privateaddress' => $add1,
            'privateaddress2' => $add2, 'privateaddress3' => $add3, 'present_address' => $curadd, 'mobile' => $mob, 'tel' => $tel, 'email' => $mail, 'updateDate' => $update,
            'updateBy' => $upby);

        $this->db->where('id', $empno);

        $this->db->update('employee', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }


}
