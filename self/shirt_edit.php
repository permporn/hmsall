<? 
include("config.inc.php");
ob_start();

$staffid = $_POST["staffid"];
$studentname = $_POST["studenname"];
$num = $_POST["num"];
$accid = $_GET["accid"];

	
	$strSQL99 = "SELECT * FROM account WHERE accid = '".$accid."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	$shirt = $objResult99["shirt"];
	$nums = $shirt + $num;
			
	$strSQL = "UPDATE account SET ";
	$strSQL .="shirt = '".$nums."' ";
	$strSQL .=",shirt_staffid = '".$staffid."' ";
	$strSQL .="WHERE accid = '".$accid."' ";
	
	$objQuery = mysql_query($strSQL);
	
	if(!$objQuery){
		echo "Error Update [".mysql_error()."]";
	}else{
		
		header("location:shirt_search.php?h_arti_id=$studentname");
	}
	?>