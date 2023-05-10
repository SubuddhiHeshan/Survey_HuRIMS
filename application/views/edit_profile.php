<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 8/13/2022
 * Time: 3:02 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <title>Edit Profile | HuRIMS</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


</head>

<body>

<?php $this->load->view('includes/header'); ?>


<?php $this->load->view('includes/navigation'); ?>

<div class="form-element-area">
    <div class="container">


        <div class="row">
            <form name="updateEmployee" method="post"
                  action="<?php echo base_url(); ?>index.php/profile_controller/updateProfileData">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2 style="text-transform: uppercase; color: #666666; ">Edit your Personal Informations</h2>
                            <p style="color: red;">You have limited access to edit your profile. Some fields are
                                restricted
                                to your User Role </p>
                        </div>
                        <div class="row">

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-next"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="empno" value="<?php echo $_SESSION['empNo']; ?>"
                                               class="form-control"
                                               placeholder="Employee No" required readonly>
                                    </div>
                                    <?php echo form_error('empno', '<span style="color: red;">', '</span>') ?>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="title" class="form-control"
                                               value="<?php echo $profile->title; ?>"
                                               placeholder="Title" required readonly>
                                        <?php echo form_error('title', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="intlname" class="form-control"
                                               value="<?php echo $profile->initialname;  ?>"
                                               placeholder="Name in Initial">
                                        <?php echo form_error('intlname', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="initial_eng"
                                               value="<?php echo $profile->middlename; ?>"
                                               placeholder="Initial in Enlish" required>
                                        <?php echo form_error('initial_eng', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="lname"
                                               value="<?php echo $profile->lastname; ?>"
                                               placeholder="Last Name in English" required>
                                        <?php echo form_error('lname', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="inithial_sin"
                                               value="<?php echo $profile->name_sinhala; ?>"
                                               placeholder="Name with Initial in Sinhala">
                                        <?php echo form_error('inithial_sin', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="inithial_tamil"
                                               value="<?php echo $profile->name_tamil; ?>"
                                               placeholder="Name with Initial in Tamil">
                                        <?php echo form_error('inithial_tamil', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="nic"
                                               value="<?php echo $profile->nic; ?>"
                                               placeholder="NIC" required readonly>
                                        <?php echo form_error('nic', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="dob"
                                               value="<?php echo $profile->dob; ?>"
                                               placeholder="Date of Birth" required readonly>
                                        <?php echo form_error('dob', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="tel" name="mob" value="<?php echo $profile->mobile; ?>"
                                               class="form-control" pattern="[0-9]{10}"
                                               placeholder="Mobile Number" maxlength="10" minlength="10">
                                        <?php echo form_error('mob', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="tel" name="tel" value="<?php echo $profile->tel; ?>"
                                               class="form-control" pattern="[0-9]{10}"
                                               placeholder="Home Number" maxlength="10" minlength="10">
                                        <?php echo form_error('tel', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="email" name="email" value="<?php echo $profile->email; ?>"
                                               class="form-control"
                                               placeholder="Email Address">
                                        <?php echo form_error('email', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="add1" value="<?php echo $profile->privateaddress; ?>"
                                               class="form-control"
                                               placeholder="Address Line 1" required>
                                    </div>
                                    <?php echo form_error('add1', '<span style="color: red;">', '</span>') ?>

                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="add2" class="form-control"
                                               value="<?php echo $profile->privateaddress2; ?>"
                                               placeholder="Address Line 2">
                                        <?php echo form_error('add2', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="address3" class="form-control"
                                               value="<?php echo $profile->privateaddress3; ?>"
                                               placeholder="Address Line 3">
                                        <?php echo form_error('address3', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="curadd" class="form-control"
                                               value="<?php echo $profile->present_address; ?>"
                                               placeholder="Present Address">
                                        <?php echo form_error('curadd', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="branch" class="form-control"
                                               value="<?php echo $_SESSION['branch_name'] ?>"
                                               placeholder="Office" required readonly>
                                        <?php echo form_error('branch', '<span style="color: red;">', '</span>') ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="dialog-pro dialog">
                                    <button style="margin-left: 85%;" type="reset" class="btn btn-danger">Reset</button>
                                    &nbsp;
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

<?php $this->load->view('includes/footer'); ?>

</html>
