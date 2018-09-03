<? include('../config/config_db_self.php'); ?>
<script type="text/javascript">
$(function() {

  $('table#datatable_book').DataTable({
        //dom: 'Bfrtip',
        // buttons: ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/]
  });
});
</script>
<form method="get" id="order-form">
<?php 
    if($_GET['id_order'] != ''){
    $strSQL_order = "SELECT * FROM book_order WHERE id_order = ".$_GET['id_order'];
    $objQuery_order = mysql_query($strSQL_order);
    $objResult_order = mysql_fetch_array($objQuery_order);
    }
?>
<div class="col-sm-12">
      <table id="datatable_book" class="display" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th class="col-md-1"><center>ลำดับ</center></th>
            <th class="col-md-3">ชื่อหนังสือ</th>
            <th class="col-md-2"><center>จำนวน</center></th>
            <th class="col-md-2"><center>ราคา/เล่ม</center></th>
            <th class="col-md-2"><center>รวมเป็น</center></th>
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
        
            </tr>
            <? $i++; } }?>
        </tbody>
    </table>
</div>
</form>
<? mysql_close($conn);?>