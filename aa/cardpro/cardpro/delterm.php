<?
include("config.inc.php");

	$strSQL1 = "DELETE FROM addterm ";
	$strSQL1 .="WHERE id_year = '".$_GET["id_year"]."' ";
	$objQuery1 = mysql_query($strSQL1);
	header("location:term.php");

?>