<? 
ob_start();
session_start();
if($_SESSION["accid_self"] == "")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณาล็อคอินเข้าสู่ระบบ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=self.php'>";
exit();
}else{

date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION["edate"];

 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
include("config.inc.php");
$strSQL = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_SESSION["accid_self"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$total = $objResult["totalcredit"];
$namestu = $objResult["name"];
$accid = $_SESSION["accid_self"]; 
$strSQL7 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$accid."' ";
$objQuery7 = mysql_query($strSQL7);
$check55=0;
$strSQL8 = "SELECT * FROM reserve where accid = '".$accid."'";
$objQuery8 = mysql_query($strSQL8);
while($objResult8 = mysql_fetch_array($objQuery8)){
$time = 8 + floor(($objResult8["section_s"]-1)/2); if($objResult8["section_s"]%2==1){$min="30";}else{$min="00";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55+=$objResult8["section_e"]-$objResult8["section_s"];}
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
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F | Editpass</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/ie6_script_other.js"></script>
<script type="text/javascript" src="js/html5.js"></script>
<![endif]-->
</head>
<script>
function checkStr1(){
	var p =document.getElementById('txtPassword').value
	var n =0;
     /* กำหนดเงื่อนไข */
	if(p.match('[0-9]{1,}'))n++;   // เป็นตัวเลขให้ความยาก+1
	if(p.match('[a-z]{1,}'))n++;    // เป็นตัวเล็กให้ความยาก +1
	if(p.match('[A-Z]{1,}'))n++;  // เป็นตัวใหญ่ให้ความยาก+1
	if(p.match('[0-9]{1,}') && p.match('[a-z]{1,}')&& p.match('[A-Z]{1,}')&&p.length>5)n++;  // เป็นทั้งสามอย่างและตัวอักษรมากกว่า 5 ตัว ให้ความยาก+1
	else if(p.length >9) n++;  //ไม่เช่นนั้นถ้าตัวอักษรมากกว่า 9ตัวก็ให้ความยาก +1
	document.getElementById('imgPass').src="createPass.php?num="+n;  //ส่งผลรวมความยาก
}
function checkStr2(){
	var p =document.getElementById('txtConPassword').value
	var n =0;
     /* กำหนดเงื่อนไข */
	if(p.match('[0-9]{1,}'))n++;   // เป็นตัวเลขให้ความยาก+1
	if(p.match('[a-z]{1,}'))n++;    // เป็นตัวเล็กให้ความยาก +1
	if(p.match('[A-Z]{1,}'))n++;  // เป็นตัวใหญ่ให้ความยาก+1
	if(p.match('[0-9]{1,}') && p.match('[a-z]{1,}')&& p.match('[A-Z]{1,}')&&p.length>5)n++;  // เป็นทั้งสามอย่างและตัวอักษรมากกว่า 5 ตัว ให้ความยาก+1
	else if(p.length >9) n++;  //ไม่เช่นนั้นถ้าตัวอักษรมากกว่า 9ตัวก็ให้ความยาก +1
	document.getElementById('imgPass2').src="createPass2.php?num="+n;  //ส่งผลรวมความยาก
}
</script>
<body id="page5">
<!-- START PAGE SOURCE -->
<!--<div class="body3"></div>-->
<div class="body1">
  <div class="main">
    <header>
      <div id="logo_box">
        <!--<h1><a href="#" id="logo">High Solution Math S.E.L.F<span></span></a></h1>-->
        <img src="images/Logo4.png"/>
      </div>
      <nav>
        <ul id="menu">
          <? if($_SESSION["status"] == "100"){ ?> <li ><a href="home2.php">Home</a></li> 
		  <? }else{ ?><li ><a href="home.php">Home</a></li> <? } ?>
          <li><a href="show.php">Table Reserve</a></li>
          <li id="menu_active"><a href="editpass.php">Change Password</a></li>
           <li><a href="score.php">Score</a></li>
          <li ><a href="logout.php">Logout</a></li>
          <!-- <li class="bg_none"><a href="sitemap.html">Sitemap</a></li>-->
        </ul>
      </nav>
      <div class="wrapper2">
      <!--<div class="text3"></div>-->
        <!--<div class="text2"></div>
      	<ul id="icons">
         <li><a href="#"><img src="images/icon1.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/icon2.jpg" alt=""></a></li>
          <li><a href="#"><img src="images/icon3.jpg" alt=""></a></li>
        </ul>-->
      </div>
    </header>
  </div>
</div>
<!--<div class="body2">
  <div class="main">-->
    <section id="content">
      <div class="marg_top wrapper">
        <article class="col1">
          <div class="box1_out">
            <div class="box1">
            <h2><img src="images/Profile.gif"/></h2>
            <div class="wrapper3">
                <article class="col5">
                <table >
                <tr>
                    <td>ชื่อ:</td>
                    <td><?=$namestu; ?></td>
                </tr>
                <tr>
                    <td>เคดิตทั้งหมด:</td>
                    <td><?=$total; ?></td>
                </tr>
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
                 <? while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                       <tr>
                      <td></td>
                       <td style="font-size:13px;"><?='['.++$tmp.']  '?><?=$objResult7["subname"]; ?></td>
                       </tr>
                     <? } ?>
                
                </table>
               
                </article> <br>
            </div>
          </div>
        </article>
        
        
        <article class="col2 pad_left1">
          <div class="box1_out">
            <div class="box3">
              <h2>Change Password</h2>
              <form id="form1" name="form1" method="post" action="save_profile2.php">
              <table class="tbl-border" cellpadding="0" cellspacing="1" width="100%" >
                           <tbody>
                           <tr>
                           	<td width="20%"  class="tbl3" style="white-space: nowrap;color:#555">พาสเวิร์ดเดิม :</td>
                            <td width="20%"  class="tbl3" style="white-space: nowrap;">
                            <div class="bg left">
                    <input class="input input1" type="password" id="txtOldPassword" name="txtOldPassword" value="••••••••••" onBlur="if(this.value=='') this.value='••••••••••'" onFocus="if(this.value =='••••••••••' ) this.value=''"	 />
                  </div></td> 
                           </tr>
                           
                           <tr >
                            <td class="tbl3" style="white-space: nowrap; color:#555";>พาสเวิร์ดใหม่ :</td>
                            <td class="tbl3" style="white-space: nowrap;" >
                            <div class="bg left">
                    <input class="input input1" type="password" id="txtPassword" name="txtPassword"  value="••••••••••" onBlur="if(this.value=='') this.value='••••••••••'" onFocus="if(this.value =='••••••••••' ) this.value=''"	onkeyup="checkStr1()" />
                  </div><!--<img src="createPass.php" id="imgPass">--></td>
                            <td class="tbl3" style="white-space: nowrap;" ></td>
                           </tr>  
                           
                            <tr >
                            <td class="tbl3" style="white-space: nowrap; color:#555";>พาสเวิร์ดใหม่อีกครั้ง :</td>
                            <td class="tbl3" style="white-space: nowrap;" ><div class="bg left">
                    <input class="input input1" type="password" id="txtConPassword" name="txtConPassword" value="••••••••••" onBlur="if(this.value=='') this.value='••••••••••'" onFocus="if(this.value =='••••••••••' ) this.value=''"	 onkeyup="checkStr2()" />
                  </div><!--<img src="createPass2.php" id="imgPass2">--></td>
                            <td class="tbl3" style="white-space: nowrap;" ></td>
                           </tr> 
                           <tr>
                        
                           <td class="tbl3" style="white-space: nowrap;" ><a href="#" onClick="document.getElementById('form1').submit()" class="button"><span><span>Edit</span></span></a></td>
                           </tr>
                           </tbody>                                           
                 </table>
                  </form>
            </div>
          </div>
          
        </article>
      </div>
     </section>
  </div>
</div>
<div align="center"><?=$s?></div>
</body>
</html>
<? }?>