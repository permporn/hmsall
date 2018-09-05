<? 
session_start();
include("../config.inc.php");
ob_start();
include("funtion.php");
  $strSQL99 = "SELECT * FROM staff WHERE stid = '".$_SESSION["mapid"]."'";
  $objQuery99 = mysqli_query($con_ajtongmath_self,($strSQL99);
  $objResult99 = mysqli_fetch_array($objQuery99);
  
$name1=$_POST["txtUsername"];
$type=$_POST["type"];
$staffid=$_POST["staffid"];
$DateAddName = date("Y-m-d H:i:s");

$strSQL = "SELECT * FROM student WHERE `name`= '$name1' ";
$objQuery = mysqli_query($con_ajtongmath_self,($strSQL);
$objResult = mysqli_fetch_array($objQuery);

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
    $strSQL .="(name,school,pcode,tel,staffid,DateAddName) ";
    $strSQL .="VALUES ";
    $strSQL .="('".$name1."','".$_POST["school"]."','".$_POST["pcode"]."'";
    $strSQL .=",'".$_POST["tel"]."','".$staffid."','".$DateAddName."') ";
    $objQuery = mysqli_query($con_ajtongmath_self,($strSQL);
    if(!$objQuery){
      echo "Error Save [".$strSQL."]";
    }
    else{
        if($type == "addacount"){
        header("location:manageaccount.php?name=$name");
        }
        else if($type == "addacount_free"){
        header("location:manageaccount_tutorfree.php?name=$name");
        }
        else if($type == "addacount_franchise"){
        header("location:manageaccount_franchise.php?name=$name");
        }
        else{header("location:addstudent.php?name=$name");}
        }
}
?>