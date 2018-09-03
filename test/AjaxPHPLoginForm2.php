<?php
sleep(3);
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/

	session_start();

	$strUsername = trim($_POST["tUsername"]);
	$strPassword = trim($_POST["tPassword"]);
	
	//*** Check Username ***//
	if(trim($strUsername) == "")
	{
		echo "<font color=red>**</font> Plase input [Username]";
		exit();
	}
	
	//*** Check Password ***//
	if(trim($strPassword) == "")
	{
		echo "<font color=red>**</font> Plase input [Password]";
		exit();
	}
	

	include("config.inc.php");

	//*** Check Username & Password ***//

	$strSQL = "SELECT * FROM account WHERE Username = '".$strUsername."' and Password = '".$strPassword."' ";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	if($objResult)
	{
		echo "Y";

		//*** Session ***//
		$_SESSION["Username"] = $strUsername;
		session_write_close();
	}
	else
	{
		echo "<font color=red>**Username & Password is wrong</font> ";
	}

	mysql_close();
?>