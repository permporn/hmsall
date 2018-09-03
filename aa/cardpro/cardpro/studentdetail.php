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
							<h2><img src="images/studentdetail.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
	
   <?
   function DateDiff($strDate1,$strDate2)
{
return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
   $sql = "SELECT * FROM student WHERE studentid = '".$_GET["studentid"]."'";
$que = mysql_query($sql);
$read = mysql_fetch_array($que);
?>
       <table width="100%" border="1"  class="tbl-border">
             <!--<tr>
               <td width="107" height="20" >&nbsp;</td>
               <td>&nbsp;</td>
               
             </tr>-->
             <tr>
               <td class="tblyy" height="50" >ชื่อ - นามสกุล</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td width="336" class="tblyy"><?=$read["studentname"];?></td>
               </tr>
             <tr>
               <td  class="tblyy" height="50" >เบอร์โทร</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td class="tblyy" ><?=$read["tel"];?></td>
               </tr>
               <tr>
               <td  class="tblyy" height="50" >email</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td class="tblyy" ><?=$read["email"];?></td>
               </tr>
             <tr>
              <?
			  $i=0;
			  $s=date('Y-m-d');
                         $strSQL1 = "SELECT * FROM learn JOIN subject ON learn.subcode = subject.subcode && learn.id_year = subject.id_year WHERE studentid = '".$_GET["studentid"]."'";
						 $objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
						 while($objResult1 = mysql_fetch_array($objQuery1))
						 {
							 
							 $i++;
						?>
               <td width="184" height="50" class="tblyy"><? if($i==1){?> คอร์ส 1<? }else {?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <? echo $i;} ?>.</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$objResult1["subname"];?> <?=$objResult1["subcode"];?> ที่นั่ง <?=$objResult1["seat"];?> <? if(DateDiff($s,$objResult1["edate"])>0){ ?> <font color="#00CC00">กำลังเรียน...</font> <? } else {?> <font color="#FF0000"><strong>ปิดคอร์สแล้ว</strong></font> <? } ?></td>
               </tr>
               <?
						 }
						 ?>
                          <tr>
               <td width="184" height="50"  class="tblyy">ชื่อเล่น</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$read["nickname"];?></td>
               </tr>
             <tr>
             <tr>
               <td width="184" height="50"  class="tblyy">โรงเรียน</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$read["school"];?></td>
               </tr>
             <tr>
               <td height="50"  class="tblyy">วันเกิด</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td   class="tblyy"><? if($read["birthday"]=="0000-00-00"){}else{?><?=$read["birthday"];?> <? } ?></td>
               </tr>
             <tr>
               <td width="184" height="50" class="tblyy">เลขประจำตัวประชาชน</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["pcode"];?></td>
               </tr>
               <tr>
               <td width="184" height="50" class="tblyy">ที่อยู่</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["address"];?></td>
               </tr>
                <tr>
               <td width="184" height="50" class="tblyy">ชื่อพ่อ</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["dadname"];?></td>
               </tr>
                <tr>
               <td width="184" height="50" class="tblyy">เบอร์โทร</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["dadtel"];?></td>
               </tr>
               <tr>
               <td width="184" height="50" class="tblyy">ชื่อแม่</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["momname"];?></td>
               </tr>
               <tr>
               <td width="184" height="50" class="tblyy">เบอร์โทร</td>
               <td width="68"  class="tblyy"><center>:</center></td>
               <td height="50"  class="tblyy"><?=$read["momtel"];?></td>
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