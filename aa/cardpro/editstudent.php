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
                        <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
                        <li><a href="upload.php">ดึงไฟล์ธนาคาร</a></li>
                        <? }?>
                        <li><a href="Home.php">ทะเบียนนักเรียน</a></li>
                            <li><a href="search.php">ค้นหานักเรียน</a></li>
							<li><a href="Subject.php">จัดการข้อมูลวิชาเรียน</a></li>
                            <li><a href="branch.php">จัดการข้อมูลสาขา</a></li>
                            <li><a href="room.php">จัดการข้อมูลห้องเรียน</a></li>
                            <li><a href="term.php">จัดการข้อมูลปีการศึกษา</a></li>
                            <li><a href="Teacher.php">จัดการข้อมูลอาจารย์</a></li>
                            <li><a href="exp.php">คะแนนสอบ</a></li>
                            <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
                            <li><a href="price.php">ยอดแต่ละสาขา</a></li>
                            <li><a href="account.php">จัดการผู้มีสิทธิใช้ระบบ</a></li>
                            <li><a href="even.php">แจ้งข่าวสาร</a></li>
                            <? }?>
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
                         <?
                         $strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid WHERE learnid = '".$_GET["learnid"]."'";
						 $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
						 $objResult = mysql_fetch_array($objQuery);
						?>
							<table width="100%" border="1"  class="tbl-border">
             <!--<tr>
               <td width="107" height="20" >&nbsp;</td>
               <td>&nbsp;</td>
               
             </tr>-->
             <tr>
               <td class="tblyy" >ชื่อ - นามสกุล</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td width="300" class="tblyy"><?=$objResult["studentname"]?></td>
               <td width="155" colspan="5" class="tblyy"><a href="changecourse.php?learnid=<?=$_GET["learnid"]?>&termid=<?=$_GET["termid"];?>&branchid=<?=$_GET["branchid"];?>" style="text-decoration:none"><img src="images/48.png" width="48" height="48">เปลี่ยนคอร์ส</a></td>
             </tr>
             <tr>
               <td  class="tblyy" >เบอร์โทร</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td class="tblyy" ><?=$objResult["tel"]?></td>
               
               <td colspan="5" class="tblyy"><a href="JavaScript:if(confirm('ยืนยันการยกเลิกคอร์ส?\n\n -ที่นั่ง <?=$objResult["seat"]?> จะว่าง \n -ไม่มีการเลื่อนที่นั่ง')==true){window.location='dellearn.php?learnid=<?=$_GET["learnid"];?>&termid=<?=$_GET["termid"];?>&subid=<?=$objResult["subcode"];?>&branchid=<?=$_GET["branchid"];?>';}" style="text-decoration:none"><img src="images/79.png" width="48" height="48"> ยกเลิกคอร์ส</a></td>
             </tr>
             <tr>
              <?
                         $strSQL1 = "SELECT * FROM subject WHERE subcode = '".$objResult["subcode"]."'";
						 $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
						 $objResult1 = mysql_fetch_array($objQuery1);
						?>
               <td width="82" class="tblyy">คอร์ส</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$objResult1["subname"];?></td>
               <td colspan="5"  class="tblyy"><a href="changeseat.php?learnid=<?=$_GET["learnid"]?>&termid=<?=$_GET["termid"];?>&branchid=<?=$_GET["branchid"];?>&subid=<?=$objResult1["subid"];?>" style="text-decoration:none"><img src="images/72.png" width="48" height="48"> เปลี่ยนที่นั่ง</a></td>
             </tr>
             <tr>
               <td width="82"  class="tblyy">รหัส</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$objResult["subcode"]?></td>
               
               <td colspan="5"  class="tblyy"><a href="printcard2.php?learnid=<?=$_GET["learnid"]?>" style="text-decoration:none"><img src="images/Printer_Picture.png" width="40" height="40"> พิมพ์บัตร</a></td>
             </tr>
             <tr>
               <td height="50"  class="tblyy">ที่นั่ง</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td   class="tblyy"><?=$objResult["seat"]?></td>
               <td colspan="5"  class="tblyy"></td>
             </tr>
             <tr>
               <td width="82" height="50" class="tblyy">วันที่โอนเงิน</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy" height="50"><?=$objResult["regisdate"]?></td>
               <td colspan="5"  class="tblyy"></td>
             </tr>
             
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