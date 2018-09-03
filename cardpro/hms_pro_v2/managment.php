<?php
session_start();
include('config/config_db_self.php');

$type = $_GET['action_type'];

if($type == "deleteStudentName"){
  $id = $_GET['id'];
  if($id){
  	// SELECT account by accid
  	$str_select = "SELECT account.accid FROM student
						    LEFT JOIN account ON account.studentid = student.studentid
						  	WHERE student.studentid = ".$id;
  	$objQuery_select = mysql_query($str_select) or die ("Error Query [".$str_select."]");
  	$num_rows = mysql_num_rows($objQuery_select);
  	// delete student
  	$strSQL_delete = "DELETE FROM `student` WHERE studentid = ".$id; 
    $objQuery_delete = mysql_query($strSQL_delete) or die ("Error Query [".$strSQL_delete."]");
		if(!$objQuery_delete){
		  	echo "fail!!  : $strSQL_delete (managment.php)";
		}else{
			// delete account
			$strSQL_delete = "DELETE FROM `account` WHERE studentid = ".$id; 
    		$objQuery_delete = mysql_query($strSQL_delete) ;//or die ("Error Query [".$strSQL_delete."]");
    		if(!$objQuery_delete){
		  		echo "fail!!  : $strSQL_delete (managment.php)";
			}else{			  
				  	if($num_rows != 0){	
				  		//echo $num_rows."---".$str_select;
				  		while ($result_select = mysql_fetch_array($objQuery_select)){
				  			// delete credit
				  			$strSQL_delete = "DELETE FROM `credit` WHERE accid = ".$result_select['accid']; 
	    					$objQuery_delete = mysql_query($strSQL_delete) ;//or die ("Error Query [".$strSQL_delete."]");
				  		}
					}
			}
		}
	}else{
		echo "fail!! ไม่สามารถลบได้ เนื่องจากไม่มี ID (managment.php)";
	}
}

if($type == "updateReserve"){
  $id = $_GET['id'];
  $now = date('Y-m-d H:i:s');

  	$strSQL ="SELECT * FROM  reserve  WHERE reserve.reservid = $id AND reserve.checkin = '0000-00-00 00:00:00'";//LIMIT 10
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    $num_rows = mysql_num_rows($objQuery);
    if($num_rows == 0){
		$strSQL_update = "UPDATE reserve SET"; 
		$strSQL_update .=" checkout = '".$now."'";
		$strSQL_update .=" WHERE reservid  = '".$id ."'";
		$objQuery_update = mysql_query($strSQL_update);
		if(!$objQuery_update){
		    echo "fail!!  : $strSQL_update (request.php)";
		}else{
			echo "";
		}
    }
}
