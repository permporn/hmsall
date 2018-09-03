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

if($_GET["field"] != ""){
		$strSQL_Sub = "SELECT * FROM subject WHERE (subname LIKE '%".$_GET["field"]."%' OR code LIKE '%".$_GET["field"]."%')";
		$objQuery_Sub = mysql_query($strSQL_Sub) or die ("Error Query [".$strSQL_Sub."]");
	}else{
		$strSQL_Sub = "SELECT * FROM subject ";
		$objQuery_Sub = mysql_query($strSQL_Sub) or die ("Error Query [".$strSQL_Sub."]");
	}

$Num_Rows = mysql_num_rows($objQuery_Sub);
$Per_Page = 20 ;   // Per Page

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

$strSQL_Sub .=" ORDER BY date_subj DESC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL_Sub);
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
         <ul>
            <li><a href="Score_Manag.php">จัดการคะแนนสอบ</a></li>
         </ul>
        </div>
	  </div>

      <!--<div class="header-breadcrumbs">
        <div class="searchform">
          <form action="index.html" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>
        </div>
      </div>-->
  

  <!-- END COPY here -->

  </div>

   <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
  
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
       <br />
        <h1 class="pagetitle">จัดการวิชา</h1>
		<!-- Content unit - One column -->
        <h1 class="block">1 - ค้นหาวิชา</h1>
        
		<div class="column1-unit">
          <div class="contactform">
            <form method="get" action="Subject_Manag_Showall.php">
              <fieldset><legend>&nbsp;+สร้างวิชา&nbsp;</legend>
              <p><label for="contact_firstname" class="left">ค้นหาวิชา:</label>
              <input type="submit" name="button2" class="button" value="GO!" style="width:50px"/>
              <input name="field" id="field" class="field"  value="<?=$_GET["field"];?>"  style="width:220px"/></p>
              </fieldset>
            </form>
          </div>              
        </div> 
       
       
       <h1 class="block">2 - ตารางวิชาทั้งหมด</h1>
     	<div class="column1-unit">
         <!-- <h1>Here comes the title</h1>-->
          <table width="100%">
            <tr>
            <th width="7%" class="top" scope="col"><center>ลำดับที่</center></th>
            <th width="32%" class="top" scope="col"><center>ชื่อวิชา</center></th>
            <th width="11%" class="top" scope="col"><center>รหัสวิชา</center></th>
            <th width="11%" class="top" scope="col"><center>ปี</center></th>
            <!--<th width="14%" class="top" scope="col"><center>เทอม</center></th>-->
            <th width="32%" class="top" scope="col"><center>ข้อสอบ</center></th>								         	
            <th width="7%" class="top" scope="col"><center>เพิ่ม ข้อสอบ</center></th>
            </tr>
            
            <?php
				$num = 0; 
				while($objResult_Sub = mysql_fetch_array($objQuery)){
				$num++;
				$str = "SELECT * FROM subject
						JOIN ex_mapexam ON subject.subid = ex_mapexam.subid
						JOIN ex_subject ON ex_mapexam.id_subjex = ex_subject.id
						WHERE subject.subid = '".$objResult_Sub["subid"]."'";
				$objQuery_sb  = mysql_query($str);
				//$objResult_sb = mysql_fetch_array($objQuery_sb)
            ?>
			<tr>
            <td><center><?=$num+(($Page-1)*$Per_Page);?></center></td>
            <th scope="row"><a href="Subject_Manag_Addmap.php?subid=<?=$objResult_Sub["subid"];?>"><?=$objResult_Sub["subname"];?></a></th>
            
            <td><center><?=$objResult_Sub["code"];?></center></td>
            
            <td><center>
            <?php
				$str_addterm = "SELECT * FROM addtrem WHERE idaddterm = '".$objResult_Sub["idaddterm"]."'";
				$objQuery_addterm = mysql_query($str_addterm);
				$objResult_addterm = mysql_fetch_array($objQuery_addterm);
				
				$str_year = "SELECT * FROM year WHERE idyear = '".$objResult_addterm["idyear"]."'";
				$objQuery_year = mysql_query($str_year);
				$objResult_year = mysql_fetch_array($objQuery_year);
				echo $objResult_year["nameyear"];
				
            ?></center></td>
            <!--<td><center>
            <?php
				/*$str_term = "SELECT * FROM term WHERE idterm = '".$objResult_addterm["idterm"]."'";
				$objQuery_term = mysql_query($str_term);
				$objResult_term = mysql_fetch_array($objQuery_term);
				echo $objResult_term["nameterm"];*/
            ?></center></td>-->
            
            <!--<td><center>
            <?php
				/*$str_map = "SELECT * FROM ex_mapexam WHERE subid = '".$objResult_Sub["subid"]."'";
				$objQuery_map = mysql_query($str_map);
				$objResult_map = mysql_fetch_array($objQuery_map);
				echo $objResult_map["id_ampexam"];*/
            ?></center></td>-->
            <td>
            <? while($objResult_sb = mysql_fetch_array($objQuery_sb)){?>
			<? echo $objResult_sb['name'].",<br />"; } ?></td>
            <td><center><a href="Subject_Manag_Addmap.php?subid=<?=$objResult_Sub["subid"];?>"><img src="img/34.png" width="25" height="25" class="center"/></a></center></td></tr>
            
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

<?php } ?>

