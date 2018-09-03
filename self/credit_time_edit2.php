<? 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
ob_start();
	
	function DateDiff($strDate1,$strDate2)
	{
		return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	}
	$today = date("Y-m-d");

	$studentname = $_POST["studenname"];
	$accid = $_POST["accid"];
	$staffid = $_POST["staffid"];
	$subid = $_POST["subid"];
	if($subid=="330"){
		$amount = "400";
		$credit = "8";
		$month = "1";
	}else if($subid=="331"){
		$amount = "700";
		$credit = "16";
		$month = "2";
	}else if($subid=="332"){
		$amount = "900";
		$credit = "24";
		$month = "3";
	}
	$type_pay = $_POST["type_pay"];
	$Invoicenumber = $_POST["Invoicenumber"];
	$date_regis = date('Y-m-d');
	
	$sql = "INSERT INTO credit (";
	$sql .= "subid";
	$sql .= ", accid";
	$sql .= ", amount";
	$sql .= ", Invoicenumber";
	$sql .= ", staffid";
	$sql .= ", type_pay";
	$sql .= ", date_regis";
	$sql .= ") values (";
	$sql .= "'$subid'";
	$sql .= ", '$accid'";
	$sql .= ", '$amount'";
	$sql .= ", '$Invoicenumber'";
	$sql .= ", '$staffid'";
	$sql .= ", '$type_pay'";
	$sql .= ", '$date_regis'";
	$sql .= ")"; 
	//echo $subid." ".$type_pay ;
	$dbquery = mysql_db_query($dbname, $sql);
	
	/////////////////////////////////////////
	
	$objQuery_account = mysql_query("SELECT * FROM account WHERE accid = '".$accid."'");
	$objResult_account = mysql_fetch_array($objQuery_account);
	
	$diffday = DateDiff($today,$objResult_account["edate"]);
	if($diffday>=0){$OleDate = $objResult_account["edate"];}
	else{$OleDate = $today;}
	$NewDate = date ("Y-m-d", strtotime("+$month months", strtotime($OleDate)));
			
	$Ole_totalcredit = $objResult_account["totalcredit"];
	$New_totalcredit = $objResult_account["totalcredit"] + $credit;
			
	$Ole_credit_start = $objResult_account["credit_start"];
	$New_credit_start = $objResult_account["credit_start"] + $credit;
			
	$strSQL = "UPDATE account SET ";
	$strSQL .="edate = '".$NewDate."' ";
	$strSQL .=",totalcredit = '".$New_totalcredit."' ";
	$strSQL .=",credit_start = '".$New_credit_start."' ";
	$strSQL .="WHERE accid = '".$accid."' ";
	
	$objQuery = mysql_query($strSQL);
			
	echo "<script language='javascript'>alert('   บันทึกรายการเสร็จสิ้น !!');</script>";
	echo "<script>window.location='credit_time_search2.php?h_arti_id=$studentname';</script>";
	?>