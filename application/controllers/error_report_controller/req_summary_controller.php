<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/2/2022
 * Time: 10:14 AM
 */

class req_summary_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('error_report_model/req_summary_model');
        $this->load->model('main_model');
    }

    public function reqSummaryView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 2) {

                $empNo = $_SESSION['empNo'];
                $uName = $_SESSION['user'];


                if (isset($_GET['jobid']) && isset($_GET['click'])) {

                    $reqId = $_GET['jobid'];
                    $click = $_GET['click'];

                    if ($click == 1) {

                        $readRes = $this->req_summary_model->setUserReadOne($reqId);

                        if ($readRes == false) {

                            $this->session->set_flashdata("error", "Error Occured");
                            redirect("main_controller/dashboardView", "refresh");

                        }

                    } elseif ($click == 2) {

                        $readRes = $this->req_summary_model->setUserReadAll($empNo, $uName);

                        if ($readRes == false) {

                            $this->session->set_flashdata("error", "Error Occured");
                            redirect("main_controller/dashboardView", "refresh");

                        }

                    }

                    $userHeadData = $this->main_model->getUserHeadData($empNo, $uName);
                    $userHeadCount = $this->main_model->getUserHeadCount($empNo, $uName);

                    $summaryData['headDta'] = $userHeadData;
                    $summaryData['text'] = "Updated Your Request";
                    $summaryData['notfCount'] = $userHeadCount->unread;


                    $usrResult = $this->req_summary_model->getReqSummary($empNo, $uName);

                    $summaryData['sumData'] = $usrResult;

                    $this->load->view("error_report/req_summary", $summaryData);


                } else {

                    $userHeadData = $this->main_model->getUserHeadData($empNo, $uName);
                    $userHeadCount = $this->main_model->getUserHeadCount($empNo, $uName);

                    $summaryData['headDta'] = $userHeadData;
                    $summaryData['text'] = "Updated Your Request";
                    $summaryData['notfCount'] = $userHeadCount->unread;


                    $usrResult = $this->req_summary_model->getReqSummary($empNo, $uName);

                    $summaryData['sumData'] = $usrResult;

                    $this->load->view("error_report/req_summary", $summaryData);

                }


            } elseif ($_SESSION['user_role'] == 13) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $summaryData['headDta'] = $userHeadData;
                $summaryData['text'] = "Applied new Request";
                $summaryData['notfCount'] = $userHeadCount->unread;


                $comOfcrResult = $this->req_summary_model->getReqSummaryCombOfcr();

                $summaryData['sumData'] = $comOfcrResult;

                $this->load->view("error_report/req_summary", $summaryData);


            } elseif ($_SESSION['user_role'] == 14) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $summaryData['headDta'] = $userHeadData;
                $summaryData['text'] = "Applied new Request";
                $summaryData['notfCount'] = $userHeadCount->unread;

                $deptOfcrResult = $this->req_summary_model->getReqSummaryDeptOfcr();

                $summaryData['sumData'] = $deptOfcrResult;

                $this->load->view("error_report/req_summary", $summaryData);


            } elseif ($_SESSION['user_role'] == 15) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $summaryData['headDta'] = $userHeadData;
                $summaryData['text'] = "Applied new Request";
                $summaryData['notfCount'] = $userHeadCount->unread;

                $survOfcrResult = $this->req_summary_model->getReqSummarySurvOfcr();

                $summaryData['sumData'] = $survOfcrResult;

                $this->load->view("error_report/req_summary", $summaryData);


            } elseif ($_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $summaryData['headDta'] = $userHeadData;
                $summaryData['text'] = "Applied new Request";
                $summaryData['notfCount'] = $userHeadCount->unread;

                $sfaOfcrResult = $this->req_summary_model->getReqSummarySfaOfcr();

                $summaryData['sumData'] = $sfaOfcrResult;

                $this->load->view("error_report/req_summary", $summaryData);


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