<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 9/6/2022
 * Time: 2:08 PM
 */

class all_employee_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('emp_manage_model/all_employee_model');
        $this->load->model('main_model');
        $this->load->model('register_model');

    }

    public function updateLockStatus()
    {
        $status = $this->input->post('status');
        $username = $this->input->post('uname');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->all_employee_model->setLockStatus($username, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "User Lock/Unlock Status Updated" . ' - ' . $username;
            $priority = "High";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {
            echo false;
        }


    }

    public function updateEmployeeStatus()
    {
        $status = $this->input->post('status');
        $empNo = $this->input->post('empployeeNo');

        if ($status == 1) {
            $upstatus = 0;
        } elseif ($status == 0) {
            $upstatus = 1;
        }

        $result = $this->all_employee_model->setEmployeeStatus($empNo, $upstatus);

        if ($result == true) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "User Active/Inactive Status Updated" . ' - ' . $empNo;
            $priority = "High";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            echo true;
        } else {

            echo false;
        }

    }

    public function addExamDetails()
    {

        $empId = $this->input->post('emp_id_view');
        $exType = $this->input->post('exTypes');
        $exName = $this->input->post('exName');
        $expassDate = $this->input->post('passDate');
        $exobtDate = $this->input->post('obtDate');

//        echo $empId,$exType,$exName,$expassDate,$exobtDate;

        $result = $this->all_employee_model->setExamDetails($empId, $exType, $exName, $expassDate, $exobtDate);

        if ($result != false) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Employee Exam Details Added" . ' - ' . $empId;
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            $this->session->set_flashdata("success", "Employee exam details added successfully");
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

        } else {

            $this->session->set_flashdata("error", "Error occured while adding Exam details");
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
        }


    }

    public function addCommndDtls()
    {

        $empId = $this->input->post('emp_id_view2');
        $reason = $this->input->post('reason');
        $letterrNo = $this->input->post('letterNo');
        $letterDate = $this->input->post('letterDate');
        $isuedBy = $this->input->post('issuedBy');
        $remarks = $this->input->post('rmks');

//        echo $empId,$reason,$letterrNo,$letterDate,$isuedBy,$remarks;

        $result = $this->all_employee_model->setCommendationDetails($empId, $reason, $letterrNo, $letterDate, $isuedBy, $remarks);

        if ($result != false) {

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Employee Commendation Details Added" . ' - ' . $empId;
            $priority = "Mid";

            //Set log action detsils of the user action
            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            $this->session->set_flashdata("success", "Employee Commendation details added successfully");
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

        } else {

            $this->session->set_flashdata("error", "Error occured while adding Commendation details");
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
        }

    }

    public function leaveYearValidate()
    {
        $empId = $this->input->post('empId');
        $year = $this->input->post('LYear');

        $result = $this->all_employee_model->getLeaveYearVal($empId, $year);

        if ($result == true) {

            $_SESSION['leave_year_validate'] = true;
            echo true;

        } else {
            $_SESSION['leave_year_validate'] = false;

            echo false;
        }

    }

    public function addAnnualLeaveDtls()
    {

        $this->form_validation->set_rules("emp_id_view3", "Employee Id", "required|numeric");
        $this->form_validation->set_rules("year", "Year", "required|numeric");
        $this->form_validation->set_rules("casual", "Casual Leave", "numeric");
        $this->form_validation->set_rules("vaccation", "Vaccation Leave", "numeric");
        $this->form_validation->set_rules("laps", "Laps Leave", "numeric");
        $this->form_validation->set_rules("yearoflaps", "Year of Laps Leave", "numeric");
        $this->form_validation->set_rules("halfpay", "Half Pay Leave", "numeric");
        $this->form_validation->set_rules("vaccation", "Vaccation Leave", "numeric");
        $this->form_validation->set_rules("nopay", "No Pay Leave", "numeric");
        $this->form_validation->set_rules("Other", "Other Leave", "numeric");
        $this->form_validation->set_rules("matfull", "Maternity full Pay Leave", "numeric");
        $this->form_validation->set_rules("mathalf", "Maternity Half Pay Leave", "numeric");
        $this->form_validation->set_rules("matnopay", "Maternity No Pay Leave", "numeric");
        $this->form_validation->set_rules("nopayforeign", "No Pay Foreign Leave", "numeric");
        $this->form_validation->set_rules("sick", "Sick Leave", "numeric");
        $this->form_validation->set_rules("accident", "Accident Leave", "numeric");
        $this->form_validation->set_rules("study", "Study Leave", "numeric");
        $this->form_validation->set_rules("lieu", "Lieu Leave", "numeric");
        $this->form_validation->set_rules("duty", "Duty Leave", "numeric");


        if ($this->form_validation->run() === false) {

            $this->allEmpView();

        } else {

            if (isset($_SESSION['leave_year_validate']) && $_SESSION['leave_year_validate'] == false) {

                $empId = $this->input->post('emp_id_view3');
                $year = $this->input->post('year');
                $casualLeave = $this->input->post('casual');
                $vacc = $this->input->post('vaccation');
                $laps = $this->input->post('laps');
                $yLaps = $this->input->post('yearoflaps');
                $halfpay = $this->input->post('halfpay');
                $nopay = $this->input->post('nopay');
                $other = $this->input->post('Other');
                $matFull = $this->input->post('matfull');
                $matHalf = $this->input->post('mathalf');
                $matNoPay = $this->input->post('matnopay');
                $nopayForeign = $this->input->post('nopayforeign');
                $sick = $this->input->post('sick');
                $accident = $this->input->post('accident');
                $study = $this->input->post('study');
                $lieu = $this->input->post('lieu');
                $duty = $this->input->post('duty');
                $remark = $this->input->post('remarkLeave');

                $createBy = $_SESSION['user'];
                $createDate = date("Y-m-d h:i:s", time());

//                echo $empId, $year, $casualLeave, $vacc, $laps, $yLaps,$halfpay,$nopay,$other,$matFull,$matHalf,$matNoPay,$nopayForeign,$sick,$accident,
//                $study,$lieu,$duty,$remark;

                $result = $this->all_employee_model->setLeaveDetails($empId, $year, $casualLeave, $vacc, $laps, $yLaps, $halfpay, $nopay, $other, $matFull, $matHalf, $matNoPay, $nopayForeign, $sick, $accident,
                    $study, $lieu, $duty, $remark, $createBy, $createDate);

                if ($result != false) {

                    unset($_SESSION['leave_year_validate']);

                    $curDateTime = date("Y-m-d h:i:s", time());
                    $action = "Employee Leave Details Added for Year " . ' ' . $year . ' - ' . $empId;
                    $priority = "Mid";

                    //Set log action detsils of the user action
                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                    $this->session->set_flashdata("success", "Employee Leave details added successfully");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

                } else {

                    $this->session->set_flashdata("error", "Error occured while adding Leave details");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
                }

            } else {

                unset($_SESSION['leave_year_validate']);

                $this->session->set_flashdata("error", "This user already have leave details for this year");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            }


        }


    }

    public function allEmpView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $result = $this->all_employee_model->getAllEmployees();

                if ($result != null) {

                    $userHeadData = $this->main_model->getAdminHeadData();
                    $userHeadCount = $this->main_model->getAdminHeadCount();

                    $EmpData['headDta'] = $userHeadData;
                    $EmpData['text'] = "Applied new Request";
                    $EmpData['notfCount'] = $userHeadCount->unread;


                    $EmpData['userData'] = $result;

                    $this->load->view('employee_management/all_employee', $EmpData);

                } else {
                    $this->session->set_flashdata("error", "Error Ocurred while retreiving this page");
                    redirect("main_controller/dashboardView", "refresh");

                }

            } elseif ($_SESSION['user_role'] == 13) {

                $result = $this->all_employee_model->getCombineAllEmpsToEdit();

                if ($result != null) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $EmpData['headDta'] = $userHeadData;
                    $EmpData['text'] = "Applied new Request";
                    $EmpData['notfCount'] = $userHeadCount->unread;

                    $EmpData['userData'] = $result;

                    $districts = $this->register_model->getDistricts();
                    $eduLevel = $this->register_model->getHgEduLvl();
                    $designations = $this->register_model->getDesignation();
                    $grades = $this->register_model->getGrades();
                    $salCode = $this->register_model->getSalCodes();
                    $apptTypes = $this->register_model->getAppointmentTypes();
                    $branches = $this->register_model->getBranch();

                    $EmpData['branches'] = $branches;
                    $EmpData['apptTypes'] = $apptTypes;
                    $EmpData['desig'] = $designations;
                    $EmpData['grade'] = $grades;
                    $EmpData['salCode'] = $salCode;
                    $EmpData['dists'] = $districts;
                    $EmpData['higedu'] = $eduLevel;


                    $this->load->view('employee_management/all_employee_edit', $EmpData);

                } else {
                    $this->session->set_flashdata("error", "Error Ocurred while retreiving this page");
                    redirect("main_controller/dashboardView", "refresh");

                }
            } elseif ($_SESSION['user_role'] == 14) {

                $result = $this->all_employee_model->getDeptAllEmpsToEdit();

                if ($result != null) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $EmpData['headDta'] = $userHeadData;
                    $EmpData['text'] = "Applied new Request";
                    $EmpData['notfCount'] = $userHeadCount->unread;

                    $EmpData['userData'] = $result;

                    $districts = $this->register_model->getDistricts();
                    $eduLevel = $this->register_model->getHgEduLvl();
                    $designations = $this->register_model->getDesignation();
                    $grades = $this->register_model->getGrades();
                    $salCode = $this->register_model->getSalCodes();
                    $apptTypes = $this->register_model->getAppointmentTypes();
                    $branches = $this->register_model->getBranch();

                    $EmpData['branches'] = $branches;
                    $EmpData['apptTypes'] = $apptTypes;
                    $EmpData['desig'] = $designations;
                    $EmpData['grade'] = $grades;
                    $EmpData['salCode'] = $salCode;
                    $EmpData['dists'] = $districts;
                    $EmpData['higedu'] = $eduLevel;


                    $this->load->view('employee_management/all_employee_edit', $EmpData);

                } else {
                    $this->session->set_flashdata("error", "Error Ocurred while retreiving this page");
                    redirect("main_controller/dashboardView", "refresh");

                }

            } elseif ($_SESSION['user_role'] == 15) {

                $result = $this->all_employee_model->getSurvAllEmpsToEdit();

                if ($result != null) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $EmpData['headDta'] = $userHeadData;
                    $EmpData['text'] = "Applied new Request";
                    $EmpData['notfCount'] = $userHeadCount->unread;

                    $EmpData['userData'] = $result;

                    $districts = $this->register_model->getDistricts();
                    $eduLevel = $this->register_model->getHgEduLvl();
                    $designations = $this->register_model->getDesignation();
                    $grades = $this->register_model->getGrades();
                    $salCode = $this->register_model->getSalCodes();
                    $apptTypes = $this->register_model->getAppointmentTypes();
                    $branches = $this->register_model->getBranch();

                    $EmpData['branches'] = $branches;
                    $EmpData['apptTypes'] = $apptTypes;
                    $EmpData['desig'] = $designations;
                    $EmpData['grade'] = $grades;
                    $EmpData['salCode'] = $salCode;
                    $EmpData['dists'] = $districts;
                    $EmpData['higedu'] = $eduLevel;


                    $this->load->view('employee_management/all_employee_edit', $EmpData);

                } else {
                    $this->session->set_flashdata("error", "Error Ocurred while retreiving this page");
                    redirect("main_controller/dashboardView", "refresh");

                }

            } elseif ($_SESSION['user_role'] == 16) {

                $result = $this->all_employee_model->getSfaAllEmpsToEdit();

                if ($result != null) {

                    $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                    $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                    $EmpData['headDta'] = $userHeadData;
                    $EmpData['text'] = "Applied new Request";
                    $EmpData['notfCount'] = $userHeadCount->unread;

                    $EmpData['userData'] = $result;

                    $districts = $this->register_model->getDistricts();
                    $eduLevel = $this->register_model->getHgEduLvl();
                    $designations = $this->register_model->getDesignation();
                    $grades = $this->register_model->getGrades();
                    $salCode = $this->register_model->getSalCodes();
                    $apptTypes = $this->register_model->getAppointmentTypes();
                    $branches = $this->register_model->getBranch();

                    $EmpData['branches'] = $branches;
                    $EmpData['apptTypes'] = $apptTypes;
                    $EmpData['desig'] = $designations;
                    $EmpData['grade'] = $grades;
                    $EmpData['salCode'] = $salCode;
                    $EmpData['dists'] = $districts;
                    $EmpData['higedu'] = $eduLevel;


                    $this->load->view('employee_management/all_employee_edit', $EmpData);

                } else {
                    $this->session->set_flashdata("error", "Error Ocurred while retreiving this page");
                    redirect("main_controller/dashboardView", "refresh");

                }

            } else {
                $this->session->set_flashdata("error", "You don't have user privilage to access this function");
                redirect("main_controller/dashboardView", "refresh");

            }


        } else {
            $this->session->set_flashdata("error", "Please Log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }
    }

    public function incrementYearValidate()
    {
        $empId = $this->input->post('empId');
        $incyear = $this->input->post('IYear');

        $result = $this->all_employee_model->getIncrementYearVal($empId, $incyear);

        if ($result == true) {

            $_SESSION['incre_year_validate'] = true;
            echo true;

        } else {
            $_SESSION['incre_year_validate'] = false;

            echo false;
        }

    }

    public function addIncrementDtls()
    {

        $this->form_validation->set_rules("emp_id_view4", "Employee Id", "required|numeric");
        $this->form_validation->set_rules("increYear", "Increment Year", "required|numeric");
        $this->form_validation->set_rules("increStatus", "Increment Status", "required|numeric");
        $this->form_validation->set_rules("increDate", "Increment Date", "required|regex_match[/^([0-9- ])+$/i]");


        if ($this->form_validation->run() === false) {

            $this->allEmpView();

        } else {

            if (isset($_SESSION['incre_year_validate']) && $_SESSION['incre_year_validate'] == false) {

                $empId = $this->input->post('emp_id_view4');
                $Incrementyear = $this->input->post('increYear');
                $IncreStatus = $this->input->post('increStatus');
                $IncreDate = $this->input->post('increDate');
                $Period = $this->input->post('periodSuspend');


                $createBy = $_SESSION['user'];
                $createDate = date("Y-m-d h:i:s", time());

                $result = $this->all_employee_model->setIncrementDetails($empId, $Incrementyear, $IncreStatus, $IncreDate, $Period, $createBy, $createDate);

                if ($result != false) {

                    unset($_SESSION['incre_year_validate']);

                    $curDateTime = date("Y-m-d h:i:s", time());
                    $action = "Employee Increment Details Added for Year " . ' ' . $Incrementyear . ' - ' . $empId;
                    $priority = "Mid";

                    //Set log action detsils of the user action
                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                    $this->session->set_flashdata("success", "Employee Increment details added successfully");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

                } else {

                    $this->session->set_flashdata("error", "Error occured while adding Increment details");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
                }

            } else {

                unset($_SESSION['incre_year_validate']);

                $this->session->set_flashdata("error", "This user already have increment details for this year");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            }


        }


    }

    public function addClearanceDtls()
    {

        $this->form_validation->set_rules("emp_id_view5", "Employee Id", "required|numeric");
        $this->form_validation->set_rules("period", "Period", "required|max_length[45]");
        $this->form_validation->set_rules("status", "Status", "required|alpha");
        $this->form_validation->set_rules("certfNo", "Certificate No", "required");
        $this->form_validation->set_rules("issueDate", "Issued Date", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("issuedBy", "Issued By", "required");


        if ($this->form_validation->run() === false) {

            $this->allEmpView();

        } else {

            $empId = $this->input->post('emp_id_view5');
            $baranchId = $this->input->post('emp_br_id');
            $ClearPeriod = $this->input->post('period');
            $Status = $this->input->post('status');
            $CertifNo = $this->input->post('certfNo');
            $IssuedDate = $this->input->post('issueDate');
            $IssuedBy = $this->input->post('issuedBy');

            $createBy = $_SESSION['user'];
            $createDate = date("Y-m-d h:i:s", time());

            $result = $this->all_employee_model->setClearanceDetails($empId, $baranchId, $ClearPeriod, $Status, $CertifNo, $IssuedDate, $IssuedBy, $createBy, $createDate);

            if ($result != false) {

                $curDateTime = date("Y-m-d h:i:s", time());
                $action = "Employee Clearance Details Added for Branch " . ' ' . $baranchId . ' - ' . $empId;
                $priority = "Mid";

                //Set log action detsils of the user action
                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                $this->session->set_flashdata("success", "Employee Clearance details added successfully");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            } else {

                $this->session->set_flashdata("error", "Error occured while adding Clearance details");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
            }

        }


    }

    public function empEditModelData()
    {
        $empNo = $this->input->post('editEmpId');

        $result = $this->all_employee_model->getEditEmpData($empNo);
        $result1 = $this->all_employee_model->getEditEmpDesigData($empNo);

        if ($result != false) {

            $data['empdata'] = $result;
            $data['desigData'] = $result1;

            echo json_encode($data);
        } else {

            echo false;

        }

    }

    public function updateEmpDtls()
    {

        $this->form_validation->set_rules("title", "Title", "required|numeric");
        $this->form_validation->set_rules("lname", "Last Name", "required|regex_match[/^([a-z ])+$/i]|max_length[200]");
        $this->form_validation->set_rules("initl", "Initials", "required|regex_match[/^([a-z .])+$/i]|max_length[100]");
        $this->form_validation->set_rules("intleng", "Initials Denoted", "required|regex_match[/^([a-z ])+$/i]|max_length[500]");
        $this->form_validation->set_rules("intlSin", "Initials Sinhala", "max_length[500]");
        $this->form_validation->set_rules("intlTam", "Initials Tamil", "max_length[500]");
        $this->form_validation->set_rules("gen", "Gender", "required|numeric");
        $this->form_validation->set_rules("nic", "NIC", "required|alpha_numeric|min_length[10]|max_length[12]");
        $this->form_validation->set_rules("dob", "Date of Birth", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("add1", "Address Line 1", "required|max_length[500]");
        $this->form_validation->set_rules("add2", "Address Line 2", "regex_match[/^([a-z0-9 ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("add3", "Address Line 3", "regex_match[/^([a-z0-9 ,.])+$/i]|max_length[200]");
        $this->form_validation->set_rules("district", "District", "required|numeric");
        $this->form_validation->set_rules("curadd", "Current Address", "max_length[500]");
        $this->form_validation->set_rules("mob", "Mobile Number", "required|numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("homenum", "Residence Number", "numeric|min_length[10]|max_length[10]");
        $this->form_validation->set_rules("mail", "Email", "valid_email");
        $this->form_validation->set_rules("eduLevel", "Education Qualification", "required|numeric");
        $this->form_validation->set_rules("apptNo", "Appointment No", "required|max_length[100]");
        $this->form_validation->set_rules("apptDate", "Date of Appointment", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("pmtdate", "Date of Permanent", "regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("wop", "W & OP Number", "numeric");


        if ($this->form_validation->run() == false) {

            $this->allEmpView();

        } else {

            $updateBy = $_SESSION['user'];
            $updateDate = date("Y-m-d h:i:s", time());

            $title = $this->input->post('title');
            $lname = strtoupper($this->input->post('lname'));
            $initls = strtoupper($this->input->post('initl'));
            $intleng = strtoupper($this->input->post('intleng'));
            $intlSin = strtoupper($this->input->post('intlSin'));
            $intlTam = strtoupper($this->input->post('intlTam'));
            $gender = $this->input->post('gen');
            $nic = strtoupper($this->input->post('nic'));
            $dob = $this->input->post('dob');
            $add1 = strtoupper($this->input->post('add1'));
            $add2 = strtoupper($this->input->post('add2'));
            $add3 = strtoupper($this->input->post('add3'));
            $district = $this->input->post('district');
            $curadd = strtoupper($this->input->post('curadd'));
            $mobileNum = $this->input->post('mob');
            $resdNum = $this->input->post('homenum');
            $email = $this->input->post('mail');
            $eduQlfy = $this->input->post('eduLevel');
            $apptNo = strtoupper($this->input->post('apptNo'));
            $apptDate = $this->input->post('apptDate');
            $pmentDate = $this->input->post('pmtdate');
            $wnop = $this->input->post('wop');

            $empId = $this->input->post('up_info_emp_id');


            $result = $this->all_employee_model->setUpEmployee($empId, $title, $lname, $initls, $intleng, $intlSin, $intlTam, $gender, $nic, $dob, $add1,
                $add2, $add3, $district, $curadd, $mobileNum, $resdNum, $email, $eduQlfy, $apptNo, $apptDate, $pmentDate, $wnop, $updateBy, $updateDate);

            if ($result != false) {

                $curDateTime = date("Y-m-d h:i:s", time());
                $action = "Employee Details Updated " . ' - ' . $empId;
                $priority = "High";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                $this->session->set_flashdata("success", "Employee details updated successfully");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            } else {

                $this->session->set_flashdata("error", "Error occured while updating employee details");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            }

        }


    }

    public function uploadDp()
    {
        $empId = $this->input->post('up_info_emp_id1');

        //User Profile image Upload
        $config['upload_path'] = './assets/img/uploads/user';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['file_name'] = $empId;
        $config['file_ext_tolower'] = true;
        $config['max_size'] = '2048';
        $config['remove_spaces'] = true;
        $config['detect_mime'] = true;
        $config['mod_mime_fix'] = true;
        $config['overwrite'] = true;

        $this->upload->initialize($config);

        if ($this->upload->do_upload('profileimg')) {

            $ImageName = $this->upload->data('file_name');

            $userImgUpRes = $this->all_employee_model->setUserProfileImage($empId, $ImageName);

            $curDateTime = date("Y-m-d h:i:s", time());
            $action = "Employee Profile Picture Uploaded " . ' - ' . $empId;
            $priority = "High";

            $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

            $this->session->set_flashdata("success", "Employee profile picture uploaded successfully");
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

        } else {

            $this->session->set_flashdata("error", "Error occured while uploading the profile image" . ' ' . $this->upload->display_errors());
            redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

        }

    }

    public function incrementDateUpdate()
    {

        $this->form_validation->set_rules("upIncreDate", "Increment Date", "required|regex_match[/^([0-9 -])+$/i]|max_length[100]");


        if ($this->form_validation->run() == false) {

            $this->allEmpView();

        } else {

            $empId = $this->input->post('up_info_emp_id2');
            $increDate = $this->input->post('upIncreDate');

            $upIncreDate = "0000-" . $increDate;

            $result = $this->all_employee_model->setUpIncreDate($empId, $upIncreDate);

            if ($result != false) {

                $curDateTime = date("Y-m-d h:i:s", time());
                $action = "Employee Increment Date Updated " . ' - ' . $empId;
                $priority = "High";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                $this->session->set_flashdata("success", "Employee Increment Date Updated successfully");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");


            } else {

                $this->session->set_flashdata("error", "Error Occured while updating the increment date");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");


            }


        }

    }

    public function designationUpdate()
    {
        $this->form_validation->set_rules("desig", "Designation", "required|numeric");
        $this->form_validation->set_rules("grade", "Grade", "required|numeric");
        $this->form_validation->set_rules("salcode", "Salary Code", "required|numeric");
        $this->form_validation->set_rules("promtDate", "From Date", "required");
        $this->form_validation->set_rules("desigIncreDate", "Increment Date", "required|regex_match[/^([0-9 -])+$/i]|max_length[100]");
        $this->form_validation->set_rules("desigRemak", "Remarks", "regex_match[/^([a-z0-9 ])+$/i]|max_length[500]");

        if ($this->form_validation->run() == false) {

            $this->allEmpView();

        } else {

            $updateBy = $_SESSION['user'];
            $updateDate = date("Y-m-d", time());

            $empId = $this->input->post('up_info_emp_id3');
            $desig = $this->input->post('desig');
            $grade = $this->input->post('grade');
            $salcode = $this->input->post('salcode');
            $promtDate = $this->input->post('promtDate');
            $increDate = $this->input->post('desigIncreDate');
            $remark = $this->input->post('desigRemak');

            $upIncreDate = "0000-" . $increDate;

            $result = $this->all_employee_model->setDesignation($empId, $desig, $grade, $salcode, $promtDate, $upIncreDate, $remark, $updateBy, $updateDate);

            if ($result == true) {

                $curDateTime = date("Y-m-d h:i:s", time());
                $action = "Employee Designation Updated " . ' - ' . $empId;
                $priority = "High";

                $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                $this->session->set_flashdata("success", "Employee Designation Updated successfully");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");


            } else {

                $this->session->set_flashdata("error", "Error Occured while updating the Designation");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");


            }


        }

    }

    public function brClearIssueValidate()
    {
        $empId = $this->input->post('empId');
        $branchId = $this->input->post('brcID');

        $result = $this->all_employee_model->getBrClearVal($empId, $branchId);

        if ($result == true) {

            $_SESSION['br_clear_validate'] = true;
            echo true;

        } else {
            $_SESSION['br_clear_validate'] = false;
            echo false;
        }

    }

    public function updateWorkingStation()
    {

        $this->form_validation->set_rules("up_info_emp_id4", "Employee Id", "required|numeric");
        $this->form_validation->set_rules("upReason", "Reason", "required|numeric");
        $this->form_validation->set_rules("assgOfz", "Assigned Office", "required|numeric");
        $this->form_validation->set_rules("trnfdate", "Transfer Date", "required|regex_match[/^([0-9- ])+$/i]");
        $this->form_validation->set_rules("ofzRemark", "Remark", "max_length[500]");


        if ($this->form_validation->run() === false) {

            $this->allEmpView();

        } else {

            if (isset($_SESSION['br_clear_validate']) && $_SESSION['br_clear_validate'] == true) {

                $empId = $this->input->post('up_info_emp_id4');
                $upReasonId = $this->input->post('upReason');
                $assgOfz = $this->input->post('assgOfz');
                $tranfDate = $this->input->post('trnfdate');
                $remark = $this->input->post('ofzRemark');

                if ($upReasonId == 7 || $upReasonId == 11 || $upReasonId == 14 || $upReasonId == 15 || $upReasonId == 20 || $upReasonId == 23) {

                    $is_working = 0;
                } else {
                    $is_working = 1;
                }


                $createBy = $_SESSION['user'];
                $createDate = date("Y-m-d h:i:s", time());

//                echo $empId . ',' . $upReasonId . ',' . $assgOfz . ',' . $tranfDate . ',' . $remark . ',' . $is_working;

                $result = $this->all_employee_model->setUpdateAssgOfz($empId, $upReasonId, $assgOfz, $tranfDate, $remark, $createBy, $createDate, $is_working);

                if ($result != false) {

                    unset($_SESSION['br_clear_validate']);

                    $curDateTime = date("Y-m-d h:i:s", time());
                    $action = "Employee Assign Office Updated " . ' - ' . $empId;
                    $priority = "High";

                    //Set log action detsils of the user action
                    $logEntry = $this->main_model->setLogDetails($_SESSION['user'], $_SESSION['user_id'], $curDateTime, $action, $priority);

                    $this->session->set_flashdata("success", "Employee Assign Office Updated Successfully");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

                } else {

                    $this->session->set_flashdata("error", "Error occured while updating assign office");
                    redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");
                }

            } else {

                unset($_SESSION['br_clear_validate']);

                $this->session->set_flashdata("error", "This user doesn't have clearance for current office, Please update it first");
                redirect("emp_manage_controller/all_employee_controller/allEmpView", "refresh");

            }


        }


    }
}