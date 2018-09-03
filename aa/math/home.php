<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION["edate"];
$tmp=0;
if($_SESSION['accid'] == "")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณา Login เข้าสู่ระบบ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
}
 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
include("config.inc.php");
$strSQL = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_SESSION["accid"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$total = $objResult["totalcredit"];
$namestu = $objResult["name"];
$accid = $_SESSION["accid"]; 
$strSQL7 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$accid."' ";
$objQuery7 = mysql_query($strSQL7);
$check55=0;
$strSQL8 = "SELECT * FROM reserve where accid = '".$accid."'";
$objQuery8 = mysql_query($strSQL8);
while($objResult8 = mysql_fetch_array($objQuery8)){
$time = 7 + floor(($objResult8["section"]-1)/2); if($objResult8["section"]%2==1){$min="00";}else{$min="30";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55++;}
}
if($_GET["action"]=="add")
{echo "<script>alert('เสียเครดิต 1 เครดิตในการจองเวลาเรียนนะค่ะ \n จองเวลาเรียบร้อยแล้วค่ะ ');</script>";}
?>
 <?
						include("config.inc.php");
						function add_date($givendate,$day=0,$mth=0,$yr=0) {
						$cd = strtotime($givendate);
						$newdate = date('Y-m-d', mktime(date('h',$cd),
						date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
						date('d',$cd)+$day, date('Y',$cd)+$yr));
						return $newdate;
						}
						function DateThai($strDate)
						{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("n",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
						$strMonthThai=$strMonthCut[$strMonth];
						return "$strDay $strMonthThai $strYear";
						}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>จองเวลาเรียน S.E.L.F อ.โต้ง</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script>
function myHide()
{
	document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
	document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
}
</script>
<script language="javascript">
function chk_null(){
if (document.form1.date0.value ==""){
alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
document.form1.date0.focus()
return false
}
if (document.form1.local.value ==""){
alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
document.form1.local.focus()
return false
}
}
</script>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', maxDate: +90, minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

		    $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
		</script>	
<!--<script>
$(function() {
	 $('#location').poshytip({
		 className: 'tip-twitter',
		 showOn: 'none',
		 alignTo: 'target',
	     alignX: 'inner-left',
		 offsetX: 0,
		 offsetY: 5
	});
	$('#location').poshytip('show');
});
</script>-->
<style type="text/css">
#divloading {
	width:216px;
	
	height:179px; 
	
	/* make sure it has the highest z-index */
	position:absolute; 
	z-index:5000; 

	/* hide it by default */
	display:none;
}

#dialog-overlay2 {

	/* set it to fill the whil screen */
	width:100%; 
	height:100%;
	
	/* transparency for different browsers */
	filter:alpha(opacity=50); 
	-moz-opacity:0.5; 
	-khtml-opacity: 0.5; 
	opacity: 0.5; 
	background:#000; 

	/* make sure it appear behind the dialog box but above everything else */
	position:absolute; 
	top:0; left:0; 
	z-index:3000; 

	/* hide it by default */
	display:none;
}


#divloading2 {
	width:216px;
	
	height:179px; 
	
	/* make sure it has the highest z-index */
	position:absolute; 
	z-index:5000; 

	/* hide it by default */
	display:none;
}
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		a:link {
	text-decoration: none;
	color: #09C;
}
a:visited {
	text-decoration: none;
	color: #09C;
}
a:hover {
	text-decoration: none;
	color: #09C;
}
a:active {
	text-decoration: none;
	color: #6FF;
}
</style>
</head>
<body id="page3" >
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<nav>
					<ul id="menu">
						<!--<li><a href="index.html">About</a></li>
						<li><a href="Courses.html">Courses</a></li>
						<li><a href="Programs.html">Programs</a></li>
						<li><a href="Teachers.html">Teachers</a></li>
						<li><a href="Admissions.html">Admissions</a></li>
						<li class="end"><a href="Contacts.html">Contacts</a></li>-->
					</ul>
				</nav>
				<ul id="icons">
					<!--<li><a href="#"><img src="images/icons1.jpg" alt=""></a></li>
					<li><a href="#"><img src="images/icons2.jpg" alt=""></a></li>-->
				</ul>
			</div>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Learn Center</a></h1>
			</div>
			<!--<div id="slogan">
				We Will Open The World<span>of knowledge for you!</span>
			</div>-->
		</header>
<!-- / header -->
	</div>
</div>
<div class="body2">
	<div class="main">
<!-- content -->
		<section id="content">
			<div class="box1">
			  <div class="wrapper">
					<article class="col2 pad_left22">
                    <span id="main_top"></span>
						 <div class="pad_left1">
                        <h2><img src="images/aa.png"/></h2>
                        <ul class="list1 pad_bot1">
                        	<form id="form1" name="form1" method="post" action="tranday2.php">
                        		<div  class="wrapper">
                        			<strong>วันที่:</strong>
                            
                                		<div class="bg2"><input type="text" class="input2"  id="datepicker-th" name="date0" title="เลือกวันที่" onfocus="this.value='';" onblur="if (this.value=='') {this.value='------------เลือกวันที่------------';}" value="------------เลือกวันที่------------"></div>
                                        <br />
                                </div>
                        		<div  class="wrapper">
                        			<strong>สถานที่:</strong>
                                <div class="bg2">                              
                                <select name="local" class="select" id="local" >
                                <option value="" onfocus="this.value='';" onblur="if (this.value=='')>-----------เลือกสถานที่---------- {this.value='---------เลือกสถานที่--------';}"<option>-----------เลือกสถานที่----------</option><option value="1">พญาไท ชั้น 10 </option>
<option value="5">พญาไท ชั้น 9 </option>
<option value="4">พญาไท ชั้น 2 </option>
      <option value="2">วงเวียนใหญ่</option>
      <option value="3">วิสุทธิธานี</option>
      <option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
<option value="7">ชลบุรี</option>
                                </select>
                                </div></div>
                                
                       	  </form>
                            
                        </ul>
                        <a onClick="document.getElementById('form1').submit()" class="button" title="ค้นหา"><span><span>ค้นหา
                        
                        </span></span></a>
                        <form name="form2" method="post" action="">
                        </form>
                      </div>
                     
                     <div class="pad_left1">
                      <br/>
                      <br/>
                     <table width="180" border="1" >
                     <tr>
                       <td>
                               <p><img src="images/user.png"/><B>ชื่อ :   </B><?= $namestu; ?></p>
                       </td>
                     </tr>
                     </table>
                        <p><img src="images/coins.png"/><B> เครดิตคงเหลือ :   </B><?= $total; ?></p>
                        <p><img src="images/time_go.png"/><B> เครดิตที่่ใช้ล่วงหน้า :   </B><?= $check55; ?></p>
                        <p><img src="images/chak.png"/><B> วันหมดอายุ :   </B><?=DateThai($e) ?></p>
                        <p><img src="images/text_signature.png"/><B> วิชาที่เรียน</B></p>
                     <table width="180" border="1" > 
                     <? while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                       <tr> 
                             <td><?='[ '.++$tmp.' ]  '?><?=$objResult7["subname"]; ?></p></td>
                    </tr><? } ?>
                      </table>
                    </div> 
                    <p></p>
						
                     <div class="pad_left1">
                   
                        
                     </div>
						<ul class="list1">
							<li><a href="show.php">ดูเวลาจองไว้</a></li>
							<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>
						
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>
                 </article>
                    
					<article class="col11">
						<div class="pad_left11">
                         <body onload="myHide();">


<div id="hidepage2" style="display:block; position: fixed; top: 0%; left: 0%; filter:alpha(opacity=50); 
	-moz-opacity:0.5; 
	-khtml-opacity: 0.5; 
	opacity: 0.5; width:100%; 
	height:100%; background:#000;" align="center" width="100%">

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<IMG src="images/loading.gif" WIDTH="192" HEIGHT="155" BORDER="0" ALT="กรุณารอสักครู่..." align="center"><br>
กรุณารอสักครู่...
</div>

<div id="hidepage" style="display:none;">
                        <? if($_GET["date"]==""&&$_GET["lacal"]==""){ ?> <? }else{ ?>
						<h2><img src="images/tabletime.png"/></h2>
                       
							<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                            <tbody>
                            <tr>
                           <td width="14%"     class="tbl2" style="white-space: nowrap;"><div align="center"><strong></strong></div></td>
                           <?
						   $dateplus = $_GET["date"];
							for ($i = 0; $i<5; $i++) {?>
                           <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong><?=DateThai(add_date($dateplus,$i,0,0))?></strong></div></td>
                           <? } ?> 
                            </tr>
                            
                            <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.00 - 08.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["1"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='1'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 8:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 8.00-8.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=1&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["1"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.30 - 09.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["2"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='2'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 8:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 8.30-9.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=2&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["2"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.00 - 09.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["3"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='3'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 9:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 9.00-9.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=3&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["3"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.30 - 10.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["4"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='4'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 9:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 8.00-8.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=4&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["4"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           

                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.00 - 10.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["5"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='5'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 10:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 10.00-10.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=5&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["5"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.30 - 11.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["6"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='6'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 10:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 10.30-11.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=6&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["6"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           

                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.00 - 11.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["7"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='7'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 11:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 11.00-11.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=7&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["7"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                            
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.30 - 12.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["8"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='8'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 11:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 11.30-12.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=8&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["8"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.00 - 12.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["9"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='9'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 12:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 12.00-12.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=9&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["9"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.30 - 13.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["10"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='10'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 12:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 12.30-13.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=10&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["10"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.00 - 13.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["11"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='11'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 13:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 13.00-13.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=11&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["11"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.30 - 14.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["12"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='12'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 13:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 13.30-14.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=12&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["12"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.00 - 14.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["13"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='13'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 14:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 14.00-14.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=13&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["13"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.30 - 15.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["14"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='14'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 14:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 14.30-15.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=14&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["14"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.00 - 15.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["15"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='15'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 15:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 15.00-15.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=15&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["15"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.30 - 16.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["16"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='16'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 15:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 15.30-16.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=16&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["16"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.00 - 16.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["17"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='17'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 16:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 16.00-16.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=17&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["17"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.30 - 17.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["18"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='18'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 16:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 16.30-17.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=18&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["18"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.00 - 17.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["19"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='19'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 17:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 17.00-17.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=19&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["19"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.30 - 18.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["20"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='20'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 17:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 17.30-18.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=20&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["20"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.00 - 18.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["21"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='21'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 18:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 18.00-18.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=21&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["21"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.30 - 19.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["22"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='22'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 18:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 18.30-19.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=22&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["22"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.00 - 19.30</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["23"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='23'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 19:00")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 19.00-19.30 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=23&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["23"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           <tr>
                            <td width="14%"     class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.30 - 20.00</strong></div></td>
                            <?
							$check=0;
							
							for($i=0; $i<5; $i++)
							{
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '24'";
							$objQuery2 = mysql_query($strSQL2);
							$objResult2 = mysql_fetch_array($objQuery2);
							?>
    						<td width="14%"     class="tblx" style="white-space: nowrap;">
                            <div align="center"><strong>
							<? if($objResult1["24"]<=0){?> <img src="images/false.png" /> 
							<? }else if($objResult2["section"]=='24'){?><img src="images/Profile-icon.png" />
							<? }else if(DateTimeDiff("$s","$kdate 19:30")<=0){ ?><img src="images/false.png" /> 
							<? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
							<?= DateThai($objResult1["date"]) ?> \n เวลา 19.30-20.00 \n สถานที่เรียน 
							<? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
							<? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
							<? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
							<? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
							<? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
							<? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
							<? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section=24&branchid=<?=$_GET["local"];?>&date=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>';}">
							<?= $objResult1["24"];?></a><? } ?></strong></div></td>
   							<? } ?>
                            </tr>  
                           
                           
                           </tbody>                                           
                            </table>
                            </div>
                            <p></p>
                   	  </div>
					</article>
			  </div>
			</div>
		</section>
                            <? } ?>
					
<!-- content -->
<!-- footer -->
		<footer>
			<div class="wrapper">
				<div class="pad1">
					
				</div>
			</div>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>