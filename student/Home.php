<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
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
							<center><table class="tbl-border" cellpadding="0" cellspacing="1" width="300" >
                            <tbody>
                            <tr>
                           <td width="300"     class="" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
               
                            </tr>
                            <?
							$strSQL11 = "SELECT * FROM learn WHERE studentid = '".$objResult99["studentid"]."' ";
                                                           $objQuery11 = mysql_query($strSQL11);

                            while($objResult11 = mysql_fetch_array($objQuery11)){
                          ?>
                            <tr>
                            <td width="300"     class="tblx" style="white-space: nowrap;"><? if($objResult11['finaltest']+$objResult11['sumpoint']>0){ $strSQL22 = "SELECT * FROM subject WHERE subcode = '".$objResult11["subcode"]."' AND id_year = '".$objResult11["id_year"]."'";
$objQuery22 = mysql_query($strSQL22);
$objResult22 = mysql_fetch_array($objQuery22);?><center> <a href="Score.php?learnid=<?=$objResult11['learnid']; ?>"><?=$objResult22["subname"]; ?></a> </center><? } ?></td>
                           </tr> 
                           <? } ?>
                            </table></center>
						</div>
                        <div class="pad_left11">
                        <h2></h2>
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