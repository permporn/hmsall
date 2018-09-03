<?php 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

$pass = $_POST["pass"];
$studentid = $_POST["studentid"];
$id_year = $_POST["id_year"];
$id_subj = $_POST["h_arti_id_subj"];

		$strSQL2  = "SELECT * FROM path_video WHERE id_ref_video = '".$id_subj."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		
if($studentid != '' && $id_subj != ''){
		
		$strSQL = "UPDATE map_video SET ";
		$strSQL .="id_ref_video = '".$id_subj."' ";
		$strSQL .="WHERE `studentid` =  '".$studentid."'";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		
		if($objQuery = ''){
		echo "<script language='javascript'>alert('บันทึกไม่สำเร็จ(2)');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=editstudent.php?studentid=$studentid&pass=$pass&action=AC'>";}
		else{
		echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=editstudent.php?studentid=$studentid&pass=$pass'>";}
}else{
	echo "<script language='javascript'>alert('การส่งค่าผิดพลาด หรือไม่ได้ทำการแก้ไข ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=editstudent.php?studentid=$studentid&pass=$pass&action=AC'>";}

?>