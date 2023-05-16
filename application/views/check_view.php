<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8">
    <title>ชิงโชค</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link href="<?php echo base_url();?>/assets/font/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery/jquery.min.js"></script>
     
</head>
<body>

<div class="col-12 col-md-6 mx-auto">
    <?php
    if ($getDealer[0]['status'] == 0) { ?>
        <div class="justify-content-center">
     <div class="row">
            <img src="<?php echo base_url('resource/images/');?><?php echo $promotion->product_image;?>" class="img-fluid">
</div>
            <form id="c" name="c" method="post"
                  action="<?php echo base_url('/Qr/c_update'); ?>" enctype="multipart/form-data">
                <div>
                    <input type="hidden" name="time" value="1">
                    <input type="hidden" name="scan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="id" value="<?php echo $getDealer[0]['id']; ?>">
                </div>
                <div class="title text-center">
                    *รหัสสินค้า
                </div>
                <div class="form-group">
                    
                        <input type="text" name="name" class="form-control title rounded-pill text-center"
                               value="<?php echo $getDealer[0]['code_generate']; ?>"
                               
                               readonly>
                    
                </div>
                <div class="form-group">
                    <div style="text-align: center;">
                        <a href="<?php echo base_url(); ?>/Qr/c_update/<?php echo $getDealer[0]['code_generate']; ?>">
                            <button type="submit" name="button" class="btn btn-success text-white title btn-block"
                                    >
                            ร่วมลุ้นรางวัล</button>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php } else {
    ?>
<div class="col-12 col-md-6 mx-auto text-center">
    <div>
        <img src="<?php echo base_url(); ?>images/danger.jpg" class="img-fluid">
    </div>
    <div class="txt-sm">
        สินค้าชิ้นนี้ถูกร่วมลุ้นรางวัลไปแล้ว
    </div>
    <div class="form-group">
        <div style="text-align: center">
            <a href="#" class="btn btn-lg btn-success txt-w">ติดตามประกาศผลรางวัล</a>
        </div>
    </div>
</div>
</div>
</body>
<?php
}
?>
</body>
</html>