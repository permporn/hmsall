<?
	session_start();
	ob_start();
	include("config.inc.php");
	$strSQL = "SELECT * FROM  account WHERE username = '".mysql_real_escape_string(trim($_POST['username_1']))."' 
	and Password = '".mysql_real_escape_string(trim($_POST['password_1']))."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(empty($objResult))
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ชื่อผู้ใช้งานหรือรหัสผ่าน ไม่ถูกต้อง');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
	}
	else
	{
		$_SESSION["accid"] = $objResult["accid"];
		$_SESSION["status"] = $objResult["status"];
		header("location:home.php");
		
	}
	mysql_close();
?>