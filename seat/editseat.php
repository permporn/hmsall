<?php
 include("config.inc.php");
 echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";

 $date0 = $_POST["date0"];
 $date1 = $_POST["date1"];
 $time = $_POST["time"];
 $timeend = $_POST["timeend"];
 $nums1 = $_POST["nums1"];
 $local = $_POST["local"];
 $addsub = $_POST["addsub"];
 $AS = '';
 //echo $AS;
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
	
	
	
	for($i=0 ; $i<=$num ;$i++){
		
  	$str = "SELECT * FROM  `seats` WHERE  `date` =  '$date0' AND  branchid = '$local'";
	//echo $str .'<br>';
	
	$objQuerystr = mysql_query($str) or die ("Error Query [".$str."]");
	
	$time = $_POST["time"];
    $timeend = $_POST["timeend"];
	
	while($objResulstr = mysql_fetch_array($objQuerystr)){
	$nn1 = $objResulstr['1'];
	$nn2 = $objResulstr['2'];
	$nn3 = $objResulstr['3'];
	$nn4 = $objResulstr['4'];
	$nn5 = $objResulstr['5'];
	$nn6 = $objResulstr['6'];
	$nn7 = $objResulstr['7'];
	$nn8 = $objResulstr['8'];
	$nn9 = $objResulstr['9'];
	$nn10 = $objResulstr['10'];
	$nn11 = $objResulstr['11'];
	$nn12 = $objResulstr['12'];
	$nn13 = $objResulstr['13'];
	$nn14 = $objResulstr['14'];
	$nn15 = $objResulstr['15'];
	$nn16 = $objResulstr['16'];
	$nn17 = $objResulstr['17'];
	$nn18 = $objResulstr['18'];
	$nn19 = $objResulstr['19'];
	$nn20 = $objResulstr['20'];
	$nn21 = $objResulstr['21'];
	$nn22 = $objResulstr['22'];
	$nn23 = $objResulstr['23'];
	$nn24 = $objResulstr['24'];
	$nn25 = $objResulstr['25'];
	//echo $objResulstr['date']."<br>";
	
	//echo  $time.'<='.$timeend."<br>";
	for($a = $timeend ;$time <= $a; $time++){
	     $time = $time;
	if($addsub == "plus"){
		 if($time == 1){$nn1 = $objResulstr['1']+$_POST["nums1"];echo "nn1=".$nn1."<br>";}
		 if($time == 2){$nn2 = $objResulstr['2']+$_POST["nums1"];echo "nn2=".$nn2."<br>";}
		 if($time == 3){$nn3 = $objResulstr['3']+$_POST["nums1"];echo "nn3=".$nn3."<br>";}
		 if($time == 4){$nn4 = $objResulstr['4']+$_POST["nums1"];echo "nn4=".$nn4."<br>";}
		 if($time == 5){$nn5 = $objResulstr['5']+$_POST["nums1"];echo "nn5=".$nn5."<br>";}
		 if($time == 6){$nn6 = $objResulstr['6']+$_POST["nums1"];echo "nn6=".$nn6."<br>";}
		 if($time == 7){$nn7 = $objResulstr['7']+$_POST["nums1"];echo "nn7=".$nn7."<br>";}
		 if($time == 8){$nn8 = $objResulstr['8']+$_POST["nums1"];echo "nn8=".$nn8."<br>";}
		 if($time == 9){$nn9 = $objResulstr['9']+$_POST["nums1"];echo "nn9=".$nn9."<br>";}
		 if($time == 10){$nn10 = $objResulstr['10']+$_POST["nums1"];echo "nn10=".$nn10."<br>";}
		 if($time == 11){$nn11 = $objResulstr['11']+$_POST["nums1"];echo "nn11=".$nn11."<br>";}
		 if($time == 12){$nn12 = $objResulstr['12']+$_POST["nums1"];echo "nn12=".$nn12."<br>";}
		 if($time == 13){$nn13 = $objResulstr['13']+$_POST["nums1"];echo "nn13=".$nn13."<br>";}
		 if($time == 14){$nn14 = $objResulstr['14']+$_POST["nums1"];echo "nn14=".$nn14."<br>";}
		 if($time == 15){$nn15 = $objResulstr['15']+$_POST["nums1"];echo "nn15=".$nn15."<br>";}
		 if($time == 16){$nn16 = $objResulstr['16']+$_POST["nums1"];echo "nn16=".$nn16."<br>";}
		 if($time == 17){$nn17 = $objResulstr['17']+$_POST["nums1"];echo "nn17=".$nn17."<br>";}
		 if($time == 18){$nn18 = $objResulstr['18']+$_POST["nums1"];echo "nn18=".$nn18."<br>";}
		 if($time == 19){$nn19 = $objResulstr['19']+$_POST["nums1"];echo "nn19=".$nn19."<br>";}
		 if($time == 20){$nn20 = $objResulstr['20']+$_POST["nums1"];echo "nn20=".$nn20."<br>";}
		 if($time == 21){$nn21 = $objResulstr['21']+$_POST["nums1"];echo "nn21=".$nn21."<br>";}
		 if($time == 22){$nn22 = $objResulstr['22']+$_POST["nums1"];echo "nn22=".$nn22."<br>";}
		 if($time == 23){$nn23 = $objResulstr['23']+$_POST["nums1"];echo "nn23=".$nn23."<br>";}
		 if($time == 24){$nn24 = $objResulstr['24']+$_POST["nums1"];echo "nn24=".$nn24."<br>";}
		 if($time == 25){$nn25 = $objResulstr['25']+$_POST["nums1"];echo "nn25=".$nn25."<br>";}
	 }
	 else{
		 if($time == 1){$nn1 = $objResulstr['1']-$_POST["nums1"];echo "nn1=".$nn1."<br>";}
		 if($time == 2){$nn2 = $objResulstr['2']-$_POST["nums1"];echo "nn2=".$nn2."<br>";}
		 if($time == 3){$nn3 = $objResulstr['3']-$_POST["nums1"];echo "nn3=".$nn3."<br>";}
		 if($time == 4){$nn4 = $objResulstr['4']-$_POST["nums1"];echo "nn4=".$nn4."<br>";}
		 if($time == 5){$nn5 = $objResulstr['5']-$_POST["nums1"];echo "nn5=".$nn5."<br>";}
		 if($time == 6){$nn6 = $objResulstr['6']-$_POST["nums1"];echo "nn6=".$nn6."<br>";}
		 if($time == 7){$nn7 = $objResulstr['7']-$_POST["nums1"];echo "nn7=".$nn7."<br>";}
		 if($time == 8){$nn8 = $objResulstr['8']-$_POST["nums1"];echo "nn8=".$nn8."<br>";}
		 if($time == 9){$nn9 = $objResulstr['9']-$_POST["nums1"];echo "nn9=".$nn9."<br>";}
		 if($time == 10){$nn10 = $objResulstr['10']-$_POST["nums1"];echo "nn10=".$nn10."<br>";}
		 if($time == 11){$nn11 = $objResulstr['11']-$_POST["nums1"];echo "nn11=".$nn11."<br>";}
		 if($time == 12){$nn12 = $objResulstr['12']-$_POST["nums1"];echo "nn12=".$nn12."<br>";}
		 if($time == 13){$nn13 = $objResulstr['13']-$_POST["nums1"];echo "nn13=".$nn13."<br>";}
		 if($time == 14){$nn14 = $objResulstr['14']-$_POST["nums1"];echo "nn14=".$nn14."<br>";}
		 if($time == 15){$nn15 = $objResulstr['15']-$_POST["nums1"];echo "nn15=".$nn15."<br>";}
		 if($time == 16){$nn16 = $objResulstr['16']-$_POST["nums1"];echo "nn16=".$nn16."<br>";}
		 if($time == 17){$nn17 = $objResulstr['17']-$_POST["nums1"];echo "nn17=".$nn17."<br>";}
		 if($time == 18){$nn18 = $objResulstr['18']-$_POST["nums1"];echo "nn18=".$nn18."<br>";}
		 if($time == 19){$nn19 = $objResulstr['19']-$_POST["nums1"];echo "nn19=".$nn19."<br>";}
		 if($time == 20){$nn20 = $objResulstr['20']-$_POST["nums1"];echo "nn20=".$nn20."<br>";}
		 if($time == 21){$nn21 = $objResulstr['21']-$_POST["nums1"];echo "nn21=".$nn21."<br>";}
		 if($time == 22){$nn22 = $objResulstr['22']-$_POST["nums1"];echo "nn22=".$nn22."<br>";}
		 if($time == 23){$nn23 = $objResulstr['23']-$_POST["nums1"];echo "nn23=".$nn23."<br>";}
		 if($time == 24){$nn24 = $objResulstr['24']-$_POST["nums1"];echo "nn24=".$nn24."<br>";}
		 if($time == 25){$nn25 = $objResulstr['25']-$_POST["nums1"];echo "nn25=".$nn25."<br>";}
	 	}
	 }
	 }	
	$strSQL = "UPDATE  `selfdb`.`seats` SET ";
	$strSQL .="`1` = '".$nn1."' ";
	$strSQL .=",`2` = '".$nn2."' ";
	$strSQL .=",`3` = '".$nn3."' ";
	$strSQL .=",`4` = '".$nn4."' ";
	$strSQL .=",`5` = '".$nn5."' ";
	$strSQL .=",`6` = '".$nn6."' ";
	$strSQL .=",`7` = '".$nn7."' ";
	$strSQL .=",`8` = '".$nn8."' ";
	$strSQL .=",`9` = '".$nn9."' ";
	$strSQL .=",`10` = '".$nn10."' ";
	$strSQL .=",`11` = '".$nn11."' ";
	$strSQL .=",`12` = '".$nn12."' ";
	$strSQL .=",`13` = '".$nn13."' ";
	$strSQL .=",`14` = '".$nn14."' ";
	$strSQL .=",`15` = '".$nn15."' ";
	$strSQL .=",`16` = '".$nn16."' ";
	$strSQL .=",`17` = '".$nn17."' ";
	$strSQL .=",`18`= '".$nn18."' ";
	$strSQL .=",`19` = '".$nn19."' ";
	$strSQL .=",`20` = '".$nn20."' ";
	$strSQL .=",`21` = '".$nn21."' ";
	$strSQL .=",`22` = '".$nn22."' ";
	$strSQL .=",`23` = '".$nn23."' ";
	$strSQL .=",`24` = '".$nn24."' ";
	$strSQL .=",`25` = '".$nn25."' ";
	$strSQL .= ",`branchid` = '".$_POST["local"]."'";
	$strSQL .=",branchid = '".$_POST["local"]."' ";
	$strSQL .="WHERE `seats`.`date` =  '$date0' AND  `seats`.`branchid` = '$local'";
	//echo $strSQL ."<br>";;
	$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
	$date0 = add_date($date0,1,0,0);
	}
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('แก้ไขเรียบร้อย ทั้งหมด');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=edit.php'>";
	
	
?>
