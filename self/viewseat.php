<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$tmp=0;
include("config.inc.php");
$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
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
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />	
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/Table.png) no-repeat left top;
}
</style>
<script type="text/javascript">
		  $(function () {
		    var d = new Date();
		    var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);


		    // กรณีต้องการใส่ปฏิทินลงไปมากกว่า 1 อันต่อหน้า ก็ให้มาเพิ่ม Code ที่บรรทัดด้านล่างด้วยครับ (1 ชุด = 1 ปฏิทิน)

		    $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', maxDate: +90, minDate: 0, isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

		    $("#datepicker-th-2").datepicker({ changeMonth: true, changeYear: true,dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay,dayNames: ['อาทิตย์','จันทร์','อังคาร','พุธ','พฤหัสบดี','ศุกร์','เสาร์'],
              dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
              monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
              monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

     		    $("#datepicker-en").datepicker({ dateFormat: 'dd/mm/yy'});

		    $("#inline").datepicker({ dateFormat: 'dd/mm/yy', inline: true });


			});
		</script>
<script language="javascript">
function chk_null(){
if (document.studentForm.sub.value ==""){
alert("กรุณาเลือกวิชาด้วยด้วยครับ")
document.studentForm.sub.focus()
return Erase
}
}
</script>
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
<style type="text/css">

			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
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
               <li class="current"><a href="viewseat.php" class="m4">SEAT</a></li>
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
           <li><span><a href="viewseat.php">ดูจำนวนที่นั่ง</a></span></li>
           <!--<li><span><a href="#">ดูการจองเวลาและแก้ไข</a></span></li>-->
            <li class="last"><span><a href="seat.php">จองเวลา</a></span></li>
        </ul>
        
        <h3>SEARCH</h3>
        <form name="form1" method="post" action="tranday.php">
         <p>วันที่&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="20" id="datepicker-th" name="date0" /><br></p>
          <p>
             <label for="local"></label>
           สถานที่
           <select name="local" id="local">
             <option>-----เลือกสถานที่-----</option>
              		<option value="1">พญาไท ชั้น 10 </option>
                    <option value="5">พญาไท ชั้น 9 </option>
                    <option value="4">พญาไท ชั้น 2 </option>
                  	<option value="2">วงเวียนใหญ่</option>
                  	<option value="3">วิสุทธิธานี</option>
                  	<option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
                    <option value="7">ชลบุรี</option>
                    <option value="8">ราชบุรี</option>
           </select>
          </p>
          <input type="submit" name="submit" id="submit" value="ค้นหา">
        </form>
        <br></br>
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
         
          
           </ul>
           <? if($_GET["date"]==""&&$_GET["lacal"]==""){ ?> <? }else{ ?>
						
                        <?
						include("config.inc.php");
						function add_date($givendate,$day=0,$mth=0,$yr=0) {
						$cd = strtotime($givendate);
						$newdate = date('Y-m-d', mktime(date('h',$cd),
						date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
						date('d',$cd)+$day, date('Y',$cd)+$yr));
						return $newdate;
						}
						function DateThai($strDate)
						{
						$strYear = date("Y",strtotime($strDate))+543;
						$strMonth= date("n",strtotime($strDate));
						$strDay= date("j",strtotime($strDate));
						$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
						$strMonthThai=$strMonthCut[$strMonth];
						return "$strDay $strMonthThai $strYear";
						}
?>
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                 <tbody>
                 <tr>
                 
                   <td width="14%" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>เวลา</strong></div></td>
                   <? $dateplus = $_GET["date"];
					  for ($i = 0; $i<5; $i++) {?>
                   <td width="14%" class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong><?=DateThai(add_date($dateplus,$i,0,0))?></strong></div></td>
                      <? } ?>
                  </tr>
                  
                    <!--(1) 8.00 -->       
                    <tr >
                      <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.00-08.30</strong></div></td>
                        <?
                                $check=0;
                                $chk1=1;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '1' and section_e >= '1'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                ?>
                      <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong> <? if($objResult1["1"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["1"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-8.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=1&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=8.00';}">
                                <?= $objResult1["1"];?></a><? } ?></strong></div></td> 
                        <? } ?>      
                    </tr>
                 	   
                   <!--(2) 8.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>08.30-09.00</strong></div></td>
                       <?
                                $check=0;
                                $chk2=2;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '2' and section_e >= '2'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["2"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["2"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-8.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=2&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=8.30';}">
                                <?= $objResult1["2"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr> 
                   
                   <!--(3) 9.00 -->      
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.00-09.30</strong></div></td>
                       <?
                                $check=0;
                                $chk3=3;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '3' and section_e >= '3'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong> <? if($objResult1["3"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["3"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-9.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=3&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=9.00';}">
                                <?= $objResult1["3"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                    
                   <!--(4) 9.30 -->        
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>09.30-10.00</strong></div></td>
                       <?
                                $check=0;
                                $chk4=4;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
    
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '4' and section_e >= '4'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["4"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["4"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-9.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=4&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=9.30';}">
                                <?= $objResult1["4"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(5) 10.00 --> 
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.00-10.30</strong></div></td>
                       <?
                                $check=0;
                                $chk5=5;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '5' and section_e >= '5'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["5"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["5"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-10.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=5&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=10.00';}">
                                <?= $objResult1["5"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(6) 10.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>10.30-11.00</strong></div></td>
                       <?
                                $check=0;
                                $chk6=6;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '6' and section_e >= '6'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["6"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["6"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-10.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=6&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=10.30';}">
                                <?= $objResult1["6"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(7) 11.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.00-11.30</strong></div></td>
                       <?
                                $check=0;
                                $chk7=7;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '7' and section_e >= '7'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                        <div align="center"><strong><? if($objResult1["7"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["7"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-11.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=7&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=11.00';}">
                                <?= $objResult1["7"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(8) 11.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>11.30-12.00</strong></div></td>
                       <?
                                $check=0;
                                $chk8=8;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '8' and section_e >= '8'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                        <div align="center"><strong><? if($objResult1["8"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["8"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-11.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=8&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=11.30';}">
                                <?= $objResult1["8"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(9) 12.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.00-12.30</strong></div></td>
                       <?
                                $check=0;
                                $chk9=9;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '9' and section_e >= '9'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                        <div align="center"><strong><? if($objResult1["9"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["9"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-12.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=9&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=12.00';}">
                                <?= $objResult1["9"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(10) 12.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>12.30-13.00</strong></div></td>
                       <?
                                $check=0;
                                $chk10=10;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '10' and section_e >= '10'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                        <div align="center"><strong><? if($objResult1["10"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["10"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-12.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=10&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=12.30';}">
                                <?= $objResult1["10"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(11) 13.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.00-13.30</strong></div></td>
                       <?
                                $check=0;
                                $chk11=11;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '11' and section_e >= '11'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["11"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["11"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-13.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=11&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=13.00';}">
                                <?= $objResult1["11"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(12) 13.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>13.30-14.00</strong></div></td>
                       <?
                                $check=0;
                                $chk12=12;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '12' and section_e >= '12'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["12"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["12"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-13.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=12&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=13.30';}">
                                <?= $objResult1["12"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(13) 14.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.00-14.30</strong></div></td>
                       <?
                                $check=0;
                                $chk13=13;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '13' and section_e >= '13'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong>
					   <? if($objResult1["13"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?><?= $objResult1["13"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-14.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=13&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=14.00';}">
                                <?= $objResult1["13"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(14) 14.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>14.30-15.00</strong></div></td>
                       <?
                                $check=0;
                                $chk14=14;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '14' and section_e >= '14'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong>
					   <? if($objResult1["14"]<=0){?> <img src="images/false.png" /> 
                                
                               
                                <? }else if($cc!=2){ ?><?= $objResult1["14"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-14.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=14&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=14.30';}">
                                <?= $objResult1["14"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(15) 15.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.00-15.30</strong></div></td>
                       <?
                                $check=0;
                                $chk15=15;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '15' and section_e >= '15'";
                                $objQuery2 = mysql_query($strSQL2);
    
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["15"]<=0){?> <img src="images/false.png" /> 
                              	<? }else if($cc!=2){ ?><?= $objResult1["15"];?></a>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-15.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=15&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=15.00';}">
                                <?= $objResult1["15"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(16) 15.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>15.30-16.00</strong></div></td>
                       <?
                                $check=0;
                                $chk16=16;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '16' and section_e >= '16'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                         <div align="center"><strong><? if($objResult1["16"]<=0){?> <img src="images/false.png" /> 
                               	<? }else if($cc!=2){ ?><?= $objResult1["16"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-15.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี                        
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=16&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=15.30';}">
                                <?= $objResult1["16"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(17) 16.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.00-16.30</strong></div></td>
                       <?
                                $check=0;
                                $chk17=17;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '17' and section_e >= '17'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                        <div align="center"><strong><? if($objResult1["17"]<=0){?> <img src="images/false.png" /> 
                               	<? }else if($cc!=2){ ?>
                                <?= $objResult1["17"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-16.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=17&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=16.00';}">
                                <?= $objResult1["17"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(18) 16.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>16.30-17.00</strong></div></td>
                       <?
                                $check=0;
                                $chk18=18;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '18' and section_e >= '18'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["18"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["18"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-16.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=18&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=16.30';}">
                                <?= $objResult1["18"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                         
                   <!--(19) 17.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.00-17.30</strong></div></td>
                       <?
                                $check=0;
                                $chk19=19;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '19' and section_e >= '19'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["19"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["19"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-17.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=19&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=17.00';}">
                                <?= $objResult1["19"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(20) 17.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>17.30-18.00</strong></div></td>
                       <?
                                $check=0;
                                $chk20=20;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '20' and section_e >= '20'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["20"]<=0){?> <img src="images/false.png" /> 
                               	<? }else if($cc!=2){ ?>
                                <?= $objResult1["20"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-17.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=20&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=17.30';}">
                                <?= $objResult1["20"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(21) 18.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.00-18.30</strong></div></td>
                       <?
                                $check=0;
                                $chk21=21;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '21' and section_e >= '21'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["21"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["21"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-18.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=21&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=18.00';}">
                                <?= $objResult1["21"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(22) 18.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>18.30-19.00</strong></div></td>
                       <?
                                $check=0;
                                $chk22=22;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '22' and section_e >= '22'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["22"]<=0){?> <img src="images/false.png" /> 
                               	<? }else if($cc!=2){ ?>
                                <?= $objResult1["22"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-18.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=22&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=18.30';}">
                                <?= $objResult1["22"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(23) 19.00 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.00-19.30</strong></div></td>
                       <?
                                $check=0;
                                $chk23=23;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '23' and section_e >= '23'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["23"]<=0){?> <img src="images/false.png" /> 
                               	<? }else if($cc!=2){ ?>
                                <?= $objResult1["23"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-19.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=23&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=19.00';}">
                                <?= $objResult1["23"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                   
                   <!--(24) 19.30 -->
                   <tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>19.30-20.00</strong></div></td>
                       <?
                                $check=0;
                                $chk24=24;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '24' and section_e >= '24'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                $strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '24'";
                                $objQuery4 = mysql_query($strSQL4);
                                $objResult4 = mysql_fetch_array($objQuery4);
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["24"]<=0){?> <img src="images/false.png" /> 
                                <? }else if($cc!=2){ ?>
                                <?= $objResult1["24"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-19.30 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=24&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=19.30';}">
                                <?= $objResult1["24"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>
                           
                   <!--(25) 20.00 -->
                   <!--<tr>
                       <td width="14%" class="tblx" style="white-space: nowrap; color:#555";><div align="center"><strong>20.00</strong></div></td>
                       <?
                                $check=0;
                                $chk25=25;
                                
                                for($i=0; $i<5; $i++)
                                {
                                $strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
                                $objQuery1 = mysql_query($strSQL1);
                                $objResult1 = mysql_fetch_array($objQuery1);
                                $kdate=$objResult1["date"];
                                $strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '25' and section_e >= '25'";
                                $objQuery2 = mysql_query($strSQL2);
                                $objResult2 = mysql_fetch_array($objQuery2);
                                
                                $strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '24'";
                                $objQuery3 = mysql_query($strSQL3);
                                $objResult3 = mysql_fetch_array($objQuery3);
                                
                                ?>
                       <td width="14%" class="tblx" style="white-space: nowrap;color:#0099FF;" onMouseOver="this.bgColor='#9F3'" onMouseOut="this.bgColor = ''">
                       <div align="center"><strong><? if($objResult1["25"]<=0){?> <img src="images/false.png" /> 
                              	<? }else if($cc!=2){ ?>
                                <?= $objResult1["25"];?>
                                <? /****************************/ ?>
                                <? }else { ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน \n วันที่ 
                                <?= DateThai($objResult1["date"]) ?> \n เวลา <?=$_GET["timecc"]?>-20.00 \n สถานที่เรียน 
                                <? if($_GET["local"]==1){?>พญาไท ชั้น10 อ.โต้ง
                                <? }else if ($_GET["local"]==2){?>วงเวียนใหญ่ 
                                <? }else if ($_GET["local"]==3){?> วิสุทธิธานี 
                                <? }else if ($_GET["local"]==4) {?>พญาไท ชั้น2 
                                <? }else if ($_GET["local"]==5) {?>พญาไท ชั้น9 
                                <? }else if ($_GET["local"]==6) {?> สระบุรี สุขอนันต์ ปาร์ค
                                <? }else if ($_GET["local"]==8) {?>ราชบุรี
                                <? }else if ($_GET["local"]==7) {?> ชลบุรี<? } ?>\n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=25&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?= $objResult1["date"];?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=20.00';}">
                                <?= $objResult1["25"];?></a><? } ?></strong></div></td>
                       <? } ?>
                   </tr>-->
        	</tbody>                                           
       </table>
           <? } ?>
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