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
<h1 class="pagetitle">แก้ไข</h1>
<div class="column1-unit">
   <? 
	$strSQL1  = "SELECT * 
				FROM map_video 
				JOIN student ON map_video.studentid = student.studentid 
				JOIN learn ON map_video.studentid = learn.studentid 
				WHERE learn.studentid = '".$_GET['studentid']."' AND learn.pass = '".$_GET['pass']."'";
	
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
  	$objResult1 = mysql_fetch_array($objQuery1);
	
	if($objResult1 != ''){
	?>
	<table border="1" width="100%">
	<form id="form1" name="form1" method="GET" action="insertaccount.php">
    	<tr><th width="29%" class="top" scope="col"><center>ชื่อ-นามสกุล </center><td><?=$objResult1['studentname'];?></td></th></tr>
        <tr><th width="12%" class="top" scope="col"><center>username </center><td><?=$objResult1['studentid'];?></td></th></tr>
        <tr><th width="12%" class="top" scope="col"><center>password </center><td><?=$objResult1['pass'];?></td></th></tr>
        <tr><th width="12%" class="top" scope="col"><center>วันหมดอายุ </center><td>
        <input name="ex_date" id="ex_date"  value="<?=$objResult1['ex_date'];?>" type="date"/><?=$objResult1['expire_dt'];?></td></th></tr>
        <input type="hidden" name="h_arti_id1" value="<?=$_GET['studentid'];?>"  />
        <input type="hidden" name="id_year" value="<?=$_GET['id_year'];?>"  />
        <input type="hidden" name="pass" value="<?=$_GET['pass'];?>"  />
        
        <tr><th width="12%" class="top" scope="col"><center>เพิ่มคอร์ส </center><td>
        <select name="id_subj" id="id_subj"> 
        <option value="0" disabled="disabled" selected="selected">เลือกวีดีโอเรียน</option>
       <?
        $strSQL_subj = "SELECT * FROM  subj_video WHERE status = '1'";
        $objQuery_subj = mysql_query($strSQL_subj) or die ("Error Query [".$strSQL_subj."]");
        while($objResult_subj = mysql_fetch_array($objQuery_subj)){
        ?>
        <option value="<?=$objResult_subj['id_subj_video'];?>"><?=$objResult_subj['name_subj'];?></option>
        <? }?>
        </select>
        <tr><th width="" class="top" scope="col"><center>ประเภทการชำระ </center><td>
        <input type="radio" name="TypePay" value="monay" checked="checked">เงินสด
        <input type="radio" name="TypePay" value="cradit" >บัตรเคดิต
        <input type="radio" name="TypePay" value="transfer" >โอน
        <input type="radio" name="TypePay" value="free" >ฟรี 
        </td></th></tr>
        <tr><th width="" class="top" scope="col"><center>เลขที่ใบเสร็จ </center><td>
        <input name="ID_Price" id="ID_Price" type="text"  size="" value="" /> 
        </td></th></tr>
        <tr><th width="" class="top" scope="col"><center>จำนวนเงิน </center><td>
    	<input name="Price" id="Price" type="text"  size="" value="" /> บาท
    	</td></th></tr>
        <tr><th width="" class="top" scope="col"><td>
        <input type="submit" name="Save" id="Save" value="Save" class="button" >
        </td></th></tr>
    </form>
    </table>
	<table border="1" width="100%">
	<tr>
        <th width="75%" class="top" scope="col"><center>ชื่อคอร์ส</center></th>
        <th width="19%" class="top" scope="col"><center>ใบเสร็จจ่ายเงิน</center></th>
        <th width="6%" class="top" scope="col"><center>ลบ</center></th>
    <? 
	$strSQL3  = "SELECT * 
				FROM map_video
				JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
				JOIN subj_video ON subj_video.id_subj_video = path_video.subcode
				WHERE map_video.studentid = '".$_GET['studentid']."'";
	$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
	
	while($objResult3 = mysql_fetch_array($objQuery3)){
	if($objResult3['name_subj'] != $name_subj ){
    $name_subj = $objResult3['name_subj'];
	$learnid = $objResult3['learnid'];
	$id_subj_video = $objResult3['id_subj_video'];
	$strSQL_Bill  = "SELECT * FROM bill_video WHERE id_student = '".$_GET['studentid']."' AND id_learn = $learnid AND id_subject = $id_subj_video";
	$objQuery_Bill = mysql_query($strSQL_Bill) or die ("Error Query [".$strSQL_Bill."]");
	$objResult_Bill = mysql_fetch_array($objQuery_Bill)
	?>
    	<tr>	
        <td colspan=""><?=$objResult3['name_subj'];?></td>
        <td colspan=""><center><a href="PrinBillExchange.php?id_Bill_video=<?=$objResult_Bill['id_Bill_video']?>">พิมพ์</a></center></td>
        <td colspan=""><center><a href="delsubject.php?studentid=<?=$_GET['studentid']?>&id_subj_video=<?=$objResult3['id_subj_video']?>">ลบ</a></center></td>
        </tr>
		<? }
	}?>
        <tr><th colspan="3" class="top" scope="col">วีดีโอทั้งหมด</th></tr>
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
	?>
	
    <? if($_GET['action'] == 'AC'){
		?>
    <form id="form1" name="form1" method="POST" action="updatestudentP.php">
   		
     <tr> 
        <td colspan="3">
        <?=$objResult2['detail'];?>
        </td>
    </tr>
    </form>
    
    
	<?  }} ?>
</table> 
</div>
<br />
<? $strSQL2  = "SELECT * FROM map_video 
	JOIN student ON map_video.studentid = student.studentid 
	JOIN learn ON map_video.studentid = learn.studentid 
	JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
	WHERE learn.studentid = '".$_GET['studentid']."' AND learn.pass = '".$_GET['pass']."'";
	
	$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
	$objResult2 = mysql_fetch_array($objQuery2);?>
    

<!--<a href="printcard.php?studentid=<?=$_GET['studentid'];?>&pass=<?=$_GET['pass'];?>">
<input type="button" value="พิมพ์"  style="float:right; width:100px; margin-right:20px; padding:2px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:120%;" />
</a>-->

<?php
$strSQL7 = "SELECT * FROM  subj_video WHERE status = '1'";
$objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]");
?>
<p></p>

<div class="column1-unit">
<h1 class="pagetitle">ตารางคอร์สที่เปิดใน APP</h1>    

<table width="100%">
	<tr>
    	<th class="top" scope="col"><center>วิชา</center></th>
    	<th class="top" scope="col"><center>รหัส</center></th>
        <!--<th class="top" scope="col"><center>รหัสปี</center></th>-->
        <th class="top" scope="col"><center>วันที่อัพ</center></th>
        
    </tr>
    <? 
	while ($objResult7 = mysql_fetch_array($objQuery7)){
    ?>
       <tr>
    	<td><center><?=$objResult7['name_subj'];?></center></td>
    	<td><center><?=$objResult7['subcode_subj'];?></center></td>
        <!--<td><center><?=$objResult7['id_year_subj'];?></center></td>-->
        <td><center><?=$objResult7['update_video'];?></center></td>
    </tr>
	<? } ?>
</table>

<input type="button" value="กลับ"  style="float:right; width:100px; margin-right:20px; padding:2px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:120%;" onclick="window.history.back()"/>
<? }else{
		echo "<script language='javascript'>alert('ไม่มีข้อมูลของ accoutnt นี้แล้ว');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=home.php'>";
		} 
?>
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
make_autocomsubject("show_arti_topic_subj","h_arti_id_subj"); 
</script>

</div>
</div>
</div>
</div>
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
</div>      
</div> 
</body>
</html>
<?php }} ?>