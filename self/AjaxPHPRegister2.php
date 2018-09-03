<?php
include("config.inc.php");
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/

	$strUsername = trim($_POST["tUsername"]);

	if(trim($strUsername) == "")
	{
		echo "<img src='images/false.png'>";
		exit();
	}

	

	//*** Check Username (already exists) ***//

	$strSQL = "SELECT * FROM student WHERE name = '".$strUsername."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "<img src='images/false.png'>";
	}
	else
	{
		echo "<img src='images/true.png'>";
	}

	mysql_close();
?>