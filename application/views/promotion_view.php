<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>taryathailand</title>
    <link href="<?php echo base_url();?>/assets/css_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
 <script src="<?php echo base_url('assets/');?>jquery.min.js"></script>
    <link href="<?php echo base_url();?>/assets/css_admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
       <?php $this->load->view('menuleft');?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
           <?php $this->load->view('toolbar');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                  
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                           <div class="row">
      <div class="col-md-12">
         <div class="title_tarya">
                                                รายการโปรโมชั่น
                                            </div>
<div class="float-right mb-1"><a href="javascript:void(0);" class="btn btn-success rounded-pill txt-w btn-sm" data-toggle="modal" data-target="#add_modal"><span class="fa fa-plus"></span>เพิ่มโปรโมชั่น</a></div>
      </div>
   </div>


 <div id="show_data" class="row">
    
   </div>

</div>
<!-- Bootstrap core JavaScript-->

<script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?php echo base_url();?>assets/admin-panel/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url();?>assets/admin-panel/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/admin-panel/vendor/datatables/dataTables.bootstrap4.js"></script>
<!-- Custom scripts for all pages-->

<script src="<?php echo base_url();?>assets/admin-panel/js/sb-admin-datatables.min.js"></script>
</div>





                                                 </div>
                                                </div>



                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                           
                        </div>



                  
                 

                        <!-- Pending Requests Card Example -->
                 
                    </div>

                    <!-- Content Row -->

                    <!-- Content Row -->
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center txt-sm my-auto">
                        <span>ระบบจัดการเว็บไซต์ บริษัท บลูมเน็ตเวิร์ค จำกัด (สำนักงานใหญ่) </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-body text-center txt-sm">
                  <div>
                ยืนยันการออกจากระบบ
              </div>
 <button class="btn btn-danger" type="button" data-dismiss="modal">ยกเลิก</button>
                    <a class="btn btn-success" href="<?php echo base_url('logout');?>">ยืนยัน</a>

              </div>
               
            </div>
        </div>
    </div>

  <!-- add product modal -->
<div class="modal fade" id="add_modal">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-zoom">
     <div class="modal-content">
       <div class="modal-header">
         <div class="modal-tarya">เพิ่มโปรโมชั่น</div>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" id="submit" enctype='multipart/form-data'>

           <div class="form-group txt-sm">
           ชื่อโปรโมชั่น
            <input type="text" name="title" class="form-control" placeholder="ชื่อสินค้า">
         </div>
         <div class="form-group txt-sm">
            รายละเอียด
            <textarea name="detail" rows="3" class="form-control" placeholder="รายละเอียด"></textarea>
         </div>
         <div class="form-group txt-sm">
            เริ่ม
            <input type="text" name="start" class="form-control" placeholder="เริ่ม" id="start">
         </div>
         <div class="form-group txt-sm">
            ถึง
            <input type="text" name="end" class="form-control" placeholder="ถึง" id="end">
         </div>
         <div class="form-group">
          <input type="file" name="file">
       </div>
       <div class="form-group float-left">
          <button type="button" class="btn btn-danger rounded-pill txt-w" data-dismiss="modal">ยกเลิก</button>
       </div>
       <div class="form-group float-right">
        <button class="btn btn-success rounded-pill txt-w id="btn_upload">อัพโหลด</button>
     </div>
  </form>   
</div>
</div>
</div>
</div>
<!-- add product modal -->


<!-- delete product modal -->
<form>
   <div class="modal fade" id="modal_active" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
       <div class="modal-content">
        
       <div class="modal-body text-center">
        <div class="txt-alert mb-4">เปิดใช้งานโปรโมชั่นเรียบร้อย</div>
         <div>
        <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
        <button type="button" class="btn btn-success rounded-pill txt-w" data-dismiss="modal">ตกลง</button>
        
     </div>
     </div>
    
  </div>
</div>
</div>
</form>
<!-- delete product modal -->






<!-- delete product modal -->

   <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
       <div class="modal-content">
        
       <div class="modal-body text-center">
        <div class="txt-alert mb-4">คุณต้องการลบโปรโมชั่นออกจากระบบ?</div>
         <div>
        <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
        <button type="button" class="btn btn-danger rounded-pill txt-w" data-dismiss="modal">ยกเลิก</button>
        <button type="button"  id="btn_delete" class="btn btn-success rounded-pill txt-w">ตกลง</button>
     </div>
     </div>
    
  </div>
</div>
</div>

<!-- delete product modal -->



<div class="modal fade" id="edit_modal">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-zoom">
    <div class="modal-content">
     <div class="modal-header">
      <div class="modal-tarya">แก้ไขโปรโมชั่น</div>
   </div>
   <div class="modal-body">
      <form class="form-horizontal" id="edit_submit" enctype='multipart/form-data'>
       <input type="hidden" name="code" class="form-control" placeholder="code" id="code"> 
       <div class="form-group txt-sm">
         ชื่อโปรโมชั่น
         <input type="text" name="product_name" class="form-control" placeholder="ชื่อสินค้า" id="title">
      </div>
      <div class="form-group txt-sm">
         รายละเอียด
         <textarea rows="3" name="description" class="form-control" placeholder="รายละเอียด" id="description"></textarea>
      </div>
      <div class="form-group txt-sm">
         เริ่ม
         <input type="text" name="startDate" class="form-control" placeholder="วันที่เริ่ม" id="start-date">
      </div>
      <div class="form-group txt-sm">
          ถึง
         <input type="text" name="endDate" class="form-control" placeholder="วีันที่สิ้นสุด" id="end-date">
      </div>
      <div class="form-group">
       <input type="file" name="file">
    </div>
    <div id="img_prd"></div>
    <div class="form-group float-left">
       <button type="button" class="btn btn-danger txt-w rounded-pill" data-dismiss="modal">ยกเลิก</button>
    </div>
    <div class="form-group float-right">
      <button class="btn btn-warning rounded-pill txt-w" id="btn_update" type="button">แก้ไข</button>
   </div>
</form>   
</div>
</div>
</div>
</div>




  <script src="<?php echo base_url();?>assets/admin-panel/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>/assets/css_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>/assets/css_admin/js/sb-admin-2.min.js"></script>

   
 
</body>

</html>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>/calendar.css">
<script src="<?php echo base_url('assets/');?>/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
show_product();
  

$( "#start-date,#end-date,#start,#end" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: new Date().getFullYear()+':'+new Date().getFullYear(),
      dateFormat: 'yy-mm-dd' ,

   });







          function show_product(){
       $.ajax({
        type  : 'ajax',
        url   : '<?php echo site_url('PromotionController/product_data')?>',
        async : false,
        dataType : 'json',
        success : function(data){
         var html = '';
         var i;
         for(i=0; i<data.length; i++){


if(data[i].active=='1'){
var active='<a href="javascript:void(0);" class="btn txt-w rounded-pill btn-success btn-sm item_active" data-product-id="'+data[i].product_id+'">เปิดใช้งาน</a>';
}else{
var active='<a href="javascript:void(0);" class="btn txt-w rounded-pill btn-secondary btn-sm item_active" data-product-id="'+data[i].product_id+'">ปิด</a>';
}

            html += '<div class="col-lg-3 col-sm-6 col-12 mb-2">'+
            '<div><img src="<?php echo site_url('resource/images/');?>'+data[i].product_image+'" class="img-fluid"></div>'+
          // '<div >'+data[i].product_id+'</div>'+
          '<div style="font-family:Mitr;font-weight:400;font-size:18px;">'+data[i].product_name+'</div>'+
          '<div style="font-size:13px;font-family:Mitr;font-weight:300;">'+data[i].description+'</div>'+
          '<div style="font-size:13px;font-family:Mitr;font-weight:300;">'+'ระยะเวลา'+'</div>'+
     
          '<div>'+
          '<a href="javascript:void(0);" class="btn btn-warning rounded-pill txt-w btn-sm item_edit" data-id="'+data[i].product_id+'" data-product-name="'+data[i].product_name+'" data-price="'+data[i].product_price+'" data-description="'+data[i].description+'" data-image="'+data[i].product_image+'" data-start="'+data[i].start+'" data-end="'+data[i].end+'">แก้ไข</a>'+' '+
          '<a href="javascript:void(0);" class="btn txt-w rounded-pill btn-danger btn-sm item_delete" data-product-id="'+data[i].product_id+'">ลบ</a>'+
           active+
          '</div>'+
          '</div>';
       }
       $('#show_data').html(html);
    }

 });
    }

    $('#submit').submit(function(e){
      e.preventDefault(); 
      $.ajax({
         url:'<?php echo base_url();?>/PromotionController/do_upload',
         type:"post",
                   data:new FormData($('#submit')[0]), //this is formData
                   processData:false,
                   contentType:false,
                   cache:false,
                   async:false,
                   success: function(data){
                     $('#submit')[0].reset();
                      // alert("Upload Image Successful.");
                      $('#add_modal').modal('hide');
                     show_product();
                   }
                });
   });


     //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
         var product_code = $(this).data('product-id');

         $('#modal_delete').modal('show');
         $('[name="product_code_delete"]').val(product_code);
      });







  $('#btn_delete').on('click',function(){
         var product_code = $('#product_code_delete').val();
         $.ajax({
          type : "POST",
          url  : "<?php echo base_url('PromotionController/delete_product')?>",
          dataType : "JSON",
          data : {product_code:product_code},
          success: function(response){

             if (response.success) {
              // alert('ok');
              $('#modal_delete').modal('hide');
              show_product();
           }
        }
     });
      });


     $('#show_data').on('click','.item_edit',function(){
         var title = $(this).data('product-name');
         var code = $(this).data('id');
         var description = $(this).data('description');
         var price = $(this).data('price');
         var prd_img=$(this).data('image');
         var start=$(this).data('start');
var end=$(this).data('end');
         $('#edit_modal').modal('show');
         $('#title').val(title);
         $('[name="code"]').val(code);
         $('#description').val(description);
         $('#price').val(price);
          $('#start-date').val(start);
          $('#end-date').val(end);
         // $('#img_prd').html('xzxzxzxz');
         $('#img_prd').html('<img src="<?php echo base_url('resource/images/');?>'+prd_img+'" width=80px;>');
      });

 $('#show_data').on('click','.item_active',function(){
         
         var code = $(this).data('product-id');
       
        $.ajax({
          type : "POST",
          url  : "<?php echo base_url('PromotionController/openactive')?>",
          dataType : "JSON",
          data : {code:code},
          success: function(response){

             if (response.success) {
              
            $('#modal_active').modal('show');
              show_product();
           }
        }
     });

       
      });





     // update product
$('#btn_update').click(function(e){
   var formData = new FormData($('#edit_submit')[0]);
   var product_code = $('#code').val();
   $.ajax({
      url:'<?php echo base_url();?>/PromotionController/update_product/'+product_code,
      type:"post",
                   data:formData, //this is formData
                   processData:false,
                   contentType:false,
                   cache:false,
                   async:false,
                   success: function(data){

                     // alert("Upload Image Successful.");
                     $('#edit_modal').modal('hide');
                     $('#edit_submit')[0].reset();
                     show_product();
                  }
               });
});
// update product




      });
</script>