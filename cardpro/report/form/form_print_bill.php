<? session_start();
include("../ck_session.php"); ?>
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
<script type="text/javascript">
$(function() {

  window.scrollTo(0,0);
  $(".panel-heading").hide();
  $('.close_insert_book').click(function(){
      location.reload();
  });
  //$('table#datatable_book').DataTable();
});
</script>
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
?>  
<form method="get" id="order-form printable" >
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
      <td class="text-right">เล่นที่เล่ม 247379</td>
    </tr>
    <tr>
      <td>HMS GROUP CO., LTD.</td>
      <td class="text-right">เลขที่ 24737863</td>
    </tr>
    <tr>
      <td>บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด</td>
      <td colspan="2" align="center">ใบเสร็จรับเงิน</td>
      <td class="text-right">วันที่ <?=$_GET['start_date'];?> - <?=$_GET['end_date'];?></td>
    </tr>
    <tr>
      <td colspan="3">ที่ทำงาน HMS</td>
      <td class="text-right">เลขที่คำขอ 1234567890</td>
    </tr>
    <tr>
      <td colspan="3">ได้รับเงินจาก เงินสด</td>
      <td class="text-right">เลขที่ใบสั่ง</td>
    </tr>
  </table>
</div>

<div class="col-sm-12">
  <table id="datatable_book" class="table table-bordered display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th class="col-md-8">รายการ</th>
        <th class="col-md-2"><center>จำนวนเงินทั้งหมด</center></th>
        <th class="col-md-2"><center>คิดเป็นเงิน <?=$_GET['quantity']?>%</center></th>
    </tr>
    </thead>
    <tbody>
        <tr>
        <td class="col-md-8">1. ยอดทั้งหมดตั้งแต่วันที่ <?=$_GET['start_date'];?> - <?=$_GET['end_date'];?> 
        สาขา <?=$_GET['branch'];?></td>
        <td class="col-md-2" align="center"><?=number_format($_GET['sum_amount'], 2);?></td>
        <td class="col-md-2" align="center"><?=number_format($_GET['percentag1'], 2);?></td>
        </tr>
        <tr>
        <td colspan="2" align="center"><?=num2wordsThai($_GET['percentag1']);?>ถ้วน</td>
        <td class="col-md-2" align="center"><?=number_format($_GET['percentag1'], 2);?></td>
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
</div>

<div class="col-md-12" id="non-printable">
<center>
<button type="button" class="btn btn-primary btn_update_order" onclick="javascript:window.print();">Print..</button></h4>
<button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button>
</center>
</div>
</form>
<? mysql_close($conn);?>