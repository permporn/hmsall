<?php

  session_start();

  include('config/config_multidb.php');

  error_reporting(~E_NOTICE);


if($_GET['action_type'] == "insertPayPromotion"){

  $id = $_GET['id'];

  $pay = $_GET['pay'];

  $remark = $_GET['remark'];

  //echo $id.",".$pay.",".$remark;

  if($id != ''){

    $strSQL_update = "UPDATE bill SET"; 

    $strSQL_update .=" price_discount   = '".$pay."'";

    $strSQL_update .=",price_discount_remark   = '".$remark."'";

    $strSQL_update .=" WHERE id  = '".$id ."'";

    $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

      if(!$objQuery_update)

      {

          echo "fail!!  : $objQuery_update (report.php)";

      }else{

          echo "บันทึกเรียบร้อยแล้ว-".$strSQL_update ;//$strSQL_update;//

      }

   }else{

      echo "ไม่สามารถลบได้";

   }

}
   

if($_GET['action_type'] == "deleteSetting_course"){

  $id = $_GET['id'];

  $id_type = $_GET['id_type'];



  $strSQL_bill = "SELECT * FROM credit WHERE type_self ='".$id_type."'"; 

  $objQuery_bill = mysqli_query($con_ajtongmath_self,$strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

  $objResult_bill = mysqli_fetch_array($objQuery_bill); 

  //echo $objResult_bill['id_bill'];

   if(!$objResult_bill){

      $strSQL_delete = "DELETE FROM `type_self` WHERE id = ".$id; 

      $objQuery_delete = mysqli_query($con_ajtongmath_self,$strSQL_delete) or die ("Error Query [".$strSQL_delete."]");

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



if($_GET['type'] == "insert_setting_sub"){

    $id_set = $_GET['id_set'];

    $teacher_set = $_GET['teacher_set'];

    $percent =$_GET['percent_set'];

    

    $strSQL_select = "SELECT set_name FROM bill_percent WHERE id_set=".$id_set; 

    $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

     if(!$objQuery_select)

     {

          echo "fail !!! : $strSQL (report.php)";

     }else{

          $select = mysqli_fetch_array($objQuery_select);

     }

      $strSQL = "INSERT INTO bill_percent "; 

      $strSQL .="(id_set, set_name, teacher_id, percent)";

      $strSQL .="VALUES ";

      $strSQL .="('".$id_set."' ";

      $strSQL .=",'".$select['set_name']."' ";

      $strSQL .=",'".$teacher_set."' ";

      $strSQL .=",'".$percent."') ";

      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");

      if(!$objQuery)

      {

          echo "fail !!! : $strSQL (report.php)";

      }else{

          echo "1";

      }

}



if($_GET['action_type'] == "deleteSetting_sub"){

  $id = $_GET['id'];

  if($id){

      $strSQL_delete = "DELETE FROM `bill_percent` WHERE id = ".$id; 

      $objQuery_delete = mysqli_query($con_ajtongmath_self,$strSQL_delete) or die ("Error Query [".$strSQL_delete."]");

        if(!$objQuery_delete)

        {

            echo "fail!!  : $objQuery_delete (report.php)";

        }else{

            echo "ลบเรียบร้อยแล้ว";

        }

   }else{

      echo "ไม่สามารถลบได้";

   }

}



if($_GET['action_type'] == "editSetting_sub"){

  $id = $_GET['id'];

  $percent =$_GET['update_percent'];

  $strSQL_update = "UPDATE bill_percent SET"; 

  $strSQL_update .=" percent   = '".$percent."'";

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        echo "บันทึกเรียบร้อยแล้ว-".$strSQL_update ;//$strSQL_update;//

    }

}



if($_GET['action_type'] == "deleteSetting"){

  $id = $_GET['id'];

  $id_set = $_GET['id_set'];

  $update_percent = $_GET['update_percent'];



  $strSQL_bill = "SELECT * FROM bill WHERE id_set ='".$id_set."' AND id  = ".$id; 

  $objQuery_bill = mysqli_query($con_ajtongmath_self,$strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

  $objResult_bill = mysqli_fetch_array($objQuery_bill); 

  echo $objResult_bill['id_bill'];

  if(!$objResult_bill){

      $strSQL_delete = "DELETE FROM `bill_percent` WHERE id = ".$id; 

      $objQuery_delete = mysqli_query($con_ajtongmath_self,$strSQL_delete) or die ("Error Query [".$strSQL_delete."]");

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



if($_GET['type'] == "insert_setting"){

    $set_name = $_GET['name_set'];

    $teacher_set = $_GET['teacher_set'];

    $percent =$_GET['percent_set'];



    $strSQL_select = "SELECT MAX(id_set) FROM bill_percent"; 

    $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

     if(!$objQuery_select)

     {

          $max = 0;

     }else{

          $max = mysqli_fetch_array($objQuery_select);

          $id_set = $max[0]+1;

     }

      $strSQL = "INSERT INTO bill_percent "; 

      $strSQL .="(id_set, set_name, teacher_id, percent)";

      $strSQL .="VALUES ";

      $strSQL .="('".$id_set."' ";

      $strSQL .=",'".$set_name."' ";

      $strSQL .=",'".$teacher_set."' ";

      $strSQL .=",'".$percent."') ";

      $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");

      if(!$objQuery)

      {

          echo "fail !!! : $strSQL (report.php)";

      }else{

          echo "1";

      }

}



if($_GET['type'] == "update_get_bill_user"){

  $id = $_GET['id'];

  $id_account_self = $_GET['id_account_self'];

  $status =$_GET['status'];

  $remark = $_GET['remark'];

  $date_start = $_GET['date_start'];



  $strSQL_update = "UPDATE bill SET"; 

  $strSQL_update .=" status = '".$status."'";

  $strSQL_update .=" ,get_bill_date = '".$date_start."'";

  $strSQL_update .=" ,get_bill_remark = '".$remark."'";

  $strSQL_update .=" ,get_bill_id_staff = '".$id_account_self."'";

  $strSQL_update .=" ,update_at= '".date("Y-m-d H:s:i")."'";

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        //echo "บันทึกเรียบร้อยแล้ว";

    }

}



if($_GET['type'] == "update_sent_admin"){

  $id = $_GET['id'];

  $id_account_self = $_GET['id_account_self'];

  $status =$_GET['status'];

  $remark = $_GET['remark'];

  $date_start = $_GET['date_start'];

  $date_end = $_GET['date_end'];



  $strSQL_update = "UPDATE bill SET"; 

  $strSQL_update .=" status = '".$status."'";

  $strSQL_update .=" ,sent_bill_s_date = '".$date_start."'";

  $strSQL_update .=" ,sent_bill_e_date = '".$date_end."'";

  $strSQL_update .=" ,sent_bill_remark = '".$remark."'";

  $strSQL_update .=" ,sent_bill_id_staff = '".$id_account_self."'";

  $strSQL_update .=" ,update_at= '".date("Y-m-d H:s:i")."'";

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        //echo "บันทึกเรียบร้อยแล้ว";

    }

}



if($_GET['type'] == "update_cancel_bill"){

  $id = $_GET['id'];

  $id_account_self = $_GET['id_account_self'];

  $status =$_GET['status'];

  $remark = $_GET['remark'];



  $strSQL_update = "UPDATE bill SET"; 

  $strSQL_update .=" status = '".$status."'";

  $strSQL_update .=" ,cancel_bill_remark = '".$remark."'";

  $strSQL_update .=" ,cancel_bill_staff = '".$id_account_self."'";

  $strSQL_update .=" ,update_at= '".date("Y-m-d H:s:i")."'";

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        //echo "บันทึกเรียบร้อยแล้ว";

    }

}



if($_GET['type'] == "update_payment_admin"){

  $id = $_GET['id'];

  $id_account_self = $_GET['id_account_self'];

  $status =$_GET['status'];

  $payment_remark_admin = $_GET['payment_remark_admin'];

  $date = date('Y-m-d');

  $date_ = date("Y-m-d H:s:i");

  $type_ = 2; // type : bill

  $id_branch = $_GET['bill_branch'];

  $a = new Test();

  $bill = $a->bill_number($type_,$id_branch);

  $number_all = $bill['number_all'];

  $number_branch = $bill['number_branch'];

  $no_all = $bill['no_all'];

  $no_branch = $bill['no_branch'];

  $year = $bill['year'];

  //print_r($bill);

  //echo $bill['number_all']."---".$bill['number_branch'];

  //exit();

  $strSQL_update = "UPDATE bill SET"; 

  $strSQL_update .=" id_bill = '".$no_all."'";

  if($status == 3){

    $strSQL_update .=" ,number_bill = '".$number_all."'";

  }

  $strSQL_update .=" ,status = '".$status."'";

  $strSQL_update .=" ,payment_remark_admin = '".$payment_remark_admin."'";

  $strSQL_update .=" ,payment_date_admin = '".$date."'";

  $strSQL_update .=" ,payment_id_staff_admin = '".$id_account_self."'";

  $strSQL_update .=" ,update_at = '".$date_."'";

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        //echo "บันทึกเรียบร้อยแล้ว";

      if($status == 3){

        $strSQL = "INSERT INTO bill_number "; 

        $strSQL .="(id_bill_all, no_bill_all, id_bill_branch, no_bill_branch, type_bill ,id_branch, year_, create_at)";

        $strSQL .="VALUES ";

        $strSQL .="('".$no_all."' ";

        $strSQL .=",'".$number_all."' ";

        $strSQL .=",'".$no_branch."' ";

        $strSQL .=",'".$number_branch."' ";

        $strSQL .=",'".$type_."' ";

        $strSQL .=",'".$id_branch."' ";

        $strSQL .=",'".$year."' ";

        $strSQL .=",'".$date_."') ";

        $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");

        if(!$objQuery)

        {

            echo "fail !!! : $strSQL (report.php)";

        }else{

            //echo "1";

        }

      }

    }

}



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

            $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update);

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

  $strSQL_update .=" WHERE id  = '".$id ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

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

    $strSQL_delete = "DELETE FROM `bill` WHERE id = ".$id; 

    $objQuery_delete = mysqli_query($con_ajtongmath_self,$strSQL_delete) or die ("Error Query [".$strSQL_delete."]");

      if(!$objQuery_delete)

      {

          echo "fail!!  : $objQuery_delete (report.php)";

      }

  }else{

     echo "fail!! ไม่สามารถลบได้ (report.php)";

  }

}



if($_GET['action_type'] == "editSetting"){

  $datas = $_GET['datas'];

  $data = explode("&",$datas);

  for($i=0 ; $i < count($data); $i++){

    $dataa[$i] = explode("=",$data[$i]);

    if($dataa[$i][0] == 'branch_id'){

      $data_['branch_id_array'][] = $dataa[$i][1];

    }

    $data_[$dataa[$i][0]] = $dataa[$i][1];

  }

  for($i = 0 ; $i < count($data_['branch_id_array']); $i++) {

      if($i == 0){

         $branch_id = $data_['branch_id_array'][$i];

      }else{

         $branch_id .= ",".$data_['branch_id_array'][$i];

      }

   }

  //print_r($branch_id);exit();

  $strSQL_update = "UPDATE type_self SET"; 

  $strSQL_update .=" status_percent  = '".$data_['status_percent']."'";

  $strSQL_update .=" ,status_branch  = '".$data_['status_branch']."'";

  $strSQL_update .=" ,branch_id  = '".$branch_id."'";

  $strSQL_update .=" ,status_surcharge   = '".$data_['status_surcharge']."'";

  $strSQL_update .=" ,surcharge   = '".$data_['surcharge']."'";

  $strSQL_update .=" WHERE type_id  = '".$data_['type_id'] ."'";

  $objQuery_update = mysqli_query($con_ajtongmath_self,$strSQL_update) or die ("Error Query [".$strSQL_update."]");

    if(!$objQuery_update)

    {

        echo "fail!!  : $objQuery_update (report.php)";

    }else{

        echo "บันทึกเรียบร้อยแล้ว";//$strSQL_update;//

    }

}



if($_GET['action_type'] == "insert_bill"){

  $staff_id = $_GET['staff_id'];

  $quantity = $_GET['quantity'];

  $s_date = $_GET['s_date'];

  $e_date = $_GET['e_date'];

  //$type_ = $_GET['type'];

  $type_ = 2; // 2 = bill  

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

  // loop teacher

   for($i = 0 ; $i < count($teacher_array); $i++) {

      if($i == 0){

         $teacher = $teacher_array[$i];

      }else{

         $teacher .= ",".$teacher_array[$i];

      }

   }

   // loop pay

   for($i = 0 ; $i < count($pay_array); $i++) {

      if($i == 0){

         $pay = "'".$pay_array[$i]."'";

      }else{

         $pay .= ",'".$pay_array[$i]."'";

      }

   }

   // loop pay

  for($i = 0 ; $i < count($pay_array); $i++) {

      if($i == 0){

         $pay_insert = $pay_array[$i];

      }else{

         $pay_insert .= ",".$pay_array[$i];

      }

  }



  /*$strSQL_select = "SELECT MAX(id_bill) FROM bill "; 

  $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

  $objResult_select = mysqli_fetch_array($objQuery_select); 

   if(!$objResult_select)

   {

       echo "fail !!! : $strSQL_select (report.php)";

   }else{

        $max = mysqli_fetch_array($objResult_select);

        $id_bill = $max[0];

   }*/



  // find max id bill 

  $y = date('Y') + 543;

  $strSQL_select = "SELECT MAX(id_bill) FROM bill WHERE year ='".substr($y,2,2)."'"; 

  $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

   if(!$objQuery_select)

   {

       //echo "fail !!! : $strSQL_select (report.php)";

        $id_bill = 0;

   }else{

        $max = mysqli_fetch_array($objQuery_select);

        $id_bill = $max[0];

   }



   // setting pay %

  $strSQL_bill_percent = "SELECT * FROM bill_percent"; 

  $objQuery_bill_percent = mysqli_query($con_ajtongmath_self,$strSQL_bill_percent) or die ("Error Query [".$strSQL_bill_percent."]");

   if(!$objQuery_bill_percent){

       echo "fail !!! : $strSQL_select (report.php)";

   }



  //select type_self *

  $j = 0;

  $sql_type_self = "SELECT * FROM type_self WHERE status_percent = 1";//type_id != 2 AND type_id != 3";

  $objQuery_type_self = mysqli_query($con_ajtongmath_self,$sql_type_self) or die ("Error Query [".$sql_type_self."]");

  while($objResult_type_self = mysqli_fetch_array($objQuery_type_self)){

    $data_type_self[$j]['name'] = $objResult_type_self['type_name'];

    $data_type_self[$j]['id'] = $objResult_type_self['type_id'];

    $data_type_self[$j]['status_percent'] = $objResult_type_self['status_percent'];

    $data_type_self[$j]['status_branch'] = $objResult_type_self['status_branch'];

    $data_type_self[$j]['branch_id'] = $objResult_type_self['branch_id'];

    $data_type_self[$j]['status_surcharge'] = $objResult_type_self['status_surcharge'];

    $data_type_self[$j]['surcharge'] = $objResult_type_self['surcharge'];

    $j++;

  }



  $set_type_self = json_encode($data_type_self);

  //print_r($data_type_self);exit();

  //select 



  // Loop type_self

  for ($l=0; $l < count($data_type_self); $l++) {

    //print_r($data_type_self);

    $id_type_self = $data_type_self[$l]['id'];

    

    $name_type_self = $data_type_self[$l]['name'];



    $branch_id_type_self = $data_type_self[$l]['branch_id'];



    $branch_id_a[$l]['branch_id_type_self']= explode(",",$branch_id_type_self);



    for($i = 0 ; $i < count($branch_array); $i++) {



      $id_bill = $id_bill+1;



      $branch = $branch_array[$i];



      $ch_surcharge_1 = '';

      $ch_surcharge_2 = '';

      $ch = '';

      $sum_all_full = 0;



      for($j = 0 ; $j < count($teacher_array); $j++) {



        $teacher_ = $teacher_array[$j];



        $sql_teacher[$j] = 

                      "SELECT 

                        credit.accid,

                        credit.amount,

                        credit.type_pay,

                        credit.date_pay,

                        credit.date_regis,

                        credit.type_self,

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



        $sql_teacher[$j] .=  " AND account.status != 'out'";



        $sql_teacher[$j] .=  " AND credit.type_self = ".$id_type_self;



        if ($price_self == "self_amount"){

          $colunm = "self_amount";

        }if ($price_self == "subject_real_price") {

          $colunm = "subject_real_price";

        }



        //echo $sql_teacher[$j];

        //sum all

        $strSQL_sum = "SELECT SUM($colunm) as sum_amount FROM ( $sql_teacher[$j] ) as sum_amount";

        $objQuery_sum = mysqli_query($con_ajtongmath_self,$strSQL_sum) or die ("Error Query [".$strSQL_sum."]");

        $objResult_sum1 = mysqli_fetch_array($objQuery_sum);



        $result_c = mysqli_query($con_ajtongmath_self,$sql_teacher[$j]) or die ("Error Query [".$strSQL_sum."]");

        $num_rows = mysqli_num_rows($result_c);



        $objResult_sum[$id_type_self][$branch][$teacher_] = $objResult_sum1;

        

        // เงื่อนไขหัก teacher%

        $sql_bill_percent = "SELECT id,  id_set,  teacher_id,  percent , teacher.teachername AS teacher_name

                          FROM bill_percent 

                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid

                          WHERE teacher_id = $teacher_ AND id_set = '".$set_pay."'";

        $objQuery_bill_percent = mysqli_query($con_ajtongmath_self,$sql_bill_percent) or die ("Error Query [".$sql_bill_percent."]");

        $objResult_bill_percent = mysqli_fetch_array($objQuery_bill_percent);

        //sum หัก percent ราย ครู



        $objResult_pay_teacher[$teacher_] = ($objResult_sum1['sum_amount']*$objResult_bill_percent['percent'])/100;

        

        $sum_all_full += $objResult_sum1['sum_amount'];

        //test pay by teacher

        $objResult_pay_print = "sum=".$objResult_sum1['sum_amount']."*".$objResult_bill_percent['percent']."/100= ".$objResult_pay_teacher[$teacher_];



        //status_branch : 1=เฉพาะ,2=ยกเว้น,0=none

        $ch = '';

        if($data_type_self[$l]['status_branch'] == 2){

          for ($i=0; $i < count($branch_id_a[$l]['branch_id_type_self']); $i++) { 

            //echo $branch_id_a[$l]['branch_id_type_self'][$i]." == ".$branch."&&". $teacher_." == 1";

            if($branch_id_a[$l]['branch_id_type_self'][$i] == $branch && ($teacher_ == 1 || $teacher_ == 2 || $teacher_ == 8)){

              $ch = "t";

            }

          }

        }

        if($ch != "t"){

          //echo $objResult_pay_teacher[$teacher_]."+";

          $sum_all_type[$id_type_self] += $objResult_pay_teacher[$teacher_];

          $objResult['sum_all'] += $objResult_pay_teacher[$teacher_];

        }

        



        //status_surcharge : none=0,คิดเงินเพิ่ม=1,ส่วนลด=2

        $num_rows_all[$id_type_self] = $num_rows;

        if($num_rows_all[$id_type_self] > 0){

          if($data_type_self[$l]['status_surcharge'] == 1){

            $ch_surcharge_1 = "t";

          }else if($data_type_self[$l]['status_surcharge'] == 2){

            $ch_surcharge_2 = "t";

          }

          if($ch_surcharge_2 == "t"){

             $sum_all_type[$id_type_self] =  $sum_all_type[$id_type_self] -($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $objResult_pay_teacher[$teacher_] = $objResult_pay_teacher[$teacher_] -($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $surcharge_text = "-";

             $objResult['sum_all'] -= $data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self];

          }if($ch_surcharge_1 == "t"){

             $sum_all_type[$id_type_self] =  $sum_all_type[$id_type_self] +($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $objResult_pay_teacher[$teacher_] = $objResult_pay_teacher[$teacher_] +($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $objResult['sum_all'] += $data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self];

             $surcharge_text = "+";

          }

        }

        // เอาเฉพาะที่มีค่า

        if($objResult_pay_teacher[$teacher_] != 0){

          $objResult[$id_type_self][$branch][$teacher_]['id_type_self'] = $id_type_self;

          $objResult[$id_type_self][$branch][$teacher_]['name_type_self'] = $name_type_self;

          $objResult[$id_type_self][$branch][$teacher_]['status_branch'] = $data_type_self[$l]['status_branch'];

          $objResult[$id_type_self][$branch][$teacher_]['branch'] = $branch;

          $objResult[$id_type_self][$branch][$teacher_]['teacher_id'] = $objResult_bill_percent['teacher_id'];

          $objResult[$id_type_self][$branch][$teacher_]['teacher'] = $objResult_bill_percent['teacher_name'];

          $objResult[$id_type_self][$branch][$teacher_]['teacher_percent'] = $objResult_bill_percent['percent'];

          $objResult[$id_type_self][$branch][$teacher_]['pay_sum'] = $objResult_sum1['sum_amount'];

          $objResult[$id_type_self][$branch][$teacher_]['pay_sum_by%_text'] = $objResult_pay_print;

          $objResult[$id_type_self][$branch][$teacher_]['pay_sum_by%'] = $objResult_pay_teacher[$teacher_];

          $objResult[$id_type_self][$branch]['sum_all_type'] = $sum_all_type[$id_type_self];

          $objResult[$id_type_self][$branch]['sum_all_full'] = $sum_all_full;

        }



        //echo $objResult[$id_type_self][$branch]['sum_all_full'].",";



        // gen รหัส bill รวม ต้องแก้ไขอีกที ต้องคิดจากตาราง bill_number

        $strSQL_branch = "SELECT * FROM branch WHERE branchid =".$branch; 

        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");

        $objResult_branch = mysqli_fetch_array($objQuery_branch); 

        $h = 4;//จำนวนหลัก

        $year = substr($y,2,2);

        $bill_number = $objResult_branch['branch_number']."/".$year.sprintf("%0".$h."d",$id_bill);;

        //echo $bill_number.",";

        $objResult['bill_number'] = $bill_number;

        $id_bill = "0000";

    }

  }

}

 // print_r($objResult);



    $strSQL = "INSERT INTO bill "; 

    $strSQL .="(id_bill,year,number_bill,s_date,e_date,id_set,type_,type_self,subject,branch,term,teacher,pay,price_self_type,price_self,staff_bill,create_at)";

    $strSQL .="VALUES ";

    $strSQL .="('".$id_bill."' ";

    $strSQL .=",'".$year."' ";

    $strSQL .=",'".$bill_number."' ";

    $strSQL .=",'".$s_date."' ";

    $strSQL .=",'".$e_date."' ";

    $strSQL .=",'".$set_pay."' ";

    $strSQL .=",'".$type_."' ";

    $strSQL .=",'".$set_type_self."' ";

    $strSQL .=",'".$subject."' ";

    $strSQL .=",'".$branch."' ";

    $strSQL .=",'".$term."' ";

    $strSQL .=",'".$teacher."' ";

    $strSQL .=",'".$pay_insert."' ";

    $strSQL .=",'".$colunm."' ";

    $strSQL .=",'".$objResult['sum_all']."' ";

    $strSQL .=",'".$staff_id."' ";

    $strSQL .=",'".$create_at."') ";

    $objQuery = mysqli_query($con_ajtongmath_self,$strSQL) or die ("Error Query [".$strSQL."]");

    if(!$objQuery)

    {

        echo "fail !!! : $strSQL (report.php)";

    }else{

        echo "1";

    }



  // }

    //test print pay by teacher

    // print_r($objResult);

    // echo "<br />sum_by_branch".$sum_by_branch;

   

}


class Test{

public function bill_number($type_bill ,$id_branch){

  include('config/config_multidb.php');

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

  $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");

  $objResult_branch = mysqli_fetch_array($objQuery_branch);



  //--- bill all---//

  $y = date('Y') + 543;

  $strSQL_select = "SELECT MAX(id_bill_all) FROM bill_number WHERE year_ ='".substr($y,2,2)."' AND type_bill=".$type_bill; 

  $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

   if(!$objQuery_select)

   {

       //echo "fail !!! : $strSQL_select (report.php)";

        $id_bill_all = 0;

   }else{

        $max = mysqli_fetch_array($objQuery_select);

        $id_bill_all = $max[0]+1;

   }

  $h = 4;//จำนวนหลัก

  $year = substr($y,2,2);

  $number_all = $text_type.$objResult_branch['branch_number']."-".$year.sprintf("%0".$h."d",$id_bill_all);



  //---- bill branch---//

  $strSQL_select = "SELECT MAX(id_bill_branch) FROM bill_number WHERE id_branch ='".$id_branch."' AND type_bill=".$type_bill; 

  $objQuery_select = mysqli_query($con_ajtongmath_self,$strSQL_select) or die ("Error Query [".$strSQL_select."]");

   if(!$objQuery_select)

   {

       //echo "fail !!! : $strSQL_select (report.php)";

        $id_bill_branch = 0;

   }else{

        $max = mysqli_fetch_array($objQuery_select);

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

}

?>