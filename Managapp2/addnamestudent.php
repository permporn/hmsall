<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
if($_SESSION["accid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="publisher" content="Your publisher infos here ..." />
  <meta name="copyright" content="Your copyright infos here ..." />
  <meta name="author" content="Design: Wolfgang (www.1-2-3-4.info) / Modified: Your Name" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your page description here ..." />
  <meta name="keywords" content="Your keywords, keywords, keywords, here ..." />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout2_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout2_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/logoku2.png" />
  <script type="text/javascript" src="autoserch/autocomplete.js"></script>
<link rel="stylesheet" href="autoserch/autocomplete.css"  type="text/css"/>
  <title>ระะบบลาออนไลน์</title>
</head>
<body>
  <!-- Main Page Container -->
  <div class="page-container">
 
    <div class="header">
      
      <!-- A.1 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="home.php" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
          
        </div>
      </div>
      
      <!-- A.2 HEADER BOTTOM -->
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
          <!-- Navigation item -->
          <ul><li><a href="home.php">หน้าแรก</a></li></ul>
          
          <!-- Navigation item -->
          <!-- Navigation item -->
          <?php if($_SESSION["accid"] != ""){?>
          <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'ADMIN'){?>
         <ul>   
         	<li><a href="managvideo.php">จัดการวีดีโอ</a></li>
         </ul>
         
         <ul>   
         	<li><a href="managcouressubj.php">จัดการรายชื่อตามคอร์ส</a>
            	<ul>
                   <li><a href="showstudent.php">แสดงรายชื่อประเภทคอร์ส</a></li>
                </ul>
            </li>
         </ul>
               
         <?php }?>
         <ul>   
         	<li><a href="home.php">จัดการรายชื่อรายบุคคล</a>
            	
            </li>
         </ul>
         
       <?php }?> 
        </div>
	  </div>

      <!-- A.3 HEADER BREADCRUMBS -->

      <!-- Breadcrumbs -->
      <div class="header-breadcrumbs">

  </div>

    <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
 
      <!-- B.1 MAIN NAVIGATION -->
      <div class="main-navigation">

        <!-- Navigation Level 3 -->
        <div class="round-border-topright"></div>
        <!-- Login --> 
        
        <h1 class="first">Login</h1>
          <p></p><p></p>
        <div class="loginform">
        	<?php if($_SESSION["accid"] == ""){?>
          <form method="post" action="check_login.php"> 
            <p><input type="hidden" name="rememberme" value="0" /></p>
            <fieldset>
              <p><label for="username_1" class="top">User:</label><br />
                <input type="text" name="username_1" id="username_1" tabindex="1" class="field" onkeypress="return webLoginEnter(document.loginfrm.password);" value="" /></p>
    	      <p><label for="password_1" class="top">Password:</label><br />
                <input type="password" name="password_1" id="password_1" tabindex="2" class="field" onkeypress="return webLoginEnter(document.loginfrm.cmdweblogin);" value="" /></p>
    	      <!--<p><input type="checkbox" name="checkbox_1" id="checkbox_1" class="checkbox" tabindex="3" size="1" value="" onclick="webLoginCheckRemember()" /><label for="checkbox_1" class="right">Remember me</label></p>-->
    	      <p><input type="submit" name="cmdweblogin" class="button" value="LOGIN"  /></p>
	         
	        </fieldset>
          </form>
          	<?php }else {?>
            <form method="post" action="Logout.php">
    	        <div align="left">
    	          <div class="form_row"><font color="#666666" size="-1"><strong>บัญชีผู้ใช้งาน :</strong>
    	            <?php 
						$strSTT = "SELECT * FROM  account WHERE accid = '".$_SESSION["accid"]."' AND status  = '".$_SESSION["status"]."'";
						$objQuerySTT = mysql_query($strSTT);
						$objResultSTT = mysql_fetch_array($objQuerySTT);
						echo $objResultSTT["name"];
					?>
  	            </font></div>
  	          </div>
              <div class="form_row">
    	        <div align="left">
                  <font color="#666666" size="-1"><strong>สถานะ : </strong></font><font color="#666666" size="-1"><?php echo $objResultSTT["status"];?></font></div>
  	          </div>
              	
    	        <div align="right">
    	          <input type="submit" name="cmdweblogin" class="button" value="Logout" />
  	          </div>
  	        </form>
          
        </div>
        

       
        <h1 class="">เมนู</h1>
        <dl class="nav3-grid">
          <dt><a href="index.php">หน้าแรก</a></dt>
          <?php if($_SESSION["accid"] != "" && $_SESSION["status"] == 'ADMIN'){?>
          <dt><a href="managvideo.php">จัดการวีดีโอ</a></dt>
          <dt><a href="managcouressubj.php">จัดการรายชื่อตามคอร์ส</a></dt>
            <dd><a href="showstudent.php">แสดงรายชื่อประเภทคอร์ส</a></dd>
            <? }?>
          <dt><a href="home.php">จัดการรายชื่อรายบุคคล</a></dt>
          
         
        </dl>                      
    	<?php }?>  
        </div>                       

 
      <!-- B.1 MAIN CONTENT-->
      <div class="main-content">
       <!-- Pagetitle -->
       
        <h1 class="pagetitle">เพิ่มรายชื่อ</h1>
		<!-- Content unit - One column -->

		<!--<h1 class="block">2 - ตารางชุดข้อสอบทั้งหมด</h1>-->
     	<div class="contactform" style="width:95%">
           <form id="form1" name="form1" method="GET" action="insertstudent.php">
            <fieldset ><legend>&nbsp;+ เพิ่ม (ชื่อ)&nbsp;</legend>
                <p><label for="" class="left">ชื่อ-นามสกุล:</label>
                <input name="name"/></p>
                <p><label for="" class="left">โรงเรียน:</label>
                <input name="school"/></p>
                <p><label for="" class="left">เบอร์โทร: </label>
                <input name="tel"/></p>
                <p><label for="" class="left">สมัครที่:</label>
                <select name="local"  id="local"  >
                    <option>เลือกสถานที่</option>
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
                <p><input type="submit" name="Save" id="Save" value="Save" class="button">
                <input type="button" name="" id="" class="button" value="ยกเลิก" onclick="window.history.back()"></p>
               </fieldset>
            </form>
        </div>
      </div>
      </div>
    </div>
      
    <!-- C. FOOTER AREA -->      

    <div class="footer">
      <p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
      
    </div>      
  </div> 
  
</body>
</html>
<?php } ?>