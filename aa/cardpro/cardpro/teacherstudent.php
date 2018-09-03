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
							<h2><img src="images/student.jpg"/></h2>
						</div>
                         
                         <div class="pad_left11">
                         <?
$strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid WHERE subcode = '".$_GET["subid"]."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<form name="frmMain" action="printcard.php" method="post" >
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
  <tr>
  <th width="10%" class="tbl2" style="white-space: nowrap;">ลำดับ</th>
    <th width="20%" class="tbl2" style="white-space: nowrap;"> ชื่อ- นามสกุล </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> ที่นั่ง </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> รหัสวิชา </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> วันโอนเงิน </th>
  </tr>
<?
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;
	?>
  <tr>
  <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["studentname"];?></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['seat'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['subcode'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['regisdate'];?></div></td>
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