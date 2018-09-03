<?
	ob_start();
	session_start();
	if($_SESSION["accid_self"] == "")
	{
		echo "<script>alert('กรุณาทำการ Login ด้วยค่ะ');window.location='self.php';</script>";
		exit();
	}
	include("config.inc.php");


	$strSQL = "SELECT * FROM account WHERE accid = '".$_SESSION['accid_self']."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);

	if($objResult["password"] != $_POST["txtOldPassword"])
	{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Password ไม่ถูกต้องค่ะ กรุณากรอก password เดิมให้ถูกต้อง');</script>";
echo "<meta http-equiv='refresh' content='0;URL=editpass.php'>";
		exit();
	}

	if($_POST["txtPassword"] != $_POST["txtConPassword"])
	{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Password ไม่ถูกต้องค่ะ กรุณากรอกทั้ง2ช่องให้ตรงกัน');</script>";
echo "<meta http-equiv='refresh' content='0;URL=editpass.php'>";
		
		exit();
	}
	$strSQL = "UPDATE account SET password = '".trim($_POST['txtPassword'])."' 
	 WHERE accid = '".$_SESSION["accid_self"]."' ";
	$objQuery = mysql_query($strSQL);
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('แก้ไขรหัสผ่านเรียบร้อบค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=editpass.php'>";
	
	mysql_close();
?>