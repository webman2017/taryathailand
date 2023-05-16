<!DOCTYPE html>
<html>
<head>
    <title>สร้าง QR CODE สินค้าฟีโอร่า</title>
    <link href=" https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>



<div class="container">
    <div align="center">

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
                        <div class="col-sm-6">
                            <div id="" class="dataTables_filter">
                                <form action="" method="GET" name="search">
                                    <label></label><input type="search" name="keyword" class="form-control input-sm"
                                                          placeholder="รหัส QR CODE"></label>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <?php if (!empty($results)) {
                            foreach ($results as $data) { ?>
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">

                                    <div>
                                        <img
                                            src="http://localhost/QR_FEORA/uploads/qr_image/<?php echo $data->qr_image; ?>"
                                            class="img-responsive" style="border: 1px solid black;">
                                    </div>
                                    <div style="font-size: 10px"> <?php
                                        echo $data->code_generate; ?>
                                    </div>
                                </div>


                            <?php }
//
                        } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">QR CODE
                            Total <?php echo $total_rows; ?> entries
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                            <?php echo $link; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
</div>
</section>
<!-- /.content -->


</div>


</body>
</html>