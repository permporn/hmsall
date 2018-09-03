<?
include("config.inc.php");
$strSQL = "SELECT * FROM subject WHERE termid = '".$_GET["termid"]."'";
$objQuery = mysql_query($strSQL);
$i=0;
while($objResult = mysql_fetch_array($objQuery))
{$i++;}
if($i>0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ไม่สามารถลบได้ เพราะมีการใช้ข้อมูลนี้ในวิชาเรียน');</script>";
echo "<meta http-equiv='refresh' content='0;URL=term.php'>";
}
else{
$strSQL1 = "DELETE FROM term ";
	$strSQL1 .="WHERE termid = '".$_GET["termid"]."' ";
	$objQuery1 = mysql_query($strSQL1);
	header("location:term.php");
}
?>