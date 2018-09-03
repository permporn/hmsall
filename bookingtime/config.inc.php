<?

/*$dbserver = 'localhost';

$dbuser = "root" ; 

$dbpass= "1234";

$dbname= 'selfdb';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");   */

?>

<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_self" ; 

$dbpass= "5TEwC8yip";

$dbname= 'ajtongmath_self';

// $dbserver = '10.10.11.14:3306';

// $dbuser = "ajtong_root" ; 

// $dbpass= "076424746";

// $dbname= 'selfdb';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8"); 

?>

