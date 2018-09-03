<form method="get" id="form_detail_delivery">
  <div class="modal fade" id="form-detail-delivery" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">รายละเอียดการสั่งซื้อ <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="hidden" class="form-control" name="modal_detail_delivery_id" id="modal_detail_delivery_id"/>
        <input type="hidden" class="form-control" name="modal_detail_delivery_id_branch" id="modal_detail_delivery_id_branch" />
        <input type="hidden" class="form-control" name="modal_detail_delivery_status" id="modal_detail_delivery_status" value="4" />
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> รายละเอียดการแจ้งการชำระเงิน </h5>
        </div>

        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-9">  
            <div name="modal_detail_delivery_id_show" id="modal_detail_delivery_id_show"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">จำนวนหนังสือ(เล่ม)</label>
            <div class="col-sm-5">  
            <div name="modal_detail_delivery_qty" id="modal_detail_delivery_qty"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดเงินทั้งหมด</label>
              <div class="col-sm-9">  
              <div class="modal_detail_delivery_sum_price_show" id="modal_detail_delivery_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='col-sm-9'>
            <div class="modal_detail_delivery_date" id="modal_detail_delivery_date"></div> 
            </div>
        </div>
      
        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9"> 
              <input type="hidden" id="modal_detail_delivery_type"></label>
              <div class="modal_detail_delivery_type_show" id="modal_detail_delivery_type_show"></div>
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
              <div class="col-sm-9" id="modal_detail_delivery_remark" name="modal_detail_delivery_remark">  
                <!-- <textarea id="modal_approve_approve_remark" name="" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea> -->
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">ที่อยู่จัดส่ง</label>
              <div class="col-sm-9" id="modal_detail_delivery_address" name="modal_detail_delivery_address">  
                <!-- <textarea id="modal_approve_approve_remark" name="" rows="3" cols="35" class="form-control" placeholder="หมายเหตุ" readonly="readonly"></textarea> -->
              </div>
        </div>


        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">ภาพ</label>
              <div class="col-sm-9" id="modal_detail_delivery_image" name="modal_detail_delivery_image"></div>
        </div>

        <div class="form-group col-sm-12">
          <h5><span class="glyphicon glyphicon-user" aria-hidden="true"></span> ส่วนเจ้าหน้าที่ : ยืนยันการชำระเงิน และจัดส่งหนังสือ </h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะการชำระ</label>
              <div class="col-sm-9">ชำระครบ</div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">เจ้าหน้าที่ยืนยันการชำระ</label>
              <div class="col-sm-9" id="modal_detail_delivery_staff" name="modal_detail_delivery_staff"></div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">จัดส่งหนังสือภายในวันที่</label>
              <div class="col-sm-9" id="modal_detail_delivery_date2" name="modal_detail_delivery_date2"></div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุการจัดส่ง</label>
              <div class="col-sm-9" id="modal_detail_delivery_remark2" name="modal_detail_delivery_remark2"></div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ส่วนลูกค้า : ยืนยันการรับหนังสือ</h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะการรับหนังสือ</label>
              <div class="col-sm-9" id="modal_detail_delivery_status" name="modal_detail_delivery_status"></div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่รับ</label>
            <div class='col-sm-9' id="modal_detail_delivery_date3">
            </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9" id="modal_detail_delivery_remark3">  </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">ยืนยันโดย</label>
            <div class="col-sm-9" id="modal_detail_delivery_staff_name3">  </div>
        </div>


    </table>
  </div>
  <div class="modal-footer">
    <!-- <button type="button" class="btn btn-primary btn_insert_detail_delivery" id="btn_insert_detail_delivery">บันทึก</button></h4> -->
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 