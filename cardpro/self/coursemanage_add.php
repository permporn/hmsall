<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<body>

<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
    <h1>จัดการ วิชาเรียน SELF </h1>
    <p>
    <div align="right">
    <!--<form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>-->
    </div>
    </p>
<p>
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
<? 	
	include("config.incself.php");
	
	if($_POST["hdnCmd"] == "Add")
	{ 			
		$txtAddCustomerID = $_POST["txtAddCustomerID"];
		$txtAddName = $_POST["txtAddName"];
		$txtAddEmail = $_POST["txtAddEmail"];
		$txtAddCountryCode = $_POST["txtAddCountryCode"];
		$idyear = $_POST["idyear"];
		$level = $_POST["level"];
		$idterm = $_POST["idterm"];
		$teacher = $_POST["teacher"];
		$stid = $_SESSION["mapid"];
		$date = date("y-m-d");
		$brsnchvdo = $_POST["brsnchvdo"];
		$status_branch_hms = $_POST['status_branch_hms'];
		$status_branch_school = $_POST['status_branch_school'];
		$status_delete = $_POST['status_delete'];
		$status = $_POST['status'];

		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		if($txtAddCustomerID == ""){
			echo "<script language='javascript'>alert('กรุณากรอกชื่อวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		/*else if($txtAddName == ""){
			echo "<script language='javascript'>alert('กรุณากรอกรหัสวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}*/
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
			
			// $strSQL4 = "SELECT * FROM `subject` WHERE `code` = '".$txtAddName."' ";
			// $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]");
			// $i =0;
			// 	while ($objResult4 = mysql_fetch_array($objQuery4)){$i++;}
			// 		if($i != 0){
			// 		echo "<script language='javascript'>alert('รหัสวิชาซ้ำ');</script>";
			// 		echo "<script language='javascript'>javascript:history.back()</script>";
			// 	}
		
			$strSQL1 = "SELECT * FROM  `subject` WHERE `subname`= '".$txtAddCustomerID."' AND `code` = '".$txtAddName."' AND idaddterm = '".$idaddterm."'";
			$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			$objResult1 = mysql_fetch_array($objQuery1);	
			if($objResult1 == ''){
				$strSQL = "INSERT INTO subject";
				$strSQL .="(subname,code,hour,disc,level,idaddterm,brsnchvdo,staffid,date_subj,teacherid,id_subject_real,status,status_delete,status_branch_hms,status_branch_school) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$txtAddCustomerID."','".$txtAddName."' ";
				$strSQL .=",'".$txtAddEmail."' ";
				$strSQL .=",'".$txtAddCountryCode."' ";
				$strSQL.= ",'".$level."'";
				$strSQL .=",'".$idaddterm."' ";
				$strSQL .=",'".$brsnchvdo."' ";
				$strSQL .=",'".$stid."' ";
				$strSQL .=",'".$date."'";
				$strSQL .=",'".$teacher."'";
				$strSQL .=",'".$subject_real."'";
				$strSQL .=",'".$status."'";
				$strSQL .=",'".$status_delete."'";
				$strSQL .=",'".$status_branch_hms."'";
				$strSQL .=",'".$status_branch_school."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){echo "Error Save [".mysql_error()."]";}
				else{
					$strSQL1 = "SELECT * FROM  `subject` WHERE `subname`= '$txtAddCustomerID'  AND idaddterm = '$idaddterm'";//AND `code` = '$txtAddName'
					$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
					$objResult1 = mysql_fetch_array($objQuery1);	
					$subid = $objResult1["subid"];
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<script language='javascript'>window.location='coursemanage_add.php?type=Show&CusID=$subid';</script>";}
				}else{
				echo "<script language='javascript'>alert('ชื่อวิชา มีแล้วในระบบ กรุณาทำรายการใหม่ค่ะ');</script>";
				echo "<script language='javascript'>history.go(-1)</script>";}
		}
	}
	else if($_POST["hdnCmd"] == "Update")
	{
		$txtAddCustomerID = $_POST["txtAddCustomerID"];
		$txtAddName = $_POST["txtAddName"];
		$txtAddEmail = $_POST["txtAddEmail"];
		$txtAddCountryCode = $_POST["txtAddCountryCode"];
		$idyear = $_POST["idyear11"];
		$idterm = $_POST["idterm11"];
		$stid = $_SESSION["mapid"];
		$subid = $_POST["subid"];
		$brsnchvdo = $_POST["brsnchvdo"];
		$date = date("y-m-d");
		$teacher = $_POST["teacher"];
		$subject_real = $_POST["subject_real"];
		$level = $_POST["level"];
		$status_branch_hms = $_POST['status_branch_hms'];
		$status_branch_school = $_POST['status_branch_school'];

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
					$strSQL7 .= ",`level`= '$level'";
					$strSQL7 .= ",`idaddterm` = '$idaddterm' ";
					$strSQL7 .= ",`brsnchvdo`= '$brsnchvdo' ";
					$strSQL7 .= ",`staffid`= '$stid' ";
					$strSQL7 .= ",`date_subj`= '$date' ";
					$strSQL7 .= ",`teacherid`= '$teacher' ";
					$strSQL7 .= ",`id_subject_real`= '$subject_real' ";
					$strSQL7 .= ",`status_branch_hms`= '$status_branch_hms' ";
					$strSQL7 .= ",`status_branch_school`= '$status_branch_school' ";
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
			$strSQL7 .= ",`level`= '$level'";
			$strSQL7 .= ",`idaddterm` = '$idaddterm' ";
			$strSQL7 .= ",`brsnchvdo`= '$brsnchvdo' ";
			$strSQL7 .= ",`staffid`= '$stid' ";
			$strSQL7 .= ",`date_subj`= '$date' ";
			$strSQL7 .= ",`teacherid`= '$teacher' ";
			$strSQL7 .= ",`id_subject_real`= '$subject_real' ";
			$strSQL7 .= ",`status_branch_hms`= '$status_branch_hms' ";
			$strSQL7 .= ",`status_branch_school`= '$status_branch_school' ";
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
	else if($_POST["hdnCmd"] == "Addrealsub")
	{
		$date = date("y-m-d");
		$namesubject = $_POST["namesubject"];
		$teacher = $_POST["teacher"];
		$price = $_POST['price'];
		$type_self = $_POST['type_self'];
		$strSQL1 = "SELECT * FROM  `subject_real` WHERE `name_subject_real`= '".$namesubject."' AND `id_teacher` = '".$teacher."'";
		$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
		$objResult1 = mysql_fetch_array($objQuery1);	
			if($objResult1 == ''){
				$strSQL = "INSERT INTO subject_real ";
				$strSQL .="(name_subject_real,id_teacher,price,type_self) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$namesubject."'";
				$strSQL .=",'".$teacher."' ";
				$strSQL .=",'".$price."' ";
				$strSQL .=",'".$type_self."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){echo "Error Save [".mysql_error()."]";}
				else{
					$strSQL1 = "SELECT * FROM `subject_real` WHERE `name_subject_real`= '$namesubject' AND id_teacher = '$teacher'";
					$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
					$objResult1 = mysql_fetch_array($objQuery1);	
					$id_subject_real = $objResult1["id_subject_real"];
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<script language='javascript'>window.location='coursemanage_add.php?type=Show_subject_real&CusID=$id_subject_real';</script>";}
			}else{
				echo "<script language='javascript'>alert('ชื่อวิชา มีแล้วในระบบ กรุณาทำรายการใหม่ค่ะ');</script>";
				echo "<script language='javascript'>history.go(-1)</script>";
			}
	}
	else if($_POST['hdnCmd'] == "Updaterealsub"){
		
		//echo 1;
		$date = date("y-m-d");
		$namesubject = $_POST["namesubject"];
		$teacher = $_POST["teacher"];
		$price = $_POST['price'];
		$id_subject_real = $_POST['id_subject_real'];
		$type_self = $_POST['type_self'];
		if($namesubject == ""){
			echo "<script language='javascript'>alert('กรุณากรอกชื่อวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($teacher == ""){
			echo "<script language='javascript'>alert('กรุณาเลือกวิชา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else if($price == ""){
			echo "<script language='javascript'>alert('กรุณากรอกราคา');</script>";
			echo "<script language='javascript'>javascript:history.back()</script>";}
		else{
			$strSQL7 = "UPDATE subject_real SET";
			$strSQL7 .= " name_subject_real = '$namesubject' ";
			$strSQL7 .= ",`id_teacher`= '$teacher' ";
			$strSQL7 .= ",`price`= '$price' ";
			$strSQL7 .= ",`type_self`= '$type_self' ";
			$strSQL7 .= "WHERE id_subject_real = '$id_subject_real' ";
			//echo $strSQL7;
			$objQuery7 = mysql_query($strSQL7);
			 echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
			 echo "<script language='javascript'>window.location='coursemanage_real_subject.php';</script>";
		}

	}

	else if($_POST["hdnCmd"] == "InsertDetailSubject")
	{ 			
		$subid = $_POST["subid"];
		$disc = $_POST["disc"];
		$date = date("Y-m-d");

		for($i=1;$i<=$disc;$i++){ 

			

				$strSQL1 = "SELECT * FROM  `subject_detail` WHERE `subid`= '".$subid."' AND `disc` = '".$i."'";
				$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
				$objResult1 = mysql_fetch_array($objQuery1);	
				if($objResult1){
					$strSQL7  = " UPDATE subject_detail SET";
					$strSQL7 .= " detail = '".$_POST[$i]."'";
					$strSQL7 .= " WHERE subid = '".$subid."' AND `disc` = '".$i."'";
					//echo $strSQL7."<br>";
					$objQuery = mysql_query($strSQL7);
				}
				else{
				if($_POST[$i] != ''){
				$strSQL = "INSERT INTO subject_detail ";
				$strSQL .= "( subid, disc, detail, creaddate)" ;
				$strSQL .=" VALUES (";
				$strSQL .= $subid . " , ". $i . " , '". $_POST[$i] . "' , '". $date ."' );";
				//echo $strSQL."<br>";
				$objQuery = mysql_query($strSQL);
				}
			}
			
		}
		echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
		echo "<script language='javascript'>window.location='coursemanage.php';</script>";
	}
	else{
		//echo "===".$_POST["hdnCmd"];
		//echo "<script language='javascript'>alert('Error');</script>";
	}
?>
<? if($_GET["type"] == "Add"){?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<input type="hidden" name="hdnCmd" value="">
	<input type="hidden" name="status_delete" value="0">
	<input type="hidden" name="status" value="1">
	<tr>
    	<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">เพิ่ม วิชาเรียน S.E.L.F</td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ชื่อวิชา</strong></td>
       	<td width="60%" class="tblyy" height="35"><input type="text" name="txtAddCustomerID" size="50"></td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>รหัสวิชา</strong></td>
        <td width="60%" class="tblyy" height="35"><input type="text" name="txtAddName" size="20"></td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>เครดิต</strong></td> 
        <td width="60%" class="tblyy" height="35"><input type="text" name="txtAddEmail" size="2"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>จำนวนแผ่น</strong></td>
        <td width="60%" class="tblyy" height="35"><input type="text" name="txtAddCountryCode" size="2"> *กรอกเฉพาะตัวเลข       
        </td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>ปีการศึกษา</strong></td>
        <td width="60%" class="tblyy" height="35">
                  <select name="idyear" id="idyear" style="width:150px">
                  <option value="0" disabled="disabled" selected >--- เลือกปีการศึกษา ---</option>
                  <?
                    $strSQL = "SELECT * FROM year ORDER BY  `year`.`idyear` DESC ";
                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                    while($objResult = mysql_fetch_array($objQuery)) {?>         
                    <option value="<?=$objResult['idyear'];?>"><?=$objResult['nameyear'];?></option>
                    <? }?>
                    </select>
              </td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>ช่วง</strong></td>
        <td width="60%" class="tblyy" height="35">
                  <select name="idterm" id="idterm"  style="width:150px">
                  <option value="0" disabled="disabled" selected >--- เลือกเทอม ---</option>
                  <?
                    $strSQL = "SELECT * FROM term";
                    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                    while($objResult = mysql_fetch_array($objQuery)){?>         
                    <option value="<?=$objResult['idterm'];?>"><?=$objResult['nameterm'];?></option>
                    <? }?>
                  </select>    
              </td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>อัพแล้ว</strong></td>
        <td width="60%" class="tblyy" height="35"><input type="text" name="brsnchvdo" size="50"></td>
    </tr>
    <?
		$strSQL6 = "SELECT * FROM teacher";
        $objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL."]"); 
    ?>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>ครู</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="teacher" id="teacher">
          <option selected="selected" disabled="disabled">เลือก</option>
		 <? while( $objResult6 = mysql_fetch_array($objQuery6)){ ?>
         <option value="<?=$objResult6["teacherid"];?>"><?=$objResult6["teachername"];?></option>
         <? } ?>
        </select>
        </td>
    </tr>
    <?
		$strSQL5 = "SELECT * FROM subject_real ORDER BY  `subject_real`.`id_subject_real` ASC ";
        $objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]"); 
	?>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>ชื่อวิชาจริง</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="subject_real" id="subject_real">
          <option selected="selected" disabled="disabled">เลือกชื่อวิชาจริง</option>
		 <? while( $objResult5 = mysql_fetch_array($objQuery5)){ ?>
         <option value="<?=$objResult5["id_subject_real"];?>"><?=$objResult5["name_subject_real"];?></option>
         <? } ?>
        </select>
        </td>
    </tr>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>Level วิชา</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="level" size="" value=""> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td class="tblyy2"><strong>แสดงผล</strong></td> 
        <td class="tblyy">
		  <input type="checkbox" name="status_branch_school" value="1"> โรงเรียนคณิตศาสตร์ อ.โต้ง<br>
		  <input type="checkbox" name="status_branch_hms" value="1"> HMS Franchise<br>
       	</td>
    </tr> 
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>บันทึกข้อมูล</strong></td> 
        <td width="60%" class="tblyy" height="35">
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
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<tr>
     <td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height=""> แก้ไขวิชาเรียน SELF</td>
    </tr>
	<input type="hidden" name="hdnCmd" value="">
    <input type="hidden" name="subid" value="<?=$courseid?>">
    <tr>
       	<td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ชื่อวิชา</strong></td>
       	<td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="txtAddCustomerID" size="50" value="<?=$objResult11["subname"];?>" ></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>รหัสวิชา</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="txtAddName" size="20" value="<?=$objResult11["code"];?>"></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>เครดิต</strong></td> 
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="txtAddEmail" size="2" value="<?=$objResult11["hour"];?>"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>จำนวนแผ่น</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="txtAddCountryCode" size="2" value="<?=$objResult11["disc"];?>">*กรอกเฉพาะตัวเลข 
        <a href="coursemanage_add.php?type=AddDetailSubject&CusID=<?=$courseid?>">กรอกรายละเอียด</a>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ปีการศึกษา</strong></td>
        
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
       <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
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
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>อัพแล้ว</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="brsnchvdo" size="50" value="<?=$objResult11["brsnchvdo"];?>"></td>
    </tr>
    <?
		$strSQL04 = "SELECT * FROM teacher WHERE  teacherid = '".$objResult11['teacherid']."'";
        $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]"); 
		$objResult04 = mysql_fetch_array($objQuery04);
		$strSQL4 = "SELECT * FROM teacher";
        $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL4."]"); 
    ?>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ครู</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="teacher" id="teacher">
         <option value="<?=$objResult04["teacherid"];?>" selected="selected"><?=$objResult04["teachername"];?></option>
		 <? while( $objResult4 = mysql_fetch_array($objQuery4)){ ?>
         <option value="<?=$objResult4["teacherid"];?>"><?=$objResult4["teachername"];?></option>
         <? } ?>
        </select>
        </td>
    </tr>
    <?
		$strSQL5 = "SELECT * FROM subject_real ORDER BY `subject_real`.`id_subject_real` ASC ";
        $objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]"); 
		$strSQL05 = "SELECT * FROM subject_real 
					WHERE id_subject_real =  '".$objResult11['id_subject_real']."'
					ORDER BY `subject_real`.`id_subject_real` ASC ";
        $objQuery05 = mysql_query($strSQL05) or die ("Error Query [".$strSQL05."]"); 
		$objResult05 = mysql_fetch_array($objQuery05);
    ?>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ชื่อวิชาจริง</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="subject_real" id="subject_real">
          <option selected="selected" value="<?=$objResult05["id_subject_real"];?>"><?=$objResult05["name_subject_real"];?></option>
		 <? while( $objResult5 = mysql_fetch_array($objQuery5)){ ?>
         <option value="<?=$objResult5["id_subject_real"];?>"><?=$objResult5["name_subject_real"];?></option>
         <? } ?>
        </select>
        </td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>Level วิชา</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="text" name="level" size="" value="<?=$objResult11["level"];?>"> *กรอกเฉพาะตัวเลข</td>
    </tr>
    <tr>
        <td colspan="2" width="" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>แสดงผล</strong></td> 
        <td colspan="4" width="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		  <input type="checkbox" name="status_branch_school" value="1" <? if($objResult11["status_branch_school"] == 1){ ?> checked <? }?>> โรงเรียนคณิตศาสตร์ อ.โต้ง<br>
		  <input type="checkbox" name="status_branch_hms" value="1" <? if($objResult11["status_branch_hms"] == 1){ ?> checked <? }?>> HMS Franchise<br>
       	</td>
    </tr> 
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>บันทึกข้อมูล</strong></td> 
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
         <input name="btnAdd" type="submit" id="btnAdd" value="Update" onClick="frmMain.hdnCmd.value='Update';frmMain.submit();" style="width:100px">
        <input type="button" name="" class="button" value="กลับ" onclick="window.location='coursemanage.php'" style="width:100px; height:25px;margin-top:5px"/>	
        
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
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<tr>
     <td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height=""> แก้ไขแล้ว</td>
     </tr>
	<input type="hidden" name="hdnCmd" value="">
    <input type="hidden" name="subid" value="<?=$courseid?>">
    <tr>
       	<td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ชื่อวิชา</strong></td>
       	<td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["subname"];?></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>รหัสวิชา</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["code"];?></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>เครดิต</strong></td> 
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["hour"];?></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>จำนวนแผ่น</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["disc"];?></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ปีการศึกษา</strong></td>
        
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
            <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               
               <? echo $objResult2["nameyear"];?>
               <? echo $objResult3["nameterm"];?>
               </td>
      </td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>อัพแล้ว</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["brsnchvdo"];?></td>
    </tr>
    <?
		$strSQL4 = "SELECT * FROM teacher WHERE  teacherid = '".$objResult11['teacherid']."'";
        $objQuery4 = mysql_query($strSQL4) or die ("Error Query [".$strSQL."]"); 
		$objResult4 = mysql_fetch_array($objQuery4);
    ?>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ครู</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult4["teachername"];?></td>
    </tr>
    <?
		$strSQL7 = "SELECT * FROM subject_real WHERE id_subject_real = '".$objResult11['id_subject_real']."'";
        $objQuery7 = mysql_query($strSQL7) or die ("Error Query [".$strSQL7."]"); 
		$objResult7 = mysql_fetch_array($objQuery7);
    ?>
    
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>ชื่อวิชาจริง</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult7["name_subject_real"];?></td>
    </tr>
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>Level</strong></td>
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult11["level"];?></td>
    </tr>
    <tr>
        <td colspan="2" width="" class="tblyy2" style="white-space: nowrap;" align="right"  height=""><strong>แสดงผล</strong></td> 
        <td colspan="4" width="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		  <input type="checkbox" name="status_branch_school" value="1" <? if($objResult11["status_branch_school"] == 1){ ?> checked <? }?> disabled> โรงเรียนคณิตศาสตร์ อ.โต้ง<br>
		  <input type="checkbox" name="status_branch_hms" value="1" <? if($objResult11["status_branch_hms"] == 1){ ?> checked <? }?> disabled> HMS Franchise<br>
       	</td>
    </tr> 
    <tr>
        <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""></td> 
        <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input type="button" name="" class="button" value="กลับ" onclick="window.location='coursemanage.php'" style="width:100px; height:25px;margin-top:5px"/>	
        </td>
        
    </tr>
    
</table>
</form>
<? }?>
<? if($_GET["type"] == "Addrealsub" ){?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<input type="hidden" name="hdnCmd" value="">
	<tr>
    	<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">เพิ่ม วิชาเรียน S.E.L.F จริง</td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ชื่อวิชา</strong></td>
       	<td width="60%" class="tblyy" height="35"><input type="text" name="namesubject" size="50"></td>
    </tr>
    <?
		$strSQL6 = "SELECT * FROM teacher";
        $objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL."]"); 
    ?>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>ครู</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="teacher" id="teacher">
          <option selected="selected" disabled="disabled">เลือก</option>
		 <? while( $objResult6 = mysql_fetch_array($objQuery6)){ ?>
         <option value="<?=$objResult6["teacherid"];?>"><?=$objResult6["teachername"];?></option>
         <? } ?>
        </select>
        </td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ราคา</strong></td>
       	<td width="60%" class="tblyy" height="35"><input type="text" name="price" size="50"></td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ประเภทคอร์สเรียน</strong></td>
       	<td width="60%" class="tblyy" height="35">
       		<select name="type_self" id="type_self">
                <option value="0" disabled="disabled" selected="selected">เลือก</option>
                <?
                $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                $objQuery_type = mysql_query($strSQL_type) or die ("Error Query [".$strSQL_type."]");
                while ( $result_type = mysql_fetch_array($objQuery_type)){?>
                        <option value="<?=$result_type['type_id']?>"><?=$result_type['type_name']?></option>
                <? }?>
            </select>
       	</td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>บันทึกข้อมูล</strong></td> 
        <td width="60%" class="tblyy" height="35">
        <input name="btnAdd" type="submit" id="btnAdd" value="Add" onClick="frmMain.hdnCmd.value='Addrealsub';frmMain.submit();" style="width:100px">
        
    </tr>
</table>
</form>
<? }?>
<? if($_GET["type"] == "EditSubjectReal" ){
$id_subject_real = $_GET["CusID"];
$strSQL5 = "SELECT * FROM subject_real WHERE id_subject_real= '".$id_subject_real."'";
$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysql_fetch_array($objQuery5); ?>

<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<input type="hidden" name="hdnCmd" value="Updaterealsub">
	<input type="hidden" name="id_subject_real" value="<?=$id_subject_real?>">
	<tr>
    	<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">แก้ไข วิชาเรียน S.E.L.F จริง</td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ชื่อวิชา</strong></td>
       	<td width="60%" class="tblyy" height="35"><input type="text" name="namesubject" size="50" value="<?=$objResult5["name_subject_real"]?>"></td>
    </tr>
    <?
		$strSQL6 = "SELECT * FROM teacher";
        $objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL."]"); 

    ?>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>ครู</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height="">
		<select name="teacher" id="teacher">
          <option selected="selected" disabled="disabled">เลือก</option>
		 <? while( $objResult6 = mysql_fetch_array($objQuery6)){ ?>
         <option value="<?=$objResult6["teacherid"];?>" <? if($objResult5['id_teacher'] == $objResult6["teacherid"]){?> selected="selected" <? }?>><?=$objResult6["teachername"];?>
         	
         </option>
         <? } ?>
        </select>
        </td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ราคา</strong></td>
       	<td width="60%" class="tblyy" height="35"><input type="text" name="price" value="<?=$objResult5["price"]?>"> บาท</td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ประเภทคอร์สเรียน</strong></td>
       	<td width="60%" class="tblyy" height="35">
       		<select name="type_self" id="type_self">
                <option value="0" disabled="disabled" selected="selected">เลือก</option>
                <?
                $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                $objQuery_type = mysql_query($strSQL_type) or die ("Error Query [".$strSQL_type."]");
                while ( $result_type = mysql_fetch_array($objQuery_type)){?>
                        <option value="<?=$result_type['type_id']?>" <? if($objResult5['type_self'] == $result_type["type_id"]){?> selected="selected" <? }?>><?=$result_type['type_name'];?></option>
                <? }?>
            </select>
       	</td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong>อัพเดทข้อมูล</strong></td> 
        <td width="60%" class="tblyy" height="35">
        <input name="btnAdd" type="submit" id="btnUpdate" value="Update" onClick="frmMain.hdnCmd.value='Updaterealsub';frmMain.submit();" style="width:100px">
        <input type="button" name="" class="button" value="กลับ" onclick="window.location='coursemanage_real_subject.php'" style="width:100px; height:25px;margin-top:5px"/>	   
    </tr>
</table>
</form>
<? }?>
<? if($_GET["type"] == "Show_subject_real" &&  $_GET["CusID"]  != ""){
	
$id_subject_real = $_GET["CusID"];
$strSQL5 = "SELECT * FROM subject_real WHERE id_subject_real= '".$id_subject_real."'";
$objQuery5 = mysql_query($strSQL5) or die ("Error Query [".$strSQL5."]");
$objResult5 = mysql_fetch_array($objQuery5); 
?>
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
   
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<input type="hidden" name="hdnCmd" value="">
    <input type="hidden" name="subid" value="">
	<tr>
    	<td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">เพิ่ม วิชาเรียน S.E.L.F จริง</td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ชื่อวิชา</strong></td>
       	<td width="60%" class="tblyy" height="35"><?=$objResult5["name_subject_real"]?></td>
    </tr>
    <?
		$strSQL04 = "SELECT * FROM teacher WHERE teacherid = '".$objResult5['id_teacher']."'";
        $objQuery04 = mysql_query($strSQL04) or die ("Error Query [".$strSQL04."]"); 
		$objResult04 = mysql_fetch_array($objQuery04);
    ?>
    <tr>
        <td colspan="" class="tblyy2" style="white-space: nowrap;" align="left"  height=""><strong>ครู</strong></td>
        <td colspan="" class="tblyy" style="white-space: nowrap;" align="left"  height=""><?=$objResult04["teachername"];?></td>
    </tr>
    <tr>
       	<td width="20%" class="tblyy2" height="35"><strong>ราคา</strong></td>
       	<td width="60%" class="tblyy" height="35"><?=$objResult5["price"]?></td>
    </tr>
    <tr>
        <td width="20%" class="tblyy2" height="35"><strong></strong></td> 
        <td width="60%" class="tblyy" height="35">
        <input type="button" name="" class="button" value="กลับ" onclick="window.location='coursemanage_real_subject.php'" style="width:100px; height:25px;margin-top:5px"/>	
        
    </tr>
</table>
</form>
<? }?>
<? if($_GET["type"] == "AddDetailSubject" &&  $_GET["CusID"]  != ""){
	$courseid = $_GET["CusID"];
	$strSQL = "SELECT * FROM subject WHERE subid = '".$courseid."'";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult_adddetail = mysql_fetch_array($objQuery);
	$disc = $objResult_adddetail['disc'];

	$strSQL_detail = "SELECT * FROM subject_detail WHERE subid = '".$courseid."'";
	$objQuery_detail = mysql_query($strSQL_detail) or die ("Error Query [".$strSQL_detail."]");
	while ($objResult_detail = mysql_fetch_array($objQuery_detail)){
		$detail[] = $objResult_detail['detail'];
	}
 ?>   
<form name="frmMain" method="post" action="<?=$_SERVER["PHP_SELF"];?>" >
    
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
	<tr>
    <td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height=""> กรอกรายละเอียดแผ่นไฟล์ <?=$objResult_adddetail['subname']?></td>
    </tr>
	<input type="hidden" name="hdnCmd" value="">
    <input type="hidden" name="subid" value="<?=$courseid?>">
    <input type="hidden" name="disc" value="<?=$disc?>">
    <?
    for($i=1;$i<=$disc;$i++){
    ?>
    <tr>
       	<td colspan="1" class="tblyy2" align="right"><strong>แผ่นที่ <?=$i?></strong></td>
       	<td colspan="5" class="tblyy" align="left">
       		<input width="100px" value="<?=$detail[$i-1]?>" name="<?=$i;?>" />
       	</td>
    </tr>
    <? }?>
    <tr>
        <td colspan="1" class="tblyy2" style="white-space: nowrap;" align="right"  height=""></td> 
        <td colspan="5" class="tblyy" style="white-space: nowrap;" align="left"  height="">
        <input name="btnAdd" type="submit" id="btnAdd" value="Add" onClick="frmMain.hdnCmd.value='InsertDetailSubject';frmMain.submit();" style="width:100px">
        </td>
    </tr>   
</table>
</form>
<? }?>
</p>
</div>
<? mysql_close();?>
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
</script>

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
make_autocom("show_arti_topic","h_arti_id");
</script>

</body>
</html>