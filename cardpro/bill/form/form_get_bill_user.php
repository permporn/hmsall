<?
session_start();
include("../ck_session.php");
include('../config/config_db_self.php');
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
  
//echo $_GET['id_bill'];
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
                          bill.sent_bill_s_date,
                          bill.sent_bill_e_date,
                          bill.sent_bill_remark,
                          bill.sent_bill_id_staff,
                          bill.status , 
                          bill.delete_at, 
                          bill.create_at, 
                          s2.stname AS sent_bill_name_staff,
                          branch.name AS branch_name 
                          FROM bill 
                          LEFT JOIN branch ON bill.branch = branch.branchid
                          LEFT JOIN staff ON bill.payment_id_staff = staff.stid
                          LEFT JOIN staff AS s2 ON bill.sent_bill_id_staff = s2.stid
                          WHERE id = '".$_GET['id_bill']."'";
    $objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");
    $objResult_bill = mysql_fetch_array($objQuery_bill); 
    //echo $strSQL_bill;
    $id = $objResult_bill['id'];
    $id_bill = $objResult_bill['id_bill'];
    $number_bill = $objResult_bill['number_bill'];
    $s_date = $objResult_bill['s_date'];
    $e_date = $objResult_bill['e_date'];
    $id_set = $objResult_bill['id_set'];
    $type = $objResult_bill['type'];
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

    $branch_name = $objResult_bill['branch_name'];

    if ($price_self == "self_amount"){
    $colunm = "self_amount";
    }if ($price_self == "subject_real_price") {
    $colunm = "subject_real_price";
    }

    $pay_array = explode(",", $pay);

    for($i = 0 ; $i < count($pay_array); $i++) {
      if($i == 0){
         $pay = "'".$pay_array[$i]."'";
      }else{
         $pay .= ",'".$pay_array[$i]."'";
      }
    }
    
    $teacher_array = explode(",", $teacher);

    for($j = 0 ; $j < count($teacher_array); $j++) {

      $teacher_ = $teacher_array[$j];

      $sql_teacher[$j] = 
                    "SELECT 
                      credit.accid,
                      credit.amount,
                      credit.type_pay,
                      credit.date_pay,
                      credit.date_regis,
                      credit.amount AS self_amount,
                      account.status AS branch_id,
                      branch.name AS branch_name,
                      subject_real.name_subject_real AS name_subject_real,
                      subject_real.price AS subject_real_price
                      FROM credit
                      LEFT JOIN account ON account.accid = credit.accid
                      LEFT JOIN branch ON account.status = branch.branchid
                      LEFT JOIN subject ON credit.subid = subject.subid
                      LEFT JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real
                      WHERE 
                      subject.teacherid = $teacher_ AND credit.date_pay BETWEEN '".$s_date."' AND '".$e_date."' AND account.status = $branch";
      if($pay){
        $sql_teacher[$j] .= " AND credit.type_pay IN ($pay)";
      }    
      $sql_teacher[$j] .= " AND credit.type_pay != 'test' AND credit.type_pay != 'free' "; 

      $sql_teacher[$j] .=  "AND account.status != 'out'";        

      $strSQL_sum = "SELECT SUM($price_self_type) as sum_amount FROM ( $sql_teacher[$j] ) as sum_amount";
      $objQuery_sum = mysql_query($strSQL_sum) or die ("Error Query [".$strSQL_sum."]");
      $objResult_sum1 = mysql_fetch_array($objQuery_sum); 
      $objResult_sum[$branch][$teacher_] = $objResult_sum1;

      $sql_bill_percent = "SELECT id,  id_set,  teacher_id,  percent , teacher.teachername AS teacher_name
                          FROM bill_percent 
                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid
                          WHERE teacher_id = $teacher_ AND id_set = '".$id_set."'";
      $objQuery_bill_percent = mysql_query($sql_bill_percent) or die ("Error Query [".$sql_bill_percent."]");
      $objResult_bill_percent = mysql_fetch_array($objQuery_bill_percent);
      $objResult_pay_teacher = ($objResult_sum1['sum_amount']*$objResult_bill_percent['percent'])/100;
      //test pay by teacher
      $objResult_pay_print = "sum=".$objResult_sum1['sum_amount']."*".$objResult_bill_percent['percent']."/100= ".$objResult_pay_teacher;
      if($objResult_bill_percent['teacher_name'] != ''){
        $objResult[] =  array( 
                      'name'  => $objResult_bill_percent['teacher_name'] ,
                      'sum'   => $objResult_sum1['sum_amount'],
                      'percent' => $objResult_bill_percent['percent'],
                      'Result'  => $objResult_pay_teacher
                      );
        $sum_by_branch += $objResult_pay_teacher;
      }
    }
 // print_r($objResult);
 

?>
<form id="form-payment-admin" method="GET">
<input type="hidden" name="id" id="id" id="id" value="<?=$id?>">
<input type="hidden" name="number_bill" id="number_bill" value="<?=$number_bill?>">
<input type="hidden" name="id_account_self" id="id_account_self" value="<?=$id_account_self?>">
  
  <!-- bootstrap-imageupload. -->
  <div class="imageupload panel panel-default">
      <div class="panel-heading clearfix">
          <h3 class="panel-title pull-life col-md-7">
            <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> ยืนยันการรับใบเสร็จ </h3>
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
        
        <!-- <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='col-sm-9'>
            <?=$payment_date?>
            </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดชำระรวม</label>
              <div class="col-sm-9">  <?=number_format($sum_by_branch , 2)?> บาท
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9"> 
              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="1" checked="checked"> โอน</label>
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">  
              <label><input type="checkbox" name="modal_payment_status" id="modal_payment_status" value="2" checked="checked"> ชำระครบ</label>
              <label><input type="radio" name="modal_payment_status" id="modal_payment_status" value="7"></label></label>
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
               <?=$payment_remark?>
              </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="image" class="col-sm-3 control-label">รูปหลักฐานโอน</label>
              <div class="col-sm-9">  
               <img src="<?=$payment_image?>" height="400px"/>
              </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่ยืนยันการชำระ</label>
              <div class="col-sm-9">  
                <?=$payment_remark?>
              </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">เจ้าหน้าที่ยืนยันการชำระ</label>
              <div class="col-sm-9">  
                <?=$payment_remark?>
              </div>
        </div> -->
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
            <label for="" class="col-sm-3 control-label">วันที่รับใบเสร็จ</label>
            <div class='input-group col-sm-2'>
            <input type='text' data-date-format="yyyy-mm-dd" class="form-control date_start" value="<?=date('Y-m-d');?>" name="date_start" id="date_start"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="input-group col-sm-9">  
                <textarea id="remark" name="remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>
        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="input-group col-sm-9">  
              <label><input type="checkbox" name="status" id="status" value="5" checked="checked" disabled="disabled"> ได้รับใบเสร็จแล้ว</label>
              </div>
        </div>
  </div>

<div class="panel-footer">
<center>
    <button type="button" class="btn btn-primary btn_get_bill" id="btn_get_bill">บันทึก</button></h4>
    <button type="button" class="btn btn-default close_pay" data-dismiss="modal" id="close_pay">Close</button>
</center>
</div></div>
</form>
<? }mysql_close($conn);?>
