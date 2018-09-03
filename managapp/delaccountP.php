<?php 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

if( $_GET["action"] == "DEL" && $_GET["studentid"] != ''&& $_GET["idvideo"] != '' ){

	$strSQL2 = "DELETE FROM map_video ";
	$strSQL2 .="WHERE studentid = '".$_GET["studentid"]."' AND id_ref_video ='".$_GET["idvideo"]."'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	
	if(!$objQuery2){ 
		echo "<script language='javascript'>alert('การลบข้อมูลไม่สำเร็จ(1)');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=showstudentP.php'>";
		}
		/*else{
		$strSQL3 = "DELETE FROM learn ";
		$strSQL3 .="WHERE studentid = '".$_GET["studentid"]."'  AND pass = '".$_GET["pass"]."' AND subcode = '".$_GET["subcode"]."'";
		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");		
		if(!$objQuery3){ 
		echo "<script language='javascript'>alert('การลบข้อมูลไม่สำเร็จ(2)');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=showstudent.php'>";
		}*/
		else{	
		echo "<script language='javascript'>alert('ทำการลบข้อมูลเรียบร้อย');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=showstudentP.php'>";
		}
	
}else{
	echo "<script language='javascript'>alert('การส่งค่าผิดพลาด ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=showstudentP.php'>";
}



?>