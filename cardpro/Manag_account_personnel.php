<? 
session_start();
include("config.inc_multidb.php");
include("funtion.php");
include("ck_session2.php");
include("script_link.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="autocomplete/autocomplete.js"></script>
<link rel="stylesheet" href="autocomplete/autocomplete.css"  type="text/css"/>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/default.css"/>
<title><?=$title?></title>
</head>
<script type="text/javascript">
  $(function() {
    $(".teacher_id").hide();
    $("#status").change(function(){
        var status = $("#status").val();
        if(status == "teacher"){
          $(".branch").hide();
          $(".teacher_id").show();
        }else{
          $(".teacher_id").hide();
          $(".branch").show();
        }
    });
  });

</script>
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php');?>
  <div id="content">
    <h1>ข้อมูล Account พนักงาน</h1>
    <p>
    <div align="right">
    <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["status"]=="admin_hms" AND $objResultSTT["status"] != "pre_end"){?>
    <a href="Manag_account_personnel.php?type=insert"> + เพิ่ม Account </a></label>
    <? }?>
   </div>
   </p>
   <br />
  
  
  <!-- เพิ่ม Account    -->
  <?  $type = $_GET["type"];?>
  <? if($type == "insert" ){?>
  <form name="frm" method="get" action="Manag_account_personnel.php">
   <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
        <tr >
            <td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
            <strong> + เพิ่ม Account</strong>
            </td>
        </tr>
        <tr>
          <td align="left" class="tblyy2"><strong>ชื่อพนักงาน</strong></td>
          <td align="left" class="tblyy" >
          <input  type="hidden" name="type" value="add" />
          <input  type="hidden" name="today" value="<?=date('Y-m-d')?>" />
          <input type="text" name="name" value="" style="width:200px"/>
          <font color="#EE0000"><strong> *</strong></font></td>
        </tr>
        <tr>
          <td align="left" class="tblyy2"><strong>Username</strong></td>
          <td align="left" class="tblyy" ><input type="text" name="Username" value="" style="width:100px"/>
          <font color="#EE0000"><strong> *</strong></td>
        </tr>
        <tr>
          <td align="left" class="tblyy2"><strong>Password</strong></td>
          <td align="left" class="tblyy" ><input type="text" name="Password" value="" style="width:100px"/> 
          <font color="#EE0000"><strong> *</strong></font></td>
        </tr>
        <tr>
          <td align="left" class="tblyy2"><strong>ประเภท</strong></td>
          <td align="left" class="tblyy" >
          <select name="status" style="width:150px" id="status" class="status">
            <option value="0" disabled="disabled" selected="selected">เลือกสถานะ</option>
            <? if($objResultSTT["status"] != "admin_hms"){?>
            <option value="user" >user</option>
            <option value="admin" >admin</option>
            <option value="manager_franchise" >manager_franchise</option>
            <option value="user_franchise" >user_franchise</option>
            <? if($objResultSTT["mapid"]=="15" || $objResultSTT["mapid"]=="141"){?>
            <option value="admin_hms" >admin_hms</option>
            <? }}else{?>
            <option value="manager_franchise" >manager_franchise</option>
            <option value="user_franchise" >user_franchise</option>
            <? }?>
            <option value="teacher" >teacher</option>
            <option value="pre_end" >เตรียมปิด</option>
          </select>
          <font color="#EE0000"><strong> *</strong></font></td>
        </tr>
        <tr>
        <td align="left" class="tblyy2"><strong>สาขาที่ประจำการ</strong></td>
          <td align="left" class="tblyy" >
          <select name="branch" style="width:150px" id="branch" class="branch">
            <!-- <option value="0" disabled="disabled" selected="selected">เลือกสาขา</option> -->
            <? if($objResultSTT["status"]=="admin_hms"){
              $QR_branchname = mysql_query("SELECT * FROM branch WHERE status = 3 AND status_branch != 0",$connect_school);
            }else{
              $QR_branchname = mysql_query("SELECT * FROM branch WHERE branchid != 2",$connect_school);  
            }
                while($RS_branchname = mysql_fetch_array($QR_branchname)){?>
            <option value="<?=$RS_branchname['branchid'];?>" ><?=$RS_branchname['branchname'];?></option><? }?>
          </select>
          
          <select name="teacher_id" style="width:150px" id="teacher_id" class="teacher_id">
            <!-- <option value="0" disabled="disabled" selected="selected">เลือกครู</option> -->
             <? 
              $QR_teacher_id = mysql_query("SELECT * FROM teacher ",$connect_school);
              while($RS_teacher_id = mysql_fetch_array($QR_teacher_id)){?>
            <option value="<?=$RS_teacher_id['teacherid'];?>" ><?=$RS_teacher_id['teachername'];?></option><? }?>
            </select>
            <font color="#EE0000"><strong> *</strong></font>
          </td>
        </tr>
        <tr>
          <td align="left" class="tblyy2"></td>
          <td align="left" class="tblyy" >
            <input type="submit" name="Submit" value="บันทึก">
            <font color="#EE0000"><strong> *</strong> หมายเหตุ กรุณากรอกข้อมูลให้ครบถ้วน</font>
          </td>
        </tr>
</table>
</form>
<? }?>
  

<!--  แก้ไข  -->
<? if($_GET['type'] == "edit" && $_GET['id_user_school'] != ""){
    $id_user_school = $_GET['id_user_school'];
    
    $strSQL_edit = "SELECT * FROM account WHERE accid = $id_user_school";
    $QR_edit = mysql_query($strSQL_edit,$connect_school);
    $RS_edit = mysql_fetch_array($QR_edit);
?>
<form name="frm" method="get" action="Manag_account_personnel.php?type=update">
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr >
        <td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
        <strong> + แก้ไข Account </strong>
        </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>ชื่อพนักงาน</strong></td>
      <td align="left" class="tblyy" >
      <input  type="hidden" name="type" value="update"/>
      <input  type="hidden" name="id_user_school" value="<?=$id_user_school?>"/>
      <input  type="hidden" name="today" value="<?=date('Y-m-d')?>" />
      <input type="text" name="name" value="<?=$RS_edit['name'];?>" style="width:200px"/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>Username</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="Username" value="<?=$RS_edit['username'];?>" style="width:100px" 
      <? if($objResultSTT["status"]=="manager_franchise"){?> readonly="readonly" <? }?>/>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>Password</strong></td>
      <td align="left" class="tblyy" ><input type="text" name="Password" value="<?=$RS_edit['Password'];?>" style="width:100px"/>
      </td>
    </tr>
    <? if($objResultSTT["status"]=="Manager" || $objResultSTT["status"]=="ADMIN" || $objResultSTT["status"]=="admin" || $objResultSTT["status"]=="admin_hms"){?>
    <tr>
      <td align="left" class="tblyy2"><strong>ประเภท</strong></td>
      <td align="left" class="tblyy" >
      <select name="status" style="width:150px" class="status" id="status">
        <option value="<?=$RS_edit['status'];?>" selected="selected"><?=$RS_edit['status'];?></option>
        <? if($objResultSTT["status"] != "admin_hms"){?>
        <option value="user" >user</option>
        <option value="admin" >admin</option>
        <option value="manager_franchise" >manager_franchise</option>
        <option value="user_franchise" >user_franchise</option>
        <? if($objResultSTT["mapid"]=="15" || $objResultSTT["mapid"]=="141" || $objResultSTT["status"]=="admin_hms"){?>
        <option value="admin_hms" >admin_hms</option>
        <? }?>
        <option value="teacher" >teacher</option>
        <option value="pre_end" >เตรียมปิด</option>
        <option value="end" >ยกเลิก/ลาออก</option>
        <? }else{?>
            <option value="manager_franchise" >manager_franchise</option>
            <option value="user_franchise" >user_franchise</option>
        <? }?>

      </select>
      </td>
    </tr>
    <tr>
      <td align="left" class="tblyy2"><strong>สาขาที่ประจำการ</strong></td>
      <td align="left" class="tblyy" >
      <? if($RS_edit['status'] != "teacher"){?>
      <select name="branch" style="width:150px" class="branch" id="branch">
        <?  $QR_branchname = mysql_query("SELECT * FROM branch WHERE branchid = '".$RS_edit['branchid']."'",$connect_school);
            $RS_branchname = mysql_fetch_array($QR_branchname);?>
        <option value="<?=$RS_edit['branchid'];?>" selected="selected"><?=$RS_branchname['branchname'];?></option>
        <? if($objResultSTT["status"]=="admin_hms"){
              $QR_branchname_all = mysql_query("SELECT * FROM branch WHERE branchid != '".$RS_edit['branchid']."' AND status = 3",$connect_school);
            }else{
              $QR_branchname_all = mysql_query("SELECT * FROM branch WHERE branchid != '".$RS_edit['branchid']."'",$connect_school);
            }
            while($RS_branchname_all = mysql_fetch_array($QR_branchname_all)){?>
        <option value="<?=$RS_branchname_all['branchid'];?>" ><?=$RS_branchname_all['branchname'];?></option><? }?>
      </select>
      <? }else{?>
      <select name="teacher_id" style="width:150px" id="teacher_id" class="teacher_id">
         <? 
          $QR_teacher_id = mysql_query("SELECT * FROM teacher ",$connect_school);
          while($RS_teacher_id = mysql_fetch_array($QR_teacher_id)){;?>
            <option value="<?=$RS_teacher_id['teacherid'];?>" <? if($RS_edit['teacher_id'] == $RS_teacher_id['teacherid']){?>selected="selected" <? }?>><?=$RS_teacher_id['teachername'];?></option>
            <? }?>
      </select>
      <? }?>
      </td>
    </tr>
  <? }?>
    
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
<!--  แสดงวิชาที่บันทึก -->
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
    <tr>
        <td colspan="7" class="tbl23" style="white-space: nowrap;" align="center">
        <strong> ตาราง account ทั้งหมด </strong>
        </td>
    </tr>
    <tr>
      <td align="" class="tblyy2" ><center><strong>ลำดับ</strong></center></td>
      <td width="21%" align="" class="tblyy2" ><center><strong>ชื่อ</strong></center></td>
      <td width="18%" align="" class="tblyy2" ><center><strong>Username</strong></center></td>
      <td width="20%" align="" class="tblyy2" ><center><strong>Password</strong></center></td>
      <td width="11%" align="" class="tblyy2" ><center><strong>สาขา</strong></center></td>
      <td width="14%" align="" class="tblyy2" ><center><strong>สถานะ</strong></center></td> 
      <td width="12%" align="" class="tblyy2" ><center><strong>แก้ไข</strong></center></td>
    </tr>
    <?
    $i = 0;

    //echo $account_status.",".$id_branch_self .",".  $id_branch_school ;
    $strSQL_allaccount = "
        SELECT 
        account.accid AS account_id, 
        account.username AS account_username, 
        account.Password AS account_password, 
        account.name AS account_name, 
        account.branchid AS account_branchid, 
        account.status AS account_status, 
        account.teacher_id AS account_teacher_id, 
        account.mapid AS account_mapid, 
        branch.branchid AS branch_id, 
        branch.branchname AS branch_name, 
        branch.status AS branch_status, 
        branch.id_branch_self AS branch_id_self,
        teacher.teachername AS teachername
        FROM account
        LEFT JOIN branch ON account.branchid = branch.branchid
        LEFT JOIN teacher ON account.teacher_id = teacher.teacherid
        WHERE accid != 28 AND accid != 133 AND account.status != 'end'";

    if($account_status == "manager_franchise"){
      $strSQL_allaccount .= " AND branch.branchid = '".$id_branch_school."'";
    }
    if($account_status == "pre_end"){
      $strSQL_allaccount .= " AND branch.branchid = '".$id_branch_school."'";
    }
    if($account_status == "user_franchise"){
      $strSQL_allaccount .= " AND account.accid = '".$objResultSTT["accid"]."'";
    }
    if($account_status == "admin_hms"){
      $strSQL_allaccount .= " AND branch.status = 3 ";
    }
    $strSQL_allaccount .= " ORDER BY account.accid DESC";

    $QR_allaccount = mysql_query($strSQL_allaccount,$connect_school);
    while ($RS_allaccount = mysql_fetch_array($QR_allaccount)){
    $i++;
   // echo $strSQL_allaccount ;
    ?>
    <tr>
      <td align="" class="tblyy" ><?=$i?></td>
      <td align="" class="tblyy" ><?=$RS_allaccount['account_name'];?></td>
      <td align="" class="tblyy" ><?=$RS_allaccount['account_username'];?></td>
      <td align="" class="tblyy" ><?=$RS_allaccount['account_password'];?></td>
      <td align="" class="tblyy" >
      <? if($RS_allaccount['account_status'] == "teacher"){
          echo $RS_allaccount['teachername'];
      }else{
          echo $RS_allaccount['branch_name'];
      }
      ?>
        
      </td>
      <td align="" class="tblyy" >
      <? if($RS_allaccount['account_status'] == 'user'){echo "User ";}
        else if($RS_allaccount['account_status'] == 'User'){echo " User  ";}
        /*else if($RS_allaccount['status'] == 'ADMIN'){echo " Admin (ใช้งาน)";}*/
        else if($RS_allaccount['account_status'] == 'admin'){echo " Admin  ";}
        else if($RS_allaccount['account_status'] == 'Manager'){echo " Manager  ";}
        else if($RS_allaccount['account_status'] == 'end'){echo "<font color='#BBBBBB'>เลิกใช้/ลาออก</font>";}
        else if($RS_allaccount['account_status'] == 'manager_franchise'){echo " manager franchise ";}
        else if($RS_allaccount['account_status'] == 'user_franchise'){echo " user franchise ";}
        else if($RS_allaccount['account_status'] == 'admin_hms'){echo " admin hms ";}
        else if($RS_allaccount['account_status'] == 'teacher'){echo " teacher ";}
        else if($RS_allaccount['account_status'] == 'pre_end'){echo " เตรียมปิด ";}
      ?></td>
      <td align="center" class="tblyy" ><a href="Manag_account_personnel.php?type=edit&id_user_school=<?=$RS_allaccount['account_id']?>">แก้ไข</a></td>
    </tr>
    <? }?>
</table>
</form>
<!--  insert account db  -->
<? if($_GET["type"] == "add"){
    if($_GET["today"] != "" && $_GET["name"] != "" && $_GET["Username"] != "" && $_GET["Password"] != "" && $_GET["branch"] != "" && $_GET["status"] != "" && $_GET["teacher_id"] != ""){
      
      $today = $_GET["today"];
      $name = $_GET["name"];
      $Username = $_GET["Username"];
      $Password = $_GET["Password"];
      $branch = $_GET["branch"];
      $status = $_GET["status"];
      $teacher_id = $_GET["teacher_id"];
      
      $sj = 0 ;
      // เช็คชื่อ user&pass ซ้ำ 
      $strSQL_name = "SELECT * FROM account WHERE name = '$name' AND username = '$Username' AND Password = '$Password'";
      $QR_name = mysql_query($strSQL_name,$connect_school);
      $RS_name = mysql_fetch_array($QR_name);
      if($RS_name){
      echo "<script language='javascript'>alert('username และ Password ซ้ำ กรุณาทำรายการใหม่');</script>";
      echo "<script>window.history.back();</script>";}
      else{   
      $sql = "INSERT INTO account(" ;
      $sql .= " username";
      $sql .= ", Password";
      $sql .= ", name";
      $sql .= ", branchid";
      $sql .= ", status";
      $sql .= ", teacher_id";
      $sql .= ") values (";
      $sql .= "'$Username'";
      $sql .= ", '$Password'";
      $sql .= ", '$name'";
      $sql .= ", '$branch'";
      $sql .= ", '$status'";
      $sql .= ", '$teacher_id'";
      $sql .= ")"; 
      $QR_Insret_name = mysql_query($sql,$connect_school);
      if(!$QR_Insret_name){echo "Error save account school [".mysql_error().$sql."]";}
      else{
        $strSQL = "SELECT
                    account.accid,
                    account.username,
                    account.`Password`,
                    account.`name`,
                    account.branchid,
                    account.`status`,
                    account.mapid,
                    branch.id_branch_self
                    FROM
                    account
                    INNER JOIN branch ON branch.branchid = account.branchid 
                    WHERE name = '$name' AND username = '$Username' AND Password = '$Password'";
        $QR_name = mysql_query($strSQL,$connect_school);
        $RS_name = mysql_fetch_array($QR_name);
        //print_r($RS_name);
        $id_user_school = $RS_name['accid'];
        $id_branch_self = $RS_name['id_branch_self'];
        //echo  $id_branch_self;exit();
        if($status == "teacher"){
          $strSQL_teacher = "SELECT * FROM  `teacher` WHERE  teacherid = $teacher_id";
          $QR_name_teacher = mysql_query($strSQL_teacher,$connect_school);
          $RS_name_teacher = mysql_fetch_array($QR_name_teacher);
          $teacher_id_self = $RS_name_teacher['map_id_self'];
          $teacher_id_school = $RS_name_teacher['teacherid'];
        }
        if(!$RS_name){
            echo "ค้นหา id_user_school ไม่เจอ [".mysql_error().$strSQL."]";}
          else{
          // if($branch == 9){$branch = 6;}
          // else if($branch == 11){$branch = 7;}
          // else if($branch == 12){$branch = 8;}
          $sql = "INSERT INTO staff(" ;
          $sql .= " username";
          $sql .= ", password";
          $sql .= ", stname";
          $sql .= ", status";
          $sql .= ", branchid";
          $sql .= ", teacher_id";
          $sql .= ", mapid";
          $sql .= ") values (";
          $sql .= "'$Username'";
          $sql .= ", '$Password'";
          $sql .= ", '$name'";
          $sql .= ", '$status'";
          $sql .= ", '$id_branch_self'";
          $sql .= ", '$teacher_id_self'";
          $sql .= ", '$id_user_school'";
          $sql .= ")"; 
          $QR_Insret_staff = mysql_query($sql,$connect_self);
            if(!$QR_Insret_staff){echo "Error save account self [".mysql_error().$sql."]";}
            else{
            $strSQL_staff = "SELECT * FROM staff WHERE stname = '$name' AND username = '$Username' AND password = '$Password'";
            $QR_staff = mysql_query($strSQL_staff,$connect_self);
            $RS_staff = mysql_fetch_array($QR_staff);
            $id_user_self = $RS_staff['stid'];
            //echo $id_user_self;
            if(!$QR_staff){echo "ค้นหา id_staff ไม่เจอ [".mysql_error().$strSQL_staff."]";}
            else{
              $strSQL_UPDATE = "UPDATE account SET ";
              $strSQL_UPDATE .="mapid = '".$id_user_self."' ";
              $strSQL_UPDATE .="WHERE accid = '".$id_user_school."' ";
              $QR_UPDATE = mysql_query($strSQL_UPDATE,$connect_school);
              //echo $strSQL_UPDATE;
              if(!$QR_UPDATE){echo "Error UPDATE mapid self [".mysql_error().$strSQL_UPDATE."]";}
              else{   
              echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
              echo "<script>window.location='Manag_account_personnel.php?action=show&id_user_school=$id_user_school&id_user_self=$id_user_self';</script>";}
              }
            }
          }
        }
        }
  }else{
    echo "<script language='javascript'>alert('การส่งข้อมูลไม่ครบ หรือผิดพลาด');</script>";
    echo "<script>window.history.back();</script>";}
}?>
<!--  update account db  -->
<? if($_GET["type"] == "update" && $_GET["id_user_school"] != ""){
$id_user_school = $_GET["id_user_school"];
$today = $_GET["today"];
$name = $_GET["name"];
$Username = $_GET["Username"];
$Password = $_GET["Password"];
$branch = $_GET["branch"];
$status = $_GET["status"];
$teacher_id = $_GET["teacher_id"];
if($status =='end'){$Username = $Username."_end";}
else{$Username = str_replace("_end"," ","$Username");}
      
  $strSQL_UPDATE = "UPDATE account SET ";
  $strSQL_UPDATE .="username = '".$Username."' ";
  $strSQL_UPDATE .=",Password = '".$Password."' ";
  $strSQL_UPDATE .=",name = '".$name."' ";
  if($branch != ''){
  $strSQL_UPDATE .=",branchid  = '".$branch."' ";}
  if($status != ''){
  $strSQL_UPDATE .=",status = '".$status."' ";}
  $strSQL_UPDATE .=",teacher_id = '".$teacher_id."' ";
  $strSQL_UPDATE .="WHERE accid = '".$id_user_school."' ";
  $QR_UPDATE = mysql_query($strSQL_UPDATE,$connect_school);
  if(!$QR_UPDATE){echo "update school ข้อมูลผิดพลาด [".mysql_error().$strSQL_UPDATE."]";}
  else{
  $strSQL = "SELECT
                    account.accid,
                    account.username,
                    account.`Password`,
                    account.`name`,
                    account.branchid,
                    account.`status`,
                    account.mapid,
                    branch.id_branch_self
                    FROM
                    account
                    INNER JOIN branch ON branch.branchid = account.branchid 
                    WHERE accid = '$id_user_school'";
  $QR_name = mysql_query($strSQL,$connect_school);
  $RS_name = mysql_fetch_array($QR_name);
  $id_user_self = $RS_name['mapid'];
  $id_branch_self = $RS_name['id_branch_self'];
  
    $strSQL_UPDATE = "UPDATE staff SET ";
    $strSQL_UPDATE .="username = '".$Username."' ";
    $strSQL_UPDATE .=",password = '".$Password."' ";
    $strSQL_UPDATE .=",stname = '".$name."' ";
    if($status != ''){
    $strSQL_UPDATE .=",status  = '".$status."' ";}
    if($branch != ''){
    $strSQL_UPDATE .=",branchid = '".$id_branch_self."' ";}
    $strSQL_UPDATE .="WHERE stid = '".$id_user_self."' ";
    $QR_UPDATE = mysql_query($strSQL_UPDATE,$connect_self);
    if(!$QR_UPDATE){echo "update self ข้อมูลผิดพลาด [".mysql_error().$strSQL_UPDATE."]";}
    else{
      echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
      echo "<script>window.location='Manag_account_personnel.php?action=show';</script>";}
  }
}
?>
</div>
</body>
</html>
<?php mysql_close();?>