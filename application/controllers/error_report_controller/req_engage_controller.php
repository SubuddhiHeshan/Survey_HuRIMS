<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/2/2022
 * Time: 11:55 AM
 */

class req_engage_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_model');
        $this->load->model('error_report_model/req_engage_model');
    }

    public function reqEngageView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                if (isset($_GET['jobid']) && isset($_GET['click'])) {

                    $reqId = $_GET['jobid'];
                    $click = $_GET['click'];

                    if ($click == 1) {
                        $readRes = $this->req_engage_model->setAdminOfcrRead($reqId);

                        if ($readRes == false) {

                            $this->session->set_flashdata("error", "Error Occured");
                            redirect("main_controller/dashboardView", "refresh");

                        }

                    }

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $engageReq['headDta'] = $userHeadData;
                    $engageReq['text'] = "Applied new Request";
                    $engageReq['notfCount'] = $userHeadCount->unread;

                    $servRole = $_SESSION['user_role'];

                    $result = $this->req_engage_model->getallOfcrEngReq($servRole);

                    $engageReq['allReq'] = $result;

                    $this->load->view("error_report/req_engage", $engageReq);

                } else {
                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $engageReq['headDta'] = $userHeadData;
                    $engageReq['text'] = "Applied new Request";
                    $engageReq['notfCount'] = $userHeadCount->unread;

                    $servRole = $_SESSION['user_role'];

                    $result = $this->req_engage_model->getallOfcrEngReq($servRole);

                    $engageReq['allReq'] = $result;

                    $this->load->view("error_report/req_engage", $engageReq);

                }


            } elseif ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                if (isset($_GET['jobid']) && isset($_GET['click'])) {

                    $reqId = $_GET['jobid'];
                    $click = $_GET['click'];

                    if ($click == 1) {
                        $readRes = $this->req_engage_model->setAdminOfcrRead($reqId);

                        if ($readRes == false) {

                            $this->session->set_flashdata("error", "Error Occured");
                            redirect("main_controller/dashboardView", "refresh");

                        }

                    }
                    $userHeadData = $this->main_model->getAdminHeadData();
                    $userHeadCount = $this->main_model->getAdminHeadCount();

                    $engageReq['headDta'] = $userHeadData;
                    $engageReq['text'] = "Applied new Request";
                    $engageReq['notfCount'] = $userHeadCount->unread;

                    $result = $this->req_engage_model->getallEngReq();

                    $engageReq['allReq'] = $result;

                    $this->load->view("error_report/req_engage", $engageReq);


                } else {

                    $userHeadData = $this->main_model->getAdminHeadData();
                    $userHeadCount = $this->main_model->getAdminHeadCount();

                    $engageReq['headDta'] = $userHeadData;
                    $engageReq['text'] = "Applied new Request";
                    $engageReq['notfCount'] = $userHeadCount->unread;

                    $result = $this->req_engage_model->getallEngReq();

                    $engageReq['allReq'] = $result;

                    $this->load->view("error_report/req_engage", $engageReq);

                }


            } else {

                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");
            }


        } else {

            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }

    public function updateReqProgress()
    {
        $reqId = $this->input->post('jobid');
        $reqStage = $this->input->post('progress');
        $reqAdminRmk = $this->input->post('rmk');
        $userRead = 1;
        $ofcrRead = 0;
        $createDate = date("Y-m-d h:i:s", time());
        $endDate = date("Y-m-d h:i:s", time());

        $updateBy = $_SESSION['user'];

        switch ($reqStage) {
            case "Not Engaged" :
                $stage = 0;
                break;
            case "10% Completed":
                $stage = 1;
                break;
            case "25% Completed":
                $stage = 2;
                break;
            case "50% Completed":
                $stage = 3;
                break;
            case "75% Completed":
                $stage = 4;
                break;
            case "100% Completed":
                $stage = 5;
                break;
            default:
                $stage = 0;
                break;
        }

        $result = $this->req_engage_model->setReqProgress($reqId, $stage, $reqAdminRmk, $userRead, $ofcrRead, $createDate, $endDate, $updateBy);

        if ($result != false) {

            $action = "User Request Progress Updated" . ' - ' . $reqId;
            $priority = "Mid";

            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

            $this->session->set_flashdata("success", "Successfully Updated Progress");
            redirect("error_report_controller/req_engage_controller/reqEngageView", "refresh");

        } else {

            $this->session->set_flashdata("error", "Error occured while updating the progress");
            redirect("error_report_controller/req_engage_controller/reqEngageView", "refresh");


        }

    }
}