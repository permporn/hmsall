<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_scho" ; 

$dbpass= "72o35XDJ";

$dbname= 'ajtongmath_scho';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8"); 

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 


$connect_school = mysql_connect("localhost","ajtongmath_scho","72o35XDJ","TRUE");

mysql_select_db('ajtongmath_scho',$connect_school);

mysql_query("SET NAMES 'utf8'",$connect_school);



$connect_self = mysql_connect("localhost","ajtongmath_self","5TEwC8yip","TRUE");

mysql_select_db('ajtongmath_self',$connect_self);

mysql_query("SET NAMES 'utf8'",$connect_self);


// $dbserver = '10.10.11.14:3306';

// $dbuser = "AizeRo2" ; 

// $dbpass= "076424746";

// $dbname= 'school';

// mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

// mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

// mysql_query("SET NAMES UTF8");

// mysql_query("set character set utf8"); 

// $title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง"; 



// $connect_school = mysql_connect("10.10.11.14:3306","AizeRo2","076424746","TRUE");

// mysql_select_db('school',$connect_school);

// mysql_query("SET NAMES 'utf8'",$connect_school);



// $connect_self = mysql_connect("10.10.11.14:3306","ajtong_root","076424746","TRUE");

// mysql_select_db('selfdb',$connect_self);

// mysql_query("SET NAMES 'utf8'",$connect_self);



/*หลังจาก connect database ทั้ง 2 ตัวเรียบร้อยแล้ว มาลอง Query กัน ซึ่งถ้าใครจะ connect database ซัก 3 ตัวก็เขียนเพิ่มเข้าไปจะสังเกตว่าจะมีตัวแปร $connect1,$connect2,$connect3,....... เก็บค่าสำหรับการ connect ไว้ ซึ่งเราจะเอาตัวแปรนี้ไปใช้ในการ Query มาดูตัวอย่าง



เขียน Query ข้อมูลจากฐานข้อมูลตัวแรก

$sql = "SELECT * FROM member";

$query1 = mysql_query($sql,$connect1) or die(mysql_error());

while($rs1 = mysql_fetch_array($query1))

{

    ................................

}



เขียน Query ข้อมูลจากฐานข้อมูลตัวที่สอง

$sql = "SELECT * FROM member_forum";

$query2 = mysql_query($sql,$connect2) or die(mysql_error());

while($rs2 = mysql_fetch_array($query2))

{

    ................................

}

*/

?>