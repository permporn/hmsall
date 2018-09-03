<? 
include("config.inc.php");
ob_start();
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	
$account=$_POST["account"];
$staffid=$_POST["staffid"];
$studentname =$_POST["show_arti_topic_name"];
$sub = $_POST["show_arti_topic_subj"];
$type_pay = $_POST["type_pay"];
$stardate = DateYMD($_POST["date"]);

$Invoicenumber = $_POST["Invoicenumber"];
$amount = $_POST["amount"];
$codetransfer = $_POST["codetransfer"];
$no_petition = $_POST["noptt"];
$date = date('y-m-d');
$date_pay = $_POST["date_pay"];

$no_petition_staff = $_POST["no_petition_staff"];
$book_staffid = $_POST["staffid"];
$book_status = $_POST["book_status"];
$book_num = trim($_POST["book_num"]);
$book_detail = trim($_POST["book_detail"]);

/*if($objResult99['status'] == 'admin'){
	$enddate = DateYMD($_POST["edate"]);
	//$enddate = DateYMD($enddate);
}
else{*/
	if($_POST["edate"]=="1"){
		$enddate = date('Y-m-d', strtotime("+6 months", strtotime($stardate)));
	}else if($_POST["edate"]=="2"){
		$enddate = date('Y-m-d', strtotime("+1 years", strtotime($stardate)));
	}else if($_POST["edate"]=="3"){
		$enddate = date('Y-m-d', strtotime("+6 months", strtotime($stardate)));
		$enddate = date('Y-m-d', strtotime("+1 years", strtotime($enddate)));
	}else if($_POST["edate"]=="4"){
		$enddate = date('Y-m-d', strtotime("+2 years", strtotime($stardate)));
	}
	//$enddate = DateYMD($enddate);
//}
//echo $stardate." ".$enddate;
if($type_pay == "transfer" or $type_pay == "cradit" && $objResult99['status'] != 'admin'){
		if($Invoicenumber == ''){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('กรุณากรอกหมายเลขใบชำระเงิน');</script>";
		echo "<script language='javascript'>window.history.back();</script>";
		exit();
		}
}
	$strSQL = "SELECT * FROM account WHERE username = '".$account."' ";
	$objQuery = mysql_query($strSQL);
	$objResult = mysql_fetch_array($objQuery);
	
	if($objResult){echo "Account already exist";}
	else{
		$strSQL1 = "SELECT * FROM student WHERE name = '".$studentname."' ";
		$objQuery1 = mysql_query($strSQL1);
		$objResult1 = mysql_fetch_array($objQuery1);
		$student = $objResult1["studentid"];
		
		
		$strSQL2 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		$objQuery2 = mysql_query($strSQL2);
		$objResult2 = mysql_fetch_array($objQuery2);
		$subid = $objResult2["subid"];
		
		$strSQL7 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		$objQuery7 = mysql_query($strSQL7);
		$objResult7 = mysql_fetch_array($objQuery7);
		$totalcredit = $objResult7["hour"];
		$s=1;
		
		$strSQL9 = "INSERT INTO account ";
		$strSQL9 .="(studentid,username,password,state,sdate,edate,totalcredit,credit_start,status,staffid,no_petition,no_petition_staff) ";
		$strSQL9 .="VALUES ";
		$strSQL9 .="('".$student."','".$account."'";
		$strSQL9 .=",'".$_POST["password"]."','1'";
		$strSQL9 .=",'".$stardate."','".$enddate."'";
		$strSQL9 .=",'".$totalcredit."','".$totalcredit."','".$_POST["status"]."','".$staffid."','".$no_petition."','".$no_petition_staff."') ";
		$objQuery9 = mysql_query($strSQL9);
		
		if(!$objQuery9){echo "Error Save1 [".mysql_error().$strSQL9."]";}
		else{
		$strSQL4 = "SELECT * FROM account WHERE username = '".$account."' ";
		$objQuery4 = mysql_query($strSQL4);
		$objResult4 = mysql_fetch_array($objQuery4);
		$accid = $objResult4["accid"];
		
		$strSQL3 = "INSERT INTO credit ";
		$strSQL3 .="(accid,subid,codetransfer,amount,Invoicenumber,staffid,no_petition_staff,no_petition,type_pay,date_pay,date_regis,book_status,book_num,book_detail,book_staffid) ";
		$strSQL3 .="VALUES ";
		$strSQL3 .="('".$accid."'";
		$strSQL3 .=",'".$subid."' ";
		$strSQL3 .=",'".$codetransfer."' ";
		$strSQL3 .=",'".$amount."'";
		$strSQL3 .=",'".$Invoicenumber."'";		
		$strSQL3 .=",'".$staffid."'";
		$strSQL3 .=",'".$no_petition_staff."'";
		$strSQL3 .=",'".$no_petition."'";
		$strSQL3 .=",'".$type_pay."'";
		$strSQL3 .=",'".$date_pay."'";
		$strSQL3 .=",'".$date."'";
		$strSQL3 .=",'".$book_status."'";
		$strSQL3 .=",'".$book_num."'";
		$strSQL3 .=",'".$book_detail."'";
		$strSQL3 .=",'".$book_staffid."' )";
		$objQuery3 = mysql_query($strSQL3);
		if(!$objQuery3){echo "Error Save2 [".mysql_error().$strSQL3."]";}
		else{
		mysql_close();
		header("location:viewaccount.php?accid=$accid&studenname=$studentname&type_pay=$type_pay&std=$student");
		}}}
		
?>