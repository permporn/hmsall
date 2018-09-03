<?
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
$dbserver = '10.10.11.14:3306';
$dbuser = "AizeRo2" ; 
$dbpass= "076424746";
$dbname= 'school';
mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
mysql_query("SET NAMES UTF8");
mysql_query("set character set utf8"); 
$strSQL1 = "SELECT * FROM learn WHERE id_year = 46";
$objQuery1= mysql_query($strSQL1);
while($objResult1 = mysql_fetch_array($objQuery1))
	{
		$strSQL  = "UPDATE learn SET id_year = 45";
		$objQuery = mysql_query($strSQL);
	}
	echo "<script language='javascript'>alert('แก้ไขรหัสผ่านเรียบร้อบค่ะ');</script>";
?>