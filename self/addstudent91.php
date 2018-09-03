<? 
include("config.inc.php");
ob_start();
$name1=$_POST["txtUsername"];
$strSQL = "SELECT * FROM student WHERE name = '".$_POST["txtUsername"]."' ";
$objQuery = mysql_query($strSQL);
$objResult = mysql_fetch_array($objQuery);
if($objResult)
{echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('ชื่อนี้มีในระบบแล้วครับ!!');</script>";
echo "<meta http-equiv='refresh' content='0;URL=manageaccount.php?name=$name1'>";
 }
else
{
$realname = $HTTP_POST_FILES['fileupload']['name'];
$name=$_POST["txtUsername"];

if (is_uploaded_file($HTTP_POST_FILES['fileupload']['tmp_name']) )
  {
     copy($HTTP_POST_FILES['fileupload']['tmp_name'], "./myfile/$realname");
	$Url="myfile/$realname";
	 $Filename=$HTTP_POST_FILES['fileupload']['name'];
	 $size=$HTTP_POST_FILES['fileupload']['size']/1024/1024;
	$size1=number_format($size,3);
  } else{
     echo " Upload not complete";
   } 
$strSQL = "INSERT INTO student ";
$strSQL .="(name,school,tel,filename) ";
$strSQL .="VALUES ";
$strSQL .="('".$_POST["txtUsername"]."','".$_POST["school"]."' ";
$strSQL .=",'".$_POST["tel"]."','".$Url."') ";
$objQuery = mysql_query($strSQL);
if(!$objQuery)
{
echo "Error Save [".mysql_error()."]";
}


mysql_close();
header("location:manageaccount9.php?name=$name");
}
?>