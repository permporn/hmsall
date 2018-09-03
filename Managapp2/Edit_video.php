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
<!-- B.1 MAIN CONTENT-->
<div class="main-content">
<!-- Pagetitle -->
<?php
$idsubj = $_GET['id_subj_video'];
$idvideo = $_GET['id_ref_video'];
$str = "SELECT 
		subj_video.name_subj 
		,subj_video.id_year_subj
		,subj_video.name_subj
		,subj_video.subcode_subj
		,path_video.name_video
		,path_video.video_ref
		,path_video.img_deatail
		,path_video.detail
		,path_video.time_video
		,path_video.status
		FROM `path_video`
		JOIN subj_video
		ON path_video.subcode = subj_video.id_subj_video
		WHERE id_ref_video = '".$idvideo."' ORDER BY `name_video` DESC ";

		$objQuery = mysql_query($str) or die ("Error Query [".$str."]");
		$objResult = mysql_fetch_array($objQuery)
?>
<p></p>

<div class="column1-unit">
<h1 class="pagetitle">แก้ไขวีดีโอ วิชา <?=$objResult["name_subj"];?></h1>    
<form id="form1" name="form1" method="post" action="saveaddvideo.php">
<table class="" width="100%">
	<input type="hidden" value="update" name="type" id="type" />
	<input type="hidden" value="<?=$idsubj?>" name="idsubj" id="idsubj" />
    <input type="hidden" value="<?=$objResult["id_year_subj"]?>" name="id_year" id="id_year" />
    <input type="hidden" value="<?=$idvideo?>" name="id_ref_video" id="id_ref_video" />
	<tr>
    <td width="14%" class=""><strong>ชื่อวิชา</strong></td>
    <td width="86%" class=""><?=$objResult["name_subj"];?></td>
    </tr>
    <tr>
    <td width="14%" class=""><strong>รหัสวิชา</strong></td>
    <td width="86%" class=""><?=$objResult["subcode_subj"];?></td>
    </tr>
	<tr>
    <td width="14%" class=""><strong>ชื่อวิดีโอ</strong></td>
    <td width="86%" class=""><input  name="name_video" value="<?=$objResult["name_video"];?>"/> ตัวอย่าง ป.6 Gifted Ep.1</td>
    </tr>
    <tr>
    <td class=""><strong>ลิ้งวิดีโอ</strong></td>
    <td class=""><input name="video_ref" value="<?=$objResult["video_ref"];?>" size="70px"/></td>  
    </tr>
    <tr>
    <td class=""><strong>ลิ้งรูป</strong></td>
    <td class=""><input name="img_ref" value="<?=$objResult["img_deatail"];?>" size="70px"/></td>  
    </tr>
    <tr>
    <td class=""><strong>detail</strong></td>
    <td class=""><input name="detail" value="<?=$objResult["detail"];?>"/> ตัวอย่าง  ป.6 Gifted ครั้งที่ 1</td>
    </tr>
    <tr>
    <td class=""><strong>เวลาวีดีโอ</strong></td>
    <td class=""><input name="time_video" value="<?=$objResult["time_video"];?>"  type="time" size="20px"/>น. </td>
    </tr>
    <tr>
    <td class=""><strong>สถานะ</strong></td>
    <td class="">
            <select name="status" id="status">
            <option  disabled="disabled"  selected="selected" 
            value="<?=$objResult["status"];?>"><? if($objResult["status"]==1){echo "เปิด";} if($objResult["status"]==0){echo "ปิด";};?></option>
            <option value="1">เปิด</option>
            <option value="0">ปิด</option>
            </select>
        </td>  
    </tr>
    <tr>	
    <td class=""></td>
    <td class=""><input type="submit" name="Save" id="Save" value="บันทึก" ></td>
    </tr>	
</table>    
</form>
<input type="button" value="กลับ"  style="float:right; width:100px; margin-right:20px; padding:2px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:120%;" onclick="window.history.back()"/>
</div>

</body>
</html>
<?php } }?>