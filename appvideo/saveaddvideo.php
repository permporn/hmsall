<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

$id_ref_video = $_POST["id_ref_video"];
$name_video = $_POST["name_video"];
$video_ref = $_POST["video_ref"];
$detail = $_POST["detail"];
$title = $_POST["title"];
$date_video = $_POST["date_video"];
$time_video = $_POST["time_video"];


$strSQL = "INSERT INTO path_video( `name_video` ,`video_ref` ,`detail` ,`title` ,`date_video` ,`time_video`)";
	$strSQL .= " VALUES (";
	$strSQL .= "'".$name_video."'";
	$strSQL .= ",'".$video_ref."'";
	$strSQL .= ",'".$detail."'";
	$strSQL .= ",'".$title."'";
	$strSQL .= ",'".$date_video."'";
	$strSQL .= ",'".$time_video."')";
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