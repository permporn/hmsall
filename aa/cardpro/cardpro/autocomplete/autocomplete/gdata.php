<?php  
    header("Content-type:text/html; charset=tis-620");          
    header("Cache-Control: no-store, no-cache, must-revalidate");         
    header("Cache-Control: post-check=0, pre-check=0", false);         

    // เชื่อมต่อฐานข้อมูล  
    include "dbconfig.php";
    conndb();
       
    $q = urldecode($_GET["q"]);
    $q = iconv("UTF-8","TIS-620",$q);


    $pagesize = 50; // จำนวนรายการที่ต้องการแสดง  
    $table_db="test_tb1"; // ชื่อตารางที่ต้องการค้นหา  
    $find_field="subject"; // ชื่อฟิลด์ที่ต้องการค้นหา  


    $sql = "select * from $table_db  where locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize";  
    $results = mysql_query($sql);  
    while ($row = mysql_fetch_array( $results )) {  

        $id = $row["id"]; // ฟิลที่ต้องการส่งค่ากลับ
        //$name = ucwords( strtolower( $row["subject"] ) ); // ฟิลด์ที่ต้องการแสดงค่า
        $name = $row["subject"]; // ฟิลด์ที่ต้องการแสดงค่า

        // ป้องกันเครื่องหมาย '  
        $name = str_replace("'", "'", $name);  
        // กำหนดตัวหนาให้กับคำที่มีการพิมพ์  
        $display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $name);  
        echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";  
    }  

    closedb();
?>  