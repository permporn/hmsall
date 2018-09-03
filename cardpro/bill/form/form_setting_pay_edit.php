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
    "iDisplayLength": 100,
    "order": [[ 0, "DESC" ]],
    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ){
        $('td:eq(0)', nRow);
    },
    "fnDrawCallback": function() {
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
    }
});
$(function() {
    $('.close_pay').click(function(){
        $.ajax({
            type: "POST",
            url: "form/form_data_pay.php",
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
    $('.back_pay').click(function(){
        //$("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
        $.ajax({
            type: "GET",
            url: "form/form_setting_pay.php",
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
    // $('.setting-add').click(function(){
    //    var id_set = $('#id_set').val();
    //    var teacher_set = $('#teacher_set').val();
    //    var percent_set = $('#percent_set').val();
    //    //alert(teacher_set);

    //    if(id_set != '' && teacher_set != '' && percent_set != ''){
    //    $.ajax({
    //         type: "GET",
    //         url: "report.php",
    //         data: {type : "insert_setting_sub", id_set : id_set, teacher_set : teacher_set, percent_set : percent_set},
    //         success: function(data){
    //             console.log(data);
    //             $.ajax({
    //                 type: "GET",
    //                 url: "form/form_setting_pay_edit.php",
    //                 data: {id_set : id_set},
    //                 success: function(data){
    //                     //console.log(data);
    //                     $("#data-table").html(data);
    //                     $(".header").hide();
    //                     $('#header_title').html('<span class="glyphicon glyphicon-search" aria-hidden="true" ></span> ตั้งค่า'); 
    //                 } 
    //             });
       
    //         } 
    //     });
    //    }else{
    //      alert('กรุณากรอกข้อมูลให้ครบ');
    //    }
    // });
});
function editSetting(id,id_set){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    var update_percent = $('#percent'+id).val(); 
    //alert(id_set +"-"+id +"-"+update_percent);
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "editSetting_sub" , update_percent : update_percent}
    });
    request.done(function( result ) {
        //console.log(result);
        if(result != ''){
            alert(result);
        }
        $.ajax({
            type: "GET",
            url: "form/form_setting_pay_edit.php",
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
    //alert(id+"-"+id_set)
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    //var update_percent = $('#percent'+id).val(); 
    //alert(id_set);
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "deleteSetting_sub" }
    });
    request.done(function( result ) {
        //console.log(result);
        if(result != ''){
            alert(result);
        }
        $.ajax({
            type: "GET",
            url: "form/form_setting_pay_edit.php",
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
</script>
<!-- <div class="col-sm-12">
    <div class="col-md-11"></div>
    <div class="col-md-1" style="padding-bottom: 10px "><button type="button" class="btn btn-info setting-add"> <span class="glyphicon glyphicon-plus " aria-hidden="true"></span> เพิ่ม</button></div> 
</div> -->
<!-- form edit -->
<div class="col-sm-12 setting-insert">  
    
    <table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th><center>id_set</center></th>
        <th><center>ขื่อ</center></th>
        <th><center>ได้%</center></th>
        <th><center>Action</center></th>
    </tr>
    </thead>
    <tbody>
      <? $sql_set = "SELECT id,  
                      id_set, 
                      set_name, 
                      teacher_id,  
                      percent , 
                      teacher.teachername AS teacher_name
                      FROM bill_percent 
                      LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid
                      WHERE id_set = '".$_GET['id_set'] ."'";
        $objQuery_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
        $j =0;
        while($objResult_set = mysql_fetch_array($objQuery_set)){ ?>
          <tr>
          <td align="center"><? echo $objResult_set['set_name'];?></td>
          <td align="center"><?=$objResult_set['teacher_name']?></td>
          <td align="center"><input type="text" id="percent<?=$objResult_set['id']?>" name="percent<?=$objResult_set['id']?>" value="<?=$objResult_set['percent']?>"/></td>
          <td align="center">
            <div id="loading"></div><button type="button" onclick="editSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> บันทึกแก้ไข</button>

            <button type="button" onclick="deleteSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>
            </td>
          </tr>
        <? $j++;}
        $sql_set_2 = "SELECT set_name 
                      FROM bill_percent
                      WHERE id_set = '".$_GET['id_set'] ."'";
        $objQuery_set_2 = mysql_query($sql_set_2) or die ("Error Query [".$sql_set_2."]");
        $objResult_set2 = mysql_fetch_array($objQuery_set_2);
        $set_name = $objResult_set2['set_name'];
        ?>
            <tr>
              <td align="center"><? echo $set_name;?></td>
              <input type="hidden" name="id_set" id="id_set" value="<?=$_GET['id_set'];?>">
              <td>
                <center>
                <select name="teacher_self" class="teacher_set" id="teacher_set" >
                    <?php 
                        $strSQL_teacherall = "SELECT * FROM `teacher`" ; //LIMIT 0, 15
                        $objQuery_teacherall = mysql_query($strSQL_teacherall) or die ("Error Query [".$strSQL_teacherall."]");
                        while ( $objResult_teacherall = mysql_fetch_array($objQuery_teacherall)) {?>
                        <option value="<?=$objResult_teacherall['teacherid']?>"><?=$objResult_teacherall['teachername'];?></option><? }?>
                </select></center></td>
              <td align="center"><input type="text" placeholder="กรอก % เป็นตัวเลข" id="percent_set" name="percent_set"></td>
              <td align="center">
                <button type="button" class="btn btn-primary btn-xs setting-add"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> เพิ่ม</button></td>
          </tr>
    </tbody>
  </table>
</div>

<div class="col-md-12" id="non-printable">
<center>
    <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>
    <button type="button" class="btn btn-default back_pay" id="back_pay">Back</button>
</center>
</div>

<? mysql_close($conn);?>
