<?
include ("config.inc.php");
	$strSQL = "INSERT INTO subject ";
	$strSQL .="(subname,subcode,price,day,time,date,edate,type,roomid,teachid,id_year) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["subname"]."','".$_POST["code"]."' ";
	$strSQL .=",'".$_POST["price"]."' ";
	$strSQL .=",'".$_POST["day"]."' ";
	$strSQL .=",'".$_POST["time"]."' ";
	$strSQL .=",'".$_POST["date"]."' ";
	$strSQL .=",'".$_POST["edate"]."' ";
	$strSQL .=",'".$_POST["type"]."' ";
	$strSQL .=",'".$_POST["room"]."' ";
	$strSQL .=",'".$_POST["teacher"]."' ";
	$strSQL .=",'".$_POST["term"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:Subject1.php");
	?>