<?php
$con = mysql_connect("127.0.0.1", "root", "1234");
if (!$con) {
    die('ติดต่อฐานข้อมูลไม่ได้ เนื่องจาก: ' . mysql_error());
}
mysql_select_db("school", $con);
mysql_query("SET NAMES UTF8");
?>
