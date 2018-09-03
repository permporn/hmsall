<?

ob_start();

session_start();

include("config.inc.php");

	$strSQL = "SELECT * FROM account WHERE username = '".trim($_POST['txtUsername'])."'and Password = '".trim($_POST['txtPassword'])."' and status != 'end'";

	$objQuery = mysqli_query($con_ajtongmath_scho,$strSQL);

	$objResult = mysqli_fetch_array($objQuery);

	if(!$objResult){

			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

			echo "<script language='javascript'>alert('Username Password ไม่ถูกต้อง');</script>";

			echo "<meta http-equiv='refresh' content='0;URL=Login.php'>";

	}else{

			$_SESSION["accid_cardpro"] = $objResult["accid"];

			$_SESSION["status"] = $objResult["status"];

			$_SESSION["mapid"] = $objResult["mapid"];

			header("location:index.php");
	}

mysqli_close();



/*include("self/config.incself.php");

	

	$strSQL_self = "SELECT * FROM staff WHERE stid = '".$_SESSION['mapid']."'";

	$objQuery_self = mysql_query($strSQL_self);

	$objResult_self = mysql_fetch_array($objQuery_self);

	

	$_SESSION["stid"] = $objResult_self["stid"];

	

mysql_close();	*/

/*echo $_SESSION["stid"]." ".$_SESSION["accid"]." ".$_SESSION["status"]." ".$_SESSION["mapid"]."<br>"; 

echo "stid >> accid >> status >> mapid"; */

?>