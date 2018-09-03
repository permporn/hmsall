<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
include("config.inc.php");
?>
<body>
<a href="managvideo.php">จัดการพาทวีดีโอ</a>
<br  />
<form id="form1" name="form1" method="GET" action="managcouressubj.php?<?=$_GET["code"]?>">
ค้นหารหัสคอร์ส: <input name="code"/> 
<input type="submit" name="Save" id="Save" value="Save">
</form>
<table border="1">
<tr>
    <td><center>รหัส</center></td>
    <td><center>ปีการศึกษา</center></td>
    <td><center>เทอม</center></td>
</tr>
<?php
if($_GET["code"]!= '' && $_GET["Save"] = "Save"){
	
	$strSQL = "SELECT * FROM subject WHERE subcode = '".$_GET["code"]."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	
	
	while($objResult = mysql_fetch_array($objQuery)){
		$strSQL2 = "SELECT * FROM addterm WHERE id_year ='".$objResult['id_year']."'";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
		
		
	while($objResult2 = mysql_fetch_array($objQuery2)){
		$strSQL4 = "SELECT * FROM year WHERE id ='".$objResult2['year_id']."'";
		$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
		
		$strSQL3 = "SELECT * FROM term WHERE termid ='".$objResult2['termid']."'";
		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
		
		while($objResult3 = mysql_fetch_array($objQuery3)){
			while($objResult4 = mysql_fetch_array($objQuery4)){?>
				
				<tr>
                <td><a href="mapcourse.php?subcode=<?=$objResult['subcode']?>&id_year=<?=$objResult['id_year']?>"><center><?=$objResult['subcode']?></center></a></td>
                <td><center><?=$objResult4['nameyear']?></center></td>
                <td><?=$objResult3['term']?></td>
                
                </tr>
               
			<?
            }
		}}
	}
}
else {?>
	<tr>
    <td colspan="3" ><center>ว่าง</center></td>
    </tr>
	<? }
?></table>
	<?
    $strSQL5 = "SELECT * FROM path_video ";
	$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
	?>
    <p>ตารางคอร์สที่เปิดใน app</p>
    <table border="1">
	<tr>
    	<td><center>วิชา</center></td>
    	<td><center>รหัส</center></td>
        <td><center>แผ่นที่</center></td>
        <td><center>วันที่อัพ</center></td>
        <td><center>สถานะ</center></td>
        <td><center>ลบ</center></td>
    </tr>
    <? 
	
    while($objResult5 = mysql_fetch_array($objQuery5)){
	if($objResult5['subcode'] != '' and $objResult5['id_year'] != 0 ){
	?>
       <tr>
    	<td><center><?=$objResult5['name_video'];?></center></td>
    	<td><center><?=$objResult5['subcode'];?></center></td>
        <td><center><?=$objResult5['title'];?></center></td>
        <td><center><?=$objResult5['date_video'];?></center></td>
        <td><center><a href="openvideoapp.php?id_ref_video=<?=$objResult5['id_ref_video'];?>&status=<?=$objResult5['status']?>"><? if($objResult5['status'] == '0'){echo "ปิด";} else{ echo "เปิด";}?></a></center></td>
        <td><center><a href="delopenvideoapp.php?id_ref_video=<?=$objResult5['id_ref_video'];?>">ลบ</a></center></td>
    </tr>
	<? }} ?>
</table>
</body>
</html>