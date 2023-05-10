<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 10/8/2022
 * Time: 8:48 PM
 */
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Manage Employee | HuRIMS</title>

    <!-- Data Table CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notification/notification.css">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">

    <style type="text/css">
        input[type="file"] {
            display: none;
        }

        label[for=profileimg] {
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
<!--Modal for Add user start-->
<div class="modal fade" id="ModalUserAdd" role="dialog">
    <div class="modal-dialog modal-large">

        <div class="modal-content">
            <h5 style="text-transform: uppercase; color: #666666; ">Add Employee Informations : <span
                        style="color: #0277CA;" class="emp_fName_view"></span>
                <span style="color: #0277CA;" class="emp_lName_view"></span></h5>
            <div class="widget-tabs-list">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeA">Exam Details</a></li>
                    <li><a data-toggle="tab" href="#menu1">Commendation</a></li>
                    <li><a data-toggle="tab" href="#menu2">Annual Leave</a></li>
                    <li><a data-toggle="tab" href="#menu3">Annual Salary Increment</a></li>
                    <li><a data-toggle="tab" href="#menu4">Clearance Details</a></li>
                </ul>
                <div class="tab-content tab-custom-st">

                    <div id="homeA" class="tab-pane fade in active">
                        <div class="tab-ctn">
                            <form name="exForm" id="exForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/addExamDetails">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Type of Exam <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select class="selectpicker" name="exTypes" required>
                                                                <option value="">Please Select</option>
                                                                <option value="EB Exam">EB Exam</option>
                                                                <option value="Promotion Exam">Promotion Exam</option>
                                                            </select>
                                                        </div>
                                                        <?php echo form_error('exTypes', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Exam Name <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" id="exName"
                                                               name="exName"
                                                               value="<?php echo set_value('exName'); ?>"
                                                               placeholder="Enter Exam Name" required>
                                                        <?php echo form_error('exName', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Exam Pass Date/or Release Date <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="input-group date nk-int-st">
                                                            <input type="date" class="form-control" name="passDate"
                                                                   id="passDate"
                                                                   value="
                            <?php echo set_value('passDate'); ?>" required>
                                                        </div>
                                                        <?php echo form_error('passDate', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Language Proficiency Obtained Date <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="input-group date nk-int-st">
                                                            <input type="date" class="form-control" name="obtDate"
                                                                   id="obtDate"
                                                                   value="
                            <?php echo set_value('obtDate'); ?>" required>
                                                        </div>
                                                        <?php echo form_error('obtDate', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="emp_id_view"
                                                               name="emp_id_view" value=""
                                                               readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="exformReset" class="btn btn-default" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="menu1" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="commdForm" id="commdForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/addCommndDtls">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Reason for Commendation <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" id="reason"
                                                               name="reason"
                                                               value="<?php echo set_value('reason'); ?>"
                                                               placeholder="Enter Reason for Commendation" required>
                                                        <?php echo form_error('reason', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Letter No <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" id="letterNo"
                                                               name="letterNo"
                                                               value="<?php echo set_value('letterNo'); ?>"
                                                               placeholder="Enter Letter No" required>
                                                        <?php echo form_error('letterNo', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Letter Date <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="input-group date nk-int-st">
                                                            <input type="date" class="form-control" name="letterDate"
                                                                   id="letterDate"
                                                                   value="
                            <?php echo set_value('letterDate'); ?>" required>
                                                        </div>
                                                        <?php echo form_error('letterDate', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Letter Issued By <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm" id="issuedBy"
                                                               name="issuedBy"
                                                               value="<?php echo set_value('issuedBy'); ?>"
                                                               placeholder="Enter Letter Issued By" required>
                                                        <?php echo form_error('issuedBy', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Remarks </label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <textarea name="rmks" class="form-control auto-size" rows="2"
                                                                  placeholder="Start pressing Enter to see growing..."></textarea>
                                                        <?php echo form_error('rmks', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="emp_id_view2"
                                                               name="emp_id_view2" value=""
                                                               readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="commdFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="menu2" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="leaveForm" id="leaveForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/addAnnualLeaveDtls">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="number" class="form-control input-sm" id="year"
                                                       name="year"
                                                       value="<?php echo set_value('year'); ?>"
                                                       placeholder="Enter Year" required>
                                                <span id="LYearMsg"></span>
                                            </div>
                                            <?php echo form_error('year', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="casual"
                                                       name="casual"
                                                       value="<?php echo set_value('casual'); ?>"
                                                       placeholder="Casual Leave">
                                            </div>
                                            <?php echo form_error('casual', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="vaccation"
                                                       name="vaccation"
                                                       value="<?php echo set_value('vaccation'); ?>"
                                                       placeholder="Vaccation Leave">
                                            </div>
                                            <?php echo form_error('vaccation', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="laps"
                                                       name="laps"
                                                       value="<?php echo set_value('laps'); ?>"
                                                       placeholder="Laps">
                                            </div>
                                            <?php echo form_error('laps', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="number" class="form-control input-sm" id="yearoflaps"
                                                       name="yearoflaps"
                                                       value="<?php echo set_value('yearoflaps'); ?>"
                                                       placeholder="Year of Laps">
                                            </div>
                                            <?php echo form_error('yearoflaps', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="halfpay"
                                                       name="halfpay"
                                                       value="<?php echo set_value('halfpay'); ?>"
                                                       placeholder="Hlaf Pay Leave">
                                            </div>
                                            <?php echo form_error('halfpay', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="nopay"
                                                       name="nopay"
                                                       value="<?php echo set_value('nopay'); ?>"
                                                       placeholder="No Pay Leave">
                                            </div>
                                            <?php echo form_error('nopay', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="Other"
                                                       name="Other"
                                                       value="<?php echo set_value('Other'); ?>"
                                                       placeholder="Other Leave">
                                            </div>
                                            <?php echo form_error('Other', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="matfull"
                                                       name="matfull"
                                                       value="<?php echo set_value('matfull'); ?>"
                                                       placeholder="Maternity Full Pay">
                                            </div>
                                            <?php echo form_error('matfull', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="mathalf"
                                                       name="mathalf"
                                                       value="<?php echo set_value('mathalf'); ?>"
                                                       placeholder="Maternity Hlaf Pay">
                                            </div>
                                            <?php echo form_error('mathalf', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="matnopay"
                                                       name="matnopay"
                                                       value="<?php echo set_value('matnopay'); ?>"
                                                       placeholder="Maternity No Pay">
                                            </div>
                                            <?php echo form_error('matnopay', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="nopayforeign"
                                                       name="nopayforeign"
                                                       value="<?php echo set_value('nopayforeign'); ?>"
                                                       placeholder="No Pay Foreign Leave">
                                            </div>
                                            <?php echo form_error('nopayforeign', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="sick"
                                                       name="sick"
                                                       value="<?php echo set_value('sick'); ?>"
                                                       placeholder="Sick Leave">
                                            </div>
                                            <?php echo form_error('sick', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="accident"
                                                       name="accident"
                                                       value="<?php echo set_value('accident'); ?>"
                                                       placeholder="Accident Leave">
                                            </div>
                                            <?php echo form_error('accident', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="study"
                                                       name="study"
                                                       value="<?php echo set_value('study'); ?>"
                                                       placeholder="Study Leave">
                                            </div>
                                            <?php echo form_error('study', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="lieu"
                                                       name="lieu"
                                                       value="<?php echo set_value('lieu'); ?>"
                                                       placeholder="Lieu Leave">
                                            </div>
                                            <?php echo form_error('lieu', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="duty"
                                                       name="duty"
                                                       value="<?php echo set_value('duty'); ?>"
                                                       placeholder="Duty Leave">
                                            </div>
                                            <?php echo form_error('duty', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" id="remarkLeave"
                                                       name="remarkLeave"
                                                       value="<?php echo set_value('remarkLeave'); ?>"
                                                       placeholder="Remarks">
                                            </div>
                                            <?php echo form_error('remarkLeave', '<span style="color: red;">', '</span>') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="emp_id_view3"
                                                           name="emp_id_view3" value=""
                                                           readonly hidden>
                                                </div>
                                                <?php echo form_error('emp_id_view3', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="leaveFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="menu3" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="incrementForm" id="incrementForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/addIncrementDtls">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Year <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="number" class="form-control input-sm"
                                                               id="increYear"
                                                               name="increYear"
                                                               value="<?php echo set_value('increYear'); ?>"
                                                               placeholder="Enter Increment Year" required>
                                                        <span id="IYearMsg"></span>
                                                        <?php echo form_error('increYear', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Last Increment Status <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select class="selectpicker" name="increStatus"
                                                                    id="increStatus" required>
                                                                <option value="">Please Select</option>
                                                                <option value="2">Granted</option>
                                                                <option value="4">Suspending</option>
                                                                <option value="5">Stopping</option>
                                                                <option value="6">Differed</option>
                                                            </select>
                                                        </div>
                                                        <?php echo form_error('increStatus', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Increment Date<span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="input-group date nk-int-st">
                                                            <input type="date" class="form-control" name="increDate"
                                                                   id="increDate"
                                                                   value="
                            <?php echo set_value('increDate'); ?>" required>
                                                        </div>
                                                        <?php echo form_error('increDate', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Period </label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="periodSuspend"
                                                               name="periodSuspend"
                                                               value="<?php echo set_value('periodSuspend'); ?>"
                                                               placeholder="Enter Period for Suspending">
                                                        <?php echo form_error('periodSuspend', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="emp_id_view4"
                                                               name="emp_id_view4" value=""
                                                               readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="incrementformReset" class="btn btn-default"
                                            data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="menu4" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="clearanceForm" id="clearanceForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/addClearanceDtls">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Working Station</label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" style="color: #00c292; font-size: large;"
                                                               class="form-control input-sm"
                                                               id="clearBranch"
                                                               name="clearBranch"
                                                               value=""
                                                               placeholder="Branch Name" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Period <span
                                                                style="color: red;">*</span> </label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="period"
                                                               name="period"
                                                               value="<?php echo set_value('period'); ?>"
                                                               placeholder="Enter Time Period for Clearance" required>
                                                        <?php echo form_error('period', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Issued Status <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="bootstrap-select fm-cmp-mg">
                                                            <select class="selectpicker" name="status"
                                                                    id="status" required>
                                                                <option value="">Please Select</option>
                                                                <option value="Yes">Yes</option>
                                                                <option value="No">No</option>
                                                            </select>
                                                        </div>
                                                        <?php echo form_error('status', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Certificate No <span
                                                                style="color: red;">*</span> </label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="certfNo"
                                                               name="certfNo"
                                                               value="<?php echo set_value('certfNo'); ?>"
                                                               placeholder="Enter Certificate No" required>
                                                        <?php echo form_error('certfNo', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Issued Date <span
                                                                style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <div class="input-group date nk-int-st">
                                                            <input type="date" class="form-control" name="issueDate"
                                                                   id="issueDate"
                                                                   value="<?php echo set_value('issueDate'); ?>"
                                                                   required>
                                                        </div>
                                                        <?php echo form_error('issueDate', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <label class="hrzn-fm">Issued By <span style="color: red;">*</span></label>
                                                </div>
                                                <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="issuedBy"
                                                               name="issuedBy"
                                                               value="<?php echo set_value('issuedBy'); ?>"
                                                               placeholder="Issued By" required>
                                                        <?php echo form_error('issuedBy', '<span style="color: red;">', '</span>') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="emp_id_view5"
                                                               name="emp_id_view5" value=""
                                                               readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-example-int form-horizental">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control input-sm"
                                                               id="emp_br_id"
                                                               name="emp_br_id" value=""
                                                               readonly hidden>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="clearanceFormReset" class="btn btn-default"
                                            data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal for Add user End-->

<!--Modal for Edit user start-->
<div class="modal fade" id="ModalUserEdit" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <h5 style="text-transform: uppercase; color: #666666; ">Edit Employee Informations : <span
                        style="color: #0277CA;" class="emp_fName_edit_view"></span>
                <span style="color: #0277CA;" class="emp_lName_edit_view"></span></h5>
            <div class="widget-tabs-list">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#homeB">Employee Info</a></li>
                    <li><a data-toggle="tab" href="#menuA">Profile Picture</a></li>
                    <li><a data-toggle="tab" href="#menuB">Incremnet Date</a></li>
                    <li><a data-toggle="tab" href="#menuC">Designation</a></li>
                    <li><a data-toggle="tab" href="#menuD">Working Station</a></li>
                </ul>
                <div class="tab-content tab-custom-st">

                    <div id="homeB" class="tab-pane fade in active">
                        <div class="tab-ctn">
                            <form name="ediEmpDataForm" id="ediEmpDataForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/updateEmpDtls">
                                <h5 style="text-transform: uppercase; color: #666666; ">Personal Informations</h5>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <select class="form-control input-sm" name="title" id="title" required>
                                                    <option value="2">Mr.</option>
                                                    <option value="3">Mrs.</option>
                                                    <option value="4">Miss.</option>
                                                </select>
                                                <?php echo form_error('title', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="lname" id="lname"
                                                       value="<?php echo set_value('lname'); ?>"
                                                       placeholder="Enter Last Name" required>
                                                <?php echo form_error('lname', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="initl" id="initl"
                                                       value="<?php echo set_value('initl'); ?>"
                                                       placeholder="Enter Initials" required>
                                                <?php echo form_error('initl', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="intleng"
                                                       id="intleng"
                                                       value="<?php echo set_value('intleng'); ?>"
                                                       placeholder="Enter Initials in English" required>
                                                <?php echo form_error('intleng', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="intlSin"
                                                       id="intlSin"
                                                       value="<?php echo set_value('intlSin'); ?>"
                                                       placeholder="Enter Initials in Sinhala">
                                                <?php echo form_error('intlSin', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="intlTam"
                                                       id="intlTam"
                                                       value="<?php echo set_value('intlTam'); ?>"
                                                       placeholder="Enter Initials in Tamil">
                                                <?php echo form_error('intlTam', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br><br><br>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <select class="form-control input-sm" name="gen" id="gen"
                                                        required>
                                                    <option value="2">Male</option>
                                                    <option value="3">Female</option>
                                                    <option value="4">Other</option>
                                                </select>
                                                <?php echo form_error('gen', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="nic" id="nic"
                                                       value="<?php echo set_value('nic'); ?>"
                                                       placeholder="Enter NIC" maxlength="12" minlength="10" required>
                                                <?php echo form_error('nic', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"><b>Date of Birth</b></label>
                                        <div class="form-group">
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
                                <br><br><br>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="add1" id="add1"
                                                       value="<?php echo set_value('add1'); ?>"
                                                       placeholder="Address Line 1" required>
                                                <?php echo form_error('add1', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="add2" id="add2"
                                                       value="<?php echo set_value('add2'); ?>"
                                                       placeholder="Address Line 2">
                                                <?php echo form_error('add2', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="add3" id="add3"
                                                       value="<?php echo set_value('add3'); ?>"
                                                       placeholder="Address Line 3">
                                                <?php echo form_error('add3', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"><b>Residence District</b></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <select class="form-control input-sm" name="district" id="district"
                                                        required>
                                                    <?php if ($dists != null) {
                                                        foreach ($dists as $dist) { ?>

                                                            <option value="<?php echo $dist['id']; ?>"> <?php echo $dist['name']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                    } ?>
                                                </select>
                                                <?php echo form_error('district', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="curadd"
                                                       id="curadd"
                                                       value="<?php echo set_value('curadd'); ?>"
                                                       placeholder="Enter your Current Addres">
                                                <?php echo form_error('curadd', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="tel" name="mob" id="mob"
                                                       class="form-control" pattern="[0-9]{10}"
                                                       value="<?php echo set_value('mob'); ?>"
                                                       placeholder="Enter Your Contact Number" maxlength="10"
                                                       minlength="10" required>
                                                <?php echo form_error('mob', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="tel" name="homenum" id="homenum"
                                                       class="form-control" pattern="[0-9]{10}"
                                                       value="<?php echo set_value('homenum'); ?>"
                                                       placeholder="Home Number" maxlength="10" minlength="10">
                                                <?php echo form_error('homenum', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="email" class="form-control input-sm" name="mail" id="mail"
                                                       value="<?php echo set_value('mail'); ?>"
                                                       placeholder="Enter Your Email Address">
                                                <?php echo form_error('mail', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>

                                <h5 style="text-transform: uppercase; color: #666666; ">Educational Informations</h5>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <select class="form-control input-sm" name="eduLevel" id="eduLevel"
                                                        required>
                                                    <?php if ($higedu != null) {
                                                        foreach ($higedu as $edu) { ?>

                                                            <option value="<?php echo $edu['id']; ?>"> <?php echo $edu['level']; ?>
                                                            </option>

                                                            <?php
                                                        }
                                                    } ?>
                                                </select>
                                                <?php echo form_error('eduLevel', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <h5 style="text-transform: uppercase; color: #666666; ">Appointment Informations</h5>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="apptNo"
                                                       id="apptNo"
                                                       value="<?php echo set_value('apptNo'); ?>"
                                                       placeholder="Enter Appointment Number" required>
                                                <?php echo form_error('apptNo', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"><b>First Appointment Date</b></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <div class="input-group date nk-int-st">
                                                    <input type="date" class="form-control" name="apptDate"
                                                           id="apptDate"
                                                           value="<?php echo set_value('apptDate'); ?>"
                                                           max="<?php echo date('Y-m-d'); ?>" required>
                                                </div>
                                                <?php echo form_error('apptDate', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br><br>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"><b>Permanent Date</b></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <div class="input-group date nk-int-st">
                                                    <input type="date" class="form-control" name="pmtdate" id="pmtdate"
                                                           value="<?php echo set_value('pmtdate'); ?>"
                                                           max="<?php echo date('Y-m-d'); ?>">
                                                </div>
                                                <?php echo form_error('pmtdate', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <label class="hrzn-fm"></label>
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="text" class="form-control input-sm" name="wop" id="wop"
                                                       value="<?php echo set_value('wop'); ?>"
                                                       placeholder="Enter W & OP Number">
                                                <?php echo form_error('wop', '<span style="color: red;">', '</span>') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="up_info_emp_id"
                                                           name="up_info_emp_id" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="upEmpDtlFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div id="menuA" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="dpForm" id="dpForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/uploadDp"
                                  enctype="multipart/form-data">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-example-int form-example-st">
                                        <div class="form-group">
                                            <div class="nk-int-st">
                                                <input type="file" id="profileimg" name="profileimg" accept="image/*"
                                                       required>
                                                <label for="profileimg">
                                                    <i class="fa fa-upload fa-2x"
                                                       style="color: #3c3f48;"></i>&nbsp;
                                                    <b>Upload a Profile Photo</b>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="up_info_emp_id1"
                                                           name="up_info_emp_id1" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="dpFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div id="menuB" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="increDateForm" id="increDateForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/incrementDateUpdate">
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Increment Date <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm" id="upIncreDate"
                                                           name="upIncreDate"
                                                           value="<?php echo set_value('upIncreDate'); ?>"
                                                           placeholder="Enter Month-Year" required>
                                                    <?php echo form_error('upIncreDate', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="up_info_emp_id2"
                                                           name="up_info_emp_id2" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="increDateFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div id="menuC" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="desigUpForm" id="desigUpForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/designationUpdate">
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Designation <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <select class="form-control input-sm" name="desig" id="desig"
                                                            required>
                                                        <?php if ($desig != null) {
                                                            foreach ($desig as $des) { ?>

                                                                <option value="<?php echo $des['id']; ?>"> <?php echo $des['name']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                    <?php echo form_error('desig', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Grade <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <select class="form-control input-sm" name="grade" id="grade"
                                                            required>
                                                        <?php if ($grade != null) {
                                                            foreach ($grade as $gra) { ?>

                                                                <option value="<?php echo $gra['id']; ?>"> <?php echo $gra['name']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                    <?php echo form_error('grade', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Salary Code <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <select class="form-control input-sm" name="salcode" id="salcode"
                                                            required>
                                                        <?php if ($salCode != null) {
                                                            foreach ($salCode as $sal) { ?>

                                                                <option value="<?php echo $sal['id']; ?>"> <?php echo $sal['name']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                    <?php echo form_error('salcode', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">From Date <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <div class="input-group date nk-int-st">
                                                        <input type="date" class="form-control" name="promtDate"
                                                               id="promtDate"
                                                               value="<?php echo set_value('promtDate'); ?>" required>
                                                    </div>
                                                    <?php echo form_error('promtDate', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Increment Date <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm" id="desigIncreDate"
                                                           name="desigIncreDate"
                                                           value="<?php echo set_value('desigIncreDate'); ?>"
                                                           placeholder="Enter Month-Year" required>
                                                    <?php echo form_error('desigIncreDate', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Remarks </label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm" id="desigRemak"
                                                           name="desigRemak"
                                                           value="<?php echo set_value('desigRemak'); ?>"
                                                           placeholder="Enter Remarks">
                                                    <?php echo form_error('desigRemak', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="up_info_emp_id3"
                                                           name="up_info_emp_id3" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="desigFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div id="menuD" class="tab-pane fade">
                        <div class="tab-ctn">
                            <form name="upWorkingStationForm" id="upWorkingStationForm" method="post"
                                  action="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/updateWorkingStation">

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm"> Current Working Office</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm" id="curOfz"
                                                           style="color: #00c292; font-size: large;"
                                                           name="curOfz"
                                                           value="<?php echo set_value('curOfz'); ?>"
                                                           placeholder="Working Office" readonly>
                                                    <?php echo form_error('curOfz', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Reason For Update <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <select class="form-control input-sm" name="upReason" id="upReason"
                                                            required>
                                                        <option value="">Please Select</option>
                                                        <?php if ($apptTypes != null) {
                                                            foreach ($apptTypes as $types) { ?>

                                                                <option value="<?php echo $types['id']; ?>"> <?php echo $types['name']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                    <?php echo form_error('upReason', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Assigned Office <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <select class="form-control input-sm" name="assgOfz" id="assgOfz"
                                                            required>
                                                        <option value="">Please Select</option>
                                                        <?php if ($branches != null) {
                                                            foreach ($branches as $branch) { ?>

                                                                <option value="<?php echo $branch['id']; ?>"> <?php echo $branch['name']; ?>
                                                                </option>

                                                                <?php
                                                            }
                                                        } ?>
                                                    </select>
                                                    <?php echo form_error('assgOfz', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Transferred Date <span
                                                            style="color: red;">*</span></label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <div class="input-group date nk-int-st">
                                                        <input type="date" class="form-control" name="trnfdate"
                                                               id="trnfdate"
                                                               value="<?php echo set_value('trnfdate'); ?>" required>
                                                    </div>
                                                    <?php echo form_error('trnfdate', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Remarks </label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm" id="ofzRemark"
                                                           name="ofzRemark"
                                                           value="<?php echo set_value('ofzRemark'); ?>"
                                                           placeholder="Enter Remarks">
                                                    <?php echo form_error('ofzRemark', '<span style="color: red;">', '</span>') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="up_info_emp_id4"
                                                           name="up_info_emp_id4" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" class="form-control input-sm"
                                                           id="emp_up_br_id"
                                                           name="emp_up_br_id" value=""
                                                           readonly hidden>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Save changes
                                    </button>
                                    <button type="button" id="wokStationFormReset" class="btn btn-default"
                                            data-dismiss="modal">Close
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal for Edit user End-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">Manage Users</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee No</th>
                                <th>Employee Name</th>
                                <th>NIC</th>
                                <th>Designation</th>
                                <th>Created Date</th>
                                <th>User Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($userData != null) {
                                $count = 1; ?>

                                <?php foreach ($userData as $eData) { ?>

                                    <tr>
                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $eData['id']; ?></td>

                                        <td>
                                            <span style="color: #0277CA; font-size:16px;"><b><?php echo $eData['middlename'] . " " . $eData['lastname'] ?></b></span>
                                        </td>

                                        <td><?php echo $eData['nic']; ?></td>
                                        <td><?php echo $eData['name']; ?></td>
                                        <td><?php if ($eData['date_Stamp'] != null) {
                                                echo $eData['date_Stamp'];
                                            } else { ?>

                                                <i>Not Updated</i>

                                            <?php } ?>
                                        </td>


                                        <td>
                                            <?php if ($eData['emp_status'] == 1) { ?>
                                                <span style="color: green">Active</span>

                                            <?php } else { ?>
                                                <span style="color: red">Inactive</span>

                                            <?php } ?>

                                        </td>

                                        <td>
                                            <a title="Add User Details"><i class="fa fa-user-plus fa-2x"
                                                                           data-toggle="modal"
                                                                           data-target="#ModalUserAdd"
                                                                           onclick="empDtlsAdd(<?php echo $eData['id']; ?>,'<?php echo $eData['middlename']; ?>','<?php echo $eData['lastname']; ?>','<?php echo $eData['brName']; ?>',
                                                                                   '<?php echo $eData['brId']; ?>')"></i></a>
                                            &nbsp;

                                            <a title="Edit User Details"><i class="fa fa-edit fa-2x"
                                                                            id="edit2"
                                                                            data-toggle="modal"
                                                                            data-target="#ModalUserEdit"
                                                                            onclick="empDtlEdit(<?php echo $eData['id']; ?>,'<?php echo $eData['middlename']; ?>','<?php echo $eData['lastname']; ?>','<?php echo $eData['brName']; ?>','<?php echo $eData['brId']; ?>');"></i></a>
                                            &nbsp;
                                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/reg_emp_pdf_controller/regEmpPdfView?empId=<?php echo $eData['id']; ?>"
                                               target="_blank"
                                               title="Print Employee Registration Letter">
                                                <i class="fa fa-print fa-2x"></i>
                                            </a> &nbsp;&nbsp;

                                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/emp_full_data_view_controller/empFullDataView?empId=<?php echo $eData['id']; ?>"
                                               title="View Employee Card Data"
                                               target="_blank">
                                                <i class="fa fa-user fa-2x"></i>
                                            </a>


                                        </td>

                                        <?php $count++; ?>
                                    </tr>
                                <?php }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->

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
<!-- jquery
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

<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!-- plugins for LogAlert JS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/materialize/js/materialize.min.js"></script>

<!--  SweetAlert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/dialog/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dialog/dialog-active.js"></script>


<script type="text/javascript">

    $(document).ready(function () {
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

    function empDtlsAdd(empID, empFname, empLname, empBranch, empBrId) {

        var empNo = empID;
        var empfn = empFname;
        var empln = empLname;
        var brName = empBranch;
        var brId = empBrId;

        $('.emp_fName_view').text(empfn);
        $('.emp_lName_view').text(empln);
        document.getElementById("clearBranch").value = brName;
        document.getElementById("emp_br_id").value = brId;

        document.getElementById("emp_id_view").value = empNo;
        document.getElementById("emp_id_view2").value = empNo;
        document.getElementById("emp_id_view3").value = empNo;
        document.getElementById("emp_id_view4").value = empNo;
        document.getElementById("emp_id_view5").value = empNo;

        // $('#ModalUserAdd').modal('show');

    }

    function empDtlEdit(empNo, empFN, empLN, empBrName, empBranchId) {

        var empnum = empNo;
        var empEditF = empFN;
        var empEditL = empLN;
        var empBranch = empBrName;
        var empbranchId = empBranchId;

        $('.emp_fName_edit_view').text(empEditF);
        $('.emp_lName_edit_view').text(empEditL);
        document.getElementById("curOfz").value = empBranch;
        document.getElementById("emp_up_br_id").value = empbranchId;

        document.getElementById("up_info_emp_id").value = empnum;
        document.getElementById("up_info_emp_id1").value = empnum;
        document.getElementById("up_info_emp_id2").value = empnum;
        document.getElementById("up_info_emp_id3").value = empnum;
        document.getElementById("up_info_emp_id4").value = empnum;

        $.ajax({
            type: 'POST',
            data: {editEmpId: empnum},
            dataType: 'JSON',
            url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/empEditModelData',
            success: function (result) {
                if (result != false) {
                    $("#title").val(result.empdata.title_id);
                    $("#lname").val(result.empdata.lastname);
                    $("#initl").val(result.empdata.middlename);
                    $("#intleng").val(result.empdata.initialname);
                    $("#intlSin").val(result.empdata.name_sinhala);
                    $("#intlTam").val(result.empdata.name_tamil);
                    $("#gen").val(result.empdata.gender_id);
                    $("#nic").val(result.empdata.nic);
                    $("#dob").val(result.empdata.dob);
                    $("#add1").val(result.empdata.privateaddress);
                    $("#add2").val(result.empdata.privateaddress2);
                    $("#add3").val(result.empdata.privateaddress3);
                    $("#district").val(result.empdata.residentdistric_id);
                    $("#curadd").val(result.empdata.present_address);
                    $("#mob").val(result.empdata.mobile);
                    $("#homenum").val(result.empdata.tel);
                    $("#mail").val(result.empdata.email);
                    $("#eduLevel").val(result.empdata.eduLevel_id);
                    $("#apptNo").val(result.empdata.appoinment_lett_no);
                    $("#apptDate").val(result.empdata.appointment_date);
                    $("#pmtdate").val(result.empdata.permanent_date);
                    $("#wop").val(result.empdata.wop_no);

                    $("#desig").val(result.desigData.designation_id);
                    $("#grade").val(result.desigData.grade_id);
                    $("#salcode").val(result.desigData.salary_code_id);

                    var incDate = result.empdata.increment_date;
                    var convIncDate = incDate.replace('0000-', '');
                    $("#upIncreDate").val(convIncDate);
                    $("#desigIncreDate").val(convIncDate);


                }
            },
            error: function () {
                swal({
                    text: "Error Occured",
                    type: "error",
                });
            }
        });

    }

    $(document).ready(function () {

        $('#exformReset').click(function () {
            document.getElementById('exForm').reset();
        });

        $('#commdFormReset').click(function () {
            document.getElementById('commdForm').reset();
        });

        $('#leaveFormReset').click(function () {
            document.getElementById('leaveForm').reset();
        });

        $('#incrementformReset').click(function () {
            document.getElementById('incrementForm').reset();
        });
        $('#clearanceFormReset').click(function () {
            document.getElementById('clearanceForm').reset();
        });
        $('#upEmpDtlFormReset').click(function () {
            document.getElementById('ediEmpDataForm').reset();

        });
        $('#dpFormReset').click(function () {
            document.getElementById('dpForm').reset();

        });
        $('#increDateFormReset').click(function () {
            document.getElementById('increDateForm').reset();

        });
        $('#desigFormReset').click(function () {
            document.getElementById('desigUpForm').reset();

        });
        $('#wokStationFormReset').click(function () {
            document.getElementById('upWorkingStationForm').reset();

        });

    });

    $(document).ready(function () {
        $('#casual').click(function () {

            var emp = $('#emp_id_view3').val();
            var year = $('#year').val();
            if (year != '') {
                $.ajax({
                    type: 'POST',
                    data: {empId: emp, LYear: year},
                    url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/leaveYearValidate',
                    success: function (result) {
                        if (result == true) {
                            document.getElementById('LYearMsg').style.color = 'red';
                            document.getElementById('LYearMsg').innerHTML = 'This User already have leave data for this year';
                        } else {
                            document.getElementById('LYearMsg').innerHTML = '';

                        }
                    }
                });

            } else {
                swal({
                    text: "Please Enter a Valid Year",
                    type: "error",
                });
            }

        });
    });

    $(document).ready(function () {
        $('#increDate').click(function () {

            var emp = $('#emp_id_view4').val();
            var increyear = $('#increYear').val();
            if (increyear != '') {
                $.ajax({
                    type: 'POST',
                    data: {empId: emp, IYear: increyear},
                    url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/incrementYearValidate',
                    success: function (result) {
                        if (result == true) {
                            document.getElementById('IYearMsg').style.color = 'red';
                            document.getElementById('IYearMsg').innerHTML = 'This User already have Increment data for this year';
                        } else {
                            document.getElementById('IYearMsg').innerHTML = '';

                        }
                    }
                });

            } else {
                swal({
                    text: "Please Enter a Valid Year",
                    type: "error",
                });
            }

        });
    });

    $(document).ready(function () {
        $('#upReason').click(function () {

            // alert("hello");

            var emp = $('#up_info_emp_id4').val();
            var brId = $('#emp_up_br_id').val();
            // alert(brId);

            $.ajax({
                type: 'POST',
                data: {empId: emp, brcID: brId},
                url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/brClearIssueValidate',
                success: function (result) {
                    if (result == false) {
                        swal({
                            text: "This user doesn't have clearance for the current branch, Please get clearance for the current branch",
                            type: "error",
                        });
                    } else {

                    }
                }
            });


        });
    });

</script>


</html>


