<?
$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 


$connect_school =  mysql_connect("10.10.11.14:3306","AizeRo2","076424746","TRUE");
mysql_select_db('school',$connect_school);
mysql_query("SET NAMES 'utf8'",$connect_school);

$connect_self = mysql_connect("10.10.11.14:3306","ajtong_root","076424746","TRUE");
mysql_select_db('selfdb',$connect_self);
mysql_query("SET NAMES 'utf8'",$connect_self);
?>