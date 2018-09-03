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
		}
		$s=date('Y-m-d');
function DateDiff($strDate1,$strDate2)
{
return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>ทะเบียนนักเรียน อ.โต้ง</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script>
function myHide()
{
	document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
	document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
}
</script>
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
<script language="JavaScript">
function ClickCheckAll(vol)
{
var i=1;
for(i=1;i<=document.frmMain.hdnCount.value;i++)
{
if(vol.checked == true)
{
eval("document.frmMain.chkDel"+i+".checked=true");
}
else
{
eval("document.frmMain.chkDel"+i+".checked=false");
}
}
}
 
</script>
</head>
<body id="page3" onload="myHide();">

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
                            <li><a href="price.php">ยอดแต่ละสาขา</a></li>
                            <? if($objResult99["status"]=="Manager"||$objResult99["status"]=="ADMIN") {?>
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
                         <body onload="myHide();">

<div id="hidepage2" style="display:block; position: fixed; top: 70%; left: 60%;" align="center" width="100%">
<br>
<IMG src="images/load.gif" WIDTH="100" HEIGHT="100" BORDER="0" ALT=""><br>
กรุณารอสักครู่...
</div>

<div id="hidepage" style="display:none;">
                         <?
$strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid WHERE subcode = '".$_GET["subid"]."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<form name="frmMain" action="printcard.php" method="post" >
<input name="submit" type="submit" class="tbl-border" value="Print"/> 
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
  <tr>
    <th width="10%" class="tbl2" style="white-space: nowrap;"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
    <th width="20%" class="tbl2" style="white-space: nowrap;"> ชื่อ- นามสกุล </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> ที่นั่ง </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> รหัสวิชา </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> วันโอนเงิน </th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> Edit </th>
  </tr>
<?
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$check9=0;
		if(DateDiff($s,$objResult["updateday"])<=0&&DateDiff($s,$objResult["updateday"])>-7){$check9++;}
			
		$i++;
	?>
  <tr>
    <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?=$i;?>" value="<?=$objResult["learnid"];?>"></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="studentdetail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a><? if($check9>0){?>&nbsp;<img src="images/icon_update.gif" /> <? } ?></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['seat'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['subcode'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['regisdate'];?></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="editstudent.php?learnid=<?=$objResult["learnid"];?>&termid=<?=$_GET["termid"];?>&branchid=<?=$_GET["branchid"];?>"><img src="images/Pinion.png"/></a></div></td>
  </tr>
<?
}
?>
</table>
<?
?>
<input type="hidden" name="hdnCount" value="<?=$i;?>">
</form>
</div>
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