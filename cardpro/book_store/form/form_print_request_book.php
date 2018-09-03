<?php include("../ck_session.php");?>
<script type="text/javascript">
$(function() {

  window.scrollTo(0,0);

  $('table#datatable_book').DataTable({
        //dom: 'Bfrtip',
        // buttons: ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/]
        "dom": ''
  });

  $('#close_insert_book,.book_store_list,.book_request_list,#close_print').click(function(){
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
  var page = $('#page').val();
  //alert(page);
   $.ajax({
     type: "GET",
     url: "form/form_print_table_order_book.php?id_order="+result1+"&page="+page,
     success: function(data){
         $("#order_book").html(data);
      } 
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
#printable { display: block; }

@media print 
{ 
#non-printable { display: none; } 
#printable { display: block; } 
} 
.borderless tr, .borderless td, .borderless th {
    border: none !important;
}
</style>

<div id="add_book">
  <form method="get" id="request-form">
    <input type='hidden' id="id_order_" name='id_order_' class='form-control id_order_' value="<?=$_GET['id_order'];?>" />
    <input type='hidden' id="page" name='page' class='form-control page' value="<?=$_GET['page'];?>" />
    <div class="row">
    <div class="col-md-12">
      <div class="order_book" id="order_book"></div>
    </div>
    <div class="col-md-12" id="non-printable">
    <center>
      <button type="button" class="btn btn-primary btn_update_order" onclick="javascript:window.print();">Print..</button>
      <button type="button" class="btn btn-default" id="close_print">Close</button>
    </center>
    </div>
  </form>
</div>
<? //}?>