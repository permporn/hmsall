<?
include ("config.inc.php");

	$staffid = $_GET["staffid"];
	$name = $_POST["name"];
	$k = $_GET["studentid"];
	
	$strSQL = "SELECT * FROM student WHERE name = '".$name." '";
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$objResult = mysql_fetch_array($objQuery);
	
	if(!$objResult){
	$strSQL = "UPDATE student SET ";
	$strSQL .="name = '".$name."' ";
	$strSQL .=",school = '".$_POST["school"]."' ";
	$strSQL .=",tel = '".$_POST["tel"]."' ";
	$strSQL .=",staffid = '".$staffid."' ";
	$strSQL .="WHERE studentid = '".$_GET["studentid"]."' ";
	
	$objQuery = mysql_query($strSQL);
	if(!$objQuery)
	{
		echo "Error Update [".mysql_error()."]";
	}
	
	
	header("location:searchstudent.php?studentid=$k&h_arti_id=$name");
	}else{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ชื่อซ้ำ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=managestudent.php?studentid=$k&h_arti_id=$name'>";
		exit();
	}
	?>