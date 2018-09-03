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
$DateAddName = date("Y-m-d H:i:s");
function displaydate($regisdate) //new format date
{
	$date_array = explode("/",$regisdate);
	$d = $date_array[0];
	$m = $date_array[1];
	$y = $date_array[2];
	$datenew = "$y-$m-$d";
	return $datenew;
}

function DateDiff($strDate1,$strDate2)
{
	return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

$OQ_promotion = mysql_query("SELECT * FROM hms_promotion WHERE status_pro = '1'");
$OR_promotion = mysql_fetch_array($OQ_promotion);
$st_date = $OR_promotion['stat_date'];
$en_date = $OR_promotion['end_date'];

if ($_FILES['file']['error']){
    echo "<script>alert('Error! Cannot upload data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}

//goble parameter
$ck_st;
$ck_en;

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
		/*$year = trim($data->sheets[0]['cells'][$j + 1][7]);*/
		
		$OQ_SubCode = mysql_query("SELECT * FROM subject WHERE subcode = '$subcode' AND id_year = '".$_POST["term"]."'");
		$OR_SubCode = mysql_fetch_array($OQ_SubCode);
		$_CkTypeSub = $OR_SubCode['type'];
		//$_subid = 6299;//$OR_SubCode['subid'];
		
		if($name != ''){
		
			//1//check name from student /////////////////////////////////////////////////////////////////////////////////////////////
			$seatnew = 0;
			$strSQL1 = "SELECT * FROM student WHERE studentname = '$name'"; 
			$objQuery1 = mysql_query($strSQL1);
			$checkstu = mysql_num_rows($objQuery1);
			if($checkstu == 0) {
				
				//2//insert student /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO student "; 
				$strSQL .="(studentname,tel,DateAddName) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$name."' ";
				$strSQL .=",'".$tel."' ";
				$strSQL .=",'".$DateAddName."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){
					echo "<script>alert('Error! Cannot upload data');</script>";
					echo "<script>window.top.window.showResult('2');</script>";
				}
			}
			$check1 = 0;
			$strSQL2 = "SELECT * FROM student WHERE studentname = '$name'";
			$objQuery2 = mysql_query($strSQL2);
			$objResult2 = mysql_fetch_array($objQuery2);
			
			$strSQL3 = "SELECT * FROM learn WHERE id_year = '".$_POST["term"]."' AND studentid = '".$objResult2["studentid"]."' AND subcode = '".$subcode."'";//chek doubly
			$objQuery3 = mysql_query($strSQL3);
			while($objResult3 = mysql_fetch_array($objQuery3)){
				//if($objResult2["studentid"] == $objResult3["studentid"] && $subcode == $objResult3["subcode"]){
					$check1++;	
				//}
			}
			if($check1 == 0){
				$datenew = displaydate($regisdate);
				$datenew = date("Y-m-d",strtotime("-1 day",strtotime($datenew)));
				$strSQL4 = "SELECT MAX(seat) as maxseat FROM learn WHERE subcode='$subcode' && id_year = '".$_POST["term"]."'";
				$objQuery4 = mysql_query($strSQL4);
				$maxseat = mysql_fetch_array($objQuery4);
				
				$seatnew = $maxseat["maxseat"]+1;
				$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);


				
				//3//insert learn /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO learn "; 
				$strSQL .="(studentid,seat,subcode,pricek,pass,updateday,regisdate,id_year) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$objResult2["studentid"]."' ";
				$strSQL .=",'".$seatnew."' ";
				$strSQL .=",'".$subcode."' ";
				$strSQL .=",'".$fee."' ";
				$strSQL .=",'".$random."' ";
				$strSQL .=",'".$s."' ";
				$strSQL .=",'".$datenew."' ";
				$strSQL .=",'".$_POST["term"]."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery)
				{
					echo "<script>alert('Error! Cannot upload data');</script>";
					echo "<script>window.top.window.showResult('2');</script>";
				}

				$_SubCode = mysql_query("SELECT * FROM subject WHERE subcode = '$subcode' AND id_year = '".$_POST["term"]."'");
				$_SubCode = mysql_fetch_array($_SubCode);
				$_subid = $_SubCode['subid'];

				///////// insert seat status ///////////////////////////////////////////////////////////////////////////////////////
				$status_seat = 2;
				$strSQL_seat = "INSERT INTO `seat_log` (`seat_no`, `subject_id`, `status`) VALUES ('".$seatnew."', '".$_subid."', $status_seat)";
				$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
				if(!$objQuery_seat){
					echo "Error! Cannot upload data seat $strSQL_seat";
				}
			}

			///////// insert seat status ///////////////////////////////////////////////////////////////////////////////////////
			/*$status_seat = 2;
			$strSQL_seat = "INSERT INTO `seat_log` (`seat_no`, `subject_id`, `status` ,`update`) VALUES ('".$seatnew."', '". $OR_SubCode['subid']."', $status_seat , $DateAddName)";
			$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
			if(!$objQuery_seat){
				echo "Error! Cannot upload data seat $strSQL_seat";
			}*/

			

			$str_lern = "SELECT * FROM learn WHERE id_year = '".$_POST["term"]."' AND studentid = '".$objResult2["studentid"]."' AND subcode = '".$subcode."'";//chek doubly
			$objQuery_lern = mysql_query($str_lern);
			$objResult_lern = mysql_fetch_array($objQuery_lern);
			$fee_check = $objResult_lern['pricek'];
			
			//4// check hms_all /////////////////////////////////////////////////////////////////////////////////////////////
			$OQ_allStud = mysql_query("SELECT * FROM hms_allstudent WHERE school_studentid = '".$objResult2['studentid']."'");
			$OR_allStud = mysql_fetch_array($OQ_allStud);

			if(!empty($OR_allStud) && $check1 == 0 && $_CkTypeSub != '3' && $fee_check >= 2500){
				//6//check hms_card /////////////////////////////////////////////////////////////////////////////////////////////
				$OQ_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$OR_allStud['id']."' AND status IN ('1','2') ");
				$OR_card = mysql_fetch_array($OQ_card);
				
				if(!empty($OR_card)){
					//8,9//check point = 0 || check date expire /////////////////////////////////////////////////////////////////////////////////////////////
					$ckdate_expire = DateDiff(date('Y-m-d'), $OR_card['date_expirePoint']);
					
					/*echo "<script>alert('ckdate_expire=$ckdate_expire _CkTypeSub=$_CkTypeSub fee_check=$fee_check');</script>";*/
					
					if($ckdate_expire < 0){
						//10//update point = 0 and date expire +365 day /////////////////////////////////////////////////////////////////////////////////////////////
						$newDateExpire = date ("Y-m-d", strtotime("365 day"));
						$newPoint = 1;
						$newRe_cycle = $OR_card['re_cycle'] + 1;
						
						$str_up10 = "UPDATE hms_card SET ";
						$str_up10 .="date_expirePoint = '".$newDateExpire."' ";
						$str_up10 .=",point = '".$newPoint."' ";
						$str_up10 .=",re_cycle = '".$newRe_cycle."' ";
						$str_up10 .="WHERE id_hms = '".$OR_card['id_hms']."' ";
						$OQ_up10 = mysql_query($str_up10);
					
					}else if($ckdate_expire >= 0){
						//11//update point = point++ /////////////////////////////////////////////////////////////////////////////////////////////
						$newPoint = $OR_card['point'] + 1;
						
						$str_up11 = "UPDATE hms_card SET ";
						$str_up11 .="point = '".$newPoint."' ";
						$str_up11 .="WHERE id_hms = '".$OR_card['id_hms']."' ";
						$OQ_up11 = mysql_query($str_up11);
					}
					
					$str_ckpoint = "UPDATE learn SET ";
					$str_ckpoint .="check_pointhms = '1' ";
					$str_ckpoint .="WHERE learnid = '".$objResult_lern['learnid']."' ";
					$OQ_ckpoint = mysql_query($str_ckpoint);
					
				}
			}
		}
	}
	echo "<script>alert('Upload file successfully!');</script>";
	echo "<script>window.top.window.showResult('1');</script>";
}
?>

<?php
//sleep(3);
/*session_start();
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
$DateAddName = date("Y-m-d H:i:s");
function displaydate($regisdate) //new format date
{
	$date_array = explode("/",$regisdate);
	$d = $date_array[0];
	$m = $date_array[1];
	$y = $date_array[2];
	$datenew = "$y-$m-$d";
	return $datenew;
}

function DateDiff($strDate1,$strDate2)
{
	return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
}

$OQ_promotion = mysql_query("SELECT * FROM hms_promotion WHERE status_pro = '1'");
$OR_promotion = mysql_fetch_array($OQ_promotion);
$st_date = $OR_promotion['stat_date'];
$en_date = $OR_promotion['end_date'];

if ($_FILES['file']['error']){
    echo "<script>alert('Error! Cannot upload data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}

//goble parameter
$ck_st;
$ck_en;

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
		///$year = trim($data->sheets[0]['cells'][$j + 1][7]);
		
		$OQ_SubCode = mysql_query("SELECT * FROM subject WHERE subcode = '$subcode' AND id_year = '".$_POST["term"]."'");
		$OR_SubCode = mysql_fetch_array($OQ_SubCode);
		$_CkTypeSub = $OR_SubCode['type'];
		
		if($name != ''){
		
			//1//check name from student /////////////////////////////////////////////////////////////////////////////////////////////
			$seatnew = 0;
			$strSQL1 = "SELECT * FROM student WHERE studentname = '$name'"; 
			$objQuery1 = mysql_query($strSQL1);
			$checkstu = mysql_num_rows($objQuery1);
			if($checkstu == 0) {
				
				//2//insert student /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO student "; 
				$strSQL .="(studentname,tel,DateAddName) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$name."' ";
				$strSQL .=",'".$tel."' ";
				$strSQL .=",'".$DateAddName."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery){
					echo "<script>alert('Error! Cannot upload data');</script>";
					echo "<script>window.top.window.showResult('2');</script>";
				}
			}
			$check1 = 0;
			$strSQL2 = "SELECT * FROM student WHERE studentname = '$name'";
			$objQuery2 = mysql_query($strSQL2);
			$objResult2 = mysql_fetch_array($objQuery2);
			
			$strSQL3 = "SELECT * FROM learn WHERE id_year = '".$_POST["term"]."' AND studentid = '".$objResult2["studentid"]."' AND subcode = '".$subcode."'";//chek doubly
			$objQuery3 = mysql_query($strSQL3);
			while($objResult3 = mysql_fetch_array($objQuery3)){
				//if($objResult2["studentid"] == $objResult3["studentid"] && $subcode == $objResult3["subcode"]){
					$check1++;	
				//}
			}
			if($check1 == 0){
				$datenew = displaydate($regisdate);
				$datenew = date("Y-m-d",strtotime("-1 day",strtotime($datenew)));
				$strSQL4 = "SELECT MAX(seat) as maxseat FROM learn WHERE subcode='$subcode' && id_year = '".$_POST["term"]."'";
				$objQuery4 = mysql_query($strSQL4);
				$maxseat = mysql_fetch_array($objQuery4);
				
				$seatnew = $maxseat["maxseat"]+1;
				$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);


				
				//3//insert learn /////////////////////////////////////////////////////////////////////////////////////////////
				$strSQL = "INSERT INTO learn "; 
				$strSQL .="(studentid,seat,subcode,pricek,pass,updateday,regisdate,id_year) ";
				$strSQL .="VALUES ";
				$strSQL .="('".$objResult2["studentid"]."' ";
				$strSQL .=",'".$seatnew."' ";
				$strSQL .=",'".$subcode."' ";
				$strSQL .=",'".$fee."' ";
				$strSQL .=",'".$random."' ";
				$strSQL .=",'".$s."' ";
				$strSQL .=",'".$datenew."' ";
				$strSQL .=",'".$_POST["term"]."') ";
				$objQuery = mysql_query($strSQL);
				if(!$objQuery)
				{
					echo "<script>alert('Error! Cannot upload data');</script>";
					echo "<script>window.top.window.showResult('2');</script>";
				}
			}
			$str_lern = "SELECT * FROM learn WHERE id_year = '".$_POST["term"]."' AND studentid = '".$objResult2["studentid"]."' AND subcode = '".$subcode."'";//chek doubly
			$objQuery_lern = mysql_query($str_lern);
			$objResult_lern = mysql_fetch_array($objQuery_lern);
			$fee_check = $objResult_lern['pricek'];
			
			//4// check hms_all /////////////////////////////////////////////////////////////////////////////////////////////
			$OQ_allStud = mysql_query("SELECT * FROM hms_allstudent WHERE school_studentid = '".$objResult2['studentid']."'");
			$OR_allStud = mysql_fetch_array($OQ_allStud);

			if(!empty($OR_allStud) && $check1 == 0 && $_CkTypeSub != '3' && $fee_check >= 2500){
				//6//check hms_card /////////////////////////////////////////////////////////////////////////////////////////////
				$OQ_card = mysql_query("SELECT * FROM hms_card WHERE id_allstudent = '".$OR_allStud['id']."' AND status IN ('1','2') ");
				$OR_card = mysql_fetch_array($OQ_card);
				
				if(!empty($OR_card)){
					//8,9//check point = 0 || check date expire /////////////////////////////////////////////////////////////////////////////////////////////
					$ckdate_expire = DateDiff(date('Y-m-d'), $OR_card['date_expirePoint']);
					
					//echo "<script>alert('ckdate_expire=$ckdate_expire _CkTypeSub=$_CkTypeSub fee_check=$fee_check');</script>";
					
					if($ckdate_expire < 0){
						//10//update point = 0 and date expire +365 day /////////////////////////////////////////////////////////////////////////////////////////////
						$newDateExpire = date ("Y-m-d", strtotime("365 day"));
						$newPoint = 1;
						$newRe_cycle = $OR_card['re_cycle'] + 1;
						
						$str_up10 = "UPDATE hms_card SET ";
						$str_up10 .="date_expirePoint = '".$newDateExpire."' ";
						$str_up10 .=",point = '".$newPoint."' ";
						$str_up10 .=",re_cycle = '".$newRe_cycle."' ";
						$str_up10 .="WHERE id_hms = '".$OR_card['id_hms']."' ";
						$OQ_up10 = mysql_query($str_up10);
					
					}else if($ckdate_expire >= 0){
						//11//update point = point++ /////////////////////////////////////////////////////////////////////////////////////////////
						$newPoint = $OR_card['point'] + 1;
						
						$str_up11 = "UPDATE hms_card SET ";
						$str_up11 .="point = '".$newPoint."' ";
						$str_up11 .="WHERE id_hms = '".$OR_card['id_hms']."' ";
						$OQ_up11 = mysql_query($str_up11);
					}
					
					$str_ckpoint = "UPDATE learn SET ";
					$str_ckpoint .="check_pointhms = '1' ";
					$str_ckpoint .="WHERE learnid = '".$objResult_lern['learnid']."' ";
					$OQ_ckpoint = mysql_query($str_ckpoint);
					
				}
			}
		}
	}
	echo "<script>alert('Upload file successfully!');</script>";
	echo "<script>window.top.window.showResult('1');</script>";
}/*
?>