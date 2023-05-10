<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 11/12/2022
 * Time: 3:29 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>404 Page | HuRIMS</title>

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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
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
<!-- 404 Page area Start-->
<div class="error-page-area">
    <div class="error-page-wrap">
        <i class="notika-icon notika-close"></i>
        <h2>ERROR <span class="counter">404</span></h2>
        <p>Sorry, but the page you are looking for has note been found. Try checking the URL for an error, then hit the
            refresh button on your browser or try found something else in the system.</p>
        <a href="<?php echo base_url() ?>index.php/main_controller/dashboardView" class="btn">Dashboard</a>
    </div>
</div>
<!-- 404 Page area End-->

</body>
<?php $this->load->view('includes/footer'); ?>


</html>

