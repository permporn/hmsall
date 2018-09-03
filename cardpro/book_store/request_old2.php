<?php  
    include("ck_session.php");
    include('config/config_db_self.php'); 

$type = $_GET['type'];
if($type == ''){ $type = $_POST['type'];}

if($type == "update_request"){

    $params = array();
    parse_str($_GET['datas'], $params); 
    //print_r($params);
    $id = $params['id'];
    $id_book = $params['id_book_edit'];
    $qty = $params['quantity'];
    $price = $params['price'];
    $sum_price = $params['sum_price'];
    $id_staff = $params['id_staff'];
    $remark = $params['remark'];
    $modify_date = date('Y-m-d');

    $strSQL_update = "UPDATE book_requests SET"; 
    $strSQL_update .=" id_book = '".$id_book."'";
    $strSQL_update .=" ,qty = '".$qty."'";
    $strSQL_update .=" ,price = '".$price."'";
    $strSQL_update .=" ,sum_price = '".$sum_price."'";
    $strSQL_update .=" ,remark = '".$remark."'";
    $strSQL_update .=" ,id_staff = '".$id_account_self."'";
    $strSQL_update .=" ,approve_qty = '".$qty."'";
    $strSQL_update .=" ,modify_date = '".$modify_date."'";
    $strSQL_update .=" WHERE id  = '".$id ."'";
    $objQuery_update = mysql_query($strSQL_update);
    //echo $strSQL_update;
    if(!$objQuery_update)
    {
        echo "fail!!  : $objQuery_update (request.php)";
    }else{
        echo "";
    }
}

if($type == "update_status"){
    $id = $_GET['id'];
    $status = $_GET['status'];
    $strSQL_update_status = "UPDATE book_order SET"; 
    $strSQL_update_status .=" status = '".$status."'";
    $strSQL_update_status .=" WHERE id_order  = '".$id ."'";
    $objQuery_update_status = mysql_query($strSQL_update_status);
    if(!$objQuery_update_status)
    {
        echo "fail!!  : $strSQL_update_status (request.php)";
    }else{
        echo "$strSQL_update_status";
    }
}

if($type == "delete_request"){
    $params = array();
    parse_str($_GET['datas'], $params); 
    $id_order = $params['id_order'];
    $id_delete = $_GET['id_delete'];
    $qty = $_GET['qty'];
    $sum_price = $_GET['sum_price'];

    $strSQL_delete = "DELETE FROM `book_requests` WHERE id = ".$id_delete; 
    $objQuery_delete = mysql_query($strSQL_delete);
    if(!$objQuery_delete)
    {
        echo "fail!!  : $strSQL_delete (request.php)";
    }else{
        $strSQL_book_order = "SELECT * FROM book_order";
        $strSQL_book_order .=" WHERE id_order  = '".$id_order ."'";
        $objQuery_book_order = mysql_query($strSQL_book_order);
        $Re_book_order = mysql_fetch_array($objQuery_book_order);
        $sum_qty = $Re_book_order['qty'] - $qty;
        $sum_price_new = $Re_book_order['sum_price'] - $sum_price;

        // $strSQL_sum_price = "SELECT SUM(sum_price) as sum_price FROM book_requests WHERE id_order = ".$id_order;
        // $objQuery_sum_price = mysql_query($strSQL_sum_price);
        // $result_price = mysql_fetch_array($objQuery_sum_price);
        // $sum_price_new = $result_price['sum_price'];

        // $strSQL_qty = "SELECT SUM(qty) as sum_qty FROM book_requests WHERE id_order = ".$id_order;
        // $objQuery_qty = mysql_query($strSQL_qty);
        // $result_qty = mysql_fetch_array($objQuery_qty);
        // $sum_qty = $result_qty['sum_qty'];

        $strSQL_update_status = "UPDATE book_order SET"; 
        $strSQL_update_status .=" qty = '".$sum_qty."'";
        $strSQL_update_status .=" ,sum_price = '".$sum_price_new."'";
        $strSQL_update_status .=" WHERE id_order  = '".$id_order ."'";
        $objQuery_update_status = mysql_query($strSQL_update_status);
        if(!$objQuery_update_status)
        {
            echo "fail!!  : $strSQL_update_status (request.php)";
        }else{
            echo $id_order;
        }
    }
}

if($type == "delete_order"){

    $id_order = $_GET['id_delete'];

    $strSQL_delete = "DELETE FROM `book_requests` WHERE id_order = ".$id_order; 
    $objQuery_delete = mysql_query($strSQL_delete);
    if(!$objQuery_delete)
    {
        echo "fail!!  : $strSQL_delete (request.php)";
    }else{
        
        $strSQL_delete = "DELETE FROM `book_order` WHERE id_order = ".$id_order; 
        $objQuery_delete = mysql_query($strSQL_delete);
        if(!$objQuery_delete)
        {
            echo "fail!!  : $strSQL_delete (request.php)";
        }else{
            
            echo $strSQL_delete;
        }
    }
}

if($type == "insert_request"){
    $params = array();
    parse_str($_GET['datas'], $params); 
    $id_book = $params['id_book'];
    $qty = $params['quantity'];
    $price = $params['price'];
    $sum_price = $params['sum_price'];
    $id_staff = $params['id_staff'];
    $remark = $params['remark'];
    $status = 0;
    $create_date = date('Y-m-d');
    //$id_order = $params['id_order_'];
    //$params = array();
    //parse_str($_GET['datas_order'], $paramss); 
    //$id_order = $paramss['id_order_'];
    $id_order = $_GET['id_order'];

    if($id_order == ''){
    $s = substr(md5(rand()), 0, 7);

    $strSQL_insert_order = "INSERT INTO book_order "; 
    $strSQL_insert_order .="(code,qty,sum_price,remark,status,id_staff,create_date) ";
    $strSQL_insert_order .="VALUES ";
    $strSQL_insert_order .="(";
    $strSQL_insert_order .="'".$s."' ";
    $strSQL_insert_order .=",'".$qty."' ";
    $strSQL_insert_order .=",'".$sum_price."' ";
    $strSQL_insert_order .=",'".$remark."' ";
    $strSQL_insert_order .=",0 ";
    $strSQL_insert_order .=",'".$id_account_self."' ";
    $strSQL_insert_order .=",'".$create_date."') ";

    }else{
        // $strSQL_order = "SELECT * FROM book_order WHERE id_order = ".$id_order;
        // $objQuery_order = mysql_query($strSQL_order);
        // $objResult_order = mysql_fetch_array($objQuery_order);
        //echo $strSQL_order;
        // $qty_new = $qty+$objResult_order['qty'];
        // $sum_price_new = $sum_price + $objResult_order['sum_price'];

        $strSQL_sum_price = "SELECT SUM(sum_price) as sum_price FROM book_requests WHERE id_order = ".$id_order;
        $objQuery_sum_price = mysql_query($strSQL_sum_price);
        $result_price = mysql_fetch_array($objQuery_sum_price);
        $sum_price_new = $result_price['sum_price'];

        $strSQL_qty = "SELECT SUM(qty) as sum_qty FROM book_requests WHERE id_order = ".$id_order;
        $objQuery_qty = mysql_query($strSQL_qty);
        $result_qty = mysql_fetch_array($objQuery_qty);
        $sum_qty = $result_qty['sum_qty'];

        $strSQL_insert_order = "UPDATE book_order SET"; 
        $strSQL_insert_order .=" qty = '".$sum_qty."'";
        $strSQL_insert_order .=" ,sum_price = '".$sum_price_new."'";
        $strSQL_insert_order .=" ,remark = '".$remark."'";
        $strSQL_insert_order .=" ,id_staff = '".$id_account_self."'";
        $strSQL_insert_order .=" ,modify_date = '".date('Y-m-d')."'";
        $strSQL_insert_order .=" WHERE id_order  = '".$id_order ."'";
    }
    $objQuery_insert_order = mysql_query($strSQL_insert_order);
    if(!$objQuery_insert_order)
    {
        echo "fail !!  : $strSQL_insert_order (request.php)";

    }else{
        if($id_order == ''){
        $strSQL_order_max = "SELECT * FROM book_order WHERE code = '".$s."'";
        $objQuery_max = mysql_query($strSQL_order_max);
        $order = mysql_fetch_array($objQuery_max);
        $id_order = $order['id_order'];
        //echo $strSQL_order_max;
        }
        $strSQL_insert_request = "INSERT INTO book_requests "; 
        $strSQL_insert_request .="(id_book,id_order,qty,price,sum_price,remark,id_staff,create_date) ";
        $strSQL_insert_request .="VALUES ";
        $strSQL_insert_request .="('".$id_book."' ";
        $strSQL_insert_request .=",'".$id_order."' ";
        $strSQL_insert_request .=",'".$qty."' ";
        $strSQL_insert_request .=",'".$price."' ";
        $strSQL_insert_request .=",'".$sum_price."' ";
        $strSQL_insert_request .=",'".$remark."' ";
        $strSQL_insert_request .=",'".$id_account_self."' ";
        $strSQL_insert_request .=",'".$create_date."') ";
        $objQuery_insert_request = mysql_query($strSQL_insert_request);
        if(!$objQuery_insert_request)
        {
            echo "fail !!! : $strSQL_insert_request (request.php)";
        }else{
    
            $strSQL_sum_price = "SELECT SUM(sum_price) as sum_price FROM book_requests WHERE id_order = ".$id_order;
            $objQuery_sum_price = mysql_query($strSQL_sum_price);
            $result_price = mysql_fetch_array($objQuery_sum_price);
            $sum_price_new = $result_price['sum_price'];

            $strSQL_qty = "SELECT SUM(qty) as sum_qty FROM book_requests WHERE id_order = ".$id_order;
            $objQuery_qty = mysql_query($strSQL_qty);
            $result_qty = mysql_fetch_array($objQuery_qty);
            $sum_qty = $result_qty['sum_qty'];

            $strSQL_insert_order2 = "UPDATE book_order SET"; 
            $strSQL_insert_order2 .=" qty = '".$sum_qty."'";
            $strSQL_insert_order2 .=" ,sum_price = '".$sum_price_new."'";
            $strSQL_insert_order2 .=" ,remark = '".$remark."'";
            $strSQL_insert_order2 .=" ,id_staff = '".$id_account_self."'";
            $strSQL_insert_order2 .=" ,modify_date = '".date('Y-m-d')."'";
            $strSQL_insert_order2 .=" WHERE id_order  = '".$id_order ."'";

            $objQuery_insert_order2 = mysql_query($strSQL_insert_order2);

            if(!$objQuery_insert_order2)
            {
                echo "fail !!! : $strSQL_insert_order2 (request.php)";
            }else{
                echo $id_order;
            }
        }
    }
}

if($type == "update_order"){
    $params = array();
    parse_str($_GET['datas_order'], $params); 
    $id_order = $params['id_order'];
    $remark = $params['remark'];

    if($id_order != ''){



        $strSQL_insert_order = "UPDATE book_order SET"; 
        $strSQL_insert_order .=" remark = '".$remark."'";
        $strSQL_insert_order .=" ,id_staff = '".$id_account_self."'";
        $strSQL_insert_order .=" ,modify_date = '".date('Y-m-d')."'";
        $strSQL_insert_order .=" WHERE id_order  = '".$id_order ."'";
        $objQuery_insert_order = mysql_query($strSQL_insert_order);
        if(!$objQuery_insert_order)
        {
            echo "fail !!! : $strSQL_insert_order (request.php)";
        }else{
            echo $strSQL_insert_order;
        }
    }else{
        echo "fail !!  : $strSQL_insert_order (request.php)";
    }
}


if($type == "select_approve"){
    $id = $_GET['id'];
    $strSQL_requests =  "SELECT book_order.id_order,
                                book_order.`code`,
                                book_order.qty,
                                book_order.sum_price,
                                book_order.id_staff,
                                book_order.`status`,
                                book_order.remark,
                                book_order.create_date,
                                book_order.modify_date,
                                staff.stname AS staff_name, 
                                branch.`name` AS branch_name,
                                branch.`branchid` AS branch_id,
                                book_order.approve_remark,
                                book_order.approve_date,
                                book_order.shipping_charge,
                                book_order.payment_date,
                                book_order.payment_type,
                                book_order.payment_image,
                                book_order.payment_remark,
                                book_order.payment_delivery_address,
                                book_order.payment_id_staff,
                                book_order.approve_delivery_sdate,
                                book_order.approve_delivery_edate,
                                book_order.approve_delivery_remark,
                                book_order.approve_delivery_id_staff
                                FROM book_order 
                            LEFT JOIN staff ON staff.stid = book_order.id_staff
                            LEFT JOIN branch ON branch.branchid = staff.branchid
                            WHERE id_order = ".$id;
              // "SELECT
              //     book_requests.id as id,
              //     book_requests.id_book as id_book,
              //     book_requests.qty as qty,
              //     book_requests.price as price,
              //     book_requests.sum_price as sum_price,
              //     book_requests.id_staff as id_staff,
              //     book_requests.remark as remark,
              //     book_requests.status as status,
              //     book_requests.create_date,
              //     book_requests.approve_qty, 
              //     book_requests.approve_sum_price,
              //     book_requests.approve_remark,
              //     book_requests.approve_date,
              //     book_requests.approve_id_staff,
              //     book_requests.payment_sum_price,
              //     book_requests.payment_date,
              //     book_requests.payment_type,
              //     book_requests.payment_remark,
              //     book_requests.payment_id_staff,
              //     book_information.id as id_book_information,
              //     book_information.code as book_code,
              //     book_information.title as book_name,
              //     book_information.id_subject as subject_id,
              //     book_information.type as subject_type,
              //     book_information.qty as book_qty
              //     FROM
              //     book_requests
              //     LEFT JOIN book_information ON book_information.id = book_requests.id_book
              //     WHERE ";
  // $strSQL_requests .= " book_requests.id = '".$id."'";
  // $strSQL_requests .= " ORDER BY book_requests.`id` DESC";

  $objQuery_requests = mysql_query($strSQL_requests) or die ("Error Query [".$strSQL_requests."]");
  $objResult_requests = mysql_fetch_array($objQuery_requests);
  if(!$objQuery_requests)
    {
        echo "fail!!  : $strSQL_requests (request.php)";
    }else{
        echo json_encode($objResult_requests);
    }
}

if($type == "update_approve"){

    $params = array();
    parse_str($_GET['datas'], $params); 

    $id = $params['modal_approve_request_id'];
    $status = $params['modal_approve_status'];
    //$approve_qty = $params['quantity'];
    $approve_remark = $params['modal_approve_remark'];
    //$approve_sum_price = $params['modal_approve_sum_price_hidden'];
    $approve_date = date("Y-m-d");
    $approve_id_staff = $id_account_self;
    //$id_book = $params['modal_approve_id_book_information'];
    //$qty_totle = $params['modal_approve_qty_totle'];
    $shipping_charge = trim($params['shipping_charge']);
    if ( is_numeric($shipping_charge) ){
        $shipping_charge = $shipping_charge+0;
    }
    else {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('กรุณากรอกค่าจัดส่งเป็นตัวเลข');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    }

    $strSQL_sum_price = "SELECT SUM(sum_price) as sum_price_new FROM book_requests WHERE id_order = ".$id;
    $objQuery_sum_price = mysql_query($strSQL_sum_price);
    $result_price = mysql_fetch_array($objQuery_sum_price);
    $sum_price_new1 = $result_price['sum_price_new'];
    $sum_price_new2 = ($sum_price_new1+0) + $shipping_charge;

    $strSQL_update_status = "UPDATE book_order SET"; 
    $strSQL_update_status .=" status = '".$status."'";
    //$strSQL_update_status .=" ,approve_qty = '".$approve_qty."'";
    $strSQL_update_status .=" ,sum_price = '".$sum_price_new2."'";
    $strSQL_update_status .=" ,approve_remark = '".$approve_remark."'";
    $strSQL_update_status .=" ,approve_date = '".$approve_date."'";
    $strSQL_update_status .=" ,approve_id_staff = '".$approve_id_staff."'";
    $strSQL_update_status .=" ,shipping_charge = '".$shipping_charge."'";
    $strSQL_update_status .=" WHERE id_order  = '".$id ."'";
    $objQuery_update_status = mysql_query($strSQL_update_status);
    if(!$objQuery_update_status)
    {
        echo "fail!!  : $strSQL_update_status (request.php)";
    }else{
        // $strSQL_information =  "SELECT book_information.qty FROM book_information WHERE id = '".$id_book."'";
        // $objQuery_information = mysql_query($strSQL_information) or die ("Error Query [".$strSQL_information."]");
        // $objResult_information = mysql_fetch_array($objQuery_information);
        // $remain = $objResult_information['qty'] - $approve_qty;
        // $strSQL_update_qty = "UPDATE book_information SET"; 
        // $strSQL_update_qty .=" qty  = '".$remain."'";
        // $strSQL_update_qty .=" WHERE id  = '".$id_book ."'";
        // $objQuery_update_qty = mysql_query($strSQL_update_qty);
        // if(!$objQuery_update_qty)
        // {
        //  echo "fail!!  : $objQuery_update_qty (request.php)";
        // }else{
        //  echo "";
        // }
        $strSQL_requests =  "SELECT * FROM book_requests WHERE id_order = '".$id."'";
        $objQuery_requests = mysql_query($strSQL_requests) or die ("Error Query [".$strSQL_requests."]");
        while ($objResult_requests = mysql_fetch_array($objQuery_requests)) {
            $strSQL_information =  "SELECT book_information.qty FROM book_information WHERE id = '".$objResult_requests['id_book']."'";
            $objQuery_information = mysql_query($strSQL_information) or die ("Error Query [".$strSQL_information."]");
            $objResult_information = mysql_fetch_array($objQuery_information);
            $sum = $objResult_information['qty'] - $objResult_requests['qty'];
            //echo $sum;exit();

             $strSQL_update_information = "UPDATE book_information SET"; 
             $strSQL_update_information .=" qty = '".$sum."'";
             $strSQL_update_information .=" WHERE id  = '".$objResult_requests['id_book']."'";
             echo $strSQL_update_information;
             $objQuery_update_information = mysql_query($strSQL_update_information);
            if(!$objQuery_update_information){
                echo "fail!!  : $strSQL_update (request.php)";
            }else{
                echo "";
            }
        }
    }
}

// if($type == "update_payment"){

//  $params = array();
//  parse_str($_GET['datas'], $params); 

//  $id = $params['modal_payment_id'];
//  $status = $params['modal_payment_status'];
//  $payment_sum_price = $params['modal_payment_sum_price'];
//  $payment_remark = $params['modal_payment_remark'];
//  $payment_date = $params['modal_payment_date'];
//  $payment_type = $params['modal_payment_type'];
//  $payment_id_staff = $id_account_self;

//  $strSQL_update = "UPDATE book_order SET"; 
//  $strSQL_update .=" status = '".$status."'";
//  $strSQL_update .=" ,payment_sum_price = '".$payment_sum_price."'";
//  $strSQL_update .=" ,payment_remark = '".$payment_remark."'";
//  $strSQL_update .=" ,payment_date = '".$payment_date."'";
//  $strSQL_update .=" ,payment_type = '".$payment_type."'";
//  $strSQL_update .=" ,payment_id_staff = '".$id_account_self."'";
//  $strSQL_update .=" WHERE id  = '".$id ."'";
//  $objQuery_update = mysql_query($strSQL_update);
//  if(!$objQuery_update){
//      echo "fail!!  : $strSQL_update (request.php)";
//  }else{
//      echo "";
//  }
// }

if($type == "update_payment"){

    $target_dir = "uploads/";
    $imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
    // $target_file = $target_dir . date("YmdHis") . "_" .basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $_POST['modal_payment_id']. "_" .date("YmdHis").".".$imageFileType;
    $uploadOk = 1;
    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('File is an image - " . $check["mime"] . ".');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            $uploadOk = 1;
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('File is not an image.');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('Sorry, file already exists.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('Sorry, your file is too large.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }
    // Allow certain file formats
    /*if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
    && $imageFileType != "gif" ||  $imageFileType != "JPG" ||  $imageFileType != "PNG" || $imageFileType != "GIF" || $imageFileType != "JPEG") {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }*/
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('Sorry, your file was not uploaded $check');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            /*$params = array();
            parse_str($_POST['datas'], $params); 
            print_r($params);*/

            $id = $_POST['modal_payment_id'];
            $status = $_POST['modal_payment_status'];
            $payment_sum_price = $_POST['modal_payment_sum_price'];
            $payment_remark = $_POST['modal_payment_remark'];
            $payment_date = $_POST['modal_payment_date'];
            $payment_type = $_POST['modal_payment_type'];
            $payment_delivery_address = $_POST['modal_payment_address'];
            $payment_image = $target_file;
            $payment_id_staff = $id_account_self;

            $strSQL_update = "UPDATE book_order SET"; 
            $strSQL_update .=" status = '".$status."'";
            //$strSQL_update .=" ,payment_sum_price = '".$payment_sum_price."'";
            $strSQL_update .=" ,payment_remark = '".$payment_remark."'";
            $strSQL_update .=" ,payment_date = '".$payment_date."'";
            $strSQL_update .=" ,payment_type = '".$payment_type."'";
            $strSQL_update .=" ,payment_image = '".$payment_image."'";
            $strSQL_update .=" ,payment_id_staff = '".$id_account_self."'";
            $strSQL_update .=" ,payment_delivery_address= '".$payment_delivery_address."'";
            $strSQL_update .=" WHERE id_order  = '".$id ."'";
            $objQuery_update = mysql_query($strSQL_update);
            if(!$objQuery_update){
                echo "fail!!  : $strSQL_update (request.php)";
            }else{
                echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            }
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('#Sorry, there was an error uploading your file. $check');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        }
    }
    
}



if($type == "update_approve_payment"){

    $params = array();
    parse_str($_GET['datas'], $params);

    //print_r($params); exit();

    $id = $params['modal_approve_payment_id'];
    $status = $params['modal_approve_payment_status'];
    $sdate = $params['modal_approve_payment_sdate'];
    $edate = $params['modal_approve_payment_edate'];
    $remark = $params['modal_approve_payment_remark'];
    $id_staff = $id_account_self;

    $type_bill = 3;
    $id_branch = $params['modal_approve_payment_id_branch'];
    $bill = bill_number($type_bill ,$id_branch);
    $number_all = $bill['number_all'];
    $number_branch = $bill['number_branch'];
    $no_all = $bill['no_all'];
    $no_branch = $bill['no_branch'];
    $year = $bill['year'];
    $date = date("Y-m-d H:s:i");

    $strSQL_update = "UPDATE book_order SET"; 
    $strSQL_update .=" no_bill_all = '".$number_all."'";
    $strSQL_update .=" ,no_bill_branch = '".$number_branch."'";
    $strSQL_update .=" ,status = '".$status."'";
    $strSQL_update .=" ,approve_delivery_sdate = '".$sdate."'";
    $strSQL_update .=" ,approve_delivery_edate = '".$edate."'";
    $strSQL_update .=" ,approve_delivery_remark = '".$remark."'";
    $strSQL_update .=" ,approve_delivery_id_staff = '".$id_staff."'";
    $strSQL_update .=" WHERE id_order  = '".$id ."'";
    $objQuery_update = mysql_query($strSQL_update);
    if(!$objQuery_update){
        echo "fail!!  : $strSQL_update (request.php)";
    }else{
      //echo "บันทึกเรียบร้อยแล้ว";
      $strSQL = "INSERT INTO bill_number "; 
      $strSQL .="(id_bill_all, no_bill_all, id_bill_branch, no_bill_branch, type_bill ,id_branch, year_, create_at)";
      $strSQL .="VALUES ";
      $strSQL .="('".$no_all."' ";
      $strSQL .=",'".$number_all."' ";
      $strSQL .=",'".$no_branch."' ";
      $strSQL .=",'".$number_branch."' ";
      $strSQL .=",'".$type_bill."' ";
      $strSQL .=",'".$id_branch."' ";
      $strSQL .=",'".$year."' ";
      $strSQL .=",'".$date."') ";
      $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
      if(!$objQuery)
      {
          echo "fail !!! : $strSQL (report.php)";
      }else{
          //echo "1";
      }
    }
}

function bill_number($type_bill ,$id_branch){

  $number_all ='';
  $number_branch ='';

  if($type_bill == "1"){  // self = s
    $text_type = "S";
  }else if($type_bill == "2"){ // receipt = R ใบเสร็จ
    $text_type = "R";
  }else if($type_bill == "3"){ // book_store = B 
    $text_type = "B";
  }

  $strSQL_branch = "SELECT * FROM branch WHERE branchid ='".$id_branch."'"; 
  $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
  $objResult_branch = mysql_fetch_array($objQuery_branch);

  //--- bill all---//
  $y = date('Y') + 543;
  $strSQL_select = "SELECT MAX(id_bill_all) FROM bill_number WHERE year_ ='".substr($y,2,2)."' AND type_bill=".$type_bill; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
   if(!$objQuery_select)
   {
       //echo "fail !!! : $strSQL_select (report.php)";
        $id_bill_all = 0;
   }else{
        $max = mysql_fetch_array($objQuery_select);
        $id_bill_all = $max[0]+1;
   }
  $h = 4;//จำนวนหลัก
  $year = substr($y,2,2);
  $number_all = $text_type.$objResult_branch['branch_number']."-".$year.sprintf("%0".$h."d",$id_bill_all);

  //---- bill branch---//
  $strSQL_select = "SELECT MAX(id_bill_branch) FROM bill_number WHERE id_branch ='".$id_branch."' AND type_bill=".$type_bill; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
   if(!$objQuery_select)
   {
       //echo "fail !!! : $strSQL_select (report.php)";
        $id_bill_branch = 0;
   }else{
        $max = mysql_fetch_array($objQuery_select);
        $id_bill_branch = $max[0]+1;
   }
  $h = 4;//จำนวนหลัก
  $year = substr($y,2,2);
  $number_branch = $text_type.$objResult_branch['branch_number']."-".$year.sprintf("%0".$h."d",$id_bill_branch);
  //echo $bill_number.",";

  $array = array( 'number_all' => $number_all, 
                  'no_all' => $id_bill_all, 
                  'number_branch' => $number_branch,
                  'no_branch' => $id_bill_branch,
                  'year' => $year
                );
  return $array;
}

if($type == "update_approve_delivery"){

    $params = array();
    parse_str($_GET['datas'], $params); 

    $id = $params['modal_approve_delivery_id'];
    $status = $params['modal_approve_delivery_status1'];
    $remark = $params['modal_approve_delivery_remark'];
    $date = $params['modal_approve_delivery_date'];
    $status2 = $params['modal_approve_delivery_status2'];
    $id_staff = $id_account_self;

    $strSQL_update = "UPDATE book_order SET"; 
    $strSQL_update .=" status = '".$status."'";
    $strSQL_update .=" ,delivery_date = '".$date."'";
    $strSQL_update .=" ,delivery_status = '".$status2."'";
    $strSQL_update .=" ,delivery_remark = '".$remark."'";
    $strSQL_update .=" ,delivery_id_staff = '".$id_staff."'";
    $strSQL_update .=" WHERE id_order  = '".$id ."'";
    $objQuery_update = mysql_query($strSQL_update);
    if(!$objQuery_update){
        echo "fail!!  : $strSQL_update (request.php)";
    }else{
        //echo "";
        $strSQL_requests =  "SELECT * FROM book_requests WHERE id_order = '".$id."'";
        $objQuery_requests = mysql_query($strSQL_requests) or die ("Error Query [".$strSQL_requests."]");
        while ($objResult_requests = mysql_fetch_array($objQuery_requests)) {

            $strSQL_book_store =  "SELECT book_store.qty FROM book_store WHERE id_book = '".$objResult_requests['id_book']."' AND id_branch=".$id_branch_self;
            $objQuery_book_store = mysql_query($strSQL_book_store) or die ("Error Query [".$strSQL_book_store."]");
            $objResult_book_store = mysql_fetch_array($objQuery_book_store);

            if($objResult_book_store){
                
                $sum = $objResult_requests['qty'] + $objResult_book_store['qty'];

                $strSQL_update_book_store = "UPDATE book_store SET"; 
                $strSQL_update_book_store .=" qty = '".$sum."'";
                $strSQL_update_book_store .=" WHERE id_book  = '".$objResult_requests['id_book']."'";
                //echo $strSQL_update_book_store;

                $objQuery_update_book_store = mysql_query($strSQL_update_book_store);

                if(!$objQuery_update_book_store){
                    echo "fail!!  : $strSQL_update (request.php)";
                }else{
                    //echo "";
                }
            }else{
                $create_date = date('Y-m-d');
                $strSQL_insert_book_store = "INSERT INTO book_store "; 
                $strSQL_insert_book_store .="(id_book,qty,id_branch,create_date) ";
                $strSQL_insert_book_store .="VALUES ";
                $strSQL_insert_book_store .="('".$objResult_requests['id_book']."' ";
                $strSQL_insert_book_store .=",'".$objResult_requests['qty']."' ";
                $strSQL_insert_book_store .=",'".$id_branch_self."' ";
                $strSQL_insert_book_store .=",'".$create_date."') ";
                //echo $strSQL_insert_book_store;

                $objQuery_insert_book_store = mysql_query($strSQL_insert_book_store);
                if(!$objQuery_insert_request)
                {
                    echo "fail !!! : $strSQL_insert_book_store (request.php)";
                }else{
                    //echo $id_order;
                }
            }
        }
    }
}

if($type == "update_approve_cancel"){

    $params = array();
    parse_str($_GET['datas'], $params); 

    $id = $params['modal_approve_cancel_request_id'];
    $status = $params['modal_approve_cancel_status'];
    $remark = $params['modal_approve_cancel_remark'];
    $qty = $params['modal_approve_cancel_qty'];
    $date = date("Y-m-d");
    $id_staff = $id_account_self;

    $strSQL_update = "UPDATE book_order SET"; 
    $strSQL_update .=" status = '".$status."'";
    $strSQL_update .=" ,approve_cancel_date = '".$date."'";
    $strSQL_update .=" ,approve_cancel_remark = '".$remark."'";
    $strSQL_update .=" ,approve_cancel_id_staff = '".$id_staff."'";
    $strSQL_update .=" WHERE id_order  = '".$id ."'";
    $objQuery_update = mysql_query($strSQL_update);
    if(!$objQuery_update){
        echo "fail!!  : $strSQL_update (request.php)";
    }else{

    $strSQL_requests =  "SELECT * FROM book_requests WHERE id_order = '".$id."'";
    $objQuery_requests = mysql_query($strSQL_requests) or die ("Error Query [".$strSQL_requests."]");
    while ($objResult_requests = mysql_fetch_array($objQuery_requests)) {
        $strSQL_information =  "SELECT book_information.qty FROM book_information WHERE id = '".$objResult_requests['id_book']."'";
        $objQuery_information = mysql_query($strSQL_information) or die ("Error Query [".$strSQL_information."]");
        $objResult_information = mysql_fetch_array($objQuery_information);
        $sum = $objResult_information['qty'] + $objResult_requests['qty'];

         $strSQL_update = "UPDATE book_information SET"; 
         $strSQL_update .=" qty = '".$sum."'";
         $strSQL_update .=" WHERE id  = '".$id_book ."'";
         $objQuery_update = mysql_query($strSQL_update);
            if(!$objQuery_update){
                echo "fail!!  : $strSQL_update (request.php)";
            }else{
                echo "";
            }
        }
    }
}

if($type == "book_store_self"){
    $strSQL_subjectall = "SELECT book_information.`id` as id,
                            book_information.title as title
                            FROM  `book_information` 
                            LEFT JOIN subject ON book_information.id_subject = subject.subid
                            LEFT JOIN teacher ON subject.teacherid = teacher.teacherid
                            WHERE book_information.status = 1 AND subject.teacherid = '".$_GET['teacher_id']."'
                            ORDER BY  subject.teacherid ,`book_information`.`title` ASC";

    $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");
    while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {
        $book[] = $objResult_subjectall['id'].",".$objResult_subjectall['title'];
    }
    if(!$book){
        echo "fail!!  : $strSQL_subjectall (request.php)";
    }else{
        echo json_encode($book);
    }
}

if($type == "add_book_store_self"){

    $strSQL_subjectall = "SELECT
            `subject`.subid,
            `subject`.subname,
            subject_real.name_subject_real
            FROM
            `subject`
            LEFT JOIN subject_real ON subject_real.id_subject_real = `subject`.id_subject_real
            LEFT JOIN teacher ON subject.teacherid = teacher.teacherid
            WHERE status_branch_hms = 1 AND status_delete != 1 AND subject.teacherid = '".$_GET['teacher_id']."'
              ORDER BY subject_real.name_subject_real ASC" ; 

    $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");

    while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {

        if($objResult_subjectall['name_subject_real'] == ''){
            $name_subject = $objResult_subjectall['subname'];
        }else{
            $name_subject = $objResult_subjectall['name_subject_real'];
        }
        $book[] = $objResult_subjectall['subid'].",".$name_subject;
    }
    if(!$book){
        echo "fail!!  : $strSQL_subjectall (request.php)";
    }else{
        echo json_encode($book);
    }
}

if($type == "edit_book_store_self"){

    $strSQL_subjectall = "SELECT
            `subject`.subid,
            `subject`.subname,
            subject_real.name_subject_real
            FROM
            `subject`
            LEFT JOIN subject_real ON subject_real.id_subject_real = `subject`.id_subject_real
            LEFT JOIN teacher ON subject.teacherid = teacher.teacherid
            WHERE status_branch_hms = 1 AND status_delete != 1 AND subject_real.id_teacher = '".$_GET['teacher_id']."'
              ORDER BY subject_real.name_subject_real ASC" ; 

    $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");

    while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {

        if($objResult_subjectall['name_subject_real'] == ''){
            $name_subject = $objResult_subjectall['subname'];
        }else{
            $name_subject = $objResult_subjectall['name_subject_real'];
        }
        $book[] = $objResult_subjectall['subid'].",".$name_subject;
    }
    if(!$book){
        echo "fail!!  : $strSQL_subjectall (request.php)";
    }else{
        echo json_encode($book);
    }
}



?>