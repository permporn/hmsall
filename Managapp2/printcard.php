<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');
if($_SESSION["accid"] == "" && $_SESSION["status"] == ''){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณา Login');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	$_SESSION["status"] = $objResultSTT["status"];
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <title>ระบบจัดการAPP</title>
</head>
<style type="text/css"> 

#printable { display: block; }

@media print 
{ 
     #non-printable { display: none; } 
     #printable { display: block; } 
} 
.fontfern1 { font-family: "THSarabun", serif; text-transform: none ; font-size:20px; }
body {
	 height: 842px;
     width: 595px;
     /* to centre page on screen*/
     margin-left: auto;
     margin-right: auto;
	 font:Verdana, Geneva, sans-serif;
	 font-size:11px;
	 color:#000000;
}
</style> 

<body>
		
<?
			$top = 40;  //หน้าเริ่มบน  original 100
            $left = 500; //หน้าเริ่มซ้าย
            $crow = 0;
            $ccol = 1;
            $i = 1; //นับจำนวนบัตร
            $j = 0; //นับ column
            $temp = 50;


	
		$strSQL  = "SELECT * FROM map_video 
		JOIN student ON map_video.studentid = student.studentid 
		JOIN learn ON map_video.studentid = learn.studentid 
		WHERE learn.studentid = '".$_GET['studentid']."' AND learn.pass = '".$_GET['pass']."'";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery);
		
		$strSQL3  = "SELECT * FROM map_video
		JOIN path_video ON map_video.id_ref_video = path_video.id_ref_video
		JOIN subj_video ON subj_video.id_subj_video = path_video.subcode
		WHERE map_video.studentid = '".$_GET['studentid']."' AND map_video.learnid = '".$objResult['learnid']."'";
		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
		?>
        
         <div id="printable"> 
         
         
         <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
         	<LEFT>ชื่อ-สกุล: <?=$objResult["studentname"];?><?=$top;?></CENTER>
         </DIV>
         <? $top = $top + 16;?>
         <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
            <LEFT>Username: <?=$objResult["studentid"];?></CENTER>
         </DIV>
         <? $top = $top + 16;?>
         <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
            <LEFT>Password: <?=$objResult["pass"];?></CENTER>
         </DIV>
         <!--<? //$top = $top + 16;?>
         <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
            <LEFT>ประเภท: Application</CENTER>
         </DIV>-->
         <? $top = $top + 16;
		 	while($objResult1 = mysql_fetch_array($objQuery3)){
				if($objResult1['name_subj'] != $name_subj ){
        		$name_subj = $objResult1['name_subj'];?>
         <DIV STYLE="position:absolute; top:<?= $top; ?>px; left:<?= $left; ?>px;">
             <LEFT>วิชาเรียน : <?=$name_subj;?></CENTER>
         </DIV>
         <? }
		  $top = $top + 16;
		 }?>
</div>     
        
    
         <div id="non-printable">
         
         <p><input type="button" value="พิมพ์" onclick="window.print();" style="width:100px; height:25px;margin-left:22px; margin-top:120px" class="button">
         <input type="button" value="กลับ" onclick="window.history.back()" style="width:100px; height:25px;margin-left:22px; margin-top:120px" class="button"> </p>
        </div> 
      
    </body>
</html><?php } ?>