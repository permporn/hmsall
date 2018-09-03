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
<div class="main-content">
<h1 class="pagetitle">จัดการ account</h1>
<div class="contactform" style="width:95%">
<form id="form1" name="form1" method="GET" action="insertaccount.php">
    <fieldset >
    <legend>&nbsp;+ ค้นหา (ชื่อ)&nbsp;</legend>
    <p>
    <label for="" class="left">ค้นหาชื่อ-นามสกุล: </label>
    <input name="show_arti_topic" type="text" id="show_arti_topic" size="40" value="<?=$_GET['name'];?>" />
  	<input name="h_arti_id1" type="hidden" id="h_arti_id1" value="" />
    <input name="h_arti_id2" id="h_arti_id2" value="<?=$_GET['studentid']?>" type="hidden"/>
    <input name="type" id="type" value="insertaccount" type="hidden"/>
    <a href="addnamestudent.php">เพิ่มรายชื่อ</a>
    </p>
    <p>
    <label for="" class="left">ค้นหาชื่อวิชาเรียน:</label> 
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
    </p>
    <P>
    <label for="" class="left">วันหมดอายุ:</label> 
    <input name="ex_date" id="ex_date" type="date"  size="40" value="" />
    </P>
    <P>
    <label for="" class="left">ประเภทการชำระ:</label> 
    <input type="radio" name="TypePay" value="monay" checked="checked">เงินสด
    <input type="radio" name="TypePay" value="cradit" >บัตรเคดิต
    <input type="radio" name="TypePay" value="transfer" >โอน
    <input type="radio" name="TypePay" value="free" >ฟรี 
    </P>
    <P>
    <label for="" class="left">เลขที่ใบเสร็จ:</label> 
    <input name="ID_Price" id="ID_Price" type="text"  size="" value="" /> 
    </P>
    <P>
    <label for="" class="left">จำนวนเงิน:</label> 
    <input name="Price" id="Price" type="text"  size="" value="" /> บาท
    </P>
    <p><input type="submit" name="Save" id="Save" class="button" value="Save"></p></fieldset>
</form>
</div>
<?php
$strSQL2 = "SELECT * FROM  subj_video WHERE status = '1'";
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
<p></p>


<div class="column1-unit">
    <h1 class="pagetitle">ค้นหา Account ผู้เรียน</h1>    
    <div class="contactform" style="width:95%">
        <form id="form2" name="form2" method="GET" action="<?=$_SERVER['form2'];?>">
        <fieldset >
        	<legend>&nbsp;+ ค้นหา (ชื่อ)&nbsp;</legend>
            <p><label for="" class="left">ชื่อ-นามสกุล: </label>
            <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="40" value="" />
            <input name="h_arti_id_name" id="h_arti_id_name" value="" type="hidden"/>
            </p>
            <p><input type="submit" name="Save" id="Save" class="button" value="ค้นหา"></p>
        </fieldset>
        </form>
	</div>
            <table border="1" width="100%">
            <tr>
                <th width="38" class="top" scope="col"><center>ลำดับ</center></th>
                <th width="192" class="top" scope="col"><center>ชื่อ-นามสกุล</center></th>
                <th width="61" class="top" scope="col"><center>username</center></th>
                <th width="59" class="top" scope="col"><center>password</center></th>
                <!--<th width="37" class="top" scope="col"><center>พิมพ์</center></th>-->
            </tr>
            
             <? $count = 0;
				$strSQL2  = "SELECT DISTINCT(map_video.studentid),student.studentname, learn.studentid, learn.pass, learn.id_year, map_video.id_ref_video, learn.subcode, path_video.id_ref_video, path_video.name_video, path_video.title
				FROM map_video
				JOIN learn ON map_video.studentid = learn.studentid
				JOIN student ON map_video.studentid = student.studentid
				JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
				JOIN  subj_video ON path_video.subcode=  subj_video.id_subj_video
				WHERE map_video.studentid = '".$_GET["h_arti_id_name"]."'
				ORDER BY student.studentname DESC ";//ชื่อ
				//echo $strSQL2."<br>";}
				$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
				$Num_Rows = mysql_num_rows($objQuery2);
				$objResult2 = mysql_fetch_array($objQuery2);
				$count++;
				if(!$Num_Rows){
              	?>
                <tr><td colspan="5">
            		<center><font color="#FF0000">ไม่พบข้อมูล</font></center>
            	</td></tr>
                <?php } else{?>
                <tr>
                <td><center><?=$count;?></center></td>
                <td><a href="editstudentP.php?studentid=<?=$objResult2['studentid'];?>&pass=<?=$objResult2['pass'];?>&action=AC&id_year=<?=$objResult2['id_year'];?>"><?=$objResult2['studentname'];?></a></td>
                <td><center><?=$objResult2['studentid'];?></center></td>
                <td><center><?=$objResult2['pass'];?></center></td>
                <!--<td><center><a href="printcard.php?studentid=<?=$objResult2['studentid'];?>&pass=<?=$objResult2['pass'];?>">พิมพ์</a></center></td>-->
            	</tr> 
           		<?php }
				} ?>
    	</table>
</div>
</div>
</div>
</div>
<div class="footer">
<p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
</div>      
</div> 
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
function make_autocomname(autoObj,showObj){
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
		return "dataname.php?q=" +encodeURIComponent(this.value);
    });	
}		
make_autocom("show_arti_topic","h_arti_id1");
make_autocomsubject("show_arti_topic_subj","h_arti_id_subj"); 
make_autocomname("show_arti_topic_name","h_arti_id_name");
</script>
</body>
</html>
<?php } ?>