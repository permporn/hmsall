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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
a:link {
	color: #0099FF;
}
a:visited {
	color: #09F;
}
a:hover {
	color: #09F;
}
a:active {
	color: #09F;
}
.submit{
	width:90px;
	height:30px;
	background-color:#069;
	border-bottom-color:#CCC;
	color:#FFF;
	font-size: 10pt;
	font-family: arial;
	margin-left:80px;
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
   <div class="container"><!-- aside -->
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
        <a href="Webboard.php"> <div id="sss"></div></a>
         <div class="inside">
        <!-- <p><a href="NewQuestion.php"> แจ้งปัญหา </a></p>-->
        
         <?
		 include("config.inc.php");
        if($_GET["Action"] == "Save")
{
	//*** <!-- //เพิ่มปัญหา-->***//
	$strSQL = "INSERT INTO webboard ";
	$strSQL .="(CreateDate,Question,Details,Name) ";
	$strSQL .="VALUES ";
	$strSQL .="('".date("Y-m-d H:i:s")."','".$_POST["txtQuestion"]."','".$_POST["txtDetails"]."','".$_POST["txtName"]."') ";
	$objQuery = mysql_query($strSQL);
	
	header("location:Webboard.php");
}
?>


<form action="NewQuestion.php?Action=Save" method="post" name="frmMain" id="frmMain">
  <table width="100%" border="1" cellpadding="1" cellspacing="1">
    <tr>
      <td>หัวข้อ</td>
      <td><input name="txtQuestion" type="text" id="txtQuestion" value="" size="57"></td>
    </tr>
      <tr height="5px"></tr>
    <tr>
      <td width="100">รายละเอียด</td>
      <td><textarea name="txtDetails" cols="61" rows="5" id="txtDetails"></textarea></td>
    </tr>
    <tr height="5px"></tr>
    <tr>
      <td width="78">ชื่อผู้แจ้ง</td>
      <td width="647"><input name="txtName" type="text" id="txtName" value=""  size="40"></td>
    </tr>
     <tr height="5px"></tr>
  </table>

 <input name="btnSave" type="submit" id="btnSave" value="บันทึก" class="submit">
</form>
<?
mysql_close();
?>
</ul>
           
</div>

</section>

 <section id="content">
 <br></br>
        
      <div class="inside">
  <?
include("config.inc.php");
$text = str_replace(":xlol:",'<img src="/images/bbcode/lol.gif" align="absmiddle">', $text);
$text = str_replace(":xken:",'<img src="/images/bbcode/ken.gif" align="absmiddle">', $text);
$text = str_replace("x:d-D:",'<img src="/images/bbcode/grin.gif" align="absmiddle">', $text);
$text = str_replace(":x-d):",'<img src="/images/bbcode/smile.gif" align="absmiddle">', $text);
$text = str_replace(":x-d)",'<img src="/images/bbcode/smile.gif" align="absmiddle">', $text);
$text = str_replace("x:;d):",'<img src="/images/bbcode/wink.gif" align="absmiddle">', $text);
$text = str_replace(":eexk:",'<img src="/images/bbcode/eek.gif" align="absmiddle">', $text);
$text = str_replace(":gxeek:",'<img src="/images/bbcode/geek.gif" align="absmiddle">', $text);
$text = str_replace(":rxoll:",'<img src="/images/bbcode/roll.gif" align="absmiddle">', $text);
$text = str_replace(":exrm:",'<img src="/images/bbcode/erm.gif" align="absmiddle">', $text);
$text = str_replace(":coxol:",'<img src="/images/bbcode/cool.gif" align="absmiddle">', $text);
$text = str_replace(":xblank:",'<img src="/images/bbcode/blank.gif" align="absmiddle">', $text);
$text = str_replace(":idxea:",'<img src="/images/bbcode/idea.gif" align="absmiddle">', $text);
$text = str_replace(":exhh:",'<img src="/images/bbcode/ehh.gif" align="absmiddle">', $text);
$text = str_replace(":axargh:",'<img src="/images/bbcode/aargh.gif" align="absmiddle">', $text);
$text = str_replace(":exvil:",'<img src="/images/bbcode/evil.gif" align="absmiddle">', $text);

$strSQL = "SELECT * FROM webboard ";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 10;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL .=" order  by QuestionID DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);
?>
         </p>
         
         <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
           <tr>
    <th width="10%" class="tbl2" style="white-space: nowrap;"> <div align="center">วันที่</div></th>
    <th width="45%" class="tbl2" style="white-space: nowrap;"> <div align="center">ปัญหา</div></th>
    <th width="15%" class="tbl2" style="white-space: nowrap;"> <div align="center">ผู้แจ้ง</div></th>
   
    <th width="5%" class="tbl2" style="white-space: nowrap;"> <div align="center">View</div></th>
    <th width="5%" class="tbl2" style="white-space: nowrap;"> <div align="center">Reply</div></th>
  </tr>
<?
while($objResult = mysql_fetch_array($objQuery))
{

?>
  <tr>
    <td width="10%" style="white-space:nowrap;" class="tblyy"><div align="center" > <?=$objResult["CreateDate"];?></div></td>
    
    <td width="45%" class="tblyy"><a href="ViewWebboard.php?QuestionID=<?=$objResult["QuestionID"];?>"><?=$objResult["Question"];?></a></td>
    <td width="15" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["Name"];?></div></td>
    
    <td width="5%" class="tblyy"><div align="center"><?=$objResult["View"];?></div></td>
    <td width="5%" class="tblyy" ><div align="center"><?=$objResult["Reply"];?></div><div align="center"></td>
  </tr>
<?
}
?>
</table>
<div class="fontaa">
<br>
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
mysql_close();
?>
           </ul>
           
</div></div>
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