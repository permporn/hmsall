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
        <? if($_GET["action"]==1)
{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('แก้ไขข้อมูลแล้ว');</script>";} ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ทะเบียนนักเรียน อ.โต้ง</title>
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
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'yy-mm-dd', maxDate: +90, minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

		    $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#edate").datepicker({ dateFormat: 'yy-mm-dd'});

		    $("#inline").datepicker({ dateFormat: 'yy-mm-dd', inline: true });


			});
		</script>
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
							<h2><img src="images/yod.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
	
   <?
   $sql = "SELECT count( learnid ) AS Total
FROM learn
JOIN subject ON learn.subcode = subject.subcode
JOIN teacher ON subject.teachid = teacher.teacherid WHERE teachername = '".$objResult99["name"]."'";
$que = mysql_query($sql);
$read = mysql_fetch_array($que);
?><center><table class="tbl-border" cellpadding="0" cellspacing="1" width="400">
	  <tr>
       <center>
         <th width="700" class="tbl2" style="white-space: nowrap;"><strong>ยอดรวมของ<?=$objResult99["name"];?></strong> &nbsp;&nbsp;<strong><?=$read["Total"];?></strong> คน</th></center>
         </tr>
         </table>
         </center>
         </br>
         <center>
         <table class="tbl-border" cellpadding="0" cellspacing="1" width="400">
	  
      <tr>
                           <td width="60%"     class="" style="white-space: nowrap;"><div align="center"><strong>คอร์ส</strong></div></td>
                           <td width="40%"     class="" style="white-space: nowrap;"><div align="center"><strong>รวม</strong></div></td>
                            </tr>
         <?
			$sql = "SELECT count( learnid ) AS Total
FROM learn
JOIN subject ON learn.subcode = subject.subcode
JOIN teacher ON subject.teachid = teacher.teacherid WHERE teachername = '".$objResult99["name"]."' && type != '3'";
			$que = mysql_query($sql);
			$read = mysql_fetch_array($que);
			$sql1 = "SELECT count( learnid ) AS Total
FROM learn
JOIN subject ON learn.subcode = subject.subcode
JOIN teacher ON subject.teachid = teacher.teacherid WHERE teachername = '".$objResult99["name"]."' && type = '1'";
$que1 = mysql_query($sql1);
			$read1 = mysql_fetch_array($que1);
			$sql2 = "SELECT count( learnid ) AS Total
FROM learn
JOIN subject ON learn.subcode = subject.subcode
JOIN teacher ON subject.teachid = teacher.teacherid WHERE teachername = '".$objResult99["name"]."' && type = '2'";
$que2 = mysql_query($sql2);
			$read2 = mysql_fetch_array($que2);
			$sql3 = "SELECT count( learnid ) AS Total
FROM learn
JOIN subject ON learn.subcode = subject.subcode
JOIN teacher ON subject.teachid = teacher.teacherid WHERE teachername = '".$objResult99["name"]."' && type = '3'";
$que3 = mysql_query($sql3);
$read3 = mysql_fetch_array($que3);
		?>
         <tr>
		 <td width="60%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4">คอร์สสด</div></td>
         <td width="40%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4"><strong><?=$read1["Total"];?> </strong> คน	</div></td>
         </tr>
         <tr>
		 <td width="60%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4">DVD</div></td>
         <td width="40%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4"><strong><?=$read2["Total"];?> </strong> คน	</div></td>
         </tr>
         <tr>
		 <td width="60%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4">SELF</div></td>
         <td width="40%"     class="" style="white-space: nowrap;"><div align="center" class="tbl4"><strong><?=$read3["Total"];?> </strong> คน	</div></td>
         </tr>
        </table>
        
        </center>
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