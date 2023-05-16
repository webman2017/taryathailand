<html>
<head>
    <html lang="en">
    <meta charset="UTF-8">
    <title>ชิงโชค</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="<?php echo base_url();?>/assets/font/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
     <script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>/assets/font/js/bootstrap.min.js"></script>
    <script async defer
            src="https://maps.google.com/maps/api/js?key=AIzaSyB4hFUknS-ndG6VIulHn17-8POBICfcR9w&callback=map_canvas"></script>
    <style type="text/css">
        #map_canvas {
            width: 100%;
            height: 250px;
            display: none;
        }
    </style>
</head>
<body style="font-family: Prompt">
<div id="map_canvas"></div>
<!--<div class="container ">-->

<div class="col-12 col-md-6 mx-auto">
    
    <div id="showDD">

        <form id="form_get_detailMap" name="form_get_detailMap" method="post"
              action="<?php echo base_url('index.php/Qr/update'); ?>" enctype="multipart/form-data">
            <input type="hidden" name="code" class="form-control" value="<?php echo $getDealer[0]['code_generate']; ?>">
            <input type="hidden" name="id" class="form-control" value="<?php echo $getDealer[0]['id']; ?>">
            <input type="hidden" name="status" class="form-control" value="1">
            <input type="hidden" name="time" class="form-control" value="2">

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <input name="lat_value" type="hidden" id="lat_value" value="0" class="form-control" readonly/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="date" class="form-control" required="required"
                               value="<?php echo date('Y-m-d H:i:s'); ?>">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                    <div class="form-group">
                        <input name="lon_value" type="hidden" id="lon_value" value="0" class="form-control" readonly/>
                    </div>
                    <input name="zoom_value" type="hidden" id="zoom_value" value="0" size="5" class="form-control"
                           readonly/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">
                    <div class="txt-sm"> ชื่อ-นามสกุล</div>

                    <input type="text" name="name" class="form-control txt-sm" required="required"
                             placeholder="ระบุชื่อ-นามสกุล">
                </div>
            </div>
 <div class="row">
             <div class="col-12" >
                    <div class="txt-sm">
                        เพศ</div>
                    <select name="gender" class="form-control txt-sm" required="required">
                         <option value="">เลือกเพศ</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                    </select>

                </div>
            </div>
            <div class="row">
             <div class="col-12" >
                    <div class="txt-sm">
                        อายุ</div>
                    <input type="text" name="age" class="form-control txt-sm" required="required">

                </div>
            </div>
             
            
            <div class="row">
                <div class="col-12">
                    <div class="txt-sm">
                    เบอร์โทรศัพท์</div>
                    <input type="number" name="mobile" class="form-control txt-sm" required="required"
                           placeholder="ระบุเบอร์โทรศัพท์">
                </div>
                </div>
                     <div class="row">
             <div class="col-12" >
                    <div class="txt-sm">
                        บ้านเลขที่/ หมู่/ซอย/ถนน</div>
                    <input type="text" name="address" class="form-control txt-sm" required="required">

                </div>
           
                
                
                <div class="col-12">

                        <div class="txt-sm">
                        จังหวัด
                            </div>
                        <select name="province" class="form-control txt-sm" required="required" id="province"
                                >
                            <option value="">เลือกจังหวัด</option>
                            <?php foreach ($province as $pro) { ?>
                                <option value="<?php echo $pro['PROVINCE_ID']; ?>"
                                        value="<?php echo set_value('name'); ?>"><?php echo $pro['PROVINCE_NAME']; ?></option>
                            <?php } ?>
                        </select>

                </div>
                <div class="col-12">

                    <div class="txt-sm">
                        อำเภอ</div>
 
                    <select class="form-control txt-sm" name="amphur" id="amphure" disabled=""
                            required="required">
                        <option value="">เลือกอำเภอ</option>
                    </select>
                </div>
  <div class="col-12">

                    <div class="txt-sm">
                        ตำบล</div>
 
                    <select class="form-control txt-sm" name="taboon" id="taboon" disabled=""
                            required="required">
                        <option value="">เลือกตำบล</option>
                    </select>
                </div>


                <div class="col-12">
                    <div class="txt-sm">
                        ไปรษณีย์</div>
                    <input type="number" name="zipcode" class="form-control txt-sm" required="required"
                            placeholder="ระบุรหัสไปรษณีย์">
                </div>

               
            </div>
            


                <button class="btn mt-2 btn-success btn-block title text-white"/>
                ร่วมลุ้นรางวัล
            </button>

            
        </form>
    </div>
</div>


</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>/assets/js/script.js"></script>



<script type="text/javascript">
    $('#province').on('change', function () {
        $('#loading').css('display', 'block');
        var province = $(this).val();
        if (province == '') {
            $('#amphure').prop('disabled', true);
        }
        else {
            $('#amphure').prop('disabled', false);
            $.ajax({
                url: "<?php echo base_url() ?>DealerController/get_amphur",
                type: "POST",
                data: {'province': province},
                dataType: 'json',
                success: function (data) {
                    $('#amphure').html(data);
                    $('#loading').css('display', 'none');
                },
                error: function () {
                    alert('โหลดไม่สำเร็จ');
                }
            });
        }
    });

    $('#amphure').on('change', function () {
   $('#loading').css('display', 'block');
   var amphure = $(this).val();
   if (amphure == '') {
      $('#taboon').prop('disabled', true);
   }
   else {
      $('#taboon').prop('disabled', false);
      $.ajax({
         url: "<?php echo base_url() ?>DealerController/get_taboon",
         type: "POST",
         data: {'amphure': amphure},
         dataType: 'json',
         success: function (data) {
            $('#taboon').html(data);
            $('#loading').css('display', 'none');
         }
         // ,
         // error: function () {
         //    alert('โหลดไม่สำเร็จ');
         // }
      });
   }
});
</script>


</html>