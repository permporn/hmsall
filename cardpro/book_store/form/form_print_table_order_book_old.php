<? include('../config/config_db_self.php'); ?>
<style>
#printable { display: block; }

@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 

</style> 
<script type="text/javascript">
$(function() {

  window.scrollTo(0,0);

  $('.close_insert_book').click(function(){
      reloadRequest();
  });
  $('table#datatable_book').DataTable({
        dom: 'Bfrtip',
        "lengthMenu" : [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/,'pageLength'],
        "pageLength": 1000,
  });
  $('.delete_requests').click(function(){
    
    var datas = $('form#order-form').serialize();
    var id = $(this).attr('data-id');
    var qty = $(this).attr('data-info');
    var sum_price = $(this).attr('data-sum_price');
    //alert(qty);

    if(id != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { datas : datas , id_delete : id , type : "delete_request" ,qty : qty, sum_price : sum_price}
        });
        request.done(function( result ) {
            console.log(result);
            $.ajax({
               type: "GET",
               url: "form/form_table_order_book.php?id_order="+result,
               success: function(data){
                   $("#order_book").html(data);
                } 
            });
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }else{
        alert('Error')
    }
  });

  $('.btn_update_order').click(function(){

    var datas_order = $('form#order-form').serialize();

    //alert(datas_order);

    //if($('.id_book').val() != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { type : "update_order" , datas_order : datas_order}
        });
        request.done(function( result ) {
            //console.log(result);
            //reloadRequest();
            location.reload();   
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    // }else{
    //     alert('การกรอกข้อมูลไม่ครบ กรุณาแก้ไข')
    // }
  });

  $('.btn_delete_order').click(function(){
    
    var id = $('#btn_delete_order').attr('data-id');
   // alert(id);

    if(id != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { id_delete : id , type : "delete_order"}
        });
        request.done(function( result ) {
            location.reload(); 
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }else{
        alert('Error')
    }
  });

});
</script>
<form method="get" id="order-form printable" >
<center><img src="images/HMS_LOGO.png" width="150px">
<br>
<h5>HMS GROUP CO., LTD. บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด</h5></center>
<br>
<h4 align="center"> ใบสั่งซื้อหนังสือ</h4>
<?php 
    if($_GET['id_order'] != ''){
    $strSQL_order = "SELECT
    branch.`name` AS branch_name,
    staff.stname AS staff_name,
    book_order.id_order,
    book_order.`code`,
    book_order.qty,
    book_order.sum_price,
    book_order.id_staff,
    book_order.`status`,
    book_order.remark,
    book_order.approve_remark,
    book_order.approve_date,
    book_order.approve_id_staff,
    book_order.shipping_charge,
    book_order.payment_date,
    book_order.payment_type,
    book_order.payment_image,
    book_order.payment_remark,
    book_order.payment_id_staff,
    book_order.approve_delivery_sdate,
    book_order.approve_delivery_edate,
    book_order.approve_delivery_remark,
    book_order.approve_delivery_id_staff,
    book_order.delivery_date,
    book_order.delivery_status,
    book_order.delivery_remark,
    book_order.delivery_id_staff,
    book_order.approve_cancel_date,
    book_order.approve_cancel_remark,
    book_order.approve_cancel_id_staff,
    book_order.create_date,
    book_order.modify_date
    FROM
    book_order
    INNER JOIN staff ON staff.stid = book_order.id_staff
    INNER JOIN branch ON branch.branchid = staff.branchid
    WHERE id_order = ".$_GET['id_order']." ORDER BY book_order.id_order ASC";
    $objQuery_order = mysql_query($strSQL_order);
    $objResult_order = mysql_fetch_array($objQuery_order);
    }
?>
<div class="col-sm-12">  
      <h5 align="right">วันที่สั่ง : <?=$objResult_order['create_date'];?></h5>
</div>
<div class="col-sm-12">  
      <h5 align="right">เลขใบสั่งซื้อ : <?=$_GET['id_order'];?></h5>
</div>
<div class="col-sm-12">  
      <h5 align="right">สาขา : <?=$objResult_order['branch_name'];?></h5>
</div>
<div class="col-sm-12">  
      <h5 align="right">ผู้สั่งซื้อ : <?=$objResult_order['staff_name'];?></h5>
</div>

<div class="col-sm-12">
      <table id="datatable_book" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="col-md-1"><center>ลำดับ</center></th>
            <th class="col-md-3">ชื่อหนังสือ</th>
            <th class="col-md-2"><center>จำนวน</center></th>
            <th class="col-md-2"><center>ราคา/เล่ม</center></th>
            <th class="col-md-2"><center>รวมเป็น</center></th>
            <!-- <th class="col-md-2"><center>Action</center></th> -->
            <?php if($account_status == "admin"){?>
            <!-- <th class="col-md-2"><center>Action Admin</center></th> -->
            <? }?>
        </tr>
        </thead>
        <tbody>
            <?php 
            if($_GET['id_order'] != ''){
            $strSQL_order_list = "SELECT
                                    book_requests.id,
                                    book_requests.id_order,
                                    book_requests.id_book,
                                    book_requests.qty,
                                    book_requests.price,
                                    book_requests.sum_price,
                                    book_information.title
                                    FROM
                                    book_requests
                                    LEFT JOIN book_information ON book_information.id = book_requests.id_book 
                                    WHERE id_order = ".$_GET['id_order'];
            $objQuery_order_list = mysql_query($strSQL_order_list);

            $i =1;
            while($objResult_order_list = mysql_fetch_array($objQuery_order_list)){?>
            <tr>
            <td class="col-md-1" align="center"><?=$i?></td>
            <td class="col-md-3"><?=$objResult_order_list['title']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['qty']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['price']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['sum_price']?></td>
            <!-- <td class="col-md-2" align="center">
            <button type="button" class="btn btn-warning btn-sm delete_requests" id="delete_requests" data-id="<?=$objResult_order_list['id']?>" data-info="<?=$objResult_order_list['qty']?>" data-sum_price="<?=$objResult_order_list['sum_price']?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>ลบ</button>
            </td> -->
            </tr>
            <? $i++; } }?>
        </tbody>
    </table>
</div>
<div class="form-group col-sm-12">
    <label for="remark" class="col-sm-2 control-label">หมายเหตุ : </label>
      <div class="col-sm-10">  
        <?=$objResult_order['remark']?>
      </div>
</div>
<div class="form-group col-sm-12">
    <label for="remark" class="col-sm-2 control-label">เจ้าหน้าที่ผู้ทำรายการ : </label>
      <div class="col-sm-10">  
        <?=$objResult_order['remark']?>
      </div>
</div>
<div class="col-sm-12">
      <h5 align="right">จำนวนหนังสือ : <?=number_format($objResult_order['qty']);?> เล่ม
</div>
<div class="col-sm-12">
      <h5 align="right">ค่าหนังสือ : <font color="red"> <?=number_format($objResult_order['sum_price'] - $objResult_order['shipping_charge']);?></font> บาท  ค่าจัดส่ง : <font color="red"><?=number_format($objResult_order['shipping_charge']);?></font> บาท</h5>
</div>
<div class="col-sm-12">
      <h5 align="right">ยอดรวมทั้งหมด : <font color="red"><strong><?=number_format($objResult_order['sum_price']);?></strong></font> บาท</h5>
</div>
<div class="col-md-12" id="non-printable">
<center>
<!-- <label for="remark" class="col-sm-2 control-label"></label> -->
<!-- <div class="col-sm-10">  --> 
<!-- <button type="button" class="btn btn-primary btn_update_order" id="btn_update_order">บันทึก</button></h4>
<button type="button" class="btn btn-danger btn_delete_order" id="btn_delete_order" data-id="<?=$_GET['id_order']?>">ลบใบเสนอราคา</button></h4> -->
<button type="button" class="btn btn-primary btn_update_order" onclick="javascript:window.print();">Print..</button></h4>
<button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button></center>
<!-- </div> -->
</div>
</form>
<? mysql_close($conn);?>