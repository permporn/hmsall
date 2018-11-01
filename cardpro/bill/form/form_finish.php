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

          data: {id_bill : id , type : 2} ,

          success: function(data){

              //console.log(data);

               $(".header").hide();

               $("#bill_full").html(data);

          } 

      });

    $('#date_start').datepicker({

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



$('.btn_get_bill').click(function(){

  var id = $('#id').val();

  var id_account_self = $('#id_account_self').val();

  var status = 5;

  var remark = $('#remark').val();

  var date_start = $('#date_start').val();

  $.ajax({

      type: "GET",

      url: "report.php",

      data: {id : id , type : "update_get_bill_user" ,id_account_self : id_account_self, status : status , remark : remark, date_start : date_start},

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

                          bill.id, bill.id_bill, 

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

                          bill.payment_date_admin,

                          bill.payment_remark_admin,

                          bill.sent_bill_s_date,

                          bill.sent_bill_e_date,

                          bill.sent_bill_remark,

                          bill.sent_bill_id_staff,

                          bill.get_bill_date,

                          bill.get_bill_remark,

                          bill.get_bill_id_staff, 

                          bill.status , 

                          bill.delete_at, 

                          bill.create_at, 

                          bill.cancel_bill_remark, 

                          s5.stname AS payment_id_staff_admin,

                          s4.stname AS cancel_bill_staff, 

                          s2.stname AS sent_bill_name_staff,

                          s3.stname AS get_bill_name_staff,

                          branch.name AS branch_name 

                          FROM bill 

                          LEFT JOIN branch ON bill.branch = branch.branchid

                          LEFT JOIN staff ON bill.payment_id_staff = staff.stid

                          LEFT JOIN staff AS s2 ON bill.sent_bill_id_staff = s2.stid

                          LEFT JOIN staff AS s3 ON bill.get_bill_id_staff = s3.stid

                          LEFT JOIN staff AS s4 ON bill.cancel_bill_staff = s4.stid

                          LEFT JOIN staff AS s5 ON bill.payment_id_staff_admin = s5.stid

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

    $sent_bill_s_date = $objResult_bill['sent_bill_s_date'];

    $sent_bill_e_date = $objResult_bill['sent_bill_e_date'];

    $sent_bill_remark = $objResult_bill['sent_bill_remark'];

    $sent_bill_name_staff = $objResult_bill['sent_bill_name_staff'];

    $get_bill_date= $objResult_bill['get_bill_date'];

    $get_bill_remark= $objResult_bill['get_bill_remark'];

    $get_bill_name_staff= $objResult_bill['get_bill_name_staff'];

    $branch_name = $objResult_bill['branch_name'];

    $cancel_bill_remark = $objResult_bill['cancel_bill_remark']; 

    $cancel_bill_staff = $objResult_bill['cancel_bill_staff'];  

    $payment_date_admin = $objResult_bill['payment_date_admin'];  

    $payment_remark_admin = $objResult_bill['payment_remark_admin'];

    $payment_id_staff_admin = $objResult_bill['payment_id_staff_admin'];

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

          <h3 class="panel-title pull-life col-sm-7"><span class="glyphicon glyphicon-ok" aria-hidden="true">

          </span><? if($status == 6){ echo " รายละเอียดกานยกเลิกใบเสร็จ";}else{ echo " การจัดส่งใบเสร็จเสร็จสิ้น";} ?> </h3>

          <div class="col-md-5" align="right">

          <button type="button" class="btn btn-warning payment-hidden" name="payment-hidden">

            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> ซ่อนใบเสร็จ (ฉบับย่อ)</button>

          <button type="button" class="btn btn-info payment-show" name="payment-show">

            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> ใบเสร็จ (ฉบับย่อ)</button>

          <button type="button" class="btn btn-warning bill-hidden" name="bill-hidden">

            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> ซ่อนใบเสร็จ (ฉบับละเอียด)</button>

          <button type="button" class="btn btn-primary bill-show" name="bill-hidden">

            <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> ใบเสร็จ (ฉบับละเอียด)</button> 

          </div>

      </div>

      <div class="panel-body">

      <div class="bill_small" id="bill_small"></div>

      <div class="bill_full" id="bill_full"></div>

        

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

              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="1" checked="checked" disabled="disabled"> โอน</label>

              </div>

        </div>



        <div class="form-group col-sm-12">

              <label for="" class="col-sm-3 control-label"></label>

              <div class="input-group col-sm-9">  

              <label><input type="checkbox" name="modal_payment_status" id="modal_payment_status" value="2" checked="checked" disabled="disabled"> ชำระครบ</label>

              </div>

        </div>



        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>

              <div class="input-group col-sm-9">  

                <? if($payment_remark){echo $payment_remark;}else{echo "-";}?>

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

            <label for="" class="col-sm-3 control-label">หมายเหตุยืนยันการชำระ</label>

              <div class="input-group col-sm-9">  

                <? if($payment_remark_admin){echo $payment_remark_admin;}else{echo "-";}?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">เจ้าหน้าที่ยืนยันการชำระ</label>

              <div class="input-group col-sm-9">  

                <?=$payment_id_staff_admin?>

              </div>

        </div>

        <? if($status != '6'){?>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">วันที่ระหว่างจัดส่งใบเสร็จ</label>

            <div class='input-group col-sm-4'>

            <?=$sent_bill_s_date?> ถึง <?=$sent_bill_e_date?>

            </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="input-group remark" class="col-sm-3 control-label">เจ้าหน้าที่แจ้งจัดส่งหมายเหตุ</label>

              <div class="input-group col-sm-9">  

                <?=$sent_bill_remark?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">เจ้าหน้าที่แจ้งจัดส่ง</label>

              <div class="input-group col-sm-9">  

                <?=$sent_bill_name_staff?>

              </div>

        </div>

        

        <div class="form-group col-sm-12">

              <label for="" class="col-sm-3 control-label"></label>

              <div class="input-group col-sm-9">  

              <label><input type="checkbox" name="status" id="status" value="5" checked="checked" disabled="disabled"> ได้รับใบเสร็จแล้ว</label>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="" class="col-sm-3 control-label">วันที่รับใบเสร็จ</label>

            <div class='input-group col-sm-2'>

            <?=$get_bill_date?>

            </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">หมายเหตุรับใบเสร็จ</label>

              <div class="input-group col-sm-9">  

                 <? if($get_bill_remark){echo $get_bill_remark;}else{echo "-";}?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">เจ้าหน้าที่รับใบเสร็จ</label>

              <div class="input-group col-sm-9">  

                <?=$get_bill_name_staff?>

              </div>

        </div>

        <? }else{?>

        <font color="red">

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">หมายเหตุยกเลิกใบเสร็จ</label>

              <div class="input-group col-sm-9">  

                <? if($cancel_bill_remark){echo $cancel_bill_remark;}else{echo "-";}?>

              </div>

        </div>

        <div class="form-group col-sm-12">

            <label for="remark" class="col-sm-3 control-label">เจ้าหน้าที่ยกเลิกใบเสร็จ</label>

              <div class="input-group col-sm-9">  

                <?=$cancel_bill_staff?>

              </div>

        </div>

      </font>

        <? } ?>

  </div>

<div class="panel-footer">

  <center>

    <!-- <button type="button" class="btn btn-primary btn_get_bill" id="btn_get_bill">บันทึก</button> -->

    <button type="button" class="btn btn-default close_pay" data-dismiss="modal" id="close_pay">Close</button>

  </center>

</div>

</div>

</form>

<? }mysqli_close($con_ajtongmath_self);?>

