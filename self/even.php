<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addstudent.gif) no-repeat left top;
}
</style>
<!--[if lt IE 7]>
     <link rel="stylesheet" href="css/ie/ie6.css" type="text/css" media="screen">
     <script type="text/javascript" src="js/ie_png.js"></script>
     <script type="text/javascript">
        ie_png.fix('.png, footer, header nav ul li a, .nav-bg, .list li img');
     </script>
<![endif]-->
<!--[if lt IE 9]>
  	<script type="text/javascript" src="js/html5.js"></script>
  <![endif]-->
</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.html">Student's site</a></h1>
         <nav>
            <ul>
               <li class="current"><a href="home.php" class="m1">Home</a></li>
               <li><a href="student.php" class="m2">STUDENT</a></li>
               <li><a href="articles.html" class="m3">COURSE</a></li>
               <li><a href="contact-us.html" class="m4">SEAT</a></li>
               <li class="last"><a href="sitemap.html" class="m5">SELF</a></li>
            </ul>
         </nav>
         <form action="" id="search-form">
            <fieldset>
            <div class="rowElem">
               <input type="text">
               <a href="#" onClick="document.getElementById('search-form').submit()">Search</a></div>
            </fieldset>
         </form>
      </div>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="home.php">หน้าแรก</a></span></li>
            <li><span><a href="#">ข้อมูลผู้ใช้</a></span></li>
            <li><span><a href="Webboard.php">แจ้งปัญหา</a></span></li>
            <li><span><a href="#">สรุปยอดนักเรียน</a></span></li>
            <li class="last"><span><a href="#">ออกจากระบบ</a></span></li>
         </ul>
         <form action="" id="newsletter-form">
            <fieldset>
            <div class="rowElem">
               <h2>Account</h2>
               <p>WELCOME: AizeRo</p>
               <div class="clear"><a href="#" class="fright" onClick="document.getElementById('newsletter-form').submit()">Logout</a></div>
            </div>
            </fieldset>
         </form>
         <h2>EVEN <span>News</span></h2>
         <ul class="news">
          <?
		 include("config.inc.php");
		 $strSQL = "SELECT * FROM even order by ideven desc";
		 $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		 while($objResult = mysql_fetch_array($objQuery))
         {
		 ?>
            <li><strong><?=$objResult["date"];?></strong>
               <h4><a href="#"><?=$objResult["teven"];?></a></h4>
               <?=$objResult["even"];?> </li>
               <?
		 }
		 ?>
         </ul>
      </aside>
      <!-- content -->
      <section id="content">
        <div id="sss"></div>
         <div class="inside">
 <?
		 include("config.inc.php");
         if($_POST["hdnCmd"] == "Add")
{
	$strSQL = "INSERT INTO even ";
	$strSQL .="(date,teven,even) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["txtAddCustomerID"]."','".$_POST["txtAddName"]."' ";
	$strSQL .=",'".$_POST["txtAddCountryCode"]."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

//*** Update Condition ***//
if($_POST["hdnCmd"] == "Update")
{
	$strSQL = "UPDATE even SET ";
	$strSQL .="date = '".$_POST["txtEditCustomerID"]."' ";
	$strSQL .=",teven = '".$_POST["txtEditName"]."' ";
	$strSQL .=",even = '".$_POST["txtEditCountryCode"]."' ";
	$strSQL .="WHERE ideven = '".$_POST["hdnEditCustomerID"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

//*** Delete Condition ***//
if($_GET["Action"] == "Del")
{
	$strSQL = "DELETE FROM even ";
	$strSQL .="WHERE ideven = '".$_GET["CusID"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Delete [".mysql_error()."]";
	}
	//header("location:$_SERVER[PHP_SELF]");
	//exit();
}

$strSQL = "SELECT * FROM even";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>">
<input type="hidden" name="hdnCmd" value="">
<table width="600" border="1">
  <tr>
    <th width="38"> <div align="center">ลำดับ </div></th>
    <th width="95"> <div align="center">วันที่ </div></th>
    <th width="57"> <div align="center">หัวข้อ </div></th>
    <th width="285"> <div align="center">รายละเอียด </div></th>
    <th width="32"> <div align="center">Edit </div></th>
    <th width="53"> <div align="center">Delete </div></th>
  </tr>
<?
$i=0;
while($objResult = mysql_fetch_array($objQuery))
{
	$i++;
?>

  <?
	if($objResult["ideven"] == $_GET["CusID"] and $_GET["Action"] == "Edit")
	{
  ?>
  <tr>
  <td><div align="center"><?=$i;?></div></td>
    <td><div align="center">
		<input type="text" name="txtEditCustomerID" size="10" value="<?=$objResult["date"];?>">
        <input type="hidden" name="hdnEditCustomerID" size="5" value="<?=$objResult["ideven"];?>">
	</div></td>
    <td><input type="text" name="txtEditName" size="20" value="<?=$objResult["teven"];?>"></td>
    <td><div align="center"><input type="text" name="txtEditCountryCode" size="40" value="<?=$objResult["even"];?>"></div></td>
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnUpdate" value="Update" OnClick="frmMain.hdnCmd.value='Update';frmMain.submit();">
	  <input name="btnAdd" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?=$_SERVER["PHP_SELF"];?>';">
    </div></td>
  </tr>
  <?
	}
  else
	{
  ?>
  <tr>
    <td><div align="center"><?=$i;?></div></td>
    <td><div align="center"><?=$objResult["date"];?></div></td>
    <td><div align="center"><?=$objResult["teven"];?></div></td>
    <td><div align="center"><?=$objResult["even"];?></div></td>
    <td align="center"><a href="<?=$_SERVER["PHP_SELF"];?>?Action=Edit&CusID=<?=$objResult["ideven"];?>">Edit</a></td>
	<td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?=$_SERVER["PHP_SELF"];?>?Action=Del&CusID=<?=$objResult["ideven"];?>';}">Delete</a></td>
  </tr>
  <?
	}
  ?>
<?
}
?>
  <tr>
    <td></td>
    <td><div align="center"><input type="text" name="txtAddCustomerID" size="10"></div></td>
    <td><input type="text" name="txtAddName" size="20"></td>

    <td><div align="center">
      <label for="txtAddCountryCode"></label>
      <textarea name="txtAddCountryCode" id="txtAddCountryCode" cols="40" rows="5"></textarea>
    </div></td>
    <td colspan="2" align="right"><div align="center">
      <input name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="frmMain.hdnCmd.value='Add';frmMain.submit();">
    </div></td>
  </tr>
</table>
</form>
<?
mysql_close();
?>
         <p>
           </ul>
           
        </div>
      </section>
   </div>
</div>
<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
            <div class="fleft">AJ-TONG <span>www.aj-tong.com</span></div>
            <div class="aligncenter">Website template designed by <a class="new_window" href="http://www.templatemonster.com" target="_blank" rel="nofollow">www.templatemonster.com</a><br/>
               3D Models provided by <a class="new_window" href="http://www.templates.com/product/3d-models/" target="_blank" rel="nofollow">www.templates.com</a></div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>