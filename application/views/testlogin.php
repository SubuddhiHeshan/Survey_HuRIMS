<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/4/2022
 * Time: 1:06 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>HuRIMS | Survey - Human Resorce Management System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- Google Fonts
============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- font awesome CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
    <!-- animate CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <!-- normalize CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- wave CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <!-- Notika icon CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- main CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- style CSS
============================================ -->
<!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/style.css">-->
    <!-- responsive CSS
============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr JS
============================================ -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Login Register area Start-->
<div class="login-content">
    <!-- Login -->
    <div class="nk-block toggled" id="l-login">

        <div class="nk-form">

            <form name="login" method="post" action="<?php echo base_url();?>index.php/main_controller/authenticateUser">

                <!--Display flash error and success msgs -->
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                        </button>
                        <a href="" class="alert-link"><?php echo $_SESSION['success'] ?></a>
                    </div>

                    <?php
                } ?>

                <?php if (isset($_SESSION['error'])) { ?>

                    <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                        <a href="" class="alert-link"><?php echo $_SESSION['error']; ?></a></div>

                    <?php
                } ?>

                <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                    <div class="nk-int-st">
                        <input type="text" id="username" name="username" class="form-control " placeholder="Username"
                               required>
                    </div>
                </div>
                <div class="input-group mg-t-15">
                    <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                    <div class="nk-int-st">
                        <input type="password" id="password" name="password" class="form-control "
                               placeholder="Password" required>
                    </div>
                </div>
                <div class="fm-checkbox">
                    <label><input type="checkbox" class="i-checks"> <i></i> Keep me signed in</label>
                </div>

                <button type="submit" class="btn btn-login btn-success btn-float"><i
                            class="notika-icon notika-right-arrow"></i></button>

        </div>

        <div class="nk-navigation nk-lg-ic">
            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-register"><i
                        class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
            <a href="#" data-ma-action="nk-login-switch" data-ma-block="#l-forget-password"><i>?</i> <span>Forgot Password</span></a>
        </div>
        </form>
    </div>

</div>
<!-- Login Register area End-->
<!-- jquery
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- wow JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<!-- price-slider JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- sparkline JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sparkline/sparkline-active.js"></script>
<!-- flot JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/flot-active.js"></script>
<!-- knob JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/js/knob/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/js/knob/knob-active.js"></script>
<!--  Chat JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/chat/jquery.chat.js"></script>
<!--  wave JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/wave/waves.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wave/wave-active.js"></script>
<!-- icheck JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/icheck/icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/icheck/icheck-active.js"></script>
<!--  todo JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/todo/jquery.todo.js"></script>
<!-- Login JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/login/login-action.js"></script>
<!-- plugins JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- main JS
============================================ -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

</html>