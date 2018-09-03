<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.php');

if($_SESSION["stid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด!! กรุณา login ใหม่'); </script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
	
}else{
	$subcode = $_POST["subcode"];
	$name = $_POST["name"];
	$last_update = date('Y-m-d'); 
	
	if($name != '' && $last_update != '' && $subcode != ''){
		
		$strSQL1 = "SELECT * FROM ex_subject WHERE name = '".$name."'";
		$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		$objResult1 = mysql_fetch_array($objQuery1);
		
		if($objResult1 == ''){
			$strSQL = "INSERT INTO ex_subject(subid, name, last_update) VALUES ('".$subcode."','".$name."','".$last_update."')";
			$objQuery = mysql_query($strSQL);
			
			if($objQuery == ''){
			echo "<script language='javascript'>alert('การบันทึกผิดพลาด กรุณาทำรายการใหม่!!');</script>";
			echo "<script>window.location='Exam_Manag_AddnameSubj.php';</script>";
			}else{
			echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
			echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";}
			
		}else{	
		echo "<script language='javascript'>alert('ชื่อวิชาข้อสอบซ้ำ!!');</script>";
		echo "<script>window.location='Exam_Manag_AddnameSubj.php';</script>";}
		
	}else{	
		echo "<script language='javascript'>alert('การส่งค่าผิดพลาด กรุณาทำรายการใหม่!!');</script>";
		echo "<script>window.location='Exam_Manag_AddnameSubj.php';</script>";}
}
?>