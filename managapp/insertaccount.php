<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
$check1=0;
$check2=0;
$s=date('Y-m-d');	
	$name = $_GET['show_arti_topic'];
	$idname1 = $_GET['h_arti_id1'];
	$idname2 = $_GET['h_arti_id2'];
	$id = $idname2.$idname1;
	//echo $idname1.",".$idname2;
	$namevideo = $_GET['show_arti_topic_subj'];
	$idvideo = $_GET['h_arti_id_subj'];
	
	$strSQL4 = "SELECT * FROM path_video WHERE id_ref_video = $idvideo ";
    $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
	$objResult4 = mysql_fetch_array($objQuery4);
	
if($id != '' &&  $idvideo != ''){
	$strSQL2 = "SELECT * FROM map_video WHERE studentid = $id AND id_ref_video = $idvideo ";
    $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);
	
	$strSQL3 = "SELECT * FROM learn WHERE studentid = $id ";//AND subcode = '".$objResult4["subcode"]."' AND id_year = '".$objResult4["id_year"]."' ";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3);
	
	if($objResult2 == '' && $objResult3 == '' ){
			$strSQL4 = "SELECT MAX(seat) as maxseat FROM learn WHERE subcode = '".$namevideo."'";
			$objQuery4 = mysql_query($strSQL4);
			$maxseat = mysql_fetch_array($objQuery4) or die ("Error Query [".$strSQL4."]");
		
			$seatnew = $maxseat["maxseat"]+1;
			$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
			
			$strSQL = "INSERT INTO learn ";
			$strSQL .="(studentid,seat,subcode,pass,updateday,regisdate,id_year) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$id."' ";
			$strSQL .=",'".$seatnew."' ";
			$strSQL .=",'".$objResult4['subcode']."' ";
			$strSQL .=",'".$random."' ";
			$strSQL .=",'".$s."' ";
			$strSQL .=",'".$s."' ";
			$strSQL .=",'".$objResult4['id_year']."') ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			
			if(!$objQuery){
				echo "<script>alert('การบันทึกไม่สำเร็จ(1)');</script>";
				echo "<script>window.location='addaccount.php';</script>";}
				
			else{
				$strSQL7 = "SELECT * FROM learn WHERE studentid = $id AND subcode = '".$objResult4["subcode"]."' AND id_year = '".$objResult4["id_year"]."' ";
				$objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]");
				$objResult7 = mysql_fetch_array($objQuery7);
				
				$strSQL6 = "INSERT INTO  map_video (`studentid` ,`id_ref_video`,`learnid`)";
				$strSQL6 .= " VALUES ('".$id."'";
				$strSQL6 .= ",'".$idvideo."'";
				$strSQL6 .= ",'".$objResult7["learnid"]."')";
				$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
				if(!$objQuery6){
					echo "<script>alert('การบันทึกไม่สำเร็จ(2)');</script>";
					echo "<script>window.location='addaccount.php';</script>";}
				else{
					echo "<script>alert('บันทึกเรียบร้อย');</script>";
					echo "<script>window.location='addaccount.php';</script>";}
			}
	}
	if($objResult2 == '' && $objResult3 != ''){
			$strSQL6 = "INSERT INTO  map_video (`studentid` ,`id_ref_video`,learnid)";
			$strSQL6 .= " VALUES ('".$id."'";
			$strSQL6 .= ",'".$idvideo."'";
			$strSQL6 .= ",'".$objResult3["learnid"]."')";
			$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
			if(!$objQuery6){
			echo "<script>alert('การบันทึกไม่สำเร็จ(2)');</script>";
			echo "<script>window.location='addaccount.php';</script>";}
			else{
			echo "<script>alert('บันทึกเรียบร้อย');</script>";
			echo "<script>window.location='addaccount.php';</script>";}
	}else{
			echo "<script>alert('มีรายชื่อ $name เรียน $namevideo อยู่ในระบบอยู่แล้วค่ะ');</script>";
			echo "<script>window.location='addaccount.php';</script>";}
}else{
	echo "<script>alert('การส่งค่าไอดี ผิดพลาด หรือ เลือกวีดีโอผิดประเภท');</script>";
	echo "<script>window.location='addaccount.php';</script>";}
?>