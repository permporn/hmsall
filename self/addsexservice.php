<?



//call library

require_once ('lib/nusoap.php');



//using soap_server to create server object

$server = new soap_server;



//register a function that works on server



$server->register('addsexservice');







// create the function

function addsexservice($studentid, $sex) {



    $conn = mysql_connect('localhost', 'ajtongmath_self', '5TEwC8yip');

    mysql_select_db('ajtongmath_self', $conn);

    mysql_query("SET NAMES UTF8");

	$sql = "UPDATE `student` SET sex = '$sex' WHERE studentid ='$studentid'";

    $q = mysql_query($sql,$conn);

	$sql = "SELECT * FROM `student` where studentid ='$studentid'";

    $q = mysql_query($sql,$conn);

    while ($r = mysql_fetch_array($q)) {

        $items[] = array('sex' => $r['sex']);

    }

    return $items;



}











// create HTTP listener

$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';



// pass our posted data (or nothing) to the soap service

$server->service($POST_DATA);



exit();

?>