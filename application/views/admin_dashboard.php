<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/6/2022
 * Time: 8:16 PM
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
                                   <?php echo $totEmp->countEmp; ?>
                               </span></h2>
                        <p>Total No of Employees</p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $totBranch->countBranch; ?></span></h2>
                        <p>Total No of Branches</p>
                    </div>
                    <div class="sparkline-bar-stats2">1,4,8,3,5,6,4,8,3,3,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $totDesig->countDesig; ?></span></h2>
                        <p>Total No of Designations</p>
                    </div>
                    <div class="sparkline-bar-stats3">4,2,8,2,5,6,3,8,3,5,9,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $totSysusr->countSysusers; ?></span></h2>
                        <p>Total No of System Users</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7,3,5,7,5</div>
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
                            <h2>EMPLOYEE REGISTRATION STATISTICS</h2>
                            <p>Past five years employee registration <b>COMPARISON</b> with the department</p>
                        </div>
                    </div>
                    <canvas id="barchart1"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End bar chart area Sec1-->

<!-- Start Emp Stat area Sec2-->
<div class="notika-email-post-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="email-statis-inner notika-shadow">
                    <div class="email-ctn-round">
                        <div class="email-rdn-hd">
                            <h2>Employee Statistics</h2>
                        </div>
                        <div class="email-statis-wrap">
                            <div class="email-round-nock">
                                <input type="text" class="knob" value="0" data-rel="<?php echo $yearlyTot; ?>"
                                       data-linecap="round"
                                       data-width="130" data-bgcolor="#E4E4E4" data-fgcolor="#00c292"
                                       data-thickness=".10" data-readonly="true">
                            </div>
                            <div class="email-ctn-nock">
                                <p>Total Only for Year <b style="color: blue;"><?php echo date("Y"); ?></b></p>
                            </div>
                        </div>
                        <div class="email-round-gp">
                            <div class="email-round-pro">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="<?php echo $msoTot->msoTot; ?>"
                                           data-linecap="round"
                                           data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292"
                                           data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>MSO</p>
                                </div>
                            </div>
                            <div class="email-round-pro">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="<?php echo $doTot->doTot; ?>"
                                           data-linecap="round"
                                           data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292"
                                           data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>DO</p>
                                </div>
                            </div>
                            <div class="email-round-pro sm-res-ds-n lg-res-mg-bl">
                                <div class="email-signle-gp">
                                    <input type="text" class="knob" value="0" data-rel="<?php echo $surTot->survTot; ?>"
                                           data-linecap="round"
                                           data-width="90" data-bgcolor="#E4E4E4" data-fgcolor="#00c292"
                                           data-thickness=".10" data-readonly="true" disabled>
                                </div>
                                <div class="email-ctn-nock">
                                    <p>Surveyors</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Emp Stat area Sec2-->

            <!-- Start Recent Reg Emp area Sec3-->
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-post-wrapper notika-shadow sm-res-mg-t-30 tb-res-ds-n dk-res-ds">
                    <div class="recent-post-ctn">
                        <div class="recent-post-title">
                            <h2>Recent Registered Employees</h2>
                        </div>
                    </div>
                    <div class="recent-post-items">

                        <?php if ($recentEmp != null) {
                            foreach ($recentEmp as $re) {
                                ?>
                                <div class="recent-post-signle rct-pt-mg-wp">
                                    <a href="#">
                                        <div class="recent-post-flex">
                                            <div class="recent-post-it-ctn">
                                                <h2 style="margin-top: 9px;"><?php echo $re['middlename'] . ' ' . $re['lastname']; ?></h2>
                                                <p style="margin-top: 5px;margin-bottom: 5px;">Registered at <span
                                                            style="color: blue;"><?php echo $re['date_Stamp']; ?></span>,
                                                    <b><?php echo $re['name']; ?></b></p>
                                            </div>

                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="recent-post-signle">
                            <a href="<?php echo base_url(); ?>index.php/emp_manage_controller/all_employee_controller/allEmpView">
                                <div class="recent-post-flex rc-ps-vw">
                                    <div class="recent-post-line rct-pt-mg">
                                        <p>View All</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Recent Reg Emp area Sec3-->

            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="recent-items-wp notika-shadow sm-res-mg-t-30">
                    <div class="rc-it-ltd">
                        <div class="recent-items-ctn">
                            <div class="recent-items-title">
                                <h2>Recent Retired/Resign/Transfered</h2>
                            </div>
                        </div>
                        <div class="recent-items-inn">
                            <table class="table table-inner table-vmiddle">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th style="width: 60px">Date</th>
                                </tr>
                                </thead>
                                <tbody>


                                <?php if ($rcttRetire != null) {
                                    foreach ($rcttRetire as $retire) { ?>
                                        <tr>
                                            <td class="f-500 c-cyan"> <?php echo $retire['id']; ?></td>
                                            <td> <?php echo $retire['lastname']; ?></td>
                                            <td class="f-500 c-cyan"> <?php echo $retire['tranfer_date']; ?></td>
                                        </tr>

                                    <?php }
                                } ?>

                                </tbody>
                            </table>
                        </div>
                        <div id="recent-items-chart" class="flot-chart-items flot-chart vt-ct-it tb-rc-it-res"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Body area Sec2-->

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
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/charts/bar-chart.js"></script>-->

<!--Script for log alert-->
<script>
    $(document).ready(function () {

        const d = new Date();
        var year = d.getFullYear();

        var lbl1 = year;
        var lbl2 = lbl1 - 1;
        var lbl3 = lbl2 - 1;
        var lbl4 = lbl3 - 1;
        var lbl5 = lbl4 - 1;

        var ctx = document.getElementById("barchart1");
        var barchart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [lbl1, lbl2, lbl3, lbl4, lbl5],
                datasets: [{
                    label: 'Employee Registration',
                    data: [<?php echo $bary1->yr1count;?>, <?php echo $bary2->yr2count;?>, <?php echo $bary3->yr3count;?>, <?php echo $bary4->yr4count;?>,<?php echo $bary5->yr5count;?>],
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