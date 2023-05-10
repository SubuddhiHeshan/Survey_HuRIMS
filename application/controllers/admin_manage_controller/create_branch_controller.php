<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/11/2022
 * Time: 3:52 PM
 */

class create_branch_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_model');
        $this->load->model('admin_manage_model/create_branch_model');


    }

    public function updateBrnchStatus()
    {
        $status = $this->input->post('status');
        $id = $this->input->post('bid');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->create_branch_model->setBranchStatus($id, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Branch Active/Deactive Status Updated";
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {
            echo false;
        }
    }

    public function ofzIdValidate()
    {
        $branchID = $this->input->post('branch');

        $result = $this->create_branch_model->getBranIdVal($branchID);

        if ($result == true) {

            $_SESSION['br_id_validate'] = true;
            echo true;

        } else {
            $_SESSION['br_id_validate'] = false;

            echo false;
        }

    }

    public function createBranch()
    {
        $this->form_validation->set_rules("brId", "Branch Code", "required|numeric");
        $this->form_validation->set_rules("ofztype", "Office Type", "required|numeric");
        $this->form_validation->set_rules("dist", "District", "required|numeric");
        $this->form_validation->set_rules("provId", "Province ID", "required|numeric");
        $this->form_validation->set_rules("brname", "Branch Name", "required|regex_match[/^([a-z0-9- ])+$/i]");
        $this->form_validation->set_rules("orderId", "Order Id", "required|numeric");
        $this->form_validation->set_rules("add1", "Addres Line 1", "required|max_length[500]");
        $this->form_validation->set_rules("add2", "Addres Line 2", "max_length[500]");
        $this->form_validation->set_rules("add3", "Addres Line 3", "max_length[500]");
        $this->form_validation->set_rules("tele", "Telephone", "numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("fax", "Fax", "numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("email", "Email", "valid_email");


        if ($this->form_validation->run() === false) {

            $this->createBranchView();

        } else {

            if (isset($_SESSION['br_id_validate']) && $_SESSION['br_id_validate'] == false) {

                $createBy = $_SESSION['user'];
                $createDate = date("Y-m-d h:i:s", time());

                $brCode = $this->input->post('brId');
                $ofzId = $this->input->post('ofztype');
                $distId = $this->input->post('dist');
                $provId = $this->input->post('provId');
                $brName = $this->input->post('brname');
                $orderId = $this->input->post('orderId');
                $add1 = $this->input->post('add1');
                $add2 = $this->input->post('add2');
                $add3 = $this->input->post('add3');
                $tele = $this->input->post('tele');
                $fax = $this->input->post('fax');
                $mail = $this->input->post('email');

                $status = 1;


                $result = $this->create_branch_model->setBranch($brCode, $ofzId, $distId, $provId, $brName, $orderId, $add1, $add2, $add3,
                    $tele, $fax, $mail, $status, $createBy, $createDate);

                if ($result != false) {

                    unset($_SESSION['br_id_validate']);

                    $action = "New Branch Created";
                    $priority = "Mid";

                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                    $this->session->set_flashdata("success", "New Branch created Successfully");
                    redirect("admin_manage_controller/create_branch_controller/createBranchView", "refresh");

                } else {
                    $this->session->set_flashdata("error", "Error occured while creating this branch");
                    redirect("admin_manage_controller/create_branch_controller/createBranchView", "refresh");

                }

            } else {

                $this->session->set_flashdata("error", "This Branch code already registered in the system");
                redirect("admin_manage_controller/create_branch_controller/createBranchView", "refresh");

            }


        }


    }

    public function createBranchView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;

                $result1 = $this->create_branch_model->getBranches();
                $result2 = $this->create_branch_model->getOffices();
                $result3 = $this->create_branch_model->getDistricts();

                $data['allbranc'] = $result1;
                $data['office'] = $result2;
                $data['district'] = $result3;

                $this->load->view('admin_management/create_branch', $data);

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