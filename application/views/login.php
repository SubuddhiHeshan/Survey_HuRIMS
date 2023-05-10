<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/28/2022
 * Time: 11:51 AM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login | HuRIMS</title>


    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <meta name="viewreport" content="width=device-width, initial-scal=1">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">

    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

    <!-- Notika icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">

    <!-- dialog CSS
     ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/dialog.css">


    <style type="text/css">


        input {
            line-height: normal
        }

        input[type=checkbox], input[type=radio] {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0
        }

        input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button {
            height: auto
        }

        input[type=search] {
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-appearance: textfield
        }

        input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration {
            -webkit-appearance: none
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s
        }

        .form-control:focus {
            border-color: #66afe9;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgba(102, 175, 233, .6)
        }

        .form-control::-moz-placeholder {
            color: #999;
            opacity: 1
        }

        .form-control:-ms-input-placeholder {
            color: #999
        }

        .form-control::-webkit-input-placeholder {
            color: #999
        }

        .form-control::-ms-expand {
            background-color: transparent;
            border: 0
        }

        .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
            background-color: #eee;
            opacity: 1
        }

        .form-control[disabled], fieldset[disabled] .form-control {
            cursor: not-allowed
        }

        textarea.form-control {
            height: auto
        }

        .form-group {
            margin-bottom: 15px
        }

        .input-group {
            position: relative;
            display: table;
            border-collapse: separate
        }

        .input-group .form-control, .input-group-addon, .input-group-btn {
            display: table-cell
        }

        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle
        }

        .input-group-addon {
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1;
            color: #555;
            text-align: center;
            background-color: #eee;
            border: 1px solid #ccc;
            border-radius: 4px
        }

        .input-group .form-control:first-child, .input-group-addon:first-child, .input-group-btn:first-child > .btn, .input-group-btn:first-child > .btn-group > .btn, .input-group-btn:first-child > .dropdown-toggle, .input-group-btn:last-child > .btn-group:not(:last-child) > .btn, .input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0
        }

        .input-group-addon:first-child {
            border-right: 0
        }
    </style>

</head>

<body style="background-color: white;">
<div class="container">
    <div class="img">
        <img src="<?php echo base_url(); ?>assets/img/welcome/img.svg">
    </div>

    <div class="login-container">
        <form name="signin" method="post" action="<?php echo base_url(); ?>index.php/main_controller/authenticateUser">

            <img class="avatar" src="<?php echo base_url(); ?>assets/img/welcome/avatar.svg">
            <h2>Welcome To Survey HR Management System</h2>


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

            <br>
            <a href="">Forgot Password?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</div>

</body>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>

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


<!--Script for log alert-->
<script>
    $(document).ready(function () {

        <?php if (isset($_SESSION['error'])){?>
        swal({
            text: "<?php echo $_SESSION['error']?>",
            type: "error",

        });
        <?php } elseif (isset($_SESSION['success'])) {?>
        swal({
            text: "<?php echo $_SESSION['success']?>",
            type: "success",

        });
        <?php }?>

    });
</script>


</html>