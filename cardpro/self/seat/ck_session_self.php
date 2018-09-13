<?php
include("../../config.inc.php");
	$strSTT = "SELECT * FROM staff WHERE stid = '".$_SESSION["mapid"]."'";
	$objQuerySTT = mysqli_query($con_ajtongmath_self, $strSTT);
	$objResultSTT = mysqli_fetch_array($objQuerySTT);
	$_SESSION["db"] = "selfdb";
	$session_status = $objResultSTT['status'];
	$id_account_self = $_SESSION["mapid"];
	$id_account_school = $_SESSION["accid_cardpro"];
	if($_SESSION["mapid"] == ""){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('Please Login!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=../Login.php'>";
		exit();
	}else{
		$strSQL_school = "SELECT
		account.branchid AS id_branch_school,
		account.name AS account_name,
		account.status,
		branch.id_branch_self AS id_branch_self,
		branch.branchname AS branch_name
		FROM account ";
		$strSQL_school .= " LEFT JOIN branch ON account.branchid = branch.branchid";
		$strSQL_school .= "	WHERE accid = '".$id_account_school."'";
		$objQuery_school = mysqli_query($con_ajtongmath_scho, $strSQL_school) or die ("Error Query [".$strSQL_school."]");
		$objResult_school = mysqli_fetch_array($objQuery_school);
		$id_branch_self = $objResult_school['id_branch_self'];
		$id_branch_school = $objResult_school['id_branch_school'];
		$account_status = $objResult_school['status'];
		$account_name = $objResult_school['account_name'];
		$branchname = $objResult_school['id_branch_self'];
	}
	error_reporting(~E_NOTICE);
?>