<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 12:37 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>User Actions | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">


</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start Log user action area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="logUserAction" method="post"
                  action="<?php echo base_url(); ?>index.php/admin_manage_controller/log_user_action_controller/viewTblData">
                <div class="form-element-list mg-t-30">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">View Log User Actions</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk">
                                <h2>From Date</h2>
                            </div>
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-calendar"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="sdate" data-mask="99/99/9999"
                                           value="<?php echo set_value('sdate'); ?>"
                                           placeholder="dd/mm/yyyy" required>
                                </div>
                                <?php echo form_error('sdate', '<span style="color: red;">', '</span>') ?>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="nk-int-mk">
                                <h2>To Date</h2>
                            </div>
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-calendar"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" name="tdate" data-mask="99/99/9999"
                                           value="<?php echo set_value('tdate'); ?>"
                                           placeholder="dd/mm/yyyy" required>
                                </div>
                                <?php echo form_error('tdate', '<span style="color: red;">', '</span>') ?>

                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dialog-pro dialog" style="margin-top: 30px;">
                                <button type="reset" class="btn btn-danger">Cancel</button>&nbsp;
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Log user action area-->

<br><br>
<!--Start Data table area-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-area">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="color: #666666; ">User Actions</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Designation</th>
                                <th>Username</th>
                                <th>User Role</th>
                                <th>User Action</th>
                                <th>Priority</th>
                                <th>Action Date Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($logData != null) {
                                $count = 1; ?>

                                <?php foreach ($logData as $ldata) { ?>

                                    <tr>
                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $ldata['empid']; ?></td>

                                        <td>
                                            <?php if ($ldata['middlename'] == null && $ldata['lastname'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else { ?>
                                                <span style="color: #0277CA; font-size:16px;"><b><?php echo $ldata['middlename'] . " " . $ldata['lastname'] ?></b></span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php if ($ldata['designame'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $ldata['designame'];
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($ldata['username'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $ldata['username'];
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($ldata['userrole'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $ldata['userrole'];
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($ldata['user_action'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $ldata['user_action'];
                                            } ?>
                                        </td>


                                        <td>
                                            <?php if ($ldata['level'] == null) { ?>
                                                <p style="font-size:16px;">Not Updated</p>
                                            <?php } elseif ($ldata['level'] == 'High') { ?>
                                                <span style="color: red; font-size:16px;"><b><?php echo $ldata['level']; ?></b></span>
                                            <?php } elseif ($ldata['level'] == 'Mid') { ?>
                                                <span style="color: green; font-size:16px;"><b><?php echo $ldata['level']; ?></b></span>

                                            <?php } elseif ($ldata['level'] == 'Low') { ?>
                                                <span style="color: blue; font-size:16px;"><b><?php echo $ldata['level']; ?></b></span>
                                            <?php } else { ?>
                                                <span style="font-size:16px;"><b>Not Available</b></span>

                                            <?php } ?>

                                        </td>


                                        <td>
                                            <?php if ($ldata['date_time'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $ldata['date_time'];
                                            } ?>
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
<!--End Data table area-->

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

<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>

<!-- Input Mask JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>

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


</script>

</html>
