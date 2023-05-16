<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>taryathailand</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>/assets/css_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  
 <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
    <!-- Custom styles for this template-->
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    

                

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            

  
                                            

                                           <div class="row">
      <div class="col-md-12">
         <div class="title_tarya">
                                                จัดการผู้ใช้งาน
                                            </div>
<div class="float-right mb-1"><a href="javascript:void(0);" class="btn btn-success rounded-pill txt-w btn-sm" data-toggle="modal" data-target="#add_modal"><span class="fa fa-plus"></span>เพิ่มโผู้ใช้งาน</a></div>
      </div>
   </div>


       
      </div>
      <table class="table txt-sm">
       <thead>
        <tr>
         <th>no</th>
         <th>username</th>
         <th style="text-align: right;">แก้ไข/ลบ</th>
      </tr>
   </thead>
   <tbody id="show_data">
   </tbody>
</table>

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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
            <input type="text" name="username" class="form-control" placeholder="username">
         </div>
         <div class="form-group txt-sm">
            password
            <input type="text" name="password" class="form-control" placeholder="password">
         </div>
         
       
       <div class="form-group float-left">
          <button type="button" class="btn btn-danger rounded-pill txt-w" data-dismiss="modal">ยกเลิก</button>
       </div>
       <div class="form-group float-right">
        <button class="btn btn-success rounded-pill txt-w id="btn_upload">บันทึก</button>
     </div>
  </form>   
</div>
</div>
</div>
</div>
<!-- add product modal -->

<!-- delete product modal -->
<form>
   <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-dialog-zoom" role="document">
       <div class="modal-content">
        
       <div class="modal-body text-center">
        <div class="txt-alert mb-4">คุณต้องการลบโปรโมชั่นออกจากระบบ?</div>
         <div>
        <input type="hidden" name="product_code_delete" id="product_code_delete" class="form-control">
        <button type="button" class="btn btn-danger rounded-pill txt-w" data-dismiss="modal">ยกเลิก</button>
        <button type="button" type="submit" id="btn_delete" class="btn btn-success rounded-pill txt-w">ตกลง</button>
     </div>
     </div>
    
  </div>
</div>
</div>
</form>
<!-- delete product modal -->



<div class="modal fade" id="edit_modal">
   <div class="modal-dialog  modal-dialog-centered modal-dialog-zoom">
    <div class="modal-content">
     <div class="modal-header">
      <div class="modal-tarya">แก้ไขผู้ใช้งาน</div>
   </div>
   <div class="modal-body">
      <form class="form-horizontal" id="edit_submit" enctype='multipart/form-data'>
       <input type="hidden" name="code" class="form-control" placeholder="code" id="code"> 
       <div class="form-group txt-sm">
         username
         <input type="text" name="username" class="form-control" placeholder="username" id="username">
      </div>
      <div class="form-group txt-sm">
         password
         <input type="password" name="password" class="form-control" placeholder="password" id="title">
      </div>
     
     

    <div class="form-group float-left">
       <button type="button" class="btn btn-danger txt-w rounded-pill" data-dismiss="modal">ยกเลิก</button>
    </div>
    <div class="form-group float-right">
      <button class="btn btn-success rounded-pill txt-w" id="btn_update" type="button">บันทึก</button>
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
<script type="text/javascript">
   $(document).ready(function(){
      show();

      function show(){
          show_product();   //call function show all product
          $('#mydata').dataTable({
            // "aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
         // "iDisplayLength": 5
         "pageLength": 10,
         "lengthChange": false,
      });
       }

      //function show all product
      function show_product(){
       $.ajax({
        type  : 'ajax',
        url   : '<?php echo site_url('PromotionController/category_data')?>',
        async : false,
        dataType : 'json',
        success : function(data){
         var html = '';
         var i;
         var no=1;
         for(i=0; i<data.length; i++){
          html += '<tr>'+
          '<td>'+no+'</td>'+
          '<td>'+data[i].user_name+'</td>'+
          '<td style="text-align:right;">'+
          '<a href="javascript:void(0);" class="btn btn-warning btn-sm item_edit" data-id="'+data[i].user_id+'" data-product-name="'+data[i].user_name+'"><i class="fa fa-pencil" aria-hidden="true"></i>แก้ไข</a>'+' '+
          '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product-id="'+data[i].user_id+'"><i class="fa fa-remove" aria-hidden="true"></i>ลบ</a>'+
          '</td>'+
          '</tr>';
          no++;
       }
       $('#show_data').html(html);
    }

 });
    }

    $('#submit').submit(function(e){
      e.preventDefault(); 
      $.ajax({
         url:'<?php echo base_url();?>/PromotionController/save_user',
         type:"post",
                   data:new FormData(this), //this is formData
                   processData:false,
                   contentType:false,
                   cache:false,
                   async:false,
                   success: function(response){
                     $('#submit')[0].reset();
                     $('#add_modal').modal('hide');
                     show();
                  }
               });
   });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
         var product_code = $(this).data('product-id');

         $('#Modal_Delete').modal('show');
         $('[name="product_code_delete"]').val(product_code);
      });

        //delete record to database
        $('#btn_delete').on('click',function(){
         var product_code = $('#product_code_delete').val();
         $.ajax({
          type : "POST",
          url  : "<?php echo base_url('Upload_controller/delete_category')?>",
          dataType : "JSON",
          data : {product_code:product_code},
          success: function(data){
           $('#Modal_Delete').modal('hide');
           show_product();
           return true;
        }
     });
         // return false;
      });
        $('#show_data').on('click','.item_edit',function(){
         var title = $(this).data('product-name');
         var code = $(this).data('id');
         $('#edit_modal').modal('show');
         $('#payment_name').val(title);
         $('[name="code"]').val(code);
      });


     //update record to database
     $('#btn_update').on('click',function(){
      var product_code = $('#code').val();
      var payment_name = $('#payment_name').val();
      $.ajax({
        type : "POST",
        url  : "<?php echo base_url('Upload_controller/update_category')?>",
        dataType : "JSON",
        data : {product_code:product_code , payment_name:payment_name},
        success: function(data){

           $('#edit_modal').modal('hide');
           show();
        }
     });
   });

  });

</script>