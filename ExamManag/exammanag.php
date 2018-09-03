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
      <div class="header-breadcrumbs">
        <div class="searchform">
          <form action="index.html" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>
        </div>
      </div>
  

  <!-- END COPY here -->

  </div>
    <div class="main">
      <div class="main-content">
        <h1 class="pagetitle">จัดการข้อสอบ</h1>
       <h1 class="block">1 - ข้อสอบ</h1>
     	<div class="column1-unit">
         <div class="column1-unit">
          <div class="contactform2">
            <p><label for="contact_firstname" class="left">วิชาและรหัสวิชา</label>
              วิชา
              <?=$objResult_ex_subject["name"];?>(<?=$objResult_subject["code"];?>)</p>
              <p><label for="contact_familyname" class="left">ชุดข้อสอบ : </label>
              <?=$objResult_ex_setSn["name_set"];?></p>
          <a href="<?php if($objResult_ex_setSn["type_answer"]=="1"){?>addquestionChoice.php<?php }else{ ?>addquestionWrite.php<?php }?>?id_set=<?=$objResult_ex_setSn["id_set"];?>"><button type="submit" class="button" style="float:left; width:100px; margin-left:10px; margin-bottom:30px; padding:5px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:130%;">เพิ่มข้อสอบ</button></a>
            <form method="post" action="index.php">
          <table width="100%">
            <tr>
                <th width="6%" class="top" scope="col"><center>
                  ข้อที่
                </center></th>
                <th width="64%" class="top" scope="col"><center>โจทย์</center></th>
                <th width="7%" class="top" scope="col"><center>คะแนน</center></th>
                <th width="11%" class="top" scope="col"><center>วันที่อัพเดท</center></th>
                <th width="6%" class="top" scope="col"><center>แก้ไข</center></th>		
                <th width="6%" class="top" scope="col"><center>ลบ</center></th>
            </tr>
            <?
				$num = 0;
				$strSQL_Qut = "SELECT * FROM ex_question WHERE id_set = '".$_GET["id_set"]."' ORDER BY Article ASC";
				$objQuery_Qut = mysql_query($strSQL_Qut) or die ("Error Query [".$strSQL_Set."]");
				while($objResult_Qut = mysql_fetch_array($objQuery_Qut)){
					$num++;
			?>
            <tr>
                <td><center><?=$objResult_Qut["Article"]?></center></td>
                <td><?=$objResult_Qut["question"]?>
                <? for($i=1 ; $i<6 ; $i++){
					$C = "choice".$i;
					//echo $C; 
						if($objResult_Qut["$C"] != '' ){ 
							if( $objResult_Qut["answer"] == "$C" ){
								echo $i.")<font color='#990000'>(คำตอบ)</font>".$objResult_Qut["$C"];
							}else{
								echo $i.")".$objResult_Qut["$C"];}
						}
					}
					
					?>
				</td>
                 <td><center><?=$objResult_Qut['score']?></center></td>
                <td><center><?=DateThai($objResult_Qut["last_update"])?></center></td>
                <td><center><a href="<?php if($objResult_ex_setSn["type_answer"]=="1"){?>addquestionChoice.php<?php }else{ ?>addquestionWrite.php<?php }?>?id_set=<?=$objResult_ex_setSn["id_set"];?>&id_question=<?=$objResult_Qut["id_question"]?>&action=update"><img src="img/2.png" width="25" height="25" class="center" /></a></center></td>
                <td><center><a href="addquestionWrite_insert.php?action=del&id_question=<?=$objResult_Qut["id_question"]?>&id_set=<?=$objResult_ex_setSn["id_set"];?>"><img src="img/115.png" width="20" height="20" OnClick="return chkdel();"  class="center" /></a></center></td>
            </tr>
            <? } if($num == "0"){ ?>
            <tr>
            	<td colspan="10"><center><font color="#FF0000">ไม่พบข้อมูล</font></center></td>
            </tr>
            <?php } ?>
          </table> 
          <br />   
          <p><input type="button" name="" id="" class="button" value="กลับ" onClick="window.location='Exam_Manag_AddSet.php?id_subject=<?=$objResult_ex_setSn["id_subject"]?>'" /></p>              
          </form>
            </div>          
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



