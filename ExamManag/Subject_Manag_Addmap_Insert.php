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
	$subid = $_POST["subid"];
	$id_subjex = $_POST["h_arti_id1"];
	$name_subjex = $_POST["show_arti_topic"];
	
	
	if($subid != '' && $id_subjex != '' && $name_subjex != ''){ 
	
		$strSQL1 = "SELECT * FROM ex_mapexam WHERE subid = '".$subid."' AND id_subjex = '".$id_subjex."'";
		$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		$objResult1 = mysql_fetch_array($objQuery1);
		
		if($objResult1 == ''){
			$strSQL = "INSERT INTO ex_mapexam(subid, id_subjex) VALUES ('".$subid."','".$id_subjex."')";
			$objQuery = mysql_query($strSQL);
			
			if($objQuery == ''){
			echo "<script language='javascript'>alert('การบันทึกผิดพลาด กรุณาทำรายการใหม่!!');</script>";
			echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";
			}else{
			echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
			echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
			
		}else{	
		echo "<script language='javascript'>alert('มีข้อสอบ อยู่ในวิชานี้แล้ว !!');</script>";
		echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
		
	}else{	
		echo "<script language='javascript'>alert('การส่งค่าผิดพลาด กรุณาทำรายการใหม่!!');</script>";
		echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
}
?>