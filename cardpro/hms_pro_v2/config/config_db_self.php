<?php 

$hostname_conn = 'localhost';

$database_conn =  'ajtongmath_self';

$username_conn = "ajtongmath_self" ; 

$password_conn =  "5TEwC8yip";

// $hostname_conn = '10.10.11.14:3306';

// $database_conn =  'selfdb';

// $username_conn = "ajtong_root" ; 

// $password_conn =  "076424746";

$conn = @mysql_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conn, $conn);

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8"); 

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 

?>



<?php /*

$hostname_conn = "localhost";

$database_conn = "selfdb";

$username_conn = "root";

$password_conn = "1234";

$conn = @mysql_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR);

mysql_select_db($database_conn, $conn);

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8"); */

?>