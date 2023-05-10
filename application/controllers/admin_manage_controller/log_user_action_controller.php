<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 12:42 PM
 */

class log_user_action_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_manage_model/log_user_action_model');
        $this->load->model('main_model');

    }

    public function viewTblData()
    {
        $this->form_validation->set_rules("sdate", "From Date", "required");
        $this->form_validation->set_rules("tdate", "To Date", "required");

        if ($this->form_validation->run() === false) {

            $this->logUserActionView();

        } else {

            if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;
            }

            $fromDate = $this->input->post('sdate');
            $toDate = $this->input->post('tdate');

            $conFdate = date("Y-m-d", strtotime($fromDate));
            $conTdate = date("Y-m-d", strtotime($toDate));

            $result = $this->log_user_action_model->getLogsActions($conFdate, $conTdate);

            if ($result != false) {

                $data['logData'] = $result;

                $this->load->view('admin_management/log_user_action', $data);

            } else {
                $this->session->set_flashdata("error", "Error occured while Generating Data");
                redirect("admin_manage_controller/log_user_action_controller/logUserActionView", "refresh");

            }
        }

    }

    public function logUserActionView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $headData['headDta'] = $userHeadData;
                $headData['text'] = "Applied new Request";
                $headData['notfCount'] = $userHeadCount->unread;


                $this->load->view('admin_management/log_user_action', $headData);


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