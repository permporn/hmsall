<?php



include('config/config_db_self.php');

echo "1111";

$strSQL_self =	"SELECT creditid , date_regis FROM credit WHERE /*creditid IN('61138','61137') AND*/ type_pay = 'test'";

$objQuery_self = mysql_query($strSQL_self) or die ("Error Query [".$strSQL_self."]");

while ( $objResult_self = mysql_fetch_array($objQuery_self)){

	$strSQL_update_book = "UPDATE credit SET date_pay ='".$objResult_self['date_regis']."'";

	$strSQL_update_book .=" WHERE creditid =".$objResult_self['creditid'];

	$objQuery_update_book = mysql_query($strSQL_update_book);

}

mysql_close($conn);

?>