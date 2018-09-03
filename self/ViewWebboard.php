<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('Please Login!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/Report.png) no-repeat left top;
}
#back{
	float:right;
}

</style>
</head>
<body text="#CCCCCC" vlink="#0099FF" alink="#0099FF" id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.html">Student's site</a></h1>
         <nav>
            <ul>
               <li class="current"><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li><a href="coursemanage.php" class="m3">COURSE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last"><a href="exp.php" class="m5">Trial</a></li>
            </ul>
         </nav>
         <form action="viewall.php" id="search-form" method="post">
            <fieldset>
            <div class="rowElem">
               <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
               <a href="#" onClick="document.getElementById('search-form').submit()">Search</a></div>
            </fieldset>
         </form>
      </div>
      <script type="text/javascript">
function make_autocom(autoObj,showObj){
	var mkAutoObj=autoObj; 
	var mkSerValObj=showObj; 
	new Autocomplete(mkAutoObj, function() {
		this.setValue = function(id) {		
			document.getElementById(mkSerValObj).value = id;
		}
		if ( this.isModified )
			this.setValue("");
		if ( this.value.length < 1 && this.isNotClick ) 
			return ;	
		return "data.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>
   </header>
   <div class="container">
      <!-- aside -->
      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li><span><a href="home.php">หน้าแรก</a></span></li>
            <li><span><a href="Webboard.php">แจ้งปัญหา</a></span></li>
            <li class="last"><span><a href="#">สรุปยอดนักเรียน</a></span></li>
         </ul>
         <form action="" id="newsletter-form">
            <fieldset>
            <div class="rowElem">
               <h2>Account</h2>
               <p>WELCOME: <?= $objResult99["stname"] ?></p>
               <div class="clear"><a class="fright" href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';}>ออกจากระบบ</a></div>
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
     <!-- <a href="Webboard.php"> <div id="sss"></div></a>-->
         <div class="inside">
         <?
		 include("config.inc.php");
         if($_GET["Action"] == "Save")
{
	//*** Insert Reply ***//
	$strSQL = "INSERT INTO reply ";
	$strSQL .="(QuestionID,CreateDate,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_GET["QuestionID"]."','".date("Y-m-d H:i:s")."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = mysql_query($strSQL);
	
	//*** Update Reply ***//
	$strSQL = "UPDATE webboard ";
	$strSQL .="SET Reply = Reply + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
	$objQuery = mysql_query($strSQL);	
}
?>
<?
//*** Select Question ***//
$strSQL = "SELECT * FROM webboard  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysql_fetch_array($objQuery);

//*** Update View ***//
$strSQL = "UPDATE webboard ";
$strSQL .="SET View = View + 1 WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery = mysql_query($strSQL);	
?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
  <tr>
    <td colspan="2" class="tbl22" style="white-space: nowrap;"><center><?=$objResult["Question"];?></center></td>
  </tr>
  <tr>
    <td colspan="2" class="tblyy" ><?=nl2br($objResult["Details"]);?></td>
  </tr>
  
  <tr>
    <td class="tblyy" width="50px;">Name : <?=$objResult["Name"];?></td>
    <td class="tblyy" >Create Date : <?=$objResult["CreateDate"];?></td></tr>
    <tr> 
    <td class="tblyy" width="50px;" style="white-space: nowrap;">View : <?=$objResult["View"];?> </td>
    <td class="tblyy"  width="50px;" style="white-space: nowrap;">Reply : <?=$objResult["Reply"];?></td>
  </tr>
</table>
<br>
<br>
<?
$intRows = 0;
$strSQL2 = "SELECT * FROM reply  WHERE QuestionID = '".$_GET["QuestionID"]."' ";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]");
while($objResult2 = mysql_fetch_array($objQuery2))
{
	$intRows++;
?>


<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
<tr>
<td colspan="2" class="tbl222" style="white-space: nowrap;"><center>ตอบ :<?=$intRows;?></center></td>
</tr>

  <tr>
     <td colspan="2" class="tblyy" ><?=nl2br($objResult2["Details"]);?></td>
  </tr>
  <tr>
    <td class="tblyy" width="178"  style="white-space: nowrap;">Name : <?=$objResult2["Name"];?></td>
     <td width="459" class="tblyy"  style="white-space: nowrap;" >Create Date :  <?=$objResult2["CreateDate"];?></td>
  </tr>
</table>
<br>
<?
}
?>

<div id="back"><a href="Webboard.php"> >> กลับหน้าเว็บบอร์ด</a> </div>
<br></br>
<br></br>

<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
<tr>
<td colspan="2" class="tbl2222" style="white-space: nowrap;"> <h4>&nbsp; ตอบคำถาม</h4></td>
</tr>

<form action="ViewWebboard.php?QuestionID=<?=$_GET["QuestionID"];?>&Action=Save" method="post" name="frmMain" id="frmMain">
  
    <tr>
      <td width="15%" class="tblyy2"><center>คำตอบ</center></td>
      <td  width="85%" class="tblyy2"><textarea name="txtDetails" cols="50" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr>
      <td width="15%" class="tblyy2"><center>ชื่อ</center></td>
      <td width="85%" class="tblyy2"><input name="txtName" type="text" id="txtName" value="" size="40"></td>
    </tr>
     <tr>
      <td width="15%" class="tblyy2"></td>
      <td width="100%" colspan="2" class="tblyy2"><input name="btnSave" type="submit" id="btnSave" value="ตกลง" class="submit2" ></td>
    </tr>
  
  
</form>
</table>          
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