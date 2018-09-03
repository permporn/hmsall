<?
session_start();
include("../ck_session.php");
include('../config/config_db_self.php');
?>
<script type="text/javascript">
$('table#datatable').DataTable( {
    "dom": 'Bfrtip',
    "lengthMenu" : [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
    ],
    "buttons": ['copy'/*, 'csv'*/, 'excel'/*, 'pdf', 'print'*/ ,'pageLength'],
    "iDisplayLength": 10,
    "order": [[ 0, "DESC" ]]
});
$(function() {
    $('.close').click(function(){
        $.ajax({
            type: "POST",
            url: "form/form_data_course.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $(".header").show();
                $('.form-saerch').hide();
                $('.subject_self').hide();
                $('.term_self').hide();
                $('.quantity').hide(); 
                $('.set_pay').show();
                $('.form-gen').show();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> เงื่อนไข'); 
            } 
        });
    });
    $('.back').click(function(){
        $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
        $.ajax({
            type: "GET",
            url: "form/form_setting_course.php",
            data: {},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $(".header").hide();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 
                $("#loading").hide();
            } 
        });
    });
    $('.setting-add').click(function(){
       var id_set = $('#id_set').val();
       var teacher_set = $('#teacher_set').val();
       var percent_set = $('#percent_set').val();
       //alert(teacher_set);

       if(id_set != '' && teacher_set != '' && percent_set != ''){
       $.ajax({
            type: "GET",
            url: "report.php",
            data: {type : "insert_setting_sub", id_set : id_set, teacher_set : teacher_set, percent_set : percent_set},
            success: function(data){
                console.log(data);
                $.ajax({
                    type: "GET",
                    url: "form/form_setting_pay_edit.php",
                    data: {id_set : id_set},
                    success: function(data){
                        //console.log(data);
                        $("#data-table").html(data);
                        $(".header").hide();
                        $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 
                    } 
                });
       
            } 
        });
       }else{
         alert('กรุณากรอกข้อมูลให้ครบ');
       }
    });
});
function editSetting(id,id_set){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    var datas = $('#setting-insert-form').serialize();

    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "editSetting" , datas : datas}
    });
    request.done(function( result ) {
        //console.log(result);
        if(result != ''){
            alert(result);
        }
        $.ajax({
            type: "GET",
            url: "form/form_setting_course.php",
            data: {id_set : id_set},
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $(".header").hide();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 
                $("#loading").hide();
            } 
        });
    });

}

function deleteSetting(id,id_set){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    var update_percent = $('#percent'+id).val(); 
    //alert(id_set);
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "deleteSetting" , update_percent : update_percent , id_set : id_set}
    });
    request.done(function( result ) {
        //console.log(result);
        if(result != ''){
            alert(result);
        }
        $.ajax({
            type: "GET",
            url: "form/form_setting_pay_edit.php",
            success: function(data){
                //console.log(data);
                $("#data-table").html(data);
                $(".header").hide();
                $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 
                $("#loading").hide();
            } 
        });
    });
}
</script>
<!-- <div class="col-sm-12">
    <div class="col-md-11"></div>
    <div class="col-md-1" style="padding-bottom: 10px "><button type="button" class="btn btn-info setting-add"> <span class="glyphicon glyphicon-plus " aria-hidden="true"></span> เพิ่ม</button></div> 
</div> -->
<!-- form edit -->
<form id="setting-insert-form">
<div class="col-sm-12 setting-insert">  
    
    <table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <!-- <th><center>id_set</center></th> -->
        <th><center>ขื่อ</center></th>
        <th><center>คิด %</center></th>
       <!--  <th><center>สถานะครู</center></th>
        <th><center></center></th> -->
        <th><center>สถานะสาขา</center></th>
        <th><center></center></th>
        <!-- <th><center>ระยะเวลา</center></th> -->
        <th><center>คิดราคา</center></th>
        <th><center></center></th>
        <th><center>Action</center></th>
    </tr>
    </thead>
    <tbody>
      <? $sql_set = "SELECT *
                      FROM type_self 
                      WHERE type_id = '".$_GET['type_id'] ."'";
        $objQuery_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
        $j =0;
        while($objResult_set = mysql_fetch_array($objQuery_set)){ ?>
          <tr>
            <input type="hidden" name="type_id" id="type_id" value="<? echo $objResult_set['type_id'];?>">
          <!-- <td align=""><? echo $objResult_set['type_id'];?></td> -->
          <td align=""><?=$objResult_set['type_name']?></td>
          <td align="">
            <input type="radio" name="status_percent"  id="status_percent" value="0" <? if($objResult_set['status_percent'] == 0){?>checked<? }?>> none<br>
            <input type="radio" name="status_percent"  id="status_percent" value="1" <? if($objResult_set['status_percent'] == 1){?>checked<? }?>> คิด %<br>
            <!-- <input type="radio" name="status_percent" value="2" <? if($objResult_set['status_percent'] == 2){?>checked<? }?>> ไม่คิด %<br> -->
          </td>
          <!-- <td align="">
            <input type="radio" name="status_teacher " value="3" <? if($objResult_set['status_teacher'] == 0){?>checked<? }?>> none<br>
            <input type="radio" name="status_teacher " value="1" <? if($objResult_set['status_teacher'] == 1){?>checked<? }?>> เฉพาะ<br>
            <input type="radio" name="status_teacher " value="2" <? if($objResult_set['status_teacher'] == 2){?>checked<? }?>> ยกเว้น<br>
          </td>
          <td align="">
          <? $sql_tc = "SELECT * FROM teacher";
            $objQuery_tc = mysql_query($sql_tc) or die ("Error Query [".$sql_tc."]");
            while($objResult_tc = mysql_fetch_array($objQuery_tc)){ ?>
            <input type="checkbox" name="teacher_id[]" value="<?=$objResult_tc['teacherid']?>"><?=$objResult_tc['teachername']?><br>
            <? }?>
          </td> -->
          <td align="">
            <input type="radio" name="status_branch" id="status_branch" value="0" <? if($objResult_set['status_branch'] == 0){?>checked<? }?>> none<br>
            <!-- <input type="radio" name="status_branch " value="1" <? if($objResult_set['status_branch'] == 1){?>checked<? }?>> เฉพาะ<br> -->
            <input type="radio" name="status_branch" id="status_branch" value="2" <? if($objResult_set['status_branch'] == 2){?>checked<? }?>> ยกเว้น<br>
          </td>
          <td align="">
            <? //echo $objResult_set['branch_id']; 
            $branch['branch_id']= explode(",",$objResult_set['branch_id']);
            //print_r($branch['branch_id']);
            ?>

          <? $sql_b = "SELECT * FROM branch WHERE status_branch !=0";
            $objQuery_b = mysql_query($sql_b) or die ("Error Query [".$sql_b."]");
            $k = 0;
            while($objResult_b = mysql_fetch_array($objQuery_b)){ 
              ;?>
              <input type="checkbox" name="branch_id" id="branch_id" value="<?=$objResult_b['branchid']?>" <? 
              for($i = 0 ; $i <= count($branch['branch_id']) ; $i++){if($branch['branch_id'][$i] == $objResult_b['branchid']){?> checked <? 
                $k++;}}?> ><?=$objResult_b['name']?><br>
            <? 
            }?>
          </td>
          
          <!-- <td align="">
              <input type="radio" name="time_length" value="0" <? if($objResult_set['time_length'] == 0){?>checked<? }?>> none<br>
              <input type="radio" name="time_length" value="3" <? if($objResult_set['time_length'] == 3){?>checked<? }?>> 3 เดือน<br>
          </td> -->
          <td align="">
              <input type="radio" name="status_surcharge" id="status_surcharge" value="0" <? if($objResult_set['status_surcharge'] == 0){?>checked<? }?>> none<br>
              <input type="radio" name="status_surcharge" id="status_surcharge" value="1" <? if($objResult_set['status_surcharge'] == 1){?>checked<? }?>> คิดเงินเพิ่ม<br>
              <input type="radio" name="status_surcharge" id="status_surcharge" value="2" <? if($objResult_set['status_surcharge'] == 2){?>checked<? }?>> ส่วนลด<br>
          </td>
          <td>
            <input type="text" name="surcharge" id="surcharge" value="<?=$objResult_set['surcharge'];?>" size="4"> บาท
          </td>
          <td align="">
            <div id="loading"></div><button type="button" onclick="editSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> บันทึกแก้ไข</button>
            <!-- <button type="button" onclick="deleteSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button> -->
            </td>
          </tr>
        <? $j++;} ?>
    </tbody>
  </table>
  <font color="red"><strong>*none หมายถึงจะไม่คิดเงื่อนไขนั้นๆ</strong></font>
</div>

<div class="col-md-12" id="non-printable">
<center>
    <!-- <button type="button" class="btn btn-default close" id="close">Close</button> -->
    <button type="button" class="btn btn-default back" id="back">Back</button>
</center>
</div>
</form>
<? mysql_close($conn);?>
