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
							<h2><img src="images/editsub.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
							 <?
	$strSQL = "SELECT * FROM subject JOIN room ON subject.roomid = room.roomid JOIN teacher ON subject.teachid = teacher.teacherid JOIN term ON subject.termid = term.termid WHERE subid='".$_GET["subid"]."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	?>
    <form action="updatesub.php?subid=<?=$_GET["subid"]; ?>" name="frmMain" method="post" onSubmit="return ChkSubmit();">
      <p>
        <script language="JavaScript">
 
function ChkSubmit(result)
{
if(document.getElementById("subname").value == "")
{
alert('กรุณากรอกชื่อวิชา');
return false;
}
if(document.getElementById("code").value == "")
{
alert('กรุณากรอกรหัสวิชา');
return false;
}
if(document.getElementById("price").value == "")
{
alert('กรุณากรอกราคา');
return false;
}
if(document.getElementById("day").value == "")
{
alert('กรุณากรอกวันเรียน');
return false;
}
if(document.getElementById("time").value == "")
{
alert('กรุณากรอกเวลาเรียน');
return false;
}
if(document.getElementById("date").value == "")
{
alert('กรุณากรอกวันที่เรียน');
return false;
}
if(document.getElementById("room").value == "")
{
alert('กรุณาเลือกห้อง');
return false;
}
if(document.getElementById("teacher").value == "")
{
alert('กรุณาเลือกอาจารย์');
return false;
}
if(document.getElementById("term").value == "")
{
alert('กรุณาเลือกเทอมการศึกษา');
return false;
}
if(document.getElementById("type").value == "")
{
alert('กรุณาเลือกประเภทคอร์ส');
return false;
}
}
   </script><center>
       <p> ชื่อวิชา &nbsp;&nbsp;: 
        
        <input name="subname" type="text" class="tbl-border" id="subname" value="<?=$objResult["subname"];?>" />      
      <p>รหัสวิชา&nbsp;:
      <input name="code" type="text" class="tbl-border" id="code" value="<?=$objResult["subcode"];?>" />      
      <p>ราคา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
      <input name="price" type="text" class="tbl-border" id="price" value="<?=$objResult["price"];?>"/>      
      <p>วันเรียน&nbsp;&nbsp;:
       <input name="day" type="text" class="tbl-border" id="day" value="<?=$objResult["day"];?>"/>
      <p>เวลา &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:
        <input name="time" type="text" class="tbl-border" id="time" value="<?=$objResult["time"];?>"/>
      <p>เริ่มเรียน :
      <input name="date" type="text" class="tbl-border" id="date" value="<?=$objResult["date"];?>"/>
      <p>ปิดคอร์ส :
      <input name="edate" type="text" class="tbl-border" id="edate" value="<?=$objResult["edate"];?>"/>       
      <p>ห้องเรียน:
  <select name="room" class="tbl-border" id="room">
<option value="<?=$objResult["roomid"];?>"><?=$objResult["roomname"];?></option>
<?
$strSQL = "SELECT * FROM room WHERE branchid = '".$objResult99["branchid"]."' ORDER BY roomid ASC";
$objQuery = mysql_query($strSQL);
while($objResuut = mysql_fetch_array($objQuery))
{
?>
<option value="<?=$objResuut["roomid"];?>"><?=$objResuut["roomname"];?></option>
<?
}
?>
</select>    <p>อาจารย์&nbsp;&nbsp;:
        <select name="teacher" class="tbl-border" id = "teacher">
<option value="<?=$objResult["teacherid"];?>"><?=$objResult["teachername"];?></option>
<?
$strSQL = "SELECT * FROM teacher ORDER BY teacherid ASC";
$objQuery = mysql_query($strSQL);
while($objResuut = mysql_fetch_array($objQuery))
{
?>
<option value="<?=$objResuut["teacherid"];?>"><?=$objResuut["teachername"];?></option>
<?
}
?>
</select>  
      <p>ปีการศึกษา&nbsp;&nbsp;:
      <select name="term" class="tbl-border" id = "term">
<option value="<?=$objResult["termid"];?>"><?=$objResult["term"];?></option>
<?
$strSQL = "SELECT * FROM term ORDER BY termid ASC";
$objQuery = mysql_query($strSQL);
while($objResuut = mysql_fetch_array($objQuery))
{
?>
<option value="<?=$objResuut["termid"];?>"><?=$objResuut["term"];?></option>
<?
}
?>
</select>
<p>ประเภทคอร์ส&nbsp;&nbsp;:
      <select name="type" class="tbl-border" id = "type">
<option value="<?=$objResult["type"];?>"><? if($objResult["type"]==1){?>คอร์สสด<? } else if($objResult["type"]==2) {?>คอร์สDVD <? }else if($objResult["type"]==3) {?>คอร์สSELF<? } else {?> < -- ประเภทคอร์ส -- ><? } ?></option>
<option value="1">คอร์สสด</option>
<option value="2">คอร์ดDVD</option>
<option value="3">คอร์สSELF</option>
</select><br/><br/></center>
     <center> <input name="Save" type="submit" class="tbl-border" id="Save" value="Save" />            
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input name="reset" type="reset" class="tbl-border" id="reset" value="Reset" />  </center>    
     <br /><br /><center><a href="Subject1.php"><img src="images/back.jpg" /></a></center></form>

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