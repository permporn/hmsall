<? 
session_start();
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
    <h1>ทะเบียนนักเรียน สด & DVD</h1>
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
  
<? if($_GET["studentid"]!=""){?>
<?
$studentid = $_GET["studentid"];
  $strSQL_stu = "SELECT * FROM student WHERE studentid = '".$studentid."'";
  $objQuery_stu = mysql_query($strSQL_stu) or die ("Error Query [".$strSQL_stu."]");
  $objResult_stu = mysql_fetch_array($objQuery_stu);
  
  $strSQL = "SELECT 
  s.studentid,
  s.studentname,
  s.tel,
  sj.subcode,
  sj.subname,
  sj.id_year,
  sj.subid,
  l.learnid,
  l.regisdate,
  l.id_change_couses,
  y.nameyear,
  t.term
  FROM learn l
  INNER JOIN student s
    ON l.studentid = s.studentid 
  INNER JOIN subject sj
    ON l.subcode = sj.subcode 
  INNER JOIN addterm at
    ON l.id_year = at.id_year 
  INNER JOIN year y
    ON at.year_id = y.id 
  INNER JOIN term t
    ON at.termid = t.termid ";
  $strSQL .=" WHERE l.studentid = '".$studentid."' AND sj.id_year = l.id_year";
  $strSQL .=" order by seat ASC";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  
  

?>
<form name="frmMain" action="printcard.php?id_year=<?=$id_year;?>" method="post" >

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>
        <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {$a = 9;$b = 2;$c = 7;?><? }else{$a = 8;$b = 2;$c = 6;} ?>
          <td colspan="<?=$a?>" class="tbl23" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน</td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสนักเรียน : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["studentid"];?></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["studentname"];?></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เบอร์โทร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["tel"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          email :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["email"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อเล่น :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["nickname"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          โรงเรียน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["school"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันเกิด :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["birthday"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เลขประจำตัวประชาชน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["pcode"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ที่อยู่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["address"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อพ่อ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["dadname"];?> </font>
           เบอร์โทรพ่อ :  <font color="#0099FF"><?=$objResult_stu["dadtel"];?> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อแม่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><?=$objResult_stu["momname"];?> </font>
          เบอร์โทรแม่ :  <font color="#0099FF"><?=$objResult_stu["momtal"];?> </font>
          </td>
      </tr>
      <tr>
        <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {$a = 9;$b = 2;$c = 7;?><? }else{$a = 8;$b = 2;$c = 6;} ?>
          <td colspan="<?=$a?>" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + ข้อมูลวิชาเรียนทั้งหมด ของ <font color="#0099FF"><?=$objResult_stu["studentname"];?></font> 
          </td>
      </tr>
    <tr>
          <td width="10%"  class="tbl2" style="white-space: nowrap;" align="center">
          <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">all
          <input name="submit" type="submit" value="Print"/> 
          </td>
          <td width="5%"  class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <!--<td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>-->
          <td width="25%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เทอม</td>
          <td width="10%" class="tbl2" style="white-space: nowrap;" align="center">ประวัติ</td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <td width="4%" class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>
           <? }?>
      </tr>
      
<?  //$sumamount = 0;
  $num = 0;
  while($objResult = mysql_fetch_array($objQuery)){
    $num++;
    if($num % 2 == 0){$tblyy = "tblyy2";}
    else{$tblyy = "tblyy";}
  
  
  $strSQL2 = "SELECT ptt.subject, ptt.id , ptt.status , ptt_s.name statusname
        FROM learn l
        INNER JOIN ptt_request ptt
          ON l.id_change_couses = ptt.id 
        INNER JOIN ptt_type ptt_t
          ON ptt.type = ptt_t.id 
        INNER JOIN ptt_status ptt_s
          ON ptt.status = ptt_s.id ";
  $strSQL2 .=" WHERE l.id_change_couses = '".$objResult["id_change_couses"]."'";
  $objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
  $objResult2 = mysql_fetch_array($objQuery2);
?>      
      <tr>
          <td width="10%" style="white-space:nowrap;" class="<?=$tblyy?>" align="center">
          <input type="checkbox" name="chkDel[]" id="chkDel<?=$num;?>" value="<?=$objResult["learnid"];?>">
          <input type="hidden" name="id_year" value="<?=$objResult["id_year"]?>" />
          </td>
          <td width="5%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
          <!--<td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td width="29%" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["studentname"];?></td>-->
          <td width="25%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["subname"];?></td>
          <td width="9%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["subcode"];?></td>
          <td width="7%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["regisdate"];?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["term"];?></td>
          <td width="10%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
      <a href="user_request_details.php?id=<?=$objResult2["id"];?>"><?=$objResult2["subject"];?> <?=$objResult2["statusname"];?></a></td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <td width="4%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><a href="student_edit.php?learnid=<?=$objResult["learnid"];?>">แก้ไข</a></td>
          <? } ?>
       </tr>
      <? }?>
  </table>
  <div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
  <p align="right"><font color="#EE0000"> *หมายเหตุ แก้ไขในกรณีเปลี่ยนคอร์ส/ย้ายคอร์ส 
  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</font></p> 

  <? }?>
  <input type="hidden" name="hdnCount" value="<?=$num;?>">
  </form>
  <br />
  <br />
  <br />
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