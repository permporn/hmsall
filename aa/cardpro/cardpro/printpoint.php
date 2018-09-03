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

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
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
							<h2><img src="images/printpoint.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
                         <?
if($_GET["action"] == "save")
{
$strSQL = "UPDATE learn SET ";
$strSQL .="finaltest = '".$_POST["finaltest"]."' ";
$strSQL .=",sumpoint = '".$_POST["sumpoint"]."' ";
$strSQL .="WHERE learnid = '".$_POST["hdnEditCustomerID"]."' ";
$objQuery = mysql_query($strSQL);
if(!$objQuery)

{

echo "Error Update [".mysql_error()."]";

}

}
$strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid WHERE subcode = '".$_GET["subid"]."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<form name="frmMain" action="printpoint1.php" method="post" >
<input name="submit" type="submit" class="tbl-border" value="Print"/> 
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
    <tr>
    <th width="10%" class="tbl2" style="white-space: nowrap;"> <div align="center">
      <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">
    </div></th>
    <th width="10%" class="tbl2" style="white-space: nowrap;"> ลำดับ </th>
    <th width="20%" class="tbl2" style="white-space: nowrap;"> ชื่อ- นามสกุล </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> รหัสวิชา </th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> คะแนนเก็บ </th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> คะแนนสอบ </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"><font color="#FF0000">รวม </font></th>
        </tr>
<?
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;
 ?>
  <tr>
  <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><input type="checkbox" name="chkDel[]" id="chkDel<?=$i;?>" value="<?=$objResult["learnid"];?>"></div></td>
  <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="studentdetail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['subcode'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest']+$objResult['sumpoint'];?></div></td>
        </tr>
<?
}
?>
</table>
  <p>
  <?
?>
  <input type="hidden" name="hdnCount" value="<?=$i;?>">
  </p>
  <p>&nbsp;</p>
</form>
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