<?php 
session_start();
// include("config.inc.php");
// include("../funtion.php");
include("../ck_session_self.php"); 
include("../funtion.php");
include("../config_multidb.php");

// $strSTT = "SELECT * FROM staff WHERE stid = '".$_SESSION["mapid"]."'";
//   $objQuerySTT = mysql_query($strSTT);
//   $objResultSTT = mysql_fetch_array($objQuerySTT);
//   $_SESSION["db"] = "selfdb";
  //echo $_SESSION["mapid"];
  
  // if($_SESSION["mapid"] == ""){
  //   echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
  //   echo "<script language='javascript'>alert('Please Login!!');</script>";
  //   echo "<meta http-equiv='refresh' content='0;URL=../Login.php'>";
  //   exit();
  // }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/jquery-1.9.1.js" ></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.js" ></script>
<link rel="stylesheet" href="css/smoothness-jquery-ui.css">
<? include("script_link.php");?>
</head>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
<? include('menu.php');?>
<div id="content">
<h1>แก้ไข ลบช่วงเวลาที่นั่ง SELF </h1>
<p> <strong>+ admin  แก้ไข ลบช่วงเวลาที่นั่ง SELF </strong></p> 
<form id="form1" name="form1" method="post" action="seat_delseat.php">
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
<tr>
    <td width="20%" class="tblyy2" height="35">เลือกช่วงวันที่ : </td>
    <td width="60%" class="tblyy" height="35">
<input class="input" type="date" value="เลือกวันที่"	 id="date0" name="date0" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />

<input class="input" type="date" value="เลือกวันที่"	 id="date1" name="date1" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
</td>
</tr>
<tr>
    <td width="20%" class="tblyy2" height="35">เลือกช่วงเวลา : </td>
    <td width="60%" class="tblyy" height="35">
    เวลาปิด
   <select name="time" id="time">
       <option>เลือกเวลา</option>
       <option value="1">8.00</option>
       <option value="2">8.30</option>
       <option value="3">9.00</option>
       <option value="4">9.30</option>
       <option value="5">10.00</option>
       <option value="6">10.30</option>
       <option value="7">11.00</option>
       <option value="8">11.30</option>
       <option value="9">12.00</option>
       <option value="10">12.30</option>
       <option value="11">13.00</option>
       <option value="12">13.30</option>
       <option value="13">14.00</option>
       <option value="14">14.30</option>
       <option value="15">15.00</option>
       <option value="16">15.30</option>
       <option value="17">16.00</option>
       <option value="18">16.30</option>
       <option value="19">17.00</option>
       <option value="20">17.30</option>
       <option value="21">18.00</option>
       <option value="22">18.30</option>
       <option value="23">19.00</option>
       <option value="24">19.30</option>
       <option value="25">20.00</option>
     </select>
    ถึง
    <select name="timeend" id="timeend">
       <option>เลือกเวลา</option>
       <option value="1">8.00</option>
       <option value="2">8.30</option>
       <option value="3">9.00</option>
       <option value="4">9.30</option>
       <option value="5">10.00</option>
       <option value="6">10.30</option>
       <option value="7">11.00</option>
       <option value="8">11.30</option>
       <option value="9">12.00</option>
       <option value="10">12.30</option>
       <option value="11">13.00</option>
       <option value="12">13.30</option>
       <option value="13">14.00</option>
       <option value="14">14.30</option>
       <option value="15">15.00</option>
       <option value="16">15.30</option>
       <option value="17">16.00</option>
       <option value="18">16.30</option>
       <option value="19">17.00</option>
       <option value="20">17.30</option>
       <option value="21">18.00</option>
       <option value="22">18.30</option>
       <option value="23">19.00</option>
       <option value="24">19.30</option>
       <option value="25">20.00</option>
     </select>
</td>
</tr>
<tr>
    <td width="20%" class="tblyy2" height="35">สาขา : </td>
    <td width="60%" class="tblyy" height="35">
    <!-- <select name="local"  id="local" class="input2 input1" >
        <option value="" onfocus="this.value='';" onblur="if(this.value=='') this.value='เลือกสาขา'" onFocus="if(this.value =='เลือกสาขา' ) this.value=''">เลือกสาขา</option>
        <option value="1">พญาไท ชั้น 10 </option>
        <option value="5">พญาไท ชั้น 9 </option>
        <option value="4">พญาไท ชั้น 2 </option>
        <option value="2">วงเวียนใหญ่</option>
        <option value="3">วิสุทธิธานี</option>
        <option value="6">สระบุรี สุขอนันต์ ปาร์ค</option>
        <option value="7">ชลบุรี</option>
        <option value="8">ราชบุรี</option>
        <option value="10">หาดใหญ่</option>
<option value="11">เพชรบุรี</option>
<option value="12">นครปฐม</option>
<option value="13">สุราษธานี</option>
<option value="14">ภูเก็ต</option>
     </select> -->
     <select name="local"  id="local" class="input2 input1" >
              <option value="0" disabled="disabled" selected="selected">เลือก</option>
              <?
              $strSQL_branch = "SELECT * FROM branch WHERE status_branch != 0";
              $objQuery_branch = mysql_query($strSQL_branch,$connect_self) or die ("Error Query [".$strSQL_branch."]");
              while ( $result_branch = mysql_fetch_array($objQuery_branch)){
                 if($result_branch['branchid'] == $id_branch_self || $account_status == "admin" || $account_status == "admin_hms"){?>
                      <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
              <? }
              } ?>
       </select> 
</td>
</tr>
<tr>
    <td width="20%" class="tblyy2" height="35">บันทึก : </td>
    <td width="60%" class="tblyy" height="35">
    <input type="hidden" name="hiddenField" id="hiddenField">
    <input type="submit" name="Save" id="Save" value="Save">
</td>
</tr>
</table>               
</form>
</body>
</html>