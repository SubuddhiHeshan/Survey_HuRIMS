<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/27/2022
 * Time: 11:34 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Designation Creation | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">


</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start create Designation area -->

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="createDesignation" method="post"
                  action="<?php echo base_url(); ?>index.php/admin_manage_controller/create_desig_controller/createDesignation">

                <div class="form-example-wrap mg-t-30">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">Create Designation</h2>
                    </div>
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="desgEng"
                                               value="<?php echo set_value('desgEng'); ?>"
                                               placeholder="Enter Designation in English" required>
                                    </div>
                                    <?php echo form_error('desgEng', '<span style="color: red;">', '</span>') ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="desgSin"
                                               value="<?php echo set_value('desgSin'); ?>"
                                               placeholder="Enter Designation in Sinhala" required>
                                    </div>
                                    <?php echo form_error('desgSin', '<span style="color: red;">', '</span>') ?>

                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="desgTam"
                                               value="<?php echo set_value('desgTam'); ?>"
                                               placeholder="Enter Designation in Tamil">
                                    </div>
                                    <?php echo form_error('desgTam', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        </br></br></br>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" id="service" name="service"
                                        data-live-search="true" required>
                                    <option value="">Please Select a Service</option>
                                    <?php if ($serv != null) {
                                        foreach ($serv as $ser) {
                                            ?>
                                            <option value="<?php echo $ser['id']; ?>">
                                                <?php echo $ser['name']; ?></option>

                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" id="salcode" name="salcode"
                                        data-live-search="true" required>
                                    <option value="">Please Select a Salary Code</option>
                                    <?php if ($salc != null) {
                                        foreach ($salc as $sal) {
                                            ?>
                                            <option value="<?php echo $sal['id']; ?>">
                                                <?php echo $sal['name']; ?></option>

                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" name="appCarder"
                                               value="<?php echo set_value('appCarder'); ?>"
                                               placeholder="Enter Approved Carder" required>
                                    </div>
                                    <?php echo form_error('appCarder', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="dialog-pro dialog" style="margin-left: 920px; margin-top: 10px;">
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
<!-- End create Designation area-->


<!--Start Desig table area-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h4 style="color: #666666; ">Newly Created Designations</h4>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Designation English</th>
                            <th>Designation Sinhala</th>
                            <th>Approved Carder</th>
                            <th>Salary Code</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>

                        <?php if ($allDesg != null) {
                            foreach ($allDesg as $all) { ?>
                                <tr>
                                    <td><?php echo $count; ?></td>

                                    <td><?php if ($all['name'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $all['name'];
                                        } ?>
                                    </td>

                                    <td><?php if ($all['desi_name_sin'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $all['desi_name_sin'];
                                        } ?>
                                    </td>

                                    <td><?php if ($all['approved_carder'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $all['approved_carder'];
                                        } ?>
                                    </td>

                                    <td><?php if ($all['salName'] == null) { ?>
                                            <p style="color: red;">Not Updated</p>
                                        <?php } else {
                                            echo $all['salName'];
                                        } ?>
                                    </td>

                                    <td>
                                        <?php if ($all['status'] == 1) { ?>
                                            <span style="color: blue;">Active</span>

                                        <?php }
                                        if ($all['status'] == 0) { ?>
                                            <span style="color: red;">Deactive</span>

                                        <?php } ?>
                                    </td>

                                    <td>
                                        <?php if ($all['status'] == 1) { ?>
                                            <a title="Deactivate Designation"><i class="fa fa-close fa-2x"
                                                                                 onclick="setDesigStatus(<?php echo $all['status']; ?>,<?php echo $all['id']; ?>);"></i></a>

                                        <?php } elseif ($all['status'] == 0) { ?>
                                            <a title="Activate Designation"><i class="fa fa-check-circle fa-2x"
                                                                               onclick="setDesigStatus(<?php echo $all['status']; ?>,<?php echo $all['id']; ?>);"></i></a>
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
<!--End Desig table area-->

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

    function setDesigStatus(val1, val2) {

        var curStatus = val1;
        var desigId = val2;

        if (curStatus == 1) {
            var text = "Do You want to Deactivate this Designation";
        } else {
            var text = "Do you want to Activate this Designation";
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
                    data: {status: curStatus, dId: desigId},
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_desig_controller/updateDesignationStatus',
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

