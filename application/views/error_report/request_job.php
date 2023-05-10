<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/30/2022
 * Time: 6:49 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Request Update | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">

    <style type="text/css">
        #footer {

            position: fixed;
            bottom: 0;
            left: 0;
            margin-top: auto;
            width: 100%;
        }
    </style>

</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start job request area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="jobRequest" method="post"
                  action="<?php echo base_url(); ?>index.php/error_report_controller/request_job_controller/requestUpdate">

                <div class="form-example-wrap mg-t-30">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">Request to Update</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" id="jobName" name="jobName"
                                               value="<?php echo set_value('jobName'); ?>"
                                               placeholder="Enter Request Title" required>
                                    </div>
                                    <?php echo form_error('jobName', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="jobrmks"
                                               value="<?php echo set_value('jobrmks'); ?>"
                                               placeholder="Enter Request Description" required>
                                    </div>
                                    <?php echo form_error('jobrmks', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="dialog-pro dialog">
                                <button type="reset" class="btn btn-danger">Reset</button>&nbsp;
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End request job area-->

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

<!-- main JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

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
