<?
include("config.inc.php");

$i=1;
$strSQL = "SELECT * FROM account";
//$strSQL .=" order  by accid ASC";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysql_fetch_array($objQuery))
	{
	 echo $objResult["accid"];?>---<? echo $i; ?></br><? 
	$strSQL1 = "UPDATE account SET ";
	$strSQL1 .="studentid = '$i' ";
	$strSQL1 .="WHERE accid = '".$objResult["accid"]."' ";
	$objQuery1 = mysql_query($strSQL1);
if(!$objQuery1)
{
echo "Error Update [".mysql_error()."]"; ?></br><?
}
	$i++;
	}
?>
