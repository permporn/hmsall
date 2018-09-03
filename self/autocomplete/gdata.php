<?php  
header("Content-type:text/html; charset=UTF-8");          
header("Cache-Control: no-store, no-cache, must-revalidate");         
header("Cache-Control: post-check=0, pre-check=0", false);         
// เชื่อมต่อฐานข้อมูล  
$link=mysql_connect("127.0.0.1","root","1234") or die("error".mysql_error());  
mysql_select_db("selfdb",$link);  
mysql_query("set character set utf8");  
   
$q = urldecode($_GET["q"]);  
$pagesize = 50; // จำนวนรายการที่ต้องการแสดง  
$table_db="student"; // ตารางที่ต้องการค้นหา  
$find_field="username"; // ฟิลที่ต้องการค้นหา  
$sql = "select * from $table_db  where locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize";  
$results = mysql_query($sql);  
while ($row = mysql_fetch_array( $results )) {  
    $id = $row["arti_id"]; // ฟิลที่ต้องการส่งค่ากลับ  
    $name = ucwords( strtolower( $row["arti_topic"] ) ); // ฟิลที่ต้องการแสดงค่า  
    // ป้องกันเครื่องหมาย '  
    $name = str_replace("'", "'", $name);  
    // กำหนดตัวหนาให้กับคำที่มีการพิมพ์  
    $display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $name);  
    echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";  
}  
mysql_close();  
?>  