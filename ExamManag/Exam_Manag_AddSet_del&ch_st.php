<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
	session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.php');

if($_SESSION["stid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	
	$id_subject = $_GET["id_subject"];
	$id_set = $_GET["id_set"];
	$today = date("Y-m-d");
	
	
	
	if($_GET["action"] == "del"){
		
			$strSQL = "DELETE FROM ex_set ";
			$strSQL .="WHERE id_set = '".$id_set."' ";
			$objQuery = mysql_query($strSQL);
			
			$strSQL2 = "DELETE FROM ex_question ";
			$strSQL2 .="WHERE id_set = '".$id_set."' ";
			$objQuery2 = mysql_query($strSQL2);
			
			$strSQL_UDsb = "UPDATE ex_subject SET ";
			$strSQL_UDsb .="last_update = '".$today."' ";
			$strSQL_UDsb .="WHERE id = '".$id_subject."' ";
			$objQuery_UDsb = mysql_query($strSQL_UDsb);
			
			echo "<script language='javascript'>alert('ลบเรียบร้อย!!');</script>";
			echo "<script>window.location='Exam_Manag_AddSet.php?id_subject=$id_subject';</script>";
		
	}else if($_GET["action"] == "Ch_St"){
		$str_S = "SELECT * FROM ex_set WHERE id_set = '".$id_set."'";
		$objQuery_S = mysql_query($str_S);
		$objResult_S = mysql_fetch_array($objQuery_S);
		if($objResult_S["status_set"] == "0"){
			$status_set = "1";
		}else if($objResult_S["status_set"] == "1"){
			$status_set = "0";
		}
		
		$strSQL_UDs = "UPDATE ex_set SET ";
		$strSQL_UDs .="status_set = '".$status_set."' ";
		$strSQL_UDs .=",last_update = '".$today."' ";
		$strSQL_UDs .="WHERE id_set = '".$id_set."' ";
		$objQuery_UDs = mysql_query($strSQL_UDs);
		
		$strSQL_UDsb = "UPDATE ex_subject SET ";
		$strSQL_UDsb .="last_update = '".$today."' ";
		$strSQL_UDsb .="WHERE id = '".$id_subject."' ";
		$objQuery_UDsb = mysql_query($strSQL_UDsb);
		
		echo "<script language='javascript'>alert('เปลี่ยนสถานะเรียบร้อย!!');</script>";
		echo "<script>window.location='Exam_Manag_AddSet.php?id_subject=$id_subject';</script>";
	}
	
}
	
?>