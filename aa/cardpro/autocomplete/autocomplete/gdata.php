<?php  
    header("Content-type:text/html; charset=tis-620");          
    header("Cache-Control: no-store, no-cache, must-revalidate");         
    header("Cache-Control: post-check=0, pre-check=0", false);         

    // �������Ͱҹ������  
    include "dbconfig.php";
    conndb();
       
    $q = urldecode($_GET["q"]);
    $q = iconv("UTF-8","TIS-620",$q);


    $pagesize = 50; // �ӹǹ��¡�÷���ͧ����ʴ�  
    $table_db="test_tb1"; // ���͵��ҧ����ͧ��ä���  
    $find_field="subject"; // ���Ϳ�Ŵ����ͧ��ä���  


    $sql = "select * from $table_db  where locate('$q', $find_field) > 0 order by locate('$q', $find_field), $find_field limit $pagesize";  
    $results = mysql_query($sql);  
    while ($row = mysql_fetch_array( $results )) {  

        $id = $row["id"]; // ��ŷ���ͧ����觤�ҡ�Ѻ
        //$name = ucwords( strtolower( $row["subject"] ) ); // ��Ŵ����ͧ����ʴ����
        $name = $row["subject"]; // ��Ŵ����ͧ����ʴ����

        // ��ͧ�ѹ����ͧ���� '  
        $name = str_replace("'", "'", $name);  
        // ��˹����˹����Ѻ�ӷ���ա�þ����  
        $display_name = preg_replace("/(" . $q . ")/i", "<b>$1</b>", $name);  
        echo "<li onselect=\"this.setText('$name').setValue('$id');\">$display_name</li>";  
    }  

    closedb();
?>  