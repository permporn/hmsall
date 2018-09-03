<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Student</title>
<script type="text/javascript" src="autoserch/autocomplete.js"></script>
<link rel="stylesheet" href="autoserch/autocomplete.css"  type="text/css"/>
</head>
<?php include("config.inc.php");?>

<body>
<a href="home.php">หน้าแรก</a><br />

<p>ตารางคอร์สที่เปิดใน app</p>
    <table border="1">
	<tr>
    	<td><center>ชื่อ-นามสกุล <font color="#FF0000" size="-2">(ห้ามแก้ไข)</font></center></td>
        <td><center>username <font color="#FF0000" size="-2">(ห้ามแก้ไข)</font></center></td>
        <td><center>password <font color="#FF0000" size="-2">(ห้ามแก้ไข)</font></center></td>
        <td><center>ประเภท</center></td>
        <td><center>คอร์สเรียน</center></td>
        <td><center>บันทึก</center></td>
        <td><center>ยกเลิก</center></td>
    </tr>
    
    <? 
	
	$count = 0;
	$strSQL2  = "SELECT * FROM map_video 
	JOIN student ON map_video.studentid = student.studentid 
	JOIN learn ON map_video.studentid = learn.studentid 
	JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
	WHERE learn.studentid = '".$_GET['studentid']."' AND learn.pass = '".$_GET['pass']."'";
	
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	while ($objResult2 = mysql_fetch_array($objQuery2)){
	//$objResult2 = mysql_fetch_array($objQuery2)	;
	//$count++;
    if($_GET['action'] == 'AC'){
		?>
    <form id="form1" name="form1" method="POST" action="updatestudentP.php">
       <tr>
        <input type="hidden" name="studentname"  id="studentname" value="<?=$_GET['id_year'];?>" readonly/>
    	<td><input type="text" name="studentname"  id="studentname" value="<?=$objResult2['studentname'];?>" readonly/></td>
    	<td><center><input type="text" name="studentid"  id="studentid" value="<?=$objResult2['studentid'];?>" readonly/></center></td>
        <td><center><input type="text" name="pass"  id="pass" value="<?=$objResult2['pass'];?>" readonly /></center></td>
        <td><center><?=$objResult2['title'];?></center></td>
        <td><center>
        <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="50" value="<?=$objResult2['name_video'];?>" />
  		<input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></center></td>
        <td><input type="submit" name="Save" id="Save" value="Save"></td>
        <td><center><a href="showstudentP.php">ยกเลิก</a></center></td>
    </tr>
    </form>
    <? }else{ ?>
    <tr>
    	<td><?=$objResult2['studentname'];?></td>
    	<td><center><?=$objResult2['studentid'];?></center></td>
        <td><center><?=$objResult2['pass'];?></center></td>
        <td><center><?=$objResult2['title'];?></center></td>
        <td><center><?=$objResult2['name_video'];?></center></td>
        <td><center><a href="editstudentP.php?studentid=<?=$objResult2['studentid'];?>&pass=<?=$objResult2['pass'];?>&action=AC">แก้ไข</a></center></td>
        <td><center><a href="showstudentP.php">ยกเลิก</a></center></td>
    </tr>
    
	<?  }} ?>
</table>
<a href="showstudentP.php">กลับ</a>
<script type="text/javascript">

function make_autocomsubject(autoObj,showObj){
	var mkAutoObj=autoObj; 
	var mkSerValObj=showObj; 
	new Autocomplete(mkAutoObj, function() {
		this.setValue = function(id) {		
			document.getElementById(mkSerValObj).value = id;
		}
		if ( this.isModified )
			this.setValue("");
		if ( this.value.length < 1 && this.isNotClick ) 
			return ;	
		return "datasubject.php?q=" +encodeURIComponent(this.value);
    });	
}		

// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocomsubject("show_arti_topic_subj","h_arti_id_subj"); 
</script>
</body>
</html>