<?php include("config.inc.php")?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>จัดการวีดีโอ</title>
</head>

<?php 
$str = "SELECT * FROM path_video WHERE id_ref_video = '".$_GET["id_ref_video"]."'";
$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
while($objResulstr = mysql_fetch_array($objQuerystr)){
?>
<body>
<form id="form1" name="form1" method="post" action="updatevideo.php">
<table class="tbl1" width="50%">
<tr>
<td class="tblx3">id</td>
<td class="tblx2"><?=$objResulstr["id_ref_video"]?></td></tr>
<tr>
<td class="tblx3"><strong>ชื่อ</strong></td>
<td class="tblx2">
<input  name="name_video" value="<?=$objResulstr["name_video"]?>"/>
<input type="hidden" name="id_ref_video" value="<?=$objResulstr["id_ref_video"]?>"/></td>
</tr>
<tr>
<td class="tblx3"><strong>ลิ้ง</strong></td>
<td class="tblx2"><input name="video_ref" value="<?=$objResulstr["video_ref"]?>" size="80px"/></td>
</tr>
<tr>
<td class="tblx3"><strong>รูป</strong></td>
<td class="tblx2"><input name="img_ref" value="<?=$objResulstr["img_deatail"]?>" size="80px"/></td>  
</tr>
<tr>
<td class="tblx3"><strong>detail</strong></td>
<td class="tblx2"><input name="detail" value="<?=$objResulstr["detail"]?>" size="80px"/></td>	</tr>
<tr>
<td class="tblx3"><strong>ประเภท</strong></td>
<td class="tblx2"><select name="title" id="title">
		<option selected="selected"  value="<?=$objResulstr["title"]?>"><?=$objResulstr["title"]?></option>
        <option value="personal">personal</option>
        <option value="group">group</option>
    </select>
</td>	
</tr>
<tr>
<td class="tblx3"><strong>date_video</strong></td>
<td class="tblx2"><input  name="date_video" value="<?=$objResulstr["date_video"]?>"/></td>
</tr>
<tr>	
<td class="tblx3"><strong>time_video</strong></td>
<td class="tblx2"><input name="time_video" value="<?=$objResulstr["time_video"]?>"/></td>	
</tr>
<tr>
<td class="tblx3"><strong>รหัสวิชา</strong></td>
<td class="tblx2"><input name="subcode" value="<?=$objResulstr["subcode"]?>"/></td>
</tr>
<tr>	
<td class="tblx3"><strong>ปี</strong></td>
<td class="tblx2"><input name="id_year" value="<?=$objResulstr["id_year"]?>" /></td>
</tr>
<tr>	
<td class="tblx3"><strong>สถานะ</strong></td>
<td class="tblx2"><input name="status" value="<?=$objResulstr["status"]?>" /></td>
</tr>
<tr>	
<td class="tblx3"><strong>update</strong></td>
<td class="tblx2"><input type="submit" name="Save" id="Save" value="update"></td>	
</tr>

</table> 
<?php } ?>

</form>
</body>
</html>