<? 
session_start();
include("funtion.php");
include("ck_session.php");

if($_GET["ac"]=="upbook"){
	$book_status = $_POST["book_status"];
	$book_num = $_POST["book_num"];
	if($book_status=="ครบ"){
		$book_details = "";
	}
	else{
		$book_details = $_POST["book_details"];
	}
	$book_staffid = $_SESSION["accid_cardpro"];
	$learnid = $_GET["learnid"];
	
	$strSQL_upbook = "UPDATE learn SET ";
	$strSQL_upbook .="book_status = '".$book_status."' ";
	$strSQL_upbook .=",book_num = '".$book_num."' ";
	$strSQL_upbook .=",book_details = '".$book_details."' ";
	$strSQL_upbook .=",book_staffid = '".$book_staffid."' ";
	$strSQL_upbook .="WHERE learnid = '".$learnid."' ";
	$objQuery_upbook = mysql_query($strSQL_upbook);
	
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น  ');</script>";
}
if($_GET["ac"]=="upshirt"){
	$shirt_num = $_POST["shirt_num"];
	$shirt_staffid = $_SESSION["accid_cardpro"];
	$learnid = $_GET["learnid"];
	
	$strSQL_upshirt = "UPDATE learn SET ";
	$strSQL_upshirt .="shirt_num = '".$shirt_num."' ";
	$strSQL_upshirt .=",shirt_staffid = '".$shirt_staffid."' ";
	$strSQL_upshirt .="WHERE learnid = '".$learnid."' ";
	$objQuery_upshirt = mysql_query($strSQL_upshirt);
	
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น  ');</script>";
}

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
  
<? if($_GET["subid"]!=""){?>
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
	if($_GET["h_arti_id"]!=""){
		$strSQL .= " AND learn.studentid = '".$_GET["h_arti_id"]."'";
	}
	if($_GET["ac"]=="book" || $_GET["ac"]=="shirt"){
		$strSQL .= " AND learn.learnid = '".$_GET["learnid"]."'";
	}
	$strSQL .=" order by learn.seat ASC";
	$objQuery = mysql_query($strSQL);

?>
<? if($_GET["ac"]!="book" && $_GET["ac"]!="shirt"){?>
<form name="frmMain" action="printcard.php?id_year=<?=$id_year;?>" method="post" >

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
      	<? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {$a = 10;?><? }else{$a = 9;} ?>
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
          <td width="13%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">เบอร์</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">หนังสือ</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เสื้อ</td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {?>
          <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>
          <? }?>
      </tr>
      
<? 	//$sumamount = 0;
	$num = 0;
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
?>      
      <tr>
      	  <td width="7%" style="white-space:nowrap;" class="<?=$tblyy?>" align="center">
          <input type="checkbox" name="chkDel[]" id="chkDel<?=$num;?>" value="<?=$objResult["learnid"];?>">
          </td>
          <td width="7%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td width="29%" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><a href="student_detail.php?studentid=<?=$objResult["studentid"];?>"><?=$objResult["studentname"];?></a></td>
          <td width="7%"  class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td width="13%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=DateThaiDMY($objResult["regisdate"])?></td>
          <td width="12%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["tel"];?></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><a href="student.php?ac=book&learnid=<?=$objResult["learnid"]?>&subid=<?=$_GET["subid"]?>">
		  <?
		  	if($objResult["book_status"]==""){echo "ยังไม่ได้รับ";}
			else if($objResult["book_status"]=="ขาด"){echo "ขาด ".$objResult["book_num"]." เล่ม";}
			else if($objResult["book_status"]=="ครบ"){echo "ครบ ".$objResult["book_num"]." เล่ม";}
		  ?>
          </a></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><a href="student.php?ac=shirt&learnid=<?=$objResult["learnid"]?>&subid=<?=$_GET["subid"]?>">
		  <?
		  	if($objResult["shirt_num"]=="0"){echo "ยังไม่ได้รับ";}
			else{echo $objResult["shirt_num"]." ตัว";}
		  ?>
          </a></td>
          
          <!-- for admin or Manager -->
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN") {?>
          <td width="8%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><a href="student_edit.php?learnid=<?=$objResult["learnid"];?>">แก้ไข</a></td>
          <? } ?>
       </tr>
      <? }?>
      <? if($num == 0){?>
      	<tr>
        	<td colspan="<?=$a?>" style="white-space:nowrap;" class="tblyy" align="center"><font color="#FF0000"><strong>ไม่พบข้อมูล</strong></font></td>
        </tr>
      <? }?>
      
  </table>	<div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
  <? }?>
  <input type="hidden" name="hdnCount" value="<?=$num;?>">
</form>
<? }?>

<? if($_GET["ac"]=="book"){

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
	if($_GET["h_arti_id"]!=""){
		$strSQL .= " AND learn.studentid = '".$_GET["h_arti_id"]."'";
	}
	if($_GET["ac"]=="book" || $_GET["ac"]=="shirt"){
		$strSQL .= " AND learn.learnid = '".$_GET["learnid"]."'";
	}
	$strSQL .=" order by learn.seat ASC";
	$objQuery = mysql_query($strSQL);
?>
<form action="student.php?ac=upbook&subid=<?=$_GET["subid"]?>&learnid=<?=$_GET["learnid"]?>" name="" method="post">
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
		<tr>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="13%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">เบอร์</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">หนังสือ</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เสื้อ</td>
      </tr>
      <? $num = 0;
		while($objResult = mysql_fetch_array($objQuery)){
		$num++;?>
        <tr>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["studentname"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=DateThaiDMY($objResult["regisdate"])?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["tel"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center">
		  <?
		  	if($objResult["book_num"]=="0"){echo "ยังไม่ได้รับ";}
			else{echo $objResult["book_num"]." เล่ม";}
		  ?>
          </td>
          <td class="tblyy" style="white-space: nowrap;" align="center">
		  <?
		  	if($objResult["shirt_num"]=="0"){echo "ยังไม่ได้รับ";}
			else{echo $objResult["shirt_num"]." ตัว";}
		  ?>
          </td>
      </tr>
      
      <td colspan="7" class="tbl23" style="white-space: nowrap;" align="center" >แก้ไขสถานะหนังสือ</td>
  	  <tr>
      	<td colspan="2" align="left" class="tbl2" style="white-space: nowrap;"> สถานะหนังสือ/เล่ม</td>
      	<td colspan="5" align="left" class="tblyy" style="white-space: nowrap;">
		<input type="radio" name="book_status" value="ครบ" <? if($objResult["book_status"]=="ครบ"){?>checked="checked"<? }?>>ครบ
		<input type="radio" name="book_status" value="ขาด" <? if($objResult["book_status"]=="ขาด" || $objResult["book_status"]==""){?>checked="checked"<? }?>>ขาด</td>
   	 </tr>
	 
     <tr>
         <td colspan="2" class="tbl2" style="white-space: nowrap;" align="left">จำนวน</td>
         <td colspan="5" class="tblyy" style="white-space: nowrap;" align="left"><input type="text" size="3" name="book_num" id="book_num" value="<?=$objResult["book_num"]?>" >เล่ม</td>
     </tr>
     <tr>
         <td colspan="2" class="tbl2" style="white-space: nowrap;" align="left">รายละเอียด(ในกรณีที่ขาด)</td>
         <td colspan="5" class="tblyy" style="white-space: nowrap;" align="left">
    		<textarea id="book_details" name="book_details" rows="4" cols="30"><?=$objResult["book_details"]?></textarea>
         </td>
     </tr>
	 <? }?>
     <tr>
         <td colspan="2" class="tbl2" style="white-space: nowrap;" align="left"></td>
         <td colspan="5" class="tblyy" style="white-space: nowrap;" align="left"><input type="submit" name="" value="บันทึก" /></td>
     </tr>
 </table>      
<div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>  
</form>
<? }?>
  
<? if($_GET["ac"]=="shirt"){
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
	if($_GET["h_arti_id"]!=""){
		$strSQL .= " AND learn.studentid = '".$_GET["h_arti_id"]."'";
	}
	if($_GET["ac"]=="book" || $_GET["ac"]=="shirt"){
		$strSQL .= " AND learn.learnid = '".$_GET["learnid"]."'";
	}
	$strSQL .=" order by learn.seat ASC";
	$objQuery = mysql_query($strSQL);
?>
<form action="student.php?ac=upshirt&subid=<?=$_GET["subid"]?>&learnid=<?=$_GET["learnid"]?>" name="" method="post">
<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
		<tr>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="7%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="13%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="12%" class="tbl2" style="white-space: nowrap;" align="center">เบอร์</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">หนังสือ</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เสื้อ</td>
      </tr>
      <? $num = 0;
		while($objResult = mysql_fetch_array($objQuery)){
		$num++;?>
        <tr>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["studentname"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=DateThaiDMY($objResult["regisdate"])?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["tel"];?></td>
          <td class="tblyy" style="white-space: nowrap;" align="center">
		  <?
		  	if($objResult["book_num"]=="0"){echo "ยังไม่ได้รับ";}
			else{echo $objResult["book_num"]." เล่ม";}
		  ?>
          </td>
          <td class="tblyy" style="white-space: nowrap;" align="center">
		  <?
		  	if($objResult["shirt_num"]=="0"){echo "ยังไม่ได้รับ";}
			else{echo $objResult["shirt_num"]." ตัว";}
		  ?>
          </td>
      </tr>
      <? }?>
      <td colspan="7" class="tbl23" style="white-space: nowrap;" align="center" >แก้ไขเสื้อ</td>
      <tr>
          <td colspan="1" class="tbl2" style="white-space: nowrap;" align="left">รับเสื้อ</td>
          <td colspan="6" class="tblyy" style="white-space: nowrap;" align="left">
          <input type="text" size="3"  name="shirt_num" id="shirt_num" value="<?=$objResult["shirt_num"]?>" > ตัว <font color="#FF0000"> * กรอกจำนวนเสื้อที่รับ</font></td>
      </tr>
      <tr>
          <td colspan="1" class="tbl2" style="white-space: nowrap;" align="left"></td>
          <td colspan="6" class="tblyy" style="white-space: nowrap;" align="left"><input type="submit" name="" value="บันทึก" /></td>
      </tr>
      
  </table>
  <div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
</form>
<? }?>
  
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