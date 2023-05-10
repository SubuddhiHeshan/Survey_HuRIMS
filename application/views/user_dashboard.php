<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/13/2022
 * Time: 11:04 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Dashboard | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/plugins/materialize/css/materialize.min.css">


</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--Load Header with styles-->
<?php $this->load->view('includes/header'); ?>

<!--Load Nav pane to page-->
<?php $this->load->view('includes/navigation'); ?>


<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <!--Start Counter Area-->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">
                                   <?php echo $counter->casual; ?>
                               </span></h2>
                        <p>Casual Leaves for year <?php echo date("Y") - 1; ?></p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $counter->vacation; ?></span></h2>
                        <p>Vacation Leaves for year <?php echo date("Y") - 1; ?></p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $counter->laps; ?></span></h2>
                        <p>Laps Leaves for year <?php echo date("Y") - 1; ?></p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $count->countAct; ?></span></h2>
                        <p>Total Actions you Made</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Counter Area-->

<!-- Start Contact Info area-->
<div class="contact-info-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-inner">
                    <div class="contact-hd widget-ctn-hd">
                        <h2>Basic Information</h2>
                        <p style="text-transform: capitalize; color: green;">If your informations are not accurate or
                            not updated, Please update the details</p>
                    </div>
                    <div class="contact-dt">
                        <ul class="contact-list widget-contact-list">
                            <li><i class="notika-icon notika-phone"></i> <?php echo $contact->mobile; ?></li>
                            <li><i class="notika-icon notika-mail"></i> <?php echo $contact->email; ?></li>
                            <li><i class="notika-icon notika-star"></i> <?php echo $contact->nic; ?></li>
                            <li><i class="notika-icon notika-social"></i> <?php echo $contact->cstatus; ?></li>
                            <li>
                                <i class="notika-icon notika-map"></i> <?php echo ucfirst(strtolower($contact->privateaddress . ' ' . $contact->privateaddress2 . ' ' . $contact->privateaddress3)); ?>
                            </li>
                        </ul>
                    </div>
                    <div class="contact-map widget-contact-map">
                        <div id="map6"></div>
                    </div>

                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-inner">
                    <div class="contact-hd widget-ctn-hd">
                        <h2>EB Counter</h2>
                        <p style="text-transform: capitalize;">Try to acheive your EB Exam within the Counter </p>
                    </div>
                    <div class="contact-dt">
                        <br>
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">

                                <?php if ($ebpassData != null) { ?>
                                    <h2><span class="counter"
                                              style="font-size: 80px; color: red; margin-left: 100px;"><?php echo $dayCount; ?></span><span> Days</span>
                                    </h2>
                                    <p style=" font-size: 25px; text-transform: uppercase; margin-left: 20px; color: blue;">
                                        <b>Congragulations
                                    </p>
                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 20px;">You have
                                        been Acheived your
                                        EB </p>
                                    <p style="margin-top: 2px; margin-left: 120px;">at</p>

                                    <span style="margin-top: 5px; margin-left: 85px; color: blue;"><?php echo $ebpassData->exam_pass_date; ?></span></b></p>
                                <?php } else {

                                    if ($dayCountStatus == "L") {
                                        ?>
                                        <h2><span class="counter"
                                                  style="font-size: 80px; color: red; margin-left:20px;">
                                <?php echo $dayCount; ?></span>
                                            <span>Days Passed</span>
                                        </h2>

                                        <p style="  margin-left: 20px; text-transform: uppercase; color: red;"><b>Acheive
                                                Your
                                                EB Exam</b></p>

                                        <span style="margin-left: 95px;">Deadline was</span> <h2
                                                style="margin-left: 160px; color: blue;"><?php echo $ebpassDeadline; ?></b>
                                        </h2>

                                    <?php } elseif ($dayCountStatus == "M") { ?>
                                        <h2><span class="counter"
                                                  style="font-size: 80px; color: red; margin-left:20px;">
                                <?php echo $dayCount; ?></span>
                                            <span>Days More</span>
                                        </h2>

                                        <p style="  margin-left: 20px; text-transform: uppercase; color: red;"><b>Acheive
                                                Your
                                                EB Exam</b></p>

                                        <span style="margin-left: 95px;">Deadline is</span> <h2
                                                style="margin-left: 160px; color: blue;"><?php echo $ebpassDeadline; ?></b>
                                        </h2>
                                    <?php } ?>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-inner">
                    <div class="contact-hd widget-ctn-hd">
                        <h2>Salary Increment Counter</h2>
                        <p style="text-transform: capitalize;">Keep track with your salary increment status </p>
                    </div>
                    <div class="contact-dt">
                        <br>
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">

                                <?php if ($increData != null) { ?>
                                    <h2><span class="counter"
                                              style="font-size: 80px; color: blue; margin-left: 20px;"><?php echo $increDayCount; ?></span><span> Days</span>
                                    </h2>
                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 20px; color: blue;">
                                        <b>After Your Last Incremnet Status
                                    </p>
                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 40px;">Last
                                        Increment</p> <h2
                                            style="margin-left: 120px; font-size: 20px; color: red; text-transform: uppercase;">
                                        <span><?php echo $increData->name; ?></span></h2>

                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 40px;">For
                                        Year</p> <h2
                                            style="margin-left: 120px; font-size: 20px; color: red; text-transform: uppercase;">
                                        <span><?php echo $increData->year; ?></span></h2>
                                    <p style="margin-top: 2px; margin-left: 120px;">at</p>

                                    <span style="margin-top: 5px; margin-left: 85px; color: blue;"><?php echo $increData->granted_date; ?></span></b></p>

                                <?php } else { ?>
                                    <h2><span class="counter"
                                              style="font-size: 80px; color: blue; margin-left: 20px;"><?php echo $increDayCount; ?></span><span> Days</span>
                                    </h2>
                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 20px; color: blue;">
                                        <b>Without your Incremnet
                                    </p>
                                    <p style="text-transform: uppercase; margin-top: 5px; margin-left: 40px;">Since</p>
                                    <h2
                                            style="margin-left: 120px; font-size: 20px; color: red; text-transform: uppercase;">
                                        <span><?php echo $contact->appointment_date; ?></span></h2>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Info area-->


</body>
<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!-- plugins for LogAlert JS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/materialize/js/materialize.min.js"></script>

<!-- Google map JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/google.maps/google.maps-active.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVOIQ3qXUCmKVVV7DVexPzlgBcj5mQJmQ&callback=initMap"></script>


<!--Script for log alert-->
<script>
    $(document).ready(function () {
        <?php if(isset($_SESSION['log_success'])) {?>

        setTimeout(function () {
            Materialize.toast('<?php echo "Hello" . " " . ucfirst(strtolower($_SESSION['Lname'])) . " " . $_SESSION['log_success'] ?>', 4000)
        }, 2000);

        <?php }?>

        <?php if(isset($_SESSION['success'])) {?>

        swal({
            text: "<?php echo $_SESSION['success']?>",
            type: "success",

        });

        <?php } else{
        if (isset($_SESSION['error'])) {?>
        swal({
            text: "<?php echo $_SESSION['error']?>",
            type: "error",

        });

        <?php   }
        }?>
    });


</script>

<!--Load footer with js and sources-->
<?php $this->load->view('includes/footer'); ?>

</html>