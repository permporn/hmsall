<? include('../config/config_db_self.php'); ?>
<script type="text/javascript">
$(function() {

  //window.scrollTo(0,0);

  $('.close_insert_book').click(function(){
      reloadRequest();
  });

    function datenow(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd;
        } 
        if(mm<10){
            mm='0'+mm;
        } 
        var today = dd+''+mm+''+yyyy+'_'+h+m+s;
        //document.getElementById("DATE").value = today; 
        return  today;
    }


    var now = datenow();

    $('table#datatable_book').DataTable({
        "dom": 'Bfrtip',
        "lengthMenu" : [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        //"buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
        "buttons": [{extend: 'copy', filename: 'order_book_'+now},{extend: 'excel', filename: 'order_book_'+now} ,{extend:'pageLength'}],
        "iDisplayLength": 10,
        "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ){
                $('td:eq(0)', nRow);
        },
        "fnDrawCallback": function() {
          $('.delete_requests').click(function(){

    
            var datas = $('form#order-form').serialize();
            //var id = $('#delete_requests').attr('data-id');
            var id = $(this).attr('data-id');
            console.log(id)
            //var qty = $('#delete_requests').attr('data-info');
            //var sum_price = $('#delete_requests').attr('data-sum_price');
            var qty = $(this).attr('data-info');
            var sum_price = $(this).attr('data-sum_price');
            //alert(qty);

            //console.log("id ="+id);
           // console.log("qty ="+qty);

            if(id != 0){
                var request = $.ajax({
                    url:"request.php",
                    method: "GET",
                    data: { datas : datas , id_delete : id , type : "delete_request" ,qty : qty, sum_price : sum_price}
                });
                request.done(function( result ) {
                    //console.log(result);
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

});
</script>
<form method="get" id="order-form">
<div class="form-group col-sm-12">
      <div class="col-sm-8"></div>  
      <label for="sum_price" class="col-sm-2 control-label" style="text-align:right">เลขใบสั่งซื้อ</label>
        <div class="col-sm-2">  
          <input type='text' id="id_order" name='id_order' class='form-control id_order' style="text-align:right" readonly="readonly" value="<?=$_GET['id_order'];?>" />
         </div>
</div>
<?php 
    if($_GET['id_order'] != ''){
    $strSQL_order = "SELECT * FROM book_order WHERE id_order = ".$_GET['id_order'];
    $objQuery_order = mysql_query($strSQL_order);
    $objResult_order = mysql_fetch_array($objQuery_order);
    }
?>
<div class="form-group col-sm-12">
      <div class="col-sm-8"></div>  
      <label for="sum_price" class="col-sm-2 control-label" style="text-align:right">ยอดรวม</label>
        <div class="col-sm-2">  
          <input type='text' class='form-control' readonly="readonly" style="text-align:right" value="<?=number_format($objResult_order['sum_price']);?>" />
        </div>
</div>
<div class="form-group col-sm-12">
      <div class="col-sm-8"></div>  
      <label for="qty" class="col-sm-2 control-label" style="text-align:right">ยอดหนังสือ(เล่ม)</label>
        <div class="col-sm-2">  
          <input type='text' class='form-control' readonly="readonly" style="text-align:right" value="<?=number_format($objResult_order['qty']);?>" />
        </div>
</div>
<label for="" class="col-sm-2 control-label"></label>
<div class="col-sm-10">
      <table id="datatable_book" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="col-md-1"><center>ลำดับ</center></th>
            <th class="col-md-2">รหัสหนังสือ</th>
            <th class="col-md-2">ชื่อหนังสือ</th>
            <th class="col-md-1">ผู้สอน</th>
            <th class="col-md-2"><center>จำนวน</center></th>
            <th class="col-md-2"><center>ราคา/เล่ม</center></th>
            <th class="col-md-2"><center>รวมเป็น</center></th>
            <th class="col-md-2"><center>Action</center></th>
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
                                    book_information.code,
                                    book_requests.id_order,
                                    book_requests.id_book,
                                    book_requests.qty,
                                    book_requests.price,
                                    book_requests.sum_price,
                                    book_information.title,
                                    teacher.teachername
                                    FROM
                                    book_requests
                                    LEFT JOIN book_information ON book_information.id = book_requests.id_book
                                    LEFT JOIN subject ON book_information.id_subject = subject.subid
                                    LEFT JOIN teacher ON subject.teacherid = teacher.teacherid
                                    WHERE id_order = ".$_GET['id_order']." ORDER BY book_requests.id DESC "
                                    ;
            $objQuery_order_list = mysql_query($strSQL_order_list);

            $i =1;
            while($objResult_order_list = mysql_fetch_array($objQuery_order_list)){?>
            <tr>
            <td class="col-md-1" align="center"><?=$i?></td>
            <td class="col-md-2"><?=$objResult_order_list['code']?></td>
            <td class="col-md-2"><?=$objResult_order_list['title']?></td>
            <td class="col-md-1"><?=$objResult_order_list['teachername']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['qty']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['price']?></td>
            <td class="col-md-2" align="center"><?=$objResult_order_list['sum_price']?></td>
            <td class="col-md-2" align="center">
            <button type="button" class="btn btn-warning btn-sm delete_requests" id="delete_requests" data-id="<?=$objResult_order_list['id']?>" data-info="<?=$objResult_order_list['qty']?>" data-sum_price="<?=$objResult_order_list['sum_price']?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>
            </td>
            </tr>
            <? $i++; } }?>
        </tbody>
    </table>
</div>
<div class="form-group col-sm-12">
    <label for="remark" class="col-sm-2 control-label">หมายเหตุ</label>
      <div class="col-sm-5">  
        <textarea id="remark" name="remark" rows="6" cols="25" class="form-control" placeholder="หมายเหตุ"><?=$objResult_order['remark']?></textarea>
      </div>
</div>
<div class="col-md-12">
<label for="remark" class="col-sm-2 control-label"></label>
<div class="col-sm-10">  
<button type="button" class="btn btn-primary btn_update_order" id="btn_update_order">บันทึก</button></h4>
<button type="button" class="btn btn-danger btn_delete_order" id="btn_delete_order" data-id="<?=$_GET['id_order']?>">ลบใบเสนอราคา</button></h4>
<button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button>
</div>
</div>
</form>
<? mysql_close($conn);?>