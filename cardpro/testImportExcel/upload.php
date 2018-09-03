<? 
session_start();
include("config.inc.php");
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid_cardpro"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	
	if($_SESSION["accid_cardpro"] == ""){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Please Login!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=../Login.php'>";
		exit();
	}
	
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="../autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="../autocomplete/autocomplete.css"  type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="../css/default.css"/>
<link type="text/css" href="../menutest/menu.css" rel="stylesheet" />
<script type="text/javascript" src="../menutest/jquery.js"></script>
<script type="text/javascript" src="../menutest/menu.js"></script>
<title><?=$title?></title>
</head>
<script language="JavaScript">
	function ChkSubmit(result){
		if(document.getElementById("term").value == ""){
			alert('กรุณาเลือกปีการศึกษา');
			return false;
		}
		if(document.getElementById("file").value == ""){
			alert('กรุณาเลือกไฟล์..');
			return false;
		}
		document.getElementById("progress").style.visibility="visible";
		document.getElementById("divresult").innerHTML ="Uploading....";
		return true;
	}
	
	function showResult(result)
	{
		document.getElementById("progress").style.visibility="hidden";
		if(result==1)
			{
			document.getElementById("divresult").innerHTML = "<font color=green> Save successfully! </font>  <br>";
			}
		else
			{
			document.getElementById("divresult").innerHTML = "<font color=red> Error!! Cannot upload data </font> <br>";
			}
		}
	</script>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
<div id="header"> <a href="#"><img src="../images/logo01.png" alt="" class="logo"/><img src="../images/header.jpg" alt="" class="logo"/></a>
    <ul id="toplinks">
      <li><font style="font-size:14px"><img src="../images/Yellow tag.png"/> Status: <?=$objResultSTT["status"];?></font></li>
      <li><font style="font-size:14px"><img src="../images/user.png"/> Welcome: <?=$objResultSTT["name"];?></font></li>
      <br />
      <li><font style="font-size:14px" ><a href="../logout.php">ออกจากระบบ</a></font></li>
    </ul>
    </ul>
  </div>
<div id="menu">
    <ul class="menu">
    	<li><a href="../home.php"><span>หน้าแรก</span></a></li>
         	<li><a href="#" class="parent"><span>สด และ DVD</span></a>
            	<div><ul>
					<? if($objResultSTT["status"]=="Manager"||$objResultSTT["status"]=="ADMIN") {?>
                    <li><a href="#" class="parent"><span>Import Excel</span></a>
                        <div><ul>
                            <li><a href="upload.php?type=addstu"><span>ดึงไฟล์ธนาคาร</span></a></li>
                            <li><a href="upload.php?type=addsubj"><span>ดึงไฟล์วิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                	<? } ?>
                    <li><a href="../home.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="../home.php"><span>ทะเบียนนักเรียน</span></a></li>
                            <li><a href="../student_detail_search.php"><span>ค้นหารายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="../exam.php"><span>คะแนนสอบ</span></a></li>
                    <li><a href="#" class="parent"><span>จัดการข้อมูล</span></a>
                        <div><ul>
                            <li><a href="../subject.php"><span>จัดการข้อมูลวิชา</span></a></li>
                            <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN") {?>
                            <li><a href="../manageall.php"><span>จัดการข้อมูลอื่นๆ</span></a></li>
                            <? }?>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="../price.php"><span>ยอดแต่ละสาขา</span></a></li>
                            <!--<li><a href="#"><span>ยอดใบคำร้อง</span></a></li>-->
                        </ul></div>
                    </li>
               		<? }?>
                </ul></div>
        	</li>
            <li><? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="7" /*or $objResultSTT["accid"]=="13" or $objResultSTT["accid"]=="14" or $objResultSTT["accid"]=="23" or $objResultSTT["accid"]=="29"*/ || $objResultSTT["status"]=="admin") {?>
                	<a href="../endorsee_home.php" class="parent"><span>ใบคำร้อง</span></a>
                    <div><ul>
                           <li><a href="../results_request.php"><span>ยอดใบคำร้อง</span></a></li>
                    </ul></div>
                    <? }else{?>
                	<a href="../user_home.php"><span>ใบคำร้อง</span></a>
                	<? } ?>
             </li>
            
       		<li><a href="../self/searchstudent.php" class="parent"><span>SELF</span></a>
            	<div><ul>
                    <li><a href="../self/searchstudent.php" class="parent"><span>ทะเบียนนักเรียน</span></a>
                        <div><ul>
                            <li><a href="../self/searchstudent.php"><span>ค้นหาข้อมูลนักเรียน</span></a></li>
                            <!--<li><a href="self/addstudent.php"><span>เพิ่มนักเรียนใหม่</span></a></li>-->
                            <li><a href="../self/manageaccount.php"><span>เพิ่ม account</span></a></li>
                            <li><a href="../self/shirt_search.php"><span>รับเสื้อนักเรียน</span></a></li>
                            <li><a href="../self/book_search.php"><span>รับหนังสือ</span></a></li>
                            <li><a href="../self/credit_time_search.php"><span>ขยายเวลา/เพิ่มเครดิต(free)</span></a></li>
                            <li><a href="../self/credit_time_search2.php"><span>ขยายเวลา/เพิ่มเครดิต(คิดค่าบริการ)</span></a></li>
                            <li><a href="../self/exp.php"><span>ทดลองเรียน S.E.L.F</span></a></li>
                            <li><a href="../self/trial.php"><span>ชดเชยระบบ S.E.L.F</span></a></li>
                        </ul></div>
                    </li>
                	<li><a href="../self/coursemanage.php" class="parent"><span>วิชาเรียน</span></a>
                        <div><ul>
                        	 <li><a href="../self/coursemanage.php"><span>จัดการวิชาเรียน</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>คะแนนสอบ</span></a>
                        <div><ul>
                             <li><a href="../self/addscore.php"><span>คะแนนตามรายวิชา</span></a></li>
                            <li><a href="../self/studentaddscore.php"><span>คะแนนตามรายชื่อ</span></a></li>
                        </ul></div>
                    </li>
                    <li><a href="#" class="parent"><span>ที่นั่งself</span></a>
                        <div><ul>
                            <li><a href="../self/viewseat.php"><span>ดูจำนวนที่นั่ง</span></a></li>
                            <li><a href="../self/seat.php"><span>จองเวลา</span></a></li>
                        </ul></div>
                    </li>
					<? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["accid"]=="7") {?>
                    <li><a href="#" class="parent"><span>สรุปยอด</span></a>
                        <div><ul>
                            <li><a href="../self/results_account.php"><span>ยอด account self</span></a></li>
                        </ul></div>
                    </li>
               		<? }?>
                	
            	</ul></div>
        	</li>
		</ul>
     <div id="copyright"><!--Copyright &copy; 2014--> <a href="http://apycom.com/"><!--Apycom jQuery Menus--></a></div>   
</div>
<br /><br /><br /><br />
  <div id="content">
  <br />
  <? if($_GET['type'] == "addstu"){?>
  <p>
    <form action="UploadSave.php" name="frmMain" method="post" enctype="multipart/form-data" target="iframe_target" onSubmit="return ChkSubmit();">
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
    
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="70%" align="center"> 
    <tr>
      <td width="24%" colspan="2" class="tbl2" style="white-space: nowrap;" align="center">ดึงไฟล์ธนาคาร</td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกปีการศึกษา : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <select name="term" id = "term">
                    <option value=""> -- เลือกปีการศึกษา -- </option>
                    <?
                    $strSQL = "SELECT * FROM  addterm 
                            JOIN term ON  addterm.termid = term.termid 
                            JOIN year ON  addterm.year_id =  year.id 
                            ORDER BY id_year ASC";
                    $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery)){?>
                    <option value="<?=$objResuut["id_year"];?>"><!--[<?=$objResuut["id_year"];?>]--><?=$objResuut["nameyear"];?> <?=$objResuut["term"];?></option><? }?>
            </select><font color="#EE0000"><strong> *</strong></font>
          </td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกไฟล์ธนาคาร : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="file" type="file" id="file" /><font color="#EE0000"><strong> *</strong></font>
    	  <input type="hidden" name="MAX_FILE_SIZE" value="200000000" /> 
          </td>
    </tr>
    <tr>
     	  <td width="24%" class="tbl23" style="white-space: nowrap;" align="center"></td>
		  <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="send" type="submit" class="select" value="ดึงค่า" />(.xls) <font color="#EE0000"> *เฉพาะไฟล์(.xls)</font>
          </td>
    </tr>
    </table>
    </form>
    </p>
  <? } ?>
  <? if($_GET['type'] == "addsubj"){?>
  <p>
    <form action="UploadSaveSubject.php" name="frmMain" method="post" enctype="multipart/form-data" target="iframe_target" onSubmit="return ChkSubmit();">
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
    
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="70%" align="center"> 
    <tr>
      <td width="24%" colspan="2" class="tbl2" style="white-space: nowrap;" align="center">ดึงไฟล์วิชาเรียน Excel</td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกปีการศึกษา : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <select name="term" id = "term">
                    <option value=""> -- เลือกปีการศึกษา -- </option>
                    <?
                    $strSQL = "SELECT * FROM  addterm 
                            JOIN term ON  addterm.termid = term.termid 
                            JOIN year ON  addterm.year_id =  year.id 
                            ORDER BY id_year ASC";
                    $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery)){?>
                    <option value="<?=$objResuut["id_year"];?>"><!--[<?=$objResuut["id_year"];?>]--><?=$objResuut["nameyear"];?> <?=$objResuut["term"];?></option><? }?>
            </select><font color="#EE0000"><strong> *</strong></font>
          </td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกไฟล์ธนาคาร : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="file" type="file" id="file" /><font color="#EE0000"><strong> *</strong></font>
    	  <input type="hidden" name="MAX_FILE_SIZE" value="200000000" /> 
          </td>
    </tr>
    <tr>
     	  <td width="24%" class="tbl23" style="white-space: nowrap;" align="center"></td>
		  <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="send" type="submit" class="select" value="ดึงค่า" />(.xls) <font color="#EE0000"> *เฉพาะไฟล์(.xls)</font>
          </td>
    </tr>
    </table>
    </form>
    </p>
    <? } ?>
    <? if($_GET['type'] == "addCardHMS"){?>
  <p>
    <form action="UploadSave_HmsCard.php" name="frmMain" method="post" enctype="multipart/form-data" target="iframe_target" onSubmit="return ChkSubmit();">
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
    
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="70%" align="center"> 
    <tr>
      <td width="24%" colspan="2" class="tbl2" style="white-space: nowrap;" align="center">ดึงไฟล์รายชื่อบัตร HMS ฟรี Excel</td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกปีการศึกษา : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <select name="term" id = "term">
                    <option value=""> -- เลือกปีการศึกษา -- </option>
                    <?
                    $strSQL = "SELECT * FROM  addterm 
                            JOIN term ON  addterm.termid = term.termid 
                            JOIN year ON  addterm.year_id =  year.id 
                            ORDER BY id_year ASC";
                    $objQuery = mysql_query($strSQL);
                    while($objResuut = mysql_fetch_array($objQuery)){?>
                    <option value="<?=$objResuut["id_year"];?>"><!--[<?=$objResuut["id_year"];?>]--><?=$objResuut["nameyear"];?> <?=$objResuut["term"];?></option><? }?>
            </select><font color="#EE0000"><strong> *</strong></font>
          </td>
    </tr>
    <tr>
          <td width="24%" class="tbl23" style="white-space: nowrap;" align="center">เลือกไฟล์ธนาคาร : </td>
          <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="file" type="file" id="file" /><font color="#EE0000"><strong> *</strong></font>
    	  <input type="hidden" name="MAX_FILE_SIZE" value="200000000" /> 
          </td>
    </tr>
    <tr>
     	  <td width="24%" class="tbl23" style="white-space: nowrap;" align="center"></td>
		  <td width="76%"class="tblyy" style="white-space: nowrap;" align="left">
          <input name="send" type="submit" class="select" value="ดึงค่า" />(.xls) <font color="#EE0000"> *เฉพาะไฟล์(.xls)</font>
          </td>
    </tr>
    </table>
    </form>
    </p>
    <? } ?>
    <div align="center">
    <div id="divresult"></div>
	<div id="progress" style="visibility:hidden"><img src="progress.gif"></div>
    </div>
	 <!--<script type="text/javascript"> Cufon.now(); </script>     -->            
</div>

</body>
</html>