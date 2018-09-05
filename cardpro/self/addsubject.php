<?php 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("script_link.php");?>
</head>
<body>

<!-- START PAGE SOURCE -->
<div id="container">
  <?php include('menu.php');?>
  <div id="content">
    <h1>จัดการ account </h1>
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
<style type="text/css">
#sss {
    width:691px;
    height:60px;
    background:url(images/addsub.png) no-repeat left top;
}
</style>
<script language="javascript">

function checkForm(){ 
    // if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
    //     alert("กรุณาเลือกวิชา");
    //     return false;
    // }
    if(((document.getElementById("codetransfer").value).length) == 0 ){
        alert("กรุณารหัสคอร์สโอนคอร์ส");
        return false;
    }
    /*if(((document.getElementById("Invoicenumber").value).length) == 0 ){
        alert("กรุณากรอกหมายเลขใบชำระเงิน");
        return false;
    }*/
    if(((document.getElementById("amount").value).length) == 0 ){
        alert("กรุณาราคาคอร์ส");
        return false;
    }
    if(((document.getElementById("date_pay").value).length) == 0 ){
        alert("กรุณาเลือกวันที่โอน");
        return false;
    }
    
}
function checkForm2(){ 
    if(((document.getElementById("chk").value).length) == 0 ){
        alert("กรุณาเลือกวิชาที่จะแก้ไข");
        return false;
    }
    // if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
    //     alert("กรุณาเลือกวิชา");
    //     return false;
    // }   
}
function checkForm3(){ 
    // if(((document.getElementById("h_arti_id_subj").value).length) == 0 ){
    //     alert("กรุณาเลือกวิชา");
    //     return false;
    // }
    /*if(((document.getElementById("codetransfer").value).length) == 0 ){
        alert("กรุณารหัสคอร์สโอนคอร์ส");
        return false;
    }*/
    if(((document.getElementById("amount").value).length) == 0 ){
        alert("กรุณาราคาคอร์ส");
        return false;
    }
    
    
}
</script>

<?php 
    if($objResultSTT['status'] == 'admin' && $objResultSTT['stid'] = '2') {
    if($_GET['type'] == "Add"){?>
         <form name="addstudentForm" method="post" action="addsub.php?accid=<?=$_GET["accid"]?>&type=Add&id_hms=<?=$_GET['id_hms']?>" onSubmit="return checkForm3();">
         <p><strong>+ admin เพิ่มวิชา</strong></p>
         <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                 <td width="20%" class="tblyy2" height="35">เลือกวิชา : </td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="type_self" id="type_self">
                        <option value="0" disabled="disabled" selected="selected">เลือก</option>
                        <?php
                        $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                        $objQuery_type = mysqli_query($con_ajtongmath_self,$strSQL_type) or die ("Error Query [".$strSQL_type."]");
                        while ( $result_type = mysqli_fetch_array($objQuery_type)){?>
                                <option value="<?=$result_type['type_id']?>" ><?=$result_type['type_name'];?></option>
                        <?php } ?>
                    </select>
                    <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" placeholder="ค้นหาวิชา" />
                    <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" />

                    <input name="show_arti_topic_subj_broadcast" type="text" id="show_arti_topic_subj_broadcast" size="30" value=""  placeholder="ค้นหาวิชา"/>
                    <input name="h_arti_id_subj_broadcast" type="hidden" id="h_arti_id_subj_broadcast" value="" />
                    <font color="#FF0000"> *</font>
                    <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                    <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน : </td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;          
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" /> ฟรี
                 <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="codetransfer" id="codetransfer" size="10" ><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="amount" id="amount"  size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบคำร้อง : </td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ผู้ร้องขอ : </td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <option value="0" selected='selected' >เลือก</option>
                 <?php
                 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
                 $objQuery_staff = mysqli_query($con_ajtongmath_self,$strSQL_staff);
                    while ($objResult_staff = mysqli_fetch_array($objQuery_staff)) {
                 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <?php } ?>
                 </select>
                </td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="บันทึก" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>&id_hms=<?=$_GET['id_hms']?>" style="text-decoration:none"><< กลับ</a>
                 </td>
            </tr>
             
            <?php 
                $i=1;
                $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                if($i==1){}else {} $i++; }
            ?>
            
             
           </table>
           </form>
           <?php }if($_GET['type'] == "Edit"){?>
           <form name="addstudentForm" method="post" action="updatesub.php?accid=<?=$_GET["accid"]?>&type=update" onSubmit="return checkForm2();">
            <p><strong>+ admin แก้ไขไฟล์เรียน</strong></p>
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
           <?php
                $strSQL = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = ".$_GET["accid"]." ";
                $objQuery = mysqli_query($con_ajtongmath_self, $strSQL) or die ("Error Query [".$strSQL."]");
                $Num_Rows = mysqli_num_rows($objQuery); 
            ?>
            <?php $i=0;?>
            <?php while($objResult = mysqli_fetch_array($objQuery)){ ?>
            <tr>
                <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
                <td width="20%" class="tblyy2" height="35">เลือกวิชาที่ต้องการแก้ไข : </td>
                <td width="60%" class="tblyy" height="35">
                <input type="radio" name="chk" id="chk" value="<?=$objResult["creditid"]?>"><?=$objResult["subname"]?></td>
            </tr>
            <?php $i++; } ?>
           
            <tr>
                 <td width="20%" class="tblyy2" height="35">ค้นหาวิชาใหม่ :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
                 <select name="type_self" id="type_self">
                        <option value="0" disabled="disabled" selected="selected">เลือก</option>
                        <?php
                        $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                        $objQuery_type = mysqli_query($con_ajtongmath_self, $strSQL_type) or die ("Error Query [".$strSQL_type."]");
                        while ( $result_type = mysqli_fetch_array($objQuery_type)){?>
                                <option value="<?=$result_type['type_id']?>" ><?=$result_type['type_name'];?></option>
                        <?php }?>
                    </select>
                    <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" placeholder="ค้นหาวิชา" />
                    <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" />

                    <input name="show_arti_topic_subj_broadcast" type="text" id="show_arti_topic_subj_broadcast" size="30" value=""  placeholder="ค้นหาวิชา"/>
                    <input name="h_arti_id_subj_broadcast" type="hidden" id="h_arti_id_subj_broadcast" value="" />
                    <font color="#FF0000"> *</font>
                 
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบคำร้อง :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ผู้ร้องขอ :</td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <option value="" selected='selected' >เลือก</option>
                 <?php
                 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
                 $objQuery_staff = mysqli_query($con_ajtongmath_self, $strSQL_staff);
                    while ($objResult_staff = mysqli_fetch_array($objQuery_staff)) {
                 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <?php } ?>
                 </select>
                </td>
             </tr>
             
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a>
                 </td>
             </tr>
            <?php 
                $i=1;
                $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $objQuery1 = mysqli_query($con_ajtongmath_self, $strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                if($i==1){}else {} $i++; }
            ?>
            
             
           </table>
           </form>
            <?php }if($_GET['type'] == "editall"){?>
            <form name="addstudentForm" method="post" action="addsub.php?type=editall&creditid=<?=$_GET["creditid"]?>&std=<?=$_GET['std']?>&accid=<?=$_GET["accid"]?>" onSubmit="return checkForm3();">
          <strong>+ admin แก้ไขข้อมูลรายวิชา </strong><br /><br />
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
             <?php
             $strSQL1 = "SELECT subject.subid ,subject.subname ,credit.date_pay ,credit.codetransfer ,credit.Invoicenumber ,credit.amount ,credit.no_petition,credit.no_petition_staff
             ,staff.stname ,branch.name ,staff.stid , credit.type_pay
             FROM credit 
             INNER JOIN subject ON credit.subid = subject.subid 
             INNER JOIN staff ON credit.staffid = staff.stid
             INNER JOIN branch ON staff.branchid = branch.branchid
             WHERE credit.creditid = '".$_GET['creditid']."'
             ";
            $objQuery1 = mysqli_query($con_ajtongmath_self, $strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
             ?>
             <tr>
                <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
                <input type="hidden" name="h_arti_id_subj" value="<?=$objResult1["subid"]?>"/>
                
                 <td width="20%" class="tblyy2" height="35">วิชา :</td>
                 <td width="60%" class="tblyy" height="35"><?=$objResult1["subname"];?></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน :</td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date_pay" id="date_pay" value="<?=$objResult1["date_pay"]?>"><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" <?php if($objResult1["type_pay"]== "transfer"){?>checked="checked" <?php }?> />โอน         
                 <input name="type_pay" type="radio" value="cradit" class="input4" <?php if($objResult1["type_pay"]== "cradit"){?>checked="checked"<?php }?>/> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" <?php if($objResult1["type_pay"]== "money"){?>checked="checked"<?php }?>/> เงินสด 
                 <input name="type_pay" type="radio" value="free" class="input4" <?php if($objResult1["type_pay"]== "free"){?>checked="checked"<?php }?>/> ฟรี
                 <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน :</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="codetransfer" id="codetransfer" size="10" value="<?=$objResult1["codetransfer"]?>"></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="Invoicenumber" id="Invoicenumber" value="<?=$objResult1["Invoicenumber"]?>"></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="amount" id="amount"  size="10" value="<?=$objResult1["amount"]?>">บาท </td>
             </tr>
             
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบคำร้อง</td>
                 <td width="60%" class="tblyy" height="35"><input type="text" name="noptt" id="noptt"  size="10" value="<?=$objResult1["no_petition"]?>"> </td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ผู้ร้องขอ</td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <?php 
                    $strSQL14 = "SELECT * FROM staff WHERE stid = '".$objResult1["no_petition_staff"]."' ";
                    $objQuery14 = mysqli_query($con_ajtongmath_self, $strSQL14) or die ("Error Query [".$strSQL14."]");
                    $objResult14 = mysqli_fetch_array($objQuery14);
                ?>
                 <option value="<?=$objResult1["no_petition_staff"]?>" selected='selected' ><?=$objResult14["stname"]?></option>
                 <?php
                 $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
                 $objQuery_staff = mysqli_query($con_ajtongmath_self, $strSQL_staff);
                    while ($objResult_staff = mysqli_fetch_array($objQuery_staff)) {
                 ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <?php } ?>
                 </select>
                 </td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a>
                 </td>
             </tr>
            <?php 
            }
            ?>
            
             
           </table>
           </form>
            <?php }}
            else{ ?>
         <?php if($_GET['type'] == "Add"){?>
         <form name="addstudentForm" method="post" action="addsub.php?accid=<?=$_GET["accid"]?>&type=Add&stid=<?=$_SESSION["mapid"]?>" onSubmit="return checkForm();">
          
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
            <tr>
                 <td width="20%" class="tblyy2" height="35">เลือกวิชา :</td>
                 <td width="60%" class="tblyy" height="35">
                 <select name="type_self" id="type_self">
                    <option value="0" disabled="disabled" selected="selected">เลือก</option>
                    <?php
                    $strSQL_type = "SELECT * FROM type_self WHERE type_id != 2 AND type_id != 3";
                    $objQuery_type = mysqli_query($con_ajtongmath_self, $strSQL_type) or die ("Error Query [".$strSQL_type."]");
                    while ( $result_type = mysqli_fetch_array($objQuery_type)){?>
                            <option value="<?=$result_type['type_id']?>" ><?=$result_type['type_name'];?></option>
                    <?php }?>
                 </select>
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
             </tr>
             <tr>
               <td width="20%" class="tblyy2" height="35">วันที่โอน : </td>
               <td width="60%" class="tblyy" height="35">
               <input type="date" name="date_pay" id="date_pay" value=""><font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">ประเภทการจ่าย :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;          
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                <font color="#FF0000"> *</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">รหัสคอร์สที่โอน :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="codetransfer" id="codetransfer" size="10" ><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">หมายเลขใบชำระ :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35">จำนวนเงิน :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="text" name="amount" id="amount"  size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a></td>
             </tr>
            <?php 
                $i=1;
                $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $objQuery1 = mysqli_query($con_ajtongmath_self, $strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                if($i==1){}else {} $i++; }
            ?>
           </table>
           </form>
           <?php } ?>
           
           <?php if($_GET['type'] == "Edit"){?>
           <form name="addstudentForm" method="post" action="updatesub.php?accid=<?=$_GET["accid"]?>&type=update" onSubmit="return checkForm2();">
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
           
             <?php
                $strSQL = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = ".$_GET["accid"]." ";
                $objQuery = mysqli_query($con_ajtongmath_self, $strSQL) or die ("Error Query [".$strSQL."]");
                $Num_Rows = mysqli_num_rows($objQuery); 
                $objQuery  = mysqli_query($con_ajtongmath_self, $strSQL);
            ?>
            <?php $i=0;?>
            <?php while($objResult = mysqli_fetch_array($objQuery)){ ?>
            <tr>
                 <td width="20%" class="tblyy2" height="35">เลือกวิชาที่ต้องการแก้ไข :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="radio" name="chk" id="chk" value="<?=$objResult["creditid"]?>"><?=$objResult["subname"]?></td>
            </tr>
            <?php $i++; } ?>
           
            <tr>
                 <td width="20%" class="tblyy2" height="35">ค้นหาวิชาใหม่ :</td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="hidden" name="studenname" value="<?=$_GET["studenname"]?>"/>
                 <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
                 <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
                 <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /></td>
                 
             </tr>
             <tr>
                 <td width="20%" class="tblyy2" height="35"></td>
                 <td width="60%" class="tblyy" height="35">
                 <input type="submit" name="submit" id="submit" class="submit3" value="ตกลง" >
                 <a href="viewaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET["std"]?>" style="text-decoration:none"><< กลับ</a></td>
             </tr>
            <?php 
                $i=1;
                $strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
                $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
                while ($objResult1 = mysqli_fetch_array($objQuery1)) {
                if($i==1){}else {} $i++; }
            ?>
            
             
           </table>
           </form>
           <?php } }?>
           </p>
</div>
<?php mysqli_close($con_ajtongmath_self);?>
<script type="text/javascript">

$("#show_arti_topic_subj_broadcast").hide();
$("#show_arti_topic_subj").hide();


$( "#type_self" ).change(function() {
     if($('#type_self').val() == 4){
         $("#show_arti_topic_subj").hide();
         $("#show_arti_topic_subj_broadcast").show("slow");
     }else{
         $("#show_arti_topic_subj_broadcast").hide();
         $("#show_arti_topic_subj").show("slow");
     }
});

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
        return "datasubj.php?q=" +encodeURIComponent(this.value);
    }); 
}  

function make_autocomsubjbroadcast(autoObj,showObj){
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
        return "datasubj.php?q=" +encodeURIComponent(this.value);
    }); 
}      

make_autocomsubj("show_arti_topic_subj","h_arti_id_subj");
make_autocomname("show_arti_topic_name","h_arti_id_name");
make_autocomsubjbroadcast("show_arti_topic_subj_broadcast","h_arti_id_subj_broadcast");
//Cufon.now(); 
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