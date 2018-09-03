<? 
session_start();
include("config.inc.php");
if($_SESSION["accid_self"] == "" ){
  echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
  echo "<script language='javascript'>alert('กรุณา Login เข้าสู่ระบบ');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
  exit();
}
if($_SESSION["status"] == "100"){
  echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
  echo "<script language='javascript'>alert('คุณไม่มีสิทธิในการเข้าหน้านี้ กรุณา Login ใหม่ค่ะ');</script>";
  echo "<meta http-equiv='refresh' content='0;URL=logout.php'>";
}
else{
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION["edate"];
$tmp=0;
$cc=$_GET["cc"];
$sectioncc=$_GET["sectioncc"];

function DateTimeDiff($strDateTime1,$strDateTime2){
  return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
}

function add_date($givendate,$day=0,$mth=0,$yr=0) {
  $cd = strtotime($givendate);
  $newdate = date('Y-m-d', mktime(date('h',$cd),
  date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
  date('d',$cd)+$day, date('Y',$cd)+$yr));
  return $newdate;
}
function DateThai($strDate){
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F | Home</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.10.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
<script>
function myHide()
{
  document.getElementById('hidepage').style.display='block';//content ที่ต้องการแสดงหลังจากเพจโหลดเสร็จ
  document.getElementById('hidepage2').style.display='none';//content ที่ต้องการแสดงระหว่างโหลดเพจ
}
function chk_null(){
  if (document.form1.date0.value ==""){
    alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
    document.form1.date0.focus()
    return false
  }
  if (document.form1.local.value ==""){
    alert("กรุณากรอกชื่อนักเรียนด้วยครับ")
    document.form1.local.focus()
    return false
  }
}
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
});
</script>
  
<style type="text/css">
a:link {text-decoration: none;color: #09C;}
</style> 
     
</head>

<body id="page5">
<div class="body1">
  <div class="main">
    <header>
      <div id="logo_box">
      <img src="images/Logo4.png"/>
      </div>
      <nav>
        <ul id="menu">
          <li id="menu_active"><a href="home.php">Home</a></li>
          <li><a href="show.php">Table Reserve</a></li>
          <li><a href="editpass.php">Change Password</a></li>
           <li><a href="score.php">Score</a></li>
          <li ><a href="logout.php">Logout</a></li>
          
        </ul>
      </nav>
      <div class="wrapper2"></div>
   </header>
   </div>
</div>
    <section id="content">
      <div class="marg_top wrapper">
        <article class="col1">
          <div class="box1_out">
            <div class="box1">
            <h2>
            <img src="images/Profile.gif"/></h2>
            <div class="wrapper3">
                <article class="col5">
              <table >
              <?
        $strSQL = "SELECT totalcredit,name FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_SESSION["accid_self"]."' ";
        $objQuery = mysql_query($strSQL);
        $objResult = mysql_fetch_array($objQuery);
        $total = $objResult["totalcredit"];
        $namestu = $objResult["name"];
        $accid = $_SESSION["accid_self"]; 
        ?>
                <tr>
                    <td>ชื่อ:</td>
                    <td><?=$namestu; ?></td>
                </tr>
                <tr>
                    <td>เคดิตทั้งหมด:</td>
                    <td><?=$total; ?></td>
                </tr>
                <?
        $check55=0;
        $strSQL8 = "SELECT section_s,time,section_e FROM reserve where accid = '".$accid."'";
        $objQuery8 = mysql_query($strSQL8);
        while($objResult8 = mysql_fetch_array($objQuery8)){
        $time = 8 + floor(($objResult8["section_s"]-1)/2); if($objResult8["section_s"]%2==1){$min="30";}else{$min="00";}
        $date99=$objResult8["time"];
        if(DateTimeDiff("$s","$date99 $time:$min")>0)
        {
          $check55+=$objResult8["section_e"]-$objResult8["section_s"];}
        }
        ?>
                <tr>
                    <td>เคดิตใช้ล่วงหน้า:</td>
                    <td><?=$check55; ?></td>
                </tr>
                <tr>
                    <td>วันหมดอายุ:</td>
                    <td><?=DateThai($e) ?></td>
                </tr>
                <tr>
                    <td>วิชาเรียน:</td>
                </tr>
                <? 
        $strSQL7 = "SELECT subname FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$accid."' ";
        $objQuery7 = mysql_query($strSQL7);
        while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                <tr>
                   <td colspan="2" style="font-size:13px;"><?='['.++$tmp.']  '?><?=$objResult7["subname"]; ?></td>
                </tr>
                <? } ?>
                </table>

                </article>
            </div>
              <h2><img src="images/booking.gif"/></h2>
              <div class="wrapper3">
                <article class="col2">
                <form id="form1" name="form1" method="post" action="tranday2.php">
                <div class="bg left">
                    <input class="input input1" type="text" value="เลือกวันที่"  id="datepicker-th" name="date0" onblur="if(this.value=='เลือกวันที่') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
                </div>
                <div class="bg left">
                <select name="local"  id="local" class="input2 input1" >
                  <option value="" onfocus="this.value='';" onblur="if(this.value=='') this.value='เลือกสถานที่'" onFocus="if(this.value =='เลือกสถานที่' ) this.value='เลือกสถานที่'">เลือกสถานที่</option>
                  <?php
                  $sql_branch = "SELECT branch.branchid, branch.`name` FROM `branch` WHERE status_branch != 0 ORDER BY branch.`name` ASC";
                  $objQuery_branch = mysql_query($sql_branch);
                  while ($objResult_branch = mysql_fetch_array($objQuery_branch)) {
                 
                    if($objResult_branch['branchid'] == 1){
                      $name = "พญาไท ชั้น 10 South";
                    }else if($objResult_branch['branchid'] == 5){
                      $name = "พญาไท ชั้น 10 North (new)";
                    }else if($objResult_branch['branchid'] == 6){
                      $name = "สระบุรี";
                    }else{
                      $name = $objResult_branch['name'];
                    }
                    if($objResult_branch['branchid'] != 34){
                    ?>
                    <option value="<?=$objResult_branch['branchid']?>"><?=$name;?></option>
                  <?php } } ?>
                    <!-- <option value="1">พญาไท ชั้น 10 South </option>
                    <option value="5">พญาไท ชั้น 10 North (new)</option>
                    <option value="4">พญาไท ชั้น 2 </option>
                    <option value="2">วงเวียนใหญ่</option>
                    <option value="3">วิสุทธิธานี</option>
                    <option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
                    <option value="7">ชลบุรี</option>
                    <option value="8">ราชบุรี</option>
                    <option value="10">หาดใหญ่</option>
                    <option value="11">เพชรบุรี</option> -->
                 </select>
                </div>
                </form>
                </article>
              </div>
              <a href="#" class="button" onClick="document.getElementById('form1').submit()" title="ค้นหา"><span><span>Search</span></span></a> </div>
          </div>
        </article>
        
        
        <article class="col2 pad_left1">
          <div class="box1_out">
            <div class="box3">
            <body onload="myHide();">
            
            <!-- loaging -->
                <div id="hidepage2" style="display:block; position: fixed;top: 0%; left: 0%;filter:alpha(opacity=50);-moz-opacity:0.5;-khtml-opacity: 0.5;opacity:0.5;width:100%;height:100%; background:#FFF;" align="center" width="100%">
                <br><br><br><br><br><br><br><br><br><br>
                <IMG src="images/loading.gif" WIDTH="192" HEIGHT="50" BORDER="0" ALT="กรุณารอสักครู่..." align="center"><br>กรุณารอสักครู่...
                </div>
                
<!-- กรอบเตือนการเลือกที่นั่ง -->
<div id="hidepage" style="display:none;">
<? if($_GET["date"]==""&&$_GET["lacal"]==""){ ?> <? }else{ ?>
<? if($cc != 2){ ?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
  <tr><td style="white-space: nowrap;" height="40px" class="tblx" ><img src="images/taxt.gif"</td></tr>
</table>
<? }else if($cc == 2){ ?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" bgcolor="#FF9900">
  <tr><td style="white-space: nowrap;" height="40px" class="tblx" ><img src="images/taxt2.gif"</td></tr></tr>
</table>
<? }?>

<!-- เริ่มตารางจองเวลา -->  
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
  <tr>
      <td width="14%" class="tbl2" style="white-space: nowrap; color:#555;"><div align="center"><strong>เวลา</strong></div></td>
       <? 
     $dateplus = $_GET["date"];
       for ($i = 0; $i<4; $i++) {?>
       <td width="14%" class="tbl2" style="white-space: nowrap; color:#555;">
         <div align="center"><strong><?=DateThai(add_date($dateplus,$i,0,0))?></strong></div>
       </td>
       <? } ?>
 </tr>
<? 
$j = 24; //วน 25 section
for($k=1; $k<=$j; $k++){  
?>        
<tr>
<td width="14%" class="tblx" style="white-space: nowrap; color:#555";>
<div align="center"><strong>
        <? if($k == 1){
        $stratTime = "08:00";
        $newTime = date("H:i",strtotime(date("$stratTime")." +30 minutes"));
        echo $stratTime."-".$newTime;
      }
      if($k > 1){
        echo $newTime."-";
        $newTime = date("H:i",strtotime(date("$newTime")." +30 minutes"));
        echo $newTime;
        }
                ?>
</strong></div>
</td>
<? for($i=0; $i<4; $i++){
    $strSQL1 = "SELECT * FROM `seats` WHERE date = DATE_ADD('".$_GET["date"]."', INTERVAL $i day) AND branchid =".$_GET["local"]."";
        $objQuery1 = mysql_query($strSQL1);
        $objResult1 = mysql_fetch_array($objQuery1);
        $kdate = $objResult1["date"];
    $section = $objResult1["$k"]; //**
    //echo $strSQL1;
    
    $strSQL2 = "SELECT section_s , section_e FROM `reserve` 
        WHERE time ='".$kdate."' AND branchid ='".$_GET["local"]."' AND accid = '".$accid."' AND section_s <= '".$k."' and section_e > '".$k."'";
        $objQuery2 = mysql_query($strSQL2);
        $objResult2 = mysql_fetch_array($objQuery2);
        $section_s = $objResult2["section_s"];
        $section_e = $objResult2["section_e"];
    //echo $strSQL2;//$objResult2["section_s"].",".$objResult2["section_e"];
?>
<td width="14%" class="tblx" style="white-space: nowrap;" onMouseOver="this.bgColor='#FC6'" onMouseOut="this.bgColor = ''">
         <div align="center"><strong> 
         <? $newTime3 = date("H:i",strtotime(date("$newTime")." -30 minutes"));?>
                <? if($section<=0){?> <img src="images/false.png" />
                <? }else if(DateTimeDiff("$s","$kdate $newTime3")<=0){ ?> <img src="images/false.png" />
                <? }else if($k >= $section_s && $k < $section_e){?><img src="images/Profile-icon.png" />
                <? }else if($_GET["sectioncc"] == $k && $_GET["datecc"] == $kdate){ 
        //***********เลือกเป็นช่วงเวลา*****************/
                ?> <a href="JavaScript:if(confirm(' จองเวลาเรียน1 \n  
                วันที่  <?=DateThai($kdate) ?> \n  
                เวลา  <?=$_GET["timecc"]?>-<?=$newTime?> \n
                <?  $sql_branch = "SELECT * FROM `branch`";
                    $objQuery_branch = mysql_query($sql_branch);
                    while ($objResult_branch = mysql_fetch_array($objQuery_branch)) {
                      if($objResult_branch['branchid'] == $_GET["local"]){
                          echo "สถานที่เรียน ".$objResult_branch['name'];
                      }
                    }
                ?>
                \n\n ยืนยันการจอง?')==true){window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=<?=$k?>&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?=$kdate;?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=<?=$newTime?>';}">
                <img src="images/accept.png" />
                </a>
              <? }else if($cc != 2){ ?><a href="home.php?cc=2&timecc=<?=date("H:i",strtotime(date("$newTime")." -30 minutes"))?>&sectioncc=<?=$k?>&local=<?=$_GET["local"]?>&date=<?=$_GET["date"]?>&datecc=<?=($kdate)?>">
        <?=$section;?>
                </a>
                <? /***********เลือกแค่ครึ่งชม*****************/ ?>
                <? }else {?> 
                <a href="JavaScript:if(confirm(' จองเวลาเรียน2 \n 
                    วันที่  <?=DateThai($kdate) ?> \n 
                    เวลา  <?=$_GET["timecc"]?>-<?=$newTime?> \n
                    <?  $sql_branch = "SELECT * FROM `branch`";
                    $objQuery_branch = mysql_query($sql_branch);
                    while ($objResult_branch = mysql_fetch_array($objQuery_branch)) {
                      if($objResult_branch['branchid'] == $_GET["local"]){
                          echo "สถานที่เรียน ".$objResult_branch['name'];
                      }
                    }
                    ?>\n\n ยืนยันการจอง?')==true)
                    {window.location='seatadd2.php?section1=<?=$sectioncc;?>&section2=<?=$k?>&branchid=<?=$_GET["local"];?>&date1=<?=$_GET["datecc"];?>&date2=<?=$kdate;?>&dateold=<?= $_GET["date"];?>&localold=<?=$_GET["local"];?>&time1=<?=$_GET["timecc"]?>&time2=<?=$newTime?>';}">
                <?=$section;?>    
                </a>
        <? }?>
                </strong></div>
            </td>
      <? } ?>      
      </tr>   
<? }?>
</table>
        </div>
        </div>
      </article>
      </div>
     </section>
<? } ?>
</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>

</body>
</html>
<? } ?>
