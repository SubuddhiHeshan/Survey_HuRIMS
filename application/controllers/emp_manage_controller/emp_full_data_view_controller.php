<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/19/2022
 * Time: 12:19 PM
 */
class emp_full_data_view_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('emp_manage_model/emp_full_data_view_model');
        $this->load->model('main_model');
    }

    public function empFullDataView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $empNo = $_GET['empId'];

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2) {

                $empProfileData = $this->emp_full_data_view_model->getEmpData($empNo);
                $spouseData = $this->emp_full_data_view_model->getSpouseDetails($empNo);
                $incrementData = $this->emp_full_data_view_model->getIncrementDetails($empNo);
                $clearData = $this->emp_full_data_view_model->getClearanceDetails($empNo);
                $jobHisData = $this->emp_full_data_view_model->getJobhistDetails($empNo);
                $desigHisData = $this->emp_full_data_view_model->getDesighistDetails($empNo);
                $annualLeaveData = $this->emp_full_data_view_model->getAnnualLeaveDetails($empNo);
                $commendData = $this->emp_full_data_view_model->getCommendDetails($empNo);
                $ebdData = $this->emp_full_data_view_model->getEbDetails($empNo);
                $trainningData = $this->emp_full_data_view_model->getTrainningDetails($empNo);
                $desciplineData = $this->emp_full_data_view_model->getDesciplineActDetails($empNo);


                if ($empProfileData != false) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $empFullViewData['headDta'] = $userHeadData;
                    $empFullViewData['text'] = "Applied new Request";
                    $empFullViewData['notfCount'] = $userHeadCount->unread;

                    $empFullViewData['maindata'] = $empProfileData;
                    $empFullViewData['sData'] = $spouseData;
                    $empFullViewData['increData'] = $incrementData;
                    $empFullViewData['clearanceData'] = $clearData;
                    $empFullViewData['JobHData'] = $jobHisData;
                    $empFullViewData['desigHData'] = $desigHisData;
                    $empFullViewData['leave'] = $annualLeaveData;
                    $empFullViewData['commendation'] = $commendData;
                    $empFullViewData['ebData'] = $ebdData;
                    $empFullViewData['TrngData'] = $trainningData;
                    $empFullViewData['descipData'] = $desciplineData;

                    $this->load->view('employee_management/emp_full_data_view', $empFullViewData);
                } else {

                    $this->session->set_flashdata("error", "This User doesn't have data to view");
                    redirect("main_controller/dashboardView", "refresh");

                }


            } else {

                $this->session->set_flashdata("error", "You do not have privillage to access this function");
                redirect("main_controller/dashboardView", "refresh");


            }

        } else {
            $this->session->set_flashdata("error", "Please Log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }
}