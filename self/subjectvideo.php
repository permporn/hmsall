<?

//call library
require_once ('lib/nusoap.php');

//using soap_server to create server object
$server = new soap_server;

//register a function that works on server

$server->register('subjectvideo');

// create the function
function subjectvideo($code) {

    $conn = mysql_connect('10.10.11.14:3306', 'ajtong_root', '076424746');
    //$conn = mysql_connect('localhost', 'root', '1234');
    mysql_select_db('selfdb', $conn);
    mysql_query("SET NAMES UTF8");
    $sql = "SELECT subject.subid AS subject_id
                    ,subject.code
                    , subject.disc
                    , subject.level
                    , subject.subname
                    , subject_real.name_subject_real 
            FROM subject 
            LEFT JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real 
            WHERE code = '$code'";
    $q = mysql_query($sql,$conn);
    while ($r = mysql_fetch_array($q)) {
        $items[] = 
        array('code' => $r['code'],
              'disc' => $r['disc'],
              'level' => $r['level'],
              'subname' => $r['subname'],
              'name_subject_real' => $r['name_subject_real'],
              'subject_id' => $r['subject_id']);
    }
    return $items;
}

// create HTTP listener
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service
$server->service($POST_DATA);

exit();
?>