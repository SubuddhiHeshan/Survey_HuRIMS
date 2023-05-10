<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/19/2022
 * Time: 11:38 AM
 */
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Employee Retire | HuRIMS</title>

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
                        <h2 style="text-transform: uppercase; color: #666666; ">Employee Waitting to Retire</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Designation</th>
                                <th>Office</th>
                                <th>View</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($empToRetire != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($empToRetire as $retire) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><span style="color: #0277CA; font-size:16px;"><b><?php echo $retire['middlename'] . " " . $retire['lastname']; ?> </br>
                                                    (<?php echo $retire['id'] ?>)</b></span></td>
                                        <td><?php echo $retire['dob']; ?></td>
                                        <td><?php echo $retire['age']; ?></td>
                                        <td><?php echo $retire['designame']; ?></td>
                                        <td><?php echo $retire['brname']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/emp_full_data_view_controller/empFullDataView?empId=<?php echo $retire['id']; ?>"
                                               title="View Employee Card Data"
                                               target="_blank">
                                                <i class="fa fa-users fa-2x"></i>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php $count++;
                                }
                            } ?>

                            </tbody>
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

</script>


</html>

