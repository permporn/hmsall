<?
include ("config.inc.php");
	$strSQL = "INSERT INTO room ";
	$strSQL .="(roomname,total,branchid) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["roomname"]."','".$_POST["total"]."' ";
	$strSQL .=",'".$_POST["branch"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:room.php");
?>