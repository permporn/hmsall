<?
include("config.inc.php");
$strSQL = "SELECT * FROM room WHERE branchid = '".$_GET["branchid"]."'";
$objQuery = mysql_query($strSQL);
$i=0;
while($objResult = mysql_fetch_array($objQuery))
{$i++;}
if($i>0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ไม่สามารถลบได้ เพราะมีการใช้ข้อมูลนี้ในห้องเรียนอยู่');</script>";
echo "<meta http-equiv='refresh' content='0;URL=branch.php'>";
}
else{
$strSQL = "DELETE FROM branch ";
	$strSQL .="WHERE branchid = '".$_GET["branchid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:branch.php");
}
?>