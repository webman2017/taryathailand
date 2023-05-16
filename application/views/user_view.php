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
        <div class="card mb-3">
            
            <div class="card-body">
<div>
    ผู้ใช้งานระบบ
</div>
                <div class="table-responsive">

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
                    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">

                    <button class="btn btn-success" onclick="add_person()">เพิ่มผู้ใช้งาน</button>
                   
                    <br />
                    <br />
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <td>ลำดับ</td>
                            <td>ชื่อผู้ใช้</td>
                            <td>อีเมล</td>
<!--                           <td>รหัสผ่าน</td>-->
                            <td style="width:150px;">จัดการ</td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                                    "url": "<?php echo base_url('UserController/ajax_list')?>",
                                    "type": "POST"
                                },

                                //Set column definition initialisation properties.
                                "columnDefs": [
                                    {
                                        "targets": [ -1 ], //last column
                                        "orderable": true, //set not orderable
                                    },
                                    {
                                        "targets": [ -2 ], //2 last column (photo)
                                        "orderable": true, //set not orderable
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



                        function add_person()
                        {
                            save_method = 'add';
                            $('#form')[0].reset(); // reset form on modals
                            $('.form-group').removeClass('has-error'); // clear error class
                            $('.help-block').empty(); // clear error string
                            $('#modal_form').modal('show'); // show bootstrap modal
//                      $('.modal-title').text('Add Person'); // Set Title to Bootstrap modal title

                            $('#photo-preview').hide(); // hide photo preview modal

                            $('#label-photo').text('Upload Photo'); // label photo upload
                        }

                        function edit_person(id)
                        {
                            save_method = 'update';
                            $('#form')[0].reset(); // reset form on modals
                            $('.form-group').removeClass('has-error'); // clear error class
                            $('.help-block').empty(); // clear error string


                            //Ajax Load data from ajax
                            $.ajax({
                                url : "<?php echo base_url('UserController/ajax_edit')?>/" + id,
                                type: "GET",
                                dataType: "JSON",
                                success: function(data)
                                {

                                    $('[name="id"]').val(data.user_id);
                                    $('[name="user_name"]').val(data.user_name);
                                    $('[name="user_password"]').val(data.user_password);
                                    $('[name="user_email"]').val(data.user_email);
//                              $('[name="address"]').val(data.address);
//                              $('[name="dob"]').datepicker('update',data.dob);
                                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                                    $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title

                                    $('#photo-preview').show(); // show photo preview modal

//                                    if(data.pic_items)
//                                    {
//                                        $('#label-photo').text('Change Photo'); // label photo upload
//                                        $('#photo-preview div').html('<img src="'+base_url+'images/'+data.pic_items+'" class="img-fluid">'); // show photo
//                                        $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.photo+'"/> Remove photo when saving'); // remove photo
//
//                                    }
//                                    else
//                                    {
//                                        $('#label-photo').text('Upload Photo'); // label photo upload
//                                        $('#photo-preview div').text('(No photo)');
//                                    }


                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error get data from ajax');
                                }
                            });
                        }

                        function reload_table()
                        {
                            table.ajax.reload(null,false); //reload datatable ajax
                        }

                        function save()
                        {
                            $('#btnSave').text('saving...'); //change button text
                            $('#btnSave').attr('disabled',true); //set button disable
                            var url;

                            if(save_method == 'add') {
                                url = "<?php echo base_url('UserController/ajax_add')?>";
                            } else {
                                url = "<?php echo base_url('UserController/ajax_update')?>";
                            }

                            // ajax adding data to database

                            var formData = new FormData($('#form')[0]);
                            $.ajax({
                                url : url,
                                type: "POST",
                                data: formData,
                                contentType: false,
                                processData: false,
                                dataType: "JSON",
                                success: function(data)
                                {

                                    if(data.status) //if success close modal and reload ajax table
                                    {
                                        $('#modal_form').modal('hide');
                                        reload_table();
                                    }
                                    else
                                    {
                                        for (var i = 0; i < data.inputerror.length; i++)
                                        {
                                            $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                                            $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                                        }
                                    }
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled',false); //set button enable


                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    alert('Error adding / update data');
                                    $('#btnSave').text('save'); //change button text
                                    $('#btnSave').attr('disabled',false); //set button enable

                                }
                            });
                        }

                        function delete_person(id)
                        {
                            if(confirm('Are you sure delete this data?'))
                            {
                                // ajax delete data to database
                                $.ajax({
                                    url : "<?php echo base_url('UserController/ajax_delete')?>/"+id,
                                    type: "POST",
                                    dataType: "JSON",
                                    success: function(data)
                                    {
                                        //if success reload ajax table
                                        $('#modal_form').modal('hide');
                                        reload_table();
                                    },
                                    error: function (jqXHR, textStatus, errorThrown)
                                    {
                                        alert('Error deleting data');
                                    }
                                });

                            }
                        }

                    </script>

                    <!-- Bootstrap modal -->
                    <div class="modal fade" id="modal_form" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <!--                              <h3 class="modal-title">Person Form</h3>-->
                                </div>
                                <div class="modal-body form">
                                    <form action="#" id="form" class="form-horizontal">
                                        <input type="hidden" value="" name="id"/>
                                        <div class="form-body">
                                            <div class="form-group">
                                                <label class="control-label col-md-3" style="font-family: DBHeaventv;">ชื่อผู้ใช้</label>
                                                <div class="col-md-9">
                                                    <input name="user_name" placeholder="ระบุชื่อผู้ใข้" class="form-control" type="text" style="font-family: DBHeaventv;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" style="font-family: DBHeaventv;">รหัสผ่าน</label>
                                                <div class="col-md-9">
                                                    <input name="user_password" placeholder="รหัสผ่าน" class="form-control" type="text" style="font-family: DBHeaventv;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" style="font-family: DBHeaventv;">รหัสผ่านใหม่</label>
                                                <div class="col-md-9">
                                                    <input name="user_password_new" placeholder="รหัสผ่าน" class="form-control" type="text" style="font-family: DBHeaventv;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" style="font-family: DBHeaventv;">อีเมล</label>
                                                <div class="col-md-9">
                                                    <input name="user_email" placeholder="อีเมล" class="form-control" type="text" style="font-family: DBHeaventv;">
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3" style="font-family: DBHeaventv;">ระดับ</label>
                                                <div class="col-md-9">
                                                    <select name="gender" class="form-control" style="font-family: DBHeaventv;">
                                                        <option value="">กรุณาเลือกระดับ</option>
                                                        <option value="male">Super Admin</option>
                                                        <option value="female">Admin</option>
                                                    </select>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>



<!--                                            <div class="form-group">-->
<!--                                                <label class="control-label col-md-3">Date of Birth</label>-->
<!--                                                <div class="col-md-9">-->
<!--                                                    <input name="dob" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">-->
<!--                                                    <span class="help-block"></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="form-group" id="photo-preview">-->
<!--                                                <label class="control-label col-md-3">Photo</label>-->
<!--                                                <div class="col-md-9">-->
<!--                                                    (No photo)-->
<!--                                                    <span class="help-block"></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="form-group">-->
<!--                                                <label class="control-label col-md-3" id="label-photo" style="font-family: DBHeaventv;">รูปสินค้า </label>-->
<!--                                                <div class="col-md-9">-->
<!--                                                    <input name="photo" type="file">-->
<!--                                                    <span class="help-block"></span>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-family: DBHeaventv;">ยกเลิก</button>
                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-success" style="font-family: DBHeaventv;">บันทึก</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                    <!-- End Bootstrap modal -->

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
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>







