<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');

$type = $_POST["type"];
$idsubj = $_POST["idsubj"];
$idvideo = $_POST["id_ref_video"];
$name_video = $_POST["name_video"];
$video_ref = $_POST["video_ref"];
$img_ref = $_POST["img_ref"];
$detail = $_POST["detail"];
$date_video = date("Y-m-d");;
$time_video = $_POST["time_video"];
$id_year = $_POST["id_year"];
$status = $_POST["status"];

if($type == "update" && $idvideo != '' && $idsubj != ''){
	$strSQL = "UPDATE  path_video  SET ";
	$strSQL .="name_video = '".$name_video."' ";
	$strSQL .=",video_ref = '".$video_ref."' ";
	$strSQL .=",detail = '".$detail."' ";
	$strSQL .=",date_video  = '".$date_video."' ";
	$strSQL .=",time_video = '".$time_video."' ";
	$strSQL .=",status = '".$status."' ";
	$strSQL .=",img_deatail = '".$img_ref."' ";
	$strSQL .="WHERE `id_ref_video` =  '".$_POST["id_ref_video"]."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	//echo $strSQL;
	if($objQuery = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Edit_video.php?id_subj_video=$idsubj'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('แก้ไขวีดีโอเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php?id_subj_video=$idsubj'>";}
}
else if($type == "updatesubj" && $idsubj != ''){
	$name_subj =  $_POST["name_subj"];
	$subcode_subj = $_POST["subcode_subj"];
	$id_year_subj = $_POST["id_year_subj"];
	$update_video = $_POST["update_video"];
	$status = $_POST["status"];
	
	$strSQL = "UPDATE  subj_video  SET ";
	$strSQL .="name_subj = '".$name_subj."' ";
	$strSQL .=",subcode_subj = '".$subcode_subj."' ";
	$strSQL .=",id_year_subj = '".$id_year_subj	."' ";
	$strSQL .=",update_video  = '".$update_video."' ";
	$strSQL .=",status = '".$status."' ";
	$strSQL .="WHERE `id_subj_video` =  '".$idsubj."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if($objQuery = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php?id_subj_video=$idsubj'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('แก้ไขชื่อวิชาเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managsubject.php'>";}
}
else if($name_video != '' && $date_video != '' && $idsubj != '' && $id_year != ''){
$strSQL = "INSERT INTO path_video( `name_video` ,`video_ref` ,`detail` ,`date_video` ,`time_video` ,subcode ,id_year ,status ,img_deatail)";
	$strSQL .= " VALUES (";
	$strSQL .= "'".$name_video."'";
	$strSQL .= ",'".$video_ref."'";
	$strSQL .= ",'".$detail."'";
	$strSQL .= ",'".$date_video."'";
	$strSQL .= ",'".$time_video."'";
	$strSQL .= ",'".$idsubj."'";
	$strSQL .= ",'".$id_year."'";
	$strSQL .= ",'1'";
	$strSQL .= ",'".$img_ref."')";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if($objQuery = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=addvideo.php?id_subj_video=$idsubj'>";}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('เพิ่มวีดีโอเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php?id_subj_video=$idsubj'>";}
}
else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('การบันทึกวีดีโอผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php?id_subj_video=$idsubj&type=$type'>";
	}

?>
