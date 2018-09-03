<?php 
ob_start();
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
    <h1>ทะเบียนนักเรียน self</h1>
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
<?php
$strSQL = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."' ";
$objQuery = mysqli_query($con_ajtongmath_self, $strSQL) or die ("Error Query [".$strSQL."]");
$Num_Rows = mysqli_num_rows($objQuery); 
$objResult = mysqli_fetch_array($objQuery);

if($_GET['std'] != ''){
$strSQL2 = "SELECT * FROM student WHERE studentid = ".$_GET['std']."";
$objQuery2 = mysqli_query($con_ajtongmath_self, $strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);
}


// ฟังก์ชั่นวนลูปวันที่
function m2h($mins) {
    if ($mins < 0) {
        $min = Abs($mins);
    } else {
        $min = $mins;
    }
    $H = Floor($min / 60);
    $M = ($min - ($H * 60)) / 100;
    $hours = $H + $M;
    if ($mins < 0) {
        $hours = $hours * (-1);
    }

    $expl = explode(".", $hours);
    $H = $expl[0];
    if (empty($expl[1])) {
        $expl[1] = "";//00;
    }

    $M = $expl[1];
    if (strlen($M) == 1) {
        $M = ".". $M . 0;
    }
    

    $hours = $H . $M;

    return $hours;
}
?>

<table class="tbl-border" cellpadding="0" cellspacing="1" width="80%" align="center">
  <tr>
    <td width="10%" class="tblyy2" height="35"><center>ชื่อ-นามสกุล</center></td>
    <td width="50%" class="tblyy" height="35"><?=$objResult2["name"]?></td>
    <td width="10%" class="tblyy" height="35">
     <?php if($objResultSTT['status'] == 'admin' ) {?>
      <a href="Editaccount.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/31.png" width="40" height="40"> แก้ไขข้อมูล</a><?php }?>
    </td>
    </tr>
    <tr>
    <td width="" class="tblyy2" height="35" ><center>Username</center></td>  
    <td width="" class="tblyy" height="35"><?=$objResult["username"]?></td>
    <td width="" class="tblyy" height="35">
    <?php if($_GET["status"] != "notedit"){
      if($objResultSTT['status'] != 'user_franchise' && $objResultSTT['status'] != 'manager_franchise' ){
        $link = "addsubject.php";
      }else{
        $link = "addsubject_franchise.php";
      }
    ?>
    <a href="<?=$link?>?type=Add&accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/8.png" width="40" height="40"> เพิ่มวิชา</a><?php } ?>
    </td>
    </tr>
    <tr>
    <td width="" class="tblyy2" height="35"><center>Password</center></td>
    <td width="" class="tblyy" height="35"><?=$objResult["password"]?></td>
    <td width="" class="tblyy" height="35">
    <?php if($objResultSTT['status'] != 'user_franchise' && $objResultSTT['status'] != 'manager_franchise' ){?>
    <a href="delsub.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/9.png" width="40" height="40"> ลบวิชา</a>
    <?php }?>
    </td>
    </tr>
<?php 
$i=1;
$strSQL1 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND accid = '".$_GET["accid"]."' ";
$objQuery1 = mysqli_query($con_ajtongmath_self, $strSQL1);
$objResult1 = mysqli_fetch_array($objQuery1);
?> 
  <tr>
    <td width="" class="tblyy2" height="35"><center>วันที่เริ่มเรียน</center></td>
    <td width="" class="tblyy" height="35"><?=DateDMY($objResult["sdate"])?></td>
    <td width="" class="tblyy" height="35">
    <?php if($objResultSTT['status'] != 'user_franchise' && $objResultSTT['status'] != 'manager_franchise' && $objResultSTT["status"] != "admin_hms"){?>
    <a href="printcard.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/Printer_Picture.png" width="40" height="40"> พิมพ์บัตร</a>
    <?php }else{?>
    <a href="pintcardself.php?accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/Printer_Picture.png" width="40" height="40"> พิมพ์บัตร </a>

    <?php }?>
    <a href="printprice.php?accid=<?=$_GET["accid"];?>"><img src="../images/Printer_Picture.png" width="40" height="40"> พิมพ์ใบเสร็จ</a>
    </td>
    <tr>
    <td width="" class="tblyy2" height="35"><center>วันหมดอายุ</center></td>
    <td width="" class="tblyy" height="35"><?=DateDMY($objResult["edate"])?></td>
    <td width="" class="tblyy" height="35">
    <?php if($objResultSTT['status'] != 'user_franchise' && $objResultSTT['status'] != 'manager_franchise' ){?>
    <a href="addsubject.php?type=Edit&accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>&std=<?=$_GET['std']?>" style="text-decoration:none"><img src="../images/13.png" width="40" height="40">  แก้ไขวิชา</a>
    <?php }?>
    </td>
    </tr>
    <tr>
    <td width="" class="tblyy2" height="35"><center>สถานะ</center></td>
    <td width="" class="tblyy" height="35">
      <?php 
  $strSQL_branch = "SELECT * FROM branch WHERE branchid = '".$objResult["status"]."'";
  $objQuery_branch = mysqli_query($con_ajtongmath_self, $strSQL_branch);
  while ($objResult_branch = mysqli_fetch_array($objQuery_branch)) {
    echo  $objResult_branch['name'];
      }?>
  <?php 
  /*if($objResult["status"]==1){?>เรียนได้ทุกสาขา<?php } 
  else if($objResult["status"]==2){ ?>เฉพาะวงเวียนใหญ่<?php } 
  else if($objResult["status"]==4){ ?>เฉพาะชั้น9 พญาไท<?php } 
  else if($objResult["status"]==3) { ?>เฉพาะวิสุทธานี<?php } 
  else if($objResult["status"]==6) {?> เฉพาะสระบุรี <?php }  
  else if($objResult["status"]==7) {?> เฉพาะชลบุรี <?php } 
  else if($objResult["status"]==8) {?> เฉพาะราชบุรี <?php }
  else if($objResult["status"]==10) {?> เฉพาะหาดใหญ่ <?php } 
  else if($objResult["status"]==11) {?> เฉพาะเพชรบุรี <?php }
    else if($objResult["status"]==111) {?> เฉพาะพญาไท<?php } */?>
    </td>
    <td width="" class="tblyy" height="35">
  <a href="searchstudent.php?h_arti_id=<?=$_GET["studenname"]?>&h_arti_id_acc=<?=$objResult["username"]?>" style="text-decoration:none"><img src="../images/28.png" width="33" height="33"> กลับ</a>
  </td>
    </tr>
    <tr>
    <td width="" class="tblyy2" height="35"><center>เครดิตคงเหลือ</center></td>
    <td width="" class="tblyy" height="35">
  <?=$objResult["totalcredit"]?>(<?=m2h($objResult['totalcredit']*30);?><?//=$objResult["totalcredit"]*0.5 ?>ชั่วโมง) <?php if($objResult["credit_start"] == "0"){}else{?>จากทั้งหมด <?=$objResult["credit_start"]?>(<?=m2h($objResult['credit_start']*30);?><?//=$objResult["credit_start"]*0.5 ?>ชั่วโมง) <?php } ?>
    </td>
    <td width="" class="tblyy" height="35">
    <?php if($objResultSTT['status'] == "admin"){?>
         <a href="delaccount.php?accid=<?=$objResult["accid"]?>&staffid=<?=$objResultSTT["stid"]?>&h_arti_id=<?=$_GET["studenname"]?>" style="text-decoration:none"><img src="../images/116.png" width="29" height="29" >ลบ account</a>
               <?php } ?>
               </td>
    </tr>
  <?php
    $strSQL11 = "SELECT * FROM staff WHERE stid = '".$objResult["staffid"]."' ";
  $objQuery11 = mysqli_query($con_ajtongmath_self, $strSQL11) or die ("Error Query [".$strSQL11."]");
  $objResult11 = mysqli_fetch_array($objQuery11);
  
  $strSQL13 = "SELECT * FROM staff WHERE stid = '".$objResult["no_petition_staff"]."' ";
  $objQuery13 = mysqli_query($con_ajtongmath_self, $strSQL13) or die ("Error Query [".$strSQL13."]");
  $objResult13 = mysqli_fetch_array($objQuery13);
  
  $strSQL12 = "SELECT * FROM branch WHERE branchid = '".$objResult11["branchid"]."' ";
  $objQuery12 = mysqli_query($con_ajtongmath_self, $strSQL12) or die ("Error Query [".$strSQL12."]");
  $objResult12 = mysqli_fetch_array($objQuery12);
  ?>
    <tr>
    <td width="" class="tblyy2" height="35"><center>โดย(ออก/แก้ไข)</center></td>
    <td width="" class="tblyy" height="35">
  <?php 
  if($objResult11["stid"] == 0 ){echo "ไม่ได้เก็บข้อมูล";} else{?> <?=$objResult11["stname"]?> ( สาขา<?=$objResult12["name"];?> )<?php }
  if($objResult["no_petition"] == 0){}else{?><br> ประวัติใบคำร้อง : ใบร้องที่ <?=$objResult["no_petition"]?> โดย : <?=$objResult13["stname"];}
  ?>
    </td>
    <td width="" class="tblyy" height="35">
    <?php if($_GET['id_hms']!=''){?><a href="../HMS_student.php?id_hms=<?=$_GET['id_hms']?>">กลับไปข้อมูลบัตร HMS</a><?php }?>
    </td>
    </tr>
    <?php 
  $i=1;
  $strSQL = "SELECT sr.name_subject_real ,credit.amount, subject.subname, staff.stname ,branch.name ,staff.stid ,credit.date_pay ,credit.creditid ,no_petition ,no_petition_staff,teachername,type_self.type_name
  FROM credit 
  LEFT JOIN subject ON credit.subid = subject.subid
  LEFT JOIN staff ON credit.staffid = staff.stid
  LEFT JOIN branch ON staff.branchid = branch.branchid
  LEFT JOIN subject_real sr ON subject.id_subject_real = sr.id_subject_real
  LEFT JOIN teacher t ON sr.id_teacher = t.teacherid 
  LEFT JOIN type_self  ON credit.type_self = type_self.type_id 
  WHERE credit.accid = '".$_GET["accid"]."'";
  $objQuery = mysqli_query($con_ajtongmath_self, $strSQL);
  while ($objResult12 = mysqli_fetch_array($objQuery)) {
    if($i==1){
  ?> 
    <tr>
    <td width="" class="tblyy2" height="35"><center>วิชาที่เรียน</center></td>
    <td width="" class="tblyy" height="35">
  <?=$i; ?>. <?=$objResult12["name_subject_real"]?> <?=$objResult12["teachername"]?> [ ประเภท : <?=$objResult12["type_name"]?> ]<br> วันที่โอน : <?php echo DateDMY($objResult12["date_pay"]);?> ราคา : <?=$objResult12["amount"]?>
    
    <?php if($objResultSTT['status'] == 'admin') {?>
    <a href="addsubject.php?type=editall&creditid=<?=$objResult12["creditid"]?>&std=<?=$_GET['std']?>&accid=<?=$_GET["accid"]?>&studenname=<?=$_GET["studenname"]?>">แก้ไข</a>
  <?php }
  $strSQL14 = "SELECT * FROM staff WHERE stid = '".$objResult12["no_petition_staff"]."' ";
  $objQuery14 = mysqli_query($con_ajtongmath_self, $strSQL14) or die ("Error Query [".$strSQL14."]");
  $objResult14 = mysqli_fetch_array($objQuery14);
  ?> 
  <?php if($objResult12["no_petition"] == '')
  {?>โดย: <?=$objResult12["stname"]?><?php }
  else{?><br> ประวัติใบคำร้อง : ใบร้องที่ <?=$objResult12["no_petition"]?> โดย : <?=$objResult14["stname"]; ?> [ ดำเนินการโดย <?=$objResult12["stname"]?> ] <?php } ?>
    </td>
    <td width="" class="tblyy" height="35"></td>
    </tr>
  <?php } else{?>
    <tr>
    <td width="" class="tblyy2" height="35"></td>
    <td width="" class="tblyy" height="35">
  <?=$i; ?>. <?=$objResult12["name_subject_real"]?> [ ประเภท : <?=$objResult12["type_name"]?> ]
    <br> วันที่โอน : <?php echo DateDMY($objResult12["date_pay"]);?>
     โดย: <?=$objResult12["stname"]?> ราคา : <?=$objResult12["amount"]?>
    <?php if($objResultSTT['status'] == 'admin' ) {?>
    <a href="addsubject.php?type=editall&creditid=<?=$objResult12["creditid"]?>&std=<?=$_GET['std']?>&accid=<?=$_GET["accid"]?>">แก้ไข</a>
    <?php }
  $strSQL15 = "SELECT * FROM staff WHERE stid = '".$objResult12["no_petition_staff"]."' ";
  $objQuery15 = mysqli_query($con_ajtongmath_self, $strSQL15) or die ("Error Query [".$strSQL15."]");
  $objResult15 = mysqli_fetch_array($objQuery15);
  
  if($objResult12["no_petition"] == ''){}
  else{?><br> ประวัติใบคำร้อง : ใบร้องที่ <?=$objResult12["no_petition"]?> โดย : <?=$objResult15["stname"]; ?>[ ดำเนินการโดย <?=$objResult12["stname"]?> ]
  <?php }?>
    </td>
    <td width="" class="tblyy" height="35"></td>
    </tr>
  <?php } 
  $i++; 
  } 
  $strSQL2 = "SELECT * FROM reserve where accid = '".$_GET["accid"]."' order  by reservid DESC";
  $objQuery2 = mysqli_query($con_ajtongmath_self, $strSQL2);
  $j=1;
  while ($objResult2 = mysqli_fetch_array($objQuery2)){
    if($objResult2["section"]!=0){
      $time7 = 8 + floor(($objResult2["section"]-1)/2); 
      if($objResult2["section"]%2==1){$min7="00";}else{$min7="30";}
      $time8 = 8 + ceil(($objResult2["section"]-1)/2); 
      if($objResult2["section"]%2==1){$min8="30";}else{$min8="00";}
      }else{
        $time7 = 8 + floor(($objResult2["section_s"]-1)/2); 
        if($objResult2["section_s"]%2==1){$min7="00";}else{$min7="30";}
        $time8 = 8 + floor(($objResult2["section_e"]-1)/2);
        if($objResult2["section_e"]%2==1){$min8="00";}else{$min8="30";}
      }
      $datenew=$objResult2["time"];?>
   <tr>
   <td width="" class="tblyy2" height="35"><?php if($j==1){?><center>เวลาที่จอง</center><?php } ?></td>
   <td width="" class="tblyy" height="35">วันที่ <?=DateThaiDMY($objResult2["time"])?> เวลา <?=$time7;?>:<?=$min7?>-<?=$time8;?>:<?=$min8?> 
  <?php 
  $strSQL_branch = "SELECT * FROM branch WHERE branchid = '".$objResult2["branchid"]."'";
  $objQuery_branch = mysqli_query($con_ajtongmath_self, $strSQL_branch);
  while ($objResult_branch = mysqli_fetch_array($objQuery_branch)) {
    echo  "=> ".$objResult_branch['name'];
      }?>

   <?php if($objResult2['checkin'] !== '0000-00-00 00:00:00' ){
     $Time_CIN = substr($objResult2["checkin"], 11, 8);
     $Time_COUT = substr($objResult2["checkout"], 11, 8);?>
   <br> เวลาเข้าเรียน : <?=$Time_CIN;?> น. ออกเรียน : <?=$Time_COUT;?> น.
   <?php }?>
   <?php if($objResultSTT['status'] != 'manager_franchise' && $objResultSTT['status'] != 'user_franchise'){?>
   <br><a href="money_back.php?reservid=<?=$objResult2['reservid']?>">คืนเคดิต</a> 
   <?php }?>
   </td>
   <td width="" class="tblyy" height="35"></td>
   </tr>
   <?php $j++; 
   } ?>
</table>
</form>
</p>
</div>
<?php mysqli_close($con_ajtongmath_self);?>
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