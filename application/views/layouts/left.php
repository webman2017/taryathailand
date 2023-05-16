

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Tarya</title>
    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url();?>assets/admin-panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>assets/admin-panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url();?>assets/admin-panel/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>assets/admin-panel/css/sb-admin.css" rel="stylesheet">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-white fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo base_url('/');?>"><img src="<?php echo base_url('images');?>/taya.png" width="100"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">-->
<!--                <a class="nav-link" href="index.html">-->
<!--                    <i class="fa fa-fw fa-dashboard"></i>-->
<!--                    <span class="nav-link-text">หน้าหลัก</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">-->
<!--                <a class="nav-link" href="--><?php //echo base_url('dealerlist');?><!--">-->
<!--                    <i class="fa fa-fw fa-users"></i>-->
<!--                    <span class="nav-link-text">ตัวแทน</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="<?php echo base_url('product');?>">
                    
                    <span class="nav-link-text"> ผลิตภัณฑ์ทายะ</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?php  echo base_url('Qrcode');?>">
                    
                    <span class="nav-link-text"> รายการคิวอาร์โค้ด</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="<?php //echo base_url('');?>">
                    <span class="nav-link-text">จัดการโปรโมชั่น</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                <a class="nav-link" href="<?php echo base_url('map');?>">
                   
                    <span class="nav-link-text"> Location</span>
                </a>
            </li>

<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">-->
<!--                <a class="nav-link" href="--><?php //echo base_url('dealerlist');?><!--">-->
<!--                    <i class="far fa-save"></i>-->
<!--                    <span class="nav-link-text"> บันทึกการขาย</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">-->
<!--                <a class="nav-link" href="--><?php //echo base_url('review_all');?><!--">-->
<!--                    <i class="fas fa-comment"></i>-->
<!--                    <span class="nav-link-text"> รีวิวสินค้า</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">-->
<!--                <a class="nav-link" href="--><?php //echo base_url('review_all');?><!--">-->
<!--                    <i class="fas fa-info"></i>-->
<!--                    <span class="nav-link-text">จัดการรู้จ้กเรา</span>-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">-->
<!--                <a class="nav-link" href="--><?php //echo base_url('review_all');?><!--">-->
<!--                    <i class="fa fa-address-card" aria-hidden="true"></i>-->
<!--                    <span class="nav-link-text">จัดการติดต่อเรา</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
                <a class="nav-link" href="<?php  echo base_url('user');?>">
                  
                    <span class="nav-link-text">ผู้ใช้งานระบบ</span>
                </a>
            </li>
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-wrench"></i>-->
<!--                    <span class="nav-link-text">สินค้า</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseComponents">-->
<!--                    <li>-->
<!--                        <a href="navbar.html">Navbar</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="cards.html">Cards</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-file"></i>-->
<!--                    <span class="nav-link-text">ผู้ใช้งานระบบ</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseExamplePages">-->
<!--                    <li>-->
<!--                        <a href="login.html">Login Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="register.html">Registration Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="forgot-password.html">Forgot Password Page</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="blank.html">Blank Page</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">-->
<!--                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">-->
<!--                    <i class="fa fa-fw fa-sitemap"></i>-->
<!--                    <span class="nav-link-text">Menu Levels</span>-->
<!--                </a>-->
<!--                <ul class="sidenav-second-level collapse" id="collapseMulti">-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="#">Second Level Item</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>-->
<!--                        <ul class="sidenav-third-level collapse" id="collapseMulti2">-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <a href="#">Third Level Item</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
               
                    <span class="nav-link-text">ออกจากระบบ</span>
                </a>
            </li>
<!--            <img src="--><?php //echo base_url('images');?><!--/science.jpg" class="img-fluid">-->
        </ul>


        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">


<!--            <li class="nav-item">-->
<!--                <form class="form-inline my-2 my-lg-0 mr-lg-2">-->
<!--                    <div class="input-group">-->
<!--                        <input class="form-control" type="text" placeholder="Search for...">-->
<!--              <span class="input-group-append">-->
<!--                <button class="btn btn-primary" type="button">-->
<!--                    <i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--                    </div>-->
<!--                </form>-->
<!--            </li>-->
            <li class="nav-item" style="font-family: DBHeaventv;">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </div>
</nav>