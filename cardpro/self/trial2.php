<? 
include("../config.inc.php");
ob_start();
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["mapid"]."'";
	$objQuery99 = mysqli_query($con_ajtongmath_self,$strSQL99);
	$objResult99 = mysqli_fetch_array($objQuery99);
	
	$account=$_POST["account"];
	$staffid=$_POST["staffid"];
	$type = $_POST["type_pay"];
	$totalcredit = $_POST["totalcredit"];
	$Invoicenumber = $_POST["Invoicenumber"];
	$amount = $_POST["amount"];
	$codetransfer = $_POST["codetransfer"];
	$date = date('y-m-d');
	$date_pay = $_POST["date_pay"];
	$noptt = $_POST['noptt'];
	$no_petition_staff = $_POST['no_petition_staff'];
	$subid=$_POST["h_arti_id_subj"];
	
	if($type != "money" or $type != "free"){
		if($Invoicenumber == ''){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('กรุณากรอกหมายเลขใบชำระเงิน');</script>";
		echo "<script language='javascript'>window.history.back();</script>";
		exit();
		}
	}
		
	$strSQL = "SELECT * FROM account WHERE username = '".$account."' ";
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	if($objResult){echo "Account already exist";
	}else{
		$student=$_POST["show_arti_topic_name"];
		
		$strSQL1 = "SELECT * FROM student WHERE name = '".$student."' ";
		$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
		$objResult1 = mysqli_fetch_array($objQuery1);
		$studentid = $objResult1["studentid"];
		
		
		// $sub = $_POST["show_arti_topic_subj"];
		// $strSQL2 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		// $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2);
		// $objResult2 = mysqli_fetch_array($objQuery2);
		// $subid = $objResult2["subid"];
		
		$sub = $_POST["show_arti_topic_subj"];
		$strSQL7 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		$objQuery7 = mysqli_query($con_ajtongmath_self,$strSQL7);
		$objResult7 = mysqli_fetch_array($objQuery7);
		
		$s=1;
		
		$strSQL9 = "INSERT INTO account ";
		$strSQL9 .="(studentid,username,password,state,sdate,edate,totalcredit,credit_start,status,staffid,no_petition,no_petition_staff) ";
		$strSQL9 .="VALUES ";
		$strSQL9 .="('".$studentid."','".$_POST["account"]."'";
		$strSQL9 .=",'".$_POST["password"]."','1'";
		$strSQL9 .=",'".$_POST["date"]."','".$_POST["edate"]."'";
		$strSQL9 .=",'".$totalcredit."','".$totalcredit."','".$_POST["status"]."','".$staffid."','".$noptt."','".$no_petition_staff."')";
		
		
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL9);
		if(!$objQuery9){
			echo "Error Save [".mysqli_error()."]";
		}
		$strSQL4 = "SELECT * FROM account WHERE username = '".$account."' ";
		$objQuery4 = mysqli_query($con_ajtongmath_self,$strSQL4);
		$objResult4 = mysqli_fetch_array($objQuery4);
		$accid=$objResult4["accid"];
		
		$strSQL = "INSERT INTO credit ";
		$strSQL .="(accid,subid,codetransfer,amount,Invoicenumber,staffid,type_pay,date_pay,date_regis,no_petition_staff,no_petition) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$accid."'";
		$strSQL .=",'".$subid."' ";
		$strSQL .=",'".$codetransfer."' ";
		$strSQL .=",'".$amount."' ";
		$strSQL .=",'".$Invoicenumber."' ";
		$strSQL .=",'".$staffid."' ";
		$strSQL .=",'".$type."' ";
		$strSQL .=",'".$date_pay."' ";
		$strSQL .=",'".$date."' ";
		$strSQL .=",'".$no_petition_staff."' ";
		$strSQL .=",'".$noptt."') ";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
		if(!$objQuery){
			echo "Error Save [".mysqli_error()."]";
		}
		
		mysqli_close($con_ajtongmath_self);
		header("location:viewaccount.php?accid=$accid&std=$studentid&studenname=$student");
		}
	
?>