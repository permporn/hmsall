<?php include("config.inc.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>จัดการวีดีโอ</title>
</head>

<?php 
$str = "SELECT * FROM path_video WHERE id_ref_video = '".$_GET["id_ref_video"]."'";
$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
?>
<body>
<form id="form1" name="form1" method="post" action="updatevideo.php?id_ref_video=<?=$_GET["id_ref_video"]?>">
<table >
<tr>
<td><center>id</center></td>
<td><center>ขื่อ</center></td>
<td><center>ลิ้ง</center></td>
<td><center>detail</center></td>	
</tr>
<?php 
while($objResulstr = mysql_fetch_array($objQuerystr)){
?>
<tr>
<td><?=$objResulstr["id_ref_video"]?></td>
<td><input  name="name_video" value="<?=$objResulstr["name_video"]?>"/></td>
<td width="200px"><input name="video_ref" value="<?=$objResulstr["video_ref"]?>" size="80px"/></td>
<td><input name="detail" value="<?=$objResulstr["detail"]?>" /></td>
<td><input type="submit" name="Save" id="Save" value="update"></td>
</tr>
<?php } ?>

</table>    
</form>
</body>
</html>