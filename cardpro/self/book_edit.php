<? 
session_start();
include("ck_session_self.php");

$book_staffid = $_POST["staffid"];
$studentname = $_POST["studenname"];
$book_status = $_POST["book_status"];
$book_num = trim($_POST["book_num"]);
$book_detail = trim($_POST["book_detail"]);
$accid = $_GET["accid"];
$creditid = $_GET["creditid"];

	
	/*$strSQL99 = "SELECT * FROM account WHERE accid = '".$accid."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	$shirt = $objResult99["shirt"];
	$nums = $shirt + $num;*/
			
	$strSQL = "UPDATE credit SET ";
	$strSQL .="book_status = '".$book_status."' ";
	$strSQL .=",book_num = '".$book_num."' ";
	$strSQL .=",book_detail = '".$book_detail."' ";
	$strSQL .=",book_staffid = '".$book_staffid."' ";
	$strSQL .="WHERE creditid = '".$creditid."' ";
	
	$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
	
	if(!$objQuery){
		echo "Error Update [".mysql_error()."]";
	}else{
		header("location:book_search.php?h_arti_id=$studentname");
	}
	?>