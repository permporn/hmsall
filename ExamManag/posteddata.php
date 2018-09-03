<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
include("config.php");
$value = $_POST["editor1"];
/*if (!empty($_POST))
{
	foreach ( $_POST as $key => $value )
	{
		if ( ( !is_string($value) && !is_numeric($value) ) || !is_string($key) )
			continue;

		if ( get_magic_quotes_gpc() )
			$value = htmlspecialchars( stripslashes((string)$value) );
			
		else
			$value = htmlspecialchars( (string)$value );*/
			
		$strSQL = "INSERT INTO ex_question ";
		$strSQL .="(question) ";
		$strSQL .="VALUES ";
		$strSQL .="('$value') ";
		$objQuery = mysql_query($strSQL);
		if(!$objQuery)
		{
			echo "Error Save [".mysql_error()."]";
		}
		
?>

