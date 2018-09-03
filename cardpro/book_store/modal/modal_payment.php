<form id="form-notification-payment" action="request.php?type=update_payment" method="post" enctype="multipart/form-data">
  <div class="imageupload modal fade" id="form-payment" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
      <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
      <h4 class="modal-title">แจ้งชำระเงิน <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h4>
  </div>
  <div class="modal-body">
      <table id="" class="display" cellspacing="0" width="100%">
        <input type="hidden" class="form-control" name="modal_payment_id" id="modal_payment_id"/>
        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> รายละเอียดการสั่งซื้อ </h5>
        </div>

        <div class="form-group col-sm-12 " id="modal_payment_alert"></div>

        <div class="form-group col-sm-12">
        <label for="code" class="col-sm-3 control-label">เลขใบสั่งซื้อ</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_payment_book_code" id="modal_payment_book_code" readonly="readonly" />
           </div>
        </div>  
        <div class="form-group col-sm-12">
        <label for="title" class="col-sm-3 control-label">จำนวนหนังสือ(เล่ม)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_payment_qty" id="modal_payment_qty" readonly="readonly" />
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="modal_payment_sum_price_book" class="col-sm-3 control-label">ค่าหนังสือ(บาท)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_payment_sum_price_book" id="modal_payment_sum_price_book" readonly="readonly"/>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="modal_payment_shipping_charge" class="col-sm-3 control-label">ค่าจัดส่ง(บาท)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_payment_shipping_charge" id="modal_payment_shipping_charge" readonly="readonly"/>
           </div>
        </div>

        <div class="form-group col-sm-12">
        <label for="modal_payment_sum_price" class="col-sm-3 control-label">ยอดเงินทั้งหมด(บาท)</label>
            <div class="col-sm-4">  
            <input type="text" class="form-control" name="modal_payment_sum_price" id="modal_payment_sum_price" readonly="readonly"/>
           </div>
        </div>

        <div class="form-group col-md-12 order_book" id="order_book"></div>

        <div class="form-group col-sm-12">
        <label for="modal_payment_sum_price" class="col-sm-3 control-label">หมายเหตุ</label>
            <div class="col-sm-9" id="modal_payment_remark2" name="modal_payment_remark2">  
        </div>
        </div>

        <div class="form-group col-sm-12">
           <label for="modal_payment_staff" class="col-sm-3 control-label">ผู้ทำรายการ</label>
              <div class="col-sm-5" name="modal_payment_staff" id="modal_payment_staff">  
             </div>
        </div>

        <div class="form-group col-sm-12">
        <h5><span class="glyphicon glyphicon-usd" aria-hidden="true"></span> แจ้งการชำระเงิน </h5>
        </div>

        <div class="form-group col-sm-12">
            <label for="" class="col-sm-3 control-label">วันที่โอน</label>
            <div class='input-group col-sm-4'>
            <input type='text' data-date-format="yyyy-mm-dd" class="form-control modal_payment_date" value="<?=date('Y-m-d');?>" name="modal_payment_date" id="modal_payment_date"/><span class="input-group-addon"> <span class="glyphicon glyphicon-calendar"></span> </span> 
            </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ยอดชำระรวม</label>
              <div class="col-sm-9">  
              <div class="modal_payment_sum_price_show" id="modal_payment_sum_price_show"></div> 
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"> ชำระโดย</label>
              <div class="col-sm-9"> 
              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="1" checked="checked"> โอน</label>
              <!-- <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="2"> บัตรเคดิต</label></label> 
              <label><input type="radio" name="modal_payment_type" id="modal_payment_type" value="3"> เงินสด</label></label> --> 
              </div>
        </div>

        <div class="form-group col-sm-12">
              <label for="" class="col-sm-3 control-label"></label>
              <div class="col-sm-9">  
              <label><input type="checkbox" name="modal_payment_status" id="modal_payment_status" value="3" checked="checked"> ชำระครบ</label>
              <!--<label><input type="radio" name="modal_payment_status" id="modal_payment_status" value="7"></label></label>-->
              </div>
        </div>

        <!-- <div class="form-group col-sm-12">
              <label for="remark" class="col-sm-3 control-label">upload รูป</label>
              <div class="col-sm-9">  
              <input type="file" name="fileToUpload" id="fileToUpload"> * ขนาดไม่เกิน 500KB เฉพาะไฟล์ JPG, JPEG, PNG & GIF
              </div>
        </div>
         -->
        <div class="col-sm-12 panel-heading clearfix ">
          <h4 class="panel-title pull-left">Upload รูปหลักฐานการชำระ</h4>   
        </div>
        <div class="col-sm-12 file-tab panel-body">
            <label class="btn btn-info btn-file">
                <span>Browse</span> 
                <!-- The file is stored here. -->
                <input type="file" name="fileToUpload">
            </label>
             <button type="button" class="btn btn-danger">Remove</button> * ขนาดไม่เกิน 500KB เฉพาะไฟล์ JPG, JPEG, PNG & GIF
        </div>
       
        <div class="form-group col-sm-12">
            <label for="remark" class="col-sm-3 control-label">หมายเหตุ</label>
              <div class="col-sm-9">  
                <textarea id="modal_payment_remark" name="modal_payment_remark" rows="6" cols="35" class="form-control" placeholder="หมายเหตุ"></textarea>
              </div>
        </div>

        <div class="form-group col-sm-12">
            <label for="modal_payment_address" class="col-sm-3 control-label">ที่อยู่จัดส่ง</label>
              <div class="col-sm-9">  
                <textarea id="modal_payment_address" name="modal_payment_address" rows="6" cols="35" class="form-control" placeholder="ที่อยู่จัดส่ง"></textarea>
              </div>
        </div>

    </table>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn_insert_payment" id="btn_insert_payment">บันทึก</button></h4>
    <button type="button" class="btn btn-default closeDatatable" data-dismiss="modal" id="closeDatatable">Close</button>
  </div>
  </div>
  </div>
  </div>
</form> 
<!-- End Modal-form Datatable--> 