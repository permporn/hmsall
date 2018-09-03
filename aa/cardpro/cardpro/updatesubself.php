<?
include ("config.inc.php");
$strSQL = "UPDATE subject SET ";
	$strSQL .="subname = '".$_POST["subname"]."' ";
	$strSQL .=",subcode = '".$_POST["code"]."' ";
	$strSQL .=",price = '".$_POST["price"]."' ";
	$strSQL .=",roomid = '".$_POST["room"]."' ";
	$strSQL .=",teachid = '".$_POST["teacher"]."' ";
	$strSQL .="WHERE subid = '".$_GET["subid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["subid"];
	header("location:editsubself.php?subid=$k&action=1");
?>