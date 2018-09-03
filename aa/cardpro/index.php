<?
include("config.inc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Cardpro</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<!--<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>-->

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
					<li><a href="#"><img src="images/fb.png" alt="" width="40"></a></li>
					<li><a href="#"><img src="images/home-icon.png" width="40"></a></li>
				</ul>
			</div>
			<div class="wrapper">
				<h1><a href="index.html" id="logo">Learn Center</a></h1>
			</div>
			<!--<div id="slogan">
				จองเวลาเรียน S.E.L.F <span></span>
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
					<div class="pad_left1">
                        <h2> <img src="images/login.png" width="189" height="48"/>
                  </h2></div>
		<ul class="list1 pad_bot1">
        
             <form id="form1" name="form1" method="post" action="checkuser2.php">
                             
          <div  class="wrapper">
             <strong>Username:</strong><div class="bg"><input type="text" class="input" id="txtUsername" name="txtUsername"  onfocus="this.value='';" onblur="if (this.value=='') {this.value='Username';}" value="Username"></div></div>
             <div  class="wrapper">
			 <strong>Password:</strong><div class="bg"><input type="password" class="input" id="txtPassword" name="txtPassword" onfocus="this.value='';" onblur="if (this.value=='') {this.value='Password';}" value="Password" ></div></div>
             
             </form>
       </ul>
       <!--<span id="main_top"></span> --------------------------- -->

			<a href="#" onClick="document.getElementById('form1').submit()" class="button"><span><span>Login</span></span></a>
                       <div class="pad_left1">
                       <h2></h2>
						
						<!--<ul class="list1">
							<li><a href="#">ดูเวลาจองไว้</a></li>
							<li><a href="#">เปลี่ยนพาสเวิร์ด</a></li>
							<li><a href="#">Public School Facts</a></li>
							<li><a href="#">ออกจากระบบ</a></li>
							<li><a href="#">Education Jobs</a></li>-->
						</ul>
							
					  </div>
					</article>
                    
                    
					<article class="col11">
						<div class="pad_left11">
                        <h2 class="pad_bot1"><img src="images/newfeed.png" width="234" height="36"/></h2>
						</div>
                        <div class="pad_left11">

<?
$s=date('Y-m-d');
function DateDiff($strDate1,$strDate2)
{
return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}
$i=1;
$strSQL = "SELECT * FROM even";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$strSQL .=" order  by evenid DESC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	?>
    <center>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="400">
	  <tr>
		<th width="700" class="tbl2" style="white-space: nowrap;"><strong> ข่าวสาร</strong></th>
	  </tr>
	<?
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	  <tr>
        <td width="700" style="white-space:nowrap;" class="tblyy"><div align="center"><?=$objResult["even"];?><? if(DateDiff($s,$objResult["date"])<=0&&DateDiff($s,$objResult["date"])>-7) {?> &nbsp;&nbsp;<img src="images/icn_new.gif"/> <? } ?> </div></td>
    
	  </tr>
	
	
    <?
	$i++;
	}
	?>
    </table>
						</div>
               		</article>
				<div id="columnbo">
                     <!--<article class="cols marg_left11">
                    <figure><a href="#"><img src="images/art_42017920.jpg" alt="" width="165" height="229"></a></figure><p class="pad_bot1 pad_top2"><img src= "images/new.png"><strong>&nbsp;&nbsp; โบชัวร์วิสุทธานีรอบต.ค และเปิดเทอม 2</strong> โบชัวร์วิสุทธานีรอบ ต.ค.และเปิดเทอม2 S.E.L.F เปิดให้บริการเด็กโต้งแล้ว!!! >>โบชัวร์วิสุทธานี...(05/09/2012) <a href="http://www.aj-tong.com/articles/42017920/%E0%B9%82%E0%B8%9A%E0%B8%8A%E0%B8%B1%E0%B8%A7%E0%B8%A3%E0%B9%8C%E0%B8%A7%E0%B8%B4%E0%B8%AA%E0%B8%B8%E0%B8%97%E0%B8%98%E0%B8%B2%E0%B8%99%E0%B8%B5%E0%B8%A3%E0%B8%AD%E0%B8%9A%E0%B8%95.%E0%B8%84%20%E0%B9%81%E0%B8%A5%E0%B8%B0%E0%B9%80%E0%B8%9B%E0%B8%B4%E0%B8%94%E0%B9%80%E0%B8%97%E0%B8%AD%E0%B8%A1%202.html" style="color:#3399FF;">อ่านต่อ.. </a></p>
                    
                    </article>-->
                    
                   <!-- <article class="cols marg_right1">
                <figure><a href="#"><img src="images/art_42017927.jpg" alt="" width="165" height="229"></a></figure> <p class="pad_bot1 pad_top2"><img src= "images/new.png"><strong>&nbsp;&nbsp;โบชัวร์A Note Center </strong> สำหรับน้อง ๆ ที่สนใจเนื้อหาคณิต ป.3เทอม2 สอนสด  เปิดแล้ว มีที่นั่งจำนวนจำกัด

สามารถสอบถามรายละเอียดได้ที่ A Note Center ชั้น 9 (05/09/2012)<a href="http://www.aj-tong.com/articles/42017927/%E0%B9%82%E0%B8%9A%E0%B8%8A%E0%B8%B1%E0%B8%A7%E0%B8%A3%E0%B9%8CA%20Note%20Center.html" style="color:#3399FF;">อ่านต่อ.. </a></p>
							
				</article>-->
                    </div>
						
		<!--</section>-->
<!-- content -->
<!-- footer -->
		<!--<footer>
			<div class="wrapper">
				<div class="pad1">
				
				</div>
			</div>
		</footer>-->
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>