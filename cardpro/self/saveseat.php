<?
include("config.inc.php");
date_default_timezone_set("Asia/Bangkok");
$s = date('Y-m-d');
$seciton_s = $_POST["time_s"];
$seciton_e = $_POST["time_e"];
$branch = $_POST["branch"];

	$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['username'])."' and Password = '".trim($_POST['password'])."'";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult)
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Username password ไม่ถูกต้องครับ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}
	else if($seciton_s == 0 || $seciton_e == 0|| $branch == 0 || $_POST['password'] == '' || $_POST['username']== ''){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('กรุณากรอกข้อมูลให้ครบ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}
	else if($seciton_s == $seciton_e){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('คุณเลือกเวลาซ้ำกัน');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}
	
	else if($seciton_s > $seciton_e){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('คุณเลือกช่วงเวลาผิด');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}
	
	else {
		
	$k=$objResult["totalcredit"];
	
	$strSQL = "INSERT INTO reserve ";
	$strSQL .="(accid,status,time,section,section_s,section_e,branchid)";
	$strSQL .="VALUES ";
	$strSQL .="('".$objResult["accid"]."','0','".date('Y-m-d')."','0',$seciton_s,$seciton_e,$branch)";
	$objQuery = mysql_query($strSQL); 
	
	if($objQuery){
	$section = ($seciton_e - $seciton_s);
	$sumall =  $k-$section;
	$strSQL6 = "UPDATE account SET ";
	$strSQL6 .="totalcredit = '".$sumall."' ";
	$strSQL6 .="WHERE accid = '".$objResult["accid"]."' ";
	$objQuery6 = mysql_query($strSQL6);
	if($objQuery6){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('จองเวลาเรียบร้อยแล้ว  เสียเคดิต $section เหลือ $sumall');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=seat.php'>";
	}}
}
?>