<?php include("../ck_session.php");?>
<script type="text/javascript">
$(function() {

  window.scrollTo(0,0);

  $('table#datatable_book').DataTable({
        //dom: 'Bfrtip',
        // buttons: ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/]
        "dom": ''
  });

  $('#close_insert_book,.book_store_list,.book_request_list').click(function(){
      reloadRequest();
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
     url: "form/form_print_table_order_book.php?id_order="+result1,
     success: function(data){
         $("#order_book").html(data);
      } 
  });

  $('#btn_insert_requrest').click(function(){
    var datas = $('form#request-form').serialize();
    var datas_order = $('form#order-form').serialize();

    //alert(datas_order);

    if($('.id_book').val() != 0){
        var request = $.ajax({
            url:"request.php",
            method: "GET",
            data: { datas : datas , type : "insert_request" , datas_order : datas_order}
        });
        request.done(function( result ) {
            console.log(result);
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
        });
        request.fail(function( jqXHR, textStatus ) {
            alert( "Request failed: " + textStatus );
        });
    }else{
        alert('การกรอกข้อมูลไม่ครบ กรุณาแก้ไข')
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
          $(".sum_price").val(0);
          $(".qty").val(1);
      } 
    });
  }); 

  $(".book_self").change(function() {
    var id_subject = $(".book_self").val();
    console.log(id_subject);
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
          $(".sum_price").val(0);
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
<!-- <div class="panel-heading"> -->
<div class="panel-body">
<div class="form-group col-md-12 order_book" id="order_book">    
</div>
</div>
<!-- </div> -->
</div>
</div>
</div>
</div>
</div>
<? //}?>