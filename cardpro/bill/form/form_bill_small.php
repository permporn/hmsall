<?

session_start();

include("../ck_session.php");

include('../config/config_multidb.php');

error_reporting(~E_NOTICE);

function num2wordsThai($num){  

if($num != ''){ 

    $num=str_replace(",","",$num);

    $num_decimal=explode(".",$num);

    $num=$num_decimal[0];

    $returnNumWord ='';   

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
    echo $returnNumWord;  
    return $returnNumWord;  

    }else{

      return "ศูนย์บาท";

    } 

}   

if($_GET['id_bill']){

    $header_title = $_GET['type'];

    //echo $header_title;

    if($header_title == 1){

      $header_title = "ใบแจ้งชำระเงิน";

    }else if($header_title == 2){

      $header_title = "ใบเสร็จรับเงิน";

    }

    

    $strSQL_bill ="SELECT 

                    bill.id, 

                    bill.id_bill, 

                    bill.number_bill, 

                    bill.s_date, 

                    bill.e_date, 

                    bill.id_set, 

                    bill.type_ ,

                    bill.subject, 

                    bill.branch, 

                    bill.term, 

                    bill.teacher, 

                    bill.pay, 

                    bill.price_discount, 

                    bill.price_discount_remark, 

                    bill.price_self_update,

                    bill.price_self_type, 

                    bill.price_self, 

                    bill.status AS status_bill,

                    bill.delete_at, 

                    bill.create_at,  

                    branch.name AS branch_name,

                    branch.sub_name AS branch_sub_name,

                    branch.customer_name AS customer_name,

                    branch.address AS branch_address,

                    branch.number_card AS branch_number_card,

                    branch.phone  AS branch_phone,

                    staff.full_name AS staff_name_bill,

                    staff.stid AS staff_id_bill,

                    bill_number.no_bill_branch AS no_bill_branch,

                    bill_number.no_bill_all AS no_bill_all

                    FROM bill  

                    JOIN branch ON bill.branch = branch.branchid

                    LEFT JOIN staff ON bill.staff_bill = staff.stid

                    LEFT JOIN bill_number ON bill.number_bill = bill_number.no_bill_all

                    WHERE bill.id = '".$_GET['id_bill']."'";

    $objQuery_bill = mysqli_query($con_ajtongmath_self,$strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

    $objResult_bill = mysqli_fetch_array($objQuery_bill); 

    $id = $objResult_bill['id'];

    $id_bill = $objResult_bill['id_bill'];

    $number_bill = $objResult_bill['number_bill'];

    $s_date = $objResult_bill['s_date'];

    $e_date = $objResult_bill['e_date'];

    $id_set = $objResult_bill['id_set'];

    $type_ = $objResult_bill['type_'];

    $branch = $objResult_bill['branch'];

    $teacher = $objResult_bill['teacher'];

    $pay = $objResult_bill['pay'];

    $price_self_type = $objResult_bill['price_self_type'];

    $status = $objResult_bill['status_bill'];

    $create_at = $objResult_bill['create_at'];

    $staff_name_bill = $objResult_bill['staff_name_bill'];

    $branch_sub_name = $objResult_bill['branch_sub_name'];

    $customer_name= $objResult_bill['customer_name'];

    $branch_address= $objResult_bill['branch_address'];

    $branch_number_card= $objResult_bill['branch_number_card'];

    $branch_phone= $objResult_bill['branch_phone'];

    $no_bill_branch = $objResult_bill['no_bill_branch'];

    $no_bill_all = $objResult_bill['no_bill_all'];

    $branch_name = $objResult_bill['branch_name'];

    $price_discount = $objResult_bill['price_discount'];

    $price_discount_remark = $objResult_bill['price_discount_remark'];

    $price_self = $objResult_bill['price_self'];

    if ($price_self == "self_amount"){

    $colunm = "self_amount";

    }if ($price_self == "subject_real_price") {

    $colunm = "subject_real_price";

    }

    $price_self_update = $objResult_bill['price_self_update'];

    if($price_self_update > 0){

        $price_self = $price_self_update;
    }

?>

<page size="A4-1/2">

<table class="table borderless" cellspacing="0" width="100%">

        <tr>

          <td class="col-md-1"><img src="images/HMS.png" width="170px"></td>

          <td class="col-md-7"> 

            <br> บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด (สำนักงานใหญ่)

            <br> ที่อยู่ 53/173-174 ถ.สุขุมวิท ต.บ้านหลังสวน อ.เมือง จ.ชลบุรี 20000 

            <br> เลขประจำตัวผู้เสียภาษี 010-55591-69039

            <br> โทร. 038-146782</td>

          <td class="col-md-4" rowspan="4" >

            <h3><?=$header_title;?></h3>

            <table class="table" cellspacing="0" width="100%" border="1">

              <tr>

                <td>วันที่ : <?=date("d-m-Y", strtotime($create_at));?></td>

              </tr>

              <tr>

                <td>เลขที่ใบเสร็จ : <?=$no_bill_branch?></td>

              </tr>

            </table>

          </td>

        </tr>

        <tr>

      <td colspan="2" class="text-left">ชื่อลูกค้า : <?=$customer_name?>  (ที่ทำงาน HMS สาขา <?=$branch_name?>)</td>

      </tr>

      <tr>

        <td colspan="2" class="text-left">ที่อยู่ : <?=$branch_address?></td>

      </tr>

      <tr>

        <td colspan="2" class="text-left">เลขประจำตัวผู้เสียภาษี : <?=$branch_number_card?></td>

      </tr>

      </table>

      <table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">

        <thead>

        <tr>

            <th class="col-md-1"><center>ลำดับ</center></th>

            <th class="col-md-8"><center>รายละเอียด</center></th>

            <th class="col-md-3" colspan="2"><center>ราคา</center></th>

        </tr>

        </thead>

        <tbody>

          <tr>

            <td><center>1</center></td>

            <td > ค่ารอยัลตี้ฟีส์ วันที่ <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></td>

            <td colspan="2" class="text-right"><?=number_format(($price_self) , 2)?></td>

          </tr>

          

          <tr>

            <td colspan="2" ><center><?=num2wordsThai($price_self);?>ถ้วน</center></td>

            <td><center>รวมทั้งสิ้น</center></td>

            <td class="text-right"><font color="#fd0000"> <strong><?=number_format(($price_self) , 2)?></strong></font></td>

          </tr>

        </tbody>

      </table>

      (โปรดตรวจสอบความถูกต้องของรายการในเอกสารฉบับนี้ภายใน 7 วันมิฉะนั้นจะถือว่าสมบูรณ์)

 <br>

<h5> - ชำระเงินได้ที่ บัญชี บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด<font color="#1758ff"> <strong>เลขบัญชี 880-0-11081-9 </strong></font>ธนาคารกรุงไทย สาขาวรรณสรณ์</h5>



      <table class="table borderless" cellspacing="0" width="100%">

        <tr>

          <td class="col-md-8" colspan="2"></td>

          <td class="col-md-2">

            <table class="table">

            <tr>

              <td><center>ผู้มีอำนาจลงนาม  ___________________</center></td>

            </tr>

            <tr>

              <td><center>(.........../.........../...........)</center></td>

            </tr>

            </table>

          </td>

          <td class="col-md-2">

            <table class="table">

            <tr>

              <td><center>ผู้รับเงิน  ___________________</center></td>

            </tr>

            <tr>

              <td><center>(.........../.........../...........)</center></td>

            </tr>

            </table>

          </td>

        </tr>

      </table>

          </td>

        </tr>

      </table>

<? }mysqli_close($con_ajtongmath_self);?>

</page>