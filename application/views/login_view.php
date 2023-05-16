<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>ระบบจัดการเว็บไซต์</title>
  <link href="<?php echo base_url();?>/assets/font/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets/css_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body class="bg-dark">
  <div class="container">
      <form role="form" method="post" action="<?php echo base_url('AdminController/login_user'); ?>">
    <div class="card col-md-4 mx-auto mt-4 shadow">
      <div class="card-body">
          <div class="text-center">
              <img src="<?php echo base_url('images');?>/taya_logo.png" width="60">
              </div>
        <form>
          <div class="form-group">
            <div class="txt-sm">ชื่อผู้ใช้งาน</div>
            <input class="form-control txt-sm" name="user_email" type="type" placeholder="กรุณาระบุชื่อผู้ใช้งาน">
          </div>
          <div class="form-group">
            <div class="txt-sm">รหัสผ่าน</div>
            <input class="form-control txt-sm"  name="user_password" type="password" placeholder="กรุณาระบุรหัสผ่าน">
          </div>
          
          <button class="btn btn-success txt-w rounded-pill btn-lg btn-block"><i class="fa fa-sign-in" aria-hidden="true"></i> เข้าสู่ระบบ</button>
        </form>
        <div class="text-center mt-1">
            <?php
            $success_msg= $this->session->flashdata('success_msg');
            $error_msg= $this->session->flashdata('error_msg');

            if($success_msg){
                ?>
                <div class="text-success">
                    <?php echo $success_msg; ?>
                </div>
            <?php
            }
            if($error_msg){
                ?>
                <div class="text-danger txt-danger">
                    <?php echo $error_msg; ?>
                </div>
            <?php
            }
            ?>

        </div>
      </div>
        </form>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin-panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery-easing/jquery.easing.min.js"></script>
</body>



</html>

