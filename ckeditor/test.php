<? include("config.inc.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="samples/sample.css">
<script language="JavaScript" src="ckeditor.js"></script>
<script language="JavaScript" src="plugin.js"></script>
</head>
<?  
$strSQL = "SELECT * FROM datamath";
$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
mysql_query("SET NAMES UTF8");
?>
				
<body>
<? while ($data = mysql_fetch_array($objQuery) ) {
	 $data	= html_entity_decode($data['datamath']); 
	 echo $data;
}
?> 

</body>
</html>