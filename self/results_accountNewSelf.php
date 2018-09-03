<?

$dbserver = 'localhost';

$dbuser = "ajtongmath_self" ; 

$dbpass= "5TEwC8yip";

$dbname= 'ajtongmath_self';

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

<p>ข้อมูลรายชื่อเด็กใหม่เฉพาะคอร์ส SELF จ่ายบัตรเคดิต เงินสด และทดลองเรียน ช่วงเดือน ก.พ. - มี.ค. 2558</p>



<form name="Form1" method="get" action="results_accountNewSelf.php" onSubmit="return checkForm();">

<select name="status" id="status">

	<? 	$strSQL1 = "SELECT * FROM branch";

		$objQuery1 = mysql_query($strSQL1);?>

   <? if($_POST["status"]==""){?><option value="00" selected="selected">เลือกสาขา</option><? }?>

      <option value="00" <? if($_GET["status"]=="00"){?>selected="selected"<? }?>>ทุกสาขา</option>

   <? while ($objResult1 = mysql_fetch_array($objQuery1)){?>

       <option value="<?=$objResult1["branchid"]?>" <? if($objResult1["branchid"]==$_GET["status"]){?>selected="selected"<? }?>><?=$objResult1["name"]?></option>

   <? } ?>

</select>

<input type="submit" name="submit" id="submit" value="ค้นหา">

</form>

</center>

<br />

<?php

$status = $_GET["status"];

$str_nameNew = "SELECT acc.accid ,acc.sdate ,student.name ,student.studentid ,student.tel ,staff.stname , acc.status , branch.name as branchname 

				From account acc

				JOIN student 

				ON acc.studentid = student.studentid

				JOIN staff 

				ON student.staffid = staff.stid

				JOIN branch 

				ON acc.status = branch.branchid

				WHERE acc.sdate Between '2015-02-01' AND '2015-03-31'";



if($status!="00"){

	$str_nameNew .= " AND acc.status = '".$status."'";

	}	

			

$str_nameNew .= " ORDER BY student.name ASC";

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

	

	$Str= "SELECT acc.accid, acc.sdate 

			FROM account acc

			JOIN student 

			ON acc.studentid = student.studentid 

			WHERE acc.studentid = '".$result_nameNew["studentid"]."'  

			AND acc.sdate NOT BETWEEN '2015-02-01' AND '2015-03-31' AND acc.status != 'out' 

			ORDER BY student.name ASC ";

	$query_nameNew2 = mysql_query($Str);

	$result_nameNew2 = mysql_fetch_array($query_nameNew2);

	if(empty($result_nameNew2)){

		

		$Str3 = "SELECT acc.accid, acc.sdate ,credit.subid ,subject.subname ,credit.type_pay

			FROM account acc

			JOIN credit 

			ON acc.accid = credit.accid

			JOIN subject 

			ON credit.subid = subject.subid 

			WHERE credit.accid = '".$result_nameNew["accid"]."'";

		$query_nameNew3 = mysql_query($Str3);

	?>

    

    <? while($result_nameNew3 = mysql_fetch_array($query_nameNew3)){

		

	if($result_nameNew3["type_pay"] == "cradit"  || $result_nameNew3["type_pay"] == "money" || $result_nameNew3["type_pay"] == "test"){

	$i++;?>

    <tr>

    <td class="tblyy"><?=$i?></td>

    <td class="tblyy"><?=$result_nameNew["sdate"]?></td>

    <td class="tblyy"><?=$result_nameNew["accid"]?></td>

    <td class="tblyy"><?=$result_nameNew["name"]?></td>

    <td class="tblyy"><?=$result_nameNew["tel"]?></td>

    <td class="tblyy">

    <? 

		echo $result_nameNew3["subname"]."----";

		//if($result_nameNew3["type_pay"] == "transfer"){echo "โอน";}

		if($result_nameNew3["type_pay"] == "test"){echo "ทดลองเรียน";}

		if($result_nameNew3["type_pay"] == "cradit"){echo "บัตรเคดิต";}

		if($result_nameNew3["type_pay"] == "money"){echo "เงินสด";}

		//if($result_nameNew3["type_pay"] == "free"){echo "ฟรีพิเศษ";}

		echo " <br>";	

	?>	

	</td>

    <td class="tblyy"><?=$result_nameNew["branchname"]?></td>

    <td class="tblyy"><?=$result_nameNew["stname"]?></td>

    </tr>

	<?	}}?>

<? }

}?>

</table>



</body>

</html>