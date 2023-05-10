<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/11/2022
 * Time: 3:41 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class profile_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('profile_model');
        $this->load->model('main_model');

    }


    //Profile view function
    public function profileView()
    {
        //Check user is logged to view this page
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $role = $_SESSION['user_role'];

            $EmpNO = $_SESSION['empNo'];
            $uName = $_SESSION['user'];

            if ($_SESSION['user_role'] == 2) {

                $userHeadData = $this->main_model->getUserHeadData($EmpNO, $uName);
                $userHeadCount = $this->main_model->getUserHeadCount($EmpNO, $uName);

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Updated Your Request";
                $userData['notfCount'] = $userHeadCount->unread;

            } elseif ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Applied new Request";
                $userData['notfCount'] = $userHeadCount->unread;

            } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Applied new Request";
                $userData['notfCount'] = $userHeadCount->unread;

            }


            //Get main details of the logged user
            $result1 = $this->profile_model->getLoguserData($EmpNO, $role);

            $result2 = $this->profile_model->getLogUserAcctDtls($EmpNO);

//            echo var_dump($result1);

            if ($result1 != false) {

                //Set User result sets to array
                $userData['profile'] = $result1;
                $userData['accounts'] = $result2;

                //Call for view with passing the parameter set
                $this->load->view('profile', $userData);


            } else {
                $this->session->set_flashdata("error", "Sorry error occured while retreiving data");
                redirect("main_controller/dashboardView", "refresh");
            }


            //If user is trying to view this page without login
        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }


    }

    public function updateProfileData()
    {
        //Setting rules for form validation
        $this->form_validation->set_rules("empno", "Employee No", "required|numeric|min_length[3]");
        $this->form_validation->set_rules("title", "Title", "required|regex_match[/^([a-z .])+$/i]|max_length[6]");
        $this->form_validation->set_rules("intlname", "Initial Name", "required|regex_match[/^([a-z ])+$/i]|min_length[5]|max_length[500]");
        $this->form_validation->set_rules("initial_eng", "Initials", "required|regex_match[/^([a-z .])+$/i]|max_length[100]");
        $this->form_validation->set_rules("lname", "Last Name", "required|regex_match[/^([a-z ])+$/i]|max_length[200]");
        $this->form_validation->set_rules("inithial_sin", "Name In Sinhala", "required|max_length[500]");
        $this->form_validation->set_rules("inithial_tamil", "Name In Tamil", "max_length[500]");
        $this->form_validation->set_rules("nic", "NIC", "required|alpha_numeric|min_length[10]|max_length[12]");
        $this->form_validation->set_rules("dob", "DOB", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("mob", "Mobile No", "required|numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("tel", "Home Mobile No", "numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("email", "Email Address", "valid_email");
        $this->form_validation->set_rules("add1", "Address Line 1", "required|max_length[500]");
        $this->form_validation->set_rules("add2", "Address Line 2", "regex_match[/^([a-z ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("address3", "Address Line 3", "regex_match[/^([a-z ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("curadd", "Current Address", "max_length[500]");
        $this->form_validation->set_rules("branch", "Branch", "required|required|regex_match[/^([a-z0-9-& ])+$/i]|max_length[500]");


        if ($this->form_validation->run() == false) {

            $this->editProfileView();


        } else {

            $update = date("Y-m-d h:i:s", time());
            $upby = $_SESSION['user'];

            $intlname = strtoupper($this->input->post('intlname'));
            $empno = $this->input->post('empno');
            $intlEng = strtoupper($this->input->post('initial_eng'));
            $lname = strtoupper($this->input->post('lname'));
            $intlSin = $this->input->post('inithial_sin');
            $intltamil = $this->input->post('inithial_tamil');
            $mob = $this->input->post('mob');
            $tel = $this->input->post('tel');
            $mail = $this->input->post('email');
            $add1 = strtoupper($this->input->post('add1'));
            $add2 = strtoupper($this->input->post('add2'));
            $add3 = strtoupper($this->input->post('address3'));
            $curadd = strtoupper($this->input->post('curadd'));

            $result = $this->profile_model->seteditProfileData($update, $upby, $intlname, $empno, $intlEng, $lname, $intlSin, $intltamil, $mob, $tel, $mail, $add1, $add2, $add3, $curadd);


            if ($result == true) {


                $curDateTime = date("Y-m-d h:i:s", time());
                $action = "User Profile Upddate";
                $priority = "Low";

                //Set log action detsils of the user
                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                $this->session->set_flashdata("success", "Employee Updated Succesfully!!!");
                redirect("profile_controller/profileView", "refresh");

            } else {

                $this->session->set_flashdata("error", "Error occured while updating the user");
                redirect("profile_controller/profileView", "refresh");

            }


        }


    }

    public function editProfileView()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $role = $_SESSION['user_role'];

            $EmpNO = $_SESSION['empNo'];
            $uName = $_SESSION['user'];

            if ($_SESSION['user_role'] == 2) {

                $userHeadData = $this->main_model->getUserHeadData($EmpNO, $uName);
                $userHeadCount = $this->main_model->getUserHeadCount($EmpNO, $uName);

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Updated Your Request";
                $userData['notfCount'] = $userHeadCount->unread;

            } elseif ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Applied new Request";
                $userData['notfCount'] = $userHeadCount->unread;

            } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $userData['headDta'] = $userHeadData;
                $userData['text'] = "Applied new Request";
                $userData['notfCount'] = $userHeadCount->unread;

            }


            $result = $this->profile_model->getLoguserData($EmpNO, $role);

            if ($result != null) {
                $userData['profile'] = $result;
                $this->load->view('edit_profile', $userData);


            } else {
                $this->session->set_flashdata("error", "Sorry error occured while retreiving data");
                redirect("main_controller/dashboardView", "refresh");
            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }
    }

}