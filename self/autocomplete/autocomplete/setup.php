<html>
<head>
<title>:: ติดตั้งระบบ ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=tis-620">
<style>
BODY {
    FONT-FAMILY: Arial, Helvetica, sans-serif
}
</style>
</head>
<body>
<?php

include "dbconfig.php";
conndb();


$sql[0] = "CREATE TABLE `test_tb1` (
  `id` int(5) NOT NULL auto_increment primary key,
  `subject` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=tis620
" ;

$sql[1] = "INSERT INTO `test_tb1` VALUES (1, 'สะพานสายรุ้ง - ชมพู่ ปอ OST.ละคร ต้มยำลำซิ่ง')";
$sql[2] = "INSERT INTO `test_tb1` VALUES (2, 'ลูกผู้ชายใจเสาะ - ทรงกรด ฌามา อาร์ สยาม')";
$sql[3] = "INSERT INTO `test_tb1` VALUES (3, 'ประจาน - เอ ม็อบ อาร์ สยาม')";
$sql[4] = "INSERT INTO `test_tb1` VALUES (4, 'คนที่ขอแยกทาง - ปอ ปริชาต อาร์สยาม')";
$sql[5] = "INSERT INTO `test_tb1` VALUES (5, 'ติดประชุม - บลูเบอร์รี่ อาร์ สยาม')";
$sql[6] = "INSERT INTO `test_tb1` VALUES (6, 'ตอบข้อไหนก็ผิด - ตั๊กแตน ชลดา')";
$sql[7] = "INSERT INTO `test_tb1` VALUES (7, 'ฉันไม่ใช่หรือเธอไม่พอ - ตั๊กแตน ชลดา')";
$sql[8] = "INSERT INTO `test_tb1` VALUES (8, 'เธอไม่จบฉันก็เจ็บ - ใบเตย อาร์สยาม')";
$sql[9] = "INSERT INTO `test_tb1` VALUES (9, 'ธนาคารสำราญใจ - จินตหรา พูนลาภ')";
$sql[10] = "INSERT INTO `test_tb1` VALUES (10, 'อยากกอดพ่อ - ธันวา อาร์สยาม')";
$sql[11] = "INSERT INTO `test_tb1` VALUES (11, 'กระสือ - ธันวา อาร์สยาม')";
$sql[12] = "INSERT INTO `test_tb1` VALUES (12, 'สงสารมันเถอะ - บิว กัลยาณี')";
$sql[13] = "INSERT INTO `test_tb1` VALUES (13, 'เทพีบ้านไพร - กุ้ง สุธิราช อาร์ สยาม')";
$sql[14] = "INSERT INTO `test_tb1` VALUES (14, 'คนใกล้ๆที่อ้ายฮัก - ร็อกแปดแสน')";
$sql[15] = "INSERT INTO `test_tb1` VALUES (15, 'เมื่อดอกแคร์บาน - ทราย อาร์ สยาม')";
$sql[16] = "INSERT INTO `test_tb1` VALUES (16, 'แฟนฉันเอง - เอ้ ศิริลักษณ์')";
$sql[17] = "INSERT INTO `test_tb1` VALUES (17, 'สกัดดาวยั่ว - ใบเตย อาร์สยาม')";
$sql[18] = "INSERT INTO `test_tb1` VALUES (18, 'ฮักโขง ชี มูล - รวมศิลปิน')";
$sql[19] = "INSERT INTO `test_tb1` VALUES (19, 'สาวนาสั่งแฟน - เปาวลี พรพิมล')";
$sql[20] = "INSERT INTO `test_tb1` VALUES (20, 'เราจะสู้ไปด้วยกันรู้ - หนู มิเตอร์')";


for($i=0;$i<21;$i++) {
      $result = mysql_query($sql[$i]);
}


if($result) {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"138\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลเสร็จสมบูรณ์ !!</font><br><br>
    <font size=\"4\"><a href=\"javascript:window.close()\">[ ตกลง ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}
else {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"270\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">การสร้างตารางลงฐานข้อมูลล้มเหลว !!</font><br><br>
<p align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"red\"><small>อาจเกิดจากสาเหตุดังต่อไปนี้ ....</font><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. มีการสร้างตารางชื่อซ้ำกันอยู่แล้ว<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. กำหนดค่าในไฟล์ dbconfig.php ผิดพลาด<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. ยังไม่ได้สร้างฐานข้อมูล<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. ยังไม่ได้สร้าง Username , Password สำหรับ ฐานข้อมูล<br>
</small></p>
    <font size=\"4\"><a href=\"javascript:location.reload(true);\">[ ลองใหม่ ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}

?>
</body>
</html>