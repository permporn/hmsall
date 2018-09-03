<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Show Student</title>
</head>
<?php include("config.inc.php");?>

<body>
<a href="home.php">หน้าแรก</a><br />

<p>ตารางคอร์สที่เปิดใน app</p>
    <table border="1">
	<tr>
    	<td><center>ลำดับ</center></td>
    	<td><center>ชื่อ-นามสกุล</center></td>
        <td><center>username</center></td>
        <td><center>password</center></td>
        <td><center>ประเภท</center></td>
        <td><center>รหัสวิชาที่สมัคร</center></td>
        <td><center>คอร์สเรียนAPP</center></td>
        <td><center>แก้ไข</center></td>
        <td><center>ลบ</center></td>
    </tr>
    <? 
	
	$count = 0;
	$strSQL2  = "SELECT map_video.studentid, student.studentname, learn.studentid, learn.pass, learn.id_year, map_video.id_ref_video, learn.subcode, path_video.id_ref_video, path_video.name_video, path_video.title
FROM map_video
JOIN learn ON map_video.learnid = learn.learnid
JOIN student ON map_video.studentid = student.studentid
JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
ORDER BY student.studentname ,path_video.id_ref_video DESC  ";//ชื่อ
	//echo $strSQL2."<br>";}
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while ($objResult2 = mysql_fetch_array($objQuery2)){
		
		$count++;
    ?>
       <tr>
        <td><center><?=$count;?></center></td>
    	<td><?=$objResult2['studentname'];?></td>
    	<td><center><?=$objResult2['studentid'];?></center></td>
        <td><center><?=$objResult2['pass'];?></center></td>
        <td><center><?=$objResult2['title'];?></center></td>
        <td><center><?=$objResult2['subcode'];?></center></td>
        <td><center><?=$objResult2['name_video'];?></center></td>
        <td><center><a href="editstudentP.php?studentid=<?=$objResult2['studentid'];?>&pass=<?=$objResult2['pass'];?>&action=AC&id_year=<?=$objResult2['id_year'];?>">แก้ไข</a></center></td>
        <td><center><a href="delaccountP.php?studentid=<?=$objResult2['studentid'];?>&pass=<?=$objResult2['pass'];?>&action=DEL&subcode=<?=$objResult2['subcode'];?>&idvideo=<?=$objResult2['id_ref_video'];?>">ลบ</a></center></td>
    </tr>
	<? }?>
</body>
</html>