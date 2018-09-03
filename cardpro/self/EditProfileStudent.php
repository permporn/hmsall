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
    <h1></h1>
    <p>
<?php
  if($_GET["Type"] == "Update" && $_GET["studentid"] != ''){
    $studentid = $_GET["studentid"];
    $name = $_GET["name"];
    $tel = $_GET["tel"];
    $email = $_GET["email"];
    $nickname = $_GET["nickname"];
    $school = $_GET["school"];
    $birthday = $_GET["birthday"];
    $pcode = $_GET["pcode"];
    $address = $_GET["address"];
    $dadname = $_GET["dadname"];
    $dadtel = $_GET["dadtel"];
    $momname = $_GET["momname"];
    $momtal = $_GET["momtal"];
    
    $query_Student = mysqli_query($con_ajtongmath_self, "SELECT * FROM student WHERE name = '".$name."' AND studentid = $studentid");
    $result_Student = mysqli_fetch_array($query_Student);
    //echo $result_Student["name"];
    if($result_Student){
      $strSQL1 = "UPDATE student SET ";
      $strSQL1 .= " name = '".$name."' ";
      $strSQL1 .= " ,tel = '".$tel."' ";
      $strSQL1 .= " ,email = '".$email."' ";
      $strSQL1 .= " ,nickname = '".$nickname."' ";
      $strSQL1 .= " ,school = '".$school."' ";
      $strSQL1 .= " ,birthday = '".$birthday."' ";
      $strSQL1 .= " ,pcode = '".$pcode."' ";
      $strSQL1 .= " ,address = '".$address."' ";
      $strSQL1 .= " ,dadname = '".$dadname."' ";
      $strSQL1 .= " ,dadtel = '".$dadtel."' ";
      $strSQL1 .= " ,momname = '".$momname."' ";
      $strSQL1 .= " ,momtal = '".$momtal."' ";
      $strSQL1 .= " WHERE studentid = '".$studentid."'";
      $objQuery = mysqli_query($strSQL1);
      if($objQuery){
      echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
      echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
      }else{
        echo "<script language='javascript'>alert('ผิดพลาดกรุณทำรายการใหม่');</script>";
        echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
        }
    }else{
      $query_Student = mysqli_query($con_ajtongmath_self, "SELECT * FROM student WHERE name = '".$name."'");
      $result_Student = mysqli_fetch_array($query_Student);
      if(empty($result_Student)){
        $strSQL1 = "UPDATE student SET ";
        $strSQL1 .= " name = '".$name."' ";
        $strSQL1 .= " ,tel = '".$tel."' ";
        $strSQL1 .= " ,email = '".$email."' ";
        $strSQL1 .= " ,nickname = '".$nickname."' ";
        $strSQL1 .= " ,school = '".$school."' ";
        $strSQL1 .= " ,birthday = '".$birthday."' ";
        $strSQL1 .= " ,pcode = '".$pcode."' ";
        $strSQL1 .= " ,address = '".$address."' ";
        $strSQL1 .= " ,dadname = '".$dadname."' ";
        $strSQL1 .= " ,dadtel = '".$dadtel."' ";
        $strSQL1 .= " ,momname = '".$momname."' ";
        $strSQL1 .= " ,momtal = '".$momtal."' ";
        $strSQL1 .= " WHERE studentid = '".$studentid."'";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL1);
        if($objQuery){
        echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
        echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
        }else{
        echo "<script language='javascript'>alert('ผิดพลาดกรุณทำรายการใหม่');</script>";
        echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
        }
      }else{
      echo "<script language='javascript'>alert('ชื่อ-นามสกุลซ้ำ!!');</script>";
      echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
      }
    }
}
    if($_GET['Type'] == 'updateId' && $_GET['h_arti_id_name'] != ''  && $_GET['accid'] != ''){
        $studentid = $_GET['h_arti_id_name'];
        $strSQL1 = "UPDATE account SET ";
        $strSQL1 .= " studentid  = '".$studentid."' ";
        $strSQL1 .= " WHERE accid = '".$_GET['accid']."'";
        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL1);
        if($objQuery){
          echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
          echo "<script>window.location='EditProfileStudent.php?IdStudent=$studentid&Type=Edit';</script>";
        }
    }
    
  
  
  if($_GET["IdStudent"] != "" && $_GET["Type"] == "Edit"){

      $strSQL = "SELECT * FROM student WHERE studentid = '".$_GET["IdStudent"]."'";
      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
      $objResult = mysqli_fetch_array($objQuery);
      
      $statusout = "out";
      $strSQL2 = "SELECT * FROM account WHERE studentid = ".$objResult["studentid"]." AND status != 'out'";
      $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
      $l = 1;
  ?>
    <br>
    <form name="Edit" action="EditProfileStudent.php" method="get" > 
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>  
    <?php if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 9;$b = 2;$c = 7;?><?php }else{$a = 8;$b = 2;$c = 6;} ?>
            <td colspan="<?=$a?>" class="tbl2" style="white-space: nowrap;" align="center"  height="">
            แก้ไขข้อมูลนักเรียน <font color="#FF0000"><br /><strong>*</strong>กรุณากรอกข้อมูลให้ครบถ้วนและถูกต้องเพื่อเป็นประโยชน์แก่องค์กร</font></td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          รหัสนักเรียน : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <input type="hidden" name="studentid"  value="<?=$objResult["studentid"];?>"/>
          <input type="hidden" name="Type"  value="Update"/>
          <font color="#0099FF"><?=$objResult["studentid"];?></font> 
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อ : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="" align="left"  height="">
          <font color="#0099FF"><input type="text" name="name"  value="<?=$objResult["name"];?>"/></font><font color="#FF0000"><strong> *</strong> ชื่อที่แก้ไขต้องไม่ซ้ำกับรายชื่อที่มีอยุู่ และการพิมพ์รายชื่อต้องพิมพ์ชื่อเว้นวรรณ 1 ที ตามด้วยนามสกุล เช่น เด็กโต้ง ขยันเรียน </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เบอร์โทร : </td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="tel"  value="<?=$objResult["tel"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          email :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="email"  value="<?=$objResult["email"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อเล่น :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="nickname"  value="<?=$objResult["nickname"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          โรงเรียน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="school"  value="<?=$objResult["school"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          วันเกิด :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="birthday"  value="<?=$objResult["birthday"];?>"/></font>
          </td>
      </tr> 
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เลขประจำตัวประชาชน :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="pcode"  value="<?=$objResult["pcode"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ที่อยู่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="address"  value="<?=$objResult["address"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อพ่อ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="dadname"  value="<?=$objResult["dadname"];?>"/> </font>
           เบอร์โทรพ่อ :  <font color="#0099FF"><input type="text" name="dadtel"  value="<?=$objResult["dadtel"];?>"/> </font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          ชื่อแม่ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="text" name="momname"  value="<?=$objResult["momname"];?>"/> </font>
          เบอร์โทรแม่ :  <font color="#0099FF"><input type="text" name="momtal"  value="<?=$objResult["momtal"];?>"/></font>
          </td>
      </tr>
      <tr>
          <td colspan="<?=$b;?>" class="tblyy" style="white-space: nowrap;" align="right"  height="">
          เพศ :</td>
          <td colspan="<?=$c;?>" class="tblyy" style="white-space: nowrap;" align="left"  height="">
          <font color="#0099FF"><input type="hidden" name="sex"  value="<?=$objResult["sex"];?>"/> <?=$objResult["sex"];?></font>
          </td>
      </tr>
</table>
  <br />
  <center><button type="submit" name="submit">บันทึก </button>
    <a href="searchstudent.php?show_arti_topic=<?=$objResult["name"];?>&h_arti_id=<?=$objResult["name"];?>"><button type="button" name="back">กลับ </button></a></center>
</form>   
<?php }elseif ($_GET["accid"] != "" && $_GET["Type"] == "Edit") {?>
<form name="Edit" action="EditProfileStudent.php" method="get" > 
    <h3>แก้ไขข้อมูลนักเรียน</h3>
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>
        <td width="20%" class="tblyy2" height="35">ชื่อ-นามสกุล : </td>
        <td width="60%" class="tblyy" height="35">
            <input type="hidden" name="Type"  value="updateId"/>
            <input type="hidden" name="accid" id="accid" value="<?=$_GET['accid']?>"/>
            <input name="show_arti_topic_name" type="text" id="show_arti_topic_name" size="30" value="<?=$_GET['name'];?>" />
            <input name="h_arti_id_name" type="hidden" id="h_arti_id_name" value="" /><a href="addstudent.php?type=addacount">เพิ่มรายชื่อ</a>
            <br />
            <font color="#FF0000"><strong> *</strong>การเพิ่มรายชื่อใหม่ต้องแน่ใจว่าไม่มีรายชื่อในระบบจริงๆ 
            เพื่อเป็นการไม่ให้รายชื่อซ้ำซ้อน กรุณาค้นหารายชื่อในระบบให้ละเอียดก่อนเพิ่มใหม่ </font> ( แนะนำการค้นหารายชื่อ ให้ค้นหาจากนามสกุลก่อน )
        </td>
      </tr>
    </table>
  <br />
  <center><button type="submit" name="submit">บันทึก </button>
    <a href="searchstudent.php?show_arti_topic=<?=$objResult["name"];?>&h_arti_id=<?=$objResult["name"];?>"><button type="button" name="back">กลับ </button></a></center>
</form>  
<?php }
mysqli_close($con_ajtongmath_self);?>
<script type="text/javascript">
// function make_autocomname(autoObj,showObj){
//     var mkAutoObj=autoObj; 
//     var mkSerValObj=showObj; 
//     new Autocomplete(mkAutoObj, function() {
//         this.setValue = function(id) {      
//             document.getElementById(mkSerValObj).value = id;
//         }
//         if ( this.isModified )
//             this.setValue("");
//         if ( this.value.length < 1 && this.isNotClick ) 
//             return ;    
//         return "dataname.php?q=" +encodeURIComponent(this.value);
//     }); 
// }
// make_autocomname("show_arti_topic_name","h_arti_id_name");
</script>
</html>
