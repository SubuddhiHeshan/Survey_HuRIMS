<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/1/2022
 * Time: 10:33 AM
 */

class user_req_manage_model extends CI_Model
{

    public function getRequestData($empNo, $username)
    {

        $this->db->select('jobId,jobName,jobDisc,reqDate,jobStage');
        $this->db->from('job_request');
        $this->db->where(array('employee_id' => $empNo, 'reqBy' => $username));
        $this->db->order_by('reqDate', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setDeleteReq($reqID)
    {
        $this->db->where('jobId', $reqID);
        $this->db->delete('job_request');

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setUpdateReq($jobId, $jobName, $jobDesc)
    {
        $values = array('jobName' => $jobName, 'jobDisc' => $jobDesc);

        $this->db->where('jobId', $jobId);

        $this->db->update('job_request', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

}