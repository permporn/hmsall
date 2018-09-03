<?
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	date_default_timezone_set("Asia/Bangkok");
	$s=date('Y-m-d H:i');
	$d=date('Y-m-d');
	$datess="2013-08-06";	
	
	function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	  function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	 
	/*************************************************************************/
	$time1 = 8 + Floor((25-1)/2); 
				if(25%2==1){$min1="00";}else{$min1="30";}
				
	$timed=DateTimeDiff("$s","$datess $time1:$min1");
	$timed=floor($timed*60);
				
	echo "เริ่มเรียนเวลา >> ".$time1.":".$min1."<br>";
	echo "ทดสอบ ".DateTimeDiff("$s","$datess $time1:$min1")."<br>";
	echo "ทดสอบ ".$s."   ".$datess." ".$time1.":".$min1."<br>";
	echo "ทดสอบ ".$timed."<br>";
	
	if ($timed>15)
	{
		echo "ยังไม่ถึงเวลาเรียน";
	}
	else
	{
		echo "ถึงเวลาเรียนแล้ว";
	}
				
	//if(DateTimeDiff("$s","$datess $time:$min")<=2.25)
	/*************************************************************************/
			
?>