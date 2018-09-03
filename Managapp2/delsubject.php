<?php 
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
if($_SESSION["accid"] == "" && $_SESSION["status"] == ''){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณา Login');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);

if( $_GET["id_subj_video"] != '' && $_GET["studentid"] != ''){
	
	$strSQL1 = "SELECT * FROM path_video WHERE subcode = '".$_GET["id_subj_video"] ."'";
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
	
	$strSQL3 = "SELECT * FROM map_video WHERE studentid = '".$_GET["studentid"] ."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	$objResult3 = mysql_fetch_array($objQuery3);
	
	$strSQL4 = "SELECT * FROM learn WHERE learnid = '".$objResult3["learnid"] ."'";
	$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
	$objResult4 = mysql_fetch_array($objQuery4);
	
	while($objResult1 = mysql_fetch_array($objQuery1)){
	
	$strSQL2 = "DELETE FROM map_video ";
	$strSQL2 .="WHERE studentid = '".$_GET["studentid"]."' AND id_ref_video ='".$objResult1["id_ref_video"]."'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	}
	if(!$objQuery2){ 
		echo "<script language='javascript'>alert('การลบข้อมูลไม่สำเร็จ(1)');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=editstudentP.php'>";
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
		echo "<script>window.location='editstudentP.php?studentid=".$_GET["studentid"]."&pass=".$objResult4['pass']."&action=AC&id_year=".$objResult4['id_year']."';</script>";
		}
	
}else{
	echo "<script language='javascript'>alert('การส่งค่าผิดพลาด ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=editstudentP.php'>";
}

}

?>