<?php

	include("config.inc.php");

	$strSTT = "SELECT * FROM account WHERE accid = '".$_SESSION["accid_cardpro"]."'";

	$objQuerySTT = mysqli_query($con_ajtongmath_scho, $strSTT);

	$objResultSTT = mysqli_fetch_array($objQuerySTT);

	//$session_status = $objResultSTT['status'];

	$_SESSION["db"] = "school";

    $session_status = $_SESSION["status"];

	$id_account_self = $_SESSION["mapid"];

	$id_account_school = $_SESSION["accid_cardpro"];

	if($_SESSION["accid_cardpro"] == ""){

		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

		echo "<script language='javascript'>alert('Please Login!!');</script>";

		echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";

		exit();

	}

?>