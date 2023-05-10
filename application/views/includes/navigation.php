<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/11/2022
 * Time: 1:07 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype HTML>

<html class="no-js" lang="">

<head>
    <!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/css/notification/notification.css">-->

</head>

<body>

<!-- Main Menu area start-->
<div class="main-menu-area mg-tb-40">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a href="<?php echo base_url() ?>index.php/main_controller/dashboardView"><i
                                    class="notika-icon notika-house"></i>Home</a>
                    </li>

                    <?php if ($_SESSION['user_role'] == 1) { ?>

                        <li><a data-toggle="tab" href="#empManage"><i class="notika-icon notika-support"></i> Employee
                                Manage</a>
                        </li>

                        <li><a data-toggle="tab" href="#errorReport"><i class="notika-icon notika-star"></i> Error
                                Report</a>
                        </li>

                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-search"></i> Employee
                                Tracker </a>
                        </li>

                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Reports</a>
                        </li>

                        <li><a data-toggle="tab" href="#Download"><i class="notika-icon notika-down-arrow"></i>Downloads</a>
                        </li>

                        <li><a data-toggle="tab" href="#Admin"><i class="notika-icon notika-app"></i> Admin Control</a>
                        </li>


                    <?php } elseif ($_SESSION['user_role'] == 2) { ?>

                        <li><a data-toggle="tab" href="#errorReport"><i class="notika-icon notika-star"></i> Error
                                Report</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>index.php/main_controller/viewEmpFullProfile"><i
                                        class="notika-icon notika-support"></i> View My
                                Info</a>
                        </li>

                        <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound"><i
                                        class="notika-icon notika-app"></i> Apply Transfer
                                For the year <?php echo date("Y", time()) + 1; ?></a>
                        </li>


                    <?php } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) { ?>

                        <li><a data-toggle="tab" href="#empManage"><i class="notika-icon notika-support"></i> Employee
                                Manage</a>
                        </li>

                        <li><a data-toggle="tab" href="#errorReport"><i class="notika-icon notika-star"></i> Error
                                Report</a>
                        </li>

                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-search"></i> Employee
                                Tracker </a>
                        </li>

                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Reports</a>
                        </li>

                        <li><a data-toggle="tab" href="#Download"><i class="notika-icon notika-down-arrow"></i>Downloads</a>
                        </li>

                    <?php } elseif ($_SESSION['user_role'] == 17) { ?>

                        <li><a data-toggle="tab" href="#empManage"><i class="notika-icon notika-support"></i> Employee
                                Manage</a>
                        </li>
                        <li><a data-toggle="tab" href="#errorReport"><i class="notika-icon notika-star"></i> Error
                                Report</a>
                        </li>
                        <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-search"></i> Employee
                                Tracker </a>
                        </li>

                        <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Reports</a>
                        </li>

                        <li><a data-toggle="tab" href="#Download"><i class="notika-icon notika-down-arrow"></i>Downloads</a>
                        </li>

                        <li><a data-toggle="tab" href="#Admin"><i class="notika-icon notika-app"></i> Admin Control</a>
                        </li>

                    <?php } ?>
                </ul>

                <div class="tab-content custom-menu-content">

                    <div id="home" class="tab-pane in active notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url() ?>index.php/main_controller/dashboardView">Dashboard
                                    Data</a>
                            </li>
                        </ul>
                    </div>

                    <div id="empManage" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">

                            <?php if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>
                                <li><a href="<?php echo base_url(); ?>index.php/register_controller/registerView">Add
                                        New
                                        Employee</a>
                                </li>

                            <?php } ?>

                            <li>
                                <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/allEmpView">Update
                                    Employee</a>
                            </li>

                            <?php if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/employee_retire_controller/allEmpRetireView">Turning
                                        55+</a>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>
                    <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li>
                                <a href="<?php echo base_url(); ?>index.php/employee_tracker_controller/find_emp_info_controller/findEmpView">Find
                                    Employee
                                </a>
                            </li>
                            <li><a href="
                            <?php echo base_url(); ?>index.php/main_controller/pageNotFound">GPS
                                    Tracker</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">All User
                                    List</a>
                            </li>
                        </ul>
                    </div>
                    <div id="errorReport" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">

                            <?php if ($_SESSION['user_role'] == 2) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/request_job_controller/requestJobView">Request
                                        to Update</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/user_req_manage_controller/manageReqView">Manage
                                        Request</a>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_summary_controller/reqSummaryView">Request
                                        Summary</a>
                                </li>

                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) { ?>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_engage_controller/reqEngageView">Engage
                                        Request</a>
                                </li>


                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_summary_controller/reqSummaryView">Request
                                        Summary</a>
                                </li>

                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_engage_controller/reqEngageView">Engage
                                        Request</a>
                                </li>

                            <?php } ?>
                        </ul>
                    </div>

                    <div id="Download" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">
                            <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">Download
                                    ID
                                    Card Copy</a>
                            </li>
                            <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">User
                                    Profile
                                    Picture</a>
                            </li>
                        </ul>
                    </div>
                    <div id="Admin" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">

                            <?php if ($_SESSION['user_role'] == 17) { ?>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_login_controller/createLoginView">Create
                                        User Login</a></li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_office_controller/createOfficeView">Add
                                        Office</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_branch_controller/createBranchView">Add
                                        Branch</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_desig_controller/createDesigView">Add
                                        Designation</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_salcode_controller/createSalcodeView">Add
                                        Salary Code</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/log_user_action_controller/logUserActionView">View
                                        Log User Actions</a>
                                </li>


                            <?php }

                            if ($_SESSION['user_role'] == 1) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/log_user_action_controller/logUserActionView">View
                                        Log User Actions</a>
                                </li>


                            <?php }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Main Menu area End-->

<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-toggle="collapse" data-target="#Charts"
                                   href="<?php echo base_url() ?>index.php/main_controller/dashboardView">Home</a>

                            </li>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>
                                <li><a data-toggle="collapse" data-target="#mobEmpManage" href="#">Employee
                                        Manage</a>
                                    <ul id="mobEmpManage" class="collapse dropdown-header-top">

                                        <?php if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                            $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/register_controller/registerView">Add
                                                    New
                                                    Employee</a>
                                            </li>
                                        <?php } ?>


                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/allEmpView">Update
                                                Employee</a>
                                        </li>
                                        <?php if ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                            $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/employee_retire_controller/allEmpRetireView">Turning
                                                    55+</a>
                                            </li>

                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>

                                <li><a data-toggle="collapse" data-target="#mobEmpTracker" href="#"> Employee
                                        Tracker</a>
                                    <ul id="mobEmpTracker" class="collapse dropdown-header-top">

                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/employee_tracker_controller/find_emp_info_controller/findEmpView">Find
                                                Employee</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">GPS
                                                Tracker</a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>

                                <li><a data-toggle="collapse" data-target="#mobEmpReports" href="#">Reports</a>
                                    <ul id="mobEmpReports" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">All
                                                User
                                                List</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>

                                <li><a data-toggle="collapse" data-target="#mobEmpErrorRepo" href="#">Error Report</a>
                                    <ul id="mobEmpErrorRepo" class="collapse dropdown-header-top">

                                        <?php if ($_SESSION['user_role'] == 2) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/request_job_controller/requestJobView">Request
                                                    to Update</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/user_req_manage_controller/manageReqView">Manage
                                                    Request</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_summary_controller/reqSummaryView">Request
                                                    Summary</a>
                                            </li>

                                        <?php } elseif ($_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 || $_SESSION['user_role'] == 16) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_engage_controller/reqEngageView">Engage
                                                    Request</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_summary_controller/reqSummaryView">Request
                                                    Summary</a>
                                            </li>
                                        <?php } elseif ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/error_report_controller/req_engage_controller/reqEngageView">Engage
                                                    Request</a>
                                            </li>

                                        <?php } ?>

                                    </ul>
                                </li>

                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 2) { ?>
                                <li><a data-toggle="collapse" data-target="#Charts"
                                       href="<?php echo base_url(); ?>index.php/main_controller/viewEmpFullProfile">View
                                        My Info</a></li>

                                <li><a data-toggle="collapse" data-target="#Charts"
                                       href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">Apply
                                        Transfer
                                        For the year <?php echo date("Y", time()) + 1; ?></a></li>

                            <?php } ?>

                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 13 || $_SESSION['user_role'] == 14 || $_SESSION['user_role'] == 15 ||
                                $_SESSION['user_role'] == 16 || $_SESSION['user_role'] == 17) { ?>
                                <li><a data-toggle="collapse" data-target="#MobEmpDown" href="#">Downloads</a>
                                    <ul id="MobEmpDown" class="collapse dropdown-header-top">
                                        <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">Download
                                                ID
                                                Card Copy</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>index.php/main_controller/pageNotFound">User
                                                Profile
                                                Picture</a>
                                        </li>
                                    </ul>
                                </li>

                            <?php } ?>


                            <?php if ($_SESSION['user_role'] == 17 || $_SESSION['user_role'] == 1) { ?>
                                <li><a data-toggle="collapse" data-target="#MobEmpAdmin" href="#">Admin Control</a>
                                    <ul id="MobEmpAdmin" class="collapse dropdown-header-top">

                                        <?php if ($_SESSION['user_role'] == 17) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_login_controller/createLoginView">Create
                                                    User Login</a></li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_office_controller/createOfficeView">Add
                                                    Office</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_branch_controller/createBranchView">Add
                                                    Branch</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_desig_controller/createDesigView">Add
                                                    Designation</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/create_salcode_controller/createSalcodeView">Add
                                                    Salary Code</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/log_user_action_controller/logUserActionView">View
                                                    Log User Actions</a>
                                            </li>

                                        <?php } elseif ($_SESSION['user_role'] == 17) { ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>index.php/admin_manage_controller/log_user_action_controller/logUserActionView">View
                                                    Log User Actions</a>
                                            </li>

                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
</body>
</html>



