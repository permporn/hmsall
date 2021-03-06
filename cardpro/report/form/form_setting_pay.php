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
    "order": [[ 0, "asc" ]]
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
});
function editSetting(id,id_set){
    $("#loading").html("<img src=\"images\/Loading_icon.gif\" width=\"50px\" />");
    var update_percent = $('#percent'+id).val(); 
    //alert(id_set);
    var request = $.ajax({
        url: "report.php",
        method: "GET",
        data: { id : id , action_type : "editSetting" , update_percent : update_percent , id_set : id_set}
    });
    request.done(function( result ) {
        //console.log(result);
        if(result != ''){
            alert(result);
        }
        $.ajax({
            type: "POST",
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
            type: "POST",
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
}
</script>
<div class="col-sm-12">
    <div class="col-md-11"></div>
    <div class="col-md-1" style="padding-bottom: 10px "><button type="button" onclick="editBook(<?=$objResult_bill['id_bill']?>)" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> เพิ่ม</button></div> 
</div>
<div class="col-sm-12">  
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
      <? $sql_set = "SELECT id,  id_set,  teacher_id,  percent , teacher.teachername AS teacher_name
                          FROM bill_percent 
                          LEFT JOIN teacher ON bill_percent.teacher_id = teacher.teacherid";
        $objQuery_set = mysql_query($sql_set) or die ("Error Query [".$sql_set."]");
        $j =0;
        while($objResult_set = mysql_fetch_array($objQuery_set)){ ?>
          <tr>
          <td align="center"><? echo $objResult_set['id_set'];?></td>
          <td align="center"><?=$objResult_set['teacher_name']?></td>
          <td align="center"><input type="text" id="percent<?=$objResult_set['id']?>" name="percent<?=$objResult_set['id']?>" value="<?=$objResult_set['percent']?>"/></td>
          <td align="center">
            <div id="loading"></div><button type="button" onclick="editSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn-success btn-xs"> <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> บันทึก</button>

            <button type="button" onclick="deleteSetting(<?=$objResult_set['id']?>,<?=$objResult_set['id_set']?>)" class="btn btn btn-xs"> <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> ลบ</button>
            </td>
          </tr>
        <? $j++;}?>
    </tbody>
  </table>
</div>

<div class="col-md-12" id="non-printable">
<center>
  <button type="button" class="btn btn-default close_pay" id="close_pay">Close</button>
</center>
</div>

<? mysql_close($conn);?>
