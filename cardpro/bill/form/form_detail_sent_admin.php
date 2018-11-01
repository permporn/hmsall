<?

session_start();

include("../ck_session.php");

include('../config/config_multidb.php');

?>

<!-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="crossorigin="anonymous"></script> -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="js/bootstrap-imageupload.js"></script>

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

      $('.payment-hidden').hide();

      $('.bill-hidden').hide();

      $('.bill_small').hide();

      $('.bill_full').hide();

      var id = $("#id").val();

      $.ajax({

          type: "GET",

          url: "form/form_bill_small.php",

          data: {id_bill : id , type : 2},

          success: function(data){

              //console.log(data);

               $(".header").hide();

               $("#bill_small").html(data);

          } 

      });

      $.ajax({

          type: "GET",

          url: "form/form_bill_full.php",

          data: {id_bill : id , type : 2},

          success: function(data){

              //console.log(data);

               $(".header").hide();

               $("#bill_full").html(data);
          } 

      });

    $('#modal_sent_date_start').datepicker({

      autoclose: true,

      todayHighlight: true ,

      format: 'yyyy-mm-dd'

    });

     $('#modal_sent_date_end').datepicker({

      autoclose: true,

      todayHighlight: true ,

      format: 'yyyy-mm-dd'

    });

 });

var $imageupload = $('.imageupload');

$imageupload.imageupload();

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



$('.btn_insert_sent_admin').click(function(){

  var id = $('#id').val();

  var id_account_self = $('#id_account_self').val();

  var status = 4;

  var remark = $('#remark').val();

  var date_start = $('#modal_sent_date_start').val();

  var date_end = $('#modal_sent_date_end').val();



  $.ajax({

      type: "GET",

      url: "report.php",

      data: {id : id , type : "update_sent_admin" ,id_account_self : id_account_self, status : status , remark : remark, date_end : date_end , date_start:date_start},

      success: function(data){

          $.ajax({

            type: "POST",

            url: "form/form_data_pay.php",

            data: {},

            success: function(data){

                //console.log(data);

                $("#data-table").html(data);

                $('.form-saerch').hide();

                $('.subject_self').hide();

                $('.term_self').hide();

                $('.quantity').hide(); 

                $('.set_pay').show();

                $('.form-gen').show();

                $(".header").show();

                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 

            } 

        });

      } 

  });

});



</script>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style> 

.imageupload {

    /*margin: 20px 0;*/

}

#printable { display: block; }



@media print 

{ 

#non-printable { display: none; } 

#printable { display: block; } 

} 

.borderless tr, .borderless td, .borderless th {

    border: none !important;

}

.btn{

  margin-left: 5px;

}

</style>

<?php

if($_GET['id_bill']){

    $strSQL_bill ="SELECT staff.stname, 

                          bill.update_at, 

                          bill.payment_id_staff, 

                          bill.payment_remark, 

                          bill.payment_date, 

                          bill.payment_type , 

                          bill.payment_image, 

                          bill.id, 

                          bill.id_bill, 

                          bill.number_bill, 

                          bill.s_date, 

                          bill.e_date, 

                          bill.id_set, 

                          bill.type_, 

                          bill.branch, 

                          bill.term, 

                          bill.teacher, 

                          bill.pay, 

                          bill.price_self_type, 

                          bill.price_self, 

                          bill.price_self_update,

                          bill.status , 

                          bill.payment_date_admin, 

                          bill.payment_id_staff_admin,  

                          bill.delete_at, 

                          bill.create_at,

                          bill.payment_remark_admin,

                          branch.name AS branch_name,

                          s.stname AS payment_staff_name,

                          s.full_name AS payment_staff_full_name

                          FROM bill 

                          LEFT JOIN branch ON bill.branch = branch.branchid

                          LEFT JOIN staff ON bill.payment_id_staff = staff.stid

                          LEFT JOIN staff s ON s.stid = bill.payment_id_staff_admin

                          WHERE id = '".$_GET['id_bill']."'";

    $objQuery_bill = mysqli_query($con_ajtongmath_self,$strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

    $objResult_bill = mysqli_fetch_array($objQuery_bill); 

    //echo $strSQL_bill;

    $id = $objResult_bill['id'];

    $id_bill = $objResult_bill['id_bill'];

    $number_bill = $objResult_bill['number_bill'];

    $s_date = $objResult_bill['s_date'];

    $e_date = $objResult_bill['e_date'];

    $id_set = $objResult_bill['id_set'];

    $type = $objResult_bill['type_'];

    $branch = $objResult_bill['branch'];

    $teacher = $objResult_bill['teacher'];

    $pay = $objResult_bill['pay'];

    $price_self_type = $objResult_bill['price_self_type'];

    $price_self = $objResult_bill['price_self'];

    $status = $objResult_bill['status'];

    $create_at = $objResult_bill['create_at'];

    $update_at = $objResult_bill['update_at'];

    $payment_remark = $objResult_bill['payment_remark'];

    $payment_date = $objResult_bill['payment_date'];

    $payment_type = $objResult_bill['payment_type'];

    $payment_image = $objResult_bill['payment_image'];

    $payment_staff_name = $objResult_bill['payment_staff_name'];

    $payment_date_admin = $objResult_bill['payment_date_admin'];

    $payment_remark_admin = $objResult_bill['payment_remark_admin'];

    $branch_name = $objResult_bill['branch_name'];

    if ($price_self_type == "self_amount"){

    $colunm = "self_amount";

    }if ($price_self_type == "subject_real_price") {

    $colunm = "subject_real_price";

    }

    $price_self_update = $objResult_bill['price_self_update'];

    if($price_self_update > 0){

        $price_self = $price_self_update;
    }

?>

<form id="form-payment-admin" method="GET">

<input type="hidden" name="id" id="id" id="id" value="<?=$id?>">

<input type="hidden" name="number_bill" id="number_bill" value="<?=$number_bill?>">

<input type="hidden" name="id_account_self" id="id_account_self" value="<?=$id_account_self?>">

  <!-- bootstrap-imageupload. -->

  <div class="imageupload panel panel-default">

      <div class="panel-heading clearfix">

          <h3 class="panel-title pull-life col-md-7">

            <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> แจ้งการจัดส่งใบเสร็จ </h3>

          <!-- <div class="col-md-9" align="right"> -->

          <button type="button" class="btn btn-warning payment-hidden" name="payment-hidden">

            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> ซ่อนใบเสร็จ (ฉบับย่อ)</button>

          <button type="button" class="btn btn-info payment-show" name="payment-show">

            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> ใบเสร็จ (ฉบับย่อ)</button>

          <button type="button" class="btn btn-warning bill-hidden" name="bill-hidden">

            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> ซ่อนใบเสร็จ (ฉบับละเอียด)</button>

          <button type="button" class="btn btn-primary bill-show" name="bill-hidden">

            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> ใบเสร็จ (ฉบับละเอียด)</button> 

          <!-- </div> -->

      </div>

      <div class="panel-body">

      <div class="bill_small" id="bill_small"></div>

      <div class="bill_full" id="bill_full"></div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-12 control-label"><h4><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> รายละเอียด :</h4></label>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">วันที่โอน</label>

            <div class='input-group col-sm-9'>

            <?=$payment_date?>

            </div>

        </div>

        <div class="form-group col-sm-12">

              <label for="" class="col-sm-3 control-label"> ยอดชำระรวม</label>

              <div class="input-group col-sm-9">  <?=number_format($price_self , 2)?> บาท

              </div>

        </div>

        <div class="form-group col-sm-12">

              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>

              <div class="input-group col-sm-9"> 

              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="1" checked="checked"> โอน</label>

              <!-- <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="2"> บัตรเคดิต</label></label> 

              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="3"> เงินสด</label></label> --> 

              </div>

        </div>

        <div class="form-group col-sm-12">

              <label for="" class="col-sm-3 control-label"></label>

              <div class="input-group col-sm-9">  

              <label><input type="checkbox" name="modal_payment_status" id="modal_payment_status" value="2" checked="checked"> ชำระครบ</label>

              <!--<label><input type="radio" name="modal_payment_status" id="modal_payment_status" value="7"></label></label>-->

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>

              <div class="input-group col-sm-9"> 

               <? if($payment_remark){echo $payment_remark; }else{ echo "-";}?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="image" class="col-sm-3 control-label">รูปหลักฐานโอน</label>

              <div class="input-group col-sm-9">  

               <img src="<?=$payment_image?>" height="250px" target="_blank"/>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">วันที่ยืนยันการชำระ</label>

              <div class="input-group col-sm-9">  

                <?=$payment_date_admin?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">เจ้าหน้าที่ยืนยันการชำระ</label>

              <div class="input-group col-sm-9">  

                <?=$payment_staff_name?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">หมายเหตุการยืนยันการชำระ</label>

              <div class="input-group col-sm-9">  

                <? if($payment_remark_admin){echo $payment_remark_admin; }else{ echo "-";}?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-12 control-label"><h4><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> แจ้งการจัดส่งใบเสร็จ - สำหรับเจ้าหน้าที่ :</h4></label>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">วันที่ระหว่างจัดส่ง</label>

            <div class='input-group col-sm-4'>

            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_sent_date_start" value="<?=date('Y-m-d');?>" name="modal_sent_date_start" id="modal_sent_date_start"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 

            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_sent_date_end" value="<?=date('Y-m-d');?>" name="modal_sent_date_end" id="modal_sent_date_end"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 

            </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>

              <div class="input-group col-sm-9">  

                <textarea id="remark" name="remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>

              </div>

        </div>

  </div>

<div class="panel-footer">

<center>

    <button type="button" class="btn btn-primary btn_insert_sent_admin" id="btn_insert_sent_admin">บันทึก</button></h4>

    <button type="button" class="btn btn-default close_pay" data-dismiss="modal" id="close_pay">Close</button>

</center>

</div></div>

</form>

<? }mysqli_close($con_ajtongmath_self);?>

