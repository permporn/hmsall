<? /*

$dbserver = 'localhost';

$dbuser = "root" ; 

$dbpass= "1234";

$dbname= 'school';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8"); 

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   */

?>

<?

// $dbserver = '10.10.11.14:3306';

// $dbuser = "AizeRo2" ; 

// $dbpass= "076424746";

// $dbname= 'school';

// mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

// mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

// mysql_query("SET NAMES UTF8");

// mysql_query("set character set utf8");  

// $title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   



?>

<?php

$dbserver = 'localhost';

$dbname= 'ajtongmath_scho';

//** SERVER **//

$dbuser = "ajtongmath_scho" ; 

$dbpass= "72o35XDJ";

//** LOCAL **//

// $dbuser = "root" ; 

// $dbpass= "";

// $con_ajtongmath_scho = @mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

// if (!$con) {
//     echo "Error: " . mysqli_connect_error();
// 	exit();
// }else{
// 	echo 'Connected to MySQL';	
// }

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");  

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   

?>