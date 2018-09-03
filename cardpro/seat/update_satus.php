<?php  
include('config/config_db.php');  

session_start();
include("ck_session.php");

$params = array();
parse_str($_GET['datas'], $params);

$id_seat = $params['id_seat'];
					
	$strSQL = "DELETE FROM `seat_log` WHERE id = ".$id_seat; 
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){
		echo "fail!!  : $strSQL (update_satus.php)";
	}else{
		echo "Success : $strSQL ";
	}


?>