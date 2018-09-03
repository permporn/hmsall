<?
include ("config.inc.php");
	$strSQL = "INSERT INTO term ";
	$strSQL .="(term) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["term"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	header("location:term.php");
?>