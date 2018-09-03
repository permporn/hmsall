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
  <title>ระะบบจัดการข้อสอบ S.E.L.E</title>
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

      <!-- A.3 HEADER BREADCRUMBS -->

      <!-- Breadcrumbs -->
      
  

  <!-- END COPY here -->

  </div>
    <div class="main">
      <div class="main-content">
        
       <h1 class="block">1 - ข้อสอบ</h1>
     	<div class="column1-unit">
         
          <div class="contactform2">
            <p><label for="contact_firstname" class="left">วิชาและรหัสวิชา</label>
              วิชา
              <?=$objResult_ex_subject["name"];?>(<?=$objResult_subject["code"];?>)</p>
              <p><label for="contact_familyname" class="left">ชุดข้อสอบ : </label>
              <?=$objResult_ex_setSn["name_set"];?></p>
         
            <form method="post" action="index.php">
          <table width="100%">
            <tr>
                <th width="5%" class="top" scope="col"><center>
                  ข้อที่
                </center></th>
                <th width="56%" class="top" scope="col"><center>โจทย์</center></th>
                <th width="11%" class="top" scope="col"><center>วันที่อัพเดท</center></th>
                
            </tr>
            <?
				$num = 0;
				$strSQL_Qut = "SELECT * FROM ex_question WHERE id_set = '".$_GET["id_set"]."' ORDER BY Article ASC";
				$objQuery_Qut = mysql_query($strSQL_Qut) or die ("Error Query [".$strSQL_Set."]");
				while($objResult_Qut = mysql_fetch_array($objQuery_Qut)){
					$num++;
					if($objResult_Qut["choice1"] != '' ){ $i = "(1.)";}
					if($objResult_Qut["choice2"] != '' ){ $j = "(2.)";}
					if($objResult_Qut["choice3"] != '' ){ $k = "(3.)";}
					if($objResult_Qut["choice4"] != '' ){ $l = "(4.)";}
					if($objResult_Qut["choice5"] != '' ){ $m = "(5.)";}
					if($objResult_Qut["choice6"] != '' ){ $n = "(6.)";}
				
			?>
            <tr>
                <td><center><?=$objResult_Qut["Article"]?></center></td>
                <td>
                <? echo $objResult_Qut["question"].$i.$objResult_Qut["choice1"].$j.$objResult_Qut["choice2"].$k.$objResult_Qut["choice3"].$l.$objResult_Qut["choice4"].$m.$objResult_Qut["choice5"].$n.$objResult_Qut["choice6"];?>
				</td>
                <td><center><?=DateThai($objResult_Qut["last_update"])?></center></td>
                
            <? } if($num == "0"){ ?>
            <tr>
            	<td colspan="10"><center><font color="#FF0000">ไม่พบข้อมูล</font></center></td>
            </tr>
            <?php } ?>
          </table>    
          <p><input type="button" name="" id="" class="button" value="กลับ" onClick="window.location='Subject_Manag_Show_Set.php?id_subject=<?=$objResult_ex_setSn["id_subject"]?>&subid=<?=$_GET['subid'];?>'" /></p>              
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



