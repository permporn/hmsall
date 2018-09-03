<!DOCTYPE html>
<html lang="en">
<head>
<title>Booking Time For S.E.L.F</title>
<meta charset="utf-8">
<link rel="stylesheet" href="bookingtime/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="bookingtime/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="bookingtime/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="bookingtime/js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="bookingtime/js/cufon-yui.js"></script>
<script type="text/javascript" src="bookingtime/js/cufon-replace.js"></script>
<script type="text/javascript" src="bookingtime/js/Myriad_Pro_300.font.js"></script>
<link rel="stylesheet" href="bookingtime/slider/bjqs.css">
<link rel="stylesheet" href="bookingtime/slider/demo.css">
<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script src="bookingtime/slider/js/bjqs-1.3.min.js"></script>
 <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
 <!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>-->
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#dialog-modal" ).dialog({
      height:450,
      width:592,
      modal: true
    });
  });
  </script>
</head>
<body id="page1">

<!-- START PAGE SOURCE -->
<div class="body1">

  <div class="main">
    <header><div class="body3"></div>
      <div id="logo_box">
        <!--<h1>--><a href="self.php"><img src="bookingtime/images/Logo3.png"/></a><!-- <span></span>--><!--</h1>-->
      </div>
      <nav>
        <ul id="menu">
          <li id="menu_active"><a href="bookingtime/self.php" title="หน้าแรก">Home</a></li>
          <!--<li><a href="about.html" >About</a></li>
          <li><a href="projects.html">Projects</a></li>-->
          <li><a href="bookingtime/contacts.php" title="ติดต่อเรา">Contacts</a></li>
          <li ><a href="http://www.aj-tong.com" title="โปรโมชั่นใหม่">Hot Promation!</a></li>
        </ul>
    </nav>
    <div class="wrapper">
       <ul id="icons">
            <li><span>Follow Us!</span></li>
            <li><a href="https://www.facebook.com/atong.math"><img src="bookingtime/images/icon1.jpg" alt=""></a></li>
            <li><a href="#"><img src="bookingtime/images/icon2.jpg" alt=""></a></li>
            <!--<li><a href="#"><img src="images/icon3.jpg" alt=""></a></li>-->
      </ul>
        <!--<div class="text1">B o o k i n g T i m e </div>
        <div class="text2">F o r   S . E . L . F  </div>
        <p class="ferntext1">ระบบจองเวลาเรียน S.E.L.F -->
      <div id="container">
          <div id="banner-fade">
            <ul class="bjqs">
              <li><img src="bookingtime/slider/img/banner03.jpg" title="พิเศษวันเด็ก"></li>
              <li><img src="bookingtime/slider/img/banner02.jpg" title="เรียนด้วย ได้เที่ยว ไปกับโต้ง."></li>
               <li><img src="bookingtime/slider/img/banner01.jpg" title="สด!! พร้อมเสริฟ" onClick="http://www.aj-tong.com/"></li>
              
              
            </ul>
          </div>
    
      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      </script>
      </div>
      
 </div> 
  
</div>
    <section id="content">
      <div class="marg_top wrapper">
        <article class="col1">
          <div class="box1_out">
            <div class="box1">
              <h2>LOGIN</h2>
              <p class="pad_bot1">กรุณาเข้าสู่ระบบ เพื่อทำการจองเวลา<br></p>
              <form id="form1" name="form1" method="post" action="bookingtime/checkuser2.php">
              <div class="bg left">               
                    <input class="input input1" type="text" id="txtUsername" name="txtUsername" value="Enter user ID here"	onblur="if(this.value=='') this.value='Enter user ID here'" onFocus="if(this.value =='Enter user ID here' ) this.value=''" />
                </div>
                  <div class="bg left">
                	<input class="input input1" type="password" id="txtPassword" name="txtPassword" value="••••••••••" onBlur="if(this.value=='') this.value='••••••••••'" onFocus="if(this.value =='••••••••••' ) this.value=''"	 />
                  </div></form>
              <a href="#" class="button" onClick="document.getElementById('form1').submit()" class="button"><span><span>Login</span></span></a> <img src="bookingtime/images/img1.png" class="img" alt=""> </div>
              
          </div>
          <div class="box1_bot">
            <div class="box1_bot_left">
              <div class="box1_bot_right"></div>
            </div>
          </div>
        </article>
        
        <article class="col1 pad_left1">
          <div class="box1_out">
            <div class="box1">
              <h2>Download User Manual</h2>
              <p class="pad_bot1"> ดาวโหลดวิธีใช้งานระบบจองเวลา<br>
              <p><br><p></p>
              <a href="bookingtime/images/011.pdf" class="button"><span><span>Download</span></span></a> <img src="bookingtime/images/img2.png" class="img" alt=""> </div>
          </div>
          <div class="box1_bot">
            <div class="box1_bot_left">
              <div class="box1_bot_right"></div>
            </div>
          </div>
        </article>
        
        <article class="col1 pad_left1">
          <div class="box1_out">
            <div class="box1">
              <h2>All Seat</h2>
              <p class="pad_bot1">แสดงที่นั่งทั้งหมด <br>
              <p><br><p><br><br></p>
              <a href="#" class="button"><span><span>All Seat</span></span></a> <img src="bookingtime/images/img3.png" class="img" alt=""> </div>
          </div>
          <div class="box1_bot">
            <div class="box1_bot_left">
              <div class="box1_bot_right"></div>
            </div>
          </div>
        </article>
       <div id="dialog-modal" title="">
  <img src="bookingtime/images/booktime.png" width="550px" height="391px"/>
</div>
</body>
</html>