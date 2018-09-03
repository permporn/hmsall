<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

if($_GET["id_ref_video"] != ''){
	
$strSQL = "DELETE FROM path_video ";
$strSQL .="WHERE id_ref_video = '".$_GET["id_ref_video"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
if($objQuery = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
	}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('เรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
	}
	}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ไม่มีค่าส่งมา');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";}
?>