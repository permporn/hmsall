<?
	ob_start();
	session_start();
	include("config.inc.php");
	$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['txtUsername'])."' 
	and Password = '".trim($_POST['txtPassword'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	if(!$objResult)
	{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Username password ไม่ถูกต้องครับ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
			exit();
	}
	else
	{
			$_SESSION["accid"] = $objResult["accid"];
                        $_SESSION["edate"] = $objResult["edate"];

			session_write_close();
			function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
			//$k=$objResult["accid"];
			if(DateDiff(date('Y-m-d'),$objResult["edate"]) <= '0')
			{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Username นี้หมดอายุการใช้งานแล้วนะค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
			}
			else
			{
				header("location:home.php");
			}
	}
	mysql_close();
?>