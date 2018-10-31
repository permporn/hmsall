<?

session_start();

include("../ck_session.php");

include('../config/config_multidb.php');

?>

<style> 

/*.imageupload {

    margin: 20px 0;

}

#printable { display: block; }



@media print 

{ 

#non-printable { display: none; } 

#printable { display: block; } 

} 

.borderless tr, .borderless td, .borderless th {

    border: none !important;

}*/

</style>

<script type="text/javascript">

function insertPayPromotion(id){

    //if(show_alert('ยืนยันการบันทึก') != false){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    var request = $.ajax({

        url: "report.php",

        method: "GET",

        data: {action_type : "get_type"}

    });

    request.done(function( result ) {

      var datas = JSON.parse(result);

      var d = [];

      var num = 0;

      for(var i = 0 ; i <  datas.length ; i ++ ){

        var price_discount = [];

        var pay_box = "pay_promotion_"+datas[i];

        var pay = $("#" + pay_box).val();

        var pay_full_box = "pay_promotion_full_"+datas[i];

        var pay_full = $("#" + pay_full_box).val();

        var remark_box = "remark_promotion_"+datas[i];

        var remark = $("#" + remark_box).val();

        if(typeof pay !== "undefined"){

          price_discount['name'] = datas[i]; 
          price_discount['price_discount'] = pay; 
          price_discount['remark']= remark; 
          price_discount['price_discount_full']= pay_full;

          //d.push(price_discount);

          var requests = $.ajax({

              url: "report.php",

              method: "GET",

              data: { id : id , action_type : "insertPayPromotion", name : price_discount['name'], pay : price_discount['price_discount'],  pay_full : price_discount['price_discount_full'], remark : price_discount['remark'] , num : num},

              dataType: "html"
          });
          num++;

          requests.done(function( result ) {
            //console.log(result);
          });
                  
        }  
                
      }  

      $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

      $.ajax({

          type: "GET",

          url: "form/form_edit_bill_full.php",

          data: {id_bill : id , type : "1" , test : ""},

          success: function(data){

               $(".header").hide();

               $("#data-table").html(data);
          } 

      });

    });

    request.fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
    }); 

}

$('.close_pay').click(function(){

  $.ajax({

      type: "POST",

      url: "form/form_data_pay.php",

      data: {},

      success: function(data){

          //console.log(data);

          $("#data-table").html(data);

          $(".header").show();

          $('.form-saerch').hide();

          $('.subject_self').hide();

          $('.term_self').hide();

          $('.quantity').hide(); 

          $('.set_pay').show();

          $('.form-gen').show();

          $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 

      } 

  });

});

</script>

<?php

function num2wordsThai($num){  

if($num != ''){ 

    $num=str_replace(",","",$num);

    $num_decimal=explode(".",$num);

    $num=$num_decimal[0];

    $returnNumWord='';   

    $lenNumber=strlen($num);   

    $lenNumber2=$lenNumber-1;   

    $kaGroup=array("","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน","สิบ","ร้อย","พัน","หมื่น","แสน","ล้าน");   

    $kaDigit=array("","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ด","แปด","เก้า");   

    $kaDigitDecimal=array("ศูนย์","หนึ่ง","สอง","สาม","สี่","ห้า","หก","เจ็ต","แปด","เก้า");   

    $ii=0;   

    for($i=$lenNumber2;$i>=0;$i--){   

        $kaNumWord[$i]=substr($num,$ii,1);   

        $ii++;   

    }   

    $ii=0;   

    for($i=$lenNumber2;$i>=0;$i--){   

        if(($kaNumWord[$i]==2 && $i==1) || ($kaNumWord[$i]==2 && $i==7)){   

            $kaDigit[$kaNumWord[$i]]="ยี่";   

        }else{   

            if($kaNumWord[$i]==2){   

                $kaDigit[$kaNumWord[$i]]="สอง";        

            }   

            if(($kaNumWord[$i]==1 && $i<=2 && $i==0) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==6)){   

                if($kaNumWord[$i+1]==0){   

                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";      

                }else{   

                    $kaDigit[$kaNumWord[$i]]="เอ็ด";       

                }   

            }elseif(($kaNumWord[$i]==1 && $i<=2 && $i==1) || ($kaNumWord[$i]==1 && $lenNumber>6 && $i==7)){   

                $kaDigit[$kaNumWord[$i]]="";   

            }else{   

                if($kaNumWord[$i]==1){   

                    $kaDigit[$kaNumWord[$i]]="หนึ่ง";   

                }   

            }   

        }   

        if($kaNumWord[$i]==0){   

            if($i!=6){

                $kaGroup[$i]="";   

            }

        }   

        $kaNumWord[$i]=substr($num,$ii,1);   

        $ii++;   

        $returnNumWord.=$kaDigit[$kaNumWord[$i]].$kaGroup[$i];   

    }      

    if(isset($num_decimal[1])){

        $returnNumWord.="จุด";

        for($i=0;$i<strlen($num_decimal[1]);$i++){

                $returnNumWord.=$kaDigitDecimal[substr($num_decimal[1],$i,1)];  

        }

    }       

    return $returnNumWord;  

    }else{

      return "ศูนย์บาท";

    } 

}   



if($_GET['id_bill']){

    $sum_all =0;

    $header_title = $_GET['type'];

    if($header_title == 1){

      $header_title = "ใบแจ้งชำระเงิน";

    }else if($header_title == 2){

      $header_title = "ใบเสร็จรับเงิน";

    }



    $strSQL_bill ="SELECT 

                    bill.id, 

                    bill.id_bill, 

                    bill.number_bill, 

                    bill.s_date, 

                    bill.e_date, 

                    bill.id_set, 

                    bill.type_ ,

                    bill.type_self AS set_type_self,

                    bill.subject, 

                    bill.branch, 

                    bill.term, 

                    bill.teacher, 

                    bill.pay, 

                    bill.price_discount, 

                    bill.price_self_type, 

                    bill.price_self, 

                    bill.status AS status_bill,

                    bill.delete_at, 

                    bill.create_at,  

                    branch.name AS branch_name,

                    branch.sub_name AS branch_sub_name,

                    branch.customer_name AS customer_name,

                    branch.address AS branch_address,

                    branch.number_card AS branch_number_card,

                    branch.phone  AS branch_phone,

                    staff.full_name AS staff_name_bill,

                    staff.stid AS staff_id_bill,

                    bill_number.no_bill_branch AS no_bill_branch,

                    bill_number.no_bill_all AS no_bill_all

                    FROM bill  

                    JOIN branch ON bill.branch = branch.branchid

                    LEFT JOIN staff ON bill.staff_bill = staff.stid

                    LEFT JOIN bill_number ON bill.number_bill = bill_number.no_bill_all

                    WHERE bill.id = '".$_GET['id_bill']."'";

    $objQuery_bill = mysqli_query($con_ajtongmath_self,$strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

    $objResult_bill = mysqli_fetch_array($objQuery_bill); 



    $id = $objResult_bill['id'];

    $id_bill = $objResult_bill['id_bill'];

    $number_bill = $objResult_bill['number_bill'];

    $s_date = $objResult_bill['s_date'];

    $e_date = $objResult_bill['e_date'];

    $id_set = $objResult_bill['id_set'];

    $type_ = $objResult_bill['type_'];

    $branch = $objResult_bill['branch'];

    $teacher = $objResult_bill['teacher'];

    $pay = $objResult_bill['pay'];

    $price_self_type = $objResult_bill['price_self_type'];

    $price_self = $objResult_bill['price_self'];

    $status = $objResult_bill['status_bill'];

    $create_at = $objResult_bill['create_at'];

    $staff_name_bill = $objResult_bill['staff_name_bill'];

    $branch_sub_name = $objResult_bill['branch_sub_name'];

    $customer_name= $objResult_bill['customer_name'];

    $branch_address= $objResult_bill['branch_address'];

    $branch_number_card= $objResult_bill['branch_number_card'];

    $branch_phone= $objResult_bill['branch_phone'];

    $no_bill_branch = $objResult_bill['no_bill_branch'];

    $no_bill_all = $objResult_bill['no_bill_all'];

    $branch_name = $objResult_bill['branch_name'];

    $set_type_self = $objResult_bill['set_type_self'];

    $price_discount = $objResult_bill['price_discount'];

    $sum_all_type = 0;

    ?>



    <div class="col-sm-12">

    <div id="loading"></div>

    <table class="table borderless" cellspacing="0" width="100%">

    <tr>

      <td class="col-md-1"><img src="images/HMS.png" width="150px"></td>

          <td class="col-md-9"> HMS GROUP CO., LTD. 

            <br> บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด (สำนักงานใหญ่)

            <br> ที่อยู่ 53/173-174 ถ.สุขุมวิท ต.บ้านหลังสวน อ.เมือง จ.ชลบุรี 20000 

            <br> เลขประจำตัวผู้เสียภาษี 010-55591-69039

            <br> โทร. 038-146782

          </td>

          <td class="col-md-2" rowspan="4" >

            <h3><?=$header_title?></h3>



            <table class="table" cellspacing="0" width="100%" border="1">

              <tr>

                <td>วันที่ : <?=date("d-m-Y", strtotime($create_at));?></td>

              </tr>

              <tr>

                <td>ออกโดย : <?=$staff_name_bill?></td>

              </tr>

              <tr>

                <td>เลขใบเสร็จสาขา : <?=$no_bill_branch?></td>

              </tr>

              <tr>

                <td>เลขใบเสร็จศูนย์ใหญ่ : <?=$no_bill_all?></td>

              </tr>

            </table>

          </td>

        </tr>

        <tr>

          <td colspan="2" class="text-left">ชื่อลูกค้า : <?=$customer_name?>  (ที่ทำงาน HMS สาขา <?=$branch_name?>)</td>

        </tr>

        <tr>

          <td colspan="2" class="text-left">ที่อยู่ : <?=$branch_address?></td>

        </tr>

        <tr>

          <td colspan="2" class="text-left">เลขประจำตัวผู้เสียภาษี : <?=$branch_number_card?></td>

        </tr>

        </tr> 

      </table>

    </div>

  <div class="col-sm-12">



    <?

    

    $manage = (array) json_decode($set_type_self);

    //print_r($manage);

    $k = 0;

    for($j=0;$j<count($manage);$j++){

      //echo $j."<br>";

      $data_type_self[$k]['name'] = $manage[$j]->name;

      $data_type_self[$j]['id'] = $manage[$j]->id;

      $data_type_self[$j]['status_percent'] = $manage[$j]->status_percent;

      $data_type_self[$j]['status_branch'] = $manage[$j]->status_branch;

      $data_type_self[$j]['branch_id'] = $manage[$j]->branch_id;

      $data_type_self[$j]['status_surcharge'] = $manage[$j]->status_surcharge;

      $data_type_self[$j]['surcharge'] = $manage[$j]->surcharge;

      $k++;

    }

    $teacher_array = explode(",",$teacher);

    $pay_array = explode(",",$pay);



    for($i = 0 ; $i < count($pay_array); $i++) {

      if($i == 0){

         $pay = "'".$pay_array[$i]."'";

      }else{

         $pay .= ",'".$pay_array[$i]."'";

      }

    }

    for ($l=0; $l < count($data_type_self); $l++) {



      $id_type_self = $data_type_self[$l]['id'];

    

      $name_type_self = $data_type_self[$l]['name'];



      $branch_id_type_self = $data_type_self[$l]['branch_id'];



      $branch_id_a[$l]['branch_id_type_self']= explode(",",$branch_id_type_self);



       $id_bill = $id_bill+1;



       $ch_surcharge_1 = '';

       $ch_surcharge_2 = '';

       $ch = '';

       $sum_all_full = 0;



       $sql_type = 

                  "SELECT 

                    credit.accid,

                    credit.type_pay,

                    credit.date_pay,

                    credit.date_regis,

                    credit.type_self,

                    credit.amount AS self_amount,

                    credit.codetransfer AS codetransfer,

                    account.status AS branch_id,

                    account.username AS username,

                    branch.name AS branch_name,

                    subject_real.name_subject_real AS name_subject_real,

                    subject_real.price AS subject_real_price,

                    subject.subname AS name_subject,

                    staff.username AS staff_name,

                    student.name AS student_name,

                    teacher.teachername AS teacher_name,

                    type_self.type_name AS type_name

                    FROM credit

                    LEFT JOIN account ON account.accid = credit.accid

                    LEFT JOIN branch ON account.status = branch.branchid

                    LEFT JOIN subject ON credit.subid = subject.subid

                    LEFT JOIN subject_real ON subject.id_subject_real = subject_real.id_subject_real

                    LEFT JOIN staff ON credit.staffid = staff.stid

                    LEFT JOIN student ON account.studentid = student.studentid

                    LEFT JOIN teacher ON subject.teacherid = teacher.teacherid

                    LEFT JOIN type_self ON credit.type_self = type_self.type_id

                    WHERE 

                    subject.teacherid IN ($teacher) AND credit.date_pay BETWEEN '".$s_date."' AND '".$e_date."' AND account.status = $branch";

          if($pay){

            $sql_type .= " AND credit.type_pay IN ($pay)";

          }    

          $sql_type .= " AND credit.type_pay != 'test' AND credit.type_pay != 'free' "; 



          $sql_type .=  " AND account.status != 'out' ";



          $sql_type .=  " AND credit.type_self = ".$data_type_self[$l]['id'];

          

          $sql_type .=  " ORDER BY  `teacher`.`teacherid` ASC , credit.date_pay ASC"; 

          

          $objQuery_type = mysqli_query($con_ajtongmath_self,$sql_type) or die ("Error Query [".$sql_type."]");



          $num_rows = mysqli_num_rows($objQuery_type);



          if($num_rows > 0){      
      ?>

       <h4>สรุปรายการ <?=$name_type_self;?></h4>

      <table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">

        <thead>

        <tr>

            <th class="col-md-1"><center>ลำดับ</center></th>

            <th class="col-md-1">วันที่ฃำระ</th>

            <th class="col-md-2">ฃื่อ-นามสกุล</th>

            <th class="col-md-1">Username</th>

            <th class="col-md-1">รหัสคอร์ส</th>

            <th class="col-md-2">ฃื่อคอร์สเรียน</th>

            <th class="col-md-1">อาจารย์</th>

            <th class="col-md-1">ประเภท</th>

            <th class="col-md-1">ราคา</th>

            <th class="col-md-1">ราคาเต็ม</th>

            <th class="col-md-1">จ่ายโดย</th>

            <th class="col-md-1">ออกโดย/แก้ไข</th>

        </tr>

        </thead>

        <tbody>

          <?  

          $k= 1;

          while($objResult_type = mysqli_fetch_array($objQuery_type)){ 

              

              if($objResult_type['name_subject_real'] !=''){

                $subject = $objResult_type['name_subject_real'];

              }else{

                $subject = $objResult_type['name_subject'];

              }

               ?>

          <tr>

            <td><center><?=$k?></center></td>

            <td><?=date("d-m-Y", strtotime($objResult_type['date_pay']));?></td>

            <td><?=$objResult_type['student_name']?></td>

            <td><?=$objResult_type['username']?></td>

            <td><?=$objResult_type['codetransfer']?></td>

            <td><?=$subject?></td>

            <td><?=$objResult_type['teacher_name']?></td>

            <td><?=$objResult_type['type_name']?></td>

            <td><?=number_format($objResult_type['self_amount'])?></td>

            <td><?=number_format($objResult_type['subject_real_price'])?></td>

            <?php  

              $type_pay = $objResult_type['type_pay'];

              if($type_pay == 'money'){

                  $type_pay_text = "cash";

              }else if($type_pay == 'cradit'){

                  $type_pay_text = "cradit";

              }else if($type_pay == 'transfer'){

                  $type_pay_text = "transfer";

              }

              ?>

            <td><?=$type_pay_text?></td>

            <td><?=$objResult_type['staff_name']?></td>

          </tr>

          <? $k++;}?>

      <tr>

          <td colspan="6" ><center>ยอดตั้งแต่วันที่  : <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></center></td>

          <td colspan="3" class="text-right">ยอดเต็ม</td>

          <td colspan="3" class="text-right">ยอดชำระ</td>

        </tr>

      <?

        //
        $sum_all_type =0;

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

        

        //sum all

        $strSQL_sum = "SELECT SUM($price_self_type) as sum_amount FROM ( $sql_teacher[$j] ) as sum_amount";

        $objQuery_sum = mysqli_query($con_ajtongmath_self,$strSQL_sum) or die ("Error Query [".$strSQL_sum."]");

        $objResult_sum1 = mysqli_fetch_array($objQuery_sum);

        

        $result_c = mysqli_query($con_ajtongmath_self,$sql_teacher[$j]) or die ("Error Query [".$strSQL_sum."]");

        $num_rows = mysqli_num_rows($result_c);



        $objResult_sum[$id_type_self][$branch][$teacher_] = $objResult_sum1;

        // เงื่อนไขหัก teacher%

        $sql_bill_percent = "SELECT id,  id_set,  teacher_id,  percent , teacher.teachername AS teacher_name

                          FROM bill_percent 

                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid

                          WHERE teacher_id = $teacher_ AND id_set = '".$id_set."'";

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

            //ยกเว้น ครูโต้ง ครูเซ้ง ครูวิธาน ช่วง 3 เดือนแรก

            if($branch_id_a[$l]['branch_id_type_self'][$i] == $branch && ($teacher_ == 1 || $teacher_ == 2 || $teacher_ == 8)){

              $ch = "t";

            }

          }

        }

        // ถ้า $ch ไม่เท่ากับ t
        if($ch != "t"){

          //$sum_all_type[$id_type_self] += $objResult_pay_teacher[$teacher_];

          //$objResult['sum_all'] += $objResult_pay_teacher[$teacher_];

          $sum_all_type += $objResult_pay_teacher[$teacher_];

          $sum_all += $objResult_pay_teacher[$teacher_];

          //$objResult['sum_all'] = $sum_all;

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

             $sum_all_type =   -($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $objResult_pay_teacher[$teacher_] = $objResult_pay_teacher[$teacher_] -($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $surcharge_text = "-";

             $sum_all -= $data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self];

             //echo  $objResult_pay_teacher[$teacher_].",";

          }if($ch_surcharge_1 == "t"){

             $sum_all_type =  $sum_all_type +($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $objResult_pay_teacher[$teacher_] = $objResult_pay_teacher[$teacher_] +($data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self]);

             $sum_all += $data_type_self[$l]['surcharge']*$num_rows_all[$id_type_self];

             //echo  $objResult_pay_teacher[$teacher_].",";

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

          $objResult[$id_type_self][$branch]['sum_all_type'] = $sum_all_type;

          $objResult[$id_type_self][$branch]['sum_all_full'] = $sum_all_full;

          //$objResult['sum_all'] = $objResult[$id_type_self][$branch]['sum_all_type'];

          ?>

          <tr>

            <td colspan="6"><center>

              สรุปยอด <?=$objResult[$id_type_self][$branch][$teacher_]['teacher']?> 

              หักจ่าย <?=$objResult[$id_type_self][$branch][$teacher_]['teacher_percent']?> % 

              <? if($ch_surcharge_2 == "t" || $ch_surcharge_1 == "t"){ echo " ".$surcharge_text ." ". $data_type_self[$l]['surcharge']."บ./คอร์ส"; }?>

            </center></td>

            <td colspan="3" class="text-right"><?=number_format($objResult[$id_type_self][$branch][$teacher_]['pay_sum'] , 2)?></td>

            <? if($ch == "t"){?> 

            <td colspan="3" class="text-right"><?=number_format(0 , 2)?></td>

            <? }else{?>

            <td colspan="3" class="text-right"><?=number_format($objResult[$id_type_self][$branch][$teacher_]['pay_sum_by%'] , 2)?></td>

            <? }?>

          </tr> 

        <?

        }

        // gen รหัส bill รวม ต้องแก้ไขอีกที ต้องคิดจากตาราง bill_number

        $strSQL_branch = "SELECT * FROM branch WHERE branchid =".$branch; 

        $objQuery_branch = mysqli_query($con_ajtongmath_self,$strSQL_branch) or die ("Error Query [".$strSQL_branch."]");

        $objResult_branch = mysqli_fetch_array($objQuery_branch); 

        $h = 4;//จำนวนหลัก

        $year = substr(date('Y'),2,2);

        $bill_number = $objResult_branch['branch_number']."/".$year.sprintf("%0".$h."d",$id_bill);;

        //echo $bill_number.",";

        $objResult['bill_number'] = $bill_number;

    }?>

      <tr>

        <td colspan="6"><center><strong>ยอดรวม</strong></center></td>

        <td colspan="3" class="text-right"><font color="#fd0000"><?=number_format($objResult[$id_type_self][$branch]['sum_all_full'] , 2)?></font></td>

        <td colspan="3" class="text-right"><font color="#fd0000"><?=number_format($objResult[$id_type_self][$branch]['sum_all_type'] , 2)?></font></td>

      </tr>
      
      <tr>

        <td colspan="6"><center><strong><font color="#fd0000">ส่วนลดพิเศษ</font></strong></center></td>
        <?

        $price_dis = "[".$price_discount."]";

        $manage = json_decode($price_dis);

        foreach ($manage as $key => $object) {

           if($name_type_self == $object->name){
              //echo $object->name . "<br/>";

        ?>
        <td colspan="3" class="text-right">
        <input type="text" id="pay_promotion_full_<?=$name_type_self?>" name="pay_promotion_<?=$name_type_self?>" class="form-control text-right" placeholder="0" value="<?=$object->pay_full?>" />
        <font color="#fd0000">*ส่วนลดยอดเต็ม  กรุณากรอกตัวเลขจำนวนเต็ม</font>
        </td>
        <td colspan="3" class="text-right">
        <input type="text" id="pay_promotion_<?=$name_type_self?>" name="pay_promotion_<?=$name_type_self?>" class="form-control text-right" placeholder="0" value="<?=$object->pay?>" />
        <font color="#fd0000">*ส่วนลดยอดชำระ กรุณากรอกตัวเลขจำนวนเต็ม</font>
        </td>
      </tr>

      <tr>
        <td colspan="6"><center><strong></strong></center></td>

        <td colspan="6" class="text-right">
          <textarea id="remark_promotion_<?=$name_type_self?>" name="remark_promotion_<?=$name_type_self?>" row="7" cols="20" class="form-control" placeholder="หมายเหตุ"><?=$object->remark?></textarea><font color="#fd0000">*กรอกรายละเอียด หรือหมายเหตุสำหรับส่วนลดพิเศษ</font>
        </td>
      </tr>

      <tr>
        <td colspan="6"><center><strong><font color="#fd0000">ยอดสุทธิ</font></strong></center></td>        
        <td colspan="3" class="text-right"><strong><font color="#fd0000">
          <?=number_format($objResult[$id_type_self][$branch]['sum_all_full']-$object->pay_full, 2)?></font></strong></td>
        <td colspan="3" class="text-right"><strong><font color="#fd0000">
          <?=number_format($objResult[$id_type_self][$branch]['sum_all_type']-$object->pay, 2)?></font></strong></td>

      </tr>
      <? 
        }
      }
      ?>
    </tbody>

  </table>

 <? } }
?>

<h4>สรุปรายการทั้งหมด</h4>

<table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">

  <tr>

    <td colspan="9" ><center><strong>ยอดตั้งแต่วันที่  : <?=date("d-m-Y", strtotime($s_date));?> ถึง <?=date("d-m-Y", strtotime($e_date));?></strong></center></td>

    <td colspan="3" class="text-right"><strong>ยอดชำระ</strong></td>

  </tr>
  <tr>

    <td colspan="9"><center><strong>ยอดรวมทั้งหมด</strong></center></td>

    <td colspan="3" class="text-right"><strong><font color="#fd0000"><?=number_format(($sum_all) , 2)?></font></strong></td>

  </tr>
  <tr>
    <td colspan="9"><center><strong><font color="#fd0000">ส่วนลดพิเศษ</font></strong></center></td>

    <td colspan="3" class="text-right">
      <input type="text" id="pay_promotion_all" name="pay_promotion_all" class="form-control text-right" placeholder="0" value="<?=$price_discount?>" />
      <font color="#fd0000">*ยอดที่หัก กรุณากรอกตัวเลขจำนวนเต็ม</font>
      <br><br>
      <textarea id="remark_promotion_all" name="remark_promotion_all" row="7" cols="20" class="form-control" placeholder="หมายเหตุ"><?=$price_discount_remark?></textarea><font color="#fd0000">*กรอกรายละเอียดสำหรับโปรโมชั่น</font>
      <br>
    </td>
  </tr>
  <tr>

    <td colspan="9"><center><strong>ยอดสุทธิ</strong></center></td>
    <td colspan="3" class="text-right"><strong><font color="#fd0000"><?=number_format(($sum_all) , 2)?></font></strong></td>

  </tr>

</table>

<br>
<center><button type="button" onclick="insertPayPromotion(<?=$objResult_bill['id']?>)" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> บันทึก</button></center>
<br>
</div>
<?

}mysqli_close($con_ajtongmath_self);?>

