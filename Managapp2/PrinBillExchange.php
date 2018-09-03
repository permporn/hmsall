<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
	
/*function upstatusLCP($id_lcp){
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
	echo "<script language='javascript'>alert('testtttttttttt');</script>";
}*/
?>
<html>
<head>
<style type="text/css"> 
#printable { display: block; }
@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
body {
height: 842px;
width: 650px;
}
.tbl-border { font-family:Tahoma, Geneva, sans-serif ;border:groove 1 #777; } 
.tblyy12 { font-size:12px; border-bottom:groove 1 #777; padding: 2px; }
.tblyy13 { font-size:12px; color: #000; background: #fff; padding: 2px; } 
.tblyy { font-size:11px; color: #000; background: #fff; padding: 5px; } 
.tblyy14 { font-size:12px; color: #000; padding: 2px;border:1px solid #666666}
.tblyy142 { font-size:12px; color: #000; background: #fff; padding: 2px;border:1px solid #666666}
.tbl-border2 { font-family:Tahoma, Geneva, sans-serif; table-layout:fixed ;empty-cells:show; border-collapse:collapse; } 
 </style>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>
</head>
<body>
<?
$id_Bill_video = $_GET['id_Bill_video']; 

if($id_Bill_video !== ''){	
$strSQL = "SELECT student.studentname 
					,account.name as staff 
					,student.studentid 
					,learn.pass 
					,bill_video.TypePay  
					,bill_video.Price 
					,bill_video.date_bill as date 
					,subj_video.name_subj
			FROM  bill_video 
			INNER JOIN student
				ON bill_video.id_student = student.studentid
			INNER JOIN account
				ON bill_video.staff = account.accid
			INNER JOIN subj_video
				ON bill_video.id_subject = subj_video.id_subj_video
			INNER JOIN learn
				ON bill_video.id_learn = learn.learnid
			WHERE bill_video.id_Bill_video = '".$id_Bill_video."' ";
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
         <img src="img/logo01.png" width="67" height="67"/>
        
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
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$id_Bill_video?></td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=$objResult["date"]?></td></tr>
               </table>
            </td>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult["studentname"]?> 
            (Username: <?=$objResult["studentid"]?> Pass: <?=$objResult["pass"]?>)</td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                    	<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน(บ.)</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">APP <?=$objResult['name_subj']?></td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["Price"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($objResult["Price"])?></td>
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
			if($objResult["TypePay"] == "free"){ echo "ฟรี";}
			if($objResult["TypePay"] == "monay"){ echo "เงินสด";}
			if($objResult["TypePay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
			if($objResult["TypePay"] == "cradit"){ echo "บัตรเคดิต";} 
			?>
            </td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["staff"]?> (____________________)(ว/ด/ป ____________)</td>
       </tr>
      </table>    
      <br>
      <br>
      ------------------------------------------------------------------------------------------------------------------------
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
         <img src="img/logo01.png" width="67" height="67"/>
        
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
               		<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#00FF66">สำหรับ เจ้าหน้าที่</td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$id_Bill_video?></td></tr>
                    <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=$objResult["date"]?></td></tr>
               </table>
            </td>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult["studentname"]?> 
            (Username: <?=$objResult["studentid"]?> Pass: <?=$objResult["pass"]?>)</td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="center" class="tblyy">
               <table  width="100%" align="center" class="tbl-border2" >
                    <tr>
                    	<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
                        <td width="17%" colspan="" align="center" class="tblyy14">จำนวนเงิน(บ.)</td>
                        <td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="" align="left" class="tblyy14"  height="20">APP <?=$objResult['name_subj']?></td>
                        <td width="17%" colspan="" align="center" class="tblyy14"><?=number_format($objResult["Price"])?></td>
                        <td width="21%" colspan="" align="left" class="tblyy14"></td>
                    </tr>
                    <tr>
                    	<td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                        <td width="17%" colspan="1" align="center" class="tblyy14"><?=number_format($objResult["Price"])?></td>
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
			if($objResult["TypePay"] == "free"){ echo "ฟรี";}
			if($objResult["TypePay"] == "monay"){ echo "เงินสด";}
			if($objResult["TypePay"] == "transfer"){ echo "โดนผ่านธนาคาร";}
			if($objResult["TypePay"] == "cradit"){ echo "บัตรเคดิต";} 
			?>
            </td>
       </tr>
       <tr>
       		<td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult["staff"]?> (____________________)(ว/ด/ป ____________)</td>
       </tr>
      </table> 
<? 
}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('การส่งค่า ผิดพลาด');</script>";}     
?>
<div id="non-printable"> 
        <A HREF="javascript:window.print()"><button style="margin-left:200px; width:100px; font-size:20px; height:60px;">PRINT</button></A>
        <input type="button" value="กลับ"  style="margin-left:20px; width:100px; font-size:20px; height:60px;" onClick="window.history.back()"/>
        </div>
        </DIV>
    </body>
</html>
<?php mysql_close();?>