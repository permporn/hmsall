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
}   
//echo $_GET['id_bill'];
if($_GET['id_bill']){

    $strSQL_bill ="SELECT id, id_bill, s_date, e_date, id_set, type_ subject, branch, term, teacher, pay, price_self_type, price_self, status , delete_at, create_at,  branch.name AS branch_name 
                    FROM bill LEFT 
                    JOIN branch ON bill.branch = branch.branchid
                    WHERE id_bill = '".$_GET['id_bill']."'";
    $objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");
    $objResult_bill = mysql_fetch_array($objQuery_bill); 
    //echo $strSQL_bill;
    $id = $objResult_bill['id'];
    $id_bill = $objResult_bill['id_bill'];
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
<div class="col-sm-12">
  <table class="table borderless" cellspacing="0" width="100%">
    <tr>
      <td class="col-md-3"></td>
      <td class="col-md-3"></td>
      <td class="col-md-3"></td>
      <td class="col-md-3"></td>
    </tr>
    <tr>
      <td class="col-md-3"></td>
      <td colspan="2" rowspan="3" class="col-md-6"><center><img src="images/HMS.png" width="150px"></center></td>
      <td class="col-md-3"></td>
    </tr>
    <tr>
      <td></td>
      <td class="text-right">เล่นที่เล่ม -</td>
    </tr>
    <tr>
      <td>HMS GROUP CO., LTD.</td>
      <td class="text-right">เลขที่ <?=$id_bill?></td>
    </tr>
    <tr>
      <td>บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด</td>
      <td colspan="2" class="text-center">ใบเสร็จรับเงิน</td>
      <td class="text-right">วันที่ <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></td>
    </tr>
    <tr>
      <td colspan="3">ที่ทำงาน HMS สาขา <?=$branch_name?></td>
      <td class="text-right">เลขที่คำขอ <?=$id?></td>
    </tr>
  </table>
</div>
<div class="col-sm-12">
  <table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="col-md-6">รายการ</th>
        <th class="col-md-2 text-right">จำนวนเงินทั้งหมด</th>
        <th class="col-md-2"><center>หัก%</center></th>
        <th class="col-md-2 text-right">จ่าย</th>
    </tr>
    </thead>
    <tbody>
      <? for ($i=0; $i < count($objResult) ; $i++) { ?>
      <tr>
        <td ><?=$objResult[$i]['name']?></td>
        <td class="text-right"><?=number_format($objResult[$i]['sum'] , 2)?></td>
        <td ><center><?=$objResult[$i]['percent']?></center></td>
        <td class="text-right"><?=number_format($objResult[$i]['Result'] , 2)?></td>
      </tr>
      <? } ?>
      <tr>
        <td colspan="3" ><center><?=num2wordsThai($sum_by_branch);?>ถ้วน</center></td>
        <td colspan="1" class="text-right"><?=number_format($sum_by_branch , 2)?></td>
      </tr>
    </tbody>
  </table>
  <table class="table borderless" cellspacing="0" width="100%">
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
  </table>
  <br><p> ตารางตั้งค่า % </p>
  <table class="table table-bordered" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th><center>id_set</center></th>
        <th><center>ขื่อ</center></th>
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
          <td align="center"><? if($j==0){echo $objResult_set['id_set'];}?></td>
          <td align="center"><?=$objResult_set['teacher_name']?></td>
          <td align="center"><?=$objResult_set['percent']?></td>
          </tr>
        <? $j++;}?>
    </tbody>
  </table>
</div>

<div class="col-md-12" id="non-printable">
<center>
  <button type="button" class="btn btn-primary" onclick="javascript:window.print();">Print..</button></h4>
  <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>
</center>
</div>
<? }   mysql_close($conn);?>
