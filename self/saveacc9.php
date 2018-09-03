<?
include ("config.inc.php");
$strSQL = "UPDATE account SET ";
	$strSQL .="username = '".$_POST["username"]."' ";
	$strSQL .=",password = '".$_POST["password"]."' ";
	$strSQL .=",edate = '".$_POST["edate"]."' ";
	$strSQL .=",totalcredit = '".$_POST["totalcredit"]."' ";
	$strSQL .=",status = '".$_POST["status"]."' ";
	$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
	$k=$_GET["accid"];
	header("location:viewaccount9.php?accid=$k");
	?>