<?
include("config.inc.php");
$accid = $_GET["accid"];
$staffid = $_POST["staffid"];
$studenname = $_POST["studenname"];

$strSQL2 = "SELECT * FROM account WHERE accid = '".$accid."'";
$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
$objResult2 = mysql_fetch_array($objQuery2);
$studentid = $objResult2['studentid'];

	for($i=0;$i<count($_POST["chk"]);$i++){
		
		if($_POST["chk"][$i] != ""){
			
			$strSQL99 = "SELECT * FROM credit JOIN subject ON credit.subid = subject.subid AND creditid = '".$_POST["chk"][$i]."'";
			$objQuery99 = mysql_query($strSQL99);
			$objResult99 = mysql_fetch_array($objQuery99);
			
			$strSQL77 = "SELECT * FROM account WHERE accid = '".$_GET["accid"]."'";
			$objQuery77 = mysql_query($strSQL77);
			$objResult77 = mysql_fetch_array($objQuery77);
			$totalcredit=$objResult77["totalcredit"]-$objResult99["hour"];
			
			$strSQL = "UPDATE account SET ";
			$strSQL .= "totalcredit = '".$totalcredit."' ";
			$strSQL .= "WHERE accid = '".$_GET["accid"]."' ";
			$objQuery = mysql_query($strSQL);
			
			$strSQL = "DELETE FROM credit ";
			$strSQL .="WHERE creditid = '".$_POST["chk"][$i]."' ";
			$objQuery = mysql_query($strSQL);
		}
	}
	mysql_close();
	header("location:viewaccount.php?accid=$accid&studenname=$studenname&std=$studentid");
 ?>