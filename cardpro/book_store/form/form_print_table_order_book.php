<? include('../config/config_db_self.php'); ?>
<?php 
    if($_GET['id_order'] != ''){
    $strSQL_order = "SELECT
    branch.`name` AS branch_name,
    staff.stname AS staff_name,
    book_order.id_order,
    book_order.no_bill_all,
    book_order.no_bill_branch,
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
    book_order.modify_date,
    branch.name AS branch_name,
    branch.sub_name AS branch_sub_name,
    branch.address AS branch_address,
    branch.number_card AS branch_number_card,
    branch.phone  AS branch_phone,
    s.stname AS staff_name_approve
    FROM
    book_order
    INNER JOIN staff ON staff.stid = book_order.id_staff
    INNER JOIN staff s ON s.stid = book_order.approve_id_staff
    INNER JOIN branch ON branch.branchid = staff.branchid
    WHERE id_order = ".$_GET['id_order']." ORDER BY book_order.id_order ASC";
    $objQuery_order = mysql_query($strSQL_order);
    $objResult_order = mysql_fetch_array($objQuery_order);
    }
?>
<br><br>
<table class="table borderless" cellspacing="0" width="100%">
<tr>
  <td class="col-md-1"><img src="images/logo01.png" width="100px"></td>
  <td class="col-md-9"> <!-- HMS GROUP CO., LTD. <br> บริษัท เอช.เอ็ม.เอส. กรุ๊ป จำกัด<br> ที่อยู่ 899/139 ถ.อ่อนนุช แขวงประเวศ กรุงเทพมหานคร 10250 (สำนักงานใหญ่) -->
    โรงเรียนกวดวิชาคณิตศาสตร์ อ.โต้ง <br> High Solution Math School 
    <br> 34 อาคาร C.P TOWER3 ตึกA ถนนพญาไท เขตราชเทวี แขวงทุ่งพญาไท กรุงเทพมหานคร 10400 (สำนักงานใหญ่)
    <br> เลขประจำตัวผู้เสียภาษี 0-9940-00872-91-7
  </td>
  <td class="col-md-2" rowspan="4" >
    <? if($_GET['page'] == 2){?>
    <h3>ใบเสร็จรับเงิน</h3>
    <? }else{?>
    <h3>ใบสั่งซื้อ</h3>
    <? }?>
    <table class="table" cellspacing="0" width="100%" border="1">
      <tr>
        <td>วันที่ : <?=$objResult_order['create_date'];?></td>
      </tr>
      <tr>
        <td>ออกโดย : <?=$objResult_order['staff_name_approve'];?></td>
      </tr>
      <tr>
        <td>เลขที่สั่งซื้อ : <?=$_GET['id_order'];?></td>
      </tr>
      <tr>
        <td>เลขที่ใบเสร็จรับเงิน : 
          <? if($objResult_order['no_bill_all'] != '') {echo $objResult_order['no_bill_all'];}else{ echo "-";}?></td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td colspan="2" class="text-left">ชื่อลูกค้า : <?=$objResult_order['branch_sub_name'];?>  (ที่ทำงาน HMS สาขา <?=$objResult_order['branch_name'];?>)</td>
</tr>
<tr>
  <td colspan="2" class="text-left">ที่อยู่ : <?=$objResult_order['branch_address'];?></td>
</tr>
<tr>
  <td colspan="2" class="text-left">เลขประจำตัวผู้เสียภาษี : <?=$objResult_order['branch_number_card'];?>  </td>
</tr>
</table>

<table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">
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
    </tr>
    <? $i++; } }?>
</tbody>
</table>
<table id="datatable_book" class="table table-bordered" cellspacing="0" width="100%">
  <tr>
    <td colspan="2" class="text-right">ยอดหนังสือ</td>
    <td colspan="2" class="text-right"><?=number_format($objResult_order['qty'])?> เล่ม</td> 
  <tr>
    <td colspan="2" class="text-right">ยอดชำระสุทธิ</td>
    <td colspan="2" class="text-right"><strong>
        <font color="red"><?=number_format($objResult_order['sum_price'] , 2)?> บาท</font></strong></td>
  </tr>
</tbody>
</table>
(โปรดตรวจสอบความถูกต้องของรายการในเอกสารฉบับนี้ภายใน 7 วันมิฉะนั้นจะถือว่าสมบูรณ์)
<br>
<table class="table borderless" cellspacing="0" width="100%">
    <tr>
      <td class="col-md-8" colspan="2"></td>
      <td class="col-md-2">
        <table class="table">
        <tr>
          <td><center>___________________</center></td>
        </tr>
        <tr>
          <td><center>ผู้มีอำนวจลงนาม</center></td>
        </tr>
        <tr>
          <td><center>............../............../..............</center></td>
        </tr>
        </table>
      </td>
      <td class="col-md-2">
        <table class="table">
        <tr>
          <td><center>___________________</center></td>
        </tr>
        <tr>
          <td><center>ผู้รับเงิน</center></td>
        </tr>
        <tr>
          <td><center>............../............../..............</center></td>
        </tr>
        </table>
      </td>
    </tr>
</table>
<? mysql_close($conn);?>