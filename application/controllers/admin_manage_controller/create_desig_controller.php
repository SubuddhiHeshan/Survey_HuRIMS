<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/27/2022
 * Time: 11:38 AM
 */

class create_desig_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('register_model');
        $this->load->model('admin_manage_model/create_desig_model');
        $this->load->model('main_model');


    }

    public function createDesignation()
    {
        $this->form_validation->set_rules("desgEng", "Designation English", "required|regex_match[/^([a-z ])+$/i]|max_length[500]");
        $this->form_validation->set_rules("desgSin", "Designation Sinhala", "required|max_length[500]");
        $this->form_validation->set_rules("desgTam", "Designation Tamil", "max_length[500]");
        $this->form_validation->set_rules("service", "Service", "required|numeric");
        $this->form_validation->set_rules("salcode", "Salary Code", "required|numeric");
        $this->form_validation->set_rules("appCarder", "Approved Carder", "required|numeric");

        if ($this->form_validation->run() === false) {

            $this->createDesigView();

        } else {

            $createBy = $_SESSION['user'];
            $createDate = date("Y-m-d h:i:s", time());

            $dEng = $this->input->post('desgEng');
            $dSin = $this->input->post('desgSin');
            $dTam = $this->input->post('desgTam');
            $service = $this->input->post('service');
            $salcode = $this->input->post('salcode');
            $apprdcarder = $this->input->post('appCarder');
            $status = 1;

            $result = $this->create_desig_model->setDesignation($dEng, $dSin, $dTam, $service, $salcode, $apprdcarder, $status, $createBy, $createDate);

            if ($result != false) {

                $action = "New Designation Created";
                $priority = "Mid";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                $this->session->set_flashdata("success", "New Designation created Successfully");
                redirect("admin_manage_controller/create_desig_controller/createDesigView", "refresh");

            } else {
                $this->session->set_flashdata("error", "Error occured while creating this designation");
                redirect("admin_manage_controller/create_desig_controller/createDesigView", "refresh");

            }


        }

    }

    public function createDesigView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;

                $result1 = $this->register_model->getServices();
                $result2 = $this->register_model->getSalCodes();

                $result3 = $this->create_desig_model->getDesignations();

                $data['serv'] = $result1;
                $data['salc'] = $result2;
                $data['allDesg'] = $result3;

                $this->load->view('admin_management/create_designation', $data);

            } else {
                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");

            }

        } else {

            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }
    }

    public function updateDesignationStatus()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('dId');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->create_desig_model->setDesigStatus($id, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Designation Active/Deactive Status Updated";
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {
            echo false;
        }
    }
}