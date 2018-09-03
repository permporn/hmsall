<?
include("config.inc.php");
$strSQL = "DELETE FROM subject ";
	$strSQL .="WHERE subid = '".$_GET["subid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:Subjectself.php");
?>