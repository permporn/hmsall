<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>เพิ่มวีดีโอ</title>
</head>
<?php
include("config.inc.php");
date_default_timezone_set("Asia/Bangkok");
$dd=date('Y-m-d H:i');
 
$str = "SELECT * FROM  `path_video` ORDER BY  `path_video`.`id_ref_video` DESC ";
$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
$objResulstr = mysql_fetch_array($objQuerystr);
?>
<body>
<form id="form1" name="form1" method="post" action="saveaddvideo.php">
<table width="60%">
<tr>
	<td width="76">ID</td>
    <!--<td width="565"><input  name="id_ref_video" value=""/></td>-->
</tr>
<tr>
	<td width="76">ขื่อ :</td>
    <td width="565"><input  name="name_video" value=""/></td>
</tr>
<tr>
	<td>ลิ้ง :</td>
    <td><input name="video_ref" value="" /></td>
    
</tr>
<tr>
    <td>detail :</td>
    <td><input name="detail" value="" /></td>
</tr>
<tr>
	<td>title</td>	
    <td><input name="title" value="" /></td>
</tr>
<tr>
	<td>วันที่อัพ</td>	
    <td><input name="date_video" value="<?=$dd?>"/></td>
</tr>
<tr>
	<td>เวลาทั้งหมด</td>	
    <td><input name="time_video" value="" /> (ตัวอย่าง 1:30:00น.)</td>
</tr>
<tr>
	<td></td>	
	<td><input type="submit" name="Save" id="Save" value="save"></td>
</tr>
</table>    
</form>
</body>
</html>