<?
include ("config.inc.php");
	$strSQL = "INSERT INTO subject ";
	$strSQL .="(subname,subcode,price,type,roomid,teachid,termid) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["subname"]."','".$_POST["code"]."' ";
	$strSQL .=",'".$_POST["price"]."' ";
	$strSQL .=",'3' ";
	$strSQL .=",'".$_POST["room"]."' ";
	$strSQL .=",'".$_POST["teacher"]."' ";
	$strSQL .=",'9') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:Subjectself.php");
	?>