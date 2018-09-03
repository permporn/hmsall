<?php include("config.inc.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>จัดการวีดีโอ</title>
</head>
<?php 
$str = "SELECT * FROM  `path_video` ORDER BY  `path_video`.`id_ref_video` DESC ";
$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
?>
<body>
<a href="managcouressubj.php">กลับ</a>
<br  />
<table >
<tr>
<td><a href="addvideo.php">เพิ่มวีดีโอ</a></td>
</tr>
</table>
<table class="tbl1" width="100%">
<tr>
<td width="151" class="tblx3" ><center><strong>ชื่อ</strong></center></td>
<td class="tblx3"> <center><strong>ลิ้ง</strong></center></td>
<td width="118" class="tblx3"><center><strong>detail</strong></center></td>	
<td width="118" class="tblx3"><center><strong>title</strong></center></td>	
<td width="118" class="tblx3"><center><strong>date_video</strong></center></td>	
<td width="118" class="tblx3"><center><strong>time_video</strong></center></td>	
<td width="86" class="tblx3"><center><strong>แก้ไข</strong></center></td>	
<td width="88" class="tblx3"><center><strong>ลบ</strong></center></td>	
</tr>
<?php 
while($objResulstr = mysql_fetch_array($objQuerystr)){
?>
<tr>
<td class="tblx2" ><?=$objResulstr["name_video"]?></td>
<td class="tblx2" width="186"><?=$objResulstr["video_ref"]?></td>
<td class="tblx2"><?=$objResulstr["detail"]?></td>
<td class="tblx2"><?=$objResulstr["title"]?></td>
<td class="tblx2"><?=$objResulstr["date_video"]?></td>
<td class="tblx2"><?=$objResulstr["time_video"]?></td>
<td class="tblx2"><a href="managvideo2.php?id_ref_video=<?=$objResulstr["id_ref_video"]?>">Edit </a></td>
<td class="tblx2"><a href="delvideo.php?id_ref_video=<?=$objResulstr["id_ref_video"]?>">ลบ </a></td>
</tr>
<?php } ?>

</table>    

</body>
</html>