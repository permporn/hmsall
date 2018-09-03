<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php include('config.php'); ?>

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
  <script language="JavaScript" src="plugins/ckeditor_wiris/configuration.ini"></script>
  <script language="JavaScript" src="ckeditor.js"></script>
  <script language="JavaScript" src="plugin.js"></script>
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
        </div>
	  </div>

      <div class="header-breadcrumbs">
        <div class="searchform">
          <form action="index.php" method="get">
            <fieldset>
              <input name="field" class="field"  value=" Search..." />
              <input type="submit" name="button" class="button" value="GO!" />
            </fieldset>
          </form>
        </div>
      </div>
  

  <!-- END COPY here -->

  </div>

   <!-- For alternative headers END PASTE here -->

    <!-- B. MAIN -->
    <div class="main">
  
      <!-- B.1 MAIN CONTENT -->
      <div class="main-content">
        
        <!-- Pagetitle -->
       
        <h1 class="pagetitle">จัดการข้อสอบ</h1>
		<!-- Content unit - One column -->
        
       
		<!-- Content unit - One column -->
        <h1 class="block">1 - สร้างข้อสอบแบบข้อเขียน</h1>
        
		<div class="column1-unit">
          <div class="contactform2">
          <? if($_GET["action"] == "update"){ 
		  		
				$id_question = $_GET["id_question"];
				$strSQL_QT = "SELECT * FROM ex_question WHERE id_question = $id_question";
				$objQuery_QT = mysql_query($strSQL_QT) or die ("Error Query [".$strSQL_QT."]");
				$objResult_QT = mysql_fetch_array($objQuery_QT);
		  ?>
          
            <form action="addquestionWrite_insert.php?id_set=<?=$_GET["id_set"]?>&action=update&id_question=<?=$_GET["id_question"]?>" method="post">
              <fieldset>
                <legend>&nbsp;+แก้ไขข้อสอบ 
              </legend>
              <p><label for="contact_country" class="left">ข้อที่:</label>
              <input name="Article" id="Article" class="field" value="<?=$objResult_QT["Article"];?>" tabindex="1" style="width:50px" /></p>
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
              <?=$objResult_SET["name_set"];?></p>
              
              <!--<p><label for="contact_country" class="left">คะแนนข้อนี้:</label>
              <input type="text" name="score" id="score" class="field" value="<?=$objResult_QT["score"];?>" tabindex="1" style="width:50px" /> คะแนน *กรอกตัวเลข </p>-->
              <p><label for="contact_country" class="left">โจทย์:</label>
              <p><textarea id="question" name="question" class="ckeditor" style="visibility: hidden; display: none;"><?=$objResult_QT["question"];?></textarea>
   			  <script type="text/javascript">
			  
			  CKEDITOR.editorConfig = function( config )
				{
					config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
					
					config.toolbar_Full.push({ name: 'wiris', 
					items : [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS' ]});
					
				};
				CKEDITOR.config.height = 200;
				CKEDITOR.config.width  = 800;
				CKEDITOR.replace( 'question', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#14B8C4',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script></p>
                   
              
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='exammanag.php?id_set=<?=$_GET["id_set"];?>'" /></p>
              </fieldset>
            </form>
          
          
		  <? }else{ ?>
          
          
            <form action="addquestionWrite_insert.php?id_set=<?=$_GET["id_set"]?>" method="post">
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
              <input type="hidden" name="Article" id="Article" class="field" value="<?=$num_Article;?>" tabindex="1" style="width:50px" /><?=$num_Article?></p>
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
              <?=$objResult_SET["name_set"];?></p>
              
              <!--<p><label for="contact_country" class="left">คะแนนข้อนี้:</label>
              <input type="text" name="score" id="score" class="field" value="" tabindex="1" style="width:50px" /> คะแนน *กรอกตัวเลข </p>-->
              <p><label for="contact_country" class="left">โจทย์:</label>
              <p><textarea id="question" name="question" class="ckeditor" style="visibility: hidden; display: none;"></textarea>
   			  <script type="text/javascript">
			  
			  CKEDITOR.editorConfig = function( config )
				{
					config.extraPlugins += (config.extraPlugins.length == 0 ? '' : ',') + 'ckeditor_wiris';
					
					config.toolbar_Full.push({ name: 'wiris', 
					items : [ 'ckeditor_wiris_formulaEditor', 'ckeditor_wiris_CAS' ]});
					
				};
				CKEDITOR.config.height = 200;
				CKEDITOR.config.width  = 800;
				CKEDITOR.replace( 'question', {
				extraPlugins: 'ckeditor_wiris',
				uiColor: '#14B8C4',
				removePlugins: 'bidi,forms,flash,horizontalrule,iframe,justify,smiley,link,showblocks,WIRIScas',
				removeButtons: 'PageBreak,NumberedList,BulletedList,Blockquote,CreateDiv,Find,Replace,SelectAll,Scayt,PasteFromWord,PasteText,Source,Templates,About',
				format_tags: 'p;h1;h2;h3;pre;address',
			
			} );
			</script></p>
                   
              
              <p><input type="submit" name="submit" id="submit" class="button" value="บันทึก" tabindex="6" />
              <input type="button" name="" id="" class="button" value="ยกเลิก" onClick="window.location='exammanag.php?id_set=<?=$_GET["id_set"];?>'" /></p>
             
              </fieldset>
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


