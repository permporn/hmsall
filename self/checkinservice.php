<?

//call library
require_once ('lib/nusoap.php');

//using soap_server to create server object
$server = new soap_server;

//register a function that works on server

$server->register('checkinservice');

// create the function
function checkinservice($reservid,$checkintime) {

$conn = mysql_connect('10.10.11.14:3306', 'ajtong_root', '076424746');
mysql_select_db('selfdb', $conn);
 mysql_query("SET NAMES UTF8");
	
$sql3 = "SELECT * FROM reserve WHERE reservid = '".$reservid."'";
$q3 = mysql_query($sql3,$conn);
$r3 = mysql_fetch_array($q3);
	
if($r3['checkin'] == '0000-00-00 00:00:00'){
	$sql = "UPDATE reserve SET checkin = '".$checkintime."' WHERE reservid = '".$reservid."'";
    	$q = mysql_query($sql,$conn);
}
	/*if($r3['checkout'] != '0000-00-00 00:00:00'){
		$sql = "UPDATE `reserve` SET checkout = '0000-00-00 00:00:00' WHERE reservid ='$reservid'";
   		$q = mysql_query($sql,$conn);
	}*/

$sql2 = "SELECT * FROM reserve WHERE reservid = '".$reservid."'";
$r = mysql_query($sql2,$conn);
while ($q = mysql_fetch_array($r)) {
$items[] = array('checkin' => $q['checkin'],
			   'time' => $q['time']);
}
return $items;
}
	
// create HTTP listener
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);

exit();
?>