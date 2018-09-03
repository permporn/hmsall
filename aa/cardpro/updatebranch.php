<?
include ("config.inc.php");
$strSQL = "UPDATE branch SET ";
	$strSQL .="branchname = '".$_POST["branchname"]."' ";
	$strSQL .="WHERE branchid = '".$_GET["branchid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["branchid"];
	header("location:editbranch.php?branchid=$k&action=1");
?>