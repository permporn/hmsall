<?php include("../ck_session.php");?>
<script type="text/javascript">
$(function() {
    
    $("#shipping_charge").val(0);
    $('table#datatable').DataTable( {
        "dom" : 'Bfrtip',
        "lengthMenu" : [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        "order": [[ 0, "desc" ]],
        "buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
        "iDisplayLength": 15,
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ){
            $('td:eq(0)', nRow);
        },
        "fnDrawCallback": function() {

            $('.btn_delete_order').click(function(){
    
            var id = $(this).attr('data-id');
           // alert(id);

            if(id != 0){
                var request = $.ajax({
                    url:"request.php",
                    method: "GET",
                    data: { id_delete : id , type : "delete_order"}
                });
                request.done(function( result ) {
                    //console.log(result);
                    //reloadRequest();
                    location.reload(); 
                });
                request.fail(function( jqXHR, textStatus ) {
                    alert( "Request failed: " + textStatus );
                });
            }else{
                alert('Error')
            }
          });
        }
    });

    $('.add_request_book').click(function(){
        $("#container_book").show();
        $.ajax({
        type: "POST",
        url: "form/form_request_book_manage.php",
        success: function(data){
            //console.log(data);
            $(".header").hide();
            $("#container_book").html(data);
            } 
        });
    });

    $('#modal_payment_date').datepicker({
            autoclose: true,
            todayHighlight: true ,
            format: 'yyyy-mm-dd'
        })

    $('#btn_insert_approve').click(function(){
        var datas = $('form#form-approve').serialize();
        console.log(datas);

       //if($("#modal_approve_qty_remain").val() > 0){
            var request = $.ajax({
                url:"request.php",
                method: "GET",
                data: { datas : datas , type : "update_approve"}
            });
            request.done(function( result ) {
                //console.log(result);
                $('#form-approve-request').modal('hide');
                location.reload();
                //reloadRequest();
            });
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        // }else{
        //     alert('จำนวนหนังสือใน store ไม่พอ')
        // }
    });

    $('#btn_insert_approve_cancel').click(function(){
        var datas = $('form#form_approve_request_cancel').serialize();
        console.log(datas);

       if($("#modal_approve_cancel_status").val() == 6){
            var request = $.ajax({
                url:"request.php",
                method: "GET",
                data: { datas : datas , type : "update_approve_cancel"}
            });
            request.done(function( result ) {
                console.log(result);
                $('#form-approve-request').modal('hide');
                location.reload();
                //reloadRequest();
            });
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        }else{
            alert('การบันทึกผิดพลาด')
        }
    });

    // $('#btn_insert_payment').click(function(){
    //     var datas = $('form#form-notification-payment').serialize();
    //    // console.log(datas);

    //    if($("#modal_payment_status").val() == 3){
    //         var request = $.ajax({
    //             url:"request.php",
    //             method: "GET",
    //             data: { datas : datas , type : "update_payment"}
    //         });
    //         request.done(function( result ) {
    //            // console.log(result);
    //            $('#form-payment').modal('hide');
    //            location.reload();
    //             //reloadRequest();
    //         });
    //         request.fail(function( jqXHR, textStatus ) {
    //             alert( "Request failed: " + textStatus );
    //         });
    //     }else{
    //         alert('การแจ้งชำระเงิน ผิดพลาด')
    //     }
    // });

    $('#btn_insert_approve_payment').click(function(){
        var datas = $('form#form_approve_payment').serialize();
        //console.log(datas);
       if($("#modal_approve_payment_status").val() == 4){
            var request = $.ajax({
                url:"request.php",
                method: "GET",
                data: { datas : datas , type : "update_approve_payment"}
            });
            request.done(function( result ) {
               //console.log(result);
               $('#form-payment').modal('hide');
               location.reload();
                //reloadRequest();
            });
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        }else{
            alert('การยืนยันการแจ้งชำระเงิน ผิดพลาด')
        }
    });

    $('#btn_insert_approve_delivery').click(function(){
        var datas = $('form#form_approve_delivery').serialize();
        console.log(datas);
        if($("#modal_approve_delivery_status1").val() == 5){
            var request = $.ajax({
                url:"request.php",
                method: "GET",
                data: { datas : datas , type : "update_approve_delivery"}
            });
            request.done(function( result ) {
               //console.log(result);
               $('#form-payment').modal('hide');
               location.reload();
                //reloadRequest();
            });
            request.fail(function( jqXHR, textStatus ) {
                alert( "Request failed: " + textStatus );
            });
        }else{
            alert('การยืนยัน ผิดพลาด')
        }
    });

    $('.qtyplus').click(function(e){ 

       
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            var sum = currentVal + 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        var totle = $(".modal_approve_qty_totle").val();
        //alert(totle);
        var remain = totle-sum;
        $("#modal_approve_qty_remain_show").html(remain+ " เล่ม");
        $("#modal_approve_qty_remain").val(remain);
        var sum_price = sum*$("#modal_approve_price").val();
        $("#modal_approve_sum_price_show").html(sum_price+" บาท");
        $("#modal_approve_sum_price_hidden").val(sum_price);

    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
            var sum = currentVal - 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        var totle = $(".modal_approve_qty_totle").val();
        //alert(totle);
        var remain = totle-sum;
        $("#modal_approve_qty_remain_show").html(remain+ " เล่ม");
        $("#modal_approve_qty_remain").val(remain);
        var sum_price = sum*$("#modal_approve_price").val();
        $("#modal_approve_sum_price_show").html(sum_price+" บาท");
        $("#modal_approve_sum_price_hidden").val(sum_price);


    });
    $('.qtyplus_shipping_charge').click(function(e){ 
       
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            var sum = currentVal + 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        $("#shipping_charge").val(sum);
        var price = parseInt($("#modal_approve_sum_price_hidden").val());
        var sum_price =  price + 1;
        $("#modal_approve_sum_price_show").html(sum_price+" บาท");
        $("#modal_approve_sum_price_hidden").val(sum_price);

    });
    // This button will decrement the value till 0
    $(".qtyminus_shipping_charge").click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
            var sum = currentVal - 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        $("#shipping_charge").val(sum);
        var price = parseInt($("#modal_approve_sum_price_hidden").val());
        var sum_price = price - 1;
        $("#modal_approve_sum_price_show").html(sum_price+" บาท");
        $("#modal_approve_sum_price_hidden").val(sum_price);

    });

    $('.qty_delivery_plus').click(function(e){ 
       
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            var sum = currentVal + 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        $("#qty_delivery").val(sum);

    });
    // This button will decrement the value till 0
    $(".qty_delivery_minus").click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
            var sum = currentVal - 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        $("#qty_delivery").val(sum);

    });
});

function approveRequest(id){
    //console.log(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "select_approve"}
    });
    request.done(function( data ) {
        console.log(data);
        var result = JSON.parse(data);
       //console.log(result.id);
        $("#modal_approve_request_id").val(result.id_order);
        $("#modal_approve_book_code").val(result.id_order);
        // $("#modal_approve_book_name").val(result.book_name);
        // if(result.subject_type == 1){var subject_type = "สด";}
        // if(result.subject_type == 2){var subject_type = "self";}
        $("#modal_approve_remark2").val(result.remark);
        $("#modal_approve_sum_price").val(result.sum_price);
        $("#modal_approve_qty").val(result.qty); 
        $("#modal_approve_staff").val(result.staff_name + " " + result.branch_name);
        // $("#modal_approve_price").val(result.price);
        // $("#modal_approve_id_book_information").val(result.id_book_information);

        // var remain = result.book_qty-result.qty;
        // $("#modal_approve_qty_remain_show").html(remain+" เล่ม");
        // $("#modal_approve_qty_remain").val(remain);
        // $("#modal_approve_qty_totle_show").html(result.book_qty+" เล่ม");
        // $("#modal_approve_qty_totle").val(result.book_qty);
        // var sum_price = result.qty*result.price;
        // $("#modal_approve_sum_price_show").html(sum_price+" บาท");
        // $("#modal_approve_sum_price_hidden").val(sum_price);        
        $.ajax({
         type: "GET",
         url: "form/form_table_order_book_list.php?id_order="+result.id_order,
         success: function(data){
             $("#order_book").html(data);
          } 
        });
        
        $('#form-approve-request').modal();
    });
}

function approveRequestCancel(id){
    console.log(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "select_approve"}
    });
    request.done(function( data ) {
        //console.log(data);
        var result = JSON.parse(data);
        //console.log(result.id);
        $("#modal_approve_cancel_request_id").val(result.id_order);
        $("#modal_approve_cancel_book_code").val(result.id_order);
        $("#modal_approve_cancel_remark2").val(result.remark);
        $("#modal_approve_cancel_sum_price").val(result.sum_price);
        $("#modal_approve_cancel_qty").val(result.qty);
        $("#modal_approve_cancel_staff").val(result.staff_name + " " + result.branch_name);
        $.ajax({
         type: "GET",
         url: "form/form_table_order_book_list.php?id_order="+result.id_order,
         success: function(data){
             $("#order_book").html(data);
          } 
        });
        $('#form-approve-request-cancel').modal();
    });
}

function notificationPayment(id){
    //console.log(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "select_approve"}
    });
    request.done(function( data ) {
        console.log(data);
        var result = JSON.parse(data);
        $("#modal_payment_id").val(result.id_order);
        $("#modal_payment_book_code").val(result.id_order);
        $("#modal_payment_sum_price_show").html(result.sum_price);
 
        $("#modal_payment_qty").val(result.qty);
        $("#modal_payment_sum_price").val(result.sum_price);
        $("#modal_payment_remark2").html(result.remark);
        $("#modal_payment_staff").html(result.staff_name + " " + result.branch_name);

        $("#modal_payment_sum_price_book").val(result.sum_price-result.shipping_charge);
        $("#modal_payment_shipping_charge").val(result.shipping_charge);

        $.ajax({
         type: "GET",
         url: "form/form_table_order_book_list.php?id_order="+result.id_order,
         success: function(data){
            console.log(data);
             $(".order_book").html(data);
          } 
        });

        $('#form-payment').modal();
    });
}

function approvePayment(id){
    //console.log(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "select_approve"}
    });
    request.done(function( data ) {
        console.log(data);
        var result = JSON.parse(data);
        $("#modal_approve_payment_id").val(result.id_order);
        $("#modal_approve_payment_id_show").html(result.id_order);
        $("#modal_approve_payment_qty").html(result.qty + " เล่ม");
        $("#modal_approve_payment_date").html(result.payment_date);
        if(result.payment_type == 1){var payment_type = "โอน";}
        if(result.payment_type == 2){var payment_type = "บัตรเคดิต";}
        if(result.payment_type == 3){var payment_type = "เงินสด";}
        $("#modal_approve_payment_type").val(payment_type);
        $("#modal_approve_payment_type_show").html(payment_type);
        $("#modal_approve_approve_remark").html(result.payment_remark);
        $("#modal_approve_delivery_address").html(result.payment_delivery_address);
        $("#modal_approve_payment_qty").val(result.qty);
        $("#modal_approve_payment_sum_price").val(result.sum_price);
        $("#modal_approve_payment_sum_price_show").html(result.sum_price+ " บาท");

        $("#modal_approve_payment_image").html("<a href='" + result.payment_image + "' TARGET=_blank><img src=" + result.payment_image + " height='200px'></a> *คลิกขยายที่ภาพ");

        var new_sum = result.sum_price - result.shipping_charge
        $("#modal_approve_payment_sum_price_book").html(new_sum + " บาท");
        $("#modal_approve_payment_shipping_charge").html(result.shipping_charge + " บาท");
        
        
        $('#modal_approve_payment_sdate,#modal_approve_payment_edate').datepicker({
            autoclose: true,
            todayHighlight: true ,
            format: 'yyyy-mm-dd'
        })

        $.ajax({
         type: "GET",
         url: "form/form_table_order_book_list.php?id_order="+result.id_order,
         success: function(data){
            console.log(data);
             $(".order_book").html(data);
          } 
        });
        $('#form-approve-payment').modal();
    });
}

function approveDelivery(id){
    //console.log(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "select_approve"}
    });
    request.done(function( data ) {
        //console.log(data);
        var result = JSON.parse(data);
        $("#modal_approve_delivery_id").val(result.id_order);
        $("#modal_approve_delivery_book_name").html(result.id_order);
        $("#modal_approve_delivery_qty").html(result.qty);
        $("#modal_approve_delivery_date").html(result.payment_date);
        $("#modal_approve_delivery_remark").val(result.payment_remark);
        $("#modal_approve_delivery_sum_price_show").html(result.sum_price+ " บาท");
        
        $('#modal_approve_delivery_date').datepicker({
            autoclose: true,
            todayHighlight: true ,
            format: 'yyyy-mm-dd'
        })

        $.ajax({
         type: "GET",
         url: "form/form_table_order_book_list.php?id_order="+result.id_order,
         success: function(data){
            console.log(data);
             $(".order_book").html(data);
          } 
        });
        $('#form-approve-delivery').modal();
    });
}

function updateStatusRequest(id){
    //alert(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "update_status" ,status : "1"}
    });
    request.done(function( result ) {
        //console.log(result);
        reloadRequest();
    });
}

function deleteRequest(id){
    //alert(id);
    var request = $.ajax({
        url:"request.php",
        method: "GET",
        data: { id : id , type : "delete_request"}
    });
    request.done(function( result ) {
        reloadRequest();
    });
}

function editBook(id){
    //alert(id);
    $("#container_book").show();
    //alert(id);
    var request = $.ajax({
        url: "form/form_request_book_manage.php",
        method: "GET",
        data: { id_order : id , type : "edit"}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#container_book").html(result);
    });
}

function editBook2(id){
    //alert(id);
    $("#container_book").show();
    //alert(id);
    var request = $.ajax({
        url: "form/form_request_book_manage2.php",
        method: "GET",
        data: { id_order : id , type : "edit"}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#container_book").html(result);
    });
}

function printOrder(id){
    //alert(id);
    $("#container_book").show();
    //alert(id);
    var request = $.ajax({
        url: "form/form_print_request_book.php",
        method: "GET",
        data: { id_order : id , type : "edit"}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#container_book").html(result);
    });
}

function printBill(id){
    //alert(id);
    $("#container_book").show();
    //alert(id);
    var request = $.ajax({
        url: "form/form_print_request_book.php",
        method: "GET",
        data: { id_order : id , type : "edit"}
    });
    request.done(function( result ) {
        $(".header").hide();
        $("#container_book").html(result);
    });
}

function reloadRequest(){
    var s_date = $('.s_date').val();
    var e_date = $('.e_date').val();
    var type = $('#type').val();
    if(type == 2){
        var subject = $('#subject_self').val();
        var branch  = $('#branch_self').val();
        var term    = $('#term_self').val();
        var teacher = $('#teacher_self').val();
        var pay     = $('#pay_self').val();
    }else if(type == 1){
        var subject = $('#subject_learn').val();
        var branch  = $('#branch_learn').val();
        var term    = $('#term_learn').val();
        var teacher = $('#teacher_learn').val();
        var pay     = "";
    }
    
    $.ajax({
        type: "POST",
        url: "form/form_request_book_admin.php",
        data: { s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
        success: function(data){
            //console.log(data);
            $("#container_book").hide();
            $("#header").show();
            $("#data-table").html(data);
        } 
    }); 
  }

  // $('.btn_delete_order').click(function(){
    
  //   var id = $(this).attr('data-id');
  //  // alert(id);

  //   if(id != 0){
  //       var request = $.ajax({
  //           url:"request.php",
  //           method: "GET",
  //           data: { id_delete : id , type : "delete_order"}
  //       });
  //       request.done(function( result ) {
  //           //console.log(result);
  //           //reloadRequest();
  //           location.reload(); 
  //       });
  //       request.fail(function( jqXHR, textStatus ) {
  //           alert( "Request failed: " + textStatus );
  //       });
  //   }else{
  //       alert('Error')
  //   }
  // });
</script>
<?php
date_default_timezone_set("Asia/Bangkok");

$s_date = $_POST['s_date'];
$e_date = $_POST['e_date'];
//$type = $_POST['type'];

$subject = $_POST['subject'];
$branch = $_POST['branch'];
$term = $_POST['term'];
$pay = $_POST['pay'];
$teacher = $_POST['teacher'];

$data_all = $_POST['data_all'];

if($data_all == "all"){
    $s_date = date( "Y-m-d", strtotime( "-7 day" ) );
    $e_date = date('Y-m-d');
}

// delete book
$action= $_GET['action'];
if($action == "delete_book"){  
    include('config/config_db_self.php'); 
    $id = $_GET['id'];
    $strSQL = "DELETE FROM `book_information` WHERE id = ".$id; 
    $objQuery = mysql_query($strSQL);
    if(!$objQuery)
        {
            echo "fail!!  : $strSQL (delete_book.php)";
        }else{
            echo "";
        }
    mysql_close($conn);
}
// End delete book

include('../config/config_db_self.php');
$strSQL_book =  
            // "SELECT
            //     book_requests.id AS id,
            //     book_requests.id_book AS id_book,
            //     book_requests.qty AS qty,
            //     book_requests.approve_qty AS qty_approve,
            //     book_requests.price AS price,
            //     book_requests.sum_price AS sum_price,
            //     book_requests.id_staff AS id_staff,
            //     book_requests.remark AS remark,
            //     book_requests.`status` AS `status`,
            //     book_requests.create_date AS create_date,
            //     book_information.id AS id_book_information,
            //     book_information.`code` AS book_code,
            //     book_information.title AS book_name,
            //     book_information.id_subject AS subject_id,
            //     book_information.type AS subject_type,
            //     staff.stname AS staff_name,
            //     branch.`name` AS branch_name,
            //     branch.`branchid` AS branchid
            //     FROM
            //     book_requests
            //     LEFT JOIN book_information ON book_information.id = book_requests.id_book
            //     LEFT JOIN staff ON staff.stid = book_requests.id_staff
            //     LEFT JOIN branch ON branch.branchid = staff.branchid
            //     WHERE ";
            "SELECT
                book_order.id_order,
                book_order.`code`,
                book_order.qty,
                book_order.sum_price,
                book_order.id_staff,
                book_order.`status`,
                book_order.remark,
                book_order.create_date,
                book_order.modify_date,
                branch.`name` AS branch_name,
                staff.stname AS staff_name
                FROM
                book_order
                LEFT JOIN staff ON staff.stid = book_order.id_staff
                LEFT JOIN branch ON branch.branchid = staff.branchid
                ";
//$strSQL_book .= " book_order.create_date BETWEEN '".$s_date."' AND '".$e_date."'";
if($account_status != "admin"){
//$strSQL_book .= " AND staff.branchid = ".$id_branch_self;
$strSQL_book .= " WHERE staff.branchid = ".$id_branch_self;
}
$strSQL_book .= " ORDER BY book_order.create_date DESC";
$objQuery_book = mysql_query($strSQL_book) or die ("Error Query [".$strSQL_book."]");
mysql_close($conn);
//echo $strSQL_book;

?>
<style>
#myform {
    text-align: center;
    padding: 5px;
    border: 1px dotted #ccc;
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}
</style>
<div id="book_table">
<table id="datatable" class="display" cellspacing="0" width="100%">
    <?php if($objQuery_book){?>
    <thead>
        <tr>
            <th class="col-md-1"><center>เลชใบสั่งซื้อ</center></th>
            <th class="col-md-1">วันที่</th>
            <th class="col-md-1"><center>สาขา</center></th>
            <th class="col-md-1"><center>จำนวน</center></th>
            <!--<th class="col-md-1"><center>ราคา/หน่วย</center></th>-->
            <th class="col-md-1"><center>ยอดรวม</center></th>
            <?php if($account_status != "admin" || $id_account_self == "15"  || $id_account_self == "141"){?>
            <th class="col-md-2"><center>Action User</center></th>
            <? }?>
            <?php if($account_status == "admin"){?>
            <th class="col-md-2"><center>Action Admin</center></th>
            <? }?>
        </tr>
    </thead>
    <tbody>
    <?php 
    $i = 1;
    while ( $objResult_book = mysql_fetch_array($objQuery_book)) {
        // query subject self
        //echo "1)".$objResult_book['subject_type']."/2.)".$objResult_book['subject_id'];
        // include('../config/config_db_self.php');
        // if($objResult_book['subject_type'] == 2){
        //     $strSQL_book_name = "SELECT * FROM subject WHERE subid = ".$objResult_book['subject_id'];
        //     $objQuery_book_name = mysql_query($strSQL_book_name) or die ("Error Query [".$strSQL_book_name."]");
        //     $objResult_book_name = mysql_fetch_array($objQuery_book_name);
        //     $subject_name = $objResult_book_name['subname'];
        //     $subject_code = $objResult_book_name['code'];
        // }
        // mysql_close($conn);
        // End query subject self

        // query subject learn
        // include('../config/config_db_school.php');
        // if($objResult_book['subject_type'] == 1){
        //     $strSQL_book_name = "SELECT * FROM subject WHERE subid = ".$objResult_book['subject_id'];
        //     $objQuery_book_name = mysql_query($strSQL_book_name) or die ("Error Query [".$strSQL_book_name."]");
        //     $objResult_book_name = mysql_fetch_array($objQuery_book_name);
        //     $subject_name = $objResult_book_name['subname'];
        //     $subject_code = $objResult_book_name['subcode'];
        // }
        // mysql_close($conn);
        // End query subject learn
        ?>
    <tr>
    <td><center><div onclick="printOrder(<?=$objResult_book['id_order']?>)"><font color="#0099FF" title="รายละเอียด เลชใบสั่งซื้อ<?=$objResult_book['id_order']?>"><?=$objResult_book['id_order'];?></font></div></center></td>
    <td><?=$objResult_book['create_date'];?></td>
    <td><center><?=$objResult_book['staff_name'];?> - <?=$objResult_book['branch_name'];?></center></td>
    <td><center><?=number_format($objResult_book['qty']);?></center></td>
    <td><center><?=number_format($objResult_book['sum_price']);?></center></td>
    <?php if($account_status != "admin" || $id_account_self == "15" || $id_account_self == "141"){?>
    <td><center>
    <?php if($objResult_book['status'] == 0){?>
    <button type="button" onclick="updateStatusRequest(<?=$objResult_book['id_order']?>)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> ส่ง</button>
    <button type="button" onclick="editBook(<?=$objResult_book['id_order']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button>
    <? //if($account_status == "admin"){?>
    <!-- <button type="button" onclick="editBook2(<?=$objResult_book['id_order']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไขferntest</button> -->
    <? //}?>
    <!-- <button type="button" onclick="deleteRequest(<?=$objResult_book['id_order']?>)" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button> -->
    <button type="button" data-id="<?=$objResult_book['id_order']?>" class="btn btn-danger btn-xs btn_delete_order" id="btn_delete_order"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>
    <?php }else if($objResult_book['status'] == 1){?>
    <button type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอการตรวจสอบ</button>
    <? }else if($objResult_book['status'] == 2){?>
    <button type="button" class="btn btn-primary btn-xs" onclick="notificationPayment(<?=$objResult_book['id_order']?>)"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> แจ้งชำระเงิน</button>
    <? }else if($objResult_book['status'] == 3){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอยืนยันการจัดส่ง</button>
    <? }else if($objResult_book['status'] == 4){?>
    <button type="button" class="btn btn-warning btn-xs" onclick="approveDelivery(<?=$objResult_book['id_order']?>)"><span class="glyphicon glyphicon-star" aria-hidden="true"></span> ยืนยีนการรับของ</button>
    <? }else if($objResult_book['status'] == 5){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> เสร็จสิ้น</button>
    <? }else if($objResult_book['status'] == 7){?>
    <button type="button" onclick="updateStatusRequest(<?=$objResult_book['id_order']?>)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> ส่ง</button>
    <button type="button" onclick="editBook(<?=$objResult_book['id_order']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>ไม่อนุมัติ สามารถแก้ไขได้</button>
    <button type="button" data-id="<?=$objResult_book['id_order']?>" class="btn btn-danger btn-xs btn_delete_order" id="btn_delete_order"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>
    <? }else if($objResult_book['status'] == 6){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ยกเลิกอนุมัติ</button>
    <? }?>
    </center></td>
    <?php }if($account_status == "admin"){?>
    <td><center>
    <?php if($objResult_book['status'] == 1){?>
    <button type="button" onclick="approveRequest(<?=$objResult_book['id_order']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> อนุมัติใบสั่งซื้อ</button>
    <button type="button" onclick="approveRequest(<?=$objResult_book['id_order']?>)" class="btn btn-danger btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ไม่อนุมัติ</button>
    </center></td>
    <? }else if($objResult_book['status'] == 2){?>
    <button type="button"" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอการชำระเงิน</button>
    <button type="button"" onclick="approveRequestCancel(<?=$objResult_book['id_order']?>)" class="btn btn-danger btn-xs" > <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ยกเลิกอนุมัติ</button>
     <? }else if($objResult_book['status'] == 3){?>
    <button type="button" onclick="approvePayment(<?=$objResult_book['id_order']?>)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ยืนยันการชำระ</button>
    <? }else if($objResult_book['status'] == 4){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> ดำเนินการจัดส่ง</button>
    <!--<button type="button" onclick="printBill(<?=$objResult_book['id_order']?>)" class="btn btn-warning  btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> ใบเสร็จรับเงิน</button>-->
     <? }else if($objResult_book['status'] == 5){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> เสร็จสิ้น</button>
    <? }else if($objResult_book['status'] == 7){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ไม่อนุมัติ รอการแก้ไข</button>
    <? }else if($objResult_book['status'] == 6){?>
    <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ยกเลิกอนุมัติ</button>
    <? }?>
    </td><? } ?></tr>
    <? $i++; }?>
    </tbody>
    <? }?>
</table>
</div>