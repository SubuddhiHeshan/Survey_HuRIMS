<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/19/2022
 * Time: 11:41 AM
 */

class employee_retire_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('emp_manage_model/employee_retire_model');
        $this->load->model('main_model');

    }

    public function allEmpRetireView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $ResignAgeCheckDate = date("Y-m-d", strtotime(" +1 months"));

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 13) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $retireViewData['headDta'] = $userHeadData;
                $retireViewData['text'] = "Applied new Request";
                $retireViewData['notfCount'] = $userHeadCount->unread;

                $resEmpREtireAll = $this->employee_retire_model->getCombEmpRetireAll($ResignAgeCheckDate);

                $retireViewData['empToRetire'] = $resEmpREtireAll;


            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 14) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $retireViewData['headDta'] = $userHeadData;
                $retireViewData['text'] = "Applied new Request";
                $retireViewData['notfCount'] = $userHeadCount->unread;

                $resEmpREtireAll = $this->employee_retire_model->getDeptEmpRetireAll($ResignAgeCheckDate);

                $retireViewData['empToRetire'] = $resEmpREtireAll;


            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 15) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $retireViewData['headDta'] = $userHeadData;
                $retireViewData['text'] = "Applied new Request";
                $retireViewData['notfCount'] = $userHeadCount->unread;

                $resEmpREtireAll = $this->employee_retire_model->getSurvEmpRetireAll($ResignAgeCheckDate);

                $retireViewData['empToRetire'] = $resEmpREtireAll;

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $retireViewData['headDta'] = $userHeadData;
                $retireViewData['text'] = "Applied new Request";
                $retireViewData['notfCount'] = $userHeadCount->unread;

                $resEmpREtireAll = $this->employee_retire_model->getSfaEmpRetireAll($ResignAgeCheckDate);

                $retireViewData['empToRetire'] = $resEmpREtireAll;

            } else {

                $this->session->set_flashdata("error", "You are not Authorize to access this page");
                redirect("main_controller/dashboardView", "refresh");

            }

            $this->load->view('employee_management/employee_retire', $retireViewData);


        } else {
            $this->session->set_flashdata("error", "Please Log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }
}