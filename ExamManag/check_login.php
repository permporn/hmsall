<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?
	session_start();
	ob_start();
	include("config.php");
	$strSQL = "SELECT * FROM staff WHERE username = '".mysql_real_escape_string(trim($_POST['username_1']))."' 
	and password = '".mysql_real_escape_string(trim($_POST['password_1']))."'";
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
		//header("location:index.php");
		$_SESSION["stid"] = $objResult["stid"];
		$_SESSION["status"] = $objResult["status"];
		if($_SESSION["status"] == "adminexam" or $_SESSION["status"] == "admin"){
			header("location:index.php");
		}else{
			session_destroy();
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
                        			echo "<script language='javascript'>alert('ขออภัยบัญชีผู้ใช้งานของคุณไม่มีสิทธิ์ใช้งาน');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
		}
	}
	mysql_close();
?>