
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<div class="container">
    <div class="mt-2">
<!--        <div style="font-family: DBHeaventv;font-size: 30px;">น้ำมัน ทายะ</div>-->
        <div class="row">


            <?php foreach ($product as $product) { ?>

                <div class="col-md-6 col-ms-12 col-xs-12" >
                    <div style="font-family: DBHeaventv;">
<!--                        --><?php //echo $product->id; ?>
                        <div><img src="<?php echo base_url('images');?>/<?php echo $product->pic_items; ?>" class="img-fluid"></div>
                    </div>
                    <div style="font-family: DBHeaventv; font-size: 25px;"> <?php echo $product->name; ?></div>
                    <div style="font-family: DBHeaventv; font-size: 22px;"> <?php echo $product->description; ?></div>
                                        <div style="font-family: DBHeaventv; font-size: 20px;"> <?php echo $product->detail; ?></div>
                    <div style="font-family: DBHeaventv; font-size: 30px;"> <?php echo $product->price; ?>.-</div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>