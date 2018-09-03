<?php

ob_start();

session_start();

include("config.inc.php");

	$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['txtUsername'])."'and Password = '".trim($_POST['txtPassword'])."' and status != 'end'";

	echo $strSQL;

	$objQuery = mysqli_query($con_ajtongmath_scho, $strSQL) or die(mysqli_error($con_ajtongmath_scho));

	$objResult = mysqli_fetch_array($objQuery);

	//print_r($objResult);

	if(!$objResult){

		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

		echo "<script language='javascript'>alert('Username Password ไม่ถูกต้อง');</script>";

		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";

	}else{

		$_SESSION["accid_cardpro"] = $objResult["accid"];

		$_SESSION["status"] = $objResult["status"];

		$_SESSION["mapid"] = $objResult["mapid"];

		header("location:index.php");
	}

?>