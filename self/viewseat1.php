<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
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
         <!--<li><span><a href="viewseat.php">ดูจำนวนที่นั่ง</a></span></li>
           <li><span><a href="#">ดูการจองเวลาและแก้ไข</a></span></li>-->
            <li class="last"><span><a href="seat.php">จองเวลา</a></span></li>
        </ul>
        
      <!--  <h3>SEARCH</h3>
        <form name="form1" method="post" action="tranday.php">
         <p>วันที่&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="20" id="datepicker-th" name="date0" /><br></p>
          <p>
             <label for="local"></label>
           สถานที่
           <select name="local" id="local">
             <option>-----เลือกสถานที่-----</option>
             <option value="1">พญาไท ชั้น10</option>
             <option value="5">พญาไท ชั้น9</option>
             <option value="2">วงเวียนใหญ่</option>
             <option value="3">วิสุทธานี</option>
             <option value="4">พญาไท ชั้น2</option>
           </select>
          </p>
          <input type="submit" name="submit" id="submit" value="ค้นหา">
        </form>-->
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
           <table width="100%" cellpadding="0" cellspacing="1" class="tbl-border">
             <tbody>
               <tr>
                 <td width="14%" style="white-space: nowrap;"><div align="center"><strong></strong></div></td>
                 <?
						   $dateplus = $_GET["date"];
							for ($i = 0; $i<5; $i++) {?>
                 <td width="14%"     class="tbl2" style="white-space: nowrap; class="tbl2"><div align="center"><strong>
                   <?=DateThai(add_date($dateplus,$i,0,0))?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>08.00 - 10.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section= '3'";
							$objQuery2 = mysql_query($strSQL2);
                            $kdate=$objResult1["date"];
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							?>
                 <td width="14%" class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["3"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 8:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
         
                     <?= $objResult1["3"];?>
                  
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>08.30 - 10.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '1'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["4"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 8:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["4"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"   class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>09.00 - 11.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '2'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["5"]<=0){?>
                   <img src="images/Erase.png" />
                   <? } else if(DateTimeDiff("$s","$kdate 9:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? }else { ?>
                    <?= $objResult1["5"];?>
                
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"   class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>09.30 - 11.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '3'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["6"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 9:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["6"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>10.00 - 12.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '4'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["7"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 10:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["7"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>10.30 - 12.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '5'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["8"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 10:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?> 
                   <?= $objResult1["8"];?>
                  
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>11.00 - 13.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '6'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["9"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 11:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["9"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>11.30 - 13.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '7'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["10"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 11:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["10"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>12.00 - 14.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '8'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["11"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 12:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                    <?= $objResult1["11"];?>
                   
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>12.30 - 14.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '9'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["12"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 12:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["12"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>13.00 - 15.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '10'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["13"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 13:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                  <?= $objResult1["13"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>13.30 - 15.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '11'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["14"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 13:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["14"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>14.00 - 16.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '12'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["15"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 14:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["15"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>14.30 - 16.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '13'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["16"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 14:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["16"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>15.00 - 17.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '14'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["17"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 15:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                    <?= $objResult1["17"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>15.30 - 17.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '15'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["18"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 15:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["18"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>16.00 - 18.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '16'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["19"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 16:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["19"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>16.30 - 18.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '17'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["20"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 16:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["20"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>17.00 - 19.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '18'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["21"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 17:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["21"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>17.30 - 19.30</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '19'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["22"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 17:30")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["22"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
               <tr>
                 <td width="14%"     class="tblyy" style="white-space: nowrap;color:#555;"><div align="center"><strong>18.00 - 20.00</strong></div></td>
                 <?
							$check=0;
							for($i=0; $i<5; $i++){
							$strSQL1 = "SELECT * FROM `seats` WHERE date =DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
							$objQuery1 = mysql_query($strSQL1);
							$objResult1 = mysql_fetch_array($objQuery1);
							$kdate=$objResult1["date"];
							$strSQL2 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '20'";
							$objQuery2 = mysql_query($strSQL2);
							while($objResult2 = mysql_fetch_array($objQuery2))
							{if($objResult2["accid"] != "")
							{$check++;}}
							$strSQL3 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '21'";
							$objQuery3 = mysql_query($strSQL3);
							while($objResult3 = mysql_fetch_array($objQuery3))
							{if($objResult3["accid"] != "")
							{
								$check++;}}
							$strSQL4 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '22'";
							$objQuery4 = mysql_query($strSQL4);
							while($objResult4 = mysql_fetch_array($objQuery4))
							{if($objResult4["accid"] != "")
							{$check++;}}
							$strSQL5 = "SELECT * FROM `reserve` WHERE time ='".$objResult1["date"]."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section = '23'";
							$objQuery5 = mysql_query($strSQL5);
							while($objResult5 = mysql_fetch_array($objQuery5))
							{if($objResult5["accid"] != "")
							{
								$check++;}}
							?>
                 <td width="14%" class="tblyy" style="white-space: nowrap;"><div align="center"><strong>
                   <? if($objResult1["23"]<=0){?>
                   <img src="images/Erase.png" />
                   <? }else if(DateTimeDiff("$s","$kdate 18:00")<=0){ ?>
                   <img src="images/Erase.png" />
                   <? } else { ?>
                   <?= $objResult1["23"];?>
                   <? } ?>
                 </strong></div></td>
                 <? } ?>
               </tr>
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