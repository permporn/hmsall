<?php 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

$name_video = $_POST["name_video"];
$video_ref = $_POST["video_ref"];
$detail = $_POST["detail"];

	$strSQL = "UPDATE  path_video  SET ";
	$strSQL .="name_video = '".$name_video."' ";
	$strSQL .=",video_ref = '".$video_ref."' ";
	$strSQL .=",detail = '".$detail."' ";
	$strSQL .="WHERE `id_ref_video` =  '".$_GET["id_ref_video"]."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	if($objQuery = ''){ 
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('error');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo2.php'>";
	}
	else{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('เรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=managvideo.php'>";
	}

?>