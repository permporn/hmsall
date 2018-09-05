<?
header("Content-type:application/json; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false); 
include("../config.inc.php");
$pagesize = 20; // จำนวนรายการที่ต้องการแสดง  
$table_db="student"; // ตารางที่ต้องการค้นหา  
$find_field="name"; // ฟิลที่ต้องการค้นหา  
if($_GET['term']!=""){  
    $q = $_GET["term"];  
    $sql = "select * from $table_db  where  locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize";  
}else{  
    $sql = "select * from $table_db  where 1 limit $pagesize";        
}  
$qr=mysqli_query($con_ajtongmath_self,$sql);  
$total=mysqli_num_rows($qr);  
echo '[ ';  
$i=0;  
while ($rs=mysqli_fetch_array($qr)) {  
    $i++;  
echo '{"id":"'.$rs['studentid'].'","label":"'.str_replace("&quot;","",htmlentities($rs['name'], ENT_QUOTES, "UTF-8")).'","value":"'.str_replace("&quot;","",htmlentities($rs['name'], ENT_QUOTES, "UTF-8")).'"}';  
    if($i<$total){  
        echo ",";     
    }  
}  
echo ' ]';  
mysqli_close($con_ajtongmath_self);    
exit;  
?>