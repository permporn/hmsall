<?php  
//include('config/config_db.php');
session_start();
include("ck_session.php");

$params = array();
parse_str($_GET['datas'], $params);

$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
$name = $params['studentname'];
$subject_id = $params['id_couses2'];
$sex = $params['gender'];
//$seat_no = $params['seat2'];
$id_seat = $params['id_seat'];
$tel = $params['phonenumber'];
$pcode = $params['pcode'];
$type_price = $params['type_price'];
$price_input = $params['price'];
$id_staff = $params['id_staff'];
//echo $price_input;
//exit();
if($sex == "female"){
	$status_log_seat = 3;
}else if ($sex == "male"){
	$status_log_seat = 2;
}

$strSQL_seat_log = "SELECT * FROM `seat_log` WHERE `id` = ".$id_seat;
$objQuery_seat_log = mysql_query($strSQL_seat_log) or die ("Error Query [".$strSQL_seat_log."]");
$objResult_seat_log = mysql_fetch_array($objQuery_seat_log);
$seat_no = $objResult_seat_log['seat_no'];


$strSQL_subject = "SELECT * FROM `subject` WHERE `subid` = ".$subject_id;
$objQuery_subject = mysql_query($strSQL_subject) or die ("Error Query [".$strSQL_subject."]");
$objResult_subject = mysql_fetch_array($objQuery_subject);
$subject_code = $objResult_subject['subcode'];
$id_year = $objResult_subject['id_year'];
if($price_input==''){
	$price = $objResult_subject['price'];
}else{
	$price = $price_input;
}


		
		if($name != ''){
		
			//1//check name from student /////////////////////////////////////////////////////////////////////////////////////////////
			$seatnew = 0;
			$strSQL1 = "SELECT * FROM student WHERE studentname = '$name'"; 
			$objQuery_student = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
			$check_student = mysql_num_rows($objQuery_student);
			$objResult_student = mysql_fetch_array($objQuery_student);
			//echo "tel=". $objResult_student['tel'];
			if($tel ==''){
				$tel = $objResult_student['tel'];
			}if($sex ==''){
				$sex = $objResult_student['sex'];
			}if($pcode ==''){
				$pcode = $objResult_student['pcode'];
			}
			if($check_student == 0) {
				//2//insert student /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO student "; 
				$strSQL .="(studentname,tel,DateAddName,sex,pcode) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$name."' ";
				$strSQL .=",'".$tel."' ";
				$strSQL .=",'".$DateAddName."'";
				$strSQL .=",'".$sex."'";
				$strSQL .=",'".$pcode."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){
					echo "fail!!  : $strSQL (save.php)";
				}
			}else{
				//3//update sex /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "UPDATE `student` SET `sex`='".$sex."' ,`tel`='".$tel."' ,`pcode`='".$pcode."' WHERE studentname = '".$name."'"; 
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){
					echo "fail!!  : $strSQL (save.php)";
				}
			}
			$check1 = 0;
			$strSQL2 = "SELECT * FROM student WHERE studentname = '$name'";
			$objQuery_studentname = mysql_query($strSQL2);
			$objResult_studentname = mysql_fetch_array($objQuery_studentname);

			//chek doubly
			$strSQL3 = "SELECT * FROM learn WHERE id_year = '".$id_year."' AND studentid = '".$objResult_studentname['studentid']."' AND subcode = '".$subject_code."'";			
			$objQuery3 = mysql_query($strSQL3);
			while($objResult3 = mysql_fetch_array($objQuery3)){
				$check1++;	
			}
			if($check1 == 0){
				$datenew = date('Y-m-d');
				$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

				//3//insert learn /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO learn "; 
				$strSQL .="(studentid,seat,subcode,type_price,pricek,pass,updateday,regisdate,id_staff,id_year) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$objResult_studentname["studentid"]."' ";
				$strSQL .=",'".$seat_no."' ";
				$strSQL .=",'".$subject_code."' ";
				$strSQL .=",'".$type_price."' ";
				$strSQL .=",'".$price."' ";
				$strSQL .=",'".$random."' ";
				$strSQL .=",'".$datenew."' ";
				$strSQL .=",'".$datenew."' ";
				$strSQL .=",'".$id_staff."' ";
				$strSQL .=",'".$id_year."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery)
				{
					echo "fail!!  : $strSQL (save.php)";
				}
				else{
					$strSQL = "UPDATE `seat_log` SET `status`= '".$status_log_seat."' WHERE id = ".$id_seat; 
					$objQuery = mysql_query($strSQL);
						if(!$objQuery){
							echo "fail!!  : $strSQL (save.php)";
						}else{
							//echo "Success : $strSQL ";
							$datas = array("subject_code" => $subject_code, "subject_id" => $subject_id, "studentid" => $objResult_studentname["studentid"]);
							echo json_encode($datas);
						}
					}
			}else{
				$strSQL = "DELETE FROM `seat_log` WHERE id = ".$id_seat; 
				$objQuery = mysql_query($strSQL);
				
				echo "fail1";//  : มีการจองอยู่แล้ว (save.php)";
			}
		}else{
			echo "fail!!  : ไม่มีชื่อ (save.php)";
		}
?>