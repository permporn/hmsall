<?
include ("config.inc.php");
	$strSQL = "INSERT INTO branch ";
	$strSQL .="(branchname) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["branchname"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:branch.php");
?>