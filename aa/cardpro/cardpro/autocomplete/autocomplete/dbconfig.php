<?php

$conn;

$server = "localhost"; // มักเป็น localhost (กรณี Host ที่คุณใช้ไม่ได้กำหนดเป็นค่าอย่างอื่น)
$user = "myusername"; // Username ในการติดต่อฐานข้อมูล
$pass = "mypassword"; // Password ในการติดต่อฐานข้อมูล
$dbname = "admin_php_ex"; // ชื่อฐานข้อมูลที่ได้สร้างไว้

function conndb() {
  global $conn;
  global $server;
  global $user;
  global $pass;
  global $dbname;
  $conn = mysql_connect($server,$user,$pass);
mysql_select_db($dbname) ;
mysql_db_query($dbname,"SET NAMES tis620");
  if (!$conn)
    die("ไม่สามารถติดต่อกับ MySQL ได้");

  mysql_select_db($dbname,$conn)
    or die("ไม่สามารถเลือกใช้งานฐานข้อมูลได้");
}

function closedb() {
  global $conn;
  mysql_close($conn);
}

?>