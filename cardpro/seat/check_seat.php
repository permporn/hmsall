<?php
include('config/config_db.php');  

session_start();
include("ck_session.php");


$seat_no = $_GET['seat'];
$id_couses = $_GET['id'];

$strSQL_seat = "SELECT * FROM `seat_log` WHERE  `seat_no` =  '".$seat_no."' AND  `subject_id` =".$id_couses;
$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
$objResult_seat = mysql_fetch_array($objQuery_seat);
$status = $objResult_seat['status'];

$strSQL_subject = "SELECT * FROM `subject` WHERE `subid` =".$id_couses;
$objQuery_subject = mysql_query($strSQL_subject) or die ("Error Query [".$strSQL_subject."]");
$objResult_subject = mysql_fetch_array($objQuery_subject);
$subname = $objResult_subject['subname'];

if($objResult_seat != ""){
		echo  $status;
}else{

	echo 0;
}

?>