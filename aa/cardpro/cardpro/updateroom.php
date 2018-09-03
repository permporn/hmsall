<?
include ("config.inc.php");
$strSQL = "UPDATE room SET ";
	$strSQL .="roomname = '".$_POST["roomname"]."' ";
	$strSQL .=",total = '".$_POST["total"]."' ";
	$strSQL .=",branchid = '".$_POST["branch"]."' ";
	$strSQL .="WHERE roomid = '".$_GET["roomid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["roomid"];
	header("location:editroom.php?roomid=$k&action=1");
?>