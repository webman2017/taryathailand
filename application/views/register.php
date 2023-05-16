<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>เพื่มผู้ใช้</title>


    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>
<body>
 
<span style="background-color:red;">
  <div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->
      <div class="row justify-content-center"><!-- row class is used for grid system in Bootstrap-->
          <div class="col-md-4 col-md-offset-4 "><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->
              <div class="login-panel panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title" style="font-family: DBHeaventv; font-size: 27px;">เพิ่มผู้ใช้งานระบบ</h3>
                  </div>
                  <div class="panel-body">

                      <?php
                      $error_msg=$this->session->flashdata('error_msg');
                      if($error_msg){
                          echo $error_msg;
                      }
                      ?>

                      <form role="form" method="post" action="<?php echo base_url('AdminController/register_user'); ?>">
                          <fieldset>
                              <div class="form-group">
                                  <input class="form-control" placeholder="ชื่อ-นามสกุล" name="user_name" type="text" autofocus style="font-family: DBHeaventv;font-size: 20px;">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="ระบุอีเมล" name="user_email" type="email" autofocus style="font-family: DBHeaventv;font-size: 20px;">
                              </div>
                              <div class="form-group">
                                  <input class="form-control" placeholder="ระบุรหัสผ่าน" name="user_password" type="password" value="" style="font-family: DBHeaventv;font-size: 20px;">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="ระบุอายุ" name="user_age" type="number" value="" style="font-family: DBHeaventv;font-size: 20px;">
                              </div>

                              <div class="form-group">
                                  <input class="form-control" placeholder="ระบุเบอร์โทรศัพท์" name="user_mobile" type="number" value="" style="font-family: DBHeaventv; font-size: 20px;">
                              </div>

                              <button class="btn  btn-success" type="submit"   style="font-family: DBHeaventv;font-size: 23px;" >สมัครตัวแทน</button>

                          </fieldset>
                      </form>
<!--                   <a href="--><?php //echo base_url('AdminController/login_view'); ?><!--">Login here</a>-->
                  </div>
              </div>
          </div>
      </div>
  </div>
 
 
 
 
 
</span>




</body>
</html>