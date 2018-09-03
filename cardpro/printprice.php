<?php
session_start();
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include("funtion.php");
if($_SESSION["accid_cardpro"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid_cardpro"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	
	$objQuerySTT_bname = mysql_query("SELECT * FROM branch WHERE branchid = '".$objResultSTT["branchid"]."'");
	$objResultSTT_bname = mysql_fetch_array($objQuerySTT_bname);
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

if( $_GET["id"] !== ''){	

$idreq = $_GET["id"]; 
       
$strSQL = "SELECT ptt_r.course2_price,ptt_r.course_price,ptt_r.course_code,ptt_r.course_name,ptt_r.type, ptt_r.wishes,ptt_r.results,ptt_r.name ,ptt_r.id , ptt_r.money_pay ,ptt_r.money_repay ,ptt_r.money_fee ,ptt_r.money_balance ,ptt_r.type_pay,acc.name staff
			FROM  ptt_request ptt_r
			INNER JOIN account acc
				ON ptt_r.accid_user_money = acc.accid
			WHERE id = '".$idreq."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
?>

      <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" align="left" style="margin-top:20px; padding:10px">
       <tr>
         
       	 <td width="30%" colspan="1" align="left" class="tblyy">
         <strong><font size="-2">โรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง
         <br>High Solution Math School</font></strong>
         <font size="-2"><br>34 อาคาร C.P TOWER3 ตึกA
         <br>ถนนพญาไท เขตราชเทวี แขวงทุ่งพญาไท
         <br>กรุงเทพมหานคร 10400</font>
         </td>
         <td width="40%" colspan="1" align="center" class="tblyy">
         <img src="images/logo01.png" width="67" height="67"/>
        
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
               		<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#00FFFF">สำหรับ เจ้าหน้าที่</td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$objResult["id"]?></td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=date('d-m-y')?></td></tr>
               </table>
            </td>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult["name"]?></td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                    	<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่าใช้จ่าย</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_pay"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- คืนเงิน</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_repay"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่าธรรมเนียม</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_fee"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	
                        <? $sum = ($objResult["money_pay"]+ $objResult["money_fee"]) - $objResult["money_repay"]?>
                        <? if($sum >= 0){?> 
                        <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($sum)?></td>
                       <? }else{?>
                       	<td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมคืนเงิน</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format(substr("$sum",1));?></td>
                        <? }?>
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
			if($objResult["type_pay"] == "monay"){ echo "เงินสด";}
			if($objResult["type_pay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
			if($objResult["type_pay"] == "cradit"){ echo "บัตรเคดิต";} 
			?>
            </td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["staff"]?></td>
       </tr>
       <tr>
        <td width="" colspan="3" align="left" class="tblyy13">โดยทำการดำเนินการ : 
        <? echo $objResult["wishes"];
        if($objResult["type"]=="1"){
          echo "ขอคืนคอร์ส ชื่อคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"];
        }else if($objResult["type"]=="2"){
          echo "ขอย้าย,เปลี่ยนคอร์ส จากเดิมคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"]."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เปลี่ยนเป็นคอร์ส : ".$objResult["course2_name"]. " รหัสคอร์ส : ".$objResult["course2_code"]. " ราคา : ".$objResult["course2_price"];
        }else if($objResult["type"]=="3"){
          echo "แจ้งสลิปหลักฐานการสมัครหาย ชื่อคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"];
        }
        ?>
        </td>
      </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">หมายเหตุ : <?=$objResult["results"]?></td>
       </tr>
      </table>    
      
      
      <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" align="left" style="margin-top:20px; padding:10px">
       <tr>
         
       	 <td width="30%" colspan="1" align="left" class="tblyy">
         <strong><font size="-2">โรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง
         <br>High Solution Math School</font></strong>
         <font size="-2"><br>34 อาคาร C.P TOWER3 ตึกA
         <br>ถนนพญาไท เขตราชเทวี แขวงทุ่งพญาไท
         <br>กรุงเทพมหานคร 10400</font>
         </td>
         <td width="40%" colspan="1" align="center" class="tblyy">
         <img src="images/logo01.png" width="67" height="67"/>
        
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
               		<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#FF6666">สำหรับ ลูกค้า</td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$objResult["id"]?></td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=date('d-m-y')?></td></tr>
               </table>
            </td>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult["name"]?></td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                    	<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่าใช้จ่าย</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_pay"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- คืนเงิน</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_repay"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่าธรรมเนียม</td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["money_fee"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	
                        <? $sum = ($objResult["money_pay"]+ $objResult["money_fee"]) - $objResult["money_repay"]?>
                        <? if($sum >= 0){?> 
                        <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($sum)?></td>
                       <? }else{?>
                       	<td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมคืนเงิน</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format(substr("$sum",1));?></td>
                        <? }?>
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
			if($objResult["type_pay"] == "monay"){ echo "เงินสด";}
			if($objResult["type_pay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
			if($objResult["type_pay"] == "cradit"){ echo "บัตรเคดิต";} 
			?>
            </td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["staff"]?></td>
      </tr>
      <tr>
        <td width="" colspan="3" align="left" class="tblyy13">โดยทำการดำเนินการ : 
        <? echo $objResult["wishes"];
        if($objResult["type"]=="1"){
          echo "ขอคืนคอร์ส ชื่อคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"];
        }else if($objResult["type"]=="2"){
          echo "ขอย้าย,เปลี่ยนคอร์ส จากเดิมคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"]."<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; เปลี่ยนเป็นคอร์ส : ".$objResult["course2_name"]. " รหัสคอร์ส : ".$objResult["course2_code"]. " ราคา : ".$objResult["course2_price"];
        }else if($objResult["type"]=="3"){
          echo "แจ้งสลิปหลักฐานการสมัครหาย ชื่อคอร์ส : ".$objResult["course_name"]. " รหัสคอร์ส : ".$objResult["course_code"]. " ราคา : ".$objResult["course_price"];
        }
        ?>
        </td>
      </tr>
       <tr>
          <td width="" colspan="3" align="left" class="tblyy13">หมายเหตุ : <?=$objResult["results"]?></td>
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
<? }?>
<?php mysql_close();?>