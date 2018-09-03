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
	background:url(images/account.png) no-repeat left top;
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
               <li ><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li><a href="coursemanage.php" class="m3">COURSE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last current"><a href="exp.php" class="m5">Trial</a></li>
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
             <li><span><a href="exp.php">ทดลองเรียน S.E.L.F</a></span></li>
            <li class="last"><span><a href="trial.php">ชดเชยระบบ S.E.L.F</a></span></li>
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
         	$strSQL = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."' ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$Num_Rows = mysql_num_rows($objQuery); 
			$objResult = mysql_fetch_array($objQuery);?>
         <form action="">
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
            
              
             <tr>
               <td style="white-space:nowrap;" class="tblyy" height="50">Username</td>
               <td width="16" class="tblyy" style="white-space:nowrap;">:</td>
               <td width="326" class="tblyy"  style="white-space:nowrap;"><?=$objResult["username"]?></td>
               <td width="171" class="tblyy" style="white-space:nowrap;"><img src="images/116.png" width="40" height="40" alt="de"> ลบAccount</td>
             </tr>
             <tr>
               <td style="white-space:nowrap;" class="tblyy" width="122" height="50">Password</td>
                <td style="white-space:nowrap;" class="tblyy">:</td>
               <td style="white-space:nowrap;" class="tblyy" colspan="2"><?=$objResult["password"]?></td>
               
             </tr>
             <tr>
               <td style="white-space:nowrap;" class="tblyy" width="122" height="50">วันที่เริ่มเรียน</td>
                <td style="white-space:nowrap;" class="tblyy">:</td>
               <td  style="white-space:nowrap;" class="tblyy" colspan="2"><?=$objResult["sdate"]?></td>
              
             </tr>
             <tr>
               <td width="122" style="white-space:nowrap;" class="tblyy" height="50">วันหมดอายุ</td>
                <td style="white-space:nowrap;" class="tblyy">:</td>
               <td  style="white-space:nowrap;" class="tblyy" colspan="2"><?=$objResult["edate"]?></td>
              
             </tr>
             <tr>
               <td width="122" style="white-space:nowrap;" class="tblyy" height="50">เครดิตคงเหลือ :</td>
               <td style="white-space:nowrap;" class="tblyy">:</td>
               <td  style="white-space:nowrap;" class="tblyy" colspan="2"><?=$objResult["totalcredit"]?>&nbsp;&nbsp;(<?=$objResult["totalcredit"]*0.5 ?>&nbsp;ชั่วโมง)</td>
             </tr>
            <? 
			$i=1;
			
  				$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
				$objQuery1 = mysql_query($strSQL1);
  				while ($objResult1 = mysql_fetch_array($objQuery1)) {
				if($i==1){
				?> 
             <tr>
               <td width="122" style="white-space:nowrap;" class="tblyy" height="50">วิชาที่เรียน</td>
               <td style="white-space:nowrap;" class="tblyy">:</td>
               <td style="white-space:nowrap;" class="tblyy" colspan="2"><?=$i; ?>. <?=$objResult1["subname"]?></td>
               
             </tr>
             <? } else {?>
              <tr>
               <td width="122" style="white-space:nowrap;" class="tblyy" height="50"></td>
               <td style="white-space:nowrap;" class="tblyy">:</td>
               <td style="white-space:nowrap;" class="tblyy" colspan="2"><?=$i; ?>. <?=$objResult1["subname"]?></td>
              
             </tr>
              <? } ?>
              
             <? $i++; } ?>
             
              </table>
           </form>
          
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