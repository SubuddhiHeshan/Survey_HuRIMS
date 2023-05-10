<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 12/1/2022
 * Time: 10:20 AM
 */

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Manage Request | HuRIMS</title>

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
                        <h2 style="text-transform: uppercase; color: #666666; ">Manage Your Requests</h2>
                        <p style="color: red;">You are not able to edit your request after the officer been engaged with
                            your request</p>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 80px;">Request Title</th>
                                <th style="width: 50px;">Description</th>
                                <th>Request Date</th>
                                <th>Request Stage</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($requests != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($requests as $req) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td>
                                            <span style="color: #0277CA;"><b><?php echo $req['jobName']; ?></b>
                                        </td>
                                        <td><?php echo $req['jobDisc']; ?></td>
                                        <td><?php echo $req['reqDate']; ?></td>

                                        <?php if ($req['jobStage'] == 0) { ?>
                                            <td style="color: black;">Not Engaged</td>
                                        <?php }
                                        if ($req['jobStage'] == 1) { ?>
                                            <td style="color: red;">10% Completed</td>
                                        <?php }
                                        if ($req['jobStage'] == 2) { ?>
                                            <td style="color: #555555;">25% Completed</td>
                                            <?php
                                        }
                                        if ($req['jobStage'] == 3) { ?>
                                            <td style="color: darkred;">50% Completed</td>
                                            <?php
                                        }
                                        if ($req['jobStage'] == 4) { ?>
                                            <td style="color: green;">75% Completed</td>
                                            <?php
                                        }
                                        if ($req['jobStage'] == 5) { ?>
                                            <td style="color: blue;">100% Completed</td>
                                            <?php
                                        } ?>

                                        <td style="text-align: center;">

                                            <div class="dialog-pro dialog">
                                                <?php if ($req['jobStage'] == 0) { ?>
                                                    <button class="btn btn-info" data-toggle="modal"
                                                            onclick="reqDtlView('<?php echo $req['jobName']; ?>','<?php echo $req['jobDisc']; ?>','<?php echo $req['jobId']; ?>')"
                                                            data-target="#reqUpModal"> Update Request
                                                    </button>

                                                    <!--                                                    <br><br>-->


                                                    <button class="btn btn-danger"
                                                            onclick="delReq('<?php echo $req['jobId']; ?>')">Delete
                                                        Request
                                                    </button>

                                                <?php } else { ?>

                                                    <button class="btn btn-info" data-toggle="modal"
                                                            disabled="disabled"
                                                            data-target=""> Update Request
                                                    </button>
                                                    <!--                                                    <br><br>-->
                                                    <button class="btn btn-danger" disabled> Delete
                                                        Request
                                                    </button>
                                                <?php } ?>
                                            </div>
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

<!--Start Request Update  Modal-->
<div class="modal fade" id="reqUpModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <form name="reqUpdateForm" id="reqUpdateForm" method="post"
                  action="<?php echo base_url(); ?>index.php/error_report_controller/user_req_manage_controller/updateRequest">
                <div class="modal-header">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="basic-tb-hd">
                                <h2 style="text-transform: uppercase; color: #666666; ">Request to Update</h2>
                            </div>
                            <div class="row">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2><b>Request Title</b></h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input name="reqtitle" id="reqtitle" type="text" value=""
                                                   class="form-control"
                                                   placeholder="Enter Request Title"
                                                   required>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2><b>Request Description</b></h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input name="dsc" id="dsc" type="text" value="" class="form-control"
                                                   placeholder="Enter Request Description"
                                                   required>

                                        </div>
                                    </div>
                                </div>

                                <input name="jobId" id="jobId" type="text" value="" class="form-control" hidden>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" id="modalReset" class="btn btn-default" data-dismiss="modal">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--End Request Update Modal-->

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

    function reqDtlView(val1, val2, val3) {

        var value1 = val1;
        var value2 = val2;
        var value3 = val3;

        document.getElementById("reqtitle").value = value1;
        document.getElementById("dsc").value = value2;
        document.getElementById("jobId").value = value3;

    }

    $(document).ready(function () {

        $('#modalReset').click(function () {
            document.getElementById('reqUpdateForm').reset();
        });
    });


    function delReq(reqId) {

        var id = reqId;

        swal({
            title: "Are you sure?",
            text: "Do you want to Delete this Request",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Confirm",
            cancelButtonText: "No, Decline",
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    data: {jobid: id},
                    url: '<?php echo base_url();?>index.php/error_report_controller/user_req_manage_controller/deleteRequest',
                    success: function (result) {
                        if (result == true) {
                            swal({
                                text: "Successfully Deleted",
                                type: "success",

                            });

                        } else {
                            swal({
                                text: "Already Deleted",
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

