<?php
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
include ('config.inc.php');

$check1=0;
$check2=0;
$s=date('Y-m-d');	

	$name = $_GET['show_arti_topic'];//ชื่อนักเรียน
	$idname1 = $_GET['h_arti_id1'];
	$idname2 = $_GET['h_arti_id2'];
	$id = $idname2.$idname1; //ไอดีนักเรียน
	
	$namevideo = $_GET['show_arti_topic_subj']; //ชื่อวิชา
	$idvideo = $_GET['id_subj'];//ไอดีวิชา
	$ex_date = $_GET['ex_date'];//วันหมดอายุ
	$id_year = $_GET['id_year'];
	$pass = $_GET['pass'];
	// echo $ex_date ;
	$TypePay = $_GET['TypePay'];//วันหมดอายุ
	$ID_Price = $_GET['ID_Price'];
	$Price = $_GET['Price'];
	$staff = $_SESSION["accid"];
	
	$strSQL_subj_video = "SELECT * FROM path_video JOIN subj_video ON path_video.subcode = subj_video.id_subj_video
							WHERE subcode = '".$idvideo."'";
    $objQuery_subj_video = mysql_query($strSQL_subj_video) or die ("Error Query [".$strSQL_subj_video."]");
	//echo $strSQL_subj_video;
	//ได้ไอดีวีดีโอทั้งหมด
	while($objResult_subj_video = mysql_fetch_array($objQuery_subj_video)){
		$id_year2 = $objResult_subj_video['id_year_subj'];
		//echo "<br>".$id_year2;
		//เข็คซ้ำใน map video
		$strSQL_map_video = "SELECT * FROM map_video WHERE studentid = '".$id."' AND id_ref_video = '".$objResult_subj_video['id_ref_video']."'"; 
		$objQuery_map_video = mysql_query($strSQL_map_video) or die ("Error Query [".$strSQL_map_video."]");
		$objResult_map_video = mysql_fetch_array($objQuery_map_video);
		//เช็คซ้ำในตาราง learn
		$strSQL_learn = "SELECT * FROM learn WHERE studentid ='".$id."'";
		$objQuery_learn = mysql_query($strSQL_learn) or die ("Error Query [".$strSQL_learn."]");
		$objResult_learn = mysql_fetch_array($objQuery_learn);
		$pass2 = $objResult_learn["pass"];
		//echo $id."/".$objResult_learn['studentid'];
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// ไม่เคยมีข้อมูลในตาราง learn & map video ให้ Insert ข้อมูลใน learn
		if($objResult_map_video == '' && $objResult_learn == '' ){
		
			$strSQL5 = "SELECT MAX(seat) as maxseat FROM learn WHERE subcode = '".$objResult_subj_video['subcode_subj']."'";
			$objQuery5 = mysql_query($strSQL5);
			$maxseat = mysql_fetch_array($objQuery5) or die ("Error Query [".$strSQL5."]");
		
			$seatnew = $maxseat["maxseat"]+1;
			$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
			
			$strSQL = "INSERT INTO learn";
			$strSQL .="(studentid,seat,subcode,pass,updateday,regisdate,id_year,expire_dt) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$id."' ";
			$strSQL .=",'".$seatnew."' ";
			$strSQL .=",'".$objResult_subj_video['subcode_subj']."' ";
			$strSQL .=",'".$random."' ";
			$strSQL .=",'".$s."' ";
			$strSQL .=",'".$s."' ";
			$strSQL .=",'".$objResult_subj_video['id_year_subj']."'";
			$strSQL .=",'".$ex_date."') ";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			if(!$objQuery){
				echo "<script>alert('การบันทึกไม่สำเร็จ 1');</script>";
				echo "<script>window.location='editstudentP.php?studentid=$id&pass=".$pass2."&action=AC&id_year=".$objResult_subj_video['id_year_subj']."';</script>";}
			// ถ้าบันทึกสำเร็จ ก็ให้เพิ่มข้อมูลในตาราง Map video และ update expire_dt
			else{
				if($ex_date != ''){
				$strSQL_ex_date = "UPDATE learn SET expire_dt = '".$ex_date."' WHERE studentid = '".$id."' ";
    			$objQuery_ex_date = mysql_query($strSQL_ex_date) or die ("Error Query [".$strSQL_ex_date."]");
				}
				$strSQL_learn2 = "SELECT * FROM learn WHERE studentid ='".$id."' ";
				$objQuery_learn2 = mysql_query($strSQL_learn2) or die ("Error Query [".$strSQL_learn2."]");
				$objResult_learn2 = mysql_fetch_array($objQuery_learn2);
				
				$strSQL_video = "SELECT * FROM path_video 
									  INNER JOIN subj_video ON path_video.subcode = subj_video.id_subj_video
									  WHERE subcode = '".$idvideo."'";
    			$objQuery_video = mysql_query($strSQL_video) or die ("Error Query [".$strSQL_video."]");
				while($objResult_video = mysql_fetch_array($objQuery_video)){
					$strSQL_map_video = "INSERT INTO map_video (`studentid`,`id_ref_video`,`learnid`)";
					$strSQL_map_video .= " VALUES ('".$id."'";
					$strSQL_map_video .= ",'".$objResult_video["id_ref_video"]."'";
					$strSQL_map_video .= ",'".$objResult_learn2["learnid"]."')";
					$objQuery_map_video = mysql_query($strSQL_map_video) or die ("Error Query [".$strSQL_map_video."]");
					}
				if(!$objQuery_map_video){
					echo "<script>alert('การบันทึกไม่สำเร็จ11');</script>";
					echo "<script>window.location='editstudentP.php?studentid=$id&pass=".$objResult_learn2['pass']."&action=AC&id_year=".$objResult_subj_video['id_year_subj']."';</script>";}
				else{
					$strSQL_Chack = "SELECT * FROM bill_video WHERE id_learn ='".$objResult_learn["learnid"]."' AND id_student = '$id' AND id_subject = '$idvideo'";
					$objQuery_Chack = mysql_query($strSQL_Chack) or die ("Error Query [".$strSQL_Chack."]");
					$Chack = mysql_num_rows($objQuery_Chack);
					if($Chack == 0){
						$strSQL_Bill_video = "INSERT INTO bill_video(id_learn ,id_student ,TypePay ,Price ,ID_Price ,staff ,id_subject ,date_bill)";
						$strSQL_Bill_video .= " VALUES ('".$objResult_learn2["learnid"]."'";
						$strSQL_Bill_video .= ",'".$id."'";
						$strSQL_Bill_video .= ",'".$TypePay."'";
						$strSQL_Bill_video .= ",'".$Price."'";
						$strSQL_Bill_video .= ",'".$ID_Price."'";
						$strSQL_Bill_video .= ",'".$staff."'";
						$strSQL_Bill_video .= ",'".$idvideo."'";
						$strSQL_Bill_video .= ",'".$s."')";
						$objQuery_Bill_video = mysql_query($strSQL_Bill_video) or die ("Error Query [".$strSQL_Bill_video."]");
						if(!$objQuery_Bill_video){
							echo "<script>alert('การบันทึกไม่สำเร็จ4');</script>";
							echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$objResult_learn2['pass']."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
						/*else{
							echo "<script>alert('บันทึกเรียบร้อย4');</script>";
							echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$objResult_learn2['pass']."&action=AC&id_year=".$id_year.$id_year2."';</script>";}*/
					}else{
						echo "<script>alert('บันทึกเรียบร้อย5');</script>";
						echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$objResult_learn2['pass']."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
				}
			}
		}
		
		/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		else if($objResult_map_video == '' && $objResult_learn != ''){
				$strSQL_video2 = "SELECT * FROM path_video JOIN subj_video ON path_video.subcode = subj_video.id_subj_video
								WHERE subcode = '".$idvideo."'";
    			$objQuery_video2 = mysql_query($strSQL_video2) or die ("Error Query [".$strSQL_video2."]");
				$objResult_video2 = mysql_fetch_array($objQuery_video2);
				$namevideo = $objResult_video2['name_subj'];
				
				$strSQL_learn2 = "SELECT * FROM learn JOIN student ON learn.studentid = student.studentid 
								WHERE learn.studentid ='".$id."' AND pass = '$pass2'";
				$objQuery_learn2 = mysql_query($strSQL_learn2) or die ("Error Query [".$strSQL_learn2."]");
				$objResult_learn2 = mysql_fetch_array($objQuery_learn2);
				$name = $objResult_learn2['studentname'];
				
				if($ex_date != ''){
					$strSQL_ex_date = "UPDATE learn SET expire_dt = '".$ex_date."' WHERE studentid = '".$id."' AND pass = '$pass2'";
					$objQuery_ex_date = mysql_query($strSQL_ex_date) or die ("Error Query [".$strSQL_ex_date."]");
				}
				//echo $strSQL_ex_date;
				$strSQL_map_video2 = "INSERT INTO map_video(`studentid`,`id_ref_video`,learnid)";
				$strSQL_map_video2 .= " VALUES ('".$id."'";
				$strSQL_map_video2 .= ",'".$objResult_subj_video["id_ref_video"]."'";
				$strSQL_map_video2 .= ",'".$objResult_learn["learnid"]."')";
				$objQuery_map_video2 = mysql_query($strSQL_map_video2) or die ("Error Query [".$strSQL_map_video2."]");
				//echo $strSQL_map_video2;
				if(!$objQuery_map_video2){
				echo "<script>alert('การบันทึกไม่สำเร็จ2');</script>";
				echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$pass2."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
				else{
					$strSQL_Chack = "SELECT * FROM bill_video WHERE id_learn ='".$objResult_learn["learnid"]."' AND id_student = '$id' AND id_subject = '$idvideo'";
					$objQuery_Chack = mysql_query($strSQL_Chack) or die ("Error Query [".$strSQL_Chack."]");
					$Chack = mysql_num_rows($objQuery_Chack);
					if($Chack == 0){
						$strSQL_Bill_video = "INSERT INTO bill_video(id_learn, id_student ,TypePay ,Price ,ID_Price ,staff ,id_subject ,date_bill)";
						$strSQL_Bill_video .= " VALUES ('".$objResult_learn["learnid"]."'";
						$strSQL_Bill_video .= ",'".$id."'";
						$strSQL_Bill_video .= ",'".$TypePay."'";
						$strSQL_Bill_video .= ",'".$Price."'";
						$strSQL_Bill_video .= ",'".$ID_Price."'";
						$strSQL_Bill_video .= ",'".$staff."'";
						$strSQL_Bill_video .= ",'".$idvideo."'";
						$strSQL_Bill_video .= ",'".$s."')";
						$objQuery_Bill_video = mysql_query($strSQL_Bill_video) or die ("Error Query [".$strSQL_Bill_video."]");
						if(!$objQuery_Bill_video){
							echo "<script>alert('การบันทึกไม่สำเร็จ3');</script>";
							echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$pass2."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
						/*else{
							echo "<script>alert('บันทึกเรียบร้อย3');</script>";
							echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$objResult_learn['pass']."&action=AC&id_year=".$id_year.$id_year2."';</script>";}*/
					}else{
						echo "<script>alert('บันทึกเรียบร้อย6');</script>";
						echo "<script>window.location='editstudentP.php?studentid=".$id."&pass=".$objResult_learn['pass']."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
				}
			}
			
			else{
			echo "<script>alert('นักเรียนมีวิชานี้อยู่แล้ว กรุณทำรายการใหม่');</script>";
			echo "<script>window.location='editstudentP.php?studentid=$id&pass=".$pass2."&action=AC&id_year=".$id_year.$id_year2."';</script>";}
	}
?>