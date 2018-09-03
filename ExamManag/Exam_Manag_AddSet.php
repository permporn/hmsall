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
	
	$strSQL_ex_setSn = "SELECT * FROM ex_set WHERE id_subject = '".$_GET["id_subject"]."'";
	$objQuery_ex_setSn = mysql_query($strSQL_ex_setSn) or die ("Error Query [".$strSQL_ex_setSn."]");
	$objResult_ex_setSn = mysql_fetch_array($objQuery_ex_setSn);
	
	$str_ex_subject = "SELECT * FROM ex_subject WHERE id = '".$objResult_ex_setSn["id_subject"]."'";
	$objQuery_ex_subject = mysql_query($str_ex_subject);
	$objResult_ex_subject = mysql_fetch_array($objQuery_ex_subject);
	
	$str_subject = "SELECT * FROM subject WHERE subid = '".$objResult_ex_subject["subid"]."'";
	$objQuery_subject = mysql_query($str_subject);
	$objResult_subject = mysql_fetch_array($objQuery_subject);
	
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		//$strHour= date("H",strtotime($strDate));
		//$strMinute= date("i",strtotime($strDate));
		//$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		//return "$strDay $strMonthThai $strYear, $strHour:$strMinute";
		return "$strDay $strMonthThai $strYear";
	}

//แบ่งหน้า	
if($_GET["field2"] != ""){
		$strSQL_ex_set = "SELECT * FROM ex_set WHERE (name_set LIKE '%".$_GET["field2"]."%') AND id_subject = '".$_GET["id_subject"]."'";
		$objQuery_ex_set = mysql_query($strSQL_ex_set) or die ("Error Query [".$strSQL_ex_set."]");
	}else{
		$strSQL_ex_set = "SELECT * FROM ex_set WHERE id_subject = '".$_GET["id_subject"]."'";
		$objQuery_ex_set = mysql_query($strSQL_ex_set) or die ("Error Query [".$strSQL_ex_set."]");
	}

$Num_Rows = mysql_num_rows($objQuery_ex_set);
$Per_Page = 50;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}

$strSQL_ex_set .=" ORDER BY id_set DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL_ex_set);	

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
       <!--<br />
        <h1 class="pagetitle">จัดการชุดข้อสอบ วิชา<?=$objResult_ex_subject["name"];?>(<?=$objResult_ex_subject["subid"];?>)</h1>-->
		<!-- Content unit - One column -->
        <h1 class="block">1 - สร้างชุดข้อสอบ</h1>
        <?
		$str_ex_subject2 = "SELECT * FROM ex_subject WHERE id = '".$_GET["id_subject"]."'";
		$objQuery_ex_subject2 = mysql_query($str_ex_subject2);
		$objResult_ex_subject2 = mysql_fetch_array($objQuery_ex_subject2); 
		?>
		<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="Exam_Manag_AddSet_Insert.php?id_subject=<?=$_GET["id_subject"]?>">
              <fieldset>
                <legend>&nbsp;+สร้างชุดข้อสอบ
              </legend>
              <p><label for="contact_familyname" class="left">ชื่อวิชา:</label>
              <?=$objResult_ex_subject2["name"];?></p>
              <p><label for="contact_familyname" class="left">ชื่อชุดข้อสอบ:</label>
              <input type="text" name="name_set" id="name_set" class="field" value="" tabindex="1" /></p>
              <p><label for="" class="left">ประเภทข้อสอบ:</label>
              <select name="type_answer" id="type_answer" class="combo">
                     <option selected="selected" value=""> เลือก </option>
                     <option value="1">ตัวเลือก</option>
                     <option value="2">ข้อเขียน</option>
              </select>
              <input type="checkbox" name="status_finaltest" id="status_finaltest" value="1">
              <span class="left">ข้อสอบชุดสุดท้าย</span><br>
              </p>
              <!--<p><div class="slider2"> *เลื่อนเวลาที่ต้องการ</div><div id="slider" class="slider"></div></p> 
              <p><label for="amount" class="left">เวลาที่ใช้ทำ:</label>
              <input type="text" id="amount" name="time_use"  class="field" value="" tabindex="1" style="width:60px" > ชั่วโมง</p>-->
			  <p><label for="contact_country" class="left">เกณฑ์การผ่าน:</label>
              <input type="text" name="standard" id="standard" class="field" value="" tabindex="1" style="width:50px" /> คะแนน </p>
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='Exam_Manag_ShowAll.php'" /></p>
              </fieldset>
            </form>
          </div>              
        </div> 
       
       
       <h1 class="block">2 - ตารางชุดข้อสอบ</h1>
       <div class="contactform">
          <form method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
            
             <fieldset ><legend>&nbsp;+ ค้นหา (ชื่อวิชา)&nbsp;</legend>
             <p><label for="contact_familyname" class="left">ค้นหาวิชา:</label>
             	<input name="field2" class="field"  value="<?=$_GET["field2"]?>" />
              	<input type="hidden" value="<?=$_GET["id_subject"]?>" name="id_subject" id="id_subject" />
              	<input type="submit" name="button" class="button" value="ค้นหา" /></p>
            </fieldset>
          </form>
        </div>
     	
        <div class="column1-unit">
          <table width="100%">
            <tr>
            <th width="6%" class="top" scope="col"><center>
              ลำดับ
            </center></th>
            <th width="18%" class="top" scope="col"><center>ชื่อชุดข้อสอบ</center></th>
            <th width="13%" class="top" scope="col"><center>วันที่อัพเดท</center></th>
            <th width="8%" class="top" scope="col"><center>จำนวนข้อ</center></th>
            <th width="7%" class="top" scope="col"><center>สถานะ</center></th>
            <th width="7%" class="top" scope="col"><center>เพิ่มข้อสอบ</center></th>			
            <th width="7%" class="top" scope="col"><center>แก้ไข</center></th>		
            <th width="7%" class="top" scope="col"><center>ลบ</center></th>
            </tr>
            
            <?php 
				$num = 0; 
				while($objResult_ex_set = mysql_fetch_array($objQuery)){
				$num++;
			?> 
            
            <tr>
            <td style="white-space:nowrap;"><center><?=$num+(($Page-1)*$Per_Page);?></center></td>
            <th scope="row" style="white-space:nowrap;"><a href="exammanag.php?id_set=<?=$objResult_ex_set["id_set"];?>"><?=$objResult_ex_set["name_set"];?></a></th>
            <td><center>
            <?php
				//$strDate = "2008-08-14 13:42:44";
				$strDate = $objResult_ex_set["last_update"];
				echo DateThai($strDate);
			?>
			</center></td>
            <td style="white-space:nowrap;"><center>
            <?php
				$numSet = 0;
				$str_NumSet = "SELECT * FROM ex_question WHERE id_set = '".$objResult_ex_set["id_set"]."'";
				$objQuery_NumSet = mysql_query($str_NumSet);
				while($objResult_NumSet = mysql_fetch_array($objQuery_NumSet)){
					$numSet++;
				}
				echo $numSet." ข้อ";
			?></center></td>
            <td style="white-space:nowrap;"><center><a href="Exam_Manag_AddSet_del&ch_st.php?id_set=<?=$objResult_ex_set["id_set"]?>&id_subject=<?=$objResult_ex_set["id_subject"]?>&action=Ch_St">
			<?php
            	if($objResult_ex_set["status_set"]=="1"){
					echo "เปิด";
				}else{
					echo "ปิด";
				}
			?></a></center></td>
            <td style="white-space:nowrap;"><center>
            <a href="<?php if($objResult_ex_set["type_answer"]=="1"){?>addquestionChoice.php<?php }else{ ?>addquestionWrite.php<?php }?>?id_set=<?=$objResult_ex_set["id_set"];?>"><img src="img/8.png" width="25" height="25" class="center"/></a>
            </center></td>
            <td style="white-space:nowrap;"><center><a href="Exam_Manag_AddSet_Edit.php?id_set=<?=$objResult_ex_set["id_set"]?>&id_subject=<?=$objResult_ex_set["id_subject"]?>"><img src="img/2.png" width="25" height="25"class="center" /></a></center></td>
            <td style="white-space:nowrap;"><center><a href="Exam_Manag_AddSet_del&ch_st.php?id_set=<?=$objResult_ex_set["id_set"]?>&id_subject=<?=$objResult_ex_set["id_subject"]?>&action=del"><img src="img/115.png" width="20" height="20" OnClick="return chkdel();" class="center"/></a></center></td></tr>
            
          <?php }
		  	if(!$Num_Rows){
			?>
            <tr><td colspan="10">
            <center><font color="#FF0000">ไม่พบข้อมูล</font></center>
            </td></tr>
            <?php } ?>  
          </table>                            

<p>Total <?= $Num_Rows;?> Record :<?=$Num_Pages;?> Page :
<?
if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{
		echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a> ";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>Next>></a> ";
}
/*mysql_close($objConnect);*/
?></div>

          
           <p> <input type="button" name="" id="" class="button" value="กลับ" onClick="window.location='Exam_Manag_ShowAll.php'" style="float:right; width:9.0em; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;" /></p>
     
        
      
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


