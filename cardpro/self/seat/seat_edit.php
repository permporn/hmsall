<?php 
session_start();
include("ck_session_self.php"); 
include("../funtion.php");
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
<? //include('menu.php');?>
<div id="content">
<h1>แก้ไขที่นั่ง SELF</h1>
<p> <strong>+ admin  แก้ไข บวก-ลบ ที่นั่ง SELF</strong></p> 
 
<form id="form1" name="form1" method="post" action="seat_editseat.php">
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
<tr>
    <td width="20%" class="tblyy2" height="35">เลือกช่วงวันที่ : </td>
    <td width="60%" class="tblyy" height="35">
    <input class="input" type="date" value="เลือกวันที่"   id="date0" name="date0" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
    <input class="input" type="date" value="เลือกวันที่"   id="date1" name="date1" onblur="if(this.value=='') this.value='เลือกวันที่'" onFocus="if(this.value =='เลือกวันที่' ) this.value=''" />
</td>
</tr>
<tr>
    <td width="20%" class="tblyy2" height="35">เลือกช่วงเวลา : </td>
    <td width="60%" class="tblyy" height="35">
       <select name="time" id="time">
           <option>เลือกเวลาเปิด</option>
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
        
        <select name="timeend" id="timeend">
           <option>เลือกเวลาปิด</option>
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
    <td width="20%" class="tblyy2" height="35">ประเภทแก้ไข : </td>
    <td width="60%" class="tblyy" height="35">
    <input type="radio" name="addsub" value="plus">บวก
    <input type="radio" name="addsub" value="sub">ลบ
    <label>จำนวน</label>
    <input class="input" type="text"  name="nums1" id="nums1" />
</td>
</tr>
<tr>
    <td width="20%" class="tblyy2" height="35">สาขา : </td>
    <td width="60%" class="tblyy" height="35"> 
      <select name="local"  id="local" class="input2 input1" >
        <option value="0" disabled="disabled" selected="selected">เลือก</option>
        <?
        $strSQL_branch = "SELECT * FROM branch WHERE status_branch != 0";
        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){
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
    <a href="../../index.php"> กลับหน้าแรก</a>
</td>
</tr>
</table>
</form>
</body>
</html>