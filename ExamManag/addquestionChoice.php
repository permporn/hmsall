<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php include('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<!--  Version: Multiflex-3 Update-7 / Layout-1             -->
<!--  Date:    January 15, 2007                            -->
<!--  Author:  Wolfgang                                    -->
<!--  License: Fully open source without restrictions.     -->
<!--           Please keep footer credits with a link to   -->
<!--           Wolfgang (www.1-2-3-4.info). Thank you!     -->

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
  <script language="JavaScript" src="plugins/ckeditor_wiris/configuration.ini"></script>
  <script language="JavaScript" src="ckeditor.js"></script>
  <script language="JavaScript" src="plugin.js"></script>
<script language="javascript">
function show_table(id) {
	if(id == 1) { // ถ้าเลือก radio button 1 ให้โชว์ table 1 และ ซ่อน table 2 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "none";
	document.getElementById("table_3").style.display = "none";
	document.getElementById("table_4").style.display = "none";
	document.getElementById("table_5").style.display = "none";
	document.getElementById("table_6").style.display = "none";
	} else if(id == 2) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "";
	document.getElementById("table_3").style.display = "none";
	document.getElementById("table_4").style.display = "none";
	document.getElementById("table_5").style.display = "none";
	document.getElementById("table_6").style.display = "none";
	} else if(id == 3) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "";
	document.getElementById("table_3").style.display = "";
	document.getElementById("table_4").style.display = "none";
	document.getElementById("table_5").style.display = "none";
	document.getElementById("table_6").style.display = "none";
	} else if(id == 4) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "";
	document.getElementById("table_3").style.display = "";
	document.getElementById("table_4").style.display = "";
	document.getElementById("table_5").style.display = "none";
	document.getElementById("table_6").style.display = "none";
	} else if(id == 5) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "";
	document.getElementById("table_3").style.display = "";
	document.getElementById("table_4").style.display = "";
	document.getElementById("table_5").style.display = "";
	document.getElementById("table_6").style.display = "none";
	} else if(id == 6) { // ถ้าเลือก radio button 2 ให้โชว์ table 2 และ ซ่อน table 1 
	document.getElementById("table_1").style.display = "";
	document.getElementById("table_2").style.display = "";
	document.getElementById("table_3").style.display = "";
	document.getElementById("table_4").style.display = "";
	document.getElementById("table_5").style.display = "";
	document.getElementById("table_6").style.display = "";
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
	
          <!-- Navigation item -->
          <ul>
            <li><a href="index.html">หน้าแรก</a></li>
          </ul>
          
          <!-- Navigation item -->
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
  </div>
    <div class="main">
      <div class="main-content">
        <h1 class="pagetitle">จัดการข้อสอบ</h1>
        <h1 class="block">1 - สร้างข้อสอบแบบตัวเลือก</h1>
        
		<div class="column1-unit">
          <div class="contactform2">
          	<? 
				if($_GET["action"] == "update"){ 
				
				$id_question = $_GET["id_question"];
				$strSQL_QT = "SELECT * FROM ex_question WHERE id_question = $id_question";
				$objQuery_QT = mysql_query($strSQL_QT) or die ("Error Query [".$strSQL_QT."]");
				$objResult_QT = mysql_fetch_array($objQuery_QT);
			?>
            <form method="post" action="addquestionChoice_insert.php?id_set=<?=$_GET["id_set"]?>&action=update&id_question=<?=$_GET["id_question"]?>">
              <fieldset>
                <legend>&nbsp;+แก้ไขข้อสอบ
              </legend>
              <p><label for="contact_country" class="left">ข้อที่:</label>
              <input type="text" name="num_Article" id="num_Article" class="field" value="<?=$objResult_QT["Article"];?>" tabindex="1" style="width:50px" /></p>
              <p><label for="contact_firstname" class="left">วิชา&รหัสวิชา: </label>
              <?php
			  	$str_SET = "SELECT * FROM ex_set WHERE id_set = '".$_GET["id_set"]."'";
				$objQuery_SET = mysql_query($str_SET);
			  	$objResult_SET = mysql_fetch_array($objQuery_SET);
				
				$id_subject = $objResult_SET["id_subject"];
				$str_ExSB = "SELECT * FROM ex_subject WHERE id = '".$id_subject."'";
				$objQuery_ExSB = mysql_query($str_ExSB);
			  	$objResult_ExSB = mysql_fetch_array($objQuery_ExSB);
				
				$subid = $objResult_ExSB["subid"];
				$str_SB = "SELECT * FROM subject WHERE subid = '".$subid."'";
				$objQuery_SB = mysql_query($str_SB);
			  	$objResult_SB = mysql_fetch_array($objQuery_SB);
				echo $objResult_SB["subname"]."&".$objResult_SB["code"];
				
              ?></p>
              <p><label for="contact_familyname" class="left">ชุดข้อสอบ:</label>
                <?=$objResult_SET["name_set"];?>
              </p>
              
              <p><label for="contact_country" class="left">คะแนนข้อนี้:</label>
              <input type="text" name="score" id="score" class="field" value="<?=$objResult_QT["score"];?>" tabindex="1" style="width:50px" /> คะแนน *กรอกตัวเลข </p>
              
              <p><label for="contact_message" class="left">โจทย์:</label></p>
              <p><textarea id="question" name="question" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["question"];?></textarea>
   			  <script type="text/javascript">
			  
			  CKEDITOR.editorConfig = function( config )
				{
					config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
					
					config.toolbar_Full.push({ name: 'wiris', 
					items : [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS' ]});
					
				};
				CKEDITOR.config.height = 100;
				CKEDITOR.config.width  = 800;
				CKEDITOR.replace( 'question', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#14B8C4',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			
			</script></p>
                   
                   <table class="tbl1">
                    <tr>
                    	<td><p><label for="contact_country" class="left">จำนวนตัวเลือก:</label></td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="2" <? if($objResult_QT["num_choice"] == "2"){ ?>checked="checked" <? } ?>onclick="show_table(this.value);" class="input4">2 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="3" <? if($objResult_QT["num_choice"] == "3"){ ?>checked="checked" <? } ?>onclick="show_table(this.value);" class="input4">3 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="4" <? if($objResult_QT["num_choice"] == "4"){ ?>checked="checked" <? } ?> onclick="show_table(this.value);" class="input4">4 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="5" <? if($objResult_QT["num_choice"] == "5"){ ?>checked="checked" <? } ?>onclick="show_table(this.value);" class="input4">5 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="6" <? if($objResult_QT["num_choice"] == "6"){ ?>checked="checked" <? } ?>onclick="show_table(this.value);" class="input4">6 ข้อ </td>
                        
                    </tr>
                    </p>
                <div style="margin-left:115px">
                <table  id="table_1" style="display:" class="tbl1">
                	<br />
                	<tr><p><label for="contact_country" class="left">ตัวเลือก : </label></p></tr>
                	<tr>
                    	<td align="center" height="40px" colspan="5">
                        	<p>ตัวเลือกที่ 1 <textarea id="choice1" name="choice1" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice1"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice1" <? if($objResult_QT["answer"] == "choice1"){ ?>checked="checked" <? } ?> /></p>
			<script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice1', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>
                            
                        </td>
                    </tr>
                </table>
                
                <table id="table_2" style="display:" class="tbl1">
                    <tr>
                        <td align="center" height="40px" colspan="5">
                            <p>ตัวเลือกที่ 2 <textarea id="choice2" name="choice2" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice2"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice2" <? if($objResult_QT["answer"] == "choice2"){ ?>checked="checked" <? } ?> /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice2', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_3" style="display:<? if($objResult_QT["num_choice"] < "3"){ ?>none<? }?>" class="tbl1">
                    <tr>
                    	<td align="" height="40px" colspan="5">
                        	<p>ตัวเลือกที่ 3 <textarea id="choice3" name="choice3" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice3"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice3" <? if($objResult_QT["answer"] == "choice3"){ ?>checked="checked" <? } ?> /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice3', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_4" style="display:<? if($objResult_QT["num_choice"] < "4"){ ?>none<? }?>" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 4 <textarea id="choice4" name="choice4" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice4"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice4" <? if($objResult_QT["answer"] == "choice4"){ ?>checked="checked" <? } ?> /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice4', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_5" style="display:<? if($objResult_QT["num_choice"] < "5"){ ?>none<? }?>" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 5 <textarea id="choice5" name="choice5" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice5"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice5" <? if($objResult_QT["answer"] == "choice5"){ ?>checked="checked" <? } ?> /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice5', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_6" style="display:<? if($objResult_QT["num_choice"] < "6"){ ?>none<? }?>" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 6 <textarea id="choice6" name="choice6" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["choice6"];?></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice6" <? if($objResult_QT["answer"] == "choice6"){ ?>checked="checked" <? } ?> /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice6', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
              	
              
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='exammanag.php?id_set=<?=$_GET["id_set"];?>'" /></p>
             
              </fieldset>
            </form>
            
            <? }else{ ?>
            
          
            <form method="post" action="addquestionChoice_insert.php?id_set=<?=$_GET["id_set"]?>">
              <fieldset>
                <legend>&nbsp;+สร้างข้อสอบ
              </legend>
              <p><label for="contact_country" class="left">ข้อที่:</label>
              <?php
			  	$num_Article = 1;
				$strNA = "SELECT * FROM ex_question WHERE id_set = '".$_GET["id_set"]."'";
				$objQueryNA = mysql_query($strNA);
				while($objResultNA = mysql_fetch_array($objQueryNA)){
					$num_Article++;
				}
				//echo $num_Article;
			  ?>
              <input type="hidden" name="num_Article" id="num_Article" class="field" value="<?=$num_Article;?>" tabindex="1" style="width:50px" /><?=$num_Article;?></p>
              <p><label for="contact_firstname" class="left">วิชา&รหัสวิชา:</label>
              <?php
			  	$str_SET = "SELECT * FROM ex_set WHERE id_set = '".$_GET["id_set"]."'";
				$objQuery_SET = mysql_query($str_SET);
			  	$objResult_SET = mysql_fetch_array($objQuery_SET);
				
				$id_subject = $objResult_SET["id_subject"];
				$str_ExSB = "SELECT * FROM ex_subject WHERE id = '".$id_subject."'";
				$objQuery_ExSB = mysql_query($str_ExSB);
			  	$objResult_ExSB = mysql_fetch_array($objQuery_ExSB);
				
				$subid = $objResult_ExSB["subid"];
				$str_SB = "SELECT * FROM subject WHERE subid = '".$subid."'";
				$objQuery_SB = mysql_query($str_SB);
			  	$objResult_SB = mysql_fetch_array($objQuery_SB);
				echo $objResult_SB["subname"]."&".$objResult_SB["code"];
				
              ?></p>
              <p><label for="contact_familyname" class="left">ชุดข้อสอบ:</label>
                <?=$objResult_SET["name_set"];?>
              </p>
              
              <p><label for="contact_country" class="left">คะแนนข้อนี้:</label>
              <input type="text" name="score" id="score" class="field" value="" tabindex="1" style="width:50px" /> คะแนน *กรอกตัวเลข </p>
              
              <p><label for="contact_message" class="left">โจทย์:</label></p>
              <p><textarea id="question" name="question" class="ckeditor" style="visibility: hidden; display: none;"></textarea>
   			  <script type="text/javascript">
			  
			  CKEDITOR.editorConfig = function( config )
				{
					config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
					
					config.toolbar_Full.push({ name: 'wiris', 
					items : [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS' ]});
					
				};
				CKEDITOR.config.height = 100;
				CKEDITOR.config.width  = 800;
				CKEDITOR.replace( 'question', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#14B8C4',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			
			
			</script></p>
                   
                   <table class="tbl1">
                    <tr>
                    	<td><p><label for="contact_country" class="left">จำนวนตัวเลือก:</label></td>
                        <!--<td height="40px" colspan="5"></td>-->
                        <!--<td><input name="num_choice" id="num_choice" type="radio" value="1" onclick="show_table(this.value);" class="input4">1 ข้อ </td>-->
                        <td><input name="num_choice" id="num_choice" type="radio" value="2" onclick="show_table(this.value);" class="input4">2 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="3" onclick="show_table(this.value);" class="input4">3 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="4" checked="checked" onclick="show_table(this.value);" class="input4">4 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="5" onclick="show_table(this.value);" class="input4">5 ข้อ </td>
                        <td><input name="num_choice" id="num_choice" type="radio" value="6" onclick="show_table(this.value);" class="input4">6 ข้อ </td>
                        
                    </tr>
                    </p>
                <div style="margin-left:115px">
                <table  id="table_1" style="display:" class="tbl1">
                	<br />
                	<tr><p><label for="contact_country" class="left">ตัวเลือก : </label></p></tr>
                	<tr>
                    	<td align="center" height="40px" colspan="5">
                        	<p>ตัวเลือกที่ 1 <textarea id="choice1" name="choice1" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice1" /></p>
			<script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice1', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>
                            
                        </td>
                    </tr>
                </table>
                
                <table id="table_2" style="display:" class="tbl1">
                    <tr>
                        <td align="center" height="40px" colspan="5">
                            <p>ตัวเลือกที่ 2 <textarea id="choice2" name="choice2" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice2" /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice2', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_3" style="display:" class="tbl1">
                    <tr>
                    	<td align="" height="40px" colspan="5">
                        	<p>ตัวเลือกที่ 3 <textarea id="choice3" name="choice3" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice3" /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice3', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_4" style="display:" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 4 <textarea id="choice4" name="choice4" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice4" /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice4', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_5" style="display:none" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 5 <textarea id="choice5" name="choice5" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice5" /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice5', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
                
                <table id="table_6" style="display:none" class="tbl1">
                    <tr>
                        <td  height="40px" colspan="5">
                            <p>ตัวเลือกที่ 6 <textarea id="choice6" name="choice6" class="ckeditor" style="visibility: hidden; display: none;"></textarea><br /> เลือกเป็นคำตอบ <input name="answer" id="answer" type="radio" value="choice6" /></p>
            <script type="text/javascript">
			  
			  CKEDITOR.replace( 'choice6', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#0000CC',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script>                
                        </td>
                    </tr>
                </table>
              	
              <p>     
              <input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" style="float:right; width:9.0em; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='exammanag.php?id_set=<?=$_GET["id_set"];?>'" style="float:right; width:9.0em; margin-right:20px; padding:1px !important /*Non-IE6*/; padding:0 /*IE6*/; background:rgb(230,230,230); border:solid 1px rgb(150,150,150); text-align:center; font-family:verdana,arial,sans-serif; color:rgb(150,150,150); font-size:110%;" /></p>
             
              
            </form>
           
            <? } ?>
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



