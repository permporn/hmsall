<?



//call library

require_once ('lib/nusoap.php');



//using soap_server to create server object

$server = new soap_server;



//register a function that works on server



$server->register('studentservice');







// create the function

function studentservice($username, $password) {



    $conn = mysql_connect('localhost', 'ajtongmath_self', '5TEwC8yip');

    mysql_select_db('ajtongmath_self', $conn);

    mysql_query("SET NAMES UTF8");

	$sql = "SELECT * FROM `account` JOIN student ON account.studentid = student.studentid AND username='$username' AND password='$password'";

    $q = mysql_query($sql,$conn);

    while ($r = mysql_fetch_array($q)) {

        $items[] = array('accid' => $r['accid'],

            'name' => $r['name'],

            'username' => $r['username'],

			'edate' => $r['edate'],

                        'status' => $r['status'],

                       'studentid' => $r['studentid'],

'sex' => $r['sex'],

'job' => $r['job'],

            'totalcredit' => $r['totalcredit']);

    }

    return $items;

}











// create HTTP listener

$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';



// pass our posted data (or nothing) to the soap service

$server->service($POST_DATA);



exit();

?>