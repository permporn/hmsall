<?
include ("config.inc.php");
$strSQL = "UPDATE even SET ";
	$strSQL .="even = '".$_POST["even"]."' ";
	$strSQL .="WHERE evenid = '".$_GET["evenid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["evenid"];
	header("location:editeven.php?evenid=$k&action=1");
?>