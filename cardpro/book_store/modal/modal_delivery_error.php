<form method="get" id="form_delivery_error">
  <div class="modal fade" id="form-error-delivery" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title"> รายการสั่งซื้อ <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="hidden" class="form-control" name="modal_approve_delivery_id" id="modal_approve_delivery_id"/>
        <input type="hidden" class="form-control" name="modal_approve_delivery_status1" id="modal_approve_delivery_status1" value="5" />
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> รายละเอียดการสั่งซื้อ </h5>
        </div>

        <div class="form-group col-sm-12">
        <label for="no" class="col-sm-3 control-label">เลขที่ใบสั่งซื้อ</label>
            <div class="col-sm-9">  
            <div name="modal_delivery_error_id" id="modal_delivery_error_id"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">ชื่อหนังสือ</label>
            <div class="col-sm-9">  
            <div name="modal_delivery_error_book_name" id="modal_delivery_error_book_name"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="qty" class="col-sm-3 control-label">จำนวนที่สั่ง (เล่ม)</label>
            <div class="col-sm-5">  
            <div name="modal_delivery_error_qty" id="modal_delivery_error_qty"></div>
           </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดชำระรวม</label>
              <div class="col-sm-9">  
              <div class="modal_delivery_error_sum_price_show" id="modal_delivery_error_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9">  
              <div class="modal_delivery_error_type" id="modal_delivery_error_type"></div> 
              </div>
        </div>
        
        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> วันที่จัดส่ง</label>
              <div class="col-sm-9">  
              <div class="modal_delivery_error_date" id="modal_delivery_error_date"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุการสั่งซื้อ</label>
              <div class="col-sm-9">  
                <div name="modal_delivery_error_remark" id="modal_delivery_error_remark"></div>
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">ผู้สั่งซื้อ</label>
            <div class='col-sm-9'>
              <div name="modal_delivery_error_staff" id="modal_delivery_error_staff"> </div>
            </div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> รายละเอียดการรับของ </h5>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label">สถานะการรับของ</label>
              <div class="col-sm-9">  
                <div class="modal_delivery_error_status2" id="modal_delivery_error_status2"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="qty" class="col-sm-3 control-label">จำนวนหนังสือที่ได้รับ(เล่ม)</label>
              <div class="col-sm-9 ">
                <div name="modal_delivery_error_qty2" id="modal_delivery_error_qty2"></div>
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่รับ</label>
            <div class='col-sm-9'>
              <div name="modal_delivery_error_date2" id="modal_delivery_error_date2"></div> 
            </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">หมายเหตุการรับของ</label>
              <div class="col-sm-9">  
                <div name="modal_delivery_error_remark2" id="modal_delivery_error_remark2"></div>
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">ผู้ทำการรับของ</label>
            <div class='col-sm-9'>
              <div name="modal_delivery_error_staff2" id="modal_delivery_error_staff2"> </div>
            </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <!-- <button type="button" class="btn btn-primary btn_insert_approve_delivery" id="btn_insert_approve_delivery">บันทึก</button></h4> -->
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 