<?php
session_start();
include("../config.inc.php");
error_reporting(~E_NOTICE);

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
$staffid = $_POST["staffid"];
$studenname=$_POST["studenname"];
//$sub = $_POST["h_arti_id_subj"];
$type_self = $_POST["type_self"];

if($type_self == 4){
	$sub = $_POST["h_arti_id_subj_broadcast"];
}else{
	$sub = $_POST["h_arti_id_subj"];
}

if($sub == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณากรอกวิชาให้ถูกต้อง');</script>";
	echo "<script language='javascript'>window.history.back();</script>";
	exit();
}

$type_pay = $_POST["type_pay"];
$Invoicenumber = $_POST["Invoicenumber"];
$amount = $_POST["amount"];
$codetransfer = $_POST["codetransfer"];
$date = date('y-m-d');
$chk = $_POST["chk"];
$accid = $_GET["accid"];
$creditid = $_GET["creditid"];
$no_petition = $_POST["noptt"];
$date_pay = $_POST["date_pay"];

if($date_pay == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณากรอกวันที่โอนให้ถูกต้อง');</script>";
	echo "<script language='javascript'>window.history.back();</script>";
	exit();
}

$no_petition_staff = $_POST["no_petition_staff"];
if($no_petition_staff == 0){
	$no_petition_staff == null;
}

if($_GET['id_hms']!==''){$check_pointhms = '1';}

$strSQL8 = "SELECT * FROM account WHERE accid = '".$accid."'";
$objQuery8 = mysqli_query($con_ajtongmath_self,$strSQL8) or die ("Error Query [".$strSQL8."]");
$objResult8 = mysqli_fetch_array($objQuery8);
$studentid8 = $objResult8['studentid'];
$username8 = $objResult8['username'];
$status = $objResult8['status'];
$no_bill_all = $objResult8['no_bill_all'];
$no_bill_branch = $objResult8['no_bill_branch'];
$id_bill_all = substr($objResult8['no_bill_all'],5,3);
$id_bill_branch = substr($objResult8['no_bill_branch'],5,3);
// echo "no_bill_all".$no_bill_all ;
// exit();

$std = $_GET['std'];

$typeaccbt  = substr($username8,0,2);
	
if($_GET["type"] == 'editall' ){	
		if($type_pay == "transfer" or $type_pay == "cradit"  && $objResult99['status'] != 'admin'){
			if($Invoicenumber == ''){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('กรุณากรอกหมายเลขใบชำระเงิน');</script>";
			echo "<script language='javascript'>window.history.back();</script>";
			exit();
			}
		}
		$strSQL = "UPDATE credit SET ";
		$strSQL .= "date_pay = '".$date_pay."' ";
		$strSQL .= ",type_pay = '".$type_pay."' ";
		$strSQL .= ",codetransfer = '".$codetransfer."' ";
		$strSQL .= ",Invoicenumber = '".$Invoicenumber."' ";
		$strSQL .= ",amount = '".$amount."' ";
		$strSQL .= ",staffid = '".$staffid."' ";
		$strSQL .= ",no_petition = '".$no_petition."' ";
		$strSQL .= ",no_petition_staff = '".$no_petition_staff."' ";
		$strSQL .= "WHERE creditid = '".$creditid."' ";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
		if($objQuery){
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('แก้ไขเรียบร้อย');</script>";
			echo "<script language='javascript'>window.location='viewaccount.php?std=$std&accid=$accid&studenname=$studenname';</script>";}
			
		//echo $strSQL;
		//header("location:addsubject.php?type=editall&creditid=$creditid");
}
if($_GET["type"] == 'Add' ){	
	if($type_pay == "transfer" or $type_pay == "cradit"  && $objResult99['status'] != 'admin'){
		if($Invoicenumber == ''){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('กรุณากรอกหมายเลขใบชำระเงิน');</script>";
		echo "<script language='javascript'>window.history.back();</script>";
		exit();
		}
	}
	$check=0;
	$strSQL2 = "SELECT * FROM subject WHERE subid = '".$sub."' ";
	$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2);
	$objResult2 = mysqli_fetch_array($objQuery2);
	$subid = $objResult2["subid"];
	$c1 = $objResult2["hour"];
	
	$strSQL111 = "SELECT * FROM account WHERE accid = '".$accid."' ";
	$objQuery111 = mysqli_query($con_ajtongmath_self,$strSQL111);
	$objResult111 = mysqli_fetch_array($objQuery111);
	$studentid = $objResult111['studentid'];

	$strSQL9 = "SELECT * FROM credit WHERE accid = '".$accid."' AND subid = '".$subid."'";
	$objQuery9 = mysqli_query($con_ajtongmath_self,$strSQL9);
	while($objResult9 = mysqli_fetch_array($objQuery9)){
		if($objResult9["accid"]==$accid&&$objResult9["subid"]==$subid){$check++;}
		}

	if($check>0){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('เพิ่ม วิชาซ้ำ!!');</script>";
		echo "<script language='javascript'>window.location='viewaccount.php?std=$studentid8&accid=$accid&studenname=$studenname';</script>";}
	else{
		
		$strSQL3 = "INSERT INTO credit ";
		$strSQL3 .="(accid,subid,type_self,codetransfer,amount,Invoicenumber,staffid,no_petition,no_petition_staff,type_pay,date_pay,date_regis,check_pointhms) ";
		$strSQL3 .="VALUES ";
		$strSQL3 .="('".$accid."'";
		$strSQL3 .=",'".$subid."' ";
		$strSQL3 .=",'".$type_self."' ";
		$strSQL3 .=",'".$codetransfer."' ";
		$strSQL3 .=",'".$amount."'";
		$strSQL3 .=",'".$Invoicenumber."'";		
		$strSQL3 .=",'".$staffid."'";
		$strSQL3 .=",'".$no_petition."'";
		$strSQL3 .=",'".$no_petition_staff."'";
		$strSQL3 .=",'".$type_pay."'";
		$strSQL3 .=",'".$date_pay."'";
		$strSQL3 .=",'".$date."'";
		$strSQL3 .=",'".$check_pointhms."' )";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL3);

		if(!$objQuery){echo "Error Save2 [".$strSQL3."]";}
		else{

			$strSQL_subject = "SELECT * 
								FROM  `book_information` 
								WHERE  `id_subject` = '".$subid."' AND status = 1";
			$OQ_subject = mysqli_query($con_ajtongmath_self,$strSQL_subject);
			
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
							echo "Error insert book_store [".mysqli_error($con_ajtongmath_self).$objQuery_insert."]";
						}else{
							//echo "insert success full";
							echo "------new-------".$strSQL3;
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
					}
				}
			}
		}
            
		
		$strSQL4 = "SELECT * FROM account WHERE accid = '".$accid."' ";
		$objQuery4 = mysqli_query($con_ajtongmath_self,$strSQL4);
		$objResult4 = mysqli_fetch_array($objQuery4);
		$credit1 = $objResult4["totalcredit"];
		$credit = $credit1 + $c1;
		
		if($typeaccbt == "BT" || $typeaccbt == "te"){	
		}
		else{
			$strSQL = "UPDATE account SET ";
			$strSQL .= "totalcredit = '".$credit."' ";
			$strSQL .= ",credit_start = '".$credit."' ";
			$strSQL .= "WHERE accid = '".$accid."' ";
			$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
		}
		// insert table bill_number
			$id_branch = $status; 
			if($id_branch == 37){
				$y = date('Y') + 543;
				$year = substr($y,2,2);
				$date_now = date('Y-m-d H:i:s');
				$h = 3;//จำนวนหลัก
				$type_bill = 1;

				//** s_comment **//
				// ## ใช้ no_bill_all & no_bill_branch จาก account ที่สร้างขึ้น
				// $strSQL_COUNT = "SELECT COUNT(id_bill_all) AS count_bill FROM `bill_number` WHERE type_bill = 1";
				// $objQuery_COUNT = mysqli_query($con_ajtongmath_self,$strSQL_COUNT) or die ("Error Query [".$strSQL_COUNT."]");
				// $objResult_COUNT = mysqli_fetch_array($objQuery_COUNT);
				// $id_bill_all = $objResult_COUNT['count_bill'];
				// if($id_bill_all == 0){
				// 	$id_bill_all = 1;
				// }else{
				// 	$id_bill_all = $id_bill_all+1;
				// }
				// $strSQL_COUNT_b = "SELECT COUNT(id_bill_branch) AS count_bill FROM `bill_number` WHERE type_bill = 1 AND id_branch = ".$id_branch;
				// $objQuery_COUNT_b = mysqli_query($con_ajtongmath_self,$strSQL_COUNT_b) or die ("Error Query [".$strSQL_COUNT_b."]");
				// $objResult_COUNT_b = mysqli_fetch_array($objQuery_COUNT_b);
				// $id_bill_branch = $objResult_COUNT_b['count_bill'];
				// if($id_bill_branch == 0){
				// 	$id_bill_branch = 1;
				// }else{
				// 	$id_bill_branch = $id_bill_branch+1;
				// }
				// $no_bill_all = $id_branch."-".$year.sprintf("%00".$h."d",$id_bill_all);
				// $no_bill_branch = $id_branch."-".$year.sprintf("%00".$h."d",$id_bill_branch);

				//ไม่ต้อง insert bill_number แล้ว เพราะใช้ตัวเดียวกับ account เดิม
				// $strSQL_insert ="INSERT INTO `bill_number` VALUES ('', $id_bill_all , '$no_bill_all' , $id_bill_branch , '$no_bill_branch' , $type_bill, $id_branch, $year, '$date_now', '', '')";
				// $objQuery_insert = mysqli_query($con_ajtongmath_self,$strSQL_insert) or die ("Error Query [".$strSQL_insert."]");
				// if(!$objQuery_insert){
				// 	echo "Error insert bill_number [".mysqli_error().$objQuery_insert."]";
				// }else{
					// $strSQL_update = "UPDATE account SET"; 
		   //          $strSQL_update .=" no_bill_all = '".$no_bill_all."'";
		   //          $strSQL_update .=" ,no_bill_branch = '".$no_bill_branch."'";
		   //          $strSQL_update .=" WHERE accid = '".$accid."'";
		   //          $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update);
		   //          if(!$objQuery_update){
		   //              echo "error2";
		   //          }else{
		                //echo "--".$strSQL_update."<br>";
						//** e_comment
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
				            if(!$objQuery_update2){
				                echo "error3";
				            }else{
				            	//echo "---".$strSQL_update2."<br>";
				            }
			        	}
		           // }
				//}
			}

		//** s_comment **//
		// $dbserver2 = '10.10.11.14:3306';
		// $dbuser2 = "AizeRo2" ; 
		// $dbpass2 = "076424746";
		// $dbname2 = 'school';
		
		// $dbserver2 = 'localhost';
		// $dbuser2 = "root" ; 
		// $dbpass2 = "1234";
		// $dbname2 = 'school';
		
		// mysqli_connect($dbserver2, $dbuser2, $dbpass2) or die("เชื่อมต่อฐานข้อมูลไม่ได้ ");
		// mysqli_select_db($dbname2) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
		// mysqli_query($con_ajtongmath_self,"SET NAMES UTF8");
		// mysqli_query($con_ajtongmath_self,"set character set utf8");
		//** e_comment **//

		$OQ_allid = mysqli_query($con_ajtongmath_scho,"SELECT * FROM hms_allstudent WHERE selfdb_studentid = '".$studentid8."'");
		$OR_allid = mysqli_fetch_array($OQ_allid);
		if(empty($OR_allid)){
		}else{	
			$STR_hmscard = "SELECT * FROM hms_card WHERE id_allstudent = '".$OR_allid['id']."' AND ( status = '1' OR status = '2' )";
			$OQ_hmscard = mysqli_query($con_ajtongmath_scho,$STR_hmscard);
			$OR_hmscard = mysqli_fetch_array($OQ_hmscard);
			//echo $STR_hmscard;
			$newPoint = $OR_hmscard['point'] + 1;
			$str_uppoint = "UPDATE hms_card SET ";
			$str_uppoint .="point = '".$newPoint."' ";
			$str_uppoint .="WHERE id_hms = '".$OR_hmscard['id_hms']."' ";
			$OQ_uppoint = mysqli_query($con_ajtongmath_self,$str_uppoint);
			
			$id_hms = $OR_allid['id'];
		}
		
		header("location:viewaccount.php?accid=$accid&studenname=$studenname&std=$studentid8&typeaccbt=$typeaccbt&id_hms=$id_hms");
	}
}
?>