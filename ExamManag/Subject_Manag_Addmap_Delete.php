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
	
	$id_map = $_GET["id_map"];
	$subid = $_GET["subid"];
	
	if($_GET["action"] == "del" && $id_map != ''){
		
			$strSQL = "DELETE FROM ex_mapexam ";
			$strSQL .="WHERE id_map = '".$id_map."' ";
			$objQuery = mysql_query($strSQL);
			
			if($objQuery != ''){
			echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";
			echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
			else{
			echo "<script language='javascript'>alert('การลบผิดพลาด กรุณาทำรายการใหม่!!');</script>";
			echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
	}else{echo "<script language='javascript'>alert('การส่งค่าผิดพลาด กรุณาทำรายการใหม่!!');</script>";
		echo "<script>window.location='Subject_Manag_Addmap.php?subid=$subid';</script>";}
}
?>