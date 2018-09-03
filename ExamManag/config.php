<!-- 

@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >

 -->

<?

/*$host = "localhost";

$user = "root";

$pass = "1234";

$dbname = "selfdb";



$conndb = mysql_connect($host,$user,$pass) or die ("Error");

mysql_select_db($dbname,$conndb);



mysql_query("SET NAMES UTF8");



mysql_query("set character set utf8");*/



?>

<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_self" ; 

$dbpass= "5TEwC8yip";

$dbname= 'ajtongmath_self';

// $dbserver = 'localhost';

// $dbuser = "ajtong_root" ; 

// $dbpass= "076424746";

// $dbname= 'selfdb';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");  

?>