<? 
ob_start();
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
    <h1>จัดการ account self โปรโมชั่น self after school</h1>
    <p>
    <div align="right">
    <form action="searchstudent.php" method="get" id="search-form">
        <label >ค้นหารายชื่อ:</label>
        <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
        <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
    </form>
    </div>
    </p>
<p>
<SCRIPT LANGUAGE="JavaScript">
function checkForm(){ 
	if(((document.getElementById("show_arti_topic_name").value).length) == 0 ){
		alert("กรุณากรอกชื่อ-นามสุกล");
		return false;
	}
	if(((document.getElementById("show_arti_topic_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}
	if(((document.getElementById("date_pay").value).length) == 0 ){
		alert("กรุณาเลือกวันที่โอน");
		return false;
	}
	if(((document.getElementById("date").value).length) == 0 ){
		alert("กรุณาเลือกเริ่มใช้งาน");
		return false;
	}
	/*if(((document.getElementById("edate").value)) == 0 ){
		alert("กรุณาเลือกอายุการใช้งาน");
		return false;
	}*/
	/*if(((document.getElementById("status").value)) == 0 ){
		alert("กรุณาเลือกสถานที่");
		return false;
	}*/
	/*if(((document.getElementById("Invoicenumber").value).length) == 0 ){
		alert("กรุณากรอกหมายเลขใบชำระเงิน");
		return false;
	}*/
	if(((document.getElementById("codetransfer").value).length) == 0 ){
		alert("กรุณารหัสคอร์สโอนคอร์ส");
		return false;
	}
	if(((document.getElementById("amount").value).length) == 0 ){
		alert("กรุณาราคาคอร์ส");
		return false;
	}
	
}

</SCRIPT>
<SCRIPT LANGUAGE="JavaScript">
function checkForm2(){ 
	if(((document.getElementById("show_arti_topic_name").value).length) == 0 ){
		alert("กรุณากรอกชื่อ-นามสุกล");
		return false;
	}
	if(((document.getElementById("show_arti_topic_subj").value).length) == 0 ){
		alert("กรุณาเลือกวิชา");
		return false;
	}
	if(((document.getElementById("date_pay").value).length) == 0 ){
		alert("กรุณาเลือกวันที่โอน");
		return false;
	}
	if(((document.getElementById("date").value).length) == 0 ){
		alert("กรุณาเลือกเริ่มใช้งาน");
		return false;
	}
	/*if(((document.getElementById("edate").value)) == 0 ){
		alert("กรุณาเลือกอายุการใช้งาน");
		return false;
	}
	if(((document.getElementById("status").value)) == 0 ){
		alert("กรุณาเลือกสถานที่");
		return false;
	}*/
	if(((document.getElementById("codetransfer").value).length) == 0 ){
		alert("กรุณารหัสคอร์สโอนคอร์ส");
		return false;
	}
	if(((document.getElementById("amount").value).length) == 0 ){
		alert("กรุณาราคาคอร์ส");
		return false;
	}
	
}

</SCRIPT>
<script type="text/javascript">  
$(function(){  
    // แทรกโค้ต jquery  
    $("#date").datepicker({ dateFormat: 'dd-mm-yy',minDate: 0 });
	
});  
</script>
<style type="text/css">  
.ui-datepicker{  
    width:180px;  
    font-family:tahoma;  
    font-size:11px;  
    text-align:center;  
}  
</style>  
<style type="text/css">
#sss {
	width:691px;
	height:60px;
	background:url(images/addaccount.png) no-repeat left top;
}
#hh{
	font-size:11px;
	color:#666;
	font-family:Tahoma, Geneva, sans-serif;
}
</style>

<? 
$strSQL1 = "SELECT * FROM counter";
$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
$objResult1 = mysqli_fetch_array($objQuery1);
$c=$objResult1["count"];
$c++;
$strSQL = "UPDATE counter SET ";
	$strSQL .="count = '$c' ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysqli_error()."]";
	}
?>
      <? if($objResultSTT['status'] == 'admin' /*&& $objResultSTT['stid'] = 2*/) {?>
            <form name="studentForm" method="post" action="manageacc.php" onSubmit="return checkForm2();">
           	<?
            $strSQL = "SELECT * FROM counter";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			$objResult = mysqli_fetch_array($objQuery);
            $counter=$objResult["count"];
            $fix="AFT0"; 
            	for($i=0;$i<5-strlen($counter);$i++){
					$fix=$fix."0";
					}
					$fix=$fix.$objResult["count"];
             ?>
           <p> <strong>+ admin เพิ่ม account</strong></p>
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
             <tr>
               <td width="20%" class="tblyy2" height="35">Username : </td>
               <td width="60%" class="tblyy" height="35">
               <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
               <input type="text" name="account" id="account" value="<?=$fix; ?>" readonly></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 8); ?>
               <td width="20%" class="tblyy2" height="35">Password : </td>
               <td width="60%" class="tblyy" height="35">
               <input type="text" name="password" id="password" value="<?=$random; ?>" readonly></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">ชื่อ-นามสกุล : </td>
               <td width="60%" class="tblyy" height="35">
                 <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
                 <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" />
                 <a href="addstudent.php?type=addacount">เพิ่มรายชื่อ</a>
                 <br />
                    <font color="#FF0000">
                    <strong> *</strong>การเพิ่มรายชื่อใหม่ต้องแน่ใจว่าไม่มีรายชื่อในระบบจริงๆ 
                    เพื่อเป็นการไม่ให้รายชื่อซ้ำซ้อน กรุณาค้นหารายชื่อในระบบให้ละเอียดก่อนเพิ่มใหม่ </font> 
                    ( แนะนำการค้นหารายชื่อ ให้ค้นหาจากนามสกุลก่อน )
                 </td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วิชา : </td>
               <td width="60%" class="tblyy" height="35">
               <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
               <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน : </td>
               <td width="60%" class="tblyy" height="35"><input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> * วัน/เดือน/ค.ศ</font></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันเริ่มใช้งาน :</td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date" id="date" value=""><font color="#FF0000"> * วันเริ่มใช้งาน accout (วัน/เดือน/ค.ศ)</font></td>
             </tr>
             <!--<tr>
               <td width="20%" class="tblyy2" height="35">อายุการใช้งาน :</td>
               <td width="60%" class="tblyy" height="35">
                <select name="edate" id="edate"> 
                <option value="0" disabled selected>เลือก</option>
               	<option value="1">6 เดือน</option>
                <option value="2">1 ปี</option>
                <option value="3">1 ปี 6 เดือน</option>
                <option value="4">2 ปี</option>
                <select>
                <font color="#FF0000"> *</font>
                </td>
             </tr>-->
             <input type="hidden" name="edate" value="0"/>
             <!-- <input type="hidden" name="status" value="111"/> -->
             <input type="hidden" name="status_pro" value="100"/>
             <!--<tr>
               <td width="20%" class="tblyy2" height="35">เรียนสาขา : </td>
               <td width="60%" class="tblyy" height="35">
               	<select name="status" id="status">
                       <option value="0" disabled="disabled" selected="selected">เลือก</option>
                       <option value="1" >เรียนได้ทุกสาขา</option>
                       <option value="2">เฉพาะวงเวียนใหญ่</option>
                       <option value="3">เฉพาะวิสุทธิ</option>
                       <option value="6">เฉพาะสระบุรี</option>
                       <option value="7">เฉพาะชลบุรี</option>
                       <option value="8">เฉพาะราชบุรี</option>
                  </select><font color="#FF0000"> *</font>
               </td>
             </tr>-->
             <tr>
                <td width="20%" class="tblyy2" height="35">เรียนสาขา:</td>
                <td width="60%" class="tblyy" height="35">
                    <select name="status" id="status">
                        <option value="0" disabled="disabled" selected="selected">เลือก</option>
                        <?
                        $strSQL_branch = "SELECT * FROM branch";
                        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){
                            if($result_branch['branchid'] == $id_branch_self){?>
                                <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                        <? }}?>
                    </select><font color="#FF0000"> *</font>
                </td>
            </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
    			 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" /> ฟรี
                 <font color="#FF0000"> * กรณีเงินสดไม่ต้องกรอกหมายเลขใบชำระ</font></font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน :</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="codetransfer" id="codetransfer" size="10"><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน ตย.HA0101</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ :</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 / **เงินสดไม่ต้องกรอก </font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน :</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="amount" id="amount"   size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                <td width="20%" class="tblyy2" height="35" colspan="2"><strong>- จ่ายหนังสือ</strong>
                </td>
             <tr>
              	<td width="20%" class="tblyy2" height="35">สถานะหนังสือ/เล่ม :</td>
                <td width="60%" class="tblyy" height="35">
                <input type="radio" name="book_status" value="ครบ" <? if($objResult1["book_status"]=="ครบ"){?>checked="checked"<? }?>>ครบ
				<input type="radio" name="book_status" value="ขาด" <? if($objResult1["book_status"]=="ขาด" || $objResult1["book_status"]==""){?>checked="checked"<? }?>>ขาด
             	</td>
             </tr>
             <tr>
              	<td width="20%" class="tblyy2" height="35">จำนวนที่จ่ายไป :</td>
                <td width="60%" class="tblyy" height="35"><input name="book_num" type="text" value="<?=$objResult1["book_num"]?>" style="width:40px"> เล่ม <font color="#FF0000">* ขาดหรือครบ ต้องกรอกจำนวนเล่ม</font></td>
             </tr>
             <tr>
              	<td width="20%" class="tblyy2" height="35">รายละเอียด :</td>
                <td width="60%" class="tblyy" height="35"><textarea id="book_detail" name="book_detail" rows="4" cols="30"><?=$objResult1["book_detail"]?></textarea><font color="#FF0000">*(ในกรณีที่ขาด)</font></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35"></td>
               <td width="60%" class="tblyy" height="35">
               <input type="submit" name="submit" id="submit" value="บันทึก">
               <a href="searchstudent.php" style="text-decoration:none">>> ยกเลิก</a>
               </td>
             </tr>
           </table>
           </form>
		
		
		<? }else{?>
         <form name="studentForm" method="post" action="manageacc.php" onSubmit="return checkForm();">
           	<?
            $strSQL = "SELECT * FROM counter";
      			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
      			$objResult = mysqli_fetch_array($objQuery);
            $counter=$objResult["count"];
            $fix="AFT0"; 
            	for($i=0;$i<5-strlen($counter);$i++){
					       $fix=$fix."0";
					     }
					   $fix=$fix.$objResult["count"];
            ?>
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
             <tr>
               <td width="20%" class="tblyy2" height="35">Username :</td>
               <td width="60%" class="tblyy" height="35">
               <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
               <input type="text" name="account" id="account" value="<?=$fix; ?>" readonly></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 8); ?>
               <td width="20%" class="tblyy2" height="35">Password:</td>
               <td width="60%" class="tblyy" height="35">
               <input type="text" name="password" id="password" value="<?=$random; ?>" readonly></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">ชื่อ-นามสกุล:</td>
               <td width="60%" class="tblyy" height="35">
                 <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
                 <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" />
                 <a href="addstudent.php?type=addacount">เพิ่มรายชื่อ</a>
                  <br />
                    <font color="#FF0000">
                    <strong> *</strong>การเพิ่มรายชื่อใหม่ต้องแน่ใจว่าไม่มีรายชื่อในระบบจริงๆ 
                    เพื่อเป็นการไม่ให้รายชื่อซ้ำซ้อน กรุณาค้นหารายชื่อในระบบให้ละเอียดก่อนเพิ่มใหม่ </font> 
                    ( แนะนำการค้นหารายชื่อ ให้ค้นหาจากนามสกุลก่อน )</td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วิชา:</td>
               <td width="60%" class="tblyy" height="35">
               <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
               <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน:</td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> * วัน/เดือน/ค.ศ</font></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันเริ่มใช้งาน:</td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date" id="date" value="<?=date("d-m-Y"); ?> "><font color="#FF0000"> * วันเริ่มใช้งาน accout</font></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">อายุการใช้งาน:</td>
               <td width="60%" class="tblyy" height="35">
                <select name="edate" id="edate"> 
                <option value="0" disabled selected>เลือก</option>
               	<option value="1">6 เดือน</option>
                <option value="2">1 ปี</option>
                <option value="3">1 ปี 6 เดือน</option>
                <option value="4">2 ปี</option>
                <select>
                <font color="#FF0000"> *</font>
                </td>
             </tr>
             <!-- <input type="hidden" name="edate" value="0"/>
             <input type="hidden" name="status" value="111"/> -->
             <input type="hidden" name="status_pro" value="100"/>
             <!--<tr>
               <td width="20%" class="tblyy2" height="35">เรียนสาขา:</td>
               <td width="60%" class="tblyy" height="35">
                 <select name="status" id="status">
                 <option value="0" disabled="disabled" selected="selected">เลือก</option>
                       <option value="1" >เรียนได้ทุกสาขา</option>
                       <option value="2">เฉพาะวงเวียนใหญ่</option>
                       <option value="3">เฉพาะวิสุทธิ</option>
                       <option value="6">เฉพาะสระบุรี</option>
                       <option value="7">เฉพาะชลบุรี</option>
                       <option value="8">เฉพาะราชบุรี</option>
                  </select><font color="#FF0000"> *</font>
               </td>
             </tr>-->
              <tr>
                <td width="20%" class="tblyy2" height="35">เรียนสาขา:</td>
                <td width="60%" class="tblyy" height="35">
                    <select name="status" id="status">
                        <option value="0" disabled="disabled" selected="selected">เลือก</option>
                        <?
                        $strSQL_branch = "SELECT * FROM branch";
                        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){
                            if($result_branch['branchid'] == $id_branch_self){?>
                                <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                        <? }}?>
                    </select><font color="#FF0000"> *</font>
                </td>
              </tr>
              <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย:</td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;			
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <font color="#FF0000"> * กรณีเงินสดไม่ต้องกรอกหมายเลขใบชำระ</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน:</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="codetransfer" id="codetransfer" size="10"><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน ตย.HA0101</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ:</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน:</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="amount" id="amount"   size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                <td width="20%" class="tblyy2" height="35" colspan="5" ><strong>- จ่ายหนังสือ</strong></td>
                </td>
             <tr>
              	<td width="20%" class="tblyy2" height="35">สถานะหนังสือ/เล่ม</td>
                <td width="60%" class="tblyy" height="35">
                <input type="radio" name="book_status" value="ครบ" <? if($objResult1["book_status"]=="ครบ"){?>checked="checked"<? }?>>ครบ
				<input type="radio" name="book_status" value="ขาด" <? if($objResult1["book_status"]=="ขาด" || $objResult1["book_status"]==""){?>checked="checked"<? }?>>ขาด
             	</td>
             </tr>
             <tr>
              	<td width="20%" class="tblyy2" height="35">จำนวนที่จ่ายไป</td>
                <td width="60%" class="tblyy" height="35">
                <input name="book_num" type="text" value="<?=$objResult1["book_num"]?>" style="width:40px"> เล่ม <font color="#FF0000">* ขาดหรือครบ ต้องกรอกจำนวนเล่ม</font></td>
             </tr>
             <tr>
              	<td width="20%" class="tblyy2" height="35">รายละเอียด</td>
                <td width="60%" class="tblyy" height="35">
                <textarea id="book_detail" name="book_detail" rows="4" cols="30"><?=$objResult1["book_detail"]?></textarea><font color="#FF0000">*(ในกรณีที่ขาด)</font></td>
             </tr>
             
             <tr>
               <td width="20%" class="tblyy2" height="35"></td>
               <td width="60%" class="tblyy" height="35">
               <input type="submit" name="submit" id="submit" value="บันทึก">
               <a href="searchstudent.php" style="text-decoration:none">>> ยกเลิก</a>
               </td>
             </tr>
           </table>
           </form>
          <? }?>
           </p>
</div>
<? mysqli_close($con_ajtongmath_self);?>
<script type="text/javascript">
function make_autocomname(autoObj,showObj){
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
		return "dataname.php?q=" +encodeURIComponent(this.value);
    });	
}		

function make_autocomsubj(autoObj,showObj){
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
		return "datasubj_franchise.php?q=" +encodeURIComponent(this.value);
    });	
}		

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
Cufon.now(); 
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
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>