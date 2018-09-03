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
                                <p><img src="images/user.png"/> ชื่อ :  <?php /*?><?= $namestu; ?><?php */?></p>
                            </td>
                            </tr>
                              <?php /*?> <? while($objResult7 = mysql_fetch_array($objQuery7)){?><?php */?>
                              <tr>
                                  <td width="90"><p><img src="images/text_signature.png"/> วิชาที่เรียน : </td>
                                  <td><?php /*?><?=$objResult7["subname"]; ?><?php */?></td></p>
                             </tr>
                                <?php /*?>  <? } ?> <?php */?>
                      </table>
                        <p><img src="images/coins.png"/> เครดิตคงเหลือ :<?= $total; ?></p>
                        <p><img src="images/time_go.png"/> เครดิตที่่ใช้ล่วงหน้า :<?= $check55; ?></p>
                     </div> 
                     <p></p>
                    
                    <div class="pad_left1">
                  		<ul class="list1">
                               <li><a href="Home.php">หน้าแรก</a></li>

                            <li><a href="Score.php">ประกาศผลคะแนนสอบ</a></li>
							<li><a href="Seat.php">ดูที่นั่ง</a></li>
						<!--	<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>-->
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
				<article class="col11">
						<div class="pad_left1">
							<h2><img src="images/seat.png"/></h2>
						</div>
                         
                         <div class="pad_left11">
							<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                            <tbody>
                            <tr>
                           <td width="26%"     class="" style="white-space: nowrap;"><div align="center"><strong>วิชา</strong></div></td>
                           <td width="29%"     class="" style="white-space: nowrap;"><div align="center"><strong>คะแนน</strong></div></td>
                           <td width="28%"     class="" style="white-space: nowrap;"><div align="center"><strong>คะแนน</strong></div></td>
                           <td width="16%"    class="" style="white-space: nowrap;"><div align="center"><strong>คะแนน</strong></div></td>
                            </tr>
                          
                            <tr>
                            <td width="26%"     class="tblx" style="white-space: nowrap;"></td>
                           <td width="29%"     class="tblx" style="white-space: nowrap;"></td>
                           <td width="28%"     class="tblx" style="white-space: nowrap;"></td>
                           <td width="16%"    class="tblx" style="white-space: nowrap;">&nbsp;</td>
                           </tr> 
                       
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