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
	$id = $_GET["id"] ;
	if($id != ''){
		$str_ex_set = "SELECT * FROM ex_set WHERE id_subject = '".$id."'";
		$objQuery_ex_set = mysql_query($str_ex_set);
		$objResult_ex_set = mysql_fetch_array($objQuery_ex_set);
		
		if($objResult_ex_set != ''){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('ไม่สามรถลบข้อมูลได้เนื่องจากยังมีข้อสอบอยู่!!');</script>";
			echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";
		}else{
			$strSQL  = "DELETE FROM ex_subject ";
			$strSQL .= "WHERE id = '".$id."' ";
			$objQuery = mysql_query($strSQL);
			
			if($objQuery == ''){
			echo "<script language='javascript'>alert('ทำการลบไม่สำเร็จ กรุณาทำรายการใหม่!!');</script>";
			echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";
			}else{
			echo "<script language='javascript'>alert('การลบเสร็จสิ้น');</script>";
			echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";}
		}
	}else{
		echo "<script language='javascript'>alert('การส่งค่าผิดพลาด กรุณาทำรายการใหม่!!');</script>";
		echo "<script>window.location='Exam_Manag_ShowAll.php';</script>";}
}
?>