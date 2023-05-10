<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/20/2022
 * Time: 10:35 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Employee Info| HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


</head>

<body>

<?php $this->load->view('includes/header'); ?>


<?php $this->load->view('includes/navigation'); ?>

<!--Spouse details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int">
                    <div class="contact-hd search-hd-eg">
                        <h2>Spouse Details</h2>
                        <p>Family informations of the Employee</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Spouse Name</th>
                                <th>Spouse Occupation</th>
                                <th>Children School</th>
                                <th class="text-right">No of Children</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($sData != null) {

                                foreach ($sData as $s) { ?>

                                    <tr>
                                        <td><?php echo $s['spousname']; ?></td>
                                        <td><?php echo $s['spousoccupation']; ?></td>
                                        <td><?php echo $s['children_study_school']; ?></td>
                                        <td class="text-right"><?php echo $s['noofchildren']; ?> <i
                                                class="notika-icon notika-up-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="4" style="text-align: center;">No Data to View</td>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Spouse details area end-->

<!--Annual Increment details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <div class="contact-hd search-hd-eg">
                        <h2>Annual Increment Details</h2>
                        <p>Yearly salary increment status</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Year</th>
                                <th class="text-right">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($increData != null) {

                                foreach ($increData as $i) { ?>

                                    <tr>
                                        <td><?php echo $i['name']; ?></td>
                                        <td><?php echo $i['year']; ?></td>
                                        <td class="text-right"><?php echo $i['granted_date']; ?> <i
                                                class="notika-icon notika-down-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="3" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Annual Increment details area end-->

<!--Clearance details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd search-hd-eg">
                        <h2>Clearance Details </h2>
                        <p>Clearance Details regarding assigned offices</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Certificate No</th>
                                <th>Issued By</th>
                                <th>Branch</th>
                                <th class="text-right">Year</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($clearanceData != null) {

                                foreach ($clearanceData as $c) { ?>

                                    <tr>
                                        <td><?php echo $c['status_id']; ?></td>
                                        <td><?php echo $c['clearance_date']; ?></td>
                                        <td><?php echo $c['certificate_no']; ?></td>
                                        <td><?php echo $c['issued_by']; ?></td>
                                        <td><?php echo $c['name']; ?></td>
                                        <td class="text-right analysis-rd-mg">
                                            <h4><?php echo $c['year']; ?></h4>
                                        </td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="6" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Clearance details area end-->

<!--Job history details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd search-hd-eg">
                        <h2>Job History Details </h2>
                        <p>Employee job stations details worked</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Branch Name</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th class="text-right">Transfer Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($JobHData != null) {

                                foreach ($JobHData as $j) { ?>

                                    <tr>
                                        <td><?php echo $j['brname']; ?></td>
                                        <td><?php echo $j['status']; ?></td>
                                        <td><?php echo $j['remarks']; ?></td>
                                        <td class="text-right"><?php echo $j['tranfer_date']; ?> <i
                                                class="notika-icon notika-up-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="4" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Job history details area end-->

<!--Designation History details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <div class="contact-hd search-hd-eg">
                        <h2>Designation History Details</h2>
                        <p>Designation details of the employee</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Designation Name</th>
                                <th>Salary Code</th>
                                <th class="text-right">From Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($desigHData != null) {

                                foreach ($desigHData as $d) { ?>

                                    <tr>
                                        <td><?php echo $d['designame']; ?></td>
                                        <td><?php echo $d['salname']; ?></td>
                                        <td class="text-right"><?php echo $d['from_date']; ?> <i
                                                class="notika-icon notika-down-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="3" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Designation History details area end-->

<!--Commendation details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd search-hd-eg">
                        <h2>Commendation Details </h2>
                        <p>Employee Commendation details</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Purpose for Commendation</th>
                                <th>Letter No</th>
                                <th>Issued By</th>
                                <th>Remarks</th>
                                <th class="text-right">Letter Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($commendation != null) {

                                foreach ($commendation as $c) { ?>

                                    <tr>
                                        <td><?php echo $c['purpose_for_commendation']; ?></td>
                                        <td><?php echo $c['letter_no']; ?></td>
                                        <td><?php echo $c['issued_by']; ?></td>
                                        <td><?php echo $c['remarks']; ?></td>
                                        <td class="text-right"><?php echo $c['letter_date']; ?> <i
                                                class="notika-icon notika-up-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="5" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Commendation details area end-->

<!--Training details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <div class="contact-hd search-hd-eg">
                        <h2>Foreign/Local Training Details</h2>
                        <p>Trainnings done by the employee</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Field of Study</th>
                                <th>Year</th>
                                <th>Institute</th>
                                <th>Professional Qualification</th>
                                <th>Country</th>
                                <th>From Date</th>
                                <th>To Date</th>
                                <th>Duration</th>
                                <th>Name of Scolarship</th>
                                <th>Registration</th>
                                <th>Airticket</th>
                                <th>Subsistence</th>
                                <th>Incidental Expences</th>
                                <th>Tution Fee</th>
                                <th class="text-right">Warmcloth Allowance</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($TrngData != null) {

                                foreach ($TrngData as $t) { ?>

                                    <tr>
                                        <td><?php echo $t['field']; ?></td>
                                        <td><?php echo $t['year']; ?></td>
                                        <td><?php echo $t['institute']; ?></td>
                                        <td><?php echo $t['profession_qulification']; ?></td>
                                        <td><?php echo $t['country']; ?></td>
                                        <td><?php echo $t['from_date']; ?></td>
                                        <td><?php echo $t['to_date']; ?></td>
                                        <td><?php echo $t['duaration']; ?></td>
                                        <td><?php echo $t['name_of_sholarship']; ?></td>
                                        <td><?php echo $t['registeration']; ?></td>
                                        <td><?php echo $t['airticket']; ?></td>
                                        <td><?php echo $t['subsistence']; ?></td>
                                        <td><?php echo $t['incidentalexpences']; ?></td>
                                        <td><?php echo $t['tutionfee']; ?></td>
                                        <td class="text-right"><?php echo $t['warmclothallowance']; ?> <i
                                                class="notika-icon notika-down-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="15" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Training details area end-->

<!--EB details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">
                    <div class="contact-hd search-hd-eg">
                        <h2>EB Details</h2>
                        <p>Efficiency Bar Examination details of the employee</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Type of Exam</th>
                                <th>Exam Name</th>
                                <th>Obtain Date</th>
                                <th class="text-right">Exam Pass Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($ebData != null) {

                                foreach ($ebData as $eb) { ?>

                                    <tr>
                                        <td><?php echo $eb['type_of_exams']; ?></td>
                                        <td><?php echo $eb['exam']; ?></td>
                                        <td><?php echo $eb['obtained_date']; ?></td>
                                        <td class="text-right"><?php echo $eb['exam_pass_date']; ?> <i
                                                class="notika-icon notika-down-arrow"></i></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="4" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--EB details area end-->

<!--desciplinary action details area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd search-hd-eg">
                        <h2>Desciplinary action Details </h2>
                        <p>Desciplinary action taken against offices</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Reference No</th>
                                <th>Desciplinary Action Status</th>
                                <th>Action Taken</th>
                                <th class="text-right">Date Of Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($descipData != null) {

                                foreach ($descipData as $desc) { ?>

                                    <tr>
                                        <td><?php echo $desc['reference_no']; ?></td>
                                        <td><?php echo $desc['dsaction']; ?></td>
                                        <td><?php echo $desc['action_taken']; ?></td>
                                        <td class="text-right analysis-rd-mg">
                                            <h4><?php echo $desc['date_of_action']; ?></h4>
                                        </td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="4" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--desciplinary action details area end-->


<!--Annual leave area start-->
<div class="search-engine-area mg-t-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="search-engine-int sm-res-mg-t-30 tb-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="contact-hd search-hd-eg">
                        <h2>Annual Leave Details </h2>
                        <p>Annual Leave of the employee</p>
                    </div>
                    <div class="search-eg-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-right">Year</th>
                                <th>Casual</th>
                                <th>Vaccation</th>
                                <th>Laps</th>
                                <th>Year of Lap</th>
                                <th>Maternity Full</th>
                                <th>Maternity Half</th>
                                <th>Maternity No Pay</th>
                                <th>No Pay</th>
                                <th>Half Pay</th>
                                <th>Sick</th>
                                <th>Lieu Leave</th>
                                <th>Accident</th>
                                <th>Duty</th>
                                <th>Study</th>
                                <th>No Pay Foreign</th>
                                <th>Other</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($leave != null) {

                                foreach ($leave as $l) { ?>

                                    <tr>
                                        <td class="text-right analysis-rd-mg">
                                            <h4><?php echo $l['year']; ?></h4>
                                        </td>
                                        <td><?php echo $l['casual']; ?></td>
                                        <td><?php echo $l['vacation']; ?></td>
                                        <td><?php echo $l['laps']; ?></td>
                                        <td><?php echo $l['year_of_laps']; ?></td>
                                        <td><?php echo $l['maternity_full']; ?></td>
                                        <td><?php echo $l['maternity_half']; ?></td>
                                        <td><?php echo $l['maternity_no']; ?></td>
                                        <td><?php echo $l['nopay']; ?></td>
                                        <td><?php echo $l['halfpay']; ?></td>
                                        <td><?php echo $l['sick']; ?></td>
                                        <td><?php echo $l['lieu_leave']; ?></td>
                                        <td><?php echo $l['accident']; ?></td>
                                        <td><?php echo $l['duty']; ?></td>
                                        <td><?php echo $l['study']; ?></td>
                                        <td><?php echo $l['no_pay_foreign']; ?></td>
                                        <td><?php echo $l['other_leave']; ?></td>
                                    </tr>

                                <?php }
                            } else { ?>
                                <td colspan="17" style="text-align: center;">No Data to View</td>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Annual leave area end-->


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

