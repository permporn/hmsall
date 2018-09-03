<?
include ("config.inc.php");
ob_start();
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);

$staffid=$_POST["staffid"];
$studenname=$_POST["studenname"];
$type_pay = $_POST["type_pay"];
$studentid = $_POST["studentid"];
$noptt = $_POST["noptt"];
$no_petition_staff = $_POST["no_petition_staff"];

	$strSQL = "UPDATE account SET ";
	$strSQL .="username = '".$_POST["username"]."' ";
	$strSQL .=",password = '".$_POST["password"]."' ";
	$strSQL .=",sdate = '".$_POST["sdate"]."' ";
	$strSQL .=",edate = '".$_POST["edate"]."' ";
	$strSQL .=",totalcredit = '".$_POST["totalcredit"]."' ";
	$strSQL .=",status = '".$_POST["status"]."' ";
	$strSQL .=",staffid = '".$staffid."' ";
	$strSQL .=",no_petition = '".$noptt."' ";
	$strSQL .=",no_petition_staff = '".$no_petition_staff."' ";
	$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
	$objQuery = mysql_query($strSQL);
	$k=$_GET["accid"];
	header("location:viewaccount.php?accid=$k&studenname=$studenname&std=$studentid");

?>