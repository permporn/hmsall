<?
include("../config.inc.php");

	$staffid = $_GET["staffid"];
	$accid = $_GET["accid"];
	$status = "out";
	$h_arti_id= $_GET["h_arti_id"];
	$h_arti_id_acc= $_GET["h_arti_id_acc"];
	
	if($accid != ''){
		$strSQL = " UPDATE account SET ";
		$strSQL .=" status = '".$status ."'";
		$strSQL .=",staffid = '".$staffid ."'";
		$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
		$objQuery = mysqli_query($con_ajtongmath_self,$strSQL);
		 
		$strSQL2 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."' ";
		$objQuery2 = mysqli_query($con_ajtongmath_self,$strSQL2) or die ("Error Query [".$strSQL2."]");
		$objResult2 = mysqli_fetch_array($objQuery2);
		
		if($h_arti_id_acc == ''){
			$strSQL3 = "SELECT * FROM student WHERE studentid = '".$objResult2["studentid"]."' ";
			$objQuery3 = mysqli_query($con_ajtongmath_self,$strSQL3) or die ("Error Query [".$strSQL3."]");
			$objResult3 = mysqli_fetch_array($objQuery3);
			$studentid = $objResult3['studentid'];
			$studenname = $objResult3['name'];
			
			if($objQuery){
				$strSQL = "DELETE FROM reserve ";
				$strSQL .="WHERE accid = '".$_GET["accid"]."'";
				$dbquery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
				mysqli_close();
				header("location:searchstudent.php?h_arti_id=$h_arti_id");
			}
		}else{
			$strSQL = "DELETE FROM reserve ";
			$strSQL .="WHERE accid = '".$_GET["accid"]."'";
			$dbquery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
			mysqli_close($con_ajtongmath_self);
			header("location:searchstudent.php?h_arti_id_acc=$h_arti_id_acc");
		}
	}
 ?>