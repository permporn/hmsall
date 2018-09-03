<?php
include('config/config_db.php');  

session_start();
include("ck_session.php");


$seat_no = $_GET['seat'];
$id_couses = $_GET['id'];

$strSQL_seat = "SELECT * FROM `seat_log` WHERE  `seat_no` =  '".$seat_no."' AND  `subject_id` =".$id_couses;
$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
$objResult_seat = mysql_fetch_array($objQuery_seat);

$strSQL_subject = "SELECT * FROM `subject` WHERE `subid` =".$id_couses;
$objQuery_subject = mysql_query($strSQL_subject) or die ("Error Query [".$strSQL_subject."]");
$objResult_subject = mysql_fetch_array($objQuery_subject);
$subname = $objResult_subject['subname'];

if($objResult_seat != ""){
	if($objResult_seat['status']== 1){

		$datas = array("subject_name" => $subname,"status" => "จอง");
		echo  json_encode($datas);
	}else{
		$datas = array("subject_name" => $subname,"status" => "ซื้อแล้ว");
		echo  json_encode($datas);
	}
}else{
	$strSQL_seat = "INSERT INTO `seat_log` (`seat_no`, `subject_id`, `status`) VALUES ('".$seat_no."', '".$id_couses."', '1')";
	$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
	if($objQuery_seat){

		$strSQL_seat = "SELECT * FROM `seat_log` WHERE  `seat_no` =  '".$seat_no."' AND  `subject_id` =".$id_couses;
		$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
		$objResult_seat = mysql_fetch_array($objQuery_seat);
		$id_seat = $objResult_seat['id'];

		$datas = array("subject_name" => $subname, "status" => "จองแล้ว" ,"id_seat" => $id_seat);
		echo  json_encode($datas);
	}else{
		echo "fail!!  : $strSQL (test.php)";
	}
}

?>