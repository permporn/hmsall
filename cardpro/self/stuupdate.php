<?
include("../config.inc.php");

$i=1;
$strSQL = "SELECT * FROM account";
//$strSQL .=" order  by accid ASC";
$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
while($objResult = mysqli_fetch_array($objQuery))
	{
	 echo $objResult["accid"];?>---<? echo $i; ?></br><? 
	$strSQL1 = "UPDATE account SET ";
	$strSQL1 .="studentid = '$i' ";
	$strSQL1 .="WHERE accid = '".$objResult["accid"]."' ";
	$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
if(!$objQuery1)
{
echo "Error Update [".mysqli_error()."]"; ?></br><?
}
	$i++;
	}
?>