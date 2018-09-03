<?
	ob_start();
	session_start();
	include("config.inc.php");
	$passwd = mysql_real_escape_string($_POST['txtPassword']);
	$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['txtUsername'])."' 
	and Password = '".$passwd."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('Username Password ไม่ถูกต้อง');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
	}
	else
	{
			$_SESSION["accid"] = $objResult["accid"];
			if($objResult["status"]=="Teacher")
			{header("location:teacherhome.php");}
			else{header("location:Home.php");}
			
	}
	mysql_close();
?>