<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["accid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Please Login!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ทะเบียนนักเรียน อ.โต้ง</title>
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
                                  <td width="90"><p><img src="images/Earth.png"/> welcome: </td>
                                  <td><?=$objResult99["name"];?></td></p>
                             </tr>
                                <tr>
                                  <td width="90"><p><img src="images/Earth.png"/> Status: </td>
                                  <td><?=$objResult99["status"];?></td></p>
                             </tr>
                      </table>
                    </div> 
                     <p></p>
                    
                    <div class="pad_left1">
                  		<ul class="list1">
                        <li><a href="teacherhome.php">เช็คยอดนักเรียน</a></li>
                        <li><a href="teacherstu.php">นักเรียน</a></li>
						<!--	<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>-->
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
			<article class="col11">
						<div class="pad_left11">
							<h2><img src="images/student.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
							<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                            <tbody>
                            <tr>
                           <td width="100%"     class="" style="white-space: nowrap;"><div align="center"><img src="images/Folder.png"/><strong> ปีการศึกษา</strong></div></td>
                           
                            </tr>
                         <? $i=1;
							$strSQL = "SELECT * FROM addterm WHERE year_id ='".$_GET["id_year"]."'";
							$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
							while($objResult = mysql_fetch_array($objQuery))
								{
								?>
                            <tr>
                            <td width="100%" class="tblx" style="white-space: nowrap;"><a href="teachersubstu.php?termid=<?=$objResult["termid"];?>&branchid=<?=$objResult99["branchid"];?>&id_year=<?=$objResult["id_year"];?>">
                            
                            
							<? $strSQL2 = "SELECT * FROM  term WHERE termid ='".$objResult["termid"]."'";	
							$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
							while($objResult2 = mysql_fetch_array($objQuery2))
								{
							if($i==1){ ?><img src="images/Red pin.png"/> <? } 
								else {?><img src="images/Black pin.png"/> <? } ?>
									<?=$objResult2["term"];?></a></div>
                                    </td>
                           </tr> 
                           <?
								 $i++; }}
								?>
                       
                            </table>
						</div>
               		</article>
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