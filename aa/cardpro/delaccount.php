<?
include("config.inc.php");
$strSQL = "DELETE FROM account ";
	$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:account.php");
?>