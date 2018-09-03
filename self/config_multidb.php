<?

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 

$connect_school =  mysql_connect("localhost","ajtongmath_scho","72o35XDJ","TRUE");

mysql_select_db('ajtongmath_scho',$connect_school);

mysql_query("SET NAMES 'utf8'",$connect_school);


$connect_self = mysql_connect("localhost","ajtongmath_self","5TEwC8yip","TRUE");

mysql_select_db('ajtongmath_self',$connect_self);

mysql_query("SET NAMES 'utf8'",$connect_self);

?>