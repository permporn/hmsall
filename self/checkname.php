<?php
  $user =$_POST[myName]; 
 $str="select * from student where name ='$user'";
 $result = mysql_query($str,$conn);
  $res = mysql_num_rows($result);
   if ($res){         
     echo 'true';
   }else{
      echo 'false';
   }
?>
