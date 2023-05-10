<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/2/2022
 * Time: 12:06 PM
 */

class req_engage_model extends CI_Model
{
    public function getallEngReq()
    {
        $this->db->select('jr.jobId,jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,
        e.lastname as reqByL, e.middlename as reqByI');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->order_by('jr.reqDate', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getallOfcrEngReq($sType)
    {
        $this->db->select('jr.jobId,jr.jobName,jr.jobDisc,jr.reqDate,jr.employee_id,jr.jobStage,
        e.lastname as reqByL, e.middlename as reqByI');
        $this->db->from('job_request jr');
        $this->db->join('employee e', 'jr.employee_id = e.id', 'inner');
        $this->db->where('jr.assignRole', $sType);
        $this->db->order_by('jr.reqDate', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setReqProgress($reqId, $stage, $reqAdminRmk, $userRead, $ofcrRead, $createDate, $endDate, $updateBy)
    {
        if ($stage >= 1 && $stage != 5) {
            $values = array('jobStage' => $stage, 'jobStartDate' => $createDate, 'updateBy' => $updateBy, 'updateDate' => $createDate,
                'userRead' => $userRead, 'officerRead' => $ofcrRead, 'officerRemark' => $reqAdminRmk);

        } elseif ($stage == 5) {

            $values = array('jobStage' => $stage, 'jobEndDate' => $endDate, 'updateBy' => $updateBy, 'updateDate' => $createDate,
                'userRead' => $userRead, 'officerRead' => $ofcrRead, 'officerRemark' => $reqAdminRmk);

        } else {

            $values = array('jobStage' => $stage, 'updateBy' => $updateBy, 'updateDate' => $createDate,
                'userRead' => $userRead, 'officerRead' => $ofcrRead, 'officerRemark' => $reqAdminRmk);

        }

        $this->db->where('jobId', $reqId);

        $this->db->update('job_request', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }

    public function setAdminOfcrRead($reqId)
    {

        $values = array('officerRead' => 0);

        $this->db->where('jobId', $reqId);

        $this->db->update('job_request', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }

}