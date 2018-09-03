<?
include ("config.inc.php");
$strSQL = "UPDATE subject SET ";
	$strSQL .="subname = '".$_POST["subname"]."' ";
	$strSQL .=",subcode = '".$_POST["code"]."' ";
	$strSQL .=",price = '".$_POST["price"]."' ";
	$strSQL .=",day = '".$_POST["day"]."' ";
	$strSQL .=",time = '".$_POST["time"]."' ";
	$strSQL .=",date = '".$_POST["date"]."' ";
	$strSQL .=",edate = '".$_POST["edate"]."' ";
	$strSQL .=",type = '".$_POST["type"]."' ";
	$strSQL .=",roomid = '".$_POST["room"]."' ";
	$strSQL .=",teachid = '".$_POST["teacher"]."' ";
	$strSQL .=",termid = '".$_POST["term"]."' ";
	$strSQL .="WHERE subid = '".$_GET["subid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["subid"];
	header("location:editsub.php?subid=$k&action=1");
?>