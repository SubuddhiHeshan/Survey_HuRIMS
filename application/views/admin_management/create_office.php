<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/10/2022
 * Time: 9:04 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Office Creation | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">


</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start create Office area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="createOffice" method="post"
                  action="<?php echo base_url(); ?>index.php/admin_manage_controller/create_office_controller/createOffice">

                <div class="form-example-wrap mg-t-30">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">Create Office</h2>
                    </div>
                    <div class="row">

                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="ofzname"
                                               value="<?php echo set_value('ofzname'); ?>"
                                               placeholder="Enter Office Name" required>
                                    </div>
                                    <?php echo form_error('ofzname', '<span style="color: red;">', '</span>') ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dialog-pro dialog">
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
<!-- End create Office area-->


<!--Start Office table area-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h4 style="color: #666666; ">Created Office Types</h4>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Office Name</th>
                            <th>Creted Date - Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>

                        <?php if ($offices != null) {
                            foreach ($offices as $ofz) { ?>
                                <tr>
                                    <td><?php echo $count; ?></td>

                                    <td><?php if ($ofz['name'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $ofz['name'];
                                        } ?></td>

                                    <td><?php if ($ofz['createDate'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $ofz['createDate'];
                                        } ?></td>

                                    <td><?php if ($ofz['status'] == 0) { ?>
                                            <p style="color: red;">Deactive</p>
                                        <?php } else { ?>
                                            <p style="color: blue;">Active</p>
                                        <?php } ?></td>

                                    <td>
                                        <?php if ($ofz['status'] == 1) { ?>
                                            <a title="Deactivate"><i class="fa fa-close fa-2x"
                                                                     onclick="setOfficeStatus(<?php echo $ofz['status']; ?>,'<?php echo $ofz['id']; ?>')"></i></a>

                                        <?php } elseif ($ofz['status'] == 0) { ?>
                                            <a title="Activate"><i class="fa fa-check-circle fa-2x"
                                                                   onclick="setOfficeStatus(<?php echo $ofz['status']; ?>,'<?php echo $ofz['id']; ?>')"></i></a>
                                        <?php } ?>
                                    </td>

                                    <?php $count++; ?>
                                </tr>
                            <?php } ?>
                        <?php } ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Office table area-->

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

    function setOfficeStatus(val1, val2) {

        var curStatus = val1;
        var id = val2;

        if (curStatus == 1) {
            var text = "Do You want to Deactivate this office";
        } else {
            var text = "Do you want to Activate this office";
        }
        swal({
            title: "Are you sure?",
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Confirm",
            cancelButtonText: "No, Decline",
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    data: {status: curStatus, oid: id},
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_office_controller/updateOfzStatus',
                    success: function (result) {
                        if (result == true) {
                            swal({
                                text: "Successfully Updated",
                                type: "success",

                            });

                        } else {
                            swal({
                                text: "Action already Taken",
                                type: "error",

                            });

                        }

                    }

                });
            } else {
                swal("Cancelled", "Not Accepted", "error");

            }
        });

    }

</script>

</html>

