<? 
include("config.inc.php");
ob_start();
include("funtion.php");
	$strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["stid"]."'";
	$objQuery99 = mysql_query($strSQL99);
	$objResult99 = mysql_fetch_array($objQuery99);
	
$name1=$_POST["txtUsername"];
$type=$_POST["type"];
$staffid=$_POST["staffid"];

$strSQL = "SELECT * FROM student WHERE `name`= '$name1' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);

	if($objResult != ''){
		echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
		echo "<script language='javascript'>alert('ชื่อนี้มีในระบบแล้วครับ!!');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=addstudent2.php'>";
	}else{
		$realname = $HTTP_POST_FILES['fileupload']['name'];
		$name=$_POST["txtUsername"];
	
	if(is_uploaded_file($HTTP_POST_FILES['fileupload']['tmp_name'])){
		 copy($HTTP_POST_FILES['fileupload']['tmp_name'], "./myfile/$realname");
		 $Url="myfile/$realname";
		 $Filename=$HTTP_POST_FILES['fileupload']['name'];
		 $size=$HTTP_POST_FILES['fileupload']['size']/1024/1024;
		 $size1=number_format($size,3);
	}else{
		echo " Upload not complete";
		} 
		$strSQL = "INSERT INTO student ";
		$strSQL .="(name,school,tel,filename,staffid) ";
		$strSQL .="VALUES ";
		$strSQL .="('".$name1."','".$_POST["school"]."' ";
		$strSQL .=",'".$_POST["tel"]."','".$Url."','".$staffid."') ";
		$objQuery = mysql_query($strSQL);
		if(!$objQuery){
			echo "Error Save [".mysql_error()."]";
		}
		else{header("location:manageaccount.php?name=$name");}
}
?>