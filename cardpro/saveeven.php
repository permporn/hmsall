<?
session_start();
include("config.inc.php");
include("funtion.php");
include("ck_session.php");

	$s=date('Y-m-d');
	$type = $_GET["type"];
	$idstaff = $_POST["idstaff"];
if($type == "del"){
	$strSQL = "DELETE FROM even ";
	$strSQL .="WHERE evenid = '".$_GET["evenid"]."' ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){
		echo "Error del [".mysql_error()."]";
	}
}else{
	$strSQL = "INSERT INTO even ";
	$strSQL .="(even,date,idstaff) ";
	$strSQL .="VALUES ";
	$strSQL .="('".$_POST["even"]."','".$s."','".$idstaff."') ";
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Save [".mysql_error()."]";
	}
}
header("location:even.php");
?>