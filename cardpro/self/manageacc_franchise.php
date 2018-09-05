<?
ob_start();
session_start();
include("../config.inc.php");
include("funtion.php");

$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["mapid"]."'";
	$objQuery99 = mysqli_query($con_ajtongmath_self,$strSQL99);
	$objResult99 = mysqli_fetch_array($objQuery99);
	if($_SESSION["mapid"] == "")
	{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Please Login!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
		exit();
	}
$account=$_POST["account"];
$staffid=$_POST["staffid"];
if($_POST["show_arti_topic_name"] != ''){
	$studentname = $_POST["show_arti_topic_name"];
}else{
	$studentname = $_POST["show_arti_topic_name2"];
}
$sub = $_POST["show_arti_topic_subj"];
$type_pay = $_POST["type_pay"];
$stardate = $_POST["date"];
$status = $_POST["status"];
$status_pro = $_POST["status_pro"];

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
$type_self = $_POST["type_self"];

if($type_self == 4){
	$subid = $_POST["h_arti_id_subj_broadcast"];
}else{
	$subid = $_POST["h_arti_id_subj"];
}

if($subid == ""){
	//if($Invoicenumber == ''){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณากรอกวิชาให้ถูกต้อง');</script>";
	echo "<script language='javascript'>window.history.back();</script>";
	exit();
	//}
}

/*if($objResult99['status'] == 'admin'){
	$enddate = DateYMD($_POST["edate"]);
	//$enddate = DateYMD($enddate);
}
else{*/
	if($_POST["edate"]=="1"){
		$enddate = date('Y-m-d', strtotime("+3 months", strtotime($stardate)));
	}else if($_POST["edate"]=="2"){
		$enddate = date('Y-m-d', strtotime("+6 months", strtotime($stardate)));
	}else if($_POST["edate"]=="3"){
		$enddate = date('Y-m-d', strtotime("+1 years", strtotime($stardate)));
	}else if($_POST["edate"]=="4"){
		$enddate = date('Y-m-d', strtotime("+6 months", strtotime($stardate)));
		$enddate = date('Y-m-d', strtotime("+1 years", strtotime($enddate)));
	}else if($_POST["edate"]=="5"){
		$enddate = date('Y-m-d', strtotime("+2 years", strtotime($stardate)));
	}else if($_POST["edate"]=="0"){
		$enddate = date('2015-02-28');
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
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	
	if($objResult){echo "Account already exist";}
	else{
		$strSQL1 = "SELECT * FROM student WHERE name = '".$studentname."' ";
		$objQuery1 = mysqli_query($con_ajtongmath_self,$strSQL1);
		$objResult1 = mysqli_fetch_array($objQuery1);
		$student = $objResult1["studentid"];
		
		
		// $strSQL2 = "SELECT * FROM subject WHERE subname = '".$sub."' ";
		// $objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2);
		// $objResult2 = mysqli_fetch_array($objQuery2);
		// $subid = $objResult2["subid"];
		
		$strSQL7 = "SELECT * FROM subject WHERE subid = '".$subid."' ";
		$objQuery7 = mysqli_query($con_ajtongmath_self,$strSQL7);
		$objResult7 = mysqli_fetch_array($objQuery7);
		$totalcredit = $objResult7["hour"];
		$s=1;
		
		$strSQL9 = "INSERT INTO account ";
		$strSQL9 .="(studentid,username,password,state,sdate,edate,totalcredit,credit_start,status,status_pro,staffid,no_petition,no_petition_staff) ";
		$strSQL9 .="VALUES ";
		$strSQL9 .="('".$student."','".$account."'";
		$strSQL9 .=",'".$_POST["password"]."','1'";
		$strSQL9 .=",'".$stardate."','".$enddate."'";
		$strSQL9 .=",'".$totalcredit."','".$totalcredit."','".$status."','".$status_pro."','".$staffid."','".$no_petition."','".$no_petition_staff."') ";
		$objQuery9 = mysqli_query($con_ajtongmath_self,$strSQL9);
		
		if(!$objQuery9){
			echo "Error Save1 [".mysqli_error().$strSQL9."]";
		}
		else{
			$strSQL4 = "SELECT * FROM account WHERE username = '".$account."' ";
			$objQuery4 = mysqli_query($con_ajtongmath_self,$strSQL4);
			$objResult4 = mysqli_fetch_array($objQuery4);
			$accid = $objResult4["accid"];
			
			$strSQL3 = "INSERT INTO credit ";
			$strSQL3 .="(accid,subid,type_self,codetransfer,amount,Invoicenumber,staffid,no_petition_staff,no_petition,type_pay,date_pay,date_regis,book_status,book_num,book_detail,book_store_status,book_staffid) ";
			$strSQL3 .="VALUES ";
			$strSQL3 .="('".$accid."'";
			$strSQL3 .=",'".$subid."' ";
			$strSQL3 .=",'".$type_self."' ";
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
			$strSQL3 .=", '1'";
			$strSQL3 .=",'".$book_staffid."' )";
			$objQuery3 = mysqli_query($con_ajtongmath_self,$strSQL3);
			if(!$objQuery3){echo "Error Save2 [".mysqli_error().$strSQL3."]";}
			else{

			$strSQL_subject = "SELECT * 
								FROM  `book_information` 
								LEFT JOIN subject ON subject.subid = book_information.id_subject
								WHERE  book_information.`id_subject` = '".$subid."' AND book_information.status = 1 AND subject.status_branch_hms = 1";
			$OQ_subject = mysqli_query($con_ajtongmath_self,$strSQL_subject);
			echo $OQ_subject;
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('หนังสือไม่มีใน store');</script>";

			while ($OR_subject = mysqli_fetch_array($OQ_subject)){
				//echo "----------------".$OR_subject['id'];

				$strSQL_book = "SELECT *
							FROM
							book_store
							WHERE book_store.id_book = '".$OR_subject['id']."' AND book_store.id_branch='".$status."'";
					
				$OQ_allid = mysqli_query($con_ajtongmath_self,$strSQL_book);
				$num_rows = mysqli_num_rows($OQ_allid);
				
				// หักยอดหนังสือ
				if($num_rows == 0){
						$qty = -1;
						$strSQL3 = "INSERT INTO book_store ";
						$strSQL3 .="(id_book, qty, id_branch, create_date) ";
						$strSQL3 .="VALUES ";
						$strSQL3 .="('".$OR_subject['id']."'";
						$strSQL3 .=",'".$qty."' ";
						$strSQL3 .=",'".$status."' ";
						$strSQL3 .=",'".$date."' )";
						$objQuery_insert = mysqli_query($con_ajtongmath_self,$strSQL3) or die ("Error Query [".$strSQL3."]");
						if(!$objQuery_insert){
							echo "Error insert book_store [".mysqli_error().$objQuery_insert."]";
						}else{
							//echo "insert success full";
							echo "------new-------".$strSQL3;
							echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
							echo "<script language='javascript'>alert('หนังสือไม่มีใน store');</script>";
						}
					//}	
				}else{	
					while ($OR_allid = mysqli_fetch_array($OQ_allid)){
						$newPoint 	 = $OR_allid['qty'] - 1;
						$str_uppoint = "UPDATE book_store SET ";
						$str_uppoint .="qty = '".$newPoint."' ";
						$str_uppoint .=",modify_date = '".date('Y-m-d H:i')."' ";
						$str_uppoint .=" WHERE id_book = '".$OR_allid['id_book']."' AND id_branch = '".$status."'";
						$OQ_uppoint = mysqli_query($con_ajtongmath_self,$str_uppoint);
						echo "------update-------".$str_uppoint;
						echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
						echo "<script language='javascript'>alert('ถูกลบหนังสือใน store แล้ว');</script>";
					}
				}
			}
            
            // insert table bill_number
			$id_branch = $status; 
			//if($id_branch == 37){
				  
				$y = date('Y') + 543;
				$year = substr($y,2,2);
				$date_now = date('Y-m-d H:i:s');
				$h = 3;//จำนวนหลัก
				$type_bill = 1;
				if($type_bill == "1"){  // self = s
				    $text_type = "S";
				  }else if($type_bill == "2"){ // receipt = R ใบเสร็จ
				    $text_type = "R";
				  }else if($type_bill == "3"){ // book_store = B 
				    $text_type = "B";
				  }

				$strSQL_branch = "SELECT * FROM branch WHERE branchid ='".$id_branch."'"; 
				$objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
				$objResult_branch = mysqli_fetch_array($objQuery_branch);
				$id_branch_new = $objResult_branch['branch_number'];

				$strSQL_COUNT = "SELECT COUNT(id_bill_all) AS count_bill FROM `bill_number` WHERE type_bill = 1 AND year_ = '".$year."'";
				$objQuery_COUNT = mysqli_query($con_ajtongmath_self,$strSQL_COUNT) or die ("Error Query [".$strSQL_COUNT."]");
				$objResult_COUNT = mysqli_fetch_array($objQuery_COUNT);
				$id_bill_all = $objResult_COUNT['count_bill'];
				if($id_bill_all == 0){
					$id_bill_all = 1;
				}else{
					$id_bill_all = $id_bill_all+1;
				}
				$strSQL_COUNT_b = "SELECT COUNT(id_bill_branch) AS count_bill FROM `bill_number` WHERE type_bill = 1 AND id_branch = ".$id_branch . " AND year_ = '".$year."'";
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
					$strSQL_update = "UPDATE account SET"; 
		            $strSQL_update .=" no_bill_all = '".$no_bill_all."'";
		            $strSQL_update .=" ,no_bill_branch = '".$no_bill_branch."'";
		            $strSQL_update .=" WHERE accid = '".$accid."'";
		            $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update);
		            if(!$objQuery_update){
		                echo "error2";
		            }else{
		                //echo "--".$strSQL_update."<br>";

		                $strSQL_credit ="SELECT *
							FROM  credit 
							WHERE accid = ".$accid;
						$objQuery_credit = mysqli_query($con_ajtongmath_self,$strSQL_credit) or die ("Error Query [".$strSQL_credit."]");

						while ($objResult_credit = mysqli_fetch_array($objQuery_credit)) {
				            $strSQL_update2 = "UPDATE credit SET"; 
				            $strSQL_update2 .=" no_bill_all = '".$no_bill_all."'";
				            $strSQL_update2 .=" ,no_bill_branch = '".$no_bill_branch."'";
				            $strSQL_update2 .=" WHERE creditid = '".$objResult_credit['creditid'] ."'";
				            $objQuery_update2 = mysqli_query($con_ajtongmath_self,$strSQL_update2);
				            if(!$objQuery_update){
				                echo "error3";
				            }else{
				            	//echo "---".$strSQL_update2."<br>";
				            }
			        	}
		            }
				}
			//}
			header("location:viewaccount.php?accid=$accid&studenname=$studentname&type_pay=$type_pay&std=$student");
			}
		}
	}
		
?>