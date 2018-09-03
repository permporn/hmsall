<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
session_start();
session_destroy();
$link= $_GET['link'];
echo "<meta http-equiv='refresh' content='0;URL=$link'>";
?>