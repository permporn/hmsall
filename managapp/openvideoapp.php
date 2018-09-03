<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

$status = $_GET["status"];
$id_ref_video = $_GET["id_ref_video"];
if($status == 0){
	$strSQL = "UPDATE path_video SET ";
	$strSQL .="status = '1' ";
	$strSQL .="WHERE id_ref_video =  '".$id_ref_video."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if(!$objQuery){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('เปิด เรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
}
else{
	$strSQL = "UPDATE path_video SET ";
	$strSQL .="status = '0' ";
	$strSQL .="WHERE id_ref_video =  '".$id_ref_video."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if(!$objQuery){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ไม่สำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ปิด เรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
}
?>