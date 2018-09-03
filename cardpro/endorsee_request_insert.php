<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');

if($_SESSION["accid_cardpro"] == ""){
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('session ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";
}else{
	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid_cardpro"]."'";
	$objQuerySTT = mysql_query($strSTT);
	$objResultSTT = mysql_fetch_array($objQuerySTT);
	
	$type = $_POST["type"];
	$date_request = $_POST["date_request"];
	$subject = trim($_POST["subject"]);
	$request_to = trim($_POST["request_to"]);
	$name = trim($_POST["name"]);
	$tel = trim($_POST["tel"]);
	$wishes = trim($_POST["wishes"]);
	$because = trim($_POST["because"]);
	$course_name = trim($_POST["course_name"]);
	$course_code = trim($_POST["course_code"]);
	$course_price = trim($_POST["course_price"]);
	$course_transfer = $_POST["course_transfer"];
	$course2_name = trim($_POST["course2_name"]);
	$course2_code = trim($_POST["course2_code"]);
	$course2_price = trim($_POST["course2_price"]);
	$accid_user = $_POST["accid_user"];
	date_default_timezone_set('Asia/Bangkok');
	$date_insert = date('Y-m-d H:i:s');
	$branchid = $_POST["branchid"];
	$resultsa = $_POST["results"];
	
	
	if($_GET["ac"]=="add"){
		$oq_id_addterm = mysql_query("SELECT MAX(id_year) FROM addterm");
		$or_id_addterm = mysql_fetch_array($oq_id_addterm);
		$id_addterm = $or_id_addterm['id_year'];
		//$id_addterm = 1;
		
		$sql = "INSERT INTO ptt_request (";
		$sql .= "id_addterm";
		$sql .= ", type";
		$sql .= ", date_request";
		$sql .= ", subject";
		$sql .= ", request_to";
		$sql .= ", name";
		$sql .= ", tel";
		$sql .= ", wishes";
		$sql .= ", because";
		$sql .= ", course_name";
		$sql .= ", course_code";
		$sql .= ", course_price";
		$sql .= ", course_transfer";
		$sql .= ", course2_name";
		$sql .= ", course2_code";
		$sql .= ", course2_price";
		$sql .= ", accid_user";
		$sql .= ", date_insert";
		$sql .= ", branchid";
		$sql .= ") values (";
		$sql .= "'$id_addterm'";
		$sql .= "' ,$type'";
		$sql .= ", '$date_request'";
		$sql .= ", '$subject'";
		$sql .= ", '$request_to'";
		$sql .= ", '$name'";
		$sql .= ", '$tel'";
		$sql .= ", '$wishes'";
		$sql .= ", '$because'";
		$sql .= ", '$course_name'";
		$sql .= ", '$course_code'";
		$sql .= ", '$course_price'";
		$sql .= ", '$course_transfer'";
		$sql .= ", '$course2_name'";
		$sql .= ", '$course2_code'";
		$sql .= ", '$course2_price'";
		$sql .= ", '$accid_user'";
		$sql .= ", '$date_insert'";
		$sql .= ", '$branchid'";
		$sql .= ")"; 
		$dbquery = mysql_db_query($dbname, $sql);
		
		echo "<script language='javascript'>alert('   บันทึกเสร็จสิ้น!!');</script>";
		$str_all = " SELECT * FROM  `ptt_request` ORDER BY  `id` DESC ";
		$objQuery_all = mysql_query($str_all);
		$objResult_all = mysql_fetch_array($objQuery_all);
		$id = $objResult_all["id"];
		echo "<script>window.location='endorsee_request_details.php?id=$id';</script>";
	
	}else if($_GET["ac"]=="edit"){
		$strSQL_edit = "UPDATE ptt_request SET ";
		$strSQL_edit .="date_request = '".$date_request."' ";
		$strSQL_edit .=",subject = '".$subject."' ";
		$strSQL_edit .=",request_to = '".$request_to."' ";
		$strSQL_edit .=",name = '".$name."' ";
		$strSQL_edit .=",tel = '".$tel."' ";
		$strSQL_edit .=",wishes = '".$wishes."' ";
		$strSQL_edit .=",because = '".$because."' ";
		$strSQL_edit .=",course_name = '".$course_name."' ";
		$strSQL_edit .=",course_code = '".$course_code."' ";
		$strSQL_edit .=",course_price = '".$course_price."' ";
		$strSQL_edit .=",course_transfer = '".$course_transfer."' ";
		$strSQL_edit .=",course2_name = '".$course2_name."' ";
		$strSQL_edit .=",course2_code = '".$course2_code."' ";
		$strSQL_edit .=",course2_price = '".$course2_price."' ";
		$strSQL_edit .=",accid_user = '".$accid_user."' ";
		$strSQL_edit .=",date_insert = '".$date_insert."' ";
		$strSQL_edit .=",branchid = '".$branchid."' ";
		$strSQL_edit .="WHERE id = '".$_GET["id"]."' ";
		$objQuery_edit = mysql_query($strSQL_edit);
		
		echo "<script language='javascript'>alert('   บันทึกการแก้ไขเสร็จสิ้น!!');</script>";
	
	}else if($_GET["ac"]=="del"){
		$strSQL_del = "DELETE FROM ptt_request ";
		$strSQL_del .="WHERE id = '".$_GET["id"]."' ";
		$objQuery_del = mysql_query($strSQL_del);
		
		echo "<script language='javascript'>alert('   การลบเสร็จสิ้น!!');</script>";
		echo "<script>window.location='endorsee_home.php';</script>";
	
	}else if($_GET["ac"]=="approval"){
		$approval = $_POST["approval"];
		$because_not_approval = trim($_POST["because_not_approval"]);
		$accid_endorsee = $objResultSTT["accid"];
		$date_approval = date('Y-m-d H:i:s');
		$money_pay = trim($_POST["money_pay"]);
		$money_repay = trim($_POST["money_repay"]);
		$money_fee = trim($_POST["money_fee"]);
		$money_balance = trim($_POST["money_balance"]);
		$type_pay = $_POST["type_pay"];
		if($approval == "1" && $type_pay != "free"){
			$status = "2";
		}else if($approval == "0"){
			$status = "3";
		}else if($approval == "1" && $type_pay == "free"){
			$status = "6";
		}
		
		$strSQL_apove = "UPDATE ptt_request SET ";
		$strSQL_apove .="approval = '".$approval."' ";
		$strSQL_apove .=",because_not_approval = '".$because_not_approval."' ";
		$strSQL_apove .=",accid_endorsee = '".$accid_endorsee."' ";
		$strSQL_apove .=",date_approval = '".$date_approval."' ";
		$strSQL_apove .=",money_pay = '".$money_pay."' ";
		$strSQL_apove .=",money_repay = '".$money_repay."' ";
		$strSQL_apove .=",money_fee = '".$money_fee."' ";
		$strSQL_apove .=",money_balance = '".$money_balance."' ";
		$strSQL_apove .=",status = '".$status."' ";
		$strSQL_apove .=",type_pay = '".$type_pay."' ";
		$strSQL_apove .="WHERE id = '".$_GET["id"]."' ";
		$objQuery_apove = mysql_query($strSQL_apove);
		
		$id = $_GET["id"];
		echo "<script language='javascript'>alert('   บันทึกเสร็จสิ้น!!');</script>";
		echo "<script>window.location='endorsee_request_details.php?id=$id';</script>";
		
	}else if($_GET["ac"]=="money"){
		$date_money = $_POST["date_money"];
		$accid_user_money = $_POST["accid_user_money"];
		$num_pay = $_POST["num_pay"];
		
		
		
		$objQuery_Req = mysql_query("SELECT * FROM ptt_request WHERE id = '".$_GET["id"]."'");
		$objResult_Req = mysql_fetch_array($objQuery_Req);
		
		if($objResult_Req["type_pay"]=="free"){
			$type_pay = "free";
			$status = 4;
			$money_balance = 0;
		}
		else{
			$type_pay = $_POST["type_pay"];
			$status = 4;
			if($objResult_Req["money_pay"]>0){
				$money_balance = $objResult_Req["money_pay"] + $objResult_Req["money_fee"]; //money_balance = คงเหลือ
			}else if($objResult_Req["money_repay"]>0){
				$money_balance = ($objResult_Req["money_repay"] - $objResult_Req["money_fee"]) * -1;  
			}else{
				$money_balance = $objResult_Req["money_fee"];  
			}
		}
		
		$strSQL_money = "UPDATE ptt_request SET ";
		$strSQL_money .="date_money = '".$date_money."' ";
		$strSQL_money .=",money_balance = '".$money_balance."' ";
		$strSQL_money .=",type_pay = '".$type_pay."' ";
		$strSQL_money .=",num_pay = '".$num_pay."' ";///////////////////////////////////////////////////////////////////
		$strSQL_money .=",accid_user_money = '".$accid_user_money."' ";
		$strSQL_money .=",status = '".$status."' ";
		$strSQL_money .="WHERE id = '".$_GET["id"]."' ";
		$objQuery_money = mysql_query($strSQL_money);
		if (!$objQuery_money)
		  {
		  die('Could not connect: ' . mysql_error().$strSQL_money);
		  }
		echo "<script language='javascript'>alert('บันทึกเสร็จสิ้น!!');</script>";
		$id = $_GET["id"];
		echo "<script>window.location='endorsee_request_details.php?id=$id';</script>";
	
	}else if($_GET["ac"]=="final"){
		$accid_payer = $_POST["accid_payer"];
		$status = 5;
		
		$strSQL_money = "UPDATE ptt_request SET ";
		$strSQL_money .="accid_payer = '".$accid_payer."' ";
		$strSQL_money .=",results = '".$resultsa."' ";
		$strSQL_money .=",status = '".$status."' ";
		$strSQL_money .="WHERE id = '".$_GET["id"]."' ";
		$objQuery_money = mysql_query($strSQL_money);
		
		echo "<script language='javascript'>alert('   บันทึกเสร็จสิ้น!!');</script>";
		$id = $_GET["id"];
		echo "<script>window.location='endorsee_request_details.php?id=$id';</script>";
	
	}
	
	$id = $_GET["id"];
	echo "<script>window.location='endorsee_request_details.php?id=$id';</script>";
	
}?>
<?php mysql_close();?>