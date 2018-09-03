<?php
	session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.php');

if($_SESSION["stid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	
	$id_set = $_GET["id_set"];
	$Article = $_POST["Article"];;
	$question = $_POST["question"];
	$score = $_POST["score"];
	$today = date("Y-m-d");
	
	$id_question = $_GET["id_question"];
	
	if($_GET["action"] == "del"){
		$strSQL = "DELETE FROM ex_question ";
		$strSQL .="WHERE id_question = '".$id_question."' ";
		$objQuery = mysql_query($strSQL);
		
	}else if($_GET["action"] == "update"){
		$strSQL_Qt = "UPDATE ex_question SET ";
		$strSQL_Qt .="Article = '".$Article."' ";
		$strSQL_Qt .=",question = '".$question."' ";
		$strSQL_Qt .=",score = '".$score."' ";
		$strSQL_Qt .=",last_update = '".$today."' ";
		$strSQL_Qt .="WHERE id_question = '".$id_question."' ";
		$objQuery_Qt = mysql_query($strSQL_Qt);
	}else{
		$strNA = "SELECT * FROM ex_question WHERE id_set = '".$_GET["id_set"]."' AND Article = '".$_POST["Article"]."'";
		$objQueryNA = mysql_query($strNA);
		
		if($objResultNA = mysql_fetch_array($objQueryNA)){
			echo "<script language='javascript'>alert('ข้อซ้ำกรุณาตั้งข้อใหม่!!');</script>";
			echo "<script>window.location='addquestionWrite.php?id_set=$id_set';</script>";
		}else{
			$strSQL = "INSERT INTO ex_question (id_set, Article, question, score, last_update) VALUES ('".$id_set."','".$Article."','".$question."','".$score."','".$today."')";
			$objQuery = mysql_query($strSQL);
		}
	}
	
	// update วัน ในตาราง ex_set และ ex_subject //
	$strSQL_UDs = "UPDATE ex_set SET ";
	$strSQL_UDs .="last_update = '".$today."' ";
	$strSQL_UDs .="WHERE id_set = '".$id_set."' ";
	$objQuery_UDs = mysql_query($strSQL_UDs);
					
	$str_S = "SELECT * FROM ex_set WHERE id_set = '".$id_set."'";
	$objQuery_S = mysql_query($str_S);
	$objResult_S = mysql_fetch_array($objQuery_S);
	$id_subject = $objResult_S["id_subject"];
					
	$strSQL_UDsb = "UPDATE ex_subject SET ";
	$strSQL_UDsb .="last_update = '".$today."' ";
	$strSQL_UDsb .="WHERE id = '".$id_subject."' ";
	$objQuery_UDsb = mysql_query($strSQL_UDsb);
	
	if($_GET["action"] == "del"){
		echo "<script language='javascript'>alert('ลบเรียบร้อย!!');</script>";
		echo "<script>window.location='exammanag.php?id_set=$id_set';</script>";
	}
	
	echo "<script language='javascript'>alert('บันทึกเรียบร้อย!!');</script>";
	echo "<script>window.location='exammanag.php?id_set=$id_set';</script>";
}
?>