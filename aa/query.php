<?php

       header('Content-type: application/json');

if($_POST) {
        $DB_HOSTNAME = "10.10.11.14:3306";
        $DB_NAME = "school";
        $DB_USER = "AizeRo2";
        $DB_PASS = "076424746";

             $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());
	     mysql_select_db($DB_NAME,$conn) or die(mysql_error());
    
	    $sql = "SELECT * FROM path_video pv inner join (SELECT * FROM map_video WHERE studentid='" . $_POST['studentid'] ."') mv on pv.id_ref_video=mv.id_ref_video  group by pv.id_ref_video,pv.name_video,pv.video_ref,pv.detail,pv.title,pv.date_video,pv.time_video";

    
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