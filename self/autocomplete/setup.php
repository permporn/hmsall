<html>
<head>
<title>:: �Դ����к� ::</title>
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

$sql[1] = "INSERT INTO `test_tb1` VALUES (1, '�оҹ������ - ����� �� OST.�Ф� ������ӫ��')";
$sql[2] = "INSERT INTO `test_tb1` VALUES (2, '�١���������� - �ç�ô ���� ���� ����')";
$sql[3] = "INSERT INTO `test_tb1` VALUES (3, '��Шҹ - �� ��ͺ ���� ����')";
$sql[4] = "INSERT INTO `test_tb1` VALUES (4, '�������¡�ҧ - �� ��Ԫҵ ��������')";
$sql[5] = "INSERT INTO `test_tb1` VALUES (5, '�Դ��Ъ�� - ���������� ���� ����')";
$sql[6] = "INSERT INTO `test_tb1` VALUES (6, '�ͺ����˹��Դ - ���ᵹ �Ŵ�')";
$sql[7] = "INSERT INTO `test_tb1` VALUES (7, '�ѹ��������������� - ���ᵹ �Ŵ�')";
$sql[8] = "INSERT INTO `test_tb1` VALUES (8, '����診�ѹ���� - ��� ��������')";
$sql[9] = "INSERT INTO `test_tb1` VALUES (9, '��Ҥ�����ҭ� - �Թ���� �ٹ���')";
$sql[10] = "INSERT INTO `test_tb1` VALUES (10, '��ҡ�ʹ��� - �ѹ�� ��������')";
$sql[11] = "INSERT INTO `test_tb1` VALUES (11, '������ - �ѹ�� ��������')";
$sql[12] = "INSERT INTO `test_tb1` VALUES (12, 'ʧ����ѹ��� - ��� ����ҳ�')";
$sql[13] = "INSERT INTO `test_tb1` VALUES (13, '෾պ�ҹ�� - ��� �ظ��Ҫ ���� ����')";
$sql[14] = "INSERT INTO `test_tb1` VALUES (14, '�������������ѡ - ��͡Ỵ�ʹ')";
$sql[15] = "INSERT INTO `test_tb1` VALUES (15, '����ʹ͡���ҹ - ���� ���� ����')";
$sql[16] = "INSERT INTO `test_tb1` VALUES (16, 'Ό�ѹ�ͧ - ��� �����ѡɳ�')";
$sql[17] = "INSERT INTO `test_tb1` VALUES (17, 'ʡѴ������� - ��� ��������')";
$sql[18] = "INSERT INTO `test_tb1` VALUES (18, '�ѡ⢧ �� ��� - �����ŻԹ')";
$sql[19] = "INSERT INTO `test_tb1` VALUES (19, '��ǹ����Ό - ����� �þ���')";
$sql[20] = "INSERT INTO `test_tb1` VALUES (20, '��Ҩ����仴��¡ѹ��� - ˹� ������')";


for($i=0;$i<21;$i++) {
      $result = mysql_query($sql[$i]);
}


if($result) {
echo "<center>
<table border=\"1\" style=\"border-style:dotted; border-collapse: collapse; padding-left:4; padding-right:4; padding-top:1; padding-bottom:1\" bordercolor=\"#111111\" width=\"400\" id=\"AutoNumber1\" height=\"138\">
  <tr>
    <td height=\"136\" bgcolor=\"#FFCCFF\">
    <center>
    <font size=\"5\" color=\"#000080\">������ҧ���ҧŧ�ҹ��������������ó� !!</font><br><br>
    <font size=\"4\"><a href=\"javascript:window.close()\">[ ��ŧ ]</a></font>
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
    <font size=\"5\" color=\"#000080\">������ҧ���ҧŧ�ҹ������������� !!</font><br><br>
<p align=\"left\">&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"red\"><small>�Ҩ�Դ�ҡ���˵شѧ���仹�� ....</font><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. �ա�����ҧ���ҧ���ͫ�ӡѹ��������<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. ��˹�������� dbconfig.php �Դ��Ҵ<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. �ѧ��������ҧ�ҹ������<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. �ѧ��������ҧ Username , Password ����Ѻ �ҹ������<br>
</small></p>
    <font size=\"4\"><a href=\"javascript:location.reload(true);\">[ �ͧ���� ]</a></font>
    </center>    
    </td>
  </tr>
</table>
</center>";
}

?>
</body>
</html>