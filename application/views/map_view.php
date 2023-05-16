
<?php
$user_id=$this->session->userdata('user_id');

if(!$user_id){

    redirect('AdminController/login_view');
}

?>
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
      <!-- Example DataTables Card-->
      <div class="card mb-3">
<!--        <div class="card-header" style="font-family: DBHeaventv;font-size: 22px;">-->
<!--            <i class="fa fa-map-marker"></i> เช็คอินแผนที่</div>-->
        <div class="card-body" style="padding: 2px;!important;">

                  <?php
                  define("API_KEY","AIzaSyB4hFUknS-ndG6VIulHn17-8POBICfcR9w") ?>
                  <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
                  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
                  <title>ตำแหน่งสแกนลุ้นรางวัล</title>
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
                              icon:"https://www.feoraofficial.com/images/ppin.png"
                          });
                          google.maps.event.addListener(marker, 'click', onMarkerClick);
                          markerArray.push(marker); //push local var marker into global array
                      }

                      function createMarkerdealer(latlng){
                          var marker = new google.maps.Marker({
                              position: latlng,
                              map: map,
                              icon:"https://www.feoraofficial.com/images/pinn.png"
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


              </body>
              </html>
          </div>
        </div>
<!--        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<!--    <footer class="sticky-footer">-->
<!--      <div class="container">-->
<!--        <div class="text-center">-->
<!--          <small>Copyright © LevitaThailand.com</small>-->
<!--        </div>-->
<!--      </div>-->
<!--    </footer>-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
<!--            <h5 class="modal-title" id="exampleModalLabel">Ready to Logout ?</h5>-->
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" style="font-family: DBHeaventv;">คุณต้องการออกจากระบบ ?</div>
          <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal" style="font-family:DBHeaventv; ">Cancel</button>
            <a class="btn btn-success" href="<?php echo base_url('logout');?>" style="font-family: DBHeaventv">Logout</a>
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

<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>





<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>







