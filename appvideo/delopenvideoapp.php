<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

if($_GET["id_ref_video"] != ''){
	$strSQL2 = "DELETE FROM map_video ";
	$strSQL2 .="WHERE id_ref_video = '".$_GET["id_ref_video"]."' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	if(!$objQuery2){ 
		echo "<script language='javascript'>alert('error1');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
		}
		else{
		echo "<script language='javascript'>alert('เรียบร้อย1');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
		}
	}
	$strSQL2 = "UPDATE path_video SET  ";
	$strSQL2 .=" subcode =  '' ";
	$strSQL2 .=",id_year = 0 ";
	$strSQL2 .="WHERE id_ref_video = '".$_GET["id_ref_video"]."' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	if(!$objQuery2){ 
		echo "<script language='javascript'>alert('error2');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
		}
		else{
		echo "<script language='javascript'>alert('เรียบร้อย2');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managcouressubj.php'>";
		}
	
	
?>