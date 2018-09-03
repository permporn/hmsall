<?
$dbserver = 'localhost';
$dbuser = "root" ; 
$dbpass= "1234";
$dbname= 'ae';
mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
mysql_query("SET NAMES UTF8");
mysql_query("set character set utf8");  
?>