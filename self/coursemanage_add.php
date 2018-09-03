<? 
session_start();
include("config.inc.php");
$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	if($_SESSION["stid"]=="")
	{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('Please Login!!');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
			exit();
		}
	$strSQLbranch = "SELECT * FROM branch WHERE branchid = '".$objResult99["branchid"]."'";
	$objQuerybranch = mysql_query($strSQLbranch);
	$objResultbranch = mysql_fetch_array($objQuerybranch);
	$branchname = $objResultbranch['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>S.E.L.F</title>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8">
<meta name="description" content="Place your description here">
<meta name="keywords" content="put, your, keyword, here">
<meta name="author" content="Templates.com - website templates provider">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.min.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_300.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/managesub.png) no-repeat left top;
}
.submit{
	width:90px;
	height:30px;
	background-color:#069;
	border-bottom-color:#CCC;
	color:#FFF;
	font-size: 10pt;
	font-family: arial;
	margin-left:80px;
}
</style>
</head>
<body id="page1">
<div class="wrap">
   <!-- header -->
   <header>
      <div class="container">
         <h1><a href="index.html">Student's site</a></h1>
         <nav>
            <ul>
               <li ><a href="home.php" class="m1">Home</a></li>
               <li><a href="addstudent.php" class="m2">STUDENT</a></li>
               <li class="current"><a href="coursemanage.php" class="m3">COURSE & SCORE</a></li>
               <li><a href="viewseat.php" class="m4">SEAT</a></li>
               <li class="last"><a href="exp.php" class="m5">Trial</a></li>
            </ul>
         </nav>
      </div>

   </header>
   <div class="container">
      <!-- aside -->


      <aside>
         <h3>MENU</h3>
         <ul class="categories">
            <li ><span><a href="coursemanage.php">จัดการวิชาเรียน</a></span></li>
            <? if($_SESSION["status"] == "adminexam" or $_SESSION["status"] == "admin"){ ?>
            <li ><span><a href="addscore.php">คะแนนตามรายวิชา</a></span></li>
            <li class="last"><span><a href="studentaddscore.php">คะแนนตามรายชื่อ</a></span></li>
            <? } ?>
         </ul>
         <form action="" id="newsletter-form">
            <fieldset>
            <div class="rowElem">
               <h2>Account</h2>
                <p>WELCOME: <?=$objResult99["stname"]?><br><?=$branchname?></p>
               <div class="clear"><a class="fright" href=javascript:if(confirm('ยืนยันการออกจากระบบ')==true){window.location='logout.php';}>ออกจากระบบ</a></div>
            </div>
            </fieldset>
         </form>
         <h2>EVEN <span>News</span></h2>
          <ul class="news">
            <?
			$strSQL = "SELECT * FROM even order by ideven desc";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		 	while($objResult = mysql_fetch_array($objQuery)){?>
            	<li><strong><?=$objResult["date"];?></strong><h4><a href="#"><?=$objResult["teven"];?></a></h4><?=$objResult["even"];?> </li>
            <? }?>
         </ul>
      </aside>
      <!-- content -->
      <section id="content">
        <div id="sss"></div>
         <div class="inside">

<? 	
	if($_POST["hdnCmd"] == "Add")
	{ 			
		$txtAddCustomerID = $_POST["txtAddCustomerID"];
		$txtAddName = $_POST["txtAddName"];
		$txtAddEmail = $_POST["txtAddEmail"];
		$txtAddCountryCode = $_POST["txtAddCountryCode"];
		$idyear = $_POST["idyear"];
		$idterm = $_POST["idterm"];
		$stid = $_SESSION["stid"];
		$date = date("y-m-d");
		$brsnchvdo = $_POST["brsnchvdo"];
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		if($txtAddCustomerID == ""){
			echo "<script language='javascript'>alert('กรุณากรอกชื่อวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddName == ""){
			echo "<script language='javascript'>alert('กรุณากรอกรหัสวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddEmail == ""){
			echo "<script language='javascript'>alert('กรุณากรอกเคดิต');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddCountryCode == ""){
			echo "<script language='javascript'>alert('กรุณากรอกแผ่น');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($idyear == 0){
			echo "<script language='javascript'>alert('กรุณาเลือกปีการศึกษา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($idterm == 0){
			echo "<script language='javascript'>alert('กรุณาเลือกเทอม');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else{	
			$strSQL = "SELECT * FROM  `addtrem` WHERE `idyear`= $idyear  AND  `idterm` = $idterm";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysql_fetch_array($objQuery);
			$idaddterm = $objResult['idaddterm'];
			
			$strSQL4 = "SELECT * FROM `subject` WHERE `code` = '".$txtAddName."' ";
			$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
			$i =0;
				while ($objResult4 = mysql_fetch_array($objQuery4)){$i++;}
					if($i != 0){
					echo "<script language='javascript'>alert('รหัสวิชาซ้ำ');</script>";
					echo "<script language='javascript'>javascript:history.back()</script>";}
		
			$strSQL1 = "SELECT * FROM  `subject` WHERE `subname`= '".$txtAddCustomerID."' AND `code` = '".$txtAddName."' AND idaddterm = '".$idaddterm."'";
			$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			$objResult1 = mysql_fetch_array($objQuery1);	
			if($objResult1 == ''){
				$strSQL = "INSERT INTO subject";
				$strSQL .="(subname,code,hour,disc,idaddterm,brsnchvdo,staffid,date_subj) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$txtAddCustomerID."','".$txtAddName."' ";
				$strSQL .=",'".$txtAddEmail."' ";
				$strSQL .=",'".$txtAddCountryCode."' ";
				$strSQL .=",'".$idaddterm."' ";
				$strSQL .=",'".$brsnchvdo."' ";
				$strSQL .=",'".$stid."' ";
				$strSQL .=",'".$date."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){echo "Error Save [".mysql_error()."]";}
				else{
					$strSQL1 = "SELECT * FROM  `subject` WHERE `subname`= '$txtAddCustomerID' AND `code` = '$txtAddName' AND idaddterm = '$idaddterm'";
					$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
					$objResult1 = mysql_fetch_array($objQuery1);	
					$subid = $objResult1["subid"];
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<script language='javascript'>window.location='coursemanage_add.php?type=Show&CusID=$subid';</script>";}
				}else{
				echo "<script language='javascript'>alert('ชื่อวิชา และรหัสวิชา มีแล้วในระบบ กรุณาทำรายการใหม่ค่ะ');</script>";
				echo "<script language='javascript'>history.go(-1)</script>";}
		}
	}
	if($_POST["hdnCmd"] == "Update")
	{
		$txtAddCustomerID = $_POST["txtAddCustomerID"];
		$txtAddName = $_POST["txtAddName"];
		$txtAddEmail = $_POST["txtAddEmail"];
		$txtAddCountryCode = $_POST["txtAddCountryCode"];
		$idyear = $_POST["idyear11"];
		$idterm = $_POST["idterm11"];
		$stid = $_SESSION["stid"];
		$subid = $_POST["subid"];
		$brsnchvdo = $_POST["brsnchvdo"];
		$date = date("y-m-d");
		
		if($txtAddCustomerID == ""){
			echo "<script language='javascript'>alert('กรุณากรอกชื่อวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddName == ""){
			echo "<script language='javascript'>alert('กรุณากรอกรหัสวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddEmail == ""){
			echo "<script language='javascript'>alert('กรุณากรอกเคดิต');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($txtAddCountryCode == ""){
			echo "<script language='javascript'>alert('กรุณากรอกแผ่น');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($idyear == 0){
			echo "<script language='javascript'>alert('กรุณาเลือกปีการศึกษา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($idterm == 0){
			echo "<script language='javascript'>alert('กรุณาเลือกเทอม');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($subid == ""){
			echo "<script language='javascript'>alert('การทำงานผิดพลาด');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else{
			$strSQL1 = "SELECT * FROM  `addtrem` WHERE `idyear`= '".$idyear."'  AND  `idterm` = '".$idterm."'";
			$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			$objResult1 = mysql_fetch_array($objQuery1);
			$idaddterm = $objResult1['idaddterm'];
			
			$strSQL6 = "SELECT * FROM  `subject` WHERE `subid`= '".$subid."'";
			$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");
			$objResult6 = mysql_fetch_array($objQuery6);
			
			if($objResult6['code'] != $txtAddName){
				$strSQL4 = "SELECT * FROM `subject` WHERE `code` = '".$txtAddName."' ";
				$objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
				$i =0;
				while ($objResult4 = mysql_fetch_array($objQuery4)){$i++;}
				if($i == 0){
					$strSQL7 = "UPDATE subject SET";
					$strSQL7 .= " subname = '$txtAddCustomerID' ";
					$strSQL7 .= ",`code`= '$txtAddName' ";
					$strSQL7 .= ",`hour`= '$txtAddEmail' ";
					$strSQL7 .= ",`disc`= '$txtAddCountryCode'";
					$strSQL7 .= ",`idaddterm` = '$idaddterm' ";
					$strSQL7 .= ",`brsnchvdo`= '$brsnchvdo' ";
					$strSQL7 .= ",`staffid`= '$stid' ";
					$strSQL7 .= ",`date_subj`= '$date' ";
					$strSQL7 .= "WHERE subid = '$subid' "	;
					$objQuery7 = mysql_query($strSQL7);
					if(!$objQuery7){echo "Error Update [".mysql_error()."<br>".$strSQL7."]";}
					else{
						echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
						echo "<script language='javascript'>alert('ทำการแก้ไขข้อมูลแล้ว1');</script>";
						echo "<script language='javascript'>javascript:window.location='coursemanage_add.php?type=Show&CusID=$subid'</script>";}
					}
				else{
					echo "<script language='javascript'>alert('รหัสวิชาซ้ำ') ;</script>";
					echo "<script language='javascript'>javascript:window.location='coursemanage_add.php?type=Edit&CusID=$subid'</script>";}
			}
			else{
			$strSQL7 = "UPDATE subject SET";
			$strSQL7 .= " subname = '$txtAddCustomerID' ";
			$strSQL7 .= ",`code`= '$txtAddName' ";
			$strSQL7 .= ",`hour`= '$txtAddEmail' ";
			$strSQL7 .= ",`disc`= '$txtAddCountryCode'";
			$strSQL7 .= ",`idaddterm` = '$idaddterm' ";
			$strSQL7 .= ",`brsnchvdo`= '$brsnchvdo' ";
			$strSQL7 .= ",`staffid`= '$stid' ";
			$strSQL7 .= ",`date_subj`= '$date' ";
			$strSQL7 .= "WHERE subid = '$subid' "	;
			$objQuery7 = mysql_query($strSQL7);
			if(!$objQuery7){echo "Error Update [".mysql_error()."<br>".$strSQL7."]";}
				else{
					echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
					echo "<script language='javascript'>alert('ทำการแก้ไขข้อมูลแล้ว2');</script>";
					echo "<script language='javascript'>javascript:window.location='coursemanage_add.php?type=Show&CusID=$subid'</script>";}
			}
		}
	}
	
?>
<? if($_GET["type"] == "Add"){?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	<input type="hidden" name="hdnCmd" value="">
	<tr>
    	<td colspan="9"  class="tbl2" style="white-space: nowrap;"><div align="center"><strong><font size="+2">+ เพิ่มวิชาเรียน SELF</font></strong></div></td>
    </tr>
    <tr>
       	<td width="21%"  class="tblyy" style="white-space: nowrap;"><strong>ชื่อวิชา</strong></td>
       	<td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddCustomerID" size="50"></td>
    </tr>
    <tr>
        <td width="17%"  class="tblyy" style="white-space: nowrap;"><strong>รหัสวิชา</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddName" size="20"></td>
    </tr>
    <tr>
        <td width="8%"   class="tblyy" style="white-space: nowrap;"><strong>เครดิต</strong></td> 
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddEmail" size="2"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td width="12%"  class="tblyy" style="white-space: nowrap;"><strong>จำนวนแผ่น</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddCountryCode" size="2"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td width="18%"  class="tblyy" style="white-space: nowrap;"><strong>ปีการศึกษา</strong></td>
        <td style="white-space:nowrap;" class="tblyy">
                  <select name="idyear" id="idyear" style="width:150px">
                  <option value="0" disabled="disabled" selected >--- เลือกปีการศึกษา ---</option>
                  <?
                    $strSQL = "SELECT * FROM year";
                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                    while($objResult = mysql_fetch_array($objQuery)) {?>         
                    <option value="<?=$objResult['idyear'];?>"><?=$objResult['nameyear']."-".$objResult['idyear'];?></option>
                    <? }?>
                    </select>
              </td>
    </tr>
    <tr>
        <td width="16%" class="tblyy" style="white-space: nowrap;"><strong>ช่วง</strong></td>
        <td style="white-space:nowrap;" class="tblyy">  
                  <select name="idterm" id="idterm"  style="width:150px">
                  <option value="0" disabled="disabled" selected >--- เลือกเทอม ---</option>
                  <?
                    $strSQL = "SELECT * FROM term";
                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                    while($objResult = mysql_fetch_array($objQuery)){?>         
                    <option value="<?=$objResult['idterm'];?>"><?=$objResult['nameterm']."-".$objResult['idterm'];?></option>
                    <? }?>
                  </select>    
              </td>
    </tr>
    <tr>
        <td width="8%" class="tblyy" ><strong>อัพแล้ว</strong></td>
        <td class="tblyy"><input type="text" name="brsnchvdo" size="50"></td>
    </tr>
    <tr>
        <td class="tblyy" width="16%"><strong>บันทึกข้อมูล</strong></td> 
        <td class="tblyy">
        <input name="btnAdd" type="submit" id="btnAdd" value="Add" onClick="frmMain.hdnCmd.value='Add';frmMain.submit();" style="width:100px">
        
    </tr>
</table>
</form>
<? }?>
<? if($_GET["type"] == "Edit" &&  $_GET["CusID"]  != ""){
	$courseid = $_GET["CusID"];
	$strSQL = "SELECT * FROM subject WHERE subid = '".$courseid."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult11 = mysql_fetch_array($objQuery);
	
?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	<input type="hidden" name="hdnCmd" value="">
    
	<tr>
    	<td colspan="9"  class="tbl2" style="white-space: nowrap;"><div align="center"><strong><font size="+2">+ แก้ไขวิชาเรียน SELF</font></strong></div>
        <input type="hidden" name="subid" value="<?=$courseid?>"></td>
    </tr>
    <tr>
       	<td width="21%"  class="tblyy" style="white-space: nowrap;"><strong>ชื่อวิชา</strong></td>
       	<td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddCustomerID" size="50" value="<?=$objResult11["subname"];?>" ></td>
    </tr>
    <tr>
        <td width="17%"  class="tblyy" style="white-space: nowrap;"><strong>รหัสวิชา</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddName" size="20" value="<?=$objResult11["code"];?>"></td>
    </tr>
    <tr>
        <td width="8%"   class="tblyy" style="white-space: nowrap;"><strong>เครดิต</strong></td> 
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddEmail" size="2" value="<?=$objResult11["hour"];?>"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td width="12%"  class="tblyy" style="white-space: nowrap;"><strong>จำนวนแผ่น</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><input type="text" name="txtAddCountryCode" size="2" value="<?=$objResult11["disc"];?>">*กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td width="18%"  class="tblyy" style="white-space: nowrap;"><strong>ปีการศึกษา</strong></td>
        
        <?
            $strSQL4 = "SELECT * FROM  `addtrem` WHERE  `idaddterm` =  '".$objResult11["idaddterm"]."'";
            $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL."]"); 
            $objResult4 = mysql_fetch_array($objQuery4);
            
            $strSQL2 = "SELECT * FROM  year WHERE idyear = '".$objResult4["idyear"]."'";
            $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]"); 
            $objResult2 = mysql_fetch_array($objQuery2);
            
            $strSQL3 = "SELECT * FROM term WHERE idterm = '".$objResult4["idterm"]."'";
            $objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL."]"); 
            $objResult3 = mysql_fetch_array($objQuery3);
            ?>
       <td style="white-space:nowrap;" class="tblyy">   
            <select name="idyear11" id="idyear11" style="width:100px">
              <option value="<?=$objResult2["idyear"];?>" selected>
                <?=$objResult2["nameyear"];?>
                </option>
              <?
                $strSQL = "SELECT * FROM year";
                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                while($objResult = mysql_fetch_array($objQuery))
                     {
            ?>
              <option value="<?=$objResult['idyear'];?>">
                <?=$objResult['nameyear']/*."-".$objResult['idyear']*/;?>
                </option>
              <? }?>
            </select>
      
        <select name="idterm11" id="idterm11" style="width:150px">
          <option value="<?=$objResult3["idterm"];?>" selected>
            <?=$objResult3["nameterm"];?>
            </option>
          <?
            $strSQL = "SELECT * FROM term";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            while($objResult = mysql_fetch_array($objQuery))
                 {
        ?>
          <option value="<?=$objResult['idterm'];?>">
            <?=$objResult['nameterm']/*."-".$objResult['idterm']*/;?>
            </option>
          <? }?>
        </select>
      </td>
    </tr>
    <tr>
        <td width="8%" class="tblyy" ><strong>อัพแล้ว</strong></td>
        <td class="tblyy"><input type="text" name="brsnchvdo" size="50" value="<?=$objResult11["brsnchvdo"];?>"></td>
    </tr>
    <tr>
        <td class="tblyy" width="16%"><strong>บันทึกข้อมูล</strong></td> 
        <td class="tblyy">
        <input name="btnAdd" type="submit" value="Update" onClick="frmMain.hdnCmd.value='Update';frmMain.submit();" style="width:100px">
        
    </tr>
</table>
</form>
<? } ?>
<? if($_GET["type"] == "Show" &&  $_GET["CusID"]  != ""){
	$courseid = $_GET["CusID"];
	$strSQL = "SELECT * FROM subject WHERE subid = '".$courseid."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult11 = mysql_fetch_array($objQuery);?>
    
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="100%">
	<input type="hidden" name="hdnCmd" value="">
    
	<tr>
    	<td colspan="9"  class="tbl2" style="white-space: nowrap;"><div align="center"><strong><font size="+2">วิชาเรียน SELF</font></strong></div>
        <input type="hidden" name="subid" value="<?=$courseid?>"></td>
    </tr>
    <tr>
       	<td width="21%"  class="tblyy" style="white-space: nowrap;"><strong>ชื่อวิชา</strong></td>
       	<td style="white-space:nowrap;" class="tblyy"><?=$objResult11["subname"];?></td>
    </tr>
    <tr>
        <td width="17%"  class="tblyy" style="white-space: nowrap;"><strong>รหัสวิชา</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><?=$objResult11["code"];?></td>
    </tr>
    <tr>
        <td width="8%"   class="tblyy" style="white-space: nowrap;"><strong>เครดิต</strong></td> 
        <td style="white-space:nowrap;" class="tblyy"><?=$objResult11["hour"];?></td>
    </tr>
    <tr>
        <td width="12%"  class="tblyy" style="white-space: nowrap;"><strong>จำนวนแผ่น</strong></td>
        <td style="white-space:nowrap;" class="tblyy"><?=$objResult11["disc"];?></td>
    </tr>
    <tr>
        <td width="18%"  class="tblyy" style="white-space: nowrap;"><strong>ปีการศึกษา</strong></td>
        
        <?
            $strSQL4 = "SELECT * FROM  `addtrem` WHERE  `idaddterm` =  '".$objResult11["idaddterm"]."'";
            $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL."]"); 
            $objResult4 = mysql_fetch_array($objQuery4);
            
            $strSQL2 = "SELECT * FROM  year WHERE idyear = '".$objResult4["idyear"]."'";
            $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL."]"); 
            $objResult2 = mysql_fetch_array($objQuery2);
            
            $strSQL3 = "SELECT * FROM term WHERE idterm = '".$objResult4["idterm"]."'";
            $objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL."]"); 
            $objResult3 = mysql_fetch_array($objQuery3);
            ?>
            <td style="white-space:nowrap;" class="tblyy">
               
               <? echo $objResult2["nameyear"];?>
               <? echo $objResult3["nameterm"];?>
               </td>
          
         
  
      </td>
    </tr>
    <tr>
        <td width="8%" class="tblyy" ><strong>อัพแล้ว</strong></td>
        <td class="tblyy"><?=$objResult11["brsnchvdo"];?></td>
    </tr>
    <tr>
        <td class="tblyy" width="16%"></td> 
        <td class="tblyy">
        <input type="button" name="" class="button" value="กลับ" onclick="window.location='coursemanage.php'" style="width:100px; height:25px;margin-top:5px"/>	
        </td>
        
    </tr>
    
</table>
</form>
<? }?>
			<? mysql_close();?>
           
			</div>
     </div>
</div>
<!-- footer -->
<footer>
   <div class="container">
      <div class="inside">
         <div class="wrapper">
            <div class="fleft">AJ-TONG <span>www.aj-tong.com</span></div>
            <div class="aligncenter">จองเวลาเรียน <a class="new_window" href="http://www.aj-tongmath.com" target="_blank" rel="nofollow">www.aj-tongmath.com</a><br/>
               คณิตศาสตร์ อ.โต้ง <a class="new_window" href="http://www.aj-tong.com" target="_blank" rel="nofollow">www.aj-tong.com</a></div>
         </div>
      </div>
   </div>
</footer>
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
		return "datacourse.php?q=" +encodeURIComponent(this.value);
    });	
}	
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
Cufon.now(); </script>
</body>
</html>