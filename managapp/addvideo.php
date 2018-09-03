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
<table class="tbl1" width="50%">
<tr>
<td class="tblx3"><strong>id</strong></td>
<td class="tblx2">
    <td class="tblx2"></td>
</tr>
<td class="tblx3"><strong>ชื่อ</strong></td>
<td class="tblx2"><input  name="name_video" value=""/></td>
</tr>
<tr>
<td class="tblx3"><strong>ลิ้ง</strong></td>
<td class="tblx2"><input name="video_ref" value="" size="80px"/></td>  
</tr>
<tr>
<td class="tblx3"><strong>รูป</strong></td>
<td class="tblx2"><input name="img_ref" value="" size="80px"/></td>  
</tr>
<tr>
<td class="tblx3"><strong>detail</strong></td>
<td class="tblx2"><input name="detail" value="" size="80px" /></td>
</tr>
<td class="tblx3"><strong>ประเภท</strong></td>
<td class="tblx2">
<select name="title" id="title">
        <option value="personal">personal</option>
        <option value="group">group</option>
    </select>
</td>
</tr>
<tr>
<td class="tblx3"><strong>date_video</strong></td>
<td class="tblx2"><input name="date_video" value="<?=$dd?>"/></td>
</tr>
<td class="tblx3"><strong>time_video</strong></td>
<td class="tblx2"><input name="time_video" value="" /> (ตัวอย่าง 1:30:00น.)</td>
</tr>
<tr>
<td class="tblx3"><strong>รหัสวิชา</strong></td>
<td>
<? 
		$str1 = "SELECT * FROM  `subj_video`";
		$objQuerystr1 = mysql_query($str1) or die ("Error Query [".$str1."]");
		?>
        <select name="subcode" id="subcode">
        <option value="" selected="selected" disabled="disabled">เลือก</option>
        
		<? while($objResulstr1 = mysql_fetch_array($objQuerystr1)){?>
        <option value="<?=$objResulstr1["id_subj_video"]?>"><? echo $objResulstr1["subcode_subj"].",".$objResulstr1["name_subj"]?></option>
		<? }?>
    </select>
    </td>
</tr>
<tr>	
<td class="tblx3"><strong>ไอดีปี</strong></td>
<td class="tblx2"><input name="id_year" value=""/></td>
</tr>
<tr>	
<td class="tblx3"><strong>สถานะ</strong></td>
<td class="tblx2"><input name="status" value="" /></td>
</tr>
<tr>	
<td class="tblx3"></td>
<td class="tblx2"><input type="submit" name="Save" id="Save" value="save"></td>
</tr>
</table>    
</form>
</body>
</html>