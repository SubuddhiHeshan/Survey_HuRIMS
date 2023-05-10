<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/2/2022
 * Time: 10:12 AM
 */

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Request Summary | HuRIMS</title>

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
                        <h2 style="text-transform: uppercase; color: #666666; ">Request Summary</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Requset By</th>
                                <th>Request</th>
                                <th>Request Disc</th>
                                <th>Request Date</th>
                                <th>Stage</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Update By</th>
                                <th>Update Date</th>
                                <th>Officer Remark</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($sumData != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($sumData as $all) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td>
                                            <span style="color: #0277CA;">
                                                <b><?php echo $all['reqByI'] . ' ' . $all['reqByL'] . ' ' . '(' . $all['employee_id'] . ')' ?></b>
                                        </td>
                                        <td><?php echo $all['jobName']; ?></td>
                                        <td><?php echo $all['jobDisc']; ?></td>
                                        <td><?php echo date("Y-m-d", strtotime($all['reqDate'])); ?></td>

                                        <?php if ($all['jobStage'] == 0) { ?>
                                            <td style="color: black;">Not Engaged</td>
                                        <?php }
                                        if ($all['jobStage'] == 1) { ?>
                                            <td style="color: red;">10% Completed</td>
                                        <?php }
                                        if ($all['jobStage'] == 2) { ?>
                                            <td style="color: #555555;">25% Completed</td>
                                            <?php
                                        }
                                        if ($all['jobStage'] == 3) { ?>
                                            <td style="color: darkred;">50% Completed</td>
                                            <?php
                                        }
                                        if ($all['jobStage'] == 4) { ?>
                                            <td style="color: green;">75% Completed</td>
                                            <?php
                                        }
                                        if ($all['jobStage'] == 5) { ?>
                                            <td style="color: blue;">100% Completed</td>
                                            <?php
                                        } ?>

                                        <td>
                                            <?php if ($all['jobStartDate'] != null) {

                                                echo date("Y-m-d", strtotime($all['jobStartDate']));
                                            } else {
                                                echo "Not Updated";
                                            } ?>
                                        </td>
                                        <td>
                                            <?php if ($all['jobEndDate'] != null) {
                                                echo date("Y-m-d", strtotime($all['jobEndDate']));
                                            } else {
                                                echo "Not Updated";
                                            } ?>
                                        </td>
                                        <td style="color: green;"><b><?php echo $all['upBy']; ?></b></td>
                                        <td><?php echo date("Y-m-d", strtotime($all['updateDate'])); ?></td>

                                        <td><?php echo $all['officerRemark']; ?></td>

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

