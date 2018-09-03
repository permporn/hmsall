<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php 
session_start();
include ('config.php');

if($_SESSION["stid"] == "" && $_GET['id'] == ''){
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

//แบ่งหน้า	
if($_GET["field2"] != ""){
		$strSQL_ex_subject = "SELECT * FROM ex_subject WHERE (name LIKE '%".$_GET["field2"]."%')";
		$objQuery_ex_subject = mysql_query($strSQL_ex_subject) or die ("Error Query [".$strSQL_ex_subject."]");
	}else{
		$strSQL_ex_subject = "SELECT * FROM ex_subject WHERE id = '".$_GET['id']."'";
		$objQuery_ex_subject = mysql_query($strSQL_ex_subject) or die ("Error Query [".$strSQL_ex_subject."]");
	}

$Num_Rows = mysql_num_rows($objQuery_ex_subject);
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

$strSQL_ex_subject .=" ORDER BY last_update DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL_ex_subject);	

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
<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->

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
	
          <!-- Navigation item -->
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
      <div class="header-breadcrumbs">
      </div>
  

  <!-- END COPY here -->

  </div>

   <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
  
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
       
       		
     	<h1 class="block">- แก้ไข วิชา </h1>
        <div class="column1-unit">
         <form method="POST" action="Exam_Manag_Subj_Edit_Update.php?id=<?=$_GET["id"];?>">
         <table width="100%">
            <tr>
                <th width="7%" class="top" scope="col"><center>ลำดับที่</center></th>
                <th width="18%" class="top" scope="col"><center>ชื่อวิชา(add)</center></th>
                <th width="10%" class="top" scope="col"><center>รหัสวิชา</center></th>
                <th width="10%" class="top" scope="col"><center>บันทึก</center></th>
                <th width="10%" class="top" scope="col"><center>ยกเลิก</center></th>
                
            </tr>
            <?php
				$num = 0; 
				while($objResult_ex_subject = mysql_fetch_array($objQuery)){
				$num++;
            ?>
            <tr>
            <td><center><?=$num+(($Page-1)*$Per_Page);?></center></td>
            <th scope="row"><input name="name" id="name" class="field" value="<?=$objResult_ex_subject["name"];?>" style="width:350px"/></th>
            <td><center><input name="subid" id="subid" class="field" value="<?=$objResult_ex_subject["subid"];?>" style="width:80px"/></center></td>
            <td><center><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" style="float:right; width:50px; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;" /></center></td>
            <td><center><input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='Exam_Manag_ShowAll.php'" style="float:right; width:50px; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;"  /></center></td>
            </tr>
          <?php }
		  	if(!$Num_Rows){
			?>
            <tr><td colspan="8">
            <center><font color="#FF0000">ไม่พบข้อมูล</font></center>
            </td></tr>  
          <?php } ?>
          </table> 
          </form>                           

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
?>
          
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

<?php  }?>

