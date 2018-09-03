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
	
	$today = date("Y-m-d");
	
	$id_subject = $_GET["id_subject"];
	$id_set = $_GET["id_set"];
	
	$name_set = $_POST["name_set"];
	$type_answer = $_POST["type_answer"];
	$time_use = $_POST["time_use"];
	$standard = $_POST["standard"];
	if($_POST["status_finaltest"]=='' || $type_answer=='2'){ $status_finaltest='0';}
	else{ $status_finaltest = $_POST["status_finaltest"];}
	$last_update = $today;
	
	if($_GET["action"] == "update" ){ //edit
		$strSQL_Qt = "UPDATE ex_set SET ";
		$strSQL_Qt .="name_set = '".$name_set."' ";
		$strSQL_Qt .=",type_answer = '".$type_answer."' ";
		$strSQL_Qt .=",time_use = '".$time_use."' ";
		$strSQL_Qt .=",standard = '".$standard."' ";
		$strSQL_Qt .=",last_update = '".$today."' ";
		$strSQL_Qt .=",status_finaltest = '".$status_finaltest."' ";
		$strSQL_Qt .="WHERE id_set = '".$id_set."' ";
		$objQuery_Qt = mysql_query($strSQL_Qt);
	}else{ //add
		$strSQL = "INSERT INTO  ex_set (id_subject, name_set, type_answer, time_use, standard, last_update, status_finaltest) VALUES ('".$id_subject."','".$name_set."','".$type_answer."','".$time_use."','".$standard."','".$last_update."','".$status_finaltest."')";
		$objQuery = mysql_query($strSQL);
			
	}
		$strSQL_UDsb = "UPDATE ex_subject SET ";
		$strSQL_UDsb .="last_update = '".$today."' ";
		$strSQL_UDsb .="WHERE id = '".$id_subject."' ";
		$objQuery_UDsb = mysql_query($strSQL_UDsb);
		
		echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
		echo "<script>window.location='Exam_Manag_AddSet.php?id_subject=$id_subject';</script>";
}
?>