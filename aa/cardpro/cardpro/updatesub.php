<?
include ("config.inc.php");
$strSQL2 = "SELECT * FROM subject";
$objQuery2 = mysql_query($strSQL2);
while($objResult2 = mysql_fetch_array($objQuery2)){
	if($objResuet2['subcode'] == $_POST["code"] && $objResuet2['id_year'] == $_POST["term"])
	$check1++;	
	}
    if($check1==0)
	{
/*while($objResuet2 = mysql_fetch_array($objQuery2))
{
	 $sub= $objResuet2['subcode'];
	 $ter= $objResuet2['id_year'];
	 $cod =$_POST["code"];
	 
	if($_POST["code"]  == $objResuet2['subcode']){ 
	if( $_POST["term"] == $objResuet2['id_year'])
		{
			echo "<script>alert('รหัสวิชา และปีการศึกษา มีในระบบแล้ว);window.location='editsub.php';</script>";
		}
	}
	else{*/
		$strSQL = "UPDATE subject SET ";
		$strSQL .="subname = '".$_POST["subname"]."' ";
		$strSQL .=",subcode = '".$_POST["code"]."' ";
		$strSQL .=",price = '".$_POST["price"]."' ";
		$strSQL .=",day = '".$_POST["day"]."' ";
		$strSQL .=",time = '".$_POST["time"]."' ";
		$strSQL .=",date = '".$_POST["date"]."' ";
		$strSQL .=",edate = '".$_POST["edate"]."' ";
		$strSQL .=",type = '".$_POST["type"]."' ";
		$strSQL .=",roomid = '".$_POST["room"]."' ";
		$strSQL .=",teachid = '".$_POST["teacher"]."' ";
		$strSQL .=",id_year = '".$_POST["term"]."' ";
		$strSQL .="WHERE subid = '".$_GET["subid"]."' ";
		$objQuery = mysql_query($strSQL);
		$k=$_GET["subid"];
		header("location:editsub.php?subid=$k&action=1");
	}

?>