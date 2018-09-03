<?
session_start();
include("../ck_session.php");
include('../config/config_db_self.php');
?>
<script type="text/javascript">
$(function() {
$('table#datatable').DataTable( {
    "dom": 'Bfrtip',
    "lengthMenu" : [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ],
    "buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
    "iDisplayLength": 50,
    "order": [[ 0, "desc" ]],
    stateSave: true
});
});
function deleteBillPay(id){
    //alert(id);
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    //var update_percent = $('#percent'+id).val(); 
    //alert(id_set);
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "deleteBillPay"}
    });
    request.done(function( result ) {
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });
}

function show_alert(text) {
  if(confirm(text))
    document.forms[0].submit();
  else
    return false;
}

function updateStatus(id){
    //alert(id);
    if(show_alert('ยืนยันการส่ง') != false){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $status = "1";
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "updateStatus", status : $status}
    });
    request.done(function( result ) {
        //console.log(result);
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });
    }
}

function updateStatusCancal(id){
    //alert(id);
    if(show_alert('ยืนยันการยกเลิกส่ง') != false){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $status = "0";
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "updateStatus", status : $status}
    });
    request.done(function( result ) {
        //console.log(result);
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });
    }
}

function updateStatusCancal_pay(id){
    //alert(id);
    if(show_alert('ยืนยันการยกเลิกการตรวจสอบ') != false){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $status = "2";
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "updateStatus", status : $status}
    });
    request.done(function( result ) {
        //console.log(result);
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $(".header").show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });
    }
}

function payment(id){
    //alert(id);
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_payment_user.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function detail_pay(id,type){
    //alert(type);
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_print_bill.php",
        data: {id_bill : id , type_ : type},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function detail_pay_test(id,type){
    //alert(type);
   // $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_print_bill.php",
        data: {id_bill : id , type_ : type , test : "test"},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function updateStatusPay(id){
    //alert(id);
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_payment_admin.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function detail_sent(id){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_detail_sent_admin.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function alert_sent(id){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_detail_sent_user.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function get_sent(id){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_get_bill_user.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function finish(id){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    $.ajax({
        type: "GET",
        url: "form/form_finish.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}
</script>
<?php
    $strSQL_bill ="SELECT 
                    bill.id,
                    bill.id_bill,
                    bill.number_bill,
                    bill.s_date,
                    bill.e_date,
                    bill.price_self,
                    bill.status,
                    branch.name AS branch_name,
                    branch.branchid AS branchid,
                    bill_number.no_bill_all AS no_bill_all,
                    bill_number.no_bill_branch AS no_bill_branch 
                    FROM bill
                    LEFT JOIN branch ON bill.branch = branch.branchid
                    LEFT JOIN bill_number ON bill.id_bill = bill_number.id_bill_all
                    WHERE (bill_number.type_bill = 2 OR bill_number.type_bill IS NULL)";
    if($session_status == 'user_franchise' || $session_status == 'manager_franchise'){
        $strSQL_bill .=" AND branch.branchid = ".$id_branch_self;
    }
    $strSQL_bill .=" ORDER BY bill.id_bill DESC";
    //echo $strSQL_bill;
    $objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

    mysql_close($conn);

?>
<div class="panel panel-default">
<div class="panel-heading"><h4><span class="glyphicon glyphicon-list" aria-hidden="true"></span> รายการทั้งหมด </h4></div>
<div class="panel-body">
<div id="loading"></div>
<table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th class=""><center>No.</center></th>
            <th class=""><center>เลขที่ใบเสร็จ</center></th>
            <th class=""><center>เลขที่ใบเสร็จ(สาขา)</center></th>
            <th class=""><center>วันที่</center></th>
            <th class="">สาขา</th>
            <th class="">จำนวนยอด(บ.)</th>
            <th class=""><center>สถานะ</center></th>
            <? if($session_status == 'admin'){?>
            <th class=""><center>Admin สถานะ</center></th>
            <? }if($session_status == 'admin'){?>
            
            <? }?>
        </tr>
    </thead>
    <? $i = 1;
        while ( $objResult_bill = mysql_fetch_array($objQuery_bill)) {?>
        <tr>
            <? if($objResult_bill['status'] >= 3){ ?>
            <td><center><div onclick="detail_pay(<?=$objResult_bill['id']?>,2)"><font color="#0099FF" title="รายละเอียดแจ้งชำระเงิน <?=$objResult_book['id']?>"><?=$objResult_bill['id'];?></font></div></center>
                <? if($session_status == 'admin'){?>
                <!-- <div onclick="detail_pay_test(<?=$objResult_bill['id']?>,2)"><font color="#0099FF" title="รายละเอียดแจ้งชำระเงิน <?=$objResult_book['id']?>">ทดสอบ<?=$objResult_bill['id'];?></font></div> -->
                <? }?>
            </td>
            <td><center><?=$objResult_bill['no_bill_all'];?></center></td>
            <td><center><?=$objResult_bill['no_bill_branch'];?></center></td>
            <? }else{?>
            <td><center><div onclick="detail_pay(<?=$objResult_bill['id']?>,1)"><font color="#0099FF" title="รายละเอียดใบเสร็จรับเงิน <?=$objResult_book['number_bill']?>"><?=$objResult_bill['id'];?></font></div></center>
                <? if($session_status == 'admin'){?>
               <!--  <div onclick="detail_pay_test(<?=$objResult_bill['id']?>,2)"><font color="#0099FF" title="รายละเอียดแจ้งชำระเงิน <?=$objResult_book['id']?>">ทดสอบ<?=$objResult_bill['id'];?></font></div> -->
                <? }?>
            </td>
            <td><center> - </center></td>
            <td><center> - </center></td>
            <? }?>
            <td><center><? echo date("d-m-Y", strtotime($objResult_bill['s_date']))." - ".date("d-m-Y", strtotime($objResult_bill['e_date']));?></center></td>
            <td><?=$objResult_bill['branch_name'];?></td>
            <td><?=number_format($objResult_bill['price_self']);?></td>
            
            <!-- user -->
            <? if($session_status == 'admin' || $session_status == 'manager_franchise' || $session_status == 'user_franchise' || $session_status == 'admin_hms'){ ?>
            <td><center>
                <? if($objResult_bill['status'] == 1){?> 
                <!--แจ้งชำระเงิน-->
                    <button type="button" onclick="payment(<?=$objResult_bill['id']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แจ้งชำระเงิน</button>
                <? }else if($objResult_bill['status'] == 2){?> 
                <!--รอใบเสร็จ-->
                    <button type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอตรวจสอบการชำระเงิน</button>
                <? }else if($objResult_bill['status'] == 3){?> 
                <!--ใบเสร็จ-->
                    <button type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอการแจ้งจัดส่งใบเสร็จ</button>
                <? }else if($objResult_bill['status'] == 4){?> 
                <!--รอการจัดส่ง-->
                    <button type="button" onclick="alert_sent(<?=$objResult_bill['id']?>)" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอจัดส่งใบเสร็จ</button>
                    <button type="button" onclick="get_sent(<?=$objResult_bill['id']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span> แจ้งได้รับใบเสร็จ</button>
                <? }else if($objResult_bill['status'] == 5){?> 
                <!--เสร็จสิ้น-->
                    <button type="button" onclick="finish(<?=$objResult_bill['id']?>)" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> เสร็จสิ้น</button>
                <? }?>
            </center></td>
            <? }?>
            <!-- admin -->
            <? if($session_status == 'admin'){?>
            <td><center>
            <? 
            if($objResult_bill['status'] == 0){?>
            <!--แก้ไข-->
                <!-- <button type="button" onclick="editBook(<?=$objResult_bill['id_order']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> -->
            <!--ลบ-->
                <button type="button" onclick="deleteBillPay(<?=$objResult_bill['id']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>
            <!--ส่ง-->
                <button type="button" onclick="updateStatus(<?=$objResult_bill['id']?>)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> ส่ง</button>
            <? }else if($objResult_bill['status'] == 1){?> 
            <!--รอการชำระเงิน-->
                <button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอการชำระเงิน</button>
                <button type="button" onclick="updateStatusCancal(<?=$objResult_bill['id']?>)" class="btn btn btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ยกเลิกการส่ง</button>
            <? }else if($objResult_bill['status'] == 2){?> 
            <!--ตรวจสอบการชำระ -->
                <button type="button" onclick="updateStatusPay(<?=$objResult_bill['id']?>)" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ตรวจสอบการชำระ</button>
            <? }else if($objResult_bill['status'] == 3){?> 
            <!--ปริ้นใบเสร็จ | แจ้งการจัดส่ง-->
                <button type="button" onclick="detail_pay(<?=$objResult_bill['id']?>,2)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ปริ้นใบเสร็จ</button>
                <button type="button" onclick="detail_sent(<?=$objResult_bill['id']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> แจ้งการจัดส่ง</button>
                <button type="button" onclick="updateStatusCancal_pay(<?=$objResult_bill['id']?>)" class="btn btn btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ยกเลิกตรวจสอบชำระ</button>
            <? }else if($objResult_bill['status'] == 4){?> 
            <!--ดำเนินการจัดส่งใบเสร็จ-->
                <button type="button" onclick="alert_sent(<?=$objResult_bill['id']?>)" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> ดำเนินการจัดส่งใบเสร็จ</button>
            <? }else if($objResult_bill['status'] == 5){?> 
            <!--เสร็จสิ้น-->
                <button type="button" onclick="finish(<?=$objResult_bill['id']?>)" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> เสร็จสิ้น</button>
            <? }?>
            </center></td>
            <? }?>
        </tr>
    <? $i++; }?>
    <tbody>
    </tbody>
</table>
</div>
</div>

