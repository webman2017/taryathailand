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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                                                ตำแหน่งคิวอาร์
                                            </div>

      </div>
   </div>


 <div  class="row">
            <?php
                  define("API_KEY","AIzaSyB4hFUknS-ndG6VIulHn17-8POBICfcR9w") ?>
               
                  <script
                      src="https://maps.googleapis.com/maps/api/js?key=<?php echo API_KEY; ?>&callback=initMap"
                      async defer></script>
                  <script type="text/javascript">
                      <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
                      <link href="<?php echo base_url('assets/css/style.css') ?>" rel="stylesheet">
                      <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
                  <script type="text/javascript">

                      //create an array to store lat n lon
                      var lat= [];
                      var lon= [];
                      var sta=[];
                      var x=0;    //to store index for looping
                      var map = null; //create a map and define it's value to null
                      var markerArray = []; //create a global array to store markers
                      var infowindow; //create infowindow to show marker information

                      //looping for getting value from database using php
                      <?php foreach($latlong as $row): ?>
                      lat.push(<?php echo $row['lat']; ?>);
                      lon.push(<?php echo $row['long']; ?>);
                      sta.push(<?php echo $row['status']; ?>);

                      x++;
                      <?php endforeach; ?>


                      function initialize() {
                          //set center from the map
                          var myOptions = {
                              zoom: 6,
//                center: new google.maps.LatLng(lat[0], lon[0]),
                              center: {lat: 13.826196, lng: 100.566021},
                              mapTypeControl: true,
                              mapTypeControlOptions: {
                                  style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                              },
                              navigationControl: true,
                              mapTypeId: google.maps.MapTypeId.ROADMAP
                          }
                          //make a new map
                          map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

                          //define value and size for infowindow
                          infowindow = new google.maps.InfoWindow({
                              size: new google.maps.Size(150, 50)
                          });

                          //add eventlistener click to the map
                          google.maps.event.addListener(map, 'click', function() {
                              infowindow.close();
                          });

                          // Add markers to the map
                          // Set up markers based on the number of elements within the array from database
                          for (var i = 0; i < x; i++) {

                              if(sta[i]){
                                  createMarker(new google.maps.LatLng(lat[i], lon[i]));
                              }else{
                                  createMarkerdealer(new google.maps.LatLng(lat[i], lon[i]));
                              }

                          }

                      }

                      //create a function that will open infowindow when a marker is clicked
                      var onMarkerClick = function() {
                          var marker = this;
                          var latLng = marker.getPosition();
                          infowindow.setContent('ตำแหน่งสแกน' + latLng.lat() + ', ' + latLng.lng());
                          infowindow.open(map, marker);
                      };


                      function createMarker(latlng){
                          var marker = new google.maps.Marker({
                              position: latlng,
                              map: map,
                              // icon
                          });
                          google.maps.event.addListener(marker, 'click', onMarkerClick);
                          markerArray.push(marker); //push local var marker into global array
                      }

                      function createMarkerdealer(latlng){
                          var marker = new google.maps.Marker({
                              position: latlng,
                              map: map,
                              // icon
                          });
                          google.maps.event.addListener(marker, 'click', onMarkerClick);
                          markerArray.push(marker); //push local var marker into global array
                      }



                      window.onload = initialize;

                  </script>
                  <style type="text/css">
                      #map_canvas {
                          width: 100%;
                          height: 800px;
                      }

                  </style>
              </head>
              <body>

                  <div id="map_canvas"></div>
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
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom">
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
            ระยะเวลา
            <input type="text" name="price" class="form-control" placeholder="ราคา" id="price">
         </div>
         <div class="form-group">
          <input type="file" name="file">
       </div>
       <div class="form-group float-left">
          <button type="button" class="btn btn-danger txt-w" data-dismiss="modal">ยกเลิก</button>
       </div>
       <div class="form-group float-right">
        <button class="btn btn-success txt-w id="btn_upload">อัพโหลด</button>
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
   <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-zoom">
    <div class="modal-content">
     <div class="modal-header">
      <h4>แก้ไขสินค้า</h4>
   </div>
   <div class="modal-body">
      <form class="form-horizontal" id="edit_submit" enctype='multipart/form-data'>
       <input type="hidden" name="code" class="form-control" placeholder="code" id="code"> 
       <div class="form-group">
         ชื่อสินค้า
         <input type="text" name="product_name" class="form-control" placeholder="ชื่อสินค้า" id="title">
      </div>
      <div class="form-group">
         รายละเอียด
         <textarea rows="5" name="description" class="form-control" placeholder="รายละเอียด" id="description"></textarea>
      </div>
      <div class="form-group">
         ราคา
         <input type="text" name="price" class="form-control" placeholder="ราคา" id="price">
      </div>
      <div class="form-group">
       <input type="file" name="file">
    </div>
    <div id="img_prd"></div>
    <div class="form-group float-left">
       <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
    </div>
    <div class="form-group float-right">
      <button class="btn btn-warning" id="btn_update" type="button">แก้ไข</button>
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
show_product();
  








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
            html += '<div class="col-lg-3 col-sm-6 col-12 mb-2">'+
            '<div><img src="<?php echo site_url('resource/images/');?>'+data[i].product_image+'" class="img-fluid"></div>'+
          // '<div >'+data[i].product_id+'</div>'+
          '<div style="font-family:Mitr;font-weight:400;font-size:18px;">'+data[i].product_name+'</div>'+
          '<div style="font-size:13px;font-family:Mitr;font-weight:300;">'+data[i].description+'</div>'+
          '<div style="font-size:13px;font-family:Mitr;font-weight:300;">'+'ระยะเวลา'+'</div>'+
     
          '<div>'+
          '<a href="javascript:void(0);" class="btn btn-warning rounded-pill txt-w btn-sm item_edit" data-id="'+data[i].product_id+'" data-product-name="'+data[i].product_name+'" data-price="'+data[i].product_price+'" data-description="'+data[i].description+'" data-image="'+data[i].product_image+'">แก้ไข</a>'+' '+
          '<a href="javascript:void(0);" class="btn txt-w rounded-pill btn-danger btn-sm item_delete" data-product-id="'+data[i].product_id+'">ลบ</a>'+
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
         var prd_img=$(this).data('image')

         $('#edit_modal').modal('show');
         $('#title').val(title);
         $('[name="code"]').val(code);
         $('#description').val(description);
         $('#price').val(price);
         // $('#img_prd').html('xzxzxzxz');
         $('#img_prd').html('<img src="<?php echo base_url('resource/images/');?>'+prd_img+'" width=80px;>');
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