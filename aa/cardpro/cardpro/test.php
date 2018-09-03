<?
$dbserver = '10.10.11.14:3306';
$dbuser = "AizeRo2" ; 
$dbpass= "076424746";
$dbname= 'school';
mysql_connect($dbserver, $dbuser, $dbpass) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
mysql_select_db($dbname) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
mysql_query("SET NAMES UTF8");
mysql_query("set character set utf8"); 
// USE THIS
ini_set('max_execution_time', 300000000000); 
/*
$strSQL = "SELECT * FROM subject";
$objQuery = mysql_query($strSQL);
$i =0;
while($objResult = mysql_fetch_array($objQuery)){
	$strSQL2 = "SELECT * FROM learn WHERE subcode = '".$objResult["subcode"]."'";
	$objQuery2 = mysql_query($strSQL2);
	while($objResult2 = mysql_fetch_array($objQuery2)){
	echo "codelearn='".$objResult["subcode"]."['".$objResult["id_year"]."']----------codesubject='".$objResult2["subcode"]."['".$objResult2["id_year"]."']";
	echo "<br>";
	
	
	$strSQL3 = "UPDATE learn SET ";
	$strSQL3 .="id_year = '".$objResult2["id_year"]."' ";
	$strSQL3 .="WHERE subcode = '".$objResult2["subcode"]."' ";}
	$objQuery = mysql_query($strSQL3);
}*/
$strSQL = "SELECT DISTINCT * FROM learn JOIN subject ON learn.subcode = subject.subcode ";
$objQuery = mysql_query($strSQL);
$checkstu = mysql_num_rows($objQuery);
while($objResult = mysql_fetch_array($objQuery)){
	echo "codelearn='".$objResult["subcode"]."['".$objResult["id_year"]."']";
	echo "<br>";
	$a= $objResult["id_year"];
	$b= $objResult["subcode"];
	
	$strSQL3 = "UPDATE learn SET ";
	$strSQL3 .="id_year = '".$a."' ";
	$strSQL3 .="WHERE subcode = '".$b."' ";
	$objQuery3 = mysql_query($strSQL3);
	}	
if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
	else
	{echo "yes";}
			
			
?>