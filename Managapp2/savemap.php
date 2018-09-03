<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');

$type = $_POST["type"];
$subcode = $_POST["subcode"];
$id_year = $_POST["id_year"];
$id_subj_video = $_POST["id_subj_video"];
$date_end = $_POST["date_end"];

if($type == "savemap" && $subcode != '' && $id_year != '' && $id_subj_video != '' && $date_end != ''){
	
	$strSQL_Learn = "SELECT * FROM learn WHERE subcode = '$subcode' AND id_year = '$id_year'";
	$objQuery_Learn = mysql_query($strSQL_Learn) or die ("Error Query [".$strSQL_Learn."]");
	while ($objResult_Learn = mysql_fetch_array($objQuery_Learn)){
		$learnid = $objResult_Learn['learnid'];
		$studentid = $objResult_Learn['studentid'];
		
		
		
		$strSQL_subj_video = "SELECT * FROM path_video WHERE subcode = '$id_subj_video'";
		$objQuery_subj_video = mysql_query($strSQL_subj_video) or die ("Error Query [".$strSQL_subj_video."]");
		while ($objResult_subj_video = mysql_fetch_array($objQuery_subj_video)){
			$id_ref_video = $objResult_subj_video['id_ref_video'];
			
			$strSQL_same_video= "SELECT * FROM map_video WHERE studentid = '$studentid' AND id_ref_video = '$id_ref_video' AND learnid = '$learnid'";
			$objQuery_same_video = mysql_query($strSQL_same_video) or die ("Error Query [".$strSQL_same_video."]");
			$objResult_same_video = mysql_fetch_array($objQuery_same_video);
			
			if($objResult_same_video == ''){ 
			$strSQL_UpdateDate = "UPDATE learn SET ";
			$strSQL_UpdateDate .="expire_dt = '".$date_end."' ";
			$strSQL_UpdateDate .="WHERE `learnid` =  '".$learnid."'";
			$objQuery_UpdateDate = mysql_query($strSQL_UpdateDate) or die ("Error Query [".$strSQL_UpdateDate."]");
			
			$strSQL_map_video  = "INSERT INTO map_video(`studentid` ,`id_ref_video` ,`learnid`)";
			$strSQL_map_video .= " VALUES (";
			$strSQL_map_video .= "'".$studentid."'";
			$strSQL_map_video .= ",'".$id_ref_video."'";
			$strSQL_map_video .= ",'".$learnid."')";
			$objQuery_map_video = mysql_query($strSQL_map_video) or die ("Error Query [".$strSQL_map_video."]");
			}
		}
	}if($objQuery_map_video = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managecouse.php'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('บันทึกการเพิ่ม video App ในคอร์สแล้ว ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=show_couse.php?type=showstudent&subcode=$id_subj_video'>";}	
}
?>