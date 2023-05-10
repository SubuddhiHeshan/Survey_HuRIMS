<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 11:07 AM
 */

class create_salcode_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_manage_model/create_salcode_model');
        $this->load->model('main_model');


    }

    public function updateSalcodeStatus()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('salid');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->create_salcode_model->setSalcodeStatus($id, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Salary Code  Active/Deactive Status Updated";
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {
            echo false;
        }

    }

    public function createSalcode()
    {
        $this->form_validation->set_rules("salcode", "Salary Code", "required");

        if ($this->form_validation->run() === false) {

            $this->createSalcodeView();

        } else {
            $salaryCode = $this->input->post('salcode');

            $salcodeValRespo = $this->create_salcode_model->getSalcodeVal($salaryCode);

            if ($salcodeValRespo != true) {

                $createBy = $_SESSION['user'];
                $createDate = date("Y-m-d h:i:s", time());
                $status = 1;
                $salUp = strtoupper($salaryCode);

                $result = $this->create_salcode_model->setSalarycode($salUp, $status, $createBy, $createDate);

                if ($result != false) {

                    $action = "New Salary Code Created";
                    $priority = "Mid";

                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                    $this->session->set_flashdata("success", "New Salary Code created Successfully");
                    redirect("admin_manage_controller/create_salcode_controller/createSalcodeView", "refresh");

                } else {
                    $this->session->set_flashdata("error", "Error occured while creating this Salary Code");
                    redirect("admin_manage_controller/create_salcode_controller/createSalcodeView", "refresh");

                }
            } else {

                $this->session->set_flashdata("error", "This Salary Code is already registered in the system");
                redirect("admin_manage_controller/create_salcode_controller/createSalcodeView", "refresh");

            }


        }
    }

    public function createSalcodeView()

    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;

                $result = $this->create_salcode_model->getSalcodes();

                $data['salall'] = $result;


                $this->load->view('admin_management/create_salcode', $data);

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