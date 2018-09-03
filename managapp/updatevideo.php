<?php 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

$name_video = $_POST["name_video"];
$video_ref = $_POST["video_ref"];
$img_ref = $_POST["img_ref"];
$detail = $_POST["detail"];
$subcode = $_POST["subcode"];
$id_year = $_POST["id_year"];
$status = $_POST["status"];
$id_ref_video = $_POST["id_ref_video"];
$title =  $_POST["title"];
$time_video =  $_POST["time_video"];
date_default_timezone_set("Asia/Bangkok");
$dd=date('Y-m-d H:i');

if($id_ref_video != '' && $name_video!= '' && $video_ref!= '' && $detail!= '' && $detail!= '' && $subcode!= '' && $id_year!= ''){
	$strSQL = "UPDATE  path_video  SET ";
	$strSQL .="name_video = '".$name_video."' ";
	$strSQL .=",video_ref = '".$video_ref."' ";
	$strSQL .=",detail = '".$detail."' ";
	$strSQL .=",title = '".$title."' ";
	$strSQL .=",date_video  = '".$dd."' ";
	$strSQL .=",time_video = '".$time_video."' ";
	$strSQL .=",subcode = '".$subcode."' ";
	$strSQL .=",id_year = '".$id_year."' ";
	$strSQL .=",status = '".$status."' ";
	$strSQL .=",img_deatail = '".$img_ref."' ";
	$strSQL .="WHERE `id_ref_video` =  '".$_POST["id_ref_video"]."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if($objQuery = ''){ 
	
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo2.php'>";
	}
	else{
	
	echo "<script language='javascript'>alert('เรียบร้อย  $id_ref_video, $name_video,$video_ref,$detail,$subcode,$id_year;');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php'>";
	}
}else{
	
	echo "<script language='javascript'>alert('ค่าไม่ครบ $id_ref_video, $name_video,$video_ref,$detail,$subcode,$id_year');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php'>";
	}
?>