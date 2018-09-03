<form method="get" id="form_approve_payment">
  <div class="modal fade" id="form-approve-payment" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">ยืนยันการแจ้งชำระเงิน <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="hidden" class="form-control" name="modal_approve_payment_id" id="modal_approve_payment_id"/>
        <input type="hidden" class="form-control" name="modal_approve_payment_id_branch" id="modal_approve_payment_id_branch" />
        <input type="hidden" class="form-control" name="modal_approve_payment_status" id="modal_approve_payment_status" value="4" />
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> รายละเอียดการแจ้งการชำระเงิน </h5>
        </div>

        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-9">  
            <div name="modal_approve_payment_id_show" id="modal_approve_payment_id_show"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">จำนวนหนังสือ(เล่ม)</label>
            <div class="col-sm-5">  
            <div name="modal_approve_payment_qty" id="modal_approve_payment_qty"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดเงินทั้งหมด</label>
              <div class="col-sm-9">  
              <div class="modal_approve_payment_sum_price_show" id="modal_approve_payment_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='col-sm-9'>
            <div class="modal_approve_payment_date" id="modal_approve_payment_date"></div> 
            </div>
        </div>
      
        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9"> 
              <input type="hidden" id="modal_approve_payment_type"></label>
              <div class="modal_approve_payment_type_show" id="modal_approve_payment_type_show"></div>
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">  
              <label><input type="checkbox" name="" id=""  checked="checked" disabled="disabled"> ชำระครบ</label>
              </div>
        </div>

        <div class="form-group col-md-12 order_book" id="order_book"></div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
                <textarea id="modal_approve_payment_remark" name="" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea>
              </div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ส่วนเจ้าหน้าที่ : ยืนยันการชำระเงิน และจัดส่งหนังสือ </h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะการชำระ</label>
              <div class="col-sm-9">ชำระครบ</div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">ภาพ</label>
              <div class="col-sm-9" id="modal_approve_payment_image" name="modal_approve_payment_image"></div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-4 control-label ">จัดส่งหนังสือ ภายในวันที่</label>
            <div class='input-group col-sm-8'>
            <div class='input-group col-sm-6'>
             <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_approve_payment_sdate" value="<?=date('Y-m-d');?>" name="modal_approve_payment_sdate" id="modal_approve_payment_sdate"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
            </div>
            ถึง
            <div class='input-group col-sm-6'>
            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_approve_payment_edate" value="<?=date('Y-m-d');?>" name="modal_approve_payment_edate" id="modal_approve_payment_edate"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
            </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุการจัดส่ง</label>
              <div class="col-sm-9">  
                <textarea id="modal_approve_payment_remark" name="modal_approve_payment_remark" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary btn_insert_approve_payment" id="btn_insert_approve_payment">บันทึก</button></h4>
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 