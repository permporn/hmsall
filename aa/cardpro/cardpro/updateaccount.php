<?
include ("config.inc.php");
$strSQL = "UPDATE account SET ";
	$strSQL .="username = '".$_POST["username"]."' ";
	$strSQL .=",Password = '".$_POST["password"]."' ";
	$strSQL .=",name = '".$_POST["name"]."' ";
	$strSQL .=",branchid = '".$_POST["branch"]."' ";
	$strSQL .=",status = '".$_POST["status"]."' ";
	$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["accid"];
	header("location:editaccount.php?accid=$k&action=1");
?>