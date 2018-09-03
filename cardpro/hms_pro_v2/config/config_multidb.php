<?

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 



$hostname_conn_school = 'localhost';

$database_conn_school =  'ajtongmath_scho';

$username_conn_school = "ajtongmath_scho" ; 

$password_conn_school =  "72o35XDJ";

/*

$hostname_conn_school = "localhost";

$database_conn_school = "school";

$username_conn_school = "root";

$password_conn_school = "1234";

*/

$connect_school =  mysql_connect($hostname_conn_school,$username_conn_school,$password_conn_school,"TRUE");

mysql_select_db('ajtongmath_scho',$connect_school);

mysql_query("SET NAMES 'utf8'",$connect_school);



$hostname_conn_self = 'localhost';

$database_conn_self =  'ajtongmath_self';

$username_conn_self = "ajtongmath_self" ; 

$password_conn_self =  "5TEwC8yip";

/*

$hostname_conn_self = "localhost";

$database_conn_self = "selfdb";

$username_conn_self = "root";

$password_conn_self = "1234";*/



$connect_self = mysql_connect($hostname_conn_self,$username_conn_self,$password_conn_self,"TRUE");

mysql_select_db('ajtongmath_self',$connect_self);

mysql_query("SET NAMES 'utf8'",$connect_self);

?>