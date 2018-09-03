<?
include ("config.inc.php");
$strSQL = "UPDATE  yearterm SET ";
	$strSQL .="year = '".$_POST["year"]."' ";
	$strSQL .=",termid = '".$_POST["termid"]."' ";
	$strSQL .="WHERE id_year = '".$_GET["id_year"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["id_year"];
	header("location:editterm.php?id_year=$k&action=1");
?>