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
$datenow = date('Y-m-d');

if ($_FILES['file']['error']) {
    echo "<script>alert('Error! Cannot upload data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}
if (isset($_POST["send"])) {
    require_once 'Excel/reader.php';
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->setUTFEncoder('iconv');
    $data->read($_FILES['file']['tmp_name']);
    error_reporting(E_ALL ^ E_NOTICE);

    for ($j = 1; $j < $data->sheets[0]['numRows']; $j++) {
        $subname = trim($data->sheets[0]['cells'][$j + 1][1]);
        $subcode = trim($data->sheets[0]['cells'][$j + 1][2]);
        $price = trim($data->sheets[0]['cells'][$j + 1][3]);
        $day = trim($data->sheets[0]['cells'][$j + 1][4]);
        $time = trim($data->sheets[0]['cells'][$j + 1][5]);
		$date = trim($data->sheets[0]['cells'][$j + 1][6]);
        $edate = trim($data->sheets[0]['cells'][$j + 1][7]);
		$type = trim($data->sheets[0]['cells'][$j + 1][8]);
		$teacher = trim($data->sheets[0]['cells'][$j + 1][9]);
		$room = trim($data->sheets[0]['cells'][$j + 1][10]);
		
	$seatnew=0;
    $strSQL1 = "SELECT * FROM subject WHERE subcode = '$subcode' AND id_year = '".$_POST["term"]."'";
    $objQuery1 = mysql_query($strSQL1);
	$checkstu = mysql_num_rows($objQuery1);
      
	if ($checkstu == 0){
		
		if($type == 'DVD'){ $type = 2;}
		if($type == 'สอนสด'){ $type = 1;}
		if($type == 'self'){ $type = 3;}
		
		$strSQL_teacher = "SELECT teacherid FROM teacher WHERE teachername = '".$teacher."'";
		$objQuery_teacher = mysql_query($strSQL_teacher);
		$objResult_teacher = mysql_fetch_array($objQuery_teacher);
		
		$strSQL_room = "SELECT roomid FROM room WHERE roomname = '".$room."'";
		$objQuery_room = mysql_query($strSQL_room);
		$objResult_room = mysql_fetch_array($objQuery_room);

		$status_system_seat = 1;
		
		$strSQL = "INSERT INTO subject ";
		$strSQL .="(subname,subcode,price,day,time,date,edate,type,teachid,roomid,id_year,date_save,status_system_seat) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$subname."' ";
		$strSQL .=",'".$subcode."' ";
		$strSQL .=",'".$price."' ";
		$strSQL .=",'".$day."' ";
		$strSQL .=",'".$time."' ";
		$strSQL .=",'".$date."' ";
		$strSQL .=",'".$edate."' ";
		$strSQL .=",'".$type."' ";
		$strSQL .=",'".$teacher."' ";
		$strSQL .=",'".$room."' ";
		$strSQL .=",'".$_POST["term"]."'";
		$strSQL .=",'".$datenow."'";
		$strSQL .=",'".$status_system_seat."')";
		$objQuery = mysql_query($strSQL);
			if(!$objQuery)
			{
				echo "<script>alert('Error! Cannot upload data');</script>";
				echo "<script>window.top.window.showResult('2');</script>";
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
$datenow = date('Y-m-d');

if ($_FILES['file']['error']) {
    echo "<script>alert('Error! Cannot upload data');</script>";
	echo "<script>window.top.window.showResult('2');</script>";
}
if (isset($_POST["send"])) {
    require_once 'Excel/reader.php';
    $data = new Spreadsheet_Excel_Reader();
    $data->setOutputEncoding('utf-8');
    $data->setUTFEncoder('iconv');
    $data->read($_FILES['file']['tmp_name']);
    error_reporting(E_ALL ^ E_NOTICE);

    for ($j = 1; $j < $data->sheets[0]['numRows']; $j++) {
        $subname = trim($data->sheets[0]['cells'][$j + 1][1]);
        $subcode = trim($data->sheets[0]['cells'][$j + 1][2]);
        $price = trim($data->sheets[0]['cells'][$j + 1][3]);
        $day = trim($data->sheets[0]['cells'][$j + 1][4]);
        $time = trim($data->sheets[0]['cells'][$j + 1][5]);
		$date = trim($data->sheets[0]['cells'][$j + 1][6]);
        $edate = trim($data->sheets[0]['cells'][$j + 1][7]);
		$type = trim($data->sheets[0]['cells'][$j + 1][8]);
		$teacher = trim($data->sheets[0]['cells'][$j + 1][9]);
		$room = trim($data->sheets[0]['cells'][$j + 1][10]);
		
	$seatnew=0;
    $strSQL1 = "SELECT * FROM subject WHERE subcode = '$subcode' AND id_year = '".$_POST["term"]."'";
    $objQuery1 = mysql_query($strSQL1);
	$checkstu = mysql_num_rows($objQuery1);
      
	if ($checkstu == 0){
		
		if($type == 'DVD'){ $type = 2;}
		if($type == 'สอนสด'){ $type = 1;}
		if($type == 'self'){ $type = 3;}
		
		$strSQL_teacher = "SELECT teacherid FROM teacher WHERE teachername = '".$teacher."'";
		$objQuery_teacher = mysql_query($strSQL_teacher);
		$objResult_teacher = mysql_fetch_array($objQuery_teacher);
		
		$strSQL_room = "SELECT roomid FROM room WHERE roomname = '".$room."'";
		$objQuery_room = mysql_query($strSQL_room);
		$objResult_room = mysql_fetch_array($objQuery_room);
		
		$strSQL = "INSERT INTO subject ";
		$strSQL .="(subname,subcode,price,day,time,date,edate,type,teachid,roomid,id_year,date_save) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$subname."' ";
		$strSQL .=",'".$subcode."' ";
		$strSQL .=",'".$price."' ";
		$strSQL .=",'".$day."' ";
		$strSQL .=",'".$time."' ";
		$strSQL .=",'".$date."' ";
		$strSQL .=",'".$edate."' ";
		$strSQL .=",'".$type."' ";
		$strSQL .=",'".$teacher."' ";
		$strSQL .=",'".$room."' ";
		$strSQL .=",'".$_POST["term"]."'";
		$strSQL .=",'".$datenow."')";
		$objQuery = mysql_query($strSQL);
			if(!$objQuery)
			{
				echo "<script>alert('Error! Cannot upload data');</script>";
				echo "<script>window.top.window.showResult('2');</script>";
			}
		}
	}
echo "<script>alert('Upload file successfully!');</script>";
echo "<script>window.top.window.showResult('1');</script>";
}*/
?>