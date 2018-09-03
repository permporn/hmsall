<?

//call library
require_once ('lib/nusoap.php');

//using soap_server to create server object
$server = new soap_server;

//register a function that works on server

$server->register('detailvideoservice');

// create the function
function detailvideoservice($subid) {

    $conn = mysql_connect('10.10.11.14:3306', 'ajtong_root', '076424746');
    //$conn = mysql_connect('localhost', 'root', '1234');
    mysql_select_db('selfdb', $conn);
    mysql_query("SET NAMES UTF8");
    $sql = "SELECT *
            FROM subject_detail
            WHERE subid = '$subid'";

    $q = mysql_query($sql,$conn);
    while ($r = mysql_fetch_array($q)) {
        $items[] = 
        array('disc' => $r['disc'],
              'detail' => $r['detail']);
    }
    return $items;
}

// create HTTP listener
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);

exit();
?>