<?
ob_start();
session_start();
if($_SESSION["accid_self"] == "" )
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('กรุณา Login เข้าสู่ระบบ =');</script>";
echo "<meta http-equiv='refresh' content='0;URL=logout.php'>";
exit();
}
if($_SESSION["status"] != "100")
{
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
echo "<script language='javascript'>alert('คุณไม่มีสิทธิในการเข้าหน้านี้ กรุณา Login ใหม่ค่ะ');</script>";
echo "<meta http-equiv='refresh' content='0;URL=logout.php'>";
}else{
if($_POST["date0"] == 'เลือกวันที่')
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณาเลือกวันที่จะเรียนด้วยค่ะ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=home2.php'>";
}	
else if($_POST["local"] == "")
{
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('กรุณาเลือกสถานที่เรียนด้วยค่ะ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=home2.php'>";
}
else{
	function displaydate($datex) {
		$date_array=explode("/",$datex);
		$d=$date_array[0];
		$m=$date_array[1];
		$y=$date_array[2]-543;
		$displaydate="$y-$m-$d";
		return $displaydate;
	}
	
	/*$date=displaydate($_POST["date0"]);
	$l=$_POST["local"];
	header("location:home.php?date=$date&local=$l");*/
	$date = base64_encode(displaydate($_POST["date0"]));
	$l = base64_encode($_POST["local"]);
	header("location:home2.php?date=$date&local=$l");
}
}
?>