<form method="get" id="form_approve_request_cancel">
  <div class="modal fade" id="form-approve-request-cancel" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">ยกเลิกอนุมัติการสั่งซื้อ <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <!-- <input type="hidden" class="form-control" name="modal_approve_cancel_request_id" id="modal_approve_cancel_request_id"/> -->
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> รายละเอียดการสั่งซื้อ </h5>
        </div>
        <div class="form-group col-sm-12">
        <label for="code" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_approve_cancel_request_id" id="modal_approve_cancel_request_id" readonly="readonly" />
           </div>
        </div>  
        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">จำนวนหนังสือ(เล่ม)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_approve_cancel_qty" id="modal_approve_cancel_qty" readonly="readonly" />
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="type" class="col-sm-3 control-label">ยอดเงินทั้งหมด(บาท)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_approve_cancel_sum_price" id="modal_approve_cancel_sum_price" readonly="readonly" />
           </div>
        </div>

        <div class="form-group col-md-12 order_book" id="order_book"></div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">หมายเหตุ</label>
            <div class="col-sm-9">  
            <textarea id="modal_approve_cancel_remark2" name="modal_approve_cancel_remark2" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea>
           </div>
        </div>
       
        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">ผู้ทำรายการ</label>
            <div class="col-sm-5">  
            <input type="text" class="form-control" name="modal_approve_cancel_staff" id="modal_approve_cancel_staff" readonly="readonly"/>
           </div>
        </div> 

        <div class="form-group col-sm-12">
          <h5><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> ส่วนเจ้าหน้าที่ : ทำรายการอนุมัติ </h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> </label>
              <div class="col-sm-9">  
              <label><input type="radio" name="modal_approve_cancel_status" id="modal_approve_cancel_status" value="6" checked="checked"> ยกเลิกการอนุมัติ</label>
              </div>
        </div>
        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
                <textarea id="modal_approve_cancel_remark" name="modal_approve_cancel_remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary btn_insert_approve_cancel" id="btn_insert_approve_cancel">บันทึก</button></h4>
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 