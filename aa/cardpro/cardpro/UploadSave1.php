<?php
sleep(3);
include("config.inc.php");
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
 if($type == 'DVD'){ $type = 2;}
		if($type == 'สอนสด'){ $type = 1;}
if($type == 'self'){ $type = 3;}
		if($teacher == 'อ.เซ้ง'){ $teacher = 2;}
	if($teacher == 'อ.โต้ง'){ $teacher = 1;}
    $seatnew=0;
    $strSQL1 = "SELECT * FROM subject WHERE subcode='$subcode' AND id_year = '".$_POST["term"]."'";
    $objQuery1 = mysql_query($strSQL1);
	$checkstu = mysql_num_rows($objQuery1);
        if ($checkstu == 0) {
		
	$strSQL = "INSERT INTO subject ";
	$strSQL .="(subname,subcode,price,day,time,date,edate,type,teachid,roomid,id_year) ";
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
	$strSQL .=",'".$_POST["term"]."') ";
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