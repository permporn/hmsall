<?
include ("config.inc.php");
$strSQL = "UPDATE teacher SET ";
	$strSQL .="teachername = '".$_POST["teachername"]."' ";
	$strSQL .="WHERE teacherid = '".$_GET["teacherid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["teacherid"];
	header("location:editteacher.php?teacherid=$k&action=1");
?>