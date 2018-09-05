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
    <h1>ชดเชยระบบ S.E.L.F</h1>
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
<script language="javascript">

function checkForm(){ 
  if(((document.getElementById("show_arti_topic_name").value).length) == 0 ){
    alert("กรุณากรอกชื่อ-นามสุกล");
    return false;
  }
  if(((document.getElementById("show_arti_topic_subj").value).length) == 0 ){
    alert("กรุณาเลือกวิชา");
    return false;
  }
  if(((document.getElementById("status").value)) == 0 ){
    alert("กรุณาเลือกสถานที่");
    return false;
  }
  if(((document.getElementById("totalcredit").value)) == 0 ){
    alert("กรุณาเลือกชั่วโมงเรียน");
    return false;
  }
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
  
}

</script>
<script type="text/javascript">  
$(function(){  
    // แทรกโค้ต jquery  
    $("#date").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
  $("#edate").datepicker({ dateFormat: 'yy-mm-dd',minDate: 0 });
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
  background:url(images/addaccountself.png) no-repeat left top;
}
</style>

    <?
    $strSQL1 = "SELECT * FROM counter3";
    $objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
    $objResult1 = mysqli_fetch_array($objQuery1);
    $c=$objResult1["count"];
    $c++;
    $strSQL = "UPDATE counter3 SET ";
      $strSQL .="count = '$c' ";
      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
      if(!$objQuery)
      {
        echo "Error Update [".mysqli_error()."]";
      }
    ?>
      <form name="studentForm" method="post" action="trial2.php" onSubmit="return checkForm();">
      <?
      $strSQL = "SELECT * FROM counter3";
      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
      $objResult = mysqli_fetch_array($objQuery);
      $counter=$objResult["count"];
      if( $objResultSTT["status"] == "manager_franchise" || $objResultSTT["status"] == "user_franchise"){
      $fix="BTFC";
      }else{
      $fix="BT";
      }
      for($i=0;$i<3-strlen($counter);$i++){
        $fix=$fix."0";
        }
        $fix=$fix.$objResult["count"];
            ?>
           <table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
      <tr>
            <td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">เพิ่ม account ชดเชยระบบ S.E.L.F</td>
            </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">Username :</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><label for="namestu"></label>
               <input type="hidden" name="staffid" value="<?=$_SESSION["mapid"]?>"/>
               <input type="text" name="account" id="account" value="<?=$fix; ?>" readonly></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 5); ?>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">Password:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><input type="text" name="password" id="password" value="<?=$random; ?>" readonly></td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">ค้นหาชื่อ-นามสกุล:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
                 <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" />
                 <a href="addstudent2.php?type=trial">เพิ่มรายชื่อ</a><font color="#FF0000" size="-1" > *</font></td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">ค้นหาวิชา:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
               <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /><font color="#FF0000" size="-1" > *</font></td>
            </tr>
              <!--<tr>
               <td height="39">Startdate:</td>
               <td colspan="4">-->
               <input type="hidden" name="date" id="date" value="<?=date("Y-m-d"); ?> "></td>
            <!--  </tr>
            <tr>
               <td height="39">Enddate</td>
               <td colspan="4"><label for="edate"></label>-->
               <input type="hidden" name="edate" id="edate" value="<?=date("Y-m-d",strtotime("+30 day")); ?>"></td>
             <!--</tr>-->
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">วันที่โอน :</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height=""><label for="date_pay"></label>
               <input type="date" name="date_pay" id="date_pay" value=""></td>
               </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">เรียนที่ :</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               <select name="status" id="status">
                  <option value="0"  disabled="disabled" selected="selected">เลือก</option>
                  <?   
                  if( $objResultSTT["status"] == "manager_franchise" || $objResultSTT["status"] == "user_franchise"){?>
                        <?
                        $strSQL_branch = "SELECT * FROM branch";
                        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){
                            if($result_branch['branchid'] == $id_branch_self){?>
                            <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                        <? }}?>
                  <? }else{
                        $strSQL_branch = "SELECT * FROM branch WHERE branchid != 9 AND branchid != 10";
                        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){?>
                            <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                        <? }?>
                  <? }?>
               </select><font color="#FF0000" size="-1" > *</font>                 
               </td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">จำนวนชั่วโมง:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <select name="totalcredit" id="totalcredit" >
                       <option value="0" disabled="disabled" selected="selected">เลือก</option>
                       <option value="4">2 ชั่วโมง</option>
                       <option value="8">4 ชั่วโมง</option>
                       <option value="12">6 ชั่วโมง</option>
               </select>
               </td>
             </tr>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">จ่ายเงินโดย:</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input name="type_pay" type="radio" value="transfer" class="input4" checked="checked" />โอน&nbsp;      
                 <input name="type_pay" type="radio" value="cradit" class="input4" /> บัตรเคดิต 
                 <input name="type_pay" type="radio" value="money" class="input4" /> เงินสด 
                 <? if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' && $objResultSTT['stid'] = 2) {?>
                 <input name="type_pay" type="radio" value="free" class="input4" /> ฟรี 
                 <? } ?>
                 <font color="#FF0000"> * กรณีเงินสดไม่ต้องกรอกหมายเลขใบชำระ</font></td>
             </tr>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">รหัสคอร์สที่โอน:</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input type="text" name="codetransfer" id="codetransfer" size="10"><font color="#FF0000"> * กรอกรหัสคอร์สที่โอน ตย.HA0101</font></td>
             </tr>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">หมายเลขใบชำระ:</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input type="text" name="Invoicenumber" id="Invoicenumber" ><font color="#FF0000"> * เลขสลิปโอน ตย.0880-98001 /บัตรเคดิต ตย.000000001229 </font></td>
             </tr>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">จำนวนเงิน:</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input type="text" name="amount" id="amount"   size="10">บาท <font color="#FF0000"> *กรอกเฉพาะตัวเลข ตย. 3500</font></td>
             </tr>
             <? if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' && $objResultSTT['stid'] = 2) {?>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">หมายเลขใบคำร้อง</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input type="text" name="noptt" id="noptt"  size="10"> <font color="#FF0000"></font></td>
             </tr>
             <tr>
                 <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">ผู้ร้องขอ</td>
                 <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <select name="no_petition_staff" id="no_petition_staff">
                 <option value="" selected='selected' >เลือก</option>
                 <?
         $strSQL_staff = "SELECT staff.stname ,staff.stid FROM staff";
         $objQuery_staff = mysqli_query($con_ajtongmath_self,$strSQL_staff);
          while ($objResult_staff = mysqli_fetch_array($objQuery_staff)) {
         ?>
                 <option value="<?=$objResult_staff["stid"]?>"><?=$objResult_staff["stname"]?></option>
                 <? } ?>
                 </select>
                </td>
             </tr>
             <? }?>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""></td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               <input type="submit" name="submit" id="submit" value="บันทึก" > 
               <!--<a href="javascript:document.frmMain.reset()"><img src="images/129.png" width="48" height="48"></a>--></td>
             </tr>
           </table>
           </form>
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
 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
</script>
</body>
</html>