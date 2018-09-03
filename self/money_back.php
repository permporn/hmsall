<?php
include("config.inc.php");
ob_start();
include("funtion.php");

$reservid = $_GET["reservid"];

$strSQL = "SELECT * FROM `reserve` WHERE reservid = '".$reservid."'";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
//echo $strSQL."/".$objResult["section_s"]."<br>" ;

$accid = $objResult["accid"];
$section_s = $objResult["section_s"];
$section_e = $objResult["section_e"];
$section = ($section_e - $section_s)+1;
//echo $section_s."/".$section_e."=".$section."<br>";

$strSQL1 = "SELECT * FROM `account` WHERE accid = '".$accid."'";
$objQuery1 = mysql_query($strSQL1);
$objResult1 = mysql_fetch_array($objQuery1);
$totalcredit = $objResult1['totalcredit'];
$sumall = $totalcredit + $section;
//echo $sumall;
	$strSQL2 = "UPDATE account SET ";
	$strSQL2 .= " totalcredit = '".$sumall."' ";
	$strSQL2 .= "WHERE accid = '".$accid."'";
	$objQuery2 = mysql_query($strSQL2);
	
	$strSQL3 = "DELETE FROM reserve ";
	$strSQL3 .="WHERE reservid = '".$reservid."' ";
	$objQuery3 = mysql_query($strSQL3);
	
	if($objQuery2){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('คืนเคดิตแล้ว $section เคดิต เหลือ $sumall เคดิต  ');</script>";
		echo "<script language='javascript'>window.history.back();</script>";
		}
		if($objQuery3){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ลบการจอง');</script>";
		echo "<script language='javascript'>window.history.back();</script>";
		}
	
?>