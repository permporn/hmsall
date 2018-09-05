<?php
session_start();
include("ck_session_self.php");

$strUsername = trim($_POST["tUsername"]);

if(trim($strUsername) == "")
{
	echo "<img src='images/false.png'>";
	exit();
}

//*** Check Username (already exists) ***//

$strSQL = "SELECT * FROM student WHERE name = '".$strUsername."' ";
$objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");
$objResult = mysqli_fetch_array($objQuery);
if($objResult)
{
	echo "<img src='../images/false.png'>";
}
else
{
	echo "<img src='../images/true.png'>";
}

mysqli_close($con_ajtongmath_self);
?>