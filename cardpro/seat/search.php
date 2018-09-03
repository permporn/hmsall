<?php  
include('config/config_db.php');  

session_start();
include("ck_session.php");

$seat_no = $_GET['seat'];
$id_couses = $_GET['id'];

$strSQL_seat = "SELECT * FROM `student`";
$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
//$objResult_seat = mysql_fetch_array($objQuery_seat);

while ($row = mysql_fetch_array($objQuery_seat)) {
        $data['name'] = $row['studentname'];
		
    }

echo  json_encode($data);


?>