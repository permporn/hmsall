<?
include("config.inc.php");
$strSQL = "DELETE FROM learn ";
	$strSQL .="WHERE learnid = '".$_GET["learnid"]."' ";
	$objQuery = mysql_query($strSQL);
	$subid=$_GET["subid"];
	$branchid=$_GET["branchid"];
	$termid=$_GET["termid"];
	header("location:student.php?subid=$subid&termid=$termid&branchid=$branchid");
?>