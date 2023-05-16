$(document).ready(function() {

  
     var data = {id:"", name:"", mobile: "", status: ""};
   generateOrderTable(data);

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


//  $('#filter-order-no,#order-start-date,#order-end-date').enterKey(function () {
//    var job_id = jQuery('input#filter-order-no').val();
//    var startDate = jQuery('#order-start-date').val();
//    var endDate = jQuery('input#order-end-date').val();
//    var data = {job_id:job_id,startDate:startDate,endDate:endDate};
//    generateOrderTable(data);
// });


 $(document).on('click','#filter-order-filter', function(){
  // alert('xxx');
   var job_id = $('#province').val();
   // alert(job_id);
   var startDate = $('#order-start-date').val();
   var endDate = $('#order-end-date').val();
   // alert(endDate);
   var data = {job_id:job_id,startDate:startDate,endDate:endDate};
   generateOrderTable(data);
});

//  $(document).on('click','#all', function(){
//    var job_id = jQuery('input#filter-order-no').val();
//    var startDate = jQuery('#order-start-date').val();
//    var endDate = jQuery('input#order-end-date').val();
//    var data = {job_id:job_id,startDate:startDate,endDate:endDate};
//    generate_all(data);
// });

//  $(document).on('click','#filter-reject', function(){
//    var job_id = jQuery('input#filter-order-no').val();
//    var startDate = jQuery('#order-start-date').val();
//    var endDate = jQuery('input#order-end-date').val();
//    var data = {job_id:job_id,startDate:startDate,endDate:endDate};
//    generate_reject(data);
// });



//  $(document).on('click','#get_request', function(){

//    var job_id = jQuery('input#filter-order-no').val();
//    var startDate = jQuery('#order-start-date').val();
//    var endDate = jQuery('input#order-end-date').val();
//    var data = {job_id:job_id,startDate:startDate,endDate:endDate};
//    generate_request(data);
// });

//  $(document).on('click','#get_patient', function(){

//    var job_id = jQuery('input#filter-order-no').val();
//    var startDate = jQuery('#order-start-date').val();
//    var endDate = jQuery('input#order-end-date').val();
//    var data = {job_id:job_id,startDate:startDate,endDate:endDate};
//    generateOrderTable(data);
// });


 function generateOrderTable(element){
  
   $('#title').html('รายการที่ทั้งหมด');
   $.ajax({
     url: baseurl+'PromotionController/get_all',
      data: {'job_id' : element.job_id,'name':element.mobile,'mobile':element.mobile,'startDate':element.startDate,'endDate':element.endDate},
     type:"post",
     dataType: 'json',
    beforeSend: function () {
      jQuery('#render-list-of-order').html('<div class="text-center"><i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i></div>');
   },
   success: function (html) {
      var dataTable='<table id="order-datatable" class="table table-bordered table-hover txt" cellspacing="0" width="100%"></table>';
      $('#render-list-of-order').html(dataTable);
      var table = $('#order-datatable').DataTable({
       data: html.data,
       "bPaginate": true,
       "bLengthChange": true,
       "bFilter": false,
       "bInfo": true,
       "bAutoWidth": true,
       "order": [[ 0, "asc" ]],
       columns: [
       { title: "ลำดับ", "width": "8%"},
       { title: "เลขคิวอาร์โค้ด", "width": "8%"},
     { title: "รหัสคิวอาร์โค้ด", "width": "8%"},
     { title: "ชื่อ-นามสกุล", "width": "8%"},
     { title: "อายุ", "width": "8%"},
     { title: "ที่อยู่", "width": "8%"},
     
     { title: "เบอร์โทรศัพท์", "width": "8%"},
     { title: "จังหวัด", "width": "8%"},
     { title: "สแกนเมื่อ", "width": "8%"},
       
        ],
     });
    
   }
});
}















});
// render date datewise
