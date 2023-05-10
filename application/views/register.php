<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/26/2022
 * Time: 7:47 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Register | HuRIMS</title>


    <!-- bootstrap select CSS
	============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">

    <!--    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"-->
    <!--          rel="stylesheet">-->

    <style type="text/css">
        input[type="file"] {
            display: none;
        }

        /*label[for=profileimg] {*/
        /*color: white;*/
        /*height: 50px;*/
        /*width: 300px;*/
        /*background-color: #00C292;*/
        /*position: absolute;*/
        /*margin: auto;*/
        /*top: 0;*/
        /*bottom: 0;*/
        /*left: 0;*/
        /*right: 0;*/
        /*font-size: 20px;*/
        /*display: flex;*/
        /*justify-content: center;*/
        /*align-items: center;*/
        /*font-family: "Montserrat", sans-serif;*/
        /*}*/

        label[for=idcopy] {
            color: white;
            height: 50px;
            width: 300px;
            background-color: #00C292;
            position: absolute;
            margin: auto;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            font-size: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Montserrat", sans-serif;
        }
    </style>


</head>

<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<body>
<!--Start Employee Register Area-->
<div class="form-example-area">
    <div class="container">
        <div class="row">

            <form name="emp_register" method="post"
                  action="<?php echo base_url(); ?>index.php/register_controller/registerEmployee"
                  enctype="multipart/form-data">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2 style="text-transform: uppercase; color: #666666; ">Register Employee</h2>
                            </br>
                            <h5 style="text-transform: uppercase; color: #666666; ">Personal Informations</h5>

                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Title <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="title" required>
                                                    <option value="">Please Select</option>
                                                    <option value="2">Mr.</option>
                                                    <option value="3">Mrs.</option>
                                                    <option value="4">Miss.</option>
                                                </select>
                                            </div>
                                            <?php echo form_error('title', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Last Name <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="lname"
                                                   value="<?php echo set_value('lname'); ?>"
                                                   placeholder="Enter Last Name" required>
                                            <?php echo form_error('lname', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Initials <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="initl"
                                                   value="<?php echo set_value('initl'); ?>"
                                                   placeholder="Enter Initials" required>
                                            <?php echo form_error('initl', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Name Denoted by Initials <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="intleng"
                                                   value="<?php echo set_value('intleng'); ?>"
                                                   placeholder="Enter Initials in Full" required>
                                            <?php echo form_error('intleng', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Gender <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="fm-checkbox">
                                                <label><input type="radio" value="2" name="gen" class="i-checks">
                                                    Male</label> &nbsp;
                                                <label><input type="radio" value="3" name="gen" class="i-checks"> Female</label>
                                            </div>
                                            <?php echo form_error('gen', '<span style="color: red;">', '</span>') ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">NIC <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="nic" id="nic"
                                                   value="<?php echo set_value('nic'); ?>"
                                                   placeholder="Enter NIC" maxlength="12" minlength="10" required>
                                            <?php echo form_error('nic', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">DOB <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="input-group date nk-int-st">
                                                <input type="date" class="form-control" name="dob" id="dob"
                                                       max="<?php echo date('Y-m-d', strtotime('-18 Years')); ?>"
                                                       value="<?php echo set_value('dob'); ?>" required>
                                            </div>
                                            <?php echo form_error('dob', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Permenent Address <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="add1"
                                                   value="<?php echo set_value('add1'); ?>"
                                                   placeholder="Address Line 1" required>
                                            <?php echo form_error('add1', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">

                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="add2"
                                                   value="<?php echo set_value('add2'); ?>"
                                                   placeholder="Address Line 2">
                                            <?php echo form_error('add2', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="add3"
                                                   value="<?php echo set_value('add3'); ?>"
                                                   placeholder="Address Line 3">
                                            <?php echo form_error('add3', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">City / District <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="dist"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($district != null) {
                                                        foreach ($district as $dist) { ?>

                                                            <option value="<?php echo $dist['id']; ?>"> <?php echo $dist['name']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('dist', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Residance Address</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="curadd"
                                                   value="<?php echo set_value('curadd'); ?>"
                                                   placeholder="Enter your Current Addres">
                                            <?php echo form_error('curadd', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Mobile Number <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="tel" name="mob"
                                                   class="form-control" pattern="[0-9]{10}"
                                                   value="<?php echo set_value('mob'); ?>"
                                                   placeholder="Enter Your Contact Number" maxlength="10"
                                                   minlength="10" required>
                                            <?php echo form_error('mob', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Residence Number</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="tel" name="homenum"
                                                   class="form-control" pattern="[0-9]{10}"
                                                   value="<?php echo set_value('homenum'); ?>"
                                                   placeholder="Home Number" maxlength="10" minlength="10">
                                            <?php echo form_error('homenum', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Email</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="email" class="form-control input-sm" name="mail"
                                                   value="<?php echo set_value('mail'); ?>"
                                                   placeholder="Enter Your Email Address">
                                            <?php echo form_error('mail', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Marital Status<span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="mStatus" id="mStatus"
                                                        onchange="changeStatus()" required>
                                                    <option value="A">Please Select</option>
                                                    <option value="2">Single</option>
                                                    <option value="3">Married</option>
                                                    <option value="4">Widow</option>
                                                    <option value="5">Widower</option>
                                                    <option value="6">Divorced</option>
                                                </select>
                                            </div>
                                            <?php echo form_error('mStatus', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="sDetails">
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Spouse Name</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="sname"
                                                       value="<?php echo set_value('sname'); ?>"
                                                       placeholder="Enter Spouse Name">
                                                <?php echo form_error('sname', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">Spouse Occupation</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="socc"
                                                       value="<?php echo set_value('socc'); ?>"
                                                       placeholder="Enter Spouse Occupation">
                                                <?php echo form_error('socc', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                            <label class="hrzn-fm">No of Children</label>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="chldqty"
                                                       value="<?php echo set_value('chldqty'); ?>"
                                                       placeholder="No of Children">
                                                <?php echo form_error('chldqty', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5 style="text-transform: uppercase; color: #666666; ">Educational Informations</h5>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Highest Education Qualification <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="eduQlif"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($HgEduLvl != null) {
                                                        foreach ($HgEduLvl as $Level) {
                                                            ?>
                                                            <option value="<?php echo $Level['id']; ?>"><?php echo $Level['level']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('eduQlif', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <h5 style="text-transform: uppercase; color: #666666; ">Appointment Informations</h5>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Appointment Type <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="apptType"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($apptTypes != null) {
                                                        foreach ($apptTypes as $types) { ?>
                                                            <option value="<?php echo $types['id']; ?>"><?php echo $types['name']; ?></option>
                                                            <?php
                                                        }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('apptType', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Appointment No <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="apptNo"
                                                   value="<?php echo set_value('apptNo'); ?>"
                                                   placeholder="Enter Appointment Number" required>
                                            <?php echo form_error('apptNo', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Assigned Work Station</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="workstation">
                                                    <option value="">Please Select</option>
                                                    <?php if ($branches != null) {
                                                        foreach ($branches as $branch) { ?>
                                                            <option value="<?php echo $branch['id']; ?>"><?php echo $branch['name']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('workstation', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Service <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="service"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($serviceTypes != null) {
                                                        foreach ($serviceTypes as $services) { ?>
                                                            <option value="<?php echo $services['id']; ?>"><?php echo $services['name']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('desig', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Designation <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="desig"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($designations != null) {
                                                        foreach ($designations as $desg) { ?>
                                                            <option value="<?php echo $desg['id']; ?>"><?php echo $desg['name']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('desig', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Grade <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="grade" required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($grades != null) {
                                                        foreach ($grades as $grade) { ?>
                                                            <option value="<?php echo $grade['id']; ?>"><?php echo $grade['name']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('grade', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Salary Code <span style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" data-live-search="true" name="salcode"
                                                        required>
                                                    <option value="">Please Select</option>
                                                    <?php if ($salCode != null) {
                                                        foreach ($salCode as $scode) { ?>
                                                            <option value="<?php echo $scode['id']; ?>"><?php echo $scode['name']; ?></option>

                                                        <?php }
                                                    } ?>
                                                </select>
                                            </div>
                                            <?php echo form_error('salcode', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date of First Appointment <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="input-group date nk-int-st">
                                                <input type="date" class="form-control" name="apptDate"
                                                       value="<?php echo set_value('apptDate'); ?>"
                                                       max="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                            <?php echo form_error('apptDate', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date of Duty Report <span
                                                    style="color: red;">*</span></label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="input-group date nk-int-st">
                                                <input type="date" class="form-control" name="rptDate"
                                                       value="<?php echo set_value('rptDate'); ?>"
                                                       max="<?php echo date('Y-m-d'); ?>" required>
                                            </div>
                                            <?php echo form_error('rptDate', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Date of Permanent</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <div class="input-group date nk-int-st">
                                                <input type="date" class="form-control" name="pmtdate"
                                                       value="<?php echo set_value('pmtdate'); ?>"
                                                       max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                            <?php echo form_error('pmtdate', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">W & OP Number</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control input-sm" name="wop"
                                                   value="<?php echo set_value('wop'); ?>"
                                                   placeholder="Enter W & OP Number">
                                            <?php echo form_error('wop', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--                        <div class="form-example-int form-horizental">-->
                        <!--                            <div class="form-group">-->
                        <!--                                <div class="row">-->
                        <!--                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">-->
                        <!--                                        <label class="hrzn-fm">Profile Photo</label>-->
                        <!--                                    </div>-->
                        <!--                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">-->
                        <!--                                        <div class="nk-int-st">-->
                        <!--                                            <input type="file" id="profileimg" name="profileimg" accept="image/*"-->
                        <!--                                                   required>-->
                        <!--                                            <label for="profileimg">-->
                        <!--                                                <i class="fa fa-upload fa-2x" style="color: #3c3f48;"></i>&nbsp;-->
                        <!--                                                <b>Upload a Profile Photo</b>-->
                        <!--                                            </label>-->
                        <!--                                        </div>-->
                        <!--                                    </div>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!---->
                        <!--                        <br>-->
                        <!--                        --><?php //echo form_error('profileimg', '<span style="color: red;">', '</span>') ?>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ID Card Copy</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                        <div class="nk-int-st">
                                            <input type="file" id="idcopy" name="idcopy" accept="application/pdf"
                                                   required>
                                            <label for="idcopy">
                                                <i class="fa fa-upload fa-2x" style="color: #3c3f48;"></i>&nbsp;
                                                <b>Upload a ID Card Copy</b>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <?php echo form_error('idcopy', '<span style="color: red;">', '</span>') ?>

                        <div class="form-example-int mg-t-15">
                            <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                </div>
                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <div class="dialog-pro dialog">
                                        <button type="reset" class="btn btn-danger">Reset</button>&nbsp;
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Employee Register area End-->

<!-- Start Footer area-->
<div id="footer" class="footer-copyright-area" style="overflow:hidden;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="footer-copy-right">
                    <p>Department Of Survey. Developed by <a href="#">S. Heshan</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer area-->

</body>

<!-- jquery for select date pickers and components
  ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>

<!-- bootstrap JS for form components and Scroll options
  ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- flot JS for select form components
   ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/flot-active.js"></script>

<!-- bootstrap select JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select/bootstrap-select.js"></script>

<!-- main JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

<!-- icheck JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/icheck/icheck-active.js"></script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!-- plugins for LogAlert JS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/materialize/js/materialize.min.js"></script>

<!--  SweetAlert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dialog/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dialog/dialog-active.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        document.getElementById("sDetails").style.visibility = "hidden";

        <?php if (isset($_SESSION['success'])) {?>
        swal({
            text: "<?php echo $_SESSION['success']?>",
            type: "success",

        });
        <?php } elseif (isset($_SESSION['error'])) {?>
        swal({
            text: "<?php echo $_SESSION['error']?>",
            type: "error",

        });
        <?php }?>
    });

    function changeStatus() {
        var status = document.getElementById("mStatus");

        if (status.value == "A" || status.value == "2") {

            document.getElementById("sDetails").style.visibility = "hidden";
        } else {
            document.getElementById("sDetails").style.visibility = "visible";

        }
    }

    // Ajax function to Check Nic in the system

    $(document).ready(function () {
        $('#dob').click(function () {
            var nic = $('#nic').val();

            $.ajax({
                type: 'POST',
                data: {idNo: nic},
                url: '<?php echo base_url();?>index.php/register_controller/checkNic',
                success: function (result) {
                    if (result == 1) {
                        swal({
                            text: "This NIC no already registered with the system",
                            type: "error",

                        });
                    }
                }
            });
        });
    });


</script>


</html>
