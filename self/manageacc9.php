<? 
include("config.inc.php");
ob_start();
$account=$_POST["account"];
$strSQL = "SELECT * FROM account WHERE username = '".$account."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if($objResult)
{echo "Account already exist";}
else
{
$strSQL1 = "SELECT * FROM student WHERE name = '".$_POST["student"]."' ";
$objQuery1 = mysql_query($strSQL1);
$objResult1 = mysql_fetch_array($objQuery1);
$student=$objResult1["studentid"];
echo $student?> <br> <? ;
$strSQL2 = "SELECT * FROM subject WHERE subname = '".$_POST["sub"]."' ";
$objQuery2 = mysql_query($strSQL2);
$objResult2 = mysql_fetch_array($objQuery2);
$subid=$objResult2["subid"];
$strSQL7 = "SELECT * FROM subject WHERE subname = '".$_POST["sub"]."' ";
$objQuery7 = mysql_query($strSQL7);
$objResult7 = mysql_fetch_array($objQuery7);
$totalcredit=$objResult7["hour"]-5;
echo $subid?> <br> <? ;
echo $totalcredit?> <br> <? ;
$s=1;
$strSQL9 = "INSERT INTO account ";
$strSQL9 .="(studentid,username,password,state,sdate,edate,totalcredit,status) ";
$strSQL9 .="VALUES ";
$strSQL9 .="('".$student."','".$_POST["account"]."'";
$strSQL9 .=",'".$_POST["password"]."','1'";
$strSQL9 .=",'".$_POST["date"]."','".$_POST["edate"]."'";
$strSQL9 .=",'".$totalcredit."','".$_POST["status"]."') ";
echo $strSQL9;
$objQuery = mysql_query($strSQL9);
if(!$objQuery9)
{
echo "Error Save [".mysql_error()."]";
}
$strSQL4 = "SELECT * FROM account WHERE username = '".$account."' ";
$objQuery4 = mysql_query($strSQL4);
$objResult4 = mysql_fetch_array($objQuery4);
$accid=$objResult4["accid"];
$strSQL = "INSERT INTO credit ";
$strSQL .="(accid,subid) ";
$strSQL .="VALUES ";
$strSQL .="('".$accid."'";
$strSQL .=",'".$subid."') ";
$objQuery = mysql_query($strSQL);
mysql_close();
header("location:viewaccount9.php?accid=$accid");
}
?>