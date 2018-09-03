<?php  
include("ck_session.php");
include('config/config_db_self.php'); 
//include("ck_session.php");

$type = $_GET['type'];

if($type == "insert_book"){
$params = array();
parse_str($_GET['datas'], $params); 
$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
$code = $params['code'];
$title = $params['title'];
$type = $params['type_book'];
if($type == '0'){$id_subject = $params['book_learn'];}
else {$id_subject = $params['book_self'];}
$qty = $params['qty'];
$file_name = $params['filUpload'];
$date = date('Y-m-d');
$price = $params['price'];

	$strSQL_insert_book = "INSERT INTO book_information "; 
	$strSQL_insert_book .="(`code`,title,id_subject,type,qty,price,name_image,id_staff,create_date) ";
	$strSQL_insert_book .="VALUES ";
	$strSQL_insert_book .="('".$code."' ";
	$strSQL_insert_book .=",'".$title."' ";
	$strSQL_insert_book .=",'".$id_subject."' ";
	$strSQL_insert_book .=",'".$type."' ";
	$strSQL_insert_book .=",'".$qty."' ";
	$strSQL_insert_book .=",'".$price."' ";
	$strSQL_insert_book .=",'".$name_image."' ";
	$strSQL_insert_book .=",'".$id_account_self."' ";
	$strSQL_insert_book .=",'".$date."') ";
	$objQuery_insert_book = mysql_query($strSQL_insert_book);
	if(!$objQuery_insert_book)
	{
		echo "fail!!  : $strSQL_insert_book (book.php)";
	}else{
		echo "";
	}
}

if($type == "delete_book"){
$id = $_GET['id'];
	$strSQL = "DELETE FROM `book_information` WHERE id = ".$id; 
	$objQuery = mysql_query($strSQL);
	if(!$objQuery){
			echo "fail!!  : $strSQL (book.php)";
	}else{	echo "";}
}

if($type == "update_book"){
$params = array();
parse_str($_GET['datas'], $params); 
print_r($params);
$random = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
$code = $params['code'];
$title = $params['title'];
$type = $params['type_book'];
if($type == '0'){$id_subject = $params['book_learn'];}
else {$id_subject = $params['book_self'];}
//$id_subject = $params['id_subject'];
$qty = $params['qty'];
$file_name = $params['filUpload'];
$date = date('Y-m-d H:i:s');
$id = $params['id'];
$price = $params['price'];

//if(copy($file_name,"images/".$_FILES["filUpload"]["name"])){
	$strSQL_update_book = "UPDATE book_information SET"; 
	$strSQL_update_book .=" code = '".$code."'";
	$strSQL_update_book .=",title = '".$title."'";
	$strSQL_update_book .=",id_subject = '".$id_subject."'";
	$strSQL_update_book .=",type = '".$type."'";
	$strSQL_update_book .=",qty ='".$qty."'";
	$strSQL_update_book .=",price ='".$price."'";
	$strSQL_update_book .=",name_image ='".$name_image."'";
	$strSQL_update_book .=",id_staff ='".$id_account_self."' ";
	$strSQL_update_book .=",modify_date ='".$date."'";
	$strSQL_update_book .=" WHERE id=".$id;
	$objQuery_update_book = mysql_query($strSQL_update_book);
	if(!$objQuery_update_book)
	{
		echo "fail!!  : $strSQL_update_book (book.php)";
	}else{
		echo "";
	}
}
if($_GET['type2'] == "select_book"){

$id = $_GET['id_subject'];
$type = $_GET['type'];

	$strSQL_book =  
            "SELECT
                book_information.`id` as id,
                book_information.`code` as code,
                book_information.title as title,
                book_information.id_subject as id_subject,
                book_information.type as type,
                book_information.qty as qty,
                book_information.price as price,
                book_information.id_staff as id_staff,
                book_information.create_date as create_date
                FROM
                book_information";
         
    $strSQL_book .= " WHERE id = '".$id."' AND type = ".$type;
	$objQuery_book = mysql_query($strSQL_book);
    $objResult_book = mysql_fetch_array($objQuery_book);
	$datas = array("price" => $objResult_book['price'], "id" => $objResult_book['id']);
	echo json_encode($datas);
}
?>