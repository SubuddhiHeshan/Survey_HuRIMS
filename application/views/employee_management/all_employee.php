<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 9/6/2022
 * Time: 11:17 AM
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


</head>

<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<body>

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
                                <th>User Role</th>
                                <th>Created Date</th>
                                <th>User Status</th>
                                <th>Lock Status</th>
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
                                        <td><?php echo $eData['createDate']; ?></td>


                                        <td>
                                            <?php if ($eData['userStatus'] == 1) { ?>
                                                <span style="color: green">Active</span>

                                            <?php }
                                            if ($eData['userStatus'] == 0) { ?>
                                                <span style="color: red">Inactive</span>

                                            <?php } ?>

                                        </td>
                                        <td>
                                            <?php if ($eData['lockStatus'] == 1) { ?>
                                                <span style="color: blue">Unlocked</span>

                                            <?php }
                                            if ($eData['lockStatus'] == 0) { ?>
                                                <span style="color: red">Locked</span>

                                            <?php } ?>
                                        </td>


                                        <td>
                                            <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 17) { ?>

                                                <?php if ($eData['userStatus'] == 1) { ?>
                                                    <a title="Deactivate User"><i class="fa fa-check-circle fa-2x"
                                                                                  onclick="setEmployeeStstus(<?php echo $eData['userStatus'] ?>,<?php echo $eData['id']; ?>)"></i></a>

                                                <?php } elseif ($eData['userStatus'] == 0) { ?>
                                                    <a title="Activate User"><i class="fa fa-close fa-2x"
                                                                                onclick="setEmployeeStstus(<?php echo $eData['userStatus'] ?>,<?php echo $eData['id']; ?>)"></i></a>
                                                <?php } ?>

                                                &nbsp;

                                                <?php if ($eData['lockStatus'] == 1) { ?>
                                                    <a title="Lock User"><i class="fa fa-unlock fa-2x"
                                                                            onclick="setLockStatus(<?php echo $eData['lockStatus']; ?>,'<?php echo $eData['user_name']; ?>')"></i></a>

                                                <?php } elseif ($eData['lockStatus'] == 0) { ?>
                                                    <a title="Unlock User"><i class="fa fa-lock fa-2x"
                                                                              onclick="setLockStatus(<?php echo $eData['lockStatus']; ?>,'<?php echo $eData['user_name']; ?>')"></i></a>
                                                <?php } ?>

                                            <?php } else { ?>
                                                <a title="Add User Details"><i class="fa fa-user-plus fa-2x"
                                                                               data-toggle="modal"
                                                                               data-target="#ModalUserAdd"
                                                                               onclick="empDtlsAdd(<?php echo $eData['id']; ?>,'<?php echo $eData['middlename']; ?>','<?php echo $eData['lastname']; ?>')"></i></a>
                                                &nbsp;

                                                <a title="Edit User Details"><i class="fa fa-edit fa-2x"
                                                                                data-toggle="modal"
                                                                                data-target="#ModalUserEdit"
                                                                                onclick="empDtlEdit(<?php echo $eData['id']; ?>,'<?php echo $eData['middlename']; ?>','<?php echo $eData['lastname']; ?>');"></i></a>


                                                &nbsp;
                                                <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/reg_emp_pdf_controller/regEmpPdfView?empId=<?php echo $eData['id']; ?>"
                                                   target="_blank"
                                                   title="Print Employee Registration Letter"><i
                                                            class="fa fa-print fa-2x"
                                                            onclick=""></i></a>

                                                <?php
                                            } ?>


                                            &nbsp;


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

    function setLockStatus(val1, val2) {

        var curStatus = val1;
        var username = val2;

        if (curStatus == 1) {
            var text = "Do You want to Lock this user";
        } else {
            var text = "Do you want to Unlock this user";
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
                    data: {status: curStatus, uname: username},
                    url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/updateLockStatus',
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

    function setEmployeeStstus(val1, val2) {

        var curStatus = val1;
        var empNo = val2;

        if (curStatus == 1) {
            var text = "Do You want to Disable this user";
        } else {
            var text = "Do you want to Enable this user";
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
                    data: {status: curStatus, empployeeNo: empNo},
                    url: '<?php echo base_url();?>index.php/emp_manage_controller/all_employee_controller/updateEmployeeStatus',
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

