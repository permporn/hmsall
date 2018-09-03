<?php

$conn;

$server = "localhost"; // �ѡ���� localhost (�ó� Host ����س�����������˹���繤�����ҧ����)
$user = "myusername"; // Username 㹡�õԴ��Ͱҹ������
$pass = "mypassword"; // Password 㹡�õԴ��Ͱҹ������
$dbname = "admin_php_ex"; // ���Ͱҹ�����ŷ��������ҧ���

function conndb() {
  global $conn;
  global $server;
  global $user;
  global $pass;
  global $dbname;
  $conn = mysql_connect($server,$user,$pass);
mysql_select_db($dbname) ;
mysql_db_query($dbname,"SET NAMES tis620");
  if (!$conn)
    die("�������ö�Դ��͡Ѻ MySQL ���");

  mysql_select_db($dbname,$conn)
    or die("�������ö���͡����ҹ�ҹ���������");
}

function closedb() {
  global $conn;
  mysql_close($conn);
}

?>