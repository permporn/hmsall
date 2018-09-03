<?php include("../ck_session.php");?>
<script type="text/javascript">
$(function() {

 window.scrollTo(0,0);

$('#close_insert_book,.book_store_list,.book_request_list').click(function(){
    reloadBookStore();
});

if($('#type_book1').val() == 1){
  $(".book_self_").hide();
}
else if($('#type_book1').val() == 2){
  $(".book_learn_").hide();
}else{
  $(".book_self_").hide();
  $(".book_learn_").hide(); 
}

$('#btn_insert_book').click(function(){
  var datas = $('form#book-form').serialize();
  //alert(datas);
  var book_learn = $(".book_learn").val();
  var book_self =  $(".book_self").val();
  var request = $.ajax({
      url:"book.php",
      method: "GET",
      data: { datas : datas , book_learn : book_learn , book_self : book_self , type : "insert_book"}
  });
  request.done(function( result ) {
      reloadBookStore();
  });
  request.fail(function( jqXHR, textStatus ) {
      alert( "Request failed: " + textStatus );
  });
});

$('#btn_update_book').click(function(){
    var datas = $('form#book-form-edit').serialize();
    //alert(datas);
    var book_learn = $(".book_learn").val();
    var book_self =  $(".book_self").val();
    var request = $.ajax({
        url:"book.php",
        method: "GET",
        data: { datas : datas , book_learn : book_learn , book_self : book_self , type : "update_book"}
    });
    request.done(function( result ) {
        reloadBookStore();
    });
    request.fail(function( jqXHR, textStatus ) {
        alert( "Request failed: " + textStatus );
    });
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

function reloadBookStore(){
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
        url: "form/form_book.php",
        data: { s_date : s_date , e_date : e_date , type : type , subject : subject , branch : branch , term : term , teacher : teacher , pay : pay},
        success: function(data){
            //console.log(data);
            $("#container_book").hide();
            $("#header").show();
            $("#data-table").html(data);
        } 
    });  
  }

  // drop down list teacher_self
  $("#teacher_self1").change(function(){
  
    var opt_a="<option value=\"\" selected=\"selected\">เลือกวิชา</option>";
    
    $("#book_self").html( opt_a );
    
    $.ajax({
        url:"request.php",
        global: false,
        type: "GET",
        data: { teacher_id : $("#teacher_self1").val() , type : "add_book_store_self"},
        dataType: "JSON",
        async:false,
        success: function(jd) {
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

  if($('#id_book_self').val() != ''){
    $.ajax({
        url:"request.php",
        global: false,
        type: "GET",
        data: { teacher_id : $("#teacher_self1").val() , type : "add_book_store_self"},
        dataType: "JSON",
        async:false,
        success: function(jd) {
              var opt="<option value=\"\">เลือกวิชา</option>";
              $.each(jd, function(key, val){
                var num = val.indexOf(",");
                var id = val.substring(0, num);
                var name = val.substring(num+1);
                if($('#id_book_self').val() == id){
                  opt +="<option selected=\"selected\" value='"+ id +"'>"+ name +"</option>"
                }else{
                  opt +="<option value='"+ id +"'>"+ name +"</option>"
                }
                });
              $("#book_self").html( opt );
          }
      });
  }



});
</script>


<? if($_GET['type'] == "edit_book"){
$id = $_GET['id'];

include('../config/config_db_self.php');
$strSQL_book =  
            "SELECT
                book_information.`id` as id,
                book_information.`code` as code,
                book_information.title as title,
                book_information.id_subject as id_subject,
                book_information.type as type,
                book_information.qty as qty,
                book_information.price as price,
                book_information.create_date as create_date,
                teacher.teacherid
                FROM
                book_information
                LEFT JOIN subject ON book_information.id_subject = subject.subid
                LEFT JOIN teacher ON subject.teacherid = teacher.teacherid
                WHERE id =".$id;
//echo $strSQL_book ;
$objQuery_book = mysql_query($strSQL_book) or die ("Error Query [".$strSQL_book."]");
$objResult_book = mysql_fetch_array($objQuery_book);
mysql_close($conn);
?>

<div id="edit_book">
<form method="get" id="book-form-edit">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<br>
<h4><span class="glyphicon glyphicon-edit" aria-hidden="true" ></span>  แก้ไขหนังสือ</h4></div>
<div class="panel-body">
<input type="hidden" name="type_book1" id="type_book1" value="<?=$objResult_book['type'];?>"/>
<input type="hidden" name="id" id="id" value="<?=$objResult_book['id'];?>"/>
<div class="form-group col-sm-12">
    <label for="code" class="col-sm-2 control-label">รหัสหนังสือ</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="code" id="code" value="<?=$objResult_book['code'];?>"/>
      </div>
</div> 
<div class="form-group col-sm-12">
    <label for="title" class="col-sm-2 control-label">ชื่อหนังสือ</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="title" id="title" value="<?=$objResult_book['title'];?>"/>
      </div>
</div>

<div class="form-group col-sm-12">
    <label for="type_book" class="col-sm-2 control-label">ประเภท</label>
      <div class="col-sm-5">  
          <select class="form-control type_book" id="type_book" name="type_book" >
          <? if($id_account_self != '141'){ ?>
          <option value="1" <?if($objResult_book['type']){?>selected="selected"<? }?> >คอร์สสด</option>
          <? }?>
          <option value="2" <?if($objResult_book['type']){?>selected="selected"<? }?> >คอร์ส self</option>
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
          <option <?if($objResult_book['teacherid'] == $objResult_teacher['teacherid']){?>selected="selected"<? }?> value="<?=$objResult_teacher['teacherid']?>"><?=$objResult_teacher['teachername']?></option>
       <? }?>
  </select>
  </div>
</div>
<div class="form-group col-sm-12 book_self_">
  <label for="" class="col-sm-2 control-label">วิชาเรียน</label>
  <div class="col-sm-5"> 
  <input type="hidden" name="id_book_self" id="id_book_self" value="<?=$objResult_book['id_subject'];?>"> 
  <select id="book_self" class="form-control book_self" name="book_self">
      <option value="0">-- เลือกวิชา --</option><
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
       <option value="<?=$objResult_subjectall['subid']?>" <?if($objResult_book['id_subject'] == $objResult_subjectall['subid'] && $objResult_book['type'] == 1){?>selected="selected"<? }?> >
       <?=$objResult_subjectall['subcode']?> <?=$objResult_subjectall['subname'];?></option><? }?>
  </select>
  </div>
</div>
<? mysql_close($conn);?>

<div class="form-group col-sm-12">
    <label for="qty" class="col-sm-2 control-label">จำนวน</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="qty" id="qty" value="<?=$objResult_book['qty'];?>"/>
      </div>
</div>

<div class="form-group col-sm-12">
    <label for="price" class="col-sm-2 control-label">ราคา</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="price" id="price" value="<?=$objResult_book['price'];?>"/>
      </div>
</div>
<div class="col-md-12">
<button type="button" class="btn btn-primary btn_update_book" id="btn_update_book">บันทึก</button></h4>
<button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<? }else{?>
<div id="add_book">
<form method="get" id="book-form">
<div class="row">
<div class="col-lg-12">
<div class="panel panel-default">
<div class="panel-heading">
<br>
<h4><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span>  เพิ่มหนังสือ</h4></div>
<div class="panel-body">
<!--<h4 class="col-lg-12 page-header">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่มหนังสือ
</h4>-->
<div class="form-group col-sm-12">
    <label for="code" class="col-sm-2 control-label">รหัสหนังสือ</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="code" id="code"  placeholder="รหัสหนังสือ"/>
       </div>
</div> 
<div class="form-group col-sm-12">
    <label for="title" class="col-sm-2 control-label">ชื่อหนังสือ</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="title" id="title"  placeholder="ชื่อหนังสือ"/>
       </div>
</div>

<div class="form-group col-sm-12">
    <label for="type_book" class="col-sm-2 control-label">ประเภท</label>
      <div class="col-sm-5">  
        <select class="form-control type_book" id="type_book" name="type_book" >
          <option value="0">-- เลือกประเภท --</option>
          <? if($id_account_self != '141'){ ?>
          <option value="1">คอร์สสด---</option>
          <? }?>
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
          $strSQL_teacher = "SELECT * FROM  `teacher` WHERE status_teacher = 1 ORDER BY  `teacherid` ASC";
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
        <input type="text" class="form-control" name="qty" id="qty" placeholder="จำนวนหนังสือ" />
       </div>
</div>

<div class="form-group col-sm-12">
    <label for="price" class="col-sm-2 control-label">ราคา</label>
      <div class="col-sm-5">  
        <input type="text" class="form-control" name="price" id="price" placeholder="ราคา/หน่วย" />
       </div>
</div>
<div class="col-md-12">
<button type="button" class="btn btn-primary btn_insert_book" id="btn_insert_book">บันทึก</button></h4>
<button type="button" class="btn btn-default close_insert_book" id="close_insert_book">Close</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<? }?>