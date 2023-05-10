<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/20/2022
 * Time: 12:11 PM
 */

class find_emp_info_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('employee_tracker_model/find_emp_info_model');
        $this->load->model('emp_manage_model/emp_full_data_view_model');
        $this->load->model('main_model');

    }

    public function empNoCheck()
    {
        $empNo = $this->input->post('employee');

        $result = $this->find_emp_info_model->getEmpCheckName($empNo);

        $data['fullname'] = $result->middlename . ' ' . $result->lastname;

        echo json_encode($data);
    }

    public function viewFullEmpCardInfo()
    {

        $this->form_validation->set_rules("empNo", "Employee Number", "required|numeric");

        if ($this->form_validation->run() === false) {

            $this->findEmpView();

        } else {

            $empNo = $this->input->post('empNo');

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

                if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                    $userHeadData = $this->main_model->getAdminHeadData();
                    $userHeadCount = $this->main_model->getAdminHeadCount();

                    $empFullViewData['headDta'] = $userHeadData;
                    $empFullViewData['text'] = "Applied new Request";
                    $empFullViewData['notfCount'] = $userHeadCount->unread;

                } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $empFullViewData['headDta'] = $userHeadData;
                    $empFullViewData['text'] = "Applied new Request";
                    $empFullViewData['notfCount'] = $userHeadCount->unread;

                }

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


        }
    }

    public function findEmpView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $headData['headDta'] = $userHeadData;
                $headData['text'] = "Applied new Request";
                $headData['notfCount'] = $userHeadCount->unread;

                $this->load->view('employee_tracker/find_employee_info', $headData);


            } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $headData['headDta'] = $userHeadData;
                $headData['text'] = "Applied new Request";
                $headData['notfCount'] = $userHeadCount->unread;

                $this->load->view('employee_tracker/find_employee_info', $headData);


            } else {

                $this->session->set_flashdata("error", "You are not authorize to access this page");
                redirect("main_controller/dashboardView", "refresh");
            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }
}