<?php
	ob_start();
	session_start();
	include("config.inc.php");
        $passwd = mysql_real_escape_string($_POST['txtPassword']);
	$strSQL = "SELECT * FROM staff WHERE username = '".trim($_POST['txtUsername'])."' 
	and password = '".$passwd."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
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
	mysql_close();
?>