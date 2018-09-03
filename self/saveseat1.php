<?
include("config.inc.php");
$s=date('Y-m-d');
$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['username'])."' 
	and Password = '".trim($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Username password ไม่ถูกต้องครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}
	else {
		$k=$objResult["totalcredit"]-1;
		$strSQL = "INSERT INTO reserve ";
$strSQL .="(accid,status,time,section,branchid) ";
$strSQL .="VALUES ";
$strSQL .="('".$objResult["accid"]."','0','".$s."'";
$strSQL .=",'".$_POST["time"]."','".$_POST["branch"]."') ";
$objQuery = mysql_query($strSQL); 
$strSQL6 = "UPDATE account SET ";
$strSQL6 .="totalcredit = '".$k."' ";
$strSQL6 .="WHERE accid = '".$objResult["accid"]."' ";
$objQuery6 = mysql_query($strSQL6);
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('จองเวลาเรียบร้อยแล้ว');</script>";
echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
}
	 
		 ?>