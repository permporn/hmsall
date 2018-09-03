<?
include("config.inc.php");
$strSQL = "SELECT * FROM subject WHERE roomid = '".$_GET["roomid"]."'";
$objQuery = mysql_query($strSQL);
$i=0;
while($objResult = mysql_fetch_array($objQuery))
{$i++;}
if($i>0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ไม่สามารถลบได้ เพราะมีการใช้ข้อมูลนี้ในวิชาเรียน');</script>";
echo "<meta http-equiv='refresh' content='0;URL=room.php'>";
}
else{
$strSQL = "DELETE FROM room ";
	$strSQL .="WHERE roomid = '".$_GET["roomid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:room.php");
}
?>