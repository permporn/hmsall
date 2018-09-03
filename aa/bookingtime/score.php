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
          <li ><a href="home.php">Home</a></li>
          <li ><a href="show.php">Table Reserve</a></li>
          <li><a href="editpass.php">Change Password</a></li>
          <li id="menu_active"><a href="score.php" title="คะแนน">Score</a></li>
          <li ><a href="logout.php">Logout</a></li>
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
                           	<td width="14%"     class="tbl2" style="white-space: nowrap;color:#555;"><div align="center"><strong>ลำดับที่</strong></div></td>
                               <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>วิชา</strong></div></td>
                                    <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>รวมคะแนน</strong></div></td>
                                        <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>MAX</strong></div></td>
                                         <td width="14%"     class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>MIN</strong></div></td>
                                            
                           </tr>
                           <?
						 		$i=0;
								$strSQL6 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_SESSION["accid"]."' ";
								$objQuery6 = mysql_query($strSQL6);
								
								$i = 0;$c = 0;$total_min = 0; $min1 = 0; 
								while ($objResult6 = mysql_fetch_array($objQuery6)){
										$i++;
								
								$strSQL11 = mysql_query("SELECT AVG(sumpoint) FROM  `credit`  WHERE `subid` = '".$objResult6["subid"]."' AND  `sumpoint` !=0");
								$total_min = mysql_result($strSQL11,0);
								
								$strSQL4 =  mysql_query("SELECT MAX(sumpoint) FROM credit WHERE subid = '".$objResult6["subid"]."'");
								$total_max = mysql_result($strSQL4,0);
								?>
                           <tr >
                            <td class="tblx" style="white-space: nowrap; color:#555";><div align="center"><?=$i?></div></td>
                            <td class="tblx" style="white-space: nowrap;"><?=$objResult6["subname"];?></td>
                            <td class="tblx" style="white-space: nowrap;"><div align="center"><?=$objResult6["sumpoint"]?></div></td>
                            <td class="tblx" style="white-space: nowrap;"><div align="center"><?=$total_max?></div></td>
                            <td class="tblx" style="white-space: nowrap;"><div align="center"><?=floor($total_min)?></div></td>
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