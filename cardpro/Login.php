<?

//include("config.inc.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง</title>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link rel="stylesheet" type="text/css" href="css/default.css"/>

</head>

<body>

<!-- START PAGE SOURCE -->

<div id="container">

  <div id="header"><!--  <a href="#"><img src="images/logo01.png" alt="" class="logo"/><img src="images/header.jpg" alt="" class="logo"/></a> -->

    <!--<ul id="toplinks">

      <li><a href="#">Control Panel</a></li>

      <li><a href="#">Webmail Login</a></li>

    </ul>-->

  </div>

  <div id="nav">

    <ul>

      <li><a href="Login.php">หน้าแรก test</a></li>

    <!--  <li><a href="hosting.html">Hosting</a></li>

      <li><a href="content.html">Domain Names</a></li>

      <li><a href="#">Latest News</a></li>

      <li><a href="#">About Us</a></li>-->

     <li><a href="http://aj-tongmath.com/ExamManag/index.php">ระบบจัดการข้อสอบ</a></li>

      <li><a href="http://aj-tongmath.com/Managapp2/index.php">ระบบจัดการแอฟ</a></li>

    </ul>

    <!--<ul class="right">

      <li><a href="#"><strong>Order Now</strong></a></li>

      <li><a href="#">View Basket</a></li>

    </ul>-->

  </div>

  <div id="topbox">

   <!-- <div id="tbleft">

      <h4>Domain Search</h4>

      <form method="post" action="#">

        <input type="text" name="domain" value="" />

        <select name="tld" class="tld">

          <option value="">( all )</option>

          <option value=".co.uk">.co.uk</option>

          <option value=".com">.com</option>

          <option value=".eu">.eu</option>

          <option value=".net">.net</option>

        </select>

        <input name="search" type="submit" class="btn" value="search" />

      </form>

    </div>-->

    <div id="tbright">

      <h4>เข้าสู่ระบบ</h4>

      <form method="post" action="checkuser.php">

        <div id="boxleft">

          <p>

            <label for="username">Username:</label>

            <input type="text" name="txtUsername"  value="" id="username" />

          </p>

          <p>

            <label for="password">Password:</label>

            <input type="password" name="txtPassword" value="" id="password" />

          </p>

        </div>

        <div id="boxright">

          <input name="submit" type="submit" class="btn" value="เข้าสู่ระบบ" style="position: relative;"/>

        <!--  <p class="link"><a href="#">Forgotten your Password?</a></p>-->

        </div>

      </form>

    </div>

  </div>

  <!--<ul id="promobox">

    <li>

      <h3>Web Hosting</h3>

      <div class="pricebox">

        <p>From Only</p>

        <p class="lrg">&pound;6.99</p>

      </div>

      <ul>

        <li>2,000 MB Diskspace</li>

        <li>20 GB Bandwidth</li>

        <li>1,000 Mail Boxes</li>

        <li>10 MySQL Databases</li>

        <li>Website Builder Plus</li>

        <li>Free &amp; Fast Support</li>

        <li>Powerful Control Panel</li>

        <li>30-Day Money Back Guarantee</li>

      </ul>

      <p><a href="#">Order Now</a></p>

      <p><a href="#">More Info</a></p>

    </li>

    <li class="two">

      <h3>Domains</h3>

      <div class="pricebox">

        <p>From Only</p>

        <p class="lrg">&pound;5.99</p>

      </div>

      <ul>

        <li>Powerful Web Forwarding</li>

        <li>Unlimited email Forwarding</li>

        <li>Catch-All Forwarding</li>

        <li>Domain "For Sale" Page</li>

        <li>Easy-To-Use Homepage Creator</li>

        <li>Change Nominet Tag</li>

        <li>Change Name Servers</li>

        <li>Manage Everything Online</li>

      </ul>

      <p><a href="#">Order Now</a></p>

      <p><a href="#">More Info</a></p>

    </li>

    <li class="three">

      <h3>Add-Ons</h3>

      <div class="pricebox">

        <p>From Only</p>

        <p class="lrg">&pound;4.99</p>

      </div>

      <ul>

        <li>Website Builder Plus</li>

        <li>Search Engine Submission Extreme</li>

        <li>Domain Mappings</li>

        <li>Virus Scanning</li>

        <li>Personalised Secure Server</li>

        <li>Email SMS Notifications</li>

        <li> Web Design</li>

        <li>Custom Programming</li>

      </ul>

      <p><a href="#">Order Now</a></p>

      <p><a href="#">More Info</a></p>

    </li>

  </ul>-->

  <!--<div id="newsbox"> <a href="#"><img src="images/icon_rss.png" alt="" class="right"/></a>

    <p class="rss"><a href="#">Keep Updated</a></p>

    <h5>Latest News</h5>

    <ul>

      <li>

        <h6><a href="#">News story title would go here</a></h6>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

      </li>

      <li>

        <h6><a href="#">News story title would go here</a></h6>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

      </li>

      <li>

        <h6><a href="#">News story title would go here</a></h6>

        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>

      </li>

    </ul>

  </div>-->

  <!--<div id="quotes">

    <h3>Customer Quotes</h3>

    <p>What our customer think of our service</p>

    <ul>

      <li>"Amazing Technical Support"</li>

      <li>"You replied to my support ticket in 10 Minutes"</li>

      <li>"Your prices are the best around"</li>

      <li>"My Account was setup instantly"</li>

    </ul>

    <p><a href="#">Read more customer testimonials</a></p>

  </div>

</div>-->

<!--<div id="footer">

  <p class="left">Copyright &copy; 2010 <a href="#">Domain Name</a> - All Rights Reserved</p>-->

  <!--<p class="right"><a href="http://all-free-download.com/free-website-templates/">Free CSS Templates</a> by <a href="http://www.heartinternet.co.uk/reseller-hosting/reseller-hosting-resources.html">Reseller Hosting</a></p>-->

  <div style="clear:both;">&nbsp;</div>

</div>

<!-- END PAGE SOURCE -->

</div></body>

</html>