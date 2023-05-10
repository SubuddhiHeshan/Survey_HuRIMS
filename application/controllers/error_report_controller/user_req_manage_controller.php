<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/1/2022
 * Time: 10:24 AM
 */

class user_req_manage_controller extends CI_Controller
{

    public function __construct()
    {
        parent:: __construct();

        $this->load->model('error_report_model/user_req_manage_model');
        $this->load->model('main_model');


    }


    public function manageReqView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role']) {

                $empNo = $_SESSION['empNo'];
                $user = $_SESSION['user'];

                $userHeadData = $this->main_model->getUserHeadData($empNo, $user);
                $userHeadCount = $this->main_model->getUserHeadCount($empNo, $user);

                $manageData['headDta'] = $userHeadData;
                $manageData['text'] = "Updated Your Request";
                $manageData['notfCount'] = $userHeadCount->unread;


                $result = $this->user_req_manage_model->getRequestData($empNo, $user);

                $manageData['requests'] = $result;

                $this->load->view('error_report/user_req_manage', $manageData);


            } else {

                $this->session->set_flashdata("error", "You are not authorize to access this page");
                redirect("main_controller/dashboardView", "refresh");

            }


        } else {

            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }


    public function deleteRequest()
    {
        $jobId = $this->input->post('jobid');

        $result = $this->user_req_manage_model->setDeleteReq($jobId);

        if ($result != false) {

            $action = "User Request Deleted" . ' - ' . $jobId;
            $priority = "High";
            $createDate = date("Y-m-d h:i:s", time());

            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);
            echo true;
        } else {
            echo false;
        }


    }

    public function updateRequest()
    {
        $jobId = $this->input->post('jobId');
        $jobName = $this->input->post('reqtitle');
        $jobDesc = $this->input->post('dsc');

        $result = $this->user_req_manage_model->setUpdateReq($jobId, $jobName, $jobDesc);

        if ($result != false) {
            $action = "User Request Updated" . ' - ' . $jobId;
            $priority = "Mid";
            $createDate = date("Y-m-d h:i:s", time());

            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

            $this->session->set_flashdata("success", "Successfully Updated your request");
            redirect("error_report_controller/user_req_manage_controller/manageReqView", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error occured while updating this request");
            redirect("error_report_controller/user_req_manage_controller/manageReqView", "refresh");

        }


    }
}