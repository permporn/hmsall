<?php

    header('Content-type: application/json');

    

    if($_POST) {
        
        $DB_HOSTNAME = "localhost";

        $DB_NAME = "ajtongmath_scho";

        $DB_USER = "ajtongmath_scho";

        $DB_PASS = "72o35XDJ";
        

        $user = $_POST['username'];

        $pass = $_POST['password'];

        

        $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());

        mysql_select_db($DB_NAME,$conn) or die(mysql_error());

        

        $sql = "SELECT * FROM learn WHERE studentid='" . $user  . "' and pass='" . $pass . "' AND active_session='CheckIn'";

        

        $result = mysql_query($sql,$conn) or die(mysql_error());

        

        $num = mysql_numrows($result);

        

        if($num == 1) {

            $sql_update = "UPDATE learn SET active_session='CheckIn' , start_active=NOW() WHERE "

                . "studentid='" . $user . "'";

            $result_update = mysql_query($sql_update,$conn) or die(mysql_error());

                        

            if($result_update)

            {

                echo '{"success":1}';

            }

            else{

                echo '{"success":3,"error_message":"Logout."}';

            }

            

        } else {

            echo '{"success":0,"error_message":"Logout"}';

        }

        

		mysql_close();

        

    }else {    echo '{"success":2,"error_message":"Connection Failed."}';}

?>