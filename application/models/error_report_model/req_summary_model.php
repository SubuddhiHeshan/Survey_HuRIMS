<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/2/2022
 * Time: 10:25 AM
 */

class req_summary_model extends CI_Model
{

    public function getReqSummary($empNo, $username)
    {
        $this->db->select('jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,jr.jobStartDate,jr.jobEndDate,jr.updateDate,jr.officerRemark,
        e.lastname as reqByL, e.middlename as reqByI,es.lastname as upBy');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee es', 'su.employee_id1 = es.id', 'inner');
        $this->db->where(array('employee_id' => $empNo, 'reqBy' => $username));
        $this->db->order_by('jr.jobStage', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReqSummaryCombOfcr()
    {
        $this->db->select('jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,jr.jobStartDate,jr.jobEndDate,jr.updateDate,jr.officerRemark,
        e.lastname as reqByL, e.middlename as reqByI,es.lastname as upBy');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee es', 'su.employee_id1 = es.id', 'inner');
        $this->db->where('assignRole', 13);
        $this->db->order_by('jr.jobStage', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReqSummaryDeptOfcr()
    {
        $this->db->select('jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,jr.jobStartDate,jr.jobEndDate,jr.updateDate,jr.officerRemark,
        e.lastname as reqByL, e.middlename as reqByI,es.lastname as upBy');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee es', 'su.employee_id1 = es.id', 'inner');
        $this->db->where('assignRole', 14);
        $this->db->order_by('jr.jobStage', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReqSummarySurvOfcr()
    {
        $this->db->select('jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,jr.jobStartDate,jr.jobEndDate,jr.updateDate,jr.officerRemark,
        e.lastname as reqByL, e.middlename as reqByI,es.lastname as upBy');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee es', 'su.employee_id1 = es.id', 'inner');
        $this->db->where('assignRole', 15);
        $this->db->order_by('jr.jobStage', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReqSummarySfaOfcr()
    {
        $this->db->select('jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,jr.jobStartDate,jr.jobEndDate,jr.updateDate,jr.officerRemark,
        e.lastname as reqByL, e.middlename as reqByI,es.lastname as upBy');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->join('system_user su', 'jr.updateBy = su.user_name', 'inner');
        $this->db->join('employee es', 'su.employee_id1 = es.id', 'inner');
        $this->db->where('assignRole', 16);
        $this->db->order_by('jr.jobStage', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setUserReadOne($reqId)
    {

        $values = array('userRead' => 0);

        $this->db->where('jobId', $reqId);

        $this->db->update('job_request', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }

    public function setUserReadAll($empNo, $uName)
    {

        $values = array('userRead' => 0);

        $this->db->where(array('employee_id' => $empNo, 'reqBy' => $uName));

        $this->db->update('job_request', $values);

        return ($this->db->affected_rows() >= 1) ? true : false;


    }
}