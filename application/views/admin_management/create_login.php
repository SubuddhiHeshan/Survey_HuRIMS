<?php
/**
 * Created by PhpStorm.
 * User: IT-012
 * Date: 10/14/2022
 * Time: 10:20 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Login Creation | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- bootstrap select CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">


</head>

<body>


<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/navigation'); ?>

<!-- Start create Login area -->
<div class="container">
    <div class="row">
        <form name="createLogin" method="post"
              action="<?php echo base_url(); ?>index.php/admin_manage_controller/create_login_controller/createNewLogin">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="basic-tb-hd">
                                <h2 style="text-transform: uppercase; color: #666666; ">Create User Login</h2>
                            </div>

                            <div id="employee_details">
                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Employee No</label>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="number" id="empNo" name="empNo"
                                                           style="font-size: 14px;"
                                                           class="form-control input-sm" placeholder="Enter Employee No"
                                                           required>
                                                </div>
                                            </div>
                                            <a><i id="find" class="fa fa-search fa-2x"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Initials</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="initi"><b><< NO DATA >></b></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Last Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="lname"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Office</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="ofz"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Designation</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="desig"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">User Role</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="bootstrap-select fm-cmp-mg">
                                                    <select class="selectpicker" id="role" name="role"
                                                            data-live-search="true" required>
                                                        <option value="">Please Select</option>
                                                        <?php if ($userRoles != null) {
                                                            foreach ($userRoles as $roles) {
                                                                ?>
                                                                <option value="<?php echo $roles['id']; ?>">
                                                                    <?php echo $roles['name']; ?></option>

                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Username</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" id="username" name="username"
                                                           class="form-control input-sm"
                                                           placeholder="Enter Username" required>
                                                    <span id="uNameMsg"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Password</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="password" id="pwd" name="pwd" style="font-size: 14px;"
                                                           pattern="[A-Za-z0-9!@#$%^&*()-_|]{8}"
                                                           title="Should contain 8 characters with at least 1 special symbol"
                                                           onkeyup="Pwdcheck();" class="form-control input-sm"
                                                           placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Retype Password</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="password" id="repwd" name="repwd"
                                                           style="font-size: 14px;"
                                                           pattern="[A-Za-z0-9!@#$%^&*()-_|]{8}"
                                                           title="Should contain 8 characters with at least 1 special symbol"
                                                           onkeyup="Pwdcheck();" class="form-control input-sm"
                                                           placeholder="Retype Password" required>
                                                    <span id="pwCheckMsg"></span>
                                                </div>
                                                <div class="fm-checkbox">
                                                    <lable><input type="checkbox" id="show" onclick="pwdshow()"><i></i>
                                                        Show
                                                        Password
                                                    </lable>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="form-example-int mg-t-15">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <div class="dialog-pro dialog">
                                                <button type="reset" class="btn btn-danger">Reset</button>&nbsp;
                                                <button type="submit" class="btn btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Login create area-->

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

    $(document).ready(function () {
        $('#find').click(function () {
            var empNo = $('#empNo').val();

            if (empNo != '') {
                $.ajax({
                    type: 'POST',
                    data: {employee: empNo},
                    dataType: 'JSON',
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_login_controller/empNoValidate',
                    success: function (data) {
                        document.getElementById('initi').style.color = 'blue';
                        document.getElementById('initi').style.fontSize = '14px';
                        document.getElementById('initi').style.fontWeight = 'bold';
                        document.getElementById('initi').innerHTML = data.mName;

                        document.getElementById('lname').style.color = 'blue';
                        document.getElementById('lname').style.fontSize = '14px';
                        document.getElementById('lname').style.fontWeight = 'bold';
                        document.getElementById('lname').innerHTML = data.lName;

                        document.getElementById('ofz').style.color = 'blue';
                        document.getElementById('ofz').style.fontSize = '14px';
                        document.getElementById('ofz').style.fontWeight = 'bold';
                        document.getElementById('ofz').innerHTML = data.branch;

                        document.getElementById('desig').style.color = 'blue';
                        document.getElementById('desig').style.fontSize = '14px';
                        document.getElementById('desig').style.fontWeight = 'bold';
                        document.getElementById('desig').innerHTML = data.desig;
                    },
                    error: function () {

                        document.getElementById('initi').innerHTML = "<< NO DATA >>";
                        document.getElementById('lname').innerHTML = "<< NO DATA >>";
                        document.getElementById('ofz').innerHTML = "<< NO DATA >>";
                        document.getElementById('desig').innerHTML = "<< NO DATA >>";

                        swal({
                            text: "Entered Employee NO not Registered with the System",
                            type: "error",
                        });
                    }

                });

            } else {
                swal({
                    text: "Please Enter a Valid Employee Number",
                    type: "error",
                });
            }

        });

    });

    $(document).ready(function () {
        $('#username').click(function () {
            var emp = $('#empNo').val();
            var roleId = $('#role').val();

            if (emp != '' && roleId != '') {
                $.ajax({
                    type: 'POST',
                    data: {employee: emp, uRole: roleId},
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_login_controller/userRoleValidate',
                    success: function (result) {
                        if (result == true) {
                            swal({
                                text: "This User Already have a Login with this User Role, Please select a different user role",
                                type: "error",
                            });
                        }
                    }
                });
            } else {
                swal({
                    text: "Please Enter a Valid Employee NO and Appropriate User Role",
                    type: "error",
                });
            }
        });
    });


    $(document).ready(function () {
        $('#pwd').click(function () {

            var username = $('#username').val();

            if (username != '') {
                $.ajax({
                    type: 'POST',
                    data: {uName: username},
                    url: '<?php echo base_url();?>index.php/admin_manage_controller/create_login_controller/usernameValidate',
                    success: function (result) {
                        console.log(result);
                        if (result == true) {
                            document.getElementById('uNameMsg').style.color = 'red';
                            document.getElementById('uNameMsg').innerHTML = 'THIS USERNAME IS TAKEN';
                        } else {
                            document.getElementById('uNameMsg').style.color = 'green';
                            document.getElementById('uNameMsg').innerHTML = 'THIS USERNAME IS FREE';
                        }
                    }
                });

            } else {
                swal({
                    text: "Please Enter a Valid Username",
                    type: "error",
                });
            }

        });
    });

    function Pwdcheck() {

        if (document.getElementById('pwd').value == document.getElementById('repwd').value) {

            document.getElementById('pwCheckMsg').style.color = 'green';
            document.getElementById('pwCheckMsg').innerHTML = 'PASSWORD MATCHED';
        } else {
            document.getElementById('pwCheckMsg').style.color = 'red';
            document.getElementById('pwCheckMsg').innerHTML = 'PASSWORD NOT MATCHED';
        }
    }


    function pwdshow() {
        var x = document.getElementById("pwd");
        var y = document.getElementById("repwd");
        if (x.type === "password" || y.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }

    }


</script>


</html>
