<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
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
<h1 class="pagetitle">จัดการ couses</h1>
<div class="contactform" style="width:95%">
<form id="form1" name="form1" method="Post" action="managecouse.php?type=code">
    <fieldset >
    <legend>&nbsp;+ ค้นหา (รหัสวิชา)&nbsp;</legend>
    <p>
    <label for="" class="left">ค้นหา (รหัสวิชา): </label>
    <input type="text" name="code" id="code" size="40" value="" />
    </p>
    <p><input type="submit" name="Save" id="Save" class="button" value="Save"></p>
    </fieldset>
</form>
</div>
<?
if($_GET["type"] == 'savemap' /*&& $_GET["subcode"] != '' &&  $_GET["id_year"] != ''*/){
	$subcode = $_GET["subcode"];
	$id_year = $_GET["id_year"];	
?>
<form name="form1" method="post" action="savemap.php">
<table width="100%">
	<input  type="hidden" value="<?=$id_year;?>" name="id_year"/>
    <input  type="hidden" value="savemap" name="type"/>
	<tr>
	<th class="top" scope="col"><center>รหัส</center></th>
    <td><input  type="text" value="<?=$subcode;?>" name="subcode" readonly/></td>
	</tr>
	<tr>
    <th class="top" scope="col"><center>วิชาวีดีโอ</center></th>
    <td>
    <select name="id_subj_video" id="id_subj_video">
    	<option value="" disabled="disabled" selected="selected">เลือกวิชาวีดีโอ</option> 
	<?  $strSQL_subj_video = "SELECT * FROM subj_video WHERE status = '1'";
		$objQuery_subj_video = mysql_query($strSQL_subj_video) or die ("Error Query [".$strSQL_subj_video."]");
		while($objResult_subj_video = mysql_fetch_array($objQuery_subj_video)){?>
    	<option value="<?=$objResult_subj_video["id_subj_video"];?>"><?=$objResult_subj_video["name_subj"];?></option> 
	<? } ?>
    </select>
    </td>
	</tr>
	<tr>
    <th class="top" scope="col"><center>วันหมดอายุ</center></th>
    <td><input type="date" name="date_end" /></td>
	</tr>
	<tr>
    <th class="top" scope="col"></th>
    <td><input type="submit" name="Save" id="Save" value="Save"></td>
	</tr>    
</table>
</form>

<? }?>
<?php
if($_GET["type"] = "code" && $_POST["code"] != ''){
?>
<table width="100%">
<tr>
	<th class="top" scope="col"><center>รหัส</center></th>
    <th class="top" scope="col"><center>ปีการศึกษา</center></th>
    <th class="top" scope="col"><center>เทอม</center></th>
</tr>
<?php
	$code = $_POST["code"];
	$strSQL = "SELECT * 
				FROM subject 
				JOIN addterm ON addterm.id_year = subject.id_year
                JOIN year ON addterm.year_id = year.id
                JOIN term ON addterm.termid = term.termid
				WHERE subcode = '$code'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery)){?>
        <tr>
        <td><a href="managecouse.php?type=savemap&subcode=<?=$objResult['subcode']?>&id_year=<?=$objResult['id_year']?>"><center><?=$objResult['subcode']?></center></a></td>
        <td><center><?=$objResult['nameyear']?></center></td>
        <td><?=$objResult['term']?></td>
        </tr>
	<? }
	if($objResult = ''){?><tr><td colspan="3" ><center>-- ว่าง -- </center></td></tr>
<? }?>
</table>
<? }
$strSQL2 = "SELECT * FROM subj_video WHERE status = '1'";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
?>
<p></p>

<div class="column1-unit">
<h1 class="pagetitle">ตารางคอร์สที่เปิดใน APP</h1>    

<table width="100%">
	<tr>
    	<th class="top" scope="col"><center>ชื่อวิชา</center></th>
    	<th class="top" scope="col"><center>รหัส</center></th>
        <!--<th class="top" scope="col"><center>รหัสปี</center></th>-->
        <th class="top" scope="col"><center>วันที่อัพ</center></th>
    </tr>
    <? 
	while ($objResult2 = mysql_fetch_array($objQuery2)){
    ?>
       <tr>
    	<td><center><?=$objResult2['name_subj'];?></center></td>
    	<td><center><?=$objResult2['subcode_subj'];?></center></td>
        <!--<td><center><?=$objResult2['id_year_subj'];?></center></td>-->
        <td><center><?=$objResult2['update_video'];?></center></td>
    </tr>
	<? } ?>
</table>
</div>
</div>
</div>
</div>

<div class="footer">
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
</div>      
</div> 
<?php } ?>

</body>
</html>
<?php } ?><script type="text/javascript"> Cufon.now(); </script>