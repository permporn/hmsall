<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>
<?php
include("config.inc.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

 	$strSQL6 = "SELECT * FROM  path_video ";
	$objQuery6 = mysql_query($strSQL6) or die ("Error Query [".$strSQL6."]");  
?>
<body>
<form name="form1" method="post" action="savemap.php">
 <input  type="text" value="<?=$_GET["subcode"]?>" name="subcode" readonly/>
 <input  type="text" value="<?=$_GET["id_year"]?>" name="id_year"readonly/>
 <select name="id_ref_video" id="id_ref_video"><? while($objResult6 = mysql_fetch_array($objQuery6)){?>
 	<option value="<?=$objResult6["id_ref_video"];?>"><?=$objResult6["name_video"];?></option> <? } ?>
 </select>
 <input type="submit" name="Save" id="Save" value="Save">
</form>
</body>
</html>