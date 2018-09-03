<?
	ob_start();
	session_start();
	include("config.inc.php");
	$strSQL = "SELECT * FROM learn WHERE studentid = '".trim($_POST['txtUsername'])."' 
	and pass = '".trim($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "<script>alert('Username Password ไม่ถูกต้อง');window.location='index.php';</script>";
			exit();
	}
	else
	{
			$_SESSION["learnid"] = $objResult["learnid"];

			session_write_close();
				header("location:Home.php");
	}
	mysql_close();
?>
