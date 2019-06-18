<?php

//sleep(3);

session_start();

include("config.inc.php");



if($_SESSION["accid_cardpro"] == ""){

	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

	echo "<script language='javascript'>alert('Please Login!!');</script>";

	echo "<meta http-equiv='refresh' content='0;URL=../Login.php'>";

	exit();

}



ini_set('max_execution_time', 300);

ini_set('memory_limit', '128M');



$s = date('Y-m-d');

function displaydate($regisdate) //new format date

{

	$date_array = explode("/",$regisdate);

	$d = $date_array[0];

	$m = $date_array[1];

	$y = $date_array[2];

	$datenew = "$y-$m-$d";

	return $datenew;

}



if ($_FILES['file']['error']){

    echo "<script>alert('Error! Cannot upload data');</script>";

	echo "<script>window.top.window.showResult('2');</script>";

}



//goble parameter

$ck_st;

$ck_en;



if ($_FILES['file']['error']){

    echo "<script>alert('Error! Cannot upload data');</script>";

	echo "<script>window.top.window.showResult('2');</script>";

}



if (isset($_POST["send"])){

    require_once 'Excel/reader.php';

    $data = new Spreadsheet_Excel_Reader();

    $data->setOutputEncoding('utf-8');

    $data->setUTFEncoder('iconv');

    $data->read($_FILES['file']['tmp_name']);

    error_reporting(E_ALL ^ E_NOTICE);

	

    for ($j = 1; $j < $data->sheets[0]['numRows']; $j++) { //วง clorum in sheet

        $tel = trim($data->sheets[0]['cells'][$j + 1][1]);

        $fee = trim($data->sheets[0]['cells'][$j + 1][2]);

        $name = trim($data->sheets[0]['cells'][$j + 1][3]);

        $regisdate = trim($data->sheets[0]['cells'][$j + 1][4]);

        $subcode = trim($data->sheets[0]['cells'][$j + 1][5]);

        $accoutnum = trim($data->sheets[0]['cells'][$j + 1][6]);

		

		$strSQL1 = "SELECT * FROM student WHERE studentname = '$name'"; 

		$objQuery1 = mysqli_query($strSQL1);

		$checkstu = mysqli_num_rows($objQuery1);

		if($checkstu == 0) {

			

			//2//insert student /////////////////////////////////////////////////////////////////////////////////////////////

			$strSQL = "INSERT INTO student "; 

			$strSQL .="(studentname,tel) ";

			$strSQL .="VALUES ";

			$strSQL .="('".$name."' ";

			$strSQL .=",'".$tel."') ";

			$objQuery = mysqli_query($strSQL);

			if(!$objQuery){

				echo "<script>alert('Error! Cannot upload data');</script>";

				echo "<script>window.top.window.showResult('2');</script>";

			}

		}

		

		$strSQL2 = "SELECT * FROM student WHERE studentname = '$name'";

		$objQuery2 = mysqli_query($strSQL2);

		$objResult2 = mysqli_fetch_array($objQuery2);

			

		$OQ_ckall = mysqli_query("SELECT * FROM hms_allstudent WHERE school_studentid = '".$objResult2['studentid']."'");

		$ckall = mysqli_num_rows($OQ_ckall);

		

		if($ckall == 0){

			//5//insert hms_all /////////////////////////////////////////////////////////////////////////////////////////////

			$str_hmsall = "INSERT INTO hms_allstudent ("; 

			$str_hmsall .=" school_studentid";

			$str_hmsall .=" ,name";

			$str_hmsall .=" ,tel";

			$str_hmsall .=") VALUES (";

			$str_hmsall .=" '".$objResult2['studentid']."'";

			$str_hmsall .=" ,'".$name."'";

			$str_hmsall .=" ,'".$tel."'";

			$str_hmsall .=") ";

			$OQ_hmsall = mysqli_query($str_hmsall);

			if(!$OQ_hmsall){

				echo "<script>alert('Error! Cannot upload data');</script>";

				echo "<script>window.top.window.showResult('2');</script>";

			}

		}

		$OQ_allStud = mysqli_query("SELECT * FROM hms_allstudent WHERE school_studentid = '".$objResult2['studentid']."'");

		$OR_allStud = mysqli_fetch_array($OQ_allStud);

			

		//6//check hms_card /////////////////////////////////////////////////////////////////////////////////////////////

		$OQ_ckcard = mysqli_query("SELECT * FROM hms_card WHERE id_allstudent = '".$OR_allStud['id']."' AND status IN ('1','2') ");

		$ckcard = mysqli_num_rows($OQ_ckcard);

		if($ckcard == 0){

			//7//insert hms_card /////////////////////////////////////////////////////////////////////////////////////////////

			$start_date = date('Y-m-d');

			$regisdate_dpd = displaydate($regisdate);

			$date_expirePoint = date ("Y-m-d", strtotime("365 day", strtotime($regisdate_dpd))); //'2016-03-01'; //fix for frist lot

			$point = 0;

			$status = 1;

			

			$str_hmscard = "INSERT INTO hms_card ("; 

			$str_hmscard .=" id_allstudent";

			$str_hmscard .=" ,start_date";

			$str_hmscard .=" ,date_expirePoint";

			$str_hmscard .=" ,point";

			$str_hmscard .=" ,status";

			$str_hmscard .=") VALUES (";

			$str_hmscard .=" '".$OR_allStud['id']."'";

			$str_hmscard .=" ,'".$start_date."'";

			$str_hmscard .=" ,'".$date_expirePoint."'";

			$str_hmscard .=" ,'".$point."'";

			$str_hmscard .=" ,'".$status."'";

			$str_hmscard .=") ";

			$OQ_hmscard = mysqli_query($str_hmscard);

			if(!$OQ_hmscard){

				echo "<script>alert('Error! Cannot upload data');</script>";

				echo "<script>window.top.window.showResult('2');</script>";

			}

		}

	}

	echo "<script>alert('Upload file successfully!');</script>";

	echo "<script>window.top.window.showResult('1');</script>";

}



?>