<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php 
session_start();
include ('config.php');

if($_SESSION["stid"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	
	$strSQL_ex_setSn = "SELECT * FROM ex_set WHERE id_set = '".$_GET["id_set"]."'";
	$objQuery_ex_setSn = mysql_query($strSQL_ex_setSn) or die ("Error Query [".$strSQL_ex_setSn."]");
	$objResult_ex_setSn = mysql_fetch_array($objQuery_ex_setSn);
	
	$str_ex_subject = "SELECT * FROM ex_subject WHERE id = '".$objResult_ex_setSn["id_subject"]."'";
	$objQuery_ex_subject = mysql_query($str_ex_subject);
	$objResult_ex_subject = mysql_fetch_array($objQuery_ex_subject);
	
	$str_subject = "SELECT * FROM subject WHERE subid = '".$objResult_ex_subject["subid"]."'";
	$objQuery_subject = mysql_query($str_subject);
	$objResult_subject = mysql_fetch_array($objQuery_subject);

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
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout1_setup.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="./css/layout1_text.css" />
  <link rel="icon" type="image/x-icon" href="./img/logo2.png" />
  <link rel="stylesheet" href="js/jquery-ui.css">
  <script src="js/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui.js"></script>
  <link rel="stylesheet" href="js/style.css">
  <title>ระะบบจัดการข้อสอบ S.E.L.E</title>
</head>
<script>
  $(function() {
    $( "#slider" ).slider({
		
      value:0,
     	min: 0,
		max: 1440,
		step: 5,
      slide: function( event, ui ) {
		  	var hours = Math.floor(ui.value / 60);
			var minutes = ui.value - (hours * 60);
			
			var HL = hours;
			var ML = minutes;
			if(hours.length  == 1){hours = '0' + hours};
			if(hours == 0){hours = '0' + hours};
			if(minutes.length == 1){minutes = '0' + minutes};
			if(minutes == 0){minutes = '00'};
			
			$('#amount').val( hours+':'+ minutes+':00');
      }
    });
    $( "#amount" ).val($( "#slider" ).slider( "value" ) );
  });
  
  
  </script>

<body>
  <!-- Main Page Container -->
  <div class="page-container">

   <!-- For alternative headers START PASTE here -->

    <!-- A. HEADER -->      
    <div class="header">
      
      <!-- A.1 HEADER MIDDLE -->
      <div class="header-middle">    
   
        <!-- Sitelogo and sitename -->
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="index.html" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
          
        </div>
        <div class="nav1">
        </div>              
      </div>
      
      <!-- A.2 HEADER BOTTOM -->
      <div class="header-bottom">
      
        <!-- Navigation Level 2 (Drop-down menus) -->
        <div class="nav2">
	
          <ul>
            <li><a href="index.php">หน้าแรก</a></li>
         </ul>
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
                  
        </div>
	  </div>

  </div>
    <div class="main">
      <div class="main-content">
        
        <!-- Pagetitle -->
       
        <h1 class="pagetitle">จัดการชุดข้อสอบ วิชา<?=$objResult_ex_subject["name"];?>(<?=$objResult_subject["code"];?>)</h1>
		<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="Exam_Manag_AddSet_Insert.php?id_subject=<?=$_GET["id_subject"]?>&action=update&id_set=<?=$objResult_ex_setSn["id_set"]?>">
              <fieldset>
                <legend>&nbsp;+แก้ไขชุดข้อสอบ
              </legend>
              <p><label for="contact_familyname" class="left">ชื่อชุดข้อสอบ:</label>
              <input type="text" name="name_set" id="name_set" class="field" value="<?=$objResult_ex_setSn["name_set"]?>" tabindex="1" /></p>
              <p><label for="" class="left">ประเภทข้อสอบ:</label>
                   <select name="type_answer" id="type_answer" class="combo">
                     <option selected="selected" value="<?=$objResult_ex_setSn["type_answer"]?>"><? if($objResult_ex_setSn["type_answer"] == "1"){echo "ตัวเลือก";}else if($objResult_ex_setSn["type_answer"] == "2"){echo "ข้อเขียน";}?></option>
                     <option value="1">ตัวเลือก</option>
                     <option value="2">ข้อเขียน</option>
                   </select>
                   <input type="checkbox" name="status_finaltest" id="status_finaltest" value="1" <? if($objResult_ex_setSn['status_finaltest']=='1'){?>checked="checked"<? }?>>
              	   <span class="left">ข้อสอบชุดสุดท้าย</span><br>
              </p>
              <!--<p><div class="slider2"> *เลื่อนเวลาที่ต้องการ</div><div id="slider" class="slider"></div></p> 
              <p><label for="amount" class="left">เวลาที่ใช้ทำ:</label>
              <input type="text" id="amount" name="time_use"  class="field" value="<?=$objResult_ex_setSn["time_use"]?>" tabindex="1" style="width:50px" readonly> ชั่วโมง </p>-->
              
              <!--<p><label for="contact_country" class="left">เวลาที่ใช้ทำ:</label>
              <input type="text" name="time_use" id="time_use" class="field" value="<?=$objResult_ex_setSn["time_use"]?>" tabindex="1" style="width:100px" /> นาที </p>-->
              
              <p><label for="contact_country" class="left">เกณฑ์การผ่าน:</label>
              <input type="text" name="standard" id="standard" class="field" value="<?=$objResult_ex_setSn["standard"]?>" tabindex="1" style="width:50px" /> คะแนน </p>
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='Exam_Manag_AddSet.php?id_subject=<?=$_GET["id_subject"]?>'" /></p>
             
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


