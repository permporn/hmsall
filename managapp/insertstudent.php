<?
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

if($_GET['Save'] == "Save"){
	$name = $_GET["name"];
	$school = $_GET["school"];
	$tel = $_GET["tel"];
	$local = $_GET["local"];	
	$checkstu = 0;
		
		$strSQL = "SELECT * FROM student WHERE `studentname` = '$name'";
		$objQuery = mysql_query($strSQL);
		$checkstu = mysql_num_rows($objQuery);
		
		if($checkstu == 0) {
			$strSQL  = "INSERT INTO student ";
			$strSQL .="(studentname,tel,school,address,nickname) ";
			$strSQL .="VALUES ";
			$strSQL .="('".$name."' ";
			$strSQL .=",'".$tel."' ";
			$strSQL .=",'".$school."' ";
			$strSQL .=",'APP'";
			$strSQL .=",'".$local."') ";
			$objQuery = mysql_query($strSQL);
			if(!$objQuery){	
				echo "Error Save [".mysql_error()."]";
				echo "<script>window.location='addnamestudent.php;</script>";}
			else{
				
				$strSQL = "SELECT * FROM student WHERE `studentname` = '$name'";
				$objQuery = mysql_query($strSQL);
				$objResult = mysql_fetch_array($objQuery);
				$studentid = $objResult['studentid'];
				echo "<script>alert('บันทึกเรียบร้อย');</script>";
				echo "<script>window.location='addaccount.php?name=$name&studentid=$studentid';</script>";}
		}
		else{
			echo "<script>alert('ชื่อซ้ำ');</script>";
			echo "<script>window.location='addnamestudent.php';</script>";}
		}
else{
	echo "<script>alert('ไม่มีค่าส่งมา');</script>";
	echo "<script>window.location='addnamestudent.php';</script>";}
?>