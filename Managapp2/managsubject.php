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
	//echo $_SESSION["accid"]."/".$_SESSION["status"]."/".$objResultSTT["status"];
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
            <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'admin'){?>
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
    <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'admin'){?>
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
if( $_POST['type'] == "insert"){
	$name_subj =  $_POST["name_subj"];
	$subcode_subj = $_POST["subcode_subj"];
	$id_year_subj = $_POST["id_year_subj"];
	$update_video = $_POST["update_video"];
	$status = $_POST["status"];
	
	$strSQL = "INSERT INTO subj_video( `name_subj` ,`subcode_subj` ,`id_year_subj` ,`update_video` ,`status`)";
	$strSQL .= " VALUES (";
	$strSQL .= "'".$name_subj."'";
	$strSQL .= ",'".$subcode_subj."'";
	$strSQL .= ",'".$id_year_subj."'";
	$strSQL .= ",'".$update_video."'";
	$strSQL .= ",'".$status."')";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
}

if($_GET['type'] == "delete" && $_GET['id_subj_video']){
	$id_subj = $_GET['id_subj_video'];
	
	$strSQL2 = "DELETE FROM subj_video ";
	$strSQL2 .="WHERE id_subj_video = '".$id_subj."' ";
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
}

$str = "SELECT * 
		FROM  `subj_video` 
		ORDER BY  `subj_video`.`update_video` DESC ";
$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
?>
<p></p>

<div class="column1-unit">
  
<div align="right"><font size="+1"><a href="managsubject.php?type=addsubject">+ เพิ่มวิชา</a></font></div>
<? if( $_GET['type'] == "addsubject"){?>
<h1 class="pagetitle">เพิ่มวิชา</h1>   
<form id="form2" name="form2" method="post" action="<?=$_SERVER['PHP_SELF']?>">
<table class="" width="100%">
	<tr>
    <td width="14%" class=""><strong>ชื่อวิชา</strong></td>
    <td width="86%" class=""><input  name="name_subj" type="text" value="" /></td>
    <input  name="type" type="hidden" value="insert" />
    </tr>
    <tr>
    <td width="14%" class=""><strong>รหัสวิชา</strong></td>
    <td width="86%" class=""><input  name="subcode_subj" type="text" value="" /></td>
    </tr>
	<tr>
    <td width="14%" class=""><strong>ปี</strong></td>
    <?
		$strterm = " SELECT year.nameyear ,term.term
					FROM addterm
					JOIN year ON addterm.year_id = year.id
					JOIN term ON addterm.termid = term.termid
					WHERE id_year = '".$objResulsubj["id_year_subj"]."'";
		$objQueryterm = mysql_query($strterm) or die ("Error Query [".$strterm."]");
		$objResulterm = mysql_fetch_array($objQueryterm);
	?>
    <td width="86%" class="">
    <select name="id_year_subj" id="id_year_subj">
    <option  disabled="disabled" value="<?=$objResulterm["id_year"];?>"><?=$objResulterm["nameyear"]."".$objResulterm["term"];?></option>
     <?
		$strterm2 = " SELECT year.nameyear ,term.term ,addterm.id_year
					FROM addterm
					JOIN year ON addterm.year_id = year.id
					JOIN term ON addterm.termid = term.termid";
		$objQueryterm2 = mysql_query($strterm2) or die ("Error Query [".$strterm2."]");
		while($objResulterm2 = mysql_fetch_array($objQueryterm2)){
	?>
    <option value="<?=$objResulterm2["id_year"];?>"><?=$objResulterm2["nameyear"]."".$objResulterm2["term"];?></option>
    <? }?>
    </select></td>
    </tr>
    <tr>
    <td class=""><strong>วันที่อัพ</strong></td>
    <td class=""><input name="update_video" type="date" value="" /></td>  
    </tr>
    <tr>
    <td class=""><strong>สถานะ</strong></td>
    <td class="">
    <select name="status" id="status">
    <option  disabled="disabled" value="">เลือก</option>
    <option value="1">เปิด</option>
    <option value="0">ปิด</option>
    </select>
    </td>  
    </tr>
    <tr>
    <tr>	
    <td class=""></td>
    <td class=""><input type="submit" name="Save" id="Save" value="บันทึก" ></td>
    </tr>	
</table> 
</form>  
<? }?>
<h1 class="pagetitle">จัดการวีดีโอ</h1>  
<table width="100%">
	<tr>
    	<td width="17%"><center><strong>วันที่อัพ</strong></center></td>
    	<td width="28%"><center><strong>ชื่อวิชา</strong></center></td>
        <td width="13%"><center><strong>รหัสวิชา</strong></center></td>
        <td width="15%"><center><strong>ปีการศึกษา</strong></center></td>	
        <td width="10%"><center><strong>สถานะ</strong></center></td>	
        <td width="9%"><center><strong>แก้ไข</strong></center></td>	
        <td width="8%"><center><strong>ลบ</strong></center></td>	
    </tr>
    <? 
	$i = 0;
	while($objResulstr = mysql_fetch_array($objQuerystr)){
		$i++;
    ?>
       <tr>
      	<td><center><?=$objResulstr["update_video"]?></center></td>
    	<td><a href="managvideo.php?id_subj_video=<?=$objResulstr["id_subj_video"]?>"><?=$objResulstr["name_subj"]?></a></td>
        <td><center><?=$objResulstr["subcode_subj"]?></center></td>
        <?
		$strterm = " SELECT year.nameyear ,term.term
					FROM addterm
					JOIN year ON addterm.year_id = year.id
					JOIN term ON addterm.termid = term.termid
					WHERE id_year = '".$objResulstr["id_year_subj"]."'";
		$objQueryterm = mysql_query($strterm) or die ("Error Query [".$strterm."]");
		$objResulterm = mysql_fetch_array($objQueryterm);
		?>
        <td><center><? echo $objResulterm["nameyear"]."".$objResulterm["term"]?></center></td>
        <td><center><? if($objResulstr["status"]==1){echo "เปิด";}else{echo "ปิด";}?></center></td>
        <td><center><a href="managvideo.php?id_subj_video=<?=$objResulstr["id_subj_video"]?>">Edit</a></center></td>
        <td><center><a href="<?=$_SERVER['PHP_SELF']?>?type=delete&id_subj_video=<?=$objResulstr["id_subj_video"]?>">ลบ</a></center></td>
        
    </tr>
	<? } ?>
</table>
</div>
<? }?>

</div>
</div>
</div>
<div class="footer">
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
</div>      
</div>
</body>
</html><?php }mysql_close(); ?>
<script type="text/javascript"> Cufon.now(); </script>