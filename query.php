<?php

header('Content-type:application/json;charset=utf-8');

if($_POST) {
        $DB_HOSTNAME = "localhost";
        $DB_NAME = "ajtongmath_scho";
        $DB_USER = "ajtongmath_scho";
        $DB_PASS = "72o35XDJ";

             $conn = mysql_connect($DB_HOSTNAME,$DB_USER,$DB_PASS) or die(mysql_error());
          
	     mysql_select_db($DB_NAME,$conn) or die(mysql_error());
             mysql_query("SET NAMES utf8");

	    $sql = "SELECT * FROM path_video pv inner join (SELECT * FROM map_video WHERE studentid='" . $_POST['studentid'] ."') mv on pv.id_ref_video=mv.id_ref_video where pv.status='1' group by pv.id_ref_video,pv.name_video,pv.video_ref,pv.detail,pv.title,pv.date_video,pv.time_video,pv.subcode,pv.id_year,pv.status,pv.img_deatail";
           
    
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