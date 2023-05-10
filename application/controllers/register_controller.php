<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/26/2022
 * Time: 7:49 PM
 */

class register_controller extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->load->model('register_model');
        $this->load->model('main_model');

    }

    public function registerEmployee()
    {
        //Setting Form Validations
        $this->form_validation->set_rules("title", "Title", "required|numeric");
//        $this->form_validation->set_rules("fname", "First Name", "required|alpha|max_length[200]");
        $this->form_validation->set_rules("lname", "Last Name", "required|regex_match[/^([a-z ])+$/i]|max_length[200]");
        $this->form_validation->set_rules("initl", "Initials", "required|regex_match[/^([a-z .])+$/i]|max_length[100]");
        $this->form_validation->set_rules("intleng", "Initials Denoted", "required|regex_match[/^([a-z ])+$/i]|max_length[500]");
        $this->form_validation->set_rules("gen", "Gender", "required|numeric");
        $this->form_validation->set_rules("nic", "NIC", "required|alpha_numeric|min_length[10]|max_length[12]");
        $this->form_validation->set_rules("dob", "Date of Birth", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("add1", "Address Line 1", "required|max_length[500]");
        $this->form_validation->set_rules("add2", "Address Line 2", "regex_match[/^([a-z0-9 ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("add3", "Address Line 3", "regex_match[/^([a-z0-9 ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("dist", "District", "required|numeric");
        $this->form_validation->set_rules("curadd", "Current Address", "max_length[500]");
        $this->form_validation->set_rules("mob", "Mobile Number", "required|numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("homenum", "Residence Number", "numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("mail", "Email", "valid_email");
        $this->form_validation->set_rules("mStatus", "Marital Status", "required|numeric");
        $this->form_validation->set_rules("sname", "Spouse Name", "regex_match[/^([a-z ])+$/i]|max_length[500]");
        $this->form_validation->set_rules("socc", "Spouse Occupation", "regex_match[/^([a-z0-9 ])+$/i]|max_length[500]");
        $this->form_validation->set_rules("chldqty", "Children", "numeric");
        $this->form_validation->set_rules("eduQlif", "Education Qualification", "required|numeric");
        $this->form_validation->set_rules("service", "Service Type", "required|numeric");
        $this->form_validation->set_rules("apptType", "Appointment Type", "required|numeric");
        $this->form_validation->set_rules("apptNo", "Appointment No", "required|max_length[100]");
        $this->form_validation->set_rules("workstation", "Assigned Work Station", "numeric");
        $this->form_validation->set_rules("desig", "Designation", "required|numeric");
        $this->form_validation->set_rules("grade", "Grade", "required|numeric");
        $this->form_validation->set_rules("salcode", "Salary Code", "required|numeric");
        $this->form_validation->set_rules("apptDate", "Date of Appointment", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("rptDate", "Date of Duty Report", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("pmtdate", "Date of Permanent", "regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("wop", "W & OP Number", "numeric");
//        $this->form_validation->set_rules("profileimg", "Profile Image", "required");
//        $this->form_validation->set_rules("idcopy", "NIC Copy", "required");


        if ($this->form_validation->run() == false) {

            $this->registerView();

        } else {

            $createBy = $_SESSION['user'];
            $createDate = date("Y-m-d h:i:s", time());

            $title = $this->input->post('title');
            $lname = strtoupper($this->input->post('lname'));
            $initls = strtoupper($this->input->post('initl'));
            $intleng = strtoupper($this->input->post('intleng'));
            $gender = $this->input->post('gen');
            $nic = strtoupper($this->input->post('nic'));
            $dob = $this->input->post('dob');
            $add1 = strtoupper($this->input->post('add1'));
            $add2 = strtoupper($this->input->post('add2'));
            $add3 = strtoupper($this->input->post('add3'));
            $district = $this->input->post('dist');
            $curadd = strtoupper($this->input->post('curadd'));
            $mobileNum = $this->input->post('mob');
            $resdNum = $this->input->post('homenum');
            $email = $this->input->post('mail');
            $mStatus = $this->input->post('mStatus');
            $sName = strtoupper($this->input->post('sname'));
            $sOccu = strtoupper($this->input->post('socc'));
            $chldQty = $this->input->post('chldqty');
            $eduQlfy = $this->input->post('eduQlif');
            $serviceType = $this->input->post('service');
            $apptType = $this->input->post('apptType');
            $apptNo = strtoupper($this->input->post('apptNo'));
            $assgOfz = $this->input->post('workstation');
            $desig = $this->input->post('desig');
            $grade = $this->input->post('grade');
            $salCode = $this->input->post('salcode');
            $apptDate = $this->input->post('apptDate');
            $rptDate = $this->input->post('rptDate');
            $pmentDate = $this->input->post('pmtdate');
            $wnop = $this->input->post('wop');

            if (isset($_SESSION['nicChecked']) && $_SESSION['nicChecked'] == true) {

                $this->session->set_flashdata("error", "Dupplicate NIC, Please enter new NIC No");
                redirect("register_controller/registerView", "refresh");

            } else {

                $result = $this->register_model->getNewEmpNo();

                if ($result != false) {

                    $newEmpNo = $result->id + 1;


                    $result1 = $this->register_model->setnewEmployee($newEmpNo, $createBy, $createDate, $title, $lname, $initls, $intleng, $gender, $nic,
                        $dob, $add1, $add2, $add3, $district, $curadd, $mobileNum, $resdNum, $email, $mStatus, $eduQlfy, $apptNo, $apptDate,
                        $pmentDate, $wnop, $desig, $salCode, $grade, $assgOfz, $rptDate, $apptType);

                    if ($result1 != false) {

                        $curDateTime = date("Y-m-d h:i:s", time());
                        $action = "New User Created" . ' - ' . $newEmpNo;
                        $priority = "High";

                        $newPwd = md5($nic);
                        $userRole = 2;
                        $userStatus = 1;
                        $lockStatus = 1;

                        $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                        $createUserLogin = $this->main_model->setnewUSerLogin($newEmpNo, $newPwd, $newEmpNo, $lname, $serviceType, $userRole, $assgOfz, $userStatus, $lockStatus, $curDateTime, $_SESSION['user']);

                        //User ID Upload
                        $config['upload_path'] = './assets/img/uploads/id_copy';
                        $config['allowed_types'] = 'pdf';
                        $config['file_name'] = $newEmpNo;
                        $config['file_ext_tolower'] = true;
                        $config['max_size'] = '2048';
                        $config['remove_spaces'] = true;
                        $config['detect_mime'] = true;
                        $config['mod_mime_fix'] = true;
                        $config['overwrite'] = true;

                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('idcopy')) {

                            $IdCopyName = $this->upload->data('file_name');

                            $userIDUpRes = $this->register_model->setUserIDImage($newEmpNo, $IdCopyName);

                            if ($userIDUpRes != null) {

                                if ($mStatus != "A" && $mStatus != 2) {

                                    $result4 = $this->register_model->setSpouseDetails($newEmpNo, $sName, $sOccu, $chldQty);

                                    if ($result4 != null) {

                                        $this->session->set_flashdata("success", "Employee Created Successfully with New Employee NO : " . ' ' . $newEmpNo);
                                        redirect("register_controller/registerView", "refresh");

                                    } else {

                                        $this->session->set_flashdata("error", "Error Occured while adding spouse details");
                                        redirect("register_controller/registerView", "refresh");
                                    }

                                } else {

                                    $this->session->set_flashdata("success", "Employee Created Successfully with New Employee NO : " . ' ' . $newEmpNo);
                                    redirect("register_controller/registerView", "refresh");
                                }


                            } else {
                                $this->session->set_flashdata("error", "Employee Created Successfully with New Employee NO : " . ' ' . $newEmpNo . ' ' . "Error Occured while updating ID Copy Data");
                                redirect("register_controller/registerView", "refresh");

                            }

                        } else {

                            $this->session->set_flashdata("error", "Employee Created Successfully with New Employee NO : " . ' ' . $newEmpNo . ' ' . $this->upload->display_errors());
                            redirect("register_controller/registerView", "refresh");
                        }


                    } else {
                        $this->session->set_flashdata("error", "Error Occured while creating this Employee");
                        redirect("register_controller/registerView", "refresh");

                    }

                } else {
                    $this->session->set_flashdata("error", "Error Occured while generating the New Employee No");
                    redirect("register_controller/registerView", "refresh");
                }

            }
        }
    }

    public function registerView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $regDataload['headDta'] = $userHeadData;
                $regDataload['text'] = "Applied new Request";
                $regDataload['notfCount'] = $userHeadCount->unread;

                $result1 = $this->register_model->getDistricts();
                $result2 = $this->register_model->getHgEduLvl();
                $result3 = $this->register_model->getBranch();
                $result4 = $this->register_model->getDesignation();
                $result5 = $this->register_model->getGrades();
                $result6 = $this->register_model->getSalCodes();
                $result7 = $this->register_model->getAppointmentTypes();
                $result8 = $this->register_model->getServices();

                $regDataload['district'] = $result1;
                $regDataload['HgEduLvl'] = $result2;
                $regDataload['branches'] = $result3;
                $regDataload['designations'] = $result4;
                $regDataload['grades'] = $result5;
                $regDataload['salCode'] = $result6;
                $regDataload['apptTypes'] = $result7;
                $regDataload['serviceTypes'] = $result8;

                $this->load->view('register', $regDataload);


            } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $regDataload['headDta'] = $userHeadData;
                $regDataload['text'] = "Applied new Request";
                $regDataload['notfCount'] = $userHeadCount->unread;


                $result1 = $this->register_model->getDistricts();
                $result2 = $this->register_model->getHgEduLvl();
                $result3 = $this->register_model->getBranch();
                $result4 = $this->register_model->getDesignation();
                $result5 = $this->register_model->getGrades();
                $result6 = $this->register_model->getSalCodes();
                $result7 = $this->register_model->getAppointmentTypes();
                $result8 = $this->register_model->getServices();

                $regDataload['district'] = $result1;
                $regDataload['HgEduLvl'] = $result2;
                $regDataload['branches'] = $result3;
                $regDataload['designations'] = $result4;
                $regDataload['grades'] = $result5;
                $regDataload['salCode'] = $result6;
                $regDataload['apptTypes'] = $result7;
                $regDataload['serviceTypes'] = $result8;

                $this->load->view('register', $regDataload);

            } else {
                $this->session->set_flashdata("error", "You are not authorize to view this page");
                redirect("main_controller/dashboardView", "refresh");

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }
    }

    public function checkNic()
    {
        $nic = $this->input->post('idNo');

        $response = $this->register_model->getNicValidateRespo($nic);

        if ($response == true) {
            echo 1;
            $_SESSION['nicChecked'] = true;
        } else {
            unset($_SESSION['nicChecked']);
        }

    }
}