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
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php')?>
  <div id="content">
   <!-- <h1>ใบคำร้อง</h1>-->
    <p>
    <div align="right">
    <form name="form1" action="user_request.php" method="post">
    <label for="type"><strong>+ เพิ่มใบคำร้อง :</strong></label>
       <select name="type" id="type" >
       		<option value="0" disabled="disabled" <? if($_POST['type']!=""){?>selected="selected"<? }?>>เลือกประเภทใบคำร้อง</option>
	   <? $objQuery_type = mysql_query("SELECT * FROM ptt_type ORDER BY id");
	   while($objResult_type = mysql_fetch_array($objQuery_type)){?>
            <option value="<?=$objResult_type['id']?>" <? if($_POST["type"]==$objResult_type['id']){ ?>selected="selected"<? }?>><?=$objResult_type['name_type']?></option>
       <? } ?>
       </select>
       <input class="button" type="submit" name="Submit" value="เพิ่ม" style="width:70px"/>
   </form>
   </div>
   </p>
   </div>
	<? if($_GET["ac"]=="edit"){
		$query_ReqEdit = mysql_query("SELECT * FROM ptt_request WHERE id = '".$_GET["id"]."'");
		$result_ReqEdit = mysql_fetch_array($query_ReqEdit);
	?>
    <form name="form1" method="post" action="user_request_insert.php?ac=edit&id=<?=$result_ReqEdit["id"]?>">
    	<input type="hidden" id="type" name="type" value="<?=$result_ReqEdit["type"]?>" />
        <input type="hidden" name="accid_user" id="accid_user" value="<?=$objResultSTT["accid"]?>" />
      	<input type="hidden" name="branchid" id="branchid" value="<?=$objResultSTT["branchid"]?>" />
      	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
        	<tr >
            	<td colspan="2" class="tbl23" style="white-space: nowrap;" align="center"  height="30">
                คำร้อง
				<?
                    $query_tname = mysql_query("SELECT name_type FROM ptt_type WHERE id = '".$result_ReqEdit["type"]."'");
                    $result_tname = mysql_fetch_array($query_tname);
					if($result_ReqEdit["type"]=="3"){echo "แจ้ง";}
                    echo $result_tname["name_type"];
                ?>
        		</td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2" >วันที่บันทึก </td>
              <td align="left" class="tblyy" ><input type="date" name="today" id="today" value="<?=date('Y-m-d')?>" readonly="readonly" />*หมายเหตุ เวลาที่บันทึกจะถูกเปลี่ยนเป็นเวลาปัจจุบัน</td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2" >วันที่ร้องขอ </td>
              <td align="left" class="tblyy" ><input type="date" name="date_request" id="date_request" value="<?=$result_ReqEdit["date_request"]?>" />
       		  </td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2" >เรื่อง </td>
              <td align="left" class="tblyy" ><input type="text" name="subject" id="subject" value="<?=$result_ReqEdit["subject"]?>" />
       		  </td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2" >เรียน</td>
              <td align="left" class="tblyy" ><input type="text" name="request_to" id="request_to" value="<?=$result_ReqEdit["request_to"]?>" />
              </td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>ข้าพเจ้า</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="name" id="name" value="<?=$result_ReqEdit["name"]?>" style="width:200px"/>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>เบอร์ติดต่อ</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="tel" id="tel" value="<?=$result_ReqEdit["tel"]?>" />
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>มีความประสงค์</strong></td>
           	  <td align="left" class="tblyy" >
              	  <?php if($result_ReqEdit["type"]=="4"){ ?>
                      <textarea name="wishes" id="wishes" cols="45" rows="5"><?=$result_ReqEdit["wishes"]?></textarea>
                      <font color="#EE0000"><strong> *</strong></font>
                  <?php }else if($result_ReqEdit["type"]=="2"){?>
                      <strong>ขอ<?=$result_tname["name_type"]?></strong><br /><br />
                      <strong>- จากเดิม</strong><br />
                      ชื่อคอร์ส : <input name="course_name" id="course_name" value="<?=$result_ReqEdit["course_name"]?>" />
                      รหัสคอร์ส : <input name="course_code" id="course_code" value="<?=$result_ReqEdit["course_code"]?>" style="width:100px"/>
                      ราคา : <input name="course_price" id="course_price" value="<?=$result_ReqEdit["course_price"]?>" style="width:100px" />
                      วันที่โอน : <input type="date" name="course_transfer" id="course_transfer" value="<?=$result_ReqEdit["course_transfer"]?>"/><br /><br />
                      <strong>- เปลี่ยนเป็น</strong><br />
                      ชื่อคอร์ส : <input name="course2_name" id="course2_name" value="<?=$result_ReqEdit["course2_name"]?>" />
                      รหัสคอร์ส : <input name="course2_code" id="course2_code" value="<?=$result_ReqEdit["course2_code"]?>" style="width:100px"/>
                      ราคา : <input name="course2_price" id="course2_price" value="<?=$result_ReqEdit["course2_price"]?>" style="width:100px" />
                  <?php }else if($result_ReqEdit["type"]=="1" || $result_ReqEdit["type"]=="3"){?>
                  	  <strong><?php if($result_ReqEdit['type'] == '1'){echo "ขอ";}if($result_ReqEdit['type'] == '3'){echo "แจ้ง";}echo $result_tname["name_type"];?></strong><br />
                      ชื่อคอร์ส :<input name="course_name" id="course_name" value="<?=$result_ReqEdit["course_name"]?>" />
                      รหัสคอร์ส :<input name="course_code" id="course_code" value="<?=$result_ReqEdit["course_code"]?>" style="width:100px"/>
                      ราคา :<input name="course_price" id="course_price" value="<?=$result_ReqEdit["course_price"]?>" style="width:100px" />
                      วันที่โอน :<input type="date" name="course_transfer" id="course_transfer" value="<?=$result_ReqEdit["course_transfer"]?>"  />
                  <?php }?>
                  <br /><br /><font color="#EE0000"><strong> *</strong> กรุณากรอกข้อมูลให้ครบถ้วนเพื่อให้การดำเนินการรวดเร็วยิ่งขึ้น</font>
              </td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>เนื่องจาก</strong></td>
           	  <td align="left" class="tblyy" ><textarea name="because" id="because" cols="45" rows="5"><?=$result_ReqEdit["because"]?></textarea>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"></td>
           	  <td align="left" class="tblyy" >
              	<input type="submit" name="Submit" value="บันทึก">
      			<input type="button" name="cmdweblogin" class="button" value="ยกเลิก" onClick="window.location='user_home.php'"/> 
                <font color="#EE0000"><strong> *</strong> หมายเหตุ เวลาที่บันทึกจะถูกเปลี่ยนเป็นเวลาปัจจุบัน</font>
              </td>
            </tr>
        </table>
    </form>
    <? }else{?>
    <form name="form1" method="post" action="user_request_insert.php?ac=add">
    <?
	if($_POST['type'] == 0){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('กรุณาเลือกประเภทใบคำร้อง');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=user_home.php'>";
		exit();
	}
	?>
    	<input type="hidden" id="type" name="type" value="<?=$_POST["type"]?>" />
        <input type="hidden" name="accid_user" id="accid_user" value="<?=$objResultSTT["accid"]?>" />
      	<input type="hidden" name="branchid" id="branchid" value="<?=$objResultSTT["branchid"]?>" />
      	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
        	<tr >
            	<td colspan="2" class="tbl23" style="white-space: nowrap;" align="center"  height="30">
                <strong><p>คำร้อง
				<?
                    $query_tname = mysql_query("SELECT name_type FROM ptt_type WHERE id = '".$_POST["type"]."'");
                    $result_tname = mysql_fetch_array($query_tname);
					if($_POST["type"]=="3"){echo "แจ้ง";}
                    echo $result_tname["name_type"];
                ?></p></strong>
        		</td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2"><strong>วันที่บันทึก</strong></td>
              <td align="left" class="tblyy"><input type="date" name="today" id="today" value="<?=date('Y-m-d')?>" readonly="readonly" />
       		  </td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2"><strong>วันที่ร้องขอ</strong></td>
              <td align="left" class="tblyy"><input type="date" name="date_request" id="date_request" value="<?=date('Y-m-d')?>" />
       		  <font color="#EE0000"><strong> * </strong>วันที่เขียนใบคำร้อง</font></td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2"><strong>เรื่อง</strong></td>
           	  <td align="left" class="tblyy"><input type="text" name="subject" id="subject" value="" />
       		  <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
           	  <td align="left" height="30" class="tblyy2"><strong>เรียน</strong></td>
           	  <td align="left" class="tblyy"><input type="text" name="request_to" id="request_to" value="" />
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>ข้าพเจ้า</strong></td>
           	  <td align="left" class="tblyy"><input type="text" name="name" id="name" value=""  style="width:200px"/>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>เบอร์ติดต่อ</strong></td>
           	  <td align="left" class="tblyy"><input type="text" name="tel" id="tel" value="" />
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>มีความประสงค์</strong></td>
           	  <td align="left" class="tblyy" >
              	  <?php if($_POST["type"]=="4"){ ?>
                      <textarea name="wishes" id="wishes" cols="45" rows="5"></textarea>
                      <font color="#EE0000"><strong> *</strong></font>
                  <?php }else if($_POST["type"]=="2"){?>
                      <strong>ขอ<?=$result_tname["name_type"]?></strong><br /><br />
                      <strong>- จากเดิม</strong><br />
                      ชื่อคอร์ส : <input name="course_name" id="course_name" value="" />
                      รหัสคอร์ส : <input name="course_code" id="course_code" value="" style="width:100px"/>
                      ราคา : <input name="course_price" id="course_price" value="" style="width:100px" />
                      วันที่โอน : <input type="date" name="course_transfer" id="course_transfer" value="<?=date('Y-m-d')?>"/><br /><br />
                      <strong>- เปลี่ยนเป็น</strong><br />
                      ชื่อคอร์ส : <input name="course2_name" id="course2_name" value="" />
                      รหัสคอร์ส : <input name="course2_code" id="course2_code" value="" style="width:100px"/>
                      ราคา : <input name="course2_price" id="course2_price" value="" style="width:100px" />
                  <?php }else if($_POST["type"]=="1" || $_POST["type"]=="3"){?>
                  	  <strong><?php if($_POST['type'] == '1'){echo "ขอ";}if($_POST['type'] == '3'){echo "แจ้ง";}echo $result_tname["name_type"];?></strong><br />
                      ชื่อคอร์ส :<input name="course_name" id="course_name" value="" />
                      รหัสคอร์ส :<input name="course_code" id="course_code" value="" style="width:100px"/>
                      ราคา :<input name="course_price" id="course_price" value="" style="width:100px" />
                      วันที่โอน :<input type="date" name="course_transfer" id="course_transfer" value="<?=date('Y-m-d')?>" />
                  <?php }?>
                  <br /><br /><font color="#EE0000"><strong> *</strong> กรุณากรอกข้อมูลให้ครบถ้วนเพื่อให้การดำเนินการรวดเร็วยิ่งขึ้น</font>
              </td>
            </tr>
            <tr>
              <td align="left" height="30" class="tblyy2"><strong>เนื่องจาก</strong></td>
           	  <td align="left" class="tblyy"><textarea name="because" id="because" cols="45" rows="5"></textarea>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" height="50" class="tblyy2"></td>
           	  <td align="left" class="tblyy">
              <input type="submit" name="Submit" value="บันทึก">
              <input type="button" name="cmdweblogin" class="button" value="ยกเลิก" onClick="window.location='user_home.php'"/>
              <font color="#EE0000"><strong> *</strong> กรุณากรอกข้อมูลให้ครบถ้วน</font>
              </td>
            </tr>
        </table>
    	
    </form>
    <? }?>
</body>
</html>
<?php mysql_close();?>
