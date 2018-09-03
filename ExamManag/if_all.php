<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?
session_start();
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
date_default_timezone_set("Asia/Bangkok");
	$s=date('Y-m-d H:i');
	$d=date('Y-m-d');
	function DateTimeDiff($strDateTime1,$strDateTime2)
	 {
				return (strtotime($strDateTime2) - strtotime($strDateTime1))/  ( 60 * 60 ); // 1 Hour =  60*60
	 }
	  function DateDiff($strDate1,$strDate2)
	 {
				return (strtotime($strDate2) - strtotime($strDate1))/  ( 60 * 60 * 24 );  // 1 day = 60*60*24
	 }
	$hostname = explode("/",$_SESSION["hostname"]);
	$hostname1 = $hostname[2]; // ip
	$hostname2 = $hostname[3]; // โฟล์เดอร์
	$logouttime = "http://".$hostname1."/".$hostname2."/Logouttime.php";
	$logout = "http://".$hostname1."/".$hostname2."/Logout.php";
	
	if($_SESSION["date"]=='' && $_SESSION["section_s"]=='' && $_SESSION["section_e"]==''){
		$_SESSION["date"] = $_GET['date'];
		$_SESSION["section_s"] = $_GET["section_s"];
		$_SESSION["section_e"] = $_GET["section_e"];
	}
	
	$datess = $_SESSION["date"];
	//echo "date = ".$datess."// section_e = ".$_SESSION['section_e']."// section_s = ".$_SESSION['section_s'] ;
	
	$time = 8 + Floor(($_SESSION['section_e']-1)/2);
				if($_SESSION['section_e']%2==1){$min="00";}else{$min="30";}
	$time_s = 8 + Floor(($_SESSION['section_s']-1)/2);
				if($_SESSION['section_s']%2==1){$min_s="00";}else{$min_s="30";}
				if(DateTimeDiff("$s","$datess $time:$min")>2.25&&DateTimeDiff("$s","$datess $time:$min")<0)
				{echo "<script>alert('ยังไม่ถึงเวลาเรียนครับ');window.location='Logouthost.php?link=$logout';</script>";}
				
				$timed=DateTimeDiff("$s","$datess $time:$min");
				if($timed <= 0){ echo "<script>alert('หมดเวลาเรียนแล้ว2! $time');window.location='Logouthost.php?link=$logouttime';</script>";}
			
	$timed=floor($timed*60);

?>


<SCRIPT language=JavaScript>
/* ห้ามคลิกขวา */var message="";
///////////////////////////////////
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById&&!document.all)) {
if (e.which==2||e.which==3) {(message);return false;}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
 
document.oncontextmenu=new Function("return false")

/* ห้ามลากดำ+ห้าม ctrl+A,C */
function disableselect(e){
return false
}
function reEnable(){
return true
}
//if IE4+
document.onselectstart=new Function ("return false")
//if NS6
if (window.sidebar){
document.onmousedown=disableselect
document.onclick=reEnable
}

/* เวลา */
var limit="<?=$timed;?>:59"
	if (document.images){
		var parselimit=limit.split(":")
		parselimit=parselimit[0]*60+parselimit[1]*1
	}


function begintimer(){
	if (!document.images)
		return
	if (parselimit==1){/* แก้ไข */window.location='Logouthost.php?link=<?=$logouttime?>';}
	else{
		parselimit-=1;
		curmin=Math.floor(parselimit/60);
		cursec=parselimit%60;
		
		if (curmin!=0)
			curtime="<div id=fonttime><font>เวลาที่เหลือ</font> <font color=#6FF> "+curmin+" </font><font> : </font> <font color=#6FF>"+cursec+" </font><font>นาที</font></br>ช่วงเวลา <?=$time_s?>:<?=$min_s?> - <?=$time?>:<?=$min?> น. </div>"
			
			else 
			if(cursec==0)
			{
				/* แก้ไข */window.location='Logouthost.php?link=<?=$logouttime?>';
				}
			else{
				curtime="<div id=fonttime><font>เวลาที่เหลือ</font> <font color=#6FF>"+cursec+" </font><font>วินาที</font> </br>ช่วงเวลา <?=$time_s?>:<?=$min_s?> - <?=$time?>:<?=$min?> น. </div>"
				}
			document.getElementById('dplay').innerHTML = curtime;
			setTimeout("begintimer()",1000)
	}
}
/* จบเวลา */
</script>