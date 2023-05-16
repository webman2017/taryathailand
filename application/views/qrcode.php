
<?php
$user_id=$this->session->userdata('user_id');

if(!$user_id){

    redirect('AdminController/login_view');
}

?>

  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>assets/admin-panel/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>assets/admin-panel/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>assets/admin-panel/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>assets/admin-panel/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php include('layouts/left.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
<!--      <ol class="breadcrumb">-->
<!--        <li class="breadcrumb-item">-->
<!--          <a href="#">Dashboard</a>-->
<!--        </li>-->
<!--        <li class="breadcrumb-item active">Tables</li>-->
<!--      </ol>-->
<!--        <a href="--><?php //echo base_url(); ?><!--index.php/Excel_qr/action">-->
<!--            <button class="btn btn-light"><span><i class="far fa-file-excel"-->
<!--                                                   style="font-size: 30px;"></i></span>-->
<!--                Excel File-->
<!--            </button>-->
<!--        </a>-->
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> รายการสแกนคิวอาร์โค้ท</div>
        <div class="card-body">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    include_once 'layouts/left.php';
                    ?>

                    <div class="col-lg-12">
                        <div>
                            <form action="<?php echo base_url(); ?>index.php/Qrimages/generate" method="post">
                                <div style="font-family: DBHeaventv;font-size: 25px;">
                                    สร้างคิวอาร์โค้ท
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="product" class="form-control" value="tr">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="product_name" class="form-control" value="tarya">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="product_img" class="form-control" value="tarya.png">
                                    <!--            <div class="form-group">-->
                                    <!--                <select class="search-txt form-control" name="product_img"  required="required">-->
                                    <!--                    <option value="">รูปสินค้า</option>-->
                                    <!--                    --><?php //foreach ($product as $products): ?>
                                    <!--                        <option-->
                                    <!--                            value="--><?php //echo $products->product_img; ?><!--">-->
                                    <!--                            --><?php //echo $products->product_name; ?><!--</option>-->
                                    <!--                    --><?php //endforeach; ?>
                                    <!--                </select>-->
                                    <!--            </div>-->

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <input type="text" name="url" value="https://www.taryathailand.com/Qr/C/" required="required"
                                               placeholder="เลขล็อต" class="form-control ">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">


                                        <select class="search-txt form-control" name="lot_number" required="required">
                                            <option value="">ล็อต</option>
                                            <option value="001">001</option>
                                            <option value="002">002</option>
                                            <option value="003">003</option>
                                            <option value="004">004</option>
                                            <option value="005">005</option>
                                        </select>


                                        <!--                <input type="text" name="lot_number" value="" required="required"-->
                                        <!--                       placeholder="เลขล็อต" class="form-control ">-->
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <!--                <select class="search-txt form-control" name="amount"  required="required">-->
                                        <!--                    <option value="">จำนวน</option>-->
                                        <!--                    <option value="100">100</option>-->
                                        <!--                    <option value="500">500</option>-->
                                        <!--                    <option value="1000">1000</option>-->
                                        <!--                </select>-->
                                        <input type="text" name="amount" value="" required="required"
                                               placeholder="จำนวน QR CODE" class="form-control ">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="search-txt form-control" name="country" id="country" required="required">
                                            <option value="">เลือกประเทศ</option>
                                            <?php foreach ($country as $country): ?>
                                                <option
                                                    value="<?php echo $country->country_code; ?>">
                                                    <?php echo $country->country_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <input type="hidden" name="action" value="generate_qrcode">
                                    <button class="btn btn-lg btn-success" style="font-family: DBHeaventv; font-size: 23px;">สร้าง</button>

                            </form>
                            <!--        --><?php
                            //        if ($img_url) {
                            //            ?>
                            <!--            <br><br>QRcode Image here. Scan this to get result<br>-->
                            <!--            <img src="-->
                            <?php //echo base_url('uploads/qr_image/' . $img_url); ?><!--" alt="QRCode Image">-->
                            <!--        --><?php
                            //        }
                            //        ?>
                        </div>

                        <section class="content">


                            <!-- Your Page Content Here -->
                            <div class="box">
                                <div class="box-header">

                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!--                            <a class="btn btn-default" href="http://localhost/QR_FEORA/index.php/Qrimages"-->
                                                <!--                               role="button"><i class="fa fa-fw fa-refresh"></i> Refresh Data</a>-->
                                            </div>
                                            <!--                        <div class="col-sm-6">-->
                                            <!--                            <div id="" class="dataTables_filter">-->
                                            <!--                                <form action="" method="GET" name="search">-->
                                            <!--                                    <label></label><input type="search" name="keyword" class="form-control input-sm"-->
                                            <!--                                                          placeholder="รหัส QR CODE"></label>-->
                                            <!--                                </form>-->
                                            <!--                            </div>-->
                                            <!--                        </div>-->
                                        </div>



                                        <?php if (!empty($results)) {
                                            foreach ($results as $data) { ?>
                                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

                                                    <div>
                                                        <img
                                                            src="<?php echo base_url(); ?>uploads/qr_image/<?php echo $data->qr_image; ?>"
                                                            class="img-fluid" style="border: 1px solid black;">
                                                    </div>
                                                    <div style="font-size: 10px"><?php
                                                        echo $data->code_generate; ?>
                                                    </div>
                                                </div>


                                            <?php }
//
                                        } ?>

                                        </thead>
                                        </table>

                                    </div>
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                                Total <?php echo $total_rows; ?> entries
                                            </div>
                                        </div>
                                        <!--                    <div class="col-sm-7">-->
                                        <!--                        <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">-->
                                        <!--                            --><?php //echo $link; ?>
                                        <!--                        </div>-->
                                        <!---->
                                        <!--                    </div>-->
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                    </div>
                    </section>
                    <!-- /.content -->
                </div>

            </div>


            </body>
            </html>
        </div>
<!--        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Tarya</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Logout ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">คุณต้องการออกจากระบบ ?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url('logout');?>">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin-panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url();?>assets/admin-panel/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/admin-panel/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>assets/admin-panel/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url();?>assets/admin-panel/js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>

