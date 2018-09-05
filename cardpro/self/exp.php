<? 
session_start();
include("funtion.php");
include("ck_session_self.php");
error_reporting(~E_NOTICE);
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
    <h1>ทดลองเรียน S.E.L.F</h1>
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
  
}

</script>

<style type="text/css">
#sss {
  width:691px;
  height:60px;
  background:url(images/addstudent2.png) no-repeat left top;
}
</style>
<?
$strSQL1 = "SELECT * FROM counter2";
$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
$objResult1 = mysqli_fetch_array($objQuery1);
$c=$objResult1["count"];
$c++;
$strSQL = "UPDATE counter2 SET ";
  $strSQL .="count = '$c' ";
  $objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
  if(!$objQuery)
  {
    echo "Error Update [".mysqli_error()."]";
  }
  ?>
<form name="studentForm" method="post" action="exp2.php" onSubmit="return checkForm();">
<?
$strSQL = "SELECT * FROM counter2";
$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysqli_fetch_array($objQuery);
$counter = $objResult["count"];
if( $objResultSTT["status"] == "manager_franchise" || $objResultSTT["status"] == "user_franchise"){
$fix="testfc";
}else{
$fix="test";
}
for($i=0;$i<3-strlen($counter);$i++){
  $fix=$fix."0";
  }
  $fix=$fix.$objResult["count"];
  ?>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
      <tr>
            <td colspan="6" class="tbl2" style="white-space: nowrap;" align="center"  height="">เพิ่ม account ทดลองเรียน S.E.L.F</td>
            </tr>
            <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">Username :</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                <input type="hidden" name="staffid" id="staffid" value="<?=$_SESSION["mapid"]?>">
                <input type="text" name="account" id="account" value="<?=$fix; ?>" readonly></td>
             </tr>
             <tr>
             <? $random = substr(number_format(time() * rand(), 0, '', ''), 0, 5); ?>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">Password:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               <input type="text" name="password" id="password" value="<?=$random; ?>" readonly></td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">ค้นหาชื่อ-นามสกุล: </td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                 <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
                 <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" />
                 <a href="addstudent2.php?type=exp">เพิ่มรายชื่อ</a><font color="#FF0000" size="-1" > *</font>
          </td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">ค้นหาวิชา: </td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               <input name="show_arti_topic_subj" type="text" id="show_arti_topic_subj" size="30" value="" />
               <input name="h_arti_id_subj" type="hidden" id="h_arti_id_subj" value="" /><font color="#FF0000" size="-1" > *</font>
               </td>
             </tr>
             <!--<tr>
               <td width="117" height="39">Startdate:</td>
               <td colspan="4">-->
               <input type="hidden" name="date" id="date" value="<?=date("Y-m-d"); ?> "><!-- </td>
            </tr>
             <tr>
               <td width="117" height="39">Enddate</td>
               <td colspan="4"><label for="edate"></label>-->
               <input type="hidden" name="edate" id="edate" value="<?=date("Y-m-d",strtotime("+7 day")); ?>"><!-- </td>
            </tr>-->
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height="">Status:</td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
                  <select name="status" id="status"><option value="0" disabled="disabled" selected="selected">เลือก</option>
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
                        $strSQL_branch = "SELECT * FROM branch WHERE type = 0 ANd status_branch != 0";
                        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
                        while ( $result_branch = mysqli_fetch_array($objQuery_branch)){?>
                            <option value="<?=$result_branch['branchid']?>" ><?=$result_branch['name'];?></option>
                        <? }?>
                  <? }?>
                  </select><font color="#FF0000" size="-1" > *</font>            
               </td>
             </tr>
             <tr>
               <td colspan="2" class="tblyy2" style="white-space: nowrap;" align="right"  height=""></td>
               <td colspan="4" class="tblyy" style="white-space: nowrap;" align="left"  height="">
               <input type="submit" name="submit" id="submit" value="บันทึก">
               <!--<a href="javascript:document.frmMain.reset()">  ยกเลิก</a>--></td>
             </tr>
           </table>
           </form>
         </p>
</div>
<? mysqli_close();?>
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
    return "datasubj.php?q=" +encodeURIComponent(this.value);
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
</script><script type="text/javascript"> Cufon.now(); </script>
</body>
</html>