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
      $('.payment').hide();
      
    $('#modal_payment_date').datepicker({
      autoclose: true,
      todayHighlight: true ,
      format: 'yyyy-mm-dd'
    });
 });
  var $imageupload = $('.imageupload');
  $imageupload.imageupload();
  $('.payment-hidden').click(function(){
      $('.payment').hide();
      $('.payment-hidden').hide();
      $('.payment-show').show();
  });
  $('.payment-show').click(function(){
      $('.payment').show();
      $('.payment-hidden').show();
      $('.payment-show').hide();
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

</script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="css/bootstrap-imageupload.css" rel="stylesheet">

<style> 
.imageupload {
    margin: 20px 0;
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

</style>
<?php
function num2wordsThai($num){  
if($num != ''){ 
    $num=str_replace(",","",$num);
    $num_decimal=explode(".",$num);
    $num=$num_decimal[0];
    $returnNumWord;   
    $lenNumber=strlen($num);   
    $lenNumber2=$lenNumber-1;   
    $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");   
    $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");   
    $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   
    $ii=0;   
    for($i=$lenNumber2;$i>=0;$i--){   
        $kaNumWord[$i]=substr($num,$ii,1);   
        $ii++;   
    }   
    $ii=0;   
    for($i=$lenNumber2;$i>=0;$i--){   
        if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){   
            $kaDigit[$kaNumWord[$i]]="ยี่";   
        }else{   
            if($kaNumWord[$i]==2){   
                $kaDigit[$kaNumWord[$i]]="สอง";        
            }   
            if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){   
                if($kaNumWord[$i+1]==0){   
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";      
                }else{   
                    $kaDigit[$kaNumWord[$i]]="เอ็ด";       
                }   
            }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){   
                $kaDigit[$kaNumWord[$i]]="";   
            }else{   
                if($kaNumWord[$i]==1){   
                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";   
                }   
            }   
        }   
        if($kaNumWord[$i]==0){   
            if($i!=6){
                $kaGroup[$i]="";   
            }
        }   
        $kaNumWord[$i]=substr($num,$ii,1);   
        $ii++;   
        $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];   
    }      
    if(isset($num_decimal[1])){
        $returnNumWord.="จุด";
        for($i=0;$i<strlen($num_decimal[1]);$i++){
                $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];  
        }
    }       
    return $returnNumWord;  
    }else{
      return "ศูนย์บาท";
    } 
}   
//echo $_GET['id_bill'];
if($_GET['id_bill']){

    $strSQL_bill ="SELECT id, id_bill, number_bill, s_date, e_date, id_set, type_ subject, branch, term, teacher, pay, price_self_type, price_self, status , delete_at, create_at,  branch.name AS branch_name 
                    FROM bill LEFT 
                    JOIN branch ON bill.branch = branch.branchid
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
  //print_r($objResult);
 

?>
<div class="col-sm-12 payment">
<table class="table" cellspacing="0" width="100%" border="1">
<tr>
  <td>
  <table class="table borderless" cellspacing="0" width="100%">
    <!-- <tr>
      <td class="col-md-3"></td>
      <td colspan="3" rowspan="2" class="col-md-6"><center><br><h3>ใบแจ้งชำระเงิน</h3></center></td>
    </tr> -->
    <tr>
      <td class="col-md-1"><img src="images/HMS.png" width="150px"></td>
      <td class="col-md-9"> HMS GROUP CO., LTD. <br> บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด<br> ที่อยู่ 899/139 ถ.อ่อนนุช แขวงประเวศ กรุงเทพมหานคร 10250 (สำนักงานใหญ่)</td>
      <td class="col-md-2" rowspan="4" >
        <h3>ใบแจ้งชำระเงิน</h3>
        <table class="table" cellspacing="0" width="100%" border="1">
          <tr>
            <td>วันที่ : <?=date("d-m-Y");?></td>
          </tr>
          <tr>
            <td>ออกโดย : อารีวรรณ</td>
          </tr>
          <tr>
            <td>เลขที่ : <?=$number_bill?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="text-left">ชื่อลูกค้า : ชื่อลูกค้า  (ที่ทำงาน HMS สาขา <?=$branch_name?>)</td>
    </tr>
    <tr>
      <td colspan="2" class="text-left">ที่อยู่ : ชื่อลูกค้า</td>
    </tr>
    <tr>
      <td colspan="2" class="text-left">เลขประจำตัวผู้เสียภาษี : 111111111111</td>
    </tr>
    <!-- <tr>
      <td class="text-right" >ชื่อลูกค้า : </td>
      <td class="text-left">ชื่อลูกค้า</td>
    </tr>
    <tr>
      <td class="text-right">ที่อยู่ : </td>
      <td class="text-left">ชื่อลูกค้า</td>
    </tr>
    <tr>
      <td class="text-right">เลขประจำตัวผู้เสียภาษี : </td>
      <td class="text-left">111111111111</td>
    </tr> -->
    <!-- <tr>
      <td></td>
      <td colspan="2" class="text-center">ใบแจ้งชำระเงิน</td>
      <td class="text-right">วันที่ <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></td>
    </tr>
    <tr>
      <td colspan="3">ที่ทำงาน HMS สาขา <?=$branch_name?></td>
      <td class="text-right">เลขที่คำขอ <?=$number_bill?></td>
    </tr> -->
  </table>
</div>
<div class="col-sm-12">
  <table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <!-- <th class="col-md-6">รายการ</th>
        <th class="col-md-2 text-right">จำนวนเงินทั้งหมด</th>
        <th class="col-md-2"><center>หัก%</center></th>
        <th class="col-md-2 text-right">จ่าย</th> -->
        <th class="col-md-1"><center>ลำดับ</center></th>
        <th class="col-md-8"><center>รายละเอียด</center></th>
        <th class="col-md-3" colspan="2"><center>ราคา</center></th>
    </tr>
    </thead>
    <tbody>
      <? //for ($i=0; $i < count($objResult) ; $i++) { ?>
      <!-- <tr>
        <td ><?=$objResult[$i]['name']?></td>
        <td class="text-right"><?=number_format($objResult[$i]['sum'] , 2)?></td>
        <td ><center><?=$objResult[$i]['percent']?></center></td>
        <td class="text-right"><?=number_format($objResult[$i]['Result'] , 2)?></td>
      </tr> -->
      <? //} ?>
      <tr>
        <td><center>1</center></td>
        <td > ค่ารอยัลตี้ฟีส์ วันที่ <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></td>
        <td colspan="2" class="text-right"><?=number_format($sum_by_branch , 2)?></td>
      </tr>
      
      <tr>
        <td colspan="2" ><center><?=num2wordsThai($sum_by_branch);?>ถ้วน</center></td>
        <td><center>รวมทั้งสิ้น</center></td>
        <td class="text-right"><?=number_format($sum_by_branch , 2)?></td>
      </tr>
    </tbody>
  </table>
  (โปรดตรวจสอบความถูกต้องของรายการในเอกสารฉบับนี้ภายใน 7 วันมิฉะนั้นจะถือว่าสมบูรณ์)

  <table class="table borderless" cellspacing="0" width="100%">
    <tr>
      <td class="col-md-8" colspan="2"></td>
      <td class="col-md-2">
        <table class="table">
        <tr>
          <td><center>___________________</center></td>
        </tr>
        <tr>
          <td><center>ผู้มีอำนวจลงนาม</center></td>
        </tr>
        <tr>
          <td><center>............../............../..............</center></td>
        </tr>
        </table>
      </td>
      <td class="col-md-2">
        <table class="table">
        <tr>
          <td><center>___________________</center></td>
        </tr>
        <tr>
          <td><center>ผู้รับเงิน</center></td>
        </tr>
        <tr>
          <td><center>............../............../..............</center></td>
        </tr>
        </table>
      </td>
    </tr>
  </table>
  <!-- <table class="table borderless" cellspacing="0" width="100%">
    <tr>
      <td colspan="2">เลขที่คุม 6005-1002-000155 / 00247379 / 24737863</td>
    </tr>
    <tr>
      <td class="col-md-8">เลขทะเบียน 0105559169039 บริษัท เอช.เอ็ม.เอส.กรุ๊ป จำกัด</td>
      <td class="col-md-4">ผู้รับเงิน</td>
    </tr>
    <tr>
      <td class="col-md-8">โปรดเก็บใบเสร็จรับเงินนี้ไว้เป็นหลักฐานแสดงต่อเจ้าหน้าที่เมื่อมาติดต่อ</td>
      <td class="col-md-4">ตำแหน่ง</td>
    </tr>
  </table> -->
  <!-- <br><p> ตารางตั้งค่า % </p>
  <table class="table table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <!-- <th><center>id_set</center></th> -->
        <!-- <th><center>ขื่อ</center></th>
        <th><center>ได้%</center></th>
    </tr>
    </thead>
    <tbody>
      <? $sql_set = "SELECT id,  id_set,  teacher_id,  percent , teacher.teachername AS teacher_name
                          FROM bill_percent 
                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid";
                          //WHERE id_set = '".$id_set."'";
        $objQuery_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
        $j =0;
        while($objResult_set = mysql_fetch_array($objQuery_set)){ ?>
          <tr>
          <!-- <td align="center"><? if($j==0){echo $objResult_set['id_set'];}?></td> -->
          <!-- <td align="center"><?=$objResult_set['teacher_name']?></td>
          <td align="center"><?=$objResult_set['percent']?></td>
          </tr>
        <? $j++;}?>
    </tbody>
  </table> -->
      </td>
    </tr>
  </table>
</div>


<form id="form-notification-payment" action="report.php?type=update_payment" method="post" enctype="multipart/form-data">
<div class="form-group col-md-12">
  <input type="hidden" name="id" id="id" id="id" value="<?=$id?>">
  <input type="hidden" name="number_bill" id="number_bill" value="<?=$number_bill?>">
  <input type="hidden" name="id_account_self" id="id_account_self" value="<?=$id_account_self?>">
  
  <!-- bootstrap-imageupload. -->
  <div class="imageupload panel panel-default">
      <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> แจ้งการชำระเงิน </h3>
          <button type="button" class="btn btn-warning payment-hidden" name="payment"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ซ่อนใบแจ้งชำระเงิน</button>
<button type="button" class="btn btn-warning payment-show" name="payment"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ใบแจ้งชำระเงิน</button>   
      </div>
      <div class="panel-body">
        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='input-group col-sm-4'>
            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_payment_date" value="<?=date('Y-m-d');?>" name="modal_payment_date" id="modal_payment_date"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
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
              <!-- <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="2"> บัตรเคดิต</label></label> 
              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="3"> เงินสด</label></label> --> 
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">  
              <label><input type="checkbox" name="modal_payment_status" id="modal_payment_status" value="2" checked="checked"> ชำระครบ</label>
              <!--<label><input type="radio" name="modal_payment_status" id="modal_payment_status" value="7"></label></label>-->
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
                <textarea id="modal_payment_remark" name="modal_payment_remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>
      </div>
      <div class="panel-heading clearfix">
          <h3 class="panel-title pull-left">Upload รูปหลักฐานการชำระ</h3>   
      </div>
      <div class="file-tab panel-body">
          <label class="btn btn-default btn-file">
              <span>Browse</span> 
              <!-- The file is stored here. -->
              <input type="file" name="fileToUpload">
          </label>
          <button type="button" class="btn btn-default">Remove</button> * ขนาดไม่เกิน 500KB เฉพาะไฟล์ JPG, JPEG, PNG & GIF
      </div>
      
  </div>
</div>
<div class="col-md-12">
<center>
    <button type="submit" class="btn btn-primary btn_insert_payment" id="btn_insert_payment">บันทึก</button></h4>
    <button type="button" class="btn btn-default close_pay" data-dismiss="modal" id="close_pay">Close</button>
</center>
</div>
</form>
<? }mysql_close($conn);?>
