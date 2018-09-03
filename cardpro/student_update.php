<?php
session_start();
include("ck_session.php");
if($_GET['type'] == "update"){
	if($_GET['learnid'] != "" && $_GET['subid'] != "" && $_GET['seat']!= "" && $_GET['staff'] != '' && $_GET['id_change_couses'] != ''){
	$learnid = $_GET['learnid'];	
	$subid = $_GET['subid'];
	$numseat = $_GET['seat'];
	$staff = $_GET['staff'];
	$id_change_couses = $_GET['id_change_couses'];
	
	$strSQL = "SELECT * FROM subject WHERE subid = '".$subid."'";
	$objQuery = mysql_query($strSQL);
	$objResuut = mysql_fetch_array($objQuery);
	if(!$objResuut){echo "Error Update [".mysql_error()."<br>".$strSQL."]";}
	else{
		$strSQL = "UPDATE learn SET ";
		$strSQL .="subcode = '".$objResuut['subcode']."' ";
		$strSQL .=",seat = '".$numseat."' ";
		$strSQL .=",id_change_couses = '".$id_change_couses."' ";
		$strSQL .=",staff_change_couses = '".$staff."' ";
		$strSQL .="WHERE learnid = '".$learnid."' ";
		$objQuery = mysql_query($strSQL);
		mysql_close();
		
		if($objQuery){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('เปลี่ยนคอร์สเรียบร้อยค่ะ  ');</script>";
			echo "<meta http-equiv='refresh' content='0; URL=student_edit.php?learnid=$learnid'>";}
		}
	}else{
	$a = "learnid)".$_POST['learnid'] .",subid)". $_POST['subid'] .",seat)". $_POST['seat'].",staff)".$_GET['staff'].",id_change_couses)".$_POST['id_change_couses'];
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('การส่งค่าผิดพลาด!!$a ');</script>";
	echo "<meta http-equiv='refresh' content='0; URL=student_edit.php?type=changeseat&learnid=$learnid'>";
	}
}
if($_GET['type'] == "cencelcourse"){
	if($_GET['learnid'] != "" && $_GET['staff'] != '' && $_GET['id_change_couses'] != ''){
	
	$learnid = $_GET['learnid'];	
	$subid = $_GET['subid'];
	$numseat = $_GET['seat'];
	$staff = $_GET['staff'];
	$id_change_couses = $_GET['id_change_couses'];
	$status= 0;
		
		$strSQL = "UPDATE learn SET ";
		$strSQL .="status = '".$status."'";
		$strSQL .=",seat = '".$status."'";
		$strSQL .=",id_change_couses = '".$id_change_couses."' ";
		$strSQL .=",staff_change_couses = '".$staff."' ";
		$strSQL .="WHERE learnid = '".$learnid."' ";
		$objQuery = mysql_query($strSQL);
		
		if($objQuery){
			$strSQL = "SELECT * FROM learn WHERE learnid = '".$learnid."'";
			$objQuery = mysql_query($strSQL);
			$objResuut = mysql_fetch_array($objQuery);
			$studentid = $objResuut['studentid']; 
			mysql_close();
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ยกเลิกคอร์สเรียบร้อยค่ะ  ');</script>";
			echo "<meta http-equiv='refresh' content='0; URL=student_detail.php?studentid=$studentid'>";
		}else{
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('การส่งค่าผิดพลาด!!$a ');</script>";
			echo "<meta http-equiv='refresh' content='0; URL=student_edit.php?type=cencelcourse&learnid=$learnid'>";
		}
	
	}else{
			$a = "learnid)".$_GET['learnid'] .",staff)".$_GET['staff'].",id_change_couses)".$_GET['id_change_couses'];
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('การส่งค่าผิดพลาด!!$a ');</script>";
			echo "<meta http-equiv='refresh' content='0; URL=student_edit.php?type=cencelcourse&learnid=$learnid'>";
		}
}
?>
