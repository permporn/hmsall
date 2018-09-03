<?
include ("config.inc.php");
$strSQL = "UPDATE term SET ";
	$strSQL .="term = '".$_POST["term"]."' ";
	$strSQL .="WHERE termid = '".$_GET["termid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["termid"];
	header("location:editterm.php?termid=$k&action=1");
?>