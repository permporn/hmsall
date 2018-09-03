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
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
</script>
</head>
<body id="page3" onLoad="MM_preloadImages('images/printpoint1.jpg')">
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
$strSQL = "SELECT * FROM learn JOIN 
student ON learn.studentid = student.studentid 
WHERE subcode = '".$_GET["subid"]."'&& id_year = '".$_GET["id_year"]."'";


	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
<form name="frmMain" action="<?=$_SERVER["PHP_SELF"];?>?id_year=<?=$_GET["id_year"];?>&branchid=<?=$_GET["branchid"];?>&subid=<?=$_GET["subid"];?>&action=save" method="post" >
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
    <tr>
    <th width="10%" class="tbl2" style="white-space: nowrap;"> ลำดับ </th>
    <th width="20%" class="tbl2" style="white-space: nowrap;"> ชื่อ- นามสกุล </th>
        <th width="20%" class="tbl2" style="white-space: nowrap;"> รหัสวิชา </th>
        <th width="15%" class="tbl2" style="white-space: nowrap;"> คะแนนเก็บ </th>
        <th width="15%" class="tbl2" style="white-space: nowrap;"> คะแนนสอบ </th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"><font color="#FF0000">รวม </font></th>
        <th width="10%" class="tbl2" style="white-space: nowrap;"> Edit </th>
  </tr>
<?
	$i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;
if($objResult["learnid"] == $_GET["CusID"] and $_GET["Action"] == "Edit")

{?> 
<tr>
<td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="studentdetail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['subcode'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><input name="sumpoint" type="text" class="tbl-border" id="sumpoint" size="2" value="<?=$objResult['sumpoint'];?>"></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><input name="finaltest" type="text" class="tbl-border" id="finaltest" size="2" value="<?=$objResult['finaltest'];?>"><input type="hidden" name="hdnEditCustomerID" size="5" value="<?=$objResult["learnid"];?>"></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest']+$objResult['sumpoint'];?></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center">
          <input type="submit" name="submit2" id="submit" class="tbl-border" value="Update" OnClick="frmMain.hdnCmd.value='Update';">
          <input name="btnAdd" type="button" id="btnCancel" class="tbl-border" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>?id_year=<?=$_GET["id_year"];?>&branchid=<?=$_GET["branchid"];?>&subid=<?=$_GET["subid"];?>';"></div></td></tr>
<? }
else{
	?>
  <tr>
  <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$i;?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="studentdetail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></div></td>
   		<td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['subcode'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
        <td width="20%" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult['finaltest']+$objResult['sumpoint'];?></div></td>
        <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult["learnid"];?>&learnid=<?=$objResult["learnid"];?>&id_year=<?=$_GET["id_year"];?>&branchid=<?=$_GET["branchid"];?>&subid=<?=$_GET["subid"];?>"><img src="images/edit (1).png"/></a></div></td>
  </tr>
<?
}
}
?>
</table>
  <p>
  <?
?>
  <input type="hidden" name="hdnCount" value="<?=$i;?>">
  </p>
  <p><a href="printpoint.php?subid=<?=$_GET["subid"];?>&id_year=<?=$_GET["id_year"];?>&branchid=<?=$_GET["branchid"];?>" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image5','','images/printpoint1.jpg',1)"><img src="images/printpoint.jpg" name="Image5" width="224" height="51" border="0"></a></p>
</form>
<?php
			$strSQL = "SELECT * FROM learn JOIN 
			student ON learn.studentid = student.studentid 
			WHERE subcode = '".$_GET["subid"]."'&& id_year = '".$_GET["id_year"]."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<table  cellpadding="0" cellspacing="1" width="100%"  class="tblyyy">    <tr>
    <th width="10%" class="tblyyy" style="white-space: nowrap;"> รหัสนักเรียน</th>
    <th width="20%"class="tblyyy" style="white-space: nowrap;"> ชื่อ- นามสกุล </th>
     <th width="20%"  class="tblyyy"style="white-space: nowrap;">  รหัสวิชา </th>   
        <th width="20%" class="tblyyy"style="white-space: nowrap;">  ลำดับที่  </th>
        <th width="10%" class="tblyyy" style="white-space: nowrap;"> คะแนนเก็บ </th>
        <th width="10%" class="tblyyy" style="white-space: nowrap;"> คะแนนสอบ </th>
        <th width="20%"class="tblyyy"  style="white-space: nowrap;"><font color="#FF0000">รวม </font></th>
        </tr>
  <? $i=0;
	while($objResult = mysql_fetch_array($objQuery))
	{
		$i++;?>
  <tr>
  <td width="10%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult["studentid"];?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult["studentname"];?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['subcode'];?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$i;?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['sumpoint'];?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['finaltest'];?></div></td>
    <td width="20%" style="white-space:nowrap;" class="tblyyy"><div align="center"><?=$objResult['finaltest']+$objResult['sumpoint'];?></div></td>
    
  </tr>	
  <? }?>
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