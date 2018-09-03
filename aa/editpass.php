<? 
session_start();
date_default_timezone_set("Asia/Bangkok");
$s=date('Y-m-d H:i');
$e=$_SESSION["edate"];
if($_SESSION['accid'] == "")
{
echo "<script>alert('กรุณาล็อคอินเข้าสู่ระบบด้วยค่ะ');window.location='self.php';</script>";
exit();
}
 function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
include("config.inc.php");
$strSQL = "SELECT * FROM account JOIN student ON account.studentid = student.studentid AND accid = '".$_SESSION["accid"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
$total = $objResult["totalcredit"];
$namestu = $objResult["name"];
$accid = $_SESSION["accid"]; 
$strSQL7 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$accid."' ";
$objQuery7 = mysql_query($strSQL7);
$check55=0;
$strSQL8 = "SELECT * FROM reserve where accid = '".$accid."'";
$objQuery8 = mysql_query($strSQL8);
while($objResult8 = mysql_fetch_array($objQuery8)){
$time = 7 + floor(($objResult8["section"]-1)/2); if($objResult8["section"]%2==1){$min="00";}else{$min="30";}
$date99=$objResult8["time"];
if(DateTimeDiff("$s","$date99 $time:$min")>0)
{$check55++;}
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
<title>จองเวลาเรียน S.E.L.F อ.โต้ง</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<script type="text/javascript" src="js/jquery.poshytip.min.js"></script>
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
<!--<script>
$(function() {
	 $('#location').poshytip({
		 className: 'tip-twitter',
		 showOn: 'none',
		 alignTo: 'target',
	     alignX: 'inner-left',
		 offsetX: 0,
		 offsetY: 5
	});
	$('#location').poshytip('show');
});
</script>-->
</head>
<body id="page3">
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<nav>
					<ul id="menu">
						<!--<li><a href="index.html">About</a></li>
						<li><a href="Courses.html">Courses</a></li>
						<li><a href="Programs.html">Programs</a></li>
						<li><a href="Teachers.html">Teachers</a></li>
						<li><a href="Admissions.html">Admissions</a></li>
						<li class="end"><a href="Contacts.html">Contacts</a></li>-->
					</ul>
				</nav>
				<ul id="icons">
<li><a href="http://www.aj-tong.com/"><img src="images/home-icon.png" alt="" title="เว็บเพจ"  width="30" ></a></li>
                                        <li><a href="https://www.facebook.com/atong.highsolution"><img src="images/fb.png" alt="" title="facebook" width="30"></a></li>
					<!--<li><a href="#"><img src="images/icons1.jpg" alt=""></a></li>
					<li><a href="#"><img src="images/icons2.jpg" alt=""></a></li>-->
				</ul>
			</div>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Learn Center</a></h1>
			</div>
			<!--<div id="slogan">
				We Will Open The World<span>of knowledge for you!</span>
			</div>-->
		</header>
<!-- / header -->
	</div>
</div>
<div class="body2">
	<div class="main">
<!-- content -->
		<section id="content">
			<div class="box1">
			  <div class="wrapper">
					<article class="col2 pad_left22">
                    <span id="main_top"></span>
						
                     
                     <div class="pad_left1">
                     <p></p>
                     <table width="180" border="1" >
                     <tr>
                       <td>
                               <p><img src="images/user.png"/><B>ชื่อ :  </B> <?= $namestu; ?></p>
                       </td>
                     </tr>
                     </table>
                        <p><img src="images/coins.png"/><B> เครดิตคงเหลือ :  </B><?= $total; ?></p>
                        <p><img src="images/time_go.png"/><B> เครดิตที่่ใช้ล่วงหน้า :  </B><?= $check55; ?></p>
						<p><img src="images/chak.png"/><B> วันหมดอายุ :</B><?=DateThai($e) ?></p>
                     	<p><img src="images/text_signature.png"/><B> วิชาที่เรียน</B></p>
                     <table width="180" border="1" > 
                     <? while($objResult7 = mysql_fetch_array($objQuery7)){?>  
                       <tr> 
                             <td><?='[ '.++$tmp.' ]  '?><?=$objResult7["subname"]; ?></p></td>
                    </tr><? } ?>
                      </table>
                        
                     </div> 
                    <p></p>
                    <div class="pad_left1">
                  		<ul class="list1">
                            <li><a href="home.php">จองเวลา</a></li>
							<li><a href="show.php">ดูเวลาจองไว้</a></li>
							<li><a href="editpass.php">เปลี่ยนพาสเวิร์ด</a></li>
							<li><a href="logout.php">ออกจากระบบ</a></li>
						</ul>    
                    </div>
                 </article>
                    
					<article class="col11">
						<div class="pad_left11">
							
						
                        <h2><img src="images/change.png"/></h2></div>
		
        
        <ul class="list1 pad_bot11">
            <form id="form1" name="form1" method="post" action="save_profile2.php">
                             
          <div  class="wrapper">
             <strong2>พาสเวิร์ดเดิม :</strong2><div class="bg"><input type="password" class="input" id="txtOldPassword" name="txtOldPassword"  ></div></div>
             <div  class="wrapper">
			 <strong2>พาสเวิร์ดใหม่ :</strong2><div class="bg"><input type="password" class="input" id="txtPassword" name="txtPassword"   onkeyup="checkStr1()"></div>&nbsp;&nbsp;<img src="createPass.php" id="imgPass"></div>
             <div  class="wrapper">
			 <strong2>พาสเวิร์ดใหม่อีกครั้ง :</strong2><div class="bg"><input type="password" class="input" id="txtConPassword" name="txtConPassword"  onkeyup="checkStr2()" ></div>&nbsp;&nbsp;<img src="createPass2.php" id="imgPass2"></div>
             </form>
       </ul>
                      
						
                        
                        
                        <div class="pad_left11">
                      
							<a href="#" onClick="document.getElementById('form1').submit()" class="button marg_top11"><span><span>&nbsp;&nbsp;ยืนยัน&nbsp;&nbsp;</span></span></a>
						</div>
					</article>
				</div>
			</div>
		</section>
<!-- content -->
<!-- footer -->
		<footer>
			<div class="wrapper">
				<div class="pad1">
					
				</div>
			</div>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>