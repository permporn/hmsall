<?
include("config.inc.php");
$strSQL = "DELETE FROM even ";
	$strSQL .="WHERE evenid = '".$_GET["evenid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:even.php");
?>