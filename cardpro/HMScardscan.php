<? 
ob_start();
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link type="text/css" href="menutest/menu.css" rel="stylesheet" />
<script type="text/javascript" src="menutest/menu.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery1.11.1.min.js" type="text/javascript"></script>-->
<head>
<? include("script_link.php");?>
<script>
  $(function() {
    $( "#dialog" ).dialog({
      autoOpen: false,
      show: {
        effect: "blind",
        duration: 500
      },
      hide: {
        effect: "explode",
        duration: 200
      },
	  width: 500
    });
	
    $( "#opener" ).click(function() {
		$('#idcard_textbox').val('');
      $( "#dialog" ).dialog( "open" );
    });
  });
  
  $(document).keypress(function(event){
	  var keycode = (event.keyCode ? event.keyCode : event.which);
	  var id_card = $('#idcard_textbox').val();
	  if(keycode == '13'){
		  window.location.href = 'HMS_CardDetail.php'+'?id_card='+id_card;
	  }
  });

</script>
</head>

<body>
<!-- START PAGE SOURCE -->
<div id="container">
<div id="header"> <a href="#"><img src="images/logo01.png" alt="" class="logo"/><img src="images/header.jpg" alt="" class="logo"/></a>
    <ul id="toplinks">
      <li><font style="font-size:14px"><img src="images/Yellow tag.png"/> Status: <?=$objResultSTT["status"];?>
	  <li><font style="font-size:14px"><img src="images/user.png"/> Welcome: 
	  <?
	  	if($_SESSION["db"] == "school"){echo $objResultSTT["name"];}
		else if($_SESSION["db"] == "selfdb"){echo $objResultSTT["stname"];}
	  ?></font></li>
      <br />
      <li><font style="font-size:14px" ><a href="logout.php">ออกจากระบบ</a></font></li>
    </ul>
    </ul>
  </div>


<div id="menu">
    <ul class="menu">
    	<li><a href="index.php"><span>หน้าแรก</span></a>
        	<div><ul>
            <li><a href="even.php"><span>แจ้งข่าวสาร</span></a></li>
            </ul></div>
        </li>
         	<li><a href="#" class="parent"><span>สด และ DVD</span></a>
            	<div><ul>
					<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                    <li><a href="#" class="parent"><span>Import Excel</span></a>
                        <div><ul>
                            <li><a href="testImportExcel/upload.php?type=addstu"><span>ดึงไฟล์ธนาคาร</span></a></li>
                            <li><a href="testImportExcel/upload.php?type=addsubj"><span>ดึงไฟล์วิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                	<? } ?>
                    <li><a href="home.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="student_detail_search.php"><span>ค้นหารายชื่อ</span></a></li>
                            <li><a href="home.php"><span>ทะเบียนนักเรียน</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="exam.php"><span>คะแนนสอบ</span></a></li>
                    <li><a href="#" class="parent"><span>จัดการข้อมูล</span></a>
                        <div><ul>
                            <li><a href="subject.php"><span>จัดการข้อมูลวิชา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                            <li><a href="manageall.php"><span>จัดการข้อมูลอื่นๆ</span></a></li>
                            <? }?>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="price.php"><span>ยอดแต่ละสาขา</span></a></li>
                            <!--<li><a href="results_request.php"><span>ยอดใบคำร้อง</span></a></li>-->
                        </ul></div>
                    </li>
               		<? }?>
                	
            	</ul></div>
            </li>
            <li><? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="7" /*or $objResultSTT["accid"]=="13" or $objResultSTT["accid"]=="14" or $objResultSTT["accid"]=="23" or $objResultSTT["accid"]=="29"*/ || $objResultSTT["status"]=="admin") {?>
                	<a href="endorsee_home.php" ><span>ใบคำร้อง</span></a>
                    <div><ul>
                           <li><a href="results_request.php"><span>ยอดใบคำร้อง</span></a></li>
                    </ul></div>
                	<? }else{?>
                	<a href="user_home.php"><span>ใบคำร้อง</span></a>
                	<? } ?>
             </li>
            
       		<li><a href="self/searchstudent.php" class="parent"><span>SELF</span></a>
            	<div><ul>
                    <li><a href="self/searchstudent.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="self/searchstudent.php"><span>ค้นหาข้อมูลนักเรียน</span></a></li>
                            <!--<li><a href="self/addstudent.php"><span>เพิ่มนักเรียนใหม่</span></a></li>-->
                            <li><a href="self/manageaccount.php"><span>เพิ่ม account</span></a></li>
                            <li><a href="self/shirt_search.php"><span>รับเสื้อนักเรียน</span></a></li>
                            <li><a href="self/book_search.php"><span>รับหนังสือ</span></a></li>
                            <li><a href="self/credit_time_search.php"><span>ขยายเวลา/เพิ่มเครดิต(free)</span></a></li>
                            <li><a href="self/credit_time_search2.php"><span>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</span></a></li>
                            <li><a href="self/exp.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <li><a href="self/trial.php"><span>ชดเชยระบบ S.E.L.F</span></a></li>
                        </ul></div>
                    </li>
                	<li><a href="self/coursemanage.php" class="parent"><span>วิชาเรียน</span></a>
                        <div><ul>
                        	 <li><a href="self/coursemanage.php"><span>จัดการวิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>คะแนนสอบ</span></a>
                        <div><ul>
                             <li><a href="self/addscore.php"><span>คะแนนตามรายวิชา</span></a></li>
                            <li><a href="self/studentaddscore.php"><span>คะแนนตามรายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>ที่นั่งself</span></a>
                        <div><ul>
                            <li><a href="self/viewseat.php"><span>ดูจำนวนที่นั่ง</span></a></li>
                            <li><a href="self/seat.php"><span>จองเวลา</span></a></li>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["accid"]=="7") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="self/results_account.php"><span>ยอด account self</span></a></li>
                        </ul></div>
                    </li>
                    <? }?>
                	<li><a href="self/manageaccount_day.php" class=""><span> self after school</span></a></li>
            	</ul></div>
        	</li>
            <li><a href=""><span><img src="images/icn_new.gif"/>HMS CARD</span></a>
                <div><ul>
                <!--<li><a><div id="opener"><span><strong>HMS CARD สแกน</strong></span></div></a></li>-->
                <li><a href="HMS_student.php"><span>ค้นหาชื่อสมาชิกบัตร</span></a></li>
                <li><a href="HMS_regiscard.php"><span>สมัครบัตรHMS</span></a></li>
				<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin") {?>
                <li><a href="HMS_PrintCardAll.php"><span>พิมพ์บัตรHMS</span></a></li>
                <? } ?>
                </ul></div>
        	</li>
</ul>
        
</div>
<div id="content">
<div id="dialog" title="สแกนบัตร" align="center"><img src="images/taaaa.png" width="400"/>
	<input id="idcard_textbox" type="text" size="40" />
</div>
<br /><br /><br />
<div id="opener" align="center">
	<img src="images/taaaa2.png" width="300"/>
</div>

</html>
<?php mysql_close();?>
