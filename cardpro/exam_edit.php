<? 
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
</head>
<script language="JavaScript">
  function ClickCheckAll(vol){
  var i=1;
    for(i=1;i<=document.frmMain.hdnCount.value;i++){
      if(vol.checked == true){
        eval("document.frmMain.chkDel"+i+".checked=true");
      }else{
        eval("document.frmMain.chkDel"+i+".checked=false");
      }
    }
  }
</script>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php')?>
  <div id="content">
    <h1>ทะเบียนนักเรียน</h1>
  <br /> <br />
  <div align="center">
  <? if($_GET["subid"]!=""){?>
  <form name="form2" action="student.php" method="get">
      <label><strong>ค้นหารายชื่อ :</strong></label>
      <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" />
      <input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
        <input name="year" type="hidden" id="year" value="<?=$_GET["year"]?>" />
        <input name="term" type="hidden" id="term" value="<?=$_GET["term"]?>" />
        <input name="type" type="hidden" id="type" value="<?=$_GET["type"]?>" />
        <input name="subid" type="hidden" id="subid" value="<?=$_GET["subid"]?>" />
        <input name="submit" type="submit" value="ค้นหา" />
  </form>
  <? }?>
  </div>
  <br />
  
<? if($_GET["subid"]!="" && $_GET["action"] == ''){?>
<?
$id_year = $_GET["id_year"];
$subid = $_GET["subid"];
  $strSQL_sub = "SELECT * FROM subject WHERE subid = '".$subid."'";
  $objQuery_sub = mysql_query($strSQL_sub) or die ("Error Query [".$strSQL_sub."]");
  $objResult_sub = mysql_fetch_array($objQuery_sub);
  $id_year = $objResult_sub['id_year'];
  $subcode = $objResult_sub['subcode'];
  $subname =$objResult_sub['subname'];
  
  $objQuery_atid = mysql_query("SELECT * FROM addterm WHERE id_year = '".$id_year."'");
  $objResult_atid = mysql_fetch_array($objQuery_atid);
  $year_id = $objResult_atid["year_id"];
  $termid = $objResult_atid["termid"];
  
  $strSQL_year = "SELECT * FROM year WHERE id = '".$year_id."'";
  $objQuery_year = mysql_query($strSQL_year) or die ("Error Query [".$strSQL_year."]");
  $objResult_year = mysql_fetch_array($objQuery_year);
  $nameyear = $objResult_year['nameyear'];
  
  $strSQL_term = "SELECT * FROM term WHERE termid = '".$termid."'";
  $objQuery_term = mysql_query($strSQL_term) or die ("Error Query [".$strSQL_term."]");
  $objResult_term = mysql_fetch_array($objQuery_term);
  $term = $objResult_term['term'];
  
  $strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid ";
  $strSQL .=" WHERE learn.subcode = '".$subcode."' AND learn.id_year = '".$id_year."' AND learn.status = 1";
  if($_GET["h_arti_id"]!=""){$strSQL .= " AND learn.studentid = '".$_GET["h_arti_id"]."'";}
  $strSQL .=" order by learn.seat ASC";
  $objQuery = mysql_query($strSQL);

?>
<form name="frmMain" action="exam_printpoint.php?id_year=<?=$id_year;?>" method="post" >

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>
        <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="23" or $objResultSTT["status"]=="admin") {$a = 9;?><? }else{$a = 8;} ?>
          <td colspan="<?=$a?>" class="tbl23" style="white-space: nowrap;" align="center"  height="35">
          ตารางรายชื่อ วิชา <font color="#0099FF"> <?=$subname?> </font>
          รหัสวิชา <font color="#0099FF"> <?=$subcode?> </font>
           ปี <font color="#0099FF"> <?=$nameyear?> </font>
           เทอม <font color="#0099FF"> <?=$term?> </font>
          </td>
      </tr>
    <tr>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">
          <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">all
          <input name="submit" type="submit" value="Print"/> 
          </td>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">คะแนนเก็บ</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">คะแนนสอบ</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">รวม</td>
           <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="23" or $objResultSTT["status"]=="admin") {?>
           <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>
           <? }?>
      </tr>
      
<?  //$sumamount = 0;
  $num = 0;
  while($objResult = mysql_fetch_array($objQuery)){
    $num++;
    if($num % 2 == 0){$tblyy = "tblyy2";}
    else{$tblyy = "tblyy";}
?>      
      <tr>
          <td width="" style="white-space:nowrap;" class="<?=$tblyy?>" align="center">
          <input type="checkbox" name="chkDel[]" id="chkDel<?=$num;?>" value="<?=$objResult["learnid"];?>">
          </td>
          <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><a href="student_detail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></td>
          <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["finaltest"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"> <?=$objResult["sumpoint"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["finaltest"]+$objResult["sumpoint"];?></td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["accid"]=="23" or $objResultSTT["status"]=="admin") {?>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><a href="exam_edit.php?learnid=<?=$objResult["learnid"];?>&action=edit&subid=<?=$subid?>">แก้ไข</a></td>
          <? } ?>
       </tr>
      <? }?>
      <? if($num == 0){?>
        <tr><td colspan="9" style="white-space:nowrap;" class="tblyy" align="center"><font color="#FF0000"><strong>ไม่พบข้อมูล</strong></font></td> </tr>
      <? }?>
  </table>  
  <input type="hidden" name="hdnCount" value="<?=$num;?>">
  </form>  
 <? }?>
 
 
 <!-----------------------แก้ไข-------------------------->
 
 <? if($_GET["action"] == "edit" && $_GET["learnid"] != "" && $_GET["subid"] != ""){ 
 
$id_year = $_GET["id_year"];
$subid = $_GET["subid"];
  
  $strSQL_sub = "SELECT * FROM subject WHERE subid = '".$subid."'";
  $objQuery_sub = mysql_query($strSQL_sub) or die ("Error Query [".$strSQL_sub."]");
  $objResult_sub = mysql_fetch_array($objQuery_sub);
  $id_year = $objResult_sub['id_year'];
  $subcode = $objResult_sub['subcode'];
  $subname =$objResult_sub['subname'];
  
  $objQuery_atid = mysql_query("SELECT * FROM addterm WHERE id_year = '".$id_year."'");
  $objResult_atid = mysql_fetch_array($objQuery_atid);
  $year_id = $objResult_atid["year_id"];
  $termid = $objResult_atid["termid"];
  
  $strSQL_year = "SELECT * FROM year WHERE id = '".$year_id."'";
  $objQuery_year = mysql_query($strSQL_year) or die ("Error Query [".$strSQL_year."]");
  $objResult_year = mysql_fetch_array($objQuery_year);
  $nameyear = $objResult_year['nameyear'];
  
  $strSQL_term = "SELECT * FROM term WHERE termid = '".$termid."'";
  $objQuery_term = mysql_query($strSQL_term) or die ("Error Query [".$strSQL_term."]");
  $objResult_term = mysql_fetch_array($objQuery_term);
  $term = $objResult_term['term'];
  
  $strSQL = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid ";
  $strSQL .=" WHERE learn.subcode = '".$subcode."' AND learn.id_year = '".$id_year."' AND learn.status = 1";
  if($_GET["h_arti_id"]!=""){$strSQL .= " AND learn.studentid = '".$_GET["h_arti_id"]."'";}
  $strSQL .=" order by learn.seat ASC";
  $objQuery = mysql_query($strSQL);
?>
    
<form name="frmMain" action="exam_edit.php?action=update" method="post" >

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  
      <tr>
        <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" || $objResultSTT["accid"]=="23" or $objResultSTT["status"]=="admin") {$a = 9;?><? }else{$a = 8;} ?>
          <td colspan="<?=$a?>" class="tbl23" style="white-space: nowrap;" align="center"  height="35">
          B. ตารางรายชื่อ วิชา <font color="#0099FF"> <?=$subname?> </font>
          รหัสวิชา <font color="#0099FF"> <?=$subcode?> </font>
           ปี <font color="#0099FF"> <?=$nameyear?> </font>
           เทอม <font color="#0099FF"> <?=$term?> </font>
          </td>
      </tr>
    <tr>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">คะแนนเก็บ</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">คะแนนสอบ</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">รวม</td>
          <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>

      </tr>
      
<?  //$sumamount = 0;
  $num = 0;
  while($objResult = mysql_fetch_array($objQuery)){
    $num++;
    if($num % 2 == 0){$tblyy = "tblyy2";}
    else{$tblyy = "tblyy";}
?>      
      <tr>
          <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><a href="student_detail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></td>
          <td width=""  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
          <? if($_GET['action'] == 'edit' && $_GET['learnid'] == $objResult["learnid"]){?>
              <input type="hidden" name="learnid" value="<?=$objResult["learnid"];?>">
              <input type="hidden" name="subid" value="<?=$subid;?>">
              <input type="text" name="finaltest" value="<?=$objResult["finaltest"];?>" style="width:70px;"/>
              <? }else{?>
              <?=$objResult["finaltest"];}?>
          </td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
          <? if($_GET['action'] == 'edit' && $_GET['learnid'] == $objResult["learnid"]){?>
              <input type="text" name="sumpoint" value="<?=$objResult["sumpoint"];?>" style="width:70px;"/>
              <? }else{?>
              <?=$objResult["sumpoint"];}?>
          </td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["finaltest"]+$objResult["sumpoint"];?></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
           <? if($_GET['action'] == 'edit' && $_GET['learnid'] == $objResult["learnid"]){?><input type="submit" name="sumit" value="บันทึก" /><? }?>
          </td>
       </tr>
      <? }?>
      <? if($num == 0){?>
        <tr>
          <td colspan="9" style="white-space:nowrap;" class="tblyy" align="center"><font color="#FF0000"><strong>ไม่พบข้อมูล</strong></font></td>
        </tr>
      <? }?>
  </table>  
 </form>
  <? }?> 
  <? if($_GET["action"] == "update" && $_POST["subid"] != "" && $_POST["learnid"] != ""){
  
  $subid = $_POST["subid"];
  $learnid = $_POST["learnid"];
  
  if($_POST['sumpoint'] != "" && $_POST['finaltest']){
  $sumpoint = $_POST["sumpoint"];
  $finaltest = $_POST["finaltest"];
  
    $strSQL = "UPDATE learn SET ";
    $strSQL .="finaltest = '".$finaltest."' ";
    $strSQL .=",sumpoint = '".$sumpoint."' ";
    $strSQL .="WHERE learnid = '".$learnid."' ";
    $objQuery = mysql_query($strSQL);
    
    if($objQuery){
      echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
      echo "<meta http-equiv='refresh' content='0; URL=exam_edit.php?subid=$subid'>";}
    else{
      echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
      echo "<script language='javascript'>alert('การบันทึกผิดพลาด กรุณาทำรายการใหม่!! ');</script>";
      echo "<meta http-equiv='refresh' content='0; URL=exam_edit.php?learnid=$learnid&action=edit&subid=$subid'>";}
  }else{
  echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
  echo "<script language='javascript'>alert('การส่งค่าคะแนนผิดพลาด!! ');</script>";
  echo "<meta http-equiv='refresh' content='0; URL=exam_edit.php?learnid=$learnid&action=edit&subid=$subid'>";}
}
  
?>
</div>
</body>

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
    return "autocomplete/gdata_namestudent.php?q=" +encodeURIComponent(this.value);
    }); 
} 

// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");

</script>
<script type="text/javascript"> Cufon.now(); </script>

</html>
<?php mysql_close();?>