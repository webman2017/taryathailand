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
           
            <div class="card-body">
                รายการสแกนคิวอาร์โค้ดลุ้นโชค
                <div class="table-responsive">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

                    <a href="<?php echo base_url(); ?>qrcode_excel" class="btn btn-success btn-xs" onclick="reload_table()"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Excel</button>
                    </a>
                   <!--  <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="fa fa-refresh" aria-hidden="true"></i></button> -->
                    <br />
                    <br />
<!--                    <a href="--><?php //echo base_url(); ?><!--index.php/Excel_qr/action">-->
<!--                        <button class="btn btn-light"><span><i class="far fa-file-excel"-->
<!--                                                               style="font-size: 30px;"></i></span>-->
<!--                            Excel File-->
<!--                        </button>-->
<!--                    </a>-->
<!--                    <button class="btn btn-success" onclick="add_person()"><i class="fas fa-user-plus"></i> </button>-->
<!--                    <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Re</button>-->

<div>
    <input typ="text" class="form-control">
    </div>
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>ลำดับ</td>
                            <td>รหัส</td>
                            <td>ชื่อ-นามสกุล</td>
                            <td>เบอร์โทรศัพท์</td>
                            <td>จังหวัด</td>
                            <td>อำเภอ</td>
                            <td>รหัสไปรษณีย์</td>
                            <td>วันเวลา</td>
                            <td>สถานะ</td>
<!--                            <td style="width:150px;">Action</td>-->
                        </tr>
                        </thead>
                    </table>

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                    <!-- Logout Modal-->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
<!--                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Logout ?</h5>-->
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body" style="font-family: DBHeaventv;font;font-size: 20px;">คุณต้องการออกจากระบบ ?</div>
                                <div class="modal-footer">
                                    <button class="btn btn-danger" type="button" data-dismiss="modal" style="font-family: DBHeaventv;">Cancel</button>
                                    <a class="btn btn-success" href="<?php echo base_url('logout');?>" style="font-family: DBHeaventv;">Ok</a>
                                </div>
                            </div>
                        </div>
                    </div>

<script type="text/javascript">

    var save_method; //for save method string
    var table;
    var base_url = '<?php echo base_url();?>';

    $(document).ready(function() {

        //datatables
        table = $('#table').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo base_url('QrController/ajax_list')?>",
                "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [ -1 ], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [ -2 ], //2 last column (photo)
                    "orderable": false, //set not orderable
                },
            ],

        });

        //datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,
            orientation: "top auto",
            todayBtn: true,
            todayHighlight: true,
        });

        //set input/textarea/select event when change value, remove class error and remove text help block
        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

    });

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</div>
</div>
<!--<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>-->
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

