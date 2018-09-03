<!-- Modal-form -->
<form method="get" id="search-form">
<div class="modal fade" id="myModal" role="dialog" data-keyboard="false" data-backdrop="static">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close close_" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">จองที่นั่ง</h4>
  </div>
<div class="modal-body">
    <p id="detial" class="detial" ></p>
    <div class="input-group col-md-7">
    <input id="search" type="text" class="form-control typeahead" name="studentname" placeholder="ค้นหาชื่อนักเรียน" autocomplete="off" />
    <span class="glyphicon glyphicon-search form-control-feedback"></span>
    </div>
    <div class="radio">
    <label class="radio-inline">
        <input type="radio" name="gender" id="gender" value="male" checked>
        ชาย</label>
    <label class="radio-inline">
        <input type="radio" name="gender" id="gender" value="female">
        หญฺิง</label>
   </div>
   <input id="phonenumber" type="text" class="form-control" name="phonenumber" placeholder="เบอร์โทรศัพย์"/>
   <br>
   <input id="pcode" type="text" class="form-control" name="pcode" placeholder="เลขบัตรประชาชน"/>
   <br><strong>ประเภทการจ่าย :</strong>
   <div class="radio">
    <label class="radio-inline">
        <input type="radio" name="type_price" id="type_price" value="1" checked>
        เงินสด</label>
    <label class="radio-inline">
        <input type="radio" name="type_price" id="type_price" value="2">
        เคดิต</label>
    <label class="radio-inline">
        <input type="radio" name="type_price" id="type_price" value="0">
        โอน</label>
   </div>

   <br><strong>ราคาชำระ : (ตัวอย่าง : 2500)</strong>
   <input id="price" type="text" class="form-control" name="price" placeholder="กรอกเฉพาะตัวเลข" />

    <div id="subject_id_input" class="subject_id_input"></div>
    <div id="seat_input" class="seat_input"></div>
    <div id="id_seat_input" class="id_seat_input"></div>
    <div id="studentid" class="studentid"></div>
    <div id="studentname" class="studentname"></div>
    <div id="countdown" class="countdown"></div>
    <input type="hidden" name="id_staff" id="id_staff" value="<?=$_SESSION["accid_cardpro"]?>">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary btn_insert" id="btn_insert">บันทึก</button>
    <button type="button" class="btn btn-default close_" data-dismiss="modal" id="close">Close</button>
  </div>
</div>
</div>
</div>
</form> 
<!-- End Modal-form Datatable--> 