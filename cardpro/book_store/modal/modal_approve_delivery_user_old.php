<form method="get" id="form_approve_delivery">
  <div class="modal fade" id="form-approve-delivery" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">ยืนยันการรับหนังสือ <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="hidden" class="form-control" name="modal_approve_delivery_id" id="modal_approve_delivery_id"/>
        <input type="hidden" class="form-control" name="modal_approve_delivery_status1" id="modal_approve_delivery_status1" value="5" />
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> รายละเอียดการสั่งซื้อ </h5>
        </div>

        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-9">  
            <div name="modal_approve_delivery_book_name" id="modal_approve_delivery_book_name"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">จำนวนที่สั่ง(เล่ม)</label>
            <div class="col-sm-5">  
            <div name="modal_approve_delivery_qty" id="modal_approve_delivery_qty"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดเงินทั้งหมด</label>
              <div class="col-sm-9">  
              <div class="modal_approve_delivery_sum_price_show" id="modal_approve_delivery_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-md-12 order_book" id="order_book"></div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
                <textarea id="modal_approve_delivery_remark" name="" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea>
              </div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ยืนยันการรับหนังสือ</h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะ</label>
              <label><input type="radio" name="modal_approve_delivery_status2" id="modal_approve_delivery_status2" value="1" checked="checked"> ครบ</label>
              <label><input type="radio" name="modal_approve_delivery_status2" id="modal_approve_delivery_status2" value="0"> ไม่ครบ</label></label>
              <label><input type="radio" name="modal_approve_delivery_status2" id="modal_approve_delivery_status2" value="2"> อื่นๆ</label></label>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่รับ</label>
            <div class='input-group col-sm-4'>
             <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_approve_delivery_date" value="<?=date('Y-m-d');?>" name="modal_approve_delivery_date" id="modal_approve_delivery_date"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
            </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9 input-group">  
                <textarea id="modal_approve_delivery_remark" name="modal_approve_delivery_remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary btn_insert_approve_delivery" id="btn_insert_approve_delivery">บันทึก</button></h4>
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 