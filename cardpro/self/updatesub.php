<?php
include("../config.inc.php");
ob_start();
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysqli_query($con_ajtongmath_self,$strSQL99);
	$objResult99 = mysqli_fetch_array($objQuery99);
	
$chk = $_POST["chk"];
$accid = $_GET["accid"];
//$sub = $_POST["h_arti_id_subj"];
$type_self = $_POST["type_self"];

if($type_self == 4){
	$sub = $_POST["h_arti_id_subj_broadcast"];
}else{
	$sub = $_POST["h_arti_id_subj"];
}

$date = date('y-m-d');
$no_petition = $_POST["noptt"];
$staffid = $_POST["staffid"];
$no_petition_staff = $_POST["no_petition_staff"];

$strSQL2 = "SELECT * FROM account WHERE accid = '".$accid."'";
$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysqli_fetch_array($objQuery2);
$studentid = $objResult2['studentid'];

$strSQL3 = "SELECT * FROM student WHERE studentid = '".$studentid."'";
$objQuery3= mysqli_query($con_ajtongmath_self,$strSQL3) or die ("Error Query [".$strSQL3."]");
$objResult3 = mysqli_fetch_array($objQuery3);
$studenname = $objResult3['name'];

	if($chk == ""){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ไม่ได้เลือกวิชาที่จะแก้ไข!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=addsubject.php?type=Edit&accid=$accid&std=$studentid'>";
	}
	else if($sub == ""){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('กรุณาเลือกวิชา!!');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=addsubject.php?type=Edit&accid=$accid&std=$studentid'>";
		}
	else if($_GET["type"] == 'update'){
	
	$check=0;
	$strSQL2 = "SELECT * FROM subject WHERE subid = '".$sub."' ";
	$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2);
	$objResult2 = mysqli_fetch_array($objQuery2);
	$subid = $objResult2["subid"];
	$c1 = $objResult2["hour"];
	$strSQL9 = "SELECT * FROM credit WHERE accid = '".$accid."' AND subid = '".$subid."'";
	$objQuery9 = mysqli_query($con_ajtongmath_self,$strSQL9);
	while($objResult9 = mysqli_fetch_array($objQuery9)){
		if($objResult9["accid"]==$accid && $objResult9["subid"]==$subid){$check++;}
		}
	if($check>0){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('เพิ่ม วิชาซ้ำ!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=viewaccount.php?accid=$accid&studenname=$studenname&std=$studentid'>";}
	else{
			$strSQL1 = "UPDATE credit SET ";
			$strSQL1 .= " subid = '".$subid."' ";
			$strSQL1 .= " ,type_self = '".$type_self."' ";
			$strSQL1 .= " ,staffid = '".$staffid."' ";
			$strSQL1 .= " ,no_petition = '".$no_petition."' ";
			$strSQL1 .= " ,no_petition_staff = '".$no_petition_staff."' ";
			$strSQL1 .= " ,date_regis = '".$date."' ";
			$strSQL1 .= "WHERE creditid = '".$chk."'";
			$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
				if(!$objQuery1){echo "Error Save1 [".mysqli_error().$strSQL1."]";}
				else{header("location:viewaccount.php?accid=$accid&studenname=$studenname&std=$studentid");
				}
	}
}
?>