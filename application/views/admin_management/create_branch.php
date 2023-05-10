<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/11/2022
 * Time: 3:49 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Branch Creation | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">


</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start create Branch area -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form name="createBranch" method="post"
                  action="<?php echo base_url(); ?>index.php/admin_manage_controller/create_branch_controller/createBranch">

                <div class="form-example-wrap mg-t-30">
                    <div class="basic-tb-hd">
                        <h2 style="text-transform: uppercase; color: #666666; ">Create Branch</h2>
                    </div>
                    <div class="row">

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" id="brId" name="brId"
                                               value="<?php echo set_value('brId'); ?>"
                                               placeholder="Enter Branch ID" required>
                                    </div>
                                    <?php echo form_error('brId', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" id="ofztype" name="ofztype"
                                        data-live-search="true" required>
                                    <option value="">Please Select a Office Type</option>
                                    <?php if ($office != null) {
                                        foreach ($office as $ofz) {
                                            ?>
                                            <option value="<?php echo $ofz['id']; ?>">
                                                <?php echo $ofz['name']; ?></option>

                                        <?php }
                                    } ?>
                                </select>
                                <?php echo form_error('ofztype', '<span style="color: red;">', '</span>') ?>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="bootstrap-select fm-cmp-mg">
                                <select class="selectpicker" id="dist" name="dist"
                                        data-live-search="true" required">
                                <option value="">Please Select a District</option>
                                <?php if ($district != null) {
                                    foreach ($district as $dist) {
                                        ?>
                                        <option value="<?php echo $dist['id']; ?>">
                                            <?php echo $dist['name']; ?></option>

                                    <?php }
                                } ?>
                                </select>
                                <?php echo form_error('dist', '<span style="color: red;">', '</span>') ?>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" name="provId"
                                               value="<?php echo set_value('provId'); ?>"
                                               placeholder="Enter Province ID" required>
                                    </div>
                                    <?php echo form_error('provId', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="brname"
                                               value="<?php echo set_value('brname'); ?>"
                                               onclick="brIdValidate();"
                                               placeholder="Enter Branch Name" required>
                                    </div>
                                    <?php echo form_error('brname', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="number" class="form-control input-sm" name="orderId"
                                               value="<?php echo set_value('orderId'); ?>"
                                               placeholder="Enter Order ID" required>
                                    </div>
                                    <?php echo form_error('orderId', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="add1"
                                               value="<?php echo set_value('add1'); ?>"
                                               placeholder="Enter Address Line1">
                                    </div>
                                    <?php echo form_error('add1', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="add2"
                                               value="<?php echo set_value('add2'); ?>"
                                               placeholder="Enter Address Line2">
                                    </div>
                                    <?php echo form_error('add2', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="add3"
                                               value="<?php echo set_value('add3'); ?>"
                                               placeholder="Enter Address Line3">
                                    </div>
                                    <?php echo form_error('add3', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="tele"
                                               value="<?php echo set_value('tele'); ?>"
                                               placeholder="Enter Telephone Number">
                                    </div>
                                    <?php echo form_error('tele', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control input-sm" name="fax"
                                               value="<?php echo set_value('fax'); ?>"
                                               placeholder="Enter Fax Number">
                                    </div>
                                    <?php echo form_error('fax', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-example-int form-example-st">
                                <div class="form-group">
                                    <div class="nk-int-st">
                                        <input type="email" class="form-control input-sm" name="email"
                                               value="<?php echo set_value('email'); ?>"
                                               placeholder="Enter Email">
                                    </div>
                                    <?php echo form_error('email', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="dialog-pro dialog" style="margin-top: 20px; margin-left: 930px;">
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
<!-- End create Branch area-->

<br><br>
<!--Start Data table area-->
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="data-table-area">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="color: #666666; ">Created Branches</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Branch ID</th>
                                <th>Branch Name</th>
                                <th>Address</th>
                                <th>Telephone No</th>
                                <th>Fax No</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($allbranc != null) {
                                $count = 1; ?>

                                <?php foreach ($allbranc as $brn) { ?>

                                    <tr>
                                        <td> <?php echo $count; ?></td>
                                        <td> <?php echo $brn['id']; ?></td>
                                        <td> <?php echo $brn['brName']; ?></td>

                                        <td>
                                            <?php if ($brn['address1'] == null && $brn['address2'] == null && $brn['address3'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $brn['address1'] . " " . $brn['address2'] . " " . $brn['address3'];
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($brn['telephone_no'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $brn['telephone_no'];
                                            } ?>
                                        </td>

                                        <td>
                                            <?php if ($brn['fax_no'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $brn['fax_no'];
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($brn['email'] == null) { ?>
                                                <p style="color: red;">Not Updated</p>
                                            <?php } else {
                                                echo $brn['email'];
                                            } ?>
                                        </td>


                                        <td>
                                            <?php if ($brn['status'] == 1) { ?>
                                                <span style="color: blue;">Active</span>

                                            <?php }
                                            if ($brn['status'] == 0) { ?>
                                                <span style="color: red;">Deactive</span>

                                            <?php } ?>
                                        </td>


                                        <td>

                                            <?php if ($brn['status'] == 1) { ?>
                                                <a title="Deactivate Office"><i class="fa fa-close fa-2x"
                                                                                onclick="setbranchStatus(<?php echo $brn['status']; ?>,<?php echo $brn['id']; ?>);"></i></a>

                                            <?php } elseif ($brn['status'] == 0) { ?>
                                                <a title="Activate Office"><i class="fa fa-check-circle fa-2x"
                                                                              onclick="setbranchStatus(<?php echo $brn['status']; ?>,<?php echo $brn['id']; ?>);"></i></a>
                                            <?php } ?>
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


    function setbranchStatus(val1, val2) {

        var curStatus = val1;
        var brid = val2;

        if (curStatus == 1) {
            var text = "Do You want to Deactivate this Branch";
        } else {
            var text = "Do you want to Activate this Branch";
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
                    data: {status: curStatus, bid: brid},
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_branch_controller/updateBrnchStatus',
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

    function brIdValidate() {

        var branchID = document.getElementById('brId').value;

        if (branchID != '') {
            $.ajax({
                type: 'POST',
                data: {branch: branchID},
                url: '<?php echo base_url();?>index.php/admin_manage_controller/create_branch_controller/ofzIdValidate',
                success: function (response) {

                    if (response == true) {

                        swal({
                            text: "This Branch ID is already registered with the system",
                            type: "error",
                        });
                    }

                }

            });

        } else {
            swal({
                text: "Please Enter a Valid Branch Code",
                type: "error",
            });
        }
    }

</script>

</html>
