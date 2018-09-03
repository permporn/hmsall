<?php
ob_start();
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
if($_GET['type']== 1){
	$id_hms = $_GET['id_hms'];
	$st = $_GET['st'];
	$en = $_GET['en'];
	$card_status = $_GET["card_status"];
	$branchid = $_GET["branchid"];
	$show_arti_topic = $_GET["show_arti_topic"];
	$h_arti_id = $_GET['h_arti_id'];
	$now = date("Y-m-d");
	
	$strSQL = "UPDATE hms_card
			 SET ReceiveCard =  '".$now."'
			 WHERE id_hms = '".$id_hms."' 
			" ;
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if($objQuery){
		echo "<script>window.location='HMS_PrintCardAll.php?id_hms=$id_hms&st=$st&en=$en&card_status=$card_status&branchid=$branchid&show_arti_topic=$show_arti_topic&h_arti_id=$h_arti_id';</script>";
		}else 
		echo "<script language='javascript'>alert('ผิดพลาด!!');</script>";
		echo "<script>window.location='HMS_PrintCardAll.php?id_hms=$id_hms&st=$st&en=$en&card_status=$card_status&branchid=$branchid&show_arti_topic=$show_arti_topic&h_arti_id=$h_arti_id';</script>";
	}
	
?>