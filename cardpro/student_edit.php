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
    <h1>แก้ไขข้อมูล</h1>
  <br /> <br />
  
  
  
<? if($_GET["type"] == "" && $_GET["learnid"] != "" ){?>
<?
$learnid = $_GET["learnid"];

	$strSQL_stu = "SELECT * FROM student WHERE studentid = '".$studentid."'";
	$objQuery_stu = mysql_query($strSQL_stu) or die ("Error Query [".$strSQL_stu."]");
	$objResult_stu = mysql_fetch_array($objQuery_stu);
	
	$strSQL = "SELECT 
	s.studentid,
	s.studentname,
	s.tel,
	sj.subcode,
	sj.subid,
	sj.subname,
	sj.id_year,
	l.learnid,
	l.seat,
	l.regisdate,
	y.nameyear,
	t.term
	FROM learn l
	INNER JOIN student s
		ON l.studentid = s.studentid 
	INNER JOIN subject sj
		ON l.subcode = sj.subcode AND l.id_year = sj.id_year
	INNER JOIN addterm at
		ON l.id_year = at.id_year 
	INNER JOIN year y
		ON at.year_id = y.id 
	INNER JOIN term t
		ON at.termid = t.termid ";
	$strSQL .=" WHERE l.learnid = '".$learnid."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);

?>
	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	<tr>
      	<? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {$a = 9;$b = 2;$c = 7;?><? }else{$a = 8;$b = 2;$c = 6;} ?>
          <td colspan="<?=$a?>" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + แก้ไขข้อมูล <font color="#0099FF"><?=$objResult_stu["studentname"];?></font>
          </td>
      </tr>
	  <tr>
          <!--<td width="10%"  class="tbl2" style="white-space: nowrap;" align="center">
          <input name="CheckAll" type="checkbox" id="CheckAll" value="Y" onClick="ClickCheckAll(this);">all
          <input name="submit" type="submit" value="Print"/> 
          </td>-->
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="25%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เทอม</td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <td width="10%" class="tbl2" style="white-space: nowrap;" align="center">แก้ไข</td>
          <? } ?>          
      </tr>
      <tr>
      	  <!--<td width="10%" style="white-space:nowrap;" class="tblyy" align="center">
          <input type="checkbox" name="chkDel[]" id="chkDel1" value="<?=$objResult["learnid"];?>">
          <input type="hidden" name="id_year" value="<?=$objResult["id_year"]?>" />
          </td>-->
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <!--<td width="5%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>-->
          <td width="29%" class="tblyy" style="white-space: nowrap;" align="left"><a href="student_detail.php?studentid=<?=$objResult["studentid"]?>"><?=$objResult["studentname"]?></a></td>
          <td width="25%"class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["subname"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subcode"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td width="7%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["regisdate"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?></td>
          <td width="6%" class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["term"];?></td>
          <? if($objResultSTT["status"]=="Manager" or $objResultSTT["status"]=="ADMIN" or $objResultSTT["status"]=="admin") {?>
          <td width="5%" class="tblyy" colspan="8"  style="white-space: nowrap;" align="center">
			<a href="student_edit.php?type=changecourse&learnid=<?=$objResult["learnid"];?>">เปลี่ยนคอร์ส ,</a>
			<a href="student_edit.php?type=cencelcourse&learnid=<?=$objResult["learnid"];?>">ยกเลิกคอร์ส ,</a> 
			<a href="student_edit.php?type=changeseat&learnid=<?=$objResult["learnid"];?>&subid=<?=$objResult["subid"];?>">เปลี่ยนที่นั่ง</a> 
		  </td>
          <? }?>
       </tr>
  </table>
<div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
  <? }?>
  <!-- ******* เปลี่ยนคอร์ส *******-->
  <? if($_GET["type"] == "changecourse" && $_GET["learnid"] != ""){
	
	$strSQL_stu = "SELECT * FROM student WHERE studentid = '".$studentid."'";
	$objQuery_stu = mysql_query($strSQL_stu) or die ("Error Query [".$strSQL_stu."]");
	$objResult_stu = mysql_fetch_array($objQuery_stu);
	$learnid=$_GET["learnid"];
	$strSQL = "SELECT 
	s.studentid,
	s.studentname,
	s.tel,
	sj.subcode,
	sj.subname,
	sj.id_year,
	l.learnid,
	l.regisdate,
	l.seat,
	y.nameyear,
	t.term
	FROM learn l
	INNER JOIN student s
		ON l.studentid = s.studentid 
	INNER JOIN subject sj
		ON l.subcode = sj.subcode AND l.id_year = sj.id_year
	INNER JOIN addterm at
		ON l.id_year = at.id_year 
	INNER JOIN year y
		ON at.year_id = y.id 
	INNER JOIN term t
		ON at.termid = t.termid ";
	$strSQL .=" WHERE l.learnid = '".$learnid."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
  ?>
  <form name="changecourse" action="student_edit.php?type=changeseat&learnid=<?=$learnid?>" method="post" >
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
   <tr>
      	  <td colspan="8" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + เปลี่ยนคอร์ส 
          </td>
      </tr>
  <tr>
  	<td width="8%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
  	<td width="18%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
  	<td width="21%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
    <td width="13%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
    <td width="13%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
    <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
    <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เทอม</td>
    <td width="40%"  class="tbl2" style="white-space: nowrap;" align="center">เปลี่ยนคอร์สเป็น</td>
  </tr>
  <tr>
  	<td width="8%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"]?></td>
  	<td width="18%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentname"]?></td>
  	<td width="21%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subname"]?></td>
    <td width="13%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subcode"]?></td>
    <td width="13%"  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"]?></td>
    <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?></td>
          <td width="6%" class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["term"];?></td>
    <td width="40%"  class="tblyy" style="white-space: nowrap;" align="center">
	<select name="subid" id = "subid" style="width:300px">
	<option value="" selected="selected" disabled="disabled"> -- เลือกคอร์ส -- </option>
    <?
	$strSQL = " SELECT  
				sj.subname,
				sj.subcode,
				sj.subid,
				sj.type,
				sj.id_year,
				sj.time,
				sj.date,
				b.branchname
				FROM subject sj
				INNER JOIN room r
					ON sj.roomid = r.roomid 
				INNER JOIN branch b
					ON r.branchid = b.branchid "; 
	$strSQL .=" WHERE sj.id_year = '".$objResult["id_year"]."'";
	$strSQL .=" order by sj.subname ,sj.type ,b.branchid ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while ($objResult = mysql_fetch_array($objQuery)){
	?>
    <option value="<?=$objResult["subid"]?>">
	<?=$objResult["subcode"]?> - <?=$objResult["subname"]?> - <?=$objResult["branchname"]?> - 
    <? if($objResult["type"]==1){echo " [สด] - ".$objResult["time"]." - [".$objResult["date"]."]";} if($objResult["type"]==2){echo " [DVD] - ".$objResult["time"]." - [".$objResult["date"]."]";} if($objResult["type"]==3){echo " [SELF] ";}?>
    </option>	
    <? } ?>
    </select>
    <input type="submit" name="submit" value="submit"/>
    </td>
  </tr>
  </table>
  <div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
  </form>
  <? } ?>
  <!-- ******* ยกเลิกคอร์ส *******-->
  <? if($_GET["type"] == "cencelcourse" && $_GET["learnid"] != ''){
	$learnid = $_GET["learnid"];

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
	l.learnid,
	l.regisdate,
	l.seat,
	y.nameyear,
	t.term
	FROM learn l
	INNER JOIN student s
		ON l.studentid = s.studentid 
	INNER JOIN subject sj
		ON l.subcode = sj.subcode AND l.id_year = sj.id_year
	INNER JOIN addterm at
		ON l.id_year = at.id_year 
	INNER JOIN year y
		ON at.year_id = y.id 
	INNER JOIN term t
		ON at.termid = t.termid ";
	$strSQL .=" WHERE l.learnid = '".$learnid."'";
	$strSQL .=" order by seat ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery); ?>
    
	<form name="changecourse" action="student_update.php" method="get" >
  	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>
            <input type="hidden" name="type" value="cencelcourse"/>
            <input type="hidden" name="learnid" value="<?=$learnid?>"/>
            <input type="hidden" name="staff" value="<?=$_SESSION["accid_cardpro"]?>"/>
          <td colspan="8" class="tbl2" style="white-space: nowrap;" align="left"  height="">
          + ยกเลิกคอร์ส <font color="#0099FF"><?=$objResult_stu["studentname"];?></font>
          </td>
      </tr>
	  <tr>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
          <td width="29%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
          <td width="25%"  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
          <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">วันโอนเงิน</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">เทอม</td>
          <td width="10%" class="tbl2" style="white-space: nowrap;" align="center">หมายเลขใบคำร้อง</td>
         
      </tr>
      <tr>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"];?></td>
          <td width="29%" class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["studentname"];?></td>
          <td width="25%"class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["subname"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subcode"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"];?></td>
          <td width="7%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["regisdate"];?></td>
          <td width="9%" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?></td>
          <td width="6%" class="tblyy" style="white-space: nowrap;" align="left"><?=$objResult["term"];?></td>
          <td width="5%" class="tblyy" colspan="8"  style="white-space: nowrap;" align="center">
		  	<input type="text" name="id_change_couses" />
        	<input type="submit" name="submit" value="บันทึก"/>
		  </td>
       </tr>
  </table>
  <div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
  </form>
  <? }?>
  <!-- ******* เปลี่ยนที่นั่ง *******-->
  <? if($_GET["type"] == "changeseat" && ($_POST["subid"] != "" or $_GET["subid"] != "") && $_GET["learnid"] != ''){
	  $subid = $_POST["subid"].$_GET["subid"];
	  $learnid = $_GET["learnid"];
	  
	  $strSQL = "SELECT 
		s.studentid,
		s.studentname,
		s.tel,
		sj.subcode,
		sj.subname,
		sj.id_year,
		sj.type,
		sj.time,
		sj.date,
		l.learnid,
		l.regisdate,
		l.seat,
		y.nameyear,
		t.term,
		th.teachername,
		b.branchname
		FROM learn l
		INNER JOIN student s
			ON l.studentid = s.studentid 
		INNER JOIN subject sj
			ON l.subcode = sj.subcode AND l.id_year = sj.id_year
		INNER JOIN teacher th
			ON sj.teachid = th.teacherid 
		INNER JOIN addterm at
			ON l.id_year = at.id_year 
		INNER JOIN year y
			ON at.year_id = y.id 
		INNER JOIN term t
			ON at.termid = t.termid
		INNER JOIN room r
			ON sj.roomid = r.roomid  
		INNER JOIN branch b
			ON r.branchid = b.branchid";
		$strSQL .=" WHERE l.learnid = '".$learnid."' ";
		$strSQL .=" order by seat ASC";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery); ?>
        <? $seat = $objResult["seat"]?>
	 <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
       	<tr>
           <td colspan="9" class="tbl2" style="white-space: nowrap;" align="left"  height="">
              + คอร์สเดิม 
           </td>
        </tr>
      	<tr>
            <td colspan="1" width="" class="tbl2" style="white-space: nowrap;" align="center">รหัสนักเรียน</td>
            <td colspan="8" width="" class="tbl2" style="white-space: nowrap;" align="center">ชื่อ-นามสกุล</td>
		</tr>
      	<tr>
            <td colspan="1" width="" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentid"]?></td>
            <td colspan="8" width="" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["studentname"]?></td>
		</tr>
        <tr>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
            <td width="9%"  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สอน</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สอน</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สาขา</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">เวลาเรียน</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">วันที่เรียน</td>
            <td width=""  class="tbl2" style="white-space: nowrap;" align="center">ปีการศึกษา</td>
        </tr>
      	<tr>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subname"]?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subcode"]?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["seat"]?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["teachername"]?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><? if($objResult["type"]==1){echo "สด";} if($objResult["type"]==2){echo "DVD";} if($objResult["type"]==3){echo "SELF";} ?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["branchname"]?></td>
            <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["time"]?></td>
        	<td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["date"]?></td>
            <td width="" class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["nameyear"];?> <?=$objResult["term"];?></td>
		</tr>
    </table>
    
    <br />
	<?
	   $strSQL = " SELECT  
				sj.subname,
				sj.subcode,
				sj.subid,
				sj.type,
				sj.id_year,
				sj.time,
				sj.date,
				b.branchname,
				th.teachername
				FROM subject sj
				INNER JOIN room r
					ON sj.roomid = r.roomid 
				INNER JOIN branch b
					ON r.branchid = b.branchid
				INNER JOIN teacher th
					ON sj.teachid = th.teacherid "; 
	$strSQL .=" WHERE sj.subid = '".$subid."'";
	$strSQL .=" order by sj.subname ,sj.type ,b.branchid ASC";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	?>
    <form name="changeseat" action="student_update.php" method="get" >
  	<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
      <tr>
      	<input type="hidden" name="type" value="update"/>
      	<input type="hidden" name="learnid" value="<?=$learnid?>"/>
        <input type="hidden" name="subid" value="<?=$subid?>"/>
        <input type="hidden" name="staff" value="<?=$_SESSION["accid_cardpro"]?>"/>
        <td colspan="10" class="tbl2" style="white-space: nowrap;" align="left"  height=""> + เปลี่ยนที่นั่ง </td>
       </tr>
      <tr>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สอน</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สอน</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">สาขา</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">เวลาเรียน</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">วันที่เรียน</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">ที่นั่ง</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">เปลี่ยนที่นั่งเป็น</td>
        <td width=""  class="tbl2" style="white-space: nowrap;" align="center">จากใบคำร้องเลขที่</td>
      </tr>
      <tr>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subname"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["subcode"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["teachername"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><? if($objResult["type"]==1){echo "สด";} if($objResult["type"]==2){echo "DVD";} if($objResult["type"]==3){echo "SELF";} ?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["branchname"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["time"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$objResult["date"]?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center"><?=$seat?></td>
        <td width=""  class="tblyy" style="white-space: nowrap;" align="center">
	<?
		$i=1;
		$strSQL = "SELECT *
					FROM subject s
					JOIN room r
					ON s.roomid = r.roomid 
					WHERE subid = '".$subid."'";
		$objQuery = mysql_query($strSQL);
		$objResuut = mysql_fetch_array($objQuery);
		?>
		<select name="seat" id = "seat">
		<option value="" disabled="disabled" selected="selected"> -- เลือกที่นั่ง -- </option>
		<?
		for ($j = 1; $j <= $objResuut["total"]; $j++){
			$strSQL1 = "SELECT * FROM learn WHERE subcode = '".$objResuut["subcode"]."' && seat = '".$j."' && id_year = '".$objResuut["id_year"]."'";
			$objQuery1 = mysql_query($strSQL1);
			$objResult1 = mysql_fetch_array($objQuery1);
			
			if($objResult1["seat"] == $j){ }
			else{?>
            <option value="<?=$j;?>"><?=$objResuut["roomname"];?> --> <?=$j;?></option>
			<? } 
		}?>
		</select> 
    	</td>
    	<td width=""  class="tblyy" style="white-space: nowrap;" align="center">
        <input type="text" name="id_change_couses" />
        <input type="submit" name="submit" value="บันทึก"/> </td>
    </tr>
    
    </table>
    <div align="right"><input type="button" onclick="history.back();" value="กลับ" style="margin-right:55px; margin-top:5px; width:100px"/></div>
    </form>
  <? } ?>
  
  <br />
  <br />
  <br />
</div>
</body>

<script type="text/javascript"> Cufon.now(); </script>

</html>
<?php mysql_close();?>