<?
include ("config.inc.php");
$strSQL2 = "SELECT * FROM addterm WHERE year_id = '".$_POST["yearid"]."' && termid = '".$_POST["term"]."'";
$objQuery2 = mysql_query($strSQL2);
$i=0;
while($objResult2 = mysql_fetch_array($objQuery2))
	{$i++;}
	if($i>0)
		{
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ข้อมูลซ้ำ');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=term.php'>";
		}
	else if($i==0){
		$strSQL = "INSERT INTO  addterm ";
		$strSQL .="(year_id ,termid) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$_POST["yearid"]."' ";
		$strSQL .=",'".$_POST["term"]."') ";
		$objQuery = mysql_query($strSQL);
			if(!$objQuery)
			{
				echo "Error Save [".mysql_error()."]";
			}
	header("location:term.php");
	}
?>