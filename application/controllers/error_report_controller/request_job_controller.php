<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/30/2022
 * Time: 6:58 PM
 */

class request_job_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_model');
        $this->load->model('error_report_model/request_job_model');
    }

    public function requestUpdate()
    {
        $this->form_validation->set_rules("jobName", "Request Title", "required");
        $this->form_validation->set_rules("jobrmks", "Request Remark", "required");


        if ($this->form_validation->run() === false) {

            $this->requestJobView();

        } else {

            $requestTitle = $this->input->post('jobName');
            $requestRemk = $this->input->post('jobrmks');
            $reqEmpId = $_SESSION['empNo'];
            $reqUsername = $_SESSION['user'];
            $createDate = date("Y-m-d h:i:s", time());
            $did = $_SESSION['designation'];

            if ($did == 26 || $did == 27 || $did == 28 || $did == 49 || $did == 50 || $did == 51 || $did == 52 || $did == 53 || $did == 54 ||
                $did == 55 || $did == 56 || $did == 57 || $did == 58 || $did == 59 || $did == 60 || $did == 62 || $did == 69 || $did == 71 ||
                $did == 72 || $did == 73) {

                $assgRole = 13;

            } elseif ($did == 8 || $did == 9 || $did == 10 || $did == 11 || $did == 12 || $did == 13 || $did == 14 || $did == 15 || $did == 16 || $did == 17 || $did == 18 ||
                $did == 19 || $did == 20 || $did == 21 || $did == 22 || $did == 23 || $did == 24 || $did == 25 || $did == 29 || $did == 30 || $did == 33 || $did == 34 || $did == 35 ||
                $did == 36 || $did == 37 || $did == 38 || $did == 39 || $did == 40 || $did == 41 || $did == 42 || $did == 43 || $did == 44 || $did == 45 || $did == 47 || $did == 48 ||
                $did == 76) {

                $assgRole = 14;

            } elseif ($did == 1 || $did == 2 || $did == 3 || $did == 4 || $did == 5 || $did == 6 || $did == 7 || $did == 67 || $did == 68 || $did == 74 || $did == 75 ||
                $did == 78) {

                $assgRole = 15;

            } elseif ($did == 61 || $did == 64 || $did == 65 || $did == 66 || $did == 77) {

                $assgRole = 16;

            }

            $result = $this->request_job_model->setReqJob($requestTitle, $requestRemk, $reqEmpId, $reqUsername, $createDate, $assgRole);

            if ($result != false) {

                $action = "New User Request Submitted";
                $priority = "Mid";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                $this->session->set_flashdata("success", "Successfully submitted your request");
                redirect("error_report_controller/request_job_controller/requestJobView", "refresh");


            } else {

                $this->session->set_flashdata("error", "Error Occured while submitting this data");
                redirect("error_report_controller/request_job_controller/requestJobView", "refresh");


            }

        }

    }

    public function requestJobView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 2) {

                $empID = $_SESSION['empNo'];
                $username = $_SESSION['user'];

                $userHeadData = $this->main_model->getUserHeadData($empID, $username);
                $userHeadCount = $this->main_model->getUserHeadCount($empID, $username);

                $headerData['headDta'] = $userHeadData;
                $headerData['text'] = "Updated Your Request";
                $headerData['notfCount'] = $userHeadCount->unread;


                $this->load->view('error_report/request_job', $headerData);

            } else {

                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");

            }

        } else {

            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }

    }
}