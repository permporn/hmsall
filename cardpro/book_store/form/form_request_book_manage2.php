<?php include("../ck_session.php");?>
<script type="text/javascript">
$(function() {
 
  window.scrollTo(0,0);

  $('#close_insert_book,.book_store_list,.book_request_list').click(function(){
      reloadRequest();
  });

  $('.btn_insert_requrest').click(function(){

    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    var datas = $('form#request-form').serialize();
    var datas_order = $('form#order-form').serialize();

    //alert(datas_order);
    //alert(datas);

    if($('.id_book').val() != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { datas : datas , type : "insert_request" , datas_order : datas_order}
        });
        request.done(function( result ) {
            //console.log(result);
            //reloadRequest();
            //location.reload();
            //alert(result);
            $.ajax({
               type: "GET",
               url: "form/form_table_order_book.php?id_order="+result,
               success: function(data){
                   $("#order_book").html(data);
                } 
            });
            $("#loading").hide();
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }else{
        alert('การกรอกข้อมูลไม่ครบ กรุณาแก้ไข')
    }
  });

  // drop down list teacher_self
  $("#teacher_self1").change(function(){
  
    var opt_a="<option value=\"\" selected=\"selected\">เลือกวิชา</option>";
    
    $("#book_self").html( opt_a );
    
    //$("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");

    $.ajax({
        url:"request.php",
        global: false,
        type: "GET",
        data: { teacher_id : $("#teacher_self1").val() , type : "book_store_self"},
        dataType: "JSON",
        async:false,
        success: function(jd) {

          //alert(jd);
              var opt="<option value=\"\" selected=\"selected\">เลือกวิชา</option>";
              $.each(jd, function(key, val){
                var num = val.indexOf(",");
                var id = val.substring(0, num);
                var name = val.substring(num+1);
                opt +="<option value='"+ id +"'>"+ name +"</option>"
                });
              $("#book_self").html( opt );
          }
      });
  });

  if($('#type_book1').val() == 1){
      $(".book_self_").hide();
  }
  else if($('#type_book1').val() == 2){
      $(".book_learn_").hide();
  }else{
      $(".book_learn_").hide();
      $(".book_self_").hide();
  }

  var result1 = $('#id_order_').val();
   $.ajax({
     type: "GET",
     url: "form/form_table_order_book2.php?id_order="+result1,
     success: function(data){
         $("#order_book").html(data);
      } 
  });

  $('#btn_update_requrest').click(function(){
    var datas = $('form#request-form-edit').serialize();
   // alert(datas);
    if($('.id_book_edit').val() != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { datas : datas , type : "update_request"}
        });
        request.done(function( result ) {
            location.reload();
            //console.log(result);
            //reloadRequest();
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }else{
        alert('การกรอกข้อมูลไม่ครบ กรุณาแก้ไข')
    }
  });

  $(".type_book").change(function() {
      if($('#type_book').val() == 2){
          $(".book_learn_").hide();
          $(".book_self_").show("slow");
      }else if($('#type_book').val() == 1 ){
          $(".book_self_").hide();
          $(".book_learn_").show("slow");
      }else if($('#type_book').val() == 0){
          $(".book_self_").hide();
          $(".book_learn_").hide();
      }      
  });
  
  $(".book_learn").change(function() {
    var id_subject = $(".book_learn").val();
    //console.log(id_subject);
    $.ajax({
      type: "GET",
      url: "book.php",
      //dataType: 'html',
      data: {id_subject : id_subject, type : "1" , type2 : "select_book"},
      success: function(data){
          //console.log(data);
          var result = JSON.parse(data);
          //console.log(result);
          $(".price").val(result.price);
          $(".id_book").val(result.id);
          $(".sum_price").val(result.price);
          $(".qty").val(1);
      } 
    });
  }); 

  $(".book_self").change(function() {
    var id_subject = $(".book_self").val();
    //console.log(id_subject);
    $.ajax({
      type: "GET",
      url: "book.php",
      //dataType: 'html',
      data: {id_subject : id_subject, type : "2" ,type2 : "select_book"},
      success: function(data){
          //console.log(data);
          var result = JSON.parse(data); 
          //console.log(result);
          //console.log(result);
          $(".id_book").val(result.id);
          $(".price").val(result.price);
          $(".sum_price").val(result.price);
          $(".qty").val(1);
      }
    });
  }); 

  function reloadRequest(){
    var s_date = $('.s_date').val();
    var e_date = $('.e_date').val();
    var type = $('#type').val();
    if(type == 2){
        var subject = $('#subject_self').val();
        var branch  = $('#branch_self').val();
        var term    = $('#term_self').val();
        var teacher = $('#teacher_self').val();
        var pay     = $('#pay_self').val();
    }else if(type == 1){
        var subject = $('#subject_learn').val();
        var branch  = $('#branch_learn').val();
        var term    = $('#term_learn').val();
        var teacher = $('#teacher_learn').val();
        var pay     = "";
    }
    
    $.ajax({
        type: "POST",
        url: "form/form_request_book_admin.php",
        data: { s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
        success: function(data){
            //console.log(data);
            $("#container_book").hide();
            $("#header").show();
            $("#data-table").html(data);
        } 
    }); 
  }
  // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
            var sum = currentVal + 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        var price = $(".price").val();
        $(".sum_price").val(sum*price);
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());

        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
            var sum = currentVal - 1;
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
            var sum = 0;
        }
        var price = $(".price").val();
        $(".sum_price").val(sum*price);

    });

    
});
</script>
<style>
#myform {
    text-align: center;
    padding: 5px;
    border: 1px dotted #ccc;
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25px;}
</style>

<div id="add_book">
<form method="get" id="request-form">
<input type='hidden' id="id_order_" name='id_order_' class='form-control id_order_' value="<?=$_GET['id_order'];?>" />
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<h4><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>  สร้างใบสั่งซื้อหนังสือ</h4></div>
<div class="panel-body">
  <div class="form-group col-sm-12">
      <label for="sum_price" class="col-sm-2 control-label">เลขใบสั่งซื้อ</label>
        <div class="col-sm-2">  
          <!-- <input type='text' id="id_order" name='id_order' class='form-control id_order' readonly="readonly"  value="<?=$_GET['id_order'];?>" /> -->
        </div>
  </div>
  <div class="form-group col-sm-12">
    <label for="type_book" class="col-sm-2 control-label">ประเภท</label>
      <div class="col-sm-5">  
        <select class="form-control type_book" id="type_book" name="type_book" >
          <option value="0">-- เลือกประเภท --</option>
          <?php //if($id_account_self != '141' || $session_status != "manager_franchise" || $session_status != "user_franchise"){?>
          <?php 
          if($id_account_self != '141'){
           if($session_status != "manager_franchise" ){
            if($session_status != "user_franchise"){
          ?>
            <option value="1">คอร์สสด</option>
          <? }}}?>
          <option value="2">คอร์ส self</option>
        </select>
       </div>
</div>

<? include('../config/config_db_self.php'); ?>
<div class="form-group col-sm-12 book_self_">
  <label for="" class="col-sm-2 control-label">ครู</label>
  <div class="col-sm-5">  
  <select id="teacher_self1" class="form-control teacher_self1" name="teacher_self1">
      <option value="0">-- เลือกครู --</option>
      <?php 
          $strSQL_teacher = "SELECT * FROM  `teacher` ORDER BY  `teacherid` ASC";
          $objQuery_teacher = mysql_query($strSQL_teacher) or die ("Error Query [".$strSQL_teacher."]");
          while ( $objResult_teacher = mysql_fetch_array($objQuery_teacher)) {
          ?>
          <option value="<?=$objResult_teacher['teacherid']?>"><?=$objResult_teacher['teachername']?></option>
       <? }?>
  </select>
  </div>
</div>
<div class="form-group col-sm-12 book_self_">
  <label for="" class="col-sm-2 control-label">วิชาเรียน</label>
  <div class="col-sm-5">  
  <select id="book_self" class="form-control book_self" name="book_self">
      <option value="0">-- เลือกวิชา --</option>
  </select>
  </div>
  
</div>
<? 
mysql_close($conn);
include("../config/config_db_school.php");
?>
<div class="form-group col-sm-12 book_learn_">
  <label for="" class="col-sm-2 control-label">วิชาเรียน</label>
  <div class="col-sm-5">  
  <select id="book_learn" class="form-control book_learn" name="book_learn">
      <option value="0">-- เลือกวิชา --</option>
      <?php 
          $strSQL_subjectall = "SELECT * FROM `subject` WHERE `status_system_seat` = '1'" ; //LIMIT 0, 15
          $objQuery_subjectall = mysql_query($strSQL_subjectall) or die ("Error Query [".$strSQL_subjectall."]");
          while ( $objResult_subjectall = mysql_fetch_array($objQuery_subjectall)) {?>
       <option value="<?=$objResult_subjectall['subid']?>"><?=$objResult_subjectall['subcode']?> <?=$objResult_subjectall['subname'];?></option><? }?>
  </select>
  </div>
</div>
<? mysql_close($conn);?>

<div class="form-group col-sm-12">
    <label for="qty" class="col-sm-2 control-label">จำนวน</label>
      <div class="col-sm-5">  
            <input type='button' value='-' class='qtyminus ' field='quantity' />
            <input type='text' name='quantity' value='1' class='qty' />
            <input type='button' value='+' class='qtyplus' field='quantity' />
       </div>
</div>

<div class="form-group col-sm-12">
    <label for="price" class="col-sm-2 control-label">ราคา (บาท/เล่ม)</label>
      <div class="col-sm-2">  
        <input type='hidden' id="id_book" name='id_book' class='form-control id_book'/>
        <input type='text' id="price" name='price' class='form-control price' readonly="readonly" value="0" />
      </div>
</div>

<div class="form-group col-sm-12">
    <label for="sum_price" class="col-sm-2 control-label">ยอดรวม (บาท)</label>
      <div class="col-sm-2">  
        <input type='text' id="sum_price" name='sum_price' class='form-control sum_price' readonly="readonly"  />
      </div>
</div>

<div class="form-group col-md-12">
    <label for="" class="col-sm-2 control-label"></label>
      <div class="col-sm-2">  
        <button type="button" class="btn btn-info btn_insert_requrest" id="btn_insert_requrest">
        <span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> เพิ่ม</button>
        <div id="loading"></div>
        <button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button>
      </div>

</div>

<div class="form-group col-md-12 order_book" id="order_book">    
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<? //}?>