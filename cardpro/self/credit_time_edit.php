<? 
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
ob_start();

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate));
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
	
	function DateDiff($strDate1,$strDate2)
	{
		return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	}
	$today = date("Y-m-d");
	
	$studentname = $_GET["studenname"];
	$accid = $_GET["accid"];
	$creditid = $_GET["creditid"];
	
	$objQuery_credit = mysql_query("SELECT * FROM credit WHERE creditid = '".$_GET["creditid"]."'");
	$objResult_credit = mysql_fetch_array($objQuery_credit);
	
	$objQuery_account = mysql_query("SELECT * FROM account WHERE accid = '".$_GET["accid"]."'");
	$objResult_account = mysql_fetch_array($objQuery_account);
	if($_GET["action"]=="addtime"){
		if($objResult_credit["events_add_time"]=="0"){
			
			$diffday = DateDiff($today,$objResult_account["edate"]);
			if($diffday>=0){$OleDate = $objResult_account["edate"];}
			else{$OleDate = $today;}
			
			$NewDate = date ("Y-m-d", strtotime("+14 days", strtotime($OleDate)));
			$showDate = DateThai($NewDate);
			
			$strSQL = "UPDATE account SET ";
			$strSQL .="edate = '".$NewDate."' ";
			$strSQL .="WHERE accid = '".$accid."' ";
			$objQuery = mysql_query($strSQL);
			
			$strSQL2 = "UPDATE credit SET ";
			$strSQL2 .="events_add_time = '1' ";
			$strSQL2 .="WHERE creditid = '".$creditid."' ";
			$objQuery2 = mysql_query($strSQL2);
			
			echo "<script language='javascript'>alert('   ผู้ใช้งานถูกขยายเวลาถึงวันที่ $showDate !!');</script>";
		}
		else{
			echo "<script language='javascript'>alert('   ขออภัย ชื่อผู้ใช้งานนี้ถูกขยายเวลาแล้ว!!');</script>";
			echo "<script>window.location='credit_time_search.php?h_arti_id=$studentname';</script>";
		}
	}
	else if($_GET["action"]=="addcredit"){
		if($objResult_credit["events_add_credit"]=="0"){
			$OleCredit = $objResult_account["totalcredit"];
			$OleStCredit = $objResult_account["credit_start"];
			$NewCredit = $OleCredit + 8;
			$NewStCredit = $OleStCredit + 8;
			
			$strSQL = "UPDATE account SET ";
			$strSQL .="totalcredit = '".$NewCredit."' ";
			$strSQL .=",credit_start = '".$NewStCredit."' ";
			$strSQL .="WHERE accid = '".$accid."' ";
			$objQuery = mysql_query($strSQL);
			
			$strSQL2 = "UPDATE credit SET ";
			$strSQL2 .="events_add_credit = '1' ";
			$strSQL2 .="WHERE creditid = '".$creditid."' ";
			$objQuery2 = mysql_query($strSQL2);
			
			echo "<script language='javascript'>alert('   ผู้ใช้งานถูกเพิ่มเคดิตเป็น $NewStCredit เคดิต คงเหลือ $NewCredit เคดิต !!');</script>";
		}
		else{
			echo "<script language='javascript'>alert('   ขออภัย ชื่อผู้ใช้งานนี้ถูกเพิ่มเคดิตแล้ว!!');</script>";
			echo "<script>window.location='credit_time_search.php?h_arti_id=$studentname';</script>";
		}
	}
	
	echo "<script>window.location='credit_time_search.php?h_arti_id=$studentname';</script>";
	?>