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
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
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
         <h1><a href="home.php">Student's site</a></h1>
         <nav>
          <ul>
               <li class="current"><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li><a href="coursemanage.php" class="m3">COURSE & SCORE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last"><a href="exp.php" class="m5">Trial</a></li>
            </ul>
         </nav>
         <form action="searchstudent.php" id="search-form" method="get">
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
         <div id="banner">
            <h2>S.E.L.F <span>Management<span>System </span></span></h2>
         </div>
         <div class="inside">
            <h2>NEW <span>FEEDS</span></h2>
            <ul class="list">
               <li><span><img src="images/icon1.png"></span>
                  <h4>วงเวียนใหญ่</h4>
                  <p>รหัสคอร์สที่สามารถเรียนได้เฉพาะวงเวียนใหญ่ ก่อนทำการบันทึก Account กรุณาเลือกเรียนได้เฉพาะวงเวียนใหญ่ด้วย</p>
               </li>
               <li><span><img src="images/icon3.png"></span>
                 <h4>ป.6 lv2 และ ป.6 Gifted</h4>
                  <p>ป.6 lv2 เนื่องจากไม่มีแผ่นเลยจึงไม่สามารถเปิดให้เรียนระบบ S.E.L.F ได้ และ ป.6 Gifted ขาดแผ่นที่1 และ แผ่นที่ 2</p>
              </li>
               <li class="last"><span><img src="images/icon1.png"></span>
                 <h4>Student’s Time</h4>
                  <p>การจองเวลาเรียนนั้นให้จองก่อนเรียน 15 นาที หรือถ้าน้องต้องการเรียนจริงๆให้ติดต่อเจ้าหน้าที่</p>
              </li>
            </ul>
            <h2>Coming Soon<span> With Our Self</span></h2>
            <p><span class="txt1">ระบบจองเวลาผ่านระบบมือถือ</span> เพียงแสกน QR code ก็สามารถจองเวลาเรียน S.E.L.F ได้ เร็วๆนี้ </p>
            <div class="img-box"><img src="images/400_F_30671747_qAW64P8LT4N5KCmUIYBd6hBPMAIkdCbK.jpg" width="123" height="85"> เพียงแค่แสกน QR code แล้วทำการล็อกอินเลือกสาขาและวันเวลาที่จะเรียนก็สามารถจองเวลาเรียนได้ไม่ว่าจะอยู่ที่ไหนก็ตาม </div>
            <p class="p0">&nbsp;</p>
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
            <div class="aligncenter">เว็บไซด์จองเวลา <a class="new_window" href="http://www.aj-tongmath.com/self.php" target="_blank" rel="nofollow">www.aj-tongmath.com/self.php</a><br/>
               เว็บไซด์ อ.โต้ง <a class="new_window" href="http://www.aj-tong.com" target="_blank" rel="nofollow">www.aj-tong.com</a></div>
         </div>
      </div>
   </div>
</footer>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>