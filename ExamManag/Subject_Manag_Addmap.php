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
	
	$strSQL_Sub = "SELECT * FROM subject WHERE subid = '".$_GET["subid"]."'";
	$objQuery_Sub = mysql_query($strSQL_Sub) or die ("Error Query [".$strSQL_Sub."]");
	$objResult_Sub = mysql_fetch_array($objQuery_Sub);
	
	/*$strSQL_ex_setSn = "SELECT * FROM ex_set WHERE id_subject = '".$_GET["id_subject"]."'";
	$objQuery_ex_setSn = mysql_query($strSQL_ex_setSn) or die ("Error Query [".$strSQL_ex_setSn."]");
	$objResult_ex_setSn = mysql_fetch_array($objQuery_ex_setSn);
	
	$str_ex_subject = "SELECT * FROM ex_subject WHERE id = '".$objResult_ex_setSn["id_subject"]."'";
	$objQuery_ex_subject = mysql_query($str_ex_subject);
	$objResult_ex_subject = mysql_fetch_array($objQuery_ex_subject);
	
	$str_subject = "SELECT * FROM subject WHERE subid = '".$objResult_ex_subject["subid"]."'";
	$objQuery_subject = mysql_query($str_subject);
	$objResult_subject = mysql_fetch_array($objQuery_subject);*/
	
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

$strSQL_ex_set .=" ORDER BY last_update DESC LIMIT $Page_Start , $Per_Page";
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
  <script type="text/javascript" src="autoserch/autocomplete.js"></script>
  <link rel="stylesheet" href="autoserch/autocomplete.css"  type="text/css"/>
  <title>ระะบบจัดการข้อสอบ S.E.L.E</title>
</head>
<script>
  $(function() {
    $( "#slider" ).slider({
		
      value:0,
     	min: 0,
		max: 1440,
		step: 1,
      slide: function( event, ui ) {
		  	var hours = Math.floor(ui.value / 60);
			var minutes = ui.value - (hours * 60);
			if(hours.length == 1){hours = '0' + hours};
			if(minutes.length == 1){minutes = '0' + minutes};
			if(minutes==0){minutes = '00'};
			$('#amount').val( hours+':'+ minutes);
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
        <h1 class="block">1 - เพิ่มข้อสอบในวิชา</h1>
        <?
		$str_ex_subject2 = "SELECT * FROM ex_subject WHERE id = '".$_GET["id_subject"]."'";
		$objQuery_ex_subject2 = mysql_query($str_ex_subject2);
		$objResult_ex_subject2 = mysql_fetch_array($objQuery_ex_subject2); 
		?>
		<div class="column1-unit">
          <div class="contactform">
            <form method="post" action="Subject_Manag_Addmap_Insert.php">
              <fieldset>
                <legend>&nbsp;+สร้างชุดข้อสอบ
              </legend>
              <p><label for="contact_familyname" class="left">ชื่อวิชา:</label>
              <?=$objResult_Sub["subname"];?></p>
              <p><label for="contact_familyname" class="left">รหัสวิชา:</label>
              <?=$objResult_Sub["code"];?></p>
              <p><label for="contact_familyname" class="left">ปี:</label>
              <?php
				$str_addterm = "SELECT * FROM addtrem WHERE idaddterm = '".$objResult_Sub["idaddterm"]."'";
				$objQuery_addterm = mysql_query($str_addterm);
				$objResult_addterm = mysql_fetch_array($objQuery_addterm);
				
				$str_year = "SELECT * FROM year WHERE idyear = '".$objResult_addterm["idyear"]."'";
				$objQuery_year = mysql_query($str_year);
				$objResult_year = mysql_fetch_array($objQuery_year);
				echo $objResult_year["nameyear"];
				
            ?></p>
              <p><label for="contact_familyname" class="left">เทอม:</label>
               <?php
				$str_term = "SELECT * FROM term WHERE idterm = '".$objResult_addterm["idterm"]."'";
				$objQuery_term = mysql_query($str_term);
				$objResult_term = mysql_fetch_array($objQuery_term);
				echo $objResult_term["nameterm"];
            ?></p>
              <p><label for="contact_familyname" class="left">เพิ่มชุดข้อสอบ:</label>
              <input name="show_arti_topic" type="text" id="show_arti_topic" size="35" value="" />*ค้นหาชุดข้อสอบที่ต้องการ 
              <input name="h_arti_id1" type="hidden" id="h_arti_id1" value="" />
              <input name="subid" type="hidden" id="subid" value="<?=$_GET["subid"]?>" />
              </p>
              
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='Subject_Manag_Showall.php'" /></p>
              </fieldset>
            </form>
          </div>              
        </div> 
       <h1 class="block">2 - ตารางชุดข้อสอบทั้งหมด วิชา <? echo $objResult_Sub["subname"].$objResult_Sub["code"];?></h1>
       
     	
        <div class="column1-unit">
          <table width="100%">
            <tr>
            <th width="7%" class="top" scope="col"><center>ลำดับที่</center></th>
            <th width="32%" class="top" scope="col"><center>ชื่อวิชาข้อสอบ</center></th>
            <th width="11%" class="top" scope="col"><center>จำนวนชุด</center></th>
            <th width="11%" class="top" scope="col"><center>อัพเดจ</center></th>
            <th width="7%" class="top" scope="col"><center>ลบ</center></th>
            </tr>
            
            <?php
				$num = 0;
				$str = "SELECT *
						FROM  ex_mapexam
						JOIN  ex_subject ON ex_mapexam.id_subjex = ex_subject .id
						WHERE ex_mapexam.subid  = '".$_GET['subid']."'
						ORDER BY ex_mapexam.id_map DESC";
				$objQuery = mysql_query($str);
				$Num_Rows = mysql_num_rows($objQuery); 
				while($objResult_Sub1 = mysql_fetch_array($objQuery)){
				$num++;
            ?>
			<tr>
            <td><center><?=$num+(($Page-1)*$Per_Page);?></center></td>
            <th scope="row"><a href="Subject_Manag_Show_Set.php?id_subject=<?=$objResult_Sub1["id_subjex"];?>&subid=<?=$_GET['subid'];?>"><?=$objResult_Sub1["name"];?></a></th>
           
            <?
				$str_ex_num = "SELECT * FROM ex_set WHERE id_subject = '".$objResult_Sub1["id_subjex"]."'";
				$objQuery_num = mysql_query($str_ex_num);
				$numset = mysql_num_rows($objQuery_num); 
			?>
            <td><center><?=$numset;?></center></td>
            <td><center><?=$objResult_Sub1["last_update"];?></center></td>
            <td><center><a href="Subject_Manag_Addmap_Delete.php?id_map=<?=$objResult_Sub1["id_map"];?>&action=del&subid=<?=$objResult_Sub['subid'];?>"><img src="img/115.png" width="25" height="25" class="center"/></a></center></td></tr>
            
            <?php }
		  	if(!$Num_Rows){
			?>
            <tr><td colspan="6">
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

          
           <p> <input type="button" name="" id="" class="button" value="กลับ" onClick="window.location='Subject_Manag_Showall.php'" style="float:right; width:9.0em; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;" /></p>
     
        
      
      </div>
    </div>
      
    <!-- C. FOOTER AREA -->      

    <div class="footer">
      <p>Copyright &copy; 2007 Your Company | All Rights Reserved</p>
      
    </div>      
  </div> 
<script type="text/javascript">
function make_autocom(autoObj,showObj){
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
		return "data.php?q=" +encodeURIComponent(this.value);
    });	
}
	

// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id1");
</script>

</body>
</html>
<?php } ?>


