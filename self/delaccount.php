<?
include("config.inc.php");

	$staffid=$_GET["staffid"];
	$accid = $_GET["accid"];
	$status = "out";
	
	if($accid != ''){
		$strSQL = " UPDATE account SET ";
		$strSQL .=" status = '".$status ."'";
		$strSQL .=",staffid = '".$staffid ."'";
		$strSQL .="WHERE accid = '".$_GET["accid"]."' ";
		$objQuery = mysql_query($strSQL);
		 
		$strSQL2 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."' ";
		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
		$objResult2 = mysql_fetch_array($objQuery2);
		
		$strSQL3 = "SELECT * FROM student WHERE studentid = '".$objResult2["studentid"]."' ";
		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
		$objResult3 = mysql_fetch_array($objQuery3);
		$studentid = $objResult3['studentid'];
		$studenname = $objResult3['name'];
		
		if($objQuery){
			$strSQL = "DELETE FROM reserve ";
			$strSQL .="WHERE accid = '".$_GET["accid"]."'";
			$dbquery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			mysql_close();
			header("location:viewall.php?studenname=$studenname");
		}
	}
 ?>