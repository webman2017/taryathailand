<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>taryathailand</title>
<script src="<?php echo base_url(); ?>assets/jquery.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url();?>/assets/css_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
 <link href="<?php echo base_url();?>/assets/font/stylesheet.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?php echo base_url();?>/assets/css_admin/css/sb-admin-2.min.css" rel="stylesheet">


 <style type="text/css">
th{
  font-family: Mitr;
  font-weight: 400;
  font-size: 16px;
  color:#000;
}

.dataTables_length{
   font-family: Mitr;
   font-weight: 400;
   font-size: 13px;
   color:#000;
   display: none;
}
.dataTables_info{
   font-family: Mitr;
   font-weight: 300;
   font-size: 14px;
   color:#000;

}

.page-item.disabled .page-link{
   color:#000;
   font-size: 13px !important;
   font-family: Mitr;
}

.dataTables_paginate{
  font-weight: 300;
  font-size: 12px;
  color:#000;
}
.page-item.active .page-link {
  font-weight: 300;
  font-size: 12px;
  background-color: #297257;
  border-radius: 10px;
  border-color: #297257;
}
.page-link{
   border:0px solid red !important;
   font-weight: 300;
   font-size: 12px !important;
}






</style>
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
                    

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <form action="<?php echo base_url(); ?>qrcode_excel" method="post" id="form">  
                        <div class="col-xl-12 col-md-6 mb-2">
                            <div class="card  shadow h-100 py-2">
                                <div class="card-body">

                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="title  mb-1">
                                                ค้นหาคิวอาร์โค้ด
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="txt-sm  mb-1">
                                                ตามจังหวัด
                                            </div>
                                                    <select class="form-control txt-sm" id="province" name="province">
                                                        <option>เลือกจังหวัด</option>
                            <?php foreach ($province as $province) {;?>
                    <option value="<?php echo $province['PROVINCE_ID'];?>"><?php echo $province['PROVINCE_NAME'];?>  </option>    
                                                       <?php  };?>
                                                    </select>
                                                </div>

                                                <div class="col-3">
                                                    <div class="txt-sm  mb-1">
                                                วันเดือนปีเริ่ม
                                            </div>
                                                    <input type="text" class="form-control txt-sm" id="order-start-date" name="startDate">
                                                </div>


                                                <div class="col-3">
                                                    <div class="txt-sm  mb-1">
                                                วันเดือนปีสิ้นสุด
                                            </div>
                                                   <input type="text" class="form-control txt-sm" id="order-end-date" name="endDate">
                                                </div>
    <div class="col-12">
                                                  <button class="btn txt-w btn-success" name="filter_order_filter" type="button"
         class="btn btn-vet"
         id="filter-order-filter" value="filter">ค้นหา</button>


 <button type="button" class="btn btn-success btn-xs" id="export_excel"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
                
                                                </div>



                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                           
                        </div>
</form>


                  
                 

                        <!-- Pending Requests Card Example -->
                 
                    </div>


                    <div class="row">


<div class="container">
<div class="card  shadow h-100 py-2">
                                <div class="card-body">
<div class="title">
    รายการคิวอาร์โค้ดทั้งหมดที่ถูกสแกนแล้ว
</div>
   <div  id="render-list-of-order">
   
   </div>
</div>
</div>



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo base_url('assets/');?>/calendar.css">
<script src="<?php echo base_url('assets/');?>/jquery-ui.js"></script>
<script type="text/javascript">
  $(document).ready(function () {


$('#export_excel').click(function(){
var province=$('#province').val();
var end=$('#order-end-date').val();
var start=$('#order-start-date').val();

$('#form').submit();
// $.ajax({
//                 url: "<?php echo base_url(); ?>qrcode_excel",
//                 type: "POST",
//                 data: {'province': province,'end':end,'start':start},
//                 dataType: 'json',
//                 success: function (data) {
                   
//                     $('#loading').css('display', 'none');
//                 },
//                 error: function () {
//                     alert('โหลดไม่สำเร็จ');
//                 }
//             });
});



     $( "#order-start-date,#order-end-date" ).datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: new Date().getFullYear()+':'+new Date().getFullYear(),
      dateFormat: 'yy-mm-dd' ,

   });



     $.fn.enterKey = function(fnc) {
       return this.each(function() {
        $(this).keypress(function(ev) {
         var keycode = (ev.keyCode ? ev.keyCode : ev.which);
         if (keycode == '13') {
          fnc.call(this, ev);
       }
    })
     })
    }




    $('#order-datatable_length').css("display","none");
    $('#example').DataTable({
      "searching": false,
      "paging": true,
      "info": false,
      "lengthChange": false
   });

   

   
 });
</script>
<script src="<?php echo base_url();?>assets/admin-panel/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/admin-panel/vendor/datatables/dataTables.bootstrap4.js"></script>
<script>var baseurl = "<?php echo base_url();?>";</script>
<script src="<?php echo base_url(); ?>assets/common.js"></script>




<!-- new -->











                        <!-- Earnings (Monthly) Card Example -->
                       



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
  


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                   

                   
                   

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url();?>';

    $(document).ready(function() {

    
    });

    

</script>

</div>
</div>
<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
</div>
</div>

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


<!-- Core plugin JavaScript-->



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
                    <a class="btn btn-primary" href="<?php echo base_url('logout');?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

  


   
 
</body>

</html>