<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php 
	session_start();
	include('config.php'); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--  Version: Multiflex-3 Update-7 / Layout-2             -->
<!--  Date:    January 15, 2007                            -->
<!--  Author:  Wolfgang                                    -->
<!--  License: Fully open source without restrictions.     -->
<!--           Please keep footer credits with a link to   -->
<!--           Wolfgang (www.1-2-3-4.info). Thank you!     -->

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
  <link rel="icon" type="image/x-icon" href="./img/logo2.png" />
  <title>ระะบบจัดการข้อสอบ S.E.L.E</title>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

<body>
  <!-- Main Page Container -->
  <div class="page-container">
 
  <!-- How to implement this header in your Multiflex-3 Layout:           -->
  <!-- 1. Copy the marked rows below                                      -->
  <!-- 2. Paste and replace marked rows in your "layoutNN.html" file      -->
  <!-- 3. Open CSS-file "header4_setup.css", and follow its instructions  -->

  <!-- START COPY here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="index.html" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
          
        </div>

        <!-- Navigation Level 0 -->
        <!--<div class="nav0">
          <ul>
            <li><a href="#" title="Pagina home in Italiano"><img src="./img/flag_italy.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Homepage auf Deutsch"><img src="./img/flag_germany.gif" alt="Image description" /></a></li>
            <li><a href="#" title="Hemsidan p&aring; svenska"><img src="./img/flag_sweden.gif" alt="Image description" /></a></li>
          </ul>
        </div>	-->		

        <!-- Navigation Level 1 -->
        <!--<div class="nav1">
          <ul>
            <li><a href="#" title="Go to Start page">Home</a></li>
            <li><a href="#" title="Get to know who we are">About</a></li>
            <li><a href="#" title="Get in touch with us">Contact</a></li>																		
            <li><a href="#" title="Get an overview of website">Sitemap</a></li>
          </ul>
        </div>  -->            
      </div>
      
      <!-- A.2 HEADER BOTTOM -->
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
          <!-- Navigation item -->
          <ul>
            <li><a href="index.php">หน้าแรก</a></li>
            <!--<li><a href="http://aj-tongmath.com/cardpro/Login.php">ระบบจัดการ</a></li>
           <li><a href="http://aj-tongmath.com/Managapp2/index.php">ระบบจัดการAPP</a></li>-->
          </ul>
          
          <!-- Navigation item -->
          <?php if($_SESSION["stid"] != ""){?>
          
         <ul>
            <li><a href="Exam_Manag_AddnameSubj.php">สร้างข้อสอบ</a>
            	<ul>
                    <li><a href="Exam_Manag_AddnameSubj.php">เพิ่มวิชาข้อสอบ</a></li>
                    <li><a href="Exam_Manag_ShowAll.php">รายการวิชาข้อสอบทั้งหมด</a></li>
                </ul>
            </li>
         </ul>
         <ul>
            <li><a href="Subject_Manag_Showall.php">จัดการคลังข้อสอบ</a></li>
         </ul>
         <ul>
            <li><a href="Score_Manag.php">จัดการคะแนนสอบ</a></li>
            
         </ul>
          <?php }?>          
			
          <!-- Navigation item -->
                
        </div>
	  </div>

      <!-- A.3 HEADER BREADCRUMBS -->

      <!-- Breadcrumbs -->
      <div class="header-breadcrumbs">
        <div class="searchform">
          <form action="index.html" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>
        </div>
      </div>
  

  <!-- END COPY here -->

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
        	<?php if($_SESSION["stid"] == ""){?>
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
						$strSTT = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
						$objQuerySTT = mysql_query($strSTT);
						$objResultSTT = mysql_fetch_array($objQuerySTT);
						echo $objResultSTT["username"];
					?>
  	            </font></div>
  	          </div>
              <div class="form_row">
    	        <div align="left">
                  <font color="#666666" size="-1"><strong>สถานะ : </strong></font><font color="#666666" size="-1"><?php echo $objResultSTT["stname"];?></font></div>
  	          </div>
              	
    	        <div align="right">
    	          <input type="submit" name="cmdweblogin" class="button" value="Logout" />
  	          </div>
  	        </form>
            <?php }?>
        </div>
         <?php if($_SESSION["stid"] != ""){?>
        <h1>เมนู</h1>
        <dl class="nav3-grid">
          <dt><a href="index.php">หน้าแรก</a></dt>
          <dt><a href="Exam_Manag_AddnameSubj.php">สร้างข้อสอบ</a></dt>
            <dd><a href="Exam_Manag_AddnameSubj.php">เพิ่มวิชาข้อสอบ</a></dd>
             <dd><a href="Exam_Manag_ShowAll.php">รายการวิชาข้อสอบทั้งหมด</a></dd>
            <dt><a href="Subject_Manag_Showall.php">จัดการคลังข้อสอบ</a></dt>
          <!--  <dd><a href="#">Navlink 123</a></dd>		
          <dt><a href="#">Navlink 13</a></dt>
          <dt><a href="#">Navlink 14</a></dt>
          <dt><a href="#">Navlink 15</a></dt> --> 
         
        <dt><a href="Score_Manag.php">จัดการคะแนนสอบ</a></dt>  </dl>                   
     <!--     <h1>Search</h1>
        <div class="searchform">
          <form action="index.html" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>-->
        </div>
   <? }?>
      </div>
 
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
  </div> 
  
</body>
</html>



