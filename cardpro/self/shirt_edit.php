<? 
session_start();
include("../config.inc.php");
include("funtion.php");

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
$studentname = $_POST["studenname"];
$num = $_POST["num"];
$accid = $_GET["accid"];

	
	$strSQL99 = "SELECT * FROM account WHERE accid = '".$accid."'";
	$objQuery99 = mysqli_query($con_ajtongmath_self,$strSQL99);
	$objResult99 = mysqli_fetch_array($objQuery99);
	$shirt = $objResult99["shirt"];
	$nums = $shirt + $num;
			
	$strSQL = "UPDATE account SET ";
	$strSQL .="shirt = '".$nums."' ";
	$strSQL .=",shirt_staffid = '".$staffid."' ";
	$strSQL .="WHERE accid = '".$accid."' ";
	
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	
	if(!$objQuery){
		echo "Error Update [".mysqli_error()."]";
	}else{
		
		header("location:shirt_search.php?h_arti_id=$studentname");
	}
	?>