<html lang="en">
<head>
    <title>รายชิ่อตัวแทน บริษัท ฟีโอร่า (ไทยเลนด์ )จำกัด</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquerymobile/1.4.3/jquery.mobile.min.js"></script>
    <link rel="shortcut icon" href="<?=base_url()?>images/md.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Prompt:400" rel="stylesheet">

</head>
<body>


<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/bootstrap/dist/css/bootstrap.css"); ?>">
<!--<link rel="stylesheet" type="text/css" href="--><?php //echo base_url("assets/css/feora.css"); ?><!--">-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/style.css"); ?>">


<div class="container">
    <div class="col-lg-12 col-sm-12 col-sm-12">
    <?php foreach ($dealer as $country): ?>
        <div class="dealer-row">
<!--            <div class="dealer-picture"><img-->
<!--                    src="--><?php //echo base_url(); ?><!--uploads/--><?php //echo $country->file; ?><!--" width="150"></div>-->

            <div class="dealer-name"> <a href="<?php echo base_url(); ?>/Qr/C/<?php echo $country->code_generate;?>"><?php echo $country->code_generate; ?></a> </div>


        </div>
    <?php endforeach; ?>
        </div>
</div>
