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

        

        $sql = "SELECT * FROM learn WHERE studentid='" . $user  . "' and pass='" . $pass . "'";

        

        $result = mysql_query($sql,$conn) or die(mysql_error());



        $num = mysql_numrows($result);

        

        if($num == 1) {

			while($row = mysql_fetch_array($result, MYSQL_ASSOC)){

				if($row['active_session'] == "CheckIn")

				{

						// Another Login

                                               $sql_Time = "SELECT TIMEDIFF( NOW( ) , start_active ) FROM learn WHERE learnid='" . $user . "' "

							. "AND TIMEDIFF( NOW( ) , start_active ) <= '02:00:00'";

					

					      $result_time = mysql_query($sql_Time,$conn) or die(mysql_error());



					     if(mysql_numrows($result_time)<1)

					     {

                                                        $sql_update = "UPDATE learn SET active_session='CheckIn' , start_active=NOW() WHERE "

								. "studentid='" . $user . "'";

							$result_update = mysql_query($sql_update,$conn) or die(mysql_error());



							if($result_update)

							{

								echo '{"success":1}';

							}

							else{

								echo '{"success":4,"error_message":"Login Failed."}';

							}

                                              }

					     else

                                             {

                                                      echo '{"success":3,"error_message":"Do you want to logout."}';

                                             }

				}

				else

				{

							$sql_update = "UPDATE learn SET active_session='CheckIn' , start_active=NOW() WHERE "

								. "studentid='" . $user . "'";

							$result_update = mysql_query($sql_update,$conn) or die(mysql_error());



							if($result_update)

							{

								echo '{"success":1}';

							}

							else{

								echo '{"success":4,"error_message":"Login Failed."}';

							}

				}

			}



        } else {

            echo '{"success":0,"error_message":"Username and/or password is invalid."}';

        }



		mysql_close();



    }else {    echo '{"success":2,"error_message":"Connection Failed."}';}

?>