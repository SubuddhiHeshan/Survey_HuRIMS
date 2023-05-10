<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 10/8/2022
 * Time: 1:18 PM
 */

?>

<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset="utf-8">

    <title>HuRIMS | Register Employee </title>

    <!-- favicon
   ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
</head>
<body>
<h5 style="text-align: right;">My No : SD/HRIMS/<?php echo date('Y'); ?>/<?php echo $empNum; ?></h5>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <?php
        if ($pdfData->title_id == 2) {
            $title = 'Mr';
        } elseif ($pdfData->title_id == 3) {
            $title = 'Mrs';

        } elseif ($pdfData->title_id == 4) {
            $title = 'Miss';

        } else {
            $title = 'Other';
        }
        ?>
        <td>Dear <?php echo $title; ?>
            . <?php echo $pdfData->middlename . ' ' . ucfirst(strtolower($pdfData->lastname)); ?></td>
    </tr>
    <tr>
        <td><?php echo $pdfData->desName; ?> - (<?php echo $pdfData->grade; ?>)</td>
    </tr>
    <tr>
        <td><?php echo date('Y-m-d'); ?></td>
    </tr>
    </thead>
    </br>
    </br>
    </br>
    <tbody>
    <tr>
        <td><b><u>Registration in Human Resource Information Management System (HRIMS)</u></b></td>
    </tr>
    <br>
    <br>
    <br>
    <tr>
        <td style="text-align: justify;">You have successfully registered to the Survey Department Human Resource
            Management Information
            System (HRIMS).
            Your Employee number is <b><?php echo $empNum; ?></b>.
        </td>
    </tr>
    <br>
    <tr>
        <td>Please use this Employee number for all official works within the department.</td>
    </tr>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <tr>
        <td>...............................................</td>
    </tr>
    <tr>
        <td>AD (Admin)/ Snr.DSG (Admin)/ AO</td>
    </tr>
    <br>
    <br>
    <br>
    <tr>
        <td>CC :
            <ol>
                <li>Director Finance - f.n.a</li>
                <li>Snr. DSG - f.n.a</li>
                <li>Personal File</li>
            </ol>
        </td>
    </tr>
    <tbody>
</table>
</body>
</html>
