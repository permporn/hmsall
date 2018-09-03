<?
ob_start();
session_start();
$accid = $_SESSION["accid"];
include("config.inc.php");
$sec1=$_GET["section"];
$dateold=$_GET["dateold"];
$localold=$_GET["localold"];
$strSQL99 = "SELECT `$sec1` FROM seats where date = '".$_GET["date"]."' AND branchid = '".$_GET["branchid"]."'";
$objQuery99 = mysql_query($strSQL99);
$objResult99 = mysql_fetch_array($objQuery99);
if($objResult99["$sec1"]<=0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เครื่องเต็มแล้ว ไม่สามารถจองได้!!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=$localold'>";	
}
else {
$strSQL1 = "SELECT * FROM account where accid = '".$accid."'";
$objQuery1 = mysql_query($strSQL1);
$objResult1 = mysql_fetch_array($objQuery1);
if($objResult1["totalcredit"]==0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เครดิตไม่เพียงพอที่จะจองเวลาเรียนครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=$localold'>";
}
else if($objResult1["status"]==2&&$_GET["branchid"]!=2)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสาขาวงเวียนใหญ่เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=2'>";
}
else if($objResult1["status"]==3&&$_GET["branchid"]!=3)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสาขาวิสุทธานีเท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=3'>";
}
else if($objResult1["status"]==4&&$_GET["branchid"]!=5)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะพณาไทชั้น 9 เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=5'>";
}
else if($objResult1["status"]==6&&$_GET["branchid"]!=6)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสระบุรี สุขอนันต์ ปาร์ค เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=5'>";
}
else{
$strSQL = "INSERT INTO reserve ";
$strSQL .="(accid,status,time,section,branchid) ";
$strSQL .="VALUES ";
$strSQL .="('".$accid."','0','".$_GET["date"]."'";
$strSQL .=",'".$_GET["section"]."','".$_GET["branchid"]."') ";
$objQuery = mysql_query($strSQL);
$strSQL7 = "SELECT * FROM account where accid = '".$accid."'";
$objQuery7 = mysql_query($strSQL7);
$objResult7 = mysql_fetch_array($objQuery7);
$creditnew = $objResult7["totalcredit"]-1;
$strSQL6 = "UPDATE account SET ";
$strSQL6 .="totalcredit = '".$creditnew."' ";
$strSQL6 .="WHERE accid = '".$accid."' ";
$objQuery6 = mysql_query($strSQL6);
$sec=$_GET["section"];

$strSQL9 = "SELECT * FROM seats where branchid = '".$_GET["branchid"]."' AND date = '".$_GET["date"]."'";
$objQuery9 = mysql_query($strSQL9);

if(!$objQuery9)
{
echo "Error Save [".mysql_error()."]";
}

$objResult9 = mysql_fetch_array($objQuery9);
$seatnew=$objResult9["$sec"]-1;
$strSQL8 = "UPDATE seats SET ";
$strSQL8 .="`$sec` = '".$seatnew."' ";
$strSQL8 .="where branchid = '".$_GET["branchid"]."' AND date = '".$_GET["date"]."' ";
$objQuery8 = mysql_query($strSQL8);
}
if(!$objQuery)
{
echo "Error Save [".mysql_error()."]";
}
if(!$objQuery6)
{
echo "Error Save [".mysql_error()."]";
}
if(!$objQuery7)
{
echo "Error Save [".mysql_error()."]";
}

mysql_close();
//echo "<script>alert('เสียเครดิต 1 เครดิตในการจองเวลาเรียนนะค่ะ \n จองเวลาเรียบร้อยแล้วค่ะ ');window.location='home.php?date=$dateold&local=$localold';
//header("location:home.php?date=$dateold&local=$localold&action=add");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เสียเครดิต 1 เครดิตในการจองเวลาเรียนนะค่ะ จองเวลาเรียบร้อยแล้วค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home.php?date=$dateold&local=$localold'>";
}

?>