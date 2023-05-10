<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/10/2022
 * Time: 9:06 PM
 */

class create_office_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_manage_model/create_office_model');
        $this->load->model('main_model');

    }

    public function createOffice()
    {
        $this->form_validation->set_rules("ofzname", "Office Name", "required|regex_match[/^([a-z0-9 ])+$/i]|max_length[500]");

        if ($this->form_validation->run() === false) {

            $this->createOfficeView();

        } else {

            $createBy = $_SESSION['user'];
            $createDate = date("Y-m-d h:i:s", time());

            $office = $this->input->post('ofzname');
            $status = 1;

            $result = $this->create_office_model->setOffice($office, $status, $createBy, $createDate);

            if ($result != false) {

                $action = "New Office Created";
                $priority = "Mid";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                $this->session->set_flashdata("success", "New Office created Successfully");
                redirect("admin_manage_controller/create_office_controller/createOfficeView", "refresh");

            } else {
                $this->session->set_flashdata("error", "Error occured while creating this office");
                redirect("admin_manage_controller/create_office_controller/createOfficeView", "refresh");

            }


        }
    }

    public function createOfficeView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;

                $result = $this->create_office_model->getOffice();

                $data['offices'] = $result;

                $this->load->view('admin_management/create_office', $data);

            } else {
                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }

    }


    public function updateOfzStatus()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('oid');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->create_office_model->setOfzStatus($id, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Office Active/Deactive Status Updated";
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {
            echo false;
        }
    }
}