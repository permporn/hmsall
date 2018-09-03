<? 
ob_start();
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
    <h1>ทะเบียนนักเรียน สด & DVD</h1>
    <p>
    <form name="form1" action="home.php" method="get">
        <label for="year">เลือกปี:</label>
           <select name="year" id="year" style="width:100px;">
                <? if($_GET["year"]==""){?><option value="0" disabled="disabled" selected="selected">เลือกปี</option><? }?>
           <?
                $strSQL = "SELECT * FROM  year order by id DESC";
                $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
                while($objResult = mysql_fetch_array($objQuery)) {?>    
                <option value="<?=$objResult['id']?>" <? if($_GET["year"]==$objResult['id']){?>selected="selected"<? }?>><?=$objResult['nameyear']?></option>
                <? }?>
           </select>
       
        <label for="year">เลือกภาคเรียน:</label>
           <select name="term" id="term" style="width:170px;">
                <? if($_GET["term"]==""){?><option value="0" disabled="disabled" selected="selected">เลือกภาคเรียน</option><? }?>
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
                <option value="1" <? if($_GET["type"]=="1"){?>selected="selected"<? }?>> คอร์สสด </option>
                <option value="2" <? if($_GET["type"]=="2"){?>selected="selected"<? }?>> DVD </option>
                <option value="3" <? if($_GET["type"]=="3"){?>selected="selected"<? }?>> SELF </option>
           </select>
       <input type="submit" name="submit" value="ค้นหา" />   
   </p>
   </form>
  </div>
  
  <? if($_GET["year"]!=""&&$_GET["term"]!=""){?>
  <div align="center">
  <br />
  <form name="form2" action="home.php" method="get">
  		ค้นหาจากชื่อคอร์ส
  		<input name="show_arti_topic" type="text" id="show_arti_topic" size="50" />
  		<input name="h_arti_id" type="hidden" id="h_arti_id" value="" />
        <input name="year" type="hidden" id="year" value="<?=$_GET["year"]?>" />
        <input name="term" type="hidden" id="term" value="<?=$_GET["term"]?>" />
        <input name="type" type="hidden" id="type" value="<?=$_GET["type"]?>" />
        <input name="submit" type="submit" value="ค้นหา" />
  </form>
  <br />
  <form name="form3" action="home.php" method="get">
  		ค้นหาจากรหัสวิชา
  		<input name="show_arti_topic3" type="text" id="show_arti_topic3" size="50" />
  		<input name="h_arti_id3" type="hidden" id="h_arti_id3" value="" />
        <input name="year" type="hidden" id="year" value="<?=$_GET["year"]?>" />
        <input name="term" type="hidden" id="term" value="<?=$_GET["term"]?>" />
        <input name="type" type="hidden" id="type" value="<?=$_GET["type"]?>" />
        <input name="submit" type="submit" value="ค้นหา" />
  </form>
  </div>
  <? }?>
  <br />
  <? if($_GET["year"]!=""&&$_GET["term"]!=""){?>

<?
$year = $_GET["year"];
$term = $_GET["term"];
$type = $_GET["type"];

	$objQuery_atid = mysql_query("SELECT id_year FROM addterm WHERE year_id = '".$_GET["year"]."' AND termid = '".$_GET["term"]."'");
	$objResult_atid = mysql_fetch_array($objQuery_atid);
	$atid = $objResult_atid["id_year"];

$num = 0;
$strSQL = "
SELECT s.subid
    , s.subname
	, s.subcode
	, s.price
	, s.day
	, s.time
	, s.date
	, s.edate
	, s.type
	, s.teachid
	, s.roomid
	, s.id_year
FROM subject s  
INNER JOIN room r
    on s.roomid = r.roomid
WHERE s.id_year = '".$atid."'";
/*SELECT s.studentname
    , s.studentid
    , s.studentdesc
    , h.hallname
FROM students s
INNER JOIN hallprefs hp
    on s.studentid = hp.studentid
INNER JOIN halls h
    on hp.hallid = h.hallid*/
if($_GET["type"]!="0"){
	$strSQL .= " AND s.type = '".$_GET["type"]."'";
}
if($_GET["h_arti_id"]!=""){
	$strSQL .= " AND s.subcode = '".$_GET["h_arti_id"]."'";
}
if($_GET["h_arti_id3"]!=""){
	$strSQL .= " AND s.subcode = '".$_GET["h_arti_id3"]."'";
}
if($objResultSTT["status"]!="ADMIN" && $objResultSTT["status"]!="Manager" && $objResultSTT["accid"]!="3"){
	$strSQL .= " AND r.branchid = '".$objResultSTT["branchid"]."'";
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

$strSQL .=" order  by s.subid ASC LIMIT $Page_Start , $Per_Page";
$objQuery  = mysql_query($strSQL);	
?>
  
  <table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">
	  <tr>
          <td width="5%" class="tbl2" style="white-space: nowrap;" align="center">ลำดับที่</td>
          <td width="18%" class="tbl2" style="white-space: nowrap;" align="center">ชื่อวิชา</td>
          <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">รหัสวิชา</td>
          <td width="6%" class="tbl2" style="white-space: nowrap;" align="center">ครู</td>
          <td width="9%" class="tbl2" style="white-space: nowrap;" align="center">เรียนวัน</td>
          <td width="19%" class="tbl2" style="white-space: nowrap;" align="center">วันเปิดคอร์ส</td>
          <td width="8%" class="tbl2" style="white-space: nowrap;" align="center">วันปิดคอร์ส</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">สาขา</td>
          <td width="7%" class="tbl2" style="white-space: nowrap;" align="center">ห้องเรียน</td>
          <td width="20%" class="tbl2" style="white-space: nowrap;" align="center">จำนวน นร.</td>
      </tr>
      
<? 	//$sumamount = 0;
	while($objResult = mysql_fetch_array($objQuery)){
		$num++;
		if($num % 2 == 0){$tblyy = "tblyy2";}
		else{$tblyy = "tblyy";}
?>      
      <tr>
          <td width="5%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$num+(($Page-1)*$Per_Page)?></td>
          <td width="18%"class="<?=$tblyy?>" style="white-space: nowrap;" align="left">
		  <a href="student.php?subid=<?=$objResult["subid"]?>"><?=$objResult["subname"];?></a></td>
          <td width="8%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["subcode"];?></td>
          <td width="6%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  <?
		  	$objQuery_tname = mysql_query("SELECT * FROM teacher WHERE teacherid = '".$objResult["teachid"]."'");
			$objResult_tname = mysql_fetch_array($objQuery_tname);
			echo $objResult_tname["teachername"];
		  ?></td>
          <td width="9%" class="<?=$tblyy?>" style="white-space: nowrap;" align="left"><?=$objResult["day"];?> (<?=$objResult["time"];?>)</td>
          <td width="19%"class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["date"];?></td>
          <td width="8%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult["edate"];?></td>
          <td width="7%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  <?
		  	$objQuery_rname = mysql_query("SELECT * FROM room WHERE roomid = '".$objResult["roomid"]."'");
			$objResult_rname = mysql_fetch_array($objQuery_rname);
			
			$objQuery_brname = mysql_query("SELECT * FROM branch WHERE branchid = '".$objResult_rname["branchid"]."'");
			$objResult_brname = mysql_fetch_array($objQuery_brname);
			echo $objResult_brname["branchname"];
		  ?></td>
          <td width="7%" class="<?=$tblyy?>" style="white-space: nowrap;" align="center"><?=$objResult_rname["roomname"];?></td>
          <td width="20%"class="<?=$tblyy?>" style="white-space: nowrap;" align="center">
		  <?
		  	$objQuery_NumLearn = mysql_query("SELECT learnid FROM learn WHERE subcode = '".$objResult["subcode"]."' AND id_year = '".$objResult["id_year"]."' AND status = 1");
			$Num_RowsLearn = mysql_num_rows($objQuery_NumLearn);
			echo $Num_RowsLearn;
		  ?></td>
      </tr>
      <? }if($num == 0){?>
      <td width="7%" colspan="10" class="tblyy" style="white-space: nowrap;" align="center"><font color="#FF0000"><strong>ไม่พบข้อมูล</strong></font></td><? }?>
  </table>	
  <br />
  <div align="right">
Total <?= $Num_Rows;?> Record : <?=$Num_Pages;?> Page :
<?

if($Prev_Page)
{
	echo " <a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page&year=$year&term=$term&type=$type'><< Back</a> ";
}

for($i=1; $i<=$Num_Pages; $i++){
	if($i != $Page)
	{ 
		echo "[ <a href='$_SERVER[SCRIPT_NAME]?Page=$i&year=$year&term=$term&type=$type'>$i</a> ]";
	}
	else
	{
		echo "<b> $i </b>";
	}
}
if($Page!=$Num_Pages)
{
	echo " <a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page&year=$year&term=$term&type=$type'>Next>></a> ";
}
//mysql_close($objConnect);
?>
</div>
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
		return "autocomplete/gdata.php?q=" +encodeURIComponent(this.value);
    });	
}	

function make_autocom3(autoObj,showObj){
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
		return "autocomplete/gdata_2.php?q=" +encodeURIComponent(this.value);
    });	
}	 
// การใช้งาน
// make_autocom(" id ของ input ตัวที่ต้องการกำหนด "," id ของ input ตัวที่ต้องการรับค่า");
make_autocom("show_arti_topic","h_arti_id");
make_autocom3("show_arti_topic3","h_arti_id3");
</script>

</html>
<?php mysql_close();?>