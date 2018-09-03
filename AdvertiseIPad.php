<?php

    header('Content-type: application/json');

    

        $DB_HOSTNAME = "localhost";

        $DB_NAME = "ajtongmath_scho";

        $DB_USER = "72o35XDJ";

        $DB_PASS = "ajtongmath_scho";

        

        $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());

        mysql_select_db($DB_NAME,$conn) or die(mysql_error());

        

        $sql = "SELECT * FROM Advertise WHERE id='2'";

        

        $result = mysql_query($sql,$conn) or die(mysql_error());

        

		$rows = array();

        

        while($r = mysql_fetch_assoc($result)){

				$rows[] = $r;

		}

        

		mysql_close();



		echo json_encode($rows);

?>