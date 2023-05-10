<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/6/2022
 * Time: 8:44 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- dialog CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/dialog.css">

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>

    <!-- notification CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notification/notification.css">


</head>
<body>
<!-- Start Header Top Area -->
<div class="header-top-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <!--                <div class="logo-area">-->
                <!--                    <a href="#"><img src="-->
                <?php //echo base_url(); ?><!--assets/img/logo/logo.png" alt=""/></a>-->
                <!--                </div>-->
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">

                        <!--Start User Profile area -->
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle">
                                <span>
                                        <i class="notika-icon notika-menus"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">

                                <div class="hd-mg-tt">
                                    <h2 style="color: darkred; text-transform: uppercase;" align="left">
                                        Welcome <?php echo $_SESSION['Lname']; ?></h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="<?php echo base_url(); ?>index.php/profile_controller/profileView">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">View your Profile</h3>
                                            </div>

                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-right-arrow"></i></button>

                                        </div>
                                    </a>
                                    <a href="<?php echo base_url(); ?>index.php/profile_controller/editProfileView">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">Edit your profile</h3>
                                            </div>
                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-refresh"></i></button>

                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>index.php/main_controller/logout">
                                        <div class="hd-message-sn">
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">Sign Out</h3>
                                            </div>

                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-next"></i></button>

                                        </div>
                                    </a>
                                </div>
                        </li>
                        <!--End User Profile area -->


                        <!--Start Notification area -->
                        <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button"
                                                      aria-expanded="false"
                                                      class="nav-link dropdown-toggle">
                                    <span>
                                        <i class="notika-icon notika-alarm" aria-hidden="true"></i>
                                    </span>

                            </a>
                            <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                <div class="hd-mg-tt">
                                    <h2>Notifications</h2>
                                </div>


                                <div class="hd-message-info">

                                    <?php if ($headDta != false) {

                                        foreach ($headDta as $notfy) {

                                            if ($_SESSION['user_role'] == 2) {

                                                $date = date("Y-m-d", strtotime($notfy['updateDate']));
                                                $empID = $notfy['id'];
                                                $url = base_url() . 'index.php/error_report_controller/req_summary_controller/reqSummaryView';

                                            } else {

                                                $date = date("Y-m-d", strtotime($notfy['reqDate']));
                                                $empID = $notfy['employee_id'];
                                                $url = base_url() . 'index.php/error_report_controller/req_engage_controller/reqEngageView';
                                            } ?>
                                            <a href="<?php echo $url; ?>?jobid=<?php echo $notfy['jobId']; ?>&click=1">
                                                <div class="hd-message-sn">
                                                    <div class="hd-mg-ctn">

                                                        <h3>
                                                            <?php echo $notfy['middlename'] . ' ' . $notfy['lastname'] . ' (' . $empID . ')'; ?>
                                                        </h3>
                                                        <p>
                                                            <?php echo $text; ?>
                                                        </p>
                                                        <span>
                                                            at <?php echo $date; ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } ?>

                                        <div class="hd-mg-va">
                                            <a href="<?php echo $url; ?>?jobid=<?php echo $notfy['jobId']; ?>&click=2">View
                                                All</a>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                </div>

                            </div>
                        </li>
                        <!--End Notification area -->

                        <!--Start Notification Spinner area -->
                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle"><span>
                                <div class="spinner4 spinner-4"></div>
                                <div class="ntd-ctn">
                                    <span><?php echo $notfCount; ?></span>
                                </div>

                            </a>

                        </li>
                        <!--End Notification Spinner area -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top Area -->
</body>


</html>


