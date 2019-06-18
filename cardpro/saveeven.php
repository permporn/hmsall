<?php
session_start();

include("config.inc.php");

	$s=date('Y-m-d');

	$type = $_GET["type"];

	$idstaff = $_POST["idstaff"];

if($type == "del"){

	$strSQL = "DELETE FROM even ";

	$strSQL .="WHERE evenid = '".$_GET["evenid"]."' ";

	$objQuery = mysqli_query($con_ajtongmath_scho, $strSQL);

	if(!$objQuery){
		echo "Error del [".mysqli_error()."]";
	}else {
		header("location:even.php");
	}

}else{

	$even = $_POST["even"];

	$strSQL = "INSERT INTO even ";

	$strSQL .="(even,date,idstaff) ";

	$strSQL .="VALUES ";

	$strSQL .="('".$even."','".$s."','".$idstaff."') ";

	$objQuery = mysqli_query($con_ajtongmath_scho, $strSQL);

	if(!$objQuery){
		echo "Error Save [".mysqli_error()."]";
	}else {
		header("location:even.php");
	}
}



?>