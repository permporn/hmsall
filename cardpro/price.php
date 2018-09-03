<? 
session_start();
include("config.inc.php");
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
    <h1>สรุปยอดนักเรียน สด & DVD</h1>
    <div align="center">
    <p>
    <form name="form1" action="price.php" method="get">
    <label for="year">เลือกปี:</label>
       <select name="year" id="year" style="width:100px;">
       		<option value="0" disabled="disabled" selected="selected">เลือกปี</option>
       <?
       		$strSQL = "SELECT * FROM  year order by id DESC";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            while($objResult = mysql_fetch_array($objQuery)) {?>    
       		<option value="<?=$objResult['id']?>" <? if($_GET["year"]==$objResult['id']){?>selected="selected"<? }?>><?=$objResult['nameyear']?></option>
            <? }?>
       </select>
   
    <label for="year">เลือกภาคเรียน:</label>
       <select name="term" id="term" style="width:150px;">
       		<option value="0" disabled="disabled" selected="selected">เลือกภาคเรียน</option>
       <?
       		$strSQL = "SELECT * FROM  term order by termid DESC";
            $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            while($objResult = mysql_fetch_array($objQuery)) {?>    
       		<option value="<?=$objResult['termid']?>" <? if($_GET["term"]==$objResult['termid']){?>selected="selected"<? }?>><?=$objResult['term']?></option>
            <? }?>
       </select>
   
    <label for="year">ประเภทการเรียน:</label>
       <select name="type" id="type" style="width:150px;">
       		<? if($_GET["type"]==""){?><option value="0" selected="selected">เลือกประเภทการเรียน</option><? }?>
       		<option value="0" <? if($_GET["type"]=="0"){?>selected="selected"<? }?>> ทั้งหมด </option>
            <option value="1" <? if($_GET["type"]=="1"){?>selected="selected"<? }?>> คอร์สด </option>
            <option value="2" <? if($_GET["type"]=="2"){?>selected="selected"<? }?>> DVD </option>
            <option value="3" <? if($_GET["type"]=="3"){?>selected="selected"<? }?>> SELF </option>
       </select>
    <label for="">สาขา:</label>
       <select name="branch" id="branch" style="width:100px;">
       		<? if($_GET["branch"]==""){?><option value="0" selected="selected">เลือกสาขา</option><? }?>
       		<option value="0" <? if($_GET["branch"]=="0"){?>selected="selected"<? }?>> ทั้งหมด </option>
            <?
				$strSQL = "SELECT * FROM branch order by branchname ASC";
            	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            	while($objResult = mysql_fetch_array($objQuery)) {
			?>
            <option value="<?=$objResult["branchid"]?>" <? if($_GET["branch"]==$objResult['branchid']){?>selected="selected"<? }?>><?=$objResult["branchname"]?></option>
            <? }?>
       </select>
       <label for="">ครู:</label>
       <select name="teacher" id="teacher" style="width:100px;">
       		<? if($_GET["teacher"]==""){?><option value="0" selected="selected">เลือกครู</option><? }?>
       		<option value="0" <? if($_GET["teacher"]=="0"){?>selected="selected"<? }?>> ทั้งหมด </option>
            <?
				$strSQL = "SELECT * FROM teacher order by teacherid ASC";
            	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
            	while($objResult = mysql_fetch_array($objQuery)) {
			?>
            <option value="<?=$objResult["teacherid"]?>" <? if($_GET["teacher"]==$objResult['teacherid']){?>selected="selected"<? }?>><?=$objResult["teachername"]?></option>
            <? }?>
       </select>
   <input type="submit" name="submit" value="ค้นหา" />   
   </form>
   </p>
   </div>
  </div>
  
  <? if($_GET["year"]!="" && $_GET["term"]!="" && $_GET["teacher"]!=""){?>

<?
$year = $_GET["year"];
$term = $_GET["term"];
$type = $_GET["type"];
$branch = $_GET["branch"];
$teacher = $_GET["teacher"];

	$objQuery_atid = mysql_query("SELECT id_year FROM addterm WHERE year_id = '".$_GET["year"]."' AND termid = '".$_GET["term"]."'");
	$objResult_atid = mysql_fetch_array($objQuery_atid);
	$atid = $objResult_atid["id_year"];

$num = 0;
$strSQL = "
SELECT     s.subname
    , s.subcode
    , s.price
    , t.teachername
	, b.branchname
FROM  subject s 
INNER JOIN room r 
    ON s.roomid = r.roomid 
INNER JOIN branch b 
    ON r.branchid = b.branchid
INNER JOIN teacher t
    ON s.teachid = t.teacherid WHERE s.id_year = '".$atid."'";

if($_GET["type"]!="0"){
	$strSQL .= " AND s.type = '".$_GET["type"]."'";
}
if($_GET["branch"]!="0"){
	$strSQL .= " AND b.branchid = '".$_GET["branch"]."'";
}
if($_GET["teacher"]!="0"){
	$strSQL .= " AND s.teachid = '".$_GET["teacher"]."'";
}


$objQuery = mysql_query($strSQL);
$Num_Rows = mysql_num_rows($objQuery);

$Per_Page = 50;   // Per Page

$Page = $_GET["Page"];
if(!$_GET["Page"])
{
	$Page=1;
}

$Prev_Page = $Page-1;
$Next_Page = $Page+1;

$Page_Start = (($Per_Page*$Page)-$Per_Page);
if($Num_Rows<=$Per_Page)
{
	$Num_Pages =1;
}
else if(($Num_Rows % $Per_Page)==0)
{
	$Num_Pages =($Num_Rows/$Per_Page) ;
}
else
{
	$Num_Pages =($Num_Rows/$Per_Page)+1;
	$Num_Pages = (int)$Num_Pages;
}
//นับคนทั้งหมด และ จำนวนเงินทั้งหมด
$sumamount_all = 0;
$sum_learn = 0;
$objQuery_sum  = mysql_query($strSQL);
while($objResult_sum = mysql_fetch_array($objQuery_sum)){
	$objQuery_NumLearn_new = mysql_query("SELECT learnid FROM learn WHERE subcode = '".$objResult_sum["subcode"]."' AND id_year = '".$atid."'");
	$Num_RowsLearn_new = mysql_num_rows($objQuery_NumLearn_new);
	
	$sumamount_all = $sumamount_all + ($Num_RowsLearn_new*$objResult_sum["price"]);
	$sum_learn = $sum_learn + $Num_RowsLearn_new;
}

$strSQL .=" order  by s.subid ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);	
?>

  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
  	  <tr>
      	  <td colspan="8" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>สรุปรายงาน คอสร์เรียน S.E.L.F</strong></div></td>
      </tr>	
      <tr>
      	  <td colspan="8" class="tbl2" style="white-space: nowrap;"><div align="center"><strong>
          ปี <font color="#0099FF"><?
		  	$objQuery_yname = mysql_query("SELECT * FROM year WHERE id = '".$_GET["year"]."'");
			$objResult_yname = mysql_fetch_array($objQuery_yname);
			echo $objResult_yname["nameyear"];
          ?></font>
          เทอม <font color="#0099FF"><?
		  	$objQuery_tname = mysql_query("SELECT * FROM term WHERE termid = '".$_GET["term"]."'");
			$objResult_tname = mysql_fetch_array($objQuery_tname);
			echo $objResult_tname["term"];
          ?></font>
          สาขา <font color="#0099FF"><?
		  	if($_GET["branch"]!="0"){
				$objQuery_bname = mysql_query("SELECT * FROM branch WHERE branchid = '".$_GET["branch"]."'");
				$objResult_bname = mysql_fetch_array($objQuery_bname);
				echo $objResult_bname["branchname"];
			}else{echo "ทั้งหมด";}
		  ?></font>
          วิธีสอน <font color="#0099FF"><?
		  	if($_GET["type"]=="0"){echo "คอร์สด,DVD และ SELF";}
			if($_GET["type"]=="1"){echo "คอร์สด";}
			if($_GET["type"]=="2"){echo "DVD";}
			if($_GET["type"]=="3"){echo "SELF";}
          ?></font></strong></div></td>
      </tr>
	  <tr>
          <td width="" class="tbl24" colspan="6"  style="white-space: nowrap;"><div align="right">++ ยอดรวมทั้งหมด ++</div></td>
          <td width="" class="tbl24" colspan="1" style="white-space: nowrap;"><center><?=number_format($sum_learn)?> คน</center></td>
          <td width="" class="tbl24" colspan="1" style="white-space: nowrap;"><center><?=number_format($sumamount_all)?> บาท</center></td>
      </tr>
      <tr>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ลำดับที่ </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ชื่อวิชา </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> รหัสวิชา </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> สาขา </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ครู </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ราคา </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> จำนวนคน </center></td>
          <td width="" class="tbl2" style="white-space: nowrap;"><center> ยอดรวม </center></td>
      </tr>
      <? if($Num_Rows >0){?>

<? 	
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
?>       
      <tr>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$num+(($Page-1)*$Per_Page)?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["subname"]?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["subcode"]?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["branchname"]?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=$objResult["teachername"]?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center><?=number_format($objResult["price"])?></center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center>
         
          <?
		    $objQuery_NumLearn = mysql_query("SELECT learnid FROM learn WHERE subcode = '".$objResult["subcode"]."' AND id_year = '".$atid."'");
			$Num_RowsLearn = mysql_num_rows($objQuery_NumLearn);
		?>
          <? if($Num_RowsLearn != ''){?><font color="#0099FF"><strong><?=$Num_RowsLearn;?></strong></font> <? }else{?><?=$Num_RowsLearn;}?>
		  </center></td>
          <td width="" class="<?=$tblyy?>" style="white-space: nowrap;"><center>
		  <? if(number_format($Num_RowsLearn*$objResult["price"]) != 0){?><font color="#0099FF"><strong><?=number_format($Num_RowsLearn*$objResult["price"]);?></strong></font> <? }else{?><?=number_format($Num_RowsLearn*$objResult["price"]);}?>
		  </center></td>
      </tr>
<? }?>      
      
      <? }?>
      <? if($Num_Rows == 0){?>
      <tr>
      	  <td colspan="8" class="tblyy" style="white-space: nowrap;"><div align="center"><font color="#FF0000">ไม่พบข้อมูล</font></div></td>
      </tr>
      <? }?>
  </table>
  <br />
  <div align="right">
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?

if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&year=$year&term=$term&type=$type&branch=$branch&teacher=$teacher'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{ 
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&year=$year&term=$term&type=$type&branch=$branch&teacher=$teacher'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&year=$year&term=$term&type=$type&branch=$branch&teacher=$teacher'>Next>></a> ";
}
//mysql_close($objConnect);
?>	
</div>
  <? }?>
  <br />
  
</div>
</body>
</html>
<?php mysql_close();?>