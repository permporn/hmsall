<?php



header('Content-type:application/json;charset=utf-8');



echo $sql;

if($_POST) {

        $DB_HOSTNAME = "localhost";

        $DB_NAME = "ajtongmath_scho";

        $DB_USER = "ajtongmath_scho";

        $DB_PASS = "72o35XDJ";



             $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());

          

	     mysql_select_db($DB_NAME,$conn) or die(mysql_error());

             mysql_query("SET NAMES utf8");



	    $sql = "SELECT s.studentname as studentname, sv.name_subj as subname FROM learn l inner join student s on l.studentid=s.studentid inner join map_video m on l.studentid=m.studentid inner join path_video p on m.id_ref_video=p.id_ref_video inner join subj_video sv on p.subcode=sv.id_subj_video WHERE l.studentid='" . $_POST['username'] . "' LIMIT 1";

           



	    $result = mysql_query($sql,$conn) or die(mysql_error());

	

	    $num = mysql_numrows($result);

	

	     mysql_close();

	

	     $rows = array();

	

	      while($r = mysql_fetch_assoc($result)){

		  $rows[] = $r;

	     }



      echo json_encode($rows);

 }else {    echo '{"success":2,"error_message":"Username and/or password is invalid."}';}

?>