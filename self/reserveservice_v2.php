<?

//call library
require_once ('lib/nusoap.php');

//using soap_server to create server object
$server = new soap_server;

//register a function that works on server

$server->register('reserveservice');

// create the function
function reserveservice($accid) {

    $conn = mysql_connect('10.10.11.14:3306', 'ajtong_root', '076424746');
    mysql_select_db('selfdb', $conn);
    mysql_query("SET NAMES UTF8");
	//$sql = "SELECT * FROM reserve WHERE accid = '$accid'  ORDER BY time,section,section_s ASC"; //AND time = date('Y-m-d') 
    $sql = "SELECT * FROM reserve WHERE accid = '$accid' AND time = '".date('Y-m-d')."'  ORDER BY time,section,section_s ASC";
    $q = mysql_query($sql,$conn);
    while ($r = mysql_fetch_array($q)) {
        $items[] = 
		array(
			'reservid'=> $r['reservid'],
			'accid' => $r['accid'],
            'time' => $r['time'],
            'section' => $r['section'],
            'section_s' => $r['section_s'],
            'section_e' => $r['section_e'],
            'section_s' => $r['checkin'],
            'section_e' => $r['checkout'],
            'branchid' => $r['branchid'],
            'sql2' => $sql);

    }
    return $items;
}

// create HTTP listener
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);

exit();
?>