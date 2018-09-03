<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
include ('funtion.php');
if($_SESSION["accid"] == "" && $_SESSION["status"] == ''){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณา Login');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	$_SESSION["status"] = $objResultSTT["status"];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="cache-control" content="no-cache" />
<meta http-equiv="expires" content="3600" />
<meta name="revisit-after" content="2 days" />
<meta name="robots" content="index,follow" />
<meta name="publisher" content="Your publisher infos here ..." />
<meta name="copyright" content="Your copyright infos here ..." />
<meta name="author" content="Design: Wolfgang (www.1-2-3-4.info) / Modified: Your Name" />
<meta name="distribution" content="global" />
<meta name="description" content="Your page description here ..." />
<meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout2_setup.css" />
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout2_text.css" />
<link rel="icon" type="image/x-icon" href="./img/logoku2.png" />
<script type="text/javascript" src="autoserch/autocomplete.js"></script>
<link rel="stylesheet" href="autoserch/autocomplete.css"  type="text/css"/>
<title>ระบบจัดการAPP</title>
</head>
<body>
<div class="page-container">
<div class="header">
<div class="header-middle">    
<a class="sitelogo" href="#" title="Go to Start page"></a>
<div class="sitename">
<h1><a href="home.php" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
</div>
</div>
<div class="header-bottom">
    <div class="nav2">
        <ul><li><a href="home.php">หน้าแรก</a></li></ul>
            <?php if($_SESSION["accid"] != ""){?>
            <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'ADMIN' || $_SESSION["status"] == 'admin'){?>
            <ul><li><a href="managsubject.php">จัดการวีดีโอ</a></li></ul>
            <ul><li><a href="managecouse.php">จัดการรายชื่อตามคอร์ส</a><ul>
            <li><a href="show_couse.php">วีดีโอที่เปิด App & รายชื่อที่ใช้ App</a></li></ul>
        </li></ul>
        <?php }?>
        <ul><li><a href="home.php">จัดการรายชื่อรายบุคคล</a></li></ul>
        <?php }?> 
    </div>
</div>
<div class="header-breadcrumbs"></div>
<div class="main">
<div class="main-navigation">
<div class="round-border-topright"></div>
<h1 class="first">Login</h1>
<p></p><p></p>
<div class="loginform">
	<?php if($_SESSION["accid"] == ""){?>
    <form method="post" action="check_login.php"> 
    <p><input type="hidden" name="rememberme" value="0" /></p>
    <fieldset>
        <p><label for="username_1" class="top">User:</label><br />
        <input type="text" name="username_1" id="username_1" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
        <p><label for="password_1" class="top">Password:</label><br />
        <input type="password" name="password_1" id="password_1" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
      	<p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>
    </fieldset>
    </form>
<?php }else {?>
<form method="post" action="Logout.php">
<div align="left">
<div class="form_row"><font color="#666666" size="-1"><strong>บัญชีผู้ใช้งาน :</strong>
<?php 
$strSTT = "SELECT * FROM  account WHERE accid = '".$_SESSION["accid"]."' AND status  = '".$_SESSION["status"]."'";
$objQuerySTT = mysql_query($strSTT);
$objResultSTT = mysql_fetch_array($objQuerySTT);
echo $objResultSTT["name"];
?>
</font></div>
</div>
<div class="form_row">
<div align="left">
<font color="#666666" size="-1"><strong>สถานะ : </strong></font><font color="#666666" size="-1"><?php echo $objResultSTT["status"];?></font></div>
</div>
<div align="right">
<input type="submit" name="cmdweblogin" class="button" value="Logout" />
</div>
</form>
</div>  
<h1 class="">เมนู</h1>
<dl class="nav3-grid">
    <dt><a href="home.php">หน้าแรก</a></dt>
    <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'ADMIN' || $_SESSION["status"] == 'admin'){?>
    <dt><a href="managsubject.php">จัดการวีดีโอ</a></dt>
    <dt><a href="managecouse.php">จัดการรายชื่อตามคอร์ส</a></dt>
    <dd><a href="show_couse.php">แสดงรายชื่อประเภทคอร์ส</a></dd>
    <? }?>
    <dt><a href="home.php">จัดการรายชื่อรายบุคคล</a></dt>
</dl>                      
</div>      
<div class="main-content">
<p></p>
<div class="column1-unit">
<h1 class="pagetitle">ตารางวีดีโอใน APP</h1>    

<table width="100%">
	<tr>
    	<th width="33%" class="top" scope="col"><center>ชื่อวิชาวีดีโอ</center></th>
    	<th width="16%" class="top" scope="col"><center>รหัสวีดีโอ</center></th>
        <th width="18%" class="top" scope="col"><center>จำนวน User</center></th>
        <th width="16%" class="top" scope="col"><center>สถานะ</center></th>
        <th width="6%" class="top" scope="col"><center>ลบ</center></th>
    </tr>
    <? 
	$strSQL2 = "SELECT * FROM subj_video WHERE status = 1";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$subj_video = mysql_num_rows($objQuery2) ;
	while ($objResult2 = mysql_fetch_array($objQuery2)){
		$strSQL_user = "SELECT * 
						FROM path_video 
						JOIN map_video ON path_video.id_ref_video = map_video.id_ref_video
						WHERE path_video.subcode = '".$objResult2['id_subj_video']."' group by map_video.studentid";
		$objQuery_user = mysql_query($strSQL_user) or die ("Error Query [".$strSQL_user."]");
		$user = mysql_num_rows($objQuery_user) ;
    ?>
       <tr>
        <td><center><?=$objResult2['name_subj'];?></center></td>
    	<td><center><?=$objResult2['subcode_subj'];?></center></td>
        <td><center><a href="show_couse.php?type=showstudent&subcode=<?=$objResult2['id_subj_video']?>"><?=$user?></a></center></td>
        <td><center>
        <a href="show_couse.php?type=UpdateStatus&subcode=<?=$objResult2['id_subj_video']?>&status=0">
		<? if($objResult2['status'] == 1 ){echo "เปิดใช้";}?></a>
        <a href="show_couse.php?type=UpdateStatus&subcode=<?=$objResult2['id_subj_video']?>&status=1">
		<? if($objResult2['status'] == 0){echo "ปิด";};?></a>
        </center></td>
        <td><center><a href="show_couse.php?type=deleteName&subcode=<?=$objResult2['id_subj_video']?>">ลบ</a></center></td>
    </tr>
	<? } ?>
    <? if($subj_video == 0){?>
	   <tr><td colspan="5"><center>ว่าง</center></td></tr>
		<? }?>
</table>
<div style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#777" align="right">
ลบ = ลบ User ทั้งหมดของวิชานั้น
</div>
<p></p><p></p>
<?
if($_GET['type'] == "deleteName" && $_GET['subcode'] != '' ){
	$subcode = $_GET['subcode'];
	$strSQL_subj = "SELECT * FROM path_video WHERE subcode = '$subcode'";
	$objQuery_subj = mysql_query($strSQL_subj) or die ("Error Query [".$strSQL_subj."]");
	while ($objResult_subj = mysql_fetch_array($objQuery_subj)){
	$id_ref_video = $objResult_subj['id_ref_video'];
		$strSQL_deleteName = "DELETE FROM map_video ";
		$strSQL_deleteName .="WHERE id_ref_video = '".$id_ref_video."' ";
		$objQuery_deleteName = mysql_query($strSQL_deleteName) or die ("Error Query [".$strSQL_deleteName."]");
	}
	if($objQuery_deleteName){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ลบรายชื่อทั้งหมดเรียบร้อย');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=show_couse.php?type=showstudent&subcode=$subcode'>";
	}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('การลบผิดพลาด กรุณาทำรายการใหม่');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=show_couse.php'>";}
}
 
if($_GET['type'] == "UpdateStatus" && $_GET['subcode'] != '' && $_GET['status'] != ''){
	$subcode = $_GET['subcode'];
	$status = $_GET['status'];
	$strSQL_UpdateStatus = "UPDATE subj_video SET ";
	$strSQL_UpdateStatus .="status  = '".$status."' ";
	$strSQL_UpdateStatus .="WHERE `id_subj_video` =  '".$subcode."'";
	$objQuery_UpdateStatus = mysql_query($strSQL_UpdateStatus) or die ("Error Query [".$strSQL_UpdateStatus."]");
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('เปลี่ยนสถานะเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=show_couse.php'>";
}
if($_GET['type'] == "delete" && $_GET['studentid'] != ''){
	$studentid = $_GET['studentid'];
	$subcode = $_GET['subcode'];
	$strSQL2 = "DELETE FROM map_video ";
	$strSQL2 .="WHERE studentid = '".$studentid."' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ลบเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=show_couse.php?type=showstudent&subcode=$subcode'>";
}
if($_GET['type'] == "showstudent" && $_GET['subcode'] != ""){
	$strSQL_user = "SELECT * 
					FROM path_video 
					JOIN map_video ON path_video.id_ref_video = map_video.id_ref_video
					JOIN learn ON map_video.learnid = learn.learnid
					JOIN student ON map_video.studentid = student.studentid
					WHERE path_video.subcode = '".$_GET['subcode']."' group by map_video.studentid";
	$objQuery_user = mysql_query($strSQL_user) or die ("Error Query [".$strSQL_user."]");
	$user = mysql_num_rows($objQuery_user) ;
	
	$strSQL2 = "SELECT * FROM subj_video WHERE id_subj_video = '".$_GET['subcode']."'";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2)
	
?>
    
<h1 class="pagetitle">ตารางรายชื่อ User วิชา <?=$objResult2['name_subj'];?></h1>    
<table width="100%">
	<tr>
    	<th width="6%" class="top" scope="col"><center>No.</center></th>
    	<th width="33%" class="top" scope="col"><center>ชื่อ-นามสกุล</center></th>
    	<th width="13%" class="top" scope="col"><center>รหัสวิชาที่เรียน</center></th>
        <th width="11%" class="top" scope="col"><center>id</center></th>
        <th width="12%" class="top" scope="col"><center>pass</center></th>
        <th width="17%" class="top" scope="col"><center>วันหมดอายุ</center></th>
        <th width="8%" class="top" scope="col"><center>ลบ</center></th>
    </tr>
	<?
	$i =0 ;
	while ($objResult_user = mysql_fetch_array($objQuery_user)){
		$i++;
	?>
    <tr>
    	<td><center><?=$i?></center></td>
    	<td><?=$objResult_user['studentname'];?></td>
        <td><center><?=$objResult_user['subcode'];?></center></td>
    	<td><center><?=$objResult_user['studentid'];?></center></td>
        <td><center><?=$objResult_user['pass'];?></center></td>
        <td><center><?=DateThai($objResult_user['expire_dt']);?></center></td>
        <td><center><a href="show_couse.php?type=delete&studentid=<?=$objResult_user["studentid"]?>&subcode=<?=$_GET['subcode']?>">ลบ</a></center></td>
    </tr>
    <? }
	if($user == 0){?>
    <tr><td colspan="6"><center>ไม่มี User</center></td></tr>
	<? }
?>
</table>
</div>
<div style="font:Verdana, Geneva, sans-serif; font-size:12px; color:#777" align="right">
รหัสวิชาที่เรียน = รหัสวิชาที่ User เรียนอาจจะเป็นคอร์สสด DVD หรือ SELF 
</div> 
<?php } }?>
</div>
</div>
</div>

<div class="footer">
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
</div>      
</div> 
</body>
</html>
<?php } ?><script type="text/javascript"> Cufon.now(); </script>