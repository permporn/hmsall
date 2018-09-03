<?
include ("config.inc.php");
	$strSQL = "INSERT INTO teacher ";
	$strSQL .="(teachername) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["teachername"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:Teacher.php");
?>