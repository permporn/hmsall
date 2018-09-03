<?
include("config.inc.php");
$strSQL = "SELECT * FROM subject WHERE teachid = '".$_GET["teacherid"]."'";
$objQuery = mysql_query($strSQL);
$i=0;
while($objResult = mysql_fetch_array($objQuery))
{$i++;}
if($i>0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ไม่สามารถลบได้ เพราะมีการใช้ข้อมูลนี้ในวิชาเรียน');</script>";
echo "<meta http-equiv='refresh' content='0;URL=teacher.php'>";
}
else{
$strSQL = "DELETE FROM teacher ";
	$strSQL .="WHERE teacherid = '".$_GET["teacherid"]."' ";
	$objQuery = mysql_query($strSQL);
	header("location:teacher.php");
}
?>