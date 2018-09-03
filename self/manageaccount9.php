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
<link rel="stylesheet" type="text/css" href="css/smoothness/jquery-ui-1.7.2.custom.css">  
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>  
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>   
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<SCRIPT LANGUAGE="JavaScript">
    <!--
    function showList() {
        sList = window.open("studentlist.php", "list", "width=700,height=500");
    }
    function showSubList() {
        sList = window.open("subjectlist.php", "list", "width=700,height=500");
    }
    function remLink() {
        if (window.sList && window.sList.open && !window.sList.closed)
            window.sList.opener = null;
    }
    // -->
</SCRIPT>
<script type="text/javascript">  
$(function(){  
    // แทรกโค้ต jquery  
    $("#date").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
	$("#edate").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
});  
</script>
<style type="text/css">  
.ui-datepicker{  
    width:180px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style>  
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addaccount.png) no-repeat left top;
}
#hh{
	font-size:11px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
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
      <? 
include("config.inc.php");
$strSQL1 = "SELECT * FROM counter";
$objQuery1 = mysql_query($strSQL1);
$objResult1 = mysql_fetch_array($objQuery1);
$c=$objResult1["count"];
$c++;
$strSQL = "UPDATE counter SET ";
	$strSQL .="count = '$c' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
?>
      <section id="content">
        <div id="sss"></div>
         <div class="inside">
         <form name="studentForm" method="post" action="manageacc9.php">
           											<?
													include("config.inc.php");
			  										$strSQL = "SELECT * FROM counter";
													$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
													$objResult = mysql_fetch_array($objQuery);
                                                    $counter=$objResult["count"];
                                                    $fix="JT20";
                                                    for($i=0;$i<5-strlen($counter);$i++){
                                                        $fix=$fix."0";
                                                    }
												
                                                    $fix=$fix.$objResult["count"];
                                                ?>
           <table width="509" border="1">
             <tr>
               <td width="117" height="35">Username :</td>
               <td colspan="4"><label for="namestu"></label>
               <input type="text" name="account" id="account" value="<?=$fix; ?>"></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 8); ?>
               <td height="35">Password:</td>
               <td colspan="4"><input type="text" name="password" id="password" value="<?=$random; ?>"></td>
             </tr>
             <tr>
               <td width="117" height="35">Student:</td>
               <td colspan="4">
                 <input type="text" name="student" id="student" value="<?=$_GET["name"]; ?>">
                 <input type="button" value="เลือก" onClick="showList()"></td>
             </tr>
             <tr>
               <td height="36">Subject:</td>
               <td colspan="4"><input type="text" name="sub" id="sub">
               <INPUT type="button" value="เลือก" onClick="showSubList()"></td>
             </tr>
             <tr>
               <td height="39">Startdate:</td>
               <td colspan="4"><label for="date"></label>
               <input type="text" name="date" id="date" value="<?=date("Y-m-d"); ?> "></td>
             </tr>
             <tr>
               <td height="39">Enddate</td>
               <td colspan="4"><label for="edate"></label>
               <input type="text" name="edate" id="edate" value="<?=date("Y-m-d",strtotime("+90 day")); ?>"></td>
             </tr>
             <tr>
               <td width="117" height="53">Status:</td>
               <td colspan="4"><label for="status"></label>
                 <select name="status" id="status">
                   <option value="4" selected>เฉพาะชั้น 9 พญาไท</option>
                   <option value="2">เฉพาะวงเวียนใหญ่</option>
                   <option value="3">เฉพาะวิสุทธิ</option>
                   <option value="1">เรียนได้ทุกสาขา</option>
                 </select>                 
               <label for="sub"></label></td>
             </tr>
             <!--<tr>
               <td></td>
               <td width=""><a href="javascript:document.studentForm.submit()"><img src="images/121.png" width="48" height="48">save</a></td></td>
               <td width="20">&nbsp;</td>
               <td width="81" height="40"><p><a href="searchstudent.php"><img src="images/129.png"width="48" height="48">cancel</a></p></td>
               <td width="95">&nbsp;</td>
               <td width="94">&nbsp;</td>
             </tr>
             -->
              <tr>
               <td></td>
               
               <td width="52"><center><a href="javascript:document.studentForm.submit()"><img src="images/121.png" width="40" height="40">
               <div id="hh">SAVE</div></a></center></td></td>
               <td width="20">&nbsp;</td>
               <td width="52"><a href="searchstudent.php"><img src="images/129.png"width="40" height="40"><div id="hh">CANCEL</div></center></a></td>
               <td width="150" colspan="2">&nbsp;</td>
             </tr>
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