<?
ob_start();
session_start();
if($_SESSION["accid_self"] == "" )
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณา Login เข้าสู่ระบบ =');</script>";
echo "<meta http-equiv='refresh' content='0;URL=logout.php'>";
exit();
}
if($_SESSION["status"] != "100")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('คุณไม่มีสิทธิในการเข้าหน้านี้ กรุณา Login ใหม่ค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=logout.php'>";
}else{
$date1 = $_GET["date1"];
$date2 = $_GET["date2"];
$chk = "yes";

$s1 = $_GET["section1"];
$s2 = $_GET["section2"];

$section1 = $_GET["section1"];
$section2 = $_GET["section2"];
$accid = $_SESSION["accid_self"];

include("config.inc.php");

$sec1=$_GET["section"];
$dateold=base64_decode($_GET["dateold"]);
$localold=base64_decode($_GET["localold"]);

$en_dateold = $_GET["dateold"];
$en_local = $_GET["localold"];

$strSQL98 = "SELECT * FROM seats where date = '".$date1."' AND branchid = '".$localold."'";
$objQuery98 = mysql_query($strSQL98);
$objResult98 = mysql_fetch_array($objQuery98);
for($ii=$section1;$ii<=$section2;$ii++)
{
	if ($objResult98[$ii] == 0)
	{$chk = "no";}
}

$strSQL99 = "SELECT * FROM reserve where time = '".$date1."' AND accid = '".$accid."'";
$objQuery99 = mysql_query($strSQL99);
//$objResult99 = mysql_fetch_array($objQuery99);
while($objResult99 = mysql_fetch_array($objQuery99)){
if($objResult99["section_s"] > $section1 && $objResult99["section_e"] < $section2)
{
	$chk = "no";
}
}

if($date1!=$date2)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณาเลือกช่วงเวลาที่อยู่ในวันเดียวกัน');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$en_local'>";	
}
else if($section1>$section2)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณาเลือกช่วงเวลาให้ถูกต้อง');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$en_local'>";	
}
else if($chk=="no")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณาเลือกช่วงเวลาให้ถูกต้อง');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$en_local'>";	
}
else {
$strSQL1 = "SELECT * FROM account where accid = '".$accid."'";
$objQuery1 = mysql_query($strSQL1);
$objResult1 = mysql_fetch_array($objQuery1);
$b2 = base64_encode("2");
$b3 = base64_encode("3");
$b5 = base64_encode("5");
$b6 = base64_encode("6");
$b7 = base64_encode("7");
$b8 = base64_encode("8");
if($objResult1["totalcredit"]==0)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เครดิตไม่เพียงพอที่จะจองเวลาเรียนครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$en_local'>";
}
else if($objResult1["status"]==2&&base64_decode($_GET["branchid"])!=2)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสาขาวงเวียนใหญ่เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$b2>";
}
else if($objResult1["status"]==3&&base64_decode($_GET["branchid"])!=3)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสาขาวิสุทธานีเท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$b3'>";
}
else if($objResult1["status"]==4&&base64_decode($_GET["branchid"])!=5)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะพณาไทชั้น 9 เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$b5'>";
}
else if($objResult1["status"]==6&&base64_decode($_GET["branchid"])!=6)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะสระบุรี สุขอนันต์ ปาร์ค เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$b6'>";
}
else if($objResult1["status"]==7&&base64_decode($_GET["branchid"])!=7)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะชลบุรี เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$b7'>";
}
else if($objResult1["status"]==8&&base64_decode($_GET["branchid"])!=8)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Account นี้เรียนได้เฉพาะราชบรุี เท่านั้นครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$b8'>";
}
else{
$strSQL = "INSERT INTO reserve ";
$strSQL .="(accid,status,time,section_s,section_e,branchid) ";
$strSQL .="VALUES ";
$strSQL .="('".$accid."','0','".$_GET["date1"]."'";
$strSQL .=",'".$_GET["section1"]."','".($_GET["section2"]+1)."','".base64_decode($_GET["branchid"])."') ";
$objQuery = mysql_query($strSQL);
$strSQL7 = "SELECT * FROM account where accid = '".$accid."'";
$objQuery7 = mysql_query($strSQL7);
$objResult7 = mysql_fetch_array($objQuery7);
$creditnew = $objResult7["totalcredit"]-(($_GET["section2"]+1) -$_GET["section1"]);
$strSQL6 = "UPDATE account SET ";
$strSQL6 .="totalcredit = '".$creditnew."' ";
$strSQL6 .="WHERE accid = '".$accid."' ";
$objQuery6 = mysql_query($strSQL6);
$sec=$_GET["section"];

$strSQL9 = "SELECT * FROM seats where branchid = '".base64_decode($_GET["branchid"])."' AND date = '".$_GET["date1"]."'";
$objQuery9 = mysql_query($strSQL9);
$objResult9 = mysql_fetch_array($objQuery9);
}
for($i = $s1;$i <= $s2;$i++)
{
	
	$seatnew = $objResult9["$i"]-1;
	$strSQL8 = "UPDATE seats SET ";
	$strSQL8 .="`$i` = '".$seatnew."' ";
	$strSQL8 .="where branchid = '".base64_decode($_GET["branchid"])."' AND date = '".$_GET["date1"]."' ";
	$objQuery8 = mysql_query($strSQL8);
}
if(!$objQuery9)
{
echo "Error Save [".mysql_error()."]";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$localold'>";
}
else if(!$objQuery)
{
echo "Error Save [".mysql_error()."]";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$localold'>";
}
else if(!$objQuery6)
{
echo "Error Save [".mysql_error()."]";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$localold'>";
}
else if(!$objQuery7)
{
echo "Error Save [".mysql_error()."]";
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$dateold&local=$localold'>";
}
else{
mysql_close();
//echo "<script>alert('เสียเครดิต 1 เครดิตในการจองเวลาเรียนนะค่ะ \n จองเวลาเรียบร้อยแล้วค่ะ ');window.location='home.php?date=$dateold&local=$localold';
//header("location:home.php?date=$dateold&local=$localold&action=add");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
?>
<script language='javascript'>alert('เสียเครดิต <?=($_GET['section2']+1) - $_GET['section1']?> เครดิตในการจองเวลาเรียนนะค่ะ จองเวลาเรียบร้อยแล้วค่ะ');</script>;
<?
	
echo "<meta http-equiv='refresh' content='0;URL=home2.php?date=$en_dateold&local=$en_local'>";
}
}
}
?>