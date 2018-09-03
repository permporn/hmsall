<!-- 
@author	Pathompong Khreuawisen <pathompong.kvs@gmail.com >
 -->
<?php
	session_start();
	session_destroy();
	echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
	echo "<script language='javascript'>alert('ออกจากระบบแล้วครับ');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
?>