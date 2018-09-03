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
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/infostudent.png) no-repeat left top;
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
               <li><a href="home.php" class="m1">Home</a></li>
               <li class="current"><a href="addstudent.php" class="m2">STUDENT</a></li>
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
            <li><span><a href="addstudent.php">เพิ่มนักเรียนใหม่</a></span></li>
            <li><span><a href="addstudent9.php">เพิ่มนักเรียนใหม่(ชั้น9 โปรโมชั่น)</a></span></li>
            <li><span><a href="searchstudent.php">ค้นหาข้อมูลนักเรียน</a></span></li>
            <li><span><a href="manageaccount.php">เพิ่มaccount</a></span></li>
            <li class="last"><span><a href="manageaccount9.php">เพิ่มaccount(ชั้น9 โปรโมชั่น)</a></span></li>
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
        <div id="sss"></div>
         <div class="inside">
         <?
         $strSQL = "SELECT * FROM account WHERE accid = ".$_GET["accid"]." ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$Num_Rows = mysql_num_rows($objQuery); 
	$objQuery  = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	?>
         <form action="">
           <table width="100%" border="1"  class="tbl-border">
             <!--<tr>
               <td width="107" height="20" >&nbsp;</td>
               <td>&nbsp;</td>
               
             </tr>-->
             <tr>
               <td class="tblyy" >Username</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td width="341" class="tblyy"><?=$objResult["username"]?></td>
               <td width="155" colspan="5" class="tblyy"><a href="Editaccount9.php?accid=<?=$_GET["accid"]?>" style="text-decoration:none"><img src="images/31.png" width="40" height="40"> แก้ไขข้อมูล</a></td>
             </tr>
             <tr>
               <td  class="tblyy" >Password</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td class="tblyy" ><?=$objResult["password"]?></td>
               
               <td colspan="5" class="tblyy"><a href="addsubject9.php?accid=<?=$_GET["accid"]?>" style="text-decoration:none"><img src="images/8.png" width="40" height="40"> เพิ่มวิชา</a></td>
             </tr>
             <tr>
               <td width="82" class="tblyy">วันที่เริ่มเรียน</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$objResult["sdate"]?></td>
               <td colspan="5"  class="tblyy"><a href="delsub9.php?accid=<?=$_GET["accid"]?>" style="text-decoration:none"><img src="images/9.png" width="40" height="40"> ลบวิชา</a></td>
             </tr>
             <tr>
               <td width="82"  class="tblyy">วันหมดอายุ</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$objResult["edate"]?></td>
               
               <td colspan="5"  class="tblyy"><a href="printcard.php?accid=<?=$_GET["accid"]?>" style="text-decoration:none"><img src="images/Printer_Picture.png" width="40" height="40"> พิมพ์บัตร</a></td>
             </tr>
             <tr>
               <td height="50"  class="tblyy">สถานะ</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td   class="tblyy"><? if($objResult["status"]==1){?>เรียนได้ทุกสาขา<? } else if($objResult["status"]==2){ ?>เฉพาะวงเวียนใหญ่<? } else if($objResult["status"]==4){ ?>เฉพาะชั้น9 พญาไท<? } else { ?>เฉพาะวิสุทธานี<? } ?></td>
               <td colspan="5"  class="tblyy"></td>
             </tr>
             <tr>
               <td width="82" height="50" class="tblyy">เครดิตคงเหลือ</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy" height="50"><?=$objResult["totalcredit"]?>(<?=$objResult["totalcredit"]*2 ?>ชั่วโมง)</td>
               <td colspan="5"  class="tblyy"></td>
             </tr>
            <? 
			$i=1;
			
  				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){
				?> 
             <tr>
               <td width="82" height="50"  class="tblyy">วิชาที่เรียน</td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$i; ?>. <?=$objResult1["subname"]?></td>
               <td colspan="5"  class="tblyy"></td>
             </tr>
             <? } else {?>
              <tr>
               <td width="82"   height="50" class="tblyy"></td>
               <td width="48"  class="tblyy"><center>:</center></td>
               <td  class="tblyy"><?=$i; ?>. <?=$objResult1["subname"]?></td>
               <td colspan="5" class="tblyy"></td>
             </tr>
              <? } ?>
              
             <? $i++; } ?>
             
           </table>
           </form>
          <br></br>
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
            <div class="aligncenter">จองเวลาเรียน <a class="new_window" href="http://www.aj-tongmath.com" target="_blank" rel="nofollow">www.aj-tongmath.com</a><br/>
               คณิตศาสตร์ อ.โต้ง <a class="new_window" href="http://www.aj-tong.com" target="_blank" rel="nofollow">www.aj-tong.com</a></div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>