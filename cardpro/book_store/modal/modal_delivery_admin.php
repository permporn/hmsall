<form method="get" id="form_delivery_admin">
  <div class="modal fade" id="form-delivery-admin" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">ตรวจสอบการแจ้งชำระเงิน <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="text" class="form-control" name="modal_approve_delivery_admin_id" id="modal_approve_delivery_admin_id"/>
        <input type="hidden" class="form-control" name="modal_approve_delivery_admin_id_branch" id="modal_approve_delivery_admin_id_branch" />
        <input type="hidden" class="form-control" name="modal_approve_delivery_admin_status" id="modal_approve_delivery_admin_status" value="5" />
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> รายละเอียดการแจ้งการชำระเงิน </h5>
        </div>

        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-9">  
            <div name="modal_approve_delivery_admin_id_show" id="modal_approve_delivery_admin_id_show"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">จำนวนหนังสือ(เล่ม)</label>
            <div class="col-sm-5">  
            <div name="modal_approve_delivery_admin_qty" id="modal_approve_delivery_admin_qty"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดเงินทั้งหมด</label>
              <div class="col-sm-9">  
              <div class="modal_approve_delivery_admin_sum_price_show" id="modal_approve_delivery_admin_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='col-sm-9'>
            <div class="modal_approve_delivery_admin_date" id="modal_approve_delivery_admin_date"></div> 
            </div>
        </div>
      
        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9"> 
              <input type="hidden" id="modal_approve_payment_type"></label>
              <div class="modal_approve_delivery_admin_type_show" id="modal_approve_delivery_admin_type_show"></div>
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
              <div class="col-sm-9" id="modal_approve_delivery_admin_remark" name="modal_approve_delivery_admin_remark">  
                <!-- <textarea id="modal_approve_approve_remark" name="" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea> -->
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">ที่อยู่จัดส่ง</label>
              <div class="col-sm-9" id="modal_approve_delivery_admin_address" name="modal_approve_delivery_admin_address">  
                <!-- <textarea id="modal_approve_approve_remark" name="" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea> -->
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะการชำระ</label>
              <div class="col-sm-9">ชำระครบ</div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">ภาพ</label>
              <div class="col-sm-9" id="modal_approve_delivery_admin_image" name="modal_approve_delivery_admin_image"></div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">  
              <label><input type="checkbox" name="" id=""  checked="checked" disabled="disabled"> ชำระครบ</label>
              </div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ส่วนเจ้าหน้าที่ : จัดส่งหนังสือ </h5>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label ">จัดส่งหนังสือภายในวันที่</label>
            <div class='input-group col-sm-9'>
            <div class='input-group col-sm-6'>
             <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_detail_delivery_admin_sdate" value="<?=date('Y-m-d');?>" name="modal_approve_delivery_admin_sdate" id="modal_approve_delivery_admin_sdate"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
            </div>
            ถึง
            <div class='input-group col-sm-6'>
            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_detail_delivery_admin_edate" value="<?=date('Y-m-d');?>" name="modal_approve_delivery_admin_edate" id="modal_approve_delivery_admin_edate"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span>
            </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุการจัดส่ง</label>
              <div class="col-sm-9">  
                <textarea id="modal_approve_delivery_admin_remark" name="modal_approve_delivery_admin_remark" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-primary btn_insert_detail_delivery_admin" id="btn_insert_detail_delivery_admin">บันทึก</button></h4>
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 