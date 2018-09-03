<?php
   session_start();
   include('config/config_db_self.php');

if($_GET['type'] == "update_payment"){
    $target_dir = "upload/";
    $imageFileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
    // $target_file = $target_dir . date("YmdHis") . "_" .basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $_POST['id']. "_" .date("YmdHis").".".$imageFileType;
    //echo $target_file;
    $uploadOk = 1;
    //$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('#1File is an image - " . $check["mime"] . ".');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            $uploadOk = 1;
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('#2File is not an image.');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('#3Sorry, file already exists.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('#4Sorry, your file is too large.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }
    // Allow certain file formats
   /* if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
    && $imageFileType != "gif" ||  $imageFileType != "JPG" ||  $imageFileType != "PNG" || $imageFileType != "GIF" || $imageFileType != "JPEG") {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('#5Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        $uploadOk = 0;
    }*/
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
        echo "<script language='javascript'>alert('#6Sorry, your file was not uploaded $check');</script>";
        echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            /*$params = array();
            parse_str($_POST['datas'], $params); 
            print_r($params);*/

            $id = $_POST['id'];
            $number_bill = $_POST['number_bill'];
            $status = $_POST['modal_payment_status'];
            $payment_date = $_POST['modal_payment_date'];
            $payment_type = $_POST['modal_payment_type'];

            $payment_remark = $_POST['modal_payment_remark'];
            $payment_id_staff = $_POST['id_account_self'];
            $payment_image = $target_file;
            //echo $payment_id_staff;

            $strSQL_update = "UPDATE bill SET"; 
            $strSQL_update .=" status = '".$status."'";
            $strSQL_update .=" ,payment_remark = '".$payment_remark."'";
            $strSQL_update .=" ,payment_date = '".$payment_date."'";
            $strSQL_update .=" ,payment_type = '".$payment_type."'";
            $strSQL_update .=" ,payment_image = '".$payment_image."'";
            $strSQL_update .=" ,payment_id_staff = '".$payment_id_staff."'";
            $strSQL_update .=" ,update_at = '".date('Y-m-d H:i:s')."'";
            $strSQL_update .=" WHERE id = '".$id ."'";
            $objQuery_update = mysql_query($strSQL_update);
            if(!$objQuery_update){
                echo "fail!!  : $strSQL_update (request.php)";
            }else{
                echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
            }
        } else {
            echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
            echo "<script language='javascript'>alert('#7Sorry, there was an error uploading your file. $check');</script>";
            echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
        }
    }    
}

if($_GET['action_type'] == "updateStatus"){
  $id = $_GET['id'];
  $status = $_GET['status'];

  $strSQL_update = "UPDATE bill SET"; 
  $strSQL_update .=" status = '".$status."'";
  $strSQL_update .=" WHERE id_bill  = '".$id ."'";
  $objQuery_update = mysql_query($strSQL_update) or die ("Error Query [".$strSQL_update."]");
    if(!$objQuery_update)
    {
        echo "fail!!  : $objQuery_update (report.php)";
    }else{
        echo "บันทึกเรียบร้อยแล้ว";
    }
}

if($_GET['action_type'] == "deleteBillPay"){
  $id = $_GET['id'];
  if($id){
    $strSQL_delete = "DELETE FROM `bill` WHERE id_bill = ".$id; 
    $objQuery_delete = mysql_query($strSQL_delete) or die ("Error Query [".$strSQL_delete."]");
      if(!$objQuery_delete)
      {
          echo "fail!!  : $objQuery_delete (report.php)";
      }
  }else{
     echo "fail!! ไม่สามารถลบได้ (report.php)";
  }
}

if($_GET['action_type'] == "deleteSetting"){
  $id = $_GET['id'];
  $id_set = $_GET['id_set'];
  $update_percent = $_GET['update_percent'];

  $strSQL_bill = "SELECT * FROM bill WHERE id_set ='".$id_set."'"; 
  $objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");
  $objResult_bill = mysql_fetch_array($objQuery_bill); 
  //echo $objResult_bill['id_bill'];
   if(!$objResult_bill){
      $strSQL_delete = "DELETE FROM `bill_percent` WHERE id = ".$id; 
      $objQuery_delete = mysql_query($strSQL_delete) or die ("Error Query [".$strSQL_delete."]");
        if(!$objQuery_delete)
        {
            echo "fail!!  : $objQuery_delete (report.php)";
        }else{
            echo "";
        }
   }else{
      echo "เนื่องจากมีการใช้งาน จึงไม่สามารถลบได้";
   }
}

if($_GET['action_type'] == "editSetting"){
  $id = $_GET['id'];
  $id_set = $_GET['id_set'];
  $update_percent = $_GET['update_percent'];

  $strSQL_bill = "SELECT * FROM bill WHERE id_set ='".$id_set."'"; 
  $objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");
  $objResult_bill = mysql_fetch_array($objQuery_bill); 
  //echo $objResult_bill['id_bill'];
   if(!$objResult_bill){
      $strSQL_update = "UPDATE bill_percent SET"; 
      $strSQL_update .=" percent = '".$update_percent."'";
      $strSQL_update .=" WHERE id  = '".$id ."'";
      $objQuery_update = mysql_query($strSQL_update) or die ("Error Query [".$strSQL_update."]");
        if(!$objQuery_update)
        {
            echo "fail!!  : $objQuery_update (report.php)";
        }else{
            echo "บันทึกเรียบร้อยแล้ว";
        }
   }else{
      echo "เนื่องจากมีการใช้งาน จึงไม่สามารถอัพเดจได้";
   }
}
if($_GET['action_type'] == "insert_bill"){
  $quantity = $_GET['quantity'];
  $s_date = $_GET['s_date'];
  $e_date = $_GET['e_date'];
  $type_ = $_GET['type'];
  $price_self = $_GET['price_self'];
  $branch_array = $_GET['branch'];
  $teacher_array = $_GET['teacher']; 
  $pay_array = $_GET['pay'];
  $set_pay = $_GET['set_pay'];
  $create_at = date('Y-m-d H:i:s');
  //$subject_array = $_GET['subject'];
   // for($i = 0 ; $i < count($subject_array); $i++) {
   //    if($i == 0){
   //       $subject = $subject_array[$i];
   //    }else{
   //       $subject .= ",".$subject_array[$i];
   //    }
   // }
  
  // $term_array = $_GET['term'];
  //  for($i = 0 ; $i < count($term_array); $i++) {
  //     if($i == 0){
  //        $term = $term_array[$i];
  //     }else{
  //        $term .= ",".$term_array[$i];
  //     }
  //  }
  
   for($i = 0 ; $i < count($teacher_array); $i++) {
      if($i == 0){
         $teacher = $teacher_array[$i];
      }else{
         $teacher .= ",".$teacher_array[$i];
      }
   }

   for($i = 0 ; $i < count($pay_array); $i++) {
      if($i == 0){
         $pay = "'".$pay_array[$i]."'";
      }else{
         $pay .= ",'".$pay_array[$i]."'";
      }
   }

  for($i = 0 ; $i < count($pay_array); $i++) {
      if($i == 0){
         $pay_insert = $pay_array[$i];
      }else{
         $pay_insert .= ",".$pay_array[$i];
      }
  }

  /*$strSQL_select = "SELECT MAX(id_bill) FROM bill "; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
  $objResult_select = mysql_fetch_array($objQuery_select); 
   if(!$objResult_select)
   {
       echo "fail !!! : $strSQL_select (report.php)";
   }else{
        $max = mysql_fetch_array($objResult_select);
        $id_bill = $max[0];
   }*/
  $y = date('Y') + 543;
  $strSQL_select = "SELECT MAX(id_bill) FROM bill WHERE year ='".substr($y,2,2)."'"; 
  $objQuery_select = mysql_query($strSQL_select) or die ("Error Query [".$strSQL_select."]");
   if(!$objQuery_select)
   {
       //echo "fail !!! : $strSQL_select (report.php)";
        $id_bill = 0;
   }else{
        $max = mysql_fetch_array($objQuery_select);
        $id_bill = $max[0];
   }

  $strSQL_bill_percent = "SELECT * FROM bill_percent"; 
  $objQuery_bill_percent = mysql_query($strSQL_bill_percent) or die ("Error Query [".$strSQL_bill_percent."]");
   if(!$objQuery_bill_percent){
       echo "fail !!! : $strSQL_select (report.php)";
   }

  for($i = 0 ; $i < count($branch_array); $i++) {

    $id_bill = $id_bill+1;

    $branch = $branch_array[$i];

    for($j = 0 ; $j < count($teacher_array); $j++) {

      $teacher_ = $teacher_array[$j];

      $sql_teacher[$j] = 
                    "SELECT 
                      credit.accid,
                      credit.amount,
                      credit.type_pay,
                      credit.date_pay,
                      credit.date_regis,
                      credit.amount AS self_amount,
                      account.status AS branch_id,
                      branch.name AS branch_name,
                      branch.branch_number AS branch_number,
                      subject_real.name_subject_real AS name_subject_real,
                      subject_real.price AS subject_real_price
                      FROM credit
                      LEFT JOIN account ON account.accid = credit.accid
                      LEFT JOIN branch ON account.status = branch.branchid
                      LEFT JOIN subject ON credit.subid = subject.subid
                      LEFT JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real
                      WHERE 
                      subject.teacherid = $teacher_ AND branch.branchid = $branch AND credit.date_pay BETWEEN '".$s_date."' AND '".$e_date."'";
      if($pay){
        $sql_teacher[$j] .= " AND credit.type_pay IN ($pay)";
      }    
      $sql_teacher[$j] .= " AND credit.type_pay != 'test' AND credit.type_pay != 'free' ";

      $sql_teacher[$j] .=  "AND account.status != 'out'";     

      if ($price_self == "self_amount"){
        $colunm = "self_amount";
      }if ($price_self == "subject_real_price") {
        $colunm = "subject_real_price";
      }
      $strSQL_sum = "SELECT SUM($colunm) as sum_amount FROM ( $sql_teacher[$j] ) as sum_amount";
      $objQuery_sum = mysql_query($strSQL_sum) or die ("Error Query [".$strSQL_sum."]");
      $objResult_sum1 = mysql_fetch_array($objQuery_sum); 
      $objResult_sum[$branch][$teacher_] = $objResult_sum1;

      $sql_bill_percent = "SELECT * FROM bill_percent WHERE teacher_id = $teacher_ AND id_set = '".$set_pay."'";
      $objQuery_bill_percent = mysql_query($sql_bill_percent) or die ("Error Query [".$sql_bill_percent."]");
      $objResult_bill_percent = mysql_fetch_array($objQuery_bill_percent);
      $objResult_pay_teacher = ($objResult_sum1['sum_amount']*$objResult_bill_percent['percent'])/100;
      //test pay by teacher
      $objResult_pay_print = "sum=".$objResult_sum1['sum_amount']."*".$objResult_bill_percent['percent']."/100= ".$objResult_pay_teacher;
      $objResult[$branch][$teacher_] = $objResult_pay_print;
      $sum_by_branch += $objResult_pay_teacher;

      $strSQL_branch = "SELECT * FROM branch WHERE branchid=".$branch; 
      $objQuery_branch = mysql_query($strSQL_branch) or die ("Error Query [".$strSQL_branch."]");
      $objResult_branch = mysql_fetch_array($objQuery_branch); 
      $h = 4;//จำนวนหลัก
      $year = substr($y,2,2);
      $bill_number = $objResult_branch['branch_number']."/".$year.sprintf("%0".$h."d",$id_bill);;
      //echo $bill_number.",";

    }
  
    $strSQL = "INSERT INTO bill "; 
    $strSQL .="(id_bill,year,number_bill,s_date,e_date,id_set,type_,subject,branch,term,teacher,pay,price_self_type,price_self,create_at)";
    $strSQL .="VALUES ";
    $strSQL .="('".$id_bill."' ";
    $strSQL .=",'".$year."' ";
    $strSQL .=",'".$bill_number."' ";
    $strSQL .=",'".$s_date."' ";
    $strSQL .=",'".$e_date."' ";
    $strSQL .=",'".$set_pay."' ";
    $strSQL .=",'".$type_."' ";
    $strSQL .=",'".$subject."' ";
    $strSQL .=",'".$branch."' ";
    $strSQL .=",'".$term."' ";
    $strSQL .=",'".$teacher."' ";
    $strSQL .=",'".$pay_insert."' ";
    $strSQL .=",'".$colunm."' ";
    $strSQL .=",'".$sum_by_branch."' ";
    $strSQL .=",'".$create_at."') ";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    if(!$objQuery)
    {
        echo "fail !!! : $strSQL (report.php)";
    }else{
        echo "1";
    }

  }
    //test print pay by teacher
    // print_r($objResult);
    // echo "<br />sum_by_branch".$sum_by_branch;
   
}

?>