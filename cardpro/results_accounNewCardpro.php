<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_scho" ; 

$dbpass= "72o35XDJ";

$dbname= 'ajtongmath_scho';

mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");

mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล

mysql_query("SET NAMES UTF8");

mysql_query("set character set utf8");  

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

</head>

<style>

.tbl-border { background-color:#333;  /*-webkit-box-shadow: #AAA 0px 0px 15px;*/} 

.tbl1 { font-size:13px; color:#000; background-color:#fff; padding:4px; }  

.tbl2 { font-size:13px;	color:#333; font-weight:800; background-color:#BBB; padding:4px;}  

.tbl3 { font-size:13px; color:#000000; background-color:#fff; padding:4px; }  

.tbl4 { font-size:13px;	color:#000000; background-color:#FFFF66; padding:4px } 

.tblx { font-size:13px; color:#000; background-color:#fff; padding:4px; border:#DDDDDD; }

.tblyy { font-size:13px; color: #666; background: #fff; padding: 5px; } 

.tblyy2 { font-size:13px; color: #666; background: #F0F0F0; padding: 5px; } 

.tbl-border2{ font-size:15px; color: #666; padding: 5px; -webkit-box-shadow: #AAA 0px 0px 15px;} 

.tbl22 { font-size:15px; color:#666; padding:4px;} 

.tblyy3 { font-size:15px; color:#111; background:#DDD; padding: 5px; } 

.tblyy4 { font-size:14px; color: #666; background: #fff; padding: 5px; }  

.tbl-border3 { background-color:#fff; border: thin #DDDDDD;  /*-webkit-box-shadow: #AAA 0px 0px 15px;*/} 

.tbl23 { font-size:13px; color:#333; font-weight:800; background-color:#DDD; padding:4px;} 

.tbl24 { font-size:13px; color:#333; font-weight:800; background-color:#FF0; padding:4px;}  

</style>

<center>

<p>ข้อมูลรายชื่อเด็กใหม่เฉพาะโอน ช่วงเดือน ก.พ. - มี.ค. 2558</p>

<form name="Form1" method="get" action="results_accounNewCardpro.php" onSubmit="return checkForm();">

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

     <input type="submit" name="submit" value="ค้นหา" />  

</form>

</center>

<br />

<?php

$branch = $_GET["branch"];

$str_nameNew = "SELECT student.studentname

				, learn.subcode 

				, learn.learnid 

				, student.tel 

				, student.studentid 

				, learn.regisdate 

				, subject.subname 

				, branch.branchname

				From learn

				JOIN student 

				ON learn.studentid = student.studentid

				JOIN subject 

				ON learn.subcode = subject.subcode and learn.id_year = subject.id_year

				JOIN room

				ON subject.roomid = room.roomid

				JOIN branch

				ON room.branchid = branch.branchid

				WHERE learn.regisdate Between '2015-02-01' AND '2015-03-31'";

				

if($_GET["branch"]!="0"){

$str_nameNew .= " AND branch.branchid = '".$_GET["branch"]."'";

}

$str_nameNew .= "ORDER BY student.studentname ASC";	

$query_nameNew = mysql_query($str_nameNew);

?>

<body>

<table class="tbl-border" cellpadding="0" cellspacing="1" width="90%" align="center">

<tr>

<td class="tbl23">ลำดับ</td>

<td class="tbl23">วันที่สมัคร</td>

<td class="tbl23">รหัสนักเรียน</td>

<td class="tbl23">ชื่อนักเรียน</td>

<td class="tbl23">เบอร์</td>

<td class="tbl23">วิชา</td>

<td class="tbl23">เรียนสาขา</td>

<td class="tbl23">ออกโดย</td>

<tr>



<? 

	$i = 0;

	while($result_nameNew = mysql_fetch_array($query_nameNew)){

	$i++;

	$Str= "SELECT * FROM learn

			WHERE learn.learnid = '".$result_nameNew["learnid"]."'  

			AND learn.regisdate NOT BETWEEN '2015-02-01' AND '2015-03-31' AND learn.status != '0'";

	$query_nameNew2 = mysql_query($Str);

	$result_nameNew2 = mysql_fetch_array($query_nameNew2);

	

	if(empty($result_nameNew2)){?>

    <tr>

    <td class="tblyy"><?=$i?></td>

    <td class="tblyy"><?=$result_nameNew["regisdate"]?></td>

    <td class="tblyy"><?=$result_nameNew["studentid"]?></td>

    <td class="tblyy"><?=$result_nameNew["studentname"]?></td>

    <td class="tblyy"><?=$result_nameNew["tel"]?></td>

    <td class="tblyy"><?=$result_nameNew["subname"]?> </td>

    <td class="tblyy"><?=$result_nameNew["branchname"]?></td>

    <td class="tblyy"><?=$result_nameNew["stname"]?></td>

    </tr>

<? }

}?>

</table>



</body>

</html>