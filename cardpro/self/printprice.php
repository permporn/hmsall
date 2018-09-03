<?php
ob_start();
session_start();
include("ck_session_self.php");
include("../funtion.php");

echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
?>
 <style type="text/css"> 

    #printable { display: block; }
    
    @media print 
    { 
       #non-printable { display: none; } 
       #printable { display: block; } 
    } 

</style> 
<html>
    <head>
        <style>
            body {
                height: 842px;
                width: 650px;
                /* to centre page on screen
                margin-left: auto;
                margin-right: auto;*/
            }
      .tbl-border { font-family:Tahoma, Geneva, sans-serif ;border:groove 1 #777; /*-webkit-box-shadow: #AAA 0px 0px 15px;*/} 
      .tblyy12 { font-size:12px; border-bottom:groove 1 #777; padding: 2px; }
      .tblyy13 { font-size:12px; color: #000; background: #fff; padding: 2px; } 
      .tblyy { font-size:11px; color: #000; background: #fff; padding: 5px; } 
      .tblyy14 { font-size:12px; color: #000; padding: 2px;border:1px solid #666666}
      .tblyy142 { font-size:12px; color: #000; background: #fff; padding: 2px;border:1px solid #666666}
      .tbl-border2 { font-family:Tahoma, Geneva, sans-serif; table-layout:fixed ;empty-cells:show; border-collapse:collapse; /*-webkit-box-shadow: #AAA 0px 0px 15px;*/} 
        
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
       
    </head>
    <body>
<?

if( $_GET["accid"] !== ''){ 

$accid = $_GET["accid"]; 
       
$strSQL = "SELECT 
      student.name,
      account.username, 
      account.password, 
      account.no_bill_branch,
      account.no_bill_all, 
      credit.type_pay, 
      credit.creditid,
      staff.stname, 
      account.accid,
      branch.sub_name AS sub_name,
      branch.address AS address,
      branch.number_card AS number_card,
      branch.type AS branch_type,
      branch.phone AS branch_phone,
      student.studentid
      FROM account
      JOIN student ON account.studentid = student.studentid
      JOIN credit ON account.accid = credit.accid
      JOIN staff ON credit.staffid = staff.stid
      JOIN branch ON account.status = branch.branchid
      WHERE account.accid =  '$accid'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

$strSQL_payathai = "SELECT * FROM branch 
      WHERE branchid =  1";
$objQuery_payathai = mysql_query($strSQL_payathai);
$objResult_payathai = mysql_fetch_array($objQuery_payathai);

?>

      <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" align="left" style="margin-top:20px; padding:10px">
       <tr>
         
         <td width="30%" colspan="1" align="left" class="tblyy">
         <strong><br><font size="-1"><?=$objResult["sub_name"]?></font></strong>
         <br><font size="-2"><?=$objResult["address"]?></font>
         <? if($objResult["number_card"]){ ?>
         <br><font size="-2">เลขผู้เสียภาษี : <?=$objResult["number_card"]?></font>
         <? }?>
         <? if($objResult["branch_phone"]){ ?>
         <br><font size="-2">โทร : <?=$objResult["branch_phone"]?></font>
         <? }?>
         </td>
         <td width="40%" colspan="1" align="center" class="tblyy">
         <? if($objResult["branch_type"]== 0){?>
         <img src="../images/logo01.png" width="67" height="67"/>
         <br><strong><?=$objResult_payathai['sub_name'];?></strong>
         <br><?=$objResult_payathai['address'];?>
         <? }else{ ?>
         <img src="../book_store/images/HMS_LOGO.png" height="67"/>
         <br><strong><?=$objResult_payathai['sub_name'];?></strong>
         <br><?=$objResult_payathai['address'];?>
         <? }?>
        </td>
          <td width="30%" colspan="1" align="center" class="tblyy"></td>
       </tr>
       <tr>
            <td width="30%" colspan="1" align="center" class="tblyy"></td>
            <td width="" colspan="1" align="center" class="tblyy">
            <strong>ใบเสร็จชำระเงิน</strong>
            <br><strong>RECEIPT</strong></td>
            <td width="" colspan="1" align="center" class="tblyy">
               <table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
                  <tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#00FFFF">สำหรับ ลูกค้า</td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$objResult["accid"]?></td></tr>
                    <? if($objResult["no_bill_branch"]){?>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ใบเสร็จสาขา <br><?=$objResult["no_bill_branch"]?></td>
                    </tr>
                    <!-- <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ใบเสร็จสนง.ใหญ่ <br><?=$objResult["no_bill_all"]?></td>
                    </tr> -->
                    <? }?>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=date('d-m-Y')?></td></tr>
               </table>
            </td>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">[ <?=$objResult['studentid'];?> ] ชื่อ - นามสกุล : <?=$objResult["name"]?> 
            (Username: <?=$objResult["username"]?> Pass: <?=$objResult["password"]?>)</td>
       </tr>
       <tr>
          <td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                      <td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน(บ.)</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    <? $strSQL2 = "SELECT credit.codetransfer, 
                    subject.subname, 
                    staff.stname ,
                    branch.name ,
                    staff.stid ,
                    credit.date_pay ,
                    credit.creditid ,
                    no_petition ,
                    no_petition_staff,
                    teachername,
                    credit.amount,
                    sr.name_subject_real
                  FROM credit 
                  INNER JOIN subject ON credit.subid = subject.subid
                  INNER JOIN staff ON credit.staffid = staff.stid
                  INNER JOIN branch ON staff.branchid = branch.branchid
                  LEFT JOIN subject_real sr ON subject.id_subject_real = sr.id_subject_real
                  LEFT JOIN teacher t ON sr.id_teacher = t.teacherid 
                  WHERE credit.accid = '".$_GET["accid"]."'";
          $objQuery2 = mysql_query($strSQL2);
          while ($objResult2 = mysql_fetch_array($objQuery2)){
            if($objResult2['name_subject_real'] != ''){
              $subject = $objResult2['name_subject_real'];
            }else{
              $subject = $objResult2['subname'];
            }
          ?>
                    <tr>
                        <td width="62%" colspan="" align="left" class="tblyy14"  height="20"><?=$objResult2['codetransfer']?>  <?=$subject?></td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult2["amount"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <? 
          $sum = $sum + $objResult2["amount"];
           }?>
                    <tr>
                      <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($sum)?></td>
                        <td width="21%" colspan="1" align="left" class="tblyy14"></td>
                    </tr>
                     
               </table>
            </td>
       </tr>
       <tr>
          <td width="" colspan="3" align="right" class="tblyy13">หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐาน</td>
       </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">ชำระโดย :
            <?
      if($objResult["type_pay"] == "free"){ echo "ฟรี";}
      elseif($objResult["type_pay"] == "money"){ echo "เงินสด";}
      elseif($objResult["type_pay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
      elseif($objResult["type_pay"] == "cradit"){ echo "บัตรเคดิต";} 
      elseif($objResult["type_pay"] == "test"){ echo "ทดลองเรียนฟรี";}
      else{ echo "-";}
      ?>
            </td>
       </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["stname"]?> (____________________)(ว/ด/ป ____________)</td>
       </tr>
      </table>    
      <br>
      <br>
      ------------------------------------------------------------------------------------------------------------------------
      <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" align="left" style="margin-top:20px; padding:10px">
       <tr>
         
         <td width="30%" colspan="1" align="left" class="tblyy">
         <strong><br><font size="-1"><?=$objResult["sub_name"]?></font></strong>
         <br><font size="-2"><?=$objResult["address"]?></font>
         <? if($objResult["number_card"]){ ?>
         <br><font size="-2">เลขผู้เสียภาษี : <?=$objResult["number_card"]?></font>
         <? }?>
         <? if($objResult["branch_phone"]){ ?>
         <br><font size="-2">โทร : <?=$objResult["branch_phone"]?></font>
         <? }?>
         </td>
         <td width="40%" colspan="1" align="center" class="tblyy">
         <? if($objResult["branch_type"]== 0){?>
         <img src="../images/logo01.png" width="67" height="67"/>
         <br><strong><?=$objResult_payathai['sub_name'];?></strong>
         <br><?=$objResult_payathai['address'];?>
         <? }else{ ?>
         <img src="../book_store/images/HMS_LOGO.png" height="67"/>
         <br><strong><?=$objResult_payathai['sub_name'];?></strong>
         <br><?=$objResult_payathai['address'];?>
         <? }?>
         </td>
          <td width="30%" colspan="1" align="center" class="tblyy"></td>
       </tr>
       <tr>
            <td width="30%" colspan="1" align="center" class="tblyy"></td>
            <td width="" colspan="1" align="center" class="tblyy">
            <strong>ใบเสร็จชำระเงิน</strong>
            <br><strong>RECEIPT</strong></td>
            <td width="" colspan="1" align="center" class="tblyy">
               <table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
                  <tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#FF6666">สำหรับ เจ้าหน้าที่</td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$objResult["accid"]?></td></tr>
                    <? if($objResult["no_bill_branch"]){?>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ใบเสร็จสาขา <br><?=$objResult["no_bill_branch"]?></td>
                    </tr>
                    <!-- <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ใบเสร็จสนง.ใหญ่ <br><?=$objResult["no_bill_all"]?></td>
                    </tr> -->
                    <? }?>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=date('d-m-Y')?></td></tr>
               </table>
            </td>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">[ <?=$objResult['studentid'];?> ] ชื่อ - นามสกุล : <?=$objResult["name"]?>
            (Username: <?=$objResult["username"]?> Pass: <?=$objResult["password"]?>)</td>
       </tr>
       <tr>
          <td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                      <td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน(บ.)</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    </tr>
                    <? 
          $sum = 0;
          $strSQL2 = "SELECT 
          credit.codetransfer, 
          subject.subname, 
          staff.stname ,
          branch.name ,
          staff.stid ,
          credit.date_pay ,
          credit.creditid ,
          no_petition ,
          no_petition_staff,
          teachername,
          credit.amount,
          sr.name_subject_real
                  FROM credit 
                  INNER JOIN subject ON credit.subid = subject.subid
                  INNER JOIN staff ON credit.staffid = staff.stid
                  INNER JOIN branch ON staff.branchid = branch.branchid
                  LEFT JOIN subject_real sr ON subject.id_subject_real = sr.id_subject_real
                  LEFT JOIN teacher t ON sr.id_teacher = t.teacherid 
                  WHERE credit.accid = '".$_GET["accid"]."'";
          $objQuery2 = mysql_query($strSQL2);
          while ($objResult2 = mysql_fetch_array($objQuery2)){
            if($objResult2['name_subject_real'] != ''){
              $subject = $objResult2['name_subject_real'];
            }else{
              $subject = $objResult2['subname'];
            }
          ?>
                    <tr>
                      <td width="62%" colspan="" align="left" class="tblyy14"  height="20"><?=$objResult2['codetransfer']?>  <?=$subject?></td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult2["amount"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
          <? 
          $sum = $sum + $objResult2["amount"];
          }?>
                    <tr>
                      <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($sum)?></td>
                        <td width="21%" colspan="1" align="left" class="tblyy14"></td>
                    </tr>
                     
               </table>
            </td>
       </tr>
       <tr>
          <td width="" colspan="3" align="right" class="tblyy13">หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐาน</td>
       </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">ชำระโดย :
            <?
      if($objResult["type_pay"] == "free"){ echo "ฟรี";}
      elseif($objResult["type_pay"] == "money"){ echo "เงินสด";}
      elseif($objResult["type_pay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
      elseif($objResult["type_pay"] == "cradit"){ echo "บัตรเคดิต";} 
      elseif($objResult["type_pay"] == "test"){ echo "ทดลองเรียนฟรี";}
      else{ echo "-";}
      ?>
            </td>
       </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["stname"]?> (____________________)(ว/ด/ป ____________)</td>
       </tr>
      </table>    
<?
}else{
  echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
  echo "<script language='javascript'>alert('การส่งค่า ผิดพลาด');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=user_request_details.php'>";}     
        ?>

    <div id="non-printable"> 
        <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" >PRINT</button> </A></A>
        </div>
        </DIV>
    </body>
</html>

<?php mysql_close();?>
