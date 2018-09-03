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
<h1>ทะเบียนนักเรียน</h1>
<p>
<div align="right">
  <form action="searchstudent.php" method="get" id="search-form">
    <label >ค้นหารายชื่อ:</label>
    <input name="show_arti_topic" type="text" id="show_arti_topic" size="50" value="<?=$_GET["h_arti_id"];?>" />
    <input name="h_arti_id" type="hidden" id="h_arti_id" value="<?=$_GET["h_arti_id"];?>" />
    <a href="#" onClick="document.getElementById('search-form').submit()">ค้นหา</a>
  </form>
  <?
  if($objResultSTT["status"] =="admin" || $objResultSTT["status"] =="admin_hms"){?>
  <form action="searchstudent.php" method="get" id="search-form-acc">
    <label >ค้นหาAccount:</label>
    <input name="show_arti_topic_acc" type="text" id="show_arti_topic_acc" size="50" value="<?=$_GET["show_arti_topic_acc"];?>" />
    <input name="h_arti_id_acc" type="hidden" id="h_arti_id_acc" value="<?=$_GET["h_arti_id_acc"];?>" />
    <a href="#" onClick="document.getElementById('search-form-acc').submit()">ค้นหา</a>
  </form>
  <? }?>
</div>
<?php
  include("config.incself.php");
    if($_GET["h_arti_id"] != ""){
      //echo "0";
      $strSQL_student = "SELECT * FROM student WHERE name = '".$_GET["h_arti_id"]."'";
      $objQuery_student = mysql_query($strSQL_student) or die ("Error Query [".$strSQL_student."]");
      $objResult_student = mysql_fetch_array($objQuery_student);
      $std = $objResult_student["studentid"];
      $stdname = $objResult_student["name"];
      $tel = $objResult_student["tel"];
      $email = $objResult_student["email"];
      $school = $objResult_student["school"];
      
      
      $statusout = "out";
      $strSQL_account = "SELECT
                    account.accid,
                    account.studentid,
                    account.username,
                    account.`password`,
                    account.state,
                    account.sdate,
                    account.edate,
                    account.`status` AS id_branch,
                    account.totalcredit,
                    account.credit_start,
                    account.staffid,
                    account.shirt,
                    account.shirt_staffid,
                    account.no_petition,
                    account.no_petition_staff,
                    account.status_pro,
                    branch.name AS branch_name
                    FROM account
                    LEFT JOIN branch 
                    ON account.status = branch.branchid

                    WHERE studentid = ".$std." AND status != 'out'";
      $objQuery_account = mysql_query($strSQL_account) or die ("Error Query [".$strSQL_account."]");
      $l = 1;
    ?>
<br>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  <tr>
    <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 9;$b = 2;$c = 7;?>
    <? }else{$a = 8;$b = 2;$c = 6;} ?>
    <td colspan="<?=$a?>" class="tbl2" style="white-space: nowrap;" align="center"  height="">ข้อมูลนักเรียน <a href="EditProfileStudent.php?IdStudent=<?=$std;?>&Type=Edit&show_arti_topic=<?=$show_arti_topic?>&h_arti_id=<?=$h_arti_id?>">แก้ไขข้อมูล</a></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> รหัสนักเรียน : </td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$std;?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> ชื่อ : </td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$stdname;?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> เบอร์โทร : </td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$tel;?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> email :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$email;?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> ชื่อเล่น :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["nickname"];?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> โรงเรียน :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$school;?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> วันเกิด :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["birthday"];?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> เลขประจำตัวประชาชน :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["pcode"];?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> ที่อยู่ :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["address"];?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> ชื่อพ่อ :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["dadname"];?>
      </font> เบอร์โทรพ่อ : <font color="#0099FF">
      <?=$objResult_student["dadtel"];?>
      </font></td>
  </tr>
  <tr>
    <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height=""> ชื่อแม่ :</td>
    <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height=""><font color="#0099FF">
      <?=$objResult_student["momname"];?>
      </font> เบอร์โทรแม่ : <font color="#0099FF">
      <?=$objResult_student["momtal"];?>
      </font></td>
  </tr>
  <tr>
    <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 9;$b = 2;$c = 7;?>
    <? }else{$a = 8;$b = 2;$c = 6;} ?>
    <td colspan="<?=$a?>" class="tbl2" style="white-space: nowrap;" align="left"  height=""> + ข้อมูลวิชาเรียนทั้งหมด ของ <font color="#0099FF">
      <?=$objResult_student["studentname"];?>
      </font></td>
  </tr>
  <tr>
    <td width="5%" height="35" class="tbl2" style="white-space: nowrap;">
      <center>
    Account ที่
      </td>
    <td width="20%" class="tbl2" style="white-space: nowrap;">
      <center>
    Username
      </td>
    <!--<td width="20%" class="tbl2" style="white-space: nowrap;">
      <center>
    password
      </td>-->
    <!--<td width="20%" class="tbl2" style="white-space: nowrap;"><center> ชื่อ-นามสกุล</th>-->
    <td width="50%" class="tbl2" style="white-space: nowrap;">
      <center>
    คอร์ส
      </td>
    <td width="5%" class="tbl2" style="white-space: nowrap;"><center>
      Edit account
      </td>
  </tr>
  <?
 
  while($objResult_account = mysql_fetch_array($objQuery_account))
  { 
    $id_branch = $objResult_account['id_branch'];

    $strSQL_credit = "SELECT *
                FROM credit
                JOIN subject
                ON credit.subid = subject.subid AND accid = '".$objResult_account["accid"]."'
                LEFT JOIN subject_real 
                ON subject.id_subject_real = subject_real.id_subject_real
                LEFT JOIN teacher 
                ON subject.teacherid = teacher.teacherid 
                LEFT JOIN type_self  ON credit.type_self = type_self.type_id 
                ORDER BY credit.creditid ASC ";
    $objQuery_credit = mysql_query($strSQL_credit);
    $i++;
      if ($i % 2 == 0){$tblyy = "tblyy2";}else{$tblyy = "tblyy";}
    
  ?>
  <tr>
    <td align="center"  class="<?=$tblyy?>"><center>
        <?=$l++;?><?=$id_branch_self?>
      </center></td>
    <td align="center"  class="<?=$tblyy?>"><?=$objResult_account["username"];?>(<?=$objResult_account['branch_name']?>)</td>    
    <td align="left"  class="<?=$tblyy?>">
    <?php 
    $n = 1; 
    while($objResult_credit = mysql_fetch_array($objQuery_credit)){
      if($objResult_credit['id_subject_real'] == 0  || $objResult_credit['id_subject_real'] == ''){
          $name_subject = $objResult_credit["subname"];
        }else{
          $name_subject = $objResult_credit["name_subject_real"];
        }
      echo $n++." ) ".$name_subject." ".$objResult_credit["teachername"]." [ ".$objResult_credit["type_name"]." ]<br>";}?>
    </td>

    <td align="center"  class="<?=$tblyy?>">
    <?
    if($objResultSTT["status"] =="manager_franchise" || $objResultSTT["status"] =="user_franchise" || $objResultSTT["status"] =="pre_end"){
    if($id_branch == 2 && $id_branch_self == 9){?>
    <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">
    <?}
    else if($id_branch == $id_branch_self){?>
    <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">
    <? }}else{?>
    <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">
      <? }?>
    </td>
  </tr>
  <? } ?> </table>
  <? }
  if($_GET["h_arti_id_acc"] != ""){

      $strSQL_account = "SELECT
                    account.accid,
                    account.studentid,
                    account.username,
                    account.`password`,
                    account.state,
                    account.sdate,
                    account.edate,
                    account.`status` AS id_branch,
                    account.totalcredit,
                    account.credit_start,
                    account.staffid,
                    account.shirt,
                    account.shirt_staffid,
                    account.no_petition,
                    account.no_petition_staff,
                    account.status_pro,
                    branch.name AS branch_name
                    FROM account
                    LEFT JOIN branch 
                    ON account.status = branch.branchid
                    WHERE account.username = '".$_GET["h_arti_id_acc"]."'";

      $objQuery_account = mysql_query($strSQL_account) or die ("Error Query [".$strSQL_account."]");
      $objResult_account = mysql_fetch_array($objQuery_account);
      //echo $strSQL_account;
    ?>
    <br>
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
 <tr>
    <td width="5%" height="35" class="tbl2" style="white-space: nowrap;"><center>Account ที่</td>
    <td width="20%" class="tbl2" style="white-space: nowrap;"><center>Username</td>
    <td width="40%" class="tbl2" style="white-space: nowrap;"><center>คอร์ส</td>
    <td width="15%" class="tbl2" style="white-space: nowrap;"><center>ลบAccount</td>
  </tr> 
  <tr>
    <td align="center" class="tbl1"><center>1.</center></td>
    <?
    
      if($objResult_account['branch_name'] == ""){
        $objResult_account['branch_name'] = "account นี้ถูกลบ";
      }
    ?>
    <td align="center" class="tbl1"><?=$objResult_account["username"];?>(<?=$objResult_account['branch_name']?>)</td>  
    <td align="left" class="tbl1">
    <?php 
    $n = 1;
    $strSQL_credit = "SELECT *
                FROM credit
                JOIN subject ON credit.subid = subject.subid AND accid = '".$objResult_account["accid"]."'
                LEFT JOIN subject_real  ON subject.id_subject_real = subject_real.id_subject_real
                LEFT JOIN teacher  ON subject.teacherid = teacher.teacherid 
                LEFT JOIN type_self  ON credit.type_self = type_self.type_id 
                LEFT JOIN account  ON credit.accid = account.accid
                LEFT JOIN student  ON account.studentid = student.studentid
                ORDER BY credit.creditid ASC ";
    //echo $strSQL_credit;
    $objQuery_credit = mysql_query($strSQL_credit); 
    while($objResult_credit = mysql_fetch_array($objQuery_credit)){
      if($objResult_credit['id_subject_real'] == 0  || $objResult_credit['id_subject_real'] == ''){
          $name_subject = $objResult_credit["subname"];
        }else{
          $name_subject = $objResult_credit["name_subject_real"];
        }
      echo $n++." ) ".$name_subject." ".$objResult_credit["teachername"]." [ ".$objResult_credit["type_name"]." ] <br>";
        $stdname = $objResult_credit['name'];
        $std = $objResult_credit['studentid'];
    }?>
    </td>
    <td align="center"  class="tbl1">
      <?
      if($objResultSTT["status"] =="manager_franchise" || $objResultSTT["status"] =="user_franchise" || $objResultSTT["status"] =="pre_end"){
      if($id_branch == 2 && $id_branch_self == 9){?>
      <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">แก้ไข account</a>
      <?}
      else if($id_branch == $id_branch_self){?>
      <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">แก้ไข account</a>
      <? }}else{?>
      <a href="viewaccount.php?accid=<?=$objResult_account["accid"];?>&studenname=<?=$stdname?>&std=<?=$std?>"><img src="../images/13.png" width="24" height="24">แก้ไข account</a>
      <? }?>
      <br><br>
      <a href="delaccount.php?accid=<?=$objResult_account["accid"]?>&staffid=<?=$id_account_self?>&h_arti_id_acc=<?=$_GET["h_arti_id_acc"]?>" style="text-decoration:none"><img src="../images/116.png" width="15" height="15" >ลบ account</a>
      <br><br>
      <a href="EditProfileStudent.php?IdStudent=<?=$std;?>&Type=Edit&show_arti_topic=<?=$show_arti_topic?>&h_arti_id=<?=$h_arti_id?>&accid=<?=$objResult_account["accid"];?>">แก้ไขชื่อนักเรียน</a>
    </td>
  </tr>
</table>  
<? } ?>
<? mysql_close();?>

<script type="text/javascript">
function make_autocom(autoObj,showObj){
  //alert(0);
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

function make_autocom_acc(autoObj,showObj){
  //alert(1);
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
    return "data_acc.php?q=" +encodeURIComponent(this.value);
    }); 
} 
make_autocom_acc("show_arti_topic_acc","h_arti_id_acc");

</script>
</html>
