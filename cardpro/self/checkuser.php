<?php
ob_start();
session_start();
include("../config.inc.php");
$strSQL = "SELECT * FROM staff WHERE username = '".trim($_POST['txtUsername'])."'
and password = '".trim($_POST['txtPassword'])."'";
$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
$objResult = mysqli_fetch_array($objQuery);
if(!$objResult){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Username Password ไม่ถูกต้อง');</script>";
echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
exit();
}
else
{
$_SESSION["status"] = $objResult["status"];
$_SESSION["stid"] = $objResult["stid"];
session_write_close();
header("location:home.php");
}
mysqli_close($con_ajtongmath_self);
?>