<?php
$user =$_POST[myName];
$str="select * from student where name ='$user'";
$result = mysqli_query($con_ajtongmath_self,$str);
$res = mysqli_num_rows($result);
if ($res){
echo 'true';
}else{
echo 'false';
}
?>