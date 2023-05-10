<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/14/2022
 * Time: 10:23 AM
 */

class create_login_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin_manage_model/create_login_model');
        $this->load->model('main_model');


    }

    public function createLoginView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $data['headDta'] = $userHeadData;
                $data['text'] = "Applied new Request";
                $data['notfCount'] = $userHeadCount->unread;

                $result = $this->create_login_model->getUserRoles();

                $data['userRoles'] = $result;

                $this->load->view('admin_management/create_login', $data);

            } else {
                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }
    }

    public function empNoValidate()
    {
        $empNo = $this->input->post('employee');

        $result = $this->create_login_model->getEmpData($empNo);

        if ($result != false) {

            $_SESSION['empNo_validate'] = true;

            $data['mName'] = $result->middlename;
            $data['lName'] = $result->lastname;
            $data['branch'] = $result->branch;
            $data['desig'] = $result->desig;

            echo json_encode($data);
        } else {
            $_SESSION['empNo_validate'] = false;
        }


    }

    public function userRoleValidate()
    {
        $empNo = $this->input->post('employee');
        $role = $this->input->post('uRole');

        $result = $this->create_login_model->getUserRoleVal($empNo, $role);

        if ($result == true) {
            $_SESSION['userRole_validate'] = true;
            echo true;
        } else {

            $_SESSION['userRole_validate'] = false;
        }
    }

    public function usernameValidate()
    {
        $username = $this->input->post('uName');

        $result = $this->create_login_model->getUserNameVal($username);

        if ($result == true) {
            $_SESSION['userName_validate'] = true;
            echo true;
        } else {
            $_SESSION['userName_validate'] = false;
        }


    }

    public function createNewLogin()
    {

        if (isset($_SESSION['empNo_validate']) && $_SESSION['empNo_validate'] == true &&
            isset($_SESSION['userRole_validate']) && $_SESSION['userRole_validate'] == false &&
            isset($_SESSION['userName_validate']) && $_SESSION['userName_validate'] == false) {

            $empno = $this->input->post('empNo');
            $urole = $this->input->post('role');
            $username = $this->input->post('username');
            $ectpwd = md5($this->input->post('pwd'));


            $result = $this->create_login_model->getDatatoLogin($empno);

            if ($result != false) {

                $createDate = date("Y-m-d h:i:s", time());
                $updateBy = $_SESSION['user'];

                $lname = $result->lastname;
                $serviceType = $result->serviceid;
                $assgOfz = $result->office;
                $userStatus = 1;
                $lockStatus = 1;

                $createUserLoginRes = $this->main_model->setnewUSerLogin($username, $ectpwd, $empno, $lname, $serviceType, $urole, $assgOfz, $userStatus, $lockStatus, $createDate, $updateBy);

                if ($createUserLoginRes == true) {

                    unset($_SESSION['empNo_validate']);
                    unset($_SESSION['userRole_validate']);
                    unset($_SESSION['userName_validate']);

                    $action = "New User Login Created" . ' - ' . $empno;
                    $priority = "High";

                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $createDate, $action, $priority);

                    $this->session->set_flashdata("success", "User Login Created Successfully");
                    redirect("admin_manage_controller/create_login_controller/createLoginView", "refresh");


                } else {
                    $this->session->set_flashdata("error", "Error occured while creating this usere login");
                    redirect("admin_manage_controller/create_login_controller/createLoginView", "refresh");
                }


            } else {
                $this->session->set_flashdata("error", "Error occured while creating this user login");
                redirect("admin_manage_controller/create_login_controller/createLoginView", "refresh");

            }


        } else {

            unset($_SESSION['empNo_validate']);
            unset($_SESSION['userRole_validate']);
            unset($_SESSION['userName_validate']);

            $this->session->set_flashdata("error", "Please check on validations");
            redirect("admin_manage_controller/create_login_controller/createLoginView", "refresh");
        }


    }
}