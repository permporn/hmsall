<?php
	/*** By Weerachai Nukitram ***/
	/***  http://www.ThaiCreate.Com ***/
include("config.inc.php");
include("AjaxPHPLoginForm2.php");
?>
<html>
<head>
<title>ThaiCreate.Com Ajax Tutorial</title>
<meta charset="utf-8">
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax(ID) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
		  var url = 'AjaxLoading2.php';
		  var pmeters = "tID="+ID;

			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			//*** Loading (Client -> Server) ***//
		   document.getElementById("imgLoading").style.display = '';
		   document.getElementById("mySpan").style.display = 'none';
			
			HttPRequest.onreadystatechange = function()
			{


				 if(HttPRequest.readyState == 3)  // Loading Request (Server -> Client)
				  {
					   //*** Loading ***//
					   document.getElementById("imgLoading").style.display = '';
					   document.getElementById("mySpan").style.display = 'none';
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {			 
						document.getElementById("imgLoading").style.display = 'none';
						document.getElementById("mySpan").style.display = '';					  
						document.getElementById('mySpan').innerHTML = HttPRequest.responseText;
				  }				
			}

	   }
	</script>
</head>
<body Onload="JavaScript:doCallAjax('1');">
<h1>My Content</h1>
<table width="562" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="120" valign="top">
	<?
	
	
	$strSQL = "SELECT * FROM student";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	while($objResult = mysql_fetch_array($objQuery))
	{
	?>
	<a href="JavaScript:doCallAjax('<?=$objResult["studentid"];?>');"><?=$objResult["name"].". ".$objResult["job"];?></a><br>
	<?
	}
	?>
		
	</td>
    <td width="660" valign="top">
	<div id="imgLoading" style="display='none';"><img src="loading.gif"></div>
	<span id="mySpan"></span>
	</td>
  </tr>
</table>
</body>
</html>