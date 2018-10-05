<?php

$title = "ระบบจัดการ โรงเรียนคณิตศาสตร์ อ.โต้ง";   

//** DB: ajtongmath_scho **//

$dbserver = 'localhost';

$dbname = 'ajtongmath_scho';

//** SERVER **//

// $dbuser = "ajtongmath_scho" ; 

// $dbpass= "72o35XDJ";

//** LOCAL **//

$dbuser = "root" ; 

$dbpass= "";

$con_ajtongmath_scho = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

mysqli_query($con_ajtongmath_scho, "SET NAMES UTF8");

if (!$con_ajtongmath_scho) {
    echo "Error: Unable to connect to MySQL con_ajtongmath_scho." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
// echo "Host information: " . mysqli_get_host_info($con_ajtongmath_scho) . PHP_EOL;


//** DB: ajtongmath_self **//

$dbserver = 'localhost';

$dbname = 'ajtongmath_self';

//** SERVER **//

// $dbuser = "ajtongmath_self" ; 

// $dbpass= "5TEwC8yip";

//** LOCAL **//

$dbuser = "root" ; 

$dbpass= "";

$con_ajtongmath_self = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

mysqli_query($con_ajtongmath_self, "SET NAMES UTF8");

if (!$con_ajtongmath_self) {
    echo "Error: Unable to connect to MySQL con_ajtongmath_self." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

?>