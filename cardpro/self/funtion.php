<?php 
// วัน-เดือน-ปี
function DateDMY($strDate){
	$year = substr($strDate, 0, 4);
	$month = substr($strDate, 5, 2);
	$day = substr($strDate, 8, 2);
	$date = $day."-".$month."-".$year;
	return $date;
}
// ปี-เดือน-วัน
function DateYMD($strDate)
	{
		$year = substr($strDate, 6, 4);
		$month = substr($strDate, 3, 2);
		$day = substr($strDate, 0, 2);
		$date = $year."-".$month."-".$day;
		return $date;
	}
	
	// ปี-เดือน-วัน
function DateYMD2($strDate)
	{
		$year = substr($strDate, 6, 4);
		$day = substr($strDate, 3, 2);
		$month = substr($strDate, 0, 2);
		$date = $day."-".$month."-".$year;
		return $date;
	}
	
// วันที่ไทย ปี-เดือน-วัน	
function DateThaiDMY($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

?>
<?php
function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		/*return "$strDay $strMonthThai $strYear, $strHour:$strMinute";*/
		return "$strDay $strMonthThai $strYear";
	}
	

?>