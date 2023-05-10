<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/11/2022
 * Time: 3:51 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Profile | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


</head>

<body>

<?php $this->load->view('includes/header'); ?>


<?php $this->load->view('includes/navigation'); ?>


<!-- Start Profile area Start-->
<div class="invoice-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="invoice-wrap">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-list">
                            <div class="contact-win">
                                <div class="contact-img">


                                    <?php

                                    if ($profile->image_id == 0 || $profile->image_id == null) {

                                        $usericon = $profile->title;
                                        switch ($usericon) {
                                            case 'Mr.':
                                                $usericon = "male.png";
                                                break;
                                            case 'Mrs.' || 'Miss.':
                                                $usericon = "female.jpg";
                                                break;
                                            default:
                                                $usericon = "other.png";
                                                break;
                                        }
                                    } else {
                                        $usericon = $profile->image_id;
                                    }
                                    ?>

                                    <img src="<?php echo base_url(); ?>assets/img/uploads/user/<?php echo $usericon; ?>"
                                         height="100px" width="100px"
                                         alt="User Profile Image"/>
                                </div>
                                <div class="conct-sc-ic">
                                    <a class="btn" href="#"><i class="notika-icon notika-facebook"></i></a>
                                    <a class="btn" href="#"><i class="notika-icon notika-twitter"></i></a>
                                    <a class="btn" href="#"><i class="notika-icon notika-pinterest"></i></a>
                                </div>
                            </div>
                            <div class="contact-ctn">
                                <div class="contact-ad-hd">
                                    <h2>
                                        <?php if ($profile->title != null) {
                                            echo $profile->title . ' ';
                                        }

                                        if ($profile->middlename != null) {
                                            echo $profile->middlename . ' ';
                                        }

                                        if ($profile->lastname != null) {
                                            echo $profile->lastname;
                                        }
                                        ?>
                                    </h2>
                                    <p class="ctn-ads">
                                        <?php if ($profile->desig != null) {
                                            echo $profile->desig;
                                        } ?>
                                    </p>
                                </div>
                                <i class="notika-icon notika-phone"> </i><span><b><?php if ($profile->mobile != null) {
                                            echo $profile->mobile;
                                        } ?></b></span></br>
                                <i class="notika-icon notika-phone"> </i><span><b><?php if ($profile->tel != null) {
                                            echo $profile->tel;
                                        } ?></b></span></br>
                                <i class="notika-icon notika-mail"> </i><span><b><?php if ($profile->email != null) {
                                            echo $profile->email;
                                        } ?></b></span>

                            </div>

                            </br>
                            <div class="social-st-list">
                                <div class="social-sn">
                                    <h2>Logged as :</h2>
                                </div>
                                <span style="color: red"><?php if ($profile->urole != null) {
                                        echo $profile->urole;
                                    } ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-hds-pro">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <table border="0" style="margin-left: 100px; width: 100%;">

                                    <tr>
                                        <td style="text-align:right; vertical-align: center;">
                                            <span>Employee No</span>
                                        </td>

                                        <td style="text-align:left; vertical-align: center; padding-left: 30px; ">
                                            <span><?php echo $_SESSION['empNo']; ?></span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align: center; padding-top: 15px;">
                                            <h4>Initial Name</h4>
                                        </td>

                                        <td style="text-align: left; vertical-align: center; padding-top: 15px; padding-left: 30px;">
                                            <h4>
                                                <?php if ($profile->initialname != null) {
                                                    echo $profile->initialname;
                                                } else { ?>
                                                    <i><?php echo "NOT UPDATED"; ?></i>
                                                <?php } ?></h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align: center; padding-top: 15px;">
                                            <p>Name in Sinhala</p>
                                        </td>

                                        <td style="text-align: left; vertical-align: center; padding-top: 15px; padding-left: 30px;">
                                            <p><?php if ($profile->name_sinhala != null) {
                                                    echo $profile->name_sinhala;
                                                } else { ?>
                                                    <i><?php echo "NOT UPDATED"; ?></i>
                                                <?php } ?>
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align: center; ">
                                            <span>Name in Tamil</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-left: 30px;">
                                                    <span><?php if ($profile->name_tamil != null) {
                                                            echo $profile->name_tamil;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align: center; padding-top: 25px;">
                                            <span>Appointment No </span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 25px; padding-left: 30px;">
                                                    <span><?php if ($profile->appoinment_lett_no != null) {
                                                            echo $profile->appoinment_lett_no;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align:center; padding-top: 15px;">
                                            <h4>Branch</h4>
                                        </td>
                                        <td style="text-align: left; vertical-align: center; padding-left: 30px; padding-top: 15px;">
                                            <h4><?php if ($_SESSION['branch_name'] != null) {
                                                    echo $_SESSION['branch_name'];
                                                } else { ?>
                                                    <i>NOT UPDATED </i>
                                                <?php } ?>
                                            </h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right; vertical-align: center; padding-top: 5px;">
                                            <span>Gender</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 5px; padding-left: 30px;">
                                                    <span><?php if ($profile->gender != null) {
                                                            echo $profile->gender;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 5px;">
                                            <span>Civil Status</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 5px; padding-left: 30px;">
                                                    <span><?php if ($profile->cstatus != null) {
                                                            echo $profile->cstatus;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 20px;">
                                            <h4>NIC</h4>
                                        </td>

                                        <td style="text-align: left; vertical-align: center; padding-top: 20px; padding-left: 30px;">
                                            <h4><?php if ($profile->nic != null) {
                                                    echo $profile->nic;
                                                } ?>
                                            </h4>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 10px;">
                                            <p>W & OP No</p>
                                        </td>

                                        <td style="text-align: left; vertical-align: center; padding-top: 10px; padding-left: 30px;">
                                            <p><?php if ($profile->wop_no != null) {
                                                    echo $profile->wop_no;
                                                } else { ?>
                                                    <i><?php echo "NOT UPDATED"; ?></i>
                                                <?php } ?>
                                            </p>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 10px;">
                                            <span>DOB</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 10px; padding-left: 30px;">
                                                    <span><?php if ($profile->dob != null) {
                                                            echo $profile->dob;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>
                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 5px;">
                                            <span>Permanet Date</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 5px; padding-left: 30px;">
                                                    <span><?php if ($profile->permanent_date == null || $profile->permanent_date == "0000-00-00") { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } else {
                                                            echo $profile->permanent_date;
                                                        } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 5px;">
                                            <span>Appointment Date</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 5px; padding-left: 30px;">
                                                    <span><?php if ($profile->appointment_date != null) {
                                                            echo $profile->appointment_date;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 5px;">
                                            <span>Increment Date</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 5px; padding-left: 30px;">
                                                    <span><?php if ($profile->increment_date != null) {
                                                            echo $profile->increment_date;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 20px;">
                                            <h4>Residence District</h4>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 20px; padding-left: 30px;">
                                            <h4><?php if ($profile->disname != null) {
                                                    echo $profile->disname;
                                                } else { ?>
                                                    <i><?php echo "NOT UPDATED"; ?></i>
                                                <?php } ?>
                                            </h4>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 10px;">
                                            <p>Highest Education Level</p>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 10px; padding-left: 30px;">
                                            <p><?php if ($profile->level != null) {
                                                    echo $profile->level;
                                                } else { ?>
                                                    <i><?php echo "NOT UPDATED"; ?></i>
                                                <?php } ?>
                                            </p>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 10px;">
                                            <span>Permanent Address</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 10px; padding-left: 30px;">
                                                    <span><?php if ($profile->privateaddress != null) {
                                                            echo $profile->privateaddress . ' ';
                                                        }
                                                        if ($profile->privateaddress2 != null) {
                                                            echo $profile->privateaddress2 . ' ';
                                                        }
                                                        if ($profile->privateaddress3 != null) {
                                                            echo $profile->privateaddress3;
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                    <tr>

                                        <td style="text-align: right; vertical-align: center; padding-top: 10px;">
                                            <span>Present Address</span>
                                        </td>


                                        <td style="text-align: left; vertical-align: center; padding-top: 10px; padding-left: 30px;">
                                                    <span><?php if ($profile->present_address != null) {
                                                            echo $profile->present_address . ' ';
                                                        } else { ?>
                                                            <i><?php echo "NOT UPDATED"; ?></i>
                                                        <?php } ?>
                                                    </span>
                                        </td>

                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-sp">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>User Role</th>
                                        <th>Create Date</th>
                                        <th>Last Action</th>
                                        <th>Action Date</th>
                                        <th>Lock Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php if ($accounts != null) { ?>
                                        <?php $count = 1; ?>

                                        <?php foreach ($accounts as $logins) { ?>

                                            <tr>

                                                <td><?php echo $count; ?></td>

                                                <td><?php echo $logins['user_name']; ?></td>

                                                <td><?php echo $logins['name']; ?></td>

                                                <?php if ($logins['createDate'] != null) { ?>

                                                    <td> <?php echo $logins['createDate']; ?> </td>
                                                <?php } else { ?>
                                                    <td><i> NOT UPDATED </i></td>
                                                <?php } ?>

                                                <?php if ($logins['user_action'] != null) { ?>

                                                    <?php if ($logins['level'] == 'High') { ?>
                                                        <td style="color: red;"> <?php echo $logins['user_action']; ?> </td>

                                                    <?php } elseif ($logins['level'] == 'Mid') { ?>
                                                        <td style="color: green;"> <?php echo $logins['user_action']; ?> </td>

                                                    <?php } elseif ($logins['level'] == 'Low') { ?>
                                                        <td style="color: blue;"> <?php echo $logins['user_action']; ?> </td>

                                                    <?php } else { ?>
                                                        <td> <?php echo $logins['user_action']; ?> </td>

                                                    <?php } ?>

                                                <?php } else { ?>
                                                    <td><i> NOT UPDATED </i></td>

                                                <?php } ?>

                                                <?php if ($logins['date_time'] != null) { ?>

                                                    <td> <?php echo $logins['date_time']; ?> </td>
                                                <?php } else { ?>
                                                    <td><i> NOT UPDATED </i></td>
                                                <?php } ?>

                                                <?php if ($logins['lockStatus'] == 1) { ?>

                                                    <td style="color: green"> Account is Active</td>
                                                <?php } else { ?>
                                                    <td style="color: red"> Account is Inactive</td>

                                                <?php } ?>
                                            </tr>
                                            <?php $count++;
                                        } ?>

                                    <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!-- plugins for LogAlert JS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/materialize/js/materialize.min.js"></script>


<!--Script for log alert-->
<script>
    $(document).ready(function () {
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

<?php $this->load->view('includes/footer'); ?>


</html>
