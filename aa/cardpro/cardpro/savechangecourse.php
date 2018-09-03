<?
include ("config.inc.php");
$strSQL = "UPDATE learn SET ";
	$strSQL .="subcode = '".$_GET["subcode"]."' ";
	$strSQL .=",seat = '".$_GET["seat"]."' ";
	$strSQL .="WHERE learnid = '".$_GET["learnid"]."' ";
	$objQuery = mysql_query($strSQL);
	$learnid=$_GET["learnid"];$id_year=$_GET["id_year"];$branchid=$_GET["branchid"];
	header("location:editstudent.php?learnid=$learnid&id_year=$id_year&branchid=$branchid");
?>