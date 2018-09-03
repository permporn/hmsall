<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sample &mdash; CKEditor</title>
	<link rel="stylesheet" href="samples/sample.css">
</head>
<body>
	<h1 class="samples">
		CKEditor &mdash; Posted Data
	</h1>
	<table border="1" cellspacing="0" id="outputSample">
		<colgroup><col width="120"></colgroup>
		<thead>
			<tr>
				<th>Field&nbsp;Name</th>
				<th>Value</th>
			</tr>
		</thead>
<?php
include("config.inc.php");
if (!empty($_POST))
{
	foreach ( $_POST as $key => $value )
	{
		if ( ( !is_string($value) && !is_numeric($value) ) || !is_string($key) )
			continue;

		if ( get_magic_quotes_gpc() )
			$value = htmlspecialchars( stripslashes((string)$value) );
			
		else
			$value = htmlspecialchars( (string)$value );
			
		$strSQL = "INSERT INTO datamath ";
		$strSQL .="(datamath) ";
		$strSQL .="VALUES ";
		$strSQL .="('$value') ";
		$objQuery = mysql_query($strSQL);
		if(!$objQuery)
		{
			echo "Error Save [".mysql_error()."]";
		}
		//else{header("location:test.php");}
?>

		
		<tr>
			<th style="vertical-align: top"><?php echo htmlspecialchars( (string)$key ); ?></th>
			<td><pre class="samples"><?php echo $value; ?></pre></td>
		</tr>
        <a href="test.php">แสดง</a>


	<?php
	}
}
?>
	</table>

</body>
</html>
