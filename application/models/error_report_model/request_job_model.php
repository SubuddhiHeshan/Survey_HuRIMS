<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/30/2022
 * Time: 6:59 PM
 */

class request_job_model extends CI_Model
{

    public function setReqJob($requestTitle, $requestRemk, $reqEmpId, $reqUsername, $createDate, $assgRole)
    {
        $values = array('jobName' => $requestTitle, 'jobDisc' => $requestRemk, 'employee_id' => $reqEmpId, 'reqBy' => $reqUsername,
            'reqDate' => $createDate, 'assignRole' => $assgRole);

        $this->db->insert('job_request', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }
}