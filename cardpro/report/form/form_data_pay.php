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
	"iDisplayLength": 10,
	"order": [[ 0, "desc" ]]
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
function updateStatus(id){
    //alert(id);
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
function payment(id){
    //alert(id);
    $.ajax({
        type: "GET",
        url: "form/form_payment.php",
        data: {id_bill : id},
        success: function(data){
             $(".header").hide();
             $("#data-table").html(data);
        } 
    });
}

function detail_pay(id){
    //alert(id);
    $.ajax({
        type: "GET",
        url: "form/form_detail_pay_new.php",
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
                    id,
					id_bill,
                    number_bill,
					s_date,
					e_date,
					price_self,
					status,
					branch.name AS branch_name 
					FROM bill
					LEFT JOIN branch ON bill.branch = branch.branchid
					ORDER BY bill.id_bill DESC";
	$objQuery_bill = mysql_query($strSQL_bill) or die ("Error Query [".$strSQL_bill."]");

	mysql_close($conn);

?>
<div id="loading"></div>
<table id="datatable" class="display" cellspacing="0" width="100%">
	<thead>
		<tr>
            <th class=""><center>No.</center></th>
	        <th class=""><center>เลขที่ใบเสร็จ</center></th>
	        <th class=""><center>วันที่</center></th>
	        <th class="">สาขา</th>
	        <th class="">จำนวนยอด(บ.)</th>
	        <th class=""><center>Admin สถานะ</center></th>
	        <th class=""><center>สถานะ</center></th>
	    </tr>
    </thead>
    <? $i = 1;
    	while ( $objResult_bill = mysql_fetch_array($objQuery_bill)) {?>
    	<tr>
            <td><center><?=$objResult_bill['id_bill'];?></center></td>
    		<td><center><div onclick="detail_pay(<?=$objResult_bill['id']?>)"><font color="#0099FF" title="รายละเอียด เลชใบเสร็จรับเงิน <?=$objResult_book['id_bill']?>"><?=$objResult_bill['number_bill'];?></font></div></center></td>
    		<td><center><? echo date("d-m-Y", strtotime($objResult_bill['s_date']))." - ".date("d-m-Y", strtotime($objResult_bill['e_date']));?></center></td>
    		<td><?=$objResult_bill['branch_name'];?></td>
    		<td><?=number_format($objResult_bill['price_self']);?></td>
    		<td><center>
    		<!-- admin -->
    		<? if($objResult_bill['status'] == 0){?>
            <!--แก้ไข-->
    			<!-- <button type="button" onclick="editBook(<?=$objResult_bill['id_order']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แก้ไข</button> -->
            <!--ลบ-->
    			<button type="button" onclick="deleteBillPay(<?=$objResult_bill['id_bill']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>
            <!--ส่ง-->
    			<button type="button" onclick="updateStatus(<?=$objResult_bill['id_bill']?>)" class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-send" aria-hidden="true"></span> ส่ง</button>
    		<? }else if($objResult_bill['status'] == 1){?> 
            <!--รอการชำระเงิน-->
    			<button type="button" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอการชำระเงิน</button>
    		<? }else if($objResult_bill['status'] == 2){?> 
            <!--ตรวจสอบการชำระ-->
    			<button type="button" onclick="" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ตรวจสอบการชำระ</button>
    		<? }else if($objResult_bill['status'] == 3){?> 
            <!--ปริ้นใบเสร็จ-->
    			<button type="button" onclick="editBook(<?=$objResult_bill['id_bill']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ปริ้นใบเสร็จ</button>
    		<? }?>
    		</center></td>
    		<!-- user -->
    		<td><center>
    		<? if($objResult_bill['status'] == 1){?> 
            <!--แจ้งชำระเงิน-->
    			<button type="button" onclick="payment(<?=$objResult_bill['id']?>)" class="btn btn-warning btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> แจ้งชำระเงิน</button>
    		<? }else if($objResult_bill['status'] == 2){?> 
            <!--รอใบเสร็จ-->
    			<button type="button" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> รอตรวจสอบการชำระเงิน</button>
    		<? }else if($objResult_bill['status'] == 3){?> 
            <!--ใบเสร็จ-->
    			<button type="button" onclick="editBook(<?=$objResult_bill['id_bill']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> ใบเสร็จ</button>
    		<? }?>
    		</center></td>
    	</tr>
    <? }?>
    <tbody>
    </tbody>
</table>

