<?
include ("config.inc.php");
$s=date('Y-m-d');
	$strSQL = "INSERT INTO even ";
	$strSQL .="(even,date) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["even"]."','".$s."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:even.php");
?>