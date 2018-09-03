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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<script type="text/javascript" src="js/jquery-1.11.2.min.js" ></script>
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
  <title>ระบบจัดการข้อสอบ S.E.L.E</title>
</head>

<script language="JavaScript">
	function chkdel(){
		if(confirm('  กรุณายืนยันการลบอีกครั้ง !!!  ')){
			return true;
		}else{
			return false;
		}
	}
</script>
<body>
  <div class="page-container">
    <div class="header">
      <div class="header-middle">    
        <a class="sitelogo" href="#" title="Go to Start page"></a>
        <div class="sitename">
          <h1><a href="index.html" title="Go to Start page"><img src="img/Logo.png" width="397" /></a></h1>
        </div>
        <div class="nav1">
        </div>              
      </div>
      <div class="header-bottom">
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
         <ul>
            <li><a href="Score_Manag.php">จัดการคะแนนสอบ</a></li>
         </ul>
        </div>
	  </div>
      <div class="header-breadcrumbs">
      </div>
  </div>
    <div class="main">
      <div class="main-content">
        <h1 class="pagetitle">สร้างข้อสอบ</h1>
        <h1 class="block">1 - สร้างข้อสอบ</h1>
        <div class="contactform">
            <form method="POST" action="Exam_Manag_Subj_INSERT.php">
              <fieldset><legend>&nbsp;+สร้างวิชา&nbsp;</legend><br>
              
                  <p><label for="contact_firstname" class="left">ชื่อ(add)วิชาข้อสอบ:</label>
                  <input name="name" id="name" class="field" value="" style="width:220px"/></p>
                  
                  <p><label for="contact_firstname" class="left">รหัสวิชา:</label>
                  <input name="subcode" id="subcode" class="field" value="" style="width:100px"/></p>
                  
              	  <p>
                  <input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" /><input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='index.php'" /></p>
             </fieldset>
            </form>
          </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
    </div>      
  </div> 
</body>
<script type="text/javascript">

function autocom(autoObj,showObj){
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
		return "autocomplete/data_sch_subject.php?q=" +encodeURIComponent(this.value);
    });	
}	
autocom("name_sub","id_sub");

</script>
</html>

<?php } ?>