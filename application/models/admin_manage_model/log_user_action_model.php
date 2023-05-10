<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 2:28 PM
 */

class log_user_action_model extends CI_Model
{
    public function getLogsActions($fdate, $tdate)
    {
//        select l . id,l . user as username, l . date_time,l . user_action,l . level,
//        e . lastname,e . middlename,e.id as empid
//        ur . name as userrole,
//        d . name designame
//#br.name as brname
//        from log_details l
//        inner join system_user su on l . system_user_id = su . id
//        inner join employee e on su . employee_id1 = e . id
//        inner join designation_history dh on e . id = dh . employee_id and dh . id = (select max(id) from designation_history where designation_history . employee_id = e . id)
//        inner join designation d on dh . designation_id = d . id
//#join job_history jh on e.id = jh.employee_id and jh.id = (select max(id) from job_history where job_history.employee_id = e.id)
//#join branch br on jh.branch_id= br.id
//        inner join user_role ur on su . user_role_id = ur . id
//        where l . date_time between '2022-11-01' and '2022-11-13'
//        order by l . id desc;

        $this->db->select('l.id,l.user as username, l.date_time,l.user_action,l.level,e.lastname,e.middlename,e.id as empid,
        ur.name as userrole,d.name designame');
        $this->db->from('log_details l');
        $this->db->join('system_user su', 'l.system_user_id = su.id', 'inner');
        $this->db->join('employee e', 'su.employee_id1 = e.id', 'inner');
        $this->db->join('designation_history dh', 'e.id = dh.employee_id and dh.from_date = (select max(from_date) from designation_history where designation_history.employee_id = e.id)', 'inner');
        $this->db->join('designation d', 'dh.designation_id = d.id', 'inner');
        $this->db->join('user_role ur', 'su.user_role_id = ur.id', 'inner');
        $this->db->where('l.date_time BETWEEN "' . $fdate . '" and "' . $tdate . '"');
        $this->db->order_by('l.id', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}