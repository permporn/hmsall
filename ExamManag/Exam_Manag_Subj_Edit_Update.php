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
	$last_update = date('Y-m-d');
	$name = $_POST["name"];
	$subid = $_POST["subid"];
	$id = $_GET["id"];
	 
	if($name != '' && $id != '' ){
		
			$strSQL = "UPDATE ex_subject SET ";
			$strSQL .="name = '".$name."' ";
			$strSQL .=",subid = '".$subid."' ";
			$strSQL .=",last_update = '".$last_update."' ";
			$strSQL .="WHERE id = '".$id."' ";
			$objQuery = mysql_query($strSQL);
			if($objQuery == ''){
				echo "<script language='javascript'>alert('การแก้ไขผิดพลาด กรุณาทำรายการใหม่!!');</script>";
				echo "<script>window.location='Exam_Manag_Subj_Edit.php?id=$id';</script>";
			}else{
				echo "<script language='javascript'>alert('ทำการแก้ไขเรียบร้อย');</script>";
				echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";}
	}else{
		echo "<script language='javascript'>alert('การส่งค่าผิดพลาด กรุณาทำรายการใหม่!!');</script>";
		echo "<script>window.location='Exam_Manag_Subj_Edit.php?id=$id';</script>";}
}
?>