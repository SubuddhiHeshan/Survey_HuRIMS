<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/4/2022
 * Time: 1:10 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class main_controller extends CI_Controller
{

//    creating construct for autoload models
    public function __construct()
    {
        parent::__construct();

        $this->load->model('main_model');
        $this->load->model('profile_model');
        $this->load->model('emp_manage_model/emp_full_data_view_model');
        $this->load->model('dashboard_model/admin_dash_model');
        $this->load->model('dashboard_model/user_dash_model');
        $this->load->model('dashboard_model/officer_com_dash_model');
        $this->load->model('dashboard_model/officer_dept_dash_model');
        $this->load->model('dashboard_model/officer_surv_dash_model');
        $this->load->model('dashboard_model/officer_sfa_dash_model');


    }


    //login view call
    public function index()
    {
        $this->load->view('login');
    }

    //Main Dashboard View call
    public function dashboardView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) {

                $userHeadData = $this->main_model->getAdminHeadData();
                $userHeadCount = $this->main_model->getAdminHeadCount();

                $adDashData['headDta'] = $userHeadData;
                $adDashData['text'] = "Applied new Request";
                $adDashData['notfCount'] = $userHeadCount->unread;


                $result1 = $this->admin_dash_model->getTotEmp();
                $result2 = $this->admin_dash_model->getTotBranch();
                $result3 = $this->admin_dash_model->getTotDesignations();
                $result4 = $this->admin_dash_model->getTotSysUsers();

                $adDashData['totEmp'] = $result1;
                $adDashData['totBranch'] = $result2;
                $adDashData['totDesig'] = $result3;
                $adDashData['totSysusr'] = $result4;

                $year1 = date("Y");
                $year2 = date("Y") - 1;
                $year3 = date("Y") - 2;
                $year4 = date("Y") - 3;
                $year5 = date("Y") - 4;

                $result5 = $this->admin_dash_model->getYear1Data($year1);
                $result6 = $this->admin_dash_model->getYear2Data($year2);
                $result7 = $this->admin_dash_model->getYear3Data($year3);
                $result8 = $this->admin_dash_model->getYear4Data($year4);
                $result9 = $this->admin_dash_model->getYear5Data($year5);

                $adDashData['bary1'] = $result5;
                $adDashData['bary2'] = $result6;
                $adDashData['bary3'] = $result7;
                $adDashData['bary4'] = $result8;
                $adDashData['bary5'] = $result9;

                $totYearPer = intval($result5->yr1count) / intval($result1->countEmp) * 100;
                $totMsoPer = $this->admin_dash_model->getMsoPer();
                $totDoPer = $this->admin_dash_model->getDoPer();
                $totSurvPer = $this->admin_dash_model->getSurvPer();

                $adDashData['yearlyTot'] = $totYearPer;
                $adDashData['msoTot'] = $totMsoPer;
                $adDashData['doTot'] = $totDoPer;
                $adDashData['surTot'] = $totSurvPer;

                $recentReg = $this->admin_dash_model->getlastRegEmp();
                $recentRetired = $this->admin_dash_model->getRecentRetired();

                $adDashData['recentEmp'] = $recentReg;
                $adDashData['rcttRetire'] = $recentRetired;

                $this->load->view('sys_user_dashboards/admin_dashboard', $adDashData);

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {


                $y = date("Y") - 1;
                $role = $_SESSION['user_role'];

                $empID = $_SESSION['empNo'];
                $username = $_SESSION['user'];

                $userHeadData = $this->main_model->getUserHeadData($empID, $username);
                $userHeadCount = $this->main_model->getUserHeadCount($empID, $username);

                $usDashData['headDta'] = $userHeadData;
                $usDashData['text'] = "Updated Your Request";
                $usDashData['notfCount'] = $userHeadCount->unread;


                $counter = $this->user_dash_model->getCounterData($empID, $y);
                $usrcounter = $this->user_dash_model->getActCount($username);
                $contactData = $this->profile_model->getLoguserData($empID, $role);

                $ebcheck = $this->user_dash_model->getEBPassStatus($empID);

                $apptY = date("Y", strtotime($contactData->appointment_date));

                $apptMD = date("m-d", strtotime($contactData->appointment_date));

                $ebPassDeadline = date("Y-m-d", strtotime($apptY + 3 . '-' . $apptMD));

                $curDate = date("Y-m-d", time());


                if ($ebcheck == false) {

                    $ebpassData = null;

                    if ($curDate >= $ebPassDeadline) {

                        $date1 = date_create($ebPassDeadline);
                        $date2 = date_create($curDate);
                        $diff = date_diff($date1, $date2);
                        $daysdif = $diff->format("%a");

                        $dayStatus = 'L';

                    } else {

                        $date1 = date_create($curDate);
                        $date2 = date_create($ebPassDeadline);
                        $diff = date_diff($date1, $date2);

                        $daysdif = $diff->format("%a");

                        $dayStatus = 'M';
                    }

                } else {

                    $ebpassData = $ebcheck;
                    $daysdif = 0;
                    $dayStatus = 'N';
                }

                $usDashData['ebpassData'] = $ebpassData;
                $usDashData['ebpassDeadline'] = $ebPassDeadline;
                $usDashData['dayCount'] = $daysdif;
                $usDashData['dayCountStatus'] = $dayStatus;

                $usDashData['counter'] = $counter;
                $usDashData['count'] = $usrcounter;
                $usDashData['contact'] = $contactData;

                $incrementCheck = $this->user_dash_model->getAnnualIncreStatus($empID);

                if ($incrementCheck == false) {

                    $incrementData = null;

                    $apptDate = date("Y-m-d", strtotime($contactData->appointment_date));

                    $increDate1 = date_create($apptDate);
                    $increDate2 = date_create($curDate);
                    $incredff = date_diff($increDate1, $increDate2);

                    $incredatediff = $incredff->format("%a");


                } else {

                    $incrementData = $incrementCheck;

                    $increDate1 = date_create(date("Y-m-d", strtotime($incrementData->granted_date)));
                    $increDate2 = date_create($curDate);
                    $incredff = date_diff($increDate1, $increDate2);

                    $incredatediff = $incredff->format("%a");
                }

                $usDashData['increData'] = $incrementData;
                $usDashData['increDayCount'] = $incredatediff;

                $this->load->view('sys_user_dashboards/user_dashboard', $usDashData);

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 13) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $comOfcrDashData['headDta'] = $userHeadData;
                $comOfcrDashData['text'] = "Applied new Request";
                $comOfcrDashData['notfCount'] = $userHeadCount->unread;


                $comRes1 = $this->officer_com_dash_model->getMsoCounter();
                $comRes2 = $this->officer_com_dash_model->getDoCounter();
                $comRes3 = $this->officer_com_dash_model->getKKSCounter();
                $comRes4 = $this->officer_com_dash_model->getDriverCounter();

                $comRes5 = $this->officer_com_dash_model->getCombSgoCount();
                $comRes6 = $this->officer_com_dash_model->getCombProvCount();
                $comRes7 = $this->officer_com_dash_model->getCombDistCount();
                $comRes8 = $this->officer_com_dash_model->getCombDivCount();
                $comRes9 = $this->officer_com_dash_model->getCombIsmCount();

                $ResignAgeCheckDate = date("Y-m-d", strtotime(" +1 months"));

                $comRes10 = $this->officer_com_dash_model->getEmpturn55($ResignAgeCheckDate);
                $comRes11 = $this->officer_com_dash_model->getEmpturn55TotCount($ResignAgeCheckDate);

                $comOfcrDashData['counter1'] = $comRes1;
                $comOfcrDashData['counter2'] = $comRes2;
                $comOfcrDashData['counter3'] = $comRes3;
                $comOfcrDashData['counter4'] = $comRes4;

                $comOfcrDashData['barSgo'] = $comRes5;
                $comOfcrDashData['barProv'] = $comRes6;
                $comOfcrDashData['barDist'] = $comRes7;
                $comOfcrDashData['barDiv'] = $comRes8;
                $comOfcrDashData['barIsm'] = $comRes9;

                $comOfcrDashData['empToRetire'] = $comRes10;
                $comOfcrDashData['empToRetireCount'] = $comRes11;

                $this->load->view('sys_user_dashboards/officer_com_dashboard', $comOfcrDashData);

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 14) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $deptOfcrDashData['headDta'] = $userHeadData;
                $deptOfcrDashData['text'] = "Applied new Request";
                $deptOfcrDashData['notfCount'] = $userHeadCount->unread;

                $deptRes1 = $this->officer_dept_dash_model->getSnrMtoCounter();
                $deptRes2 = $this->officer_dept_dash_model->getMtoCounter();
                $deptRes3 = $this->officer_dept_dash_model->getPtotCounter();
                $deptRes4 = $this->officer_dept_dash_model->getDeptAsstCounter();

                $deptRes5 = $this->officer_dept_dash_model->getDeptSgoCount();
                $deptRes6 = $this->officer_dept_dash_model->getDeptProvCount();
                $deptRes7 = $this->officer_dept_dash_model->getDeptDistCount();
                $deptRes8 = $this->officer_dept_dash_model->getDeptDivCount();
                $deptRes9 = $this->officer_dept_dash_model->getDeptIsmCount();

                $deptOfcrDashData['counter1'] = $deptRes1;
                $deptOfcrDashData['counter2'] = $deptRes2;
                $deptOfcrDashData['counter3'] = $deptRes3;
                $deptOfcrDashData['counter4'] = $deptRes4;

                $deptOfcrDashData['barSgo'] = $deptRes5;
                $deptOfcrDashData['barProv'] = $deptRes6;
                $deptOfcrDashData['barDist'] = $deptRes7;
                $deptOfcrDashData['barDiv'] = $deptRes8;
                $deptOfcrDashData['barIsm'] = $deptRes9;

                $ResignAgeCheckDate = date("Y-m-d", strtotime(" +1 months"));

                $deptRes10 = $this->officer_dept_dash_model->getEmpturn55($ResignAgeCheckDate);
                $deptRes11 = $this->officer_dept_dash_model->getEmpturn55TotCount($ResignAgeCheckDate);


                $deptOfcrDashData['empToRetire'] = $deptRes10;
                $deptOfcrDashData['empToRetireCount'] = $deptRes11;

                $this->load->view('sys_user_dashboards/officer_dept_dashboard', $deptOfcrDashData);

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 15) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $survOfcrDashData['headDta'] = $userHeadData;
                $survOfcrDashData['text'] = "Applied new Request";
                $survOfcrDashData['notfCount'] = $userHeadCount->unread;

                $survRes1 = $this->officer_surv_dash_model->getSurveyCounter();
                $survRes2 = $this->officer_surv_dash_model->getSSCounter();
                $survRes3 = $this->officer_surv_dash_model->getSnrSSCounter();
                $survRes4 = $this->officer_surv_dash_model->getDsgPsgCounter();


                $survRes5 = $this->officer_surv_dash_model->getSurvSgoCount();
                $survRes6 = $this->officer_surv_dash_model->getSurvProvCount();
                $survRes7 = $this->officer_surv_dash_model->getSurvDistCount();
                $survRes8 = $this->officer_surv_dash_model->getSurvDivCount();
                $survRes9 = $this->officer_surv_dash_model->getSurvIsmCount();

                $survOfcrDashData['counter1'] = $survRes1;
                $survOfcrDashData['counter2'] = $survRes2;
                $survOfcrDashData['counter3'] = $survRes3;
                $survOfcrDashData['counter4'] = $survRes4;

                $survOfcrDashData['barSgo'] = $survRes5;
                $survOfcrDashData['barProv'] = $survRes6;
                $survOfcrDashData['barDist'] = $survRes7;
                $survOfcrDashData['barDiv'] = $survRes8;
                $survOfcrDashData['barIsm'] = $survRes9;

                $ResignAgeCheckDate = date("Y-m-d", strtotime(" +1 months"));

                $survRes10 = $this->officer_surv_dash_model->getEmpturn55($ResignAgeCheckDate);
                $survRes11 = $this->officer_surv_dash_model->getEmpturn55TotCount($ResignAgeCheckDate);

                $survOfcrDashData['empToRetire'] = $survRes10;
                $survOfcrDashData['empToRetireCount'] = $survRes11;

                $this->load->view('sys_user_dashboards/officer_survey_dashboard', $survOfcrDashData);

            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 16) {

                $userHeadData = $this->main_model->getOfficerHeaderData($_SESSION['user_role']);
                $userHeadCount = $this->main_model->getOfficerHeadCount($_SESSION['user_role']);

                $sfaOfcrDashData['headDta'] = $userHeadData;
                $sfaOfcrDashData['text'] = "Applied new Request";
                $sfaOfcrDashData['notfCount'] = $userHeadCount->unread;

                $sfaRes1 = $this->officer_sfa_dash_model->getSfaSpecialCounter();
                $sfaRes2 = $this->officer_sfa_dash_model->getSfa1Counter();
                $sfaRes3 = $this->officer_sfa_dash_model->getSfa2Counter();
                $sfaRes4 = $this->officer_sfa_dash_model->getSfa3Counter();

                $sfaRes5 = $this->officer_sfa_dash_model->getSfaSgoCount();
                $sfaRes6 = $this->officer_sfa_dash_model->getSfaProvCount();
                $sfaRes7 = $this->officer_sfa_dash_model->getSfaDistCount();
                $sfaRes8 = $this->officer_sfa_dash_model->getSfaDivCount();
                $sfaRes9 = $this->officer_sfa_dash_model->getSfaIsmCount();

                $sfaOfcrDashData['counter1'] = $sfaRes1;
                $sfaOfcrDashData['counter2'] = $sfaRes2;
                $sfaOfcrDashData['counter3'] = $sfaRes3;
                $sfaOfcrDashData['counter4'] = $sfaRes4;

                $sfaOfcrDashData['barSgo'] = $sfaRes5;
                $sfaOfcrDashData['barProv'] = $sfaRes6;
                $sfaOfcrDashData['barDist'] = $sfaRes7;
                $sfaOfcrDashData['barDiv'] = $sfaRes8;
                $sfaOfcrDashData['barIsm'] = $sfaRes9;

                $ResignAgeCheckDate = date("Y-m-d", strtotime(" +1 months"));

                $sfaRes10 = $this->officer_sfa_dash_model->getEmpturn55($ResignAgeCheckDate);
                $sfaRes11 = $this->officer_sfa_dash_model->getEmpturn55TotCount($ResignAgeCheckDate);

                $sfaOfcrDashData['empToRetire'] = $sfaRes10;
                $sfaOfcrDashData['empToRetireCount'] = $sfaRes11;

                $this->load->view('sys_user_dashboards/officer_sfa_dashboard', $sfaOfcrDashData);

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("main_controller/index", "refresh");
        }
    }


    //Login user authentication
    public function authenticateUser()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //send for authentication
        $result = $this->main_model->getLogUsrData($username, $password);

        if ($result == !false) {

            //Check user is locked or disable
            if ($result->userStatus == 0 || $result->lockStatus == 0) {

                $this->session->set_flashdata("error", "Your Account is Locked or Deactivated Please contact your Administrator");
                redirect("main_controller/index", "refresh");
            } else {

                $_SESSION['user_logged'] = true;
                $_SESSION['user_id'] = $result->id;
                $_SESSION['user'] = $result->user_name;
                $_SESSION['empNo'] = $result->employee_id1;
                $_SESSION['Lname'] = $result->name;
                $_SESSION['designation'] = $result->service_id;
                $_SESSION['user_role'] = $result->user_role_id;
                $_SESSION['work_station'] = $result->branch_id;
                $_SESSION['branch_name'] = $result->brname;

                $this->session->set_flashdata("log_success", "You are Logged In");
                redirect("main_controller/dashboardView", "refresh");

            }

        } else {
            $this->session->set_flashdata("error", "Your Username or Password Incorrect");
            redirect("main_controller/index", "refresh");
        }


    }

    public function viewEmpFullProfile()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $empNo = $_SESSION['empNo'];
            $uName = $_SESSION['user'];

            $userHeadData = $this->main_model->getUserHeadData($empNo, $uName);
            $userHeadCount = $this->main_model->getUserHeadCount($empNo, $uName);

            $empFullViewData['headDta'] = $userHeadData;
            $empFullViewData['text'] = "Updated Your Request";
            $empFullViewData['notfCount'] = $userHeadCount->unread;


            $spouseData = $this->emp_full_data_view_model->getSpouseDetails($empNo);
            $incrementData = $this->emp_full_data_view_model->getIncrementDetails($empNo);
            $clearData = $this->emp_full_data_view_model->getClearanceDetails($empNo);
            $jobHisData = $this->emp_full_data_view_model->getJobhistDetails($empNo);
            $desigHisData = $this->emp_full_data_view_model->getDesighistDetails($empNo);
            $annualLeaveData = $this->emp_full_data_view_model->getAnnualLeaveDetails($empNo);
            $commendData = $this->emp_full_data_view_model->getCommendDetails($empNo);
            $ebdData = $this->emp_full_data_view_model->getEbDetails($empNo);
            $trainningData = $this->emp_full_data_view_model->getTrainningDetails($empNo);
            $desciplineData = $this->emp_full_data_view_model->getDesciplineActDetails($empNo);

            $empFullViewData['sData'] = $spouseData;
            $empFullViewData['increData'] = $incrementData;
            $empFullViewData['clearanceData'] = $clearData;
            $empFullViewData['JobHData'] = $jobHisData;
            $empFullViewData['desigHData'] = $desigHisData;
            $empFullViewData['leave'] = $annualLeaveData;
            $empFullViewData['commendation'] = $commendData;
            $empFullViewData['ebData'] = $ebdData;
            $empFullViewData['TrngData'] = $trainningData;
            $empFullViewData['descipData'] = $desciplineData;

            $this->load->view('emp_full_profile', $empFullViewData);


        } else {

            $this->session->set_flashdata("error", "Please Log in to the system to view this page");
            redirect("main_controller/index", "refresh");

        }

    }

    public function pageNotFound()
    {
        $this->load->view('404');
    }

    //User logout
    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        redirect("main_controller/index");
    }


}