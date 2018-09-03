<?php
 include("config.inc.php");
 echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

 $date0 = $_POST["date0"];
 $date1 = $_POST["date1"];
 $time = $_POST["time"];
 $timeend = $_POST["timeend"];
 $nums1 = $_POST["nums1"];
 $local = $_POST["local"];
 
 //echo "nums1 = ".$_POST["nums1"]."<br>";
 //echo $date0 . " ถึง " . $date1 ."<br>";
 
 function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
 $num = DateDiff($date0,$date1); 
 //echo "num = ".$num ."<br >";
 
 function add_date($givendate,$day=0,$mth=0,$yr=0) {
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d ', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
     }
	 
	//echo $date0."<br>";
	//echo $time . "," .$timeend ."<br>"  ;
	
	$nn1 = 0;$nn2 = 0;$nn3 = 0;$nn4 = 0;$nn5 = 0;$nn6 = 0;$nn7 = 0;$nn8 = 0;$nn9 = 0;$nn10 = 0;$nn11 = 0;$nn12 = 0;$nn13 = 0;$nn14 = 0;$nn15 = 0;
	$nn16 = 0;$nn17 = 0;$nn18 = 0;$nn19 = 0;$nn20 = 0;$nn21 = 0;$nn22 = 0;$nn23 = 0;$nn24 = 0;$nn25 = 0;
  	
	for($a = $timeend ;  $time <= $a; $time++){
	 $time = $time;
	 //echo  $time;
	 if($time == 1){$nn1 = $_POST["nums1"];/*echo "<br> nn1=".$nn1."<br>";*/}
	 if($time == 2){$nn2 = $_POST["nums1"];}
	 if($time == 3){$nn3 = $_POST["nums1"];}
	 if($time == 4){$nn4 = $_POST["nums1"];}
	 if($time == 5){$nn5 = $_POST["nums1"];}
	 if($time == 6){$nn6 = $_POST["nums1"];}
	 if($time == 7){$nn7 = $_POST["nums1"];}
	 if($time == 8){$nn8 = $_POST["nums1"];}
	 if($time == 9){$nn9 = $_POST["nums1"];}
	 if($time == 10){$nn10 = $_POST["nums1"];}
	 if($time == 11){$nn11 = $_POST["nums1"];}
	 if($time == 12){$nn12 = $_POST["nums1"];}
	 if($time == 13){$nn13 = $_POST["nums1"];}
	 if($time == 14){$nn14 = $_POST["nums1"];}
	 if($time == 15){$nn15 = $_POST["nums1"];}
	 if($time == 16){$nn16 = $_POST["nums1"];}
	 if($time == 17){$nn17 = $_POST["nums1"];}
	 if($time == 18){$nn18 = $_POST["nums1"];}
	 if($time == 19){$nn19 = $_POST["nums1"];}
	 if($time == 20){$nn20 = $_POST["nums1"];}
	 if($time == 21){$nn21 = $_POST["nums1"];}
	 if($time == 22){$nn22 = $_POST["nums1"];}
	 if($time == 23){$nn23 = $_POST["nums1"];}
	 if($time == 24){$nn24 = $_POST["nums1"];}
	 if($time == 25){$nn25 = $_POST["nums1"];}
	 }	
	
	for($i=0 ; $i<=$num ;$i++){
		
		$str = "SELECT * FROM  `seats` WHERE  `date` =  '".$date0."' AND  branchid = ".$local;
		//echo $str .'<br>';
		$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
		
		$objResult = mysql_fetch_array($objQuerystr);
		
			if($objResult != ''){
				echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
				echo "<script language='javascript'>alert('วันซ้ำ $date0');</script>";
			}else{
					
			$strSQL = "INSERT INTO  `selfdb`.`seats` (`date` ,`1` ,`2` ,`3` ,`4` ,`5` ,`6` ,`7` ,`8` ,`9` ,`10` ,`11` ,`12` ,`13` ,`14` ,`15` ,`16` ,`17` ,`18` ,`19` ,`20` ,`21`,`22`,`23`,`24` ,`25` ,`branchid`)";
			$strSQL .= " VALUES ('".$date0."'";
			$strSQL .= ",'".$nn1."'";
			$strSQL .= ",'".$nn2."'";
			$strSQL .= ",'".$nn3."'";
			$strSQL .= ",'".$nn4."'";
			$strSQL .= ",'".$nn5."'";
			$strSQL .= ",'".$nn6."'";
			$strSQL .= ",'".$nn7."'";
			$strSQL .= ",'".$nn8."'";
			$strSQL .= ",'".$nn9."'";
			$strSQL .= ",'".$nn10."'";
			$strSQL .= ",'".$nn11."'";
			$strSQL .= ",'".$nn12."'";
			$strSQL .= ",'".$nn13."'";
			$strSQL .= ",'".$nn14."'";
			$strSQL .= ",'".$nn15."'";
			$strSQL .= ",'".$nn16."'";
			$strSQL .= ",'".$nn17."'";
			$strSQL .= ",'".$nn18."'";
			$strSQL .= ",'".$nn19."'";
			$strSQL .= ",'".$nn20."'";
			$strSQL .= ",'".$nn21."'";
			$strSQL .= ",'".$nn22."'";
			$strSQL .= ",'".$nn23."'";
			$strSQL .= ",'".$nn24."'";
			$strSQL .= ",'".$nn25."'";
			$strSQL .= ",'".$_POST["local"]."')";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			
			
			echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
			echo "<script language='javascript'>alert('เรียบร้อย ทั้งหมด');</script>";
			echo "<meta http-equiv='refresh' content='0;URL=add.php'>";
			}
		$date0 = add_date($date0,1,0,0);
	}
	
	echo "<meta http-equiv='refresh' content='0;URL=seat_add.php'>";
?>