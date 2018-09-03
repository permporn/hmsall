<?
include ("config.inc.php");
$strSQL = "UPDATE learn SET ";
	$strSQL .="seat = '".$_GET["seat"]."' ";
	$strSQL .="WHERE learnid = '".$_GET["learnid"]."' ";
	$objQuery = mysql_query($strSQL);
	$learnid=$_GET["learnid"];$termid=$_GET["termid"];$branchid=$_GET["branchid"];
	header("location:editstudent.php?learnid=$learnid&termid=$termid&branchid=$branchid");
?>