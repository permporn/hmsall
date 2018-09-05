<?
function displaydate($datex) {
	$date_array=explode("/",$datex);
	$d=$date_array[0];
	$m=$date_array[1];
	$y=$date_array[2]-543;
	$displaydate="$y-$m-$d";
	return $displaydate;
	}
	if($_POST["date0"]=="------------เลือกวันที่------------")
	{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณาเลือกวันที่จะเรียนด้วยค่ะ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=homeall.php'>";
	}
	else if($_POST["local"]=="")
	{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณาเลือกสถานที่เรียนด้วยค่ะ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=viewseat.php'>";
	}
	else{
	$date=$_POST["date0"];
	$l=$_POST["local"];
	header("location:viewseat.php?date=$date&local=$l");
}
?>