<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
if($_SESSION['learnid'] == "")
{
echo "<script>alert('กรุณาล็อคอินเข้าสู่ระบบด้วยค่ะ');window.location='index.php';</script>";
exit();
}
include("config.inc.php");
$strSQL99 = "SELECT * FROM learn WHERE learnid = '".$_SESSION["learnid"]."' ";
$objQuery99 = mysql_query($strSQL99);
$objResult99 = mysql_fetch_array($objQuery99);
$strSQL88 = "SELECT * FROM student WHERE studentid = '".$objResult99["studentid"]."' ";
$objQuery88 = mysql_query($strSQL88);
$objResult88 = mysql_fetch_array($objQuery88);
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

</head>
<body id="page3">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<nav>
					<ul id="menu">
						
					</ul>
				</nav>
				<ul id="icons">
					
				</ul>
			</div>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Learn Center</a></h1>
			</div>
			
		</header>

	</div>
</div>
<div class="body2">
	<div class="main">
<!-- content -->
		<section id="content">
			<div class="box1">
			  <div class="wrapper">
					<article class="col2 pad_left22">
                    <div class="pad_left1">
                     
                    	
                     <table width="250" border="1">
                            <tr>
                                <td style="white-space: nowrap;"  class="tblx">
                                <p><?php /*?><?= $namestu; ?><?php */?></p>
                            </td>
                            </tr>
                              <?php /*?> <? while($objResult7 = mysql_fetch_array($objQuery7)){?><?php */?>
                              <tr>
                                  <td width="200"><p><img src="images/user.png"/>      ชื่อ :  <?= $objResult88["studentname"];?> </td>
                                  </tr>
                                  <tr>
                                   <td width="200"><p><img src="images/text_signature.png"/> เลขประจำตัว :  <?= $objResult99["studentid"];?> </td>
                                  <td>&nbsp;</td></p>
                             </tr>
                                <?php /*?>  <? } ?> <?php */?>
                      </table>
                    </div> 
                     <p></p>
                    
                    <div class="pad_left1">
                  		<ul class="list1">
                            <li><a href="Home.php">ประกาศผลคะแนนสอบ</a></li>
						<!--	<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>-->
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
				<article class="col11">
						<div class="pad_left11">
							<h2><img src="images/table.png"/></h2>
						</div>
                         
                         <div class="pad_left11">
							<center><table class="tbl-border" cellpadding="0" cellspacing="1" width="572" >
                            <tbody>
                            <?
							$strSQL11 = "SELECT * FROM learn WHERE learnid = '".$_GET["learnid"]."' ";
$objQuery11 = mysql_query($strSQL11);

                            while($objResult11 = mysql_fetch_array($objQuery11)){
                          ?>
                            <tr>
                            <td width="172"     class="tblx" style="white-space: nowrap;"><p><strong class="select">คณิตศาสตร์ อ.โต้ง </strong><br> 
                              ประกาศคะแนนสอบ <br>
                            <? $strSQL22 = "SELECT * FROM subject WHERE subcode = '".$objResult11["subcode"]."' AND id_year = '".$objResult11["id_year"]."'";
$objQuery22 = mysql_query($strSQL22);
$objResult22 = mysql_fetch_array($objQuery22); echo $objResult22["subname"]; ?>  </p>
<p>
<p>
<p>
<? $strSQL44 = "SELECT * FROM learn WHERE subcode = '".$objResult11["subcode"]."' ";
$objQuery44 = mysql_query($strSQL44);
$summax=0;
$summin=0;
$sum=0;
$i=1;
$Average=1;
                            while($objResult44 = mysql_fetch_array($objQuery44)){if($i==1)
							{$summin=$objResult44['finaltest']+$objResult44['sumpoint'];}
							if($summax<($objResult44['finaltest']+$objResult44['sumpoint'])){$summax=($objResult44['finaltest']+$objResult44['sumpoint']);}
							if($summin>($objResult44['finaltest']+$objResult44['sumpoint'])){$summin=($objResult44['finaltest']+$objResult44['sumpoint']);}
							$sum=$sum+($objResult44['finaltest']+$objResult44['sumpoint']);
							
							$i++;
                                                       if($sum>0){$Average++;}
							}?>
                            
                            <P>
                            <P>
                            <!--<font color="#FF0000"><strong>Max :</strong></font> <font face="Tahoma, Geneva, sans-serif" color="#666666"><strong><?=$summax?></strong></font> <br>
                            <font color="#00CC33"><strong>Min :</strong></font> <font face="Tahoma, Geneva, sans-serif" color="#666666"><strong><?=$summin?></strong></font> <br>-->
                            <!--<font color="#3333FF"><strong>Average :</strong></font>  <font face="Tahoma, Geneva, sans-serif" color="#666666"><strong><?=$sum/($Average-1)?></strong></font>-->
                            <td width="286"     class="tblx" style="white-space: nowrap;"><p><p><p>&nbsp;&nbsp;คะแนนที่ได้ <font face="Tahoma, Geneva, sans-serif" color="#666666"><strong><?=$objResult11['finaltest']+$objResult11['sumpoint'];?></strong></font> คะแนน <br><br><? if($objResult11['finaltest']+$objResult11['sumpoint']>83){ ?> <img src="images/Cartoon exam.png" width="283" height="159"/><? } ?> </td>
                            <td width="108"     class="tblx" style="white-space: nowrap;"><img src="images/logo1.png" width="100" height="100" align="left"/></td>
                            </tr> 
                           <? } ?>
                            </table></center>
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