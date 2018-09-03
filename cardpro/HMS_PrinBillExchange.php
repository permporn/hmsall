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
	
	function upstatusLCP($id_lcp)
	{
		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
		echo "<script language='javascript'>alert('testtttttttttt');</script>";
	}
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

if( $_GET['id_lcp'] !== ''){	
$id_icp = $_GET['id_lcp']; 
$strSQL = "SELECT lcp.id, allst.name, lcp.date, rw.rewards, rw.use_point, card.id_card, acc.name staff
			FROM  hms_logchengpoint lcp
			INNER JOIN hms_card card
				ON card.id_hms = lcp.id_hms
			INNER JOIN hms_allstudent allst
				ON allst.id = card.id_allstudent
			INNER JOIN hms_rewards rw
				ON rw.id = lcp.id_rewards
			INNER JOIN account acc
				ON acc.accid = lcp.id_staff
			WHERE lcp.id = '".$_GET['id_lcp']."' ";
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
        <td width="40%" colspan="1" align="center" class="tblyy"><img src="images/logo01.png" width="67" height="67"/></td>
        <td width="30%" colspan="1" align="center" class="tblyy"></td>
	</tr>
    <tr>
    	<td width="30%" colspan="1" align="center" class="tblyy"></td>
        <td width="" colspan="1" align="center" class="tblyy"><strong>หลักฐานการแลกรับของ</strong><br><strong>RECEIPT</strong></td>
        <td width="" colspan="1" align="center" class="tblyy">
        	<table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
            	<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#00FFFF">สำหรับ เจ้าหน้าที่</td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.<?=$objResult['id']?></td></tr>
                <tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=DateThaiDMY($objResult['date'])?></td></tr>
			</table>
		</td>
	<tr>
    	<td width="" colspan="2" align="left" class="tblyy13">ชื่อ - นามสกุล : <?=$objResult['name']?></td>
        <td width="" colspan="1" align="left" class="tblyy13">รหัสบัตร: <?=$objResult['id_card']?></td>
	</tr>
    <tr>
		<td width="" colspan="3" align="center" class="tblyy">
			<table  width="100%" align="center" class="tbl-border2" >
				<tr>
					<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
					<td width="17%" colspan="" align="center" class="tblyy14">จำนวน Point</td>
					<td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
				</tr>
				<tr>
                    <td width="62%" colspan="" align="left" class="tblyy14"  height="20">- แลกรับ <?=$objResult['rewards']?></td>
                    <td width="17%" colspan="" align="center" class="tblyy14"><?=$objResult['use_point']?></td>
                    <td width="21%" colspan="" align="left" class="tblyy14"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="" colspan="3" align="right" class="tblyy13">หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐานในการรับของ พร้อมบัตร HMS</td>
	</tr>
	<tr>
		<td width="" colspan="3" align="left" class="tblyy13">ผู้ดำเนินการ : เจ้าหน้าที่่ <?=$objResult["staff"]?></td>
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
		<td width="" colspan="1" align="center" class="tblyy">
		<strong>หลักฐานการแลกรับของ</strong>
		<br><strong>RECEIPT</strong></td>
		<td width="" colspan="1" align="center" class="tblyy">
			<table class="tbl-border" cellpadding="0" cellspacing="1" width="75%" align="right" >
				<tr><td width="" colspan="" align="left" class="tblyy12" bgcolor="#FF6666">สำหรับ ลูกค้า</td></tr>
				<tr><td width="" colspan="" align="left" class="tblyy12">เลขที่ No.
			  <?=$objResult['id']?></td></tr>
				<tr><td width="" colspan="" align="left" class="tblyy13">วันที่ Date.<?=DateThaiDMY($objResult['date'])?></td></tr>
			</table>
		</td>
	<tr>
		<td width="" colspan="2" align="left" class="tblyy13">ชื่อ - นามสกุล : 
	    <?=$objResult['name']?></td>
		<td width="" colspan="1" align="left" class="tblyy13">รหัสบัตร: 
	    <?=$objResult['id_card']?></td>
	</tr>
	<tr>
		<td width="" colspan="3" align="center" class="tblyy">
			<table  width="100%" align="center" class="tbl-border2" >
				<tr>
					<td width="62%" colspan="" align="center" class="tblyy14" height="20">รายการ</td>
					<td width="17%" colspan="" align="center" class="tblyy14">จำนวน Point</td>
					<td width="21%" colspan="" align="center" class="tblyy14">หมายเหตุ</td>
				</tr>
				<tr>
					<td width="62%" colspan="" align="left" class="tblyy14"  height="20">- แลกรับ 
				    <?=$objResult['rewards']?></td>
					<td width="17%" colspan="" align="center" class="tblyy14"><?=$objResult['use_point']?></td>
					<td width="21%" colspan="" align="left" class="tblyy14"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td width="" colspan="3" align="right" class="tblyy13">หมายเหตุ : กรุณาเก็บใบเสร็จไว้เป็นหลักฐานในการรับของ พร้อมบัตร HMS</td>
	</tr>
	<tr>
		<td width="" colspan="3" align="left" class="tblyy13">ผู้ดำเนินการ : เจ้าหน้าที่่ 
	    <?=$objResult["staff"]?></td>
	</tr>
    <?php $id_lcp = $objResult['id']?>
</table>    
<?
}else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('การส่งค่า ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=user_request_details.php'>";}     
        ?>

		<div id="non-printable"> 
        <A HREF="javascript:window.print()"> <button style="margin-left:200px; width:200px; font-size:20px; height:80px;" onClick="<?=upstatusLCP($id_lcp)?>" >PRINT</button> </A></A>
        </div>
        </DIV>
    </body>
</html>
<? }?>
<?php mysql_close();?>