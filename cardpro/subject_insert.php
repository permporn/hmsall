<? 
session_start();
include("funtion.php");
include("ck_session.php");
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
<body>
<!-- START PAGE SOURCE -->
<div id="container">
  <? include('menu.php')?>
  <div id="content">
    <h1>ข้อมูลวิชาเรียน</h1>
    <p>
    <div align="right">
    <form name="form1" action="subject_insert.php" method="GET">
    <label for="type"><strong>+ เพิ่มวิชา :</strong></label>
       <select name="type" id="type" >
       		<option value="0" disabled="disabled" selected="selected">เลือกประเภทวิชา</option>
            <option value="1"> 1.คอร์ส สด / DVD </option>
            <option value="2"> 2.คอร์ส SELF </option>
            <!--<option value="3"> 3.ดึงไฟล์วิชา(.xls) </option>-->
       </select>
       <input class="button" type="submit" name="Submit" value="ตกลง" style="width:70px"/>
   </form>
   </div>
   </p>
   <br />
  
  
  <!--       หน้าเพิ่มวิชา       -->
  <?  $type = $_GET["type"];?>
  <? if($type != "" ){?>
  <form name="frm" method="get" action="subject_insert.php">
   <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
   			<input type="hidden" name="type2" name="action" value="add" />
        	<tr >
            	<td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
                <strong> + เพิ่มวิชาเรียน (
				<?
				if($type == 1){echo "คอร์ส สด / DVD";}
				if($type == 2){echo "คอร์ส SELF";}
				if($type == 3){echo "ดึงไฟล์วิชา(.xls)";}
                ?>)
                </strong>
        		</td>
            </tr>
             <tr>
           	  <td align="left" class="tblyy2" ><strong>วันที่บันทึก</strong></td>
              <td align="left" class="tblyy" ><input type="date" name="today" value="<?=date('Y-m-d')?>" readonly="readonly" /></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ชื่อวิชา</strong></td>
              <td align="left" class="tblyy" ><input type="text" name="name_subj" value="" style="width:200px"/>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>รหัสวิชา</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="code_subj" value="" style="width:100px"/>
              <font color="#EE0000"><strong> *</strong>ตย. HA0101</font></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ราคา</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="price_subj" value="" style="width:100px"/> บาท 
              <font color="#EE0000"><strong> *</strong> กรอกเฉพาะตัวเลข ตย. 2000</font></td>
            </tr>
            <? if($type != '2' ){?>
            <tr>
              <td align="left" class="tblyy2"><strong>วันเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="date_learn" value=""/>
              <font color="#EE0000"><strong> *</strong> ตย. วันจัน - วันพุธ หรือ ทุกวัน</font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>เวลาเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="time_learn" value="" />
              <font color="#EE0000"><strong> *</strong> ตย. 8.00 - 10.00น.</font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่เริ่มเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="start_date" value="" />
              <font color="#EE0000"><strong> *</strong> กดเลือก หรือพิมพ์ วันที่เรียน </font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่ปิดคอร์ส</strong></td>
           	  <td align="left" class="tblyy" ><input type="date" name="end_date" value="" />
              <font color="#EE0000"><strong> *</strong> กดเลือก หรือพิมพ์ วันที่ปิดคอร์ส </font></td>
            </tr>
            <? }?>
            <tr>
              <td align="left" class="tblyy2"><strong>ห้องเรียน</strong></td>
              	
           	  <td align="left" class="tblyy" >
              <select name="room_subj">
              	<option value="0" disabled="disabled" selected="selected">เลือกห้องเรียน</option>
                <?  
			  	if($objResultSTT['status'] == 'ADMIN' or $objResultSTT['status'] == 'Manager'){
					$strSQL = "SELECT r.roomname ,r.roomid , b.branchname FROM room r INNER JOIN branch b ON r.branchid = b.branchid ORDER BY  b.branchid ASC ";
				}else{
					$strSQL = "SELECT * FROM room WHERE branchid = '".$objResultSTT['branchid']."'";}
					$objQuery = mysql_query($strSQL);
					while ($objResut = mysql_fetch_array($objQuery)){ ?>
                <option value="<?=$objResut['roomid'];?>" ><?=$objResut['roomname'];?> <?=$objResut['branchname']?></option> <? } ?>
              </select>
              
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>อาจารย์</strong></td>
              <td align="left" class="tblyy" >
              <select name="teacher_subj" style="width:150px">
              	<option value="0" disabled="disabled" selected="selected">เลือกผู้สอน</option>
                <? $strSQL = "SELECT * FROM teacher ORDER BY teacher.teacherid ASC ";
					$objQuery = mysql_query($strSQL);
					while ($objResut = mysql_fetch_array($objQuery)){ ?>
                <option value="<?=$objResut['teacherid'];?>" ><?=$objResut['teachername'];?></option><? } ?>
              </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ปีการศึกษา</strong></td>
              <td align="left" class="tblyy" >
              <select name="year_subj" style="width:150px">
              	<option value="0" disabled="disabled" selected="selected">เลือกปีการศึกษา</option>
                <? $strSQL = "SELECT at.id_year ,y.nameyear ,t.term 
							 FROM addterm at
							 INNER JOIN year y
							 	ON at.year_id = y.id
							 INNER JOIN term t
							 	ON at.termid = t.termid
 							 ORDER BY at.id_year DESC ";
					$objQuery = mysql_query($strSQL);
					while ($objResut = mysql_fetch_array($objQuery)){ ?>
                <option value="<?=$objResut['id_year'];?>" ><?=$objResut['nameyear'];?> <?=$objResut['term'];?></option><? } ?>
              </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ประเภทคอร์ส</strong></td>
               <td align="left" class="tblyy" >
               <select name="type_subj" style="width:150px" >
              	<option value="0" disabled="disabled" selected="selected" > เลือกประเภทคอร์ส </option>
                <? if($type != '2' ){?>
                <option value="1" >คอร์ส สด</option>
                <option value="2" >คอร์ส DVD</option>
                <? } ?>
                 <? if($type != '1' ){?>
                <option value="3" >คอร์ส SELF</option>
                <? } ?>
              </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ใช้ระบบจองที่นั่งห้องสด</strong></td>
               <td align="left" class="tblyy" >
               	<label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="0" checked>
                    ปิด</label>
                <label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="1">
                    เปิด</label>  ( จะมีห้องที่สามารถใช้ระบบได้คือ T10, T10A, N1, T4, T5 )
                    </td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"></td>
           	  <td align="left" class="tblyy" >
              	<input type="submit" name="Submit" value="บันทึก">
      			<input type="button" name="cmdweblogin" class="button" value="ยกเลิก" onClick="window.history.back();"/> 
                <font color="#EE0000"><strong> *</strong> หมายเหตุ กรุณากรอกข้อมูลให้ตรบถ้วน</font>
              </td>
            </tr>
   </table>
   </form>
<? }?>
	
<!--       insert วิชาลง db       -->
<? if($_GET["type2"] == "add"){
	  if($_GET["today"] != "" && $_GET["name_subj"] != "" && $_GET["code_subj"] != "" && $_GET["price_subj"] != "" /*&& $_GET["date_learn"] != "" && $_GET["time_learn"] != "" && $_GET["start_date"] != "" && $_GET["end_date"] != ""*/ && $_GET["room_subj"] != "" && $_GET["teacher_subj"] != "" && $_GET["year_subj"] != "" && $_GET["type_subj"] != ""){
		  
		  $name_subj = $_GET["name_subj"];
		  $code_subj = $_GET["code_subj"];
		  $price_subj = $_GET["price_subj"];
		  $date_learn = $_GET["date_learn"];
		  $time_learn = $_GET["time_learn"];
		  $start_date = $_GET["start_date"];
		  $end_date = $_GET["end_date"];
		  $room_subj = $_GET["room_subj"];
		  $teacher_subj = $_GET["teacher_subj"];
		  $year_subj = $_GET["year_subj"];
		  $today = $_GET["today"];
		  $type_subj = $_GET["type_subj"];
		  $staffid = $_SESSION["accid_cardpro"];
		  $status_system_seat = $_GET["status_system_seat"];
		  
		  $sj = 0 ;
		  $strSQL_sj = "SELECT * FROM subject WHERE subcode = '$code_subj' AND id_year = '$year_subj' AND roomid = '$room_subj'";
		  $objQuery_sj = mysql_query($strSQL_sj);
		  $objResut_sj = mysql_fetch_array($objQuery_sj);
		  
		  if(!$objResut_sj){	  
		 	$sql = "INSERT INTO subject (";
			$sql .= "subname";
			$sql .= ", subcode";
			$sql .= ", price";
			$sql .= ", day";
			$sql .= ", time";
			$sql .= ", date";
			$sql .= ", edate";
			$sql .= ", type";
			$sql .= ", teachid";
			$sql .= ", roomid";
			$sql .= ", id_year";
			$sql .= ", date_save";
			$sql .= ", staffid";
                        $sql .= ", status_system_seat";
			$sql .= ") values (";
			$sql .= "'$name_subj'";
			$sql .= ", '$code_subj'";
			$sql .= ", '$price_subj'";
			$sql .= ", '$date_learn'";
			$sql .= ", '$time_learn'";
			$sql .= ", '$start_date'";
			$sql .= ", '$end_date'";
			$sql .= ", '$type_subj'";
			$sql .= ", '$teacher_subj'";
			$sql .= ", '$room_subj'";
			$sql .= ", '$year_subj'";
			$sql .= ", '$today'";
			$sql .= ", '$staffid'";
			$sql .= ", '$status_system_seat'";
			$sql .= ")"; 
			$objQuery = mysql_query($sql) ;
			if(!$objQuery){echo "Error save [".mysql_error().$sql."]";}
			else{
				$strSQL = "SELECT * FROM subject WHERE subcode = '$code_subj' AND id_year = '$year_subj' AND date_save = '$today'";
				$objQuery = mysql_query($strSQL) ;
				$objResut = mysql_fetch_array($objQuery);
				if(!$objQuery){echo "Error save [".mysql_error().$strSQL."]";}
				else{
					$subid = $objResut['subid'];
					echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
					echo "<script>window.location='subject_insert.php?action=show&subid=$subid';</script>";
					}
				}
		  }else{
			  	echo "<script language='javascript'>alert('มีวิชาเรียนนี้แล้ว ในปีการศึกษานี้');</script>";
				echo "<script>window.history.back();</script>";}
		}else{
			echo "<script language='javascript'>alert('กรอกข้อมูลไม่กรอบ กรุณาทำรายการใหม่');</script>";
			echo "<script>window.history.back();</script>";
		}
		
	}?>
    
    <!--       แสดงวิชาที่บันทึก       -->
    <? if($_GET['action'] == "show" && $_GET['subid'] != ""){
		$subid = $_GET['subid'];
		$strSQL = "SELECT * FROM subject WHERE subid = '$subid'";
		$objQuery = mysql_query($strSQL);
		$objResut = mysql_fetch_array($objQuery);
	?>
    <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
   			<td width="16%">
        	<tr >
            	<td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
                <strong> + รายละเอียดวิชาเรียน </strong>
        		</td>
            </tr>
             <tr>
           	  <td align="left" class="tblyy2" ><strong>วันที่บันทึก</strong></td>
              <td width="84%" align="left" class="tblyy" ><?=DateThaiDMY($objResut['date_save'])?></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ชื่อวิชา</strong></td>
              <td align="left" class="tblyy" ><?=$objResut['subname']?></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>รหัสวิชา</strong></td>
           	  <td align="left" class="tblyy" ><?=$objResut['subcode']?></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ราคา</strong></td>
           	  <td align="left" class="tblyy" ><?=$objResut['price']?> บาท </td>
            </tr>
            <? if($objResut['type'] != '3' ){?>
            <tr>
              <td align="left" class="tblyy2"><strong>วันเรียน</strong></td>
           	  <td align="left" class="tblyy" ><?=$objResut['day']?></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>เวลาเรียน</strong></td>
           	  <td align="left" class="tblyy" ><?=$objResut['time']?></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่เริ่มเรียน</strong></td>
           	  <td align="left" class="tblyy" ><?=$objResut['date']?></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่ปิดคอร์ส</strong></td>
           	  <td align="left" class="tblyy" ><?=DateThaiDMY($objResut['edate'])?></td>
            </tr>
            <? }?>
            <tr>
              <td align="left" class="tblyy2"><strong>ห้องเรียน</strong></td>
              <td align="left" class="tblyy" >
              <? $strSQL_r = "SELECT * FROM room WHERE roomid = '".$objResut['roomid']."'";
				 $objQuery_r = mysql_query($strSQL_r);
				 $objResut_r = mysql_fetch_array($objQuery_r);
				 echo $objResut_r['roomname'];
              ?>
              </td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>อาจารย์</strong></td>
              <td align="left" class="tblyy" >
              <? $strSQL_t = "SELECT * FROM teacher WHERE teacherid = '".$objResut['teachid']."'";
				 $objQuery_t = mysql_query($strSQL_t);
				 $objResut_t = mysql_fetch_array($objQuery_t);
				 echo $objResut_t['teachername'];
			  ?>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ปีการศึกษา</strong></td>
              <td align="left" class="tblyy" >
                <? $strSQL_y = "SELECT at.id_year ,y.nameyear ,t.term 
							 FROM addterm at
							 INNER JOIN year y
							 	ON at.year_id = y.id
							 INNER JOIN term t
							 	ON at.termid = t.termid
							 WHERE at.id_year = '".$objResut['id_year']."'
 							 ORDER BY at.id_year DESC ";
					$objQuery_y = mysql_query($strSQL_y);
					$objResut_y = mysql_fetch_array($objQuery_y);
					echo "ปี ".$objResut_y['nameyear']." ".$objResut_y['term'];?>
              </td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ประเภทคอร์ส</strong></td>
               <td align="left" class="tblyy" >
               <?
               if($objResut['type'] == "1"){echo "คอร์ส สด" ;}
			   if($objResut['type'] == "2"){echo "คอร์ส DVD" ;}
			   if($objResut['type'] == "3"){echo "คอร์ส SELF" ;}
			   ?>
               </td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ใช้ระบบจองที่นั่งห้องสด</strong></td>
               <td align="left" class="tblyy" >
               	<label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="0" <? if($objResut['status_system_seat']==0){?> checked <? }?>>
                    ปิด</label>
                <label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="1" <? if($objResut['status_system_seat']==1){?> checked <? }?>>
                    เปิด</label>  ( จะมีห้องที่สามารถใช้ระบบได้คือ T10, T10A, N1, T4, T5 )
                    </td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"></td>
           	  <td align="left" class="tblyy" >
              	<input type="submit" name="Submit" value="แก้ไข" onClick="window.location='subject_insert.php?subid=<?=$subid?>&action=edit'">
      			<input type="button" name="cmdweblogin" class="button" value="กลับ" onClick="window.location='subject.php'"/> 
              </td>
            </tr>
   </table>
   </form>
 <? } ?>
 	<!--       แก้ไข วิชา      -->
  <? if($_GET['action'] == "edit" && $_GET['subid'] != ""){
 	 $subid = $_GET['subid'];
		$strSQL = "SELECT * FROM subject WHERE subid = '$subid'";
		$objQuery = mysql_query($strSQL);
		$objResut = mysql_fetch_array($objQuery);?>
        
  <form name="frm" method="get" action="subject_insert.php">
   <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
   			<input type="hidden" name="action" value="update" />
            <input type="hidden" name="subid" value="<?=$subid?>" />
   			<tr>
            	<td colspan="2" class="tbl23" style="white-space: nowrap;" align="center">
                <strong> + แก้ไขวิชาเรียน (
				<?
				if($objResut['type'] == "1"){echo "คอร์ส สด" ;}
			   	if($objResut['type'] == "2"){echo "คอร์ส DVD" ;}
			   	if($objResut['type'] == "3"){echo "คอร์ส SELF" ;}
                ?>)
                </strong>
        		</td>
            </tr>
             <tr>
           	  <td align="left" class="tblyy2" ><strong>วันที่บันทึก</strong></td>
              <td align="left" class="tblyy" ><input type="date" name="today" value="<?=$objResut['date_save']?>" readonly="readonly" /></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ชื่อวิชา</strong></td>
              <td align="left" class="tblyy" ><input type="text" name="name_subj" value="<?=$objResut['subname']?>" style="width:200px"/>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>รหัสวิชา</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="code_subj" value="<?=$objResut['subcode']?>" style="width:100px"/>
              <font color="#EE0000"><strong> *</strong>ตย. HA0101</font></td>
            </tr>
            <tr>
           	  <td align="left" class="tblyy2"><strong>ราคา</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="price_subj" value="<?=$objResut['price']?>" style="width:100px"/> บาท 
              <font color="#EE0000"><strong> *</strong> กรอกเฉพาะตัวเลข ตย. 2000</font></td>
            </tr>
            <? if($objResut['type'] != '3' ){?>
            <tr>
              <td align="left" class="tblyy2"><strong>วันเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="date_learn" value="<?=$objResut['day']?>"/>
              <font color="#EE0000"><strong> *</strong> ตย. วันจัน - วันพุธ หรือ ทุกวัน</font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>เวลาเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="time_learn" value="<?=$objResut['time']?>" />
              <font color="#EE0000"><strong> *</strong> ตย. 8.00 - 10.00น.</font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่เริ่มเรียน</strong></td>
           	  <td align="left" class="tblyy" ><input type="text" name="start_date" value="<?=$objResut['date']?>" />
              <font color="#EE0000"><strong> *</strong> กดเลือก หรือพิมพ์ วันที่เรียน </font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>วันที่ปิดคอร์ส</strong></td>
           	  <td align="left" class="tblyy" ><input type="date" name="end_date" value="<?=$objResut['edate']?>" />
              <font color="#EE0000"><strong> *</strong> กดเลือก หรือพิมพ์ วันที่ปิดคอร์ส </font></td>
            </tr>
            <? }?>
            <tr>
              <td align="left" class="tblyy2"><strong>ห้องเรียน</strong></td>
              	
           	  <td align="left" class="tblyy" >
              <select name="room_subj">
               <? $strSQL_r = "SELECT * FROM room WHERE roomid = '".$objResut['roomid']."'";
				 $objQuery_r = mysql_query($strSQL_r);
				 $objResut_r = mysql_fetch_array($objQuery_r);
               ?>
              	<option value="<?=$objResut_r['roomid'];?>"  selected="selected"><?=$objResut_r['roomname'];?></option>
                <?  
			  	if($objResultSTT['status'] == 'ADMIN' or $objResultSTT['status'] == 'Manager'){
					$strSQL_b = "SELECT r.roomname ,r.roomid , b.branchname 
								FROM room r 
								INNER JOIN branch b 
									ON r.branchid = b.branchid
								WHERE r.roomid != '".$objResut['roomid']."' 
								ORDER BY b.branchid ,r.roomname  ASC ";
				}else{
					$strSQL_b = "SELECT * FROM room WHERE branchid = '".$objResultSTT['branchid']."' AND roomid != '".$objResut['roomid']."' ";}
					$objQuery_b = mysql_query($strSQL_b);
					while ($objResut_b = mysql_fetch_array($objQuery_b)){ ?>
                <option value="<?=$objResut_b['roomid'];?>" ><?=$objResut_b['roomname'];?> <?=$objResut_b['branchname']?></option> <? } ?>
              </select>
              
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>อาจารย์</strong></td>
              <td align="left" class="tblyy" >
              <? $strSQL_t = "SELECT * FROM teacher WHERE teacherid = '".$objResut['teachid']."'";
				 $objQuery_t = mysql_query($strSQL_t);
				 $objResut_t = mysql_fetch_array($objQuery_t);
			  ?>
              <select name="teacher_subj" style="width:150px">
              	<option value="<?=$objResut_t['teacherid'];?>"  selected="selected"><?=$objResut_t['teachername'];?></option>
                <?  $strSQL_t = "SELECT * FROM teacher WHERE teacherid != '".$objResut_t['teacherid']."'ORDER BY teacher.teacherid ASC ";
					$objQuery_t = mysql_query($strSQL_t);
					while ($objResut_t = mysql_fetch_array($objQuery_t)){ ?>
                <option value="<?=$objResut_t['teacherid'];?>" ><?=$objResut_t['teachername'];?></option><? } ?>
              </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ปีการศึกษา</strong></td>
              <td align="left" class="tblyy" >
              <select name="year_subj" style="width:200px">
               <? $strSQL_y = "SELECT at.id_year ,y.nameyear ,t.term 
							 FROM addterm at
							 INNER JOIN year y
							 	ON at.year_id = y.id
							 INNER JOIN term t
							 	ON at.termid = t.termid
							 WHERE at.id_year = '".$objResut['id_year']."'
 							 ORDER BY at.id_year DESC ";
					$objQuery_y = mysql_query($strSQL_y);
					$objResut_y = mysql_fetch_array($objQuery_y);?>
              	<option value="<?=$objResut_y['id_year'];?>" selected="selected"><?=$objResut_y['nameyear'];?> <?=$objResut_y['term'];?></option>
                <? $strSQL_yy = "SELECT at.id_year ,y.nameyear ,t.term 
								 FROM addterm at
								 INNER JOIN year y
									ON at.year_id = y.id
								 INNER JOIN term t
									ON at.termid = t.termid
								 WHERE at.id_year != '".$objResut_y['id_year']."'
								 ORDER BY at.id_year DESC ";
					$objQuery_yy = mysql_query($strSQL_yy);
					while ($objResut_yy = mysql_fetch_array($objQuery_yy)){ ?>
                <option value="<?=$objResut_yy['id_year'];?>" ><?=$objResut_yy['nameyear'];?> <?=$objResut_yy['term'];?></option><? } ?>
              </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ประเภทคอร์ส</strong></td>
               <td align="left" class="tblyy" >
               <select name="type_subj" style="width:150px" >
              	<option value="<?=$objResut['type'];?>" selected="selected" >
				<?
				if($objResut['type'] == "1"){echo "คอร์ส สด" ;}
			   	if($objResut['type'] == "2"){echo "คอร์ส DVD" ;}
			   	if($objResut['type'] == "3"){echo "คอร์ส SELF" ;}
                ?>
                </option>
                
                <option value="1" >คอร์ส สด</option>
                <option value="2" >คอร์ส DVD</option>
				<option value="3" >คอร์ส SELF</option>
              
  			  </select>
              <font color="#EE0000"><strong> *</strong></font></td>
            </tr>
            <tr>
              <td align="left" class="tblyy2"><strong>ใช้ระบบจองที่นั่งห้องสด</strong></td>
               <td align="left" class="tblyy" >
               	<label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="0" <? if($objResut['status_system_seat']==0){?> checked <? }?>>
                    ปิด</label>
                <label class="radio-inline">
                    <input type="radio" name="status_system_seat" id="status_system_seat" value="1" <? if($objResut['status_system_seat']==1){?> checked <? }?>>
                    เปิด</label>
                      ( จะมีห้องที่สามารถใช้ระบบได้คือ T10, T10A, N1, T4, T5 )
            </tr>
            <tr>
              <td align="left" class="tblyy2"></td>
           	  <td align="left" class="tblyy" >
              	<input type="submit" name="Submit" value="บันทึก" />
      			<input type="button" name="cmdweblogin" class="button" value="ยกเลิก" onClick="window.history.back();"/> 
                <font color="#EE0000"><strong> *</strong> หมายเหตุ กรุณากรอกข้อมูลให้ตรบถ้วน</font>
              </td>
            </tr>
   </table>
   </form>
<? }?>
<!--       update วิชาลง db       -->
<? if($_GET["action"] == "update" && $_GET["subid"] != ""){
	  if(/*$_GET["today"] != "" &&*/ $_GET["name_subj"] != "" && $_GET["code_subj"] != "" && $_GET["price_subj"] != "" /*&& $_GET["date_learn"] != "" && $_GET["time_learn"] != "" && $_GET["start_date"] != "" && $_GET["end_date"] != "" */&& $_GET["room_subj"] != "" && $_GET["teacher_subj"] != "" && $_GET["year_subj"] != "" && $_GET["type_subj"] != ""){
		 
		  $subid = $_GET["subid"];
		  $name_subj = $_GET["name_subj"];
		  $code_subj = $_GET["code_subj"];
		  $price_subj = $_GET["price_subj"];
		  $date_learn = $_GET["date_learn"];
		  $time_learn = $_GET["time_learn"];
		  $start_date = $_GET["start_date"];
		  $end_date = $_GET["end_date"];
		  $room_subj = $_GET["room_subj"];
		  $teacher_subj = $_GET["teacher_subj"];
		  $year_subj = $_GET["year_subj"];
		  $today = $_GET["today"];
		  $type_subj = $_GET["type_subj"];
		  $staffid = $_SESSION["accid_cardpro"];
		  $status_system_seat = $_GET["status_system_seat"];
		  
		 	$strSQL_edit = "UPDATE subject SET ";
			$strSQL_edit .="subname = '".$name_subj."' ";
			$strSQL_edit .=",subcode = '".$code_subj."' ";
			$strSQL_edit .=",price = '".$price_subj."' ";
			$strSQL_edit .=",day = '".$date_learn."' ";
			$strSQL_edit .=",time = '".$time_learn."' ";
			$strSQL_edit .=",date = '".$start_date."' ";
			$strSQL_edit .=",edate = '".$end_date."' ";
			$strSQL_edit .=",type = '".$type_subj."' ";
			$strSQL_edit .=",teachid = '".$teacher_subj."' ";
			$strSQL_edit .=",roomid = '".$room_subj."' ";
			$strSQL_edit .=",id_year = '".$year_subj."' ";
			$strSQL_edit .=",date_save = '".$today."' ";
			$strSQL_edit .=",staffid = '".$staffid."' ";
			$strSQL_edit .=",status_system_seat = '".$status_system_seat."' ";
			$strSQL_edit .="WHERE subid = '".$subid."' ";
			$objQuery_edit = mysql_query($strSQL_edit);
			
			mysql_close();
			
			if(!$objQuery_edit){echo "Error save [".mysql_error().$strSQL_edit."]";}
			else{
				echo "<script language='javascript'>alert('บันทึกเรียบร้อย');</script>";
				echo "<script>window.location='subject_insert.php?action=show&subid=$subid';</script>";
				}
		}else{
			echo "<script language='javascript'>alert('กรอกข้อมูลไม่กรอบ กรุณาทำรายการใหม่');</script>";
			echo "<script>window.history.back();</script>";
	 	/*echo $_GET["today"] .",".$_GET["name_subj"].",".$_GET["code_subj"].",".$_GET["price_subj"].",".$_GET["date_learn"] .",".$_GET["time_learn"].",".$_GET["start_date"] .",".$_GET["end_date"].",".$_GET["room_subj"].",".$_GET["teacher_subj"].",". $_GET["year_subj"] .",".$_GET["type_subj"];*/
		}

	}?>

</div>
</body>
</html>