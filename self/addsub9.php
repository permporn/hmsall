<?
include("config.inc.php");
if($_POST["sub"]=="")
{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ไม่ได้เลือกวิชา!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=viewaccount9.php?accid=$accid'>";}
$check=0;
$strSQL2 = "SELECT * FROM subject WHERE subname = '".$_POST["sub"]."' ";
$objQuery2 = mysql_query($strSQL2);
$objResult2 = mysql_fetch_array($objQuery2);
$subid=$objResult2["subid"];
$c1=$objResult2["hour"]-5;
$accid=$_GET["accid"];
$strSQL9 = "SELECT * FROM credit WHERE accid = '".$accid."' AND subid = '".$subid."'";
$objQuery9 = mysql_query($strSQL9);
while ($objResult9 = mysql_fetch_array($objQuery9)) {
if($objResult9["accid"]==$accid&&$objResult9["subid"]==$subid){
$check++;
}}
if($check>0){
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เพิ่มวิชาซ้ำ!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=viewaccount9.php?accid=$accid'>";}	
else{
$strSQL = "INSERT INTO credit ";
$strSQL .="(accid,subid) ";
$strSQL .="VALUES ";
$strSQL .="('".$accid."'";
$strSQL .=",'".$subid."') ";
$objQuery = mysql_query($strSQL);
$strSQL4 = "SELECT * FROM account WHERE accid = '".$accid."' ";
$objQuery4 = mysql_query($strSQL4);
$objResult4 = mysql_fetch_array($objQuery4);
$credit1=$objResult4["totalcredit"];
$credit=$credit1+$c1;
$strSQL = "UPDATE account SET ";
	$strSQL .="totalcredit = '".$credit."' ";
	$strSQL .="WHERE accid = '".$accid."' ";
	$objQuery = mysql_query($strSQL);
header("location:viewaccount9.php?accid=$accid");
}
?>