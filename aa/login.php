<?php
    header('Content-type: application/json');

    if($_POST) {
        $DB_HOSTNAME = "10.10.11.14:3306";
        $DB_NAME = "school";
        $DB_USER = "AizeRo2";
        $DB_PASS = "076424746";
        
        $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());
        mysql_select_db($DB_NAME,$conn) or die(mysql_error());
        
        $sql = "SELECT * FROM learn WHERE studentid='" . $_POST['username'] . "' and pass='" . $_POST['password'] . "'";
        
        $result = mysql_query($sql,$conn) or die(mysql_error());
        
        $num = mysql_numrows($result);
        
        mysql_close();
        
        $rows = array();
    
        if($num == 1) {
            echo '{"success":1}';
        } else {
            echo '{"success":0,"error_message":"Username and/or password is invalid."}';
        }
    }else {    echo '{"success":2,"error_message":"Username and/or password is invalid."}';}
?>