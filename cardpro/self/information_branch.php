<? 
ob_start();
session_start();
include("ck_session_self.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? include("script_link.php");?>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/default.css"/>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<title><?=$title?></title>
</head>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({
      showButtonPanel: true,
      dateFormat: 'yy-mm-dd'
    });
  });
  </script>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
<p>
  <div id="content">
    <h1>ข้อมูลสาขา</h1>
<br />

<!--  แก้ไข  -->
<? if($_GET['type'] == "edit" && $_GET['branchid'] != ""){
    $branchid = $_GET['branchid'];
    
    $strSQL_edit = "SELECT * FROM branch WHERE branchid = $branchid";
    $QR_edit = mysql_query($strSQL_edit,$connect_self);
    $RS_edit = mysql_fetch_array($QR_edit);
?>
<form name="frm" method="get" action="information_branch.php?type=update">
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr >
        <td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
        <strong> + แก้ไขข้อมูล </strong>
        </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>ชื่อสาขา</strong></td>
      <td align="left" class="tblyy" >
      <input  type="hidden" name="type" value="update"/>
      <input  type="hidden" name="branchid" value="<?=$branchid?>"/>
      <input  type="hidden" name="today" value="<?=date('Y-m-d')?>" />
      <input type="text" name="sub_name" value="<?=$RS_edit['sub_name'];?>" style="width:700px"/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>ชื่อ</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="customer_name" value="<?=$RS_edit['customer_name'];?>" style="width:700px" />
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>ที่อยู่</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="address" value="<?=$RS_edit['address'];?>" style="width:700px" />
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>เลขผู้เสียภาษี</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="number_card" value="<?=$RS_edit['number_card'];?>" style="width:150px"/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>เบอร์โทร</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="phone" value="<?=$RS_edit['phone'];?>" style="width:150px"/>
      </td>
    </tr>
     <tr>
      <td align="left" class="tblyy2"><strong>email</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="email" value="<?=$RS_edit['email'];?>" style="width:700px"/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>วันที่เริ่ม</strong></td>
      <td align="left" class="tblyy" ><input type="text" id="datepicker"  name="sdate" value="<?=$RS_edit['sdate'];?>" style="width:150px"/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"></td>
      <td align="left" class="tblyy" >
        <input type="submit" name="Submit" value="บันทึก">
       </td>
    </tr>
</table>
</form>
<? }?>
<br />    
<!--  แสดงข้อมูลสาขา -->
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr>
        <td colspan="10" class="tbl23" style="white-space: nowrap;" align="center">
        <strong> ตารางข้อมูล </strong>
        </td>
    </tr>
    <tr>
      <td class="tblyy2" ><center><strong>No.</strong></center></td>
      <td class="tblyy2" ><center><strong>สาขา</strong></center></td>
      <td class="tblyy2" ><center><strong>ชื่อสาขา</strong></center></td>
      <td class="tblyy2" ><center><strong>ชื่อ</strong></center></td>
      <td class="tblyy2" ><center><strong>ที่อยู่</strong></center></td>
      <td class="tblyy2" ><center><strong>เลขผู้เสียภาษี</strong></center></td>
      <td class="tblyy2" ><center><strong>เบอร์โทร</strong></center></td> 
      <td class="tblyy2" ><center><strong>email</strong></center></td> 
      <td class="tblyy2" ><center><strong>วันที่เริ่ม</strong></center></td> 
     <? if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ ?>
      <td class="tblyy2" ><center><strong>แก้ไข</strong></center></td>
      <? }?>
    </tr>
    <?
    //echo $account_status.",".$id_branch_self .",".  $id_branch_school ;
	//echo $id_branch_school;
if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ 
  $strSQL_branch = "SELECT * FROM  `branch` WHERE status_branch != 0";
}else{
  $strSQL_branch = "SELECT * FROM  `branch` WHERE branchid = '".$id_branch_self."' AND status_branch != 0";
}
	$QR_branch = mysql_query($strSQL_branch,$connect_self);
	while ($RS_branch = mysql_fetch_array($QR_branch)){
    $i++;
	?>
   	<tr>
      <td align="" class="tblyy" ><?=$RS_branch['branch_number'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['name'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['customer_name'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['sub_name'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['address'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['number_card'];?></td>
	    <td align="" class="tblyy" ><?=$RS_branch['phone'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['email'];?></td>
      <td align="" class="tblyy" ><?=$RS_branch['sdate'];?></td>
<? if($objResultSTT['status'] == 'admin' || $objResultSTT['status'] == 'ADMIN' or $objResultSTT['stid'] == 20 or $objResultSTT['stid'] == 26 || $objResultSTT["status"] == "admin_hms"){ ?>
	  <td align="center" class="tblyy" ><a href="information_branch.php?type=edit&branchid=<?=$RS_branch['branchid']?>">แก้ไข</a></td>
<? }?>
	</tr>
    <? }?>
</table>
</form>

<!--  update account db  -->
<? if($_GET["type"] == "update" && $_GET["branchid"] != ""){
$branchid = $_GET["branchid"];
$today = $_GET["today"];
$sub_name = $_GET["sub_name"];
$address = $_GET["address"];
$number_card = $_GET["number_card"];
$phone = $_GET["phone"];
$customer_name = $_GET["customer_name"];
$email = $_GET["email"];
$sdate = $_GET["sdate"];

  $strSQL_UPDATE = "UPDATE branch SET ";
  $strSQL_UPDATE .="sub_name = '".$sub_name."' ";
  $strSQL_UPDATE .=",customer_name = '".$customer_name."' ";
  $strSQL_UPDATE .=",address = '".$address."' ";
  $strSQL_UPDATE .=",number_card = '".$number_card."' ";
  $strSQL_UPDATE .=",phone = '".$phone."' ";
  $strSQL_UPDATE .=",sdate = '".$sdate."' ";
  $strSQL_UPDATE .=",email = '".$email."' ";
  $strSQL_UPDATE .="WHERE branchid = '".$branchid."' ";
  $QR_UPDATE = mysql_query($strSQL_UPDATE,$connect_self);
  if(!$QR_UPDATE){echo "update ข้อมูลผิดพลาด [".mysql_error().$strSQL_UPDATE."]";}
  else{
      echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
      echo "<script>window.location='information_branch.php';</script>";
  }
}
?>
</div>
</body>
</html>
<?php mysql_close();?>