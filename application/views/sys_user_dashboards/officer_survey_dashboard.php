<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 11/24/2022
 * Time: 10:36 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Dashboard | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/plugins/materialize/css/materialize.min.css">
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--Load Header with styles-->
<?php $this->load->view('includes/header'); ?>

<!--Load Nav pane to page-->
<?php $this->load->view('includes/navigation'); ?>


<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <!--Start Counter Area-->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter">
                                   <?php echo $counter1->surveyCount; ?>
                               </span></h2>
                        <p>Total No of Surveyors </p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $counter2->ssCount; ?></span></h2>
                        <p>Total No of SS</p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $counter3->snrSSCount; ?></span></h2>
                        <p>Total No Snr.SS </p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $counter4->dsgPsgCount; ?></span></h2>
                        <p>Total No of DSG/PSG </p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Counter Area-->

<!-- Start bar chart area Sec1-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sale-statistic-inner notika-shadow mg-tb-30">
                    <div class="curved-inner-pro">
                        <div class="curved-ctn">
                            <h2>EMPLOYEES IN SURVEY SERVICE STATISTICS</h2>
                            <p>Survey Officers assigned under office type <b>COMPARISON</b> with the department</p>
                        </div>
                    </div>
                    <canvas id="barchart1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End bar chart area Sec1-->

<!-- Start Main Body Section2 area-->
<div class="contact-info-area mg-t-30">
    <div class="container">
        <div class="row">

            <!-- Start Users get 60 area-->
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="normal-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="text-transform: uppercase; color: #666666; ">Employees Turning <span
                                    style="color: red;">55+</span> at
                            <span style="color: blue;"><?php
                                echo date("Y-m-d", strtotime(" +1 months")); ?></span></h4>
                        <p><span style="color: red;">* *</span> Please get ready with these officers <b>PERSONAL
                                FILES<b>
                        </p>
                    </div>

                    <div class="bsc-tbl-st">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>DOB</th>
                                <th>Age</th>
                                <th>Designation</th>
                                <th>Office</th>
                                <th>Action</th>
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
                                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/emp_full_data_view_controller/empFullDataView?empId=<?php echo $retire['id']; ?>">View
                                                Details
                                                </button>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php $count++;
                                }
                            } ?>

                            </tbody>
                        </table>
                        <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/employee_retire_controller/allEmpRetireView">
                            <div class="recent-post-flex rc-ps-vw">
                                <div class="recent-post-line rct-pt-mg">
                                    <p>View All</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Users get 60 area-->

            <!-- Start retirement counter area-->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="contact-inner">
                    <div class="contact-hd widget-ctn-hd">
                        <h2>Employee Retire Counter</h2>
                        <p style="text-transform: capitalize;">Please ready with this amount of personal files </p>
                    </div>
                    <div class="contact-dt">
                        <br>
                        <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                            <div class="website-traffic-ctn">

                                <?php if ($empToRetireCount != null) { ?>
                                    <h2><span class="counter"
                                              style="font-size: 80px; color: red;"><?php echo $empToRetireCount->retireTot; ?></span>
                                        <span>Employees</span>
                                    </h2>

                                    <p style="text-transform: uppercase; margin-top: 5px;">Employees
                                        Stepping to retirement </p>
                                    <p style="margin-top: 2px; margin-left: 120px;">at</p>

                                    <span style="margin-top: 5px; margin-left: 85px; color: blue;"><?php echo date("Y-m-d", strtotime(" +1 months")); ?></span></b></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End retirement counter area-->

        </div>
    </div>
</div>
<!-- End Main body Section2 area-->


</body>
<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!-- plugins for LogAlert JS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-2.2.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/materialize/js/materialize.min.js"></script>

<!-- Charts JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/charts/Chart.js"></script>

<!--Script for log alert-->
<script>
    $(document).ready(function () {

        var ctx = document.getElementById("barchart1");
        var barchart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['SGO', 'Province Office', 'District Office', 'Divisional Office', 'ISM'],
                datasets: [{
                    label: 'Survey Service Employees Assigned',
                    data: [<?php echo $barSgo->survSgoTotCount;?>, <?php echo $barProv->survProvTotCount;?>, <?php echo $barDist->survDistTotCount;?>, <?php echo $barDiv->survDivTotCount;?>,<?php echo $barIsm->survIsmTotCount;?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgb(50,205,50, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(42, 96, 217, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(22, 64, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        <?php if(isset($_SESSION['log_success'])) {?>

        setTimeout(function () {
            Materialize.toast('<?php echo "Hello" . " " . ucfirst(strtolower($_SESSION['Lname'])) . " " . $_SESSION['log_success'] ?>', 4000)
        }, 2000);

        <?php }?>

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

<!--Load footer with js and sources-->
<?php $this->load->view('includes/footer'); ?>

</html>