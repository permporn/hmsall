<?php
sleep(3);

include("config.inc.php");
ini_set('max_execution_time', 300000000000); 
$s=date('Y-m-d');
function displaydate($datex) {
$date_array=explode("/",$datex);
$d=$date_array[0];
$m=$date_array[1];
$y=$date_array[2];
$displaydate="$y-$m-$d";
return $displaydate;
}
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
        $tel = trim($data->sheets[0]['cells'][$j + 1][1]);
        $fee = trim($data->sheets[0]['cells'][$j + 1][2]);
        $name = trim($data->sheets[0]['cells'][$j + 1][3]);
        $regisdate = trim($data->sheets[0]['cells'][$j + 1][4]);
        $subcode = trim($data->sheets[0]['cells'][$j + 1][5]);
        $accoutnum = trim($data->sheets[0]['cells'][$j + 1][6]);
		/*$year = trim($data->sheets[0]['cells'][$j + 1][7]);*/
		$seatnew=0;
    	$strSQL1 = "SELECT * FROM student WHERE studentname='$name'";
    	$objQuery1 = mysql_query($strSQL1);
		$checkstu = mysql_num_rows($objQuery1);
        if ($checkstu == 0) {
			$strSQL = "INSERT INTO student ";
			$strSQL .="(studentname,tel) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$name."' ";
			$strSQL .=",'".$tel."') ";
			$objQuery = mysql_query($strSQL);
	if(!$objQuery)
		{
			echo "<script>alert('Error! Cannot upload data');</script>";
			echo "<script>window.top.window.showResult('2');</script>";
		}
	}
	$check1=0;
	$strSQL2 = "SELECT * FROM student WHERE studentname='$name'";
    $objQuery2 = mysql_query($strSQL2);
	$objResult2 = mysql_fetch_array($objQuery2);
	$strSQL3 = "SELECT * FROM learn";
    $objQuery3 = mysql_query($strSQL3);
	while($objResult3 = mysql_fetch_array($objQuery3)){
	if($objResult2["studentid"]==$objResult3["studentid"]&&$objResult3["id_year"]==$_POST["term"]&&$subcode==$objResult3["subcode"]){
	$check1++;	}
	}
    if($check1==0)
	{
		$datenew=displaydate($regisdate);
		$strSQL4 = "SELECT MAX(seat) as maxseat FROM learn WHERE subcode='$subcode' && id_year = '".$_POST["term"]."'";
        $objQuery4 = mysql_query($strSQL4);
		$maxseat = mysql_fetch_array($objQuery4);
		$seatnew=$maxseat["maxseat"]+1;
		$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
		
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
}
echo "<script>alert('Upload file successfully!');</script>";
echo "<script>window.top.window.showResult('1');</script>";
}
?>