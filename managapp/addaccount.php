<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type="text/javascript" src="autoserch/autocomplete.js"></script>
<link rel="stylesheet" href="autoserch/autocomplete.css"  type="text/css"/>
<title>Add Account</title>
</head>
<?php include("config.inc.php");?>

<body>
<a href="home.php">หน้าแรก</a><br />

<form id="form1" name="form1" method="GET" action="insertaccount.php">
     
    <p><label for="" class="left">ชื่อ-นามสกุล: </label>
    <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET['name'];?>" />
  	<input name="h_arti_id1" type="hidden" id="h_arti_id1" value="" />
    <input name="h_arti_id2" id="h_arti_id2" value="<?=$_GET['studentid']?>" type="hidden"/>
    <a href="addnamestudent.php">เพิ่มรายชื่อ</a>
    </p>
    
    <p><label for="" class="left">วิชาเรียน:</label> 
    <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="50" value="" />
  	<input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></p>
    
    <p><label for="" class="left">วันหมดอายุ:</label> 
     <input type="date" name="date_end" /></p>
    <p><input type="submit" name="Save" id="Save" value="Save"></p>
</form>
<?php
$strSQL2 = "SELECT * FROM path_video ";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
?>

	<p>ตารางคอร์สที่เปิดใน app</p>
    <table border="1">
	<tr>
    	<td><center>วิชา</center></td>
    	<td><center>รหัส</center></td>
        <td><center>ประเภท</center></td>
        <td><center>วันที่อัพ</center></td>
    </tr>
    <? 
	while ($objResult2 = mysql_fetch_array($objQuery2)){
    ?>
       <tr>
    	<td><center><?=$objResult2['name_video'];?></center></td>
    	<td><center><?=$objResult2['subcode'];?></center></td>
        <td><center><?=$objResult2['title'];?></center></td>
        <td><center><?=$objResult2['date_video'];?></center></td>
    </tr>
	<? } ?>
</table>

<script type="text/javascript">
function make_autocom(autoObj,showObj){
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
		return "data.php?q=" +encodeURIComponent(this.value);
    });	
}
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
make_autocom("show_arti_topic","h_arti_id1");
make_autocomsubject("show_arti_topic_subj","h_arti_id_subj"); 
</script>
</body>
</html>