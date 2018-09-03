<?php
	
	session_start();
	include("ck_session.php");

	//search student name
	$sql = "SELECT studentid, studentname FROM student
			WHERE studentname LIKE '%".$_GET['query']."%'
			LIMIT 20"; 
	$result = mysql_query($sql) or die ("Error Query [".$sql."]");;
	
	$i = 0;
	while($row = mysql_fetch_array($result)){
		 $json[$i]['id'] = $row['studentid'];
	     $json[$i]['name'] = $row['studentname'];
		 $i++;
	}

	echo json_encode($json);
	
?>