<?



//call library

require_once ('lib/nusoap.php');



//using soap_server to create server object

$server = new soap_server;



//register a function that works on server



$server->register('addjobservice');







// create the function

function addjobservice($studentid, $job) {



    $conn = mysql_connect('10.10.11.14:3306', 'ajtongmath_self', '5TEwC8yip');
    mysql_select_db('ajtongmath_self', $conn);
    
    //$conn = mysql_connect('localhost', 'ajtong_root', '076424746');
    //mysql_select_db('selfdb', $conn);

    mysql_query("SET NAMES UTF8");

	$sql = "UPDATE `student` SET job = '$job' WHERE studentid ='$studentid'";

    $q = mysql_query($sql,$conn);

	$sql = "SELECT * FROM `student` where studentid ='$studentid'";

    $q = mysql_query($sql,$conn);

    while ($r = mysql_fetch_array($q)) {

        $items[] = array('job' => $r['job']);

    }

    return $items;



}











// create HTTP listener

$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';



// pass our posted data (or nothing) to the soap service

$server->service($POST_DATA);



exit();

?>