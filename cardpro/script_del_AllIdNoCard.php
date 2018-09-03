<?

	include("config.inc.php");
	
	$STR_all = "SELECT * FROM hms_allstudent ORDER BY id";   
	$OQ_all = mysql_query($STR_all);
	while($RQ_all = mysql_fetch_array($OQ_all)){ 
		
		$STR_CARD = "SELECT * FROM hms_card WHERE id_allstudent = '".$RQ_all['id']."'"; //check in hms_allstudent 
		$OQ_CARD = mysql_query($STR_CARD);
		$RQ_CARD = mysql_num_rows($OQ_CARD);
		if($RQ_CARD == 0){ //if not have resort in card 
			
			echo $RQ_all['id'].'<BR>';  //for test 
			/* $str_del = "DELETE FROM hms_allstudent ";  //del in hms_allstudent
			$str_del .="WHERE id = '".$RQ_all['id']."' ";
			$objQuery = mysql_query($str_del); */
		}
	}


?>