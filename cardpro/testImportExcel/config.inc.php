<?php

$dbserver = 'localhost';

$dbuser = "root" ; 

$dbpass= "1234";

$dbname= 'ajtongmath_scho';

mysqli_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysqli_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysqli_query("SET NAMES UTF8");

mysqli_query("set character set utf8"); 

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   

define('WP_MEMORY_LIMIT', '64M');

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

// define('WP_MEMORY_LIMIT', '64M');  

?>