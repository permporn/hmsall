<?

/*

$dbserver = 'localhost';

$dbuser = "root" ; 

$dbpass= "1234";

$dbname= 'selfdb';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");  

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";

*/

?>

<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_scho" ; 

$dbpass= "72o35XDJ";

$dbname= 'ajtongmath_scho';


// $dbserver = '10.10.11.14:3306';

// $dbuser = "ajtong_root" ; 

// $dbpass= "076424746";

// $dbname= 'selfdb';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");  

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";

?>