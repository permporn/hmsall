<?php

			function TimeDiff($strTime1,$strTime2)
		 	{
				return (strtotime($strTime2) - strtotime($strTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
		 	}
		 	if($_GET['id_subject'] != ''){
		 		$id_couses = $_GET['id_subject'];
		 	}else{
		 		$id_couses = 0;
		 	}
			
			$str_log_seat = "SELECT * FROM `seat_log` WHERE `subject_id` = '".$id_couses."' ORDER BY seat_no" ;
			$objQuery_log_seat = mysql_query($str_log_seat) or die ("Error Query [".$str_log_seat."]");
			
			while ( $objResult_seat = mysql_fetch_array($objQuery_log_seat)) {

					if($objResult_seat['status'] == 2 || $objResult_seat['status'] == 3){
					
						$strSQL_seat = "SELECT
										seat_log.id,
										seat_log.seat_no,
										seat_log.subject_id,
										seat_log.`status`,
										`subject`.subcode,
										student.studentname
										FROM
										seat_log
										LEFT JOIN `subject` ON `subject`.subid = seat_log.subject_id
										LEFT JOIN learn ON `subject`.subcode = learn.subcode 
										AND learn.seat = seat_log.seat_no
										INNER JOIN student ON student.studentid = learn.studentid
										WHERE seat_log.subject_id = ".$id_couses;
					$objQuery_seat = mysql_query($strSQL_seat) or die ("Error Query [".$strSQL_seat."]");
						while ( $objResult_seat = mysql_fetch_array($objQuery_seat)) {
							$i=$objResult_seat['seat_no'];
							$seat[$i] = $objResult_seat['status'];
							$seat_text[$i] = "ที่นั่ง ".$objResult_seat['seat_no'];
							if($id_couses =="7167" || $id_couses =="7168"){}else{
							$seat_text[$i] = "ที่นั่ง ".$objResult_seat['seat_no']." - ".$objResult_seat['studentname'];
							}
						}					
					}else{
						$i = $objResult_seat['seat_no'];
						$seat_time[$i] = $objResult_seat['update'];
						$time_diff = TimeDiff( $seat_time[$i] , date("d-m-Y H:i:s") );
						$seat[$i] = $objResult_seat['status'];
						$seat_text[$i] = "ที่นั่ง ".$objResult_seat['seat_no']." - กำลังทำรายการ";

						if($time_diff >= 0.0833333333333){ // time over 5 min
							$strSQL = "DELETE FROM `seat_log` WHERE id = ".$objResult_seat['id']; 
							$objQuery = mysql_query($strSQL);
						}
					}
				}

			$strSQL_subject = "SELECT
			`subject`.subid,
			`subject`.subname,
			`subject`.subcode,
			`subject`.price,
			`subject`.`day`,
			`subject`.time,
			`subject`.date,
			`subject`.edate,
			`subject`.type,
			`subject`.teachid,
			`subject`.roomid,
			`subject`.id_year,
			teacher.teachername,
			term.term,
			`year`.nameyear
			FROM
			`subject`
			LEFT JOIN teacher ON teacher.teacherid = `subject`.teachid
			LEFT JOIN addterm ON addterm.id_year = `subject`.id_year
			LEFT JOIN term ON term.termid = addterm.termid
			LEFT JOIN `year` ON `year`.id = addterm.year_id
			WHERE `subid` = ".$id_couses;
			$objQuery_subject = mysql_query($strSQL_subject) or die ("Error Query [".$strSQL_subject."]");
			$objResult_subject = mysql_fetch_array($objQuery_subject);


                       if($_GET['mode'] == "remove_learn" && $_GET['id_learn'] != "" && $_GET['seat_log_id'] != ""){
				$id_subject = $_GET['id_subject'];
				$strSQL_delete_learn = "DELETE FROM learn WHERE learnid = ".$_GET['id_learn']; 
				$objQuery_delete_learn = mysql_query($strSQL_delete_learn);
				
				if(!$objQuery_delete_learn){
					echo "fail!!  : $strSQL_delete_learn (query_01.php)";
				}else{
					$strSQL_delete_seat = "DELETE FROM seat_log WHERE id = ".$_GET['seat_log_id']; 
					$objQuery_delete_seat = mysql_query($strSQL_delete_seat);
					//echo "Success : $objQuery_delete_seat (query_01.php)";
					echo '<script type="text/javascript">
					           window.location = "?id_subject='.$id_subject.'"
					      </script>';
				}
			}

	?>