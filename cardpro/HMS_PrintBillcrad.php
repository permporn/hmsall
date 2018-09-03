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
	$id_staff = $_SESSION["accid_cardpro"];
	
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

if( $_GET['id_bill'] !== ''){	

$id_bill = $_GET['id_bill'];
$strSQL = "SELECT bill.date
				, bill.Payment
				, bill.money
				, allstd.school_studentid as idsch
				, allstd.selfdb_studentid as idsel
				, allstd.name as allname
				, acc.name as staffname
			FROM  hms_bill bill
			INNER JOIN hms_card card
				ON card.id_hms = bill.id_hms
			INNER JOIN hms_allstudent allstd
				ON allstd.id = card.id_allstudent
			INNER JOIN account acc
				ON acc.accid = bill.id_staff
			WHERE bill.id = '".$id_bill."' ";
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
        	<br><strong>RECEIPT</strong>
        </td>
        <td width="" colspan="1" align="center" class="tblyy">
        	<table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
            	<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#00FFFF">สำหรับ เจ้าหน้าที่</td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$_GET['id_bill'];?></td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date. <?=DateThaiDMY($objResult['date']);?></td></tr>
            </table>
        </td>
	<tr>
    	<td width="" colspan="2" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult['allname'];?></td>
        <td width="" colspan="1" align="left" class="tblyy13">รหัสนักเรียน: <?php if($objResult['idsch']!='0'){echo $objResult['idsch'];}else{echo $objResult['idsel'];}?></td>
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
                    <td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่า HMS Card</td>
                    <td width="17%" colspan="" align="center" class="tblyy14"><? if($objResult["money"] == '0'){echo "0";}else{ echo $objResult["money"];}?> บาท</td>
                    <td width="21%" colspan="" align="left" class="tblyy14"></td>
                </tr>
                <tr>
                    <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                    <td width="17%" colspan="1" align="center" class="tblyy14"><? if($objResult["money"] == '0'){echo "0";}else{ echo $objResult["money"];}?> บาท</td>
                    <td width="21%" colspan="1" align="left" class="tblyy14"></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td width="" colspan="3" align="right" class="tblyy13">หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐาน</td></tr>
    <tr>
    	<td width="" colspan="3" align="left" class="tblyy13">ชำระโดย :
        <?
			if($objResult["Payment"] == "monay"){ echo "เงินสด";}
            if($objResult["Payment"] == "cradit"){ echo "บัตรเคดิต";} 
			if($objResult["Payment"] == "transfer"){ echo "โอน";} 
			if($objResult["Payment"] == "free"){ echo "ฟรี";} 
		?>
        </td>
    </tr>
    <tr>
    	<td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult['staffname'];?>  (____________________)(ว/ด/ป ____________)</td>
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
        <td width="40%" colspan="1" align="center" class="tblyy"><img src="images/logo01.png" width="67" height="67"/></td>
        <td width="30%" colspan="1" align="center" class="tblyy"></td>
    </tr>
    <tr>
    	<td width="30%" colspan="1" align="center" class="tblyy"></td>
        <td width="" colspan="1" align="center" class="tblyy"><strong>ใบเสร็จชำระเงิน</strong><br><strong>RECEIPT</strong></td>
        <td width="" colspan="1" align="center" class="tblyy">
            <table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
                <tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#FF6666">สำหรับ ลูกค้า</td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No. <?=$_GET['id_bill'];?></td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date. <?=DateThaiDMY($objResult['date']);?></td></tr>
            </table>
        </td>
    </tr>
        <tr>
            <td width="" colspan="2" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult['allname'];?></td>
            <td width="" colspan="1" align="left" class="tblyy13">รหัสนักเรียน: 
            <?php if($objResult['idsch']!='0'){echo $objResult['idsch'];}else{echo $objResult['idsel'];}?></td>
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
                    <td width="62%" colspan="" align="left" class="tblyy14"  height="20">- ค่า HMS Card</td>
                    <td width="17%" colspan="" align="center" class="tblyy14"><? if($objResult["money"] == 0){ echo "0";}else{echo $objResult["money"];}?> บาท</td>
                    <td width="21%" colspan="" align="left" class="tblyy14"></td>
                </tr>
                <tr>
                    <td width="62%" colspan="1" align="right" class="tblyy14"  height="20">รวมเงินชำระ</td>
                    <td width="17%" colspan="1" align="center" class="tblyy14"><? if($objResult["money"] == 0){ echo "0";}else{echo $objResult["money"];}?> บาท</td>
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
            if($objResult["Payment"] == "monay"){ echo "เงินสด";}
            if($objResult["Payment"] == "cradit"){ echo "บัตรเคดิต";} 
			if($objResult["Payment"] == "transfer"){ echo "โอน";} 
			if($objResult["Payment"] == "free"){ echo "ฟรี";} 
        ?>
        </td>
    </tr>
    <tr><td width="" colspan="3" align="left" class="tblyy13">ผู้รับเงิน : เจ้าหน้าที่่ <?=$objResult['staffname'];?>  (____________________)(ว/ด/ป ____________)</td></tr>
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