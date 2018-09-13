<? 
include("../config.inc.php");
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
	$type_self = $_POST["type_self"];

	// if($subid=="330"){
	// 	$amount = "400";
	// 	$credit = "8";
	// 	$month = "1";
	// }else if($subid=="331"){
	// 	$amount = "700";
	// 	$credit = "16";
	// 	$month = "2";
	// }else if($subid=="332"){
	// 	$amount = "900";
	// 	$credit = "24";
	// 	$month = "3";
	// }

	$strSQL1 = "SELECT subject_real.price, subject.hour 
                FROM subject 
                JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real
                WHERE subject.subid = $subid";
	$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1) or die ("Error Query [".$strSQL1."]");
	//echo $strSQL1;
	$objResult1 = mysqli_fetch_array($objQuery1) ;
	$amount = $objResult1['price'];
	$credit = $objResult1['hour'];

	if($amount=="400"){
		$month = "1";
	}else if($amount=="700"){
		$month = "2";
	}else if($amount=="900"){
		$month = "3";
	}


	$type_pay = $_POST["type_pay"];
	$Invoicenumber = "เพิ่มเครดิต/เวลา-".$_POST["Invoicenumber"];
	$date_regis = date('Y-m-d');
	
	$sql = "INSERT INTO credit (";
	$sql .= "subid";
	$sql .= ", type_self";
	$sql .= ", accid";
	$sql .= ", amount";
	$sql .= ", Invoicenumber";
	$sql .= ", staffid";
	$sql .= ", type_pay";
	$sql .= ", date_pay";
	$sql .= ", date_regis";
	$sql .= ") values (";
	$sql .= "  '$subid'";
	$sql .= ", '$type_self'";
	$sql .= ", '$accid'";
	$sql .= ", '$amount'";
	$sql .= ", '$Invoicenumber'";
	$sql .= ", '$staffid'";
	$sql .= ", '$type_pay'";
	$sql .= ", '$date_regis'";
	$sql .= ", '$date_regis'";
	$sql .= ")"; 
	//echo $subid." ".$type_pay ;
	$dbquery = mysqli_query($con_ajtongmath_self, $sql) or die ("Error Query [".$sql."]");;
	
	/////////////////////////////////////////
	
	$objQuery_account = mysqli_query($con_ajtongmath_self,"SELECT * FROM account WHERE accid = '".$accid."'");
	$objResult_account = mysqli_fetch_array($objQuery_account);
	
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
	
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL)  or die ("Error Query [".$strSQL."]");

	$id_branch = $objResult_account['status'];
	$y = date('Y') + 543;
	$year = substr($y,2,2);
	$date_now = date('Y-m-d H:i:s');
	$h = 4;//จำนวนหลัก
	$type_bill = $type_self;
	//$type_bill = 1;
	if($type_bill == "1"){  // self = s
	    $text_type = "S";
	  }else if($type_bill == "2"){ // receipt = R ใบเสร็จ
	    $text_type = "R";
	  }else if($type_bill == "3"){ // book_store = B 
	    $text_type = "B";
	  }else if($type_bill == "6"){ // extend cradit & date = B 
	    $text_type = "E";
	  }

	$strSQL_branch = "SELECT * FROM branch WHERE branchid ='".$id_branch."'"; 
	$objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
	$objResult_branch = mysqli_fetch_array($objQuery_branch);
	$id_branch_new = $objResult_branch['branch_number'];

	$strSQL_COUNT = "SELECT COUNT(id_bill_all) AS count_bill FROM `bill_number` WHERE type_bill = $type_bill AND year_ = '".$year."'";
	$objQuery_COUNT = mysqli_query($con_ajtongmath_self,$strSQL_COUNT) or die ("Error Query [".$strSQL_COUNT."]");
	$objResult_COUNT = mysqli_fetch_array($objQuery_COUNT);
	$id_bill_all = $objResult_COUNT['count_bill'];
	if($id_bill_all == 0){
		$id_bill_all = 1;
	}else{
		$id_bill_all = $id_bill_all+1;
	}
	$strSQL_COUNT_b = "SELECT COUNT(id_bill_branch) AS count_bill FROM `bill_number` WHERE type_bill = $type_bill AND id_branch = ".$id_branch . " AND year_ = '".$year."'";
	$objQuery_COUNT_b = mysqli_query($con_ajtongmath_self,$strSQL_COUNT_b) or die ("Error Query [".$strSQL_COUNT_b."]");
	$objResult_COUNT_b = mysqli_fetch_array($objQuery_COUNT_b);
	$id_bill_branch = $objResult_COUNT_b['count_bill'];
	if($id_bill_branch == 0){
		$id_bill_branch = 1;
	}else{
		$id_bill_branch = $id_bill_branch+1;
	}
	$no_bill_all = $text_type.$id_branch_new."-".$year.sprintf("%00".$h."d",$id_bill_all);
	$no_bill_branch = $text_type.$id_branch_new."-".$year.sprintf("%00".$h."d",$id_bill_branch);

	$strSQL_insert ="INSERT INTO `bill_number` VALUES ('', $id_bill_all , '$no_bill_all' , $id_bill_branch , '$no_bill_branch' , $type_bill, $id_branch, $year, '$date_now', '', '')";
	$objQuery_insert = mysqli_query($con_ajtongmath_self,$strSQL_insert) or die ("Error Query [".$strSQL_insert."]");
	if(!$objQuery_insert){
		echo "Error insert bill_number [".mysqli_error().$objQuery_insert."]";
	}else{
		// $strSQL_update = "UPDATE account SET"; 
  //       $strSQL_update .=" no_bill_all = '".$no_bill_all."'";
  //       $strSQL_update .=" ,no_bill_branch = '".$no_bill_branch."'";
  //       $strSQL_update .=" WHERE accid = '".$accid."'";
  //       $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update);
  //       if(!$objQuery_update){
  //           echo "error2";
  //       }else{
            //echo "--".$strSQL_update."<br>";

            $strSQL_credit ="SELECT MAX(creditid) as creditid
				FROM  credit 
				WHERE accid = ".$accid . " AND subid = $subid";
			$objQuery_credit = mysqli_query($con_ajtongmath_self,$strSQL_credit) or die ("Error Query [".$strSQL_credit."]");

			//while (
			$objResult_credit = mysqli_fetch_array($objQuery_credit);
			//) {
	            $strSQL_update2 = "UPDATE credit SET"; 
	            $strSQL_update2 .=" no_bill_all = '".$no_bill_all."'";
	            $strSQL_update2 .=" ,no_bill_branch = '".$no_bill_branch."'";
	            $strSQL_update2 .=" WHERE creditid = '".$objResult_credit['creditid'] ."'";
	            $objQuery_update2 = mysqli_query($con_ajtongmath_self,$strSQL_update2);
	            //$num_rows = mysqli_num_rows($objQuery_update2);
	            if(!$objQuery_update2){
	                echo "error3".$strSQL_update2;
	            }else{
	            	//echo "---".$strSQL_update2."<br>";
	            }
        	//}
        //}
	}
			
	echo "<script language='javascript'>alert('บันทึกรายการเสร็จสิ้น !!');</script>";
	echo "<script>window.location='credit_time_search2.php?h_arti_id=$studentname';</script>";
	?>