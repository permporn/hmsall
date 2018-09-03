<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION['edate']; 
if($_SESSION['accid'] == "")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณาล็อคอินเข้าสู่ระบบ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
exit();
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
$time = 8 + floor(($objResult8["section"]-1)/2); if($objResult8["section"]%2!=0){$min="00";}else{$min="30";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55++;}
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
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
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
</head>
<body id="page3">
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
<li><a href="http://www.aj-tong.com/"><img src="images/home-icon.png" alt="" title="เว็บเพจ"  width="30" ></a></li>
                                        <li><a href="https://www.facebook.com/atong.highsolution"><img src="images/fb.png" alt="" title="facebook" width="30"></a></li>
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
                     <p></p>
                     <table width="180" border="1" >
                     <tr>
                       <td>
                               <p><img src="images/user.png"/>ชื่อ :   <?= $namestu; ?></p>
                       </td>
                     </tr>
                     </table>
                        <p><img src="images/coins.png"/> เครดิตคงเหลือ :<?= $total; ?></p>
                        <p><img src="images/time_go.png"/> เครดิตที่่ใช้ล่วงหน้า :<?= $check55; ?></p>
<p><img src="images/chak.png"/> วันหมดอายุ :<?=DateThai($e) ?></p>
                     <table width="180" border="1" > 
                     <? while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                       <tr> 
                             <td> <p><img src="images/text_signature.png"/> วิชาที่เรียน :
                              <?=$objResult7["subname"]; ?></p></td>
                    </tr><? } ?>
                      </table>
                       
                     </div> 
                     <p></p>
                    
                    <div class="pad_left1">
                  		<ul class="list1">
                            <li><a href="home.php">จองเวลา</a></li>
							<li><a href="show.php">ดูเวลาจองไว้</a></li>
							<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
				<article class="col11">
						<div class="pad_left11">
							<h2><img src="images/table.png"/></h2>
						</div>
                         
                         <div class="pad_left11">
							<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                            <tbody>
                            <tr>
                           <td width="26%"     class="tbl2" style="white-space: nowrap;"><div align="center"><strong>วันที่</strong></div></td>
                           <td width="29%"     class="tbl2" style="white-space: nowrap;"><div align="center"><strong>เวลา</strong></div></td>
                           <td width="28%"     class="tbl2" style="white-space: nowrap;"><div align="center"><strong>สถานที่เรียน</strong></div></td>
                           <td width="16%"    class="tbl2" style="white-space: nowrap;"><div align="center"><strong>ยกเลิก</strong></div></td>
                            </tr>
                           <?
						 
						   $strSQL2 = "SELECT * FROM reserve where accid = '".$accid."' order  by reservid DESC";
							  $objQuery2 = mysql_query($strSQL2);
							  while ($objResult2 = mysql_fetch_array($objQuery2)){
								  if($objResult2["section"]!=0)
								  {
								  $time7 = 8 + floor(($objResult2["section"]-1)/2); 
								  if($objResult2["section"]%2==1){$min7="00";}
								  else{$min7="30";}
								  $time8 = 8 + ceil(($objResult2["section"]-1)/2); 
								  if($objResult2["section"]%2==1){$min8="30";}
								  else{$min8="00";}
								  }
								  else
								  {
								  $time7 = 8 + floor(($objResult2["section_s"]-1)/2); 
								  if($objResult2["section_s"]%2==1){$min7="00";}
								  else{$min7="30";}
								  $time8 = 8 + floor(($objResult2["section_e"]-1)/2); 
								  if($objResult2["section_e"]%2==1){$min8="00";}
								  else{$min8="30";}
								  }
								  $datenew=$objResult2["time"];
							  ?>
                            <tr>
                            <td width="26%"     class="tblx" style="white-space: nowrap;"><div align="center"><?=DateThai($objResult2["time"]);?></div></td>
                           <td width="29%"     class="tblx" style="white-space: nowrap;"><div align="center">
						   <?=$time7;?>:<?=$min7?> - <?=$time8;?>:<?=$min8?></div></td>
                           <td width="28%"     class="tblx" style="white-space: nowrap;"><div align="center"><? if($objResult2["branchid"]==1){?>พญาไท ชั้น 10 <? }else if ($objResult2["branchid"]==2){?>วงเวียนใหญ่ <? }else if ($objResult2["branchid"]==3) {?> วิสุทธิธานี <? }else if ($objResult2["branchid"]==4) {?>พญาไท ชั้น 2 <? }else if ($objResult2["branchid"]==5) {?> พญาไท ชั้น 9 <? }else if ($objResult2["branchid"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค <? } else if ($objResult2["branchid"]==8) {?> ราชบุรี <? }else if ($objResult2["branchid"]==7) {?> ชลบุรี <? } ?> </div></td>
                           <td width="16%"    class="tblx" style="white-space: nowrap;"><div align="center"><? if(DateTimeDiff("$s","$datenew $time7:$min")<=0)
{ ?><img src="images/accept.png">เรียนไปแล้ว <? }else {?><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='del.php?reservid=<?=$objResult2["reservid"];?>';}"><img src="images/cross.png"/>ยกเลิก</a> <? } ?></div></td>
                           </tr> 
                           <? } ?>
                            </table>
						</div>
                        <div class="pad_left11">
                        <h2></h2>
							<a href="javascript:print()" class="button marg_top11 right "><span><span>&nbsp;&nbsp; พิมพ์ &nbsp;&nbsp;</span></span></a>
						</div>
					</article>
				</div>
			</div>
		</section>
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