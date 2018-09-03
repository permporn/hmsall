<?php
include('config/config_db.php');  

session_start();
include("ck_session.php");


$subject_name = $_GET['subject_name'];
$id_subject = $_GET['id_subject'];

$strSQL_subject = "SELECT * FROM `subject` WHERE `subid` =".$id_subject;
$objQuery_subject = mysql_query($strSQL_subject) or die ("Error Query [".$strSQL_subject."]");
$objResult_subject = mysql_fetch_array($objQuery_subject);
$roomid = $objResult_subject['roomid'];

if($roomid == "59"){ // T10 FULL
	$path_page = "room_t10_full.php";
	echo  $path_page;
}else if($roomid == "14"){  // T10 80seat
	$path_page = "room_t10.php";
	echo  $path_page;
}else if($roomid == "60" || $roomid == "24"){  // n1
	$path_page = "room_n1.php";
	echo  $path_page;
}else if($roomid == "31" || $roomid == "32"){  // t4 
	$path_page = "room_t4.php";
	echo  $path_page;
}else{
	$path_page = "index.php";
	echo  $path_page;
}

?>