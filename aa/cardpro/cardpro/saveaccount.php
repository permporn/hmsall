<?
include ("config.inc.php");
	$strSQL = "INSERT INTO account ";
	$strSQL .="(username,Password,name,branchid,status) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["username"]."','".$_POST["password"]."' ";
	$strSQL .=",'".$_POST["name"]."' ";
	$strSQL .=",'".$_POST["branch"]."' ";
	$strSQL .=",'".$_POST["status"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:account.php");
	?>