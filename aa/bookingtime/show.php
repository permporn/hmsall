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
$time = 8 + floor(($objResult8["section_s"]-1)/2); if($objResult8["section_s"]%2==1){$min="30";}else{$min="00";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55+=$objResult8["section_e"]-$objResult8["section_s"];}

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
<title>S.E.L.F | Show bookingtime</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/ie6_script_other.js"></script>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<body id="page5">
<!-- START PAGE SOURCE -->
<!--<div class="body3"></div>-->
<div class="body1">
  <div class="main">
    <header>
      <div id="logo_box">
       <!-- <h1><a href="#" id="logo">High Solution Math S.E.L.F<span></span></a></h1>--><img src="images/Logo4.png"/>
      </div>
      <nav>
        <ul id="menu">
           <li><a href="home.php" title="หน้าแรก">Home</a></li>
          <li  id="menu_active"><a href="show.php" title="รายการที่ทำการจอง">Table Reserve</a></li>
          <li><a href="editpass.php" title="เปลี่ยนรหัสผ่าน">Change Password</a></li>
          <li ><a href="score.php" title="คะแนน">Score</a></li>
          <li ><a href="logout.php" title="ออกจากระบบ">Logout</a></li>
          <!-- <li class="bg_none"><a href="sitemap.html">Sitemap</a></li>-->
        </ul>
      </nav>
      <div class="wrapper2">
      <!--<div class="text3"></div>-->
        <!--<div class="text2"></div>
      	<ul id="icons">
         <li><a href="#"><img src="images/icon1.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/icon2.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/icon3.jpg" alt=""></a></li>
        </ul>-->
      </div>
    </header>
  </div>
</div>
<!--<div class="body2">
  <div class="main">-->
    <section id="content">
      <div class="marg_top wrapper">
        <article class="col1">
          <div class="box1_out">
            <div class="box1">
            <h2><img src="images/Profile.gif"/></h2>
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
                <br>
            </div>
              
            <!--  <div class="wrapper3">
                <article class="col2">
                <div class="bg left">               
                    <input class="input input1" type="text" value="เลือกวันที่"	onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
                </div>
                <div class="bg left">
                <input class="input input1" type="text" value="เลือกสถานที่"	onblur="if(this.value=='') this.value='เลือกสถานที่'" onFocus="if(this.value =='เลือกสถานที่' ) this.value=''" />
                </div>
                </article>
              </div>-->
              <!--<a href="#" class="button"><span><span>Search</span></span></a>--> </div>
          </div>
        </article>
         <article class="col2 pad_left1">
          <div class="box1_out">
            <div class="box3">
              <h2>Table Reserve</h2>
              <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                           <tbody>
                           <tr>
                           	<td width="14%"     class="tbl2" style="white-space: nowrap;color:#555;"><div align="center"><strong>วันที่</strong></div></td>
                                <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>เวลา</strong></div></td>
                                    <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>สถานที่</strong></div></td>
                                        <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>ยกเลิก</strong></div></td>
                                            
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
                           <tr >
                            <td class="tblx" style="white-space: nowrap; color:#555";><div align="center"><?=DateThai($objResult2["time"]);?></div></td>
                            <td class="tblx" style="white-space: nowrap;" ><div align="center"><?=$time7;?>:<?=$min7?> - <?=$time8;?>:<?=$min8?></div></td>
                            <td class="tblx" style="white-space: nowrap;" ><div align="center"><? if($objResult2["branchid"]==1){?>พญาไท ชั้น 10 <? }else if ($objResult2["branchid"]==2){?>วงเวียนใหญ่ <? }else if ($objResult2["branchid"]==3) {?> วิสุทธิธานี <? }else if ($objResult2["branchid"]==4) {?>พญาไท ชั้น 2 <? }else if ($objResult2["branchid"]==5) {?> พญาไท ชั้น 9 <? }else if ($objResult2["branchid"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค <? } else if ($objResult2["branchid"]==8) {?> ราชบุรี <? }else if ($objResult2["branchid"]==7) {?> ชลบุรี <? } ?> </div></td>
                            <td class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut ="this.bgColor = ''">
                            <? /*$time7 = $time7-1*/?>
                            <div align="center"><? if(DateTimeDiff("$s","$datenew $time7:$min7")<=0)
{ ?><img src="images/accept.png">เรียนไปแล้ว <? }else {?><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='del.php?reservid=<?=$objResult2["reservid"];?>';}"><img src="images/false.png"/>ยกเลิก</a> <? } ?></div></td>
                           </tr>  
                            <? } ?>
                        </tbody>                                           
                 </table>
            </div>
          </div>
          
        </article>
      </div>
     </section>
  </div>
</div>
</body>
</html>