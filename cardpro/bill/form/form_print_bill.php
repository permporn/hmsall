<?
session_start();
include("../ck_session.php");
include('../config/config_db_self.php');
?>
<script type="text/javascript">
$('table#datatable').DataTable( {
    "dom": 'Bfrtip',
    "lengthMenu" : [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ],
    "buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
    "iDisplayLength": 10,
    "order": [[ 0, "desc" ]]
});
$(function() {
var id = $("#id").val();
var type_ = $("#type_").val();
var test = $('#test').val();

$('.payment-hidden').hide();
//$('.bill-hidden').hide();
$('.bill_small').hide();
$('.bill-show').hide();
$("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
// $.ajax({
//     type: "GET",
//     url: "form/form_bill_full.php",
//     data: {id_bill : id , type_ : type_} ,
//     success: function(data){
//          $(".header").hide();
//          $("#payment").html(data);
//     } 
// });
if(test != ''){
  console.log('test');
  $.ajax({
      type: "GET",
      url: "form/form_bill_full_test.php",
      data: {id_bill : id , type : type_},
      success: function(data){
          //console.log(data);
           $(".header").hide();
           $("#bill_full").html(data);
           $("#loading").hide();
      } 
  }); 
}else{
  $.ajax({
      type: "GET",
      url: "form/form_bill_small.php",
      data: {id_bill : id , type : type_},
      success: function(data){
          //console.log(data);
           $(".header").hide();
           $("#bill_small").html(data);
      } 
  });
  $.ajax({
      type: "GET",
      url: "form/form_bill_full.php",
      data: {id_bill : id , type : type_},
      success: function(data){
          //console.log(data);
           $(".header").hide();
           $("#bill_full").html(data);
           $("#loading").hide();
      } 
  });  
}

$('.payment-hidden').click(function(){
  $('.bill_small').hide();
  $('.payment-hidden').hide();
  $('.payment-show').show();
});
$('.payment-show').click(function(){
  $('.bill_small').show();
  $('.payment-hidden').show();
  $('.payment-show').hide();
});
$('.bill-hidden').click(function(){
  $('.bill_full').hide();
  $('.bill-hidden').hide();
  $('.bill-show').show();
});
$('.bill-show').click(function(){
  $('.bill_full').show();
  $('.bill-hidden').show();
  $('.bill-show').hide();
});

$('.close_pay').click(function(){
  $.ajax({
      type: "POST",
      url: "form/form_data_pay.php",
      data: {},
      success: function(data){
          //console.log(data);
          $("#data-table").html(data);
          $(".header").show();
          $('.form-saerch').hide();
          $('.subject_self').hide();
          $('.term_self').hide();
          $('.quantity').hide(); 
          $('.set_pay').show();
          $('.form-gen').show();
          $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
      } 
  });
});
});
</script>
<style> 
/*.imageupload {
    margin: 20px 0;
}*/
/*#printable { display: block; }

/*@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} */
.borderless tr, .borderless td, .borderless th {
    border: none !important;
}

body {
  /*background: rgb(204,204,204);*/
}
page {
  /*background: white;*/
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  /*box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);*/
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
  padding-right: 40px
}
page[size="A4-1/2"] {  
  width: 21cm;
  height: 13cm; 
  padding-right: 40px
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="portrait"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="portrait"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  #non-printable { display: none; } 
  #printable { display: block; } 
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}

</style>
<input type="hidden" name="id" id="id" value="<?=$_GET['id_bill']?>" />
<input type="hidden" name="type_" id="type_" value="<?=$_GET['type_']?>" />
<input type="hidden" name="test" id="test" value="<?=$_GET['test']?>" />
<?php 
  $header_title = $_GET['type_']; 
  if($header_title == 1){
      $header_title = "ใบแจ้งชำระเงิน";
  }else if($header_title == 2){
    $header_title = "ใบเสร็จรับเงิน";
  }
?>
<div id="non-printable">
  <h3 class="panel-title pull-life col-sm-6"></h3>
  <div class="col-md-6" align="left">
  <button type="button" class="btn btn-warning payment-hidden" name="payment-hidden">
    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> ซ่อน<?=$header_title?> (ฉบับย่อ)</button>
  <button type="button" class="btn btn-info payment-show" name="payment-show">
    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> <?=$header_title?> (ฉบับย่อ)</button>
  <button type="button" class="btn btn-warning bill-hidden" name="bill-hidden">
    <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> ซ่อน<?=$header_title?> (ฉบับละเอียด)</button>
  <button type="button" class="btn btn-primary bill-show" name="bill-hidden">
    <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> <?=$header_title?> (ฉบับละเอียด)</button> 
  </div>
</div>
</br>
</br>
</br>
<!-- <div class="payment printable" id="payment"></div> -->
<div id="loading"></div>
<div class="bill_small" id="bill_small"></div>
<div class="bill_full" id="bill_full"></div>
<div id="non-printable">
  <center>
    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print..</button></h4>
    <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>
  </center>
</div>
