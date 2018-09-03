<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION["edate"];
$tmp=0;
$cc=$_GET["cc"];
$sectioncc=$_GET["sectioncc"];

/*if($cc == 2)
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('เลือกช่วงเวลาในการจอง โดย');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
}*/

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
$time = 8 + floor(($objResult8["section_s"]-1)/2); if($objResult8["section_s"]%2==1){$min="30";}else{$min="00";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55+=$objResult8["section_e"]-$objResult8["section_s"];}
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
<title>S.E.L.F | Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<!--<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>-->
<!--<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>-->
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
<style type="text/css">
a:link {
	text-decoration: none;
	color: #09C;
}
</style>      
</head>
<body id="page5">
<div class="body1">
  <div class="main">
    <header>
      <div id="logo_box">
        <!--<h1><a href="#" id="logo">High Solution Math S.E.L.F<span></span></a></h1>-->
        <img src="images/Logo4.png"/>
      </div>
      <nav>
        <ul id="menu">
          <li id="menu_active"><a href="home.php" title="หน้าแรก">Home</a></li>
          <li><a href="show.php" title="รายการที่ทำการจอง">Table Reserve</a></li>
          <li><a href="editpass.php" title="เปลี่ยนรหัสผ่าน">Change Password</a></li>
          <li ><a href="score.php" title="คะแนน">Score</a></li>
          <li ><a href="logout.php" title="ออกจากระบบ">Logout</a></li>
          
        </ul>
      </nav>
      <div class="wrapper2"></div>
   </header>
   </div>
</div>
    <section id="content">
      <div class="marg_top wrapper">
        <article class="col1">
          <div class="box1_out">
            <div class="box1">
            <h2>
            <img src="images/Profile.gif"/></h2>
            <div class="wrapper3">
                <article class="col5">
              <table >
                <tr>
                    <td>ชื่อ:</td>
                    <td><?=$namestu; ?></td>
                </tr>
                <tr>
                    <td>เคดิตทั้งหมด:</td>
                    <td><?=$total; ?></td>
                </tr>
                <tr>
                    <td>เคดิตใช้ล่วงหน้า:</td>
                    <td><?=$check55; ?></td>
                </tr>
                <tr>
                    <td>วันหมดอายุ:</td>
                    <td><?=DateThai($e) ?></td>
                </tr>
                <tr>
                    <td>วิชาเรียน:</td>
                </tr>
                 <? while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                       <tr>
                      <td></td>
                       <td style="font-size:13px;"><?='['.++$tmp.']  '?><?=$objResult7["subname"]; ?></td>
                       </tr>
                     <? } ?>
                
                </table>
                </article>
            </div>
              <h2><img src="images/booking.gif"/></h2>
              <div class="wrapper3">
                <article class="col2">
                <form id="form1" name="form1" method="post" action="tranday2.php">
                <div class="bg left">
                  	<input class="input input1" type="text" value="เลือกวันที่"	 id="datepicker-th" name="date0" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
                </div>
                <div class="bg left">
                <select name="local"  id="local" class="input2 input1" >
              		<option value="" onfocus="this.value='';" onblur="if(this.value=='') this.value='เลือกสถานที่'" onFocus="if(this.value =='เลือกสถานที่' ) this.value=''"<option>เลือกสถานที่</option>
                    <option value="1">พญาไท ชั้น 10 </option>
                    <option value="5">พญาไท ชั้น 9 </option>
                    <option value="4">พญาไท ชั้น 2 </option>
                  	<option value="2">วงเวียนใหญ่</option>
                  	<option value="3">วิสุทธิธานี</option>
                  	<option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
                    <option value="7">ชลบุรี</option>
                    <option value="8">ราชบุรี</option>
                 </select>
                </div>
                </form>
                </article>
              </div>
              <a href="#" class="button" onClick="document.getElementById('form1').submit()" title="ค้นหา"><span><span>Search</span></span></a> </div>
          </div>
        </article>
        
        
        <article class="col2 pad_left1">
          <div class="box1_out">
            <div class="box3">
            <body onload="myHide();">
            
            <!-- loaging -->
                <div id="hidepage2" style="display:block; position: fixed;top: 0%; left: 0%;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity:0.5;width:100%;height:100%; background:#FFF;" align="center" width="100%">
                <br><br><br><br><br><br><br><br><br><br>
                <IMG src="images/loading.gif" WIDTH="192" HEIGHT="50" BORDER="0" ALT="กรุณารอสักครู่..." align="center"><br>กรุณารอสักครู่...
                </div>
                
            <!-- กรอบเตือนการเลือกที่นั่ง -->
            <div id="hidepage" style="display:none;">
            	<? if($_GET["date"]==""&&$_GET["lacal"]==""){ ?> <? }else{ ?>
				<? if($cc != 2){ ?>
			<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
  					
                    <tr><td style="white-space: nowrap;" height="40px" class="tblx" ><img src="images/taxt1.jpg"</td></tr>
			</table>
				<? }else if($cc == 2){ ?>
			<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" bgcolor="#FF9900">
  					 <tr><td style="white-space: nowrap;" height="40px" class="tblx" ><img src="images/taxt2.jpg"</td></tr></tr>
			</table>
				<? }?>
            
            
            <!-- เริ่มตารางจองเวลา -->  
			<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                 <tbody>
                 <tr>
                 
                   <td width="14%" class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>เวลา</strong></div></td>
                   <? $dateplus = $_GET["date"];
					  for ($i = 0; $i<5; $i++) {?>
                   <td width="14%" class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong><?=DateThai(add_date($dateplus,$i,0,0))?></strong></div></td>
                      <? } ?>
                  </tr>
                  
                    <!--(1) 8.00 -->       
                    <tr >
                      <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.00</strong></div></td>
                        <?
                                $check=0;
                                $chk1=1;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '1' and section_e >= '1'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                ?>
                      <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                         <div align="center"><strong> <? if($objResult1["1"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 8:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk1>=$objResult2["section_s"]&&$chk1<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==1){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='1'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=8.00&sectioncc=1&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["1"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n 
                                วันที่  <?=DateThai($objResult1["date"]) ?> \n 
                                เวลา  <?=$_GET["timecc"]?>-8.00 \n 
                                สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=1&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=8.00';}">
                                <?= $objResult1["1"];?></a><? } ?></strong></div></td> 
                        <? } ?>      
                    </tr>
                 	   
                   <!--(2) 8.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.30</strong></div></td>
                       <?
                                $check=0;
                                $chk2=2;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '2' and section_e >= '2'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["2"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 8:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk2>=$objResult2["section_s"]&&$chk2<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==1||$objResult4["section"]==2){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='2'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=8.30&sectioncc=2&local=<?=$_GET["local"]?>
                                &date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["2"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-8.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=2&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=8.30';}">
                                <?= $objResult1["2"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr> 
                   
                   <!--(3) 9.00 -->      
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.00</strong></div></td>
                       <?
                                $check=0;
                                $chk3=3;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '3' and section_e >= '3'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong> <? if($objResult1["3"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 9:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk3>=$objResult2["section_s"]&&$chk3<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==2||$objResult4["section"]==3){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='3'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=9.00&sectioncc=3&local=<?=$_GET["local"]?>
                                &date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["3"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-9.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=3&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=9.00';}">
                                <?= $objResult1["3"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                    
                   <!--(4) 9.30 -->        
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.30</strong></div></td>
                       <?
                                $check=0;
                                $chk4=4;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
    
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '4' and section_e >= '4'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["4"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 9.30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk4>=$objResult2["section_s"]&&$chk4<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==3||$objResult4["section"]==4){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='4'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=9.30&sectioncc=4&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["4"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-9.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=4&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=9.30';}">
                                <?= $objResult1["4"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(5) 10.00 --> 
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.00</strong></div></td>
                       <?
                                $check=0;
                                $chk5=5;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '5' and section_e >= '5'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["5"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 10:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk5>=$objResult2["section_s"]&&$chk5<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==4||$objResult4["section"]==5){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='5'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=10.00&sectioncc=5&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["5"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-10.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=5&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=10.00';}">
                                <?= $objResult1["5"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(6) 10.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.30</strong></div></td>
                       <?
                                $check=0;
                                $chk6=6;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '6' and section_e >= '6'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["6"]<=0){?> <img src="images/false.png" /> 
                                <? }else if(DateTimeDiff("$s","$kdate 10:30")<=0){ ?><img src="images/false.png" />
								<? }else if($chk6>=$objResult2["section_s"]&&$chk6<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==5||$objResult4["section"]==6){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='6'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=10.30&sectioncc=6&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["6"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-10.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=6&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=10.30';}">
                                <?= $objResult1["6"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(7) 11.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.00</strong></div></td>
                       <?
                                $check=0;
                                $chk7=7;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '7' and section_e >= '7'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["7"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 11:00")<=0){ ?><img src="images/false.png" />
                                <? }else if($chk7>=$objResult2["section_s"]&&$chk7<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==6||$objResult4["section"]==7){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='7'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=11.00&sectioncc=7&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["7"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-11.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=7&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=11.00';}">
                                <?= $objResult1["7"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(8) 11.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.30</strong></div></td>
                       <?
                                $check=0;
                                $chk8=8;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '8' and section_e >= '8'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["8"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 11:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk8>=$objResult2["section_s"]&&$chk8<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==7||$objResult4["section"]==8){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='8'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=11.30&sectioncc=8&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["8"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-11.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=8&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=11.30';}">
                                <?= $objResult1["8"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(9) 12.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.00</strong></div></td>
                       <?
                                $check=0;
                                $chk9=9;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '9' and section_e >= '9'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["9"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 12:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk9>=$objResult2["section_s"]&&$chk9<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==8||$objResult4["section"]==9){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='9'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=12.00&sectioncc=9&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["9"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-12.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=9&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=12.00';}">
                                <?= $objResult1["9"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(10) 12.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.30</strong></div></td>
                       <?
                                $check=0;
                                $chk10=10;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '10' and section_e >= '10'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["10"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 12:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk10>=$objResult2["section_s"]&&$chk10<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==9||$objResult4["section"]==10){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='10'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=12.30&sectioncc=10&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["10"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-12.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=10&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=12.30';}">
                                <?= $objResult1["10"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(11) 13.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.00</strong></div></td>
                       <?
                                $check=0;
                                $chk11=11;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '11' and section_e >= '11'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["11"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 13:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk11>=$objResult2["section_s"]&&$chk11<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==10||$objResult4["section"]==11){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='11'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=13.00&sectioncc=11&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["11"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-13.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=11&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=13.00';}">
                                <?= $objResult1["11"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(12) 13.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.30</strong></div></td>
                       <?
                                $check=0;
                                $chk12=12;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '12' and section_e >= '12'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["12"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 13:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk12>=$objResult2["section_s"]&&$chk12<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==11||$objResult4["section"]==12){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='12'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=13.30&sectioncc=12&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["12"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-13.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=12&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=13.30';}">
                                <?= $objResult1["12"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(13) 14.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.00</strong></div></td>
                       <?
                                $check=0;
                                $chk13=13;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '13' and section_e >= '13'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["13"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 14:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk13>=$objResult2["section_s"]&&$chk13<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==12||$objResult4["section"]==13){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='13'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=14.00&sectioncc=13&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["13"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-14.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=13&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=14.00';}">
                                <?= $objResult1["13"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(14) 14.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.30</strong></div></td>
                       <?
                                $check=0;
                                $chk14=14;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '14' and section_e >= '14'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["14"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 14:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk14>=$objResult2["section_s"]&&$chk14<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==13||$objResult4["section"]==14){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='14'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=14.30&sectioncc=14&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["14"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-14.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=14&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=14.30';}">
                                <?= $objResult1["14"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(15) 15.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.00</strong></div></td>
                       <?
                                $check=0;
                                $chk15=15;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '15' and section_e >= '15'";
                                $objQuery2 = mysql_query($strSQL2);
    
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["15"]<=0){?> <img src="images/false.png" /> 
                                <? }else if(DateTimeDiff("$s","$kdate 15:00")<=0){ ?><img src="images/false.png" />
								<? }else if($chk15>=$objResult2["section_s"]&&$chk15<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==14||$objResult4["section"]==15){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='15'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=15.00&sectioncc=15&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["15"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-15.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=15&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=15.00';}">
                                <?= $objResult1["15"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(16) 15.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.30</strong></div></td>
                       <?
                                $check=0;
                                $chk16=16;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '16' and section_e >= '16'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["16"]<=0){?> <img src="images/false.png" /> 
					   			<? }else if(DateTimeDiff("$s","$kdate 15:30")<=0){ ?><img src="images/false.png" />
                                <? }else if($chk16>=$objResult2["section_s"]&&$chk16<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==15||$objResult4["section"]==16){?><img src="images/Profile-icon.png" />
                                
                                <? }else if($_GET["sectioncc"]=='16'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=15.30&sectioncc=16&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["16"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-15.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี                        
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=16&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=15.30';}">
                                <?= $objResult1["16"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(17) 16.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.00</strong></div></td>
                       <?
                                $check=0;
                                $chk17=17;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '17' and section_e >= '17'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["17"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 16:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk17>=$objResult2["section_s"]&&$chk17<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               <? }else if($objResult3["section"]==16||$objResult4["section"]==17){?><img src="images/Profile-icon.png" />
                                
                                <? }else if($_GET["sectioncc"]=='17'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=16.00&sectioncc=17&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["17"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-16.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=17&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=16.00';}">
                                <?= $objResult1["17"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(18) 16.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.30</strong></div></td>
                       <?
                                $check=0;
                                $chk18=18;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '18' and section_e >= '18'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["18"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 16:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk18>=$objResult2["section_s"]&&$chk18<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                               	<? }else if($objResult3["section"]==17||$objResult4["section"]==18){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='18'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=16.30&sectioncc=18&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["18"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-16.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=18&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=16.30';}">
                                <?= $objResult1["18"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                         
                   <!--(19) 17.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.00</strong></div></td>
                       <?
                                $check=0;
                                $chk19=19;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '19' and section_e >= '19'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["19"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 17:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk19>=$objResult2["section_s"]&&$chk19<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==18||$objResult4["section"]==19){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='19'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=17.00&sectioncc=19&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["19"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-17.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=19&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=17.00';}">
                                <?= $objResult1["19"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(20) 17.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.30</strong></div></td>
                       <?
                                $check=0;
                                $chk20=20;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '20' and section_e >= '20'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["20"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 17:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk20>=$objResult2["section_s"]&&$chk20<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==19||$objResult4["section"]==20){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='20'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=17.30&sectioncc=20&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["20"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-17.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=20&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=17.30';}">
                                <?= $objResult1["20"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(21) 18.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.00</strong></div></td>
                       <?
                                $check=0;
                                $chk21=21;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '21' and section_e >= '21'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["21"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 18:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk21>=$objResult2["section_s"]&&$chk21<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==20||$objResult4["section"]==21){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='21'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=18.00&sectioncc=21&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["21"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-18.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=21&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=18.00';}">
                                <?= $objResult1["21"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(22) 18.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.30</strong></div></td>
                       <?
                                $check=0;
                                $chk22=22;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '22' and section_e >= '22'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["22"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 18:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk22>=$objResult2["section_s"]&&$chk22<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==21||$objResult4["section"]==22){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='22'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=18.30&sectioncc=22&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["22"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-18.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=22&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=18.30';}">
                                <?= $objResult1["22"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(23) 19.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.00</strong></div></td>
                       <?
                                $check=0;
                                $chk23=23;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '23' and section_e >= '23'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["23"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 19:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk23>=$objResult2["section_s"]&&$chk23<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==22||$objResult4["section"]==23){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='23'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=19.00&sectioncc=23&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["23"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-19.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=23&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=19.00';}">
                                <?= $objResult1["23"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(24) 19.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.30</strong></div></td>
                       <?
                                $check=0;
                                $chk24=24;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '24' and section_e >= '24'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '24'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["24"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 19:30")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk24>=$objResult2["section_s"]&&$chk24<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==23||$objResult4["section"]==24){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='24'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=19.30&sectioncc=24&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["24"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-19.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=24&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=19.30';}">
                                <?= $objResult1["24"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(25) 20.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>20.00</strong></div></td>
                       <?
                                $check=0;
                                $chk25=25;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '25' and section_e >= '25'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '24'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["25"]<=0){?> <img src="images/false.png" />
					   			<? }else if(DateTimeDiff("$s","$kdate 20:00")<=0){ ?><img src="images/false.png" /> 
                                <? }else if($chk25>=$objResult2["section_s"]&&$chk25<=$objResult2["section_e"]){?><img src="images/Profile-icon.png" />
                                <? }else if($objResult3["section"]==24){?><img src="images/Profile-icon.png" />
                                <? }else if($_GET["sectioncc"]=='25'&&$_GET["datecc"]==$objResult1["date"])
                                {?><img src="images/Profile-icon.png" />
                                <? }else if($cc!=2){ ?><a href="home.php?cc=2&timecc=20.00&sectioncc=25&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($objResult1["date"])?>">
                                <?= $objResult1["25"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-20.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=25&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=20.00';}">
                                <?= $objResult1["25"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
        	</tbody>                                           
       </table>
            </div>
          </div>
          </article>
      </div>
     </section>
     <? } ?>
  </div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>